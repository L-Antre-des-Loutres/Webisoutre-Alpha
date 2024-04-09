<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('includes.head')
    <title>Modification serveur Minecraft</title>
    <style>
        input {
            width: 100%;
            margin-bottom: 10px;
        }

        button {
            width: 50%;
            margin-top: 10px;
            padding: 10px;
            border: none;
            border-radius: 50px;
            transition: 0.3s;
            color: white;
            background-color: #4CAF50;
            /* Centre le bouton au millieu de la page */
            position: relative;
            left: 50%;
            transform: translate(-50%, 0);
        }

        button:hover {
            background-color: #4CAF50;
            color: white;
            width: 55%;
            padding: 15px;
        }

        label {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <header>
        @include('includes.header')
    </header>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container">
                    <h2>Modifier le Serveur</h2>
                    <form action="{{ route('admin-update', ['id_serv' => $serveurID]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label for="nom_serv">Nom du serveur:</label>
                        <input type="text" name="nom_serv" value="{{ old('nom_serv', $serveur->nom_serv) }}" required>

                        <label for="modpack">Modpack:</label>
                        <input type="text" name="modpack" value="{{ old('modpack', $serveur->modpack) }}" required>

                        <label for="modpack_url">Modpack URL:</label>
                        <input type="text" name="modpack_url" value="{{ old('modpack_url', $serveur->modpack_url) }}"
                            required>

                        <label for="embedColor">Embed Color:</label>
                        <input type="text" name="embedColor" value="{{ old('embedColor', $serveur->embedColor) }}"
                            required>

                        <label for="embedImage">Embed Image:</label>
                        <input type="text" name="embedImage" value="{{ old('embedImage', $serveur->embedImage) }}"
                            required>

                        <label for="caption">Caption:</label>
                        <input type="text" name="caption" value="{{ old('caption', $serveur->caption) }}" required>

                        <label for="nom_monde">Nom du monde:</label>
                        <input type="text" name="nom_monde" value="{{ old('nom_monde', $serveur->nom_monde) }}"
                            required>

                        <label for="version_serv">Version du serveur:</label>
                        <input type="text" name="version_serv"
                            value="{{ old('version_serv', $serveur->version_serv) }}" required>

                        <label for="path_serv">Chemin du serveur:</label>
                        <input type="text" name="path_serv" value="{{ old('path_serv', $serveur->path_serv) }}"
                            required>

                        <label for="actif">Actif:</label>
                        <input type="checkbox" name="actif" value="1"
                            {{ old('actif', $serveur->actif) ? 'checked' : '' }}>

                        <button type="submit">Enregistrer les modifications</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
