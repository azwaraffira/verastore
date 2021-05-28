<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_kategori' yang dikirim oleh form_tambah.php
	$namaUser = $_POST['nama_user'];
	$kota = $_POST['kota'];
	$waktu = $_POST['waktu'];
	$status = $_POST['status'];
	$total = $_POST['total'];
	// query untuk menyimpan ke tabel tbl_kategori
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO transaksi (id_user, id_tujuan, waktu, status, total) 
		VALUES ('$namaUser', '$kota', '$waktu', '$status', '$total')");
	
	//move_uploaded_file($_FILES['gambar']['tmp_name'], "../../file/transaksi/".$_FILES['gambar']['name']);

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
	if ($querySimpan) {
		echo "<script> alert('Data transaksi Berhasil Masuk'); window.location = '$admin_url'+'transaksi/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
	} else {
		echo "<script> alert('Data transaksi Gagal Dimasukkan'); window.location = '$admin_url'+'transaksi/form_tambah.php';</script>";
	}
?>