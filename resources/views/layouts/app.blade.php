<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DeliveBoo</title>

    <!-- Favicon per browser standard -->
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/images/Panino-DeliveBoo-bianco.ico') }}">

    <!-- Favicon in formato PNG per diverse dimensioni -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('storage/images/Panino-DeliveBoo-bianco-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('storage/images/Panino-DeliveBoo-bianco-32x32.png') }}">

    <!-- Apple Touch Icon per dispositivi iOS -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/images/apple-touch-icon.png') }}">



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Usando Vite -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    {{-- grafico --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/luxon/2.0.2/luxon.min.js"></script>


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" id="nav-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent ">
                    <!-- Left Side Of Navbar -->
                    <a class="navbar-brand d-flex align-items-center nav-a" href="{{ url('/') }}">
                        <div id="img-logo">
                            <img src="{{ asset('storage/images/Logo-DeliveBoo-bianco.png') }}">
                        </div>
                    </a>
                    <!-- Right Side Of Navbar -->
                    <div class="d-flex">
                        <div class="me-3 mt-2">
                            <a href="http://localhost:5173/" class="text-light text-decoration-none">Torna al sito</a>
                        </div>
                        <div>
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link text-light fs-6"
                                            href="{{ route('login') }}">{{ __('Accedi') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link text-light fs-6 ms-3"
                                                href="{{ route('register') }}">{{ __('Registra il tuo ristorante') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                            role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" v-pre>
                                            {{ Auth::user()->restaurant_name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                                            id="dropdown-menu-edit">
                                            <a class="dropdown-item" href="{{ url('dashboard') }}">{{ __('Profilo') }}</a>
                                            <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Modifica') }}</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>




</body>

</html>
