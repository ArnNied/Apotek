-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 02:41 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek_ol`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `deskripsi` longtext NOT NULL,
  `takaran` varchar(255) DEFAULT NULL,
  `harga` int(255) NOT NULL,
  `qty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `gambar`, `deskripsi`, `takaran`, `harga`, `qty`) VALUES
(1, 'Minyak Kayu Putih (60 ml)', 'minyak_kayu_putih_60ml.jpg', 'Minyak kayu putih bisa digunakan sendiri maupun dikombinasikan dengan bahan lain seperti sebagai lotion antiseptik yang digunakan untuk mengobati nyeri sendi (rematik) dan nyeri lainnya.', NULL, 15000, 100),
(2, 'Minyak Kayu Putih (120 ml)', 'minyak_kayu_putih_120ml.jpg', 'Minyak kayu putih bisa digunakan sendiri maupun dikombinasikan dengan bahan lain seperti sebagai lotion antiseptik yang digunakan untuk mengobati nyeri sendi (rematik) dan nyeri lainnya.', '', 30000, 62),
(3, 'Minyak Kayu Putih (210 ml)', 'minyak_kayu_putih_210ml.jpg', 'Minyak kayu putih bisa digunakan sendiri maupun dikombinasikan dengan bahan lain seperti sebagai lotion antiseptik yang digunakan untuk mengobati nyeri sendi (rematik) dan nyeri lainnya.', '', 52000, 5),
(30, 'asasd', 'LqzsaQnXrFzLBJmJ.jpg', 'asd', 'asd', 15000, 123124),
(31, 'asdasd', 'rJ3Mo2fUty6y7JJ0.jpg', 'asdasd', 'asd', 1241, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `umur` int(3) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `nama`, `umur`, `jenis_kelamin`, `alamat`, `gambar`, `email`, `password`) VALUES
(17, 1, 'ADMIN', 69, 'Laki-laki', 'ADMIN', 'K0iHKwS4XxkHievm.png', 'admin@admin.com', '$2y$10$YdC8VYNb2RUbtnIhjvUpLe2lN3tBRrZGM93M5ILk.lmN1r4tRzuP2'),
(24, 0, 'User 1', 16, 'Laki-laki', 'Jl. Batu', 'KecoVYntdlH1J1Ja.jpg', 'asd@yahoo.com', '$2y$10$F2w2hARwzxKR2YQrI1g51ecSBL8.E8nrb3zu6jpdTjx84APlMau2u'),
(25, 0, 'EMPTY', 0, 'EMPTY', 'EMPTY', '', 'asd@gmail.com', '$2y$10$0do2.g..U.2Unha7YEvOiuXsGTdSnu6PUfqTPnNJ0MgR954uKYv1y'),
(26, 0, 'EMPTY', 0, 'EMPTY', 'EMPTY', '', 'asdasd@yahoo.com', '$2y$10$AVRcYPjduoDczu6W.BGcY.psgTRsYiwmLGmBjFe35U5wOTMo3GQWe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
