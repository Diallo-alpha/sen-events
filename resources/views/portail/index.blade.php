<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sen-Events</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container-nav">
        <div class="logo">Sen-Events</div>
        <div class="nav-links">
            <a href="{{ route('portail.index') }}" class="nav-link">Accueil</a>
            <a href="#" class="nav-link">Événements</a>
            <a href="#" class="nav-link">À Propos</a>
        </div>

        @if (Auth::guard('web')->check())
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="button">Déconnexion</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @elseif (Auth::guard('organisme')->check())
            <a href="{{ route('organisme.logout') }}"
               onclick="event.preventDefault(); document.getElementById('organisme-logout-form').submit();"
               class="button">Déconnexion</a>
            <form id="organisme-logout-form" action="{{ route('organisme.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @elseif (Auth::guard('admins')->check())
            <a href="{{ route('admin.logout') }}"
               onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();"
               class="button">Déconnexion</a>
            <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
        <a href="{{ route('organisme.register') }}" class="button button-create-event">
            <i class="fas fa-plus"></i> <span></span>Créer un événement
        </a>
        <a href="{{ route('login') }}" class="button">Connexion</a>
        @endif
    </div>
    <section class="hero">
        <div id="heroCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#heroCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#heroCarousel" data-slide-to="1"></li>
                <li data-target="#heroCarousel" data-slide-to="2"></li>

            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/slide05.svg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Organisez vos événements</h5>
                        <p>Avec simplicité et efficacité</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/slide02.svg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Des outils puissants</h5>
                        <p>Pour tous vos besoins</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/slide01.svg') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Créez des expériences mémorables</h5>
                        <p>Avec notre plateforme</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Précédent</span>
            </a>
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Suivant</span>
            </a>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-4 a-propos">
                    <h2 class="titre-section">À propos de nous</h2>
                </div>
                <div class="col-md-6">
                    <p class="lead">Bienvenue sur notre plateforme de gestion d'événements, votre partenaire de confiance pour organiser, planifier et réussir tous vos événements. Nous offrons des outils intuitifs et puissants pour simplifier chaque étape de la gestion d'événements, des inscriptions aux réservations en passant par la communication. Que vous organisiez une petite réunion ou une grande conférence, notre mission est de vous aider à créer des expériences inoubliables.</p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('images/a-propos.svg') }}" alt="Image de deux personnes s'aidant mutuellement à grimper une montagne" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-4 a-propos">
                    <h2 class="titre-section">Événements</h2>
                </div>
                @foreach($evenements as $evenement)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('public/'.$evenement->photo) }}" alt="Image de l'événement" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $evenement->nom }}</h5>
                            <p class="card-text">
                                <span class="text-danger">{{ $evenement->date_evenement }}</span><br>
                                <span class="text-primary"><i class="fas fa-map-marker-alt"></i> {{ $evenement->lieu }}</span><br>
                                {{ Str::limit($evenement->description, 100) }}
                                <br>
                               Places disponibles <strong> : {{ $evenement->places_disponible }}</strong><br>
                               Organisé par : <strong>{{ $evenement->organisme->nom }}</strong>
                            </p>
                            <a href="{{ route('details.events', $evenement->id) }}" class="btn btn-primary">Voir plus</a>
                        </div>
                    </div>
                </div>
            @endforeach
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
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</body>
</html>
