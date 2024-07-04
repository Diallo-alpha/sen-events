@extends('layouts.app1')

@section('content')
    <div class="container">
        <h1>Ajouter une Réservation</h1>
        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            @if($evenement)
                <input type="text" name="nom" class="form-control" value="{{ $evenement->nom }}" readonly>
                <input type="hidden" name="evenement_id" value="{{ $evenement->id }}">
            @else
                <p>Event not found.</p>
            @endif

            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <div class="form-group">
                <label for="statut">Statut :</label>
                <select name="statut" class="form-control">
                    @if(auth()->user()->role == 'admin')
                        <option value="pending">En attente</option>
                        <option value="confirmed">Confirmé</option>
                    @else
                        <option value="pending">En attente</option>
                    @endif
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Réserver</button>
        </form>
    </div>
@endsection
