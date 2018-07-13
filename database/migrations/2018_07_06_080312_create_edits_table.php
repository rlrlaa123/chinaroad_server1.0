<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edits', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('level');
            $table->string('image');
            $table->string('question_ko');
            $table->string('question_audio_ko')->nullable();
            $table->string('answer_ko')->nullable();
            $table->string('answer_audio_ko')->nullable();
            $table->string('question_ch');
            $table->string('question_audio_ch')->nullable();
            $table->string('answer_ch')->nullable();
            $table->string('answer_audio_ch')->nullable();
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
        Schema::dropIfExists('edits');
    }
}
