<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $idKurir = $_GET['id_kurir'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM kurir WHERE id_kurir='$idKurir'");
    if ($queryHapus) {
        echo "<script> alert('Data kurir Berhasil Dihapus'); window.location = '$admin_url'+'kurir/main.php';</script>";
    } else {
        echo "<script> alert('Data kurir Gagal Dihapus'); window.location = '$admin_url'+'kurir/main.php';</script>";

    }
?>