<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'nama_kategori' yang dikirim oleh form_tambah.php
	$namaKurir = $_POST['nama_kurir'];
	$hargaOngkir = $_POST['harga'];
	$kota = $_POST['kota'];
	// query untuk menyimpan ke tabel tbl_kategori
	
	$querySimpan = mysqli_query($koneksi, "INSERT INTO tujuan (id_kurir, id_ongkir, kota) VALUES ('$namaKurir', $hargaOngkir, '$kota')");
	
	//move_uploaded_file($_FILES['gambar']['tmp_name'], "../../file/tujuan/".$_FILES['gambar']['name']);

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
	if ($querySimpan) {
		echo "<script> alert('Data tujuan Berhasil Masuk'); window.location = '$admin_url'+'tujuan/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
	} else {
		echo "<script> alert('Data tujuan Gagal Dimasukkan'); window.location = '$admin_url'+'tujuan/form_tambah.php';</script>";
	}
?>