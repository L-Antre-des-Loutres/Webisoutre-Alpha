@extends('layouts.tickets')

@section('content')
    <h1>Tickets</h1>
    <a href="{{ route('tickets.create') }}">Create Ticket</a>
    <ul>
        @foreach ($tickets as $ticket)
            <li>
                <a href="{{ route('tickets.show', $ticket->id) }}">{{ $ticket->titre }}</a>
            </li>
        @endforeach
    </ul>
@endsection
