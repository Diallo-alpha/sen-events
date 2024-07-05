document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM fully loaded and parsed');

    // Vérifiez si le bouton est bien trouvé
    var reserveButton = document.getElementById('reserveButton');
    if (!reserveButton) {
        console.error('Le bouton de réservation n\'a pas été trouvé.');
        return;
    }

    reserveButton.addEventListener('click', function () {
        var placesDisponibles = parseInt(document.querySelector('meta[name="places-disponibles"]').content);
        console.log('Places disponibles:', placesDisponibles);

        if (placesDisponibles <= 0) {
            alert("Désolé, il n'y a plus de places disponibles pour cet événement.");
            return;
        }

        var userAuthenticated = document.querySelector('meta[name="user-authenticated"]').content;
        console.log('User authenticated:', userAuthenticated);

        if (userAuthenticated === "true") {
            $('#reservationModal').modal('show');
        } else {
            $('#loginModal').modal('show');
        }
    });

    $('#reservationModal').on('show.bs.modal', function () {
        var evenementId = document.querySelector('meta[name="event-id"]').content;
        $('#modal_evenement_id').val(evenementId);
        console.log('Événement ID:', evenementId);
    });
});
