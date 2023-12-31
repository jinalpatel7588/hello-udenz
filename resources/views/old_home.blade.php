<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Site Title -->
    <title>Home</title>
    <link rel="shortcut icon" href="images/Udenz Hello icon.png">
    <!-- Swiper js -->
    <link rel="stylesheet" href="{{asset('front_assets/css/swiper-bundle.min.css')}}" type="text/css" />
    <!--Material Icon -->

    <link rel="stylesheet" type="text/css" src="{{asset('front_assets/css/materialdesignicons.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front_assets/css/bootstrap.min.css')}}" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/style.css')}}" />
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="60">
    <!--Navbar Start-->
    
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom navbar-light sticky-dark" id="navbar-sticky">
        <div class="container">
            <!-- LOGO -->
            <a class="logo text-uppercase" href="index.html">
                <img src="{{asset('front_assets/images/logo-chat.png')}}" alt="" class="logo-dark logo-image" />
                <img src="{{asset('front_assets/images/logo-chat.png')}}" alt="" class="logo-light " />
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
                        <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="btn btn-sm nav-btn" data-bs-toggle="modal"
                            data-bs-target="#signupModal">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
    <!-- home-agency start -->
    <section class="hero-4" id="home">
        <div class="bg-overlay-img"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="hero-title text-white fw-bold mb-4 display-5 head-font">Innovative Communication
                        Platform<span class="text-primary"> for Dental
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
                    <a data-bs-toggle="modal" data-bs-target="#signupModal" class="btn btn-lg btn-primary">Get Started
                        <i class="mdi mdi-arrow-right-thin ms-1 fs-22 right-arrow"></i></a>
                </div>
                <div class="col-lg-5">
                    <div class="mt-5 mt-lg-0">
                        <img src="{{asset('front_assets/images/banner-image.png')}}" alt="" class="img-fluid d-block mx-auto">
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
                            <img src="{{asset('front_assets/images/about-us-image.jpg')}}">
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
                            <img src="{{asset('front_assets/images/registration.svg')}}" class="w-75" style="vertical-align: initial;">
                        </div>
                        <h5 class="fw-semibold">1. Register to the web app</h5>
                        <p class="text-muted">to access Udenz Hello's communication platform for dental professionals.
                        </p>
                        <img src="{{asset('front_assets/images/arrow-bottom.png')}}" alt="" class="work-arrow" />
                    </div>
                    <div class="work-box px-lg-5 text-center mb-5 mb-lg-0">
                        <div class="work-icon bg-soft-success mb-4">
                            <img src="{{asset('front_assets/images/group.svg')}}" class="w-75" style="vertical-align: initial;">
                            <!-- <i class="mdi mdi-palette-outline"></i> -->
                        </div>
                        <h5 class="fw-semibold">2. Create a room within the platform </h5>
                        <p class="text-muted">to facilitate real-time collaboration and information sharing.</p>
                    </div>
                    <div class="work-box px-lg-5 text-center mb-5 mb-lg-0">
                        <div class="work-icon bg-soft-warning mb-4">

                            <img src="{{asset('front_assets/images/invite.svg')}}" class="invite-logo" style="vertical-align: initial;">

                        </div>
                        <h5 class="fw-semibold">3. Invite members into the room</h5>
                        <p class="text-muted">enabling seamless communication and enhanced teamwork among dental team
                            members and clients.
                        </p>
                        <img src="{{asset('front_assets/images/arrow-top.png')}}" alt="" class="work-arrow-down" />
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
                    <img src="{{asset('front_assets/images/feat-svg.svg')}}" alt="" class="img-fluid d-block mx-auto ms-lg-auto" />
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
                            <form>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="formFirstName" class="form-label"> Name</label>
                                            <input type="text" class="form-control" id="formFirstName"
                                                placeholder="Enter name" required />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="formEmail" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" id="formEmail"
                                                placeholder="Enter email address" required />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="formPhone" class="form-label">mobile number</label>
                                            <input type="text" class="form-control" id="formPhone"
                                                placeholder="Enter mobile number" required />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="formSubject" class="form-label">Subject</label>
                                            <input type="text" class="form-control" id="formSubject"
                                                placeholder="Enter subject" required />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label for="formMessages" class="form-label">Message</label>
                                            <textarea class="form-control" id="formMessages" rows="4"
                                                placeholder="Enter message" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-gradient-danger">Send Messages </button>
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
            <form>
                <div class="form-flex">
                    <div>
                        <input type="email" class="form-control form-control-submit" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter your email address">
                    </div>
                    <button type="button" class="btn btn-apply email-alert-btn" id="submit">Apply Now</button>

                </div>
                <div class="alert alert-success hide email-alert">User Created successfully</div>
            </form>
        </div>

    </section>
    <!-- footer & cta start -->
    <section class="footer bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center text-lg-start">
                    <div class="footer-flex">
                        <div class="footer-logo mb-4">
                            <a href="#">
                                <img src="{{asset('front_assets/images/logos-white.png')}}" class="footer-logo-set" alt="" />
                            </a>
                        </div>
                        <ul class="list-inline ">
                            <li class="list-inline-item">
                                <a href="https://www.facebook.com/" class="footer-social-icon"><i
                                        class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://www.twitter.com/" class="footer-social-icon"><i
                                        class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://www.linkedin.com/" class="footer-social-icon"><i
                                        class="mdi mdi-linkedin"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://www.instagram.com/" class="footer-social-icon"><i
                                        class="mdi mdi-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <a style="color: white;" href="{{route('hello.terms.and.conditions')}}">Terms and
                                Conditions</a>
                        </div>
                        <div class="col-auto">
                            <a style="color: white;" href="{{route('privacy.policy')}}">Privacy Policy </a>
                        </div>
                        <div class="col-auto">
                            <a style="color: white;" href="{{route('terms.and.conditions')}}">GDPR Terms
                                and Conditions</a>
                        </div>

                        <div class="col-auto">
                            <a style="color: white;" href="env.html">Environmental
                                and Social Responsibilities Policy</a>
                        </div>
                        <div class="col-auto">
                            <a style="color: white;" href="{{route('dentist.privacy.policy')}}">Dentist
                                Privacy Policy </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="footer-tagline">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="text-center py-2">
                        <p style="text-align: center; color: #fff; font-size: 16px;" class="mb-0">© 2023 Udenz Hello by
                            Udenz. All Rights Reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer & cta end -->
    <!-- Back to top -->
    <a href="#" onclick="topFunction()" class="back-to-top-btn btn btn-gradient-primary" id="back-to-top"><i
            class="mdi mdi-chevron-up"></i></a>
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="text-center mb-4">
                        <h4 class="mb-0">Welcome Back</h4>
                        <p class="text-muted fs-15">Welcome back! Please enter your details.</p>
                    </div>
                    <div class="mb-3">
                        <label for="emailAddress" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="emailAddress" placeholder="Enter Email" />
                    </div>
                    <div class="mb-2">
                        <label for="inputPasseord" class="form-label">Password</label>
                        <div class="position-set">
                            <input type="password" class="form-control input-password" placeholder="Enter Password"
                                id="inputPasseord" />
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
                    <a href="javascript:void(0);" class="btn btn-gradient-primary w-100"
                        data-bs-dismiss="modal">Login</a>

                </div>
            </div>
        </div>
    </div>
    <!-- Signup Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="text-center mb-4">
                        <h4 class="">Register</h4>
                    </div>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Name</label>

                        <input type="text" class="form-control" id="firstName" placeholder="Enter Name" />


                    </div>
                    <div class="mb-3">
                        <label for="lasttName" class="form-label">Email Address</label>
                        <input type="text" class="form-control" id="lasttName" placeholder="Enter Email Address" />
                    </div>
                    <div class="mb-3">
                        <label for="emailAddress1" class="form-label">Mobile Number</label>
                        <input type="email" class="form-control" id="emailAddress1" placeholder="Enter Mobile Number" />
                    </div>
                    <div class="mb-2">

                        <label for="inputPasseord2" class="form-label">Password</label>
                        <div class="position-set">
                            <input type="password" class="form-control input-password" id="inputPasseord2"
                                placeholder="Enter Password" />
                            <div class="icon-position">
                                <span class="toggle-password mdi mdi-eye-off-outline"></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="inputPasseord2" class="form-label">Confirm Password</label>
                        <div class="position-set">
                            <input type="password" class="form-control input-password" id="inputPasseord2"
                                placeholder="Enter Confirm Password" />
                            <div class="icon-position">
                                <span class="toggle-password mdi mdi-eye-off-outline"></span>
                            </div>

                        </div>
                        <div class="form-check mb-4 pb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1" />
                            <label class="form-check-label" for="flexCheckDefault1"> I agree to the <a
                                    href="terms-condition.html">Terms of Service</a> and <a
                                    href="privacy-policy.html">Privacy Policy</a> </label>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-gradient-primary w-100"
                            data-bs-dismiss="modal">Register</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- javascript -->
        <script src="{{asset('front_assets/js/jquery.js')}}"></script>
        <script src="{{asset('front_assets/js/bootstrap.bundle.min.js')}}"></script>
        <!-- counter -->
        <script src="{{asset('front_assets/js/counter.init.js')}}"></script>
        <!-- swiper -->
        <script src="{{asset('front_assets/js/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('front_assets/js/swiper.js')}}"></script>
        <script src="{{asset('front_assets/js/app.js')}}"></script>
        <!-- <script>
        $(document).ready(function () {
            // alert('hiiiii');
            $('.email-alert-btn').click(function (){
                $('.email-alert').addClass('hide')
            })
            $("#submit").click(function () {
                $(".alert-success").slideToggle("slow").delay(2000).slideToggle("slow");
            });
        });
    </script> -->
        <script>
            $(".toggle-password").click(function () {
                $(this).toggleClass("mdi-eye-outline");
                input = $(this).parent().find("input");
                if ($(".input-password").attr("type") == "password") {
                    $(".input-password").attr("type", "text");
                } else {
                    $(".input-password").attr("type", "password");
                }
            });
        </script>

</body>

</html>