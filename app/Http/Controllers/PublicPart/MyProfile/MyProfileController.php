<?php

namespace App\Http\Controllers\PublicPart\MyProfile;

use App\Http\Controllers\Controller;
use App\Models\Core\Country;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MyProfileController extends Controller{
    protected string $_path = 'public-part.app.my-profile.';

    public function profile(): View{
        return view($this->_path . 'my-profile', [
            'countries' => Country::orderBy('name_ba')->get()->pluck('name_ba', 'id')
        ]);
    }

    public function updateImage(Request $request): RedirectResponse{
        try{
            $file = $request->file('photo_uri');
            $ext = strtolower(pathinfo($file->getClientOriginalName(),PATHINFO_EXTENSION));

            if($ext != 'png' and $ext != 'jpg' and $ext != 'jpeg') return back()->with('error', __('Format slike nije podržan!'));

            $name = md5($file->getClientOriginalName().time()).'.'.$ext;
            $file->move(public_path('files/images/public-part/users'), $name);

            /* Update file name */
            User::where('id', '=', Auth::user()->id)->update(['photo_uri' => $name]);
        }catch (\Exception $e){
            return back()->with('error', __('Desila se greška. Molimo pokušajte ponovo!'));
        }

        return back();
    }
}
