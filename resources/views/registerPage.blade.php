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
                                    placeholder="Enter Email Address" autocomplete="off" />
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
                                        id="password" placeholder="Enter Password" autocomplete="off" />
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
                                <div class="form-check  pb-2">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault1"
                                        name="terms_and_condition" />
                                    <label class="form-check-label" for="flexCheckDefault1"> I agree to the <a
                                            href="{{ route('terms.condition') }}">Terms of Service</a> and <a
                                            href="{{ route('privacy') }}">Privacy Policy</a> </label>
                                        </div>
                                        <div class="mb-4">
                                        <label id="terms_and_condition-error" class="error" for="terms_and_condition" style="display: none !important">Please checked terms and condition first</label>
                                </div>
                                {{-- <div>
                                    <input type="checkbox" class="form-check-input" id="flexCheckDefault1" name="terms_and_condition">
                                    <label for="flexCheckDefault1">I agree to the <a
                                            href="{{ route('terms.condition') }}">Terms of Service</a> and <a
                                            href="{{ route('privacy') }}">Privacy Policy</a> </label> --}}
                                {{-- <label id="terms_and_condition-error" class="error" for="terms_and_condition">Please
                                    checked terms and condition first</label> --}}
                                <button type="submit" class="btn btn-gradient-primary w-100">Register</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
@section('js')
    <script>
        jQuery.validator.addMethod("validate_email", function(value, element) {
            if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
                return true;
            } else {
                return false;
            }
        }, "Please enter a valid Email.");
        var value = $("#password").val();
        $.validator.addMethod("checklower", function(value) {
            return /[a-z]/.test(value);
        });
        $.validator.addMethod("checkupper", function(value) {
            return /[A-Z]/.test(value);
        });
        $.validator.addMethod("checkdigit", function(value) {
            return /[0-9]/.test(value);
        });
        $.validator.addMethod("pwcheck", function(value) {
            return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) && /[a-z]/.test(value) && /\d/.test(value) &&
                /[A-Z]/.test(value);
        });
        jQuery('#form').validate({
            rules: {
                name: "required",
                terms_and_condition: "required",
                emirate_id: {
                    required: true,
                    minlength: 18,
                    maxlength: 18,
                },
                mobile_number: {
                    required: true,
                },
                email: {
                    required: true,
                    validate_email: true,
                    remote: {
                        url: "{{ url('uniqueemail') }}",
                        type: "GET",
                        data: {
                            action: function() {
                                return "1";
                            },
                        }
                    }
                },
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 30,
                    required: true,
                    //pwcheck: true,
                    checklower: true,
                    checkupper: true,
                    checkdigit: true
                },
                password_confirmation: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                },
            },
            messages: {
                name: "Please enter name",
                mobile_number: {
                    required: "Please enter mobile number",
                },
                terms_and_condition: {
                    required: "Please checked terms and condition first"
                },
                email: {
                    required: "Please enter email address",
                    validate_email: "Please enter a valid email address",
                    remote: "Email id already registred",
                },
                password: {
                    required: "The password should have 6 characters with a combination of uppercase letters, lowercase letters, and numbers.",
                    pwcheck: "Password is not strong enough",
                    checklower: "The password should have 6 characters with a combination of uppercase letters, lowercase letters, and numbers.",
                    checkupper: "The password should have 6 characters with a combination of uppercase letters, lowercase letters, and numbers.",
                    checkdigit: "The password should have 6 characters with a combination of uppercase letters, lowercase letters, and numbers.",
                },
                password_confirmation: {
                    required: "Please Re-enter Password",
                    equalTo: "Passwords do not match",
                },
            },
            submitHandler: function(form) {
                console.log("hello");
                form.submit();
            },
        });
    </script>
@endsection
