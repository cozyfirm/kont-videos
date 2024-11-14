<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Core\Keyword;
use App\Models\Episodes\Episode;
use App\Models\Other\Blog\Blog;
use App\Models\Other\FAQ;
use App\Models\Other\Page;
use App\Traits\Common\HashtagTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller{
    use HashtagTrait;
    protected string $_path = 'public-part.app.home.';
    protected string $_pages_path = 'public-part.app.pages.single-pages.';
    protected int $_number_of_posts = 4;

    public function home(): View{
        return view($this->_path . 'home', [
            'episodes' => Episode::where('status', '!=', 2)->orderBy('id', 'DESC')->take(6)->get(),
            'faqs' => FAQ::get(),
            'posts' => Blog::where('published', '=', 1)->orderBy('id', 'DESC')->take($this->_number_of_posts)->get()
        ]);
    }

    public function getPage($page): View{
        return view($this->_pages_path . 'page', [
            'categories' => Keyword::where('type', 'blog_category')->get(),
            'popular' => Blog::take($this->_number_of_posts)->get(),
            'popularTags' => $this->popularTags('blog'),
            'page' => $page
        ]);
    }
    public function aboutUs(): View{
        return $this->getPage(Page::where('id', '=', 1)->first());
    }
    public function impressum(): View{
        return $this->getPage(Page::where('id', '=', 2)->first());
    }
    public function terms(): View{
        return $this->getPage(Page::where('id', '=', 3)->first());
    }
    public function privacy(): View{
        return $this->getPage(Page::where('id', '=', 4)->first());
    }
}
