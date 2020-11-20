-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 15, 2020 at 08:11 PM
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
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` int(11) NOT NULL,
  `jenis_cuti` varchar(45) NOT NULL,
  `alasan_cuti` text NOT NULL,
  `mulai_cuti` date NOT NULL,
  `akhir_cuti` date NOT NULL,
  `alamat_cuti` varchar(45) NOT NULL,
  `file` varchar(225) NOT NULL,
  `pegawai_NIP` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `jenis_cuti`, `alasan_cuti`, `mulai_cuti`, `akhir_cuti`, `alamat_cuti`, `file`, `pegawai_NIP`) VALUES
(1, 'Melahirkan', 'aaaaaaaaaaaaaa', '2020-09-27', '2020-10-31', 'asd', '', '1965040219'),
(2, 'Melahirkan', 'melahirkan', '2020-10-01', '2020-10-23', 'jl. lindung', '', '2222'),
(3, 'Melahirkan', 'Lahiran', '2020-10-07', '2020-10-24', 'Jl. Lindungan', 'Screenshot_from_2020-09-15_22-03-57.png', '2222'),
(4, 'Tahunan', 'yes', '2020-10-08', '2020-10-16', 'yes', 'Screenshot_from_2020-09-15_22-03-571.png', '2222');

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
(2, 'II'),
(3, 'III'),
(4, 'IV');

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
(1, 'Pembina Utama'),
(2, 'Pembina Utama Madya'),
(3, 'Pembina Utama Muda'),
(4, 'Pembina Tingkat 1'),
(5, 'Pembina'),
(6, 'Penata Tingkat 1'),
(7, 'Penata'),
(8, 'Penata Muda Tingkat 1'),
(9, 'Penata Muda'),
(10, 'Pengatur Tingkat 1'),
(11, 'Pengatur'),
(12, 'Pengatur Muda Tingkat 1'),
(13, 'Pengatur Muda'),
(14, 'Juru Tingkat 1'),
(15, 'Juru'),
(16, 'Juru Muda Tingkat 1'),
(17, 'Juru Muda');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `NIP` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `No_KTP` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `profesi` varchar(100) NOT NULL,
  `akun` varchar(25) NOT NULL DEFAULT 'nonaktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `nama`, `No_KTP`, `tempat_lahir`, `tgl_lahir`, `profesi`, `akun`) VALUES
('1111', 'Neli Aprilis, SKM', '1111', 'Pekanbaru', '2003-02-06', 'Manajemen', 'aktif'),
('121212', 'admin', '-', '-', '0000-00-00', '-', 'aktif'),
('12312410', 'pegawai2', '12312410', 'Padang', '1987-11-25', 'Pelayanan', 'nonaktif'),
('12345', 'pegawai1', '12345', 'Pekanbaru', '1982-09-01', 'Esselon', 'aktif'),
('131313', 'pegawai3', '131313', 'Ntah', '1997-04-04', 'Pembantu', 'nonaktif'),
('19620906200', 'Drs.H. ARDIANUS, Apt, M.Kes', '1471080609620000', 'Padang', '1962-09-06', 'Esselon', 'nonaktif'),
('1965040219', 'dr. HAZNELLI JUITA, MM', '1471074204650000', 'Indragiri Hulu', '1965-04-19', 'Esselon', 'aktif'),
('19650530198', 'ZULMIATI, AMK', '1571017005650020', 'Pekanbaru', '1977-05-30', 'Pelayanan', 'nonaktif'),
('19660722199', 'dr. MUHAMMAD YUSUF, Sp.OG (K)', '1471012207660000', 'Sungei Pakning', '1966-07-22', 'Esselon', 'nonaktif'),
('19671111198', 'Ns. ELFA HENDERI, S.Kep', '1471081111640000', 'Lampung Selatan', '1967-11-11', 'Pelayanan', 'nonaktif'),
('19721017200', 'dr. ELITA SARI', '1471085710720000', 'Perk.Sei.Lala', '1972-10-17', 'Esselon', 'aktif'),
('19770525200', 'dr. WINDY ARIYANTI', '1471076505770000', 'Padang', '1977-05-25', 'Pelayanan', 'nonaktif'),
('19811119200', 'dr. ESI  LESTARI', '1471075911810040', 'Padang', '1981-11-19', 'Pelayanan', 'aktif'),
('19900716201', 'YULIA WARDANI, M.Psi', '1471075607900000', 'Pekanbaru', '1990-07-16', 'Pelayanan', 'nonaktif'),
('2222', 'Suci Handayani, S.Sos', '2222', 'Sungei Pakning', '2020-10-09', 'Manajemen', 'aktif');

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
(1, 'SI Keperawatan', 9),
(2, 'Magister Manajemen', 1),
(3, 'UNRI / 2011 ', 1),
(4, 'SI Keperawatan', 2);

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
(1, 'Latihan Prajabatan / 1989', 9),
(2, 'Latihan Prajabataan/ 1998', 1),
(3, '  Diklatpim Tk.II/2017 ', 1),
(4, ' Diklatpim Tk. IV/ 2002', 1),
(5, ' Diklatpim Tk. III / 2005', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman_kerja`
--

CREATE TABLE `pengalaman_kerja` (
  `id_pengalaman_kerja` int(11) NOT NULL,
  `pengalaman_kerja` varchar(100) NOT NULL,
  `PNS_id_PNS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengalaman_kerja`
--

INSERT INTO `pengalaman_kerja` (`id_pengalaman_kerja`, `pengalaman_kerja`, `PNS_id_PNS`) VALUES
(1, 'Perawat Pratama Muda/ 1992', 9),
(2, 'Kasubbag Kesehatan Ibu dan Anak Petalabumi/2001', 1),
(3, ' Kepala UPT Akademi Kesehatan Dinkes/2008 ', 1),
(4, 'Kasubbid Litbang Bid Pendidikan RSUD Arifin Ahmad/ 2003 \r\n', 1),
(5, 'Kepala Bidang pendidikan dan Penelitian RSUD Arifin/2006', 1),
(7, 'Direktur RS. Jiwa Tampan Prov. Riau/ 2015', 1),
(8, 'Kepala Balai Laboraturium Dinkes/2008', 1),
(9, 'Kepala Bagian Perencanaan / 2013', 1);

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
  `fk_NIP` varchar(20) NOT NULL,
  `last_update_pangkat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pns`
--

INSERT INTO `pns` (`id_PNS`, `npwp`, `tmt_pangkat`, `no_sk_pangkat`, `tgl_sk_pangkat`, `jabatan`, `no_kerpeg`, `fk_id_pangkat`, `fk_id_golongan`, `fk_id_ruang`, `fk_NIP`, `last_update_pangkat`) VALUES
(1, '47.793.750.2-216', '2016-04-01', '0000/KEP/AA/21400/16', '2016-03-11', 'Direktur Rs. Jiwa Tampan Provinsi Riau', '1011644', 3, 4, 3, '1965040219', '0000-00-00'),
(2, '79.057.337.2-216', '2019-04-01', 'Kpts. 666/III/2019 ', '1972-10-17', 'Wakil Direktur Umum dan Keuangan', 'P 395599', 5, 4, 4, '19721017200', '0000-00-00'),
(3, '14.597.814.4-216', '2017-10-01', 'Kpts.806/IX/2017  \r\n', '2017-09-25', 'Wakil Direktur Medik dan Keperawatan', 'L 059167', 4, 4, 2, '19660722199', '0000-00-00'),
(4, '14.545.641.4-216', '2014-04-01', 'Kpts.100/III/2014 ', '2014-03-03', 'Kepala Bidang Penunjang Medik dan Diklit', 'J.145097', 4, 4, 2, '19620906200', '0000-00-00'),
(5, '68.062.152.1-216', '2020-04-01', 'Kpts. 00036/KEP/AA/15001/20', '2020-03-27', 'Dokter Madya', 'M 164097', 3, 4, 3, '19770525200', '0000-00-00'),
(6, '47.162.377.7-216', '2019-04-01', 'Kpts.666/III/2019 ', '2019-05-29', 'Dokter Ahli  Madya', 'P 274861', 5, 4, 1, '19811119200', '0000-00-00'),
(7, '15.352.554.8-216', '2014-04-01', 'Kpts. 99/III/2014', '2014-03-03', 'Perawat Penyelia', 'E.060772', 6, 3, 4, '19650530198', '0000-00-00'),
(8, '81.236.035.5-211', '2020-03-01', 'Kpts.426/II/2020 ', '2020-02-13', 'Calon Psikologi', '-', 8, 3, 2, '19900716201', '0000-00-00'),
(9, '14.545.226.4-216', '2015-10-01', 'Kpts. 1217/IX/2015', '1967-11-11', 'Perawat Madya', 'E 630739', 5, 4, 1, '19671111198', '0000-00-00'),
(10, '32131233', '2020-11-24', 'fa/f3/s/a', '2012-01-31', 'Dokter Gigi', '4145656432', 9, 3, 1, '12345', '2020-11-15'),
(11, 'fef.g..g..gh245', '2020-11-01', 'Kpts.100/III/2012', '2012-08-01', 'Perawat Penyelia', 'defsdf33', 7, 3, 1, '12312410', '0000-00-00');

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
(2, 'b'),
(3, 'c'),
(4, 'd'),
(5, 'e');

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
(14, '2321321', '2020-11-11', 1),
(15, '125547/sf/f', '2020-11-05', 3);

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
(3, 'admin', 'admin', 'admin', '121212', 1),
(9, 'EsiLes', '19811119200', 'user', '19811119200', 1),
(10, '1111', '1111', 'user', '1111', 1),
(11, '2222', '2222', 'user', '2222', 1),
(12, '1965040219', '1965040219', 'user', '1965040219', 1),
(13, '19721017200', '19721017200', 'user', '19721017200', 1),
(14, '12345', '12345', 'user', '12345', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`) USING BTREE,
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
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `honorer`
--
ALTER TABLE `honorer`
  MODIFY `id_honorer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pendidikan_formal`
--
ALTER TABLE `pendidikan_formal`
  MODIFY `id_pendidikan_formal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pendidikan_j_t`
--
ALTER TABLE `pendidikan_j_t`
  MODIFY `id_pendidikan_J_T` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengalaman_kerja`
--
ALTER TABLE `pengalaman_kerja`
  MODIFY `id_pengalaman_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pns`
--
ALTER TABLE `pns`
  MODIFY `id_PNS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `skp`
--
ALTER TABLE `skp`
  MODIFY `id_skp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `fk_cuti_pegawai1` FOREIGN KEY (`pegawai_NIP`) REFERENCES `pegawai` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `honorer`
--
ALTER TABLE `honorer`
  ADD CONSTRAINT `honorer_ibfk_1` FOREIGN KEY (`fk_id_PNS`) REFERENCES `pns` (`id_PNS`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `honorer_ibfk_2` FOREIGN KEY (`pegawai_NIP`) REFERENCES `pegawai` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

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