<?php
namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Créez le rôle admin pour le guard admins
        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'admins']);

        // Créez un administrateur
        $admin = Admin::create([
            'name' => 'Admin Name',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole('admin');
    }
}

