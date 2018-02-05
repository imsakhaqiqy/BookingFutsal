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
	<link rel="Stylesheet" href="style-confirm-nostruk.css">
	<script src="/ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="/maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style>
		
	</style>
</head>
<body>
	
	<nav id="header" class="navbar navbar-inverse" data-spy="affix" data-offset-top="0">
		<div class="container-fluid">	
			<ul class="nav navbar-nav">
				<li><a href="/index.php" data-toggle="tooltip" data-placement="bottom" title="Cari Lapangan & Daftar Lapangan yang Tersedia" onmouseover="mDown(this)" onmouseout="mUp(this)"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
				<?php if(empty($_SESSION['email'])){ 
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
						}
						?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><?php echo"Hallo ";echo $_SESSION['email'];?></a></li>
				<li><a href="/validasi/profil-daftar-pesanan.php" onmouseover="mDown(this)" onmouseout="mUp(this)" data-toggle="tooltip" data-placement="bottom" title="Lihat Status Pesanan Anda"><span class="glyphicon glyphicon-list-alt"></span> Cek Pesanan</a></li>
			</ul>
		</div>
	</nav>				
	
	<div class="container">
		<h3 class="text-center"><span class="label label-info"><u>Masuk Konfirmasi</u></span></h3>
			<form id='form1' name='form1' method='Post' action='aksi-confirm-nostruk.php' class="form-horizontal" role="form"><br>
				<div class="form-group">
					<label class="control-label col-sm-4" for="nostruk">
					<span class="label label-primary">Nostruk :</span>
					</label>
					<div class="col-sm-5">	
						<input class="form-control" type='text' name='nostruk' id='nostruk' required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="email">
					<span class="label label-primary">Email :</span>
					</label>
					<div class="col-sm-5">	
						<input class="form-control" type='text' name='email' id='email' required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-6 col-sm-5">
						<input type='submit' class="btn btn-success btn-lg" id='proses' name='proses' value='Cek'>
					</div>
				</div>
				<input type='hidden' name='status_ngumpet' id='status'/>
			</form>
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
		<br><br>
			<h4 class="text-center" style="color:white;font-family:Consolas"><a href="#" style="color:#92B6D5;font-family:Consolas">www.Fudim.com</a> @Copyright 2016</h4>
	</footer>

<script>
	function mDown(obj){
		obj.style.backgroundColor = "#004d38";
		}
	function mUp(obj){
		obj.style.backgroundColor = "#006e51";	
		}
</script>
</body>
</html>