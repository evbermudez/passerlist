<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
        <title>Passers</title>

        <!-- Fonts -->
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div id="app">
            <navbar-component></navbar-component>
            <passer-list-component></passer-list-component>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>
