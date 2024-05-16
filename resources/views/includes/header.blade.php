<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<div class="menu-btn"></div>
<nav class="sidebar">
    <br><br><br>
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
    </div>
    <br>
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
            </li>
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
                    <li><a class="dropdown-item" href="{{ route('classement-minecraft-joueur') }}">Joueur sur
                            tous serveurs</a></li>
                    <li><a class="dropdown-item" href="{{ route('classement-minecraft-serveur') }}">Joueur par
                            serveur</a></li>
                </ul>
            </li>
        </ul>
        <br><br><br>
        <p id="placeholder">Vanilla X joueurs connectés</p>
        <form class="d-flex mt-3" role="search">
            <input class="form-control me-1" type="search" placeholder="Chercher un profil de joueur"
                aria-label="Search">
            <button class="btn btn-success" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                </svg>
            </button>
        </form>
        <br><br>
        <iframe src="https://discord.com/widget?id=1112661701314228234&theme=dark" width="310" height="380"
            allowtransparency="true" frameborder="0"
            sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
    </div>
    <!-- Fin navbar -->
    </div>
</nav>
<script src="{{ asset('js/header.js') }}"></script>
