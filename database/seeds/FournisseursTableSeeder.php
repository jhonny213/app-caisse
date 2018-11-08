<?php

use Illuminate\Database\Seeder;

class FournisseursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mytime = Carbon\Carbon::now();
        DB::table('fournisseurs')->insert([
            'agence_id' => 2,
            'name' => 'haddad nacereddine',
            'reson_social' => 'cirta',
            'adresse' => 'cité djebel el ouahch',
            'tel'=> '0672636366',
            'site_web' => 'www.haddad.com',
            'email' => 'haddadnacereddine@gmail.com',

            'created_at' => $mytime,
            'updated_at' => $mytime

        ]);
        DB::table('fournisseurs')->insert([
            'agence_id' => 2,
            'name' => 'nahla nina ',
            'reson_social' => 'anaba fournitures',
            'adresse' => 'bouni anaba',
            'tel'=> '0784155785',
            'site_web' => 'www.anaba.com',
            'email' => 'anaba@gmail.com',
            'created_at' => $mytime,
            'updated_at' => $mytime
        ]);
        DB::table('fournisseurs')->insert([
            'agence_id' => 3,
            'name' => 'mahmoud mehdi',
            'reson_social' => 'mahmoud mehdi fournitures',
            'adresse' => 'cité djebel el ouahchzidia',
            'tel'=> '0572718676',
            'site_web' => 'www.mahmoud.com',
            'email' => 'mahmoud.mehdi@gmail.com',
            'created_at' => $mytime,
            'updated_at' => $mytime
        ]);
        DB::table('fournisseurs')->insert([
            'agence_id' => 3,
            'name' => 'amine lotfi',
            'reson_social' => 'amine lotfi fournitures',
            'adresse' => 'cité zouaghi',
            'tel'=> '0572658676',
            'site_web' => 'www.amine.com',
            'email' => 'amine@gmail.com',
            'created_at' => $mytime,
            'updated_at' => $mytime
        ]);
    }
}
