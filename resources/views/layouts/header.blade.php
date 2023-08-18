<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Site Title -->
     <title>Udenz Hello</title> 
    {{-- <title>@yield('title')</title> --}}
    <link rel="shortcut icon" href="{{ asset('new_front_assets/images/Udenz Hello icon.png') }}">
    <!-- Swiper js -->
    <link rel="stylesheet" href="{{ asset('new_front_assets/css/swiper-bundle.min.css') }}" type="text/css" />
    <!--Material Icon -->

    <link rel="stylesheet" type="text/css" href="{{ asset('new_front_assets/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('new_front_assets/css/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('new_front_assets/css/style.css') }}" />
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="60">
    <!--Navbar Start-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom navbar-light sticky-dark" id="navbar-sticky">
        <div class="container">
            <!-- LOGO -->
            <a class="logo text-uppercase" href="{{ route('index') }}">
                <img src="{{ asset('new_front_assets/images/logo-chat.png') }}" alt=""
                    class="logo-dark logo-image" />
                <img src="{{ asset('new_front_assets/images/logo-chat.png') }}" alt="" class="logo-light " />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mx-auto navbar-center" id="mySidenav">
                    <li class="nav-item">
                        <a href="{{ route('index') }}" class="nav-link">Home</a>
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
                @auth
                    <ul class="navbar-nav navbar-center gap-3">
                        <li class="nav-item">
                            {{-- <a class="btn loginBtn" href="{{ route('user.logout') }}"></i>{{ __('Logout') }}</a> --}}
                             <a class="nav-link" href="{{ route('user.chat.index') }}" role="button" id="profile-menu" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            @if (Auth::user())
                                @if(!empty(Auth::user()->photo) && file_exists(Auth::user()->photo))
                                    <img class="nav-profile-img" src="{{ asset(Auth::user()->photo) }}"  alt="your image" style="height: 35px; width: 35px; "/> {{ auth()->user()->name }}
                                @else
                                    <img class="nav-profile-img" src="{{ asset('new_assets/images/profile.png') }}"  alt="profile image" style="height: 35px; width: 35px; "/> {{ auth()->user()->name }}
                                @endif
                            @endif


                            {{--  <img class="nav-profile-img" src="{{ asset('new_assets/images/profile.png') }}"
                                alt="Profile Image">  --}}
                        </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a>{{ auth()->user()->name }}</a>
                        </li> --}}
                    </ul>
                @else
                    <ul class="navbar-nav navbar-center gap-3">
                        <li class="nav-item">
                            {{-- <button class="btn loginBtn"  data-bs-toggle="modal" data-bs-target="#loginModal">Login</button> --}}
                            <a href="{{ route('loginPage') }}" class="btn loginBtn">Login</a>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="#" class="btn loginBtn" data-bs-toggle="modal"
                        data-bs-target="#signupModal" data-bs-backdrop="static" data-bs-keyboard="false">Register</a> --}}
                            <a href="{{ route('registerPage') }}" class="btn loginBtn" data-bs-backdrop="static"
                                data-bs-keyboard="false">Register</a>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </nav>
