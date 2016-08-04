<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class block_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('blocks')->insert([
	            'name' => 'header',
                'utm_content_id' => 1,
	            'content_id' => 1,
	            'group_id' => 1
	        ]);
    }
}
