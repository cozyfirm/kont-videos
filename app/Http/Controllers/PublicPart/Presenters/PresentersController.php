<?php

namespace App\Http\Controllers\PublicPart\Presenters;

use App\Http\Controllers\Controller;
use App\Models\Core\Keyword;
use App\Models\Other\Blog\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PresentersController extends Controller{
    protected string $_path = 'public-part.app.presenters.';
    protected int $_numberOfPopular = 4;

    public function index(): View{
        return view($this->_path . 'index', [
            'presenters' => User::where('role', '=', 'presenter')->get()
        ]);
    }
    public function preview($username): View{
        $presenter = User::where('username', '=', $username)->first();
        return view($this->_path . 'preview', [
            'presenters' => User::where('id', '!=', $presenter->id)->where('role', '=', 'presenter')->inRandomOrder()->take(4)->get(),
            'presenter' => $presenter,
            'categories' => Keyword::where('type', 'blog_category')->get(),
            'popular' => Blog::take($this->_numberOfPopular)->get(),
        ]);
    }
}
