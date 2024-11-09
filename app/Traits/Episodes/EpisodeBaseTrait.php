<?php
namespace App\Traits\Episodes;

use App\Models\Episodes\Episode;
use App\Models\Episodes\EpisodeVideo;
use App\Models\Episodes\Review;
use App\Traits\Common\CommonTrait;
use App\Traits\Mqtt\MqttTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;

trait EpisodeBaseTrait{
    use CommonTrait, MqttTrait;

    /**
     * Check does exist episode with the same title
     * @param $slug
     * @return string
     */
    protected function episodesBySlug($slug) : string{
        try{
            $total = Episode::where('slug', '=', $slug)->count();
            if($total == 0) return '';
            else return $total;
        }catch (\Exception $e){ return ''; }
    }

    /**
     * Get final slug of episode
     *
     * @param $slug
     * @return string
     */
    public function getSlug($slug): string{
        $string = $this->generateSlug($slug);
        return ($string . ($this->episodesBySlug($string)));
    }

    /**
     * Get video information from BunnyNET API
     *
     * @param $libraryID
     * @param $videoID
     * @return object|bool
     */
    public function getVideoInfo($libraryID, $videoID): object | bool{
        $client = new Client();

        try {
            $response = $client->request('GET', 'https://video.bunnycdn.com/library/'.$libraryID.'/videos/' . $videoID, [
                'headers' => [
                    'AccessKey' => env('BUNNY_TOKEN'),
                    'accept' => 'application/json',
                ],
            ]);
        } catch (GuzzleException $e) {
            return false;
        }

        if($response->getStatusCode() == 200) return json_decode($response->getBody());
        else return false;
    }

    /**
     * Get duration of video providing seconds
     *
     * @param $seconds
     * @return string
     */
    public function getDurationHelper($seconds): string{
        $hours = gmdate("H", $seconds);
        $minutes = gmdate("i", $seconds);
        // $seconds = gmdate("s", $seconds);
        if($hours != "00"){
            return (int) $hours . "h " . (int) $minutes . " min ";
        }else{
            return (int) $minutes . " min ";
        }
    }

    /**
     * Get reviews info - Used for frontend reviews
     *
     * @param $starsIndex
     * @param $index
     * @param $stars
     * @return void
     */
    public function getReviewsInfo(&$starsIndex, &$index, $stars): void{
        $index = ((int)$stars != $stars) ? 'left' : 'right';

        if($stars <= 1) $starsIndex = 1;
        else if($stars > 1 and $stars <= 2) $starsIndex = 2;
        else if($stars > 2 and $stars <= 3) $starsIndex = 3;
        else if($stars > 3 and $stars <= 4) $starsIndex = 4;
        else $starsIndex = 5;
    }

    /**
     * @param $count
     * @return string
     */
    // Helper function to format count values
    private function formatCount($count): string {
        if ($count >= 1000) {
            return round($count / 1000, 1) . 'K';
        }
        return (string) $count;
    }

    /**
     * Format Episode reviews by stars (5, 4, 3, 2, 1) presented in percentages
     *
     * @param $episode_id
     * @return array
     */
    public function getEpisodeReviewsByNumber($episode_id): array{
        $oneStar    = Review::where('stars', '<=', 1)->where('episode_id', '=', $episode_id)->where('status', '=', 1)->count();
        $twoStars   = Review::where('stars', '>', 1)->where('stars', '<=', 2)->where('episode_id', '=', $episode_id)->where('status', '=', 1)->count();
        $threeStars = Review::where('stars', '>', 2)->where('stars', '<=', 3)->where('episode_id', '=', $episode_id)->where('status', '=', 1)->count();
        $fourStars  = Review::where('stars', '>', 3)->where('stars', '<=', 4)->where('episode_id', '=', $episode_id)->where('status', '=', 1)->count();
        $fiveStars  = Review::where('stars', '>', 4)->where('stars', '<=', 5)->where('episode_id', '=', $episode_id)->where('status', '=', 1)->count();

        // Store counts in an array
        $counts = [
            5 => $fiveStars,
            4 => $fourStars,
            3 => $threeStars,
            2 => $twoStars,
            1 => $oneStar,
        ];

        // Find the maximum count
        $maxCount = max($counts);

        // Calculate percentages and format counts
        $result = [];
        foreach ($counts as $stars => $count) {
            $percentage = $maxCount > 0 ? round(($count / $maxCount) * 100) : 0;
            $result[$stars] = [
                'total' => $this->formatCount($count),
                'percentage' => $percentage
            ];
        }

        return $result;
    }

    /**
     * Increment loads (number when user opened or loaded video; Should be different from views)
     *
     * @param int $video_id
     * @param bool $broadcast = true
     * @return void
     */
    public function updateVideoLoads(int $video_id, bool $broadcast = true): void{
        try{
            $video = EpisodeVideo::where('id', '=', $video_id)->first();
            $video->update(['total_loads' => ($video->total_loads + 1)]);

            if($broadcast){
                $this->publishMessage(env('GLOBAL_EP_CH'), '20001', [
                    'views' => $video->episodeRel->totalViews()
                ]);
            }
        }catch (\Exception  $e){}
    }

    /**
     * Number of reviews drawn through the cases
     * @param $number
     * @return string
     */
    public function numberOfReviewsInWords($number): string{
        if($number == 1 or $number == 5 or $number == 6 or $number == 7 or $number == 8 or $number == 9 or $number == 10) return $number . " recenzija";
        else if($number == 2 or $number == 3 or $number == 4) return $number . " recenzije";
    }

    /**
     * Format uri for iframe
     *
     * @param $library_id
     * @param $video_id
     * @return string
     */
    public function getIframeUri($library_id, $video_id): string{
        return "https://iframe.mediadelivery.net/embed/" . $library_id . "/" . $video_id;
    }
    public function getThumbnailUri($video_id, $thumbnail): string{
        return "https://vz-49b3acb4-335.b-cdn.net/" . $video_id . "/" . $thumbnail;
    }
}
