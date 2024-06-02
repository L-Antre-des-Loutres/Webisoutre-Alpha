@extends('layouts.tickets')

@section('content')
    <h1>{{ $ticket->titre }}</h1>
    <p>{{ $ticket->description }}</p>
    <p><span style="font-weight: bold;">Statut : <span><span style="font-weight: normal;">{{ $ticket->status }}</span></p>
    @if (Auth::user()->admin == 1)
        <form action="{{ route('tickets.edit', $ticket) }}" method="GET">
            <button type="submit" class="button">Modifier</button>
        </form>
        <form action="{{ route('tickets.destroy', $ticket) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="button">Supprimer</button>
        </form>
    @endif
    <form action="{{ route('tickets.index') }}">
        <button type="submit" class="button">Retour</button>
    </form>
@endsection
