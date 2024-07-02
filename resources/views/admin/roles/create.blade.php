<x-admin-app-layout>

    @section('title', 'Dashboard')
    @section('titre-page', 'association')
    @section('content')
    <div class="container">
        <h1>Create Role</h1>

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
                <label for="name">Role Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="guard_name">Guard Name</label>
                <input type="text" class="form-control" id="guard_name" name="guard_name" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Role</button>
        </form>
    </div>
</x-admin-app-layout>
