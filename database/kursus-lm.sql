-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2021 at 03:17 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kursus`
--
DROP DATABASE IF EXISTS `kursus`;
CREATE DATABASE `kursus`;
USE `kursus`;

-- --------------------------------------------------------

--
-- Table structure for table `mst_kelas`
--

CREATE TABLE `mst_kelas` (
  `kode_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_kelas`
--

INSERT INTO `mst_kelas` (`kode_kelas`, `nama_kelas`) VALUES
(7, 'A1-Paket Belajar Basic 2');

-- --------------------------------------------------------

--
-- Table structure for table `mst_kelas_detail`
--

CREATE TABLE `mst_kelas_detail` (
  `kode_kelas` int(11) NOT NULL,
  `id_siswa` char(7) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_kelas_detail`
--

INSERT INTO `mst_kelas_detail` (`kode_kelas`, `id_siswa`) VALUES
(7, '0011121');

-- --------------------------------------------------------

--
-- Table structure for table `mst_paket`
--

CREATE TABLE `mst_paket` (
  `id_paket` char(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `biaya` double NOT NULL,
  `pertemuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_paket`
--

INSERT INTO `mst_paket` (`id_paket`, `nama`, `deskripsi`, `biaya`, `pertemuan`) VALUES
('PKT001', 'Program Regular Basic 1', 'Pert/Minggu 2x90', 600000, 24),
('PKT002', 'Paket Belajar Basic 2', 'Pert/Minggu 2x90\" 24 Sesi 3 Bulan', 600000, 24),
('PKT003', 'Paket Dynamic Conv Adult 1', 'Pert/Minggu 2x90\" 24 Sesi 3 Bulan', 615000, 24),
('PKT004', 'Paket Elementary 1', 'Pert/Minggu 2x90\" 24 Sesi 3 Bulan', 615000, 24),
('PKT005', 'Paket Elementari 2', 'Pert/Minggu 2x90\" 24 Sesi 3 Bulan', 615000, 24),
('PKT006', 'Paket TOEFL Preparation', 'Pert/Minggu 2x90\" 24 Sesi 3 Bulan', 1050000, 24),
('PKT007', 'PAKET TOEIC Preparation', 'Pert/Minggu 2x90\" 24 Sesi 3 Bulan', 1050000, 24);

-- --------------------------------------------------------

--
-- Table structure for table `mst_siswa`
--

CREATE TABLE `mst_siswa` (
  `id_siswa` char(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(35) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_siswa`
--

INSERT INTO `mst_siswa` (`id_siswa`, `nama`, `email`, `password`, `alamat`, `no_telp`, `no_ktp`, `foto`) VALUES
('0011121', 'Yuddi', 'aaa@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Karawang', '08568877654', '12345678987654', '0011121.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE `mst_user` (
  `id_usr` char(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`id_usr`, `username`, `password`) VALUES
('ADMBBC01', 'Adrian Maulana', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `trx_daftar`
--

CREATE TABLE `trx_daftar` (
  `id_daftar` char(12) NOT NULL,
  `id_siswa` char(7) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_paket` char(6) NOT NULL DEFAULT '',
  `jenis_pembayaran` varchar(8) NOT NULL,
  `biaya_kursus` int(8) NOT NULL,
  `biaya_daftar` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trx_daftar`
--

INSERT INTO `trx_daftar` (`id_daftar`, `id_siswa`, `tanggal`, `status`, `id_paket`, `jenis_pembayaran`, `biaya_kursus`, `biaya_daftar`) VALUES
('BBC112021001', '0011121', '2021-11-05', 'Dapat Kelas', 'PKT002', 'Cash', 600000, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `trx_jadwal`
--

CREATE TABLE `trx_jadwal` (
  `kode_jadwal` int(11) NOT NULL,
  `kode_kelas` int(11) NOT NULL,
  `hari` varchar(7) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trx_jadwal`
--

INSERT INTO `trx_jadwal` (`kode_jadwal`, `kode_kelas`, `hari`, `jam_masuk`, `jam_keluar`) VALUES
(5, 7, 'Senin', '16:00:00', '17:30:00'),
(6, 7, 'Senin', '15:30:00', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `trx_pembayaran`
--

CREATE TABLE `trx_pembayaran` (
  `no_pembayaran` char(7) NOT NULL,
  `id_daftar` char(12) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `jumlah_bayar` int(8) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `bukti_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trx_pembayaran`
--

INSERT INTO `trx_pembayaran` (`no_pembayaran`, `id_daftar`, `tanggal`, `jumlah_bayar`, `no_rek`, `atas_nama`, `status`, `bukti_pembayaran`) VALUES
('1121001', 'BBC112021001', '2021-11-05', 700000, '12345678yutyu', 'dgfdgf', 'Sudah Konfirmasi', '1121001.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_kelas`
--
ALTER TABLE `mst_kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `mst_kelas_detail`
--
ALTER TABLE `mst_kelas_detail`
  ADD KEY `FK_mst_kelasdetail_mst_siswa` (`id_siswa`),
  ADD KEY `FK_mst_kelasdetail_mst_kelas` (`kode_kelas`);

--
-- Indexes for table `mst_paket`
--
ALTER TABLE `mst_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `mst_siswa`
--
ALTER TABLE `mst_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`id_usr`);

--
-- Indexes for table `trx_daftar`
--
ALTER TABLE `trx_daftar`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `FK_trx_daftar_mst_siswa` (`id_siswa`),
  ADD KEY `FK_trx_daftar_mst_paket` (`id_paket`);

--
-- Indexes for table `trx_jadwal`
--
ALTER TABLE `trx_jadwal`
  ADD PRIMARY KEY (`kode_jadwal`);

--
-- Indexes for table `trx_pembayaran`
--
ALTER TABLE `trx_pembayaran`
  ADD PRIMARY KEY (`no_pembayaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_kelas`
--
ALTER TABLE `mst_kelas`
  MODIFY `kode_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trx_jadwal`
--
ALTER TABLE `trx_jadwal`
  MODIFY `kode_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mst_kelas_detail`
--
ALTER TABLE `mst_kelas_detail`
  ADD CONSTRAINT `FK_mst_kelasdetail_mst_kelas` FOREIGN KEY (`kode_kelas`) REFERENCES `mst_kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_mst_kelasdetail_mst_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `mst_siswa` (`id_siswa`) ON UPDATE CASCADE;

--
-- Constraints for table `trx_daftar`
--
ALTER TABLE `trx_daftar`
  ADD CONSTRAINT `FK_trx_daftar_mst_paket` FOREIGN KEY (`id_paket`) REFERENCES `mst_paket` (`id_paket`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_trx_daftar_mst_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `mst_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
