<?php
		session_start();
		if(empty($_SESSION['email'])){
		
		}else{
			$_SESSION['email'];
			$nama = $_SESSION['email'];
			}
?>
<?php
	//buat koneksi mysql
	$link=mysqli_connect('mysql.idhostinger.com','u189022184_iim','QaUfbET3rd','u189022184_fudim');
	//jika koneksi gagal
	if(mysqli_connect_errno()){
		die("koneksi gagal");
		}
	//gunakan database fudim
	//$result=mysql_query('use fudim');
	//jika database gagal digunakan
	//if(!$result){
		//die("database gagal digunakan");
		//}
	//jalankan query
	//$result1=mysql_query("select*from lapangan limit 2");
	//$result2=mysql_query("select*from lapangan limit 2 offset 2");
	//$result3=mysql_query("select*from lapangan limit 2 offset 4");
	//hasil query
	$hasil=mysqli_query($link,"select f_stok_lapangan.no,f_profil_lapangan.nama_lap,f_stok_lapangan.src_gambar,f_profil_lapangan.alamat_lap,f_harga_reguler.jam_pagi,f_harga_reguler.harga_pagi,f_harga_reguler.jam_malam,f_harga_reguler.harga_malam,f_harga_libur.jam_pagi,f_harga_libur.harga_pagi,f_harga_libur.jam_malam,f_harga_libur.harga_malam,f_stok_lapangan.kode_stok,f_stok_lapangan.kode_lap 
						from f_profil_lapangan,f_stok_lapangan,f_harga_reguler,f_harga_libur where f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_stok=f_harga_reguler.kode_stok and f_stok_lapangan.kode_stok=f_harga_libur.kode_stok limit 5");
	//$baris2=mysql_query("select stok_lapangan.no,lapangan.nama_lapangan,stok_lapangan.gambar,lapangan.alamat_lapangan,hari_biasa.jam_pagi,hari_biasa.harga_pagi,hari_biasa.jam_malam,hari_biasa.harga_malam,hari_weekend.jam_pagi,hari_weekend.harga_pagi,hari_weekend.jam_malam,hari_weekend.harga_malam,stok_lapangan.kode_stok_lapangan,stok_lapangan.kode_lapangan from lapangan,stok_lapangan,hari_biasa,hari_weekend where lapangan.kode_lapangan=stok_lapangan.kode_lapangan and stok_lapangan.kode_stok_lapangan=hari_biasa.kode_stok_lapangan and stok_lapangan.kode_stok_lapangan=hari_weekend.kode_stok_lapangan limit 3 offset 3");
	
	//$namalapangan=mysql_query("select nama_lapangan from lapangan");
?>
<!doctype html>
<html lang="en">
<head>
	<title>maenfutsal - Situs Pesan Lapangan Futsal Online No.1 di Jakarta.</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="Stylesheet" href="/maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="Stylesheet" href="style-pembayaran.css">
	<script src="/ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="/maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style>
		
	</style>
</head>
<body>
		<div></div>
		<!--<div class="jumbotronn">
			<img src="/MainFutsal/image/gambar-index.jpg" style="width:100%;height:400px;position:relative">
		</div>-->
		
		<nav id="header" class="navbar navbar-inverse" data-spy="affix" data-offset-top="0">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li><a href="/index.php" data-toggle="tooltip" data-placement="bottom" title="Cari Lapangan & Daftar Lapangan yang Tersedia" onmouseover="mDown(this)" onmouseout="mUp(this)"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
					<!--<li><a href="/MainFutsal/daftar/Daftar.php">Daftar</a></li>
					<li><a href="/MainFutsal/masuk/masuk.php">Masuk</a></li>-->
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><?php echo"Hallo ";echo $_SESSION['email'];?></a></li>
					<li><a href="/validasi/profil-daftar-pesanan.php" data-toggle="tooltip" data-placement="bottom" title="Lihat Status Pesanan Anda" onmouseover="mDown(this)" onmouseout="mUp(this)"><span class="glyphicon glyphicon-list-alt"></span> Cek Pesanan</a></li>
				</ul>
			</div>
		</nav>
		
		<div class="container" id="form-pemesan">
			<h3 class="text-center"><span class="label label-info"><u>Data Pemesan</u></span></h3>
				<form action="/pembayaran lanjutan/pembayaran-lanjutan.php" method="post" class="form-horizontal" role="form"><br/>
					<div class="form-group">
						<label class="control-label col-sm-4" for="nama_pemesan">
						<span class="label label-primary">Nama :</span>
						</label>
						<div class="col-sm-5">
							<input class="form-control" type="text" id="nama_pemesan" name="nama_pemesan">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="alamat_pemesan">
						<span class="label label-primary">Alamat :</span>
						</label>
						<div class="col-sm-5">
							<textarea class="form-control" name="alamat_pemesan" rows="5"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="telpon_pemesan">
						<span class="label label-primary">Telpon :</span>
						</label>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="telpon_pemesan">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="email_pemesan">
						<span class="label label-primary">Email :</span>
						</label>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="email_pemesan">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-5">
							<input type="submit" name="lanjut" value="Lanjut>>" class="btn btn-success btn-lg">
						</div>
					</div>
					<?php
					$nama=$_REQUEST['ngumpet_nama'];
					$alamat=$_REQUEST['ngumpet_alamat'];
					$tipe=$_REQUEST['ngumpet_tipe'];
					$jenis=$_REQUEST['ngumpet_jenis'];
					$kodestok=$_REQUEST['ngumpet_kode_stok'];
					$tanggal=$_REQUEST['ngumpet_tanggal'];
					$jam_main=$_REQUEST['ngumpet_jam_main'];
					$harga_perjam=$_REQUEST['ngumpet_harga_perjam'];
					$tanggal_terkini = $_REQUEST['ngumpet_tanggal_sekarang'];
					$jam_terkini = $_REQUEST['ngumpet_jam_sekarang'];
					echo"<input type='hidden' name='nama' value='$nama'>";
					echo"<input type='hidden' name='alamat' value='$alamat'>";
					echo"<input type='hidden' name='tipe' value='$tipe'>";
					echo"<input type='hidden' name='jenis' value='$jenis'>";
					echo"<input type='hidden' name='kode_stok' value='$kodestok'>";
					echo"<input type='hidden' name='tanggal_main' value='$tanggal'>";
					echo"<input type='hidden' name='jam_main' value='$jam_main'>";
					echo"<input type='hidden' name='hargaperjam' value='$harga_perjam'>";
					echo"<input type='text' name='tanggal_pesan' value='$tanggal_terkini'>";
					echo"<input type='text' name='jam_pesan' value='$jam_terkini'>";
					?>
				</form>
		</div>
<br/><br/>

<div class="container"><h3>Lapangan Lain</h3>
	<div class="row">
	<?php while($row=mysqli_fetch_array($hasil,MYSQL_NUM)){
    echo"<div class='col-sm-3'>";
      echo"<div class='panel panel-primary'>";
        echo"<div class='panel-heading text-center'><p id='nama$row[0]'>$row[1]</p></div>";
		echo"<input type='hidden' id='$row[12]' name='$row[12]' value='$row[13]'>";
        echo"<div class='panel-body text-center'>";
		echo"<div id='myCarousel$row[12]' class='carousel slide' data-ride='carousel'>";
			//<!-- Indicators -->
				echo"<ol class='carousel-indicators'>";
					echo"<li data-target='#myCarousel$row[12]' data-slide-to='0' class='active'></li>";
					echo"<li data-target='#myCarousel$row[12]' data-slide-to='1'></li>";
					echo"<li data-target='#myCarousel$row[12]' data-slide-to='2'></li>";
					echo"<li data-target='#myCarousel$row[12]' data-slide-to='3'></li>";
				echo"</ol>";
			
			//<!-- Wrapper for slides -->
			echo"<div class='carousel-inner' role='listbox'>";
				echo"<div class='item active'>";
					echo"<img src='/image/lap1.jpg' alt='gambar1' style='margin:0 auto;width:100%;height:100px'>";
				echo"</div>";
				echo"<div class='item'>";
					echo"<img src='/image/lap2.jpg' alt='gambar2' style='margin:0 auto;width:100%;height:100px'>";
				echo"</div>";
			echo"</div>";
			
			//<!-- Left and Right Controls -->
			echo"<a class='left carousel-control' href='#myCarousel$row[12]' role='button' data-slide='prev'>";
				echo"<span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>";
				echo"<span class='sr-only'>Previous</span>";
			echo"</a>";
			echo"<a class='right carousel-control' href='#myCarousel$row[12]' role='button' data-slide='next'>";
				echo"<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>";
				echo"<span class='sr-only'>Next</span>";
			echo"</a>";
			echo"</div>";
		echo"</div>";
		echo"<div class='panel-body text-center'><p id='alamat$row[0]'>$row[3]</p></div>";
		echo"<div class='panel-footer text-center'><input type='submit' class='btn btn-success' name='pesan' value='Pesan Sekarang' onclick='nama$row[0]()'></div>";
      echo"</div>";
    echo"</div>";
	}?>
	</div>
</div>
		
<footer class="container-fluid">
	<div id="pengguna">
		<h3>Pengguna</h3>
		<h4><a href="/about-profil-pengguna/pengguna/cara-pesan.php">Cara Pesan</a></h4>
		<h4><a href="/about-profil-pengguna/pengguna/pembayaran.php">Pembayaran</a></h4>
		<h4><a href="/about-profil-pengguna/pengguna/validasi.php">Validasi</a></h4>
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