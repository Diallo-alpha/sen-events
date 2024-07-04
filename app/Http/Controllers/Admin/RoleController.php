<?php
namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Organisme;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    // Afficher le formulaire de création de rôle avec les rôles et permissions existants
    public function create()
    {
        $users = User::all();
        $organisme = Organisme::all();
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.roles.create', compact('users', 'roles', 'permissions', 'organisme'));
    }

    // Traiter le formulaire de création de rôle

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'guard_name' => 'required|string',
        ]);

        $role = Role::create(['name' => $request->name, 'guard_name' => $request->guard_name]);
        $role->syncPermissions($request->permissions);

        return redirect()->back()->with('success', 'Role created successfully.');
    }

    public function assignRoleToUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->syncRoles($request->roles);

        return redirect()->back()->with('success', 'Roles assigned successfully.');
    }

    public function assignPermission(Request $request, Role $role)
    {
        $request->validate([
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,name',
        ]);

        $role->syncPermissions($request->permissions);

        return redirect()->back()->with('success', 'Permissions assigned successfully.');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->back()->with('success', 'Role deleted successfully.');
    }
}


