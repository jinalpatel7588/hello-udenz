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

    .logo-imag img{
        height: 80px;
        width: 80px;

    }
    .account-logo-box{
        background: transparent !important;
    }
</style>

<div class="login-bg " style="position: relative;">
    <div style="width: 100%; background-color: #1f61eb;" class="login-background">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="height: 100vh;">

                <!-- <div class="col-md-4 col-lg-6 col-xl-5">
                        <lottie-player src="{{ asset('new_assets/lottie-animation/login.json') }}" background="transparent"
                            speed="1" class="user-modal-hello" loop autoplay>
                        </lottie-player>
                    </div> -->
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="text-center account-logo-box">
                            <div class="mt-2 mb-2">
                                <h2>User Registration</h2>

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
                            <form method="POST" action="{{ route('user.register') }}" id="userRegister">
                                @csrf
                                <input type="hidden" name="link" value="{{ $link }}">
                                <div class="form-group">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Name" maxlength="60">
                                </div>
                                <div class="form-group">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Email" maxlength="60">
                                        <span style="color: red" class="error"> @error('email') Email is already registered  @enderror</span>
                                </div>
                                <div class="form-group">
                                    <input id="mobile_number" type="text"
                                        class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number"
                                        value="{{ old('mobile_number') }}" required autocomplete="mobile_number" autofocus
                                        placeholder="Mobile Number" maxlength="15" onkeypress="return /[0-9]/i.test(event.key)">
                                        <span style="color: red" class="error"> @error('mobile_number') Phone number is already registered  @enderror</span>
                                </div>
                                <div class="form-group">
                                    <div class="form-data show_hide_password">
                                        <input id="password" type="password" value="{{ old('password') }}"
                                            class="form-control shadow_input @error('password') is-invalid @enderror" name="password"
                                            required placeholder="Password" maxlength="30"/>
                                        <a href="#" class="btn-contain show_pass">
                                            <img src="{{ asset('new_assets/images/eye.svg') }}" loading="lazy"
                                                alt="">
                                        </a>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="form-data show_hide_password">
                                    <input id="confirm_password" type="password"
                                        class="form-control shadow_input @error('confirm_password') is-invalid @enderror" name="confirm_password"
                                        required placeholder="Confirm Password" maxlength="30"/>
                                        <a href="#" class="btn-contain show_pass">
                                            <img src="{{ asset('new_assets/images/eye.svg') }}" loading="lazy"
                                                alt="">
                                        </a>
                                    </div>
                                </div>

                                @if (!empty($link))
                                <label>Already have an account? <a href="{{ route('user.login') }}">Log In</a></label>
                                @else

                                <label>Already have an account? <a href="{{ url('user/login?link=123') }}">Log In</a></label>
                                @endif

                                <input type="hidden" name="type" value="{{ App\Enums\UserType::USER }}">
                                <div class="form-group account-btn text-center mt-2">
                                    <div class="col-12">
                                        <button class="btn width-md btn-bordered btn-danger waves-effect waves-light"
                                            type="submit">Register</button>
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
@endsection
@section('footer-link')
@endsection
@section('js')

<script src="{{ asset('new_assets/js/lottie-player.js') }}"></script>

<script>
$(document).ready(function() {
    $(".show_hide_password .show_pass").on('click', function(event) {
        event.preventDefault();
        if ($(this).siblings("input").attr("type") == "text") {
            $(this).siblings("input").attr('type', 'password');
        } else if ($(this).siblings("input").attr("type") == "password") {
            $(this).siblings("input").attr('type', 'text');
        }
    });
});
</script>

<script>
    $(document).ready(function() {
        $('#userRegister').validate({
            ignore: [],
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true,
                },
                mobile_number: {
                    required: true
                },
                password: {
                    required: true
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                },
            },
            messages: {
                name: {
                    required: "Please Enter Name"
                },
                email: {
                    required: "Please Enter Email"
                },
                mobile_number: {
                    required: "Please Enter Mobile Number"
                },
                password: {
                    required: "Please Enter Password"
                },
                confirm_password: {
                    required: "Please Enter Confirm Password",
                    equalTo: "Password And Confirm Password Must Match"
                },
            }
        });
    });
</script>
@endsection
