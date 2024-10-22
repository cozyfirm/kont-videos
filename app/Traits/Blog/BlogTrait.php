<?php
namespace App\Traits\Blog;

use App\Models\Other\Blog\Blog;
use App\Traits\Common\CommonTrait;

trait BlogTrait{
    use CommonTrait;
    protected function postsByTitle($title) : string{
        try{
            $total = Blog::where('slug', '=', $title)->count();
            if($total == 0) return '';
            else return $total;
        }catch (\Exception $e){ return ''; }
    }
    public function getSlug($slug): string{
        $string = $this->generateSlug($slug);

        return ($string . ($this->postsByTitle($string)));
    }
}
