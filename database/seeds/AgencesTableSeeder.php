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
            'name' => 'ADMINISTRATEUR',
            'wilaya' => 'ANABA',
            'adresse' => 'cité ANABA',
            'tel' => '000000000',
            'caisse' => 0,
            'banque' => 0
        ]);
        DB::table('agences')->insert([
            'name' => 'CIRTA',
            'wilaya' => 'constantine',
            'adresse' => 'cité cirta centre vilel cne',
            'tel'=> '013215987',
            'caisse' => 0,
            'banque' => 0
        ]);
        DB::table('agences')->insert([
            'name' => 'EL KHROUB',
            'wilaya' => 'constantine',
            'adresse' => 'cité el khroube ',
            'tel'=> '013455987',
            'caisse' => 0,
            'banque' => 0
        ]);
    }
}
