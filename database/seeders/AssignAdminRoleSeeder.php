<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AssignAdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Récupérer tous les utilisateurs avec le guard admin
        $admins = Admin::all();

        // Assigner le rôle admin à chaque utilisateur
        foreach ($admins as $admin) {
            $admin->assignRole('admin');
        }
    }
}
