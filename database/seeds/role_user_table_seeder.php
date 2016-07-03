<?php

use Illuminate\Database\Seeder;

class role_user_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     * Seed is made to give to user with 'root' username root permissions 
     * etc.
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->insert([
			'user_id' => '1',
            'role_id' => '1',
		]);
		DB::table('role_user')->insert([
            'user_id' => '2',
	        'role_id' => '2',
		]);
		
		DB::table('role_user')->insert([
            'user_id' => '3',
            'role_id' => '3',
	    ]);	
    }
}
