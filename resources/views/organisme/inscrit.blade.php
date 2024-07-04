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
                            <td>
                                 {{-- <form action="{{ route('organisme.', $reservation->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">refuser</button>
                                </form>


                                <form action="{{ route('organisme.', $reservation->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">modiffier</button>
                                </form> --}}



                                    <td>
                                        <a href="{{ route('test-email', $reservation->id) }}" class="btn btn-info">Approuver</a>
                                        {{-- <a href="{{ route('evenement.edit', $reservation->id) }}" class="btn btn-primary">Edit</a> --}}
                                        <form action="{{ route('test-email', $reservation->id) }}" method="POST" style="display:inline">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-danger">Refuser</button>
                                        </form>
                                    </td>
                            </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection

</x-organisme-app-layout>


 {{-- @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button> --}}


