<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SEN-EVENTS')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
            <a href="{{ route('login') }}" class="button">Connexion</a>
        @endif
    </div>
