                                                    <x-organisme-app-layout>
                                                        @section('title', 'Dashboard - Réservations Acceptées')
<link rel="stylesheet" href="style1.css">
                                                        <head>
                                                            <!-- Add Font Awesome -->
                                                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
                                                        </head>


                                                        @section('titre-page')
                                                            @if(session()->has('organisme_id'))
                                                                {{ App\Models\Organisme::find(session('organisme_id'))->nom }}
                                                            @endif
                                                        @endsection

                                                        {{-- @section('cardBox')
                                                            <div class="row">
                                                                <div class="col-md-6 col-lg-3 mb-3">
                                                                    <div class="card text-white bg-primary">
                                                                        <div class="card-body">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <div>
                                                                                    <h3 class="card-title">{{ $reservationsCount }}</h3>
                                                                                    <p class="card-text">Places Réservées</p>
                                                                                </div>
                                                                                <div class="iconBx">
                                                                                    <ion-icon name="eye-outline" style="font-size: 2em;"></ion-icon>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-3 mb-3">
                                                                    <div class="card text-white bg-success">
                                                                        <div class="card-body">
                                                                            <div class="d-flex justify-content-between align-items-center">
                                                                                <div>
                                                                                    <h3 class="card-title">{{ $evenementsCount }}</h3>
                                                                                    <p class="card-text">Evenements</p>
                                                                                </div>
                                                                                <div class="iconBx">
                                                                                    <ion-icon name="eye-outline" style="font-size: 2em;"></ion-icon>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endsection --}}

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
                                                            </button>        <div class="table-responsive">
                                                                <table class="table table-striped custom-table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">Nom de l'événement</th>
                                                                            <th scope="col">Nom de l'utilisateur</th>
                                                                            <th scope="col">Email</th>
                                                                            {{-- <th scope="col">Date d'inscription</th> --}}
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
                                                                                {{-- <td>{{ $reservation->created_at }}</td> --}}
                                                                                <td>
                                                                                    <button class="btn btn-success">Accepté</button>
                                                                                </td>
                                                                                <td>{{ $reservation->status }}</td>
                                                                                <td>{{ $reservation->signature }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        @endsection
                                                    </x-organisme-app-layout>



