<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer Société</title>
    <link rel="stylesheet" href="{{ asset('css/organismeResgistre.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-page">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Retour</a>
        <div class="image-section">
            <h1>Parlez-nous de votre <br> société</h1>
        </div>
        <div class="form-section">
            <div class="form-container">

                <!-- Success Message -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('organisme.store-organisme') }}" enctype="multipart/form-data">
                    @csrf

                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required autofocus>
                    @error('nom')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="ninea">Ninea</label>
                    <input type="text" id="ninea" name="ninea" value="{{ old('ninea') }}" required>
                    @error('ninea')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="logo">Logo</label>
                    <input type="file" id="logo" name="logo">
                    @error('logo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="adresse">Adresse</label>
                    <input type="text" id="adresse" name="adresse" value="{{ old('adresse') }}" required>
                    @error('adresse')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="secteur">Secteur</label>
                    <input type="text" id="secteur" name="secteur" value="{{ old('secteur') }}" required>
                    @error('secteur')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" value="{{ old('date') }}" required>
                    @error('date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="description">Description</label>
                    <textarea id="description" name="description" required>{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="motdepasse">Mot de passe</label>
                    <input type="password" id="motdepasse" name="password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <button type="submit" class="btn btn-primary">Créer</button>
                    <a href="{{ route('login') }}" class="btn btn-info">Connexion</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
