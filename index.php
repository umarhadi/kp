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
	
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
	
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<div class="hk-wrapper hk-alt-nav">
		<!-- mulai bar navigasi-->
		<nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar hk-navbar-alt">
			<a class="navbar-toggle-btn nav-link-hover navbar-toggler" href="javascript:void(0);" data-toggle="collapse" data-target="#navbarCollapseAlt" aria-controls="navbarCollapseAlt" aria-expanded="false" aria-label="Toggle navigation"><span class="feather-icon"><i data-feather="menu"></i></span></a>
			<a class="navbar-brand" href="dashboard1.html">
                <h5 class="brand-img d-inline-block align-top"><?php echo $toko['nama_toko']?></h5>
            </a>
			<div class="collapse navbar-collapse" id="navbarCollapseAlt">
				<ul class="navbar-nav">
					<li class="nav-item show-on-hover active">
						<a href="#" class="nav-link"><i class="zmdi zmdi-home"></i> Dashboard</a>
					</li>
					<li class="nav-item show-on-hover">
						<a href="#" class="nav-link"><i class="zmdi zmdi-money-box"></i> Transaksi Kasir</a>
					</li>
					<li class="nav-item dropdown show-on-hover">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-collection-text"></i> Barang</a>
                        <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <a class="dropdown-item" href="dashboard1.html"><i class="zmdi zmdi-label-alt"></i> Kategori</a>
							<a class="dropdown-item" href="dashboard2.html"><i class="zmdi zmdi-archive"></i> Stok Barang</a>
                        </div>
                    </li>
					<li class="nav-item show-on-hover">
						<a href="#" class="nav-link"><i class="zmdi zmdi-assignment"></i> Laporan</a>
					</li>
				</ul>
			</div>
			<ul class="navbar-nav hk-navbar-content">
			<li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar">
                                    <img src="assets/img/user/<?php echo $hasil_profil['gambar']; ?>" alt="user" class="avatar-img rounded-circle">
                                </div>
                            </div>
                            <div class="media-body">
                                <span><?php echo $hasil_profil['nm_member']?><i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                        <a class="dropdown-item" href="profile.html"><i class="dropdown-icon zmdi zmdi-account"></i><span>Edit Akun</span></a>
                        <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-settings"></i><span>Pengaturan Toko</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-power"></i><span>Logout</span></a>
                    </div>
                </li>
			</ul>
		</nav>
		<!-- akhir bar navigasi-->

		<!-- mulai konten-->
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
							<div class="col-md-3">
								<div class="card card-sm">
									<a class="card-body" href="#">
										<div class="d-flex align-items-center justify-content-between">
											<div>
												<span class="d-block font-12 font-weight-500 text-dark text-uppercase mb-5">Jumlah Nama Barang</span>
												<span class="d-block display-6 font-weight-400 text-dark"><?php echo number_format($hasil_barang); ?></span>
											</div>
											<div>
												<i class="zmdi zmdi-collection-text zmdi-hc-3x text-primary"></i>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card card-sm">
									<a class="card-body" href="#">
										<div class="d-flex align-items-center justify-content-between">
											<div>
												<span class="d-block font-12 font-weight-500 text-dark text-uppercase mb-5">Sisa Semua Stok Barang</span>
												<span class="d-block display-6 font-weight-400 text-dark"><?php echo number_format($stok['jml']); ?></span>
											</div>
											<div>
												<i class="zmdi zmdi-widgets zmdi-hc-3x text-primary"></i>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card card-sm">
									<a class="card-body" href="#">
										<div class="d-flex align-items-center justify-content-between">
											<div>
												<span class="d-block font-12 font-weight-500 text-dark text-uppercase mb-5">Telah Terjual</span>
												<span class="d-block display-6 font-weight-400 text-dark"><?php echo number_format($jual['stok']); ?></span>
											</div>
											<div>
												<i class="zmdi zmdi-chart zmdi-hc-3x text-primary"></i>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card card-sm">
									<a class="card-body" href="#">
										<div class="d-flex align-items-center justify-content-between">
											<div>
												<span class="d-block font-12 font-weight-500 text-dark text-uppercase mb-5">Jumlah Kategori Barang</span>
												<span class="d-block display-6 font-weight-400 text-dark"><?php echo number_format($hasil_kategori); ?></span>
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
									<a class="d-flex align-items-center justify-content-center nav-item nav-link active" id="dash-tab-1" data-toggle="tab" href="#nav-dash-1" role="tab" aria-selected="true">
										<div class="d-flex">
											<div>
												<span class="d-block mb-5"><span class="display-4 counter-anim">16,843</span></span>
												<span class="d-block"><i class="zmdi zmdi-eye mr-10"></i>views</span>
											</div>
										</div>
									</a>
									<a class="d-flex align-items-center justify-content-center nav-item nav-link" id="dash-tab-2" data-toggle="tab" href="#nav-dash-2" role="tab" aria-selected="false">
										<div class="d-flex">
											<div>
												<span class="d-block mb-5"><span class="display-4 counter-anim">2457</span></span>
												<span class="d-block"><i class="zmdi zmdi-trending-up mr-10"></i>sales</span>
											</div>
										</div>
									</a>
									<a class="d-flex align-items-center justify-content-center nav-item nav-link" id="dash-tab-3" data-toggle="tab" href="#nav-dash-3" role="tab" aria-controls="nav-dash-3" aria-selected="false">
										<div class="d-flex">
											<div>
												<span class="d-block mb-5"><span class="display-4 counter-anim">12,726</span></span>
												<span class="d-block"><i class="zmdi zmdi-money mr-10"></i>total</span>
											</div>
										</div>
									</a>
									<a class="d-flex align-items-center justify-content-center nav-item nav-link" id="dash-tab-3" data-toggle="tab" href="#nav-dash-3" role="tab" aria-controls="nav-dash-3" aria-selected="false">
										<div class="d-flex">
											<div>
												<span class="d-block mb-5"><span class="display-4 counter-anim">12,726</span></span>
												<span class="d-block"><i class="zmdi zmdi-money mr-10"></i>total</span>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="card-body">
								<div class="tab-content" id="nav-tabContent">
									<div class="tab-pane fade show active" id="nav-dash-1" role="tabpanel" aria-labelledby="dash-tab-1">
										<div id="e_chart_11" class="echart" style="height:310px;"></div>
									</div>
									<div class="tab-pane fade" id="nav-dash-2" role="tabpanel" aria-labelledby="dash-tab-2">
										<div id="e_chart_12" class="echart" style="height:310px;"></div>
									</div>
									<div class="tab-pane fade" id="nav-dash-3" role="tabpanel" aria-labelledby="dash-tab-3">
										<div id="e_chart_13" class="echart" style="height:310px;"></div>
									</div>
									<div class="tab-pane fade" id="nav-dash-3" role="tabpanel" aria-labelledby="dash-tab-3">
										<div id="e_chart_13" class="echart" style="height:310px;"></div>
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

	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	<script src="dist/js/dashboard3-data.js"></script>
</body>
