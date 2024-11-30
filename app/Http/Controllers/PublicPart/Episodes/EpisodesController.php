<?php

namespace App\Http\Controllers\PublicPart\Episodes;

use App\Http\Controllers\Controller;
use App\Models\Episodes\Chapter;
use App\Models\Episodes\ChapterVideo;
use App\Models\Episodes\Episode;
use App\Models\Episodes\EpisodeActivity;
use App\Models\Episodes\EpisodeVideo;
use App\Models\Other\FAQ;
use App\Models\Other\Questionnaire\Questionnaire;
use App\Models\Other\Questionnaire\QuestionnaireAnswers;
use App\Traits\Episodes\EpisodeBaseTrait;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use ReviewHelper;

class EpisodesController extends Controller{
    use ResponseTrait, EpisodeBaseTrait;
    protected string $_path = 'public-part.app.episodes.';
    protected int $_total_episodes = 8;

    /**
     * Get all episodes
     * @return View
     */
    public function episodes(): View{
        return view($this->_path . 'preview-all', [
            'episodes' => Episode::where('status', '!=', 2)->orderBy('id', 'DESC')->take($this->_total_episodes)->get(),
            'all_episodes' => true,
            'faqs' => FAQ::get()
        ]);
    }

    protected function getVideoData($slug, $videoID = null): View | RedirectResponse{
        if(!Auth::check()) return redirect()->route('auth');
        $episode = Episode::where('slug', '=', $slug)->first();
        if(!$episode) abort(404);
        if($episode->status != 1) return redirect()->route('public.episodes');

        if($episode->type == 0){
            if($videoID){
                $video = EpisodeVideo::where('id', '=', $videoID)->first();
                if(!$video) abort(404);

                $activity = EpisodeActivity::where('user_id', '=', Auth::user()->id)->where('video_id', '=', $video->id)->first();
                if(!$activity){
                    EpisodeActivity::create([
                        'user_id' => Auth::user()->id,
                        'episode_id' => $episode->id,
                        'video_id' => $video->id
                    ]);
                }
            }else{
                /* Initial video that should be loaded */
                $video = EpisodeVideo::where('category', '=',1)->where('episode_id', '=', $episode->id)->first();
                if(!$video) abort(404);

                /* Check for last watched video that is not finished */
                $activity = EpisodeActivity::where('user_id', '=', Auth::user()->id)->where('episode_id', '=', $episode->id)->orderBy('updated_at', 'DESC')->first();
                if(!$activity){
                    EpisodeActivity::create([
                        'user_id' => Auth::user()->id,
                        'episode_id' => $episode->id,
                        'video_id' => $video->id
                    ]);
                }else{
                    $video = EpisodeVideo::where('category', '=',1)->where('id', '=', $activity->video_id)->first();
                }
            }

            /* Increment number of video loads */
            $this->updateVideoLoads($video->id);
        }
        else{
            if($videoID){
                $chapter = Chapter::where('id', '=', $videoID)->first();
                $activity = EpisodeActivity::where('user_id', '=', Auth::user()->id)->where('chapter_id', '=', $chapter->id)->first();
                if(!$activity){
                    $activity = EpisodeActivity::create([
                        'user_id' => Auth::user()->id,
                        'episode_id' => $episode->id,
                        'video_id' => $chapter->video_id,
                        'chapter_id' => $chapter->id
                    ]);
                }

                $video = ChapterVideo::where('id', '=', $chapter->video_id)->first();
            }else{
                $video = ChapterVideo::where('episode_id', '=', $episode->id)
                    ->where('category', '=', 1)
                    ->first();

                $video->update(['total_loads' => ($video->total_loads + 1)]);

                if(!$video) abort(404);

                $activity = EpisodeActivity::where('user_id', '=', Auth::user()->id)->where('episode_id', '=', $episode->id)->orderBy('updated_at', 'DESC')->first();

                if(!$activity){
                    /* Let's find first chapter */
                    $chapter = Chapter::where('video_id', '=', $video->id)->orderBy('id')->first();
                    if(!$chapter) abort(404);

                    $activity = EpisodeActivity::create([
                        'user_id' => Auth::user()->id,
                        'episode_id' => $episode->id,
                        'video_id' => $video->id,
                        'chapter_id' => $chapter->id
                    ]);
                }

                $chapter  = Chapter::where('id', '=', $activity->chapter_id)->orderBy('id')->first();
            }

            $video->starts_at = $activity->time + $chapter->time;
        }

        return view($this->_path . 'preview', [
            'episode' => $episode,
            'video' => $video,
            /* Replace menu links with episode title */
            'previewEpisode' => true,
            'reviewsByNumber' => $this->getEpisodeReviewsByNumber($episode->id),
            'otherEpisodes' => Episode::where('id', '!=', $episode->id)->inRandomOrder()->take(4)->get(),
            'questions' => Questionnaire::get(),
            'activity' => $activity ?? null
        ]);
    }

    public function preview($slug): View | RedirectResponse{
        return $this->getVideoData($slug);
    }
    public function previewWithVideo($slug, $videoID): View | RedirectResponse{
        return $this->getVideoData($slug, $videoID);
    }

    /**
     * On every second, update video activity ...
     * @param Request $request
     * @return JsonResponse
     */
    public function updateActivity(Request $request): JsonResponse{
        try{
            /* Offer questionnaire */
            $offerQuestionnaire = false;

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
                    ->where('category', '=', 1)
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

            /**
             *  When episode is finished, open Questionnaire form for user
             */
            if($episodeFinished){
                $questionnaireAnswer = QuestionnaireAnswers::where('episode_id', '=', $request->episode_id)->where('user_id', '=', Auth::user()->id)->first();
                if(!$questionnaireAnswer) $offerQuestionnaire = true;
            }

            return $this->apiResponse('0000', __('Success'), [
                'progress' => $progress,
                'nextVideo' => $nextVideo,
                'episodeFinished' => $episodeFinished,
                'offerQuestionnaire' => $offerQuestionnaire
            ]);
        }catch (\Exception $e){
            return $this->jsonError('0001', __('Greška. Molimo kontaktirajte administratore!'));
        }
    }

    /**
     * On every second, update chapter activity ...
     * @param Request $request
     * @return JsonResponse
     */
    public function updateChapterActivity(Request $request): JsonResponse{
        try{
            /* Offer questionnaire */
            $offerQuestionnaire = false;
            /* Check if episode is finished */
            $episodeFinished = false;

            /* Let's first find the current chapter */
            $chapter = Chapter::where('video_id', '=', $request->video_id)
                ->where('time', '<=', $request->time)->where('time_end', '>=', $request->time)
                ->first();

            $activity = EpisodeActivity::where('episode_id', '=', $request->episode_id)
                ->where('video_id', '=', $request->video_id)
                ->where('chapter_id', '=', $chapter->id)
                ->where('user_id', '=', Auth::user()->id)
                ->first();

            /* Select time from beginning of chapter */
            $chapterTime = $request->time - $chapter->time;
            /* Duration of chapter, according to start and end time */
            $chapterDuration = $chapter->time_end - $chapter->time;
            /* Progress of chapter */
            $progress = (int) (($chapterTime / $chapterDuration) * 100);
            /* Check if chapter is finished */
            $finished = ($request->time >= ($chapter->time_end));

            if($activity){
                $activity->update([
                    'time' => $chapterTime,
                    'progress' => $progress,
                    'finished' => $finished
                ]);
            }else{
                EpisodeActivity::create([
                    'user_id' => Auth::user()->id,
                    'episode_id' => $request->episode_id,
                    'video_id' => $request->video_id,
                    'chapter_id' => $chapter->id
                ]);
            }

            /**
             *  When episode is finished, open Questionnaire form for user
             */
            if($chapter->last and $finished){
                $questionnaireAnswer = QuestionnaireAnswers::where('episode_id', '=', $request->episode_id)->where('user_id', '=', Auth::user()->id)->first();
                if(!$questionnaireAnswer) $offerQuestionnaire = true;

                $episodeFinished = true;
            }

            return $this->apiResponse('0000', __('Success'), [
                'progress' => $progress,
                'currentChapter' => $chapter,
                'episodeFinished' => $episodeFinished,
                'offerQuestionnaire' => $offerQuestionnaire
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
                $fullStar = 1; $halfStar = 0;

                $episode = Episode::where('id', '=', $request->id)->first();
                if($episode->type == 0){
                    /* Episode with videos */
                    $episode = Episode::where('id', '=', $request->id)->with('videoContentRel:id,episode_id,title,description,library_id,video_id,thumbnail,category,duration_sec', 'presenterRel:id,name')->first(['id', 'presenter_id', 'slug', 'title', 'description', 'status', 'type', 'stars']);
                    foreach ($episode->videoContentRel as $content){
                        if($content->category != 2){
                            $content->img = $this->getThumbnailUri($content->video_id, $content->thumbnail);
                            $content->duration = $content->getDuration();
                        }
                    }
                }else{
                    /* Episode with chapters */
                    $episode = Episode::where('id', '=', $request->id)->with('chapterVideoRel.chaptersRel', 'presenterRel:id,name')->first(['id', 'presenter_id', 'slug', 'title', 'description', 'status', 'type', 'stars']);
                    foreach($episode->chapterVideoRel->chaptersRel as $chapter){
                        $chapter->img = $this->getThumbnailUri($episode->chapterVideoRel->video_id, $episode->chapterVideoRel->thumbnail);
                        $chapter->duration = $chapter->getDuration();
                    }
                }

                $episode->duration = $episode->totalDuration();

                /* Get stars info */
                // $this->getReviewsInfo($starIndex, $index, $episode->stars);
                ReviewHelper::getRawData($episode->stars ?? '1', $fullStar, $halfStar);

                if($episode->type == 0){
                    /* Episode with videos */
                    $trailer = EpisodeVideo::where('episode_id', '=', $episode->id)->where('category', '=', 2)->first(['id', 'title', 'library_id', 'video_id', 'thumbnail']);
                    $trailer->uri = $trailer->getIframeUri($trailer->library_id, $trailer->video_id);

                }else{
                    /* Episode with chapters */
                    $trailer = ChapterVideo::where('episode_id', '=', $episode->id)->where('category', '=', 2)->first();
                    $trailer->title = "Trailer";
                    $trailer->uri = $trailer->getIframeUri($trailer->library_id, $trailer->video_id);
                }

                return $this->apiResponse('0000', __('Success'), [
                    'episode' => $episode,
                    'trailer' => $trailer,
                    'reviews' => [
                        'fullStar' => $fullStar,
                        'halfStar' => $halfStar,
                        'total' => $episode->reviewsRel->count()
                    ]
                ]);
            }else throw new \ErrorException('Video not found!!');
        }catch (\Exception $e){
            return $this->jsonError('0001', __('Greška. Molimo kontaktirajte administratore!'));
        }
    }
}
