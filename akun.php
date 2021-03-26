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

<title>Akun - CV. Mahardika Komputer</title>
<div class="hk-pg-wrapper">
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page">Akun</li>
        </ol>
    </nav>
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <div class="hk-pg-header mb-1">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">Akun</h2>
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
                                <div class="card">
                                    <div class="card-body">
                                        <img class="img-fluid circle" src="assets/img/user/<?php echo $hasil_profil['gambar']; ?>" style="width:200px;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="fungsi/edit/edit.php?gambar=user" enctype="multipart/form-data">
                                    <input type="file" accept="image/*" name="foto">
                                    <input type="hidden" value="<?php echo $hasil_profil['gambar']; ?>" name="foto2">
                                    <input type="hidden" name="id" value="<?php echo $hasil_profil['id_member']; ?>">
                                    <span class="pull-right">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="zmdi zmdi-upload"> Ganti Foto</i></button>
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
                                            <button type="submit" class="btn btn-primary mr-10">Perbarui</button>
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
                                            <button type="submit" class="btn btn-primary mr-10">Perbarui</button>
                                        </form>
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

<script src="vendors/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Slimscroll JavaScript -->
<script src="dist/js/jquery.slimscroll.js"></script>

<!-- Fancy Dropdown JS -->
<script src="dist/js/dropdown-bootstrap-extended.js"></script>

<!-- File upload -->
<script src="vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

<!-- Init JavaScript -->
<script src="dist/js/init.js"></script>
<script src="dist/js/dashboard3-data.js"></script>
</body>