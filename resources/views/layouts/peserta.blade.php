<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/img/favicon.png">
  <title>
    Peserta meeting page
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="/assets/css/soft-ui-dashboard.css" rel="stylesheet" />
  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2">
      <div class="container-fluid py-4">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 ps-2 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="text-white opacity-5" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Peserta</li>
          </ol>
          <h4 class="text-white font-weight-bolder ms-2">Peserta</h4>
        </nav>
        <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="/logout" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign out</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 pe-0 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                  </div>
                </a>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="data:image/png;base64,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" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1" style="text-transform: uppercase">
                {{ auth()->user()->name }}
              </h5>
              <p class="mb-0 font-weight-bold text-sm" style="text-transform: uppercase">
                {{ auth()->user()->role }}
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active " href="/peserta" >
                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(603.000000, 0.000000)">
                              <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                              </path>
                              <path class="color-background" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" opacity="0.7"></path>
                              <path class="color-background" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" opacity="0.7"></path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                    <span class="ms-1">Rapat</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 " href="/hasils" aria-selected="false">
                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <title>document</title>
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(154.000000, 300.000000)">
                              <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                              <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                              </path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                    <span class="ms-1">Hasil Rapat</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        @yield('body')
      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-12 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start ">
                Version 01.21
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
</div>

      </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>