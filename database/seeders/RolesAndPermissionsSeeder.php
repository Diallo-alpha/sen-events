<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Temporarily disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Clear existing permissions and roles
        DB::table('model_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        Permission::truncate();
        Role::truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Rôles et permissions pour le garde admin
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'admins']); // Changez 'admins' en 'admin'
        Permission::create(['name' => 'publier_evenement', 'guard_name' => 'admins'])->assignRole($adminRole);
        Permission::create(['name' => 'supprimer_evenement', 'guard_name' => 'admins'])->assignRole($adminRole);
        Permission::create(['name' => 'reserver_evenement', 'guard_name' => 'admins'])->assignRole($adminRole);
        Permission::create(['name' => 'creer_evenement', 'guard_name' => 'admins'])->assignRole($adminRole);

        // Rôles et permissions pour le garde web
        $userRole = Role::create(['name' => 'user', 'guard_name' => 'web']);
        Permission::create(['name' => 'explorer_evenements', 'guard_name' => 'web'])->assignRole($userRole);
        Permission::create(['name' => 'creer_reservation', 'guard_name' => 'web'])->assignRole($userRole);

        // Rôles et permissions pour le garde organisme
        $organismeRole = Role::create(['name' => 'organisme', 'guard_name' => 'organisme']);
        Permission::create(['name' => 'creer_evenement', 'guard_name' => 'organisme'])->assignRole($organismeRole);
        Permission::create(['name' => 'supprimer_evenement', 'guard_name' => 'organisme'])->assignRole($organismeRole);
        Permission::create(['name' => 'valider_reservation', 'guard_name' => 'organisme'])->assignRole($organismeRole);
        Permission::create(['name' => 'supprimer_reservation', 'guard_name' => 'organisme'])->assignRole($organismeRole);
    }
}
