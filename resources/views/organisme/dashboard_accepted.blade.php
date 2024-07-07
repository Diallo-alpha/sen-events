<x-organisme-app-layout>
    @section('title', 'Dashboard - Réservations Acceptées')

    @section('titre-page')
        @if(session()->has('organisme_id'))
            {{ App\Models\Organisme::find(session('organisme_id'))->nom }}
        @endif
    @endsection

    @section('cardBox')

    le: .../.../.....



    @endsection
{{--
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
    @endsection --}}

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
        <button onclick="window.print()" class="btn btn-primary">Télécharger</button>
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
                        <th scope="col">Status</th>
                        <th scope="col">Signature</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                            <td>{{ $evenement->nom }}</td>
                            <td>{{ $reservation->user->nom }}</td>
                            <td>{{ $reservation->user->email }}</td>
                            <td>{{ $reservation->created_at }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

    @endsection
</x-organisme-app-layout>
