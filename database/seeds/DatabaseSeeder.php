<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    	factory(App\backend\categorys::class,5)->create();
        // $this->call(UserSeeder::class);
    }
}
