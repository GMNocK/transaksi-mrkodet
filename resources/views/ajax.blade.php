@extends('myDashboard.App')

@section('content')

<div class="content">
	<header>
		<h1 class="judul">WWW.MALASNGODING.COM</h1>
		<h3 class="deskripsi">Membuat Halaman Website Ajax Tanpa Reload dengan JQuery</h3>
	</header>

	<div class="menu">
		<ul>
			<li><a class="klik_menu" id="home">HOME</a></li>
			<li><a class="klik_menu" id="tentang">TENTANG</a></li>
			<li><a class="klik_menu" id="tutorial">TUTORIAL</a></li>
			<li><a class="klik_menu" id="sosmed">SOSIAL MEDIA</a></li>
		</ul>
	</div>

	<div class="badan">

	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.klik_menu').click(function(){
			var menu = $(this).attr('id');
			if(menu == "home"){
				$('.container-fluid').load('/myDashboard');						
			}else if(menu == "tentang"){
				$('.badan').load('/profile');
			}else if(menu == "tutorial"){
				$('.badan').load('tutorial.php');						
			}else if(menu == "sosmed"){
				$('.badan').load('sosmed.php');						
			}
		});

		// halaman yang di load default pertama kali
		$('.badan').load('/myDashboard');						

	});
</script>

@endsection