@extends('layouts.master')
@section('content')
    <style>
        body {
            min-height: 0 !important;
            padding: 0;
        }

        /* my css */
        /* .login-background {
            background-image: url("{{ asset('new_assets/images/login-background.jpg') }}");
            object-fit: cover;
            width: 100%;
        } */

        .logo-imag img {
            height: 70px;
                width: 337px;

        }

        .account-logo-box {
            background: transparent !important;
        }
    </style>
    <!--   <style>-->
    <!--    footer {-->
    <!--        position: absolute;-->
    <!--        bottom: 0;-->
    <!--        width: 100%;-->
    <!--        height: 40px;-->
    <!--        background: rgb(0, 0, 0);-->
    <!--        background: #0072FF;-->

    <!--    }-->

    <!--    .footer ul {-->
    <!--        display: inline-block;-->
    <!--    }-->

    <!--    .footerLinks ul li {-->
    <!--        display: inline-block;-->
    <!--    }-->

    <!--    .footerLinks {-->
    <!--        float: right;-->
    <!--    }-->

    <!--    .footer-color {-->
    <!--        color: black;-->
    <!--    }-->
    <!--</style>-->

    <div class="login-bg " style="position: relative;">
        <div style="width: 100%; background-color: #3b62ac;" class="login-background">
            <div class="container">
                <div class="row justify-content-center align-items-center" style="height: 100vh;">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="text-center account-logo-box">
                                <div class="mt-2 mb-2">
                                    <h2>User Login</h2>
                                    <a href="" class="text-success">
                                        <span>
                                            @php $siteSetting = ""; @endphp
                                            <img class="mt-3" @if ($siteSetting) @if ($siteSetting->logo) src="{{ asset('storage/' . $siteSetting->logo) }}" @else src="{{ asset('new_assets/images/logo.png') }}" @endif
                                            @else src="{{ asset('new_assets/images/logo-black.png') }}" @endif
                                            alt="logo" height="36"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (session('error'))
                                    <h6 class="alert alert-danger">
                                        {{ session('error') }}
                                    </h6>
                                @endif
                                <form method="POST" action="{{ route('login') }}" id="userLogin">
                                    @csrf
                                    <div class="form-group">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus
                                            placeholder="Email" maxlength="60">
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required placeholder="Password" maxlength="30">
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="forgot-link">
                                            Forgot password?</a>
                                    @endif
                                    <input type="hidden" name="type" value="{{ App\Enums\UserType::USER }}">
                                    <div class="form-group account-btn text-center mt-2">
                                        <div class="col-12">
                                            <button class="btn width-md btn-bordered btn-danger waves-effect waves-light"
                                                type="submit">Log In</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
      <div class="cookie"
        style=" bottom: 0;z-index: 1000;padding: 25px;
    background-color: black;position: fixed; width: 100%;" id="exampleModal">
        <div class="col-md-12" style=";bottom: 0px;z-index: 999;;width: 100%;">
            <h4 style="color: white;">Cookie Policy </h4>
            <p style="color: white;"> Our website uses cookies to improve your experience. Learn more: <a
                    style="color: #3b62ac;" href="{{ route('cookies.policy') }}">cookies policy</a></p>
            <button type="submit" style="background-color:#3b62ac" class="btn" onclick="onSaveClick()">Accept</button>
        </div>
    </div>
   
@endsection
@section('footer-link')
@endsection
@section('js')
<script>
    $(document).ready(function() {
        if (!getCookieConsent()) {
            $('.cookie').removeClass('d-none');
            $('#exampleModal').show();

            var consent;
            if (consent) {
                // Set the cookie or perform any desired action
                setCookieConsent(true);
                console.log("Cookie consent granted.");
            } else {
                console.log("Cookie consent denied.");
            }
        }else{
            $('.cookie').addClass('d-none');
        }
    });
    function onSaveClick() {
        setCookieConsent(true);
        $('#exampleModal').hide();
    }
    function closeModal() {
        $('#exampleModal').hide();
    }
    function getCookieConsent() {
        return localStorage.getItem('cookieConsent') === 'true';
    }
    function setCookieConsent(consent) {
        localStorage.setItem('cookieConsent', consent);
    }
</script>
    <script>
        $(document).ready(function() {
            $('#userLogin').validate({
                ignore: [],
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true
                    },
                },
                messages: {
                    email: {
                        required: "Please Enter Email"
                    },
                    password: {
                        required: "Please Enter Password"
                    },
                }
            });
        });
    </script>
@endsection
