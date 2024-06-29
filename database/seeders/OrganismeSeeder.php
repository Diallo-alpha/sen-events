<?php

namespace Database\Seeders;

use App\Models\Organisme;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrganismeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Organisme::create([
            'nom' => 'simplon',
            'email' => 'simplon.test@exemple.com',
            'description' => 'ceci est un description',
            'adresse' => 'sacré coeur 3 villa 1011',
            'secteur_activite' => 'Formation professionnel',
            'ninea' => '12345mlop',
            'date_creation' => '2020-01-01',
            'password' => Hash::make('simplon123'),
        ]);
    }
}
