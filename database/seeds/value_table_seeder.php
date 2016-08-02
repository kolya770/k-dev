<?php

use Illuminate\Database\Seeder;

class value_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('u_t_m_values')->insert([
	            'value' => 'KITTENS',
	            'mark_id' => '1',
	            'utm_value' => 'kittens',
	            'type' => 'text' 
	    ]);
	    DB::table('u_t_m_values')->insert([
	            'value' => 'img/kat.jpg',
	            'mark_id' => '1',
	            'utm_value' => 'kittens',
	            'type' => 'image' 
	    ]);
    }
}
