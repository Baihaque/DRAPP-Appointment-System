<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.0.0-alpha.1
* @link https://coreui.io
* Copyright (c) 2019 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">

<head>
    <base href="./">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Icons-->
    <link href="{{ asset('css/free.min.css') }}" rel="stylesheet"> <!-- icons -->
    <link href="{{ asset('css/brand.min.css') }}" rel="stylesheet"> <!-- icons -->
    <!-- Main styles for this application-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">

</head>


<body>
    <div class="container mt-5 mb-5">
        <div id="carouselExampleIndicators" class="carousel slide shadow" data-ride="carousel">
           
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" style="height: 400px; object-fit: cover;"
                        src="assets/img/c1.jpg" alt="First slide">
                </div>
            </div>
        </div>
           
    </div>

    <!--card login-->
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-sm-4 text-center">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Patient</h5>
          <p class="card-text">If you are a patient, you need to click button below!</p>
          <a href="/login" class="btn btn-primary">Login as Patient</a>
        </div>
    </div>
    </div>
    <div class="col-sm-4 text-center">
        <div class="card" style="width: 18rem;">      
            <div class="card-body">
              <h5 class="card-title">Doctor/Nurse</h5>
              <p class="card-text">If you are a doctor/nurse, you need to click button below!</p>
              <a href="/doctor/login" class="btn btn-primary">Login as Doctor/Nurse</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4 text-center">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Admin</h5>
              <p class="card-text">If you are a admin, you need to click button below!</p>
              <a href="/admin/login" class="btn btn-primary">Login as Admin</a>
            </div>
        </div>
    </div>
    </div>
    </div>
    
 
</body>

</html>
