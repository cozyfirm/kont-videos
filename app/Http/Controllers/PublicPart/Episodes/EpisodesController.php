<?php

namespace App\Http\Controllers\PublicPart\Episodes;

use App\Http\Controllers\Controller;
use App\Models\Episodes\Episode;
use App\Models\Episodes\EpisodeActivity;
use App\Models\Episodes\EpisodeVideo;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EpisodesController extends Controller{
    use ResponseTrait;
    protected string $_path = 'public-part.app.episodes.';

    public function episodes(): View{
        return view($this->_path . 'preview-all', [
            'episodes' => Episode::orderBy('id', 'DESC')->take(6)->get(),
            'all_episodes' => true
        ]);
    }

    public function preview($slug): View | RedirectResponse{
        if(!Auth::check()) return redirect()->route('auth');
        $episode = Episode::where('slug', '=', $slug)->first();

        /* Initial video that should be loaded */
        $video = EpisodeVideo::where('episode_id', '=', $episode->id)->first();

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

        return view($this->_path . 'preview', [
            'episode' => $episode,
            'video' => $video
        ]);
    }
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
    public function playVideo(Request $request): JsonResponse{
        try{
            $nextVideo = EpisodeVideo::where('id', '=', $request->video_id)->first();

            return $this->apiResponse('0000', __('Success'), [
                'progress' => 0,
                'nextVideo' => $nextVideo,
                'episodeFinished' => false
            ]);
        }catch (\Exception $e){
            return $this->jsonError('0001', __('Greška. Molimo kontaktirajte administratore!'));
        }
    }
}
