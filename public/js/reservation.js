document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('reserveButton').addEventListener('click', function () {
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
