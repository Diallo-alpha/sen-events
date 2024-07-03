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
                        <option value="{{ $evenement->id }}">{{ $evenement->nom }}</option>
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

