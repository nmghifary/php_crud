-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 07:25 PM
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
-- Database: `detik_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_buku`
--

CREATE TABLE `list_buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `jumlah_buku` int(4) NOT NULL,
  `cover_buku` varchar(100) NOT NULL,
  `file_buku` varchar(100) NOT NULL,
  `owner` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list_buku`
--

INSERT INTO `list_buku` (`id_buku`, `judul_buku`, `kategori`, `jumlah_buku`, `cover_buku`, `file_buku`, `owner`) VALUES
(1, 'Masa muda', 'Teknologi', 5, 'img1.jpg', 'sptjm5.pdf', 'hilman'),
(2, 'Buku oppenheimer', 'Sejarah', 10, 'img2.jpg', '', 'tono'),
(3, 'Ekonomi Terbuka', 'Teknologi', 2, 'img3.jpg', '', 'hilman'),
(8, '2engine', 'Ekonomi', 21, 'img5.jpg', '', 'vani'),
(15, 'superIbel', 'Ekonomi', 47, 'SimpleMan.jpg', '', 'hilman'),
(18, 'yanti', 'Sejarah', 3, 'yanti.png', 'yanti.pdf', 'andik'),
(20, 'kwir', 'Matematika', 1, 'kwir.png', 'kwir.pdf', 'tono'),
(22, 'holy', 'Matematika', 2, 'holy.png', '', 'hilman');

-- --------------------------------------------------------

--
-- Table structure for table `list_kategori`
--

CREATE TABLE `list_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list_kategori`
--

INSERT INTO `list_kategori` (`id_kategori`, `nama_kategori`) VALUES
(3, 'Ekonomi'),
(1, 'Matematika'),
(2, 'Sejarah'),
(6, 'Teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`) VALUES
(5, 'hilman', '$2y$10$CPfT0H6/q8Icbxo3gOzaVeRWz1Bs0p/dsDMVEZREqzjBm4RVxsmiO', 0),
(6, 'tono', '$2y$10$OjHzlaYE1oaO2pX42V5/Pedvdr4PcxjZ9qqW7zQXRfma/QsmxKemW', 0),
(7, 'andik', '$2y$10$I0IkYJU80q9UEDc2EOFSi.Pq0Z6q12B.50uzJBqSBsKVSkT8t.4am', 1),
(8, 'vani', '$2y$10$3FCyzk1jH063TNt0ZMTyies6x74Pltpz9JiTyxcOxXHLHLg4bmzSy', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_buku`
--
ALTER TABLE `list_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `owner` (`owner`),
  ADD KEY `owner_2` (`owner`),
  ADD KEY `owner_3` (`owner`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `list_kategori`
--
ALTER TABLE `list_kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `nama_kategori` (`nama_kategori`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_buku`
--
ALTER TABLE `list_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `list_kategori`
--
ALTER TABLE `list_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
