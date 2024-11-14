<?php

namespace App\Http\Controllers\Admin\Episodes;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Admin\Core\HashtagController;
use App\Http\Controllers\Controller;
use App\Models\Core\Keyword;
use App\Models\Episodes\Episode;
use App\Models\Episodes\EpisodeVideo;
use App\Models\Episodes\Review;
use App\Models\User;
use App\Traits\Common\FileTrait;
use App\Traits\Episodes\EpisodeBaseTrait;
use App\Traits\Http\ResponseTrait;
use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EpisodesController extends Controller{
    use ResponseTrait, FileTrait, EpisodeBaseTrait;
    protected string $_path = 'admin.app.episodes.';

    public function index(): View{
        $episodes = Episode::where('id', '>', 0);
        $episodes = Filters::filter($episodes);

        $filters = [
            'title' => __('Naslov'),
            'presenterRel.name' => __('Predavač')
        ];

        return view($this->_path . 'index', [
            'filters' => $filters,
            'episodes' => $episodes
        ]);
    }
    public function create (): View{
        return view($this->_path . 'create', [
            'create' => true,
            'users' => User::where('role', '=', 'presenter')->pluck('name', 'id'),
            'languages' => Keyword::getIt('languages'),
            'statuses' => Keyword::getItByVal('episode_status')
        ]);
    }
    public function save(Request $request): RedirectResponse{
        try{
            /* Save image */
            $request['path'] = 'files/images/episodes/';
            $image = $this->saveFile($request, 'image_id', 'video');

            /* Save video */
            $request['path'] = 'files/videos/';
            $video = $this->saveFile($request, 'video_id', 'video');

            /* Generate unique slug */
            $request['slug'] = $this->getSlug($request->title);
            $request['created_by'] = Auth::user()->id;

            $episode = Episode::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'status' => $request->status,
                'presenter_id' => $request->presenter_id,
                'image_id' => $image->id,
                'video_id' => $video->id,
                'language_id' => $request->language_id,
                'created_by' => $request->created_by
            ]);

            /* HashTags */
            request()->merge(['id' => $episode->id]);
            HashtagController::extract(request(), Episode::find($episode->id));

            return redirect()->route('system.admin.episodes.preview', ['slug'  => $episode->slug ]);
        }catch (\Exception $e){
            return back()->with('error', __('Desila se greška! Pokušajte ponovo!'));
        }
    }
    public function preview ($slug): View{
        return view($this->_path . 'create', [
            'preview' => true,
            'episode' => Episode::where('slug', '=', $slug)->first(),
            'users' => User::where('role', '=', 'presenter')->pluck('name', 'id'),
            'languages' => Keyword::getIt('languages'),
            'statuses' => Keyword::getItByVal('episode_status')
        ]);
    }
    public function edit ($slug): View{
        return view($this->_path . 'create', [
            'edit' => true,
            'episode' => Episode::where('slug', '=', $slug)->first(),
            'users' => User::where('role', '=', 'presenter')->pluck('name', 'id'),
            'languages' => Keyword::getIt('languages'),
            'statuses' => Keyword::getItByVal('episode_status')
        ]);
    }
    public function update(Request $request): RedirectResponse{
        try{
            $episode = Episode::where('id', '=', $request->id)->first();

            if(isset($request->image_id)){
                /* Save image */
                $request['path'] = 'files/images/episodes/';
                $image = $this->saveFile($request, 'image_id', 'video');
            }
            if(isset($request->video_id)){
                /* Save video */
                $request['path'] = 'files/videos/';
                $video = $this->saveFile($request, 'video_id', 'video');
            }

            $episode->update([
                'title' => $request->title,
                'presenter_id' => $request->presenter_id,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'status' => $request->status,
                'image_id' => isset($image) ? $image->id : $episode->image_id,
                'video_id' => isset($video) ? $video->id : $episode->video_id,
                'language_id' => $request->language_id,
            ]);

            /* HashTags */
            request()->merge(['id' => $request->id]);
            HashtagController::extract(request(), Episode::find($request->id));

            return redirect()->route('system.admin.episodes.preview', ['slug'  => $episode->slug ]);
        }catch (\Exception $e){
            return back()->with('error', __('Desila se greška! Pokušajte ponovo!'));
        }
    }
    public function delete ($slug): RedirectResponse{
        Episode::where('slug', '=', $slug)->delete();
        return redirect()->route('system.admin.episodes');
    }

    /**
     *  Video content - CRUD
     */
    public function addVideo($slug): View{
        return view($this->_path . 'video-content.create', [
            'create' => true,
            'episode' => Episode::where('slug', '=', $slug)->first(),
            'category' => Keyword::getIt('video_category')
        ]);
    }
    public function saveVideo(Request $request): JsonResponse{
        try{
            $video = $this->getVideoInfo($request->library_id, $request->video_id);
            if(!$video){
                return $this->jsonError('2200', __('Greška prilikom čitanja podataka o videu. Jeste li unijeli dobre podatke?'));
            }

            $request['thumbnail'] = $video->thumbnailFileName;
            $request['duration'] = gmdate("H:i:s", $video->length);;
            $request['duration_sec'] = $video->length;
            $request['views'] = $video->views;
            $request['average_watch_time'] = $video->averageWatchTime;
            $request['total_watch_time'] = $video->totalWatchTime;

            EpisodeVideo::create($request->except(['_token', 'undefined', 'files']));

            /* Get info for redirect */
            $episode = Episode::where('id', '=', $request->episode_id)->first();

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.episodes.preview', ['slug' => $episode->slug]));
        }catch (\Exception $e){}
    }
    public function previewVideo($id): View{
        $video = EpisodeVideo::where('id', '=', $id)->first();
        return view($this->_path . 'video-content.create', [
            'preview' => true,
            'episode' => Episode::where('id', '=', $video->episode_id )->first(),
            'category' => Keyword::getIt('video_category'),
            'video' => $video
        ]);
    }
    public function editVideo($id): View{
        $video = EpisodeVideo::where('id', '=', $id)->first();
        return view($this->_path . 'video-content.create', [
            'edit' => true,
            'episode' => Episode::where('id', '=', $video->episode_id )->first(),
            'category' => Keyword::getIt('video_category'),
            'video' => $video
        ]);
    }
    public function updateVideo(Request $request): JsonResponse{
        try{
            $video = $this->getVideoInfo($request->library_id, $request->video_id);
            if(!$video){
                return $this->jsonError('2200', __('Greška prilikom čitanja podataka o videu. Jeste li unijeli dobre podatke?'));
            }

            $request['thumbnail'] = $video->thumbnailFileName;
            $request['duration'] = gmdate("H:i:s", $video->length);
            $request['duration_sec'] = $video->length;
            $request['views'] = $video->views;
            $request['average_watch_time'] = $video->averageWatchTime;
            $request['total_watch_time'] = $video->totalWatchTime;

            EpisodeVideo::where('id', '=', $request->id)->update($request->except(['_token', 'undefined', 'files', 'episode_id', 'id']));

            /* Get info for redirect */
            $episode = Episode::where('id', '=', $request->episode_id)->first();

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.episodes.preview', ['slug' => $episode->slug]));
        }catch (\Exception $e){}
    }
    public function deleteVideo($id): RedirectResponse{
        $video = EpisodeVideo::where('id', '=', $id)->first();
        $episode = Episode::where('id', '=', $video->episode_id)->first();

        $video->delete();
        return redirect()->route('system.admin.episodes.preview', ['slug' => $episode->slug]);
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     * Reviews
     */
    public function allReviews(): View{
        $reviews = Review::where('id', '>', 0)->orderBy('id', 'DESC');
        $reviews = Filters::filter($reviews);

        $filters = [
            'episodeRel.title' => __('Epizoda'),
            'userRel.name' => __('Korisnik'),
            'stars' => __('Ocjena'),
            'note' => __('Poruka'),
            'statusRel.name' => __('Status')
        ];

        return view($this->_path . 'all-reviews', [
            'filters' => $filters,
            'reviews' => $reviews
        ]);
    }
    public function updateReviewStatus(Request $request): JsonResponse{
        try{
            $review = Review::where('id', '=', $request->id)->first();
            $review->update(['status' => $request->status]);

            /* Update average review */
            $episode = Episode::where('id', '=', $review->episode_id)->first();
            $average = $episode->setAverageRating();

            return $this->jsonSuccess(__('Uspješno spašeno! Prosječna ocjena ' . ($episode->title ?? '') . ' je ') . $episode->stars . '!');
        }catch (\Exception $e){}
    }
}
