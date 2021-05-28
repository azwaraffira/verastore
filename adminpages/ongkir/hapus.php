<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $idOngkir = $_GET['id_ongkir'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM ongkir WHERE id_ongkir='$idOngkir'");
    if ($queryHapus) {
        echo "<script> alert('Data ongkir Berhasil Dihapus'); window.location = '$admin_url'+'ongkir/main.php';</script>";
    } else {
        echo "<script> alert('Data ongkir Gagal Dihapus'); window.location = '$admin_url'+'ongkir/main.php';</script>";

    }
?>