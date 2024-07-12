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
    // Afficher le formulaire de création de rôle
    public function create()
    {
        try {
            $users = User::all();
            $organismes = Organisme::all();
            $roles = Role::all();
            $permissions = Permission::all();

            return view('admin.roles.create', compact('users', 'roles', 'permissions', 'organismes'));
        } catch (\Exception $e) {
            Log::error('Erreur dans RoleController@create : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors du chargement de la page.');
        }
    }

    // Enregistrer un nouveau rôle
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

            return redirect()->back()->with('success', 'Rôle créé avec succès.');
        } catch (\Exception $e) {
            Log::error('Erreur dans RoleController@store : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la création du rôle.');
        }
    }

    // Obtenir le garde de l'utilisateur
    protected function getUserGuard(User $user)
    {
        if ($user instanceof Admin) {
            return 'admins';
        } elseif ($user instanceof Organisme) {
            return 'organisme';
        }
        return 'web';
    }

    // Assigner des rôles à un utilisateur
    public function assignRoleToUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name',
        ]);

        $user = User::findOrFail($request->user_id);
        $currentGuard = $this->getUserGuard($user);

        foreach ($request->roles as $roleName) {
            $role = Role::where('name', $roleName)->first();

            if (!$role) {
                return redirect()->back()->with('error', 'Le rôle n\'existe pas.');
            }

            $newGuard = $role->guard_name;

            // Changez le garde de l'utilisateur si nécessaire avant d'assigner le rôle
            if ($currentGuard !== $newGuard) {
                $user = $this->changeUserGuard($user, $newGuard);
                $currentGuard = $newGuard;
            }

            // Assigner le rôle à l'utilisateur
            $user->assignRole($role);
        }

        return redirect()->back()->with('success', 'Rôles assignés avec succès.');
    }

    protected function changeUserGuard(User $user, $newGuard)
    {
        // Copiez les données de l'utilisateur dans le modèle correspondant au nouveau garde
        $userData = $user->toArray();
        unset($userData['id']); // Supprimez l'ID pour éviter les conflits

        // Incluez tous les champs obligatoires, comme 'password'
        $userData['password'] = $user->password; // Assurez-vous que le mot de passe est haché

        // Supprimez l'utilisateur de la table actuelle en fonction de son garde actuel
        $currentGuard = $this->getUserGuard($user);
        if ($currentGuard === 'admins') {
            Admin::where('id', $user->id)->delete();
        } elseif ($currentGuard === 'organisme') {
            Organisme::where('id', $user->id)->delete();
        } else {
            User::where('id', $user->id)->delete();
        }

        // Créez un nouvel utilisateur dans la table correspondant au nouveau garde
        if ($newGuard === 'admins') {
            $newUser = Admin::create($userData);
        } elseif ($newGuard === 'organisme') {
            $newUser = Organisme::create($userData);
        } else {
            $newUser = User::create($userData);
        }

        // Retournez le nouvel utilisateur créé
        return $newUser;
    }

    // Assigner des permissions à un rôle
    public function assignPermission(Request $request, Role $role)
    {
        try {
            $request->validate([
                'permissions' => 'required|array',
                'permissions.*' => 'exists:permissions,name',
            ]);

            $role->syncPermissions($request->permissions);

            return redirect()->back()->with('success', 'Permissions assignées avec succès.');
        } catch (\Exception $e) {
            Log::error('Erreur dans RoleController@assignPermission : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'assignation des permissions.');
        }
    }

    // Supprimer un rôle
    public function destroy(Role $role)
    {
        try {
            $role->delete();

            return redirect()->back()->with('success', 'Rôle supprimé avec succès.');
        } catch (\Exception $e) {
            Log::error('Erreur dans RoleController@destroy : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la suppression du rôle.');
        }
    }
}
?>
