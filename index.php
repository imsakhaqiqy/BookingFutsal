<?php
		session_start();
		if(empty($_SESSION['email'])){
		
		}else{
			$_SESSION['email'];
			$nama = $_SESSION['email'];
			echo"<script>";
			echo"alert('Selamat Datang $nama')";
			echo"</script>";
			}
?>

<?php
	//buat koneksi mysql
	$con=mysqli_connect('mysql.idhostinger.com','u189022184_iim','QaUfbET3rd','u189022184_fudim');
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
	//1 HALAMAN MAXIMAL TAMPIL LAPANGAN 12
	$hasil=mysqli_query($con,"select f_stok_lapangan.no,f_profil_lapangan.nama_lap,f_stok_lapangan.src_gambar,
						f_profil_lapangan.alamat_lap,f_harga_reguler.jam_pagi,f_harga_reguler.harga_pagi,
						f_harga_reguler.jam_malam,f_harga_reguler.harga_malam,f_harga_libur.jam_pagi,
						f_harga_libur.harga_pagi,f_harga_libur.jam_malam,f_harga_libur.harga_malam,
						f_stok_lapangan.kode_stok,f_stok_lapangan.kode_lap from f_profil_lapangan,
						f_stok_lapangan,f_harga_reguler,f_harga_libur where f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap 
						and f_stok_lapangan.kode_stok=f_harga_reguler.kode_stok and f_stok_lapangan.kode_stok=f_harga_libur.kode_stok");
	//$baris2=mysql_query("select stok_lapangan.no,lapangan.nama_lapangan,stok_lapangan.gambar,lapangan.alamat_lapangan,hari_biasa.jam_pagi,hari_biasa.harga_pagi,hari_biasa.jam_malam,hari_biasa.harga_malam,hari_weekend.jam_pagi,hari_weekend.harga_pagi,hari_weekend.jam_malam,hari_weekend.harga_malam,stok_lapangan.kode_stok_lapangan,stok_lapangan.kode_lapangan from lapangan,stok_lapangan,hari_biasa,hari_weekend where lapangan.kode_lapangan=stok_lapangan.kode_lapangan and stok_lapangan.kode_stok_lapangan=hari_biasa.kode_stok_lapangan and stok_lapangan.kode_stok_lapangan=hari_weekend.kode_stok_lapangan limit 3 offset 3");
	
	//$namalapangan=mysql_query("select nama_lapangan from lapangan");
?>

<?php
	//tambahkan query
	$hitung = mysqli_query($con,'select count(*)total from f_order_lapangan');
	$row = mysqli_fetch_array($hitung,MYSQLI_NUM);
	$no = $row[0]+1;
	$nostruk=$_REQUEST['ngumpet_no_struk'];
	$kodestok=$_REQUEST['ngumpet_kode_stok'];
	$jampesan=$_REQUEST['ngumpet_jam_pesan'];
	$tanggalpesan=$_REQUEST['ngumpet_tanggal_pesan'];
	$jammain=$_REQUEST['ngumpet_jam_main'];
	$tanggal=$_REQUEST['ngumpet_tanggal'];
	$uangdp=$_REQUEST['ngumpet_uang_dp'];
	$rekeningtujuan=$_REQUEST['ngumpet_rekening_tujuan'];
	$atasnama=$_REQUEST['ngumpet_atas_nama'];
	$sisapembayaran=$_REQUEST['ngumpet_sisa_pembayaran'];
	$bataspesan="01.00.00"; 
	$x = substr($jampesan,0,2)+substr($bataspesan,0,2);
	$y = substr($jampesan,3,3)+substr($bataspesan,3,3);
	$z = substr($jampesan,6,6)+substr($bataspesan,6,6);
	$zz = $x.":".$y.":".$z;
	$statuspesanan = "Menunggu";
	//$kodepengguna=$_REQUEST['ngumpet_id_pemesan'];
	//$kodelapangan=$_REQUEST['ngumpet_tempat'];
	//$kodejenis=$_REQUEST['ngumpet_jenis'];
	//$kodetipe=$_REQUEST['ngumpet_lokasi'];
	//$hargaperjam=$_REQUEST['ngumpet_harga_perjam'];
	//$durasimain=$_REQUEST['ngumpet_durasi'];
	$cocok = mysqli_query($con,'select no_struk from f_order_lapangan');
	$xxx = mysqli_num_rows($cocok);
	if($nostruk == null){
		}else{
				$query="insert into f_order_lapangan values
				('$no','$nostruk','$kodestok','$jampesan','$tanggal','$jammain','$tanggalpesan','$uangdp','$rekeningtujuan','$atasnama','$sisapembayaran')";
				mysqli_query($con,$query);
				$simpanstruk = "insert into f_status_order values('$no','$nostruk','diPesan','$zz','$statuspesanan','')";
				mysqli_query($con,$simpanstruk);
				echo"<script>";
				echo"alert('Lapangan Berhasil dipesan')";
				echo"</script>";
			}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>maenfutsal - Situs Pesan Lapangan Futsal Online No.1 di Jakarta.</title>
	<meta charset="utf-8">
	<meta name="keyword" content="Pesan Lapangan,Futsal,Olahraga,Booking Lapangan,Main Futsal">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="Stylesheet" href="/maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="Stylesheet" href="style-index.css">
	<script src="/ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="/maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="indexjs.js"></script>
	<style>
		
	</style>
</head>
<body>
	
	<div class="jumbotronn">
		<a href="index.php"><img src="/image/maenfutsal.com logo.png" id="logo" width="100" height="100" data-toggle="tooltip" data-replacement="right" title="Pesan Lapangan Futsal Online Pertama di Jakarta."></a>		
		<h4 id="slogan"><span style="color:black">Mudah</span> dan <span style="color:#006e51">Menyenangkan</span></h4>		
	</div>
	
	<nav id="header" class="navbar navbar-inverse" data-spy="affix" data-offset-top="77">
		<div class="container-fluid">
			<ul class="nav navbar-nav">
				<li class="activee"><a href="index.php" data-toggle="tooltip" data-placement="bottom" title="Cari Lapangan & Daftar Lapangan yang Tersedia" style="color:white"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
								
				<?php if(empty($_SESSION['email'])){
						echo"<li>";
						echo"<a href='/daftar/daftar.php' data-toggle='tooltip' data-placement='bottom' title='Daftar Sebagai Pengguna' onmouseover='mDown(this)' onmouseout='mUp(this)'><span class='glyphicon glyphicon-user'></span> Daftar</a>";
						echo"</li>";
						echo"<li>";
						echo"<a href='/masuk/masuk.php' data-toggle='tooltip' data-placement='bottom' title='Masuk Sebagai Pengguna' onmouseover='mDown(this)' onmouseout='mUp(this)'><span class='glyphicon glyphicon-log-in'></span> Masuk</a>";
						echo"</li>";
						}else{
						echo"<li>";
						echo"<a href='/masuk/keluar.php' data-toggle='tooltip' data-placement='bottom' title='Keluar dari Akun fudim Anda' onmouseover='mDown(this)' onmouseout='mUp(this)'><span class='glyphicon glyphicon-log-out'></span> Keluar</a>";
						echo"</li>";
						echo"<li>";
						echo"<a href='/confirm-no-struk/ConfirmNoStruk.php' data-toggle='tooltip' data-placement='tooltip' title='Konfirmasi Pesanan Anda' onmouseover='mDown(this)' onmouseout='mUp(this)'><span class='glyphicon glyphicon-edit'></span> Konfirmasi</a>";
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
	
	<div class="container text-center">
		<form action="/pencarian/index-cari.php" method="get" class="form-inline"><br/><br/>
				<center>
				<input type="text" name="cari" required placeholder="Ayo main futsal..." data-toggle="tooltip" data-placement="bottom" title="Masukkan Nama Lapangan atau Jenis Lapangan" class="form-control input-lg" style="width:50%;font-family:Consolas;border:3px solid #006e51"/>
				<button class="btn btn-success" id="cari"><span class="glyphicon glyphicon-search"></span></button>
				</center>
		</form>
	</div><br/><br/>
	
	<?php
		if(empty($_SESSION['email'])){
			echo"<form action='#' method='post' name='myForm' id='myForm'>";
			echo"<script>";
			echo"alert('Silahkan daftar terlebih dahaulu agar dapat memesan lapangan futsal kesukaan anda')";
			echo"</script>";
		}else{
			echo"<form action='/jadwal/jadwal5.php' method='GET' name='myForm' id='myForm'>";
		}
	?>
	<div class="container">    
	<div class="row">
	<?php while($row=mysqli_fetch_array($hasil,MYSQL_NUM)){
    echo"<div class='col-sm-4'>";
      echo"<div class='panel panel-default'>";
        echo"<div class='panel-heading text-center'><h4 id='nama$row[0]' style='font-size:12pt'><b>$row[1]</b></h4></div>";
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
					echo"<img src='/admin/ace-master/assets/uploads/stok_lapangan/".$row[2]."' alt='gambar1' style='margin:0 auto;width:100%;height:150px;'>";
				echo"</div>";
				echo"<div class='item'>";
					echo"<img src='/admin/ace-master/assets/uploads/stok_lapangan/".$row[2]."' alt='gambar2' style='margin:0 auto;width:100%;height:150px;'>";
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
        echo"<div class='panel-body'>";
		echo"<table border='1' style='width:100%'>";
		echo"<tr>";
		echo"<th colspan='2' class='th-hari'>Senin-Jum'at</th>";
		echo"</tr>";
		echo"<tr>";
		echo"<th class='th-jam'>Jam</th>";
		echo"<th class='th-harga'>Harga/jam</th>";
		echo"</tr>";
		echo"<tr>";
		echo"<td class='td-jam'>$row[4]</td>";
		echo"<td class='td-harga'>Rp "."$row[5]</td>";
		echo"</tr>";
		echo"<tr>";
		echo"<td class='td-jam'>$row[6]</td>";
		echo"<td class='td-harga'>Rp "."$row[7]</td>";
		echo"</tr>";
		echo"<tr>";
		echo"<th colspan='2' class='th-hari'>Sabtu-Minggu</th>";
		echo"</tr>";
		echo"<tr>";
		echo"<th class='th-jam'>Jam</th>";
		echo"<th class='th-harga'>Harga/jam</th>";
		echo"</tr>";
		echo"<tr>";
		echo"<td class='td-jam'>$row[8]</td>";
		echo"<td class='td-harga'>Rp "."$row[5]</td>";
		echo"</tr>";
		echo"<tr>";
		echo"<td class='td-jam'>$row[10]</td>";
		echo"<td class='td-harga'>Rp "."$row[11]</td>";
		echo"</tr>";
		echo"</table>";
		echo"</div>";
		echo"<div class='panel-body text-center' id='panel-alamat'><p id='alamat$row[0]' class='alamatnya'>$row[3]</p></div>";
		echo"<div class='panel-body text-center'>";
		if(empty($_SESSION['email'])){
			echo"<button class='btn btn-success disabled' name='pesan' onclick='nama$row[0]()'>Pesan Sekarang</button></div>";
		}else{
			echo"<button class='btn btn-success' name='pesan' onclick='nama$row[0]()'>Pesan Sekarang</button></div>";
		}
		echo"</div>";
    echo"</div>";
	}?>
	</div>
</div>

	<div class="container text-center">
		<!--<iframe src='https://www.sribulancer.com/id/widgets/profile?digest=e3214c17ea556744ec9b014c7d3f7f41&id=57865b8363727540ba000000' 
		frameborder='0' scrolling='no' width='290' height='350' style='overflow: hidden;'></iframe><br>-->
		<ul class="pagination text-center">
			<li class="active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
		</ul>
	</div>
		<input type='hidden' name='ngumpet' value=''>
		<input type='hidden' name='ngumpet2' value=''>
		<input type='hidden' name='ngumpet3' value=''>
		</form><br><br>
	
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
		<h4 class="text-center" style=""><a href="#">www.Fudim.com</a> @Copyright 2016</h4>
		</div>
	</footer>
	<script>
		
	</script>
</body>
</html>