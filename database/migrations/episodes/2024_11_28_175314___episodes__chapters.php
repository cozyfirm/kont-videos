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
        Schema::create('episodes__chapters', function (Blueprint $table) {
            $table->id();

            $table->integer('video_id');
            $table->string('title');
            $table->text('description')->nullable();

            /* Time when chapter starts */
            $table->integer('hour');
            $table->integer('min');
            $table->integer('sec');
            $table->integer('time');
            $table->integer('time_end')->default(0);

            /* Additional info */
            $table->integer('no')->default(1);
            $table->boolean('last')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes__chapters');
    }
};
