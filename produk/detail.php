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
                                                <p class="card-text text-white"><?php echo $hasil['deskripsi']; ?></p>
                                                <div class="card-footer">
                                                    <button class="btn btn-info btn-wth-icon btn-lg"> <span class="icon-label"><span class="feather-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                                                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                                                </svg></span> </span><span class="btn-text">Beli </span></button>
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
            <div class="card hk-dash-type-1 overflow-hide">
                <div class="card-header pa-0">
                    <div class="nav nav-tabs nav-light nav-justified" id="dash-tab" role="tablist">
                        <a class="d-flex align-items-center justify-content-center nav-item nav-link active" id="dash-tab-1" data-toggle="tab" href="#Foto" role="tab" aria-selected="true">
                            <div class="d-flex">
                                <div>
                                    <span class="d-block mb-5"><span class="display-6"><i class="zmdi zmdi-image"></i> Foto Profil</span></span>

                                </div>
                            </div>
                        </a>
                        <a class="d-flex align-items-center justify-content-center nav-item nav-link" id="dash-tab-2" data-toggle="tab" href="#Profile" role="tab" aria-selected="false">
                            <div class="d-flex">
                                <div>
                                    <span class="d-block mb-5"><span class="display-6"><i class="zmdi zmdi-account"></i> Profil</span></span>
                                </div>
                            </div>
                        </a>
                        <a class="d-flex align-items-center justify-content-center nav-item nav-link" id="dash-tab-2" data-toggle="tab" href="#Password" role="tab" aria-selected="false">
                            <div class="d-flex">
                                <div>
                                    <span class="d-block mb-5"><span class="display-6"><i class="zmdi zmdi-key"></i> Login</span></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="Foto" role="tabpanel" aria-labelledby="Foto">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mx-auto d-block">
                                <div class="card-body">
                                    <div class="card bg-sky-light-4">
                                        <div class="card-body ">
                                            <img class="img-fluid circle" src="../../assets/img/user/<?php echo $hasil_profil['gambar']; ?>" style="width:200px;" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card bg-sky-light-4">
                                <div class="card-body">
                                    <form method="POST" action="fungsi/edit/edit.php?gambar=user" enctype="multipart/form-data">
                                        <input type="file" accept="image/*" name="foto">
                                        <input type="hidden" value="<?php echo $hasil_profil['gambar']; ?>" name="foto2">
                                        <input type="hidden" name="id" value="<?php echo $hasil_profil['id_member']; ?>">
                                        <span class="pull-right">
                                            <button type="submit" class="btn bg-sky-light-4 btn-sm"><i class="zmdi zmdi-upload"> Ganti Foto</i></button>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Profile" role="tabpanel" aria-labelledby="Profile">
                        <div class="row">
                            <div class="col-lg-6 mx-auto d-block">
                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <form method="POST" action="fungsi/edit/edit.php?profil=edit" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Nama</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                                                        </div>
                                                        <input name="nama" type="text" class="form-control" value="<?php echo $hasil_profil['nm_member']; ?>" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Email</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                                        </div>
                                                        <input name="email" type="email" class="form-control" value="<?php echo $hasil_profil['email']; ?>" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10">No. HP</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                                                        </div>
                                                        <input name="tlp" type="number" class="form-control" value="<?php echo $hasil_profil['telepon']; ?>" required="required">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="nik" value="<?php echo $hasil_profil['NIK']; ?>">
                                                <input type="hidden" name="alamat" value="<?php echo $hasil_profil['alamat_member']; ?>">
                                                <input type="hidden" name="id" value="<?php echo $hasil_profil['id_member']; ?>">
                                                <button type="submit" class="btn btn-primary mr-10"><i class="zmdi zmdi-edit"></i>&nbsp;Perbarui</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Password" role="tabpanel" aria-labelledby="Password">
                        <div class="row">
                            <div class="col-lg-6 mx-auto d-block">
                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <form method="POST" action="fungsi/edit/edit.php?pass=ganti-pas">
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Username</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                                                        </div>
                                                        <input name="user" type="text" class="form-control" value="<?php echo $hasil_profil['user']; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10">Password baru</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="zmdi zmdi-key"></i></span>
                                                        </div>
                                                        <input name="pass" type="password" class="form-control" value="" required>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id" value="<?php echo $hasil_profil['id_member']; ?>">
                                                <button type="submit" class="btn btn-primary mr-10"><i class="zmdi zmdi-edit"></i>&nbsp;Perbarui</button>
                                            </form>
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