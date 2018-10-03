<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnVideoInConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conversations', function (Blueprint $table) {
            $table->string('video4')->nullable();
            $table->string('video5')->nullable();
            $table->string('video6')->nullable();
            $table->string('video7')->nullable();
            $table->string('video8')->nullable();
            $table->string('video9')->nullable();
            $table->string('video10')->nullable();
            $table->string('video11')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conversations', function (Blueprint $table) {
            $table->dropColumn('video4');
            $table->dropColumn('video5');
            $table->dropColumn('video6');
            $table->dropColumn('video7');
            $table->dropColumn('video8');
            $table->dropColumn('video9');
            $table->dropColumn('video10');
            $table->dropColumn('video11');
        });
    }
}
