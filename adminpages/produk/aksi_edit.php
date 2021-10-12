<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_kategori' yang dikirim oleh form_tambah.php
	$id_stok = $_POST['id_stok'];
	$idKategori = $_POST['id_kategori'];
	$namaProduk = $_POST['nama_produk'];
	$harga = $_POST['harga'];
	$deskripsi = $_POST['deskripsi'];
	$size = $_POST['size'];
	$stok = $_POST['stok'];
	$idStok = $_POST['id_stok'];
	if($idKategori==1 ){
		if($size === null || $size === ""){
		echo "<script> alert('Kategori gamis, Size tidak boleh kosong!'); window.location = '$admin_url'+'produk/form_edit.php?id_stok=$id_stok';</script>";
		}
	}
	
	$querySimpan = mysqli_query($koneksi, "CALL SP_INSERT_PRODUK ($idKategori, '$namaProduk', NULL, $harga, $stok, '$size', '$deskripsi', $idStok, FALSE)");
	

	if ($querySimpan) {
		echo "<script> alert('Data Produk Berhasil Diubah'); window.location = '$admin_url'+'produk/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit kategori
	} else {
		echo "<script> alert('Data Produk Gagal Dimasukkan'); window.location = '$admin_url'+'produk/form_edit.php?id_stok=$id_stok';</script>";
	}
?>