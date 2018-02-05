<?php
	session_start();
	include'config.php';
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
	$query=mysqli_query($con,"select*from f_pengguna_user where email='$email' and password='$password'");
	$xxx=mysqli_num_rows($query);
	$row=mysqli_fetch_array($query,MYSQLI_NUM);
	if($xxx==TRUE){
	$_SESSION['email']=$row[2];
	$_SESSION['kode_pengguna']=$row[1];
	header("location:/index.php");
	
	}else{
	echo"gagal login";
	}
?>