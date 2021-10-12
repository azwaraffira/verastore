-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2021 at 09:21 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbverastore`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `confirm` (`kodeTransaksi` VARCHAR(255), `idMobil` INT(255))  BEGIN
select * from kurir where id_kurir = kodeTransaksi;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_DELETE_DATA` (`idStok` INT(6), `idTransaksai` INT(6), `isTransaksi` BOOLEAN)  BEGIN
    IF(isTransaksi) THEN
        -- delete transaksi
        DELETE FROM kurir WHERE id_kurir = 999;
    ELSE
        SELECT @idProduk := id_produk from stok where id_stok = idStok;
        DELETE FROM STOK WHERE id_stok = idStok;
        DELETE FROM produk WHERE id_produk = @idProduk;
    END IF ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_INSERT_PRODUK` (`idKategori` INT(6), `namaProduk` VARCHAR(50), `namaGambar` VARCHAR(100), `hargaProduk` INT(10), `stokProduk` INT(10), `sizeProduk` VARCHAR(50), `deskripsiProduk` VARCHAR(200), `idStok` INT(6), `isInsert` BOOLEAN)  BEGIN
IF (isInsert) THEN
    INSERT INTO produk (nama, harga, deskripsi, id_kategori, nama_gambar)
    VALUES (namaProduk, hargaProduk, deskripsiProduk,idKategori , namaGambar );

    SELECT @lastId := MAX(id_produk) From produk;

    IF(idKategori != 1) THEN
        INSERT INTO stok (id_produk, size, stok)
        VALUES (@lastId, NULL, stokProduk);
    ELSE
        INSERT INTO stok (id_produk, size, stok)
        VALUES (@lastId, sizeProduk, stokProduk);
    end if ;
ELSE
    SELECT @idProduk := id_produk from stok where id_stok = idStok;
    UPDATE produk SET nama = namaProduk, harga  = hargaProduk , deskripsi = deskripsiProduk,
                      id_kategori = id_kategori , nama_gambar = namaGambar WHERE id_produk = @idProduk;

    IF(idKategori != 1) THEN
    UPDATE stok set size = NULL, stok = stokProduk WHERE  id_stok = idStok;
    ELSE
    UPDATE stok set size = sizeProduk, stok = stokProduk WHERE  id_stok = idStok;
    end if ;


end if ;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
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
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_lengkap`, `email`, `telp`, `alamat`, `kota`, `provinsi`, `kode_pos`, `passwd`) VALUES
(1, 'Azwar Affira', 'azwaraffira@gmail', '089000000', 'RT 1 RW 2', 'TURI', 'Yogyakarta', '05462', 'Azwar123'),
(2, 'Alif Wiji', 'alifwiji@gmail', '089000000', 'RT 1 RW 2', 'Tambak Boyo', 'Semarang', '05462', 'Alif123'),
(3, 'Andreas Nofri', 'andreaswhildant@gmail', '089000000', 'RT 1 RW 2', 'Pasekan', 'Semarang', '05462', 'Andreas123'),
(6, 'ok', 'ok', 'ok', 'ok', 'ok', 'ok', 'ok', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(6) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`, `berat`) VALUES
(1, 'Gamis', 900),
(2, 'Jilbab', 300),
(3, 'Mukena', 700);

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int(6) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nama`) VALUES
(1, 'JNE'),
(6, 'J&T');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(6) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `id_kategori` int(6) DEFAULT NULL,
  `nama_gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `harga`, `deskripsi`, `id_kategori`, `nama_gambar`) VALUES
(1, 'Kaftan', 75000, 'lorem ipsum', 1, '1_GAMIS_KAFTAN.jpg'),
(2, 'Katun', 50000, 'lorem ipsum', 1, '1_GAMIS_KATUN.jpg'),
(3, 'Katun', 20000, 'lorem ipsum', 2, '2_JILBAB_KATUN.jpg'),
(4, 'Sutra', 25000, 'lorem ipsum', 2, '2_JILBAB_SUTRA.jpg'),
(5, 'Anak-anak', 30000, 'lorem ipsum', 3, '3_MUKENA_ANAK.jpg'),
(6, 'Dewasa', 40000, 'lorem ipsum', 3, '3_MUKENA_DEWASA.jpg'),
(11, 'coba_sp', 50, 'coba_sp', 1, NULL),
(12, 'hijab_coba', 5000, 'coba_sp', 3, NULL),
(13, 'Gamis_coba', 5000, 'coba update UI', 3, NULL),
(14, 'gamis_coba_edit', 5000, 'coba sp update v2', 1, NULL),
(15, 'Coba mukena ui', 99900, 'Test TambahProduk', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rf_info`
--

CREATE TABLE `rf_info` (
  `id_info` int(6) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rf_info`
--

INSERT INTO `rf_info` (`id_info`, `nama`, `alamat`) VALUES
(1, 'VERA STORE', 'Jln.Wahid Hasyim No 12, Pringgolayan, Depok, Sleman');

-- --------------------------------------------------------

--
-- Table structure for table `rf_status`
--

CREATE TABLE `rf_status` (
  `id_status` int(6) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `style` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rf_status`
--

INSERT INTO `rf_status` (`id_status`, `nama`, `style`) VALUES
(1, 'Disimpan', 'label-warning'),
(2, 'Dibayar', 'label-success'),
(3, 'Diproses', 'label-primary'),
(4, 'Selesai', 'label-success'),
(5, 'Dibatalkan', 'label-danger');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_stok` int(6) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
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
(12, 6, NULL, 50),
(18, 11, 'XXXL', 999),
(19, 12, NULL, 999),
(20, 13, NULL, 999),
(21, 14, 'XXXL', 999),
(22, 15, NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gambar`
--

CREATE TABLE `tbl_gambar` (
  `id_gambar` int(6) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `gambar` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
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
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_customer`, `tgl_transaksi`, `status_bayar`, `harga_awal`, `harga_ongkir`, `total_berat`, `harga_total`, `id_kurir`) VALUES
(1, 1, '2021-06-01', 2, 100000, 18000, 1800, 180000, 1),
(2, 2, '2021-06-01', 2, 100000, 11000, 1100, 110000, 1),
(3, 3, '2021-06-01', 1, 100000, 13000, 1300, 130000, 1),
(4, 3, '2021-09-25', 4, 100000, 13000, 1300, 130000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_item`
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
-- Dumping data for table `transaksi_item`
--

INSERT INTO `transaksi_item` (`id_transaksi`, `id_produk`, `size`, `jumlah_produk`, `berat_produk`, `harga`) VALUES
(1, 1, 'S', 2, 1200, 20000),
(1, 2, 'S', 2, 12000, 20000),
(2, 2, 'M', 1, 900, 11000),
(4, 1, 'S', 2, 1200, 20000),
(4, 1, 'S', 2, 12000, 20000),
(4, 1, 'M', 1, 900, 11000),
(3, 1, 'S', 2, 1200, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `level` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `passwd`, `level`) VALUES
(1, 'admin', 'admin', 'admin', ''),
(2, 'Azwar', 'azwar', 'azwar', 'Administrator'),
(3, 'Andreas', 'andreas', 'alskdj12', 'user');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_produk`
-- (See below for the actual view)
--
CREATE TABLE `vw_produk` (
`id_stok` int(6)
,`nama_produk` varchar(201)
,`deskripsi` varchar(200)
,`size` varchar(10)
,`harga` int(11)
,`nama_gambar` varchar(100)
,`stok` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `vw_transaksi` (
`id_transaksi` int(6)
,`nama_lengkap` varchar(100)
,`email` varchar(100)
,`telp` varchar(50)
,`alamat` varchar(352)
,`tgl_transaksi` date
,`status_pembayaran` varchar(50)
,`harga_awal` int(11)
,`harga_ongkir` int(11)
,`total_berat` int(11)
,`harga_total` int(11)
,`nama_kurir` varchar(100)
,`nama_produk` varchar(201)
,`harga_per_produk` int(11)
,`size` varchar(10)
,`jumlah_produk` int(11)
,`berat_produk` int(11)
,`harga_per_item` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `vw_viewproduk`
--

CREATE TABLE `vw_viewproduk` (
  `id_stok` int(6) DEFAULT NULL,
  `nama_produk` varchar(201) DEFAULT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vw_viewtransaksi`
--

CREATE TABLE `vw_viewtransaksi` (
  `id_transaksi` int(6) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `status_pembayaran` varchar(50) DEFAULT NULL,
  `harga_awal` int(11) DEFAULT NULL,
  `harga_ongkir` int(11) DEFAULT NULL,
  `total_berat` int(11) DEFAULT NULL,
  `harga_total` int(11) DEFAULT NULL,
  `nama_kurir` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure for view `vw_produk`
--
DROP TABLE IF EXISTS `vw_produk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_produk`  AS SELECT `s`.`id_stok` AS `id_stok`, concat(`k`.`nama`,' ',`p`.`nama`) AS `nama_produk`, `p`.`deskripsi` AS `deskripsi`, `s`.`size` AS `size`, `p`.`harga` AS `harga`, `p`.`nama_gambar` AS `nama_gambar`, `s`.`stok` AS `stok` FROM ((`produk` `p` join `stok` `s` on(`s`.`id_produk` = `p`.`id_produk`)) join `kategori` `k` on(`k`.`id_kategori` = `p`.`id_kategori`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_transaksi`
--
DROP TABLE IF EXISTS `vw_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_transaksi`  AS SELECT `t`.`id_transaksi` AS `id_transaksi`, `c`.`nama_lengkap` AS `nama_lengkap`, `c`.`email` AS `email`, `c`.`telp` AS `telp`, concat(`c`.`alamat`,' ',`c`.`kota`,' ',`c`.`provinsi`) AS `alamat`, `t`.`tgl_transaksi` AS `tgl_transaksi`, `s`.`nama` AS `status_pembayaran`, `t`.`harga_awal` AS `harga_awal`, `t`.`harga_ongkir` AS `harga_ongkir`, `t`.`total_berat` AS `total_berat`, `t`.`harga_total` AS `harga_total`, `ku`.`nama` AS `nama_kurir`, concat(`k`.`nama`,' ',`p`.`nama`) AS `nama_produk`, `p`.`harga` AS `harga_per_produk`, `ti`.`size` AS `size`, `ti`.`jumlah_produk` AS `jumlah_produk`, `ti`.`berat_produk` AS `berat_produk`, `ti`.`harga` AS `harga_per_item` FROM ((((((`transaksi` `t` join `transaksi_item` `ti` on(`t`.`id_transaksi` = `ti`.`id_transaksi`)) join `produk` `p` on(`ti`.`id_produk` = `p`.`id_produk`)) join `kategori` `k` on(`k`.`id_kategori` = `p`.`id_kategori`)) join `kurir` `ku` on(`ku`.`id_kurir` = `t`.`id_kurir`)) join `customer` `c` on(`c`.`id_customer` = `t`.`id_customer`)) join `rf_status` `s` on(`t`.`status_bayar` = `s`.`id_status`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `rf_info`
--
ALTER TABLE `rf_info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `rf_status`
--
ALTER TABLE `rf_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rf_info`
--
ALTER TABLE `rf_info`
  MODIFY `id_info` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
