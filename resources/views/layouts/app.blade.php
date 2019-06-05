<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" ></script>
    <!-- fonts -->
     <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet"></link>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
</head>
<body>
    
    <nav>
        <div class="nav-wrapper color-cut">
            <a href="{{ route('home') }}" class="brand-logo center">Radi</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">

            @if(Auth::user())
                <li class="deep-orange darken-4"><a class="dropdown-item white-text" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>
                                  
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
            @endif
            </ul>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

</body>
</html>
