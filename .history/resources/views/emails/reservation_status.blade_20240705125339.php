<!DOCTYPE html>
<html>
<head>
    <title>Statut de votre résérvation</title>
</head>
<body>
    <h1>Bonjour, {{ $reservation->user->nom}}</h1>
    <p>suite a votre po</p>
    <p>Votre résérvation intitulée "{{ $reservation->evenement->nom }}" a été {{ $reservation->statut}}.</p>
</body>
</html>

