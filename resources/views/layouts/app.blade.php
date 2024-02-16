<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Battambang:wght@400;700;900&display=swap">
  <link rel="stylesheet" href="{{ mix('plugins/fontawesome-free/css/all.min.css') }}">
  @stack('before-styles')
 <link rel="stylesheet" href="{{ mix('css/adminlte.css') }}">
  @stack('after-styles')
  <style>
    * {
    font-family: 'Battambang', 'Source Sans Pro';
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->

  @include('layouts.partials.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('layouts.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('layouts.message')
    @include('layouts.partials.breadcrumbs')
    <!-- Main content -->
    <section class="content">

        @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2024.</strong> All rights reserved. Development by DEBC
  </footer>

</div>
<!-- ./wrapper -->
@stack('before-scripts')
<script src="{{ mix('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ mix('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ mix('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>

@stack('after-scripts')
<script src="{{ mix('js/adminlte.min.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
