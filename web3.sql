-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 19, 2017 at 03:48 AM
-- Server version: 10.2.3-MariaDB-log
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(5, 'tingkatan', 1);

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
  `lamaran_id` int(12) NOT NULL,
  `isi` text NOT NULL,
  `rate` varchar(255) NOT NULL,
  `tgl_komen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `user_id`, `lamaran_id`, `isi`, `rate`, `tgl_komen`) VALUES
(19, 1, 42, 'Meragukan', 'P', '2017-09-14'),
(20, 1, 44, 'Bagus', 'Y1', '2017-09-14'),
(21, 1, 44, 'Ok', 'Y2', '2017-09-14'),
(22, 1, 49, 'GG', 'Y1', '2017-09-16'),
(23, 1, 49, 'Hetsot', 'Y2', '2017-09-16'),
(24, 1, 48, 'Nc', 'Y1', '2017-09-16'),
(25, 1, 55, 'Nc', 'Y1', '2017-09-19');

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
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `no_wa` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `dll` varchar(255) DEFAULT NULL,
  `ket` text NOT NULL,
  `tgl` date NOT NULL,
  `level` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lamaran`
--

INSERT INTO `lamaran` (`id_lamaran`, `nama`, `tgl_lahir`, `gender`, `agama`, `alamat`, `kota`, `pendidikan`, `no_telp`, `no_wa`, `email`, `jabatan_id`, `foto`, `cv`, `ktp`, `dll`, `ket`, `tgl`, `level`, `status`) VALUES
(42, 'Tes', '2017-09-13', 'Laki-Laki', 'a', 'x', 'Surabaya', 'S1', '081', '08', 'email@email.com', 5, 'Tes.png', 'Tes.pdf', 'Tes.jpg', 'Tes1.pdf', '', '2017-09-14', 'P', 1),
(43, 'Market', '2011-12-01', 'Perempuan', 'a', 'x', 'Surabaya', 'S1', '081', '08', 'email@email.com', 2, 'Market.jpg', 'Market.pdf', 'Market.png', 'Market1.pdf,Market2.pdf', '', '2017-09-14', '0', 1),
(44, 'Coba', '2017-09-14', 'Laki-Laki', 'islam', 'Surabaya', 'Surabaya', 'Sma/Smk', '081', '08', 'email@email.com', 1, 'Coba.jpg', 'Coba.pdf', 'Coba1.jpg', '', '', '2017-09-14', 'Y2', 1),
(45, 'Staff', '2017-09-14', 'Laki-Laki', 'Islam', 'x', 'Surabaya', 'S1', '081233333333', '081233333333', 'email@email.com', 3, 'Staff.png', 'Staff.pdf', 'Staff.jpg', '', 'Saya GG', '2017-09-15', '0', 1),
(47, 'Sven', '2017-09-06', 'Laki-Laki', 'Islam', 'x', 'Surabaya', 'S1', '081233333333', '081233333333', 'email@email.com', 1, 'Sven.png', 'Sven.pdf', 'Sven.jpg', 'Sven1.pdf', 'Pro ea', '2017-09-15', '0', 1),
(48, 'Staff O', '2017-09-05', 'Perempuan', 'Kristen', 'x', 'Surabaya', 'S1', '081233333333', '081233333333', 'email@email.com', 3, 'Staff_O.png', 'Staff_O.pdf', 'Staff_O.jpg', '', 'O', '2017-09-15', 'Y1', 1),
(49, 'GG', '2017-09-06', 'Laki-Laki', 'Hindu', 'x', 'Surabaya', 'S1', '081233333333', '081233333333', 'email@email.com', 1, 'GG.jpg', 'GG.pdf', 'GG1.jpg', 'GG1.pdf', '', '2017-09-15', 'Y2', 1),
(51, 'Designer', '1995-09-18', 'Laki-Laki', 'Budha', 'Jl Jalan', 'Surabaya', 'Sma/Smk', '081233333333', '081233333333', 'email@email.com', 5, 'Designer.jpg', 'Designer.pdf', 'Designer1.jpg', 'Designer1.pdf,Designer2.pdf', 'Pro Designer', '2017-09-18', '0', 1),
(52, 'Backend', '1994-09-18', 'Laki-Laki', 'Hindu', 'Jl Jalan', 'Surabaya', 'S1', '081233333333', '081233333333', 'email@email.com', 1, 'Backend.jpg', 'Backend.pdf', 'Backend1.jpg', 'Backend1.pdf', '', '2017-09-18', '0', 1),
(53, 'Marketing', '1995-09-19', 'Perempuan', 'Hindu', 'Jl Jalan', 'Surabaya', 'S1', '081233333333', '081233333333', 'email@email.com', 2, '', '', '', '', '', '2017-09-19', '0', 1),
(54, 'Staff Op', '1993-09-19', 'Laki-Laki', 'Islam', 'Jl Jalan', 'Surabaya', 'S1', '081233333333', '081233333333', 'email@email.com', 3, NULL, NULL, NULL, NULL, '', '2017-09-19', '0', 1),
(55, 'Magic Design', '1997-09-17', 'Laki-Laki', 'Hindu', 'Jl Jalan', 'Malang', 'S1', '081233333333', '081233333333', 'email@email.com', 5, 'Magic_Design.jpg', 'Magic_Design.pdf', 'Magic_Design.png', 'Magic_Design1.pdf', '', '2017-09-19', 'Y1', 1);

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
(35, 1, 'Tambah Akses tingkatan', '2017-09-14 14:01:23'),
(36, 1, 'Ubah User admin', '2017-09-14 14:01:50'),
(37, 1, 'Mengomentari Tes', '2017-09-14 14:32:00'),
(38, 1, 'Mengomentari Coba', '2017-09-14 15:41:31'),
(39, 1, 'Mengomentari Coba', '2017-09-14 15:43:54'),
(40, 1, 'Ubah Status tambahan Staff Operasional ke aktif', '2017-09-14 15:50:02'),
(41, 1, 'Ubah Status tambahan Staff Operasional ke nonaktif', '2017-09-14 15:50:48'),
(42, 1, 'Mengomentari Coba', '2017-09-14 15:58:30'),
(43, 3, 'Tambah Tingkatan Interview', '2017-09-15 09:31:25'),
(44, 3, 'Ubah Tingkatan ', '2017-09-15 09:32:05'),
(45, 3, 'Tambah Tingkatan Tes', '2017-09-15 09:34:17'),
(46, 1, 'Ubah User admin', '2017-09-15 09:40:03'),
(47, 1, 'Ubah User admin', '2017-09-15 09:43:47'),
(48, 1, 'Ubah User user', '2017-09-15 09:43:55'),
(49, 1, 'Tambah User c', '2017-09-15 09:44:15'),
(50, 1, 'Ubah User user', '2017-09-15 10:08:50'),
(51, 1, 'Ubah User admin', '2017-09-15 10:08:56'),
(52, 1, 'Tambah Tingkatan Interview', '2017-09-15 10:10:07'),
(53, 1, 'Tambah Tingkatan Tes', '2017-09-15 10:12:55'),
(54, 1, 'Ubah User admin', '2017-09-15 10:20:05'),
(55, 1, 'Ubah User user', '2017-09-15 10:20:12'),
(56, 1, 'Ubah Status tambahan Marketing ke nonaktif', '2017-09-15 14:02:09'),
(57, 1, 'Tambah Jabatan tes', '2017-09-15 14:10:13'),
(58, 1, 'Ubah Status tes ke aktif', '2017-09-15 14:10:27'),
(59, 1, 'Ubah Status tambahan Web Developer ke aktif', '2017-09-15 14:18:40'),
(60, 1, 'Ubah Status Staff Operasional ke aktif', '2017-09-15 14:18:47'),
(61, 1, 'Mengomentari GG', '2017-09-16 11:38:49'),
(62, 1, 'Mengomentari GG', '2017-09-16 11:39:08'),
(63, 1, 'Mengomentari Staff O', '2017-09-16 13:22:08'),
(64, 1, 'Tambah Akses tingkatan', '2017-09-18 09:02:21'),
(65, 1, 'Ubah User admin', '2017-09-18 09:02:31'),
(66, 1, 'Ubah User admin', '2017-09-18 15:36:11'),
(67, 1, 'Ubah User user', '2017-09-18 15:36:25'),
(68, 1, 'Ubah User admin', '2017-09-18 15:36:38'),
(69, 1, 'Ubah User user', '2017-09-18 15:36:48'),
(70, 1, 'Mengomentari Magic Design', '2017-09-19 10:02:21'),
(71, 1, 'Tambah Jabatan c', '2017-09-19 10:05:08'),
(72, 1, 'Tambah Jabatan g', '2017-09-19 10:05:31'),
(73, 1, 'Tambah Jabatan d', '2017-09-19 10:05:59'),
(74, 1, 'Tambah User adit', '2017-09-19 10:11:56'),
(75, 1, 'Tambah User adit', '2017-09-19 10:12:44'),
(76, 1, 'Ubah User adit', '2017-09-19 10:14:46'),
(77, 1, 'Tambah User adit', '2017-09-19 10:15:15'),
(78, 1, 'Tambah User agung', '2017-09-19 10:15:42'),
(79, 1, 'Ubah User admin', '2017-09-19 10:25:27'),
(80, 1, 'Ubah User admin', '2017-09-19 10:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `tingkatan`
--

CREATE TABLE `tingkatan` (
  `id_tingkatan` int(11) NOT NULL,
  `nama_tingkatan` varchar(255) NOT NULL,
  `ke` int(12) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tingkatan`
--

INSERT INTO `tingkatan` (`id_tingkatan`, `nama_tingkatan`, `ke`, `status`) VALUES
(3, 'Interview', 1, 1),
(4, 'Tes', 2, 1);

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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '4,2,5,1', '1,2,3,5', '3,4', '1'),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '2', '1', '3', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`);

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
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `lamaran`
--
ALTER TABLE `lamaran`
  MODIFY `id_lamaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `tingkatan`
--
ALTER TABLE `tingkatan`
  MODIFY `id_tingkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
