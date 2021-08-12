<?php
include 'config.php';

$id_b = $_POST['id_barang'];
$jml = $_POST['jumlah'];
$hrg = $_POST['total'];
$total = $jml * $hrg;
$tgl = date("j F Y, G:i");
$jenis = 'Online';
$nama = $_POST['nama'];
$nohp = $_POST['no_hp'];

$data[] = $id_b;
$data[] = $jml;
$data[] = $total;
$data[] = $tgl;
$data[] = $jenis;
$data[] = $nama;
$data[] = $nohp;
$sql = 'INSERT INTO penjualan (id_barang,jumlah,total,tanggal_input,jenis,nama,no_hp)
VALUES (?,?,?,?,?,?,?) ';
$row = $config -> prepare($sql);
$row -> execute($data);
echo '<script>
    window.location = "../index.php?berhasil=beli"
</script>';
?>