-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31 Mar 2022 pada 08.43
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `penline`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(5) NOT NULL,
  `kategori` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'bagus mahal'),
(2, 'bagus murah'),
(3, 'jelek mahal'),
(4, 'jelek murah1'),
(6, 'murah jelek');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peralatan`
--

CREATE TABLE IF NOT EXISTS `peralatan` (
  `id` int(11) NOT NULL,
  `nama_alat` varchar(128) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tahun_buat` year(4) NOT NULL,
  `stok` int(11) NOT NULL,
  `dipinjam` int(11) NOT NULL,
  `dibooking` int(11) NOT NULL,
  `image` varchar(256) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peralatan`
--

INSERT INTO `peralatan` (`id`, `nama_alat`, `id_kategori`, `tahun_buat`, `stok`, `dipinjam`, `dibooking`, `image`) VALUES
(1, 'tas', 1, 2019, 5, 0, 3, 'book-default-cover.jpg\r\nimg1234.jpg'),
(2, 'jaket', 2, 2015, 7, 3, 2, 'book-default-cover.jpg\r\nimg2345.jpg'),
(4, 'sepatu', 4, 2018, 5, 2, 3, 'book-default-cover.jpg\r\nimg5678.jpg'),
(5, 'tenda', 1, 2021, 10, 3, 5, 'book-default-cover.jpg\r\nimg6789.jpg'),
(6, 'sleeping bag', 2, 2022, 5, 0, 0, 'book-default-cover.jpg\r\nimg78910.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_input` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `tanggal_input`) VALUES
(1, 'kelompok 9', 'wendimarizkidinata@gmail.com', 'pro1639448781.jpg', '$2y$10$Q9PibAip7bFxQHj2B2ph7ea5hpMw3fYLDTOnSMPXx4h36pXJOSFVW', 2, 1, 1639367626),
(2, 'kelompok9', 'wendimariski@gmail.com', 'pro1647504905.jpg', '$2y$10$JPOK..432lw.xciVwr6b3ONq/T36025z8jt/L3Bz7Iw.qcJnO/Nzq', 2, 1, 1639595971);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
