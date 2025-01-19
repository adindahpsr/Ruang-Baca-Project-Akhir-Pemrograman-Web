-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 08:10 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `pw` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `pw`) VALUES
('admindua2', 'inipasswordadmin2'),
('adminsatu1', 'inipasswordadmin1'),
('admintiga3', 'inipasswordadmin3');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(10) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nama_penulis` varchar(255) NOT NULL,
  `tahun_terbit` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `nama_penulis`, `tahun_terbit`) VALUES
('A01', 'Hujan', 'Tere Liye', 2016),
('A02', 'Pulang', 'Tere Liye', 2015),
('A03', 'Pergi', 'Tere Liye', 2018),
('A04', 'Bumi', 'Tere Liye', 2014),
('A05', 'Bulan', 'Tere Liye', 2015),
('A06', 'Selamat Tinggal', 'Tere Liye', 2020),
('A07', 'Luka Cita', 'Valerie Patkar', 2021),
('A08', 'Cantik Itu Luka', 'Eka Kurniawan', 2002),
('A09', 'Dear Nathan Hello Salma', 'Erisca Febriani', 2018);

-- --------------------------------------------------------

--
-- Table structure for table `data_peminjaman`
--

CREATE TABLE `data_peminjaman` (
  `id_buku` varchar(10) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_peminjaman`
--

INSERT INTO `data_peminjaman` (`id_buku`, `judul_buku`, `nama_peminjam`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
('A01', 'Hujan', 'Jonet', '2024-07-03', '2024-07-17'),
('A02', 'Pulang', 'Goemon', '2024-07-23', '2024-07-24'),
('A03', 'Pergi', 'Eko Purnomo', '2024-07-17', '2024-07-22'),
('A04', 'Bumi', 'Nasyawa Adesty', '2024-06-04', '2024-07-26'),
('A05', 'Bulan', 'Annisa Nur', '2024-05-03', '2024-05-12'),
('A06', 'Selamat Tinggal', 'Nadia Maharani', '2024-05-15', '2024-07-30'),
('A07', 'Luka Cita', 'Adinda Hapsari', '2024-05-07', '2024-05-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `data_peminjaman`
--
ALTER TABLE `data_peminjaman`
  ADD PRIMARY KEY (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
