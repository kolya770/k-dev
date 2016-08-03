<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class block_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('blocks')->insert([
	            'name' => 'header',
	            'content_id' => 1,
	            'group_id' => 1
	        ]);
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
	        DB::table('blocks')->insert([
	            'name' => $faker->word,
	            'content_id' => $faker->numberBetween(1, 10),
	            'group_id' => $faker->numberBetween(1, 4)
	        ]);
        }
    }
}
