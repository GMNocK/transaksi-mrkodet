<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Mr Kodet</title>    


    {{-- CSS Linked --}}
      {{-- Bootstrap --}}
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      
      
      {{-- BOXICONS AS FONT --}}
      {{-- <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> --}}
      
      {{-- FONT AWESOME --}}
      <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}" type="text/css">
      
      {{-- Animate.css --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    {{-- End CSS Linked --}}

    {{-- Font Google --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

    <link rel="stylesheet" href="/css/editStyle.css">
    
    {{-- dropdown trans --}}
    <style>
      #laporanKaryawanDropdown.hide {
        display: none;
        transition: all 1s ease;
      }
      #laporanPelangganDropdown.show {
        transition: all 1s ease;
      }
      .hide {
        display: none;
        transition: all 1s ease;
      }
      .show {
        display: block;
        transition: all 1s;
      }
    </style>

    {{-- JavaScript --}}
      {{-- Chart Js --}}
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      
      {{-- Sweet Alert 2 --}}
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- End Js --}}

  </head>
  <body background="#dfdfdf">
    
    @include('dashboard.layouts.header')

<div class="container-fluid">
  <div class="row">

    @include('dashboard.layouts.sidebar')
    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="container"> 
        @yield('container')        
      </div>
    </main>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    {{-- Chart Js --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    {{-- <script src="https://cdnjs.com/libraries/Chart.js"></script> --}}

    <!-- choose one Feather Icon -->
    {{-- <script src="https://unpkg.com/feather-icons"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script> --}}

    {{-- BOX ICONS --}}
    {{-- <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script> --}}

    {{-- FONT AWESOME --}}
    <script src="https://kit.fontawesome.com/8f710bdca8.js" crossorigin="anonymous"></script>

    <script src="{{ asset('js/moment.js') }}"></script>
    <script>
        moment().format();
    </script>


    {{-- {{ Request::is('dashboard') ? '<script src="js/dashboard.js"></script>' : '' }} --}}
    
    

    {{-- COSTUM JS --}}
    <script src="/js/dashboard.js"></script>

   
</body>
</html>
    