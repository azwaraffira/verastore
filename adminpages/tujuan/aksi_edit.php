<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_kategori' dan 'id_kategori' yang dikirim oleh form_edit.php
	$id_tujuan = $_POST['id_tujuan'];
	$namaKurir = $_POST['nama_kurir'];
	$hargaOngkir = $_POST['harga'];
	$kota = $_POST['kota'];
	// query untuk mengubah ke tabel tbl_kategori
	
		$querySimpan = mysqli_query($koneksi, "UPDATE tujuan SET id_kurir='$namaKurir', id_ongkir ='$hargaOngkir', kota='$kota' WHERE id_tujuan='$id_tujuan'");
	


	//$querySimpan = mysqli_query($koneksi, "UPDATE tujuan SET id_kurir='$namaKurir', kota='$kota' WHERE id_tujuan='$id_tujuan'");
	
	//move_uploaded_file($_FILES['gambar']['tmp_name'], "../../file/tujuan/".$_FILES['gambar']['name']);

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
	if ($querySimpan) {
		echo "<script> alert('Data tujuan Berhasil Diubah'); window.location = '$admin_url'+'tujuan/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit kategori
	} else {
		echo "<script> alert('Data tujuan Gagal Dimasukkan'); window.location = '$admin_url'+'tujuan/form_edit.php?id_tujuan=$id_tujuan';</script>";
	}
?>