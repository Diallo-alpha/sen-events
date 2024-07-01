<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEN-EVENTS - Connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container-fluid">
        <div class="row no-gutters">
            <div class="col-md-6 left d-flex align-items-center justify-content-center">
                <div class="content text-center">
                    <img src="{{ asset('images/Left.svg') }}" alt="SEN-EVENTS" class="img-fluid">
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 right d-flex align-items-center justify-content-center right">
                <div class="content">
                    <h1>Connexion</h1> <br>
                    <form>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="alpha.diallo@exemple.com">
                        </div>
                        <div class="form-group">
                            <label for="password">Mots de passe</label>
                            <input type="password" class="form-control" id="password" placeholder="Mots de passe">
                        </div>
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </form>
                    <br>
                   <a href="#"><span>S'INSCRIRE</span></a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
