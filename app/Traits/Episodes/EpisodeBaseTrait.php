<?php
namespace App\Traits\Episodes;


use App\Models\Episodes\Episode;
use App\Traits\Common\CommonTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

trait EpisodeBaseTrait{
    use CommonTrait;
    protected function episodesBySlug($slug) : string{
        try{
            $total = Episode::where('slug', '=', $slug)->count();
            if($total == 0) return '';
            else return $total;
        }catch (\Exception $e){ return ''; }
    }
    public function getSlug($slug): string{
        $string = $this->generateSlug($slug);

        return ($string . ($this->episodesBySlug($string)));
    }

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
}
