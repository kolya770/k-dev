<?php

use Illuminate\Database\Seeder;

class post_tag_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('post_tag')->insert([
			'post_id' => '1',
            'tag_id' => '1',
		]);
		DB::table('post_tag')->insert([
            'post_id' => '2',
	        'tag_id' => '2',
		]);
		
		DB::table('post_tag')->insert([
            'post_id' => '3',
            'tag_id' => '3',
	    ]);	
    }
}
