@extends('layouts.tickets')

@section('content')
    <h1>{{ $ticket->titre }}</h1>
    <p>{{ $ticket->description }}</p>
    <p>Status: {{ $ticket->status }}</p>
    <a href="{{ route('tickets.edit', $ticket->id) }}">Modifier</a>
    <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Suprimer</button>
    </form>
    <a href="{{ route('tickets.index') }}">Retour</a>
@endsection
