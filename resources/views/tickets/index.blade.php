@extends('layouts.tickets')

@section('content')
    <h1>Tickets</h1>
    <form action="{{ route('tickets.create') }}">
        <button type="submit" class="button">Ouvrir un ticket</button>
    </form>
    <h1>Liste des tickets</h1>
    <!-- Tableau pour afficher les tickets -->
    <table>
        <tr>
            <th>Titre</th>
            <th>Statut</th>
            <th>Ouvert par</th>
            <th>Actions</th>
        </tr>
        @foreach ($tickets as $ticket)
            <tr>
                <td>
                    <a href="{{ route('tickets.show', $ticket) }}">{{ $ticket->titre }}</a>
                </td>
                <td>{{ $ticket->status }}</td>
                <td>{{ $ticket->user->name }}</td>
                <td>
                    <form action="{{ route('tickets.show', $ticket) }}" method="GET">
                        <button type="submit" class="button">Voir</button>
                    </form>
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
                </td>
            </tr>
        @endforeach
    </table>
@endsection
