<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('includes.head')
    <style>
    </style>
</head>

<body>
    <header>
        @include('includes.header')
    </header>
    <div class="main-content">
        <div class="container">
            @yield('content')
        </div>
    </div>
    <footer>
        @include('includes.footer')
    </footer>
</body>

</html>
