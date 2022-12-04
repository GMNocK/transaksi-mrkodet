@include('myDashboard.partials.headTags')

<body>

	<div class="wrapper">
		@include('myDashboard.partials.sidebar')

		<div class="main">
			@include('myDashboard.partials.header')
			<main class="content">
				<div class="container-fluid p-0">

					@yield('content')
					
				</div>
			</main>
			@include('myDashboard.partials.footer')
		</div>
	</div>


	<script src="{{ asset('APP/app.js') }}"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
	<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
	
	@if (session('reload'))
		
		<script>
			alert('Berhasil memesan');
			location.reload();
		</script>

	@endif
 
	<script>
		// window.location = window.location.href;
	</script>

	{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.js"></script> --}}
</body>
</html>