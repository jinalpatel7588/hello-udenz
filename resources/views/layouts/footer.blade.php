  <section class="footer bg-dark">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 text-center text-lg-start">
                  <div class="footer-flex">
                      <div class="footer-logo mb-4">
                          <a href="#">
                              <img src="{{ asset('new_front_assets/images/logos-white.png') }}" class="footer-logo-set"
                                  alt="" />
                          </a>
                      </div>
                      <ul class="list-inline ">
                          <li class="list-inline-item">
                              <a href="https://www.facebook.com/UdenzMENA/" class="footer-social-icon"><i
                                      class="mdi mdi-facebook"></i></a>
                          </li>
                          <li class="list-inline-item">
                              <a href="https://twitter.com/i/flow/login?redirect_after_login=%2FUdenzMENA"
                                  class="footer-social-icon"><img
                                      src="{{ asset('new_front_assets/images/x-twitter.svg') }}"></a>
                          </li>
                          <li class="list-inline-item">
                              <a href="https://www.linkedin.com/company/udenzmena/" class="footer-social-icon"><i
                                      class="mdi mdi-linkedin"></i></a>
                          </li>
                          <li class="list-inline-item">
                              <a href="https://www.instagram.com/UdenzMENA/" class="footer-social-icon"><i
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
                          <a style="color: white;" href="{{ route('terms.condition') }}">Terms and
                              Conditions</a>
                      </div>
                      <div class="col-auto">
                          <a style="color: white;" href="{{ route('privacy') }}">Privacy Policy </a>
                      </div>
                      <div class="col-auto">
                          <a style="color: white;" href="{{ route('gdpr') }}">GDPR Terms
                              and Conditions</a>
                      </div>

                      <div class="col-auto">
                          <a style="color: white;" href="{{ route('env') }}">Environmental
                              and Social Responsibilities Policy</a>
                      </div>
                      <div class="col-auto">
                          <a style="color: white;" href="{{ route('dentist.privacy') }}">Dentist
                              Privacy Policy </a>
                      </div>
                      <div class="col-auto">
                          <a style="color: white;" href="{{ route('patient.privacy.policy') }}">Patient
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
                              <input class="form-check-input" type="checkbox" value=""
                                  id="flexCheckDefault" />
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
  <!-- Signup Modal -->
  <div class="modal fade" id="signupModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
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
                              <input class="form-check-input" type="checkbox" value=""
                                  id="flexCheckDefault1" />
                              <label class="form-check-label" for="flexCheckDefault1"> I agree to the <a
                                      href="{{ route('terms.condition') }}">Terms of Service</a> and <a
                                      href="{{ route('privacy') }}">Privacy Policy</a> </label>
                          </div>
                          <button type="submit" class="btn btn-gradient-primary w-100">Register</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
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
      jQuery('#form').validate({
          rules: {
              name: "required",
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
              form.submit();
          },
      });
  </script>

  <!-- javascript -->
  <script src="{{ asset('new_front_assets/js/jquery.js') }}"></script>
  <script src="{{ asset('new_front_assets/js/bootstrap.bundle.min.js') }}"></script>
  <!-- counter -->
  <script src="{{ asset('new_front_assets/js/counter.init.js') }}"></script>
  <!-- swiper -->
  <script src="{{ asset('new_front_assets/js/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('new_front_assets/js/swiper.js') }}"></script>
  <script src="{{ asset('new_front_assets/js/app.js') }}"></script>
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
          } else {
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
      $(".toggle-password").click(function() {
          $(this).toggleClass("mdi-eye-outline");
          input = $(this).parent().find("input");
          if ($(".input-password").attr("type") == "password") {
              $(".input-password").attr("type", "text");
          } else {
              $(".input-password").attr("type", "password");
          }
      });

      $(".toggle-password-2").click(function() {
          $(this).toggleClass("mdi-eye-outline");
          input = $(this).parent().find("input");
          if ($(".input-password-1").attr("type") == "password") {
              $(".input-password-1").attr("type", "text");
          } else {
              $(".input-password-1").attr("type", "password");
          }
      });


      function isNumber(evt) {
          evt = (evt) ? evt : window.event;
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode > 31 && (charCode < 48 || charCode > 57)) {
              return false;
          }
          return true;
      }
  </script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script>
      $("document").ready(function() {
          setTimeout(function() {
              $("#error").remove();
          }, 5000); // 5 secs

      });
  </script>
  <script>
      $(document).ready(function() {
          $('#validation-form100').validate({
              debug: false,
              event: 'blur',
              ignore: [],

              rules: {

                  email: {
                      required: true,
                  },
                  password: {
                      required: true,
                  }

              },
              messages: {

                  email: {
                      required: "Please Enter Email",
                  },
                  password: {
                      required: "Please Enter Password",
                  }

              }
          });
      });
  </script>

  </body>

  </html>
