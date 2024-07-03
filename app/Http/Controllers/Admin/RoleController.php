<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Afficher le formulaire de création de rôle avec les rôles et permissions existants
    public function create()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        return view('admin.roles.create', compact('roles', 'permissions'));
    }

    // Traiter le formulaire de création de rôle
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'guard_name' => 'required|string|max:255',
        ]);

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
        ]);

        return redirect()->route('admin.roles.create')->with('success', 'Role created successfully.');
    }

    // Attribuer une permission à un rôle
    public function assignPermission(Request $request, Role $role)
    {
        $request->validate([
            'permission' => 'required|exists:permissions,name',
        ]);

        $role->givePermissionTo($request->permission);

        return redirect()->route('admin.roles.create')->with('success', 'Permission assigned successfully.');
    }

    // Supprimer un rôle
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.roles.create')->with('success', 'Role deleted successfully.');
    }
}


