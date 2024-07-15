<x-admin-app-layout>

@section('title', 'Dashboard')
@section('titre-page', 'association')

@section('cardBox')
<div class="card">
    <div>
        <div class="numbers">{{ $eventCount }}</div>
        <div class="cardName">Evenements</div>
    </div>
    <div class="iconBx">
        <ion-icon name="eye-outline"></ion-icon>
    </div>
</div>

<div class="card">
    <div>
        <div class="numbers">{{ $associationCount }}</div>
        <div class="cardName">Associations</div>
    </div>
    <div class="iconBx">
        <ion-icon name="eye-outline"></ion-icon>
    </div>
</div>

<div class="card">
    <div>
        <div class="numbers">{{ $userCount }}</div>
        <div class="cardName">Utilisateurs</div>
    </div>
    <div class="iconBx">
        <ion-icon name="eye-outline"></ion-icon>
    </div>
</div>
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
                <th>Adresse</th>
                <th>Date de création</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($associations as $association)
                <tr>
                    <td>{{ $association->nom }}</td>
                    <td>{{ $association->description }}</td>
                    <td>{{ $association->adresse }}</td>
                    <td>{{ $association->date_creation}}</td>
                    <td>{{ $association->is_active ? 'Active' : 'Désactivée' }}</td>
                    <td>
                        <form action="{{ route('admin.associations.toggle', $association->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-primary">{{ $association->is_active ? 'Désactiver' : 'Activer' }}</button>
                        </form>
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
