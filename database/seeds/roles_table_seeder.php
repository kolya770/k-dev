<?php

use Illuminate\Database\Seeder;
use App\Role;

class roles_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/*
    	 * Я знаю, что так никто не делает, но 
    	 * по-другому оно не работает, и я не знаю, почему. 
    	 */
        $root = new Role();
        $root->name = 'root';
        $root->slug = 'root';

	    $root->save();

	    $admin = new Role();
        $admin->name = 'admin';
        $admin->slug = 'admin';

	    $admin->save();

	    $user = new Role();
        $user->name = 'user';
        $user->slug = 'user';

	    $user->save();
    }
}
