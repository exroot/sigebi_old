<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="{{ asset('css/fonts/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <!-- Extra styles -->
</head>
<body>
    <div id="app" class="{{ Auth::check() && Auth::user()->esAdmin() ? "wrapper" :  ""}}">
        @if(Auth::check() && Auth::user()->esAdmin())
            @include('includes.sidebar')
        @endif
        <main class="main__content">
            @include('includes.navbar')
            @yield('content')
        </main>
    </div>
    @if(Auth::check() && Auth::user()->esAdmin())
    <script >
        const button = document.getElementById("toggleBtn");
        button.addEventListener("click", () => {
            const wrapper = document.getElementById('app');
            const sidebar = document.querySelector('.sidebar');
            wrapper.classList.toggle('wrapper');
            sidebar.classList.toggle('hide');
        });
    </script>
    @endif
</body>
</html>
