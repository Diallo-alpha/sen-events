<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Permissions pour les utilisateurs du garde 'web'
        $permissions_web = [
            'créer_reservation',
        ];

        // Permissions pour les administrateurs du garde 'admins'
        $permissions_admins = [
            'supprmer_un_evenement', 'supprimer_un_organisme', 'supprimer_user_lambda','envoi_email',
        ];

        // Permissions pour les organismes du garde 'organisme'
        $permissions_organisme = [
            'créer_evenement', 'modifier_evenement', 'supprimer_evenement', 'accepter_une_reservation','refuser_une_reservation', 'envoi_email',
            // Ajoutez d'autres permissions selon vos besoins
        ];

        // Créer les permissions s'ils n'existent pas déjà
        foreach ($permissions_web as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        foreach ($permissions_admins as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'admins']);
        }

        foreach ($permissions_organisme as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'organisme']);
        }

        // Créer des rôles pour chaque garde
        $role_web = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);
        $role_admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'admins']);
        $role_organisme = Role::firstOrCreate(['name' => 'organisateur', 'guard_name' => 'organisme']);
    }
}
