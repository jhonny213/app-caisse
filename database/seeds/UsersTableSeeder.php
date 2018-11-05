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
        $agence = Agence::all();
        foreach ($agence as $val){
            $id = $val['id'];
        }
        $mytime = Carbon\Carbon::now();
        if($id > 0){
            DB::table('users')->insert([
                'nom' => 'nahla',
                'prenom' => 'nina',
                'username' => 'nahla.nina',
                'groupe'=> 'Administrateur',
                'password' => Hash::make('0000'),
                'created_at' => $mytime,
                'updated_at' => $mytime,
                'agence_id' => $id
            ]);
        }
    }
}
