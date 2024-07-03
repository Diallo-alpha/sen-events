@extends('layouts.app1')


@section('content')
    <div class="container">
        <h1>Ajouter une Réservation</h1>
        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="evenement_id">ID de l'Événement :</label>
                <input type="text" name="evenement_id" class="form-control" value="{{ old('evenement_id') }}">
            </div>
            <div class="form-group">
                <label for="user_id">ID de l'Utilisateur :</label>
                <input type="text" name="user_id" class="form-control" value="{{ old('user_id') }}">
            </div>
            <div class="form-group">
                <label for="statut">Statut :</label>
                <input type="text" name="statut" class="form-control" value="{{ old('statut') }}">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
