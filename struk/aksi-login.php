<?php
	session_start();
	//buat koneksi mysql
	$link=mysqli_connect('mysql.idhostinger.com','u189022184_iim','QaUfbET3rd','u189022184_fudim');
	//jika koneksi gagal
	if(mysqli_connect_errno()){
		die("koneksi gagal");
		}
	//gunakan database fudim
	$nostruk=$_REQUEST['no_struk_login'];
	
	$kodePesan=$_REQUEST['kode_pesan_login'];
	$query=mysqli_query($link,"select no_struk,kode_pesan from f_status_order where no_struk='$nostruk' and kode_pesan='$kodePesan'");
	$row=mysqli_fetch_array($query,MYSQLI_NUM);
	//echo "x";
	//echo $nostruk. $row[0];
		if($row[0]==$nostruk&&$row[1]==$kodePesan){
			/*echo"<script>";
			echo"alert('kode pesanan benar')";
			echo"</script>";*/
			$_SESSION['struk']=$nostruk;
			header("location:struk.php");
		}else{
			header("location:/validasi/profil-daftar-pesanan.php");
		}
?>