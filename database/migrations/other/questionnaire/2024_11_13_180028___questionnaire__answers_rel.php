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
        Schema::create('questionnaire__answers_rel', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('qa_id');
            $table->foreign('qa_id')
                ->references('id')
                ->on('questionnaire__answers')
                ->onDelete('cascade');

            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')
                ->references('id')
                ->on('questionnaire')
                ->onDelete('cascade');

            /* Nullable only for text */
            $table->text('answer')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionnaire__answers_rel');
    }
};
