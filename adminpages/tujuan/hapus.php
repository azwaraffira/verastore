<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $idTujuan = $_GET['id_tujuan'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM tujuan WHERE id_tujuan='$idTujuan'");
    if ($queryHapus) {
        echo "<script> alert('Data tujuan Berhasil Dihapus'); window.location = '$admin_url'+'tujuan/main.php';</script>";
    } else {
        echo "<script> alert('Data tujuan Gagal Dihapus'); window.location = '$admin_url'+'tujuan/main.php';</script>";

    }
?>