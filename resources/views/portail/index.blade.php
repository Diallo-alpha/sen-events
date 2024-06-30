<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sen-Events</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container-nav">
        <div class="logo">Sen-Events</div>
        <div class="nav-links">
            <a href="{{ route('portail.index') }}" class="nav-link">Accueil</a>
            <a href="#" class="nav-link">Evenements</a>
            <a href="#" class="nav-link">A Propos</a>
        </div>

        @if (Auth::check())
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="button">Déconnexion</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}" class="button">Connexion</a>
        @endif
    </div>
    <section class="hero">
        <div class="container">
            <div class="row">
                <div>
                <h1><span class="gradient-text">SEN</span><br><span class="gradient-text"> EVENTS</span></h1>
            </div>
            <div>
                <p class="text-hero">Organisez et Gérez Vos Événements en Toute <br> Simplicité</p>
            </div>
            <div>
                <a href="#" class="buttonEv">Créer un évènements</a>            </div>
            </div>
        </div>
    </section>

    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-4 a-propos">
                    <h2 class="display-4">A propos de nous</h2>
                </div>
                <div class="col-md-6">
                    <p class="lead">Bienvenue sur notre plateforme de gestion d'événements, votre partenaire de confiance pour organiser, planifier et réussir tous vos événements. Nous offrons des outils intuitifs et puissants pour simplifier chaque étape de la gestion d'événements, des inscriptions aux réservations en passant par la communication. Que vous organisiez une petite réunion ou une grande conférence, notre mission est de vous aider à créer des expériences inoubliables.</p>
                </div>
                <div class="col-md-6">
                    <img src="images/a-propos.png" alt="Image de deux personnes s'aidant mutuellement à grimper une montagne" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-4 a-propos">
                    <h2 class="display-4">Événements</h2>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="" alt="Image d'un microphone sur une estrade" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Analyse de donnée</h5>
                                <p class="card-text">
                                    <span class="text-danger">Date Événements:</span><br>
                                    <span class="text-primary"><i class="fas fa-map-marker-alt"></i> King fakhad pace</span><br>
                                    Participez à notre atelier interactif et découvrez les dernières tendances en matière de développement personnel et de bien-être.
                                </p>
                                <a href="{{ route('details.events') }}" class="btn btn-primary">Voir plus</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="" alt="Image d'une foule de personnes regardant un concert" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Analyse de donnée</h5>
                                <p class="card-text">
                                    <span class="text-danger">Date Événements:</span><br>
                                    <span class="text-primary"><i class="fas fa-map-marker-alt"></i> King fakhad pace</span><br>
                                    Participez à notre atelier interactif et découvrez les dernières tendances en matière de développement personnel et de bien-être.
                                </p>
                                <a href="{{ route('details.events') }}" class="btn btn-primary">Voir plus</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="" alt="Image d'une personne filmant un concert avec son téléphone" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Analyse de donnée</h5>
                                <p class="card-text">
                                    <span class="text-danger">Date Événements:</span><br>
                                    <span class="text-primary"><i class="fas fa-map-marker-alt"></i> King fakhad pace</span><br>
                                    Participez à notre atelier interactif et découvrez les dernières tendances en matière de développement personnel et de bien-être.
                                </p>
                                <a href="{{ route('details.events') }}" class="btn btn-primary">Voir plus</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="" alt="Image d'un ordinateur portable avec un calendrier ouvert" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Analyse de donnée</h5>
                                <p class="card-text">
                                    <span class="text-danger">Date Événements:</span><br>
                                    <span class="text-primary"><i class="fas fa-map-marker-alt"></i> King fakhad pace</span><br>
                                    Participez à notre atelier interactif et découvrez les dernières tendances en matière de développement personnel et de bien-être.
                                </p>
                                <a href="{{ route('details.events') }}" class="btn btn-primary">Voir plus</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="" alt="Image d'une illustration de deux personnes avec des chapeaux et des costumes colorés" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Analyse de donnée</h5>
                                <p class="card-text">
                                    <span class="text-danger">Date Événements:</span><br>
                                    <span class="text-primary"><i class="fas fa-map-marker-alt"></i> King fakhad pace</span><br>
                                    Participez à notre atelier interactif et découvrez les dernières tendances en matière de développement personnel et de bien-être.
                                </p>
                                <a href="{{ route('details.events') }}" class="btn btn-primary">Voir plus</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="" alt="Image d'une illustration de plusieurs visages colorés" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Analyse de donnée</h5>
                                <p class="card-text">
                                    <span class="text-danger">Date Événements:</span><br>
                                    <span class="text-primary"><i class="fas fa-map-marker-alt"></i> King fakhad pace</span><br>
                                    Participez à notre atelier interactif et découvrez les dernières tendances en matière de développement personnel et de bien-être.
                                </p>
                                <a href="{{ route('details.events') }}" class="btn btn-primary">Voir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-3 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="mb-0">&copy; Copyright 2024, All Rights Reserved by SEN-EVENTS</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</body>
</html>
