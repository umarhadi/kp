<?php
error_reporting(0);
require 'config.php';
include $view;
$lihat = new view($config);
$toko = $lihat->toko();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berhasil melakukan pemesanan</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Lightgallery CSS -->
    <link href="../assets/dist/css/lightgallery.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Custom CSS -->
    <link href="../assets/dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
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
                    <a class="navbar-brand" href="../index.php">
                        <h5 class="brand-img d-inline-block align-top"><?php echo $toko['nama_toko'] ?></h5>
                    </a>
                    <div class="collapse navbar-collapse" id="navbarCollapseAlt">
                    <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" data-scroll href="../"><i class="zmdi zmdi-home"></i> Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-scroll href="../index.php#produk"><i class="zmdi zmdi-mall"></i> Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-scroll href="../index.php#faq"><i class="zmdi zmdi-help"></i> Pertanyaan Umum</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-scroll href="../index.php#kontak"><i class="zmdi zmdi-phone-in-talk"></i> Kontak</a>
                            </li>
                        </ul>
                        <form class="navbar-search-alt" method="post" action="../cari.php?barang=yes">
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
        <div class="hk-pg-wrapper">
        <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                                    <section class="hk-sec-wrapper">
                                        <h5 class="hk-sec-title">Berhasil melakukan pemesanan</h5>
                                        <p class="mb-30">
                                        <ul class="ml-30">
                                            <li>Barang berhasil dipesan</li>
                                            <li>Silahkan tunggu konfirmasi dari kami yang dikirim ke nomor WhatsApp yang telah Anda masukkan sebelumnya</li>
                                            <li>&nbsp;</li>
                                            <li>&nbsp;</li>
                                            <li>Terima kasih</li>
                                        </ul>
                                        </p>
                                    </section>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                                    <section class="hk-sec-wrapper">
                                        <p class="mb-30">
                                        <ul class="ml-30">
                                            <li>Untuk melakukan pembelian barang lainnya, silahkan <a href="../produk.php">order kembali.</a></li>
                                        </ul>
                                        </p>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hk-footer-wrap container">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p>Mahardika Komputer® is another thing from<a href="https://gh.umarhadi.dev/" class="text-dark" target="_blank">Umar Hadi Siswanto</a></p>
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
        </div>

        <script src="../assets/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../assets/vendors/popper.js/dist/umd/popper.min.js"></script>
        <script src="../assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Owl JavaScript -->
        <script src="../assets/vendors/owl.carousel/dist/owl.carousel.min.js"></script>
        <!-- FeatherIcons JavaScript -->
        <script src="../assets/dist/js/feather.min.js"></script>
        <!-- Gallery JavaScript -->
        <script src="../assets/vendors/lightgallery/dist/js/lightgallery-all.min.js"></script>
        <script src="../assets/dist/js/froogaloop2.min.js"></script>
        <!-- Init JavaScript -->
        <script src="../assets/dist/js/lightgallery-all.js"></script>
        <script src="../assets/dist/js/home-data.js"></script>
        <script src="../assets/dist/js/init.js"></script>
</body>