<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('episodes__videos', function (Blueprint $table) {
            $table->id();

            $table->integer('episode_id');
            $table->string('title');

            /* Video or trailer */
            $table->string('category', 20)->default('video');
            $table->text('description')->nullable();

            $table->string('library_id');
            $table->string('video_id');

            $table->string('duration')->default(0);        // Duration of video h:i:s
            $table->string('duration_sec')->default(0);    // Duration of video in seconds

            $table->integer('views')->default(0);
            $table->integer('average_watch_time')->default(0);
            $table->integer('total_watch_time')->default(0);
            $table->integer('total_loads')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes__videos');
    }
};
