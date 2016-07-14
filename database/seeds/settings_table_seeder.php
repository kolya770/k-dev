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
                'project_1_id' => 1,
                'project_2_id' => 2,
                'project_3_id' => 3
	    ]);
    }
}
