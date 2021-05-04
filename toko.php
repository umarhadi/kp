<?php
@ob_start();
session_start();

if (!empty($_SESSION['admin'])) {
    require 'config.php';
    include $view;

    include 'komponen/header.php';
} else {
    echo '<script>window.location="login.php";</script>';
}
?>
<title>Toko - CV. Mahardika Komputer</title>
<div class="hk-pg-wrapper">
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page">Toko</li>
        </ol>
    </nav>
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <div class="hk-pg-header mb-1">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10"><i class="zmdi zmdi-pin"></i>&nbsp;Toko</h2>
                <?php if (isset($_GET['berhasil'])) { ?>
                    <div class="alert alert-success">
                        <p>Berhasil perbarui data</p>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="fungsi/edit/edit.php?pengaturan=ubah">
                    <div class="form-group">
                        <label class="control-label mb-10">Nama toko</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-home"></i></span>
                            </div>
                            <input name="namatoko" type="text" class="form-control" value="<?php echo $toko['nama_toko']; ?>" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-10">Alamat toko</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-pin-drop"></i></span>
                            </div>
                            <input name="alamat" type="text" class="form-control" value="<?php echo $toko['alamat_toko']; ?>" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-10">No. telepon</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                            </div>
                            <input name="kontak" type="number" class="form-control" value="<?php echo $toko['tlp']; ?>" required="required">
                        </div>
                    </div>
                    <input type="hidden" name="pemilik" value="<?php echo $toko['nama_pemilik']; ?>">
                    <button type="submit" class="btn btn-primary mr-10">Perbarui</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="dist/js/dropdown-bootstrap-extended.js"></script>
<script src="dist/js/init.js"></script>
</body>