<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<div class="menu-btn"></div>
<nav class="sidebar">
    <br><br><br>
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">L'Antre des Loutres</h5>
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
                    <li><a class="dropdown-item" href="{{ route('liste-serveurs') }}">Liste de nos serveurs</a></li>
                    <li><a class="dropdown-item" href="#">Arisoutre POV</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Classements</a>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="{{ route('classement-minecraft-joueur') }}">Joueur sur tous serveurs</a></li>
                    <li><a class="dropdown-item" href="{{ route('classement-minecraft-serveur') }}">Joueur par serveur</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://discord.com/invite/k4ZBFVdntp">Notre Discord<a>
            </li>
        </ul>
        <br>
        <iframe src="https://discord.com/widget?id=1112661701314228234&theme=dark" width="310" height="380"
            allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
    </div>
    <!-- Fin navbar -->
    </div>
</nav>
<script src="{{ asset('js/header.js') }}"></script>
