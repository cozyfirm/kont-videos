<?php

namespace App\Http\Controllers\PublicPart\MyProfile;

use App\Http\Controllers\Controller;
use App\Models\Core\Country;
use App\Models\Episodes\EpisodeActivity;
use App\Models\Episodes\MyNote;
use App\Models\Episodes\Review;
use App\Models\User;
use App\Traits\Http\ResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use const http\Client\Curl\AUTH_ANY;

class MyProfileController extends Controller{
    use ResponseTrait;
    protected string $_path = 'public-part.app.my-profile.';

    public function profile(): View{
        return view($this->_path . 'my-profile', [
            'countries' => Country::orderBy('name_ba')->get()->pluck('name_ba', 'id')->prepend('Odaberite državu', ''),
            'myProfile' => true
        ]);
    }

    /**
     * Update basic user data
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse{
        try{
            Auth::user()->update([
                'name' => $request->name,
                'username' => $request->username,
                'phone' => $request->phone,
                'birth_date' => Carbon::parse($request->birth_date)->format('Y-m-d'),
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country
            ]);

            return $this->jsonSuccess(__('Uspješno ažurirano!'), route('public.my-profile'));
        }catch (\Exception $e){
            return $this->jsonError('3000', __('Greška prilikom ažuriranja podataka'));
        }
    }
    /**
     * Update user image
     * @param Request $request
     * @return RedirectResponse
     */
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

    /**
     * Change user password
     * @return View
     */
    public function changePassword(): View{
        return view($this->_path . 'change-password');
    }
    public function updatePassword(Request $request): JsonResponse{
        try{
            if($request->password != $request->repeat) return $this->jsonError('3002', __('Lozinke se ne podudaraju!'));
            else{
                Auth::user()->update([
                    'password' => Hash::make($request->password)
                ]);
            }

            return $this->jsonSuccess(__('Uspješno ažurirano!'), route('public.my-profile'));
        }catch (\Exception $e){
            return $this->jsonError('3000', __('Greška prilikom ažuriranja podataka'));
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function updateNotificationsStatus(Request $request): JsonResponse{
        try{
            User::where('id', '=', Auth::user()->id)->update([
                'notifications' => ($request->status == 'true')
            ]);

            return $this->jsonSuccess(__('Uspješno ažurirano!'), route('public.my-profile'));
        }catch (\Exception $e){
            return $this->jsonError('3000', __('Greška prilikom ažuriranja podataka'));
        }
    }

    /**
     * Remove user profile and all other user data
     *
     * @return RedirectResponse
     */
    public function removeProfile(): RedirectResponse{
        $user_id = Auth::user()->id;

        $user = User::where('id', '=', $user_id)->first();
        EpisodeActivity::where('user_id', '=', $user_id)->delete();
        Review::where('user_id', '=', $user_id)->delete();
        MyNote::where('user_id', '=', $user_id)->delete();

        Auth::logout();

        $user->delete();

        return redirect()->route('public.home');
    }
}
