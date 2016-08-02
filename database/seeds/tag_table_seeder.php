<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class tag_table_seeder extends Seeder
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
	        DB::table('tags')->insert([
	            'tag_name' => $faker->word,
	        ]);
        }
    }
}
