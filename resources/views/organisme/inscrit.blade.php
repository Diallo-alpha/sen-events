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
                <div class="numbers" id="reservations-count">{{ $reservationsCount }}</div>
                <div class="cardName">Places Réservées</div>
            </div>
            <div class="iconBx">
                <ion-icon name="eye-outline"></ion-icon>
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers" id="evenements-count">{{ $evenementsCount }}</div>
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
                <p><strong>Places restantes :</strong> <span id="places-restantes">{{ $placesRestantes }}</span></p>
                <a href="{{ route('reservations.accepted', $evenement->id) }}" class="btn btn-primary">Voir les réservations acceptées</a>
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
                        <tr id="reservation-{{ $reservation->id }}">
                            <td>{{ $evenement->nom }}</td>
                            <td>{{ $reservation->user->nom }}</td>
                            <td>{{ $reservation->user->email }}</td>
                            <td>{{ $reservation->created_at }}</td>
                            <td>
                                <button class="btn btn-success approve-btn" data-id="{{ $reservation->id }}">Accepter</button>
                            </td>
                            <td>
                                <button class="btn btn-danger reject-btn" data-id="{{ $reservation->id }}">Refuser</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.approve-btn').click(function() {
                var reservationId = $(this).data('id');
                $.ajax({
                    url: '/reservation/' + reservationId + '/approve',
                    method: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#reservation-' + reservationId).remove();
                        updateReservationCounters(); // Mettre à jour les compteurs après suppression
                    }
                });
            });

            $('.reject-btn').click(function() {
                var reservationId = $(this).data('id');
                $.ajax({
                    url: '/reservation/' + reservationId + '/reject',
                    method: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#reservation-' + reservationId).remove();
                        updateReservationCounters(); // Mettre à jour les compteurs après suppression
                    }
                });
            });

            function updateReservationCounters() {
                $.ajax({
                    url: '/reservations/count/{{ $evenement->id }}',
                    method: 'GET',
                    success: function(response) {
                        $('#reservations-count').text(response.reservationsCount); // Mettre à jour le compteur de réservations
                        $('#places-restantes').text(response.placesRestantes); // Mettre à jour les places restantes
                    }
                });
            }
        });
    </script>
    @endsection
</x-organisme-app-layout>
