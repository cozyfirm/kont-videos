<?php

namespace App\Http\Controllers\PublicPart\MyProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MyProgressController extends Controller{
    protected string $_path = 'public-part.app.my-profile.progress.';

    public function myProgress(): View{
        return view($this->_path . 'progress', [

        ]);
    }
}
