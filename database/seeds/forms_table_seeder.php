<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class forms_table_seeder extends Seeder
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
	        DB::table('forms')->insert([
	            'title' => $faker->sentence($nbWords = 3),
	            'size' => 3,
	        ]);
        }
    }
}
