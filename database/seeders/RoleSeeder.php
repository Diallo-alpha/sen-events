<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Créer le rôle admin avec le guard admins
        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'admins']);
    }
}
