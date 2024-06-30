<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEN-EVENTS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/inscription.css') }}">
</head>
<body>
    <div class="container-fluid">
        <div class="row no-gutters">
            <div class="col-md-6 left">
                <img src="{{ asset('images/Left.svg') }}" alt="SEN-EVENTS" class="img-fluid">
                <div class="social-links">
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="col-md-6 right d-flex flex-column align-items-center justify-content-center right">
                <h1>inscription</h1>
                <h2>connexion</h2>
                <form>
                    <div class="sect1 d-flex">
                        <div class="form-group mr-2">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" placeholder="nom">
                        </div>
                        <div class="form-group ml-2">
                            <label for="prenom">Prenom</label>
                            <input type="text" class="form-control" id="prenom" placeholder="Prénom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="alpha.diallo@exemple.com">
                    </div>
                    <div class="sect1 d-flex">
                        <div class="form-group mr-2">
                            <label for="password">Mots de passe</label>
                            <input type="password" class="form-control" id="password" placeholder="Mots de passe">
                        </div>
                        <div class="form-group ml-2">
                            <label for="confirm-password">confirmer mots de passe</label>
                            <input type="password" class="form-control" id="confirm-password" placeholder="confirmer mots de passe">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
