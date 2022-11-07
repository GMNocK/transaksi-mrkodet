<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Mr Kodet</title>    

    
    
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    
    {{-- BOXICONS AS FONT --}}
    {{-- <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> --}}
    
    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('favicon.ico') }}"> --}}

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

      {{-- Chart Js --}}
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      
      {{-- Sweet Alert 2 --}}
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      
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


    {{-- COSTUM JS --}}
    <script src="/js/dashboard.js"></script>
       
    {{-- <script>
        Swal.fire({
          title: 'Error!',
          text: 'Do you want to continue',
          icon: 'error',
          timer: 3500,
          confirmButtonText: 'Close'
        })
    </script>
         --}}
    {{-- <script>
      const labels = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
      ];
    
      const data = {
        labels: labels,
        datasets: [{
          label: 'My First dataset',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: [0, 10, 5, 2, 20, 30, 45],
        }]
      };
    
      const config = {
        type: 'line',
        data: data,
        options: {}
      };
    </script>
    <script>
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
    </script> --}}
    
  </body>
</html>
