<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>All in | ONE</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
  <
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{Auth::user()->name}} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          
            <a href="{{ route('ServiceProfile') }}" class="dropdown-item">Profile</a>

              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{session()->get('service_name')}}</span>
    </a>    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!--<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php
          $segment=Request::segment(1);
          $segment2=Request::segment(2);
          ?>
          <li class="nav-item">
            <a href="{{route('ServiceUser.index')}}" class="nav-link 
            @if($segment=='ServiceUser' && !$segment2)
            active
            @endif
            ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('ServiceUser.create')}}" class="nav-link
            @if($segment=='ServiceUser' && $segment2=='create')
            active
            @endif">
            <i class="nav-icon fa fa-user-circle"></i>
            <p>Register user</p>
            </a>
          </li>
         <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Register admin</p>
            </a>    -->
          </li>
          <li class="nav-item">
            <a href="{{ route('ServiceBill.index') }}" class="nav-link
            @if($segment=='ServiceBill')
            active
            @endif">
              <i class="nav-icon fas fa-th"></i>
              <p>send bills</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('ServiceNotification.index') }}" class="nav-link
            @if($segment=='ServiceNotification')
            active
            @endif">
              <i class="nav-icon fas fa-envelope-open-text"></i> 
              <p>send notification</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('ServiceNews.index') }}" class="nav-link
            @if($segment=='ServiceNews')
            active
            @endif">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>send news</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('History.index') }}" class="nav-link
            @if($segment=='History')
            active
            @endif">
              <i class="nav-icon fas fa-history"></i>
              <p>Payment History</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('Mail.index') }}" class="nav-link
            @if($segment=='Mail')
            active
            @endif">
              <i class="nav-icon fa fa-envelope-square"></i>
              <p>Send Email </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019-2020 <a href="#">AllinOne Bill Payment</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Seminar Project</b> 
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }} "></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('plugins/morris/morris.min.js') }} "></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }} "></script>
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }} "></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }} "></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/knob/jquery.knob.js') }} "></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }} "></script>
<!-- datepicker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }} "></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }} "></script>
<!-- Slimscroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }} "></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js') }} "></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }} "></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }} "></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }} "></script>
</body>
</html>
