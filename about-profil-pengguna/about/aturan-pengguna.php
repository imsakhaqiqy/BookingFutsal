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
	<link rel="Stylesheet" href="style-aturan-pengguna.css">
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
				<div class="panel-heading"><h3>Aturan Pengguna</h3></div>
				<div class="panel-body">
					<ul class="text-justify" style="font-family:Verdana,sans-serif">
						<li>Fudim sebagai sarana penunjang bisnis berusaha menyediakan 
							berbagai fitur dan layanan terbaik untuk menjamin keamanan dan kenyamanan para penggunanya.
						</li><br>
						<li>Fudim tidak berperan sebagai penyedia lapangan, melainkan 
							sebagai perantara antara Penyedia lapangan dan Pengguna, untuk mengamankan 
							setiap transaksi yang berlangsung di dalam platform fudim melalui 
							mekanisme Fudim Payment System. Adanya atas segala transaksi yang 
							terjadi di fudim berada di luar kewenangan fudim sebagai perantara, 
							dan akan diurus oleh pihak-pihak yang bersangkutan (baik Penyedia lapangan atau pun Pengguna).
							Sesuai ketentuan yang berlaku di Indonesia.
						</li><br>
						<li>Lapangan-lapangan yang dapat dipublikasikan di fudim merupakan 
							lapangan yang tidak tercantum di daftar "Lapangan Ilegal".
						</li><br>
						<li>Fudim tidak bertanggung jawab atas kualitas lapangan, proses pelunasan lapangan, 
							rusaknya reputasi pihak lain, dan segala bentuk perselisihan yang dapat terjadi antar Pengguna.
						</li><br>
						<li>Fudim memiliki kewenangan untuk mengambil tindakan yang dianggap perlu terhadap akun yang 
							diduga dan terindikasi melakukan penyalahgunaan, memanipulasi, dan melanggar Aturan 
							Penggunaan di fudim, mulai dari melakukan moderasi, menghentikan layanan "transaksi pemesanan", 
							membatasi jumlah pembuatan akun, membatasi atau mengakhiri hak setiap Pengguna untuk menggunakan 
							layanan, maupun menutup akun tersebut tanpa memberikan pemberitahuan atau informasi terlebih dahulu 
							kepada pemilik akun yang bersangkutan.
						</li><br>
						<li>Jika Pengguna gagal untuk mematuhi setiap ketentuan dalam Aturan Penggunaan di fudim ini, 
							maka fudim berhak untuk mengambil tindakan yang dianggap perlu termasuk namun tidak terbatas 
							pada melakukan moderasi, menghentikan layanan "transaksi pemesanan", menutup akun dan/atau 
							mengambil langkah hukum selanjutnya.
						</li><br>
						<li>Fudim Payment System bersifat mengikat Pengguna fudim dan hanya menjamin dana Pengguna tetap 
							aman jika proses transaksi dilakukan dengan Pihak lapangan yang terdaftar di dalam sistem fudim. 
							Kerugian yang diakibatkan keterlibatan pihak lain di luar Pengguna, Pihak lapangan, dan fudim 
							tidak menjadi tanggung jawab fudim.
						</li><br>
						<li>Aturan Penggunaan fudim dapat berubah sewaktu-waktu dan/atau diperbaharui dari waktu ke waktu 
							tanpa pemberitahuan terlebih dahulu. Dengan mengakses fudim, Pengguna dianggap menyetujui 
							perubahan-perubahan dalam Aturan Penggunaan fudim.
						</li><br>
						<li>Aturan Penggunaan fudim pada Situs fudim berlaku mutatis mutandis untuk penggunaan situs fudim.
						</li><br>
						<li>Hati-hati terhadap penipuan yang mengatasnamakan fudim. Untuk informasi dan pengaduan, 
							silakan hubungi cs@fudim.com atau Call Center 08997108767.
						</li><br>
					</ul>
				</div>
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
		<h4><a href="tentang-fudim.php">Tentang Fudim</a></h4>
		<h4 class="active"><a href="aturan-pengguna.php">Aturan Pengguna</a></h4>
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