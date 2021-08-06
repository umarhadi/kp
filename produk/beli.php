<?php
require 'config.php';
include $view;
$lihat = new view($config);
$toko = $lihat->toko();
$id = $_GET['barang'];
$hasil = $lihat->barang_edit($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="../admin/kasir/fungsi/tambah/tambah.php?beli=beli&id=<?php echo $hasil['id_barang']; ?>">
</body>
</html>