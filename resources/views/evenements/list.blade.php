@extends('dashboardAssociation.layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

@section('content')
<div class="container">
    <h1>Evenements</h1>
    <a href="{{ route('evenements.create') }}" class="btn btn-primary mb-3">Add Evenement</a>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nom</th>
                <th>Photo</th>
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
                    <td>{{ $evenement->nom }}</td>
                    <td>
                        @if($evenement->photo)
                            <img src="{{ asset('images/'.$evenement->photo) }}" alt="{{ $evenement->nom }}" class="img-thumbnail" style="width: 100px;">
                        @endif
                    </td>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

@endsection

