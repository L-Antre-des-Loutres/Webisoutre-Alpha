<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un nouveau serveur</title>
    @include('includes.head')
    <style>
        .minecraft-header-image {
            background-image: url('/images/transitions/minecraft/white-transition-bottom.png');
            background-size: cover;
            background-color: #212529;
            width: 100%;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <header>
        @include('includes.header')
    </header>
    <main>
        <div class="minecraft-header-image"></div>
        <h2>Créer un nouveau serveur</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.creerServeur.store') }}" method="post">
            @csrf

            <label for="nom_serv">Nom du serveur:</label>
            <input type="text" name="nom_serv" value="{{ old('nom_serv') }}" required>

            <label for="modpack">Modpack:</label>
            <input type="text" name="modpack" value="{{ old('modpack') }}" required>

            <label for="modpack_url">Modpack URL:</label>
            <input type="text" name="modpack_url" value="{{ old('modpack_url') }}" required>

            <label for="embedColor">Embed Color:</label>
            <input type="text" name="embedColor" value="{{ old('embedColor') }}" required>

            <label for="embedImage">Embed Image URL:</label>
            <input type="text" name="embedImage" value="{{ old('embedImage') }}" required>

            <label for="caption">Caption:</label>
            <input type="text" name="caption" value="{{ old('caption') }}" required>

            <label for="nom_monde">Nom du monde:</label>
            <input type="text" name="nom_monde" value="{{ old('nom_monde') }}" required>

            <label for="version_serv">Version du serveur:</label>
            <input type="text" name="version_serv" value="{{ old('version_serv') }}" required>

            <label for="path_serv">Chemin du serveur:</label>
            <input type="text" name="path_serv" value="{{ old('path_serv') }}" required>

            <label for="actif">Actif:</label>
            <input type="checkbox" name="actif" value="1" {{ old('actif') ? 'checked' : '' }}>

            <button type="submit">Créer le serveur</button>
        </form>
    </main>

    <footer>
        @include('includes.footer')
    </footer>
</body>

</html>
