<!DOCTYPE html>
<html>
<head>
    <title>Statut de votre résérvation</title>
</head>
<body>
    <h1>Bonjour, {{ $reservation->user->nom}}</h1>
    <p>Votre résérvation intitulée "{{ $reservation->nom }}" a été {{ $statut}}.</p>
</body>
</html>

