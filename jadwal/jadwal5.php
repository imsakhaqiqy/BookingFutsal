<?php
		session_start();
		if(empty($_SESSION['email'])&&empty($_SESSION['ngumpet'])){
		
		}else{
			$_SESSION['email'];
			$nama = $_SESSION['email'];
			$nama_lap = $_REQUEST['ngumpet'];
			$kode_lap = $_REQUEST['ngumpet3'];
			//buat koneksi mysql
	$con=mysqli_connect('mysql.idhostinger.com','u189022184_iim','QaUfbET3rd','u189022184_fudim');
	//jika koneksi gagal
	if(mysqli_connect_errno()){
		die("koneksi langsung digagalkan");
		}
	//gunakan database fudim
	//$result=mysql_query('use fudim');
	//jika database tidak terhubung
	//if(!$result){
		//die("database gagal terhubung");
		//}
	//jalankan query
			$sql="select nama_lap,alamat_lap,kode_lap from f_profil_lapangan where kode_lap='$kode_lap'";
			$run1=mysqli_query($con,$sql);
			$xxx=mysqli_num_rows($run1);
			$Row=mysqli_fetch_array($run1,MYSQLI_NUM);
			if($xxx==TRUE){
			$_SESSION['ngumpet']=$Row[0];
			$_SESSION['ngumpet2']=$Row[1];
			$_SESSION['ngumpet3']=$Row[2];
			
			}
			$n=$_SESSION['ngumpet'];
			$k=$_SESSION['ngumpet3'];
		//echo $n;
		//echo $k;
		}
	
	$sql2="select f_tipe_lapangan.nomor,f_profil_lapangan.nama_lap,f_profil_lapangan.alamat_lap,f_profil_lapangan.telpon_lap,f_tipe_lapangan.tipe,f_stok_lapangan.kode_stok,
						f_jenis_lapangan.jenis,f_stok_lapangan.kode_stok
						from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
						f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
						f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and
						f_profil_lapangan.nama_lap='$n'";
	$run2=mysqli_query($con,$sql2);
	$query_desk="select f_deskripsi_lapangan.background_header,f_deskripsi_lapangan.judul_deskripsi
				,f_deskripsi_lapangan.artikel_deskripsi from f_deskripsi_lapangan
				where kode_lap='$k'";
	$run_query_desk=mysqli_query($con,$query_desk);
	$query_venue="select f_deskripsi_venue.background_venue,f_deskripsi_venue.artikel_venue,f_deskripsi_venue.map_venue,
				f_deskripsi_venue.icon_venue from f_deskripsi_venue
				where kode_lap='$k'";
	$run_query_venue=mysqli_query($con,$query_venue);
?>
<?php
	
	$jam1="select kode_jam,jam,no from jam_operasional";
	$run3=mysqli_query($con,$jam1);
	$tampiljam = "select curtime()jam_terkini";
	$run4=mysqli_query($con,$tampiljam);
	$tampiltanggal = "select date_format(curdate(),'%W, %M %D %Y')tanggal_terkini";
	$run5=mysqli_query($con,$tampiltanggal);
	$indextanggal = "select date_format(curdate(),'%m/%d/%Y')tanggal";
	$run6=mysqli_query($con,$indextanggal);
	$indexjam = "select curtime()jam_terkini";
	$run7=mysqli_query($con,$indexjam);
	
	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>maenfutsal - Situs Pesan Lapangan Futsal Online No.1 di Jakarta.</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="Stylesheet" href="/maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<link rel="Stylesheet" href="style-jadwal.css">
	<script src="/ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="/maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBuhPXRD7FmKHlKKhMIY7L-8q5A6NyNxTw&callback=initialize"></script>
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
	<body onload="setInterval('displayServerTime()',1000);">
	
	<!--<div class="jumbotronn">
		<img src="/MainFutsal/image/gambar-index.jpg" style="width:100%;height:400px;position:relative">
	</div>-->
		
		<nav id="header" class="navbar navbar-inverse" data-spy="affix" data-offset-top="0">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li><a href="/index.php" data-toggle="tooltip" data-replacement="tooltip" title="Cari Lapangan & Daftar Lapangan yang Tersedia" onmouseover="mEx(this)" onmouseout="mDown(this)"><span class='glyphicon glyphicon-home'></span> Beranda</a></li>
					<li><a><span id="tanggal_sekarang" style="color:red;font-family:Verdana"></span><span></span></a></li>
					<li><a><span id="jam_sekarang" style="color:red;font-family:Verdana"></span><span></span></a></li>
					<!--<li><a href="/MainFutsal/daftar/Daftar.php">Daftar</a></li>
					<li><a href="/MainFutsal/masuk/masuk.php">Masuk</a></li>-->
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="activee"><a href="#" style="color:white"><?php echo"Hallo ";echo $nama;?></a></li>
					<li><a href="/validasi/profil-daftar-pesanan.php" data-toggle="tooltip" data-placement="tooltip" title="Lihat Status Pesanan Anda" onmouseover="mEx(this)" onmouseout="mDown(this)"><span class="glyphicon glyphicon-list-alt"></span> Cek Pesanan</a></li>
				</ul>
			</div>
		</nav>
		
	
	
	<div class="container">
		<h2><?php echo $_SESSION['ngumpet'];?></h2>
		<ul class="nav nav-pills">
			<li class="active"><a data-toggle="pill" href="#jadwal">Jadwal</a></li>
			<li><a data-toggle="pill" href="#deskripsi" id="edit">Deskripsi</a></li>
			<li><a data-toggle="pill" href="#venue">Venue</a></li>
		</ul>
		
		<div class="tab-content">
			<div id="jadwal" class="tab-pane fade in active">
			<!--<h3>Jadwal</h3>-->
			<div class="container text-center">
				<form id="form1" method="get" name="form1" class="form-inline" role="form">
					<div class="form-group">
						<label for="lokasi_lapangan" style="font-size:20px">Lokasinya :</label>
						<select id="lokasi_lapangan" name="lokasi_lapangan" onclick="tampilkan()" class="form-control" style="width:200px;margin-left:10px;border:2px solid #006e51" required>
						<option>--Pilihan--</option>
						<?php
						while($row=mysqli_fetch_array($run2,MYSQLI_NUM)){
						echo"<option value='KT00$row[0]' style='font-family:Consolas;'>".$row[4]." (".$row[6].")"."</option>";}mysqli_free_result($run2);?>	
					</select>
					</div>
					<div class="form-group">
						<label for="ftanggal" style="font-size:20px">Tanggalnya :</label>
						<input type="text" id="ftanggal" name="ftanggal" class="form-control" value='<?php echo $_GET['ftanggal'];?>' style="border:2px solid #006e51" required>
					</div>
					<input type="submit" id="cari" name="cari" value="Cek" class="btn btn-success btn-lg" onclick="cekPilihan()">
					<input type="hidden" id="kode_stok_cari" name="ngumpet_kode_stok_cari" value='<?php echo $lokasii=$_GET['ngumpet_kode_stok_cari'];?>'>
					<input type="hidden" id="fnamaLap" name="fnamaLap" value='<?php echo $n;?>'>
					<input type="hidden" id="fjenisLap" name="fjenisLap" value='<?php echo $_GET['fjenisLap'];?>'>
					<input type="hidden" id="ftipenya" name="ftipenya" value='<?php echo $_GET['ftipenya'];?>'>
				
			</div><br/>
	
			<div class="container text-center">
				<h5>Nama Lapangan	: <span id="nama"><?php echo $_SESSION['ngumpet']."</span></h5>";?>
				<h5>Alamat	: <span id="alamat"><?php echo $_SESSION['ngumpet2']."</span><a href='map.php' target='_blank'><span class='glyphicon glyphicon-map-marker'></span></a></h5>";?>
				<h5>Jenis : <span id="hasil_jenis"></span></h5>
				</form>
			</div><hr>
	
			<div class="container-jadwal">
				<form action='/pembayaran/pembayaran.php' method='post' name='profillapangan' id='profillapangan'>
				<h4><span id="jlokasi">Lokasi/Tanggal : </span><span id="jlokasinya"><?php echo $_GET['ftipenya']."(".$_GET['fjenisLap'].")"."-".$_GET['ftanggal'];?></span></h4>
				<div class="panel panel-primary">
				<div class="panel panel-heading">Jadwal Lapangan</div>
				<div id="demo" class="panel panel-body" style="overflow-x:auto">
					<?php
						$jam_main="select f_jam_operasional.jam,f_order_lapangan.jam_main,f_order_lapangan.tanggal_main,f_status_order.status,f_profil_order.nama,f_jam_operasional.no
												from (((f_order_lapangan
												left join f_status_order
												on f_order_lapangan.no_struk=f_status_order.no_struk)left join f_profil_order
												on f_order_lapangan.no_struk=f_profil_order.no_struk)
												right join f_jam_operasional
												on f_order_lapangan.jam_main=f_jam_operasional.jam
												and f_order_lapangan.kode_stok='$_GET[ngumpet_kode_stok_cari]' and
												f_order_lapangan.tanggal_main='$_GET[ftanggal]')
												order by f_jam_operasional.jam";
						$tanggal=$_GET['ftanggal'];
						$bulannya = substr($tanggal,0,2);
						$tanggalnya = substr($tanggal,3,2);
						$tahunnya = substr($tanggal,6,4);
						$e = mktime(0,0,0,$bulannya,$tanggalnya,$tahunnya);
						$harinya = date('l',$e);
						$run8=mysqli_query($con,$jam_main);
						$T[]="";
						$x;
						$query;
						if($harinya=="Saturday" OR $harinya=="Sunday"){
							$query="select jam_pagi,harga_pagi,jam_malam,harga_malam from f_harga_libur where kode_stok='$_GET[ngumpet_kode_stok_cari]'";
						}else{
							$query="select jam_pagi,harga_pagi,jam_malam,harga_malam from f_harga_reguler where kode_stok='$_GET[ngumpet_kode_stok_cari]'";
						}
						$run9=mysqli_query($con,$query);
						$q=mysqli_fetch_array($run9,MYSQLI_NUM);
						$jm_sub=substr($q[2],0,2);
						echo"<table class='table' id='tabel-jadwal'>";
					echo"<tr>";
						echo"<h3><td class='td-judul'>Jam</td>";
						echo"<td class='td-judul'>Harga/jam</td>";
						echo"<td class='td-judul'>Jam Main</td>";
						echo"<td class='td-judul'>Tanggal Main</td>";
						echo"<td class='td-judul'>Status".$t.$b."</td>";
						echo"<td class='td-judul'>Pemesan</td>";
						echo"<td class='td-judul'></td></h3>";
					echo"</tr>";
						while($TT=mysqli_fetch_array($run8,MYSQLI_NUM)){
						echo"<tr>";
						echo"<td id='jadwal-jam' class='td-index'><span class='jam_tabel'>".$TT[0]."</span></td>";
						if($TT[0]>=$jm_sub){
							echo"<td id='jadwal-harga-malam' class='td-index'><span class='harga_tabel'>".$q[3]."</span></td>";
						}else{
							echo"<td id='jadwal-harga-pagi' class='td-index'><span class='harga_tabel'>".$q[1]."</span></td>";
						}
						echo"<td id='jadwal-pemesan' class='td-index'><span class='jam_main'></span>".$TT[1]."</td>";
						echo"<td id='jadwal-status' class='td-index'><span class='tanggal_main'></span>".$TT[2]."</td>";
						if($TT[4]==NULL){
							echo"<td id='jadwal-pemesan' class='td-index'><span class='status_pemesan'></span>KOSONG</td>";
						}else{	
							echo"<td id='jadwal-pemesan' class='td-index'><span class='status_pemesan'></span>".$TT[3]."</td>";
						}
						echo"<td id='jadwal-pemesan' class='td-index'><span class='nama_pemesan'></span>".$TT[4]."</td>";
						if($TT[4]==NULL){
							echo"<td class='td-index-pesan'><input class='td-index-pesan-tombol' type='submit' name='go' value='Pesan' onclick='ambilprofil$TT[5]()' onmouseover='mDown(this)' onmouseout='mUp(this)'></td>";
						}else{
						}
						echo"</tr>";}
					
				echo"</table>";
				?>
				</div>
				<div class="panel panel-footer" style="color:red">Keterangan : Harap Mengisi kolom Lokasinya dan Tanggalnya untuk menampilkan Jadwal Lapangan.</div>
				</div>
					<input type='hidden' name='ngumpet_nama' value=''>
					<input type='hidden' name='ngumpet_alamat' value=''>
					<input type='hidden' name='ngumpet_jenis' value=''>
					<input type='hidden' name='ngumpet_tipe' value=''>
					<input type="hidden" id="kode_stok" name="ngumpet_kode_stok" value=''>
					<input type='hidden' name='ngumpet_tanggal' value=''>
					<input type='hidden' name='ngumpet_jam_main' value=''>
					<input type='hidden' name='ngumpet_harga_perjam' value=''>
					<input type='hidden' name='ngumpet_tanggal_sekarang' value=''>
					<input type='hidden' name='ngumpet_jam_sekarang' value=''>
					<input type='hidden' name='ngumpet_hari' value='<?php echo $harinya;?>'>
					
			</form>
			</div>
			</div>
			
			<div id="deskripsi" class="tab-pane fade">
				<?php $index_desk= mysqli_fetch_array($run_query_desk,MYSQLI_NUM);
				//<!--<h3>Profil</h3><Span id="Tes"></span>
				//<br>-->
				//<!--<div id="googleMap" style="width:500px;height:380px;margin:0 auto;margin-bottom:20px"></div>-->
				echo"<br><br>";
				echo"<div id='header-des' style='width:100%;height:300px;border:1px solid black;margin-bottom:20px'>";
					echo"<img src='/admin/ace-master/assets/uploads/deskripsi_lapangan/$index_desk[0]' width='100%' height='300'>";
				echo"</div>";
				
				echo"<div id='content-des' style='width:100%;height:600px;border:1px solid black;margin-bottom:20px'>";
					echo"<div id='greeting-des' style='width:50%;height:100px;border:1px solid black;margin-bottom:20px'>";
						echo"<center><h2>$index_desk[1]</h2></center>";
					echo"</div>";
					echo"<div id='artikel-des' style='width:100%;height:450px;border:1px solid black;'>";
						echo"<p align='justify' style='padding:10px'>$index_desk[2]</p>";
					echo"</div>"?>
					<center><p><?php echo $_SESSION['ngumpet2'];?></p></center>
				</div>
				
			</div>
			
			<div id="venue" class="tab-pane fade">
				<?php $index_venue=mysqli_fetch_array($run_query_venue,MYSQLI_NUM);
				echo"<br><br>";
				echo"<div id='header-venue' style='width:100%;height:300px;border:1px solid black;margin-bottom:20px'>";
					echo"<img src='/admin/ace-master/assets/uploads/deskripsi_venue/$index_venue[0]' width='100%' height='300'>";
				echo"</div>";
				
				echo"<div id='content-venue' style='width:100%;height:850px;border:1px solid black;margin-bottom:20px'>";
					echo"<div id='deskripsi-venue' style='width:40%;height:500px;border:1px solid black;float:left;margin-bottom:20px'>";
						echo"<p align='justify' style='padding:10px'>$index_venue[1]</p>";
					echo"</div>";
					echo"<div id='map-venue' style='width:60%;height:500px;border:1px solid black;float:left;margin-bottom:20px'>";
						echo"<iframe style='width:100%;height:500px' src='$index_venue[2]' width='600' height='450' frameborder='0' style='border:0' allowfullscreen></iframe>";
					echo"</div>";
					echo"<div id='asset-venue' style='width:100%;height:200px;border:1px solid black;float:left;margin-bottom:20px'>";
						echo"<center><h1>$index_venue[3]</h1></center>";
					echo"</div>";?>
				</div>
			</div>
			
		</div>
	</div>
	



<span id="demO"></span><span id="demo_bln"></span><span id="demo_thn"></span>
			
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
		function tampilkan(){
			var jenis = document.getElementById("form1").lokasi_lapangan.value;
			var kontainer = document.getElementById("hasil_jenis");
			var kontainerstok = document.getElementById("kode_stok");
			var kontainerstokcari = document.getElementById("kode_stok_cari");
			var kontainer_jam_main = document.getElementsByClassName("jam_main");
			//var tipe = document.getElementById("lokasi_lapangan").value;
			var tipeakhir = document.getElementById("ftipenya");
			var x;
				switch(jenis){
					case "KT001":
						kontainer.innerHTML = "<?php
						$result3=mysqli_query($con,"select f_jenis_lapangan.jenis from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT001'");
						$tampil = mysqli_fetch_Array($result3,MYSQLI_NUM);
						echo"$tampil[0]";
						?>";
						kontainerstok.value = "<?php
						$kodestok1=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT001'");
						$cetak1 = mysqli_fetch_Array($kodestok1,MYSQLI_NUM);
						echo"$cetak1[0]";
						?>";
						kontainerstokcari.value = "<?php
						$kodestok1=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT001'");
						$cetak1 = mysqli_fetch_Array($kodestok1,MYSQLI_NUM);
						echo"$cetak1[0]";
						?>";
						document.form1.fjenisLap.value="<?php echo $tampil[0];?>";
						tipeakhir.value = "Lapangan 1";
					break;
					case "KT002":
						kontainer.innerHTML = "<?php
						$result4=mysqli_query($con,"select f_jenis_lapangan.jenis from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT002'");
						$tampil2 = mysqli_fetch_Array($result4,MYSQLI_NUM);
						echo"$tampil2[0]";
						?>";
						kontainerstok.value = "<?php
						$kodestok2=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT002'");
						$cetak2 = mysqli_fetch_Array($kodestok2,MYSQLI_NUM);
						echo"$cetak2[0]";
						?>";
						kontainerstokcari.value = "<?php
						$kodestok2=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT002'");
						$cetak2 = mysqli_fetch_Array($kodestok2,MYSQLI_NUM);
						echo"$cetak2[0]";
						?>";
						document.form1.fjenisLap.value="<?php echo $tampil2[0];?>";
						tipeakhir.value = "Lapangan 2";
					break;
					case "KT003":
						kontainer.innerHTML = "<?php
						$result5=mysqli_query($con,"select f_jenis_lapangan.jenis from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT003'");
						$tampil3 = mysqli_fetch_Array($result5,MYSQLI_NUM);
						echo"$tampil3[0]";
						?>";
						kontainerstok.value = "<?php
						$kodestok3=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT003'");
						$cetak3 = mysqli_fetch_Array($kodestok3,MYSQLI_NUM);
						echo"$cetak3[0]";
						?>";
						kontainerstokcari.value = "<?php
						$kodestok3=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT003'");
						$cetak3 = mysqli_fetch_Array($kodestok3,MYSQLI_NUM);
						echo"$cetak3[0]";
						?>";
						document.form1.fjenisLap.value="<?php echo $tampil3[0];?>";
						tipeakhir.value = "Lapangan 3";
					break;
					case "KT004":
						kontainer.innerHTML = "<?php
						$result6=mysqli_query($con,"select f_jenis_lapangan.jenis from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT004'");
						$tampil4 = mysqli_fetch_Array($result6,MYSQLI_NUM);
						echo"$tampil4[0]";
						?>";
						kontainerstok.value = "<?php
						$kodestok4=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT004'");
						$cetak4 = mysqli_fetch_Array($kodestok4,MYSQLI_NUM);
						echo"$cetak4[0]";
						?>";
						kontainerstokcari.value = "<?php
						$kodestok4=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT004'");
						$cetak4 = mysqli_fetch_Array($kodestok4,MYSQLI_NUM);
						echo"$cetak4[0]";
						?>";
						document.form1.fjenisLap.value="<?php echo $tampil4[0];?>";
						tipeakhir.value = "Lapangan 4";
					break;
					case "KT005":
						kontainer.innerHTML = "<?php
						$result7=mysqli_query($con,"select f_jenis_lapangan.jenis from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT005'");
						$tampil5 = mysqli_fetch_Array($result7,MYSQLI_NUM);
						echo"$tampil5[0]";
						?>";
						kontainerstok.value = "<?php
						$kodestok5=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT005'");
						$cetak5 = mysqli_fetch_Array($kodestok5,MYSQLI_NUM);
						echo"$cetak5[0]";
						?>";
						kontainerstokcari.value = "<?php
						$kodestok5=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT005'");
						$cetak5 = mysqli_fetch_Array($kodestok5,MYSQLI_NUM);
						echo"$cetak5[0]";
						?>";
						document.form1.fjenisLap.value="<?php echo $tampil5[0];?>";
						tipeakhir.value = "Lapangan 5";
					break;
					case "KT006":
						kontainer.innerHTML = "<?php
						$result8=mysqli_query($con,"select f_jenis_lapangan.jenis from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT006'");
						$tampil6 = mysqli_fetch_Array($result8,MYSQLI_NUM);
						echo"$tampil6[0]";
						?>";
						kontainerstok.value = "<?php
						$kodestok6=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT006'");
						$cetak6 = mysqli_fetch_Array($kodestok6,MYSQLI_NUM);
						echo"$cetak6[0]";
						?>";
						kontainerstokcari.value = "<?php
						$kodestok6=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT006'");
						$cetak6 = mysqli_fetch_Array($kodestok6,MYSQLI_NUM);
						echo"$cetak6[0]";
						?>";
						document.form1.fjenisLap.value="<?php echo $tampil6[0];?>";
						tipeakhir.value = "Lapangan 6";
					break;
					case "KT007":
						kontainer.innerHTML = "<?php
						$result9=mysqli_query($con,"select f_jenis_lapangan.jenis from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT007'");
						$tampil7 = mysqli_fetch_Array($result9,MYSQLI_NUM);
						echo"$tampil7[0]";
						?>";
						kontainerstok.value = "<?php
						$kodestok7=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT007'");
						$cetak7 = mysqli_fetch_Array($kodestok7,MYSQLI_NUM);
						echo"$cetak7[0]";
						?>";
						kontainerstokcari.value = "<?php
						$kodestok7=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT007'");
						$cetak7 = mysqli_fetch_Array($kodestok7,MYSQLI_NUM);
						echo"$cetak7[0]";
						?>";
						document.form1.fjenisLap.value="<?php echo $tampil7[0];?>";
						tipeakhir.value = "Lapangan 7";
					break;
					case "KT008":
						kontainer.innerHTML = "<?php
						$result10=mysqli_query($con,"select f_jenis_lapangan.jenis from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT008'");
						$tampil8 = mysqli_fetch_Array($result10,MYSQLI_NUM);
						echo"$tampil8[0]";
						?>";
						kontainerstok.value = "<?php
						$kodestok8=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT008'");
						$cetak8 = mysqli_fetch_Array($kodestok8,MYSQLI_NUM);
						echo"$cetak8[0]";
						?>";
						kontainerstokcari.value = "<?php
						$kodestok8=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT008'");
						$cetak8 = mysqli_fetch_Array($kodestok8,MYSQLI_NUM);
						echo"$cetak8[0]";
						?>";
						document.form1.fjenisLap.value="<?php echo $tampil8[0];?>";
						tipeakhir.value = "Lapangan 8";
					break;
					case "KT009":
						kontainer.innerHTML = "<?php
						$result11=mysqli_query($con,"select f_jenis_lapangan.jenis from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT009'");
						$tampil9 = mysqli_fetch_Array($result11,MYSQLI_NUM);
						echo"$tampil9[0]";
						?>";
						kontainerstok.value = "<?php
						$kodestok9=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT009'");
						$cetak9 = mysqli_fetch_Array($kodestok9,MYSQLI_NUM);
						echo"$cetak9[0]";
						?>";
						kontainerstokcari.value = "<?php
						$kodestok9=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT009'");
						$cetak9 = mysqli_fetch_Array($kodestok9,MYSQLI_NUM);
						echo"$cetak9[0]";
						?>";
						document.form1.fjenisLap.value="<?php echo $tampil9[0];?>";
						tipeakhir.value = "Lapangan 9";
					break;
					case "KT0010":
						kontainer.innerHTML = "<?php
						$result12=mysqli_query($con,"select f_jenis_lapangan.jenis from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT010'");
						$tampil10 = mysqli_fetch_Array($result12,MYSQLI_NUM);
						echo"$tampil10[0]";
						?>";
						kontainerstok.value = "<?php
						$kodestok10=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT010'");
						$cetak10 = mysqli_fetch_Array($kodestok10,MYSQLI_NUM);
						echo"$cetak10[0]";
						?>";
						kontainerstokcari.value = "<?php
						$kodestok10=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$_SESSION[ngumpet]' and f_tipe_lapangan.kode_tipe='KT010'");
						$cetak10 = mysqli_fetch_Array($kodestok10,MYSQLI_NUM);
						echo"$cetak10[0]";
						?>";
						document.form1.fjenisLap.value="<?php echo $tampil10[0];?>";
						tipeakhir.value = "Lapangan 10";
					break;
					}
		}
		
		function ambilprofil1(){
			var nama = document.getElementById("nama");
			document.profillapangan.ngumpet_nama.value=nama.innerHTML;
			var alamat = document.getElementById("alamat");
			document.profillapangan.ngumpet_alamat.value=alamat.innerHTML;
			var jenis = document.getElementById("fjenisLap").value;
			document.profillapangan.ngumpet_jenis.value=jenis;
			var tipe = document.getElementById("ftipenya").value;
			document.profillapangan.ngumpet_tipe.value=tipe;
			var kstok = document.getElementById("kode_stok_cari").value;
			document.profillapangan.ngumpet_kode_stok.value=kstok;
			var tanggal = document.getElementById("ftanggal").value;
			document.profillapangan.ngumpet_tanggal.value=tanggal;
			var jam = document.getElementById("jam_sekarang");
			document.profillapangan.ngumpet_jam_sekarang.value=jam.innerHTML;
			var kode1 = document.getElementsByClassName("jam_tabel")[0];
			document.profillapangan.ngumpet_jam_main.value=kode1.innerHTML;
			var harga = document.getElementsByClassName("harga_tabel")[0];
			document.profillapangan.ngumpet_harga_perjam.value=harga.innerHTML;
			}
		function ambilprofil2(){
			var nama = document.getElementById("nama");
			document.profillapangan.ngumpet_nama.value=nama.innerHTML;
			var alamat = document.getElementById("alamat");
			document.profillapangan.ngumpet_alamat.value=alamat.innerHTML;
			var jenis = document.getElementById("fjenisLap").value;
			document.profillapangan.ngumpet_jenis.value=jenis;
			var tipe = document.getElementById("ftipenya").value;
			document.profillapangan.ngumpet_tipe.value=tipe;
			var kstok = document.getElementById("kode_stok_cari").value;
			document.profillapangan.ngumpet_kode_stok.value=kstok;
			var tanggal = document.getElementById("ftanggal").value;
			document.profillapangan.ngumpet_tanggal.value=tanggal;
			var jam = document.getElementById("jam_sekarang");
			document.profillapangan.ngumpet_jam_sekarang.value=jam.innerHTML;
			var kode1 = document.getElementsByClassName("jam_tabel")[1];
			document.profillapangan.ngumpet_jam_main.value=kode1.innerHTML;
			var harga = document.getElementsByClassName("harga_tabel")[1];
			document.profillapangan.ngumpet_harga_perjam.value=harga.innerHTML;
		}
		function ambilprofil3(){
			var nama = document.getElementById("nama");
			document.profillapangan.ngumpet_nama.value=nama.innerHTML;
			var alamat = document.getElementById("alamat");
			document.profillapangan.ngumpet_alamat.value=alamat.innerHTML;
			var jenis = document.getElementById("fjenisLap").value;
			document.profillapangan.ngumpet_jenis.value=jenis;
			var tipe = document.getElementById("ftipenya").value;
			document.profillapangan.ngumpet_tipe.value=tipe;
			var kstok = document.getElementById("kode_stok_cari").value;
			document.profillapangan.ngumpet_kode_stok.value=kstok;
			var tanggal = document.getElementById("ftanggal").value;
			document.profillapangan.ngumpet_tanggal.value=tanggal;
			var jam = document.getElementById("jam_sekarang");
			document.profillapangan.ngumpet_jam_sekarang.value=jam.innerHTML;
			var kode1 = document.getElementsByClassName("jam_tabel")[2];
			document.profillapangan.ngumpet_jam_main.value=kode1.innerHTML;
			var harga = document.getElementsByClassName("harga_tabel")[2];
			document.profillapangan.ngumpet_harga_perjam.value=harga.innerHTML;
			}
		function ambilprofil4(){
			var nama = document.getElementById("nama");
			document.profillapangan.ngumpet_nama.value=nama.innerHTML;
			var alamat = document.getElementById("alamat");
			document.profillapangan.ngumpet_alamat.value=alamat.innerHTML;
			var jenis = document.getElementById("fjenisLap").value;
			document.profillapangan.ngumpet_jenis.value=jenis;
			var tipe = document.getElementById("ftipenya").value;
			document.profillapangan.ngumpet_tipe.value=tipe;
			var kstok = document.getElementById("kode_stok_cari").value;
			document.profillapangan.ngumpet_kode_stok.value=kstok;
			var tanggal = document.getElementById("ftanggal").value;
			document.profillapangan.ngumpet_tanggal.value=tanggal;
			var jam = document.getElementById("jam_sekarang");
			document.profillapangan.ngumpet_jam_sekarang.value=jam.innerHTML;
			var kode1 = document.getElementsByClassName("jam_tabel")[3];
			document.profillapangan.ngumpet_jam_main.value=kode1.innerHTML;
			var harga = document.getElementsByClassName("harga_tabel")[3];
			document.profillapangan.ngumpet_harga_perjam.value=harga.innerHTML;
			}
		function ambilprofil5(){
			var nama = document.getElementById("nama");
			document.profillapangan.ngumpet_nama.value=nama.innerHTML;
			var alamat = document.getElementById("alamat");
			document.profillapangan.ngumpet_alamat.value=alamat.innerHTML;
			var jenis = document.getElementById("fjenisLap").value;
			document.profillapangan.ngumpet_jenis.value=jenis;
			var tipe = document.getElementById("ftipenya").value;
			document.profillapangan.ngumpet_tipe.value=tipe;
			var kstok = document.getElementById("kode_stok_cari").value;
			document.profillapangan.ngumpet_kode_stok.value=kstok;
			var tanggal = document.getElementById("ftanggal").value;
			document.profillapangan.ngumpet_tanggal.value=tanggal;
			var jam = document.getElementById("jam_sekarang");
			document.profillapangan.ngumpet_jam_sekarang.value=jam.innerHTML;
			var kode1 = document.getElementsByClassName("jam_tabel")[4];
			document.profillapangan.ngumpet_jam_main.value=kode1.innerHTML;
			var harga = document.getElementsByClassName("harga_tabel")[4];
			document.profillapangan.ngumpet_harga_perjam.value=harga.innerHTML;
			}
		function ambilprofil6(){
			var nama = document.getElementById("nama");
			document.profillapangan.ngumpet_nama.value=nama.innerHTML;
			var alamat = document.getElementById("alamat");
			document.profillapangan.ngumpet_alamat.value=alamat.innerHTML;
			var jenis = document.getElementById("fjenisLap").value;
			document.profillapangan.ngumpet_jenis.value=jenis;
			var tipe = document.getElementById("ftipenya").value;
			document.profillapangan.ngumpet_tipe.value=tipe;
			var kstok = document.getElementById("kode_stok_cari").value;
			document.profillapangan.ngumpet_kode_stok.value=kstok;
			var tanggal = document.getElementById("ftanggal").value;
			document.profillapangan.ngumpet_tanggal.value=tanggal;
			var jam = document.getElementById("jam_sekarang");
			document.profillapangan.ngumpet_jam_sekarang.value=jam.innerHTML;
			var kode1 = document.getElementsByClassName("jam_tabel")[5];
			document.profillapangan.ngumpet_jam_main.value=kode1.innerHTML;
			var harga = document.getElementsByClassName("harga_tabel")[5];
			document.profillapangan.ngumpet_harga_perjam.value=harga.innerHTML;
			}
		function ambilprofil7(){
			var nama = document.getElementById("nama");
			document.profillapangan.ngumpet_nama.value=nama.innerHTML;
			var alamat = document.getElementById("alamat");
			document.profillapangan.ngumpet_alamat.value=alamat.innerHTML;
			var jenis = document.getElementById("fjenisLap").value;
			document.profillapangan.ngumpet_jenis.value=jenis;
			var tipe = document.getElementById("ftipenya").value;
			document.profillapangan.ngumpet_tipe.value=tipe;
			var kstok = document.getElementById("kode_stok_cari").value;
			document.profillapangan.ngumpet_kode_stok.value=kstok;
			var tanggal = document.getElementById("ftanggal").value;
			document.profillapangan.ngumpet_tanggal.value=tanggal;
			var jam = document.getElementById("jam_sekarang");
			document.profillapangan.ngumpet_jam_sekarang.value=jam.innerHTML;
			var kode1 = document.getElementsByClassName("jam_tabel")[6];
			document.profillapangan.ngumpet_jam_main.value=kode1.innerHTML;
			var harga = document.getElementsByClassName("harga_tabel")[6];
			document.profillapangan.ngumpet_harga_perjam.value=harga.innerHTML;
			}
		function ambilprofil8(){
			var nama = document.getElementById("nama");
			document.profillapangan.ngumpet_nama.value=nama.innerHTML;
			var alamat = document.getElementById("alamat");
			document.profillapangan.ngumpet_alamat.value=alamat.innerHTML;
			var jenis = document.getElementById("fjenisLap").value;
			document.profillapangan.ngumpet_jenis.value=jenis;
			var tipe = document.getElementById("ftipenya").value;
			document.profillapangan.ngumpet_tipe.value=tipe;
			var kstok = document.getElementById("kode_stok_cari").value;
			document.profillapangan.ngumpet_kode_stok.value=kstok;
			var tanggal = document.getElementById("ftanggal").value;
			document.profillapangan.ngumpet_tanggal.value=tanggal;
			var jam = document.getElementById("jam_sekarang");
			document.profillapangan.ngumpet_jam_sekarang.value=jam.innerHTML;
			var kode1 = document.getElementsByClassName("jam_tabel")[7];
			document.profillapangan.ngumpet_jam_main.value=kode1.innerHTML;
			var harga = document.getElementsByClassName("harga_tabel")[7];
			document.profillapangan.ngumpet_harga_perjam.value=harga.innerHTML;
			}
		function ambilprofil9(){
			var nama = document.getElementById("nama");
			document.profillapangan.ngumpet_nama.value=nama.innerHTML;
			var alamat = document.getElementById("alamat");
			document.profillapangan.ngumpet_alamat.value=alamat.innerHTML;
			var jenis = document.getElementById("fjenisLap").value;
			document.profillapangan.ngumpet_jenis.value=jenis;
			var tipe = document.getElementById("ftipenya").value;
			document.profillapangan.ngumpet_tipe.value=tipe;
			var kstok = document.getElementById("kode_stok_cari").value;
			document.profillapangan.ngumpet_kode_stok.value=kstok;
			var tanggal = document.getElementById("ftanggal").value;
			document.profillapangan.ngumpet_tanggal.value=tanggal;
			var jam = document.getElementById("jam_sekarang");
			document.profillapangan.ngumpet_jam_sekarang.value=jam.innerHTML;
			var kode1 = document.getElementsByClassName("jam_tabel")[8];
			document.profillapangan.ngumpet_jam_main.value=kode1.innerHTML;
			var harga = document.getElementsByClassName("harga_tabel")[8];
			document.profillapangan.ngumpet_harga_perjam.value=harga.innerHTML;
			}
		function ambilprofil10(){
			var nama = document.getElementById("nama");
			document.profillapangan.ngumpet_nama.value=nama.innerHTML;
			var alamat = document.getElementById("alamat");
			document.profillapangan.ngumpet_alamat.value=alamat.innerHTML;
			var jenis = document.getElementById("fjenisLap").value;
			document.profillapangan.ngumpet_jenis.value=jenis;
			var tipe = document.getElementById("ftipenya").value;
			document.profillapangan.ngumpet_tipe.value=tipe;
			var kstok = document.getElementById("kode_stok_cari").value;
			document.profillapangan.ngumpet_kode_stok.value=kstok;
			var tanggal = document.getElementById("ftanggal").value;
			document.profillapangan.ngumpet_tanggal.value=tanggal;
			var jam = document.getElementById("jam_sekarang");
			document.profillapangan.ngumpet_jam_sekarang.value=jam.innerHTML;
			var kode1 = document.getElementsByClassName("jam_tabel")[9];
			document.profillapangan.ngumpet_jam_main.value=kode1.innerHTML;
			var harga = document.getElementsByClassName("harga_tabel")[9];
			document.profillapangan.ngumpet_harga_perjam.value=harga.innerHTML;
			}
		function ambilprofil11(){
			var nama = document.getElementById("nama");
			document.profillapangan.ngumpet_nama.value=nama.innerHTML;
			var alamat = document.getElementById("alamat");
			document.profillapangan.ngumpet_alamat.value=alamat.innerHTML;
			var jenis = document.getElementById("fjenisLap").value;
			document.profillapangan.ngumpet_jenis.value=jenis;
			var tipe = document.getElementById("ftipenya").value;
			document.profillapangan.ngumpet_tipe.value=tipe;
			var kstok = document.getElementById("kode_stok_cari").value;
			document.profillapangan.ngumpet_kode_stok.value=kstok;
			var tanggal = document.getElementById("ftanggal").value;
			document.profillapangan.ngumpet_tanggal.value=tanggal;
			var jam = document.getElementById("jam_sekarang");
			document.profillapangan.ngumpet_jam_sekarang.value=jam.innerHTML;
			var kode1 = document.getElementsByClassName("jam_tabel")[10];
			document.profillapangan.ngumpet_jam_main.value=kode1.innerHTML;
			var harga = document.getElementsByClassName("harga_tabel")[10];
			document.profillapangan.ngumpet_harga_perjam.value=harga.innerHTML;
			}
		function ambilprofil12(){
			var nama = document.getElementById("nama");
			document.profillapangan.ngumpet_nama.value=nama.innerHTML;
			var alamat = document.getElementById("alamat");
			document.profillapangan.ngumpet_alamat.value=alamat.innerHTML;
			var jenis = document.getElementById("fjenisLap").value;
			document.profillapangan.ngumpet_jenis.value=jenis;
			var tipe = document.getElementById("ftipenya").value;
			document.profillapangan.ngumpet_tipe.value=tipe;
			var kstok = document.getElementById("kode_stok_cari").value;
			document.profillapangan.ngumpet_kode_stok.value=kstok;
			var tanggal = document.getElementById("ftanggal").value;
			document.profillapangan.ngumpet_tanggal.value=tanggal;
			var jam = document.getElementById("jam_sekarang");
			document.profillapangan.ngumpet_jam_sekarang.value=jam.innerHTML;
			var kode1 = document.getElementsByClassName("jam_tabel")[11];
			document.profillapangan.ngumpet_jam_main.value=kode1.innerHTML;
			var harga = document.getElementsByClassName("harga_tabel")[11];
			document.profillapangan.ngumpet_harga_perjam.value=harga.innerHTML;
			}
		function ambilprofil13(){
			var nama = document.getElementById("nama");
			document.profillapangan.ngumpet_nama.value=nama.innerHTML;
			var alamat = document.getElementById("alamat");
			document.profillapangan.ngumpet_alamat.value=alamat.innerHTML;
			var jenis = document.getElementById("fjenisLap").value;
			document.profillapangan.ngumpet_jenis.value=jenis;
			var tipe = document.getElementById("ftipenya").value;
			document.profillapangan.ngumpet_tipe.value=tipe;
			var kstok = document.getElementById("kode_stok_cari").value;
			document.profillapangan.ngumpet_kode_stok.value=kstok;
			var tanggal = document.getElementById("ftanggal").value;
			document.profillapangan.ngumpet_tanggal.value=tanggal;
			var jam = document.getElementById("jam_sekarang");
			document.profillapangan.ngumpet_jam_sekarang.value=jam.innerHTML;
			var kode1 = document.getElementsByClassName("jam_tabel")[12];
			document.profillapangan.ngumpet_jam_main.value=kode1.innerHTML;
			var harga = document.getElementsByClassName("harga_tabel")[12];
			document.profillapangan.ngumpet_harga_perjam.value=harga.innerHTML;
			}
		function ambilprofil14(){
			var nama = document.getElementById("nama");
			document.profillapangan.ngumpet_nama.value=nama.innerHTML;
			var alamat = document.getElementById("alamat");
			document.profillapangan.ngumpet_alamat.value=alamat.innerHTML;
			var jenis = document.getElementById("fjenisLap").value;
			document.profillapangan.ngumpet_jenis.value=jenis;
			var tipe = document.getElementById("ftipenya").value;
			document.profillapangan.ngumpet_tipe.value=tipe;
			var kstok = document.getElementById("kode_stok_cari").value;
			document.profillapangan.ngumpet_kode_stok.value=kstok;
			var tanggal = document.getElementById("ftanggal").value;
			document.profillapangan.ngumpet_tanggal.value=tanggal;
			var jam = document.getElementById("jam_sekarang");
			document.profillapangan.ngumpet_jam_sekarang.value=jam.innerHTML;
			var kode1 = document.getElementsByClassName("jam_tabel")[13];
			document.profillapangan.ngumpet_jam_main.value=kode1.innerHTML;
			var harga = document.getElementsByClassName("harga_tabel")[13];
			document.profillapangan.ngumpet_harga_perjam.value=harga.innerHTML;
			}
		function ambilCari(){
			var tipe = document.getElementById("lokasi_lapangan").value;
			var tipeakhir;
			switch(tipe){
				case "KT001":
					tipeakhir = "Lapangan 1";
				break;
				case "KT002":
					tipeakhir = "Lapangan 2";
				break;
				case "KT003":
					tipeakhir = "Lapangan 3";
				break;
				case "KT004":
					tipeakhir = "Lapangan 4";
				break;
				case "KT005":
					tipeakhir = "Lapangan 5";
				break;
				case "KT006":
					tipeakhir = "Lapangan 6";
				break;
				case "KT007":
					tipeakhir = "Lapangan 7";
				break;
				case "KT008":
					tipeakhir = "Lapangan 8";
				break;
				case "KT009":
					tipeakhir = "Lapangan 9";
				break;
				case "KT010":
					tipeakhir = "Lapangan 10";
				break;
				default:
					tipeakhir = "Lapangan Tidak diTemukan!!!";
				}
			document.form1.ngumpet_kode_stok_cari.value=tipeakhir;
			}
		function mDown(obj){
			obj.style.backgroundColor = "#006E51"
			}
		function mUp(obj){
			obj.style.backgroundColor = "grey";
			obj.style.color = "white";
			}
		function mEx(obj){
			obj.style.backgroundColor = "#004d38";
			}
		//<?php date_default_timezone_set('Asia/Jakarta');?>
		//var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0');?>);
		//var clientTime = new Date();
		//var Diff = serverTime.getTime() - clientTime.getTime();
		//function displayServerTime(){
			//var serverTime = new Date();
			//var time = new Date(serverTime.getTime()+Diff);
			//var sh = serverTime.getHours().toString();
			//var sm = serverTime.getMinutes().toString();
			//var ss = serverTime.getSeconds().toString();
			//document.getElementById("jam_sekarang").innerHTML = (sh.length==1?"0"+sh:sh)+ ":" +(sm.length==1?"0"+sm:sm)+ ":" +(ss.length==1?"0"+ss:ss);
			//}
			
		 <?php date_default_timezone_set('Asia/Jakarta');?>
		var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0');?>);
		var clientTime = new Date();
		var Diff = clientTime.getTime() - serverTime.getTime();
		function displayServerTime(){
			var clientTime = new Date();
			var time = new Date(clientTime.getTime()-Diff);
			var sh = time.getHours().toString();
			var sm = time.getMinutes().toString();
			var ss = time.getSeconds().toString();
			document.getElementById("jam_sekarang").innerHTML = (sh.length==1?"0"+sh:sh)+ ":" +(sm.length==1?"0"+sm:sm)+ ":" +(ss.length==1?"0"+ss:ss);
			}
		tampilkan();
		function myDate(){
			<?php date_default_timezone_set('Asia/Jakarta');?>
			//var d = new Date();
			//d.setDay(<?php echo date('l');?>);
			//d.setDate(<?php echo date('d');?>);
			//d.setMonth(<?php echo date('Y');?>);
			//d.setFullYear(<?php echo date('Y');?>);
			//var x = d.getMonth()+"/"+d.getDate()+"/"+d.getFullYear();
			//var hari = ["Jumat","Sabtu","Minggu","Senin","Selasa","Rabu","Kamis"];
			//var bulan = ["Desember","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November"];
			document.getElementById("tanggal_sekarang").innerHTML = "<?php echo date('l, d F Y');?>";
			document.profillapangan.ngumpet_tanggal_sekarang.value= "<?php echo date('m/d/Y');?>";
			}
		myDate();
		function cetakHarga(){
			var hargaTabel = document.getElementsByClassName("harga_pagi_tabel");
			var res = hargaTabel.slice(0,5);
			hargaTabel[0].innerHTML="120.000";
		}
		function pilihLokasi(){
			var jenis = document.getElementById("form1").lokasi_lapangan.value;
			var kontainerstokcari = document.getElementById("kode_stok_cari");
			switch(jenis){
					case "KT001":
						kontainerstokcari.value = "<?php
						$A1=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$n' and f_tipe_lapangan.kode_tipe='KT001'");
						$B1 = mysqli_fetch_Array($A1,MYSQLI_NUM);
						echo"$B1[0]";
						?>";
					break;
					case "KT002":
						kontainerstokcari.value = "<?php
						$A2=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$n' and f_tipe_lapangan.kode_tipe='KT002'");
						$B2 = mysqli_fetch_Array($A2,MYSQLI_NUM);
						echo"$B2[0]";
						?>";
					break;
					case "KT003":
						kontainerstokcari.value = "<?php
						$A3=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$n' and f_tipe_lapangan.kode_tipe='KT003'");
						$B3 = mysqli_fetch_Array($A3,MYSQLI_NUM);
						echo"$B3[0]";
						?>";
					break;
					case "KT004":
						kontainerstokcari.value = "<?php
						$A4=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$n' and f_tipe_lapangan.kode_tipe='KT004'");
						$B4 = mysqli_fetch_Array($A4,MYSQLI_NUM);
						echo"$B4[0]";
						?>";
					break;
					case "KT005":
						kontainerstokcari.value = "<?php
						$A5=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$n' and f_tipe_lapangan.kode_tipe='KT005'");
						$B5 = mysqli_fetch_Array($A5,MYSQLI_NUM);
						echo"$B5[0]";
						?>";
					break;
					case "KT006":
						kontainerstokcari.value = "<?php
						$A6=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$n' and f_tipe_lapangan.kode_tipe='KT006'");
						$B6 = mysqli_fetch_Array($A6,MYSQLI_NUM);
						echo"$B6[0]";
						?>";
					break;
					case "KT007":
						kontainerstokcari.value = "<?php
						$A7=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$n' and f_tipe_lapangan.kode_tipe='KT007'");
						$B7 = mysqli_fetch_Array($A7,MYSQLI_NUM);
						echo"$B7[0]";
						?>";
					break;
					case "KT008":
						kontainerstokcari.value = "<?php
						$A8=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$n' and f_tipe_lapangan.kode_tipe='KT008'");
						$B8 = mysqli_fetch_Array($A8,MYSQLI_NUM);
						echo"$B8[0]";
						?>";
					break;
					case "KT009":
						kontainerstokcari.value = "<?php
						$A9=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$n' and f_tipe_lapangan.kode_tipe='KT009'");
						$B9 = mysqli_fetch_Array($A9,MYSQLI_NUM);
						echo"$B9[0]";
						?>";
					break;
					case "KT0010":
						kontainerstokcari.value = "<?php
						$A10=mysqli_query($con,"select f_stok_lapangan.kode_stok from f_profil_lapangan,f_stok_lapangan,f_tipe_lapangan,f_jenis_lapangan where
											f_profil_lapangan.kode_lap=f_stok_lapangan.kode_lap and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
											f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and f_profil_lapangan.nama_lap='$n' and f_tipe_lapangan.kode_tipe='KT010'");
						$B10 = mysqli_fetch_Array($A10,MYSQLI_NUM);
						echo"$B10[0]";
						?>";
					break;
					}
		}
	function initialize(){
	var mapOpt = {
	center:new google.maps.LatLng(51.508742,-0.120850),
	zoom:5,
	mapTypeId:google.maps.MapTypeId.ROADMAP
	};
	var map=new google.maps.Map(document.getElementById("googleMap"),mapOpt);
	}
	google.maps.event.addDomListener(window, 'load', initialize);
	function cekPilihan(){
		var jenis = document.getElementById("hasil_jenis").innerHTML;
		if(jenis==""){
			alert('harap tentukan lokasi lapangan dahulu');
			}
	}
</script>
</body>
</html>