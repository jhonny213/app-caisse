<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 30vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <!-- Styles -->
        <link href="{{ asset('assets/css/bootstrap-reboot.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
        <style>
            body {margin:0;}

            .icon-bar {
                width: 100%;
                background-color: #cccccc;
                overflow: auto;
            }

            .icon-bar a {
                float: left;
                width: 20%;
                text-align: center;
                padding: 12px 0;
                transition: all 0.3s ease;
                color: white;
                font-size: 36px;
            }

            .icon-bar a:hover {
                background-color: #000;
            }

            .active {
                background-color: #4CAF50;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container-fluid">
                <nav class="nav nav-tabs">
                    <a class="nav-item nav-link active" href="#caisses" data-toggle="tab">Caisses</a>
                    <a class="nav-item nav-link" href="#banques" data-toggle="tab">Banques</a>
                    <a class="nav-item nav-link" href="#agances" data-toggle="tab">Agences</a>
                    <a class="nav-item nav-link" href="#fournisseurs" data-toggle="tab">Fournisseurs</a>
                    <a class="nav-item nav-link" href="#fournitures" data-toggle="tab">Fournitures</a>
                    <a class="nav-item nav-link" href="#utilisateur" data-toggle="tab">Utilisateur</a>
                </nav>
                <div class="tab-content border-bottom">
                    <div class="tab-pane fade show active" id="caisses">
                        <div class="icon-bar">
                            <a class="active" href="caisses"><i class="fa fa-dollar-sign"></i></a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="banques">
                        <div class="icon-bar">
                            <a href="banques"><i class="fa fa-credit-card"></i></a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="agances">
                        <div class="icon-bar">
                            <a href="agences"><i class="fa fa-home"></i></a>
                            <a href="agences/creates"><i class="fa fa-home"></i></a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="fournisseurs">
                        <div class="icon-bar">
                            <a href="fournisseurs"><i class="fa fa-home"></i></a>
                            <a href="fournisseurs/create"><i class="fa fa-home"></i></a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="fournitures">
                        <div class="icon-bar">
                            <a href="fournitures"><i class="fa fa-home"></i></a>
                            <a href="fournitures/create"><i class="fa fa-home"></i></a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="utilisateur">
                        <div class="icon-bar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Scripts -->
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}" defer></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" defer></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" defer></script>
    </body>
</html>
