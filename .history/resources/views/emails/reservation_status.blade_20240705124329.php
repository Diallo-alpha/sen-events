<!DOCTYPE html>
<html>
<head>
    <title>Statut de votre résérvation</title>
</head>
<body>
    <h1>Bonjour, {{ $reservation->user6 }}</h1>
    <p>Votre résérvation intitulée "{{ $reservation->libelle }}" a été {{ $status }}.</p>
</body>
</html>

