<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('answer');
            $table->integer('form_answer_id')->unsigned()->index();
            $table->foreign('form_answer_id')
                ->references('id')
                ->on('form_answers')
                ->onDelete('cascade');
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
        Schema::drop('field_answers');
    }
}
