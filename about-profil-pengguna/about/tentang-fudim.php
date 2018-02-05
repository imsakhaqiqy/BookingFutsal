<?php
		session_start();
		if(empty($_SESSION['email'])){
		
		}else{
			$_SESSION['email'];
			$nama = $_SESSION['email'];
			}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>maenfutsal - Situs Pesan Lapangan Futsal Online No.1 di Jakarta.</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="Stylesheet" href="/maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="Stylesheet" href="style-tentang-maenfutsal.css">
	<script src="/ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="/maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBuhPXRD7FmKHlKKhMIY7L-8q5A6NyNxTw&callback=initialize"></script>
	<script>
	var myCenter=new google.maps.LatLng(-6.340875,106.898356);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:17,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);
function TampilMap(){
	google.maps.event.addDomListener(window, 'load', initialize);
	}
	</script>
	<style>
		
	</style>
</head>
<body>
	
	<!--<div class="jumbotron">
		<div class="container-fluid text-center">
		<h1>fudim</h1>
			<p>Pesan Lapangan Futsal <i>Mudah</i> & <i>Menyenangkan</i></p>
		</div>
	</div>-->
	
	<nav id="header" class="navbar navbar-inverse" data-spy="affix" data-offset-top="0">
		<div class="container-fluid">
			<ul class="nav navbar-nav">
				<li><a href="/index.php" data-toggle="tooltip" data-placement="bottom" title="Cari Lapangan & Daftar Lapangan yang Tersedia" onmouseover="mDown(this)" onmouseout="mUp(this)"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
				
				<?php if(empty($_SESSION['email'])){ 
						echo"<li>";
						echo"<a href='/daftar/daftar.php' data-toggle='tooltip' data-placement='bottom' title='Daftar Sebagai Pengguna' onmouseover='mDown(this)' onmouseout='mUp(this)'><span class='glyphicon glyphicon-user'></span> Daftar</a>";
						echo"</li>";
						echo"<li>";
						echo"<a href='/masuk/masuk.php' data-toggle='tooltip' data-placement='bottom' title='Masuk Sebagai Pengguna' onmouseover='mDown(this)' onmouseout='mUp(this)'><span class='glyphicon glyphicon-log-in'></span> Masuk</a>";
						echo"</li>";
						}else{
						echo"<li>";
						echo"<a href='/masuk/keluar.php' data-toggle='tooltip' data-placement='bottom' title='Keluar dari fudim' onmouseover='mDown(this)' onmouseout='mUp(this)'><span class='glyphicon glyphicon-log-out'></span> Keluar</a>";
						echo"</li>";
						echo"<li>";
						echo"<a href='/confirm-no-struk/ConfirmNoStruk.php' data-toggle='tooltip' data-placement='bottom' title='Konfirmasi Pesanan Anda' onmouseover='mDown(this)' onmouseout='mUp(this)'><span class='glyphicon glyphicon-edit'></span> Konfirmasi</a>";
						echo"</li>";
						echo"</ul>";
						echo"<ul class='nav navbar-nav navbar-right'>";
						echo"<li>";
						echo"<a href='#'>Hallo $_SESSION[email]</a>";
						echo"</li>";
						echo"<li>";
						echo"<a href='/validasi/profil-daftar-pesanan.php' onmouseover='mDown(this)' onmouseout='mUp(this)' data-toggle='tooltip' data-placement='bottom' title='Lihat Status Pesanan Anda'><span class='glyphicon glyphicon-list-alt'></span> Cek Pesanan</a>";
						echo"</li>";
						echo"</ul>";
						}
						?>
		</div>
	</nav>
	
	<div class="container" style="width:80%">
		<div class="panel-group">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Tentang Fudim</h3></div>
				<div class="panel-body"><h3 style="text-align:center">Selamat datang di www.fudim.com</h3>
											<p class="text-justify" style="font-family:Verdana,sans-serif">Fudim merupakan situs pesan lapangan futsal secara <u>online</u>.  
											fudim menyediakan informasi lapangan futsal seperti lokasi,harga,jadwal dari pihak lapangan 
											ke konsumen.dan melayani pengguna dari daerah jakarta untuk 
											transaksi pemesanan lapangan futsal secara online.<br><br>
											<iframe width="100%" height="500" src="http://www.youtube.com/embed/XHhvDcn66tc?autoplay=0"
											frameborder="2" allowfullscreen></iframe>
											<br><br>
											Fudim memiliki slogan <u>mudah dan menyenangkan</u> 
											karena Fudim memberikan jaminan 100% uang kembali kepada 
											pengguna jika transaksi tidak terdaftar oleh pihak lapangan.
											<br><br>
											Visi Fudim: Mempermudah pencinta futsal dalam pemesanan lapangan futsal secara online.
											<br>
											Misi Bukalapak: Memberdayakan UKM yang ada di seluruh jakarta.
											<br><br>
											<div id="googleMap" style="width:500px;height:380px;margin:0 auto;margin-bottom:10px;border:1px solid blue"></div>
											<center>
											www.Fudim.com 
											<br>
											Jl. Buni RT 05/08 No. 17 Munjul Cipayung, 
											<br>
											DKI Jakarta 
											<br>
											Jakarta Timur, Indonesia 13850 
											<br><br>
											Jam Kerja: 
											<br>
											Setiap hari pukul 07.00 - 22.00 WIB
											</center></p></div>
				<div class="panel-footer"></div>
			</div>
		</div>
	</div>
	
	<footer class="container-fluid">
		<div id="pengguna">
		<h3>Pengguna</h3>
		<h4><a href="/about-profil-pengguna/pengguna/cara-pesan.php">Cara Pesan</a></h4>
		<h4><a href="/about-profil-pengguna/pengguna/pembayaran.php">Pembayaran</a></h4>
		<h4><a href="/about-profil-pengguna/pengguna/validasi.php">Konfirmasi</a></h4>
		<h4><a href="/about-profil-pengguna/pengguna/cetak-struk.php">Cetak Struk</a></h4>
		<h4><a href="#">Tips Pesan</a></h4>
		</div>
		<div id="tentang">
		<h3>Tentang</h3>
		<h4 class="active"><a href="tentang-fudim.php">Tentang Fudim</a></h4>
		<h4><a href="aturan-pengguna.php">Aturan Pengguna</a></h4>
		<h4><a href="kebijakan-privasi.php">Kebijakan Privasi</a></h4>
		<h4><a href="#">Berita & Pengumuman</a></h4>
		<h4><a href="#">Laporan & Masalah</a></h4>
		</div>
		<div id="halaman">
			<h3>Temukan Kami di :</h3>
			<ul id="medsos">
				<li><a href="https://www.facebook.com/imsak.haqiqy?ref=bookmarks"><img src="/image/facebook1.png" alt="facebook icon" width="50" height="50"></a></li>
				<li><a href="#"><img src="/image/instagram.png" alt="instagram icon" width="50" height="50"></a></li>
				<li><a href="#"><img src="/image/twitter.png" alt="twitter icon" width="50" height="50"></a></li>
			</ul>
		</div>
		<br/><br>
		<h4 class="text-center" style="color:white;font-family:Consolas"><a href="#" style="color:#92B6D5;font-family:Consolas">www.Fudim.com</a> @Copyright 2016</h4>
	</footer>

<script>
	function mDown(obj){
		obj.style.backgroundColor = "#004d38";
		}
	function mUp(obj){
		obj.style.backgroundColor = "#006e51";	
		}
	function mEx(obj){
		obj.style.backgroundColor = "#92D6B5";
		}
</script>
</body>
</html>