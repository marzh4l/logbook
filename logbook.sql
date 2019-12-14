-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2017 at 04:07 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `logbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE IF NOT EXISTS `buku_tamu` (
  `id_pengunjung` int(4) NOT NULL,
  `asal` varchar(40) NOT NULL,
  `fungsi` varchar(40) NOT NULL,
  `keperluan` varchar(40) NOT NULL,
  `no_visitor` varchar(4) NOT NULL,
  `masuk` datetime NOT NULL,
  `keluar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`id_pengunjung`, `asal`, `fungsi`, `keperluan`, `no_visitor`, `masuk`, `keluar`) VALUES
(1, 'UIN', 'IT MOR II Palembang', 'Magang', '001', '2017-08-03 13:58:31', '2017-08-22 09:42:44'),
(1, 'UIN', 'Legal Counsel MOR II', 'Magang', '001', '2017-08-04 04:12:12', '2017-08-07 09:46:16'),
(1, 'UIN', 'SME and SR Sumbagsel', 'Magang', '123', '2017-08-07 08:51:28', '2017-08-07 09:46:16'),
(1, 'UIN', 'Marine Region II', 'Magang', '567', '2017-08-07 09:28:48', '2017-08-07 09:46:16'),
(1, 'Binas', 'Technical Services Region II', 'w4ew4', '123', '2017-08-07 09:37:30', '2017-08-07 09:46:16'),
(1, 'Bidar', 'Technical Services Region II', 'ww', '132', '2017-08-07 09:38:52', '2017-08-07 09:46:16'),
(1, 'Bidar', 'Technical Services Region II', 'aaa', '001', '2017-08-07 09:44:04', '2017-08-07 09:46:16'),
(1, 'Bidar', 'Technical Services Region II', 'bbb', '001', '2017-08-07 09:46:05', '2017-08-07 09:46:16'),
(1, 'UIN', 'Technical Services Region II', 'Magang', '002', '2017-08-11 09:22:17', '2017-08-22 09:01:54'),
(2, 'UNSRI', 'Sales and Distribution Region II', 'Magang', '002', '2017-08-03 13:59:03', '2017-08-22 09:42:58'),
(2, 'UIN', 'GM MOR II', 'Magang', '002', '2017-08-03 14:01:32', '2017-08-07 09:55:06'),
(2, 'UIN', 'Quality Management Sumbagsel', 'Magang', '002', '2017-08-04 07:59:22', '2017-08-07 09:55:06'),
(2, 'UIN', 'Legal Counsel MOR II', 'Magang', '001', '2017-08-07 09:51:27', '2017-08-07 09:55:06'),
(2, 'UIN', 'Marine Region II', 'Magang', '001', '2017-08-07 09:52:25', '2017-08-07 09:55:06'),
(2, 'UIN', 'IT MOR II Palembang', 'Magang', '002', '2017-08-07 09:54:54', '2017-08-07 09:55:06'),
(2, 'UIN', 'IT MOR II Palembang', 'Magang', '001', '2017-08-07 10:06:06', '2017-08-07 12:03:31'),
(2, 'UIN', 'Quality Management Sumbagsel', 'Magang', '002', '2017-08-07 12:04:02', '2017-08-07 12:04:15'),
(2, 'UIN', 'IT MOR II Palembang', 'Magang', '001', '2017-08-11 08:51:02', '2017-08-11 10:26:10'),
(2, 'UIN', 'Marine Region II', 'magang', '455', '2017-08-11 14:15:45', '2017-08-22 09:04:32'),
(3, 'POLTEK', 'HR Sumbagsel', 'Magang', '003', '2017-08-03 13:59:23', '2017-08-22 09:43:06'),
(3, 'POLTEK', 'Quality Management Sumbagsel', 'Magang', '004', '2017-08-05 14:38:08', '2017-08-22 09:00:32'),
(3, 'UIN', 'Marine Region II', 'Magang', '567', '2017-08-11 08:50:28', '2017-08-11 09:28:51'),
(3, 'UNSRI', 'Technical Services Region II', 'Magang', '002', '2017-08-14 13:18:36', '2017-08-14 14:06:34'),
(3, 'uin rafah', 'HSSE II', 'magang', '006', '2017-08-23 09:48:51', '2017-08-23 09:51:02'),
(3, 'POLTEK', 'HR Sumbagsel', 'Magang', '004', '2017-09-08 07:48:46', NULL),
(4, 'UIN', 'Industrial Fuel Marketing Region II', 'Magang', '004', '2017-08-03 13:59:43', '2017-08-22 09:43:02'),
(5, 'POLTEK', 'Industrial Fuel Marketing Region II', 'Magang', '006', '2017-08-04 11:57:47', '2017-08-05 14:14:15'),
(5, 'UIN', 'IT MOR II Palembang', 'Magang', '001', '2017-08-05 14:12:02', '2017-08-05 14:14:15'),
(6, 'UIN', 'Technical Services Region II', 'Magang', '001', '2017-08-08 11:29:19', '2017-08-08 13:14:03'),
(7, 'UIN', 'Marine Region II', 'Magang', '567', '2017-08-09 16:16:29', '2017-08-09 16:18:51'),
(7, 'UIN', 'HSSE II', 'Magang', '001', '2017-08-18 11:08:57', '2017-08-22 09:24:11'),
(19, 'UIN', 'Legal Counsel MOR II', 'Magang', '123', '2017-08-09 08:40:34', '2017-08-09 16:01:10'),
(19, 'UIN', 'IT MOR II Palembang', 'Magang', '001', '2017-08-10 08:05:08', '2017-08-22 09:00:39'),
(20, 'UIN', 'Technical Services Region II', 'Magang', '123', '2017-08-11 10:05:52', '2017-08-11 10:06:08'),
(20, 'uin ', 'HR Sumbagsel', 'proposal magang', '021', '2017-08-21 11:06:33', '2017-08-22 09:24:21'),
(21, 'UIN', 'Technical Services Region II', 'Magang', '567', '2017-08-14 14:05:40', '2017-08-22 09:15:16'),
(21, 'UIN', 'Marine Region II', 'Magang', '001', '2017-08-22 09:45:02', '2017-08-23 08:44:59'),
(21, 'UIN', 'Technical Services Region II', 'Magang', '001', '2017-09-08 07:48:20', NULL),
(23, 'UIN', 'Technical Services Region II', 'Magang', '002', '2017-09-05 11:35:48', NULL),
(24, 'UIN', 'Technical Services Region II', 'Magang', '001', '2017-08-21 01:35:01', '2017-08-22 09:24:15'),
(26, 'uin', 'Asset Management Sumbagsel', 'peminjaman barang', '001', '2017-09-04 14:25:47', '2017-09-04 14:26:23'),
(27, 'uin', 'IT MOR II Palembang', 'magang', '1001', '2017-09-15 08:49:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fungsi`
--

CREATE TABLE IF NOT EXISTS `fungsi` (
  `id_fungsi` int(2) NOT NULL,
  `fungsi` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fungsi`
--

INSERT INTO `fungsi` (`id_fungsi`, `fungsi`) VALUES
(1, 'Customer Service'),
(2, 'GM MOR II'),
(3, 'Retail Fuel Marketing Region II'),
(4, 'Industrial Fuel Marketing Region II'),
(5, 'Sales and Distribution Region II'),
(6, 'Aviation Region II'),
(7, 'Domestic Gas Region II'),
(8, 'HSSE II'),
(9, 'Technical Services Region II'),
(10, 'Quality Management Sumbagsel'),
(11, 'Asset Management Sumbagsel'),
(12, 'External Relation Sumbagsel'),
(13, 'Marine Region II'),
(14, 'Finance MOR II'),
(15, 'SME and SR Sumbagsel'),
(16, 'IT MOR II Palembang'),
(17, 'HR Sumbagsel'),
(18, 'Medical MOR II'),
(19, 'Legal Counsel MOR II');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE IF NOT EXISTS `identitas` (
  `id_pengunjung` int(4) NOT NULL,
  `type` varchar(5) NOT NULL,
  `no_id` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_pengunjung`, `type`, `no_id`) VALUES
(1, 'KTP', '1671032810960001'),
(2, 'SIM A', '2222222222222'),
(3, 'KTP', '1671030208170002'),
(3, 'SIM A', '3333333333333'),
(3, 'SIM C', '17080200101'),
(4, 'KTP', '1671040208170003'),
(5, 'KTP', '1671041406050004'),
(5, 'SIM A', '5555555555555'),
(6, 'KTP', '1671052108950005'),
(6, 'SIM A', '1234567890123'),
(7, 'KTP', '1671050208170006'),
(7, 'SIM A', '7777777777777'),
(18, 'KTP', '1671060708170007'),
(19, 'SIM A', '1919191919191'),
(20, 'SIM A', '2020202020200'),
(21, 'KTP', '1671060806960008'),
(23, 'SIM C', '900605300202'),
(24, 'SIM C', '990616400303'),
(25, 'KTP', '1671070506900009'),
(26, 'KTP', '1671070509170010'),
(26, 'SIM A', '0099090909009'),
(27, 'SIM C', '123456789012');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE IF NOT EXISTS `pengunjung` (
`id_pengunjung` int(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tgl` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `nama`, `tgl`, `alamat`, `no_hp`, `foto`) VALUES
(1, 'Ibnu Wahyu', '1996-10-28', 'JL. Alang-Alang Lebar', '+62852456789', 'uploads/0409.jpg'),
(2, 'bagas sugono', '2017-08-02', 'JL. DI Panjaitan no.02', '081234556666', 'uploads/0624.jpg'),
(3, 'clara', '2017-08-02', 'JL. DI Panjaitan no.03', '081223557777', 'uploads/0625.jpg'),
(4, 'dermanto', '2017-08-02', 'JL. DI Panjaitan no.04', '081234558888', 'uploads/0627.jpg'),
(5, 'borang situmana', '2005-06-14', 'JL. DI Panjaitan no.05', '081234569999', 'uploads/0656.jpg'),
(6, 'ana', '1995-08-21', 'JL. DI Panjaitan no.06', '081234556666', 'uploads/0343.jpg'),
(7, 'fulana', '2017-08-02', 'JL. DI Panjaitan no.07', '081223550000', 'uploads/0346.jpg'),
(18, 'virginia', '2017-08-07', 'JL. DI Panjaitan no.08', '0819951111111', 'uploads/0645.jpg'),
(19, 'zulaikho', '2017-03-05', 'JL. DI Sukarno no.07', '081995222222', 'uploads/0339.jpg'),
(20, 'julhadi', '2003-02-04', 'JL. Buntu no 90', '+62891234567', 'uploads/0504.jpg'),
(21, 'subroto', '1999-06-08', 'Jl. A. Yani', '+62891234567', 'uploads/0833.jpg'),
(23, 'Indra', '1990-06-05', 'JL Kaampung Baru', '+62891234567', 'uploads/1013.jpg'),
(24, 'cice', '1999-06-16', 'Jalan Jalan', '+62891234567', 'uploads/2033.jpg'),
(25, 'indra purwa', '1996-08-08', 'palembang', '+6285766966981', 'uploads/0351.jpg'),
(26, 'sudarno', '2017-09-05', 'palembang', '06545342', 'uploads/0914.jpg'),
(27, 'joel', '2017-09-04', 'jl suga', '08122355', 'uploads/0347.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int(1) NOT NULL,
  `type` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `type`) VALUES
(1, 'KTP'),
(2, 'SIM A'),
(3, 'SIM C');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `fungsi` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `fungsi`) VALUES
('alex', '@lex45', 'alex nurdin', 'Sales and Distribution Region II'),
('bejo', 'b3j0@a', 'benjamin', 'Technical Services Region II'),
('danur', 'd@nur01', 'Danur', 'IT MOR II Palembang'),
('marni', 'c$m4ri', 'sumarni', 'Customer Service'),
('suhadi', '1@wert', 'Suhadi', 'HR Sumbagsel'),
('toni', 'h$$e11', 'Toni', 'HSSE II'),
('yoga', 'pert@min@m0r2', 'Yoga Marsal W', 'Marine Region II');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
 ADD PRIMARY KEY (`id_pengunjung`,`masuk`);

--
-- Indexes for table `fungsi`
--
ALTER TABLE `fungsi`
 ADD PRIMARY KEY (`id_fungsi`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
 ADD PRIMARY KEY (`id_pengunjung`,`type`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
 ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
 ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
MODIFY `id_pengunjung` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
