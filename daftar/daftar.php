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
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<link rel="Stylesheet" href="style-daftar-pengguna.css">
	<script src="/ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="/maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script type="text/javascript">
	$(function() {
     $( "#ftanggal" ).datepicker({
     changeMonth: true,
     changeYear: true
     });
   });
	</script>
	<style>
		
	</style>
</head>
<body>
	
	<!--<div class="jumbotron">
		<h3>www.fudim.com</h3>
	</div>-->
	
	<nav id="header" class="navbar navbar-inverse" data-spy="affix" data-offset-top="0">
		<div class="container-fluid">
			<ul class="nav navbar-nav">
				<li><a href="/index.php" data-toggle="tooltip" data-placement="bottom" title="Cari Lapangan & Daftar Lapangan yang Tersedia" onmouseover="mDown(this)" onmouseout="mUp(this)"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
				
				<?php if(empty($_SESSION['email'])){
						echo"<li class='activee'>";
						echo"<a href='daftar.php' data-toggle='tooltip' data-placement='bottom' title='Daftar Sebagai Pengguna' style='color:white'><span class='glyphicon glyphicon-user'></span> Daftar</a>";
						echo"</li>";
						echo"<li>";
						echo"<a href='/masuk/masuk.php' data-toggle='tooltip' data-placement='bottom' title='Masuk Sebagai Pengguna' onmouseover='mDown(this)' onmouseout='mUp(this)'><span class='glyphicon glyphicon-log-in'></span> Masuk</a>";
						echo"</li>";
						echo"</ul>";	
						}else{
						echo"<li>";
						echo"<a href='/MainFutsal/masuk/keluar.php' data-toggle='tooltip' data-placement='bottom' title='Keluar dari fudim' onmouseover='mDown(this)' onmouseout='mUp(this)'><span class='glyphicon glyphicon-log-out'></span> Keluar</a>";
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
			
	<div class="container">
		<h3 class="text-center"><span class="label label-info" ><u>DAFTAR PENGGUNA</u></span></h3>
			<form action="/masuk/masuk.php" method="POST" class="form-horizontal" role="form"><br/>
				<div class="form-group">
					<label class="control-label col-sm-4" for="nama_lengkap">
					<span class="label label-primary">Nama Lengkap :</span>
					</label>
					<div class="col-sm-5">
						<input class="form-control" type="text" name="nama_lengkap" required >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="tempat_lahir">
					<span class="label label-primary">Tempat Lahir :</span>
					</label>
					<div class="col-sm-5">
						<input class="form-control" type="text" name="tempat_lahir" required >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="tanggal_lahir">
					<span class="label label-primary">Tanggal Lahir :</span>
					</label>
					<div class="col-sm-5">
						<input class="form-control" id="ftanggal" type="text" name="tanggal_lahir" required >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="jenis_kelamin">
					<span class="label label-primary">Jenis Kelamin :</span>
					</label>
					<div class="col-sm-5">
							<label class="radio-inline">
								<input type="radio" name="jenis_kelamin" required value="laki_laki">Laki-Laki
							</label>
							<label class="radio-inline">
								<input type="radio" name="jenis_kelamin" required value="perempuan">Perempuan
							</label>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="alamat">
					<span class="label label-primary">Alamat :</span>
					</label>
					<div class="col-sm-5">
						<textarea class="form-control" name="alamat" required rows="3" ></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="telpon">
					<span class="label label-primary">Telpon :</span>
					</label>
					<div class="col-sm-5">
						<input class="form-control" type="text" name="telpon" required >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="email">
					<span class="label label-primary">Email :</span>
					</label>
					<div class="col-sm-5">
						<input class="form-control" type="text" name="email" required >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="password">
					<span class="label label-primary">Password :</span>
					</label>
					<div class="col-sm-5">
						<input class="form-control" type="password" id="password" name="password" required >
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="ulangi_password">
					<span class="label label-primary">Ulangi Password :</span>
					</label>
					<div class="col-sm-5">
						<input class="form-control" type="password" onclick="cekPassword()" id="ulangi_password" name="ulangi_password" required >
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-6 col-sm-5">
						<input type="submit" name="simpan_data" class="btn btn-success btn-lg" value="Simpan">
					</div>
				</div>
			</form>
	</div>
	<div id="demo"></div>		
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
			<h3 class="text-center">Temukan Kami di :</h3>
			<br>
			<center>
			<ul id="medsos">
				<li><a href="https://www.facebook.com/imsak.haqiqy?ref=bookmarks"><img src="/image/facebook1.png" alt="facebook icon" width="50" height="50"></a></li>
				<li><a href="#"><img src="/image/instagram.png" alt="instagram icon" width="50" height="50"></a></li>
				<li><a href="#"><img src="/image/twitter.png" alt="twitter icon" width="50" height="50"></a></li>
			</ul>
			</center>
		</div>
		<br/><br>
		<div id="license">
		<h4 class="text-center" style="color:white;font-family:Consolas"><a href="#" style="color:#92B6D5;font-family:Consolas">www.Fudim.com</a> @Copyright 2016</h4>
		</div>
	</footer>

<script>
		function mDown(obj){
			obj.style.backgroundColor = "#004d38";
		}
		function mUp(obj){
			obj.style.backgroundColor = "#006e51";	
		}
		function cekPassword(){
			var pass = document.getElementById("password").value;
			var upass = document.getElementById("ulangi_password").value;
			document.getElementById("demo").innerHTML = upass;
			}
		cekPassword();
</script>
</body>
</html>