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
    	$faker = Faker::create();
        foreach (range(1, 5) as $index) {
	        DB::table('utm')->insert([
	            'utm_name' => 'utm_source',
	            'utm_value' => $faker->word,
	            'content_id' => $faker->numberBetween(1, 10),
	            'block_id' => 1
	        ]);
        }
    }
}
