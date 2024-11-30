<?php

namespace App\Http\Controllers\Admin\Episodes;

use App\Http\Controllers\Controller;
use App\Models\Core\Keyword;
use App\Models\Episodes\Chapter;
use App\Models\Episodes\ChapterVideo;
use App\Models\Episodes\Episode;
use App\Traits\Common\CommonTrait;
use App\Traits\Episodes\EpisodeBaseTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VideoChaptersController extends Controller{
    use EpisodeBaseTrait, ResponseTrait, CommonTrait;
    protected string $_path = 'admin.app.episodes.chapters.';

    /**
     * Set trailer and or video content; In case that sample exists, update, otherwise create sample
     *
     * @param string $slug
     * @param string $type
     * @return View
     */
    public function setVideo(string $slug, string $type): View{
        $episode = Episode::where('slug', '=', $slug)->first();
        $videoType = Keyword::where('type', '=', 'video_category')->where('value', '=', $type)->first();

        /* Get video category from video */
        $category = Keyword::where('type', '=', 'video_category')->where('value', '=', $type)->first();
        $videoChapter = ChapterVideo::where('episode_id', '=', $episode->id)->where('category', '=', $category->id)->first();

        return view($this->_path . 'set', [
            'category' => Keyword::getIt('video_category'),
            'episode' => $episode,
            'type' => $type,
            'videoType' => $videoType,
            'videoChapter' => $videoChapter
        ]);
    }

    /**
     * Update chapter video with additional checks
     * @param Request $request
     * @return JsonResponse
     */
    public function updateVideo(Request $request): JsonResponse{
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

            $category = Keyword::where('type', '=', 'video_category')->where('value', '=', $request->category)->first();
            $chapterVideo = ChapterVideo::where('episode_id', '=', $request->episode_id)
                ->where('category', '=', $category->id)
                ->first();

            /* Set category as ID of category type */
            $request['category'] = $category->id;

            if(!$chapterVideo){
                ChapterVideo::create($request->except(['_token']));
            }else{
                ChapterVideo::where('id', '=', $request->id)->update($request->except(['_token', 'episode_id', 'id']));
            }

            /* Get info for redirect */
            $episode = Episode::where('id', '=', $request->episode_id)->first();

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.episodes.preview', ['slug' => $episode->slug]));
        }catch (\Exception $e){}
    }

    /** ------------------------------------------------------------------------------------------------------------- */
    /**
     *  Real chapters CRUD
     */

    /**
     * Update end time of chapter, according to start of next chapter or if it's last, duration of main video
     *
     * @param $video_id
     * @return void
     */
    public function updateEndTime($video_id): void{
        $chapters = Chapter::where('video_id', '=', $video_id)->orderBy('id')->get();

        $order = 1;
        foreach ($chapters as $chapter){
            $nextChapter = Chapter::where('id', '>', $chapter->id)->orderBy('id')->first();

            if($nextChapter){
                $chapter->update(['time_end' => ($nextChapter->time - 1), 'no' => $order++, 'last' => false]);
            }else{
                $video = ChapterVideo::where('id', '=', $chapter->video_id)->first();
                if($video){
                    $chapter->update(['time_end' => $video->duration_sec, 'no' => $order++, 'last' => true]);
                }
            }
        }
    }

    public function create($videoId): View{
        $chapterVideo = ChapterVideo::where('id', '=', $videoId)->first();
        $episode = Episode::where('id', '=', $chapterVideo->episode_id)->first();

        return view($this->_path . 'create', [
            'category' => Keyword::getIt('video_category'),
            'episode' => $episode,
            'create' => true,
            'chapterVideo' => $chapterVideo,
            'time' => $this->getNValues(0, 60)
        ]);
    }
    public function save(Request $request): JsonResponse{
        try{
            $request['time'] = ($request->hour * 3600) + ($request->min * 60) + $request->sec;
            $chapter = Chapter::create($request->except(['_token', 'undefined', 'files']));

            if(isset($request->video_id)) $this->updateEndTime($request->video_id);

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.episodes.chapters-video-content.chapters.preview', ['id' => $chapter->id]));
        }catch (\Exception $e){}
    }
    public function getData($action, $id): View{
        $chapter = Chapter::where('id', '=', $id)->first();

        $chapterVideo = ChapterVideo::where('id', '=', $chapter->video_id)->first();
        $episode = Episode::where('id', '=', $chapterVideo->episode_id)->first();

        return view($this->_path . 'create', [
            'category' => Keyword::getIt('video_category'),
            'episode' => $episode,
            $action => true,
            'chapterVideo' => $chapterVideo,
            'time' => $this->getNValues(0, 60),
            'chapter' => $chapter
        ]);
    }
    public function preview($id): View{
        return $this->getData('preview', $id);
    }
    public function edit($id): View{
        return $this->getData('edit', $id);
    }
    public function update(Request $request): JsonResponse{
        try{
            $request['time'] = ($request->hour * 3600) + ($request->min * 60) + $request->sec;
            Chapter::where('id', '=', $request->id)->update($request->except(['_token', 'undefined', 'files', 'id', 'episode_id']));

            if(isset($request->video_id)) $this->updateEndTime($request->video_id);

            return $this->jsonSuccess(__('Uspješno ste ažurirali podatke!'), route('system.admin.episodes.chapters-video-content.chapters.preview', ['id' => $request->id]));
        }catch (\Exception $e){}
    }
    public function delete($id): RedirectResponse{
        $chapter = Chapter::where('id', '=', $id)->first();
        $chapterVideo = ChapterVideo::where('id', '=', $chapter->video_id)->first();
        $episode = Episode::where('id', '=', $chapterVideo->episode_id)->first();

        $chapter->delete();

        return redirect()->route('system.admin.episodes.preview', ['slug' => $episode->slug]);
    }
}
