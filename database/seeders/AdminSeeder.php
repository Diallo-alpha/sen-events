<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::firstOrCreate(
            ['email' => 'admin1@example.com'],
            [
                'nom' => 'Admin',
                'prenom' => 'One',
                'email_verified_at' => now(),
                'password' => Hash::make('password000'),
                'remember_token' => Str::random(10),
            ]
        );


    }
}
