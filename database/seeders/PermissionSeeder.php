<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Liste des permissions à créer
        $permissions = [
            'create roles',
            'edit roles',
            'delete roles',
            'view roles',
            // Ajoutez d'autres permissions selon vos besoins
        ];

        // Créer les permissions s'ils n'existent pas déjà
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
