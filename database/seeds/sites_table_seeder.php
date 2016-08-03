<?php

use Illuminate\Database\Seeder;

class sites_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sites')->insert([
	            'name' => 'kiev-dev',
                'url' => 'kievdev.com',
                'description' => 'kievdev',
                'keywords' => 'web, sites',
                'copyright' => 'Kievdev Co.',
                'isActive' => '1'
	    ]);
    }
}
