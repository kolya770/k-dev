<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPageIdToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('page_id')-> unsigned() -> nullable();
            $table->foreign('page_id')
                ->references('id')->on('pages')
                ->onDelete('cascade');
        });   //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('posts', function (Blueprint $table) {
            $table->drop('page_id');
        });
    }
}
