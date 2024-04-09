<!DOCTYPE html>
<html lang="fr">

<style>
    .main-content {
        padding-left: 2%;
        padding-right: 2%;
        min-height: 100vh;
    }

    .container {
        padding-top: 2%;
        padding-bottom: 2%;
    }

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('includes.head')
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
