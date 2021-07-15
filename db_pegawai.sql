-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 05:26 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_datang` time NOT NULL,
  `jam_pulang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absen`, `id_user`, `tanggal`, `jam_datang`, `jam_pulang`) VALUES
(33, 1, '2021-07-01', '08:30:00', '16:00:00'),
(35, 15, '2021-07-14', '18:14:00', '06:14:00'),
(36, 15, '2021-07-22', '18:44:00', '08:44:00'),
(37, 2, '2021-07-15', '19:45:00', '09:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(220) NOT NULL,
  `golongan` varchar(220) NOT NULL,
  `gaji` bigint(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `golongan`, `gaji`) VALUES
(7, 'IT Support', 'Senior', 1000000),
(8, 'Data Enginer', 'Senior', 1300000),
(9, 'Guru Matematika', 'PNS', 2000000),
(10, 'Guru Agama', 'Honorer', 1200000),
(11, 'Software Enginer', 'Senior', 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nip` varchar(220) NOT NULL,
  `nama_user` varchar(220) DEFAULT NULL,
  `jk` varchar(220) NOT NULL,
  `agama` varchar(220) NOT NULL,
  `foto` varchar(220) NOT NULL,
  `pendidikan` varchar(220) NOT NULL,
  `sk` varchar(220) NOT NULL,
  `alamat` varchar(220) NOT NULL,
  `username` varchar(220) DEFAULT NULL,
  `password` varchar(220) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `role` enum('admin','pegawai','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nip`, `nama_user`, `jk`, `agama`, `foto`, `pendidikan`, `sk`, `alamat`, `username`, `password`, `id_jabatan`, `role`) VALUES
(1, '11223344556677', 'admin', 'L', 'Kristen', 'not found', 'Strata 1', 'Freelance', 'JL.sawangan', 'admin', '21232f297a57a5a743894a0e4a801fc3', 11, 'admin'),
(2, '32431432', 'veri irawan', 'L', 'Islam', 'Not Found', 'Diploma 1', 'Magang', 'JL. Depok 2 cibinong', 'veri', 'd41d8cd98f00b204e9800998ecf8427e', 10, 'pegawai'),
(15, '2542543', 'Anton', 'L', 'Hindu', '', 'SMK', 'Kontrak', 'JL.Parung Binggung', 'anton', '784742a66a3a0c271feced5b149ff8db', 7, 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
