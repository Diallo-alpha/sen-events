@extends('layouts.app')

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
