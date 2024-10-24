<?php

namespace App\Http\Controllers\PublicPart\MyProfile;

use App\Http\Controllers\Controller;
use App\Models\Episodes\Episode;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MyProgressController extends Controller{
    protected string $_path = 'public-part.app.my-profile.progress.';

    public function myProgress(): View{
        $lastWatched = Episode::where('id', '=', 9)->first();

        return view($this->_path . 'progress', [
            'lastWatched' => $lastWatched
        ]);
    }
}
