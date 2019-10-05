<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SISDI') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        .row-navbar {
            margin-right: -78px !important;
            margin-left: -78px !important;
        }
        .popover {
            max-width: 100% !important;       
        }
    </style>
</head>
<body">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-laravel">
            <div class="container">
                <img src="{{ asset('img/webapp/logo.png') }}" alt="..." style="max-width: 10%;">
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
                            <li class="nav-item">
                                <a class="btn btn-primary btn-sm" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> {{ __('Masuk') }}</a>
                            </li> &nbsp
                            <li class="nav-item">
                                <a class="btn btn-dark btn-sm" href="{{ route('register') }}"><i class="fas fa-users"></i> {{ __('Daftar') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-light btn-sm" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> <i class="fas fa-user"></i>&nbsp {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item btn btn-sm" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Keluar') }}
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

        @guest
        <main class="py-4" style="height: 520px; background-image: url('{{ asset('img/webapp/slide32.jpg')  }}'); background-repeat: no-repeat; background-size: 1300px 520px; padding-top: 10px !important">
        @else
        <main class="py-4">
        @endguest

            @guest

                @yield('content')

            @else
            <div class="container">
                <div class="row row-navbar justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row" style="text-align: center !important">
                                    <div class="col-md">
                                        <a href="{{ route('home') }}">
                                            <img src="{{ asset('img/webapp/halaman_utama.png') }}">
                                        </a>
                                        <br>Halaman Utama
                                    </div>
                                    <div class="col-md">
                                        <a href="#" id="projek" class="pop" data-container="body" data-toggle="popover" data-placement="bottom">
                                            <img src="{{ asset('img/webapp/projek.png') }}">
                                        </a><br>Projek
                                        <div id="popover_projek" class="popover" style="display: none;">
                                            <div class="row" style="text-align: center !important;">
                                                <div class="col-md">
                                                    <a href="{{ route('booking') }}">
                                                        <img src="{{ asset('img/webapp/projek_booking.png') }}">
                                                    </a><br>Booking
                                                </div>
                                                <div class="col-md">
                                                    <a href="{{ route('monitoring') }}">
                                                        <img src="{{ asset('img/webapp/projek_progres.png') }}">
                                                    </a><br>Monitoring
                                                </div>
                                                <div class="col-md">
                                                    <a href="{{ route('laporan') }}">
                                                        <img src="{{ asset('img/webapp/projek_reporting.png') }}">
                                                    </a><br>Laporan
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <a href="#" id="alpro" class="pop" data-container="body" data-toggle="popover" data-placement="bottom">
                                            <img src="{{ asset('img/webapp/alpro.png') }}">
                                        </a><br>Alpro
                                        <div id="popover_alpro" class="popover" style="display: none;">
                                            <div class="row" style="text-align: center !important;">
                                                <div class="col-md">
                                                    <a href="{{ route('gpon') }}">
                                                        <img src="{{ asset('img/webapp/gpon.png') }}">
                                                    </a><br>GPON
                                                </div>
                                                <div class="col-md">
                                                    <a href="{{ route('odf') }}">
                                                        <img src="{{ asset('img/webapp/odf.png') }}">
                                                    </a><br>ODF
                                                </div>
                                                <div class="col-md">
                                                    <a href="{{ route('odc') }}">
                                                        <img src="{{ asset('img/webapp/odc.png') }}">
                                                    </a><br>ODC
                                                </div>
                                                <div class="col-md">
                                                    <a href="{{ route('odp') }}">
                                                        <img src="{{ asset('img/webapp/odp.png') }}">
                                                    </a><br>ODP
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <a href="{{ route('mancore') }}">
                                            <img src="{{ asset('img/webapp/mancore.png') }}">
                                        </a>
                                        <br>Mancore
                                    </div>
                                    <div class="col-md">
                                        <a href="">
                                            <img src="{{ asset('img/webapp/mitra.png') }}">
                                        </a>
                                        <br>Mitra
                                    </div>
                                    <div class="col-md">
                                        <a href="">
                                            <img src="{{ asset('img/webapp/user.png') }}">
                                        </a>
                                        <br>Pengguna
                                    </div>
                                    <div class="col-md">
                                        <a href="#" id="master" class="pop" data-container="body" data-toggle="popover" data-placement="bottom">
                                            <img src="{{ asset('img/webapp/master.png') }}">
                                        </a>
                                        <br>Master
                                        <div id="popover_master" class="popover" style="display: none;">
                                            <div class="row" style="text-align: center !important;">
                                                <div class="col-md">
                                                    <a href="#">
                                                        <img src="{{ asset('img/webapp/regional.png') }}">
                                                    </a><br>Regional
                                                </div>
                                                <div class="col-md">
                                                    <a href="">
                                                        <img src="{{ asset('img/webapp/witel.png') }}">
                                                    </a><br>Witel
                                                </div>
                                                <div class="col-md">
                                                    <a href="">
                                                        <img src="{{ asset('img/webapp/sto.png') }}">
                                                    </a><br>STO
                                                </div>
                                                <div class="col-md">
                                                    <a href="">
                                                        <img src="{{ asset('img/webapp/status_projek.png') }}">
                                                    </a><br>Status Projek
                                                </div>
                                            </div>
                                            <div class="row" style="text-align: center !important;">
                                                <div class="col-md">
                                                    <a href="#">
                                                        <img src="{{ asset('img/webapp/status_cons.png') }}">
                                                    </a><br>Status Cons
                                                </div>
                                                <div class="col-md">
                                                    <a href="">
                                                        <img src="{{ asset('img/webapp/status_inventori.png') }}">
                                                    </a><br>Status Inv
                                                </div>
                                                <div class="col-md">
                                                    <a href="">
                                                        <img src="{{ asset('img/webapp/odc_spek.png') }}">
                                                    </a><br>ODC Spek
                                                </div>
                                                <div class="col-md">
                                                    <a href="">
                                                        <img src="{{ asset('img/webapp/odp_spek.png') }}">
                                                    </a><br>ODP Spek
                                                </div>
                                            </div>
                                            <div class="row" style="text-align: center !important;">
                                                <div class="col-md">
                                                    <a href="">
                                                        <img src="{{ asset('img/webapp/gpon_merk.png') }}">
                                                    </a><br>GPON Merk
                                                </div>
                                                <div class="col-md">
                                                    <a href="{{ route('distribusi') }}">
                                                        <img src="{{ asset('img/webapp/distribusi.png') }}">
                                                    </a><br>Distribusi
                                                </div>
                                                <div class="col-md"></div>
                                                <div class="col-md"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">

                                @yield('content')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endguest
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        $('.pop').popover({
            // trigger: 'focus',
            container: 'body',
            html: true,
            content: function(){
                return $('#popover_'+ $(this).attr('id')).html();
            }
        });
    </script>
</body>
</html>
