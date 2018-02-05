<?php
	//buat koneksi mysql
	$con = mysqli_connect('mysql.idhostinger.com','u189022184_iim','QaUfbET3rd','u189022184_fudim');
	//jika koneksi gagal
	if(mysqli_connect_errno()){
		die("koneksi tidak terhubung");
		}
	//gunakan database fudim
	//$result = mysql_query('use fudim');
	//if(!$result){
		//die("database gagal diakses");
		//}
	//tambahkan query
	//$kodepengguna = "KP001";
	$namaLengkap = $_REQUEST['nama_lengkap'];
	$a2 = substr($namaLengkap,0,3);
	$tempatLahir = $_REQUEST['tempat_lahir'];
	$tanggalLahir = $_REQUEST['tanggal_lahir'];
	$jenisKelamin = $_REQUEST['jenis_kelamin'];
	$alamat = $_REQUEST['alamat'];
	$telpon = $_REQUEST['telpon'];
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];
	$hitung=mysqli_query($con,'select count(no)total from f_pengguna_user');
	$row = mysqli_fetch_array($hitung);
	$no = $row[0]+1;
	$a1 = $a2.$no;
	$kodepengguna = strtoupper($a1);
	if($namaLengkap==null){
			
	}else{
			$query = "insert into f_pengguna_user values
			('$no','$kodepengguna','$namaLengkap','$tempatLahir','$tanggalLahir','$jenisKelamin','$alamat','$telpon','$email','$password')";
			mysqli_query($con,$query);
			echo"<script>";
			echo"alert('Anda Berhasil Mendaftar')";
			echo"</script>";
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>maenfutsal - Situs Pesan Lapangan Futsal Online No.1 di Jakarta.</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="Stylesheet" href="/maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="Stylesheet" href="style-masuk-pengguna.css">
	<script src="/ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="/maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style>
		
	</style>
</head>	
<body>

	<!--<div class="jumbotronn">
		<img src="/MainFutsal/image/gambar-index.jpg" style="width:100%;height:400px;position:relative">
	</div>-->
	
	<nav id="header" class="navbar navbar-inverse" data-spy="affix" data-offset-top="0">
		<div class="container-fluid">
			<ul class="nav navbar-nav">
				<li><a href="/index.php" data-toggle="tooltip" data-placement="bottom" title="Cari Lapangan & Daftar Lapangan yang Tersedia" onmouseover="mDown(this)" onmouseout="mUp(this)"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
				<li><a href="/daftar/daftar.php" data-toggle="tooltip" data-placement="bottom" title="Daftar Sebagai Pengguna" onmouseover="mDown(this)" onmouseout="mUp(this)"><span class="glyphicon glyphicon-user"></span> Daftar</a></li>
				<li class="activee"><a href="masuk.php" data-toggle="tooltip" data-placement="bottom" title="Masuk Sebagai Pengguna" style="color:white"><span class="glyphicon glyphicon-log-in"></span> Masuk</a></li>
				<!--<li><a href="/MainFutsal/confirm-no-struk/ConfirmNoStruk.php" onmouseover="mDown(this)" onmouseout="mUp(this)">Validasi</a></li>-->	
			</ul>
		</div>
	</nav>
			
	<div class="container">
		<h3 class="text-center"><span class="label label-info"><u>MASUK</u></span></h2>
			<form id='form1' name='form1' action="aksi-login.php" class="form-horizontal" method="post" role="form"><br>
				<div class="form-group">
					<label class="control-label col-sm-4" for="email">
					<span class="label label-primary">Email :</span>
					</label>
					<div class="col-sm-5">
						<input type="text" id="email" name="email" required class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="password">
					<span class="label label-primary">Password :</span>
					</label>
					<div class="col-sm-5">
						<input type="password" id="password" name="password" required class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-6 col-sm-5">
						<input type="submit" name="masuk" class="btn btn-success btn-lg" value="Masuk">
					</div>
				</div>
				<div class="form-group">
						<a class="control-label col-sm-4" href="#" style="color:blue;font-size:14px;">Lupa Password</a>
				</div>
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
</script>

</body>
</html>