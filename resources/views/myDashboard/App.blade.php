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
</body>
</html>