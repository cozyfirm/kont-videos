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
        Schema::create('episodes__notes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('episode_id');
            $table->foreign('episode_id')
                ->references('id')
                ->on('episodes')
                ->onDelete('cascade');
            $table->unsignedBigInteger('video_id');
            $table->foreign('video_id')
                ->references('id')
                ->on('episodes__videos')
                ->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('time');
            $table->text('note');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes__notes');
    }
};
