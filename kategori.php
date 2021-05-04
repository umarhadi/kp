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
<title>Kategori - CV. Mahardika Komputer</title>
<div class="hk-pg-wrapper">
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="barang.php">Barang</a></li>
            <li class="breadcrumb-item" aria-current="page">Kategori</li>
        </ol>
    </nav>
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <div class="hk-pg-header mb-1">
            <div>
                <h2 class="hk-pg-title font-weight-300 mb-10"><i class="zmdi zmdi-label"></i>&nbsp;Tabel Kategori</h2>
                <?php if (isset($_GET['sukses-stok'])) { ?>
                    <div class="alert alert-success">
                        <p>Tambah Stok Berhasil!</p>
                    </div>
                <?php } ?>
                <?php if (isset($_GET['sukses'])) { ?>
                    <div class="alert alert-success">
                        <p>Tambah Data Berhasil!</p>
                    </div>
                <?php } ?>
                <?php if (isset($_GET['hapus'])) { ?>
                    <div class="alert alert-danger">
                        <p>Hapus Data Berhasil!</p>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php
        if (!empty($_GET['uid'])) {
            $sql = "SELECT * FROM kategori WHERE id_kategori = ?";
            $row = $config->prepare($sql);
            $row->execute(array($_GET['uid']));
            $edit = $row->fetch();
        ?>
            <form method="POST" action="fungsi/edit/edit.php?kategori=edit">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hk-row">
                            <div class="col-md">
                                <div class="card card-lg">
                                    <div class="card-body">
                                        <div class="align-items-center justify-content-between">
                                            <span class="d-block font-12 font-weight-500 text-dark text-uppercase mb-5">Ubah Nama Kategori: <strong><?php echo $edit['nama_kategori']; ?></strong></span>
                                            <div>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="kategori" value="<?= $edit['nama_kategori']; ?>" placeholder="Masukkan kategori baru..">
                                                    <input type="hidden" name="id" value="<?= $edit['id_kategori']; ?>">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-info" type="submit"><i class="zmdi zmdi-upload"></i></button>
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
            </form>
        <?php } else { ?>
            <form method="POST" action="fungsi/tambah/tambah.php?kategori=tambah">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hk-row">
                            <div class="col-md">
                                <div class="card card-lg">
                                    <div class="card-body">
                                        <div class="align-items-center justify-content-between">
                                            <span class="d-block font-12 font-weight-500 text-dark text-uppercase mb-5">Tambah Kategori Baru</span>
                                            <div>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="kategori" placeholder="Masukkan kategori baru..">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-info" type="submit"><i class="zmdi zmdi-upload"></i></button>
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
            </form>
        <?php } ?>
        <div class="card">
            <div class="card-body">
                <div class="table table-responsive table-striped">
                    <table id="tableDash1" class="table w-100 pb-30">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kategori</th>
                                <th>Tanggal Input</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $hasil = $lihat->kategori();
                            $no = 1;
                            foreach ($hasil as $isi) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?>.</td>
                                    <td><?php echo $isi['nama_kategori']; ?>
                                    </td>
                                    <td><?php echo $isi['tgl_input']; ?></td>
                                    <td>
                                        <a href="kategori.php?uid=<?php echo $isi['id_kategori']; ?>"><button class="btn btn-sm btn-warning"><i class="zmdi zmdi-edit"></i></button></a>
                                        <a href="fungsi/hapus/hapus.php?kategori=hapus&id=<?php echo $isi['id_kategori']; ?>" onclick="javascript:return confirm('Hapus kategori <?php echo $isi['nama_kategori']; ?>?');"><button class="btn btn-sm btn-danger"><i class="zmdi zmdi-delete"></i></button></a>
                                    </td>
                                </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
                    </table>
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


<!-- Data Table JavaScript -->
<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="dist/js/dataTables-data.js"></script>

<!-- Init JavaScript -->
<script src="dist/js/init.js"></script>
<script src="dist/js/dashboard3-data.js"></script>

</body>