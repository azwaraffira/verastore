<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_kategori' yang dikirim oleh form_tambah.php
	$idKategori = $_POST['id_kategori'];
	$namaProduk = $_POST['nama_produk'];
	//$file = $_FILES['gambar']['name'];
	$fileName = $_POST['nama_gambar'];
	$harga = $_POST['harga'];
	$deskripsi = $_POST['deskripsi'];
	$size = $_POST['size'];
	$stok = $_POST['stok'];
	echo  $idKategori . " " . $namaProduk . " " . $fileName . " " . $harga . " " . $deskripsi . " " . $size . " " . $stok;
	// query untuk menyimpan ke tabel tbl_kategori
	
	//$querySimpan = mysqli_query($koneksi, "INSERT INTO tbl_produk (id_kategori, nama_produk, harga, gambar, deskripsi) VALUES ('$namaKategori', '$namaProduk', '$harga', '$fileName', '$deskripsi')");
	
	//move_uploaded_file($_FILES['gambar']['tmp_name'], "../../file/produk/".$_FILES['gambar']['name']);

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
	//if ($querySimpan) {
	//	echo "<script> alert('Data Produk Berhasil Masuk'); window.location = '$admin_url'+'produk/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
	//} else {
	//	echo "<script> alert('Data Produk Gagal Dimasukkan'); window.location = '$admin_url'+'produk/form_tambah.php';</script>";
	//}
?>