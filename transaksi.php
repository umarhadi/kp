<?php
@ob_start();
session_start();

if (!empty($_SESSION['admin'])) {
    require 'config.php';
    include $view;
    $lihat = new view($config);
    $toko = $lihat->toko();
    $id = $_SESSION['admin']['id_member'];

    // variable view stok, nama, kategori, sudah terjual
    $hasil_profil = $lihat->member_edit($id);
    $hasil_barang = $lihat->barang_row();
    $hasil_kategori = $lihat->kategori_row();
    $stok = $lihat->barang_stok_row();
    $jual = $lihat->jual_row();

    // variable view penjualan, laba, modal
    //$bln = date('m');
    //$thn = date('Y');
    $periode_bln = '"02-2021"'; //date('m').'-'.date('Y');
    $hasil_jual = $lihat->penjualan_bulan_row($periode_bln);

    /*$bayar += $hasil_jual['total'];
            $modal += $hasil_jual['harga_beli']* $hasil_jual['jumlah'];
            $jumlah += $hasil_jual['jumlah'];
            */

    //  admin
    include 'komponen/header.php';

    if (!empty($_GET['page'])) {
        include 'admin/module/' . $_GET['page'] . '/index.php';
    } else {
        //include 'admin/template/home.php';
    }
    // end admin
} else {
    echo '<script>window.location="login.php";</script>';
}
?>
<title>Transaksi - CV. Mahardika Komputer</title>
<div class="hk-pg-wrapper">
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <div class="hk-pg-header mb-1">
            <div>
                <h2 class="hk-pg-title font-weight-300 mb-10"><i class="zmdi zmdi-search"></i>&nbsp;Cari Barang</h2>
                <?php
                $sql = " select * from barang where stok <= 3";
                $row = $config->prepare($sql);
                $row->execute();
                $r = $row->rowCount();
                if ($r > 0) {
                ?>
                <?php
                    echo "<div class='alert alert-success alert-wth-icon alert-dismissible fade show mb-0' role='alert'>
							<span class='alert-icon-wrap'><i class='zmdi zmdi-notifications-active'></i></span>Ada <span style='color:red'>$r</span> barang yang stoknya kurang dari 3 item. Silahkan update di
							<a href='index.php?page=barang&stok=yes'><span class='text-warning'>Tabel Barang</span></a>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span aria-hidden='true'>&times;</span>
							</button>
							</div>";
                }
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="hk-row">
                    <div class="col-md">
                        <div class="card card-lg">
                            <div class="card-body">
                                <div class="align-items-center justify-content-between">
                                    <span class="d-block font-12 font-weight-500 text-dark text-uppercase mb-5">Masukkan ID Barang / Nama Barang / Merk</span>
                                    <div>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="cari" name="cari" placeholder="Cari..." aria-label="Cari..." aria-describedby="Cari...">
                                            <div class="input-group-append">
                                                <button class="btn btn-light text-primary" type="button"><i class="zmdi zmdi-search"></i></button>
                                                <button class="btn btn-light text-danger" value="reset" type="reset" id="hapus_cari"><i class="zmdi zmdi-close"></i></button>
                                            </div>
                                        </div>
                                        <div id="hasil_cari"></div>
                                        <div id="tunggu"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hk-pg-header mb-1">
            <h2 class="hk-pg-title font-weight-300 mb-10"><i class="zmdi zmdi-shopping-cart"></i>&nbsp;Transaksi</h2>
        </div>
        <div class="card hk-row">
            <div class="card-body">
                <div class="table-wrap">
                    <table id="tableDash1" class="table w-100 pb-30">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Harga Satuan</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total_bayar = 0;
                            $no = 1;
                            $hasil_penjualan = $lihat->penjualan(); ?>
                            <?php foreach ($hasil_penjualan as $isi) {; ?>
                                <tr>
                                    <td><?php echo $no; ?>.</td>
                                    <td><?php echo $isi['nama_barang']; ?></td>
                                    <td>Rp. <?php echo number_format($isi['harga_jual']); ?></td>
                                    <td style="width: 15%" class="justify">
                                        <form method="POST" action="fungsi/edit/edit.php?jual=jual">
                                            <input type="number" name="jumlah" class="normal form-control" value="<?php echo $isi['jumlah']; ?>" min="0" max="100" step="1">
                                            <input type="hidden" name="id" value="<?php echo $isi['id_penjualan']; ?>" class="form-control">
                                            <input type="hidden" name="id_barang" value="<?php echo $isi['id_barang']; ?>" class="form-control">
                                    </td>
                                    <td>Rp. <?php echo number_format($isi['total']); ?></td>
                                    <td style="width: 15%"><button type="submit" class="btn btn-success"><i class="material-icons">check</i></button>
                                        <a href="fungsi/hapus/hapus.php?jual=jual&id=<?php echo $isi['id_penjualan']; ?>&brg=<?php echo $isi['id_barang']; ?>&jml=<?php echo $isi['jumlah']; ?>" class="btn btn-danger"><i class="material-icons">cancel</i>
                                        </a>
                                    </td>
                                    </form>

                                </tr>
                            <?php $no++;
                                $total_bayar += $isi['total'];
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="hk-row">
                    <div class="col-md-3">
                        <div class="hk-pg-header mb-1">
                            <h2 class="hk-pg-title font-weight-300 mb"><i class="zmdi zmdi-money"></i>&nbsp;Pembayaran</h2>
                        </div>
                        <?php
                        // proses bayar dan ke nota
                        if (!empty($_GET['nota'] == 'yes')) {
                            $total = $_POST['total'];
                            $bayar = $_POST['bayar'];
                            if (!empty($bayar)) {
                                $hitung = $bayar - $total;
                                if ($bayar >= $total) {
                                    $id_barang = $_POST['id_barang'];
                                    $id_member = $_POST['id_member'];
                                    $jumlah = $_POST['jumlah'];
                                    $total = $_POST['total1'];
                                    $tgl_input = $_POST['tgl_input'];
                                    $periode = $_POST['periode'];
                                    $jumlah_dipilih = count($id_barang);

                                    for ($x = 0; $x < $jumlah_dipilih; $x++) {
                                        $d = array($id_barang[$x], $id_member[$x], $jumlah[$x], $total[$x], $tgl_input[$x], $periode[$x]);
                                        $sql = "INSERT INTO nota (id_barang,id_member,jumlah,total,tanggal_input,periode) VALUES(?,?,?,?,?,?)";
                                        $row = $config->prepare($sql);
                                        $row->execute($d);
                                        // ubah stok barang
                                        $sql_barang = "SELECT * FROM barang WHERE id_barang = ?";
                                        $row_barang = $config->prepare($sql_barang);
                                        $row_barang->execute(array($id_barang[$x]));
                                        $hsl = $row_barang->fetch();

                                        $stok = $hsl['stok'];
                                        $idb  = $hsl['id_barang'];
                                        $total_stok = $stok - $jumlah[$x];
                                        // echo $total_stok;
                                        $sql_stok = "UPDATE barang SET stok = ? WHERE id_barang = ?";
                                        $row_stok = $config->prepare($sql_stok);
                                        $row_stok->execute(array($total_stok, $idb));
                                    }
                                    echo '<script>alert("Belanjaan Berhasil Di Bayar !");</script>';
                                } else {
                                    echo '<script>alert("Uang Kurang ! Rp.' . $hitung . '");</script>';
                                }
                            }
                        }
                        ?>
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between">
                                    <form action="transaksi.php?nota=yes#kasirnya" method="POST">
                                        <span class="d-block font-12 font-weight-500 text-dark text-uppercase mb-5">Total Semua</span>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                            </div>
                                            <input type="text" name="total" class="form-control square-input" value="<?php echo $total_bayar; ?>">
                                        </div>
                                        <br>
                                        <span class="d-block font-12 font-weight-500 text-dark text-uppercase mb-5">Bayar</span>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                            </div>
                                            <input type="text" name="bayar" class="form-control square-input" value="<?php echo $bayar; ?>">
                                        </div>
                                        <br>
                                        <button class="btn btn-dark btn-wth-icon align-items-center justify icon-wthot-bg btn-rounded icon-right btn-lg"><span class="btn-text">Bayar</span> <span class="icon-label"><span class="feather-icon"><i data-feather="arrow-right"></i></span> </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="hk-pg-header mb-1">
                            <h2 class="hk-pg-title font-weight-300 mb"><i class="zmdi zmdi-print"></i>&nbsp;Info</h2>
                        </div>
                        <div class="accordion" id="accorStruk">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collStruk" aria-expanded="true">Struk</a>
                                </div>
                                <div id="collStruk" class="collapse" data-parent="#accorStruk" role="tabpanel">
                                    <div class="card card-sm">
                                        <div class="card-body">
                                            <section class="hk-sec-wrapper hk-invoice-wrap pa-35">
                                                <div class="invoice-from-wrap">
                                                    <div class="row">
                                                        <div class="col-md-7 mb-20">
                                                            <h4 class="mb-35 font-weight-600"><?php echo $toko['nama_toko']; ?></h4>
                                                            <address>
                                                                <span class="d-block"><?php echo $toko['alamat_toko']; ?></span>
                                                                <span class="d-block"><?php echo $toko['tlp']; ?></span>
                                                            </address>
                                                        </div>
                                                        <div class="col-md-5 mb-20">
                                                            <h4 class="mb-35 font-weight-600">Struk Pembayaran</h4>
                                                            <span class="d-block">Tanggal:<span class="pl-10 text-dark">Nov 17,2017 11:23 AM</span></span>
                                                            <span class="d-block">Nama Kasir:<span class="pl-10 text-dark"><?php echo $hasil_profil['nm_member']; ?></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="mt-0">
                                                <h5>Item yang dibeli</h5>
                                                <hr>
                                                <div class="invoice-details">
                                                    <div class="table-wrap">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-border mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th class="w-70">Nama Barang</th>
                                                                        <th class="w-50">Merk</th>
                                                                        <th class="text-right">Jumlah</th>
                                                                        <th class="text-right">Harga Satuan</th>
                                                                        <th class="text-right">Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $total_bayar = 0;
                                                                    $no_struk = 1;
                                                                    $struk_penjualan = $lihat->penjualan(); ?>
                                                                    <?php foreach ($struk_penjualan as $isi_struk) {; ?>
                                                                        <tr>
                                                                            <td><?php echo $no_struk; ?></td>
                                                                            <td class="w-70"><?php echo $isi_struk['nama_barang']; ?></td>
                                                                            <td class="w-50"><?php echo $isi_struk['merk']; ?></td>
                                                                            <td class="text-right"><?php echo $isi_struk['jumlah']; ?></td>
                                                                            <td class="text-right"><?php echo number_format($isi_struk['harga_jual']); ?></td>
                                                                            <td class="text-right"><?php echo number_format($isi_struk['total']); ?></td>
                                                                        </tr>
                                                                    <?php $no_struk++;
                                                                    } ?>
                                                                    <?php $totalStruk = $lihat->struk_total(); ?>
                                                                    <tr class="bg-transparent">
                                                                        <td colspan="5" class="text-right text-light">Total Semua</td>
                                                                        <td class="text-right">Rp.<?php echo number_format($totalStruk); ?></td>
                                                                    </tr>
                                                                    <tr class="bg-transparent">
                                                                        <td colspan="5" class="text-right text-light border-top-0">Bayar</td>
                                                                        <td class="text-right border-top-0">s</td>
                                                                    </tr>
                                                                    <tr class="bg-transparent">
                                                                        <td colspan="5" class="text-right text-light border-top-0">Kembalian</td>
                                                                        <td class="text-right border-top-0"><?php echo number_format($hitung); ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="invoice-terms-wrap font-14 list-ul">
                                                    Terima kasih sudah berbelanja disini:)
                                                </ul>
                                            </section>
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

<!-- FeatherIcons JavaScript -->
<script src="dist/js/feather.min.js"></script>

<!-- Toggles JavaScript -->
<script src="vendors/jquery-toggles/toggles.min.js"></script>
<script src="dist/js/toggle-data.js"></script>

<!-- Counter Animation JavaScript -->
<script src="vendors/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="vendors/jquery.counterup/jquery.counterup.min.js"></script>

<!-- Easy pie chart JS -->
<script src="vendors/easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

<!-- Sparkline JavaScript -->
<script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="vendors/raphael/raphael.min.js"></script>
<script src="vendors/morris.js/morris.min.js"></script>

<!-- EChartJS JavaScript -->
<script src="vendors/echarts/dist/echarts-en.min.js"></script>

<!-- Peity JavaScript -->
<script src="vendors/peity/jquery.peity.min.js"></script>

<!-- Data Table JavaScript -->
<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="vendors/jszip/dist/jszip.min.js"></script>
<script src="vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="dist/js/dataTables-data.js"></script>
<script src="vendors/bootstrap-input-spinner/src/bootstrap-input-spinner.js"></script>
<script src="dist/js/inputspinner-data.js"></script>
<script>
    // AJAX call for autocomplete 
    $(document).ready(function() {
        $("#cari").change(function() {
            $.ajax({
                type: "POST",
                url: "fungsi/edit/edit.php?cari_barang=yes",
                data: 'keyword=' + $(this).val(),
                beforeSend: function() {
                    $("#hasil_cari").hide();
                    $("#tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
                },
                success: function(html) {
                    $("#tunggu").html('');
                    $("#hasil_cari").show();
                    $("#hasil_cari").html(html);
                },
            });
        });
    });
    $("#hapus_cari").click(function() {
        $("#hasil_cari").hide();
        $("#cari").show();
    });
    //To select country name
</script>

<!-- Init JavaScript -->
<script src="dist/js/init.js"></script>
<script src="dist/js/dashboard3-data.js"></script>
</body>