<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $idStok = $_GET['id_stok'];
    $queryHapus = mysqli_query($koneksi, "CALL SP_DELETE_DATA ($idStok , null, false )");
    if ($queryHapus) {
        echo "<script> alert('Data Produk Berhasil Dihapus'); window.location = '$admin_url'+'produk/main.php';</script>";
    } else {
        echo "<script> alert('Data Produk Gagal Dihapus'); window.location = '$admin_url'+'produk/main.php';</script>";

    }
?>