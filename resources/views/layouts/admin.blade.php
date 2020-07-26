<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/css/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/css/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/css/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Bootstrap 4 RTL -->
  <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
  <!-- Custom style for RTL -->
  <link rel="stylesheet" href="/css/custom.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Restaurant 2</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item ">
            <a href="/admin/dashboard" class="nav-link">
               <i class="nav-icon fas fa-tachometer-alt"></i><p >الرئيسية</p>
            </a>
         </li>
         <li class="nav-item">
           <a href="/admin/category" class="nav-link">
             <i class="nav-icon fas fa-copy"></i><p > الاقسام</p>
           </a>
         </li>
         <li  class="nav-item">
          <a href="/admin/restaurant" class="nav-link">
              <i class="nav-icon fas fa-th"></i><p > المطاعم</p>
          </a>
        </li>
         <li  class="nav-item">
           <a href="/admin/product" class="nav-link">
               <i class="nav-icon fas fa-th"></i><p > المنتجات</p>
           </a>
         </li>
         <li  class="nav-item">
           <a href="/admin/attribute" class="nav-link">
               <i class="nav-icon fas fa-th"></i><p >الخصائص </p>
           </a>
         </li>
         <li  class="nav-item">
           <a href="/admin/value" class="nav-link">
               <i class="nav-icon fas fa-th"></i><p >قيم الخصائص</p>
           </a>
         </li>
         <li  class="nav-item">
          <a href="/admin/addition" class="nav-link">
              <i class="nav-icon fas fa-th"></i><p >الاضافات</p>
          </a>
        </li>
         <li  class="nav-item ">
           <a href="/admin/tag" class="nav-link">
               <i class="nav-icon fas fa-tags"></i><p >كلمات لها علاقة</p>
           </a>
         </li>
         <li  class="nav-item ">
           <a href="/admin/offer" class="nav-link">
               <i class="nav-icon fas fa-th"></i><p >العروض </p>
           </a>
         </li>
         <li  class="nav-item">
           <a href="/admin/orders" class="nav-link">
               <i class="nav-icon fas fa-shopping-cart"></i><p > الطلبات</p>
           </a>
         </li>
         <li  class="nav-item">
           <a href="/admin/clients" class="nav-link">
               <i class="nav-icon fas fa-users"></i><p > العملاء</p>
           </a>
         </li>
         
        </ul>
      </nav>
    </div>
  </aside>
  <div class="content-wrapper">
    <section class="content p-2">
       @yield('content')
    </section>
  </div>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<!-- jQuery -->
<script src="/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 rtl -->
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/js/sparkline.js"></script>

<script src="/js/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/js/moment.min.js"></script>
<script src="/js/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/js/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/js/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/js/demo.js"></script>
</body>
</html>
