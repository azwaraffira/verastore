<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_kategori' yang dikirim oleh form_tambah.php
	$idKategori = $_POST['id_kategori'];
	$namaProduk = $_POST['nama_produk'];
	$harga = $_POST['harga'];
	$deskripsi = $_POST['deskripsi'];
	$size = $_POST['size'];
	$stok = $_POST['stok'];
	
	
	$querySimpan = mysqli_query($koneksi, "CALL SP_INSERT_PRODUK ($idKategori, '$namaProduk', NULL, $harga, $stok, '$size', '$deskripsi', NULL, TRUE)");
	
	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
	if ($querySimpan) {
		echo "<script> alert('Data Produk Berhasil Masuk'); window.location = '$admin_url'+'produk/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
	} else {
		echo "<script> alert('Data Produk Gagal Dimasukkan'); window.location = '$admin_url'+'produk/form_tambah.php';</script>";
	}
?>