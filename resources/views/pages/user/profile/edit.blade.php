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
    <div style="width: 100%; background-color: #3b62ac;" class="login-background">
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
                                <div class="edit-back-btn">
                                    <h2>User Profile</h2>
                                    <a href="{{ route('user.chat.index') }}" class="back-btn"><button class="btn ">Back</button></a>
                                </div>

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
                            <form method="POST" action="{{ route('user.update',$user->id) }}" id="userProfile" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                {{--  <input type="hidden" name="link" value="{{ $link }}">  --}}
                                <div class="form-group">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $user->name }}" required autocomplete="name" autofocus
                                        placeholder="Name" maxlength="60">
                                </div>
                                <div class="form-group">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $user->email }}" required autocomplete="email" autofocus
                                        placeholder="Email" maxlength="60">
                                </div>
                                <div class="form-group">
                                    <input id="mobile_number" type="text" onkeypress="return /[0-9]/i.test(event.key)" maxlength="10"
                                        class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number"
                                        value="{{ $user->mobile_number }}" required autocomplete="email" autofocus
                                        placeholder="Mobile Number">
                                        <span style="color: red" class="error"> @error('mobile_number') Phone number is already registered  @enderror</span>
                                </div>

                                <div class="form-group">
                                    <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror" accept="image/png, image/jpeg">
                                    @if(!empty($user->photo))
                                    <img class="nav-profile-img mt-3" src="{{ asset(Auth::user()->photo) }}"  alt="your image" style="height:100px; widows: 100px"/>
                                    @endif
                                </div>

                                {{--  <input type="hidden" name="type" value="{{ App\Enums\UserType::USER }}">  --}}
                                <div class="form-group account-btn text-center mt-2">
                                    <div class="col-12">
                                        <button class="btn width-md btn-bordered btn-danger waves-effect waves-light"
                                            type="submit">Update</button>
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
        $('#userProfile').validate({
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
            }
        });
    });
</script>
@endsection
