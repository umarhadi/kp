<?php
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
    <title>Mahardika Komputer</title>
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
                    <a class="navbar-brand" href="index.php">
                        <h5 class="brand-img d-inline-block align-top"><?php echo $toko['nama_toko'] ?></h5>
                    </a>
                    <div class="collapse navbar-collapse" id="navbarCollapseAlt">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" data-scroll href="#beranda">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-scroll href="#produk">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-scroll href="#faq">Pertanyaan Umum</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-scroll href="#kontak">Kontak</a>
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
        <!-- Main Content -->
        <div class="hk-pg-wrapper pt-0">
            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">

                    <!-- Preview Sec -->
                    <section id="beranda" class="bg-neon-light-5 hk-landing-sec">
                        <div class="container position-relative pt-50">
                            <div class="text-center mb-60">
                                <h1 class="font-48">Tempat Belanja Aksesoris dan Suku Cadang</h1>
                                <h4 class="mt-15 mb-15">untuk Komputer dan Laptop <span class="text-primary">#1</span> di Penajam.</h4>
                                <div>Orisinal <span class="font-11">&nbsp;&#9679;&nbsp;</span> Bergaransi</div>
                            </div>
                            <div class="hk-row text-center">
                                <?php
                                $hasil = $lihat->kategori();
                                $no = 1;
                                foreach ($hasil as $isi) {
                                ?>
                                    <div class="col-lg-6 col-sm-6">
                                        <!-- <a href="produk.php?kategori=<?php echo $isi['id_kategori']; ?>"> -->
                                            <div class="card text-white bg-gradient-royston">
                                                <div class="card-body">
                                                    <h5 class="card-title text-white display-6"><?php echo $isi['nama_kategori']; ?></h5>
                                                </div>
                                            </div>
                                        <!-- </a> -->
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </section>
                    <!-- /Preview Sec -->

                    <!-- Pages Sec -->
                    <section id="produk" class="hk-landing-sec bg-white pb-65">
                        <div class="container">
                            <h2 class="text-center">Produk <span class="text-primary">baru</span></h2>
                            <div class="hk-row mt-50 text-center">
                                <?php
                                $hasil = $lihat->barang();
                                $no = 1;
                                foreach ($hasil as $isi) {
                                ?>
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="card shadow-sm shadow-hover-lg">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <img class="d-86 rounded mb-15 mr-15" style="object-fit:cover;" src="assets/img/barang/<?php echo $isi['img']; ?>" alt="Foto <?php echo $isi['nama_barang']; ?>">
                                                    <div class="w-65">
                                                        <h6 class="mb-5"><?php echo $isi['merk']; ?> <?php echo $isi['nama_barang']; ?></h6>
                                                        <span class="text-truncate d-inline-block" style="max-width: 100%;"><?php echo $isi['deskripsi']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-muted justify-content-between">
                                                <div><span class="text-dark">IDR <?php echo number_format($isi['harga_jual']); ?>
                                                        <?php if ($isi['stok'] <=  '0') { ?>
                                                            (Stok Habis)
                                                        <?php } else { ?>
                                                            (<?php echo $isi['stok']; ?> Stok Tersisa)
                                                        <?php } ?>
                                                    </span></div>
                                                <?php if ($isi['stok'] <=  '0') { ?>
                                                    <button class="btn btn-xs btn-success ml-15 w-sm-100p disabled">Detail</a>
                                                    <?php } else { ?>
                                                        <a href="produk/detail.php?barang=<?php echo $isi['id_barang']; ?>" class="btn btn-xs btn-success ml-15 w-sm-100p">Detail</a>
                                                    <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <h2 class="text-center mt-40">Lihat semua <a href="produk.php">Produk</a></h2>
                        </div>
                    </section>
                    
                    <!-- Faq Sec -->
                    <section id="faq" class="hk-landing-sec pb-25">
                        <div class="container">
                            <h2 class="mb-10">Pertanyaan Umum</h2>
                            <div class="mt-50">
                                <div class="row">
                                    <div class="col-sm-6 mb-55">
                                        <h5 class="mb-15">Bagaimana cara beli?</h5>
                                        <p>Pilih produk yang ingin dibeli pada section <a data-scroll href="#produk"> Produk</a>, lalu klik Detail. Untuk menampilkan semua produk, bisa klik bagian <a href="produk.php">Lihat semua Produk</a>.<br> Anda juga bisa menggunakan fitur Cari pada bagian Bar Navigasi di atas.</p>
                                    </div>
                                    <!-- <div class="col-sm-6 mb-55">
                                        <h5 class="mb-15">What does support include?</h5>
                                        <p>ssasd</p>
                                    </div>
                                    <div class="col-sm-6 mb-55">
                                        <h5 class="mb-15">What's not covered by support?</h5>
                                        <p>Individual customization requests are not supported, but we tend to advise and show direction on such requests. Also server side implementation and backend integration issues are not covered since Mintos is an HTML template with front-end support.</p>
                                    </div>
                                    <div class="col-sm-6 mb-55">
                                        <h5 class="mb-15">Custom Jobs</h5>
                                        <p>You are only eligible for requesting custom jobs if you have a purchase key and can only be take up after mutual agreement on the costing, based on the work involved and the availability of our team members.</p>
                                    </div>
                                    <div class="col-sm-6 mb-55">
                                        <h5 class="mb-15">A React / Angular version in future days?</h5>
                                        <p>We are currently not planning to release a react or an angular version. But collaborators are always welcome.</p>
                                    </div>
                                    <div class="col-sm-6 mb-55">
                                        <h5 class="mb-15">Will you provide RTL Support?</h5>
                                        <p>Yes. We are currently working on RTL and will be provided in the next update.</p>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- /Faq Sec -->

                    <!-- Adv Sec -->
                    <section id="kontak" class="hk-landing-sec">
                        <div class="container">
                            <!-- Row -->
                            <div class="row">
                                <div class="col-xl-12 pa-0">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-10 mt-10">Kontak</h3>
                                        </div>
                                        <div class="card-body">
                                            <p>
                                                <i class="zmdi zmdi-pin"></i>
                                                <span class="text-bold">Jl. Propinsi KM 18, Kel. Petung, Kec. Penajam, Penajam Paser Utara, Kalimantan Timur</span>
                                                <br>
                                                <i class="zmdi zmdi-phone"></i>
                                                <span class="text-bold">+62 812 877123773</span>
                                                <br>
                                            </p>
                                        </div>
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.698623666607!2d116.6600129142544!3d-1.3574424360895716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df13dfb01c9196b%3A0x23dc59c68d949526!2sMAHARDIKA%20KOMPUTER!5e0!3m2!1sen!2sid!4v1627976369136!5m2!1sen!2sid" height="700" width="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                    </div>
                                </div>
                            </div>
                            <!-- /Row -->
                        </div>
                    </section>
                    <!-- /Adv Sec -->
                </div>
            </div>
            <!-- /Row -->

            <!-- Footer -->
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