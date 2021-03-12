<?php
@ob_start();
session_start();

if (!empty($_SESSION['admin'])) {
	require 'config.php';
	include $view;
	$lihat = new view($config);
	$toko = $lihat->toko();
	$id = $_SESSION['admin']['id_member'];

	// variable view stok, nama, kategori, sudah terjual
	$hasil_profil = $lihat->member_edit($id);
	$hasil_barang = $lihat->barang_row();
	$hasil_kategori = $lihat->kategori_row();
	$stok = $lihat->barang_stok_row();
	$jual = $lihat->jual_row();

	// variable view penjualan, laba, modal
	//$bln = date('m');
	//$thn = date('Y');
	$periode_bln = '"02-2021"'; //date('m').'-'.date('Y');
	$hasil_jual = $lihat->penjualan_bulan_row($periode_bln);

	/*$bayar += $hasil_jual['total'];
            $modal += $hasil_jual['harga_beli']* $hasil_jual['jumlah'];
            $jumlah += $hasil_jual['jumlah'];
            */

	//  admin
	//	include 'admin/template/header.php';

	if (!empty($_GET['page'])) {
		include 'admin/module/' . $_GET['page'] . '/index.php';
	} else {
		//include 'admin/template/home.php';
	}
	// end admin
} else {
	echo '<script>window.location="login.php";</script>';
}
?>

<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />
	<title>Dashboard - CV. Mahardika Komputer</title>
	<meta content="Umar Hadi Siswanto" name="author" />

	<link rel="stylesheet" href="aset/bootstrap/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" href="aset/css/style.css">
	<link rel="stylesheet" href="aset/css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="aset/css/et-line-font/et-line-font.css">
	<link rel="stylesheet" href="aset/css/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="aset/plugins/hmenu/ace-responsive-menu.css">

</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper boxed-wrapper">
		<header class="main-header">
			
		</header>
	</div>
</body>