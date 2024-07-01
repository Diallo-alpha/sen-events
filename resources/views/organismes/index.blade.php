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
