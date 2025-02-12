<?php

namespace App\Http\Controllers\Admin\Episodes\Notifications;

use App\Http\Controllers\Controller;
use App\Mail\Episodes\NotifyUser;
use App\Models\Episodes\Episode;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EpisodeNotificationsController extends Controller{
    public function notifyUsers($slug): RedirectResponse{
        try{
            $episode = Episode::where('slug', '=', $slug)->with('presenterRel')->first();
            $users = User::get();

            $total = 0;

            foreach ($users as $user) {
                try{
                    Mail::to($user->email)->send(new NotifyUser($user->username, $slug, $episode->title, $episode->description, $episode->presenterRel->name, $episode->presenterRel->about));

                    $total ++;
                }catch (\Exception $e){

                }
            }

            return back()->with('success', __('Email uspješno poslan na ' . $total . " email adresa"));
        }catch (\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }
}
