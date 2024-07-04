document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('reserveButton').addEventListener('click', function () {
        if (document.querySelector('meta[name="user-authenticated"]').content === "true") {
            $('#reservationModal').modal('show');
        } else {
            $('#loginModal').modal('show');
        }
    });

    document.getElementById('confirmReservationButton').addEventListener('click', function () {
        // Handle the reservation logic here
        // For example, you might want to send an AJAX request to your server
        alert('Réservation confirmée !');
        $('#reservationModal').modal('hide');
    });
});
