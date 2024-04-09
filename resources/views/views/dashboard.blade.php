<x-app-layout>
    <x-slot name="header"></x-slot>
    <!-- Titre Antre des loutres avec une police aléatoire -->
    <style>
        /* Pour les polices aléatoires */

        /* Lobster */
        @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
        /* Chewy */
        @import url('https://fonts.googleapis.com/css2?family=Chewy&display=swap');
        /* Pacifico */
        @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');
        /* Bangers */
        @import url('https://fonts.googleapis.com/css2?family=Bangers&display=swap');
        /* Boogaloo */
        @import url('https://fonts.googleapis.com/css2?family=Boogaloo&display=swap');
        /* Baloo */
        @import url('https://fonts.googleapis.com/css2?family=Baloo&display=swap');
        /* Fredoka One */
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');
        /* Orbitron */
        @import url('https://fonts.googleapis.com/css2?family=Orbitron&display=swap');
        /* Press Start 2P */
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
        /* Archivo Black */
        @import url('https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap');

        .lobster {
            font-family: 'Lobster', cursive;
        }

        .chewy {
            font-family: 'Chewy', cursive;
        }

        .pacifico {
            font-family: 'Pacifico', cursive;
        }

        .bangers {
            font-family: 'Bangers', cursive;
        }

        .boogaloo {
            font-family: 'Boogaloo', cursive;
        }

        .baloo {
            font-family: 'Baloo', cursive;
        }

        .fredoka {
            font-family: 'Fredoka One', cursive;
        }

        .orbitron {
            font-family: 'Orbitron', sans-serif;
        }

        .pressstart {
            font-family: 'Press Start 2P', cursive;
        }

        .archivoblack {
            font-family: 'Archivo Black', sans-serif;
        }

        /* Pour le reste de la page */
        .footer-card-link {
            color: rgb(79, 77, 77)
        }

        .footer-card-link:hover {
            color: blue;
        }

        /* Correction de la couleur des boutons bootstrap */
        .btn-container {
            justify-content: center;
        }

        .btn-danger {
            color: #ff0000;
            width: 100%;
            padding:
        }

        .btn-danger:hover {
            color: #ffffff;
        }

        .btn-primary {
            color: blue;
            width: 100%;
        }

        .btn-primary:hover {
            color: #ffffff;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var fonts = ['lobster', 'chewy', 'pacifico', 'bangers', 'boogaloo', 'baloo', 'fredoka', 'orbitron',
                'pressstart', 'archivoblack'
            ];
            var randomFontClass = fonts[Math.floor(Math.random() * fonts.length)];
            document.getElementById('randomFont').classList.add(randomFontClass);
        });
    </script>
    <div style="justify-content: center; display: flex;">
        <h1 id="randomFont" style="font-size:4em; color:rgb(90, 57, 57)">Antre des loutres 🦦</h1>
    </div>
    <!-- Reste de la page -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Première ligne - Comptes -->
                <br>
                <div style="justify-content: center; display: flex;">
                    <h1 id="randomFont" style="font-size:2em">Comptes & Liaisons</h1>
                </div>
                <div class="container mt-4">
                    <div class="row justify-content-center">

                        <!-- Première colonne - Compte antre des loutres -->
                        <div class="col-md-4 mb-3">
                            <div class="card mx-auto" style="max-width: 15rem;">
                                <img class="card-img-top" src="{{ asset('images/logo/flou-loutre-ia.png') }}"
                                    title="Pdp">

                                <div class="card-body" style="max-height:80vh;">
                                    <h5 class="card-title" style="font-size: 1.25rem;">{{ Auth::user()->name }}</h5>
                                    <p class="card-text" style="font-size: 0.875rem;">Votre compte @if (Auth::user()->admin == 1)
                                            {{ "Admin de l'Antre des Loutres" }}@else{{ 'Antre des loutres' }}
                                        @endif
                                    </p>
                                    <br>
                                    <div class="btn-container">
                                        <a href="#"><button type="button"
                                                class="btn btn-primary">-</button></a><br><br>
                                        <a href="#"><button type="button"
                                                class="btn btn-primary">Paramètres</button></a><br><br>
                                        <a href="#"><button type="button"
                                                class="btn btn-danger">Déconnexion</button></a>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <a class="card-text" href="perdu.com"><small class="footer-card-link">> En savoir
                                            plus
                                            sur mes données de compte Antre des Loutres</small></a>
                                </div>
                            </div>
                        </div>

                        <!-- Deuxième colonne - Compte minecraft non lié -->
                        <?php
                         if (Auth::user()->uuid_minecraft == null) { ?>
                        <div class="col-md-4 mb-3">
                            <div class="card mx-auto" style="max-width: 15rem;">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-size: 1.25rem;">Pseudo Minecraft</h5>
                                    <p class="card-text" style="font-size: 0.875rem;">Aucun pseudo Minecraft lié.
                                        <br><br>Lié votre pseudo Minecraft permet :<br><br>
                                        •<br>
                                        •<br>
                                        •<br>
                                    </p>
                                    <br>
                                    <div class="btn-container">
                                        <a href="#"><button type="button" class="btn btn-success">Lié un pseudo
                                                Minecraft</button></a>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a class="card-text" href="perdu.com"><small class="footer-card-link">> En savoir
                                            plus
                                            sur mes données de joueurs Minecraft</small></a>
                                </div>
                            </div>
                        </div>

                        <!-- Deuxième colonne - Compte minecraft lié -->
                        <?php } else {
                            $response = file_get_contents("https://sessionserver.mojang.com/session/minecraft/profile/" . Auth::user()->uuid_minecraft);
                            
                            // Analyser & enregistrer la réponse
                            $data = json_decode($response, true);
                            $pseudonyme = $data['name'];

                            // Enregistrement au sein de la session
                            session(['pseudonyme_minecraft' => $pseudonyme]);

                            ?>
                        <div class="col-md-4 mb-3">
                            <div class="card mx-auto" style="max-width: 15rem;">
                                <img class="card-img-top" src="https://mc-heads.net/avatar/<?php echo $pseudonyme; ?>/200"
                                    alt="Photo de profil">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-size: 1.25rem;"><?php echo $pseudonyme; ?></h5>
                                    <p class="card-text" style="font-size: 0.875rem;">Votre pseudo Minecraft lié</p>
                                    <br>
                                    <div class="btn-container">
                                        <a href="#"><button type="button" class="btn btn-primary">Profil
                                                Joueur</button></a><br><br>
                                        <a href="#"><button type="button"
                                                class="btn btn-primary">Classement</button></a><br><br>
                                        <a href="#"><button type="button"
                                                class="btn btn-danger">Délié</button></a>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a class="card-text" href="perdu.com"><small class="footer-card-link">> En savoir
                                            plus sur mes données de joueurs Minecraft</small></a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <!-- Troisième colonne - Compte discord non lié -->
                        <?php if (Auth::user()->tag_discord == null) { ?>
                        <div class="col-md-4 mb-3">
                            <div class="card mx-auto" style="max-width: 15rem;">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-size: 1.25rem;">Compte Discord</h5>
                                    <p class="card-text" style="font-size: 0.875rem;">Aucun compte Discord lié.
                                        <br><br>Lié votre compte Discord permet :<br><br>
                                        •<br>
                                        •<br>
                                        •<br>
                                    </p>
                                    <br>
                                    <div class="btn-container">
                                        <a href="link-discord"><button type="button" class="btn btn-success">Lié un
                                                compte Discord</button></a>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <a class="card-text" href="perdu.com"><small class="footer-card-link">> En savoir
                                            plus sur mes données Discord</small></a>
                                </div>
                            </div>
                        </div>

                        <!-- Troisième colonne - Compte discord lié -->
                        <?php } else { ?>
                        <div class="col-md-4 mb-3">
                            <div class="card mx-auto" style="max-width: 15rem;">
                                <img class="card-img-top" src="{{ Auth::user()->pdp_discord }}" alt="Photo de profil">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-size: 1.25rem;">
                                        {{ /* Récupére l'id Discord stocké dans la session */ Auth::user()->tag_discord }}
                                    </h5>
                                    <p class="card-text" style="font-size: 0.875rem;">Votre compte Discord lié</p>
                                    <br>
                                    <div class="btn-container">
                                        <a href="https://discord.gg/k4ZBFVdntp"><button type="button"
                                                class="btn btn-primary">Profil & Stats Discord</button></a><br><br>
                                        <a href="#"><button type="button" class="btn btn-primary">Redirection
                                                Discord</button></a><br><br>
                                        <a href="#"><button type="button"
                                                class="btn btn-danger">Délié</button></a>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a class="card-text" href="perdu.com"><small class="footer-card-link">> En savoir
                                            plus sur mes données Discord</small></a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- Ligne de séparation
                <div class="container mt-4">
                    <div class="row justify-content-center">
                        <img class="card-img-top" src="{{ asset('images/line.png') }}" alt="line">
                    </div>
                </div>
                -->

                <!-- Deuxième ligne - Actions -->
                <br>
                <div style="justify-content: center; display: flex;">
                    <h1 id="randomFont" style="font-size:2em">Actions & Support</h1>
                </div>

                <div class="container mt-4">
                    <div class="row justify-content-center">
                        <div class="col-md-4 mb-3">
                            <div class="card mx-auto" style="max-width: 15rem;">
                                <img class="card-img-top" src="{{ asset('images/icon/ticket.png') }}" alt="ticket">
                                <div class="card-body">
                                    <div class="btn-container">
                                        <a href="#"><button type="button" class="btn btn-primary">Ouvrir un
                                                ticket</button></a><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card mx-auto" style="max-width: 15rem;">
                                <img class="card-img-top" src="{{ asset('images/icon/reset.png') }}" alt="reset">
                                <div class="card-body">
                                    <div class="btn-container">
                                        <a href="#"><button type="button" class="btn btn-primary">-
                                            </button></a><br>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <br>
                @if (Auth::user()->admin == 1)
                    <!-- Troisième ligne - Modération & Administation -->

                    <div style="justify-content: center; display: flex;">
                        <h1 id="randomFont" style="font-size:2em">Modération & Administation</h1>
                    </div>
                    <div class="container mt-4">
                        <div class="row justify-content-center">
                            <div class="col-md-4 mb-3">
                                <div class="card mx-auto" style="max-width: 15rem;">
                                    <img class="card-img-top" src="{{ asset('images/icon/reset.png') }}"
                                        alt="reset">
                                    <div class="card-body">
                                        <div class="btn-container">
                                            <a href="#"><button type="button"
                                                    class="btn btn-primary">-</button></a><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card mx-auto" style="max-width: 15rem;">
                                    <img class="card-img-top" src="{{ asset('images/icon/reset.png') }}"
                                        alt="reset">
                                    <div class="card-body">
                                        <div class="btn-container">
                                            <a href="#"><button type="button"
                                                    class="btn btn-primary">-</button></a><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card mx-auto" style="max-width: 15rem;">
                                    <img class="card-img-top" src="{{ asset('images/icon/reset.png') }}"
                                        alt="reset">
                                    <div class="card-body">
                                        <div class="btn-container">
                                            <a href="#"><button type="button"
                                                    class="btn btn-primary">-</button></a><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
