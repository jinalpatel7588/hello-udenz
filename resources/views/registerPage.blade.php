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

            <div class="row" style="align-items: center; justify-content: center;">

                <div class="col-lg-6 image-block">
                    <img src="{{ asset('new_front_assets/images/image-back.png') }}" class="side-image" alt="" />
                </div>
                <div class="col-lg-6">
                    <div class="modal-body p-4">
                        <form id="form" action="{{ route('user.register') }}" method="POST">
                            @csrf
                            <div class="text-center mb-4">
                                <h4 class="">Register</h4>
                            </div>
                            <input type="hidden" name="type" value="{{ App\Enums\UserType::USER }}">
                            <div class="mb-3">
                                <label for="firstName" class="form-label">Name</label>

                                <input type="text" name="name" class="form-control" id="firstName"
                                    placeholder="Enter Name" />

                            </div>
                            <div class="mb-3">
                                <label for="lasttName" class="form-label">Email Address</label>
                                <input type="text" name="email" class="form-control" id="lasttName"
                                    placeholder="Enter Email Address" />
                            </div>
                            <div class="mb-3">
                                <label for="emailAddress1" class="form-label">Mobile Number</label>
                                <input type="tel" onkeypress="return /[0-9]/i.test(event.key)" name="mobile_number"
                                    class="form-control" id="emailAddress1" placeholder="Enter Mobile Number"
                                    maxlength="10" />
                            </div>
                            <div class="mb-2">

                                <label for="inputPasseord2" class="form-label">Password</label>
                                <div class="position-set">
                                    <input type="password" name="password" class="form-control input-password"
                                        id="password" placeholder="Enter Password" />
                                    <div class="icon-position">
                                        <span class="toggle-password mdi mdi-eye-off-outline"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="inputPasseord2" class="form-label">Re-enter Password </label>
                                <div class="position-set">
                                    <input type="password" name="password_confirmation"
                                        class="form-control input-password-1" id="inputPasseord2"
                                        placeholder="Re-enter Password" />
                                    <div class="icon-position">
                                        <span class="toggle-password-2 mdi mdi-eye-off-outline"></span>
                                    </div>

                                </div>
                                <div class="form-check mb-4 pb-2">
                                    <label class="form-check-label" for="flexCheckDefault1"> I agree to the <a
                                            href="{{ route('terms.condition') }}">Terms of Service</a> and <a
                                            href="{{ route('privacy') }}">Privacy Policy</a> </label><br>
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault1"
                                        name="terms_and_condition" />
                                </div>
                                <button type="submit" class="btn btn-gradient-primary w-100">Register</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
