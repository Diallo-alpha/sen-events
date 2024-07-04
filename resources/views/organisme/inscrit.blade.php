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
            <h1>Liste des inscrits</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom de l'événement</th>
                        <th>Nom de l'utilisateur</th>
                        <th>Email</th>
                        <th>Date d'inscription</th>
                        <th>Accepter</th>
                        <th>Modifier</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($evenements as $evenement)
                        @foreach($evenement->reservations as $reservation)
                            <tr>
                                <td>{{ $evenement->nom }}</td>
                                <td>{{ $reservation->user->nom }}</td>
                                <td>{{ $reservation->user->email }}</td>
                                <td>{{ $reservation->created_at }}</td>
                                    <!-- Form pour accepter ou refuser la réservation -->
                                    {{-- <form action="{{ route('reservation.accept', $reservation->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success">Accepter</button>
                                    </form>
                                    <form action="{{ route('reservation.refuse', $reservation->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger">Refuser</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection

</x-organisme-app-layout>
