<?php
namespace App\Traits\Episodes;


use App\Models\Episodes\Episode;
use App\Traits\Common\CommonTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

trait EpisodeBaseTrait{
    use CommonTrait;

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
        $seconds = gmdate("s", $seconds);
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
        for($i=1; $i<=$stars; $i++){
            if($i == (int)$stars) $starsIndex = $i + 1;
        }
        if((int)$stars == 1) $starsIndex = 1;

        $index = ((int)$stars != $stars) ? 'left' : 'right';
    }

    public function getEpisodeReviewsByNumber($episode_id): array{
        return [
            5 => [
                'total' => '1.2K',
                'percentage' => '100'
            ],
            4 => [
                'total' => '0.6K',
                'percentage' => '50'
            ],
            3 => [
                'total' => '0.3K',
                'percentage' => '25'
            ],
            2 => [
                'total' => '0.2K',
                'percentage' => '16'
            ],
            1 => [
                'total' => '0.1K',
                'percentage' => '8'
            ]
        ];
    }
}
