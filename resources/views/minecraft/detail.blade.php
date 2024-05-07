@extends('layouts.classement')

@section('title', 'Détails du serveur')

@section('content')
    <!-- Contenu spécifique à la page de détails d'un serveur -->
    <h1>Détails du serveur {{ $serveur->nom_serv }}</h1>
    <p class="lead">Vous trouverez ici l'ensemble des informations concernant le serveur {{ $serveur->nom_serv }}.</p>
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nom du serveur</th>
                    <th scope="col">Modpack</th>
                    <th scope="col">Version</th>
                    <th scope="col">Joueurs</th>
                    <th scope="col">Disponibilité</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $serveur->nom_serv }}</th>
                    <td><a href="{{ $serveur->modpack_url }}">{{ $serveur->modpack }}</a></td>
                    <td>{{ $serveur->version_serv }}</td>
                    <td>{{ $nb_joueurs ? $nb_joueurs->nb_joueurs : 0 }}</td>
                    <td>{{ $serveur->actif ? 'Disponible' : 'Indisponible' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <p class="lead">Liste des joueurs :</p>
    <ul>
        @foreach ($joueurs as $joueur)
            <li>{{ $joueur->username }}</li>
        @endforeach
    </ul>
@endsection
