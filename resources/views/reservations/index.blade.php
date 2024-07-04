@extends('layouts.app1')

@section('content')
<div class="container border-box">
    <div class="container">
        <h1>Reservations</h1>
        <a href="{{ route('reservations.create') }}" class="btn btn-primary">Add Reservation</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>Evenement</th>
                <th>Statut</th>
                <th>Accepter</th>
                <th>Modifier</th>
                <th>Actions</th>
            </tr>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->evenement->nom }}</td>
                    <td>{{ $reservation->statut }}</td>
                    <td>
                        <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-info">Show</a>
                        {{-- <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-primary">Edit</a> --}}
                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
