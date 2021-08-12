<?php
error_reporting(0);
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
    <title>Beli <?php echo $hasil['nama_barang']; ?></title>
    <meta name="description" content="Beli <?php echo $hasil['nama_barang']; ?>." />

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
                                <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                                    <div class="card-img card-img-bg rounded text-white shadow-sm shadow-hover-lg" style="background-image: url(../assets/img/barang/<?php echo $hasil['img']; ?>);">
                                        <div class="card-img-overlay text-white bg-trans-dark-90">
                                            <div class="card-body text-center">
                                                <a href="../assets/img/barang/<?php echo $hasil['img']; ?>" target="_blank" alt="Lihat ukuran penuh"><img class="card-img-top img-fluid rounded" src="../assets/img/barang/<?php echo $hasil['img']; ?>" style="width:200px;" alt="foto barang"></a>
                                            </div>
                                            <div class="card-body">
                                                <h3 class="card-title text-white font-weight-bold"><?php echo $hasil['nama_barang']; ?></h3>
                                                <p class="card-text"><b>Kategori:</b> <a href="../produk.php?kategori=<?php echo $hasil['nama_kategori']; ?>"><span class="badge badge-info"><?php echo $hasil['nama_kategori']; ?></span></a></p>
                                                <p class="card-text"><b>Merk:</b> <a href="../produk.php?kategori=<?php echo $hasil['nama_kategori']; ?>"><span class="badge badge-success"><?php echo $hasil['merk']; ?></span></a></p>
                                                <span class="card-text text-white h3">IDR <?php echo number_format($hasil['harga_jual']); ?></span>/<?php echo $hasil['satuan_barang']; ?><br>
                                                <p class="card-text text-white text-truncate"><?php echo $hasil['deskripsi']; ?></p>
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
                                <div class="col-lg-8 col-md-8 col-sm-12 mb-30">
                                    <section class="hk-sec-wrapper">
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                $("#jumlah, #harga").keyup(function() {
                                                    var harga = $("#harga").val();
                                                    var jumlah = $("#jumlah").val();

                                                    var total = parseInt(harga) * parseInt(jumlah);
                                                    $("#total").val(total);
                                                });
                                            });
                                        </script>
                                        <h5 class="hk-sec-title">Beli <?php echo $hasil['nama_barang']; ?></h5>
                                        <p class="mb-25">Data Nama harus sesuai dengan Nama Rekening (jika pembayaran melalui transfer).</p>
                                        <div class="row">
                                            <div class="col-sm">
                                                <form action="beli.php" method="post">
                                                    <div class="row">
                                                        <div class="col-md-12 form-group">
                                                            <input type="hidden" name="id_barang" value="<?php echo $hasil['id_barang']; ?>" class="form-control">
                                                            <input type="hidden" id="harga" name="total" value="<?php echo $hasil['harga_jual']; ?>" class="form-control">
                                                            <label for="nama">Nama lengkap</label>
                                                            <input class="form-control" placeholder="Nama Lengkap" name="nama" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nohp">Nomor HP</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">+62</span>
                                                            </div>
                                                            <input class="form-control" name="no_hp" placeholder="8xxxxxxxx" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jumlah">Jumlah</label>
                                                        <div class="input-group">
                                                            <input type="text" name="jumlah" id="jumlah" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jumlah">Total Bayar</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text" id="total" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jumlah">Upload bukti transfer</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">IDR</span>
                                                            </div>
                                                            <input type="text" id="total" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <button class="btn btn-primary" type="submit">Beli</button>
                                                </form>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-30">
                                    <section class="hk-sec-wrapper">
                                        <h5 class="hk-sec-title">Cara Pembayaran</h5>
                                        <p class="mb-25">
                                        <ol class="ml-20">
                                            <li>Silahkan klik Beli dan Anda bisa membayar di toko.</li>
                                            <li>Anda bisa membayar dengan cara Transfer ke Rekening di bawah lalu silahkan mengirim bukti transfer pada form di samping.</li>
                                        </ol>
                                        </p>
                                        <p class="mb-30">
                                        <ul class="ml-30">
                                            <li>Nama Bank: <strong>DBS Indonesia</strong></li>
                                            <li>Kode Bank: <strong>046</strong></li>
                                            <li>Nama: <strong>Mahardika Komputer</strong></li>
                                            <li>Nomor Rekening: <strong>1720-3661-299</strong></li>
                                            <li>&nbsp;</li>
                                            <li>&nbsp;</li>
                                            <li><strong>Nominal sesuai dengan Total Bayar</strong></li>
                                        </ul>
                                        </p>
                                        <div class="row">
                                            <div class="col-sm">

                                            </div>
                                        </div>
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