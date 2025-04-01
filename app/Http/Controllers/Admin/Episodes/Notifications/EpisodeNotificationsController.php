<?php

namespace App\Http\Controllers\Admin\Episodes\Notifications;

use App\Http\Controllers\Admin\Core\Filters;
use App\Http\Controllers\Controller;
use App\Mail\Episodes\NotifyUser;
use App\Models\Episodes\Episode;
use App\Models\User;
use App\Models\Users\Notifications\NotificationMessage;
use App\Models\Users\Notifications\NotificationQueue;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class EpisodeNotificationsController extends Controller{
    use ResponseTrait;
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

    public function newMessage(): View{
        return view($this->_path . 'new-message');
    }
    public function saveMessage(Request $request): JsonResponse{
        try{
            $message = NotificationMessage::create([
                'title' => $request->title,
                'body' => $request->body
            ]);

            /* where('role', '=', 'user')-> */
            $total = User::where('notifications', '=', 1)->count();

            NotificationQueue::create([
                'model_id' => $message->id,
                'type' => 'message',
                'total' => $total
            ]);

            return $this->jsonSuccess(__('Uspješno spašeno!'), route('system.admin.episodes.notifications.preview-queue'));
        }catch (\Exception $e){

        }
    }

    public function deleteQueue($id): RedirectResponse{
        NotificationQueue::where('id', '=', $id)->delete();

        return redirect()->route('system.admin.episodes.notifications.preview-queue');
    }
}
