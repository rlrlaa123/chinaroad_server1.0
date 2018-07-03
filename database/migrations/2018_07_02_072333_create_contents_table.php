<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('classification_id')->unsigned()->index();
            $table->boolean('activate');
            $table->string('level');
            $table->string('image');
            $table->string('title_ko');
            $table->string('audio_ko');
            $table->string('contents_ko');
            $table->string('title_ch');
            $table->string('audio_ch');
            $table->string('contents_ch');
            $table->timestamps();

            $table->foreign('classification_id')->references('id')->on('classifications')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
