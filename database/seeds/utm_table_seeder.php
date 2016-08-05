<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class utm_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
	        DB::table('utm')->insert([
	            'utm_name' => 'utm_content',
	            'utm_value' => 'kitten',
	            'content_id' => 1,
	            'block_id' => 1
	        ]);
            DB::table('utm')->insert([
                'utm_name' => 'utm_content',
                'utm_value' => 'kitten',
                'content_id' => 4,
                'block_id' => 2
            ]);
    
    }
}
