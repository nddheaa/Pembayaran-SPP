<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('sneat') }}/assets/"
  data-template="vertical-menu-template-free">
  <head>
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
    <link rel="stylesheet" href="{{ asset('sneat') }}/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('sneat') }}/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('sneat') }}/assets/js/config.js"></script>
    <link rel="stylesheet" href="{{ asset('font/css/all.min.css') }}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />



    <style>
      /* Ganti warna navbar */
      .navbar.bg-navbar-theme {
          background-color: #95f853 !important; /* Ganti warna latar belakang sesuai kebutuhan */
      }

      /* Lebarkan navbar */
      .navbar-expand-xl {
          flex-wrap: nowrap;
           /* Menghilangkan wrapping pada menu */
      }

      /* Ganti warna teks dan ikon pada navbar */
      .navbar-nav-right a.nav-link {
          color: #1f0505 !important; /* Ganti warna teks sesuai kebutuhan */
      }

      /* Ganti warna sidebar */
      .menu.bg-menu-theme {
          background-color: #caf5b2 !important; /* Ganti warna latar belakang sesuai kebutuhan */
      }

      /* Lebarkan sidebar */
      .menu-vertical {
          width: 250px !important; /* Ganti lebar sesuai kebutuhan */
      }

      /* Ganti warna teks dan ikon pada sidebar */
      .menu-inner a.menu-link {
          color: #2a3629 !important; /* Ganti warna teks sesuai kebutuhan */
      }
      /* Mengurangi ukuran teks pada app-brand-text */
      .app-brand-text {
          font-size: 14px; /* Atur ukuran teks sesuai kebutuhan */
      }
  </style>
    
  </head>

  <body>s
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <div class="avatar">
                  <img src="{{ asset('sneat') }}/assets/img/avatars/nctlogo.png" alt class="w-px-40 h-auto rounded-circle" />
                </div>
              </span>
              <style>
                .app-brand-text {
                  text-transform: uppercase !important;
                  color: #30412e !important;
                  font-size: 25px !important; /* Sesuaikan ukuran teks sesuai kebutuhan */
                }
              </style>
              
              <span class="app-brand-text demo menu-text fw-bold ms-2">NCT SCHOOL</span>
              

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item {{ \Route::is('operator.beranda') ? 'active': '' }}">
              <a href="{{ route('operator.beranda') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Beranda</div>
              </a>
            </li>
            <li class="menu-item {{ \Route::is('user.*') ? 'active': '' }}">
              <a href="{{ route('user.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Basic">Operator</div>
              </a>
            <li class="menu-item {{ \Route::is('siswa.*') ? 'active': '' }}">
              <a href="{{ route('siswa.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Siswa</div>
              </a>
            </li>
            <li class="menu-item {{ \Route::is('detailsiswa.*') ? 'active': '' }}">
              <a href="{{ route('detailsiswa.index') }}" class="menu-link">
                <i class="menu-icon bx bx-user-circle"></i>
                <div data-i18n="Basic">Data Siswa</div>
              </a>
            </li>
            <li class="menu-item {{ \Route::is('biaya.*') ? 'active': '' }}">
              <a href="{{ route('biaya.index') }}" class="menu-link">
                <i class="menu-icon bx bx-coin"></i>
                <div data-i18n="Basic"> Data Biaya</div>
              </a>
            </li>
            <li class="menu-item {{ \Route::is('tagihan.*') ? 'active': '' }}">
              <a href="{{ route('tagihan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-money"></i>
                <div data-i18n="Basic"> Data Tagihan</div>
              </a>
            </li>
            <li class="menu-item {{ \Route::is('pembayaran.*') ? 'active': '' }}">
              <a href="{{ route('pembayaran.index') }}" class="menu-link">
                <i class="menu-icon bx bx-credit-card"></i>
                <div data-i18n="Basic"> Data Pembayaran</div>
              </a>
            </li>
            <!-- Pages -->
            <li class="menu-item">
              <a href="{{ route('logout') }}" class="menu-link">
                <i class="menu-icon bx bx-log-out"></i>
                <div data-i18n="Basic">Logout</div>
              </a>
            </li>

          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"  >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <div class="container-fluid">
                <!-- Tambahkan gaya CSS langsung ke elemen span -->
                <div style="position: relative; text-align: center;">
                  <span class="app-brand-text demo menu-text fw-bold ms-2" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">NEO CULTURE TECHNOLOGY</span>
              </div>                         
            </div>
              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{ asset('sneat') }}/assets/img/avatars/parti.jpeg" alt class="w-px-45 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{ asset('sneat') }}/assets/img/avatars/parti.jpeg" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-medium d-block"> Hello </span>
                            <small class="text-muted">Operator</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle ms-1">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="javascript:void(0);">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              @include('flash::message')
              @yield('content')
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ asset('sneat') }}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('sneat') }}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('sneat') }}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('sneat') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('sneat') }}/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('sneat') }}/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('sneat') }}/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ asset('sneat') }}/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <script src="{{ asset('js/select2.min.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery.mask.min.js') }}"></script> --}}
    <script>
      $(document).ready(function() {
        // $('.rupiah').mask("#.##0", {reverse: true});
        $('.select2').select2();
      });
    </script>
  </body>
</html>
