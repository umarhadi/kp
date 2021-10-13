<?php
date_default_timezone_set("Asia/Jakarta");

	$host 	= 'localhost';
	$user 	= 'root';
	$pass 	= '1';
	$dbname = 'db_toko';
	
	try{
		$config = new PDO("mysql:host=$host;dbname=$dbname;", $user,$pass);
		//echo 'sukses';
	}catch(PDOException $e){
		echo 'KONEKSI GAGAL' .$e -> getMessage();
	}
	
	$view = 'admin/pemilik/fungsi/view/view.php'; // direktori fungsi select data
?>