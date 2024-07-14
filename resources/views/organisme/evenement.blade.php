<x-organisme-app-layout>
    @section('title', 'Dashboard')

    @section('titre-page')
        @if(session()->has('organisme_id'))
            {{ App\Models\Organisme::find(session('organisme_id'))->nom }}
        @endif
    @endsection

    @section('cardBox')
        <div class="card">
            <div>
                <div class="numbers">{{ $reservationsCount }}</div>
                <div class="cardName">Places Réservées</div>
            </div>
            <div class="iconBx">
                <ion-icon name="eye-outline"></ion-icon>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">{{ $evenementsCount }}</div>
                <div class="cardName">Evenements</div>
            </div>
            <div class="iconBx">
                <ion-icon name="eye-outline"></ion-icon>
            </div>
        </div>
    @endsection

    @section('content')
    <div class="..container-fluid">
        <h1>Liste des événements</h1>
        <a href="{{ route('evenement.create') }}" class="btn btn-primary mb-3">Créer un événement</a>
        <div class="table-responsive">
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date</th>
                        <th scope="col">Lieu</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($evenements as $evenement)
                        <tr>
                            <td>{{ $evenement->nom }}</td>
                            <td>{{ Str::limit($evenement->description, 70) }}</td>
                            <td>{{ $evenement->date_evenement }}</td>
                            <td>{{ $evenement->lieu }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('evenement.update', $evenement->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                    <a href="{{ route('organisme.inscrit', ['evenementId' => $evenement->id]) }}" class="btn btn-info btn-sm">Inscrits</a>
                                    <form action="{{ route('evenement.destroy', $evenement->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
</x-organisme-app-layout>
