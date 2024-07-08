<x-admin-app-layout>

    @section('title', 'Dashboard')

    @section('titre-page', 'Événements')

    @section('cardBox')
    <div class="card">
        <div>
            <div class="numbers">{{ $eventCount }}</div>
            <div class="cardName">Événements</div>
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
            <h2>Liste des événements</h2>
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
                        <th>Date de l'événement</th>
                        <th>Lieu</th>
                        <th>Places disponibles</th>
                        <th>Date limite</th>
                        <th>Association</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>{{ $event->nom }}</td>
                            <td>{{ $event->description }}</td>
                            <td>{{ $event->date_evenement }}</td>
                            <td>{{ $event->lieu }}</td>
                            <td>{{ $event->places_disponible }}</td>
                            <td>{{ $event->date_limite }}</td>
                            <td>{{ $event->organisme->nom }}</td>
                            <td>
                                <a href="{{ route('details.events', $event->id) }}" class="btn btn-info">Voir</a>

                                <a href="{{ route('evenement.edit', $event->id) }}" class="btn btn-primary">Éditer</a>

                                <form action="{{ route('evenement.destroy', $event->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection

</x-admin-app-layout>
