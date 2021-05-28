<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_kategori' yang dikirim oleh form_tambah.php
	$idTransaksi = $_POST['id_transaksi'];
	$namaProduk = $_POST['nama_produk'];
	$jumlah = $_POST['jumlah'];
	$totalHarga = $_POST['tot_harga'];
	// query untuk menyimpan ke tabel tbl_kategori
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO transaksi (id_transaksi, id_produk, jumlah, tot_harga) VALUES ('$idTransaksi', '$namaProduk', '$jumlah', $totalHarga')");
	
	//move_uploaded_file($_FILES['gambar']['tmp_name'], "../../file/transaksi/".$_FILES['gambar']['name']);

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
	if ($querySimpan) {
		echo "<script> alert('Data transaksi Berhasil Masuk'); window.location = '$admin_url'+'det_transaksi/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
	} else {
		echo "<script> alert('Data transaksi Gagal Dimasukkan'); window.location = '$admin_url'+'det_transaksi/form_tambah.php';</script>";
	}
?>