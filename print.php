<?php
require 'config.php';
include $view;
$lihat = new view($config);
$toko = $lihat->toko();
$hsl = $lihat->penjualan();
?>
<html>

<head>
	<title>print</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
</head>

<body>
	<script>
		window.print();
	</script>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<center>
					<p><?php echo $toko['nama_toko']; ?></p>
					<p><?php echo $toko['alamat_toko']; ?></p>
					<p>Tanggal : <?php echo date("j F Y, G:i"); ?></p>
					<p>Kasir : <?php echo $_GET['nm_member']; ?></p>
				</center>
				<table class="table table-bordered" style="width:100%;">
					<tr>
						<td>No.</td>
						<td>Barang</td>
						<td>Jumlah</td>
						<td>Total</td>
					</tr>
					<?php $no = 1;
					foreach ($hsl as $isi) { ?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $isi['nama_barang']; ?></td>
							<td><?php echo $isi['jumlah']; ?></td>
							<td><?php echo $isi['total']; ?></td>
						</tr>
					<?php $no++;
					} ?>
				</table>
				<div class="pull-right">
					<?php $hasil = $lihat->jumlah(); ?>
					Total : Rp.<?php echo number_format($hasil['bayar']); ?>,-
					<br />
					Bayar : Rp.<?php echo number_format($_GET['bayar']); ?>,-
					<br />
					Kembali : Rp.<?php echo number_format($_GET['kembali']); ?>,-
				</div>
				<div class="clearfix"></div>
				<center>
					<p>Terima Kasih Telah berbelanja di toko kami !</p>
				</center>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>

</html>

<!--
	
<section class="hk-sec-wrapper hk-invoice-wrap pa-35">
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
				<span class="d-block">Tanggal:<span class="pl-10 text-dark">Nov 17,2017 11:23 AM</span></span>
				<span class="d-block">Nama Kasir:<span class="pl-10 text-dark"><?php echo $hasil_profil['nm_member']; ?></span></span>
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
							<th class="w-70">Nama Barang</th>
							<th class="w-50">Merk</th>
							<th class="text-right">Jumlah</th>
							<th class="text-right">Harga Satuan</th>
							<th class="text-right">Total</th>
						</tr>
					</thead>
					<tbody>
						<?php $total_bayar = 0;
						$no_struk = 1;
						$struk_penjualan = $lihat->penjualan(); ?>
						<?php foreach ($struk_penjualan as $isi_struk) {; ?>
							<tr>
								<td><?php echo $no_struk; ?></td>
								<td class="w-70"><?php echo $isi_struk['nama_barang']; ?></td>
								<td class="w-50"><?php echo $isi_struk['merk']; ?></td>
								<td class="text-right"><?php echo $isi_struk['jumlah']; ?></td>
								<td class="text-right"><?php echo number_format($isi_struk['harga_jual']); ?></td>
								<td class="text-right"><?php echo number_format($isi_struk['total']); ?></td>
							</tr>
						<?php $no_struk++;
						} ?>
						<?php $totalStruk = $lihat->struk_total(); ?>
						<tr class="bg-transparent">
							<td colspan="5" class="text-right text-light">Total Semua</td>
							<td class="text-right">Rp.<?php echo number_format($totalStruk); ?></td>
						</tr>
						<tr class="bg-transparent">
							<td colspan="5" class="text-right text-light border-top-0">Bayar</td>
							<td class="text-right border-top-0">s</td>
						</tr>
						<tr class="bg-transparent">
							<td colspan="5" class="text-right text-light border-top-0">Kembalian</td>
							<td class="text-right border-top-0"><?php echo number_format($hitung); ?></td>
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
</section>