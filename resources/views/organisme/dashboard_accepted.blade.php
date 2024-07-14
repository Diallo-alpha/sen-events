<x-organisme-app-layout>
    @section('title', 'Dashboard - Réservations Acceptées')
    <link rel="stylesheet" href="style1.css">

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    @section('titre-page')
        @if(session()->has('organisme_id'))
            {{ App\Models\Organisme::find(session('organisme_id'))->nom }}
        @endif
    @endsection

    @section('content')
        <div class="container mt-4">
            <h1>Liste des inscrits pour {{ $evenement->nom }}</h1>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="alert alert-info">
                        <strong>Places restantes :</strong> {{ $placesRestantes }}
                    </div>
                </div>
            </div>
            <button onclick="window.print()" class="btn btn-primary mb-3">
                <i class="fas fa-download"></i> Télécharger
            </button>
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                            <th scope="col">Nom de l'événement</th>
                            <th scope="col">Nom de l'utilisateur</th>
                            <th scope="col">Email</th>
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
                                <td>{{ $reservation->status }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($reservation->signature, 100) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
</x-organisme-app-layout>
