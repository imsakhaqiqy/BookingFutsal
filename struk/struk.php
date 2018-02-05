<?php
	//buat koneksi mysql
	session_start();
	$link=mysqli_connect('mysql.idhostinger.com','u189022184_iim','QaUfbET3rd','u189022184_fudim');
	//jika koneksi gagal
	if(mysqli_connect_errno()){
		die("koneksi gagal");
		}
	//gunakan database fudim
	//$nostruk=$_REQUEST['no_struk_login'];
	//$kodePesan=$_REQUEST['kode_pesan_login'];
	$hasil=mysqli_query($link,"select f_order_lapangan.no_struk,f_profil_order.kode_pengguna,f_order_lapangan.tanggal_order,f_order_lapangan.jam_order,
    	f_profil_lapangan.nama_lap,f_tipe_lapangan.tipe,f_jenis_lapangan.jenis,f_order_lapangan.tanggal_main,f_order_lapangan.jam_main
    	,f_profil_lapangan.alamat_lap,f_order_validasi.rekening_asal,f_order_validasi.nama_asal,f_order_validasi.rekening_tujuan,
    	f_order_validasi.nama_tujuan,f_order_lapangan.uang_dp,f_order_lapangan.sisa_pembayaran,f_profil_order.nama
    	from f_order_lapangan,f_profil_order,f_stok_lapangan,f_profil_lapangan,f_tipe_lapangan,f_jenis_lapangan,f_order_validasi
    	where f_order_lapangan.no_struk=f_profil_order.no_struk and
    	f_order_lapangan.kode_stok=f_stok_lapangan.kode_stok and
    	f_stok_lapangan.kode_lap=f_profil_lapangan.kode_lap
    	and f_stok_lapangan.kode_tipe=f_tipe_lapangan.kode_tipe and
    	f_stok_lapangan.kode_jenis=f_jenis_lapangan.kode_jenis and
    	f_order_lapangan.no_struk=f_order_validasi.no_struk and
    	f_order_lapangan.no_struk='$_SESSION[struk]'");
?>
<!doctype html>
<html lang="en">
<head>
	<title>Situs pesan lapangan futsal secara online</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="Stylesheet" href="/maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="Stylesheet" href="style-struk-pesanan.css">
	<script src="/ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="/maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style>
		
	</style>
</head>

<body>

	<!--<nav id="header" class="navbar navbar-inverse" data-spy="affix" data-offset-top="0">
		<div class="container-fluid">
			<div class="collapse navbar-collapse" id="#myNavbar">
				<ul class="nav navbar-nav">
					<li><a class="active" href="/MainFutsal/index.php">Beranda</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"></a></li>
					<li><a href="#"><Span class="glyphicon glyphicon-shopping-chartuser"></span> Cart</a></li>
				</ul>
			</div>
		</div>
	</nav>-->
	<?php
		$row=mysqli_fetch_array($hasil,MYSQLI_NUM);
	?>
	<!--<div id="strok" class="container" style="width:70%;height:800px;background-color:#fff;margin-bottom:500px">
		<h2 class="text-center"><span class="label label-default" style="color:#fff;font-family:Verdana,sans-serif">Struk Pemesanan</span></h2><br>
			<form>
				<table class="table">
					<tr>
						<td class="a1"><label for="no_struk">No.struk :</label></td>-->
						<!--<td class="b1">--><input type="text" name="n_struk" id="n_struk" value="<?php echo $row[0];?>" class="form-control"><!--</td>-->
						<!--<td class="a1"><label for="tanggal">Tanggal Pesan:</label><!--</td>-->
						<!--<td class="b2">--><input type="hidden" name="tanggal_pesan" id="tanggal_pesan" value="<?php echo $row[2];?>" class="form-control"><!--</td>-->
					<!--</tr>
					<tr>
						<td class="a1"><label for="id_pemesan">Id.pemesan :</label></td>
						<td class="b1">--><input type="hidden" name="i_pemesan" id="i_pemesan" value="<?php echo $row[1];?>" class="form-control"><!--</td>
						<td class="a1"><label class="label-2" for="jam" name="jam">Jam Pesan :</label></td>
						<td class="b2">--><input type="hidden" name="jam_pesan" id="jam_pesan" value="<?php echo $row[3];?>" class="form-control"><!--</td>
					</tr>
				</table>
				<p style="border-top:1px dashed #aeb59c;"></p><br>
				<table class="table">
					<tr>
						<td><label class="label-4" for="nama_lapangan">Nama Lapangan</label></td>
						<td>--><input type="hidden" name="nama_lapangan" id="nama_lapangan" value="<?php echo $row[4];?>" style="width:100px"><!--</td>
						<td><label class="label-4" for="lokasi_lapangan">Lokasi Lapangan</label></td>
						<td>--><input type="hidden" name="lokasi_lapangan" id="lokasi_lapangan" value="<?php echo $row[5];?>" style="width:100px"><!--</td>
						<td><label class="label-3" for="jenis_lapangan">Jenis Lapangan</label></td>
						<td>--><input type="hidden" name="jenis_lapangan" id="jenis_lapangan" value="<?php echo $row[6];?>" style="width:100px"><!--</td>
					</tr>
					<tr>
						<td><label class="label-4" for="alamat_lapangan">Alamat Lapangan</label></td>
						<td>--><input type="hidden" name="alamat_lapangan" id="alamat_lapangan" value="<?php echo $row[9];?>" style="width:100px"><!--</td>
						<td><label class="label-3" for="tanggal_pesan" name="tanggal_pesan">Tanggal Main</label></td>
						<td>--><input type="hidden" name="tanggal_pesan" id="tanggal_main" value="<?php echo $row[7];?>" style="width:100px"><!--</td>
						<td><label class="label-4" for="waktu_main" name="waktu_main">Jam Main</label></td>
						<td>--><input type="hidden" name="waktu_main" id="jam_main" value="<?php echo $row[8];?>" style="width:100px"/><!--</td>
					</tr>
					<tr>
						<td><label class="label-3" for="uang_dp" name="uang_dp">Jumlah DP</label></td>
						<td>--><input type="hidden" name="uang_dp" id="uang_dp" value="<?php echo $row[14];?>" style="width:100px"><!--</td>
						<td><label class="label-4" for="harga_lapangan" name="harga_lapangan">Harga/jam</label></td>
						<td>--><input type="hidden" name="harga_lapangan" id="harga_lapangan" value="<?php echo $row[14]+$row[15];?>" style="width:100px"><!--</td>
						<td><label class="label-3" for="rekening_pemesan" name="rekening_pemesan">Rekening Pemesan</label></td>
						<td>--><input type="hidden" name="rekening_pemesan" id="rekening_pemesan" value="<?php echo $row[10];?>" style="width:100px"><!--</td>
					</tr>
					<tr>
						<td><label class="label-4" for="nama_pemesan" name="nama_pemesan">A.N</label></td>
						<td>--><input type="hidden" name="nama_pemesan" id="an_pemesan" value="<?php echo $row[11];?>" style="width:100px"><!--</td>
						<td><label class="label-3" for="rekening_penerima" name="rekening_penerima">Rekening Penerima</label></td>
						<td>--><input type="hidden" name="rekening_penerima" id="rekening_penerima" value="<?php echo $row[12];?>" style="width:100px"><!--</td>
						<td><label class="label-4" for="nama_penerima" name="nama_penerima">A.N</label></td>
						<td>--><input type="hidden" name="nama_penerima" id="an_penerima" value="<?php echo $row[13];?>" style="width:100px"><!--</td>
					</tr>
				</table>
				<hr>
				<table class="table" style="width:80%">
					<tr>
						<td><label class="label-5" for="ttd_pemesan" name="ttd_pemesan">Nama Pemesan</label></td>
						<td><label class="label-5" for="ttd_admin" name="ttd_admin">Ttd admin</label></td>
						<td><label class="label-6" for="sisa_bayar" name="sisa_bayar">Sisa Pembayaran</label></td>
					</tr>
					<tr>
						<td>--><input type="hidden" name="nama_pemesan" id="nama_pemesan" value="<?php echo $row[16];?>" style="width:100px"><!--</td>
						<td>--><input type="hidden" name="nama_admin" id="nama_admin" value="Adm fudim" style="width:100px"><!--</td>
						<td>--><input type="hidden" name="sisa_bayar" id="sisa_bayar" value="<?php echo $row[15];?>" style="width:100px"><!--</td>
					</tr>
				</table>
				<p><center>Terima kasih<br>telah memesan lapangan futsal<br>di www.fudim.com</center></p>
			</form>
	</div>-->
	
	<div class="container text-center">
	<canvas id="myCanvas" width="800" height="600" style="background-color:#fff;display:none">
	</canvas>
	<center>
	<img id="canvasImg" alt="Right click to save me!" style="margin-bottom:50px;margin-top:50px">
	</center>
	</div>
	
	<!--<footer class="container-fluid">
		<div id="pengguna">
			<h3>Pengguna</h3>
			<h4><a href="#">Cara Pesan</a></h4>
			<h4><a href="#">Pembayaran</a></h4>
			<h4><a href="#">Validais</a></h4>
			<h4><a href="#">Cetak Struk</a></h4>
			<h4><a href="#">Tips Pesan</a></h4>
		</div>
		<div id="tentang">
			<h3>Tentang</h3>
			<h4><a href="#">Tentang Fudim</a></h4>
			<h4><a href="#">Aturan Pengguna</a></h4>
			<h4><a href="#">Kebijakan Privasi</a></h4>
			<h4><a href="#">Berita & Pengumuman</a></h4>
			<h4><a href="#">Laporan & Masalah</a></h4>
		</div>
		<div id="halaman">
			<h3>Temukan Kami di :</h3>
				<ul id="medsos">
					<li><a href="#"><img src="/MainFutsal/image/facebook1.png" alt="facebook icon" width="50" height="50"></a></li>
					<li><a href="#"><img src="/MainFutsal/image/instagram.png" alt="instagram icon" width="50" height="50"></a></li>
					<li><a href="#"><img src="/MainFutsal/image/twitter.png" alt="twitter icon" width="50" height="50"></a></li>
				</ul>
		</div>
		<br><br>
		<h4 class="text-center" style="color:white;font-family:Consolas"><a href="#" style="color:#92B6D5;font-family:Consolas">www.Fudim.com</a> @Copyright 2016</h4>
	</footer>-->
	
<script>
		var canvas = document.getElementById("myCanvas");
		var ctx = canvas.getContext("2d");
		var a1 = document.getElementById("n_struk").value;
		var a2 = document.getElementById("i_pemesan").value;
		var a3 = document.getElementById("tanggal_pesan").value;
		var a4 = document.getElementById("jam_pesan").value;
		var a5 = document.getElementById("nama_lapangan").value;
		var a6 = document.getElementById("lokasi_lapangan").value;
		var a7 = document.getElementById("jenis_lapangan").value;
		var a8 = document.getElementById("tanggal_main").value;
		var a9 = document.getElementById("jam_main").value;
		var a10 = document.getElementById("alamat_lapangan").value;
		var a11 = document.getElementById("harga_lapangan").value;
		var a12 = document.getElementById("uang_dp").value;
		var a13 = document.getElementById("rekening_pemesan").value;
		var a14 = document.getElementById("an_pemesan").value;
		var a15 = document.getElementById("rekening_penerima").value;
		var a16 = document.getElementById("an_penerima").value;
		var a17 = document.getElementById("nama_pemesan").value;
		var a18 = document.getElementById("sisa_bayar").value;
		var a19 = document.getElementById("nama_admin").value;
		var x,y;
		ctx.beginPath();
		for(x=0;x<=800;x++){
			x=x+10;
			ctx.fillText("|",x,0);
			ctx.fillText("|",x,610);
		}
		for(y=0;y<=600;y++){
			y=y+10;
			ctx.fillText("-",0,y);
			ctx.fillText("-",795,y);
		}//ctx.fillText("|",10,0);
		//ctx.shadowBlur = "20";
		//ctx.shadowColor = "black";
		ctx.fillStyle = "white";
		ctx.fillRect(0,0,800,600);
		ctx.font = "20px Arial bold";
		ctx.fillStyle="black";
		ctx.fillText("No.Struk :",50,20);
		ctx.fillText("ID.Pengguna :",20,40);
		ctx.fillText("Tgl Pesan :",550,20);
		ctx.fillText("Jam Pesan :",547,40);
		ctx.fillText(a1,140,20);
		ctx.fillText(a2,140,40);
		ctx.fillText(a3,650,20);
		ctx.fillText(a4,650,40);
		ctx.moveTo(0,60);
		ctx.lineTo(800,60);
		ctx.stroke();
		ctx.fillText("Detail Lokasi",20,80);
		ctx.fillText("Nama Lapangan	:",20,110);
		ctx.fillText(a5,170,110);
		ctx.fillText("Lokasi Lapangan	:",450,110);
		ctx.fillText(a6,610,110);
		ctx.fillText("("+a7+")",710,110);
		ctx.fillText("Tgl Main	:",76,140);
		ctx.fillText(a8,170,140);
		ctx.fillText("Jam Main	:",509,140);
		ctx.fillText(a9,610,140);
		ctx.fillText("Alamat	:",370,170);
		ctx.fillText(a10,250,200);
		ctx.moveTo(0,220);
		ctx.lineTo(800,220);
		ctx.stroke();
		ctx.fillText("Detail Pembayaran",20,240);
		ctx.fillText("Harga/jam	:",124,270);
		ctx.fillText("Rp "+a11,230,270);
		ctx.fillText("Bayar DP	:",486,270);
		ctx.fillText("Rp "+a12,590,270);
		ctx.fillText("Rekening Pemesan	:",54,300);
		ctx.fillText(a13,230,300);
		ctx.fillText("A.N Pemesan	:",454,300);
		ctx.fillText(a14,590,300);
		ctx.fillText("Rekening Penerima	:",50,330);
		ctx.fillText(a15,230,330);
		ctx.fillText("A.N Penerima	:",450,330);
		ctx.fillText(a16,590,330);
		ctx.moveTo(0,350);
		ctx.lineTo(800,350);
		ctx.stroke();
		ctx.fillText("Ttd Pemesan",20,380);
		ctx.fillText("Sisa Pembayaran",300,380);
		ctx.fillText("Ttd Admin",680,380);
		ctx.fillText(a17,40,410);
		ctx.fillText("Rp "+a18,320,410);
		ctx.fillText(a19,700,410);
		ctx.fillStyle="red";
		ctx.fillText("TERIMA KASIH",300,500);
		ctx.fillText("Anda telah memesan Lapangan Futsal",220,530);
		ctx.fillText("di www.Fudim.com",300,560);
		ctx.closePath();
		// save canvas image as data url (png format by default)
      var dataURL = canvas.toDataURL();

      // set canvasImg image src to dataURL
      // so it can be saved as an image
      document.getElementById('canvasImg').src = dataURL;
</script>
</body>
</html>