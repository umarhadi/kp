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
<title>Edit Data Barang - CV. Mahardika Komputer</title>
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
                <table class="table table-striped">
                    <form action="fungsi/edit/edit.php?barang=edit" method="POST">
                        <tr>
                            <td>ID Barang</td>
                            <td><input type="text" readonly="readonly" class="form-control" value="<?php echo $hasil['id_barang']; ?>" name="id"></td>
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
                            <td><input type="text" readonly="readonly" class="form-control" value="<?php echo  date("j F Y, G:i"); ?>" name="tgl"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="btn btn-primary"><i class="zmdi zmdi-edit"></i> Update Data</button></td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>


        <script src="../vendors/jquery/dist/jquery.min.js"></script>
        <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../dist/js/dropdown-bootstrap-extended.js"></script>
        <script src="../dist/js/init.js"></script>

        </body>