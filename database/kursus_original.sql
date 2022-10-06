-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2017 at 05:07 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kursus`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_customer`
--

CREATE TABLE IF NOT EXISTS `mst_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1001 ;

--
-- Dumping data for table `mst_customer`
--

INSERT INTO `mst_customer` (`id`, `nama`, `alamat`, `no_telp`, `no_ktp`, `foto`) VALUES
(1, 'Mohamad Deden', 'Cianjur', '081222528726', '0123123123123', 'Chrysanthemum.jpg'),
(999, 'Administrator', 'Cianjur', '081222528726', '0123123123123', 'Chrysanthemum.jpg'),
(1000, 'andy setyawan', 'bandung', '12312', '231293812831', '');

-- --------------------------------------------------------

--
-- Table structure for table `mst_driver`
--

CREATE TABLE IF NOT EXISTS `mst_driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mst_mobil`
--

CREATE TABLE IF NOT EXISTS `mst_mobil` (
  `kode_mobil` varchar(25) NOT NULL,
  `jenis_mobil` varchar(20) NOT NULL,
  `nama_mobil` varchar(50) NOT NULL,
  `tahun_mobil` int(4) NOT NULL,
  PRIMARY KEY (`kode_mobil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_mobil`
--

INSERT INTO `mst_mobil` (`kode_mobil`, `jenis_mobil`, `nama_mobil`, `tahun_mobil`) VALUES
('CO0123', 'Manual', 'Toyota Avanza2', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `mst_paket`
--

CREATE TABLE IF NOT EXISTS `mst_paket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `biaya` double NOT NULL,
  `id_mobil1` varchar(30) NOT NULL,
  `id_mobil2` varchar(30) NOT NULL,
  `id_mobil3` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mst_paket`
--

INSERT INTO `mst_paket` (`id`, `nama`, `deskripsi`, `biaya`, `id_mobil1`, `id_mobil2`, `id_mobil3`) VALUES
(2, 'paket 1', 'deskripsi paket 1', 100000, 'CO0123', 'CO0123', 'CO0123'),
(3, 'paket 2', 'deskripsi paket 2', 100000, 'CO0123', 'CO0123', 'CO0123');

-- --------------------------------------------------------

--
-- Table structure for table `trx_daftar`
--

CREATE TABLE IF NOT EXISTS `trx_daftar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `paket` int(11) NOT NULL,
  `jenis_mobil` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `trx_daftar`
--

INSERT INTO `trx_daftar` (`id`, `id_customer`, `tanggal`, `status`, `paket`, `jenis_mobil`) VALUES
(5, 1000, '2017-07-19', 'Daftar', 2, 'Matic');

-- --------------------------------------------------------

--
-- Table structure for table `trx_jadwal`
--

CREATE TABLE IF NOT EXISTS `trx_jadwal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_daftar` int(11) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `trx_jadwal`
--

INSERT INTO `trx_jadwal` (`id`, `id_daftar`, `tanggal`, `status`) VALUES
(2, 5, '07/20/2017', 'Request Cancel');

-- --------------------------------------------------------

--
-- Table structure for table `trx_konfirmasi`
--

CREATE TABLE IF NOT EXISTS `trx_konfirmasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_daftar` int(11) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `biaya` double NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `trx_konfirmasi`
--

INSERT INTO `trx_konfirmasi` (`id`, `id_daftar`, `tanggal`, `biaya`, `no_rek`, `atas_nama`, `status`, `id_user`) VALUES
(1, 5, '30/10/2017', 10000, '123123', 'm deden', 'Request', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `trx_user`
--

CREATE TABLE IF NOT EXISTS `trx_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usr` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `trx_user`
--

INSERT INTO `trx_user` (`id`, `id_usr`, `username`, `password`) VALUES
(1, 999, 'admin', 'admin'),
(2, 1, 'deden', 'deden'),
(3, 1000, 'andy', 'andy');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
