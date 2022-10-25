<!doctype html>
<html lang= "en">
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
      <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/sideBar.css') }}">
   
    @livewireStyles
</head>
<body>
    
    <div class="grid-container">
    @include('layouts.inc.admin.header')
    @include('layouts.inc.admin.sidenavbar')

        <main class="main-container">
            @yield('content')
        </main>
    </div>

    <!-- Script -->
    <script src="{{ asset('assets/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

    <!-- Custom JS -->
    <script type="text/javascript" src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dropdown.js') }}"></script>

    @yield('scripts')

    @livewireScripts
    @stack('script')
</body>   
</html>