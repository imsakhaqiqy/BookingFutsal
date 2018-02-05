<?php		
		session_start();
		if(empty($_SESSION['email'])){
		header("location:masuk.php");
		}
		$_SESSION['nostruk'];
		$_SESSION['status_ngumpet'];
		$_SESSION['email'];
		$_SESSION['kode_pengguna'];
		$nostruk = $_SESSION['nostruk'];
		$status = $_SESSION['status_ngumpet'];
		echo"<script>";
		echo"</script>";
?>
<?php
	//buat koneksi mysql
	$link=mysqli_connect('mysql.idhostinger.com','u189022184_iim','QaUfbET3rd','u189022184_fudim');
	//jika koneksi gagal
	if(mysqli_connect_errno()){
		die("koneksi gagal");
		}
	//gunakan database fudim
	$hasil=mysqli_query($link,"select f_order_lapangan.tanggal_order,f_status_order.no_struk,f_status_order.status,f_status_order.status_pesanan
						from f_profil_order,f_order_lapangan,f_status_order
						where f_profil_order.no_struk=f_order_lapangan.no_struk
						and f_order_lapangan.no_struk=f_status_order.no_struk
						and f_profil_order.kode_pengguna='$_SESSION[kode_pengguna]'");  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>maenfutsal - Situs Pesan Lapangan Futsal Online No.1 di Jakarta.</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="Stylesheet" href="/maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="Stylesheet" href="style-profil-daftar-pesanan.css">
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
						}
						?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><?php echo"Hallo ";echo $_SESSION['email'];?></a></li>
				<li class="activee"><a href="profil-daftar-pesanan.php" style="color:white" data-toggle="tooltip" data-placement="bottom" title="Lihat Status Pesanan Anda"><span class="glyphicon glyphicon-list-alt"></span> Cek Pesanan</a></li>
			</ul>
		</div>
	</nav>
	
	<div class="container">
		<div id="profil-pengguna">
		<h3 class="text-center"><span class="label label-info"><u>Profil</u></span></h3>
			<form class="form-horizontal" role="form"><br>
				<div class="form-group">
					<label class="control-label col-sm-4" for="username">
					<span class="label label-primary">ID Pengguna :</span>
					</label>
					<div class="col-sm-5">
						<input class="form-control" id="disabledInput" disabled type="text" name="username" value='<?php echo $_SESSION['kode_pengguna'];?>'>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="nama_lengkap">
					<span class="label label-primary">Nama Lengkap :</span>
					</label>
					<div class="col-sm-5">	
						<input class="form-control" id="disabledInput" disabled type="text" name="nama_lengkap" value='<?php echo $_SESSION['email'];?>'>
					</div>
				</div>
				<br>
				<p style="border-top:1px solid black">
				<br>
				<div class="form-group">
					<label class="control-label col-sm-4" for="psw_baru">
					<span class="label label-primary">Password baru :</span>
					</label>
					<div class="col-sm-5">	
						<input class="form-control" type="text" name="psw_baru" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="psw_lama">
					<span class="label label-primary">Password lama :</span>
					</label>
					<div class="col-sm-5">
						<input class="form-control" type="text" name="psw_lama" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-6 col-sm-5">
						<input type="submit" class="btn btn-success btn-lg" name="simpan" value="Simpan">
					</div>
				</div>
			</form>
			</div>
			<div id="laporan-pesanan" style="overflow-x:auto;">
			<h3 id="judul-laporan">Laporan Seluruh Pesanan</h3>
			<table class="table" border="0" >
				<tr>
					<th class="th-judul">No</th>
					<th class="th-judul">Tanggal Pesan</th>
					<th class="th-judul">No Struk</th>
					<th class="th-judul">Status Pesanan</th>
					<th class="th-judul">Status Pembayaran</th>
					<th class="th-judul">Aksi</th>
				</tr>
					<?php $x=1;while($row=mysqli_fetch_array($hasil,MYSQLI_NUM)){
						echo"<tr>";
						echo"<td class='no'>".$x++."</td>";
						echo"<td class='tgl_background'>".$row[0]."</td>";
						echo"<td class='status'>".$row[1]."</td>";
						echo"<td class='status_pesanan'>".$row[2]."</td>";
						echo"<td class='status_pembayaran_background'><span class='status_pembayaran'>".$row[3]."</span></td>";
						echo"<td><span class='aksi'></span></td>";
						echo"</tr>";
						}
					?>
			</table>
			</div>
	</div>
	
	
	
	<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm" style="margin:100px auto">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" method="POST" action="/struk/aksi-login.php"><br>
				<div class="form-group">
					<label class="control-label col-sm-4" for="no_struk_login"><span class="label label-default" style="font-size:14px">No.Struk :</span></label>
					<div class="col-sm-5" style="margin-left:20px">
						<input class="form-control" type="text" name="no_struk_login" style="width:100px" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="password_login"><span class="label label-default" style="font-size:14px">Kode Pesan :</span></label>
					<div class="col-sm-5" style="margin-left:20px">	
						<input class="form-control" type="password" name="kode_pesan_login" style="width:100px" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-5">
						<input type="submit" class="btn btn-primary btn-sm" value="Masuk">
					</div>
				</div>
			</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
	<div id="demo">
	</div>
<script>
	function mDown(obj){
		obj.style.backgroundColor = "#004d38";
		}
	function mUp(obj){
		obj.style.backgroundColor = "#006e51";	
		}
	function cekStatus(){
		var no = document.getElementsByClassName("no");
		var StatusPembayaran = document.getElementsByClassName("status_pembayaran");
		var x;
		var genap 
		for(x=0;x<StatusPembayaran.length;x++){
			//document.write(StatusPembayaran[x].innerHTML);
			if([x]%2==1){
			document.getElementsByClassName("no")[x].style.backgroundColor = "#98DDDE";
			document.getElementsByClassName("tgl_background")[x].style.backgroundColor = "#98DDDE";
			document.getElementsByClassName("status")[x].style.backgroundColor = "#98DDDE";
			document.getElementsByClassName("status_pesanan")[x].style.backgroundColor = "#98DDDE";
			if(StatusPembayaran[x].innerHTML=="Menunggu"){
			document.getElementsByClassName("aksi")[x].innerHTML="---";
			document.getElementsByClassName("status_pembayaran_background")[x].style.backgroundColor = "red";
			document.getElementsByClassName("status_pembayaran")[x].style.color = "white";
			}else{
			document.getElementsByClassName("aksi")[x].innerHTML="<button type='button' style='font-size:8pt' class='btn btn-info btn-sm' data-toggle='modal' data-target='#myModal'><span class='glyphicon glyphicon-picture'></span> Cetak</button>";
			document.getElementsByClassName("status_pembayaran_background")[x].style.backgroundColor = "blue";
			document.getElementsByClassName("status_pembayaran")[x].style.color = "white";
			}
			}else{
			document.getElementsByClassName("no")[x].style.backgroundColor = "#f1f1f1";
			if(StatusPembayaran[x].innerHTML=="Menunggu"){
			document.getElementsByClassName("aksi")[x].innerHTML="---";
			document.getElementsByClassName("status_pembayaran_background")[x].style.backgroundColor = "red";
			document.getElementsByClassName("status_pembayaran")[x].style.color = "white";
			}else{
			document.getElementsByClassName("aksi")[x].innerHTML="<button type='button' style='font-size:8pt' class='btn btn-info btn-sm' data-toggle='modal' data-target='#myModal'><span class='glyphicon glyphicon-picture'></span> Cetak</button>";
			document.getElementsByClassName("status_pembayaran_background")[x].style.backgroundColor = "blue";
			document.getElementsByClassName("status_pembayaran")[x].style.color = "white";
			}
		}
		}
		}
	cekStatus();
</script>
</body>
</html>