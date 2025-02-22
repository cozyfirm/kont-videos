<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('video:update-video-progress', function () {
    // You can call the handle method of your command class
    (new \App\Console\Commands\Videos\updateVideoProgress)->handle();
})->purpose('Update video progress');

Artisan::command('users:generate-usernames', function () {
    // You can call the handle method of your command class
    (new \App\Console\Commands\Users\GenerateUsernames())->handle();
})->purpose('Generate usernames from emails');

Artisan::command('queue:send-queued-notifications', function () {
    // You can call the handle method of your command class
    (new \App\Console\Commands\Queue\SendQueuedNotifications())->handle();
})->purpose('Send queued notifications to users over email');
