<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sen-Events</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/connexion.css') }}">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 d-flex flex-column align-items-center justify-content-center image-container">
                <h1 class="text-white">SEN-EVENTS</h1>
                <div class="social-icons mt-3">
                    <img src="{{ asset('images/Left.svg') }}" alt="SEN-EVENTS" class="img-fluid">
                    <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="col-md-6 form-container">
                <h2 class="text-center mb-4">S'INSCRIRE</h2>
                <form>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="alpha.diallo@exemple.com">
                    </div>
                    <div class="form-group">
                        <label for="password">Mots de passe</label>
                        <input type="password" class="form-control" id="password" placeholder="Mots de passe">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">SE CONNECTER</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit-id.js" crossorigin="anonymous"></script>
</body>
</html>
