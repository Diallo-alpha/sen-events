<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents; 

class OrganismeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Vérifier si la table 'organismes' n'existe pas et la créer
        if (!Schema::hasTable('organismes')) {
            Schema::create('organismes', function (Blueprint $table) {
                $table->id();
                $table->string('nom');
                $table->string('email');
                $table->text('description');
                $table->string('adresse');
                $table->string('secteur_activite');
                $table->string('ninea');
                $table->date('date_creation');
                $table->date('password');

                $table->timestamps();
            });
        }

        // Insertion des données dans la table 'organismes'
        DB::table('organismes')->insert([
            [
                'nom' => 'Organisme 1',
                'email' => 'simplon.test@exemple.com',
                'description' => 'Description de l\'organisme 1',
                'adresse' => 'Adresse 1',
                'secteur_activite' => 'Secteur 1',
                'ninea' => '123456789',
                'date_creation' => '2020-01-01',
                'password' => Hash::make('simplon111'),


            ],
            [
                'nom' => 'Organisme 2',
                'email' => 'simplon.test@exemple.com',
                'description' => 'Description de l\'organisme 2',
                'adresse' => 'Adresse 2',
                'secteur_activite' => 'Secteur 2',
                'ninea' => '987654321',
                'date_creation' => '2021-02-02',
                'password' => Hash::make('simplon222'),


            ],
          [
                'nom' => 'Organisme 3',
                'email' => 'test1@exemple.com',
                'description' => 'ceci est un description',
                'adresse' => 'sacré coeur 3 villa 1011',
                'secteur_activite' => 'Formation professionnel',
                'ninea' => '12345mlop',
                'date_creation' => '2020-01-01',
                'password' => Hash::make('simplon333'),
            ]
            // Ajoutez d'autres enregistrements si nécessaire
        ]);
    }
}
