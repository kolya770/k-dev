<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class comments_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
	        DB::table('comments')->insert([
	            'name' => $faker->name,
	            'email' => $faker->email,
	            'comment' => $faker->paragraph,
	            'post_id' => $faker->numberBetween(1, 4)
	        ]);
        }
    }
}
