<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard @yield('admintitle')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  {{-- <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css') }}">  --}}
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />
  @yield("head")
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/')}}" class="nav-link">Home</a>
      </li>
    </ul>

   
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
         <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
        </a> 

         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('user.show',Auth::id())}}">
            <i class="fa fa-user"></i>
                  {{ __('Profile') }}
              </a>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                  <i class="fa fa-sign-out"></i>

                {{ __('Log out') }}
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
  <a href="{{url('/')}}" class="brand-link">
    <img src="{{ asset("/images/All About Animals_ logo illustrator.png")}}" style="width:80px;height:80px;"/>
      <span class="brand-text font-weight-light">All About Animal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/images/doctor avatar.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        {{-- <a href="{{route('user.show',Auth::id())}}" class="d-block">{{Auth::user()->name}}</a> --}}
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
          <a href="{{url('admin/home')}}" class="nav-link {{(request()->is('admin/home')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          <li class="nav-item has-treeview {{(request()->is('admin/create')) ? 'menu-open' : '' }}{{(request()->is('admin')) ? 'menu-open' : '' }}">
              <a href="" class="nav-link {{(request()->is('admin/create')) ? 'active' : '' }}{{(request()->is('admin')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Admins
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('admin/create')}}" class="nav-link {{(request()->is('admin/create')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Admins</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin')}}" class="nav-link {{(request()->is('admin')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Admins List</p>
                    </a>
                  </li>
                </ul>
            </li>
          <li class="nav-item has-treeview {{(request()->is('users/doctor')) ? 'menu-open' : '' }}{{(request()->is('users/clinic')) ? 'menu-open' : '' }}{{(request()->is('users/pending')) ? 'menu-open' : '' }}">
          <a href="" class="nav-link {{(request()->is('users/doctor')) ? 'active' : '' }}{{(request()->is('users/clinic')) ? 'active' : '' }}{{(request()->is('users/pending')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('users/doctor')}}" class="nav-link {{(request()->is('users/doctor')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Doctors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('users/clinic')}}" class="nav-link {{(request()->is('users/clinic')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Clinics</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('users/pending')}}" class="nav-link {{(request()->is('users/pending')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Users</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{(request()->is('blog/pending')) ? 'menu-open' : '' }}{{(request()->is('blog/accepted')) ? 'menu-open' : '' }}{{(request()->is('admin/blog/create')) ? 'menu-open' : '' }}">
            <a href="" class="nav-link {{(request()->is('blog/pending')) ? 'active' : '' }}{{(request()->is('blog/accepted')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Blogs
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{url('blog/accepted')}}" class="nav-link {{(request()->is('blog/accepted')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Accepted Blogs</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('blog/pending')}}" class="nav-link {{(request()->is('blog/pending')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pending Blogs</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('/admin/blog/create')}}" class="nav-link {{(request()->is('admin/blog/create')) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create Blog</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview {{(request()->is('tag/create')) ? 'menu-open' : '' }}{{(request()->is('tag')) ? 'menu-open' : '' }}">
              <a href="" class="nav-link {{(request()->is('tag/create')) ? 'active' : '' }}{{(request()->is('tag')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tags"></i>
                  <p>
                    Tags
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('tag/create')}}" class="nav-link {{(request()->is('tag/create')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Tags</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('tag')}}" class="nav-link {{(request()->is('tag')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>List Tags</p>
                    </a>
                  </li>
                </ul>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">

    @yield('content')

  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
{{-- <script src="{{asset('plugins/summernote/summernote-bs4.min.js') }}"></script>  --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="{{asset('js/main.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js') }}"></script>

</body>
</html>
