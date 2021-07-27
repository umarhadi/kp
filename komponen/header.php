<?php
$id = $_SESSION['admin']['id_member'];
$lihat = new view($config);
$toko = $lihat->toko();
$hasil_profil = $lihat->member_edit($id);
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

    <meta content="Umar Hadi Siswanto" name="author" />

    <link href="vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />

    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="preloader-it">
        <div class="loader-pendulums"></div>
</div>
    <div class="hk-wrapper hk-alt-nav">
        <!-- mulai bar navigasi-->
        <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar hk-navbar-alt ">
            <a class="navbar-toggle-btn nav-link-hover navbar-toggler" href="javascript:void(0);" data-toggle="collapse" data-target="#navbarCollapseAlt" aria-controls="navbarCollapseAlt" aria-expanded="false" aria-label="Toggle navigation">
                <i class="zmdi zmdi-menu"></i></a>
            <a class="navbar-brand" href="index.php">
                <h5 class="brand-img d-inline-block align-top"><?php echo $toko['nama_toko'] ?></h5>
            </a>
            <div class="collapse navbar-collapse" id="navbarCollapseAlt">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a href="index.php" class="nav-link"><i class="zmdi zmdi-home"></i> Dashboard</a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-collection-text"></i> Transaksi</a>
                        <div class="dropdown-menu" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                            <a class="dropdown-item " href="transaksi-offline.php"><i class="zmdi zmdi-money-box"></i> Transaksi Offline</a>
                            <a class="dropdown-item " href="transaksi-online.php"><i class="zmdi zmdi-archive"></i> Transaksi Online</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-collection-text"></i> Barang</a>
                        <div class="dropdown-menu" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                            <a class="dropdown-item " href="kategori.php"><i class="zmdi zmdi-label-alt"></i> Kategori</a>
                            <a class="dropdown-item " href="barang.php"><i class="zmdi zmdi-archive"></i> Stok Barang</a>
                        </div>
                    </li>
                    <li class="nav-item show-on-hover">
                        <a href="laporan.php" class="nav-link active"><i class="zmdi zmdi-assignment"></i> Laporan</a>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav hk-navbar-content">
                <li class="nav-item dropdown dropdown-authentication ">
                    <a class="nav-link dropdown-toggle no-caret " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar">
                                    <img src="assets/img/user/<?php echo $hasil_profil['gambar']; ?>" alt="user" class="avatar-img rounded-circle">
                                </div>
                            </div>
                            <div class="media-body">
                                <span><?php echo $hasil_profil['nm_member'] ?><i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                        <a class="dropdown-item" href="akun.php"><i class="dropdown-icon zmdi zmdi-account"></i><span>Akun</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php"><i class="dropdown-icon zmdi zmdi-power"></i><span>Logout</span></a>
                    </div>
                </li>
            </ul>
        </nav>