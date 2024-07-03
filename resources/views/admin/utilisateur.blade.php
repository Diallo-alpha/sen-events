<x-admin-app-layout>
    @section('title', 'Dashboard')

    @section('titre-page', 'utilisateur')
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
        <!-- Contenu des CRUDs ici -->
        <div class="container">
            <h2>Liste des utilisateurs</h2>
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
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->nom }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ route('admin.utilisateurs.delete', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
</x-admin-app-layout>
