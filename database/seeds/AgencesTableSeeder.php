<?php

use Illuminate\Database\Seeder;

class AgencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agences')->insert([
            'name' => 'Direction Général',
            'wilaya' => 'constantine',
            'adresse' => 'cité',
            'tel'=> '013245987',
            'caisse' => 0,
            'banque' => 0
        ]);
    }
}
