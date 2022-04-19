-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 10:39 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_pdo`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `ft_barang` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nm_barang`, `ft_barang`, `deskripsi`, `harga`) VALUES
(1, 'Attack on Titan - Health Protocol Levi', 'levi.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000),
(2, 'NEKOSHIBA - Shiba Daijoubu Inu', 'neko.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000),
(3, 'HxH/Hunter X Hunter - Killua Drink', 'killua.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 145000),
(4, 'Boku No Hero/BNHA - Todoroki Hero', 'todoroki.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000),
(5, 'Kimetsu no Yaiba - Cool Giyu', 'giyu.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000),
(6, 'Attack on Titan - Human are Virus', 'titan.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000),
(8, 'Kimetsu no Yaiba - Rengoku Tasty', 'rengoku.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000),
(9, 'Jujutsu Kaisen - Megumi Shiki', 'megumi.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000);

-- --------------------------------------------------------

--
-- Table structure for table `crud_testing`
--

CREATE TABLE `crud_testing` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `hp` int(15) DEFAULT NULL,
  `saran` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_saya`
--

CREATE TABLE `data_saya` (
  `id` double(10,0) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `panggilan` varchar(10) NOT NULL,
  `sex` char(1) NOT NULL,
  `email` text NOT NULL,
  `gol_darah` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_saya`
--

INSERT INTO `data_saya` (`id`, `nama`, `panggilan`, `sex`, `email`, `gol_darah`) VALUES
(1, 'James Victorio Admiralis', 'James', 'M', 'jamesvictorio50@gmail.com', 'AB'),
(2, 'Chris Hemsworth', 'Chris', 'M', 'totallyrealchris@gmail.com', 'O');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `email`, `password`) VALUES
(1, 'admin', 'jamesvictorio50@gmail.com', 'Hipopotamus7'),
(9, 'admin', 'victoriojames30@gmail.com', 'lolol'),
(10, 'admin', 'jamesvictorio50@gmail.com', 'lalala'),
(11, 'admin', 'victoriojames30@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesan`, `id_barang`, `nama`, `hp`, `jumlah`, `alamat`) VALUES
(1, 9, 'Bima Rakajati', '08123456789', 3, 'Semarang');

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `idtamu` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`idtamu`, `nama`, `email`, `pesan`) VALUES
(1, 'Bima', 'bimandugal@gmail.com', 'Bismillah'),
(2, 'Raka', 'raka@gmail.com', 'Lolos'),
(3, 'Jati', 'jati@gmail.com', 'UTS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `crud_testing`
--
ALTER TABLE `crud_testing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_saya`
--
ALTER TABLE `data_saya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`idtamu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `crud_testing`
--
ALTER TABLE `crud_testing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `idtamu` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
