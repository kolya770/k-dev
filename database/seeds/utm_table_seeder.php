<?php

use Illuminate\Database\Seeder;

class utm_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('u_t_m_marks')->insert([
	            'mark' => 'utm_source'
	    ]);
	    DB::table('u_t_m_marks')->insert([
	            'mark' => 'utm_medium'
	    ]);
	    DB::table('u_t_m_marks')->insert([
	            'mark' => 'utm_term'
	    ]);
	    DB::table('u_t_m_marks')->insert([
	            'mark' => 'utm_content'
	    ]);
	    DB::table('u_t_m_marks')->insert([
	            'mark' => 'utm_campaign'
	    ]);
    }
}
