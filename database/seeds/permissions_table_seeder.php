<?php

use Illuminate\Database\Seeder;

class permissions_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
	            'name' => 'createPost',
	            'slug' => 'createPost',
	    ]);

	    DB::table('permissions')->insert([
	            'name' => 'deletePost',
	            'slug' => 'deletePost',
	    ]);
    }
}
