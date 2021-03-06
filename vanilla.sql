-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2015 at 09:31 AM
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
('br001', 'jn001', 'lifebuoy merah tua', 'gambar/Ahri LOL.jpg', 'mrk003', 'Deskripsi 1 aduh', '100.000'),
('br002', 'jn003', 'barang kedua', 'gambar/connection.jpg', 'mrk003', 'Serigala jadi jadian!', '1.000.000'),
('br003', 'jn003', 'barang ketiga', 'gambar/Wheres the milk.jpg', 'mrk001', 'barang keren', '100'),
('br004', 'jn001', 'Barang 4', 'gambar/Snow White.jpg', 'mrk002', 'barang 4 yang keren abies 29918419048019-[0ejimkjc983&Y@(*$U@)JQ*@(HFJ@?>@P$@)!!~', '5.000'),
('br007', 'jn003', 'Tank top gokil', 'gambar/bonjour.jpg', 'mrk004', 'Tank Top hijau gokil keren abieees', '10.000'),
('br009', 'jn001', 'barang 9', 'gambar/Zephyrus.jpg', 'mrk003', 'jfiwo3fj', '899'),
('br011', 'jn001', 'barang palsu', 'gambar/aKg4DXb_700b_v2.jpg', 'mrk002', 'Barang bajakan', '5.000.000');

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
('jn001', 'alat mandi', 4),
('jn002', 'tas', 0),
('jn003', 'Sepatu', 3);

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
('mrk003', 'Fifa'),
('mrk004', 'Polo');

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
