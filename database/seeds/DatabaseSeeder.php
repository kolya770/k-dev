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
        $this->call(forms_table_seeder::class);
        $this->call(fields_table_seeder::class);
        $this->call(form_answer_table_seeder::class);
        $this->call(field_answer_table_seeder::class);
        $this->call(reviews_table_seeder::class);
        $this->call(projects_table_seeder::class);
        $this->call(tag_table_seeder::class);
        $this->call(post_tag_table_seeder::class);
        $this->call(comments_table_seeder::class);
        $this->call(settings_table_seeder::class);
        $this->call(image_table_seeder::class);
        $this->call(utm_table_seeder::class);
        $this->call(value_table_seeder::class);
    }
}
