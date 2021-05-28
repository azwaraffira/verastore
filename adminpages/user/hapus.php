<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $idUser = $_GET['id_user'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$idUser'");
    if ($queryHapus) {
        echo "<script> alert('Data User Berhasil Dihapus'); window.location = '$admin_url'+'user/main.php';</script>";
    } else {
        echo "<script> alert('Data User Gagal Dihapus'); window.location = '$admin_url'+'user/main.php';</script>";

    }
?>