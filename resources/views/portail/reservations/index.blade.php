@extends('layouts.app1')

@section('content')
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
                <th>ID</th>
                <th>Evenement ID</th>
                <th>User ID</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->evenement_id }}</td>
                    <td>{{ $reservation->user_id }}</td>
                    <td>{{ $reservation->statut }}</td>
                    <td>
                        <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-primary">Edit</a>
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
@endsection
