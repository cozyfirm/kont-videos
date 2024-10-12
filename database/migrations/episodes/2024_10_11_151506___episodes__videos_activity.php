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
        Schema::create('episodes__activity', function (Blueprint $table) {
            $table->id();

            $table->integer('episode_id');
            $table->integer('video_id');
            $table->integer('user_id');
            $table->tinyInteger('finished')->default(0);
            $table->integer('time')->default(0);
            $table->string('progress')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes__activity');
    }
};
