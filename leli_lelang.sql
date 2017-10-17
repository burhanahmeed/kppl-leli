-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2017 at 12:15 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leli_lelang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tabel`
--

CREATE TABLE `admin_tabel` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barang_tabel`
--

CREATE TABLE `barang_tabel` (
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_awal` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` datetime NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang_tabel`
--

INSERT INTO `barang_tabel` (`id_barang`, `id_user`, `nama`, `detail`, `harga_awal`, `deadline`, `gambar`, `status`) VALUES
(2, 1, 'Pistol Antik tahun 1759', NULL, '99000000', '2017-10-02 00:00:00', NULL, 'Belum Tervalidasi'),
(3, 1, 'mobil antik 4567', 'dacadh ajy da', '131133', '2017-10-04 09:37:00', 'http://localhost/kppl/assets/images/GALERI_3647601.png', 'Belum Tervalidasi'),
(4, 1, 'rumah impian', 'ahdyc ahys adhhada', '2300121', '2017-10-19 09:44:00', 'http://localhost/kppl/assets/images/GALERI_6925001.jpg', 'Sudah Tervalidasi'),
(5, 1, 'mobil antik  12345', 'dacadh ajy da', '131133', '2017-10-05 03:37:00', 'http://localhost/kppl/assets/images/GALERI_1714823.png', 'Sudah Tervalidasi'),
(6, 1, 'test', 'testing', '10000', '2017-10-10 20:06:00', 'http://localhost/kppl/assets/images/GALERI_7493857', 'Belum Tervalidasi');

-- --------------------------------------------------------

--
-- Table structure for table `dompet_tabel`
--

CREATE TABLE `dompet_tabel` (
  `id_amount` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dompet_tabel`
--

INSERT INTO `dompet_tabel` (`id_amount`, `id_user`, `jumlah`, `jenis`) VALUES
(1, 1, '120000', 'plus'),
(2, 1, '3000', 'minus'),
(4, 1, '5000', 'minus'),
(5, 800, '1000000', 'plus'),
(6, 3, '1000000', 'plus');

-- --------------------------------------------------------

--
-- Table structure for table `pelelang_tabel`
--

CREATE TABLE `pelelang_tabel` (
  `id_pelelang` int(11) NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelelang_tabel`
--

INSERT INTO `pelelang_tabel` (`id_pelelang`, `nama`, `alamat`, `username`, `email`, `password`, `timestamp`) VALUES
(1, NULL, NULL, 'lelang', 'lelang@mail', '$2a$08$JzrJkUw.B6Bo19ScwiCG6uV.HPSJoSpfLmUFEWfZHrKYuG6M4a6F6', '2017-10-03 13:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `penawaran_tabel`
--

CREATE TABLE `penawaran_tabel` (
  `id_penawaran` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tawaran` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penawaran_tabel`
--

INSERT INTO `penawaran_tabel` (`id_penawaran`, `id_barang`, `id_user`, `tawaran`, `timestamp`) VALUES
(2, 5, 800, '150001', '2017-10-04 04:34:07'),
(4, 4, 3, '100000000', '2017-10-12 08:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `penawar_tabel`
--

CREATE TABLE `penawar_tabel` (
  `id_penawar` int(11) NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penawar_tabel`
--

INSERT INTO `penawar_tabel` (`id_penawar`, `nama`, `alamat`, `username`, `email`, `password`, `timestamp`) VALUES
(3, NULL, NULL, 'penawar', 'burhan@mail.com', '$2a$08$MZ.tEBu40a0N3ZXPC5joOOIL0bO11t2/WSMLrS/aRJyvzPhbn4RBO', '2017-10-01 15:53:45'),
(800, NULL, NULL, 'penawar2', 'pena@war', '$2a$08$ww8qoUdIuSsaY/DUGkrtdOsI0oolcOj9KwJ3OtOUdGubHUjXx3H6O', '2017-10-04 03:53:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tabel`
--
ALTER TABLE `admin_tabel`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `barang_tabel`
--
ALTER TABLE `barang_tabel`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `dompet_tabel`
--
ALTER TABLE `dompet_tabel`
  ADD PRIMARY KEY (`id_amount`);

--
-- Indexes for table `pelelang_tabel`
--
ALTER TABLE `pelelang_tabel`
  ADD PRIMARY KEY (`id_pelelang`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Indexes for table `penawaran_tabel`
--
ALTER TABLE `penawaran_tabel`
  ADD PRIMARY KEY (`id_penawaran`);

--
-- Indexes for table `penawar_tabel`
--
ALTER TABLE `penawar_tabel`
  ADD PRIMARY KEY (`id_penawar`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tabel`
--
ALTER TABLE `admin_tabel`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang_tabel`
--
ALTER TABLE `barang_tabel`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dompet_tabel`
--
ALTER TABLE `dompet_tabel`
  MODIFY `id_amount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelelang_tabel`
--
ALTER TABLE `pelelang_tabel`
  MODIFY `id_pelelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penawaran_tabel`
--
ALTER TABLE `penawaran_tabel`
  MODIFY `id_penawaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penawar_tabel`
--
ALTER TABLE `penawar_tabel`
  MODIFY `id_penawar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=801;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
