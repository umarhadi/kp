<?php
error_reporting(0);
require 'config.php';
include $view;
$lihat = new view($config);
$toko = $lihat->toko();
$hasil_barang = $lihat->barang_row();
$hasil_kategori = $lihat->kategori_row();
$jual = $lihat->jual_row();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Produk - Mahardika Komputer</title>
    <meta name="description" content="Tempat Belanja Aksesoris dan Suku Cadang untuk Komputer dan Laptop No. 1 di Penajam." />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Lightgallery CSS -->
    <link href="assets/dist/css/lightgallery.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="assets/dist/css/style.css" rel="stylesheet" type="text/css">
    <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="60">
    <!-- Preloader -->
    <!-- <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div> -->
    <!-- /Preloader -->

    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-alt-nav hk-landing">
        <div class="fixed-top bg-white shadow-sm">
            <div class="container px-0">
                <nav class="navbar navbar-expand-xl navbar-light hk-navbar hk-navbar-alt shadow-none">
                    <a class="navbar-toggle-btn nav-link-hover navbar-toggler" href="javascript:void(0);" data-toggle="collapse" data-target="#navbarCollapseAlt" aria-controls="navbarCollapseAlt" aria-expanded="false" aria-label="Toggle navigation"><span class="feather-icon"><i data-feather="menu"></i></span></a>
                    <a class="navbar-brand" href="index.php">
                        <h5 class="brand-img d-inline-block align-top"><?php echo $toko['nama_toko'] ?></h5>
                    </a>
                    <div class="collapse navbar-collapse" id="navbarCollapseAlt">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" data-scroll href="index.php#beranda">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-scroll href="index.php#produk">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-scroll href="index.php#cara-belanja">Cara Belanja</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-scroll href="index.php#kontak">Kontak</a>
                            </li>
                        </ul>
                        <form class="navbar-search-alt" method="post" action="cari.php?barang=yes">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-search"></i></span>
                                </div>
                                <input class="form-control" type="text" name="keyword" id="keyword" placeholder="Cari" aria-label="Cari">
                            </div>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
        <div class="hk-pg-wrapper" style="min-height: 447px;">
            <!-- Container -->
            <div class="container mt-xl-50 mt-sm-30 mt-15">
                <!-- Title -->
                <div class="hk-pg-header">
                    <div>
                        <h5 class="hk-pg-title font-weight-600">Total ada <?php echo number_format($hasil_barang); ?> produk</h5>
                    </div>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hk-row">
                            <?php
                            include 'komponen/koneksi.php';
                            $batas = 2;
                            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            $data = mysqli_query($koneksi, "select barang.*, kategori.id_kategori, kategori.nama_kategori
                from barang inner join kategori on barang.id_kategori = kategori.id_kategori 
                ORDER BY id DESC");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);

                            $data_produk = mysqli_query($koneksi, "select barang.*, kategori.id_kategori, kategori.nama_kategori
                from barang inner join kategori on barang.id_kategori = kategori.id_kategori 
                ORDER BY id DESC limit $halaman_awal, $batas");
                            while ($d = mysqli_fetch_array($data_produk)) {
                            ?>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <img class="card-img-top" src="assets/img/barang/<?php echo $d['img']; ?>" width="200" height="200" style="object-fit:cover;" alt="Foto <?php echo $hasil['nama_barang']; ?>">
                                        <div class="card-header card-header-action">
                                            <h6 class="text-truncate"><?php echo $d['merk']; ?> <?php echo $d['nama_barang']; ?></h6>
                                            <?php echo $d['nama_kategori']; ?>
                                            <div class="d-flex align-items-center card-action-wrap">
                                                <div class="inline-block dropdown">
                                                    <a class="dropdown-toggle no-caret" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="ion ion-ios-more"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">Detail</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="text-truncate"><?php echo $d['deskripsi']; ?></p>
                                        </div>
                                        <div class="card-body">
                                            <div class="hk-legend-wrap mb-20">
                                                <div class="hk-legend">
                                                    <p class="display-7">IDR <?php echo number_format($d['harga_jual']); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <?php if ($d['stok'] <=  '0') { ?>
                                                (Stok Habis)
                                            <?php } else { ?>
                                                (<?php echo $d['stok']; ?> Stok Tersisa)
                                            <?php } ?>

                                            <?php if ($d['stok'] <=  '0') { ?>
                                                &nbsp;
                                            <?php } else { ?>
                                                <a href="produk/detail.php?barang=<?php echo $d['id_barang']; ?>" class="btn btn-xs btn-success ml-15 w-sm-100p">Detail</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <nav class="pagination-wrap mt-50 justify-content-center" aria-label="Pagination Produk">
                    <ul class="pagination custom-pagination pagination-rounded pagination-simple">
                        <a class="page-link" <?php if ($halaman > 1) {
                                                    echo "href='?halaman=$previous'";
                                                } ?>>Sebelumnya</a>
                        <?php
                        for ($x = 1; $x <= $total_halaman; $x++) {
                        ?>
                            <li class="page-item"><a class="page-link" onclick="reloadData('<?php echo $x ?>')" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                        <?php
                        }
                        ?>
                        <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                    echo "href='?halaman=$next'";
                                                } ?>>Selanjutnya</a>
                    </ul>
                    <script>
                        $("li.page-item").click(function(e) {
                            $(this).addClass("active").siblings().removeClass("active")
                            alert($(this).find("1").text()) // do your ajax.
                        })
                    </script>
                </nav>
            </div>

        </div>
        <!-- /Container -->


        <div class="hk-footer-wrap container">
            <footer class="footer">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <p>Mahardika Komputer® is another thing from<a href="https://polywork.umarhadi.dev/" class="text-dark" target="_blank">Umar Hadi Siswanto</a></p>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <p class="d-inline-block">&copy; 2021 Mahardika Komputer</p>
                        <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-facebook"></i></span></a>
                        <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-twitter"></i></span></a>
                        <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-google-plus"></i></span></a>
                    </div>
                </div>
            </footer>
        </div>
        <!-- /Footer -->
    </div>
    <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="assets/vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Owl JavaScript -->
    <script src="assets/vendors/owl.carousel/dist/owl.carousel.min.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="assets/dist/js/feather.min.js"></script>

    <!-- Gallery JavaScript -->
    <script src="assets/vendors/lightgallery/dist/js/lightgallery-all.min.js"></script>
    <script src="assets/dist/js/froogaloop2.min.js"></script>

    <!-- Init JavaScript -->
    <script src="assets/dist/js/lightgallery-all.js"></script>
    <script src="assets/dist/js/home-data.js"></script>
    <script src="assets/dist/js/init.js"></script>


</body>

</html>