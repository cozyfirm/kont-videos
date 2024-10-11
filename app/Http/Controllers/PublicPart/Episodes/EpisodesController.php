<?php

namespace App\Http\Controllers\PublicPart\Episodes;

use App\Http\Controllers\Controller;
use App\Models\Episodes\Episode;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EpisodesController extends Controller{
    protected string $_path = 'public-part.app.episodes.';

    public function episodes(): View{
        return view($this->_path . 'preview-all', [
            'episodes' => Episode::orderBy('id', 'DESC')->take(6)->get(),
            'all_episodes' => true
        ]);
    }

    public function preview($slug): View{
        return view($this->_path . 'preview', [
            'episode' => Episode::where('slug', '=', $slug)->first()
        ]);
    }

    public function previewVideo(): View{
        return view($this->_path . 'preview-video');
    }

    public function testVideo(): View{
        return view($this->_path . 'test-video');
    }
}
