<?php

use Illuminate\Database\Seeder;

class image_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 16) as $index) {
	        DB::table('images')->insert([
	            'project_id' => ceil($index/4),
	            'path' => '/img/portfolio-item.png'          
	        ]);
        }
    }
}
