<?php

use Illuminate\Database\Seeder;
use Caisse\Agence;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mytime = Carbon\Carbon::now();

            DB::table('users')->insert([
                'nom' => 'nahla',
                'prenom' => 'nina',
                'username' => 'nahla.nina',
                'groupe'=> 'Administrateur',
                'password' => Hash::make('000000'),
                'created_at' => $mytime,
                'updated_at' => $mytime,
                'agence_id' => 1
            ]);
            DB::table('users')->insert([
                'nom' => 'haddad',
                'prenom' => 'nacereddine',
                'username' => 'haddad.nacereddine',
                'groupe'=> 'Directeur',
                'password' => Hash::make('000000'),
                'created_at' => $mytime,
                'updated_at' => $mytime,
                'agence_id' => 2
            ]);
            DB::table('users')->insert([
                'nom' => 'gest',
                'prenom' => 'test',
                'username' => 'gest.test',
                'groupe'=> 'Gestionnaire',
                'password' => Hash::make('000000'),
                'created_at' => $mytime,
                'updated_at' => $mytime,
                'agence_id' => 2
            ]);
            DB::table('users')->insert([
                'nom' => 'haddad',
                'prenom' => 'nacereddine',
                'username' => 'dir.dir',
                'groupe'=> 'Directeur',
                'password' => Hash::make('000000'),
                'created_at' => $mytime,
                'updated_at' => $mytime,
                'agence_id' => 3
            ]);
            DB::table('users')->insert([
                'nom' => 'gest',
                'prenom' => 'test',
                'username' => 'gest.gest',
                'groupe'=> 'Gestionnaire',
                'password' => Hash::make('000000'),
                'created_at' => $mytime,
                'updated_at' => $mytime,
                'agence_id' => 3
            ]);
    }
}
