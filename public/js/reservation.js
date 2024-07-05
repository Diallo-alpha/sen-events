document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('reserveButton').addEventListener('click', function () {
        var placesDisponibles = parseInt(document.querySelector('meta[name="places-disponibles"]').content);

        if (placesDisponibles <= 0) {
            alert("Désolé, il n'y a plus de places disponibles pour cet événement.");
            return;
        }

        if (document.querySelector('meta[name="user-authenticated"]').content === "true") {
            $('#reservationModal').modal('show');
        } else {
            $('#loginModal').modal('show');
        }
    });

    $('#reservationModal').on('show.bs.modal', function () {
        var evenementId = document.querySelector('meta[name="event-id"]').content;
        var modal = $(this);
        modal.find('.modal-body #modal_evenement_id').val(evenementId);
    });
});
