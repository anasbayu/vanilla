-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2015 at 02:41 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vanilla`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` varchar(7) NOT NULL,
  `id_jenis` varchar(7) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `id_merek` varchar(7) DEFAULT NULL,
  `deskripsi` varchar(500) DEFAULT NULL,
  `harga` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_barang`),
  KEY `fk_jenis` (`id_jenis`),
  KEY `fk_merek` (`id_merek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_jenis`, `nama_barang`, `path`, `id_merek`, `deskripsi`, `harga`) VALUES
('br001', 'jn001', 'lifebuoy merah', 'gambar/anu.jpg', 'mrk001', 'Deskripsi 1', '10.000'),
('br002', 'jn001', 'Dove Susu', 'gambar/b.jpg', 'mrk002', 'Deskripsi 2', '10.000'),
('br003', 'jn002', 'Ransel Fifa Keren', 'gambar/ransel.jpg', 'mrk003', 'Deskripsi 3', '10.000'),
('br004', 'jn002', 'Tas Gahol', 'gambar/holebrain.jpg', 'mrk003', 'Deskripsi 4', '10.000'),
('br005', 'jn001', 'aaaa', 'gambar/1.jpg', 'mrk001', 'dada', '10.000'),
('br007', 'jn001', 'barang 7', 'gambar/a moment before freedom.jpg', 'mrk002', 'dawd/./3.2/12.4/3fwef/./', '100.000'),
('br008', 'jn001', 'barang 8', 'gambar/1203.png', 'mrk001', 'dook9021i1298*(*&^*W(@*@', '5555'),
('br009', 'jn001', 'barang 9', 'gambar/Zephyrus.jpg', 'mrk003', 'jfiwo3fj', '899'),
('br010', 'jn001', 'barang 10', 'gambar/when the earth meet the sky, bolivia.jpg', 'mrk001', '}{)_()*#(&^&%%$@||P@OI*&JDKJ', '787');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE IF NOT EXISTS `jenis` (
  `id_jenis` varchar(7) NOT NULL,
  `nama_jenis` varchar(50) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `stok`) VALUES
('jn001', 'alat mandi', 7),
('jn002', 'tas', 2);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `level`) VALUES
('admin', 'admin', 'admin'),
('user', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE IF NOT EXISTS `merek` (
  `id_merek` varchar(7) NOT NULL,
  `nama_merek` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_merek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`id_merek`, `nama_merek`) VALUES
('mrk001', 'lifebuoy'),
('mrk002', 'Dove'),
('mrk003', 'Fifa');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`),
  ADD CONSTRAINT `fk_merek` FOREIGN KEY (`id_merek`) REFERENCES `merek` (`id_merek`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
