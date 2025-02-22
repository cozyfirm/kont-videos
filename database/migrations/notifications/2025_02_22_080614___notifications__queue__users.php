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
        Schema::create('notifications__queue_users', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('queue_id');
            $table->foreign('queue_id')
                ->references('id')
                ->on('notifications__queue')
                ->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            /**
             *  0 - Not sent
             *  1 - Email sent
             */
            $table->integer('status')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications__queue_users');
    }
};
