<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->string('answer');
            $table->string('attachment');
            $table->enum('attach_type',['text','image']);
            $table->enum('correct_answer',['true','false']);
            $table->unsignedBigInteger('question_id')->nullable();
            $table->timestamps();

            $table->foreign('question_id')
            ->references('id')
            ->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
