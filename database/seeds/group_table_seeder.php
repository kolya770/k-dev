<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class group_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('groups')->insert([
	            'name' => 'First screen'
	        ]);
        
    }
}
