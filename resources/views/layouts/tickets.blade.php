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

        .main-content {
            padding-left: 1.5em;
            padding-right: 1.5em;
        }

        .button {
            background-color: #333;
            color: white;
            padding: 0.5em 1em;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1em;
        }

        .button:hover {
            background-color: #555;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
            font-size: 1.2em;
        }

        tr {
            font-size: 1.2em;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #c0c0c0;
        }

        td a {
            text-decoration: none;
            color: darkblue;
            font-weight: bold;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 50%;
        }

        div {
            margin: 0.5em 0;
        }

        label {
            font-weight: bold;
        }

        input, textarea, select {
            width: 100%;
            padding: 0.5em;
            border-radius: 5px;
            border: 1px solid #333;
        }

        button {
            background-color: #333;
            color: white;
            padding: 0.5em 1em;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1em;
            width: 50%;
        }

        button:hover {
            background-color: #555;
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
    <div class="main-content">
        @yield('content')
    </div>
</body>
</html>
