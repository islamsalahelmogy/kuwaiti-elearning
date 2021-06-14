<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLevelToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            
            $table->unsignedBigInteger('level_id')->after('teacher_id')->nullable();

            $table->foreign('level_id')
            ->references('id')
            ->on('levels');
        });

        Schema::table('contents', function (Blueprint $table) {
            
            $table->unsignedBigInteger('level_id')->after('teacher_id')->nullable();

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
        Schema::table('activities', function (Blueprint $table) {
            $table->dropColumn('level_id');
        });

        Schema::table('contents', function (Blueprint $table) {
            $table->dropColumn('level_id');
        });
    }
}
