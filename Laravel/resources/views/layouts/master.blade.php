<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Titulo - @yield('title')</title>
    <style>
        body {
            font-family: sans-serif
        }
    </style>
</head>
<body>
    @section('header')
        <h2>HEADER DE LA WEB (master)</h2>
    @show
    <hr>

    <div class="container">
        @yield('content')
    </div>

    <hr>
    @section('footer')
        <h2>FOOTER DE LA WEB (master)</h2>
    @show
</body>
</html>
