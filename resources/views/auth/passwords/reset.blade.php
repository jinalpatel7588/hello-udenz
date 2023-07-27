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
        height: 80px;
        width: 80px;

    }

    .account-logo-box {
        background: transparent !important;
    }
</style>


<div class="login-bg " style="position: relative;">
    <div style="width: 100%; background-color: #3b62ac;" class="login-background">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="text-center account-logo-box">
                            <div class="mt-2 mb-2">
                                <h2>Reset Password</h2>
                                <a href="" class="text-success">
                                    <span class="">
                                        @php $siteSetting = ""; @endphp
                                        <img @if ($siteSetting) @if ($siteSetting->logo) src="{{ asset('storage/' . $siteSetting->logo) }}" @else src="{{ asset('new_assets/images/logo.png') }}" @endif
                                        @else src="{{ asset('new_assets/images/logo-black.png') }}" @endif
                                        alt="logo" height="36"></span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.update') }}" id="resetPassword">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="Email Address" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                </div>

                                <div class="form-group account-btn text-center mt-2">
                                    <div class="col-12">
                                        <button class="btn width-md btn-bordered btn-danger waves-effect waves-light"
                                            type="submit">Reset Password</button>
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
    <script>
        $(document).ready(function() {
            $('#resetPassword').validate({
                ignore: [],
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#password"
                    },

                },
                messages: {
                    email: {
                        required: "Please Enter Email"
                    },
                    password: {
                        required: "Please Enter Password"
                    },
                    password_confirmation: {
                        required: "Please Enter Confirm Password",
                        equalTo: "Password And Confirm Password Must Match"
                    },
                }
            });
        });
    </script>
@endsection
