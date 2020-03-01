<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/png" href="favicon.png" />


    <!-- Material design icon fonts CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Google fonts CSS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- daterange CSS -->
    <link href="/assets/be/vendor/bootstrap-daterangepicker-master/daterangepicker.css" rel="stylesheet">

    <!-- jvector map CSS -->
    <link href="/assets/be/vendor/jquery-jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="/assets/be/vendor/bootstrap-4.3.1/css/bootstrap.css" rel="stylesheet">

    <!-- custom scrollbar CSS -->
    <link href="/assets/be/vendor/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.min.css" rel="stylesheet">

    <!-- Customized CSS -->
    <link href="/assets/be/css/otw.css" id="link" rel="stylesheet">

    <title>On The Way : Admin Panel</title>
</head>
<body class="h-100">
    <div id="app">
        <online-user></online-user>
        <div class="loader">
            <div>
                <div class="loader-animation">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <br>
                <h2 class="mt-4"><span class="font-weight-light"></span>OTW</h2>
                <p class="text-mute">Your page is loading...</p>
            </div>
        </div>
        <div class="wrapper">

            {{-- Sidebar --}}
            @include('_partials.BE-sidebar')

            <div class="content h-100 d-flex flex-column w-100">
                <header class="header fixed-top ">
                    <!-- navbar -->
                    <nav class="container-fluid">
                        <div class="row">
                            <div class="col-auto align-self-center">
                                <div class="row h-100">
                                    <div class="col-auto">
                                        <button class="btn btn-sm btn-link menu-btn" type="button">
                                            <i class="material-icons">menu</i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col text-center align-self-center px-0 ">
                                <div class="btn-group shadow-sm  d-none d-md-inline-flex" role="group" aria-label="Basic example">
                                    <a href="#" class="btn text-uppercase px-3 btn-sm btn-default active">Dashboard</a>
                                    <a href="orders.html" class="btn text-uppercase px-3 btn-sm btn-default">Track Orders <span class="badge badge-danger">15</span></a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </header>

                <!-- Begin page content -->
                @yield('content')

            </div>

        </div>
    </div>

    <!-- Optional JavaScript -->
    
    <script src="{{ asset('/js/app.js') }}"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/assets/be/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/be/js//popper.min.js"></script>
    <script src="/assets/be/vendor/bootstrap-4.3.1/js/bootstrap.min.js"></script>

    <!-- cookie css -->
    <script src="/assets/be/vendor/cookie/jquery.cookie.js"></script>

    <!-- custom scrollbar -->
    <script src="/assets/be/vendor/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Template main js -->
    <script src="/assets/be/js/main.js"></script>

    <!-- color picker and Layout selector main js -->
    <script src="/assets/be/js/layout-colorpicker.js"></script>    

    <!-- page specific script -->

    @stack('scripts')
</body>
</html>
