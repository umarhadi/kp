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
	include 'komponen/header.php';

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

<div class="hk-pg-wrapper">
	<div class="container mt-xl-50 mt-sm-30 mt-15">
		<div class="hk-pg-header mb-1">
			<div>
				<h2 class="hk-pg-title font-weight-600 mb-10">Dashboard</h2>
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
							<a href='index.php?page=barang&stok=yes'><span class='text-primary'>Tabel Barang</span></a>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							</button>
							</div>";
				}
				?>
			</div>
		</div>

		<div class="row">
			<div class="col-xl-12">
				<div class="hk-row">
					<div class="col-md-4">
						<div class="card card-sm">
							<a class="card-body" href="#">
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<span class="d-block font-12 font-weight-500 text-dark text-uppercase mb-5">Modal</span>
										Rp.<span class="d-block display-6 font-weight-400 text-dark counter-anim">54,450.000</span>
									</div>
									<div>
										<i class="zmdi zmdi-widgets zmdi-hc-3x text-primary"></i>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-sm">
							<a class="card-body" href="#">
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<span class="d-block font-12 font-weight-500 text-dark text-uppercase mb-5">Keuntungan</span>
										Rp.<span class="d-block display-6 font-weight-400 text-dark counter-anim">14,375.000</span>
									</div>
									<div>
										<i class="zmdi zmdi-chart zmdi-hc-3x text-primary"></i>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-sm">
							<a class="card-body" href="#">
								<div class="d-flex align-items-center justify-content-between">
									<div>
										<span class="d-block font-12 font-weight-500 text-dark text-uppercase mb-5">Total Belanja Toko</span>
										Rp.<span class="d-block display-6 font-weight-400 text-dark counter-anim">54,450.000</span>
									</div>
									<div>
										<i class="zmdi zmdi-label zmdi-hc-3x text-primary"></i>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card hk-dash-type-1 overflow-hide">
			<div class="card-header pa-0">
				<div class="nav nav-tabs nav-light nav-justified" id="dash-tab" role="tablist">
					<a class="d-flex align-items-center justify-content-center nav-item nav-link active" id="dash-tab-1" data-toggle="tab" href="#NamaBarang" role="tab" aria-selected="true">
						<div class="d-flex">
							<div>
								<span class="d-block mb-5"><span class="display-4 counter-anim"><?php echo number_format($hasil_barang); ?></span></span>
								<span class="d-block"><i class="zmdi zmdi-collection-text mr-10"></i>Nama Barang</span>
							</div>
						</div>
					</a>
					<a class="d-flex align-items-center justify-content-center nav-item nav-link" id="dash-tab-2" data-toggle="tab" href="#Stok" role="tab" aria-selected="false">
						<div class="d-flex">
							<div>
								<span class="d-block mb-5"><span class="display-4 counter-anim"><?php echo number_format($stok['jml']); ?></span></span>
								<span class="d-block"><i class="zmdi zmdi-trending-up mr-10"></i>Stok Barang Tersisa</span>
							</div>
						</div>
					</a>
					<a class="d-flex align-items-center justify-content-center nav-item nav-link" id="dash-tab-3" data-toggle="tab" href="#Terjual" role="tab" aria-selected="false">
						<div class="d-flex">
							<div>
								<span class="d-block mb-5"><span class="display-4 counter-anim"><?php echo number_format($jual['stok']); ?></span></span>
								<span class="d-block"><i class="zmdi zmdi-money mr-10"></i>Barang Telah Terjual</span>
							</div>
						</div>
					</a>
					<a class="d-flex align-items-center justify-content-center nav-item nav-link" id="dash-tab-3" data-toggle="tab" href="#Kategori" role="tab" aria-selected="false">
						<div class="d-flex">
							<div>
								<span class="d-block mb-5"><span class="display-4 counter-anim"><?php echo number_format($hasil_kategori); ?></span></span>
								<span class="d-block"><i class="zmdi zmdi-money mr-10"></i>Kategori Barang</span>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="card-body">
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="NamaBarang" role="tabpanel" aria-labelledby="NamaBarang">
						<div class="table-wrap">
							<table id="tableDash1" class="table table-hover w-100 display pb-30">
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
											<td><a href="#"><button class="btn btn-warning">Edit</button></a>
												<a href="#" onclick="javascript:return confirm('Hapus?');"><button class="btn btn-danger">Hapus</button></a>
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
							<table id="tableDash2" class="table table-hover w-100 display pb-30">
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
											<td><a href="#"><button class="btn btn-warning">Edit</button></a>
												<a href="#" onclick="javascript:return confirm('Hapus?');"><button class="btn btn-danger">Hapus</button></a>
											</td>
										<?php $no++;
									} ?>
										</tr>
								</tbody>
								<tfoot>
									<tr>
										<th>&nbsp;</th>
										<th>Total</th>
										<th><?php echo $hasilhtg; ?></th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<div class="tab-pane fade " id="Terjual" role="tabpanel" aria-labelledby="Terjual">
						<div class="table-wrap">
							<div class="table-wrap">
								<button class="btn btn-dark align-items-center btn-wth-icon icon-wthot-bg btn-rounded icon-right btn-lg"><span class="btn-text">Ke halaman laporan</span> <span class="icon-label"><span class="feather-icon"><i data-feather="arrow-right"></i></span> </span>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="Kategori" role="tabpanel" aria-labelledby="Kategori">
						<table id="tableDash3" class="table table-hover w-100 display pb-30">
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
										<td><a href="#"><button class="btn btn-warning">Edit</button></a>
											<a href="#" onclick="javascript:return confirm('Hapus?');"><button class="btn btn-danger">Hapus</button></a>
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

<!-- Slimscroll JavaScript -->
<script src="dist/js/jquery.slimscroll.js"></script>

<!-- Fancy Dropdown JS -->
<script src="dist/js/dropdown-bootstrap-extended.js"></script>

<!-- FeatherIcons JavaScript -->
<script src="dist/js/feather.min.js"></script>

<!-- Toggles JavaScript -->
<script src="vendors/jquery-toggles/toggles.min.js"></script>
<script src="dist/js/toggle-data.js"></script>

<!-- Counter Animation JavaScript -->
<script src="vendors/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="vendors/jquery.counterup/jquery.counterup.min.js"></script>

<!-- Easy pie chart JS -->
<script src="vendors/easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

<!-- Sparkline JavaScript -->
<script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="vendors/raphael/raphael.min.js"></script>
<script src="vendors/morris.js/morris.min.js"></script>

<!-- EChartJS JavaScript -->
<script src="vendors/echarts/dist/echarts-en.min.js"></script>

<!-- Peity JavaScript -->
<script src="vendors/peity/jquery.peity.min.js"></script>

<!-- Data Table JavaScript -->
<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="vendors/jszip/dist/jszip.min.js"></script>
<script src="vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="dist/js/dataTables-data.js"></script>

<!-- Init JavaScript -->
<script src="dist/js/init.js"></script>
<script src="dist/js/dashboard3-data.js"></script>
</body>