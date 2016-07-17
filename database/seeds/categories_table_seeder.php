<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class categories_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
    	$faker = Faker::create();
        foreach (range(1, 3) as $index) {
	        DB::table('categories')->insert([
	            'title' => $faker->word,
	        ]);
        }
    }
}