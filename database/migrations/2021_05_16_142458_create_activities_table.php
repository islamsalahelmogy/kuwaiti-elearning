<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('topic_id')->nullable();
            $table->unsignedBigInteger('level_id')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->unsignedBigInteger('level_id')->nullable();
            $table->timestamps();

            $table->foreign('topic_id')
            ->references('id')
            ->on('topics');

            $table->foreign('teacher_id')
            ->references('id')
            ->on('teachers');

            $table->foreign('level_id')
            ->references('id')
            ->on('levels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
