@extends('layouts.main')

@section('title', 'Udenz Hello')
@section('content')
    <section class="hero-4" id="home">
        <div class="bg-overlay-img"></div>
        <div class="container">

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row" style="align-items: center;">
                <div class="col-lg-6">
                    <h1 class="hero-title text-white fw-bold mb-4 display-5 head-font">Innovative Communication
                        Platform<span class="text-primary"> <br />for Dental
                            Professionals</span> <span class="text-primary"></span><br /> in the MENA Region</h1>
                    <p class="text-white-50 mb-4 pb-2 fs-17">Streamlined Interactions, Enhanced Collaboration, and
                        Seamless Patient
                        Management</p>
                    <p class="text-white-50 mb-2"><i class="mdi mdi-lock-check fs-20 me-2 text-success"></i> Versatile
                        Chatroom Functionality streamlines communication and
                        collaboration within dental teams, promoting better teamwork and
                        improved patient care.</p>
                    <p class="text-white-50 mb-5"><i class="mdi mdi-lock-check fs-20 me-2 text-success"></i> Efficient
                        information sharing among dental team members, resulting in
                        heightened productivity and better coordination to deliver exceptional
                        patient care.</p>
                    <a data-bs-toggle="modal" data-bs-target="#signupModal" class="btn btn-apply btn-size">Get Started
                        <i class="mdi mdi-arrow-right-thin ms-1 fs-22 right-arrow"></i></a>
                </div>
                <div class="col-lg-6">
                    <div class="mt-5 mt-lg-0">

                        <div class="banner-img">
                            <img src="{{ asset('new_front_assets/images/image-back.png') }}" alt=""
                                class=" d-block mx-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- home-agency end -->
    <!-- about us section -->
    <section class="section" id="about-us">
        <div class="container">
            <div class="row  mb-5">
                <div class="col-md-8 col-lg-6 ">
                    <h6 class="subtitle">About<span class="fw-bold"> Us</span></h6>
                    <h2 class="title">Effortless Communication for Swift and Efficient Workflows</h2>
                    <p class="text-muted">Udenz Hello is a powerful communication platform tailored for dental
                        professionals, designed to streamline interactions and optimize workflow
                        efficiency. With its versatile chatroom functionality, dental teams can collaborate
                        This seamlessly in real-time, fostering improved coordination and productivity. <br />
                        comprehensive solution empowers dental practices to enhance communication
                        among team members, patients, and administrators, ensuring smooth operations
                        and exceptional patient care. Experience the convenience of Udenz Hello,
                        offering effortless communication and fast-paced workflows to boost your dental
                        practice's performance.</p>
                </div>
                <div class="col-lg-6">
                    <div class="side-image-set mt-3">
                        <h6 class="subtitle"><span class="fw-bold"> &nbsp; </span></h6>
                        <div class="about-us-image">
                            <img src="{{ asset('new_front_assets/images/about-us-image.jpg') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about us section end -->
    <!-- How it work start -->
    <section class="section bg-light" id="how-work">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="work-box px-lg-5 text-center mb-5 mb-lg-0">
                        <div class="work-icon bg-soft-primary mb-4">
                            <img src="{{ asset('new_front_assets/images/registration.svg') }}" class="w-75"
                                style="vertical-align: initial;">
                        </div>
                        <h5 class="fw-semibold">1. Register to the web app</h5>
                        <p class="text-muted">to access Udenz Hello's communication platform for dental professionals.
                        </p>
                        <img src="{{ asset('new_front_assets/images/arrow-bottom.png') }}" alt=""
                            class="work-arrow" />
                    </div>
                    <div class="work-box px-lg-5 text-center mb-5 mb-lg-0">
                        <div class="work-icon bg-soft-success mb-4">
                            <img src="images/group.svg" class="w-75" style="vertical-align: initial;">
                            <!-- <i class="mdi mdi-palette-outline"></i> -->
                        </div>
                        <h5 class="fw-semibold">2. Create a room within the platform </h5>
                        <p class="text-muted">to facilitate real-time collaboration and information sharing.</p>
                    </div>
                    <div class="work-box px-lg-5 text-center mb-5 mb-lg-0">
                        <div class="work-icon bg-soft-warning mb-4">

                            <img src="{{ asset('new_front_assets/images/invite.svg') }}" class="invite-logo"
                                style="vertical-align: initial;">

                        </div>
                        <h5 class="fw-semibold">3. Invite members into the room</h5>
                        <p class="text-muted">enabling seamless communication and enhanced teamwork among dental team
                            members and clients.
                        </p>
                        <img src="{{ asset('new_front_assets/images/arrow-top.png') }}" alt=""
                            class="work-arrow-down" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <h6 class="subtitle ">How it <span class="fw-bold">Works</span></h6>
                    <h2 class="title ">How to Start Using Udenz Hello</h2>
                    <p class="text-muted">Udenz Hello is a user-friendly communication platform for dental practices.
                        Through its versatile chatroom functionality, dental teams collaborate in real-
                        time, optimizing coordination and enhancing productivity. With streamlined
                        interactions, the platform facilitates seamless communication among team
                        members, patients, and administrators, ensuring efficient workflows and
                        exceptional patient care. <br />
                    <p class="text-muted"> Udenz Hello simplifies the way dental practices
                        communicate, making it easier to manage appointments, discuss treatment
                        plans, and coordinate tasks, ultimately improving overall practice performance
                        and customer satisfaction.</p>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- How it work end -->
    <!-- features start -->
    <section class="section bg-light features-bg" id="features">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 col-lg-6 text-center">
                    <h6 class="subtitle">web app <span class="fw-bold">Features</span></h6>
                    <h2 class="title">Empowering Dental Practices</h2>
                    <p class="text-muted">Explore the wide-ranging capabilities of Udenz Hello, designed to empower
                        dental practices with its versatile and efficient features.</p>

                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="fs-38 mb-4">Discover the Versatile Features of Udenz Hello</h1>
                    <p class="text-muted">Unleashing versatile features to elevate dental practice efficiency.</p>
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                            <span class="avatar avatar-lg bg-white text-primary rounded-circle shadow-primary">
                                <i class="mdi mdi-check"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 ms-4">
                            <p class="text-muted"><span class="text-dark fw-bold">Smart Chatroom Collaboration:</span>
                                Udenz Hello offers a feature-rich chatroom
                                functionality, enabling real-time communication and seamless information
                                sharing among dental team members.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                            <span class="avatar avatar-lg bg-white text-primary rounded-circle shadow-primary">
                                <i class="mdi mdi-layers-outline"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 ms-4">
                            <p class="text-muted"><span class="text-dark fw-bold">Appointment Management:</span> The
                                platform simplifies appointment scheduling
                                and coordination, allowing dental professionals to efficiently communicate
                                patient’s bookings and send reminders to patients.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                            <span class="avatar avatar-lg bg-white text-primary rounded-circle shadow-primary">
                                <i class="mdi mdi-lock-outline"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 ms-4">
                            <p class="text-muted"><span class="text-dark fw-bold">File Sharing:</span> Enables efficient
                                and secure exchange of documents, images, and
                                records among dental professionals, patients, and vendors.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('new_front_assets/images/feat-svg.svg') }}" alt=""
                        class="img-fluid d-block mx-auto ms-lg-auto" />
                </div>
            </div>
        </div>
    </section>
    <!-- features end -->
    <!-- cta start -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="text-center">
                        <h1 class="display-5 fw-bold mb-4">
                            Join the dental <br /> revolution today!
                        </h1>
                        <p class="text-muted mx-auto mb-5 w-75">Experience seamless communication, efficient
                            collaboration, and elevated
                            patient care with Udenz Hello's powerful web app. Sign up now and take your
                            dental practice to new heights.</p>
                        <a href="jav" class="btn btn-lg btn-primary" data-bs-toggle="modal"
                            data-bs-target="#signupModal">Start Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cta end -->
    <!-- contact start -->
    <section class="section bg-light" id="contact">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 col-lg-6 text-center">
                    <h6 class="subtitle">Contact <span class="fw-bold"> Us</span></h6>
                    <h2 class="title">Get in Touch</h2>
                    <p class="text-muted">Drop a message and our team will connect with you ASAP.</p>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-8">
                    <div class="card contact-form rounded-lg mt-4 mt-lg-0">

                        <div class="card-body p-5">
                            <form id="contactUs" action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="formFirstName" class="form-label"> Name</label>
                                            <input type="text" name="name" class="form-control" id="formFirstName"
                                                placeholder="Enter name" required />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="formEmail" class="form-label">Email Address</label>
                                            <input type="email" name="email" class="form-control" id="formEmail"
                                                placeholder="Enter email address" required />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="formPhone" class="form-label">Mobile Number
                                            </label>
                                            <input type="text" name="mobile_number"
                                                onkeypress="return isNumber(event)" class="form-control" id="formPhone"
                                                placeholder="Enter mobile number" required maxlength="10" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="formSubject" class="form-label">Subject</label>
                                            <input type="text" name="subject" class="form-control" id="formSubject"
                                                placeholder="Enter subject" />

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label for="formMessages" class="form-label">Message</label>
                                            <textarea class="form-control" name="message" id="formMessages" rows="4" placeholder="Enter message"></textarea>

                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-gradient-danger">Send Message </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact end -->
    <section class="background-banner msg">
        <div class="form-position">
            <form method="post" action="{{ route('apply-waiting-list') }}" id="frm">
                @csrf
                <div class="form-flex">
                    <div>
                        <input type="email" name="waitingEmail" class="form-control form-control-submit"
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email address">
                    </div>
                    <button type="submit" class="btn btn-apply email-alert-btn" id="submit">Apply Now</button>

                </div>
                {{-- <label id="exampleInputEmail1-error" class="error" for="exampleInputEmail1"></label> --}}
                <div class="alert alert-success hide email-alert">User Created successfully</div>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

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
            jQuery('#frm').validate({
                rules: {
                    waitingEmail: {
                        required: true,
                        validate_email: true,
                        remote: {
                            url: "{{ url('unique-email') }}",
                            type: "GET",
                            data: {
                                action: function() {
                                    return "1";
                                },
                            }
                        }
                    },
                },
                messages: {
                    waitingEmail: {
                        required: "Please enter email address",
                        validate_email: "Please enter a valid email address",
                        remote: "Email id already registred",
                    },
                },
                // submitHandler: function(form) {
                //     form.submit();
                // }
            });
        </script>

    </section>
    <!-- footer & cta start -->

    <div class="cookie"
        style=" bottom: 0;z-index: 1000;padding: 25px;
background-color: black;position: fixed; width: 100%;"
        id="exampleModal">
        <div class="col-md-12" style=";bottom: 0px;z-index: 999;;width: 100%;">
            <h4 style="color: white;">Cookie Policy </h4>
            <p style="color: white;"> Our website uses cookies to improve your experience. Learn more: <a
                    style="color: #3b62ac;" target="_blank" href="{{ route('cookies.policy') }}">cookies policy</a></p>
            <button type="submit" style="background-color:#3b62ac" class="btn"
                onclick="onSaveClick()">Accept</button>
        </div>
    </div>

    <script>
        setTimeout(function() {
            $(".alert").remove();
        }, 3000); // 3 secs
    </script>

    <script></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
        jQuery.validator.addMethod("validate_email", function(value, element) {
            if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
                return true;
            } else {
                return false;
            }
        }, "Please enter a valid Email.");
        var value = $("#inputPasseord").val();
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
        $('#contactUs').validate({
            ignore: [],
            rules: {
                name: {
                    required: true,
                },

                mobile_number: {
                    required: true,
                },
                subject: {
                    required: true,
                },
                message: {
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

            },
            messages: {
                name: {
                    required: "Please enter name",
                },
                mobile_number: {
                    required: "Please enter mobile number",

                },
                email: {
                    required: "Please enter email address",
                    validate_email: "Please enter a valid email address",
                    remote: "Email id already registred",
                },
                subject: {
                    required: "Please enter subject",
                },
                message: {
                    required: "Please enter message",
                },

            },
            submitHandler: function(form) {
                form.submit();
            },
        });
    </script>
@endsection
