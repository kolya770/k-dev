<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(users_table_seeder::class);
        $this->call(roles_table_seeder::class);
        $this->call(categories_table_seeder::class);
        $this->call(permissions_table_seeder::class);
        $this->call(posts_table_seeder::class);
        $this->call(role_user_table_seeder::class);
    }
}
