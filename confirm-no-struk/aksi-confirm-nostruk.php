<?php
	session_start();
	include'config.php';
	$nostruk=$_REQUEST['nostruk'];
	$email=$_REQUEST['email'];
	if($email==$_SESSION['email']){
	$query=mysqli_query($link,"select*from f_status_order where no_struk='$nostruk'");
	$xxx=mysqli_num_rows($query);
	$row=mysqli_fetch_array($query,MYSQLI_NUM);
	if($xxx==TRUE){
	$_SESSION['nostruk']=$row[1];
	$_SESSION['status_ngumpet']=$row[2];
	$_SESSION['batas_waktu']=$row[3];
	$_SESSION['status_pesanan']=$row[4];
	header("location:/validasi/validasi.php");
	}else{
	echo"gagal login";
	}
	}else{
	header("location:/confirm-no-struk/ConfirmNoStruk.php");
	echo"<h1>Salah<h1>";
	}
?>