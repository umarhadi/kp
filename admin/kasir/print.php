<?php
require 'config.php';
include $view;
$lihat = new view($config);
$toko = $lihat->toko();
$hsl = $lihat->penjualan();
?>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

	<meta content="Umar Hadi Siswanto" name="author" />
	<title>Print Struk</title>

	<link href="../../assets/vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
	<link href="../../assets/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />

	<link href="../../assets/dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<script>
		window.print();
	</script>
	<div class="hk-sec-wrapper hk-invoice-wrap pa-35">
		<div class="invoice-from-wrap">
			<div class="row">
				<div class="col-md-7 mb-20">
					<h4 class="mb-35 font-weight-600"><?php echo $toko['nama_toko']; ?></h4>
					<address>
						<span class="d-block"><?php echo $toko['alamat_toko']; ?></span>
						<span class="d-block"><?php echo $toko['tlp']; ?></span>
					</address>
				</div>
				<div class="col-md-5 mb-20">
					<h4 class="mb-35 font-weight-600">Struk Pembayaran</h4>
					<span class="d-block">Tanggal:<span class="pl-10 text-dark"><?php echo date("j F Y, G:i"); ?></span></span>
					<span class="d-block">Nama Kasir:<span class="pl-10 text-dark"><?php echo $_GET['nm_member']; ?></span></span>
				</div>
			</div>
		</div>
		<hr class="mt-0">
		<h5>Item yang dibeli</h5>
		<hr>
		<div class="invoice-details">
			<div class="table-wrap">
				<div class="table-responsive">
					<table class="table table-striped table-border mb-0">
						<thead>
							<tr>
								<th>No.</th>
								<th class="w-50">Nama Barang</th>
								<th class="w-30">Merk</th>
								<th class="text-left">Jumlah</th>
								<th class="text-right">Harga Satuan</th>
								<th class="text-right">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($hsl as $isi) { ?>
								<tr>
									<td><?php echo $no; ?>.</td>
									<td class="w-50"><?php echo $isi['nama_barang']; ?></td>
									<td class="w-30"><?php echo $isi['merk']; ?></td>
									<td class="text-right"><?php echo $isi['jumlah']; ?>&nbsp;<?php echo $isi['satuan_barang']; ?></td>
									<td class="text-right">Rp.<?php echo number_format($isi['harga_jual']); ?></td>
									<td class="text-right">Rp.<?php echo number_format($isi['total']); ?></td>
								</tr>
							<?php $no++;
							} ?>
							<?php $hasil = $lihat->jumlah_off(); ?>
							<tr class="bg-transparent">
								<td colspan="5" class="text-right text-light">Total Semua</td>
								<td class="text-right">Rp.<?php echo number_format($hasil['bayar']); ?></td>
							</tr>
							<tr class="bg-transparent">
								<td colspan="5" class="text-right text-light border-top-0">Bayar</td>
								<td class="text-right border-top-0">Rp.<?php echo number_format($_GET['bayar']); ?></td>
							</tr>
							<tr class="bg-transparent">
								<td colspan="5" class="text-right text-light border-top-0">Kembalian</td>
								<td class="text-right border-top-0">Rp.<?php echo number_format($_GET['kembali']); ?></td>
							</tr>
						</tbody>
					</table>
					<hr>
				</div>
			</div>
		</div>
		<ul class="invoice-terms-wrap font-14 list-ul">
			Terima kasih sudah berbelanja disini:)
		</ul>
	</div>

</body>

</html>