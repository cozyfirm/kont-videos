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
        Schema::create('blog', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug', 200);
            $table->string('short_desc');
            $table->text('description');
            $table->integer('category')->default(0);

            $table->string('small_img')->nullable();
            $table->string('main_img')->nullable();
            $table->string('video')->nullable();

            $table->integer('created_by');
            $table->tinyInteger('published')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
