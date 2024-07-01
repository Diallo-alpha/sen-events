<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

@extends('dashboardAssociation.layouts.app')

@section('content')
    <h1>Organisme Details</h1>
    <p>Nom: {{ $organisme->nom }}</p>
    <p>Description: {{ $organisme->description }}</p>
    <p>Logo: {{ $organisme->logo }}</p>
    <p>Adresse: {{ $organisme->adresse }}</p>
    <p>Secteur d'Activité: {{ $organisme->secteur_activite }}</p>
    <p>Ninea: {{ $organisme->ninea }}</p>
    <p>Date de Création: {{ $organisme->date_creation }}</p>
    <a href="{{ route('organismes.index') }}">Back to list</a>
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

