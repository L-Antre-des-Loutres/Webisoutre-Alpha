<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>L'Antre des Loutres</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Add this at the end of your head tag -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        .custom-column {
            height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: rgb(255, 255, 255);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            text-align: center;
            background-size: cover;
            background-position: center;
            transition: width 0.3s ease;
        }

        #colonne1 {
            background-image: url('/images/background/minecraft/vanilla-spawn.png');
        }

        #colonne2 {
            background-image: url('/images/background/genshin/ArbreSumeru.png');
            /* Arbre Sumeru background-image: url('https://cdn.discordapp.com/attachments/1201559919887929396/1207086659284373504/20240213231112.png?ex=65de5e0e&is=65cbe90e&hm=e5b7e666d7ed352b68f043276d8874de51e5cc6ff3a19f5b3db00e1c56c90735&');*/
            /* Fôret Inazuma background-image: url('https://cdn.discordapp.com/attachments/1201559919887929396/1207084776951906354/20240213230346.png?ex=65de5c4d&is=65cbe74d&hm=9fb20371865239815430d56d6cd0a455feef94edbf7aec6c9bb03d2f9afd6916&'); */
            /* Chateau Raiden de nuit : background-image: url('https://cdn.discordapp.com/attachments/1201559919887929396/1207084776951906354/20240213230346.png?ex=65de5c4d&is=65cbe74d&hm=9fb20371865239815430d56d6cd0a455feef94edbf7aec6c9bb03d2f9afd6916&'); */
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
        }

        #login-icon {
            position: fixed;
            /* Fixe l'icône à une position spécifique */
            top: 10px;
            /* Distance du haut de la page */
            right: 10px;
            /* Distance du côté droit de la page */
            font-size: 24px;
            /* Taille de l'icône */
        }

        #login-icon i {
            color: white;
            /* Couleur de l'icône */
        }

        /* Pour les petits écrans (moins de 768px) */
        @media (max-width: 767px) {
            .custom-column {
                height: 50vh;
                /* Réduit la hauteur sur les petits écrans */
            }
        }

        /* Pour les écrans de taille moyenne (tablette, 768px et plus) */
        @media (min-width: 768px) {
            .custom-column {
                width: 50%;
                flex-direction: row;
            }
        }
    </style>
</head>

<body>
    <div id="login-icon">
        <a href="/login">
            <i class="fas fa-user"></i>
        </a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!-- Première colonne : minecraft -->
            <div id="colonne1" class="col-md-6 custom-column">
                <div class="container">
                    <h1>Minecraft</h1>
                    <a href="{{ route('accueil-minecraft') }}" class="btn btn-custom">Accéder à la page Minecraft</a>
                </div>
            </div>

            <!-- Deuxième colonne : genshin -->
            <div id="colonne2" class="col-md-6 custom-column">
                <div class="container">
                    <h1>Genshin</h1>
                    <a href="{{ route('accueil-genshin') }}" class="btn btn-custom">Accéder à la page Genshin Impact</a>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        if ($(window).width() >= 768) { // Si la largeur de la fenêtre est supérieure ou égale à 768px
            $("#colonne1").hover(
                function() {
                    $(this).css('width', '60%', 'box');
                    $("#colonne2").css('width', '40%');
                },
                function() {
                    $(this).css('width', '50%');
                    $("#colonne2").css('width', '50%');
                }
            );
            $("#colonne2").hover(
                function() {
                    $(this).css('width', '60%');
                    $("#colonne1").css('width', '40%');
                },
                function() {
                    $(this).css('width', '50%');
                    $("#colonne1").css('width', '50%');
                }
            );
        }
    });
</script>

</html>
