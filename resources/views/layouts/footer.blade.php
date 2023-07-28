  <section class="footer bg-dark">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 text-center text-lg-start">
                  <div class="footer-flex">
                      <div class="footer-logo mb-4">
                          <a href="#">
                              <img src="images/logos-white.png" class="footer-logo-set" alt="" />
                          </a>
                      </div>
                      <ul class="list-inline ">
                          <li class="list-inline-item">
                              <a href="https://www.facebook.com/UdenzMENA/" class="footer-social-icon"><i
                                      class="mdi mdi-facebook"></i></a>
                          </li>
                          <li class="list-inline-item">
                              <a href="https://twitter.com/i/flow/login?redirect_after_login=%2FUdenzMENA"
                                  class="footer-social-icon"><i class="mdi mdi-twitter"></i></a>
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
                      <input type="email" class="form-control" id="emailAddress1"
                          placeholder="Enter Mobile Number" />
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
      <script src="{{ asset('new_front_assets/js/jquery.js') }}"></script>
      <script src="{{ asset('new_front_assets/js/bootstrap.bundle.min.js') }}"></script>
      <!-- counter -->
      <script src="{{ asset('new_front_assets/js/counter.init.js') }}"></script>
      <!-- swiper -->
      <script src="{{ asset('new_front_assets/js/swiper-bundle.min.js') }}"></script>
      <script src="{{ asset('new_front_assets/js/swiper.js') }}"></script>
      <script src="{{ asset('new_front_assets/js/app.js') }}"></script>
      <!-- <script>
          $(document).ready(function() {
              // alert('hiiiii');
              $('.email-alert-btn').click(function() {
                  $('.email-alert').addClass('hide')
              })
              $("#submit").click(function() {
                  $(".alert-success").slideToggle("slow").delay(2000).slideToggle("slow");
              });
          });
      </script> -->
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
