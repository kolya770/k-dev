<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class content_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('content')->insert([ //id = 1
                'value' => 'KITTENS',
                'type' => 'input'
            ]);
        DB::table('content')->insert([ //id = 2
	        	'value' => 'KIEVDEV',
	        	'type' => 'input'
	        ]);
        DB::table('content')->insert([ //id = 3
                'value' => 'none',
                'type' => 'image'
            ]);
		DB::table('content')->insert([ //id = 4
                'value' => 'img/kit.jpg',
                'type' => 'image'
            ]);
    }
}
