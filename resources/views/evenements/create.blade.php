<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@extends('dashboardAssociation.layouts.app')

@section('content')

<div class="container">
    <h1>Create Evenement</h1>
    <form action="{{ route('evenements.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <input type="hidden" value="3" name="organisme_id">
        </div>

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}">
            @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="date_evenement" class="form-label">Date Evenement</label>
            <input type="date" class="form-control @error('date_evenement') is-invalid @enderror" id="date_evenement" name="date_evenement" value="{{ old('date_evenement') }}">
            @error('date_evenement')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="lieu" class="form-label">Lieu</label>
            <input type="text" class="form-control @error('lieu') is-invalid @enderror" id="lieu" name="lieu" value="{{ old('lieu') }}">
            @error('lieu')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="places_disponible" class="form-label">Places Disponible</label>
            <input type="number" class="form-control @error('places_disponible') is-invalid @enderror" id="places_disponible" name="places_disponible" value="{{ old('places_disponible') }}">
            @error('places_disponible')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="date_limite" class="form-label">Date Limite</label>
            <input type="date" class="form-control @error('date_limite') is-invalid @enderror" id="date_limite" name="date_limite" value="{{ old('date_limite') }}">
            @error('date_limite')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


