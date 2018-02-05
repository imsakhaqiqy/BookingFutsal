<?php
	session_start();
	include'config.php';
	$keterangan=$_REQUEST['keterangan'];
	$waktutransfer=$_REQUEST['waktu_transfer'];
	$nominal=$_REQUEST['nominal'];
	$rekeningasal=$_REQUEST['rekening_asal'];
	$namaasal=$_REQUEST['nama_asal'];
	$rekeningtujuan=$_REQUEST['ngumpet_rekening_tujuan'];
	$namatujuan=$_REQUEST['ngumpet_an_penerima'];
	$nostruk=$_REQUEST['ngumpet_nostruk'];
	$kodePesan=$_REQUEST['ngumpet_kode_pesan'];
	$hitung = mysqli_query($link,'select count(*)total from f_order_validasi');
	$row = mysqli_fetch_array($hitung);
	$no = $row[0]+1;
	if($rekeningtujuan!=""){
	$simpanvalidasi=mysqli_query($link,"insert into f_order_validasi values('$no','$keterangan','$waktutransfer','$nominal','$rekeningasal','$namaasal','$rekeningtujuan','$namatujuan','$nostruk')");
	$updatenostruk = mysqli_query($link,"update f_status_order set status='diValidasi',kode_pesan='$kodePesan' where no_struk='$nostruk'");
	$query=mysqli_query($link,"select*from f_status_order where no_struk='$nostruk'");
	$xxx=mysqli_num_rows($query);
	$row=mysqli_fetch_array($query,MYSQLI_NUM);
	if($xxx==TRUE){
	$_SESSION['nostruk']=$row[1];
	$_SESSION['status_ngumpet']=$row[2];
	$_SESSION['status_pesanan']=$row[4];
	header("location:profil-daftar-pesanan.php");
	}else{
	echo"gagal login";
	}
	}else{
	header("location:validasi.php");
	}
?>