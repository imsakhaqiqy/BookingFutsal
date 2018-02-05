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
	<link rel="Stylesheet" href="style-cara-pesan.css">
	<script src="/ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="/maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style>
		
	</style>
</head>
<body>
	<!--<div class="jumbotron">
		<div class="container text-center">
		<h1>fudim</h1>
			<p>Pesan Lapangan Futsal <i>Mudah</i> & <i>Menyenangkan</i></p>
		</div>
	</div>-->
	
	<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="0">
		<div class="container-fluid">
			<ul class="nav navbar-nav">
				<li><a href="/index.php" data-toggle="tooltip" data-placement="bottom" title="Cari Lapangan & Daftar Lapangan yang Tersedia" onmouseover="mDown(this)" onmouseout="mUp(this)"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
				
				<?php if(empty($_SESSION['email'])){ 
						echo"<li>";
						echo"<li><a href='/daftar/daftar.php' data-toggle='tooltip' data-placement='bottom' title='Daftar Sebagai Pengguna' onmouseover='mDown(this)' onmouseout='mUp(this)'><span class='glyphicon glyphicon-user'></span> Daftar</a></li>";
						echo"</li>";
						echo"<li>";
						echo"<a href='/masuk/masuk.php' data-toggle='tooltip' data-placement='bottom' title='Masuk Sebagai Pengguna' onmouseover='mDown(this)' onmouseout='mUp(this)'><span class='glyphicon glyphicon-log-in'></span> Masuk</a>";
						echo"</li>";
						}else{
						echo"<li>";
						echo"<a href='/masuk/keluar.php' data-toggle='tooltip' data-placement='bottom' title='Keluar dari Akun fudim Anda' onmouseover='mDown(this)' onmouseout='mUp(this)'><span class='glyphicon glyphicon-log-out'></span> Keluar</a>";
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
	
	<div class="container" style="width:80%;">
		<div class="panel-group">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Cara Pesan</h3></div>
				<div class="panel-body"><p class="text-justify" style="font-family:Verdana,sans-serif">
										<ul style="font-family:Verdana,sans-serif">
											<li>Pengguna diharap mendaftar terlebih dahulu dan login agar dapat menggunakan fitur pesan lapangan futsal di fudim.com.</li><br>
											<li>Pengguna dapat mencari nama lapangan,jenis lapangan dan alamat lapangan pada halaman beranda.</li><br>
											<li>Pengguna dapat memilih lapangan yang sesuai dengan kebutuhan pengguna dengan mengklik tombol "Pesan Sekarang".</li><br>
											<li>Pengguna akan di tampilkan pada halaman lapangan yang pengguna pilih.</li><br>
											<li>Pada halaman tersebut terdapat fitur "jadwal" dan "pofil", dihalaman "jadwal" pengguna dapat memesan lapangan dan di halaman 
												"profil" pengguna dapat melihat profil detail lapangan tersebut berupa alamat dll.</li><br>
											<li>Pada halaman "jadwal" pengguna dapat memilih "lokasinya" dan "tanggalnya", "lokasinya" berfungsi
												untuk menentukan di lapangan berapa pengguna bermain dan "tanggalnya" berfungsi untuk menentukan
												tanggal berapa pengguna dapat bermain.</li><br>
											<li>Kemudian pengguna harap mengklik tombol "Cek" agar jadwal lapangan yang pengguna tentukan dapat
												tampil dengan otomatis.</li><br>
											<li>Jadwal lapangan akan tampil dan pengguna dapat memilih jam main sesuai kebutuhan pengguna, dengan
												mengklik tombol "pesan".</li><br>
											<li>Selanjutnya Pengguna dihadapkan dengan form "Data Pemesan",pengguna diharapkan mengisi data dengan sebenar
												benarnya agar proses pemesanan berjalan dengan lancar.</li><br>
											<li>Selanjutnya Pengguna dihadapkan dengan halaman "Detail Pesanan", pada halaman tersebut Pengguna diharapkan
												memeriksa datanya apakah data tersebut sesuai dengan pesanan yang anda butuhkan serta tentukan "Rekening Tujuan"
												untuk menjadi tujuan transfer "Uang Dpnya".</li><br>
											<li>Jika pada halaman "Detail Pesanan" pengguna memastikan seluruh datanya benar, silahkan klik tombol "Pesan Sekarang"
												untuk menyelesaikan pesanan dan tombol "Batal" untuk membatalkan pesanan.</li><br>
											<li>Lapangan berhasil pengguna pesan dan pengguna sudah dapat mentransfer uang dpnya ke no rekening tujuan yang pengguna pilih di halaman 
												"detail pesanan".</li><br>
										</ul></p>
				</div>
			</div>
		</div>
	</div>
	
	<footer class="container-fluid">
		<div id="pengguna">
		<h3>Pengguna</h3>
		<h4 class="active"><a href="cara-pesan.php">Cara Pesan</a></h4>
		<h4><a href="pembayaran.php">Pembayaran</a></h4>
		<h4><a href="validasi.php">Konfirmasi</a></h4>
		<h4><a href="cetak-struk.php">Cetak Struk</a></h4>
		<h4><a href="#">Tips Pesan</a></h4>
		</div>
		<div id="tentang">
		<h3>Tentang</h3>
		<h4><a href="/about-profil-pengguna/about/tentang-fudim.php">Tentang Fudim</a></h4>
		<h4><a href="/about-profil-pengguna/about/aturan-pengguna.php">Aturan Pengguna</a></h4>
		<h4><a href="/about-profil-pengguna/about/kebijakan-privasi.php">Kebijakan Privasi</a></h4>
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