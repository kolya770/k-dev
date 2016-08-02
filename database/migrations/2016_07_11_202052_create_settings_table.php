<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('postsPerPage');
            $table->integer('project_1_id')-> unsigned() -> nullable();
            $table->integer('project_2_id')-> unsigned() -> nullable();
            $table->integer('project_3_id')-> unsigned() -> nullable();
            $table->integer('post_id')-> unsigned() -> nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }
}
