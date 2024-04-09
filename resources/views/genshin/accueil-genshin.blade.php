<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
    @include('includes.head')
    <script src="script.js"></script>
    <style>
        body {
            background-color: #000000;
        }

        main {
            color: #ffffff;
            padding: 20px;
            margin-top: 20px;
            font-family: 'GenshinFont', sans-serif;
        }

        /* Importation de la police GenshinFont */
        @font-face {
            font-family: 'GenshinFont';
            src: url('../fonts/GenshinFont3.ttf') format('truetype');
        }

        footer {
            bottom: 0;
            width: 100%;
        }

        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #h-page {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            height: 100vh;
        }

        button {
            background: #2f3640;
            border-radius: 40px;
            color: #fff;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 2px;
            transition: 0.2s;
            padding: 10px 20px;
        }

        button:hover {
            background: #fff !important;
            box-shadow: 0px 0px 10px #ffffff;
        }

        button:hover a {
            color: #000000;
        }

        a {
            text-decoration: none;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <!-- Contenu de la page -->
    <header>
        <!-- En-tête de la page -->
        @include('includes.header')
    </header>

    <main>
        <div id="h-page">
            <div id="title">
                <h1>Genshin.Loutre</h1>
            </div id="slogan">
            <div id="slogan">
                <p>Le site de référence où chaque joueur de Genshin Impact se sent comme une loutre dans l'eau, nageant
                    dans un océan de conseils et de ressources !</p>
            </div>
            <!-- <div id="h-btn">
                <button id="btn">
                     <a href="">Accéder au classement</a>
                </button>
            </div> -->
            <div id="h-banner" class="center-content">
                <div id="h-ban-1"><img class="banner-image" src="{{ asset('/images/icon/genshin/anemoG.png') }}"
                        alt="logoAnemo"></div>
                <div id="h-ban-2"><img class="banner-image" src="{{ asset('/images/icon/genshin/pyroG.png') }}"
                        alt="logoPyro"></div>
                <div id="h-ban-3"><img class="banner-image" src="{{ asset('/images/icon/genshin/cryoG.png') }}"
                        alt="logoCryo"></div>
                <div id="h-ban-4"><img class="banner-image" src="{{ asset('/images/icon/genshin/geoG.png') }}"
                        alt="logoGeo"></div>
                <div id="h-ban-5"><img class="banner-image" src="{{ asset('/images/icon/genshin/electroG.png') }}"
                        alt="logoElectro"></div>
                <div id="h-ban-6"><img class="banner-image" src="{{ asset('/images/icon/genshin/dendroG.png') }}"
                        alt="logoDendro"></div>
            </div>
            <iframe src="https://discord.com/widget?id=1112661701314228234&theme=dark" width="350" height="500"
                allowtransparency="true" frameborder="0"
                sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>

        </div>

    </main>

    <footer>
        <!-- Pied de page -->
        @include('includes.footer')
    </footer>
</body>

</html>
