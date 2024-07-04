@extends('layouts.app1')

@section('content')
    <div class="container">
        <h1>Reservation Details</h1>
        <div class="card">
            <div class="card-header">
                <h2>{{ $reservation->id }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Evenement:</strong> {{ $reservation->evenement_id }}</p>
                <p><strong>User:</strong> {{ $reservation->user_id }}</p>
                <p><strong>Statut:</strong> {{ $reservation->statut }}</p>
            </div>
        </div>
        <a href="{{ route('reservations.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
