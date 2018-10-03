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
            $table->string('video12')->nullable();
            $table->string('video13')->nullable();
            $table->string('video14')->nullable();
            $table->string('video15')->nullable();
            $table->string('video16')->nullable();
            $table->string('video17')->nullable();
            $table->string('video18')->nullable();
            $table->string('video19')->nullable();
            $table->string('video20')->nullable();
            $table->string('video21')->nullable();

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
            $table->dropColumn('video12');
            $table->dropColumn('video13');
            $table->dropColumn('video14');
            $table->dropColumn('video15');
            $table->dropColumn('video16');
            $table->dropColumn('video17');
            $table->dropColumn('video18');
            $table->dropColumn('video19');
            $table->dropColumn('video20');
            $table->dropColumn('video21');
        });
    }
}
