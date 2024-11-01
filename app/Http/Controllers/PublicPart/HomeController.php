<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Episodes\Episode;
use App\Models\Other\Blog\Blog;
use App\Models\Other\FAQ;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller{
    protected string $_path = 'public-part.app.home.';
    protected int $_number_of_posts = 4;

    public function home(): View{
        return view($this->_path . 'home', [
            'episodes' => Episode::orderBy('id', 'DESC')->take(6)->get(),
            'faqs' => FAQ::get(),
            'posts' => Blog::where('published', '=', 1)->orderBy('id', 'DESC')->take($this->_number_of_posts)->get()
        ]);
    }
}
