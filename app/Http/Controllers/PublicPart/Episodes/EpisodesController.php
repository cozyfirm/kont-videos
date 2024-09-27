<?php

namespace App\Http\Controllers\PublicPart\Episodes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EpisodesController extends Controller{
    protected string $_path = 'public-part.app.episodes.';

    public function episodes(): View{
        return view($this->_path . 'preview-all');
    }

    public function previewVideo(): View{
        return view($this->_path . 'preview');
    }
}
