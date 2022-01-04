<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelationQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question', function (Blueprint $table) {
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
        Schema::table('question', function (Blueprint $table) {
            $table->dropForeign('question_survey_id_foreign');
        });

        Schema::table('question', function (Blueprint $table) {
            $table->unsignedBigInteger('survey_id')->change();
        });
    }
}
