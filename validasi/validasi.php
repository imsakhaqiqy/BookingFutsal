<?php		
		session_start();
		include'config.php';
		$hitung = mysqli_query($link,'select count(*)total from f_order_validasi');
		$row = mysqli_fetch_array($hitung);
		$no = $row[0];
		if(empty($_SESSION['nostruk'])){
		header("location:masuk.php");
		}
		$_SESSION['nostruk'];
		$_SESSION['status_ngumpet'];
		$nostruk = $_SESSION['nostruk'];
		$status = $_SESSION['status_ngumpet'];
		echo"<script>";
		echo"alert('Selamat datang $_SESSION[email], Harap dilengkapi seluruh data untuk proses konfirmasi pembayaran uang DP')";
		echo"</script>";
		
		$noStruk = $_SESSION['nostruk'];
		$blnNya = substr($noStruk,0,2);
		$tglNya = substr($noStruk,2,2);
		$thnNya = substr($noStruk,4,2);
		$x=$_SESSION['kode_pengguna'].$tglNya.$thnNya.$blnNya.$no;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>maenfutsal - Situs Pesan Lapangan Futsal Online No.1 di Jakarta.</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="Stylesheet" href="/maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="Stylesheet" href="style-validasi.css">
	<script src="/ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="/maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style>
		
	</style>
</head>
<body>
	<nav id="header" class="navbar navbar-inverse" data-spy="affix" data-offset-top="0">
		<div class="container-fluid">	
			<ul class="nav navbar-nav">
				<li><a href="/index.php" data-toggle="tooltip" data-replacement="bottom" title="Cari Lapangan & Daftar Lapangan yang Tersedia" onmouseover="mDown(this)" onmouseout="mUp(this)"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
				<li><a href='/masuk/keluar.php' data-toggle='tooltip' data-placement='bottom' title='Keluar dari fudim' onmouseover='mDown(this)' onmouseout='mUp(this)'><span class='glyphicon glyphicon-log-out'></span> Keluar</a>
				<li><a href="/confirm-no-struk/ConfirmNoStruk.php" data-toggle="tooltip" data-placement="bottom" title="Konfirmasi Pesanan Anda" onmouseover="mDown(this)" onmouseout="mUp(this)"><span class="glyphicon glyphicon-edit"></span> Konfirmasi</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><?php echo"Hallo ".$_SESSION['email'];?></a></li>
				<li><a href="/validasi/profil-daftar-pesanan.php" onmouseover="mDown(this)" onmouseout="mUp(this)" data-toggle="tooltip" data-placement="bottom" title="Lihat Status Pesanan Anda"><span class="glyphicon glyphicon-list-alt"></span> Cek Pesanan</a></li>
			</ul>
		</div>
	</nav>
	
	<div class="container">
		<div id="form-konfirmasi">
		<h3 class="text-center"><span class="label label-info">Konfirmasi</span></h3>
			<form action="aksi-validasi.php" id='form2' name='form2' method="post" class="form-horizontal" role="form"><br/>
				<div class="form-group">
					<label class="control-label col-sm-4" for="keterangan">
					<span class="label label-primary">Keterangan :</span>
					</label>
					<div class="col-sm-5">
						<input class="form-control" type="text" id="keterangan" name="keterangan" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="waktu_transfer">
					<span class="label label-primary">Waktu Transfer :</span>
					</label>
					<div class="col-sm-5">
						<input class="form-control" type="text" id="waktu_transfer" name="waktu_transfer" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="nominal">
					<span class="label label-primary">Nominal :</span>
					</label>
					<div class="col-sm-5">	
						<input class="form-control" id="nominal" type="text" name="nominal" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="rekening_pembayaran">
					<span class="label label-primary">Rekening Pembayar :</span>
					</label>
					<div class="col-sm-5">
						<input class="form-control" type="text" id="rekening_asal" name="rekening_asal" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="nama_asal">
					<span class="label label-primary">A.N :</span>
					</label>
					<div class="col-sm-5">
						<input class="form-control" type="text" id="nama_asal" name="nama_asal" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="rekening_tujuan">
					<span class="label label-primary">Rekening Tujuan :</span>
					</label>
					<div class="col-sm-5">	
						<select class="form-control" onclick='tampilkan()' id="rekening_tujuan" name="rekening_tujuan" style="width:150px" required>
							<option value='Imsak'>00000000001</option>
							<option value='Ferdy'>00000000002</option>
							<option value='Admin'>00000000003</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="atas_nama">
					<span class="label label-primary">Atas Nama :</span>
					</label>
					<div class="col-sm-5">
						<input class="form-control" type="text" id="atas_nama" name="atas_nama" required style="width:150px">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-6 col-sm-5">
						<input type="submit" class="btn btn-success btn-lg" name="proses" value="Proses" onclick='valid()'>
					</div>
				</div>
				<input type='hidden' name='ngumpet_nostruk' value='<?php echo $_SESSION['nostruk'];?>'>
				<input type='hidden' name='ngumpet_rekening_tujuan' id='ngumpet_rekening_tujuan' value=''>
				<input type='hidden' name='ngumpet_an_penerima' id='ngumpet_an_penerima' value=''>
				<input type='hidden' name='ngumpet_kode_pesan' id='ngumpet_kode_pesan' value='<?php echo $x;?>'>
			</form>
		</div>
	
		<div id="tabel-pesanan">
			<h3 id="judul-laporan">Tabel Pesanan Lapangan</h3>
			<table class="table" border="1" style="width:100%">
				<tr>
					<th class="th-judul"><u>No Struk</u></th>
					<th class="th-judul"><u>Status Pembayaran</u></th>
					<th class="th-judul"><u>Batas Waktu(Transfer)</u></th>
					<th class="th-judul"><u>Status Pesanan</u></th>
				</tr>
				<tr>
					<td><?php echo $_SESSION['nostruk'];?></td>
					<td id="status"><?php echo $_SESSION['status_ngumpet'];?></td>
					<td><?php echo $_SESSION['batas_waktu'];?></td>
					<td><?php echo $_SESSION['status_pesanan'];?></td>
				</tr>
			</table>
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
	<div id="demo">
	</div>
<script>
	function mDown(obj){
		obj.style.backgroundColor = "#004d38";
		}
	function mUp(obj){
		obj.style.backgroundColor = "#006e51";	
		}
	function tampilkan(){
			var norekening = document.getElementById("form2").rekening_tujuan.value;
			switch(norekening){
				case "Imsak":
					document.getElementById("atas_nama").value = "Imsak Haqiqy";
					document.form2.ngumpet_an_penerima.value = "Imsak Haqiqy";
					document.form2.ngumpet_rekening_tujuan.value = "0000000001";
				break;
				case "Ferdy":
					document.getElementById("atas_nama").value = "Ferdyansah";
					document.form2.ngumpet_an_penerima.value = "Ferdyansah";
					document.form2.ngumpet_rekening_tujuan.value = "0000000002";
				break;
				case "Admin":
					document.getElementById("atas_nama").value = "Admin";
					document.form2.ngumpet_an_penerima.value = "Admin";
					document.form2.ngumpet_rekening_tujuan.value = "0000000003";
				break;
				case "pilih":
					document.getElementById("atas_nama").value = "Kosong";
				break;
			}
		}
	tampilkan();
	function cekStatus(){
		var Status = document.getElementById("status").innerHTML;
		//document.getElementById("demo").innerHTML = Status;
		switch(Status){
			case "diPesan":
				document.getElementById("status").style.backgroundColor = "red";
				document.getElementById("status").style.color = "white";
				document.getElementById("status").style.fontWeight = "bold";
				break;
			case "diValidasi":
				document.getElementById("status").style.backgroundColor = "orange";
				document.getElementById("status").style.color = "white";
				document.getElementById("status").style.fontWeight = "bold";
				break;
			case "diCetak":
				document.getElementById("status").style.backgroundColor = "blue";
				document.getElementById("status").style.color = "white";
				document.getElementById("status").style.fontWeight = "bold";
				break;
			}
		}
	cekStatus();
	function valid(){
		var keterangan = document.getElementById("keterangan").value;
		var waktuTransfer = document.getElementById("waktu_transfer").value;
		var nominal = document.getElementById("nominal").value;
		var rekeningAsal = document.getElementById("rekening_asal").value;
		var namaAsal = document.getElementById("nama_asal").value;
		var rekeningTujuan = document.getElementById("rekening_tujuan").value;
		var atasNama = document.getElementById("atas_nama").value;
		if(keterangan==""||waktuTransfer==""||nominal==""||rekeningAsal==""||namaAsal==""||atasNama==""){
			alert('<?php echo "Harap Mengisi Semua Data";?>');
		//}else{
		}else{
			alert('<?php echo "Konfirmasi Pembayaran Uang DP berhasil dan akan di proses oleh admin kami. "
			."Kode Pesanan Anda : ".$x;?>');
			}
	}
</script>
</body>
</html>