<?php 
session_start();
if(!empty($_SESSION['admin'])){
	require '../../config.php';
	if(!empty($_GET['kategori'])){
		$nama= $_POST['kategori'];
		$tgl= date("j F Y, G:i");
		$data[] = $nama;
		$data[] = $tgl;
		$sql = 'INSERT INTO kategori (nama_kategori,tgl_input) VALUES(?,?)';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../kategori.php?berhasil=tambah-data"</script>';
	}
	if(!empty($_GET['barang'])){
		$id = $_POST['id'];
		$kategori = $_POST['kategori'];
		$nama = $_POST['nama'];
		$merk = $_POST['merk'];
		$beli = $_POST['beli'];
		$jual = $_POST['jual'];
		$satuan = $_POST['satuan'];
		$stok = $_POST['stok'];
		$tgl = $_POST['tgl'];
		
		$data[] = $id;
		$data[] = $kategori;
		$data[] = $nama;
		$data[] = $merk;
		$data[] = $beli;
		$data[] = $jual;
		$data[] = $satuan;
		$data[] = $stok;
		$data[] = $tgl;
		$sql = 'INSERT INTO barang (id_barang,id_kategori,nama_barang,merk,harga_beli,harga_jual,satuan_barang,stok,tgl_input) 
			    VALUES (?,?,?,?,?,?,?,?,?) ';
		$row = $config -> prepare($sql);
		$row -> execute($data);
		echo '<script>window.location="../../barang.php?berhasil"</script>';
	}
	if(!empty($_GET['jual'])){
		$id = $_GET['id'];
		$sql = 'SELECT * FROM barang WHERE id_barang = ?';
		$row = $config->prepare($sql);
		$row->execute(array($id));
		$hsl = $row->fetch();

		if($hsl['stok'] > 0)
		{
			$kasir =  $_GET['id_kasir'];
			$jumlah = 1;
			$total = $hsl['harga_jual'];
			$tgl = date("j F Y, G:i");
			$jenis = 'Offline';

			$data1[] = $id;
			$data1[] = $kasir;
			$data1[] = $jumlah;
			$data1[] = $total;
			$data1[] = $tgl;
			$data1[] = $jenis;

			$sql1 = 'INSERT INTO penjualan (id_barang,id_member,jumlah,total,tanggal_input,jenis) VALUES (?,?,?,?,?,?)';
			$row1 = $config -> prepare($sql1);
			$row1 -> execute($data1);

			echo '<script>window.location="../../transaksi-offline.php"</script>';

		}else{
			echo '<script>alert("Stok Barang Habis");
					window.location="../../transaksi-offline.php"</script>';
		}
	}

	// if(!empty($_GET['beli'])){
	// 	$id = $_GET['id'];
	// 	$sql = 'SELECT * FROM barang WHERE id_barang = ?';
	// 	$row = $config->prepare($sql);
	// 	$row->execute(array($id));
	// 	$hsl = $row->fetch();

	// 	if($hsl['stok'] > 0)
	// 	{
	// 		$kasir =  $_GET['id_kasir'];
	// 		$jumlah = 1;
	// 		$total = $hsl['harga_jual'];
	// 		$tgl = date("j F Y, G:i");
	// 		$jns = 'Online';

	// 		$data1[] = $id;
	// 		$data1[] = $kasir;
	// 		$data1[] = $jumlah;
	// 		$data1[] = $total;
	// 		$data1[] = $tgl;
	// 		$data1[] = $jns;

	// 		$sql1 = 'INSERT INTO penjualan (id_barang,id_member,jumlah,total,tanggal_input, jenis) VALUES (?,?,?,?,?,?)';
	// 		$row1 = $config -> prepare($sql1);
	// 		$row1 -> execute($data1);

	// 		echo '<script>window.location="../../transaksi-offline.php"</script>';

	// 	}else{
	// 		echo '<script>alert("Stok Barang Habis");
	// 				window.location="../../transaksi-offline.php"</script>';
	// 	}
	// }

	if(!empty($_GET['beli'])){
		$id_b = $_POST['id_barang'];
		$jml = $_POST['jumlah'];
		$total = $_POST['total'];
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
		echo '<script>window.location="../../barang.php?berhasil"</script>';
	}

}