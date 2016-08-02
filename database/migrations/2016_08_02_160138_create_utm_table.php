<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utm', function (Blueprint $table) {
            $table->increments('id');
            $table->string('utm_name');
            $table->string('utm_value');
            $table->integer('content_id')->unsigned()->index();
            $table->foreign('content_id')->references('id')->on('content')->onDelete('cascade');
            $table->integer('block_id')->unsigned()->index();
            $table->foreign('block_id')->references('id')->on('blocks')->onDelete('cascade');
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
        //
    }
}
