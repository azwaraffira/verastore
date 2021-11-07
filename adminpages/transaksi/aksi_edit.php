<?php
// untuk memasukkan file config_web.php dan file koneksi.php
include "../../lib/config_web.php";
include "../../lib/koneksi.php";

// untuk menangkap variabel 'nama_kategori' dan 'id_kategori' yang dikirim oleh form_edit.php
$id_transaksi = $_POST['id_transaksi'];
$namaUser = $_POST['nama_user'];
$kota = $_POST['kota'];
$waktu = $_POST['waktu'];
$status = $_POST['status'];
$total = $_POST['total'];
// query untuk mengubah ke tabel tbl_kategori

$querySimpan = mysqli_query($koneksi, "UPDATE transaksi SET id_user='$namaUser', id_tujuan='$kota', waktu='$waktu', status='$status', total='$total' WHERE id_transaksi='$id_transaksi'");



//$querySimpan = mysqli_query($koneksi, "UPDATE transaksi SET id_kategori='$namaKategori', nama_transaksi='$namatransaksi', harga='$harga', gambar='$fileName', deskripsi='$deskripsi' WHERE id_transaksi='$id_transaksi'");

//move_uploaded_file($_FILES['gambar']['tmp_name'], "../../file/transaksi/".$_FILES['gambar']['name']);

// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
if ($querySimpan) {
	echo "<script> alert('Data transaksi Berhasil Diubah'); window.location = '$admin_url'+'transaksi/main.php';</script>";
	// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit kategori
} else {
	echo "<script> alert('Data transaksi Gagal Dimasukkan'); window.location = '$admin_url'+'transaksi/form_edit.php?id_transaksi=$id_transaksi';</script>";
}
