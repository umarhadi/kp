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
<title>Barang - CV. Mahardika Komputer</title>
<div class="hk-pg-wrapper">
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item active"><a href="index.php"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="barang.php"> Barang</a></li>
            <li class="breadcrumb-item active" aria-current="page">Stok Barang</li>
        </ol>
    </nav>
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <div class="hk-pg-header mb-1">
            <div>
                <h2 class="hk-pg-title font-weight-300 mb-10"><i class="zmdi zmdi-archive text-primary"></i>&nbsp;Tabel Barang</h2>
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
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTmbh">
                <i class="zmdi zmdi-plus-circle-o"></i> Tambah Data Barang</button>
            <div class="card-body">
                <div class="table-wrap table-striped">
                    <table id="tableDash1" class="table w-100 pb-30">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Merk</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Satuan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $totalBeli = 0;
                            $totalJual = 0;
                            $totalStok = 0;
                            if ($_GET['stok'] == 'yes') {
                                $hasil = $lihat->barang_stok();
                            } else {
                                $hasil = $lihat->barang();
                            }
                            $no = 1;
                            foreach ($hasil as $isi) {
                            ?>
                                <tr>
                                    <td><small><?php echo $no; ?>.</td></small>
                                    <td>
                                        <small><?php echo $isi['id_barang']; ?></small>
                                    </td>
                                    <td><small><a class="text-info detail_barang" href="#" data-toggle="modal" data-target="#modalDetail" id="<?php echo $isi['id_barang']; ?>"><?php echo $isi['nama_barang']; ?></a></td></small>
                                    <td><small><?php echo $isi['merk']; ?></small></td>
                                    <td><small><?php echo $isi['nama_kategori']; ?></small></td>
                                    <td>
                                        <?php if ($isi['stok'] == '0') { ?>
                                            <span class="badge badge-soft-danger">Habis</span>
                                        <?php } else { ?>
                                            <h5><span class="badge badge-soft-info"><?php echo $isi['stok']; ?></span></h5>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo number_format($isi['harga_beli']); ?></td>
                                    <td><?php echo number_format($isi['harga_jual']); ?></td>
                                    <td><span class="badge badge-purple badge-pill"><?php echo $isi['satuan_barang']; ?></span></td>
                                    <td>
                                        <?php if ($isi['stok'] <=  '3') { ?>
                                            <div class="btn-group dropright show-on-hover">
                                                <button type="button" class="btn btn-outline-warning dropdown-toggle btn-sm " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Aksi
                                                </button>
                                                <div class="dropdown-menu">
                                                    <form method="POST" action="fungsi/edit/edit.php?stok=edit">
                                                        <div class="input-group">
                                                            <input type="text" name="restok" class="form-control" placeholder="Jmlh restok..">
                                                            <input type="hidden" name="id" value="<?php echo $isi['id_barang']; ?>" class="form-control">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-info" type="button"><i class="zmdi zmdi-edit"></i></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href=fungsi/hapus/hapus.php?barang=hapus&id=<?php echo $isi['id_barang']; ?> onclick="javascript:return confirm('Hapus Data barang ?');"><i class="zmdi zmdi-delete text-danger"></i> Hapus</a>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="btn-group dropright show-on-hover">
                                                <button type="button" class="btn btn-outline-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Aksi
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="edit-barang.php?barang=<?php echo $isi['id_barang']; ?>"><i class="zmdi zmdi-edit text-warning"></i> Perbarui</a>
                                                    <a class="dropdown-item" href=fungsi/hapus/hapus.php?barang=hapus&id=<?php echo $isi['id_barang']; ?> onclick="javascript:return confirm('Hapus Data barang ?');"><i class="zmdi zmdi-delete text-danger"></i> Hapus</a>
                                                </div>
                                            </div>

                                        <?php } ?>
                                </tr>
                            <?php
                                $no++;
                                $totalBeli += $isi['harga_beli'] * $isi['stok'];
                                $totalJual += $isi['harga_jual'] * $isi['stok'];
                                $totalStok += $isi['stok'];
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5">Total </td>
                                <th><?php echo $totalStok; ?></td>
                                <th>Rp.<?php echo number_format($totalBeli); ?>,-</td>
                                <th>Rp.<?php echo number_format($totalJual); ?>,-</td>
                                <th colspan="2" style="background:#ddd"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div id="modalDetail" class="modal fade" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header btn btn-info">
                        <h5 class="modal-title"><i class="zmdi zmdi-plus"></i> Detail</h5>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" id="detail">

                    </div>
                </div>
            </div>
        </div>
        <div id="modalTmbh" class="modal fade" role="dialog">
            <div class="modal-dialog" role="document">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header btn btn-primary">
                        <h5 class="modal-title"><i class="zmdi zmdi-plus"></i> Tambah Barang</h5>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <form action="fungsi/tambah/tambah.php?barang=tambah" method="POST">
                        <div class="modal-body">

                            <table class="table table-striped bordered">

                                <?php
                                $format = $lihat->barang_id();
                                ?>
                                <tr>
                                    <td>ID Barang</td>
                                    <td><input type="text" readonly="readonly" required value="<?php echo $format; ?>" class="form-control" name="id"></td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>
                                        <select name="kategori" class="form-control" required>
                                            <option value="#">Pilih Kategori</option>
                                            <?php $kat = $lihat->kategori();
                                            foreach ($kat as $isi) {     ?>
                                                <option value="<?php echo $isi['id_kategori']; ?>"><?php echo $isi['nama_kategori']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Barang</td>
                                    <td><input type="text" placeholder="Nama Barang" required class="form-control" name="nama"></td>
                                </tr>
                                <tr>
                                    <td>Merk Barang</td>
                                    <td><input type="text" placeholder="Merk Barang" required class="form-control" name="merk"></td>
                                </tr>
                                <tr>
                                    <td>Harga Beli</td>
                                    <td><input type="number" placeholder="Harga beli" required class="form-control" name="beli"></td>
                                </tr>
                                <tr>
                                    <td>Harga Jual</td>
                                    <td><input type="number" placeholder="Harga Jual" required class="form-control" name="jual"></td>
                                </tr>
                                <tr>
                                    <td>Satuan Barang</td>
                                    <td>
                                        <select name="satuan" class="form-control" required>
                                            <option value="#">Pilih Satuan</option>
                                            <option value="Pcs">Pcs</option>
                                            <option value="Unit">Unit</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Stok</td>
                                    <td><input type="number" required Placeholder="Stok" class="form-control" name="stok"></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Input</td>
                                    <td><input type="text" required readonly="readonly" class="form-control" value="<?php echo  date("j F Y, G:i"); ?>" name="tgl"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-plus-circle-o"></i> Tambah</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="vendors/jquery/dist/jquery.min.js"></script>
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="dist/js/dropdown-bootstrap-extended.js"></script>
<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="dist/js/dataTables-data.js"></script>
<script src="dist/js/init.js"></script>
<script>
    $(document).ready(function() {
        $('.detail_barang').click(function() {
            var detail_barang = $(this).attr("id");
            $.ajax({
                url: "fungsi/view/modal-barang.php",
                method: "post",
                data: {
                    detail_barang: detail_barang
                },
                success: function(data) {
                    $('#detail').html(data);
                    $('#modalDetail').modal("show");
                }
            });
        });
    });
</script>
</body>