<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation Association</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container-fluid">
        <div class="row no-gutters">
            <div class="col-md-6 left d-flex align-items-center justify-content-center">
                <div class="content text-center">
                    <img src="{{ asset('images/Left.svg') }}" alt="Parler nous de votre societer " class="img-fluid">
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 right d-flex align-items-center justify-content-center right">
                <div class="content">
                    <form>
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="nom" class="form-control" id="nom" placeholder="SEN-EVENTS">
                        </div>
                        <div class="mb-3">
                            <label for="ninea" class="form-label">Ninea</label>
                            <input type="file" class="form-control @error('ninea') is-invalid @enderror" id="ninea" name="ninea">
                            @error('ninea')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="adresse" class="form-control" id="adresse" placeholder="adresse">
                        </div>
                        <div class="form-group">
                            <label for="secteur">Secteur</label>
                            <input type="secteur" class="form-control" id="secteur" placeholder="secteur">
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" placeholder="date">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="description" class="form-control" id="description" placeholder="description">
                        </div>
                        <button type="submit" class="btn btn-primary">Créer</button>
                    </form>
                    <br>
                   <button type="login" class="btn btn-primary">Se connecter</button>
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
