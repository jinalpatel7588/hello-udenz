<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Site Title -->
    <title>Udenz Hello</title>
    <link rel="shortcut icon" href="{{ asset('new_front_assets/images/Udenz Hello icon.png') }}">
    <!-- Swiper js -->
    <link rel="stylesheet" href="{{ asset('new_front_assets/css/swiper-bundle.min.css') }}" type="text/css" />
    <!--Material Icon -->

    <link rel="stylesheet" type="text/css" href="{{ asset('new_front_assets/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('new_front_assets/css/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('new_front_assets/css/style.css') }}" />
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="60">
    <!--Navbar Start-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom navbar-light sticky-dark" id="navbar-sticky">
        <div class="container">
            <!-- LOGO -->
            <a class="logo text-uppercase" href="index.html">
                <img src="{{ asset('new_front_assets/css/images/logo-chat.png') }}" alt=""
                    class="logo-dark logo-image" />
                <img src="{{ asset('new_front_assets/css/images/logo-chat.png') }}" alt=""
                    class="logo-light " />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mx-auto navbar-center" id="mySidenav">
                    <li class="nav-item">
                        <a href="#home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about-us" class="nav-link">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#how-work" class="nav-link">How it Works</a>
                    </li>
                    <li class="nav-item">
                        <a href="#features" class="nav-link">Features</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">Contact Us</a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-center">
                    <li class="nav-item">
                        {{-- <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a> --}}
                        <button class="btn loginBtn" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    </li>
                    <!--<li class="nav-item">-->
                    <!--    <a href="#" class="btn btn-sm nav-btn" data-bs-toggle="modal"-->
                    <!--        data-bs-target="#signupModal">Register</a>-->
                    <!--</li>-->
                </ul>
            </div>
        </div>
    </nav>
