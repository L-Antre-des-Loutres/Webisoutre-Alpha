<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antre des Loutres - Tickets</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo/WebisoutreSmall.png') }}">

    <style>
        html {
            font-family: Arial, sans-serif;
        }
        
        body {
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 1.2em;
        }

        header a {
            color: white;
        }

        .undertext {
            font-size: 0.5em;
            color: white;
        }

        header div, header div a {
            text-align: right;
            font-size: 1.2em;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header>
        <h1>Antre des Loutres - Tickets <span class="undertext"><a href="{{ route('dashboard') }}">(Retour au dashboard en cliquant ici)</a></span></h1>
        <div>
            <a href="{{ route('tickets.index') }}">🎫 Liste des tickets</a> |
            <a href="{{ route('tickets.create') }}">➕ Crée un ticket</a>
        </div>
    </header>
    @yield('content')
</body>
</html>
