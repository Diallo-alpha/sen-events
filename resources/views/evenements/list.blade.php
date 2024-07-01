@extends('dashboardAssociation.layouts.app')


@section('content')
<div class="container">
    <h1>Evenements</h1>
    <a href="{{ route('evenements.create') }}" class="btn btn-primary mb-3">Add Evenement</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Date</th>
                <th>Lieu</th>
                <th>Places Disponible</th>
                <th>Date Limite</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evenements as $evenement)
                <tr>
                    <td>
                        @if($evenement->photo)
                            <img src="{{ asset('images/'.$evenement->photo) }}" alt="{{ $evenement->nom }}" class="img-thumbnail" style="width: 100px;">
                        @endif
                    </td>
                    <td>{{ $evenement->nom }}</td>
                    <td>{{ $evenement->description }}</td>
                    <td>{{ $evenement->date_evenement }}</td>
                    <td>{{ $evenement->lieu }}</td>
                    <td>{{ $evenement->places_disponible }}</td>
                    <td>{{ $evenement->date_limite }}</td>
                    <td>
                        <a href="{{ route('evenements.edit', $evenement->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
