@extends('layouts.tickets')

@section('content')
    <h1>Create Ticket</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <div>
            <label for="titre">Title:</label>
            <input type="text" name="titre" id="titre" value="{{ old('titre') }}">
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
        </div>
        <div>
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="ouvert" {{ old('status') == 'ouvert' ? 'selected' : '' }}>Ouvert</option>
                <option value="clot" {{ old('status') == 'clot' ? 'selected' : '' }}>Clot</option>
                <option value="attente" {{ old('status') == 'attente' ? 'selected' : '' }}>En attente</option>
            </select>
        </div>
        <div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
