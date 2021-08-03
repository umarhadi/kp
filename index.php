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
                    <a class="navbar-brand" href="dashboard1.html">
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
                                <a class="nav-link" data-scroll href="#cara-belanja">Cara Belanja</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-scroll href="#kontak">Kontak</a>
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
                                <div class="col-lg-6 col-sm-6">
                                    <a href="dashboard1.html" target="_blank">
                                        <div class="card shadow-hover">
                                            <img class="card-img-top" src="assets/img/landing-pg/herodemo1.png" alt="Card image cap">
                                            <div class="card-footer text-dark">
                                                CRM
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <a href="dashboard2.html" target="_blank">
                                        <div class="card shadow-hover">
                                            <img class="card-img-top" src="assets/img/landing-pg/herodemo2.png" alt="Card image cap">
                                            <div class="card-footer text-dark">
                                                Project
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <a href="dashboard3.html" target="_blank">
                                        <div class="card shadow-hover">
                                            <img class="card-img-top" src="assets/img/landing-pg/herodemo3.png" alt="Card image cap">
                                            <div class="card-footer text-dark">
                                                Statistics
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <a href="dashboard4.html" target="_blank">
                                        <div class="card shadow-hover">
                                            <img class="card-img-top" src="assets/img/landing-pg/herodemo4.png" alt="Card image cap">
                                            <div class="card-footer text-dark">
                                                Classic
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- /Preview Sec -->

                    <!-- Design Sec -->
                    <section class="hk-landing-sec pb-50">
                        <div class="container">
                            <h2 class="text-center">Designed and developed <span class="text-primary">for developers.</span></h2>
                            <div class="row mt-50 text-center">
                                <div class="col-lg-4 mb-30">
                                    <h5 class="mb-20">
                                        <span class="d-flex align-items-center justify-content-center">
                                            <span class="feather-icon text-primary mr-15"><i data-feather="layout"></i></span>Flexible Framework
                                        </span>
                                    </h5>
                                    <p>A Bootstrap 4.3.X & Sass based solid core and well-architected framework works for all screens and modern browsers. You can easily be able to develop limitless customized projects.</p>
                                </div>
                                <div class="col-lg-4 mb-30">
                                    <h5 class="mb-20">
                                        <span class="d-flex align-items-center justify-content-center">
                                            <span class="feather-icon text-success mr-15"><i data-feather="code"></i></span>Code Structure
                                        </span>
                                    </h5>
                                    <p>HTML5 validated clean code is focused - keeping it simple and orderly. Every function, class, module exposes a single-minded attitude to remain entirely undistracted.</p>
                                </div>
                                <div class="col-lg-4 mb-30">
                                    <h5 class="mb-20">
                                        <span class="d-flex align-items-center justify-content-center">
                                            <span class="feather-icon text-purple mr-15"><i data-feather="fast-forward"></i></span>Boost Up Speed
                                        </span>
                                    </h5>
                                    <p>A ton of pre-built material that will genuinely improve D2D process ten folds, allowing Front-End Developrers to nerd out on actually building stuff, rather than editing pixel distances.</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- /Design Sec -->

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
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <img class="d-86 rounded mb-15 mr-15" src="assets/img/landing-pg/emailapp.png" alt="thumb">
                                                    <div class="w-65">
                                                        <h6 class="mb-5"><span class="text-primary"><?php echo $isi['merk']; ?></span> - <?php echo $isi['nama_barang']; ?></h6>
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-muted justify-content-between">
                                                <div><span class="text-dark">IDR<?php echo number_format($isi['harga_jual']); ?></span></div>
                                                <button class="btn btn-xs btn-success ml-15 w-sm-100p">Detail</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <h2 class="text-center mt-40">Lihat semua <a href="produk.php">Produk</a></h2>
                        </div>
                    </section>
                    <!-- /Pages Sec -->

                    <!-- Tech Sec -->
                    <section class="hk-landing-sec pb-50">
                        <div class="container">
                            <div class="row">
                                <div class="d-flex align-items-center col-lg-5 mb-30">
                                    <img class="img-fluid" src="assets/img/landing-pg/technologo.png" alt="Mintos" />
                                </div>
                                <div class="col-lg-7">
                                    <h2>Powerful yet easy-to-use framework built with <span class="text-primary">Bootstrap 4.3.1</span></h2>
                                    <div class="row mt-50">
                                        <div class="col-sm-6 mb-30">
                                            <h5 class="mb-20">
                                                Bootstrap 4.3.1
                                            </h5>
                                            <p>Mintos is built with the world's most popular front-end component library with custom css and components.</p>
                                        </div>
                                        <div class="col-sm-6 mb-30">
                                            <h5 class="mb-20">
                                                Preprocessor - Sass
                                            </h5>
                                            <p>Built with Sass following a completely modular approach. Easy to understand, light weight and extendible.</p>
                                        </div>
                                        <div class="col-sm-6 mb-30">
                                            <h5 class="mb-20">
                                                NPM - Node js
                                            </h5>
                                            <p>NPM manages project dependencies by compiling open source libraries of reusable code in seconds.</p>
                                        </div>
                                        <div class="col-sm-6 mb-30">
                                            <h5 class="mb-20">
                                                Jquery 3.3.1
                                            </h5>
                                            <p>Simplified HTML document traversing, event handling, and animating for rapid web development.</p>
                                        </div>
                                        <div class="col-sm-6 mb-30">
                                            <h5 class="mb-20">
                                                Powerful CLI - Grunt
                                            </h5>
                                            <p>A task automation tool. Compile and do changes with the introduced grunt command line interface.</p>
                                        </div>
                                        <div class="col-sm-6 mb-30">
                                            <h5 class="mb-20">
                                                API Usage
                                            </h5>
                                            <p>Google maps are built using updated API. Mintos also supports twitter to show live feeds.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- /Tech Sec -->

                    <!-- Apps Sec -->
                    <section id="cara-belanja" class="hk-landing-sec bg-white pb-65">
                        <div class="container">
                            <h2 class="text-center">Apps are designed considering <span class="text-primary">UX</span> in mind.</h2>
                            <div class="hk-row mt-50 text-center">
                                <div class="col-md-6 col-sm-12">
                                    <a href="chats.html" target="_blank">
                                        <div class="card shadow-hover">
                                            <img class="card-img-top" src="assets/img/landing-pg/chatapp.png" alt="Card image cap">
                                            <div class="card-footer text-dark">
                                                Chats
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <a href="email.html" target="_blank">
                                        <div class="card shadow-hover">
                                            <img class="card-img-top" src="assets/img/landing-pg/emailapp.png" alt="Card image cap">
                                            <div class="card-footer text-dark">
                                                Email
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <a href="calendar.html" target="_blank">
                                        <div class="card shadow-hover">
                                            <img class="card-img-top" src="assets/img/landing-pg/calenderapp.png" alt="Card image cap">
                                            <div class="card-footer text-dark">
                                                Calendar
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <a href="file-manager.html">
                                        <div class="card shadow-hover">
                                            <div class="card-img position-relative">
                                                <img class="card-img-top d-block" src="assets/img/landing-pg/fileuploadapp.png" alt="Card image cap">
                                            </div>
                                            <div class="card-footer text-dark">
                                                File Manager
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Apps Sec -->

                    <!-- Utilities Sec -->
                    <section class="hk-landing-sec pb-35">
                        <div class="container">
                            <h2 class="text-center">Smooth<span class="text-primary"> realtime collaboration</span> of UI Components and advanced functionality to your web applications.</h2>
                            <div class="row mt-50">
                                <div class="col-lg-3 col-sm-6 mb-45">
                                    <h5 class="mb-20">
                                        <span class="d-flex align-items-center">
                                            <span class="feather-icon text-pink mr-15"><i data-feather="underline"></i></span>
                                            Utilities
                                        </span>
                                    </h5>
                                    <p>Easy styling with spacing, sizing, backgrounds, shadows and many more utilities.</p>
                                </div>
                                <div class="col-lg-3 col-sm-6 mb-45">
                                    <h5 class="mb-20">
                                        <span class="d-flex align-items-center">
                                            <span class="feather-icon text-teal mr-15"><i data-feather="type"></i></span>
                                            Typography
                                        </span>
                                    </h5>
                                    <p>The Typography, includes global settings, headings, body text, lists, responsive typography and more.</p>
                                </div>
                                <div class="col-lg-3 col-sm-6 mb-45">
                                    <h5 class="mb-20">
                                        <span class="d-flex align-items-center">
                                            <span class="feather-icon text-orange mr-15"><i data-feather="command"></i></span>
                                            Colors
                                        </span>
                                    </h5>
                                    <p>Play around contextual colors, 20+ base colors, 230+ color shades and many gradient color options.</p>
                                </div>
                                <div class="col-lg-3 col-sm-6 mb-45">
                                    <h5 class="mb-20">
                                        <span class="d-flex align-items-center">
                                            <span class="feather-icon text-primary mr-15"><i data-feather="info"></i></span>
                                            Icons
                                        </span>
                                    </h5>
                                    <p>Over 1500 free icons. Each icon pack includes SVG or a webfont to easily add in css and html pages.</p>
                                </div>
                                <div class="col-lg-3 col-sm-6 mb-45">
                                    <h5 class="mb-20">
                                        <span class="d-flex align-items-center">
                                            <span class="feather-icon text-green mr-15"><i data-feather="server"></i></span>
                                            Forms
                                        </span>
                                    </h5>
                                    <p>A variety of form control styles, layouts, custom components, editor, form pickers, sliders and more.</p>
                                </div>
                                <div class="col-lg-3 col-sm-6 mb-45">
                                    <h5 class="mb-20">
                                        <span class="d-flex align-items-center">
                                            <span class="feather-icon text-red mr-15"><i data-feather="list"></i></span>
                                            Tables
                                        </span>
                                    </h5>
                                    <p>Add advance interaction controls like search, pagination & selectors, export using exclusive Data table.</p>
                                </div>
                                <div class="col-lg-3 col-sm-6 mb-45">
                                    <h5 class="mb-20">
                                        <span class="d-flex align-items-center">
                                            <span class="feather-icon text-pumpkin mr-15"><i data-feather="pie-chart"></i></span>
                                            Charts
                                        </span>
                                    </h5>
                                    <p>Interactive charts, complex charts, realtime data charts, pie & donut charts and more.</p>
                                </div>
                                <div class="col-lg-3 col-sm-6 mb-45">
                                    <h5 class="mb-20">
                                        <span class="d-flex align-items-center">
                                            <span class="feather-icon text-violet mr-15"><i data-feather="map"></i></span>
                                            Maps
                                        </span>
                                    </h5>
                                    <p>Vector and google maps integration for location hierarchies, basic map view, and key mapping features.</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- /Utilities Sec -->

                    <!-- Features Sec -->
                    <section id="features_sec" class="hk-landing-sec bg-grey-light-5 pb-65">
                        <div class="container text-center">
                            <h2 class="mb-10"><span class="text-primary">Unlimited</span> features</h2>
                            <div class="row justify-content-center mt-50">
                                <div class="feature-block">
                                    <div class="card">
                                        <img class="img-fluid" src="assets/img/landing-pg/feature1.png" alt="Card image cap">
                                    </div>
                                    <div class="feature-cap">
                                        24x7 Support
                                    </div>
                                </div>
                                <div class="feature-block">
                                    <div class="card">
                                        <img class="img-fluid" src="assets/img/landing-pg/feature2.png" alt="Card image cap">
                                    </div>
                                    <div class="feature-cap">
                                        Online Documentation
                                    </div>
                                </div>
                                <div class="feature-block">
                                    <div class="card">
                                        <img class="img-fluid" src="assets/img/landing-pg/feature12.png" alt="Card image cap">
                                    </div>
                                    <div class="feature-cap">
                                        Google Maps
                                    </div>
                                </div>
                                <div class="feature-block">
                                    <div class="card">
                                        <img class="img-fluid" src="assets/img/landing-pg/feature13.png" alt="Card image cap">
                                    </div>
                                    <div class="feature-cap">
                                        Twitter Feed Jquery
                                    </div>
                                </div>
                                <div class="feature-block">
                                    <div class="card">
                                        <img class="img-fluid" src="assets/img/landing-pg/feature14.png" alt="Card image cap">
                                    </div>
                                    <div class="feature-cap">
                                        Google Web Fonts
                                    </div>
                                </div>
                                <div class="feature-block">
                                    <div class="card">
                                        <img class="img-fluid" src="assets/img/landing-pg/feature15.png" alt="Card image cap">
                                    </div>
                                    <div class="feature-cap">
                                        Lightbox Gallery
                                    </div>
                                </div>
                                <div class="feature-block">
                                    <div class="card">
                                        <img class="img-fluid" src="assets/img/landing-pg/feature16.png" alt="Card image cap">
                                    </div>
                                    <div class="feature-cap">
                                        Tinymce Editor
                                    </div>
                                </div>
                                <div class="feature-block">
                                    <div class="card">
                                        <img class="img-fluid" src="assets/img/landing-pg/feature17.png" alt="Card image cap">
                                    </div>
                                    <div class="feature-cap">
                                        Date Range Picker
                                    </div>
                                </div>
                                <div class="feature-block">
                                    <div class="card">
                                        <img class="img-fluid" src="assets/img/landing-pg/feature18.png" alt="Card image cap">
                                    </div>
                                    <div class="feature-cap">
                                        Color Picker
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- /Features Sec -->

                    <!-- Faq Sec -->
                    <section id="faq_sec" class="hk-landing-sec pb-25">
                        <div class="container">
                            <h2 class="mb-10">FAQ</h2>
                            <div class="mt-50">
                                <div class="row">
                                    <div class="col-sm-6 mb-55">
                                        <h5 class="mb-15">What's your refund policy?</h5>
                                        <p>A refund or credit on a purchase is not granted unless one of the promises given by the author in section 21 has been breached, or a refund is required under the <a href="https://themeforest.net/page/customer_refund_policy" target="_blank">Envato Market Refund Rules</a>.</p>
                                    </div>
                                    <div class="col-sm-6 mb-55">
                                        <h5 class="mb-15">What does support include?</h5>
                                        <p>Our support mainly covers pre-sale questions, basic front-end development questions, bug reports and help with included 3rd party assets through our support <a href="https://hencework.ticksy.com" target="_blank">https://hencework.ticksy.com</a></p>
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
                                    </div>
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
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.698623666607!2d116.6600129142544!3d-1.3574424360895716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df13dfb01c9196b%3A0x23dc59c68d949526!2sMAHARDIKA%20KOMPUTER!5e0!3m2!1sen!2sid!4v1627976369136!5m2!1sen!2sid" height="700" width="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
                            <p>Build with 💛 and 😭 from<a href="https://polywork.umarhadi.dev/" class="text-dark" target="_blank">Umar</a> © 2021</p>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <p class="d-inline-block">Follow us</p>
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
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAinmX2eFKE-gdL1E7IBbdJCnNNnPj9JNU"></script>

</body>

</html>