@extends('layouts.classement')

@section('title', 'Liste des badges')

@section('content')

<h1>Liste des badges</h1>

<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Condition</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($badges as $badge)
            <tr>
                <td>{{ $badge->title }}</td>
                <td>{{ $badge->description }}</td>
                <td>{{ $badge->condition }}</td>
                <td>
                    @if ($badge->image_link)
                    <img src="{{ asset('images/badges/' . $badge->image_link) }}" alt="Badge Image">
                    @else
                        Pas d'image
                    @endif
                </td>
                <td>
                    <a href="{{ route('badge.update.form', ['badgeId' => $badge->id]) }}">Edit</a>
                    <form id="delete-form-{{ $badge->id }}" action="{{ route('badge.delete', ['badge_id' => $badge->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete({{ $badge->id }})">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    // Script JS qui affiche un message de confirmation avant de supprimer un badge
    function confirmDelete(badgeId) {
        if (confirm('Êtes-vous sûr de vouloir supprimer ce badge?')) {
            var deleteForm = document.getElementById('delete-form-' + badgeId);
            deleteForm.submit();
        }
    }
</script>

<style>
    /* styles.css */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 20px;
}

h1 {
    text-align: center;
    color: #343a40;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #343a40;
    color: white;
}

tr:hover {
    background-color: #f1f1f1;
}

img {
    max-width: 100px;
    height: auto;
}

td a {
    margin-right: 10px;
    color: #007bff;
    text-decoration: none;
}

td form {
    display: inline;
}

td form button {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}

td form button:hover {
    background-color: #c82333;
}

td a:hover {
    text-decoration: underline;
}

</style>


@endsection
