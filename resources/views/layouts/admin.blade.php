<!doctype html>
<html lang= "{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>@yield('title')</title>

        <!-- Montserrat Font -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

        <!-- Drop Down Icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">     
        <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">  
        <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">

        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
        <link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css')}}">

        <!-- plugin css for this page -->
        <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">

        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('admin/css/style.css')}}">

        <link rel="shortcut icon" href="{{ asset('admin/images/Haruharu_dbd.png')}}" />

        <script type="text/javascript">
            var base_url = "<?php echo url('/'); ?>";
        </script>
    @livewireStyles
</head>
<body>

    <div class="container-scroller">
        @include('layouts.inc.admin.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('layouts.inc.admin.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- plugins:js -->
    <script src="{{asset('admin/vendors/base/vendor.bundle.base.js') }}"></script>
    <script src="{{asset('admin/vendors/dataTables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('admin/js/template.js')}}"></script>
    <!-- <script src="{{asset('admin/js/dashboard.js')}}"></script> -->
    
    <!-- Script -->
    <script src="{{ asset('assets/js/jquery-3.6.1.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    
    
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

    <!-- Custom JS -->
    <script type="text/javascript" src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dropdown.js') }}"></script>

    @yield('scripts')

    @livewireScripts
    @stack('script')
</body>
</html>
