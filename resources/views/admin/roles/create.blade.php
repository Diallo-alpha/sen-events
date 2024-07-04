<x-admin-app-layout>
    @section('content')
        <div class="container">
            <h1>Créer un rôle</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nom du Rôle</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="guard_name">Nom du Guard</label>
                    <select class="form-control" id="guard_name" name="guard_name" required>
                        <option value="web">Web</option>
                        <option value="admins">Admins</option>
                        <option value="organisme">Organisme</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="permissions">Permissions</label>
                    <div class="checkbox-group">
                        @foreach ($permissions as $permission)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="permission_{{ $permission->id }}">
                                <label class="form-check-label" for="permission_{{ $permission->id }}">
                                    {{ $permission->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Créer le Rôle</button>
            </form>
            <br>
            <br>
            <h1>Assigner des Rôles aux Utilisateurs</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.roles.assignRoleToUser') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="user">Choisir un Utilisateur</label>
                    <select class="form-control" id="user" name="user_id" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="roles">Assigner des Rôles</label>
                    <div class="checkbox-group">
                        @foreach ($roles as $role)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->name }}" id="role_{{ $role->id }}">
                                <label class="form-check-label" for="role_{{ $role->id }}">
                                    {{ $role->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Assigner les Rôles</button>
            </form>

            <h1>Rôles et Permissions</h1>

            <table class="table">
                <thead>
                    <tr>
                        <th>Rôle</th>
                        <th>Permissions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>
                                @foreach ($role->permissions as $permission)
                                    <span class="badge badge-info">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('admin.roles.assignPermission', $role) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="permission">Ajouter des Permissions</label>
                                        <div class="checkbox-group">
                                            @foreach ($permissions as $permission)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="permission_{{ $permission->id }}">
                                                    <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Assigner les Permissions</button>
                                </form>
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
</x-admin-app-layout>
