<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_kurir' dan 'id_kurir' yang dikirim oleh form_edit.php
	$id_kurir = $_POST['id_kurir'];
	$nama_kurir = $_POST['nama_kurir'];
	// query untuk mengubah ke tabel tbl_kurir
	
	$querySimpan = mysqli_query($koneksi, "UPDATE kurir SET nama_kurir='$nama_kurir' WHERE id_kurir='$id_kurir'");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kurir
	if ($querySimpan) {
		echo "<script> alert('Data kurir Berhasil Diubah'); window.location = '$admin_url'+'kurir/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit kurir
	} else {
		echo "<script> alert('Data kurir Gagal Dimasukkan'); window.location = '$admin_url'+'kurir/form_edit.php?id_kurir=$id_kurir';</script>";
	}
?>