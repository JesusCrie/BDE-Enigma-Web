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
    </head>
    <body class="min-h-screen font-sans">

        <!-- Login Links -->
        <div class="container-links">
            @guest
                <a href="{{ route('login') }}" class="btn blue mr-1">Login</a>
                <a href="{{ route('register') }}" class="btn blue ml-1">Register</a>
            @else
                <div>
                    <a href="{{ route('logout') }}" class="btn red"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form action="{{ route('logout') }}" id="logout-form" method="post" class="hidden">
                        @csrf
                    </form>
                </div>
            @endguest
        </div>

        <!-- Main container -->
        <div id="main">
            @yield('content')
        </div>

        <!-- Copyright -->
        <p class="copyright">
            &copy 2019 - BDE DDOS. Tous droits reservés.
        </p>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
