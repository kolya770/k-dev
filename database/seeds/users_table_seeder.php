<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class users_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('users')->insert([
	            'name' => 'root',
	            'email' => 'root@foo.com',
	            'password' => bcrypt('secret'),
	    ]);

	     DB::table('users')->insert([
	            'name' => 'admin',
	            'email' => 'admin@foo.com',
	            'password' => bcrypt('secret'),
	    ]);

	      DB::table('users')->insert([
	            'name' => 'user',
	            'email' => 'user@foo.com',
	            'password' => bcrypt('secret'),
	    ]);
    	
    }
}
