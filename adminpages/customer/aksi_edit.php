<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_user' dan 'id_user' yang dikirim oleh form_edit.php
	$id_customer = $_POST['id_customer'];
	$nama = $_POST['nama'];
	$telepon = $_POST['telepon'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$kota = $_POST['kota'];
	// query untuk mengubah ke tabel tbl_user
	
	$querySimpan = mysqli_query($koneksi, "UPDATE customer SET nama_lengkap ='$nama', telp = '$telepon', alamat = '$alamat', email = '$email', kota = '$kota' WHERE id_customer='$id_customer'");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar user
	if ($querySimpan) {
		echo "<script> alert('Data User Berhasil Diubah'); window.location = '$admin_url'+'customer/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit user
	} else {
		echo "<script> alert('Data User Gagal Dimasukkan'); window.location = '$admin_url'+'customer/form_edit.php?id_customer=$id_customer';</script>";
	}
?>