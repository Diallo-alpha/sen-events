<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use App\Models\Organisme;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function create()
    {
        try {
            $users = User::all();
            $organismes = Organisme::all();
            $roles = Role::all();
            $permissions = Permission::all();

            return view('admin.roles.create', compact('users', 'roles', 'permissions', 'organismes'));
        } catch (\Exception $e) {
            Log::error('Error in RoleController@create: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while loading the page.');
        }
    }

    public function store(Request $request)
    {
        try {
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
        } catch (\Exception $e) {
            Log::error('Error in RoleController@store: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while creating the role.');
        }
    }
    protected function getUserGuard(User $user)
    {
        if ($user instanceof Admin) {
            return 'admins';
        } elseif ($user instanceof Organisme) {
            return 'organisme';
        }
        return 'web';
    }
    public function assignRoleToUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name',
        ]);

        $user = User::findOrFail($request->user_id);
        $userGuard = $this->getUserGuard($user);

        foreach ($request->roles as $roleName) {
            // Vérifiez si le rôle existe pour le guard déterminé
            $role = Role::where('name', $roleName)->where('guard_name', $userGuard)->first();

            // Créez le rôle s'il n'existe pas pour le guard
            if (!$role) {
                $role = Role::create(['name' => $roleName, 'guard_name' => $userGuard]);
                Log::info("Le rôle {$roleName} a été créé pour le guard {$userGuard} dans RoleController@assignRoleToUser");
            }

            // Assignez le rôle à l'utilisateur
            $user->assignRole($role);
        }

        return redirect()->back()->with('success', 'Rôles assignés avec succès.');
    }



    public function assignPermission(Request $request, Role $role)
    {
        try {
            $request->validate([
                'permissions' => 'required|array',
                'permissions.*' => 'exists:permissions,name',
            ]);

            $role->syncPermissions($request->permissions);

            return redirect()->back()->with('success', 'Permissions assigned successfully.');
        } catch (\Exception $e) {
            Log::error('Error in RoleController@assignPermission: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while assigning permissions.');
        }
    }

    public function destroy(Role $role)
    {
        try {
            $role->delete();

            return redirect()->back()->with('success', 'Role deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error in RoleController@destroy: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while deleting the role.');
        }
    }
}
