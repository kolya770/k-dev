<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('u_t_m_values', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value');
            $table->string('utm_value');
            $table->string('type');
            $table->integer('mark_id')->unsigned()->index();
            $table->foreign('mark_id')->references('id')->on('u_t_m_marks')->onDelete('cascade');
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
        Schema::drop('values');
    }
}
