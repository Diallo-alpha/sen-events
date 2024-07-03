<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insérez des données d'exemple dans la table 'users'
        DB::table('users')->insert([
            [
                'nom' => 'Sane',
                'prenom' => 'Cheikh',
                'email' => 'cheikh@example.com',
                'password' => Hash::make('passer222'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Diallo',
                'prenom' => 'Alpha',
                'email' => 'alpha@example.com',
                'password' => Hash::make('passer111'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'exemple',
                'prenom' => 'exemple',
                'email' => 'exemple@example.com',
                'password' => Hash::make('passer333'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Ajoutez d'autres enregistrements si nécessaire
        ]);
    }
}
