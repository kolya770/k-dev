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
        DB::table('content')->insert([
	        	'value' => 'KIEVDEV',
	        	'type' => 'input'
	        ]);
		$faker = Faker::create();
        foreach (range(1, 5) as $index) {
	        DB::table('content')->insert([
	        	'value' => $faker->paragraph,
	        	'type' => 'textarea'
	        ]);
        }
        foreach (range(1, 5) as $index) {
	        DB::table('content')->insert([
	        	'value' => 'img/1.jpg',
	        	'type' => 'image'
	        ]);
        }
    }
}
