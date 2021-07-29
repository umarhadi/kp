<?php

header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=data-barang-" . date('Y-m-d') . ".xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private", false);

require 'config.php';
include $view;
$lihat = new view($config);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="modal-view">
        <h3 style="text-align:center;">
            Data Barang
        </h3>
        <table border="1" width="100%" cellpadding="3" cellspacing="4">
            <thead>
                <tr bgcolor="yellow">
                    <th> No</th>
                    <th> ID Barang</th>
                    <th> Nama Barang</th>
                    <th> Merk</th>
                    <th> Kategori</th>
                    <th> Stok</th>
                    <th> Harga Beli</th>
                    <th> Harga Jual</th>
                    <th> Satuan</th>
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
                        <td><?php echo $no; ?></td>
                        <td><?php echo $isi['id_barang']; ?></td>
                        <td><?php echo $isi['nama_barang']; ?></td>
                        <td><?php echo $isi['merk']; ?></td>
                        <td><?php echo $isi['nama_kategori']; ?></td>
                        <td><?php if ($isi['stok'] == '0') { ?>
                                <b>Habis</b>
                            <?php } else { ?>
                                <?php echo $isi['stok']; ?>
                            <?php } ?>
                        </td>
                        <td>Rp. <?php echo number_format($isi['harga_beli']); ?></td>
                        <td>Rp. <?php echo number_format($isi['harga_jual']); ?></td>
                        <td><?php echo $isi['satuan_barang']; ?></td>
                    </tr>
                <?php
                    $no++;
                    $totalBeli += $isi['harga_beli'] * $isi['stok'];
                    $totalJual += $isi['harga_jual'] * $isi['stok'];
                    $totalStok += $isi['stok'];
                }
                ?>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><b>Total </b></td>
                    <td><?php echo $totalStok; ?></td>
                    <td>Rp.<?php echo number_format($totalBeli); ?>,-</td>
                    <td>Rp.<?php echo number_format($totalJual); ?>,-</td>
                </tr>

            </tbody>
        </table>
        <i>Dicetak pada <?php echo date('d F Y'); ?></i>
    </div>
</body>

</html>