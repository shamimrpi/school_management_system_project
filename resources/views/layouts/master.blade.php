<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
 @include('layouts.partials._head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">



  <!-- Main Sidebar Container -->
 @include('layouts.partials._sidebar')
 @include('layouts.partials._navbar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      @include('flash::message')
    <!-- Content Header (Page header) -->
      @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->

  <!-- Main Footer -->
 
</div>
 @include('layouts.partials._footer')
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

@include('layouts.partials._footer_scripts')
</body>
</html>
