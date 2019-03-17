<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body class="min-h-screen font-sans">

        <!-- Login Links -->
        @component('components.loginlinks')
        @endcomponent()

        <!-- Main container -->
        <div id="main">
            @yield('content')
        </div>

        <!-- Copyright -->
        <p class="copyright">
            &copy; 2019 - BDE DDOS. Tous droits reservés.
        </p>

        <!-- Scripts -->
        <!-- No scripts necessary -->
    </body>
</html>
