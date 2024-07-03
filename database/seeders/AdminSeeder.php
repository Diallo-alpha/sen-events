<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Créez le rôle admin pour le guard admins
        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'admins']);

        // Créez un administrateur
        $admin = Admin::create([
            'nom' => 'Admin Name',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole('admin');
    }
}

