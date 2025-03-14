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
        Schema::create('notifications__queue', function (Blueprint $table) {
            $table->id();

            $table->integer('model_id');
            $table->string('type', '50')->default('new_episode');
            $table->integer('sent')->default(0);
            $table->integer('total')->default(0);
            $table->tinyInteger('finished')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications__queue');
    }
};
