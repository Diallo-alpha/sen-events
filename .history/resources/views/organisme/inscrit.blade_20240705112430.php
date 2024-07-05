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
        <h1>Liste des inscrits pour {{ $evenement->nom }}</h1>
        <div class="row mb-3">
            <div class="col-md-6">
                <br>
                <br>
                <p><strong>Places restantes :</strong> {{ $placesRestantes }}</p>
                <br>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th scope="col">Nom de l'événement</th>
                        <th scope="col">Nom de l'utilisateur</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date d'inscription</th>
                        <th scope="col">Validation</th>
                        <th scope="col">Annulation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                            <td>{{ $evenement->nom }}</td>
                            <td>{{ $reservation->user->nom }}</td>
                            <td>{{ $reservation->user->email }}</td>
                            <td>{{ $reservation->created_at }}</td>
                            <td>
                                <!-- Form pour accepter la réservation -->
                                 <form action="{{route('reservations.edit', $reservation->id)}}" method="get">
                                    @csrf
                                    @method('get')
                                    <button type="submit" class="btn btn-success">Accepter</button>
                                </form>
                            </td>
                            <td>
                                <!-- Form pour refuser la réservation -->
                                <form action="{{route('reservations.edit', $reservation->id)}}" method="get" >
                                    @csrf
                                    @method('get')
                                    {{-- <button type="submit" class="btn btn-danger">Refuser</button> --}}
                                    <span></span>
                                    <a href="{{ route('reservations.edit') }}" class="btn btn-primary">Refuser</a>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
</x-organisme-app-layout>

<a href="{{ route('login') }}" class="btn btn-primary">Se connecter</a>



{{-- <td>
    <a href="{{ route('evenement.update', $evenement->id) }}" class="btn btn-warning">Modifier</a>
    <form action="{{ route('evenement.destroy', $evenement->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
    <a href="{{ route('organisme.inscrit', ['evenementId' => $evenement->id]) }}" class="btn btn-info">Inscrits</a>
</td>
 --}}


                                {{-- <form action="{{ route('reservation', $reservation->id) }}" method="POST" style="display: inline-block;">
                                <form action="{{ route('reservation', $reservation->id) }}" method="POST" style="display: inline-block;"> --}}
