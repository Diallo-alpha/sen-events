@extends('layouts.app1')

@section('content')
    <div class="container">
        <h1>Ajouter une Réservation</h1>
        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="evenement_id">Événement :</label>
                <select name="evenement_id" class="form-control">
                    @foreach($evenements as $evenement)
                        <option value="{{ $evenement->nom }}">{{ $evenement->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="user_id">ID de l'Utilisateur :</label>
                <input type="text" name="user_id" class="form-control" value="{{ auth()->user()->id }}" readonly>
            </div>
            <div class="form-group">
                <label for="statut">Statut :</label>
                <select name="statut" class="form-control">
                  @auth
                  <option value="confirmed">Confirmé</option>
                  @endauth
                    <option value="pending">En attente</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
