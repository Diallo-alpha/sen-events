<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganismeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organismes')->insert([
            [
                'nom' => 'Organisme A',
                'email' => 'OrganismeA@exemple.com',
                'adresse' => '123 Rue Principale',
                'telephone' => '763456789',
                'created_at' => now(),
            ],
            [
                'nom' => 'Organisme B',
                'email' => 'OrganismeB@exemple.com',
                'adresse' => '456 Rue Secondaire',
                'telephone' => '777654321',
                'password' => 'azertyuiop',
                'created_at' => now(),

            ],
            // Ajoutez d'autres organismes ici
        ]);
    }
}
