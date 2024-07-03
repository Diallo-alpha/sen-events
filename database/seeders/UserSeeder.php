<?php

namespace Database\Seeders;
// UserSeeder.php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'nom' => 'Ndiaye',
                'prenom' => 'Alpha',
                'email' => 'ndiaye@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'), // ou Hash::make
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Ajoutez d'autres utilisateurs ici
        ];

        foreach ($users as $user) {
            if (!DB::table('users')->where('email', $user['email'])->exists()) {
                DB::table('users')->insert($user);
            }
        }
    }
}
