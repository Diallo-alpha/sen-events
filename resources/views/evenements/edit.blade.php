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
    <h1>Éditer l'événement</h1>
    <a href="{{ route('organisme.dashboard') }}" class="btn btn-primary a-events">Retoure</a> <br>
    <form action="{{ route('evenement.update', $evenement->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $evenement->nom }}" required>
        </div>
        <div class="form-group">
            <label for="date_evenement">Date</label>
            <input type="date" name="date_evenement" id="date_evenement" class="form-control" value="{{ $evenement->date_evenement }}" required>
        </div>
        <div class="form-group">
            <label for="lieu">Lieu</label>
            <input type="text" name="lieu" id="lieu" class="form-control" value="{{ $evenement->lieu }}" required>
        </div>
        <div class="form-group">
            <label for="places_disponible">Places disponibles</label>
            <input type="number" name="places_disponible" id="places_disponible" class="form-control" value="{{ $evenement->places_disponible }}" required>
        </div>
        <div class="form-group">
            <label for="date_limite">Date limite des inscriptions</label>
            <input type="date" name="date_limite" id="date_limite" class="form-control" value="{{ $evenement->date_limite }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $evenement->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
