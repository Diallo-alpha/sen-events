<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

@extends('dashboardAssociation.layouts.app')

@section('content')
    <h1>Edit Organisme</h1>
    <form action="{{ route('organismes.update', $organisme->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" value="{{ $organisme->nom }}" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required>{{ $organisme->description }}</textarea>

        <label for="logo">Logo:</label>
        <input type="text" name="logo" id="logo" value="{{ $organisme->logo }}">

        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" id="adresse" value="{{ $organisme->adresse }}" required>

        <label for="secteur_activite">Secteur d'Activité:</label>
        <input type="text" name="secteur_activite" id="secteur_activite" value="{{ $organisme->secteur_activite }}" required>

        <label for="ninea">Ninea:</label>
        <input type="text" name="ninea" id="ninea" value="{{ $organisme->ninea }}" required>

        <label for="date_creation">Date de Création:</label>
        <input type="date" name="date_creation" id="date_creation" value="{{ $organisme->date_creation }}" required>

        <button type="submit">Submit</button>
    </form>    <a href="{{ route('organismes.index') }}">Back to list</a>

@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

