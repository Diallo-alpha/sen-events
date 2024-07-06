<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Organisme;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function create()
    {
        $users = User::all();
        $organismes = Organisme::all();
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.roles.create', compact('users', 'roles', 'permissions', 'organismes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'guard_name' => 'required|string',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,name',
        ]);

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
        ]);

        if ($request->has('permissions')) {
            foreach ($request->permissions as $permissionName) {
                $permission = Permission::firstOrCreate(
                    ['name' => $permissionName, 'guard_name' => $request->guard_name]
                );
                $role->givePermissionTo($permission);
            }
        }

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

        foreach ($request->roles as $roleName) {
            $role = Role::findByName($roleName, $user->guard_name); // Assurez-vous de vérifier le garde
            if ($role) {
                $user->assignRole($roleName);
            }
        }

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
