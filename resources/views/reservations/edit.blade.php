{{-- @extends('layouts.app1')

@section('content')
    <div class="container">
        <h1>Éditer une Réservation</h1>
        <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="evenement_id">ID de l'Événement :</label>
                <input type="text" name="evenement_id" class="form-control" value="{{ old('evenement_id', $reservation->evenement_id) }}">
            </div>
            <div class="form-group">
                <label for="user_id">ID de l'Utilisateur :</label>
                <input type="text" name="user_id" class="form-control" value="{{ old('user_id', $reservation->user_id) }}">
            </div>
            <div class="form-group">
                <label for="statut">Statut :</label>
                <input type="text" name="statut" class="form-control" value="{{ old('statut', $reservation->statut) }}">
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection --}}
