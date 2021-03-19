<?php
//include('dbconnected.php');
require('../../config.php');

$id = $_GET['id'];
$kategori = $_POST['kategori'];
$nama = $_POST['nama'];
$merk = $_POST['merk'];
$beli = $_POST['beli'];
$jual = $_POST['jual'];
$satuan = $_POST['satuan'];
$stok = $_POST['stok'];
$tgl = $_POST['tgl'];

//query update
$query = "UPDATE barang SET id_kategori='$kategori', nama_barang='$nama', merk='$merk', harga_beli='$beli', harga_jual='$jual', satuan_barang='$satuan', stok='$stok', tgl_update='$tgl'  WHERE id_barang='$id' ";

$row = $config->prepare($query);
$row->execute();
echo '<script>window.location="../../barang.php"</script>';

//mysql_close($host);
?>
