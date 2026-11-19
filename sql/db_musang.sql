-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
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
-- Database: `db_musang`
--
CREATE DATABASE IF NOT EXISTS `db_musang` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_musang`;

-- --------------------------------------------------------

--
-- Table structure for table `musang`
--

CREATE TABLE `musang` (
  `id_musang` int(11) NOT NULL,
  `nama_musang` varchar(100) NOT NULL,
  `jenis_musang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Tersedia',
  `gambar_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `musang`
--

INSERT INTO `musang` (`id_musang`, `nama_musang`, `jenis_musang`, `harga`, `status`, `gambar_url`) VALUES
(1, 'Musang Pandan Jinak Total (4 Bulan)', 'Musang Pandan', 450000, 'Tersedia', 'https://images.unsplash.com/photo-1615963244664-5b845b2025ee'),
(2, 'Musang Bulan Jantan Sehat', 'Musang Bulan', 1250000, 'Tersedia', 'https://images.unsplash.com/photo-1548802673-380ab8ebc7b7'),
(3, 'Musang Rase Baby', 'Musang Rase', 300000, 'Terjual', 'https://images.unsplash.com/photo-1589656966895-2f33e7653819');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `created_at`) VALUES
(1, '123', '$2y$10$3k7GWhYoQ6c9Vc1VFSg39ukGiMHhxEuFMZXaj4hIk7RWINekYPuGy', '2026-11-19 18:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `musang`
--
ALTER TABLE `musang`
  ADD PRIMARY KEY (`id_musang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `musang`
--
ALTER TABLE `musang`
  MODIFY `id_musang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;