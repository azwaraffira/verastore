<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_kurir' yang dikirim oleh form_tambah.php
	$nama_kurir = $_POST['nama_kurir'];
	// query untuk menyimpan ke tabel tbl_kurir
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO kurir (nama_kurir) VALUES ('$nama_kurir')");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kurir
	if ($querySimpan) {
		echo "<script> alert('Data kurir Berhasil Masuk'); window.location = '$admin_url'+'kurir/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kurir
	} else {
		echo "<script> alert('Data kurir Gagal Dimasukkan'); window.location = '$admin_url'+'kurir/form_tambah.php';</script>";
	}
?>