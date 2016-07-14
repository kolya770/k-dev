<?php

use Illuminate\Database\Seeder;

class settings_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
	            'postsPerPage' => 5,
                'project_id' => 1
	    ]);
    }
}
