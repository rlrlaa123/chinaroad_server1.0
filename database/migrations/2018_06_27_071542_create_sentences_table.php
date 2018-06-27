<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('conversation_id')->unsigned()->index();
            $table->string('type');
            $table->string('chinese_c');
            $table->string('chinese_e');
            $table->string('korean');
            $table->string('audio')->nullable();
            $table->timestamps();

            $table->foreign('conversation_id')->references('id')->on('conversations')
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
        Schema::dropIfExists('sentences');
    }
}
