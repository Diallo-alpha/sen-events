@include('portail.layouts.header')
@if (count($errors) > 0)
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container">
        <br>
        <a href="{{ route('organisme.dashboard') }}" class="btn btn-primary a-events">Retoure</a> <br>
        <h1 class="text-center">Créer un événement</h1>
        <form method="POST" action="{{ route('evenement.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez le nom de l'événement">
            </div>
            <div class="form-group">
                <label for="photo">Image</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
            <div class="form-group">
                <label for="lieu">Localisation</label>
                <input type="text" class="form-control" id="lieu" name="lieu" placeholder="Entrez la localisation de l'événement">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Entrez la description de l'événement"></textarea>
            </div>
            <div class="form-group">
                <label for="date_evenement">Date</label>
                <input type="datetime-local" class="form-control" id="date_evenement" name="date_evenement" value="2024-07-27T14:00">
            </div>
            <div class="form-group">
                <label for="places_disponible">Places Disponibles</label>
                <input type="number" class="form-control" id="places_disponible" name="places_disponible" placeholder="Nombre de places disponibles">
            </div>
            <div class="form-group">
                <label for="date_limite">Date Limite des inscriptions</label>
                <input type="datetime-local" class="form-control" id="date_limite" name="date_limite" value="2024-07-20T14:00">
            </div>
            <button type="submit" class="btn btn-primary">Créer l'événement</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
