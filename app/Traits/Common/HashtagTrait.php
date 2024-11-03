<?php

namespace App\Traits\Common;
use App\Http\Controllers\Admin\Core\HashtagController;
use App\Models\Core\Hashtags\Hashtag;

trait HashtagTrait{
    protected string $_lang = 'bs';

    protected function getRoute($tag): string {
        return isset($this->tagsRoute) ? route($this->tagsRoute, ['tag' => str_replace('#', '', $tag)]) : '#';
    }

    protected function scopetags(): static{
        $columns    = $this->taggable;
        $attributes = $this->getAttributes();

        foreach ($attributes as $key => $val){
            if(in_array($key, $columns)){
                $tags = HashtagController::extractTags($val);
                if(count($tags)){
                    foreach ($tags as $tag){
                        $this->$key = str_replace($tag, '<a href="' . $this->getRoute($tag) .'" class="hashtag"> '.$tag.' </a>', $this->$key);
                    }
                }
            }
        }

        return $this;
    }

    public function popularTags($category): mixed{
        return Hashtag::where('lang', '=', $this->_lang)->whereHas('tagsRel', function ($query) use($category){
            $query->where('category', 'LIKE', '%'.$category.'%')->where('parent', null);
        })->orderBy('clicks', 'DESC')->take(6)->get();
    }
}
