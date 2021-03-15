<?php
@ob_start();
session_start();

if (!empty($_SESSION['admin'])) {
    require 'config.php';
    include $view;
    $lihat = new view($config);
    $toko = $lihat->toko();
    $id = $_SESSION['admin']['id_member'];
    $hasil_profil = $lihat->member_edit($id);
    $hasil = $lihat->member_edit($id);
} else {
    echo '<script>window.location="login.php";</script>';
}
