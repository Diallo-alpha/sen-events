<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container">
        <div class="left-section">
            <h1>SEN-EVENTS</h1>
            <div class="social-links">
                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
        <div class="right-section">
            <h2>CONNEXION</h2>
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Mot de passe" required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                <button type="submit">SE CONNECTER</button>
            </form>
            <div class="link-register">
                <span><a href="{{ route('register') }}">S'inscrire</a></span>
            </div>
        </div>
    </div>
</body>
</html>
