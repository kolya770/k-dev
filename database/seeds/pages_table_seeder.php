<?php

use Illuminate\Database\Seeder;

class pages_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 4) as $index) {
	        DB::table('pages')->insert([
	            'number' => $index          
	        ]);
        }
    }
}
