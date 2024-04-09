<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .menu-btn {
            background-image: url('../images/buttons/minecraft/mc-button-fleche-gauche-menu.png');
            background-size: cover;
            cursor: pointer;

            position: fixed;
            right: 20px;
            top: 20px;
            width: 72px;
            height: 72px;

            z-index: 1000;
        }

        .menu-btn:hover {
            background-image: url('../images/buttons/minecraft/mc-button-fleche-gauche-menu-selected.png');
        }

        .sidebar {
            background: #343434;
            
            position: fixed;
            top: 0;
            right: -350px;
            width: 350px;
            height: 100%;
            transition: all 0.3s ease;

            z-index: 999;
        }

        .sidebar ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .sidebar * {
            color: #fff;
            text-decoration: none;
            
            padding-left: 50px;
        }

        .sidebar.active {
            right: 0;
        }

        .mc-trans-header {
            right: -450px;
            translate: (-150%, -50%);
        }
    </style>
</head>

<body>
    <div class="menu-btn"></div>
    <nav class="sidebar">
      <br><br><br><br><br><br>
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
    </nav>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuBtn = document.querySelector('.menu-btn');
            const sidebar = document.querySelector('.sidebar');
            const content = document.querySelector('.content');

            menuBtn.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                content.classList.toggle('active');
            });
        });
    </script>
</body>

</html>
