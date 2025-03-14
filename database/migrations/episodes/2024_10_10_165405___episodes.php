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
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');
            $table->string('short_description');
            $table->text('description');

            $table->integer('status')->default(1);
            $table->integer('type')->default(0);

            /* Basically user id */
            $table->integer('presenter_id');

            $table->integer('image_id');
            $table->integer('video_id');
            $table->integer('language_id');
            $table->string('stars', 3)->default('1.0');

            $table->integer('created_by');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
