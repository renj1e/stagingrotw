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

            {{-- Notification Box --}}
            @include('_partials.BE-sidebar')
            <div class="sidebar h-100 smalls scroll-y" style="background-image: url(/assets/be/img/sidebar-4.png); background-repeat: no-repeat; background-size: 100%; background-position: center bottom;">
                <a class="navbar-brand d-flex" href="#">
                    <div class="w-auto v-m mr-3">
                        <h1 class="m-0 font-weight-bold template-primary">OT<span class="font-weight-bold template-primary-light small">W</span></h1>
                    </div>
                    <div class="d-flex flex-column logo-text">
                        <h4 class="m-0"><span class="font-weight-bold">Admin</span>
                        </h4>
                        <p class="m-0"><small class="text-mute text-uppercase d-block font-weight-bold">panel</small></p>
                    </div>
                </a>
                <div class="sidebar-profile text-center">
                    <figure class="avatar avatar-120 avatar-circle"><img src="/assets/be/img/user1.jpg" alt=""></figure>
                    <div class="dropdown mt-3">
                        <button class="btn btn-link dropdown-toggle no-caret w-100" type="button" id="dropdownMenuButton13" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-flex justify-content-center">
                                <span class="ml-3">
                                    Juan dela Cruz<br>
                                    <span class="text-mute small">Admin</span>
                                </span>
                                <i class="material-icons  align-self-center ml-2 icon-right">keyboard_arrow_down</i>
                            </span>
                        </button>
                        <div class="dropdown-menu w-100 text-center " aria-labelledby="dropdownMenuButton13">
                            <a class="dropdown-item" href="profile.html">My Profile</a>
                            <a class="dropdown-item" href="#">Activity</a>
                            <a class="dropdown-item text-danger" href="#">Sign Out <i class="material-icons icon-right icon">exit_to_app</i></a>
                        </div>
                    </div>
                </div>

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.html"><i class="material-icons icon">dashboard</i><span class="menu-text">Dashboard</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="riders.html"><i class="material-icons icon">directions_bike</i><span class="menu-text">Riders</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customers.html"><i class="material-icons icon">group</i><span class="menu-text">Customers</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.html"><i class="material-icons icon">fastfood</i><span class="menu-text">Products</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="stores.html"><i class="material-icons icon">local_convenience_store</i><span class="menu-text">Stores</span></a>
                    </li>
                </ul>
            </div>
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
                                    <a href="chat.html" class="btn text-uppercase px-3 btn-sm btn-default">Chat <span class="badge badge-danger">5</span></a>
                                    <a href="orders.html" class="btn text-uppercase px-3 btn-sm btn-default">Track Orders <span class="badge badge-danger">15</span></a>
                                </div>
                            </div>
                            <div class="col-auto text-right align-self-center">
                                <div class="btn-group">
                                    <div class="dropdown">
                                        <button class="btn btn-link dropdown-toggle no-caret" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">notifications</i> <span class="badge badge-danger notif_count">3</span>
                                        </button>
                                        <div class="dropdown-menu align-center pb-0" aria-labelledby="dropdownMenuButton2">
                                            <div class="arrow pink-gradient"></div>
                                            <div class="bg-template text-white py-3 text-center">
                                                <h6 class="mb-0">Messages</h6>
                                                <p>Just Recieved Messages</p>
                                            </div>
                                            <div class="notification-row new">
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <figure class="avatar avatar-50">
                                                            <img src="/assets/be/img/user3.jpg" alt="" class="mCS_img_loaded">
                                                        </figure>
                                                    </div>
                                                    <div class="col pl-0">
                                                        <p class="mb-1">
                                                            <span>John Johnson</span>
                                                            <small class="text-mute-high float-right">1 day ago</small>
                                                        </p>
                                                        <small class="text-mute">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</small>
                                                        <br>
                                                        <p class="small mt-2"><a href="">Reply</a>
                                                            <a href="" class="ml-2">View</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notification-row">
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <figure class="avatar avatar-40">
                                                            <img src="/assets/be/img/user2.jpg" alt="" class="mCS_img_loaded">
                                                        </figure>
                                                    </div>
                                                    <div class="col pl-0">
                                                        <p class="mb-0">
                                                            <span>Ananya Chings</span>
                                                            <small class="text-mute-high float-right">2 day ago</small>
                                                        </p>
                                                        <small class="text-mute">Cras sit amet nibh libero... </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notification-row">
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <figure class="avatar avatar-40">
                                                            <img src="/assets/be/img/user4.jpg" alt="" class="mCS_img_loaded">
                                                        </figure>
                                                    </div>
                                                    <div class="col pl-0">
                                                        <p class="mb-0">
                                                            <span>Mark John</span>
                                                            <small class="text-mute-high float-right">2 day ago</small>
                                                        </p>
                                                        <small class="text-mute">Cras sit amet nibh libero... </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </header>

                <!-- Begin page content -->
                <main class="flex-shrink-0">
                    <div class="container-fluid" id="main-container">
                        <div class="row">
                            <div class="banner gradient-template col-12 mb-4 pb-5">
                                <h2 class="text-center my-5 font-weight-light">Hi! Welcome back, OTW Admin</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container top-60">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <div class="card border-0 shadow-sm mb-4">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <h6 class="mb-0"><span class="subtitle">Total Earning</span></h6>
                                                        <p><small class="text-success">P250</small> <small class="text-mute">Today</small></p>
                                                        <h3 class="font-weight-normal text-success mt-2">P 1765</h3>
                                                    </div>
                                                    <div class="col-auto pl-0 align-self-center">
                                                        <div class="progress-circle progress-success" data-value="0.12" data-size="70" data-thickness="8" data-animation-start-value="0" data-reverse="false">
                                                            <strong>86</strong></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <div class="card border-0 shadow-sm mb-4">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <h6 class="mb-0"><span class="subtitle">Total Visit</span></h6>
                                                        <p><small class="text-danger">250</small> <small class="text-mute">Today</small></p>
                                                        <h3 class="font-weight-normal text-danger mt-2">1530</h3>
                                                    </div>
                                                    <div class="col-auto pl-0 align-self-center">
                                                        <div class="progress-circle progress-danger" data-value="0.025" data-size="70" data-thickness="8" data-animation-start-value="0" data-reverse="false">
                                                            <strong>72</strong></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <div class="card border-0 shadow-sm mb-4">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <h6 class="mb-0"><span class="subtitle">Order Received</span></h6>
                                                        <p><small class="text-success">245</small> <small class="text-mute">Today</small></p>
                                                        <h3 class="font-weight-normal template-primary mt-1">7230</h3>
                                                    </div>
                                                    <div class="col-auto pl-0 align-self-center">
                                                        <div class="progress-circle progress-warning" data-value="0.35" data-size="70" data-thickness="8" data-animation-start-value="0" data-reverse="false">
                                                            <strong>35</strong></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-3">
                                        <div class="card border-0 shadow-sm mb-4">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <h6 class="mb-0"><span class="subtitle">New Customer</span></h6>
                                                        <p><small class="text-success">10%</small> <small class="text-mute">Today</small></p>
                                                        <h3 class="font-weight-normal template-primary mt-1">1530</h3>
                                                    </div>
                                                    <div class="col-auto pl-0 align-self-center">
                                                        <div class="progress-circle progress-primary" data-value="0.06" data-size="70" data-thickness="8" data-animation-start-value="0" data-reverse="false">
                                                            <strong>6</strong></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">                                
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="card border-0 shadow-sm mb-4">
                                            <div class="card-header">
                                                <h6 class="card-title">Today's Riders</h6>
                                            </div>
                                            <div class="card-body p-0">
                                                <table class="table  footable" data-paging-limit="3">
                                                    <thead>
                                                        <tr>
                                                            <th>Rider name</th>
                                                            <th data-breakpoints="xs">Phone</th>
                                                            <th data-breakpoints="xs sm">Status</th>
                                                            <th data-breakpoints="xs sm">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <figure class="avatar avatar-30 mr-2 vm">
                                                                    <img src="/assets/be/img/user5.jpg" alt="Generic placeholder image">
                                                                </figure>
                                                                <div class="d-inline-block vm">
                                                                    <p class="my-0 template-primary">Ananya Pachoti</p>
                                                                    <p class="text-mute"><small>Alaminos City, Pangasinan</small></p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <small class="text-mute vm">+000000000</small>
                                                            </td>
                                                            <td>
                                                                <small class="text-danger vm">Waiting...</small>
                                                            </td>
                                                            <td class="text-right footable-last-visible" style="display: table-cell;">
                                                                <button class="btn btn-info px-1 btn-sm mr-1"><i class="material-icons md-18">message</i></button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <figure class="avatar avatar-30 mr-2 vm">
                                                                    <img src="/assets/be/img/user6.jpg" alt="Generic placeholder image">
                                                                </figure>
                                                                <div class="d-inline-block vm">
                                                                    <p class="my-0 template-primary">Tigana Villiams</p>
                                                                    <p class="text-mute"><small>Alaminos City, Pangasinan</small></p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <small class="text-mute vm">+000000000</small>
                                                            </td>
                                                            <td>
                                                                <small class="text-success vm">Purchasing orders...</small>
                                                            </td>
                                                            <td class="text-right footable-last-visible" style="display: table-cell;">
                                                                <button class="btn btn-info px-1 btn-sm mr-1"><i class="material-icons md-18">message</i></button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <figure class="avatar avatar-30 mr-2 vm">
                                                                    <img src="/assets/be/img/user1.jpg" alt="Generic placeholder image">
                                                                </figure>
                                                                <div class="d-inline-block vm">
                                                                    <p class="my-0 template-primary">OTW</p>
                                                                    <p class="text-mute"><small>Alaminos City, Pangasinan</small></p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <small class="text-mute vm">+000000000</small>
                                                            </td>
                                                            <td>
                                                                <small class="text-success vm">10mins to destination</small>
                                                            </td>
                                                            <td class="text-right footable-last-visible" style="display: table-cell;">
                                                                <button class="btn btn-info px-1 btn-sm mr-1"><i class="material-icons md-18">message</i></button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <figure class="avatar avatar-30 mr-2 vm">
                                                                    <img src="/assets/be/img/user2.jpg" alt="Generic placeholder image">
                                                                </figure>
                                                                <div class="d-inline-block vm">
                                                                    <p class="my-0 template-primary">Monjulika</p>
                                                                    <p class="text-mute"><small>Alaminos City, Pangasinan</small></p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <small class="text-mute vm">+000000000</small>
                                                            </td>
                                                            <td>
                                                                <small class="text-success vm">3mins to destination</small>
                                                            </td>
                                                            <td class="text-right footable-last-visible" style="display: table-cell;">
                                                                <button class="btn btn-info px-1 btn-sm mr-1"><i class="material-icons md-18">message</i></button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>                                
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <div class="card border-0 shadow-sm mb-4">
                                            <div class="card-header">
                                                <h6 class="card-title">Real-time Customer's Order</h6>
                                            </div>
                                            <div class="card-body p-0">
                                                <table class="table  footable" data-paging-limit="3">
                                                    <thead>
                                                        <tr>
                                                            <th>Customer name</th>
                                                            <th data-breakpoints="xs">Order</th>
                                                            <th data-breakpoints="xs sm">Last visit</th>
                                                            <th data-breakpoints="xs sm">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <figure class="avatar avatar-30 mr-2 vm">
                                                                    <img src="/assets/be/img/user2.jpg" alt="Generic placeholder image">
                                                                </figure>
                                                                <div class="d-inline-block vm">
                                                                    <p class="my-0 template-primary">Ananta Singh</p>
                                                                    <p class="text-mute"><small>Alaminos City, Pangasinan</small></p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <small class="text-mute vm">3 Items</small>
                                                                <span class="badge badge-success">Confirmed Order</span>
                                                            </td>
                                                            <td>
                                                                <small class="text-mute vm">Today</small>
                                                            </td>
                                                            <td class="text-right footable-last-visible" style="display: table-cell;">
                                                                <button class="btn btn-success px-1 btn-sm mr-1"><i class="material-icons md-18">person_add</i></button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <figure class="avatar avatar-30 mr-2 vm">
                                                                    <img src="/assets/be/img/user5.jpg" alt="Generic placeholder image">
                                                                </figure>
                                                                <div class="d-inline-block vm">
                                                                    <p class="my-0 template-primary">Guest 1</p>
                                                                    <p class="text-mute"><small>Alaminos City, Pangasinan</small></p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <small class="text-mute vm">0 Items</small>
                                                            </td>
                                                            <td>
                                                                <small class="text-mute vm">17/01/2020</small>
                                                            </td>
                                                            <td class="text-right footable-last-visible" style="display: table-cell;">
                                                                <button class="btn btn-success px-1 btn-sm mr-1"><i class="material-icons md-18">mood</i></button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <figure class="avatar avatar-30 mr-2 vm">
                                                                    <img src="/assets/be/img/user6.jpg" alt="Generic placeholder image">
                                                                </figure>
                                                                <div class="d-inline-block vm">
                                                                    <p class="my-0 template-primary">Tigana Villiams</p>
                                                                    <p class="text-mute"><small>Alaminos City, Pangasinan</small></p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <small class="text-mute vm">13 Items</small>
                                                            </td>
                                                            <td>
                                                                <small class="text-mute vm">17/01/2020</small>
                                                            </td>
                                                            <td class="text-right footable-last-visible" style="display: table-cell;">
                                                                <button class="btn btn-success px-1 btn-sm mr-1"><i class="material-icons md-18">mood</i></button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <figure class="avatar avatar-30 mr-2 vm">
                                                                    <img src="/assets/be/img/user1.jpg" alt="Generic placeholder image">
                                                                </figure>
                                                                <div class="d-inline-block vm">
                                                                    <p class="my-0 template-primary">OTW</p>
                                                                    <p class="text-mute"><small>Alaminos City, Pangasinan</small></p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <small class="text-mute vm">6 Items</small>
                                                            </td>
                                                            <td>
                                                                <small class="text-mute vm">17/01/2020</small>
                                                            </td>
                                                            <td class="text-right footable-last-visible" style="display: table-cell;">
                                                                <button class="btn btn-success px-1 btn-sm mr-1"><i class="material-icons md-18">mood</i></button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <div class="card mb-4 border-0 shadow-sm">
                                            <div class="card-header">
                                                <h6 class="card-title">Statistics Overview this year 2020</h6>
                                            </div>
                                            <div class="card-header p-0 border-0">
                                                <ul class="nav nav-tabs border-0" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="tabhome121-tab" data-toggle="tab" href="#tabhome121" role="tab" aria-controls="tabhome121" aria-selected="true">
                                                            <h3 class="font-weight-normal">100</h3>
                                                            <p class="template-primary text-uppercase mb-0">Visitors</p>
                                                            <small class="text-secondary"><span class="text-success">+ 10%</span> <span class="text-mute">increased</span></small>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="tabhome221-tab" data-toggle="tab" href="#tabhome221" role="tab" aria-controls="tabhome221" aria-selected="false">
                                                            <h3 class="font-weight-normal">90</h3>
                                                            <p class="template-primary text-uppercase mb-0">Orders</p>
                                                            <small class="text-secondary"><span class="text-success">+ 15%</span> <span class="text-mute">increased</span></small>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="tabhome321-tab" data-toggle="tab" href="#tabhome321" role="tab" aria-controls="tabhome321" aria-selected="false">
                                                            <h3 class="font-weight-normal">100</h3>
                                                            <p class="template-primary text-uppercase mb-0">Delivered</p>
                                                            <small class="text-secondary"><span class="text-success">+ 90%</span> <span class="text-mute">completed</span></small>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-body ">
                                                <div class="tab-content">
                                                    <div class="tab-pane fade show active" id="tabhome121" role="tabpanel" aria-labelledby="tabhome121-tab">
                                                        <canvas id="linechart2" style="height: 200px;"></canvas>
                                                    </div>
                                                    <div class="tab-pane fade" id="tabhome221" role="tabpanel" aria-labelledby="tabhome221-tab">
                                                        <h6>Tab 2</h6>
                                                        <p>OTW is HTML template based
                                                            on Bootstrap 4.3.1 framework. This html template can be used in
                                                            various business domains like Manufacturing, inventory, IT,
                                                            administration etc. for admin panel, system development, web
                                                            applications, even website can be created. This template also
                                                            considered social pages, ecommerce pages and many more. </p>
                                                    </div>
                                                    <div class="tab-pane " id="tabhome321" role="tabpanel" aria-labelledby="tabhome321-tab">
                                                        <h6>Tab 3</h6>
                                                        <p>OTW is HTML template based
                                                            on Bootstrap 4.3.1 framework. This html template can be used in
                                                            various business domains like Manufacturing, inventory, IT,
                                                            administration etc. for admin panel, system development, web
                                                            applications, even website can be created. This template also
                                                            considered social pages, ecommerce pages and many more. </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <footer class="footer mt-auto">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center">
                                <p>Copyright 2020 : On The Way</p>
                            </div>
                        </div>

                    </div>
                </footer>
            </div>

        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/assets/be/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/be/js//popper.min.js"></script>
    <script src="/assets/be/vendor/bootstrap-4.3.1/js/bootstrap.min.js"></script>

    <!-- cookie css -->
    <script src="/assets/be/vendor/cookie/jquery.cookie.js"></script>

    <!-- custom scrollbar -->
    <script src="/assets/be/vendor/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Circular Progress -->
    <script src="/assets/be/vendor/circle-progress/circle-progress.min.js"></script>

    <!-- Sparklines Progress -->
    <script src="/assets/be/vendor/sparklines/jquery.sparkline.min.js"></script>

    <!-- Chart Progress -->
    <script src="/assets/be/vendor/bootstrap-daterangepicker-master/moment.js"></script>
    <script src="/assets/be/vendor/chartjs/Chart.min.js"></script>
    <script src="/assets/be/vendor/chartjs/utils.js"></script>

    <!-- datepicker jquery file -->
    <script src="/assets/be/vendor/bootstrap-daterangepicker-master/moment.js"></script>
    <script src="/assets/be/vendor/bootstrap-daterangepicker-master/daterangepicker.js"></script>

    <!-- Footable jquery file -->
    <script src="/assets/be/vendor/footable-bootstrap/js/footable.min.js"></script>

    <!-- jVector map jquery file -->
    <script src="/assets/be/vendor/jquery-jvectormap/jquery-jvectormap.js"></script>
    <script src="/assets/be/vendor/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/assets/be/vendor/jquery-jvectormap/jquery-jvectormap-us-aea.js"></script>

    <!-- Template main js -->
    <script src="/assets/be/js/main.js"></script>

    <!-- color picker and Layout selector main js -->
    <script src="/assets/be/js/layout-colorpicker.js"></script>

    <!-- page level js -->
    <script src="/assets/be/js/restaurant.js"></script>

    <!-- page specific script -->

</body>
</html>
