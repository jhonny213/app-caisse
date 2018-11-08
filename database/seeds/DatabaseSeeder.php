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
        $this->call([AgencesTableSeeder::class, UsersTableSeeder::class, FournisseursTableSeeder::class, FournituresTableSeeder::class]);
    }
}
