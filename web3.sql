-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2017 at 04:37 AM
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
-- Database: `web3`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id_akses` int(11) NOT NULL,
  `akses` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `akses`, `status`) VALUES
(1, 'user', 1),
(2, 'jabatan', 1),
(4, 'akses', 1),
(5, 'tingkatan', 1),
(6, 'informasi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `informasi` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `informasi`, `status`) VALUES
(1, 'Surabaya Job Fair', 1),
(2, 'Teman', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `extra` varchar(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `extra`, `status`) VALUES
(1, 'Web Developer', '1', 1),
(2, 'Marketing', '0', 1),
(3, 'Staff Operasional', '0', 1),
(5, 'Designer', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lamaran_id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `rate` varchar(255) NOT NULL,
  `tgl_komen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `user_id`, `lamaran_id`, `isi`, `rate`, `tgl_komen`) VALUES
(239, 3, 150, 'Meragukan', 'P0', '2017-10-16'),
(242, 3, 150, 'Ok', 'Y1', '2017-10-16'),
(243, 3, 150, 'Ok', 'Y2', '2017-10-16'),
(244, 1, 150, 'ok', 'Y3', '2017-10-16'),
(245, 1, 150, 'ok', 'Lulus', '2017-10-16'),
(246, 1, 152, 'Manual', 'Y1', '2017-10-17'),
(247, 1, 152, 'gak', 'N1', '2017-10-17'),
(249, 1, 151, 'gk', 'N', '2017-10-17'),
(250, 1, 155, 'Manual', 'Y1', '2017-10-18'),
(252, 1, 154, 'cek', 'C', '2017-10-18'),
(253, 1, 154, 'Meragukan', 'P0', '2017-10-18'),
(254, 1, 154, 'Ok', 'Y0', '2017-10-18'),
(262, 1, 153, 'io', 'C', '2017-10-18'),
(263, 1, 153, 'gas', 'Y', '2017-10-18'),
(264, 1, 153, 'zeeb', 'Y1', '2017-10-18'),
(265, 1, 155, 'g\r\ng\r\ng\r\ng\r\n', 'C1', '2017-10-19'),
(266, 1, 156, 'Manual', 'Y1', '2017-10-20'),
(267, 1, 156, 'aa \\n gg', 'C1', '2017-10-20'),
(268, 1, 156, 'gg <br> a', 'C1', '2017-10-20'),
(269, 1, 157, 'Manual', 'Y0', '2017-10-20'),
(270, 1, 158, 'Manual', 'Y0', '2017-10-23'),
(271, 1, 159, 'Manual', 'Y0', '2017-10-23'),
(272, 1, 159, 'gg', 'Y1', '2017-10-23'),
(273, 1, 161, 'Manual', 'Y0', '2017-10-24'),
(274, 1, 161, 'o', 'C1', '2017-10-24'),
(275, 1, 161, 'g', 'C1', '2017-10-24'),
(276, 1, 159, 'm', 'C2', '2017-10-24'),
(277, 1, 163, 'Manual', 'Y0', '2017-10-24'),
(278, 1, 163, 'ini <br> komentar', 'C1', '2017-10-24'),
(279, 3, 163, 'gg', 'C1', '2017-10-24'),
(280, 1, 165, 'Manual', 'Y0', '2017-10-24'),
(281, 1, 152, 'Kesalahan Penolakan', 'P1', '2017-10-24'),
(282, 1, 152, 'tak tolak lagi', 'N1', '2017-10-24'),
(283, 1, 152, 'Kesalahan Penolakan', 'P1', '2017-10-24'),
(284, 1, 152, 'gk', 'N1', '2017-10-24'),
(285, 1, 152, 'Kesalahan Penolakan', 'P1', '2017-10-24'),
(286, 1, 152, 'gk', 'N1', '2017-10-24'),
(287, 1, 152, 'Kesalahan Penolakan', 'P1', '2017-10-24'),
(288, 1, 152, 'gk', 'N1', '2017-10-24'),
(289, 1, 152, 'Kesalahan Penolakan', 'P1', '2017-10-24'),
(290, 1, 152, 'gk', 'N1', '2017-10-24'),
(291, 1, 152, 'Kesalahan Penolakan', 'P1', '2017-10-24'),
(292, 1, 152, 'gk', 'N1', '2017-10-24'),
(293, 1, 152, 'Kesalahan Penolakan', 'P1', '2017-10-24'),
(294, 1, 152, 'gk', 'N1', '2017-10-24'),
(295, 1, 151, 'Kesalahan Penolakan', 'P', '2017-10-24'),
(296, 1, 151, 'tolak', 'N', '2017-10-24'),
(297, 1, 151, 'Kesalahan Penolakan', 'P', '2017-10-24'),
(298, 1, 152, 'Kesalahan Penolakan', 'P1', '2017-10-24'),
(299, 1, 158, 'gk', 'N1', '2017-10-24'),
(300, 1, 158, 'Kesalahan Penolakan', 'P1', '2017-10-24'),
(301, 1, 152, 'gk', 'N1', '2017-10-24'),
(302, 1, 152, 'Kesalahan Penolakan', 'P1', '2017-10-24'),
(303, 1, 160, 'tes', 'C', '2017-10-24'),
(304, 1, 152, 'tertolak', 'N1', '2017-10-24'),
(305, 1, 152, 'Kesalahan Penolakan', 'P1', '2017-10-24'),
(306, 1, 160, 'gg<br />\r\nok', 'C', '2017-10-25'),
(307, 1, 160, 'Tidak Cocok', 'N0', '2017-10-25'),
(308, 1, 159, 'mm<br />\r\nmm', 'C2', '2017-10-26'),
(309, 1, 169, 'Manual', 'Y0', '2017-10-26'),
(310, 8, 167, 'ok', 'Y', '2017-10-26'),
(311, 8, 167, 'gg', 'Y1', '2017-10-26');

-- --------------------------------------------------------

--
-- Table structure for table `lamaran`
--

CREATE TABLE `lamaran` (
  `id_lamaran` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `no_wa` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jabatan_id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `dll` varchar(255) DEFAULT NULL,
  `ket` text NOT NULL,
  `informasi` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `kepribadian` varchar(255) NOT NULL,
  `tgl_diterima` date NOT NULL,
  `mulai` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `level` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lamaran`
--

INSERT INTO `lamaran` (`id_lamaran`, `nama`, `tgl_lahir`, `gender`, `agama`, `alamat`, `kota`, `pendidikan`, `no_telp`, `no_wa`, `email`, `jabatan_id`, `foto`, `cv`, `ktp`, `dll`, `ket`, `informasi`, `tgl`, `kepribadian`, `tgl_diterima`, `mulai`, `tgl_keluar`, `level`, `status`) VALUES
(150, 'Tes', '2000-10-16', 'Laki-Laki', 'Islam', 'Jl Jalan', 'Surabaya', 'Sma Sederajat', '081222233425', '081222233425', 'email@email.com', 1, 'Tes.gif', 'Tes.pdf', 'Tes1.gif', 'Tes1.pdf', '', '', '2017-10-16', '', '2017-10-16', '0000-00-00', '0000-00-00', 'Lulus', 1),
(151, 'Coba', '2000-10-16', 'Laki-Laki', 'Islam', 'Jl Jalan', 'Surabaya', 'Sma Sederajat', '081222233425', '081222233425', 'email@email.com', 2, 'Coba.jpg', 'Coba.pdf', 'Coba1.jpg', NULL, '', '', '2017-10-16', '', '0000-00-00', '0000-00-00', '0000-00-00', 'P', 1),
(152, 'Nyoba', '2000-10-17', 'Laki-Laki', 'Islam', NULL, 'Surabaya', 'Sma Sederajat', '081222233425', '0', 'email@email.com', 1, NULL, NULL, NULL, NULL, '', '', '2017-10-17', '', '0000-00-00', '0000-00-00', '0000-00-00', 'P1', 1),
(153, 'Design', '2000-10-17', 'Laki-Laki', 'Islam', 'Jl Jalan', 'Surabaya', 'Sma Sederajat', '081222233425', '081222233425', 'email@email.com', 5, 'Design.jpg', 'Design.pdf', 'Design1.jpg', 'Design1.pdf', '', '', '2017-10-17', '', '0000-00-00', '0000-00-00', '0000-00-00', 'Y2', 1),
(154, 'GG', '2000-10-18', 'Laki-Laki', 'Islam', 'Jl Jalan', 'Surabaya', 'Sma Sederajat', '081222233425', '081222233425', 'email@email.com', 5, 'GG.jpg', 'GG.pdf', 'GG1.jpg', 'GG1.pdf', 'GG', 'Surabaya Job Fair', '2017-10-18', '', '0000-00-00', '0000-00-00', '0000-00-00', 'Y1', 1),
(155, 'Market', '2000-10-18', 'Perempuan', 'Kristen(Katolik & Protestan)', NULL, 'Surabaya', 'Sma Sederajat', '081222233425', '0', 'email@email.com', 2, NULL, NULL, NULL, NULL, '', 'Teman', '2017-10-18', '', '0000-00-00', '0000-00-00', '0000-00-00', 'Y1', 1),
(156, 'TeFF', '2000-10-20', 'Laki-Laki', 'Islam', NULL, 'Surabaya', 'Sma Sederajat', '081222233425', '0', NULL, 1, NULL, NULL, NULL, NULL, '', 'Surabaya Job Fair', '2017-10-20', '', '0000-00-00', '0000-00-00', '0000-00-00', 'Y1', 1),
(157, 'EE', '2000-10-20', 'Laki-Laki', 'Islam', NULL, 'Surabaya', 'Diploma', '081222233425', '0', 'email@email.com', 2, NULL, NULL, NULL, NULL, '', 'Surabaya Job Fair', '2017-10-20', '', '0000-00-00', '0000-00-00', '0000-00-00', 'Y1', 1),
(158, 'Tes', '2000-10-23', 'Laki-Laki', 'Islam', NULL, 'Surabaya', 'Sma Sederajat', '081222233425', '0', 'email@email.com', 2, NULL, NULL, NULL, NULL, 'gg', 'Surabaya Job Fair', '2017-10-23', '', '0000-00-00', '0000-00-00', '0000-00-00', 'P1', 1),
(159, 'zig', '2000-10-23', 'Laki-Laki', 'Kristen(Katolik & Protestan)', NULL, 'Surabaya', 'Sma Sederajat', '081222233425', '081121212121', 'email@email.com', 1, NULL, NULL, NULL, NULL, '', 'Surabaya Job Fair', '2017-10-23', '', '0000-00-00', '0000-00-00', '0000-00-00', 'Y2', 1),
(160, 'v', '2000-10-23', 'Laki-Laki', 'Kristen(Katolik & Protestan)', 'jl jalan', 'Surabaya', 'Diploma', '081222233425', '081222233425', 'email@email.com', 2, 'v.gif', 'v.docx', 'v1.gif', 'v1.docx', '', 'Surabaya Job Fair', '2017-10-23', '', '0000-00-00', '0000-00-00', '0000-00-00', 'N0', 1),
(161, 'm', '1998-10-24', 'Laki-Laki', 'Kristen(Katolik & Protestan)', NULL, 'Surabaya', 'Sma Sederajat', '081222233425', '081121212121', 'email@email.com', 1, NULL, NULL, NULL, NULL, '', 'Surabaya Job Fair', '2017-10-24', '', '0000-00-00', '0000-00-00', '0000-00-00', 'Y1', 1),
(162, 'St', '2000-10-24', 'Laki-Laki', 'Kristen(Katolik & Protestan)', 'Jl Jalan', 'Surabaya', 'Diploma', '081222233425', '081121212121', 'email@email.com', 3, 'St.gif', 'St.docx', 'St1.gif', 'St1.docx', '', 'Teman', '2017-10-24', '', '0000-00-00', '0000-00-00', '0000-00-00', '0', 0),
(163, 'Www', '1997-10-24', 'Laki-Laki', 'Hindu', NULL, 'Surabaya', 'Sma Sederajat', '081222233425', '', 'email@email.com', 1, NULL, NULL, NULL, NULL, '', 'Teman', '2017-10-24', '', '0000-00-00', '0000-00-00', '0000-00-00', 'Y1', 1),
(164, 'cek', '2000-10-24', 'Laki-Laki', 'Islam', 'Jl jalan', 'Surabaya', 'Sma Sederajat', '08121987148914984128', '01238091238091247102', 'email@email.com', 5, 'cek.gif', 'cek.docx', 'cek1.gif', 'cek1.docx', 'saya pro', 'Surabaya Job Fair', '2017-10-24', '', '0000-00-00', '0000-00-00', '0000-00-00', '0', 1),
(165, 'Marketed', '1995-10-24', 'Perempuan', 'Kong Hu Cu', NULL, 'Surabaya', 'Sma Sederajat', '08121987148914984128', '01238091238091247102', 'email@email.com', 2, NULL, NULL, NULL, NULL, '', 'Surabaya Job Fair', '2017-10-24', '', '0000-00-00', '0000-00-00', '0000-00-00', 'Y1', 1),
(166, 'aa', '2000-10-25', 'Laki-Laki', 'Islam', 'Jl jalan', 'sby', 'Sma Sederajat', '08132987128791498148', '08917329813289137298', 'email@email.com', 2, 'aa.gif', 'aa.docx', 'aa1.gif', NULL, 'your bottom tower<br />\r\nis under attack', 'pacar', '2017-10-25', '', '0000-00-00', '0000-00-00', '0000-00-00', '0', 1),
(167, 'zz', '2000-10-25', 'Laki-Laki', 'Buddha', 'jl jalan', 'sby', 'Sma Sederajat', '08189143941894398324', '08298139841398134941', 'email@email.com', 3, 'zz.gif', 'zz.docx', 'zz1.gif', NULL, 'gg<br />\r\nmonster kill', 'Surabaya Job Fair', '2017-10-25', '', '0000-00-00', '0000-00-00', '0000-00-00', 'Y2', 1),
(168, 'mm', '2000-10-25', 'Perempuan', 'Kristen(Katolik & Protestan)', 'jl jalan', 'sby', 'Sma Sederajat', '08189143941894398324', '08128721832184424412', 'email@email.com', 2, 'mm.gif', 'mm.docx', 'mm1.gif', NULL, '', 'Surabaya Job Fair', '2017-10-25', '', '0000-00-00', '0000-00-00', '0000-00-00', '0', 1),
(169, 'kk', '1997-10-26', 'Laki-Laki', 'Hindu', NULL, 'sby', 'Sma Sederajat', '08178314871478147847', '', NULL, 1, NULL, NULL, NULL, NULL, '', 'Surabaya Job Fair', '2017-10-26', '', '0000-00-00', '0000-00-00', '0000-00-00', 'Y1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `user_id`, `ket`, `waktu`) VALUES
(252, 1, 'Mengomentari Tes', '2017-10-16 19:33:36'),
(253, 3, 'Mengomentari Tes', '2017-10-16 19:46:47'),
(254, 3, 'Mengomentari Tes', '2017-10-16 19:50:25'),
(255, 3, 'Mengomentari Tes', '2017-10-16 19:53:15'),
(256, 3, 'Mengomentari Tes', '2017-10-16 19:53:29'),
(257, 3, 'Mengomentari Tes', '2017-10-16 19:55:10'),
(258, 3, 'Mengomentari Tes', '2017-10-16 19:57:58'),
(259, 3, 'Mengomentari Tes', '2017-10-16 19:58:40'),
(260, 1, 'Mengomentari Tes', '2017-10-16 20:05:14'),
(261, 1, 'Mengomentari Tes', '2017-10-16 20:05:30'),
(262, 1, 'Mengomentari Nyoba', '2017-10-17 19:46:33'),
(263, 1, 'Mengomentari Coba', '2017-10-17 19:51:39'),
(264, 1, 'Delete lamaran Coba', '2017-10-17 19:57:37'),
(265, 1, 'Cancel Delete lamaran Coba', '2017-10-17 20:04:45'),
(266, 1, 'Mengomentari Coba', '2017-10-17 20:04:59'),
(267, 1, 'Tambah Akses informasi', '2017-10-18 20:17:53'),
(268, 1, 'Ubah User admin', '2017-10-18 20:19:43'),
(269, 1, 'Tambah Informasi Surabaya Job Fair', '2017-10-18 20:23:50'),
(270, 1, 'Tambah Informasi Teman', '2017-10-18 20:24:02'),
(271, 1, 'Ubah Informasi Sahabat', '2017-10-18 20:25:38'),
(272, 1, 'Ubah Informasi Teman', '2017-10-18 20:26:01'),
(273, 1, 'Mengomentari GG', '2017-10-18 21:41:46'),
(274, 1, 'Mengomentari GG', '2017-10-18 21:46:01'),
(275, 1, 'Mengomentari GG', '2017-10-18 21:46:13'),
(276, 1, 'Mengomentari GG', '2017-10-18 21:46:28'),
(277, 1, 'Mengomentari Design', '2017-10-18 21:51:33'),
(278, 1, 'Mengomentari Design', '2017-10-18 21:52:58'),
(279, 1, 'Mengomentari Design', '2017-10-18 21:55:33'),
(280, 1, 'Mengomentari Design', '2017-10-18 21:58:09'),
(281, 1, 'Mengomentari Design', '2017-10-18 21:58:38'),
(282, 1, 'Mengomentari Design', '2017-10-18 21:58:49'),
(283, 1, 'Mengomentari Design', '2017-10-18 22:05:41'),
(284, 1, 'Mengomentari Design', '2017-10-18 22:06:51'),
(285, 1, 'Mengomentari Design', '2017-10-18 22:07:03'),
(286, 1, 'Mengomentari Design', '2017-10-18 22:07:22'),
(287, 1, 'Mengomentari Market', '2017-10-19 13:25:21'),
(288, 1, 'Mengomentari TeFF', '2017-10-20 02:53:28'),
(289, 1, 'Mengomentari TeFF', '2017-10-20 02:59:37'),
(290, 1, 'Mengomentari zig', '2017-10-23 13:09:59'),
(291, 1, 'Ubah Tingkatan ', '2017-10-23 20:58:50'),
(292, 1, 'Tambah Tingkatan gg', '2017-10-23 20:59:09'),
(293, 1, 'Ubah Tingkatan ', '2017-10-24 09:26:19'),
(294, 1, 'Ubah Tingkatan ', '2017-10-24 09:26:30'),
(295, 1, 'Ubah Tingkatan ', '2017-10-24 09:26:41'),
(296, 1, 'Mengomentari m', '2017-10-24 09:53:55'),
(297, 1, 'Mengomentari m', '2017-10-24 09:54:05'),
(298, 1, 'Mengomentari zig', '2017-10-24 10:10:40'),
(299, 1, 'Mengomentari Www', '2017-10-24 10:28:25'),
(300, 3, 'Mengomentari Www', '2017-10-24 10:28:51'),
(301, 1, 'Membatalkan Penolakan Nyoba', '2017-10-24 11:48:33'),
(302, 1, 'Mengomentari Nyoba', '2017-10-24 11:49:33'),
(303, 1, 'Membatalkan Penolakan Nyoba', '2017-10-24 11:49:44'),
(304, 1, 'Mengomentari Nyoba', '2017-10-24 11:50:26'),
(305, 1, 'Membatalkan Penolakan Nyoba', '2017-10-24 11:50:55'),
(306, 1, 'Mengomentari Nyoba', '2017-10-24 11:51:39'),
(307, 1, 'Membatalkan Penolakan Nyoba', '2017-10-24 11:51:58'),
(308, 1, 'Mengomentari Nyoba', '2017-10-24 11:52:43'),
(309, 1, 'Membatalkan Penolakan Nyoba', '2017-10-24 11:53:04'),
(310, 1, 'Mengomentari Nyoba', '2017-10-24 11:53:26'),
(311, 1, 'Delete lamaran v', '2017-10-24 11:54:51'),
(312, 1, 'Cancel Delete lamaran v', '2017-10-24 11:56:28'),
(313, 1, 'Membatalkan Penolakan Nyoba', '2017-10-24 11:56:46'),
(314, 1, 'Mengomentari Nyoba', '2017-10-24 11:57:06'),
(315, 1, 'Membatalkan Penolakan Nyoba', '2017-10-24 11:57:45'),
(316, 1, 'Mengomentari Nyoba', '2017-10-24 11:58:11'),
(317, 1, 'Membatalkan Penolakan Coba', '2017-10-24 11:58:51'),
(318, 1, 'Mengomentari Coba', '2017-10-24 11:59:16'),
(319, 1, 'Membatalkan Penolakan Coba', '2017-10-24 12:59:14'),
(320, 1, 'Membatalkan Penolakan Nyoba', '2017-10-24 12:59:59'),
(321, 1, 'Mengomentari Tes', '2017-10-24 13:00:32'),
(322, 1, 'Membatalkan Penolakan Tes', '2017-10-24 13:00:56'),
(323, 1, 'Mengomentari Nyoba', '2017-10-24 13:01:51'),
(324, 1, 'Delete lamaran St', '2017-10-24 13:02:28'),
(325, 1, 'Membatalkan Penolakan Nyoba', '2017-10-24 13:03:17'),
(326, 1, 'Mengomentari v', '2017-10-24 13:11:24'),
(327, 1, 'Mengomentari Nyoba', '2017-10-24 15:33:05'),
(328, 1, 'Membatalkan Penolakan Nyoba', '2017-10-24 15:33:18'),
(329, 1, 'Mengomentari v', '2017-10-25 15:12:04'),
(330, 1, 'Mengomentari v', '2017-10-25 15:14:21'),
(331, 1, 'Mengomentari zig', '2017-10-26 10:05:08'),
(332, 1, 'Ubah User adit', '2017-10-26 13:04:53'),
(333, 8, 'Mengomentari zz', '2017-10-26 13:05:16'),
(334, 8, 'Mengomentari zz', '2017-10-26 13:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id_notif` int(11) NOT NULL,
  `lamaran_id` int(11) NOT NULL,
  `user_parent` int(11) NOT NULL,
  `user_comment` int(11) NOT NULL,
  `date` date NOT NULL,
  `cek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id_notif`, `lamaran_id`, `user_parent`, `user_comment`, `date`, `cek`) VALUES
(21, 150, 3, 1, '2017-10-16', 0),
(22, 150, 3, 1, '2017-10-16', 0),
(23, 163, 1, 3, '2017-10-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tingkatan`
--

CREATE TABLE `tingkatan` (
  `id_tingkatan` int(11) NOT NULL,
  `nama_tingkatan` varchar(255) NOT NULL,
  `ke` varchar(12) NOT NULL,
  `warna` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tingkatan`
--

INSERT INTO `tingkatan` (`id_tingkatan`, `nama_tingkatan`, `ke`, `warna`, `status`) VALUES
(3, 'Interview Pertama', '1', '#228672', 1),
(4, 'Interview Kedua (Tes)', '2', '#c3b61c', 1),
(5, 'Interview Terakhir', '3', '#b329c1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses_id` varchar(255) NOT NULL,
  `jabatan_id` varchar(255) NOT NULL,
  `tingkatan_id` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `akses_id`, `jabatan_id`, `tingkatan_id`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '4,6,2,5,1', '1,2,3,5', '3,4,5', '1'),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '2', '1', '3', '1'),
(8, 'adit', '486b6c6b267bc61677367eb6b6458764', '2,5', '3', '3', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `lamaran_id` (`lamaran_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD PRIMARY KEY (`id_lamaran`),
  ADD KEY `jabatan_id` (`jabatan_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `tingkatan`
--
ALTER TABLE `tingkatan`
  ADD PRIMARY KEY (`id_tingkatan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT for table `lamaran`
--
ALTER TABLE `lamaran`
  MODIFY `id_lamaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tingkatan`
--
ALTER TABLE `tingkatan`
  MODIFY `id_tingkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
