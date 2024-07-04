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
                <label for="status">Status :</label>
                <select class="form-control" id="status" name="status" required>

                            @if(auth()->user()->role == 'association, admin')
                            @auth
                                <option value="approuvé">Approuvé</option>
                                <option value="refusé">Refusé</option>
                            @endauth
                    @else
                    <option value="nouveau">Nouveau</option>
                   @endif
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Réserver</button>
        </form>
    </div>
@endsection


