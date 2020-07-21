<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
    <link rel="manifest" href=/images/favicon"/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#00b0ea">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/css/nucleo-icons.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/css/nucleo-svg.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/css/font-awesome.css') }}" rel="stylesheet"/>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ mix('/css/argon-design-system.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="admin-area">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/images/logo-hfh.svg" height="30" alt="{{ config('app.name', 'Laravel') }}">
                </a>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item align-self-md-center">
                            <a class="btn btn-primary btn-sm" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                @endguest
                </ul>
                <button class="navbar-toggler ml-4" type="button" id="sidebar-collapse" aria-label="{{ __('Toggle navigation') }}">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
            </div>
        </nav>
        <div class="d-flex">
            <div class="sidebar border-right">
                <div class="list-group list-group-flush mt-2 mt-sm-4">
                    <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                        <i class="fa fa-pie-chart mr-3"></i>Dashboard
                    </a>
                    <a href="{{ route('admin.clinic-list') }}" class="list-group-item list-group-item-action {{ Route::currentRouteName() == 'admin.clinic-list' ? 'active' : '' }}">
                        <i class="fa fa-plus-square mr-3"></i>Lista Clinici</a>
                    <a href="{{ route('admin.clinic-add') }}" class="list-group-item list-group-item-action sub-list {{ Route::currentRouteName() == 'admin.clinic-add' ? 'active' : '' }}">
                        <i class="fa fa-plus-square invisible mr-3"></i>Adauga o clinica</a>
                    <a href="{{ route('admin.clinic-category-list') }}" class="list-group-item list-group-item-action sub-list {{ Route::currentRouteName() == 'admin.clinic-category-list' ? 'active' : '' }}">
                        <i class="fa fa-plus-square invisible mr-3"></i>Categorii clinici</a>
                    <a href="{{ route('admin.help-list') }}" class="list-group-item list-group-item-action {{ in_array(Route::currentRouteName(), ['admin.help-list', 'admin.help-detail']) ? 'active' : '' }}">
                        <i class="fa fa-exclamation-triangle mr-3"></i>Cereri de ajutor</a>
                    <a href="#" class="list-group-item list-group-item-action ">
                        <i class="fa fa-book mr-3"></i>Resurse ajutor
                    </a>
                    <a href="#" class="list-group-item list-group-item-action sub-list">
                        <i class="fa fa-plus-square invisible mr-3"></i>Spatii de cazare</a>
                    <a href="#" class="list-group-item list-group-item-action sub-list">
                        <i class="fa fa-plus-square invisible mr-3"></i>Adauga o gazda</a>
                </div>
            </div>
            <div class="page-wrapper">
                <main class="pt-4 p-sm-5">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </div>
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/moment-with-locales.min.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
