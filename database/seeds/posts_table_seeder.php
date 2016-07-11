<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class posts_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
        foreach (range(1, 16) as $index) {
	        DB::table('posts')->insert([
	            'title' => $faker->sentence,
	            'content' => $faker->paragraph,
	            'category_id' => $faker->numberBetween(1, 3),
                'page_id' => $index / 4 + 1,
                'preview' => 'img/blog.png'
	        ]);
        }
    }
}
