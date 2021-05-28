instalasi

unzip di documentroot
ganti nama folder sesuai dengan projek anda
buat database, import myframework.sql
ada 3 tabel, kategori, produk, dan user

admin multi level

sementara baru halaman admin yang jadi, yg sudah lengkap CRUDnya modul kategori, dan produk
untuk mengakses halaman admin http://localhost/namafolder/adminpages
username =
admin
password = admin

untuk yang operator
usernamename= operator
password = operator

====
untuk membuat modul diadmin, buat folder modulnya didalam folder adminpages
contohnya kategori, file main.php untuk menampilkan, form_tambah.php untuk form isian databaru, aksi_simpan.php untuk aksi simpan, form_edit.php untuk isisan edit data, aksi_edit.php untuk aksi simpan edit, dan hapus.php untuk menghapus data, silakan tambahkan file lain jika dibutuhkan, sesuaikan dengan fungsi modul yang bersangkutan.

