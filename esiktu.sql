-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2020 at 03:15 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` int(11) NOT NULL,
  `jenis_cuti` varchar(45) NOT NULL,
  `alasan_cuti` varchar(45) NOT NULL,
  `mulai_cuti` date NOT NULL,
  `akhir_cuti` date NOT NULL,
  `alamat_cuti` varchar(45) NOT NULL,
  `pertimbangan_atasan` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `pegawai_NIP` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` int(11) NOT NULL,
  `golongan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `golongan`) VALUES
(1, 'I'),
(2, 'II');

-- --------------------------------------------------------

--
-- Table structure for table `honorer`
--

CREATE TABLE `honorer` (
  `id_honorer` int(11) NOT NULL,
  `jenis_ketenagaan` varchar(45) NOT NULL,
  `jabatan_honorer` varchar(100) NOT NULL,
  `pegawai_NIP` varchar(11) NOT NULL,
  `fk_id_PNS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `honorer`
--

INSERT INTO `honorer` (`id_honorer`, `jenis_ketenagaan`, `jabatan_honorer`, `pegawai_NIP`, `fk_id_PNS`) VALUES
(5, 'xxx', '', 'xxx', 12),
(6, '', 'dw', 'dw', 12);

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE `pangkat` (
  `id_pangkat` int(11) NOT NULL,
  `pangkat` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`id_pangkat`, `pangkat`) VALUES
(1, 'Pembina Utama');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `NIP` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `No_KTP` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `profesi` varchar(100) NOT NULL,
  `akun` varchar(25) DEFAULT 'nonaktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `nama`, `No_KTP`, `tempat_lahir`, `tgl_lahir`, `profesi`, `akun`) VALUES
('48444879616', 'Ilmi', '484841516548', 'RUMBAI', '2018-09-15', 'programmer', 'aktif'),
('aadawd', 'adam malik nasution', '123', 'pekanbaru', '2020-10-21', 'bos', 'nonaktif'),
('aafc', 'iqbal', '124578', 'dumai', '2019-09-15', 'OB', 'nonaktif'),
('dw', 'dw', 'dw', 'dw1', '0000-00-00', 'dw', 'nonaktif'),
('xxx', 'xxxx', 'xxx', 'xxxx', '2020-10-07', 'xxx', 'nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_formal`
--

CREATE TABLE `pendidikan_formal` (
  `id_pendidikan_formal` int(11) NOT NULL,
  `pendidikan` varchar(45) NOT NULL,
  `PNS_id_PNS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pendidikan_formal`
--

INSERT INTO `pendidikan_formal` (`id_pendidikan_formal`, `pendidikan`, `PNS_id_PNS`) VALUES
(21, '123', 13),
(22, 'adw', 13),
(23, 'aadw', 13),
(24, 'ww', 13),
(25, 'dd', 13),
(26, 'dadw', 13),
(27, 'ww', 13);

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_j_t`
--

CREATE TABLE `pendidikan_j_t` (
  `id_pendidikan_J_T` int(11) NOT NULL,
  `pelatihan` varchar(45) NOT NULL,
  `PNS_id_PNS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pendidikan_j_t`
--

INSERT INTO `pendidikan_j_t` (`id_pendidikan_J_T`, `pelatihan`, `PNS_id_PNS`) VALUES
(9, '123', 13),
(10, 'adawd', 13),
(11, 'dd', 13),
(12, 'w', 13),
(13, 'ddd', 13),
(14, 'dd', 13),
(15, 'ass', 13),
(16, 'dsa', 13);

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman_kerja`
--

CREATE TABLE `pengalaman_kerja` (
  `id_pengalaman_kerja` int(11) NOT NULL,
  `pengalaman_kerja` varchar(45) NOT NULL,
  `PNS_id_PNS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengalaman_kerja`
--

INSERT INTO `pengalaman_kerja` (`id_pengalaman_kerja`, `pengalaman_kerja`, `PNS_id_PNS`) VALUES
(7, '123', 13),
(8, 'adwad', 13),
(9, 'ddd', 13),
(10, '1', 13),
(11, 'awd', 13),
(12, 'ccc', 13),
(13, 'ddw', 13),
(14, 'ww', 13);

-- --------------------------------------------------------

--
-- Table structure for table `pns`
--

CREATE TABLE `pns` (
  `id_PNS` int(11) NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `tmt_pangkat` date NOT NULL,
  `no_sk_pangkat` varchar(45) NOT NULL,
  `tgl_sk_pangkat` date NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `no_kerpeg` varchar(45) NOT NULL,
  `fk_id_pangkat` int(11) NOT NULL,
  `fk_id_golongan` int(11) NOT NULL,
  `fk_id_ruang` int(11) NOT NULL,
  `fk_NIP` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pns`
--

INSERT INTO `pns` (`id_PNS`, `npwp`, `tmt_pangkat`, `no_sk_pangkat`, `tgl_sk_pangkat`, `jabatan`, `no_kerpeg`, `fk_id_pangkat`, `fk_id_golongan`, `fk_id_ruang`, `fk_NIP`) VALUES
(12, '448848', '2020-10-13', '123', '2019-09-15', 'profesor', '12111', 1, 2, 1, 'aafc'),
(13, '123', '2020-10-07', '123456789', '2020-10-21', 'BOS', '123', 1, 1, 1, 'aadawd');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `ruang` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `ruang`) VALUES
(1, 'a'),
(2, 'b');

-- --------------------------------------------------------

--
-- Table structure for table `skp`
--

CREATE TABLE `skp` (
  `id_skp` int(11) NOT NULL,
  `no_skp` varchar(45) NOT NULL,
  `tgl_skp` date NOT NULL,
  `fk_id_honorer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skp`
--

INSERT INTO `skp` (`id_skp`, `no_skp`, `tgl_skp`, `fk_id_honorer`) VALUES
(9, 'dwdwd', '2020-10-06', 6),
(10, 'awddw', '2020-10-12', 6),
(11, 'adwda', '2020-10-08', 6),
(12, '111', '2020-10-29', 6),
(13, '', '0000-00-00', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `hak_akses` varchar(45) NOT NULL,
  `pegawai_NIP` varchar(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `hak_akses`, `pegawai_NIP`, `status`) VALUES
(2, '123456789', '123456789', 'admin', '48444879616', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`,`pegawai_NIP`),
  ADD UNIQUE KEY `id_cuti_UNIQUE` (`id_cuti`),
  ADD KEY `fk_cuti_pegawai1_idx` (`pegawai_NIP`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `honorer`
--
ALTER TABLE `honorer`
  ADD PRIMARY KEY (`id_honorer`),
  ADD KEY `fk_honorer_pegawai1_idx` (`pegawai_NIP`),
  ADD KEY `fk_honorer_PNS1_idx` (`fk_id_PNS`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `pendidikan_formal`
--
ALTER TABLE `pendidikan_formal`
  ADD PRIMARY KEY (`id_pendidikan_formal`),
  ADD KEY `fk_pendidikan_formal_PNS1_idx` (`PNS_id_PNS`);

--
-- Indexes for table `pendidikan_j_t`
--
ALTER TABLE `pendidikan_j_t`
  ADD PRIMARY KEY (`id_pendidikan_J_T`),
  ADD KEY `fk_pendidikan_J_T_PNS1_idx` (`PNS_id_PNS`);

--
-- Indexes for table `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  ADD PRIMARY KEY (`id_pengalaman_kerja`),
  ADD KEY `fk_pengalaman_kerja_PNS1_idx` (`PNS_id_PNS`);

--
-- Indexes for table `pns`
--
ALTER TABLE `pns`
  ADD PRIMARY KEY (`id_PNS`) USING BTREE,
  ADD KEY `fk_PNS_pangkat1_idx` (`fk_id_pangkat`),
  ADD KEY `fk_PNS_golongan1_idx` (`fk_id_golongan`),
  ADD KEY `fk_PNS_pegawai1_idx` (`fk_NIP`),
  ADD KEY `fk_id_ruang` (`fk_id_ruang`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `skp`
--
ALTER TABLE `skp`
  ADD PRIMARY KEY (`id_skp`),
  ADD KEY `fk_skp_honorer1_idx` (`fk_id_honorer`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_user_pegawai_idx` (`pegawai_NIP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `honorer`
--
ALTER TABLE `honorer`
  MODIFY `id_honorer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendidikan_formal`
--
ALTER TABLE `pendidikan_formal`
  MODIFY `id_pendidikan_formal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pendidikan_j_t`
--
ALTER TABLE `pendidikan_j_t`
  MODIFY `id_pendidikan_J_T` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  MODIFY `id_pengalaman_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pns`
--
ALTER TABLE `pns`
  MODIFY `id_PNS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skp`
--
ALTER TABLE `skp`
  MODIFY `id_skp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `fk_cuti_pegawai1` FOREIGN KEY (`pegawai_NIP`) REFERENCES `pegawai` (`NIP`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `honorer`
--
ALTER TABLE `honorer`
  ADD CONSTRAINT `fk_honorer_PNS1` FOREIGN KEY (`fk_id_PNS`) REFERENCES `pns` (`id_PNS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_honorer_pegawai1` FOREIGN KEY (`pegawai_NIP`) REFERENCES `pegawai` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendidikan_formal`
--
ALTER TABLE `pendidikan_formal`
  ADD CONSTRAINT `fk_pendidikan_formal_PNS1` FOREIGN KEY (`PNS_id_PNS`) REFERENCES `pns` (`id_PNS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendidikan_j_t`
--
ALTER TABLE `pendidikan_j_t`
  ADD CONSTRAINT `fk_pendidikan_J_T_PNS1` FOREIGN KEY (`PNS_id_PNS`) REFERENCES `pns` (`id_PNS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  ADD CONSTRAINT `fk_pengalaman_kerja_PNS1` FOREIGN KEY (`PNS_id_PNS`) REFERENCES `pns` (`id_PNS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pns`
--
ALTER TABLE `pns`
  ADD CONSTRAINT `fk_PNS_pangkat1` FOREIGN KEY (`fk_id_pangkat`) REFERENCES `pangkat` (`id_pangkat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_PNS_pegawai1` FOREIGN KEY (`fk_NIP`) REFERENCES `pegawai` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pns_ibfk_1` FOREIGN KEY (`fk_id_golongan`) REFERENCES `golongan` (`id_golongan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pns_ibfk_2` FOREIGN KEY (`fk_id_ruang`) REFERENCES `ruang` (`id_ruang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skp`
--
ALTER TABLE `skp`
  ADD CONSTRAINT `fk_skp_honorer1` FOREIGN KEY (`fk_id_honorer`) REFERENCES `honorer` (`id_honorer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_pegawai` FOREIGN KEY (`pegawai_NIP`) REFERENCES `pegawai` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
