<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	{{-- @if (session('reload'))
		<meta http-equiv="refresh" content="1">
	@endif --}}


    {{-- KET --}}
	{{-- <meta name="description" content="Web where you can buy something in our shop">
	<meta name="author" content="Mr. Kodet">
	<meta name="keywords" content="online shop"> --}}

    {{-- Font Google --}}
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">	

    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
	<link href="{{ asset('APP/app.css') }}" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('APP/unread.css') }}">
	<link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

	{{-- Data tables --}}
	<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">	
	{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.css"/> --}}
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
	<title>Dashboard - Mr. kodet</title>

	<script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('js/sweetAlert/sweetAlert2.js') }}"></script>
	{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

</head>