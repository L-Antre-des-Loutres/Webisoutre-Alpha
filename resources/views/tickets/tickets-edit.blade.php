@extends('layouts.tickets')

@section('content')
    <h1>Edit Ticket</h1>
    <form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ $ticket->titre }}">
        <label for="description">Description:</label>
        <textarea name="description" id="description">{{ $ticket->description }}</textarea>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
            <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>Closed</option>
            <option value="pending" {{ $ticket->status == 'pending' ? 'selected' : '' }}>Pending</option>
        </select>
        <button type="submit">Submit</button>
    </form>
    <a href="{{ route('tickets.show', $ticket->id) }}">Retour</a>
@endsection
