<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_user' yang dikirim oleh form_tambah.php
	$namaLengkap = $_POST['nama_lengkap'];
	$telepon = $_POST['telp'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$kota = $_POST['kota'];
	$provinsi = $_POST['provinsi'];
	$kodepos = $_POST['kode_pos'];
	$password = $_POST['passwd'];
	// query untuk menyimpan ke tabel tbl_customer
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO customer ( nama_lengkap, telp, alamat, email, kota, provinsi, kode_pos, passwd) 
		VALUES ('$namaLengkap', '$telepon', '$alamat', '$email', '$kota', '$provinsi', '$kodepos', '$password')");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar user
	if ($querySimpan) {
		echo "<script> alert('Data User Berhasil Masuk'); window.location = '$admin_url'+'customer/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah user
	} else {
		echo "<script> alert('Data User Gagal Dimasukkan'); window.location = '$admin_url'+'customer/form_tambah.php';</script>";
	}
?>