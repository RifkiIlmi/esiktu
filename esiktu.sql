-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 15, 2020 at 08:05 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esiktu`
--

-- --------------------------------------------------------

--
-- Table structure for table `honorer`
--

CREATE TABLE `honorer` (
  `id_honorer` int(11) NOT NULL,
  `jenis_ketenagaan` varchar(45) NOT NULL,
  `pegawai_NIP` varchar(20) NOT NULL,
  `fk_id_PNS` int(11) DEFAULT NULL,
  `pendidikan_terakhir` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `honorer`
--

INSERT INTO `honorer` (`id_honorer`, `jenis_ketenagaan`, `pegawai_NIP`, `fk_id_PNS`, `pendidikan_terakhir`) VALUES
(1, 'Tenaga K2', '1111', 1, 'S1 Ekonomi'),
(2, '', '2222', 1, 'S1 Manejemen'),
(3, 'Kang Galon', '131313', 1, 'S1 Pendidikan Kimia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `honorer`
--
ALTER TABLE `honorer`
  ADD PRIMARY KEY (`id_honorer`),
  ADD KEY `fk_honorer_pegawai1_idx` (`pegawai_NIP`),
  ADD KEY `fk_honorer_PNS1_idx` (`fk_id_PNS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `honorer`
--
ALTER TABLE `honorer`
  MODIFY `id_honorer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `honorer`
--
ALTER TABLE `honorer`
  ADD CONSTRAINT `honorer_ibfk_1` FOREIGN KEY (`fk_id_PNS`) REFERENCES `pns` (`id_PNS`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `honorer_ibfk_2` FOREIGN KEY (`pegawai_NIP`) REFERENCES `pegawai` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;