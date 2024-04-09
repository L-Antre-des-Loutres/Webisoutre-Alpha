@extends('layouts.classement')

@section('title', 'Accueil')

<style>
    .badgeTop {
        width: 120px;
        transition: width 0.3s;
    }

    .badgeTop:hover {
        width: 150px;
    }

    th {
        text-align: center;
    }

    /*  Animation de la couleur de texte */
    @keyframes scroll {
        0% {
            background-position: 0 0;
        }

        100% {
            background-position: 100% 0;
        }
    }

    @keyframes enchantment {
        0% {
            text-shadow: 0 0 10px #4B0082, 0 0 20px #4B0082, 0 0 30px #4B0082, 0 0 40px #4B0082, 0 0 50px #4B0082, 0 0 60px #4B0082, 0 0 70px #4B0082, 0 0 80px #4B0082;
        }

        50% {
            text-shadow: none;
        }

        100% {
            text-shadow: 0 0 10px #4B0082, 0 0 20px #4B0082, 0 0 30px #4B0082, 0 0 40px #4B0082, 0 0 50px #4B0082, 0 0 60px #4B0082, 0 0 70px #4B0082, 0 0 80px #4B0082;
        }
    }

    @keyframes diamondShine {
        0% {
            color: #00f;
        }

        50% {
            color: rgb(25, 216, 206);
        }

        100% {
            color: #00f;
        }
    }

    .user {
        background: linear-gradient(to right, #ff5733, #00bfff);
        /* Dégradé de couleur */
        background-size: 200% auto;
        -webkit-background-clip: text;
        /* Permet d'appliquer le dégradé comme couleur de texte */
        background-clip: text;
        color: transparent;
        /* Rend le texte transparent pour laisser le dégradé visible */
        animation: scroll 3s linear infinite;
        /* Animation avec une durée de 5 secondes et une répétition infinie */
    }

    .top1off {
        color: #9600a3;
        font-family: Arial, sans-serif;
        animation: enchantment 8s linear infinite;
        /* Animation d'enchantement */
    }

    .top2off {
        font-family: Arial, sans-serif;
        animation: diamondShine 10s infinite;
        /* Animation de l'effet de scintillement */
    }

    .top3off {
    font-family: Arial, sans-serif; /* Choisissez une police de caractères qui semble métallique */
    color: #b0b0b0; /* Couleur de la police métallique */
    text-shadow: 0 0 5px rgba(255, 255, 255, 0.5); /* Ombre portée pour un effet 3D */
    background: linear-gradient(to right, #444, #666); /* Dégradé pour simuler le métal brossé */
    border-radius: 10px; /* Coins arrondis pour un aspect plus doux */
    border: 1px solid #999; /* Bordure pour plus de profondeur */
    padding: 10px; /* Marge intérieure pour plus d'espace */
}
</style>

<?php
$serveurChoix = request()->serveurChoix;
function formatDistance($distance)
{
    if ($distance >= 1000000) {
        return number_format($distance / 1000000, 2) . 'M';
    } elseif ($distance >= 100000) {
        return number_format($distance / 1000) . 'K';
    } elseif ($distance >= 1000) {
        return number_format($distance / 1000) . 'K';
    } else {
        return number_format($distance);
    }
}
?>
@section('content')
    <!-- Contenu spécifique à la page de liste des joueurs -->
    <h1>Liste des Joueurs</h1>
    <div class="container" id="navlink">
        <ul class="nav nav-underline">
            <li class="nav-item">
                <a class="nav-link" href="?classement=joueur">Joueurs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?classement=serveur">Serveur</a>
            </li>
        </ul>
    </div>
    <div class="container" id="tabclassement">
        <!-- Tableau de classement des joueurs temporaire -->
        @if (request()->classement === 'joueur')
            <h4>Classement des joueurs</h4>
            <br>
            <div class="table-responsive" id="tabHJoueur">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Classement</th>
                            <th scope="col">Joueur</th>
                            <th scope="col">Total Heures</th>
                            <th scope="col">Nombre de mort</th>
                            <th scope="col">Distance parcourue en bloc</th>
                            <th scope="col">Serveur</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($statsParJoueur as $i => $stat)
                            <tr class="{{ $i < 3 ? 'classement-top' : '' }}">
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>
                                    @if ($i === 0)
                                        <img src="{{ asset('images/badges/BadgeHeureMcTop1.gif') }}" alt="Logo SVG"
                                            class="badgeTop" title="Top 1 des temps de jeu"><span class="top1">
                                        @elseif ($i === 1)
                                            <img src="{{ asset('images/badges/BadgeHeureMcTop2.gif') }}" alt="Logo SVG"
                                                class="badgeTop" title="Top 2 des temps de jeu"><span class="top2">
                                            @elseif ($i === 2)
                                                <img src="{{ asset('images/badges/BadgeHeureMcTop3.gif') }}" alt="Logo SVG"
                                                    class="badgeTop" title="Top 3 des temps de jeu"><span class="top3">
                                    @endif <img
                                        src="https://mc-heads.net/avatar/{{ $stat->username }}/25" alt="Tête Minecraft">
                                    @if ($stat->username === session('pseudonyme_minecraft'))
                                        </span><span class="user">{{ $stat->username }}</span>
                                    @else
                                        {{ $stat->username }}</span>
                                    @endif
                                </td>
                                <td>{{ $stat->total_heures }}</td>
                                <td>{{ $stat->total_morts }}</td>
                                <td>{{ formatDistance($stat->total_dist) }}</td>
                                <td>Tous</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif (request()->classement === 'serveur')
            @foreach ($serveurs as $serveur)
                <a href="{{ route('classement-minecraft', ['serveurChoix' => $serveur->nom_serv, 'classement' => 'serveur']) }}"
                    class="btn btn-primary">{{ $serveur->nom_serv }}</a>
            @endforeach
    </div>
    <br>
    @if ($serveurChoix)
        <p>Classement du serveur : {{ $serveurChoix }}</p>
        <div class="table-responsive" id="tabHServ">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th scope="col">Classement</th>
                        <th scope="col">Joueur</th>
                        <th scope="col">Total Heures</th>
                        <th scope="col">Nombre de mort</th>
                        <th scope="col">Distance parcourue en bloc</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($statsParJoueurParServeur as $i => $stat)
                        <tr class="{{ $i < 3 ? 'classement-top' : '' }}">
                            <th scope="row">{{ $i + 1 }}</th>
                            <td>
                                @if ($i === 0)
                                    <img src="{{ asset('images/badges/BadgeHeureMcTop1.gif') }}" alt="Logo SVG"
                                        class="badgeTop" title="Top 1 des temps de jeu">
                                @elseif ($i === 1)
                                    <img src="{{ asset('images/badges/BadgeHeureMcTop2.gif') }}" alt="Logo SVG"
                                        class="badgeTop" title="Top 2 des temps de jeu">
                                @elseif ($i === 2)
                                    <img src="{{ asset('images/badges/BadgeHeureMcTop3.gif') }}" alt="Logo SVG"
                                        class="badgeTop" title="Top 3 des temps de jeu">
                                @endif <img src="https://mc-heads.net/avatar/{{ $stat->username }}/25"
                                    alt="Tête Minecraft"> {{ $stat->username }}
                            </td>
                            <td>{{ $stat->total_heures }}</td>
                            <td>{{ $stat->total_morts }}</td>
                            <td>{{ formatDistance($stat->total_dist) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script>
            // Script jQuery pour ajouter la classe 'active' après le clic
            $(document).ready(function() {
                $('#serveursNav .nav-link').on('click', function(e) {
                    e.preventDefault(); // Empêche le comportement de lien par défaut

                    // Supprime la classe 'active' de tous les liens
                    $('#serveursNav .nav-link').removeClass('active font-weight-bold');

                    // Ajoute la classe 'active' au lien cliqué
                    $(this).addClass('active font-weight-bold');
                });
            });
        </script>
    @else
        <p>Choisissez un serveur pour voir le classement.</p>
    @endif
@else
    <h1>Merci de choisir une catégorie que vous souhaitez afficher.</h1>
    @endif

    </div>
@endsection
