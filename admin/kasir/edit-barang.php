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
<title>Edit Data Barang - Mahardika Komputer</title>
<div class="hk-pg-wrapper">
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="barang.php">Barang</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="barang.php">Stok Barang</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Barang</li>
        </ol>
    </nav>
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <div class="hk-pg-header mb-1">
            <div>
                <h2 class="hk-pg-title font-weight-300 mb-10"><i class="zmdi zmdi-archive text-success"></i>&nbsp;Tabel Barang</h2>
                <?php if (isset($_GET['berhasil'])) { ?>
                    <div class="alert alert-success">
                        <p>Edit Data Berhasil!</p>
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
                <?php
                $sql = " select * from barang where stok <= 3";
                $row = $config->prepare($sql);
                $row->execute();
                $r = $row->rowCount();
                if ($r > 0) {
                ?>
                <?php
                    echo "<div class='alert alert-success alert-wth-icon alert-dismissible fade show mb-0' role='alert'>
							<span class='alert-icon-wrap'><i class='zmdi zmdi-notifications-active'></i></span>Ada <span style='color:red'>$r</span> barang yang stoknya kurang dari 3 item.
							<a href='barang.php?stok=yes'><span class='text-warning'>Lihat barang</span></a>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							</button>
							</div>";
                }
                ?>
            </div>

        </div>
        <div class="card">
            <div class="card-body">
                <?php
                $id = $_GET['barang'];
                $hasil = $lihat->barang_edit($id);
                ?>
                <div class="row">
                    <div class="col-sm">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 col-sm-12 mb-30">
                                <div class="card">
                                    <div class="card-header">
                                        Foto <?php echo $hasil['nama_barang']; ?>
                                    </div>
                                    <div class="card-body text-center">
                                        <a href="../../assets/img/barang/<?php echo $hasil['img']; ?>" target="_blank" alt="Lihat ukuran penuh"><img class="card-img-top img-fluid rounded" src="../../assets/img/barang/<?php echo $hasil['img']; ?>" style="width:200px;" alt="foto barang"></a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Ganti foto</h5>
                                        <form method="POST" action="fungsi/edit/edit.php?img=barang" enctype="multipart/form-data">
                                            <input type="file" accept="image/*" name="foto">
                                            <input type="hidden" value="<?php echo $hasil['img']; ?>" name="foto2">
                                            <input type="hidden" name="id" value="<?php echo $hasil['id_barang']; ?>">
                                            <button type="submit" class="btn btn-info btn-sm float-right"><i class="zmdi zmdi-upload"></i>  Upload</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped">
                <form action="fungsi/edit/edit.php?barang=edit" method="POST">
                    <tr>
                        <td>ID Barang</td>
                        <td><input type="text" readonly="readonly" class="form-control text-muted" value="<?php echo $hasil['id_barang']; ?>" name="id"></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>
                            <select name="kategori" class="form-control">
                                <option value="<?php echo $hasil['id_kategori']; ?>"><?php echo $hasil['nama_kategori']; ?></option>
                                <?php $kat = $lihat->kategori();
                                foreach ($kat as $isi) {     ?>
                                    <option value="<?php echo $isi['id_kategori']; ?>"><?php echo $isi['nama_kategori']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Barang</td>
                        <td><input type="text" class="form-control" value="<?php echo $hasil['nama_barang']; ?>" name="nama"></td>
                    </tr>
                    <tr>
                        <td>Merk Barang</td>
                        <td><input type="text" class="form-control" value="<?php echo $hasil['merk']; ?>" name="merk"></td>
                    </tr>
                    <tr>
                        <td>Harga Beli</td>
                        <td><input type="number" class="form-control" value="<?php echo $hasil['harga_beli']; ?>" name="beli"></td>
                    </tr>
                    <tr>
                        <td>Harga Jual</td>
                        <td><input type="number" class="form-control" value="<?php echo $hasil['harga_jual']; ?>" name="jual"></td>
                    </tr>
                    <tr>
                        <td>Satuan Barang</td>
                        <td>
                            <select name="satuan" class="form-control">
                                <option value="<?php echo $hasil['satuan_barang']; ?>"><?php echo $hasil['satuan_barang']; ?></option>
                                <option value="#">Pilih Satuan</option>
                                <option value="Pcs">Pcs</option>
                                <option value="Unit">Unit</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Stok</td>
                        <td><input type="number" class="form-control" value="<?php echo $hasil['stok']; ?>" name="stok"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Update</td>
                        <td><input type="text" readonly="readonly" class="form-control text-muted" value="<?php echo date("j F Y, G:i"); ?>" name="tgl"></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td><textarea class="form-control" rows="3" name="deskripsi"><?php echo $hasil['deskripsi']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="btn btn-primary"><i class="zmdi zmdi-edit"></i> Update Data</button></td>
                    </tr>
                </form>
            </table>
        </div>
    </div>


    <script src="../../assets/vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="../../assets/dist/js/jquery.slimscroll.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="../../assets/dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- Init JavaScript -->
    <script src="../../assets/dist/js/init.js"></script>
    <script src="../../assets/dist/js/dashboard3-data.js"></script>

    </body>