<?php

use Illuminate\Database\Seeder;

class AdministrateurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrateur')->insert([

            'nom' => 'مدير',
            'prenom' => 'تجريبي',
            'nom_fr' => 'admin',
            'prenom_fr' => 'test',
            'adresse' => '0000',
            'email' => 'administrateur@esi-sba.dz',
            'telephone' => '07700000000',
            'sexe' => 'ذكر',
            'date_n' => '1980-01-01',
            'lieu_n' => 'ESI-SBA',
            'password' => bcrypt('123456'),
        ]);
    }
}
