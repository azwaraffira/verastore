<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $id_customer = $_GET['id_customer'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM customer WHERE id_customer='$id_customer'");
    if ($queryHapus) {
        echo "<script> alert('Data User Berhasil Dihapus'); window.location = '$admin_url'+'customer/main.php';</script>";
    } else {
        echo "<script> alert('Data User Gagal Dihapus'); window.location = '$admin_url'+'customer/main.php';</script>";

    }
?>