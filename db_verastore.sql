-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2021 pada 21.26
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_verastore`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(6) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `passwd` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_lengkap`, `email`, `telp`, `alamat`, `kota`, `provinsi`, `kode_pos`, `passwd`) VALUES
(1, 'Azwar Affira', 'azwaraffira@gmail', '089000000', 'RT 1 RW 2', 'TURI', 'Yogyakarta', '05462', 'Azwar123'),
(2, 'Alif Wiji', 'alifwiji@gmail', '089000000', 'RT 1 RW 2', 'Tambak Boyo', 'Semarang', '05462', 'Alif123'),
(3, 'Andreas Nofri', 'andreaswhildant@gmail', '089000000', 'RT 1 RW 2', 'Pasekan', 'Semarang', '05462', 'Andreas123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(6) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`, `berat`) VALUES
(1, 'Gamis', 900),
(2, 'Jilbab', 300),
(3, 'Mukena', 700);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int(6) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nama`) VALUES
(1, 'JNE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--



CREATE TABLE `produk` (
  `id_produk` int(6) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` varchar(200),
  `id_kategori` int(6) DEFAULT NULL,
  `nama_gambar` varchar(100)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `harga` ,`deskripsi`,`id_kategori`, `nama_gambar`) VALUES
(1, 'Kaftan', 75000, 'lorem ipsum', 1, '1_GAMIS_KAFTAN.jpg'),
(2, 'Katun', 50000, 'lorem ipsum', 1, '1_GAMIS_KATUN.jpg'),
(3, 'Katun', 20000, 'lorem ipsum' , 2, '2_JILBAB_KATUN.jpg'),
(4, 'Sutra', 25000,'lorem ipsum', 2, '2_JILBAB_SUTRA.jpg'),
(5, 'Anak-anak', 30000,'lorem ipsum', 3, '3_MUKENA_ANAK.jpg'),
(6, 'Dewasa', 40000,'lorem ipsum', 3, '3_MUKENA_DEWASA.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rf_status`
--

CREATE TABLE `rf_status` (
  `id_status` int(6) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rf_status`
--

INSERT INTO `rf_status` (`id_status`, `nama`) VALUES
(1, 'Disimpan'),
(2, 'Dibayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id_stok` int(6) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`id_stok`, `id_produk`, `size`, `stok`) VALUES
(1, 1, 'S', 50),
(2, 1, 'M', 50),
(3, 1, 'L', 50),
(4, 1, 'XL', 50),
(5, 2, 'S', 50),
(6, 2, 'M', 50),
(7, 2, 'L', 50),
(8, 2, 'XL', 50),
(9, 3, NULL, 50),
(10, 4, NULL, 50),
(11, 5, NULL, 50),
(12, 6, NULL, 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gambar`
--

CREATE TABLE `tbl_gambar` (
  `id_gambar` int(6) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `gambar` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(6) NOT NULL,
  `id_customer` int(6) DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `status_bayar` int(6) DEFAULT NULL,
  `harga_awal` int(11) DEFAULT NULL,
  `harga_ongkir` int(11) DEFAULT NULL,
  `total_berat` int(11) DEFAULT NULL,
  `harga_total` int(11) DEFAULT NULL,
  `id_kurir` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_customer`, `tgl_transaksi`, `status_bayar`, `harga_awal`, `harga_ongkir`, `total_berat`, `harga_total`, `id_kurir`) VALUES
(1, 1, '2021-06-01', 2, 100000, 18000, 1800, 180000, 1),
(2, 2, '2021-06-01', 2, 100000, 11000, 1100, 110000, 1),
(3, 3, '2021-06-01', 1, 100000, 13000, 1300, 130000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_item`
--

CREATE TABLE `transaksi_item` (
  `id_transaksi` int(6) DEFAULT NULL,
  `id_produk` int(6) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `jumlah_produk` int(11) DEFAULT NULL,
  `berat_produk` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_item`
--

INSERT INTO `transaksi_item` (`id_transaksi`, `id_produk`, `size`, `jumlah_produk`, `berat_produk`, `harga`) VALUES
(1, 1, 'S', 2, 1200, 20000),
(1, 2, 'S', 2, 12000, 20000),
(2, 2, 'M', 1, 900, 11000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `level` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `passwd`, `level`) VALUES
(1, 'admin', 'admin', 'admin', ''),
(2, 'Azwar', 'azwar', 'azwar', 'Administrator'),
(3, 'Andreas', 'andreas', 'alskdj12', 'user');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vw_viewproduk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vw_viewproduk` (
`id_stok` int(6)
,`nama_produk` varchar(201)
,`deskripsi` varchar(200)
,`size` varchar(10)
,`harga` int(11)
,`stok` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vw_viewtransaksi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vw_viewtransaksi` (
`id_transaksi` int(6)
,`nama_lengkap` varchar(100)
,`tgl_transaksi` date
,`status_pembayaran` varchar(50)
,`harga_awal` int(11)
,`harga_ongkir` int(11)
,`total_berat` int(11)
,`harga_total` int(11)
,`nama_kurir` varchar(100)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vw_viewproduk`
--
DROP TABLE IF EXISTS `vw_produk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`
 SQL SECURITY DEFINER VIEW `vw_produk` 
 AS 
 SELECT `s`.`id_stok` AS `id_stok`, concat(`k`.`nama`,' ',`p`.`nama`) AS `nama_produk`
 , `P`.`deskripsi` AS `deskripsi`, `s`.`size` AS `size`, `p`.`harga` AS `harga`, `p`.`nama_gambar`
 , `s`.`stok` AS `stok`
 FROM 
 ((`produk` `p` join `stok` `s` on(`s`.`id_produk` = `p`.`id_produk`)) 
 join `kategori` `k` on(`k`.`id_kategori` = `p`.`id_kategori`)) ;
 

-- --------------------------------------------------------

--
-- Struktur untuk view `vw_viewtransaksi`
--
DROP TABLE IF EXISTS `vw_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_transaksi`  AS SELECT `t`.`id_transaksi` AS `id_transaksi`, `c`.`nama_lengkap` AS `nama_lengkap`, `t`.`tgl_transaksi` AS `tgl_transaksi`, `s`.`nama` AS `status_pembayaran`, `t`.`harga_awal` AS `harga_awal`, `t`.`harga_ongkir` AS `harga_ongkir`, `t`.`total_berat` AS `total_berat`, `t`.`harga_total` AS `harga_total`, `ku`.`nama` AS `nama_kurir` FROM ((((((`transaksi` `t` join `transaksi_item` `ti` on(`t`.`id_transaksi` = `ti`.`id_transaksi`)) join `produk` `p` on(`ti`.`id_produk` = `p`.`id_produk`)) join `kategori` `k` on(`k`.`id_kategori` = `p`.`id_kategori`)) join `kurir` `ku` on(`ku`.`id_kurir` = `t`.`id_kurir`)) join `customer` `c` on(`c`.`id_customer` = `t`.`id_customer`)) join `rf_status` `s` on(`t`.`status_bayar` = `s`.`id_status`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `rf_status`
--
ALTER TABLE `rf_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indeks untuk tabel `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
