<?php
@ob_start();
session_start();

if (!empty($_SESSION['admin'])) {
	require 'config.php';
	include $view;
	$lihat = new view($config);
	$toko = $lihat->toko();
	$id = $_SESSION['admin']['id_member'];

	$hasil_profil = $lihat->member_edit($id);
	$hasil_barang = $lihat->barang_row();
	$hasil_kategori = $lihat->kategori_row();
	$stok = $lihat->barang_stok_row();
	$jual = $lihat->jual_row();

	include 'komponen/header.php';

} else {
	echo '<script>window.location="login.php";</script>';
}
?>

<title>Dashboard - CV. Mahardika Komputer</title>
<div class="hk-pg-wrapper">
	<nav class="hk-breadcrumb" aria-label="breadcrumb">
		<ol class="breadcrumb breadcrumb-light bg-transparent">
			<li class="breadcrumb-item active"><a href="#"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
		</ol>
	</nav>
	<div class="container mt-xl-50 mt-sm-30 mt-15">
		<div class="hk-pg-header mb-1">
			<div>
				<h2 class="hk-pg-title font-weight-600 mb-10"><i class="zmdi zmdi-home"></i>&nbsp;Dashboard</h2>
				<?php
				$sql = " select * from barang where stok <= 3";
				$row = $config->prepare($sql);
				$row->execute();
				$r = $row->rowCount();
				if ($r > 0) {
				?>
				<?php
					echo "<div class='alert alert-secondary alert-wth-icon alert-dismissible fade show' role='alert'>
							<span class='alert-icon-wrap'><i class='zmdi zmdi-notifications-active'></i></span>Ada <span style='color:red'>$r</span> barang yang stoknya kurang dari 3 item. Silahkan update di
							<a href='barang.php?stok=yes'><span class='text-primary'>Tabel Barang</span></a>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							</button>
							</div>";
				}
				?>
			</div>
		</div>
		<div class="card hk-dash-type-1 overflow-hide">
			<div class="card-header pa-0">
				<div class="nav nav-tabs nav-light nav-justified" id="dash-tab" role="tablist">
					<a class="d-flex align-items-center justify-content-center nav-item nav-link active" id="dash-tab-1" data-toggle="tab" href="#NamaBarang" role="tab" aria-selected="true">
						<div class="d-flex">
							<div>
								<span class="d-block mb-5"><span class="display-4 text-sky counter-anim"><?php echo number_format($hasil_barang); ?></span></span>
								<span class="d-block"><i class="zmdi zmdi-collection-text mr-10 text-sky"></i>Nama Barang</span>
							</div>
						</div>
					</a>
					<a class="d-flex align-items-center justify-content-center nav-item nav-link" id="dash-tab-2" data-toggle="tab" href="#Stok" role="tab" aria-selected="false">
						<div class="d-flex">
							<div>
								<span class="d-block mb-5"><span class="display-4 text-sky counter-anim"><?php echo number_format($stok['jml']); ?></span></span>
								<span class="d-block"><i class="zmdi zmdi-archive mr-10 text-sky"></i>Stok Barang Tersisa</span>
							</div>
						</div>
					</a>
					<a class="d-flex align-items-center justify-content-center nav-item nav-link" id="dash-tab-3" data-toggle="tab" href="#Terjual" role="tab" aria-selected="false">
						<div class="d-flex">
							<div>
								<span class="d-block mb-5"><span class="display-4 text-sky counter-anim"><?php echo number_format($jual['stok']); ?></span></span>
								<span class="d-block"><i class="zmdi zmdi-money mr-10 text-sky"></i>Barang Telah Terjual</span>
							</div>
						</div>
					</a>
					<a class="d-flex align-items-center justify-content-center nav-item nav-link" id="dash-tab-3" data-toggle="tab" href="#Kategori" role="tab" aria-selected="false">
						<div class="d-flex">
							<div>
								<span class="d-block mb-5"><span class="display-4 text-sky counter-anim"><?php echo number_format($hasil_kategori); ?></span></span>
								<span class="d-block"><i class="zmdi zmdi-label-alt mr-10 text-sky"></i>Kategori Barang</span>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="card-body">
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="NamaBarang" role="tabpanel" aria-labelledby="NamaBarang">
						<div class="table-wrap">
							<table id="tableDash1" class="table w-100 pb-30">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Barang</th>
										<th>Merk</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$hasil = $lihat->barang();
									$no = 1;
									foreach ($hasil as $isi) {
									?>
										<tr>
											<td><?php echo $no; ?>.</td>
											<td><?php echo $isi['nama_barang']; ?></td>
											<td><?php echo $isi['merk']; ?></td>
											<td><a href="edit-barang.php?barang=<?php echo $isi['id_barang']; ?>"><button class="btn btn-sm btn-warning"><i class="zmdi zmdi-edit"></i> Edit</button></a>
												<a href="#" onclick="javascript:return confirm('Hapus?');"><button class="btn btn-sm btn-danger"><i class="zmdi zmdi-delete"></i> Hapus</button></a>
											</td>
										<?php $no++;
									} ?>
										</tr>

								</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane fade" id="Stok" role="tabpanel" aria-labelledby="Stok">
						<div class="table-wrap">
							<table id="tableDash2" class="table w-100 pb-30 ">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Barang</th>
										<th>Stok</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$hasil = $lihat->barang();
									$hasilhtg = $lihat->barang_sisa();
									$no = 1;
									foreach ($hasil as $isi) {
									?>
										<tr>
											<td><?php echo $no; ?>.</td>
											<td><?php echo $isi['nama_barang']; ?></td>
											<td><?php echo $isi['stok']; ?></td>
											<td><a href="edit-barang.php?barang=<?php echo $isi['id_barang']; ?>"><button class="btn btn-sm btn-warning"><i class="zmdi zmdi-edit"></i> Edit</button></a>
												<a href="#" onclick="javascript:return confirm('Hapus?');"><button class="btn btn-sm btn-danger"><i class="zmdi zmdi-delete"></i> Hapus</button></a>
											</td>
										<?php $no++;
									} ?>
										</tr>
								</tbody>
									<tr>
										<th>&nbsp;</th>
										<th><b>Total</b></th>
										<th><b><?php echo $hasilhtg; ?></b></th>
									</tr>
							</table>
						</div>
					</div>
					<div class="tab-pane fade " id="Terjual" role="tabpanel" aria-labelledby="Terjual">
						<div class="card">
							<div class="card-body">
							<a href="laporan.php"><button class="btn btn-primary align-items-center btn-wth-icon icon-wthot-bg btn-rounded icon-right btn-lg mx-auto d-block">
									<span class="btn-text">Ke halaman laporan</span> <span class="icon-label"><i class="zmdi zmdi-arrow-right"></i>
								</button></a>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="Kategori" role="tabpanel" aria-labelledby="Kategori">
						<table id="tableDash3" class="table w-100 pb-30">
							<thead>
								<tr>
									<th>No.</th>
									<th>Kategori</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$hasil = $lihat->kategori();
								$no = 1;
								foreach ($hasil as $isi) {
								?>
									<tr>
										<td><?php echo $no; ?>.</td>
										<td><?php echo $isi['nama_kategori']; ?></td>
										<td><a href="kategori.php?uid=<?php echo $isi['id_kategori']; ?>"><button class="btn btn-sm btn-warning"><i class="zmdi zmdi-edit"></i> Edit</button></a>
											<a href="#" onclick="javascript:return confirm('Hapus?');"><button class="btn btn-sm btn-danger"><i class="zmdi zmdi-delete"></i> Hapus</button></a>
										</td>
									<?php $no++;
								} ?>
									</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<script src="vendors/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Fancy Dropdown JS -->
<script src="dist/js/dropdown-bootstrap-extended.js"></script>

<!-- Counter Animation JavaScript -->
<script src="vendors/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="vendors/jquery.counterup/jquery.counterup.min.js"></script>

<!-- Data Table JavaScript -->
<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="dist/js/dataTables-data.js"></script>
<!-- Init JavaScript -->
<script src="dist/js/init.js"></script>
</body>