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

$bulan_tes = array(
    '01' => "Januari",
    '02' => "Februari",
    '03' => "Maret",
    '04' => "April",
    '05' => "Mei",
    '06' => "Juni",
    '07' => "Juli",
    '08' => "Agustus",
    '09' => "September",
    '10' => "Oktober",
    '11' => "November",
    '12' => "Desember"
);

?>
<title>Laporan - CV. Mahardika Komputer</title>
<div class="hk-pg-wrapper">
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page">Laporan</a></li>
        </ol>
    </nav>
    <div class="container mt-xl-50 mt-sm-30 mt-15">
        <div class="hk-pg-header mb-1">
            <div>
                <h2 class="hk-pg-title font-weight-600 mb-10">
                    <?php if (!empty($_GET['cari'])) { ?>
                        Laporan Penjualan Bulan <?= $bulan_tes[$_POST['bln']]; ?> <?= $_POST['thn']; ?>
                    <?php } elseif (!empty($_GET['hari'])) { ?>
                        Laporan Penjualan <?= $_POST['hari']; ?>
                    <?php } else { ?>
                        Laporan Penjualan Bulan <?= $bulan_tes[date('m')]; ?> <?= date('Y'); ?>
                    <?php } ?>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="hk-row">
                    <div class="col-md-6">
                        <span class="d-block font-20 font-weight-500 text-dark mb-5">Lihat laporan per-bulan</span>
                        <div class="card card-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="row d-flex align-items-center justify-content-between">
                                            <div class="col">
                                                <form method="post" action="laporan.php?cari=ok">
                                                    <select name="bln" class="form-control rounded-input custom-select">
                                                        <option selected>Bulan</option>
                                                        <?php
                                                        $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                                        $jlh_bln = count($bulan);
                                                        $bln1 = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
                                                        $no = 1;
                                                        for ($c = 0; $c < $jlh_bln; $c += 1) {
                                                            echo "<option value='$bln1[$c]'> $bulan[$c] </option>";
                                                            $no++;
                                                        }
                                                        ?>
                                                    </select>
                                            </div>
                                            <div class="col">
                                                <select name="thn" class="form-control rounded-input custom-select">
                                                    <option selected>Tahun</option>
                                                    <?php
                                                    $now = date('Y');
                                                    for ($a = 2021; $a <= $now; $a++) {
                                                        echo "<option value='$a'>$a</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="hidden" name="periode" value="ya">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="zmdi zmdi-search"></i> Cari
                                        </button>
                                        <a href="index.php?page=laporan" class="btn btn-sm btn-success">
                                            <i class="zmdi zmdi-refresh-alt"></i> Refresh</a>

                                        <?php if (!empty($_GET['cari'])) { ?>
                                            <a href="excel.php?cari=yes&bln=<?= $_POST['bln']; ?>&thn=<?= $_POST['thn']; ?>" class="btn btn-sm btn-warning"><i class="zmdi zmdi-download"></i>
                                                Excel</a>
                                        <?php } else { ?>
                                            <a href="excel.php" class="btn btn-sm btn-warning"><i class="zmdi zmdi-download"></i>
                                                Excel</a>
                                        <?php } ?>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <span class="d-block font-20 font-weight-500 text-dark mb-5">Lihat laporan per-hari</span>
                        <div class="card card-sm">
                            <div class="card-body" href="#">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="row d-flex align-items-center justify-content-between">
                                        <div class="col">
                                            <form method="post" action="laporan.php?hari=cek">
                                                <input type="date" value="<?= date('Y-m-d'); ?>" class="form-control rounded-input custom-select" name="hari">
                                        </div>
                                    </div>
                                    <div>
                                        <input type="hidden" name="periode" value="ya">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="zmdi zmdi-search"></i> Cari
                                        </button>
                                        <a href="index.php?page=laporan" class="btn btn-sm btn-success">
                                            <i class="zmdi zmdi-refresh-alt"></i> Refresh</a>

                                        <?php if (!empty($_GET['hari'])) { ?>
                                            <a href="excel.php?hari=cek&tgl=<?= $_POST['hari']; ?>" class="btn btn-sm btn-warning"><i class="zmdi zmdi-download"></i>
                                                Excel</a>
                                        <?php } else { ?>
                                            <a href="excel.php" class="btn btn-sm btn-warning"><i class="zmdi zmdi-download"></i>
                                                Excel</a>
                                        <?php } ?>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-striped">
                                <table class="table pb-30" id="tableDash1">
                                    <thead>
                                        <tr>
                                            <th> No</th>
                                            <th> ID Nota</th>
                                            <th> Nama Barang</th>
                                            <th style="width:10%;"> Jumlah</th>
                                            <th style="width:10%;"> Modal</th>
                                            <th style="width:10%;"> Total</th>
                                            <th> Tanggal Input</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        if (!empty($_GET['cari'])) {
                                            $periode = $_POST['bln'] . '-' . $_POST['thn'];
                                            $no = 1;
                                            $jumlah = 0;
                                            $bayar = 0;
                                            $hasil = $lihat->periode_jual($periode);
                                        } elseif (!empty($_GET['hari'])) {
                                            $hari = $_POST['hari'];
                                            $no = 1;
                                            $jumlah = 0;
                                            $bayar = 0;
                                            $hasil = $lihat->hari_jual($hari);
                                        } else {
                                            $hasil = $lihat->jual();
                                        }
                                        ?>
                                        <?php
                                        $bayar = 0;
                                        $jumlah = 0;
                                        $modal = 0;
                                        foreach ($hasil as $isi) {
                                            $bayar += $isi['total'];
                                            $modal += $isi['harga_beli'] * $isi['jumlah'];
                                            $jumlah += $isi['jumlah'];
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?>.</td>
                                                <td><?php echo $isi['id_nota']; ?></td>
                                                <td><?php echo $isi['nama_barang']; ?></td>
                                                <td><?php echo $isi['jumlah']; ?> </td>
                                                <td>Rp.<?php echo number_format($isi['harga_beli'] * $isi['jumlah']); ?>,-</td>
                                                <td>Rp.<?php echo number_format($isi['total']); ?>,-</td>
                                                <td><?php echo $isi['tanggal_input']; ?></td>
                                            </tr>
                                        <?php $no++;
                                        } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2">Total Terjual</td>
                                            <th colspan="1"><?php echo $jumlah; ?></td>
                                            <th>Rp.<?php echo number_format($modal); ?>,-</th>
                                            <th>Rp.<?php echo number_format($bayar); ?>,-</th>
                                            <th style="background:#0bb365;color:#fff;">Keuntungan</th>
                                            <th style="background:#0bb365;color:#fff;">
                                                Rp.<?php echo number_format($bayar - $modal); ?>,-</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
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