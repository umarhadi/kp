<?php
require 'config.php';
include $view;
$lihat = new view($config);
$toko = $lihat->toko();
$id = $_GET['barang'];
$hasil = $lihat->barang_edit($id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $hasil['nama_barang']; ?></title>
    <meta name="description" content="Beli <?php echo $hasil['nama_barang']; ?>." />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Lightgallery CSS -->
    <link href="../assets/dist/css/lightgallery.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="../assets/dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
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
                                <a class="nav-link active" data-scroll href="../">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-scroll href="../index.php#produk">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-scroll href="../index.php#cara-belanja">Cara Belanja</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-scroll href="../index.php#kontak">Kontak</a>
                            </li>
                        </ul>
                        <div class="navbar-search-alt">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-search"></i></span>
                                </div>

                                <input class="form-control" type="text" name="cari" id="cari" placeholder="Cari" aria-label="Cari">

                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="hk-pg-wrapper">
            <div class="container mt-md-30 mt-15">
                <div class="hk-pg-header mb-1">
                    <div>
                        <h2 class="hk-pg-title font-weight-300 mb-10"><i class="zmdi zmdi-info"></i>&nbsp;<?php echo $hasil['nama_barang']; ?></h2>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-30">
                                    <div class="card-img card-img-bg rounded text-white shadow-sm shadow-hover-lg" style="background-image: url(../assets/img/barang/<?php echo $hasil['img']; ?>);">
                                        <div class="card-img-overlay text-white bg-trans-dark-90">
                                            <div class="card-body text-center">
                                                <a href="../assets/img/barang/<?php echo $hasil['img']; ?>" target="_blank" alt="Lihat ukuran penuh"><img class="card-img-top img-fluid rounded" src="../assets/img/barang/<?php echo $hasil['img']; ?>" style="width:200px;" alt="foto barang"></a>
                                            </div>
                                            <div class="card-footer">
                                                Bagikan ke &nbsp;
                                                <button class="btn btn-icon btn-icon-circle btn-indigo btn-icon-style-2"><span class="btn-icon-wrap"><i class="zmdi zmdi-facebook"></i></span></button>&nbsp;
                                                <button class="btn btn-icon btn-icon-circle btn-sky btn-icon-style-2"><span class="btn-icon-wrap"><i class="zmdi zmdi-twitter"></i></span></button>&nbsp;
                                                <button class="btn btn-icon btn-icon-circle btn-blue btn-icon-style-2"><span class="btn-icon-wrap"><i class="zmdi zmdi-linkedin"></i></span></button>&nbsp;
                                                <button class="btn btn-icon btn-icon-circle btn-purple btn-icon-style-2"><span class="btn-icon-wrap"><i class="zmdi zmdi-instagram"></i></span></button>&nbsp;
                                                <button class="btn btn-icon btn-icon-circle btn-green btn-icon-style-2"><span class="btn-icon-wrap"><i class="zmdi zmdi-whatsapp"></i></span></button>&nbsp;
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-30">
                                    <div class="card">
                                        <div class="card-img card-img-bg rounded text-white shadow-sm shadow-hover-lg" style="background-image: url(../assets/img/barang/<?php echo $hasil['img']; ?>);">
                                            <div class="card-img-overlay text-white bg-trans-dark-90">
                                                <h3 class="card-title text-white font-weight-bold"><?php echo $hasil['nama_barang']; ?></h3>
                                                <p class="card-text"><b>Kategori:</b> <a href="../produk.php?kategori=<?php echo $hasil['nama_kategori']; ?>"><span class="badge badge-info"><?php echo $hasil['nama_kategori']; ?></span></a></p>
                                                <span class="card-text text-white h3">IDR <?php echo number_format($hasil['harga_jual']); ?></span>/<?php echo $hasil['satuan_barang']; ?><br>
                                                <p class="card-text text-white text-truncate"><?php echo $hasil['deskripsi']; ?></p>
                                                <div class="card-footer">
                                                    <button class="btn btn-info btn-wth-icon btn-lg"> <span class="icon-label"><span class="feather-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                                                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                                                </svg></span> </span><span class="btn-text">Beli </span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6 col-sm-12 mb-30">
                                    <div class="card">
                                        <div class="card-header card-header-action">
                                            <h6>Ratings &amp; Reviews</h6>
                                            <div class="d-flex align-items-center card-action-wrap">
                                                <button class="btn btn-info btn-sm disabled">Berikan Ulasan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="d-flex align-items-center h-100 justify-content-center text-center">
                                                    <div>
                                                        <div class="d-flex align-items-center  justify-content-center text-dark">
                                                            <span class="counter-anim display-2">4.4</span>
                                                            <span class="review-star starred ml-10">
                                                                <span class="feather-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                    </svg></span>
                                                            </span>
                                                        </div>
                                                        <span class="font-18">949 ratings &amp; 18 reviews</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="progress-wrap lb-side-left mt-5">
                                                    <div class="progress-lb-wrap mb-10">
                                                        <label class="progress-label mnw-50p">5.0<i class="zmdi zmdi-star text-light-20 ml-5"></i></label>
                                                        <div class="progress progress-bar-rounded progress-bar-xs">
                                                            <div class="progress-bar bg-primary w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="progress-lb-wrap mb-10">
                                                        <label class="progress-label mnw-50p">4.0<i class="zmdi zmdi-star text-light-20 ml-5"></i></label>
                                                        <div class="progress progress-bar-rounded progress-bar-xs">
                                                            <div class="progress-bar bg-brown-light-1 w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="progress-lb-wrap mb-10">
                                                        <label class="progress-label mnw-50p">3.0<i class="zmdi zmdi-star text-light-20 ml-5"></i></label>
                                                        <div class="progress progress-bar-rounded progress-bar-xs">
                                                            <div class="progress-bar bg-brown-light-2 w-65" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="progress-lb-wrap mb-10">
                                                        <label class="progress-label mnw-50p">2.0<i class="zmdi zmdi-star text-light-20 ml-5"></i></label>
                                                        <div class="progress progress-bar-rounded progress-bar-xs">
                                                            <div class="progress-bar bg-brown-light-3 w-55" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="progress-lb-wrap mb-10">
                                                        <label class="progress-label mnw-50p">1.0<i class="zmdi zmdi-star text-light-20 ml-5"></i></label>
                                                        <div class="progress progress-bar-rounded progress-bar-xs">
                                                            <div class="progress-bar bg-danger w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
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

</html>