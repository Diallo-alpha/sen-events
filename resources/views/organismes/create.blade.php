<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

@extends('dashboardAssociation.layouts.app')

@section('content')
    <h1>Create Organisme</h1>
    <form action="{{ route('organismes.store') }}" method="POST">
        @csrf
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>

        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
            @error('logo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" id="adresse" required>

        <label for="secteur_activite">Secteur d'Activité:</label>
        <input type="text" name="secteur_activite" id="secteur_activite" required>
        <div class="mb-3">
            <label for="ninea" class="form-label">Ninea</label>
            <input type="file" class="form-control @error('ninea') is-invalid @enderror" id="ninea" name="ninea">
            @error('ninea')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <label for="date_creation">Date de Création:</label>
        <input type="date" name="date_creation" id="date_creation" required>

        <button type="submit">Submit</button>
    </form>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

