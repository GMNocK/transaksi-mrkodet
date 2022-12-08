<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('APP/app.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">


    <style>
        @media print {
            #kembali {
                display: none;
            }
        }
    </style>

    <title>Cetak Laporan</title>
</head>
<body>
    
    <div class="wrapper">
        <div class="container-fluid shadow-none">

            @yield('isi')
            
        </div>
    </div>

<script>
    (function() {
        window.print();
        setTimeout(() => {
            history.back(); 
        }, 500);
    })();
</script>

</body>
</html>