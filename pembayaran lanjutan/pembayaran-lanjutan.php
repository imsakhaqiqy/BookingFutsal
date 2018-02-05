<?php
		session_start();
		if(empty($_SESSION['email'])){
		
		}else{
			$_SESSION['email'];
			$nama = $_SESSION['email'];
			$kodepengguna = $_SESSION['kode_pengguna'];
			}
?>
<?php
	$link=mysqli_connect('mysql.idhostinger.com','u189022184_iim','QaUfbET3rd','u189022184_fudim');
	//jika koneksi gagal
	if(mysqli_connect_errno()){
		die("koneksi langsung digagalkan");
		}
	//tambahkan query
	$nama = $_REQUEST['nama_pemesan'];
	$alamat = $_REQUEST['alamat_pemesan'];
	$telpon = $_REQUEST['telpon_pemesan'];
	$email = $_REQUEST['email_pemesan'];
	$kodestok = $_REQUEST['kode_stok'];
	//$cekkodepengguna = mysql_query("select* from f_pengguna_user where nama_lengkap='$nama' and email='$email'");
	//$yyy = mysql_num_rows($cekkodepengguna);
	//$kodepengguna="KP001";
	$tglMain = $_REQUEST['tanggal_main'];
	$blnNya=substr($tglMain,0,2);
	$tglNya=substr($tglMain,3,2);
	$thnNya=substr($tglMain,8,10);
	$hitung = mysqli_query($link,'select count(*)total from f_profil_order');
	$row = mysqli_fetch_array($hitung,MYSQLI_NUM);
	$no = $row[0]+1;
	$nostruk = $blnNya.$tglNya.$thnNya.$row[0];
	$cocok = mysqli_query($link,'select no_struk from f_profil_order');
	$xxx=mysqli_num_rows($cocok);
	$simpan = "insert into f_profil_order values('$no','$kodepengguna','$nama','$alamat','$telpon','$email','$nostruk','$kodestok')";
	mysqli_query($link,$simpan);
	echo"<script>";
	echo"alert('Harap memeriksa seluruh data agar sesuai dengan pesanan anda , dan memilih no rekening tujuan untuk pembayaran uang DP')";
	echo"</script>";
?>
<!doctype html>
<html lang="en">
<head>
	<title>maenfutsal - Situs Pesan Lapangan Futsal Online No.1 di Jakarta.</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="Stylesheet" href="/maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="Stylesheet" href="style-pembayaran-lanjutan.css">
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
	
	<nav id="header" class="navbar navbar-inverse" data-spy="affix" data-offset-top="0">
		<div class="container-fluid">
			<div class="collapse navbar-collapse" id="myNavbar">
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
		</div>
	</nav>
				
	<div class="container" >
		<h3 class="text-center"><span class="label label-info"><u>Detail Pesanan</u></span></h3>
			<form action="/index.php" method="post" id="form2" name="form2"><br/>
				<table class="table">
					<tr>
						<td>Tanggal pesan</td>
									<?php 
									$tanggal=$_REQUEST['tanggal_pesan'];
									$jampesan=$_REQUEST['jam_pesan'];
									echo"<td><span id='tanggal'>".$tanggal."</span></td>";
									echo"<td>ID Pemesan</td>";
									echo"<td id='id_pemesan'>".$kodepengguna."</td>";
									echo"</tr>";
									echo"<tr>";
									echo"<td>Jam Pesan</td>";
									echo"<td><span id='jam_pesan'>".$jampesan."</span></td>";
									echo"<td>No Struk</td>";
									echo"<td id='no_struk'>$nostruk</td>";
									echo"</tr>";
								?>
				</table>
				
		<table class="table table-striped">
			<tr>
				<td>Nama Lapangan</td>
				<?php 
					$tempat=$_REQUEST['nama'];
					$lokasi=$_REQUEST['tipe'];
					$jenis=$_REQUEST['jenis'];
					$alamatlap=$_REQUEST['alamat'];
					echo"<td><span id='nama'>".$tempat."</span></td>";
					echo"<td>Lokasi Lapangan</td>";
					echo"<td><span id='tipe'>".$lokasi."</span></td>";
					echo"</tr>";
					echo"<tr>";
					echo"<td>Jenis Lapangan</td>";
					echo"<td><span id='jenis'>".$jenis."</span></td>";
					echo"<td>Alamat Lapangan</td>";
					echo"<td>".$alamatlap."</td>";
					echo"</tr>";
				?>
			<tr>	
				<td>Jam Main</td>
				<td><span id='jammain'><?php
					$jammain=$_REQUEST['jam_main'];echo $jammain;?></span></td>
				<td>Tanggal Main</td>
				<td><span id='tanggal_pesan'><?php $tanggalpesan=$_REQUEST['tanggal_main'];echo $tanggalpesan;?></span></td>
			</tr>
			<tr>
				<td>Uang DP</td>
				<td><span id='uang_dp'>Rp 20.000</span></td>
				<td>Harga/jam</td>
				<td>Rp.<span id='harga'><?php
					$harga=$_REQUEST['hargaperjam'];echo $harga;?></span></td>
			</tr>
			<tr>
				<td>Rekening Tujuan</td>
				<td><select id="rekening_tujuan" name="rekening_tujuan" onclick='tampilkan()'>
						<option value='pilih'>Pilih</option>
						<option value='Imsak'>00000000001</option>
						<option value='Ferdy'>00000000002</option>
						<option value='Admin'>00000000003</option>
					</select>
				</td>
				<td>Atas Nama</td>
				<td id="atas_nama"></td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:center;"><strong>Nama Pemesan</strong></td>
				<td colspan="2" style="text-align:center;"><strong>Sisa Pembayaran</strong></td>
			</tr>
			<tr>
				<td colspan="2" id="td-nama-pemesan"><strong><?php echo $nama;?></strong></td>
				<td colspan="2" id="td-sisa-pembayaran"><strong>Rp.<span id='sisa_bayar'><?php $sisa=$harga-20000;echo $sisa;?></span></strong></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="batal" value="Batal" class="btn btn-danger btn-lg"></td>
				<td colspan="2" align="center"><input type="submit" name="simpan" value="Pesan Sekarang" class="btn btn-success btn-lg"></td>
			</tr>
		</table>
				
				<!--<div class="container text-center">
					<table class="table table-striped" style="width:50%;margin:0 auto">
							
						</table>
							
				</div>-->
					<input type='hidden' name='ngumpet_tanggal' value=''>
					<input type='hidden' name='ngumpet_tempat' value=''>
					<input type='hidden' name='ngumpet_lokasi' value=''>
					<input type='hidden' name='ngumpet_jenis' value=''>
					<input type='hidden' name='ngumpet_kode_stok' value='<?php $kodestok=$_REQUEST['kode_stok'];echo $kodestok;?>'>
					<input type='hidden' name='ngumpet_harga_perjam' value=''>
					<input type='hidden' name='ngumpet_jam_main' value=''>
					<input type='hidden' name='ngumpet_uang_dp' value='20000'>
					<input type='hidden' name='ngumpet_rekening_tujuan' value=''>
					<input type='hidden' name='ngumpet_atas_nama' value=''>
					<input type='hidden' name='ngumpet_sisa_pembayaran' value=''>
					<input type='hidden' name='ngumpet_no_struk' value=''>
					<input type='hidden' name='ngumpet_id_pemesan' value=''>
					<input type='hidden' name='ngumpet_tanggal_pesan' value=''>
					<input type='hidden' name='ngumpet_jam_pesan' value=''>
					
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
		function tampilkan(){
			var norekening = document.getElementById("form2").rekening_tujuan.value;
			var kontainer = document.getElementById("atas_nama");
			switch(norekening){
				case "Imsak":
					kontainer.innerHTML = "Imsak Haqiqy";
				break;
				case "Ferdy":
					kontainer.innerHTML = "Ferdyansah";
				break;
				case "Admin":
					kontainer.innerHTML = "Admin";
				break;
				case "pilih":
					kontainer.innerHTML = "Kosong";
				break;
			}
			var atasnama = document.getElementById("atas_nama");
			document.form2.ngumpet_atas_nama.value=atasnama.innerHTML;
			var tanggal = document.getElementById("tanggal");
			document.form2.ngumpet_tanggal.value=tanggal.innerHTML;
			var nama = document.getElementById("nama");
			document.form2.ngumpet_tempat.value=nama.innerHTML;
			var tipe = document.getElementById("tipe");
			document.form2.ngumpet_lokasi.value=tipe.innerHTML;
			var jenis = document.getElementById("jenis");
			document.form2.ngumpet_jenis.value=jenis.innerHTML;
			var harga = document.getElementById("harga");
			document.form2.ngumpet_harga_perjam.value=harga.innerHTML;
			var jammain = document.getElementById("jammain");
			document.form2.ngumpet_jam_main.value=jammain.innerHTML;
			
			var rekening = document.getElementById("rekening_tujuan").value;
			var kontainer;
			switch(rekening){
				case "Imsak":
					kontainer = "0000000001";
				break;
				case "Ferdy":
					kontainer = "0000000002";
				break;
				case "Admin":
					kontainer = "0000000003";
				break;
				case "pilih":
					kontainer = "Kosong";
				break;
			}
			document.form2.ngumpet_rekening_tujuan.value=kontainer;
			
			var sisabayar = document.getElementById("sisa_bayar");
			document.form2.ngumpet_sisa_pembayaran.value=sisabayar.innerHTML;
			document.getElementById("no_struk").innerHTML = "<?php echo $nostruk;?>";
			var nostruk = document.getElementById("no_struk");
			document.form2.ngumpet_no_struk.value=nostruk.innerHTML;
			var idpemesan = document.getElementById("id_pemesan");
			document.form2.ngumpet_id_pemesan.value=idpemesan.innerHTML;
			var tanggalpesan = document.getElementById("tanggal_pesan");
			document.form2.ngumpet_tanggal_pesan.value=tanggalpesan.innerHTML;
			var jampesan = document.getElementById("jam_pesan");
			document.form2.ngumpet_jam_pesan.value=jampesan.innerHTML;
			}
	tampilkan();
	</script>
	</body>
</html>