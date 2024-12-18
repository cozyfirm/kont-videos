<?php

namespace App\Console\Commands\Videos;

use App\Models\Episodes\ChapterVideo;
use App\Models\Episodes\EpisodeVideo;
use App\Traits\Episodes\EpisodeBaseTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class updateVideoProgress extends Command{
    use EpisodeBaseTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'video:update-video-progress';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update video progress. Fetch data from BunnyNET!';

    /**
     * Execute the console command.
     */
    public function handle(): void{
        $videos = EpisodeVideo::get();
        $videosUpdated = 0;

        foreach ($videos as $video){
            $info = $this->getVideoInfo($video->library_id, $video->video_id);

            /* Update video from info from BunnyNet */
            if($info){
                try{
                    $video->update([
                        'thumbnail' => $info->thumbnailFileName,
                        'duration' => gmdate("H:i:s", $info->length),
                        'duration_sec' => $info->length,
                        'views' => $info->views,
                        'average_watch_time' => $info->averageWatchTime,
                        'total_watch_time' => $info->totalWatchTime
                    ]);
                    $videosUpdated ++;
                }catch (\Exception $e){
                    Log::channel('mqtt')->info($e->getMessage());
                }
            }
        }

        /**
         *  Update chapter videos
         */
        $chapterVideos = ChapterVideo::get();
        foreach ($chapterVideos as $video){
            $info = $this->getVideoInfo($video->library_id, $video->video_id);

            /* Update video from info from BunnyNet */
            if($info){
                try{
                    $video->update([
                        'thumbnail' => $info->thumbnailFileName,
                        'duration' => gmdate("H:i:s", $info->length),
                        'duration_sec' => $info->length,
                        'views' => $info->views,
                        'average_watch_time' => $info->averageWatchTime,
                        'total_watch_time' => $info->totalWatchTime
                    ]);
                    $videosUpdated ++;
                }catch (\Exception $e){
                    Log::channel('mqtt')->info($e->getMessage());
                }
            }
        }

        Log::channel('cron')->info("Updated " . ($videosUpdated) . " of total " . $videos->count());
    }
}
