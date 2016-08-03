<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class group_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('groups')->insert([
	            'name' => 'no_group'
	        ]);
        $faker = Faker::create();
        foreach (range(1, 4) as $index) {
	        DB::table('groups')->insert([
	            'name' => $faker->word,
	        ]);
        }
    }
}
