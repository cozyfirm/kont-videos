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
        Schema::create('__keywords', function (Blueprint $table) {
            $table->id();

            $table->string('type', '200');
            $table->string('name', '200');
            $table->text('description')->nullable();
            $table->string('value', '50')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('__keywords');
    }
};
