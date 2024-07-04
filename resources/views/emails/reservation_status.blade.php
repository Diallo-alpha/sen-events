<!DOCTYPE html>
<html>
<head>
    <title>Statut de votre résérvation</title>
</head>
<body>
    <h1>Bonjour, {{ $reservation->auteur_nom_complet }}</h1>
    <p>Votre résérvation intitulée "{{ $reservation->libelle }}" a été {{ $status }}.</p>
</body>
</html>

