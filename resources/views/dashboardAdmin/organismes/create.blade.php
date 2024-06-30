@extends('layouts.app')

@section('content')
    <h1>Create Organisme</h1>
    <form action="{{ route('organismes.store') }}" method="POST">
        @csrf
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>

        <label for="logo">Logo:</label>
        <input type="text" name="logo" id="logo">

        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" id="adresse" required>

        <label for="secteur_activite">Secteur d'Activité:</label>
        <input type="text" name="secteur_activite" id="secteur_activite" required>

        <label for="ninea">Ninea:</label>
        <input type="text" name="ninea" id="ninea" required>

        <label for="date_creation">Date de Création:</label>
        <input type="date" name="date_creation" id="date_creation" required>

        <button type="submit">Submit</button>
    </form>
@endsection
