<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de {{ $user->name }}</title>
</head>
<style>
    /* Sélecteur pour l'image */
    img {
        /* Définit une largeur maximale de 100 pixels */
        max-width: 50px;
        /* Définit une hauteur maximale de 100 pixels */
        max-height: 50px;
    }
</style>

<body>
    <div id="Informations"></div>
    <h1>Profil de {{ $user->name }}</h1>

    <p><strong>Tag Discord :</strong> {{ $user->tag_discord }}</p>
    <p><strong>UUID Minecraft :</strong> {{ $user->uuid_minecraft }}</p>
    <p><strong>Pseudo :</strong> {{ $username }}</p>
    <div id="badges">
        <!-- Afficher chaque badge ID que l'utilisateur possède -->
        <p><strong>Badges :</strong></p>
        <ul>
            @foreach ($badges as $badge)
                <img src="{{ asset('images/badges/' . $badge->image) }}" alt="Badges">
            @endforeach
        </ul>
    </div>
</div>
<div id="stats">

    @if ($joueurStats->isEmpty())
    <div class="alert alert-warning" role="alert">
        Ce joueur n'a pas de statistiques de jeu sur nos serveurs.
    </div>
@else
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nom du serveur</th>
                <th scope="col">Temps de jeu</th>
                <th scope="col">Nombre de morts</th>
                <th scope="col">Distance parcourue</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($joueurStats as $stat)
                <tr>
                    <td>{{ $stat->nom_serv }}</td>
                    <td>{{ $stat->temp_jeux }}h</td>
                    <td>{{ $stat->nb_mort }}</td>
                    <td>{{ $stat->distTotale }} bloc</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
</div>
    <a href="{{ route('accueil') }}">Retour à l'accueil</a>
</body>

</html>
