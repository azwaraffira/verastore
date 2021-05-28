<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_ongkir' yang dikirim oleh form_tambah.php
	$harga = $_POST['harga'];
	// query untuk menyimpan ke tabel tbl_ongkir
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO ongkir (harga) VALUES ('$harga')");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar ongkir
	if ($querySimpan) {
		echo "<script> alert('Data ongkir Berhasil Masuk'); window.location = '$admin_url'+'ongkir/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah ongkir
	} else {
		echo "<script> alert('Data ongkir Gagal Dimasukkan'); window.location = '$admin_url'+'ongkir/form_tambah.php';</script>";
	}
?>