<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_user' dan 'id_user' yang dikirim oleh form_edit.php
	$id_user = $_POST['id_user'];
	$nama = $_POST['nama'];
	$telepon = $_POST['telepon'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	// query untuk mengubah ke tabel tbl_user
	
	$querySimpan = mysqli_query($koneksi, "UPDATE user SET nama_user ='$nama', telepon = '$telepon', alamat = '$alamat', email = '$email', username = '$username', password = '$password' WHERE id_user='$id_user'");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar user
	if ($querySimpan) {
		echo "<script> alert('Data User Berhasil Diubah'); window.location = '$admin_url'+'user/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit user
	} else {
		echo "<script> alert('Data User Gagal Dimasukkan'); window.location = '$admin_url'+'user/form_edit.php?id_user=$id_user';</script>";
	}
?>