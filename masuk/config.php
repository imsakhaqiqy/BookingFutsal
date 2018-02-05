<?php
	//buat koneksi mysql
	$con = mysqli_connect('mysql.idhostinger.com','u189022184_iim','QaUfbET3rd','u189022184_fudim');
	//jika koneksi gagal
	if(mysqli_connect_errno()){
		die("koneksi tidak terhubung");
		}
	//gunakan database fudim
	//$result = mysql_query('use fudim');
	//if(!$result){
		//die("database gagal diakses");
		//}
	//tambahkan query
	
?>