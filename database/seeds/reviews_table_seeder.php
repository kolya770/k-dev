<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class reviews_table_seeder extends Seeder
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
	        DB::table('reviews')->insert([
	            'author_name' => $faker->name,
	            'review' => $faker->sentence,
	            'author_job' => 'Google',
	            'preview' => '/img/ivan-ivanov.png'
	        ]);
        }
    }
}
