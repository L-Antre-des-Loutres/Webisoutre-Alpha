<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Badges</title>
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
    <h1>Liste des badges</h1>
    <ul>
        @foreach ($badges as $badge)
            <li>
                <strong>Titre :</strong> {{ $badge->title }}<br>
                <strong>Description :</strong> {{ $badge->description }}<br>
                <img src="{{ asset('images/badges/' . $badge->image_link) }}" alt="Badges">
                <!-- Bouton de récupération du badge si la condition est réunis -->
                @if ($badge->condition == 'discord_linked')
                    @if ($user->id_discord)
                    <!-- Vérifier si cette utilisateur n'as pas déjà ce badge -->
                        <form action="{{ route('getBadge', $badge->id) }}" method="post">
                            @csrf
                            <button type="submit">Récupérer le badge</button>
                        </form>
                    @endif
                @endif
                <br>
                @if ($badge->condition == 'minecraft_linked')
                    @if ($user->uuid_minecraft)
                        <form action="{{ route('getBadge', $badge->id) }}" method="post">
                            @csrf
                            <button type="submit">Récupérer le badge</button>
                        </form>
                    @endif
                @endif
            </li>
        @endforeach
    </ul>
</body>

</html>
