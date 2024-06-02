@extends('layouts.tickets')

@section('content')
    <h1>Modifier le ticket n°{{ $ticket->id }}</h1>
    <form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="titre">Modifier le ticket "{{ $ticket->titre }}"</label>
            <input type="text" name="titre" id="titre" value="{{ $ticket->titre }}">
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea name="description" id="description">{{ $ticket->description }}</textarea>
        </div>
        <div>
            <label for="status">Statut :</label>
            <select name="status" id="status">
                <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>Closed</option>
                <option value="pending" {{ $ticket->status == 'pending' ? 'selected' : '' }}>Pending</option>
            </select>
        </div>
        <button type="submit">Valider</button>
    </form>
    <form action="{{ route('tickets.show', $ticket->id) }}">
        <button type="submit" class="button">Retour</button>
    </form>
@endsection
