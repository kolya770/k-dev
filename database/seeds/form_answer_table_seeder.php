<?php

use Illuminate\Database\Seeder;
use App\Models\Form;
use Faker\Factory as Faker;

class form_answer_table_seeder extends Seeder
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
	        DB::table('form_answers')->insert([
	            'title' => Form::find($index)->title,
	            'form_id' => $index,
	            'user_id' => $faker->numberBetween(1, 3),
	        ]);
        }
    }
}
