<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class field_answer_table_seeder extends Seeder
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
	        DB::table('field_answers')->insert([
	            'answer' => $faker->sentence($nbWords = 3),
	            'form_answer_id' => 1,
	            'field_id' => $index,
	        ]);
        }

        foreach (range(1, 3) as $index) {
	        DB::table('field_answers')->insert([
	            'answer' => $faker->sentence($nbWords = 3),
	            'form_answer_id' => 2,
	            'field_id' => $index + 3,
	        ]);
        }

        foreach (range(1, 3) as $index) {
	        DB::table('field_answers')->insert([
	            'answer' => $faker->sentence($nbWords = 3),
	            'form_answer_id' => 3,
	            'field_id' => $index + 6,
	        ]);
        }
    }
}
