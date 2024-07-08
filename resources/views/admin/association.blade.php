<x-admin-app-layout>
    @section('title', 'Associations')
    @section('titre-page', 'Associations')
    @section('cardBox')
    @endsection

    @section('content')
        <div class="container">
            <h2>Liste des associations</h2>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($associations as $association)
                        <tr>
                            <td>{{ $association->nom }}</td>
                            <td>{{ $association->description }}</td>
                            <td>
                                <a href="{{ route('admin.details.association', $association->id) }}" class="btn btn-info">Détails</a>
                                <form action="{{ route('admin.associations.delete', $association->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette association ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
</x-admin-app-layout>
