<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">

        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body class="antialiased">
        <div class="container" id="app">
            @yield('content')
        </div>
    </body>

    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</html>
