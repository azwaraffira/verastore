<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_ongkir' dan 'id_ongkir' yang dikirim oleh form_edit.php
	$id_ongkir = $_POST['id_ongkir'];
	$harga = $_POST['harga'];
	// query untuk mengubah ke tabel tbl_ongkir
	
	$querySimpan = mysqli_query($koneksi, "UPDATE ongkir SET harga='$harga' WHERE id_ongkir='$id_ongkir'");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar ongkir
	if ($querySimpan) {
		echo "<script> alert('Data ongkir Berhasil Diubah'); window.location = '$admin_url'+'ongkir/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit ongkir
	} else {
		echo "<script> alert('Data ongkir Gagal Dimasukkan'); window.location = '$admin_url'+'ongkir/form_edit.php?id_ongkir=$id_ongkir';</script>";
	}
?>