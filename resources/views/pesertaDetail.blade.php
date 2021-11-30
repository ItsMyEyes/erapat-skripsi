<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/img/favicon.png">
  <title>
    Rapat {{ $rapatSelf->judul }}
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
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="/peserta">
                <i class="fa fa-long-arrow-left"></i> Back
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item" style="text-align: center">
                  <a class="nav-link me-2" href="#">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    {{ $rapatSelf->judul }}
                  </a>
                </li>
              </ul>
                <ul class="navbar-nav mt-xs-4">
                  <li class="nav-item" style="text-align: center">
                    @if ($hadir && !isset($rapatSelf->hasilRapat) && is_null($rapatSelf->hasilRapat))
                      <a href="{{ $rapatSelf->getPlaceRapat() }}" target="_blank" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark"><i class="fa fa-sign-in" style="font-size: 13px;"></i> Masuk ruangan</a>
                    @elseif ($hadir && isset($rapatSelf->hasilRapat) && !is_null($rapatSelf->hasilRapat))
                      <a href="/notulen/{{ urlencode($kampret) }}/rapat" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark"><i class="fa fa-edit" style="font-size: 13px;"></i> Check Hasil Rapat</a>
                    @else
                      <a href="/absen/{{ urlencode($kampret) }}/rapat" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark">Absen</a>
                    @endif
                  </li>
                </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content" style="margin-top: 5.5em">
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                {!! $rapatSelf->desc  !!}
            </div>
        </div>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
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
  <script src="/assets/js/soft-ui-dashboard.min.js"></script>
    <script>
        $('input').attr('autocomplete','off')
    </script>
</body>

</html>