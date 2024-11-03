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
        Schema::create('hashtags__rel', function (Blueprint $table) {
            $table->id();

            /*
             *  Connection to main hash tag table
             */
            $table->bigInteger('tag_id')->unsigned();
            $table->foreign('tag_id')
                ->references('id')
                ->on('hashtags')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            /*
             *  Tag could be connected to device or to blog post
             */
            $table->string('category', '30'); // It can be: 1. Blog post, 2. Products
            /*
             *  Post id: Device ID or post ID
             */
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('parent')->nullable();
            /*
             *  Name of table column
             */
            $table->string('t_column', 100);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hashtags__rel');
    }
};
