<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class projects_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 4) as $index) {
	        DB::table('projects')->insert([
	            'title' => $faker->word,
	            'brief' => $faker->paragraph,
	            'description' => $faker->paragraph,
                'main_image_id' => $faker->numberBetween(1, 4)
	        ]);
        }
    }
}
