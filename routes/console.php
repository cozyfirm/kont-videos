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
