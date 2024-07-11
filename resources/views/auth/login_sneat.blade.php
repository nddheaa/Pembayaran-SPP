<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('sneat') }}/assets/"
  data-template="vertical-menu-template-free">
  <head>
    <style>
        body {
            background-image: url('{{ asset('sneat') }}/assets/img/avatars/school.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }


  </style>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>NCT CASH</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('sneat') }}/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="{{ asset('sneat') }}/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('sneat') }}/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <style>
                .app-brand-text {
                    color: rgb(12, 125, 12) !important;
                    text-transform: uppercase !important;
                    font-family: 'Gill Sans', 'Gill Sans MT', 'Trebuchet MS', sans-serif !important;
                }
            </style>
            
            
              <a href="index.html" class="app-brand-link">
                  <img src="{{ asset('sneat') }}/assets/img/avatars/nctlogo.png" alt class="mx-auto d-block w-px-100 h-auto rounded-circle" />
    
              </a>
          
            <div class="app-brand justify-content-center text-center">
              <a href="index.html" class="app-brand-link">
                <span class="app-brand-text demo text-body fw-bold">Login</span>
              </a>
          </div>
          
         
              <!-- /Logo -->
              <h4 class="mb-2 justify-content-center text-center">PEMBAYARAN SPP</h4>
              <p class="mb-4 justify-content-center text-center">Neo Culture Technology High School</p>

              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    style="border-color:greenyellow"
                    placeholder="Enter your email or username"
                    autofocus />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    
                    <label class="form-label" style="border-color: green" for="password">Password</label>
                    <a href="auth-forgot-password-basic.html">
                      <small style="color: green;">Forgot Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      style="border-color:greenyellow"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password" />
                    <span class="input-group-text cursor-pointer" style="border-color:greenyellow"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <style>
                    .form-check {
                        color: green; /* Ubah warna teks menjadi hijau */
                    }
                
                    .form-check-input:checked {
                        background-color: green; /* Ubah warna background ketika checkbox dicentang menjadi hijau */
                        border-color: green !important; /* Ubah warna border ketika checkbox dicentang menjadi hijau */
                    }
                
                    .form-check-input:focus {
                        border-color: green; /* Ubah warna border saat checkbox aktif (focused) menjadi hijau */
                    }
                </style>
                
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
                
                </div>
                <div class="mb-3">
                  <button class="btn btn-success d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>

              <p class="text-center">
                <span>New on our platform?</span>
                <a href="auth-register-basic.html">
                  <span style="color: green;">Create an account</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ asset('sneat') }}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('sneat') }}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('sneat') }}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('sneat') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('sneat') }}/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('sneat') }}/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
