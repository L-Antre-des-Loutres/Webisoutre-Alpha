<!-- resources/views/includes/navbar.blade.php -->

<header>
    <style>
        body {
            overflow-y:scroll;
        }

        header {
            height: 0px;
        }

        .bouton-fixe {
            cursor: pointer;

            position: fixed;
            right: 4vh;
            top: 4vh;

            width: 72px;
            height: 72px;

            background-image: url('../images/buttons/minecraft/mc-button-fleche-gauche-menu.png');
            background-size: cover;
            
            z-index: 1000;
        }

        .bouton-fixe:hover {
            background-image: url('../images/buttons/minecraft/mc-button-fleche-gauche-menu-selected.png');
        }

        @media only screen and (max-width: 600px) {
            .bouton-fixe {
                position: fixed;
                right: 2vh;
                top: 2vh;

                width: 50px;
                height: 50px;

                background-image: url('../images/buttons/minecraft/mc-button-fleche-gauche-menu.png');
                background-size: cover;
            
                z-index: 1000;
            }

            .bouton-fixe:hover {
                background-image: url('../images/buttons/minecraft/mc-button-fleche-gauche-menu-selected.png');
            }
        }

    </style>

    <!-- Bouton navbar -->
    <div class="container">
        <div class="bouton-fixe" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbr"></div>
    </div>
    <!-- Fin bouton navbar -->

    <!-- Navbar -->
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('dashboard') }}" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Bienvenue, {{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profil de compte</a></li>
                            <li><a class="dropdown-item" href="#">Profil de joueur</a></li>
                        </ul>
                    </li>
                @else
                    <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                @endauth
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('accueil') }}">Accueil</a>
                <li class="nav-item">
                    <a class="nav-link" href="#">Qui sommes nous ?</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Nos serveur
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">La survie Vanila (& Créatif)</a></li>
                        <li><a class="dropdown-item" href="#">Les serveurs moddées</a></li>
                        <li><a class="dropdown-item" href="#">Arisoutre POV</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Classements
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item"
                                href="https://antredesloutres.online/minecraft/classement?classement=joueur">Joueur sur
                                tous serveurs</a></li>
                        <li><a class="dropdown-item"
                                href="https://antredesloutres.online/minecraft/classement?classement=serveur">Joueur par
                                serveur</a></li>
                    </ul>
                </li>
            </ul>
            <br><br><br><br><br><br>
            {{-- If joueurs < 2
                    <p id="placeholder">Vanilla                                       X joueur connecté</p>
                    If joueurs > 1 --}}
            <p id="placeholder">Vanilla                                       X joueurs connectés</p>
            <form class="d-flex mt-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Chercher un profil de joueur"
                    aria-label="Search">
                <button class="btn btn-success" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg>
                </button>
            </form>
        </div>
        <!-- Fin navbar -->
    </div>
</header>
