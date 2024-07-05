<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'événement</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <meta name="user-authenticated" content="{{ Auth::check() ? 'true' : 'false' }}">
    <meta name="event-id" content="{{ $evenement->id }}">
    <meta name="places-disponibles" content="{{ $evenement->places_disponible }}">
</head>
<body>
    @include('portail.layouts.header')

    <div class="container mt-5">
        <div class="event-header event-hero">
            <img src="{{ asset('public/'.$evenement->photo) }}" alt="Image de l'événement" class="img-fluid">
        </div>
        <div class="event-details">
            <h2>{{ $evenement->nom }}</h2>
            <p>{{ $evenement->description }}</p>
            <div class="my-3">
                <h5>Date</h5>
                <p>{{ $evenement->date_evenement }}</p>
                <button class="btn btn-primary" id="reserveButton">Réserver</button>
            </div>
            <div class="mt-4">
                <h5>Description de l'événement :</h5>
                <p>{{ $evenement->description }}</p>
            </div>
            <div class="mt-4">
                <h5>Organisme :</h5>
                <p>{{ $evenement->organisme->nom }}</p>
            </div>
            <div class="mt-4">
                <h5>Lieu :</h5>
                <p>{{ $evenement->lieu }}</p>
            </div>
            <div class="mt-4">
                <h5>Places disponibles :</h5>
                <p>{{ $evenement->places_disponible }}</p>
            </div>
        </div>
    </div>

    @include('portail.layouts.footer')

    <!-- Modal de réservation -->
    <div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reservationModalLabel">Confirmer la réservation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir réserver pour cet événement ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <form action="{{ route('reservations.store') }}" method="POST" style="display: inline-block;">
                        @csrf
                        <input type="hidden" name="evenement_id" id="modal_evenement_id" value="{{ $evenement->id }}">
                        @auth
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <button type="submit" id="confirmReservationButton" class="btn btn-primary">Confirmer</button>
                        @else
                            <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Se connecter pour réserver</button>
                        @endauth
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Connexion -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Connexion requise</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Vous devez être connecté pour effectuer une réservation.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <a href="{{ route('login') }}" class="btn btn-primary">Se connecter</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/reservation.js') }}"></script>
</body>
</html>
