<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->integer('form_id')->unsigned()->index();
            $table->foreign('form_id')
                    ->references('id')
                    ->on('forms')
                    ->onDelete('cascade');
            $table->integer('author_id')->unsigned()->index();
            $table->foreign('author_id')
                    ->references('id')
                    ->on('users')
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
        Schema::drop('form_answers');
    }
}
