<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizAttemptsQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_attempts_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_attampts_id')->constrained('quiz_attempts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('question_id')->constrained('questions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('answer_id')->constrained('answers')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('is_correct')->default('0');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_attempts_questions');
    }
}
