
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
  <meta name="language" content="english">
  <meta name="csrf_token" content="{{ csrf_token() }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/global/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/global/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/global/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="/global/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="/global/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/global/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="/global/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="/global/toast/toastr.min.css">
  <link rel="stylesheet" href="/global/custom.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="/global/bower_components/select2/dist/css/select2.min.css">


  <script src="/global/bower_components/jquery/dist/jquery.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>IM-R</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>S</b>IM-R</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/global/user1.png" class="user-image" alt="User Image">
              <span class="hidden-xs" style="text-Transform: uppercase;">{{Auth::user()->email}} </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/global/user1.png" class="img-circle" alt="User Image">

                <p>
                  {{ \Auth::user()->email }}
                  <small>{{\Carbon\Carbon::now()}}</small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <i>
                    <a href="/change/en?redirect={{ str_replace('http://localhost:8000','',\URL::current()) }}" class="map text-white"> English</a> |
                    <a href="/change/id?redirect={{ str_replace('http://localhost:8000','',\URL::current()) }}" class="text-white"> Indonesia</a>
                  </i>
                </div>
                <div class="pull-right">
                  <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="/" target="_blank"><i class="fa fa-home"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/global/user1.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p style="text-Transform: uppercase;">{{Auth::user()->email}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ Request::segment('1') == 'dashboard' ? ' active' : '' }}">
          <a href="/dashboard">
            <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
          </a>
        </li>
        @if (auth()->user()->role == 'admin')
        <li class="{{ Request::segment('1') == 'users' ? ' active' : '' }}">
          <a href="/users">
            <i class="fa fa-users"></i> <span>USERS</span>
          </a>
        </li>
        <li class="{{ Request::segment('1') == 'abouts' ? ' active' : '' }}">
          <a href="/abouts">
            <i class="fa fa-info-circle"></i> <span>About</span>
          </a>
        </li>
        @endif
        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'panitia')
        <li class="{{ Request::segment('1') == 'ruangans' ? ' active' : '' }}">
          <a href="/ruangans">
            <i class="fa fa-building"></i> <span>Ruangans</span>
          </a>
        </li>
        <li class="{{ Request::segment('1') == 'agendas' ? ' active' : '' }}">
          <a href="/agendas">
            <i class="fa fa-edit"></i> <span>Agenda Rapat</span>
          </a>
        </li>
        <li class="{{ Request::segment('1') == 'hasil' ? ' active' : '' }}">
            <a href="/hasil">
                <i class="fa fa-edit"></i> <span>Hasil Rapat</span>
            </a>
        </li>
        @endif
        <li class="header">Tools</li>
        <li>
          <a href="/file/dokumentasi.pdf">
            <i class="fa fa-file"></i> <span>DOKUMENTASI</span>
          </a>
        </li>

    </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <section class="content-header">
      <h1>
        @yield('header')
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">@yield('header')</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    @yield('nothing')
      <div class="box with-border">
      <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        @yield('content')
      </div>

    </section>
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.21
    </div>
    <strong>Copyright &copy; 2021 <a href="#" target="_blank" rel="noopener noreferrer">#</a>.</strong> All rights
    reserved.
  </footer>

<!-- jQuery 3 -->
<!-- jQuery UI 1.11.4 -->
<script src="/global/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="/global/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/global/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/global/dist/js/adminlte.min.js"></script>
<script src="/global/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/global/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="/global/toast/toastr.min.js"></script>
<script src="/global/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="/global/bower_components/jquery-knob/js/jquery.knob.js"></script>
<script src="/global/plugins/iCheck/icheck.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="/global/js/jquery.mask.min.js"></script>
<script src="/global/bower_components/chart.js/Chart.js"></script>
<script src="/global/ckeditor/ckeditor.js"></script>
<script src="/global/make.js"></script>
<script>
    const data1 = CKEDITOR.replace('text-editor1')
</script>
@if($message = Session::get('success'))
<script>
  toastr.success('{{$message}}');
</script>
@endif

@if($message = Session::get('failed'))
<script>
  toastr.error('{{$message}}');
</script>
@endif
@if(count($errors) > 0)
  @foreach ($errors->all() as $error)
  <script>
    toastr.error('{{$error}}');
  </script>
  @endforeach
@endif
<script>
    function update(params) {
        $('#button-'+params).toggle(function () {
            $('#button-'+params).css('display','none')
        }, function () {
            $('#button-'+params).css('display','block')
        });
    }
</script>
@yield('script')
</body>
</html>
