-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 12:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silsilah`
--

-- --------------------------------------------------------

--
-- Table structure for table `silsilah`
--

CREATE TABLE `silsilah` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `orangtua_id` int(11) DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `silsilah`
--

INSERT INTO `silsilah` (`id`, `nama`, `jenis_kelamin`, `orangtua_id`, `anak_ke`) VALUES
(1, 'Budi', 'L', NULL, NULL),
(2, 'Dedi', 'L', 1, 1),
(3, 'Dodi', 'L', 1, 2),
(4, 'Dede', 'L', 1, 3),
(5, 'Dewi', 'P', 1, 4),
(6, 'Feri', 'L', 2, 1),
(7, 'Farah', 'P', 2, 2),
(8, 'Gugus', 'L', 3, 1),
(9, 'Gandi', 'L', 3, 2),
(10, 'Hani', 'P', 4, 1),
(11, 'Hana', 'P', 4, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `silsilah`
--
ALTER TABLE `silsilah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `silsilah`
--
ALTER TABLE `silsilah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
