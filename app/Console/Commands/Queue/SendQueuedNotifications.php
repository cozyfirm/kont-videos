<?php

namespace App\Console\Commands\Queue;

use App\Mail\Episodes\NotifyUser;
use App\Models\Episodes\Episode;
use App\Models\User;
use App\Models\Users\Notifications\NotificationQueue;
use App\Models\Users\Notifications\NotificationQueueUsers;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendQueuedNotifications extends Command{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'queue:send-queued-notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send queued notifications to users over an email!';

    protected function episodeNotifications(): void{
        // $queue = NotificationQueue::where('type', '=', 'new_episode')->whereColumn('sent', '!=', 'total')->get();
        $queue = NotificationQueue::where('type', '=', 'new_episode')->where('finished', '=', 0)->get();

        foreach ($queue as $q){
            if($q->sent == 0){
                /** First user (where('role', '=', 'user')->) */
                $user = User::where('notifications', '=', 1)->orderBy('id')->first();
            }else{
                $lastUser = NotificationQueueUsers::where('queue_id', '=', $q->id)->orderBy('id', 'DESC')->first();
                if($lastUser){
                    $user = User::where('id', '>', $lastUser->user_id)->where('notifications', '=', 1)->orderBy('id')->first();
                }else $user = null;
            }

            /** @var $user; Test email sending on specific user */
            // $user = User::where('id', '=', 1)->first();

            if(!$user){
                $q->update(['finished' => 1]);
            }else{
                try{
                    /** Send an email */
                    $episode = Episode::where('id', '=', $q->model_id)->first();

                    /** Send an email */
                    Mail::to($user->email)->send(new NotifyUser($user->username, $user->api_token, $episode->slug, $episode->title, $episode->description, $episode->presenterRel->name, $episode->presenterRel->about));

                    /** Create history info */
                    NotificationQueueUsers::create([
                        'queue_id' => $q->id,
                        'user_id' => $user->id,
                        'status' => 1
                    ]);
                }catch (\Exception $e){
                    NotificationQueueUsers::create([
                        'queue_id' => $q->id,
                        'user_id' => $user->id,
                        'status' => 0
                    ]);
                }

                $q->update(['sent' => ($q->sent + 1)]);
            }
        }
    }

    /**
     * Execute the console command.
     */
    public function handle(): void{
        /**
         *  Send notifications for new episodes
         */
        $this->episodeNotifications();
    }
}
