<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles -->
        <link href="{{ asset('assets/css/bootstrap-reboot.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
        <style>
            body {margin:0;}

            .icon-bar {
                width: 100%;
                background-color: #ededed;
                overflow: auto;
            }

            .icon-bar a {
                float: left;
                width: 20%;
                text-align: center;
                padding: 12px 0;
                transition: all 0.3s ease;
                color: #1d68a7;
                font-size: 16px;
            }

            .icon-bar a:hover {
                background-color: #c6c8ca;
            }
            .nav a:hover {
                background-color: #ccc;
            }
            .active {
                background-color: #FFFFFF;
            }
            .tab-content{

            }
            #radioBtn .notActive{
                color: #3276b1;
                background-color: #fff;
            }
            .btn-group-sm a{
                color: #FFFFFF;
                width: 40%;
            }
        </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">

                <h2>{{ config('app.name', '') }} @auth Agence {{ Auth::user()->agence_id }}  @endauth</h2>
                    @auth<h5 style="margin-top: -10px;">Accée {{ Auth::user()->groupe }}</h5>@endauth
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
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
                </div>
            </div>
        </nav>
        @auth
        <nav class="nav nav-tabs">
                <a class="nav-item nav-link" href="#caisse" data-toggle="tab">Caisse</a>
            <a class="nav-item nav-link" href="#banque" data-toggle="tab">Banque</a>
                <a class="nav-item nav-link" href="#achats" data-toggle="tab">Achats</a>
            @if (Auth::user()->groupe == 'Administrateur')
                <a class="nav-item nav-link" href="#agences" data-toggle="tab">Agences</a>
            @endif
                <a class="nav-item nav-link" href="#fournisseurs" data-toggle="tab">Fournisseurs</a>
                <a class="nav-item nav-link" href="#fournitures" data-toggle="tab">Fournitures</a>
                 @if (Auth::user()->groupe == 'Administrateur')
                    <a class="nav-item nav-link" href="#utilisateurs" data-toggle="tab">Utilisateurs</a>
                @endif
            </nav>
            <div class="tab-content border-bottom">
                <div class="tab-pane fade" id="caisse">
                    <div class="icon-bar">
                        <a href="/alimentecaisse"><i class="fa fa-credit-card"> ETAT D'ALIMENTATION</i></a>
                        <a href="/arretecaisse"><i class="fa fa-credit-card"> ETAT D'ARRET</i></a>
                        @if (Auth::user()->groupe == 'Gestionnaire')
                            <div class="nav navbar btn-group-sm">
                                <a href="/alimentecaisse/create" class="btn btn-info fa fa-plus "> ALIMENTE CAISSE</a>


                                <a href="/arretecaisse/create" class="btn btn-info fa float-right ">  ARRETE CAISS</a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="banque">
                    <div class="icon-bar">
                        <a href="/alimentebanque"><i class="fa fa-credit-card"> ETAT D'ALIMENTATION</i></a>
                        @if (Auth::user()->groupe == 'Gestionnaire')
                            <div class="nav navbar btn-group-sm">
                                <a href="/alimentebanque/create" class="btn btn-info fa fa-plus "> ALIMENTE BANQUE</a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="achats">
                    <div class="icon-bar">
                        <a href="/achats/cmd"><i class="fa fa-credit-card"> COMMANDES</i></a>
                        <a href="/achats"><i class="fa fa-credit-card"> ACHATS</i></a>
                        <a href="/achats/refus"><i class="fa fa-credit-card"> COMMANDES REFUSE</i></a>
                        @if (Auth::user()->groupe == 'Gestionnaire')
                        <div class="nav navbar btn-group-sm">
                            <a href="/achats/create" class="btn btn-info fa fa-plus "> COMMANDER</a>
                        </div>
                        @endif
                    </div>
                </div>
                @if (Auth::user()->groupe == 'Administrateur')
                    <div class="tab-pane fade" id="agences">
                        <div class="icon-bar">
                            <a href="/agences"><i class="fa fa-building"> AGENECS</i></a>
                            <div class="nav navbar btn-group-sm">
                                <a href="/agences/create" class="btn btn-info fa fa-plus"> NOUVELLE AGENCE</a>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="tab-pane fade" id="fournisseurs">
                    <div class="icon-bar">
                        <a href="/fournisseurs"><i class="fa fa-users"> FOURNISSEURS</i></a>
                        <a href="/fournisseurs/blocke"><i class="fa fa-users"> FOURNISSEURS BLOCKE</i></a>
                        <div class="nav navbar btn-group-sm">
                            <a href="/fournisseurs/create" class="btn btn-info fa fa-plus"> NOUVEAU FOURNISSEUR</a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="fournitures">
                    <div class="icon-bar">
                        <a href="/fournitures"><i class="fa fa-list-ol"> FOURNITURES</i></a>
                        <a href="/fournitures/blocke"><i class="fa fa-list-ol"> FOURNITURES BLOCKE</i></a>
                        <div class="nav navbar btn-group-sm">
                            <a href="/fournitures/create" class="btn btn-info fa fa-plus"> NOUVELLE FOURNITURE</a>
                        </div>
                    </div>
                </div>
                @if (Auth::user()->groupe == 'Administrateur')
                <div class="tab-pane fade" id="utilisateurs">
                    <div class="icon-bar">
                        <a href="/utilisateurs"><i class="fa fa-home"> UTILISATEURS</i></a>
                        <a href="/utilisateurs/create"><i class="fa fa-home"> NOUVELLE UTILISATEURS</i></a>
                    </div>
                </div>
                @endif
            </div>
            @endauth
        <main class="py-4">
            @yield('content')
        </main>

        <footer class="fixed-bottom text-center border-top bg-info">
                <h6>copyright</h6>
        </footer>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/app.js') }}" defer></script>
    <script src="{{ asset('assets/js/aliment-cb.js') }}" defer></script>
    <script src="{{ asset('assets/js/arretes-c.js') }}" defer></script>
    <script src="{{ asset('assets/js/achats.js') }}" defer></script>
</body>
</html>
