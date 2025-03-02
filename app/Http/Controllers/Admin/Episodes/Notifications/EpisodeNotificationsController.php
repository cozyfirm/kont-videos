<?php

namespace App\Http\Controllers\Admin\Episodes\Notifications;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Controller;
use App\Mail\Episodes\NotifyUser;
use App\Models\Episodes\Episode;
use App\Models\User;
use App\Models\Users\Notifications\NotificationQueue;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class EpisodeNotificationsController extends Controller{
    protected string $_path = 'admin.app.episodes.notifications.';

    /**
     * Create queue for notifications
     *
     * @param $slug
     * @return RedirectResponse
     */
    public function notifyUsers($slug): RedirectResponse{
        try{
            $episode = Episode::where('slug', '=', $slug)->with('presenterRel')->first();

            /* where('role', '=', 'user')-> */
            $total = User::where('notifications', '=', 1)->count();

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

    /**
     * Preview all queued notifications
     *
     * @return View
     */
    public function previewQueue(): View{
        $queue = NotificationQueue::where('id', '>', 0);
        $queue = Filters::filter($queue);

        $filters = [
            'title' => __('Model'),
            'sent' => __('Poslano obavijesti'),
            'total' => __('Ukupno za poslati')
        ];

        return view($this->_path . 'preview-queue', [
            'queue' => $queue,
            'filters' => $filters
        ]);
    }

    public function deleteQueue($id): RedirectResponse{
        NotificationQueue::where('id', '=', $id)->delete();

        return redirect()->route('system.admin.episodes.notifications.preview-queue');
    }
}
