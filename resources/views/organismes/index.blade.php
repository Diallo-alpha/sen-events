<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@extends('dashboardAssociation.layouts.app')

@section('content')
    <h1>Organismes</h1>
    <a href="{{ route('organismes.create') }}">Create Organisme</a>
    <ul>
        @foreach($organismes as $organisme)
            <li>
                <a href="{{ route('organismes.show', $organisme->id) }}">{{ $organisme->nom }}</a>
                <a href="{{ route('organismes.edit', $organisme->id) }}">Edit</a>
                <form action="{{ route('organismes.destroy', $organisme->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

