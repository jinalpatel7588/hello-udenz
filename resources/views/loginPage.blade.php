@extends('layouts.main')


@section('content')
    <style>
        .side-image {
            width: 100%;
            object-fit: cover;
            height: auto;
        }

        @media(max-width: 992px) {
            .image-block {
                display: none;
            }
        }
    </style>
    <section class="mt-5 pt-5">
        <div class="container">

            <div class="row " style="align-items: center; justify-content: center;">

                <div class="col-lg-6 image-block">

                    <img src="{{ asset('new_front_assets/images/image-back.png') }}" class="side-image" alt="" />

                </div>
                <div class="col-lg-6">
                    <div class="modal-body p-4">
                        <div class="text-center mb-4">
                            <h4 class="mb-0">Welcome Back</h4>
                            <p class="text-muted fs-15">Welcome back! Please enter your details.</p>
                        </div>
                        <form method="POST" action="{{ route('login') }}" id="validation-form100">
                            @csrf
                            <input type="hidden" name="type" value="{{ App\Enums\UserType::USER }}">
                            <div class="mb-3">
                                <label for="emailAddress" class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" id="emailAddress"
                                    placeholder="Enter Email" />
                                <label id="emailAddress-error" class="error" for="emailAddress"
                                    style="color: red;display:none;">Please Enter Email</label>
                            </div>
                            <div class="mb-2">
                                <label for="inputPasseord" class="form-label">Password</label>
                                <div class="position-set">
                                    <input type="password" name="password" class="form-control input-password"
                                        placeholder="Enter Password" id="inputPasseord" />
                                    <label id="inputPasseord-error" class="error" for="inputPasseord"
                                        style="color: red;display:none;">Please Enter Password</label>
                                    <div class="icon-position">
                                        <span class="toggle-password mdi mdi-eye-off-outline"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4 pb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember Me
                                    </label>
                                </div>

                            </div>
                            <button class="btn btn-gradient-primary w-100" type="submit">Log In</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
