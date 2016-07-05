<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class fields_table_seeder extends Seeder
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
	        DB::table('fields')->insert([
	            'question' => $faker->sentence($nbWords = 3),
	            'form_id' => $index,
	        ]);
        }

        foreach (range(1, 3) as $index) {
	        DB::table('fields')->insert([
	            'question' => $faker->sentence($nbWords = 3),
	            'form_id' => $index,
	        ]);
        }

        foreach (range(1, 3) as $index) {
	        DB::table('fields')->insert([
	            'question' => $faker->sentence($nbWords = 3),
	            'form_id' => $index,
	        ]);
        }
    }
}
