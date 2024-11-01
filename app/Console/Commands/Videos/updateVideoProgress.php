<?php

namespace App\Console\Commands\Videos;

use App\Models\Episodes\EpisodeVideo;
use App\Traits\Episodes\EpisodeBaseTrait;
use Illuminate\Console\Command;

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
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void{
        $videos = EpisodeVideo::get();
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
                }catch (\Exception $e){}
            }
        }
    }
}
