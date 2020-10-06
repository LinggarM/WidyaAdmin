-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2019 at 07:28 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id10709872_widyatraveldb`
--
CREATE DATABASE IF NOT EXISTS `id10709872_widyatraveldb` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id10709872_widyatraveldb`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(2) NOT NULL,
  `nama_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `password`) VALUES
(1, 'Linggar Maretva Cendani', 'linggarmc@gmail.com', '24060117120031'),
(2, 'Muhammad Rizky Ardani', 'ardani@gmail.com', '24060117140067'),
(3, 'Selvi Fitria Khoerunnisa', 'selvi@gmail.com', '24060117120040'),
(4, 'Muhammad Zulpa Ladun Hakim', 'zulpa@gmail.com', '24060117120025');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto_profil` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_customer`, `nama_customer`, `no_hp`, `email`, `password`, `alamat`, `foto_profil`) VALUES
(2, 'Hanif Ramadhani', '088888888888', 'hanif@gmail.com', 'hanif123', 'Jl. Tlogosari no. 2', 'NULL'),
(3, 'Johanadi Santoso', '083333333333', 'johan@gmail.com', 'johan123', 'Jl. Mulawarman no. 42', 'NULL'),
(4, 'Linggar Maretva Cendani', '08817678194', 'linggar@gmail.com', 'haris123', 'Jalan Timoho Timur no. 1', 'NULL'),
(7, 'Ahmad Ainun Herlambang', '087777777777', 'ainun@gmail.com', 'ainun123', 'Jalan Tunjungsari no. 9', 'NULL'),
(8, 'Rizky Syaiful Fattah', '085555555559', 'syaiful@gmail.com', 'syaiful123', 'Jl. Banjarsari no. 48', 'NULL'),
(9, 'Muhammad Christie', '08817678194', 'christie123@gmail.com', 'johny123', 'Bandingan RT005/RW001, Bawang, Banjarnegara', NULL),
(10, 'selvi', '082327823546', 'selvi@gmail.com', 'selvi', 'Tembalang', NULL),
(11, 'xybitz', '089635231612', 'aa@gmail.com', '123', 'yut', NULL),
(13, 'samuel', '085229773147', 'muhammadzulpa007@gmail.com', 'IMAJINASI', 'jl gerungsari wisma 55', NULL),
(14, 'Ardani', '089765432123', 'ard@gmail.com', '123', 'jln baskoro', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id_driver` int(11) NOT NULL,
  `nama_driver` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto_profil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_mobil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id_driver`, `nama_driver`, `no_hp`, `email`, `password`, `foto_profil`, `id_mobil`) VALUES
(1, 'Declan Davison', '085432654543', 'declan123@gmail.com', 'declan123', 'NULL', 1),
(2, 'Christoper Mcmillan', '083333333333', 'chris007@gmail.com', 'chris007', 'NULL', 2),
(3, 'Toby Mendez', '088888888888', 'toby001@gmail.com', 'toby001', 'NULL', 3),
(4, 'Tommie Delacruz', '087777777777', 'tommie33@gmail.com', 'tommie33', 'NULL', 4),
(5, 'Clint Barton', '081234567890', 'clintavengers@gmail.com', 'clintavengers', 'NULL', 5),
(6, 'Muhammad Johan', '088908765432', 'ilyas123@gmail.com', 'ilyas123', 'NULL', 6),
(7, 'Bambang Suteja', '081098765432', 'bambangs@gmail.com', 'bambangs', 'NULL', 7),
(8, 'Hamzah Phillips', '081234123412', 'HamzahPhillips@gmail.com', 'HamzahPhillips', 'NULL', 8),
(9, 'Adil any', '087126351436', 'Adilany@gmail.com', 'Adil any', 'NULL', 9),
(10, 'Alli Zayn', '087126351431', 'Allizayn@gmail.com', 'Allizayn', 'NULL', 10),
(11, 'Muhammad Ilyas', '087126351432', 'MuhammadIlyas@gmail.com', 'Muhammad Ilyas', 'NULL', 11),
(12, 'Muhammad Amin', '087126351439', 'MuhammadAmin@gmail.com', 'Muhammad Ilyas', 'NULL', 12),
(13, 'Muhammad Karim', '087126351433', 'MuhammadKarim@gmail.com', 'Muhammad Karim', 'NULL', 13),
(14, 'Edwin Will', '087126351430', 'EdwinWill@gmail.com', 'Edwin Will', 'NULL', 14),
(15, 'Rain Wiyt', '08342123432', 'RainWiyt@gmail.com', 'Rain Wiyt', 'NULL', 15),
(16, 'Verity Lowe', '087126351401', 'VerityLowe@gmail.com', 'Verity Lowe', 'NULL', 16),
(17, 'Edwin Murp', '087126351400', 'EdwinMurp@gmail.com', 'Edwin Murp', 'NULL', 17),
(18, 'Muh Mark', '087126351401', 'MuhMark@gmail.com', 'Muh Mark', 'NULL', 18),
(19, 'Muh Will', '087126351402', 'MuhWill@gmail.com', 'Muh Will', 'NULL', 19),
(20, 'Joel Will', '087126351403', 'JoelWill@gmail.com', 'Joel Will', 'NULL', 20),
(21, 'Muh Ryan', '087126351404', 'MuhRyan@gmail.com', 'Muh Ryan', 'NULL', 21),
(22, 'Muh Yudha', '087126351405', 'MuhYudha@gmail.com', 'Muh Yudha', 'NULL', 22),
(23, 'Muh Ilman', '087126351407', 'MuhIlman@gmail.com', 'Muh Ilman', 'NULL', 23),
(24, 'Ryan Hazard', '087126351411', 'RyanHazard@gmail.com', 'Ryan Hazard', 'NULL', 24),
(25, 'Hazard Said', '087126351412', 'HazardSaid@gmail.com', 'Hazard Said', 'NULL', 25),
(26, 'Said Lyn', '087126351413', 'SaidLyn@gmail.com', 'Said Lyn', 'NULL', 26),
(27, 'Lyn Hais', '087126351413', 'LynHais@gmail.com', 'Lyn Hais', 'NULL', 27),
(28, 'Hays Mike', '087126351415', 'HaysMike@gmail.com', 'Hays Mike', 'NULL', 28),
(29, 'Mike Tyson', '087126351416', 'MikeTyson@gmail.com', 'Mike Tyson', 'NULL', 29),
(30, 'Tyson Abdullah', '087126351421', 'TysonAbdullah@gmail.com', 'Tyson Abdullah', 'NULL', 30),
(31, 'Abdil', '087126351412', 'Abdil@gmail.com', 'Abdil', 'NULL', 31),
(32, 'Hyuga Kagama', '087126351786', 'hyuga@gmail.com', 'hyuga', 'NULL', 32),
(33, 'Yazid', '087126351443', 'Yazid@gmail.com', 'Yazid', 'NULL', 33),
(34, 'Fany Muh', '087126351431', 'Fany Muh@gmail.com', 'Fany Muh', 'NULL', 34),
(35, 'Mahmud', '087126351491', 'Mahmud@gmail.com', 'Mahmud', 'NULL', 35),
(36, 'Hasyim Akbam', '087126351418', 'HasyimAkbam@gmail.com', 'Hasyim Akbam', 'NULL', 36),
(37, 'Akbar Maulana', '087126351417', 'AkbarMaulana@gmail.com', 'Akbar Maulana', 'NULL', 37),
(38, 'Akbar Lim', '087126351123', 'AkbarLim@gmail.com', 'Akbar Lim', 'NULL', 38),
(39, 'Amri Ilham', '087126351134', 'AmriIlham@gmail.com', 'Amri Ilham', 'NULL', 39),
(40, 'Nur Ilham', '087126351743', 'NurIlham@gmail.com', 'Nur Ilham', 'NULL', 40),
(41, 'Layloud', '087126351487', 'Layloud@gmail.com', 'Layloud', 'NULL', 41),
(42, 'Lancelot', '087126351987', 'Lancelot@gmail.com', 'Lancelot', 'NULL', 42),
(43, 'Muh Alucard', '087126351143', 'MuhAlucard@gmail.com', 'Muh Alucard', 'NULL', 43),
(44, 'Alliando Zayn', '087126351512', 'AlliandoZayn@gmail.com', 'Alliando Zayn', 'NULL', 44),
(45, 'Llyod Lown', '087126353123', 'LlyodLown@gmail.com', 'Llyod Lown', 'NULL', 45),
(46, 'Makoto Yuki', '087126356321', 'MakotoYuki@gmail.com', 'Makoto Yuki', 'NULL', 46),
(47, 'Touma Moi', '087126351578', 'ToumaMoi@gmail.com', 'Touma Moi', 'NULL', 47),
(48, 'Makoto Shinkai', '087126353124', 'Makoto Shinkai@gmail.com', 'Makoto Shinkai', 'NULL', 48),
(49, 'Eren Ackerman', '087126358367', 'ErenAckerman@gmail.com', 'Eren Ackerman', 'NULL', 49),
(50, 'Bayu Mukti', '087126309427', 'BayuMukti@gmail.com', 'Bayu Mukti', 'NULL', 50),
(51, 'Julius Andriawan', '089137378921', 'julius089@gmail.com', 'julius089', 'NULL', 51),
(52, 'Diego Alamsyah', '083797589432', 'diego123@gmail.com', 'diego123', 'NULL', 52),
(53, 'Desire Demidson', '083333333999', 'desire123@gmail.com', 'desire123', 'NULL', 53),
(54, 'Henry Johansson', '088176781946', 'johansson@gmail.com', 'johansson', 'NULL', 54),
(55, 'Wahyu Adi Kusuma', '084444444444', 'wahyu@gmail.com', 'wahyu123', 'NULL', 55),
(56, 'David Dos Santos', '087777666555', 'david44@gmail.com', 'david44', 'NULL', 56);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
(1, 'Banyumas'),
(2, 'Batang'),
(3, 'Boyolali'),
(4, 'Brebes'),
(5, 'Cilacap'),
(6, 'Demak'),
(7, 'Kebumen'),
(8, 'Kendal'),
(9, 'Kudus'),
(10, 'Magelang'),
(11, 'Pati'),
(12, 'Pekalongan'),
(13, 'Pemalang'),
(14, 'Purbalingga'),
(15, 'Purworejo'),
(16, 'Rembang'),
(17, 'Salatiga'),
(18, 'Semarang'),
(19, 'Surakarta'),
(20, 'Tegal'),
(21, 'Temanggung'),
(22, 'Wonosobo'),
(23, 'Yogyakarta'),
(24, 'Banjarnegara');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `plat_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_driver` int(11) NOT NULL,
  `kapasitas` int(10) NOT NULL,
  `tersedia` int(2) NOT NULL,
  `rute` int(11) NOT NULL,
  `waktu_berangkat` int(11) NOT NULL,
  `dari_semarang` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `plat_no`, `id_driver`, `kapasitas`, `tersedia`, `rute`, `waktu_berangkat`, `dari_semarang`) VALUES
(1, 'H 5678 AC', 1, 10, 8, 1, 1, 1),
(2, 'H 3369 GR', 2, 10, 10, 2, 1, 1),
(3, 'H 7784 DW', 3, 10, 10, 3, 1, 1),
(4, 'H 7654 SW', 4, 10, 10, 4, 1, 1),
(5, 'H 4567 JK', 5, 10, 10, 5, 1, 1),
(6, 'H 4567 JK', 6, 10, 10, 1, 1, 2),
(7, 'R 4556 SW', 7, 10, 10, 2, 1, 2),
(8, 'H 1234 QW', 8, 10, 10, 3, 1, 2),
(9, 'H 1234 QE', 9, 10, 10, 4, 1, 2),
(10, 'H 1234 QR', 10, 10, 10, 5, 1, 2),
(11, 'H 1234 QT', 11, 10, 10, 1, 2, 1),
(12, 'H 1234 QY', 12, 10, 10, 2, 2, 1),
(13, 'H 1234 QI', 13, 10, 10, 3, 2, 1),
(14, 'H 1234 QO', 14, 10, 10, 4, 2, 1),
(15, 'H 1234 QP', 15, 10, 10, 5, 2, 1),
(16, 'H 2134 QA', 16, 10, 10, 1, 2, 2),
(17, 'H 2314 R', 17, 10, 10, 2, 2, 2),
(18, 'H 1234 QA', 18, 10, 10, 3, 2, 2),
(19, 'H 1234 QS', 19, 10, 10, 4, 2, 2),
(20, 'H 1234 QD', 20, 10, 10, 5, 2, 2),
(21, 'H 1234 QD', 21, 10, 10, 1, 3, 1),
(22, 'H 2134 QW', 22, 10, 10, 2, 3, 1),
(23, 'H 1243 QW', 23, 10, 10, 3, 3, 1),
(24, 'H 2314 RA', 24, 10, 10, 4, 3, 1),
(25, 'H 4321 QW', 25, 10, 10, 5, 3, 1),
(26, 'H 3212 QW', 26, 10, 10, 1, 3, 2),
(27, 'H 1432 RE', 27, 10, 10, 2, 3, 2),
(28, 'H 5132 QW', 28, 10, 10, 3, 3, 2),
(29, 'H 2143 RE', 29, 10, 10, 4, 3, 2),
(30, 'H 3216 WQ', 30, 10, 10, 5, 3, 2),
(31, 'H 2354 QE', 31, 10, 10, 1, 4, 1),
(32, 'H 2562 JK', 32, 10, 10, 2, 4, 1),
(33, 'H 3432 AD', 33, 10, 10, 3, 4, 1),
(34, 'H 3412 AS', 34, 10, 10, 4, 4, 1),
(35, 'H 6512 AQ', 35, 10, 10, 5, 4, 1),
(36, 'H 2612 LO', 36, 10, 10, 1, 4, 2),
(37, 'H 8765 AD', 37, 10, 10, 2, 4, 2),
(38, 'H 2617 AW', 38, 10, 10, 3, 4, 2),
(39, 'H 2019 AS', 39, 10, 10, 4, 4, 2),
(40, 'H 3215 AQ', 40, 10, 10, 5, 4, 2),
(41, 'H 2091 HT', 41, 10, 10, 1, 5, 1),
(42, 'H 3214 LO', 42, 10, 10, 2, 5, 1),
(43, 'H 2957 AZ', 43, 10, 10, 3, 5, 1),
(44, 'H 0543 NM', 44, 10, 10, 4, 5, 1),
(45, 'H 5790 HQ', 45, 10, 10, 5, 5, 1),
(46, 'H 2819 LI', 46, 10, 10, 1, 5, 2),
(47, 'H 9031 GF', 47, 10, 10, 2, 5, 2),
(48, 'H 7381 WE', 48, 10, 10, 3, 5, 2),
(49, 'H 9281 TR', 49, 10, 10, 4, 5, 2),
(50, 'H 3628 ZA', 50, 10, 10, 5, 5, 2),
(51, 'R 3679 DW', 51, 10, 1, 6, 1, 1),
(52, 'H 8601 RW', 52, 10, 1, 6, 1, 1),
(53, 'H 5698 DW', 53, 10, 1, 6, 1, 1),
(54, 'H 7784 DW', 54, 10, 1, 6, 1, 1),
(55, 'H 4567 JK', 55, 10, 1, 6, 1, 1),
(56, 'R 0912 DK', 56, 10, 0, 6, 1, 1),
(57, 'H 6543 AS', 57, 10, 10, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `id_rute` int(11) NOT NULL,
  `nama_rute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kota_awal` int(11) NOT NULL,
  `kota_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`id_rute`, `nama_rute`, `kota_awal`, `kota_akhir`) VALUES
(1, 'Semarang - Cilacap', 18, 5),
(2, 'Semarang - Yogyakarta', 18, 23),
(3, 'Semarang - Brebes', 18, 4),
(4, 'Semarang - Rembang', 18, 16),
(5, 'Semarang - Surakarta', 18, 19);

-- --------------------------------------------------------

--
-- Table structure for table `status_transaksi`
--

CREATE TABLE `status_transaksi` (
  `id_status_transaksi` int(11) NOT NULL,
  `nama_status_transaksi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_transaksi`
--

INSERT INTO `status_transaksi` (`id_status_transaksi`, `nama_status_transaksi`) VALUES
(1, 'Dipesan'),
(2, 'Diproses'),
(3, 'Selesai'),
(4, 'Dibatalkan');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_individu`
--

CREATE TABLE `transaksi_individu` (
  `kode_transaksi` int(11) NOT NULL,
  `id_driver` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `kota_penjemputan` int(11) NOT NULL,
  `lokasi_penjemputan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kota_tujuan` int(11) NOT NULL,
  `tanggal_penjemputan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `waktu_penjemputan` int(11) NOT NULL,
  `harga` int(20) NOT NULL,
  `jumlah_orang` int(11) NOT NULL,
  `status_transaksi` int(11) NOT NULL,
  `rating` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaksi_individu`
--

INSERT INTO `transaksi_individu` (`kode_transaksi`, `id_driver`, `id_customer`, `kota_penjemputan`, `lokasi_penjemputan`, `kota_tujuan`, `tanggal_penjemputan`, `waktu_penjemputan`, `harga`, `jumlah_orang`, `status_transaksi`, `rating`) VALUES
(2, 31, 4, 18, 'Jalan Banjarsari No. 58 B', 24, 'Fri, 29 November 2019', 4, 100000, 1, 4, 0),
(6, 21, 4, 18, 'Jl. Timoho Timur 1', 24, 'Thu, 07 Nov 2019', 3, 100000, 1, 4, 0),
(7, 11, 13, 1, 'alun- purwokerto', 5, 'Thu, 07 Nov 2019', 2, 200000, 2, 4, 0),
(8, 41, 4, 18, 'Timoho', 24, 'Wed, 13 Nov 2019', 5, 100000, 1, 4, 0),
(9, 1, 4, 1, 'Banyuputih', 5, 'Sat, 16 Nov 2019', 1, 300000, 3, 1, 0),
(10, 1, 10, 18, 'tembalang', 21, '', 1, 200000, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_rental`
--

CREATE TABLE `transaksi_rental` (
  `kode_transaksi` int(11) NOT NULL,
  `id_driver` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `kota_peminjaman` int(11) NOT NULL,
  `lokasi_peminjaman` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_peminjaman` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `waktu_peminjaman` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lama_peminjaman(hari)` int(11) NOT NULL,
  `harga` int(20) NOT NULL,
  `status_transaksi` int(11) NOT NULL,
  `rating` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaksi_rental`
--

INSERT INTO `transaksi_rental` (`kode_transaksi`, `id_driver`, `id_customer`, `kota_peminjaman`, `lokasi_peminjaman`, `tanggal_peminjaman`, `waktu_peminjaman`, `lama_peminjaman(hari)`, `harga`, `status_transaksi`, `rating`) VALUES
(2, 56, 4, 24, 'Bandingan RT03/RW01', 'Tue, 24 Desember 2019', '1', 1, 500000, 4, 0),
(4, 56, 13, 18, 'jl. gerungsari', 'Thu, 07 Nov 2019', '1', 2, 1000000, 4, 0),
(5, 56, 10, 18, 'tembalang', 'Wed, 13 Nov 2019', '1', 1, 500000, 4, 0),
(6, 56, 4, 17, 'IBUKOTA SALATIGA', 'Wed, 13 Nov 2019', '5', 3, 1500000, 4, 0),
(7, 56, 10, 18, 'Tembalang', 'Thu, 21 Nov 2019', '1', 2, 1000000, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `waktu_berangkat`
--

CREATE TABLE `waktu_berangkat` (
  `id_waktu_berangkat` int(11) NOT NULL,
  `nama_waktu_berangkat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waktu_berangkat`
--

INSERT INTO `waktu_berangkat` (`id_waktu_berangkat`, `nama_waktu_berangkat`) VALUES
(1, '07.00'),
(2, '10.00'),
(3, '13.00'),
(4, '16.00'),
(5, '19.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`id_rute`);

--
-- Indexes for table `transaksi_individu`
--
ALTER TABLE `transaksi_individu`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `transaksi_rental`
--
ALTER TABLE `transaksi_rental`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id_driver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `transaksi_individu`
--
ALTER TABLE `transaksi_individu`
  MODIFY `kode_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi_rental`
--
ALTER TABLE `transaksi_rental`
  MODIFY `kode_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
