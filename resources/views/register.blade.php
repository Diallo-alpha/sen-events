<!DOCTYPE html>
<html lang="fr"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEN-EVENTS - Inscription</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            min-height: 100vh;
        }

        .left-panel,
        .right-panel {
            flex: 1;
            min-width: 300px;
        }

        .left-panel {
            background: url('Left2.png') no-repeat center center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }

        .left-panel img {
            width: 80%;
        }

        .right-panel {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .registration-form {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 767.98px) {
            .left-panel {
                height: 200px;
            }
        }

        @media (min-width: 768px) {
            .left-panel,
            .right-panel {
                flex: 1;
            }
        }
    </style>
</head><body>
    <div class="container">
        <div class="left-panel">
            <div>
                <h1>SEN-EVENTS</h1>
                <!-- <img src="Left2.png" alt="" class="img-fluid d-none d-md-block"> -->
                <div class="d-flex justify-content-center mt-3 pt-10">
                    <span class="badge badge-primary mx-1 my-80 pt-80">•</span>
                    <span class="badge badge-primary mx-1 my-80 pt-80">•</span>
                    <span class="badge badge-primary mx-1 my-80 pt-80">•</span>
                </div>
            </div>
        </div>
        <div class="right-panel">
            <form class="registration-form">
                <h2>inscription</h2>
                <div class="form-group">
                    <label for="firstName">Nom</label>
                    <input type="text" class="form-control" id="firstName" placeholder="Nom">
                </div>
                <div class="form-group">
                    <label for="lastName">Prénom</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Prénom">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="email@exemple.com">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirmer mot de passe</label>
                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirmer mot de passe">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Inscription</button>
            </form>
        </div>
    </div><script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body></html>

