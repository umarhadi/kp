<?php
session_start();
if (!empty($_SESSION['admin'])) {
	require '../../config.php';
	if (!empty($_GET['kategori'])) {
		$id = $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM kategori WHERE id_kategori=?';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../kategori.php?hapus=berhasil"</script>';
	}
	if (!empty($_GET['barang'])) {
		$id = $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM barang WHERE id_barang=?';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../barang.php?hapus=berhasil"</script>';
	}
	if (!empty($_GET['jual'])) {

		$dataI[] = $_GET['brg'];
		$sqlI = 'select*from barang where id_barang=?';
		$rowI = $config->prepare($sqlI);
		$rowI->execute($dataI);
		$hasil = $rowI->fetch();

		$id = $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM penjualan WHERE id_penjualan=?';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../transaksi-offline.php"</script>';
	}

	if (!empty($_GET['jl'])) {

		$dataI[] = $_GET['brg'];
		$sqlI = 'select*from barang where id_barang=?';
		$rowI = $config->prepare($sqlI);
		$rowI->execute($dataI);
		$hasil = $rowI->fetch();

		$id = $_GET['id'];
		$data[] = $id;
		$sql = 'DELETE FROM penjualan WHERE id_penjualan=?';
		$row = $config->prepare($sql);
		$row->execute($data);
		echo '<script>window.location="../../transaksi-online.php"</script>';
	}

	if (!empty($_GET['penjualan-offline'])) {

		/*$sqlI = 'INSERT INTO nota SELECT * FROM penjualan';
		$rowI = $config->prepare($sqlI);
		$rowI->execute($dataI);*/

		$sql = 'DELETE FROM penjualan WHERE jenis="Offline"';
		$row = $config->prepare($sql);
		$row->execute();
		echo '<script>window.location="../../transaksi-offline.php"</script>';
	}

	if (!empty($_GET['penjualan-online'])) {

		/*$sqlI = 'INSERT INTO nota SELECT * FROM penjualan';
		$rowI = $config->prepare($sqlI);
		$rowI->execute($dataI);*/

		$sql = 'DELETE FROM penjualan WHERE jenis="Online"';
		$row = $config->prepare($sql);
		$row->execute();
		echo '<script>window.location="../../transaksi-online.php"</script>';
	}

	if (!empty($_GET['laporan'])) {

		$sql = 'DELETE FROM nota';
		$row = $config->prepare($sql);
		$row->execute();
		echo '<script>window.location="../../laporan.php?hapus=berhasil"</script>';
	}
}
