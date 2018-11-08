<?php

use Illuminate\Database\Seeder;

class FournituresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mytime = Carbon\Carbon::now();
        DB::table('fournitures')->insert([
            'libelle' => 'stylo',
            'desc' => 'vert, bleu, rouge, noir',
            'created_at' => $mytime,
            'updated_at' => $mytime,
            'agence_id' => 2,
        ]);
        DB::table('fournitures')->insert([
            'libelle' => 'Rame de papie A4',
            'desc' => 'Rame de papie A4',
            'created_at' => $mytime,
            'updated_at' => $mytime,
            'agence_id' => 2,
        ]);
        DB::table('fournitures')->insert([
            'libelle' => 'block note',
            'desc' => 'block note petite taille',
            'created_at' => $mytime,
            'updated_at' => $mytime,
            'agence_id' => 2,
        ]);
        DB::table('fournitures')->insert([
            'libelle' => 'stylo',
            'desc' => 'vert, bleu, rouge, noir',
            'created_at' => $mytime,
            'updated_at' => $mytime,
            'agence_id' => 3,
        ]);
        DB::table('fournitures')->insert([
            'libelle' => 'Rame de papie A4',
            'desc' => 'Rame de papie',
            'created_at' => $mytime,
            'updated_at' => $mytime,
            'agence_id' => 3,
        ]);
        DB::table('fournitures')->insert([
            'libelle' => 'block note',
            'desc' => 'block note petite taille',
            'created_at' => $mytime,
            'updated_at' => $mytime,
            'agence_id' => 3,
        ]);
    }
}
