<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_user' yang dikirim oleh form_tambah.php
	$nama= $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['passwd'];
	$level = $_POST['level'];
	
	
	// query untuk menyimpan ke tabel tbl_user
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO user ( nama, username, passwd, level ) 
		VALUES ('$nama', '$username', '$password', '$level' )");
		

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar user
	if ($querySimpan) {
		echo "<script> alert('Data User Berhasil Masuk'); window.location = '$admin_url'+'user/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah user
	} else {
		echo "<script> alert('Data User Gagal Dimasukkan'); window.location = '$admin_url'+'user/form_tambah.php';</script>";
	}
?>