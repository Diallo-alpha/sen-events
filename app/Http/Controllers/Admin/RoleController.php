<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Spatie\Permission\Models\Role;

    class RoleController extends Controller
    {
        // Afficher le formulaire de création de rôle
        public function create()
        {
            return view('admin.roles.create');
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

            return redirect()->route('admin.roles.index')->with('success', 'Role created successfully.');
        }
    }

