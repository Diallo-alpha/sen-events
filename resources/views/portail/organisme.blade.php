<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer Société</title>
    <link rel="stylesheet" href="{{ asset('css/organismeResgistre.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>

    </style>
</head>
<body>
    <div class="container-page">
        <div class="image-section">
            <h1>Parler nous de votre <br> societer</h1>
            {{-- <img src="{{ asset('images/Left.svg') }}" alt="image de gauche"> --}}
        </div>
        <div class="form-section">
            <div class="form-container">
                <form>
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" value="SEN-EVENTS">

                    <label for="ninea">Ninea</label>
                    <input type="text" id="ninea" name="ninea">

                    <label for="logo">Logo</label>
                    <input type="file" id="logo" name="logo">

                    <label for="adresse">Adresse</label>
                    <input type="text" id="adresse" name="adresse" value="Han mar is te">

                    <label for="secteur">Secteur</label>
                    <input type="text" id="secteur" name="secteur" value="Immobilier">

                    <label for="date">Date</label>
                    <input type="date" id="date" name="date">

                    <label for="description">Description</label>
                    <textarea id="description" name="description"></textarea>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">

                    <label for="motdepasse">Mot de passe</label>
                    <input type="password" id="motdepasse" name="motdepasse">

                    <button type="submit">Créer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
