<?php

namespace App\Http\Controllers\PublicPart\MyProfile;

use App\Http\Controllers\Controller;
use App\Models\Core\Country;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MyProfileController extends Controller{
    protected string $_path = 'public-part.app.my-profile.';

    public function profile(): View{
        return view($this->_path . 'my-profile', [
            'countries' => Country::orderBy('name_ba')->get()->pluck('name_ba', 'id')
        ]);
    }
}
