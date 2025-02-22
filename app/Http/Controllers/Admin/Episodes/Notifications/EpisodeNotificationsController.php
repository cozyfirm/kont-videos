<?php

namespace App\Http\Controllers\Admin\Episodes\Notifications;

use App\Http\Controllers\Controller;
use App\Mail\Episodes\NotifyUser;
use App\Models\Episodes\Episode;
use App\Models\User;
use App\Models\Users\Notifications\NotificationQueue;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EpisodeNotificationsController extends Controller{
    public function notifyUsers($slug): RedirectResponse{
        try{
            $episode = Episode::where('slug', '=', $slug)->with('presenterRel')->first();

            $total = User::where('role', '=', 'user')->count();

            /**
             *  Create scheduled job
             */
            $queue = NotificationQueue::where('model_id', '=', $episode->id)->where('type', '=', 'new_episode')->first();
            if($queue) return back()->with('success', __('Email already scheduled. Sent to ' . $queue->sent . ' users!'));

            NotificationQueue::create([
                'model_id' => $episode->id,
                'total' => $total
            ]);

            return back()->with('success', __('Email successfully scheduled. Total users:  ' . $total . '.'));
        }catch (\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }
}
