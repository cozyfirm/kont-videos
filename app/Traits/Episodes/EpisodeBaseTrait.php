<?php
namespace App\Traits\Episodes;


use App\Models\Episodes\Episode;
use App\Traits\Common\CommonTrait;

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
}
