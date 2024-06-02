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
                <option value="ouvert" {{ $ticket->status == 'ouvert' ? 'selected' : '' }}>Ouvert</option>
                <option value="clot" {{ $ticket->status == 'clot' ? 'selected' : '' }}>Clot</option>
                <option value="attente" {{ $ticket->status == 'attente' ? 'selected' : '' }}>En attente</option>
            </select>
        </div>
        <div>
            <p>Ouvert par : {{ $ticket->user->name }}</p>
            <p>Date de création : {{ $ticket->created_at }}</p>
        </div>
        <button type="submit" class="button">Modifier</button>
    </form>
    <form action="{{ route('tickets.show', $ticket->id) }}">
        <button type="submit" class="button">Retour</button>
    </form>
@endsection