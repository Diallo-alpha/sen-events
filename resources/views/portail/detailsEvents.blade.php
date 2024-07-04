<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sen-Events</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <meta name="user-authenticated" content="{{ Auth::check() ? 'true' : 'false' }}">
</head>
<body>
    @include('portail.layouts.header')

    <div class="container mt-5">
        <div class="event-header">
            <img src="{{ asset('images/afbe9d6dfcb9da7c55ddfd60598c82b0 1.svg') }}" alt="" class="img-fluid">
        </div>
        <div class="event-details">
            <h2>Analyse de données</h2>
            <p>Analyse des données: KoboToolbox et Power BI pour la collecte, l'analyse et la visualisation de données</p>
            <div class="my-3">
                <h5>Date</h5> <br>
                <p>28 juin 2024</p><br>
                <button class="btn btn-primary" id="reserveButton">Reserver</button>
                {{-- <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#reservationModal" data-evenement-id="{{ $evenement->id }}">Reserver</a> --}}

            </div>
            <div class="mt-4">
                <h5>Description de l'événement :</h5>
                <p>Rejoignez-nous pour un atelier intensif sur l'analyse des données, conçu pour vous doter de compétences nécessaires pour collecter, analyser et visualiser des données de manière efficace. Lors de cet événement, nous explorerons les puissants outils KoboToolbox et Power BI, et comment ils peuvent être utilisés ensemble pour transformer des données brutes en insights précieux.</p>
            </div>
        </div>
    </div>

    @include('portail.layouts.footer')

    <!-- Prompt de reservation -->
    {{-- <div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-secondary annuler" data-dismiss="modal">Annuler</button>
                    <a href="reservations.store">Confirmer</a>
                    {{-- <button type="button" class="btn btn-primary" id="confirmReservationButton confirmer">Confirmer</button> --}}
                {{-- </div>
            </div>
        </div>
    </div>  --}}

    <!-- Prompt de reservation -->
{{-- <div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
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


                {{-- <button type="button" class="btn btn-secondary annuler" data-dismiss="modal">Annuler</button>
                <form action="{{ route('reservations.index') }}" method="POST">
                    @csrf
                    <input type="hidden" name="evenement_id" id="modal_evenement_id">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <button type="submit" class="btn btn-primary">Confirmer</button> --}}

                                    {{-- <form action="{{ route('reservations.create') }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary">Confirmer</button>
                                    </form>
                                    <form action="{{ route('reservations/index') }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-secondary annuler">Refuser</button>
                                    </form>


                </form>
            </div>
        </div>
    </div>
</div>  --}}

<!-- Prompt de reservation -->
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
                <button type="button" class="btn btn-secondary annuler" data-dismiss="modal">Annuler</button>
                <form action="{{ route('reservations.store') }}" method="POST" style="display: inline-block;">
                    @csrf
                    <input type="hidden" name="evenement_id" id="modal_evenement_id" value="{{ $evenement->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <button type="submit" class="btn btn-primary">Confirmer</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- demander a l'utilisateur de se connecter afin de reserver -->
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

    <script>
        $(document).ready(function() {
            $('#reservationModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var evenementId = button.data('evenement-id'); // Extract info from data-* attributes

                // Update the modal's content.
                var modal = $(this);
                modal.find('.modal-body #modal_evenement_id').val(evenementId);
            });
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/reservation.js') }}"></script>
</body>
</html>
