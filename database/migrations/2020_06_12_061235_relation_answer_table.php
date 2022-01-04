<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelationAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answer', function (Blueprint $table) {
            $table->unsignedBigInteger('question_id')->change();
            $table->foreign('question_id')->references('id')
                ->on('question')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('survey_id')->change();
            $table->foreign('survey_id')->references('id')
                ->on('survey')
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
        Schema::table('answer', function (Blueprint $table) {
            $table->dropForeign('answer_question_id_foreign');
            $table->dropForeign('answer_survey_id_foreign');
        });

        Schema::table('answer', function (Blueprint $table) {
            $table->unsignedBigInteger('question_id')->change();
            $table->unsignedBigInteger('survey_id')->change();
        });
    }
}
