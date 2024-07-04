@extends('layouts.app1')

@section('content')
    <div class="container">
        <h1>Liste des événements</h1>
        <a href="{{ route('evenement.create') }}" class="btn btn-primary">Créer un événement</a>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Date</th>
                    <th>Lieu</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($evenements as $evenement)
                    <tr>
                        <td>{{ $evenement->nom }}</td>
                        <td>{{ $evenement->date_evenement }}</td>
                        <td>{{ $evenement->lieu }}</td>
                        <td>
                            <a href="{{ route('evenement.show', $evenement->id) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('evenement.edit', $evenement->id) }}" class="btn btn-warning">Éditer</a>
                            <form action="{{ route('evenement.destroy', $evenement->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                            <a href="{{ route('reservations.create', ['evenement_id' => $evenement->id]) }}" class="btn btn-primary">Réserver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
