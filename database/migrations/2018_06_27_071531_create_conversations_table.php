<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->index();
            $table->string('name');
            $table->string('korean1')->nullable();
            $table->string('chinese_c1')->nullable();
            $table->string('chinese_e1')->nullable();
            $table->string('audio1')->nullable();
            $table->string('korean2')->nullable();
            $table->string('chinese_c2')->nullable();
            $table->string('chinese_e2')->nullable();
            $table->string('audio2')->nullable();
            $table->string('korean3')->nullable();
            $table->string('chinese_c3')->nullable();
            $table->string('chinese_e3')->nullable();
            $table->string('audio3')->nullable();
            $table->string('korean4')->nullable();
            $table->string('chinese_c4')->nullable();
            $table->string('chinese_e4')->nullable();
            $table->string('audio4')->nullable();
            $table->string('korean5')->nullable();
            $table->string('chinese_c5')->nullable();
            $table->string('chinese_e5')->nullable();
            $table->string('audio5')->nullable();
            $table->string('korean6')->nullable();
            $table->string('chinese_c6')->nullable();
            $table->string('chinese_e6')->nullable();
            $table->string('audio6')->nullable();
            $table->string('korean7')->nullable();
            $table->string('chinese_c7')->nullable();
            $table->string('chinese_e7')->nullable();
            $table->string('audio7')->nullable();
            $table->string('korean8')->nullable();
            $table->string('chinese_c8')->nullable();
            $table->string('chinese_e8')->nullable();
            $table->string('audio8')->nullable();
            $table->string('korean9')->nullable();
            $table->string('chinese_c9')->nullable();
            $table->string('chinese_e9')->nullable();
            $table->string('audio9')->nullable();
            $table->string('korean10')->nullable();
            $table->string('chinese_c10')->nullable();
            $table->string('chinese_e10')->nullable();
            $table->string('audio10')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('video1')->nullable();
            $table->string('video2')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')
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
        Schema::dropIfExists('conversations');
    }
}
