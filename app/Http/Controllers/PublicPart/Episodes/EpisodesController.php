<?php

namespace App\Http\Controllers\PublicPart\Episodes;

use App\Http\Controllers\Controller;
use App\Models\Episodes\Episode;
use App\Models\Episodes\EpisodeActivity;
use App\Models\Episodes\EpisodeVideo;
use App\Models\Other\FAQ;
use App\Traits\Episodes\EpisodeBaseTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EpisodesController extends Controller{
    use ResponseTrait, EpisodeBaseTrait;
    protected string $_path = 'public-part.app.episodes.';
    protected int $_total_episodes = 8;

    public function episodes(): View{
        return view($this->_path . 'preview-all', [
            'episodes' => Episode::orderBy('id', 'DESC')->take($this->_total_episodes)->get(),
            'all_episodes' => true,
            'faqs' => FAQ::get()
        ]);
    }

    public function preview($slug): View | RedirectResponse{
        if(!Auth::check()) return redirect()->route('auth');
        $episode = Episode::where('slug', '=', $slug)->first();

        /* Initial video that should be loaded */
        $video = EpisodeVideo::where('episode_id', '=', $episode->id)->first();

        if(!$episode or !$video) abort(404);

        /* Check for last watched video that is not finished */
        $activity = EpisodeActivity::where('user_id', '=', Auth::user()->id)->where('episode_id', '=', $episode->id)->orderBy('video_id', 'DESC')->first();
        if(!$activity){
            EpisodeActivity::create([
                'user_id' => Auth::user()->id,
                'episode_id' => $episode->id,
                'video_id' => $video->id
            ]);
        }else{
            $video = EpisodeVideo::where('id', '=', $activity->video_id)->first();
        }

        /* Increment number of video loads */
        $this->updateVideoLoads($video->id);

        return view($this->_path . 'preview', [
            'episode' => $episode,
            'video' => $video,
            /* Replace menu links with episode title */
            'previewEpisode' => true,
            'reviewsByNumber' => $this->getEpisodeReviewsByNumber($episode->id),
            'otherEpisodes' => Episode::where('id', '!=', $episode->id)->inRandomOrder()->take(4)->get()
        ]);
    }

    /**
     * On every second, update video activity ...
     * @param Request $request
     * @return JsonResponse
     */
    public function updateActivity(Request $request): JsonResponse{
        try{
            $activity = EpisodeActivity::where('episode_id', '=', $request->episode_id)
                ->where('video_id', '=', $request->video_id)
                ->where('user_id', '=', Auth::user()->id)
                ->first();

            $progress = (int) (($request->time / $request->duration) * 100);

            if($activity){
                $activity->update([
                    'time' => $request->time,
                    'progress' => $progress,
                    'finished' => ($request->finished === "true") ? 1 : 0
                ]);
            }else{
                EpisodeActivity::create([
                    'user_id' => Auth::user()->id,
                    'episode_id' => $request->episode_id,
                    'video_id' => $request->video_id
                ]);
            }

            $nextVideo = null; $episodeFinished = false;
            /* If finished, go to next video */
            if($request->finished === "true"){
                $nextVideo = EpisodeVideo::where('episode_id', '=', $request->episode_id)
                    ->where('id', '>', $request->video_id)
                    ->orderBy('id')
                    ->first();

                if($nextVideo){
                    $activity = EpisodeActivity::where('user_id', '=', Auth::user()->id)
                        ->where('episode_id', '=', $request->episode_id)
                        ->where('video_id', '=', $nextVideo->id)
                        ->first();

                    if(!$activity){
                        EpisodeActivity::create([
                            'user_id' => Auth::user()->id,
                            'episode_id' => $request->episode_id,
                            'video_id' => $nextVideo->id
                        ]);
                    }

                    /* Increment number of video loads */
                    $this->updateVideoLoads($nextVideo->id);
                }else{
                    $episodeFinished = true;
                }
            }

            return $this->apiResponse('0000', __('Success'), [
                'progress' => $progress,
                'nextVideo' => $nextVideo,
                'episodeFinished' => $episodeFinished
            ]);
        }catch (\Exception $e){
            return $this->jsonError('0001', __('Greška. Molimo kontaktirajte administratore!'));
        }
    }

    /**
     * On click, give user a new wanted video
     * @param Request $request
     * @return JsonResponse
     */
    public function playVideo(Request $request): JsonResponse{
        try{
            if(isset($request->video_id)){
                $nextVideo = EpisodeVideo::where('id', '=', $request->video_id)->first();

                /* Increment number of video loads */
                $this->updateVideoLoads($request->video_id);

                return $this->apiResponse('0000', __('Success'), [
                    'progress' => 0,
                    'nextVideo' => $nextVideo,
                    'episodeFinished' => false
                ]);
            }else throw new \ErrorException('Video not found!!');
        }catch (\Exception $e){
            return $this->jsonError('0001', __('Greška. Molimo kontaktirajte administratore!'));
        }
    }

    /**
     * Mark video as watched | non watched depending on checkbox state
     * @param Request $request
     * @return JsonResponse|bool|string
     */
    public function markAsWatched(Request $request): JsonResponse | bool | string{
        try{
            if(isset($request->id) and isset($request->checked)){
                $video = EpisodeVideo::where('id', '=', $request->id)->first();

                if($video){
                    $activity = EpisodeActivity::where('user_id', '=', Auth::user()->id)
                        ->where('episode_id', '=', $video->episode_id)
                        ->where('video_id', '=', $video->id)
                        ->first();

                    if($activity){
                        $activity->update([
                            'finished' => ($request->checked == "false"),
                            'time' => ($request->checked == "false") ? $video->duration_sec : '0',
                            'progress' => ($request->checked == "false") ? '100' : '0'
                        ]);
                    }else{
                        $activity = EpisodeActivity::create([
                            'user_id' => Auth::user()->id,
                            'episode_id' => $video->episode_id,
                            'video_id' => $video->id,
                            'finished' => ($request->checked == "false"),
                            'time' => ($request->checked == "false") ? $video->duration_sec : '0',
                            'progress' => ($request->checked == "false") ? '100' : '0'
                        ]);
                    }

                    return $this->jsonResponse('0000', __('Uspješno ažurirano!!'), [
                        'activity' => $activity
                    ]);
                }else throw new \ErrorException('Video not found!!');
            }else throw new \ErrorException('Video ID unknown');
        }catch (\Exception $e){
            return $this->jsonError('0001', __('Greška. Molimo kontaktirajte administratore!'));
        }
    }

    /**
     * Fetch trailer and all videos from episode
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function fetchTrailer(Request $request): JsonResponse{
        try{
            if(isset($request->id)){

                $episode = Episode::where('id', '=', $request->id)->with('videoContentRel:id,episode_id,title,description,library_id,video_id,thumbnail,category,duration_sec', 'presenterRel:id,name')->first(['id', 'presenter_id', 'slug', 'title', 'description']);
                foreach ($episode->videoContentRel as $content){
                    if($content->category != 2){
                        $content->img = $this->getThumbnailUri($content->video_id, $content->thumbnail);
                    }
                }
                $episode->duration = $episode->totalDuration();

                $trailer = EpisodeVideo::where('episode_id', '=', $episode->id)->where('category', '=', 2)->first(['id', 'title', 'library_id', 'video_id', 'thumbnail']);
                $trailer->uri = $trailer->getIframeUri($trailer->library_id, $trailer->video_id);

                return $this->apiResponse('0000', __('Success'), [
                    'episode' => $episode,
                    'trailer' => $trailer
                ]);
            }else throw new \ErrorException('Video not found!!');
        }catch (\Exception $e){
            return $this->jsonError('0001', __('Greška. Molimo kontaktirajte administratore!'));
        }
    }
}
