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
        <div class="container">
            <h1>Mes Événements</h1>
            <a href="{{ route('evenement.create') }}" class="btn btn-primary">Créer un événement</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Lieu</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($evenements as $evenement)
                        <tr>
                            <td>{{ $evenement->nom }}</td>
                            <td>{{ $evenement->description }}</td>
                            <td>{{ $evenement->date_evenement }}</td>
                            <td>{{ $evenement->lieu }}</td>
                            <td>
                                <a href="{{ route('evenement.update', $evenement->id) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('evenement.destroy', $evenement->id) }}" method="POST" style="display:inline;">
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
</x-organisme-app-layout>
