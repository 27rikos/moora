-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 19, 2023 at 09:31 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moora`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

DROP TABLE IF EXISTS `alternatif`;
CREATE TABLE IF NOT EXISTS `alternatif` (
  `NIS` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `nilai` varchar(20) NOT NULL,
  `penghasilan` varchar(12) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `jlh_tanggungan` varchar(12) NOT NULL,
  `kip` varchar(12) NOT NULL,
  PRIMARY KEY (`NIS`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`NIS`, `nama`, `nilai`, `penghasilan`, `pekerjaan`, `jlh_tanggungan`, `kip`) VALUES
(4, 'budi', '78,2', '1.500.000', 'Petani', '4', 'Ya'),
(5, 'Yanto', '88.5', '3.000.000', 'Wiraswasta', '3', 'Tidak'),
(6, 'Yanti', '90', '2.500.000', 'Wiraswasta', '4', 'Tidak'),
(7, 'Nina', '89.90', '4.000.000', 'PNS', '5', 'Tidak'),
(8, 'Nio', '79.90', '2.000.000', 'buruh', '2', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

DROP TABLE IF EXISTS `bobot`;
CREATE TABLE IF NOT EXISTS `bobot` (
  `id_bobot` int NOT NULL AUTO_INCREMENT,
  `w1` double NOT NULL,
  `w2` double NOT NULL,
  `w3` double NOT NULL,
  `w4` double NOT NULL,
  `w5` double NOT NULL,
  PRIMARY KEY (`id_bobot`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `w1`, `w2`, `w3`, `w4`, `w5`) VALUES
(1, 0.2, 0.2, 0.2, 0.2, 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kriteria`
--

DROP TABLE IF EXISTS `nilai_kriteria`;
CREATE TABLE IF NOT EXISTS `nilai_kriteria` (
  `id_nilai` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `c1` double NOT NULL,
  `c2` double NOT NULL,
  `c3` double NOT NULL,
  `c4` double NOT NULL,
  `c5` double NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nilai_kriteria`
--

INSERT INTO `nilai_kriteria` (`id_nilai`, `nama`, `c1`, `c2`, `c3`, `c4`, `c5`) VALUES
(8, 'budi', 3, 2, 3, 4, 2),
(9, 'Yanto', 4, 3, 4, 3, 1),
(10, 'Yanti', 5, 3, 4, 4, 1),
(11, 'Nina', 5, 5, 5, 5, 1),
(12, 'Nio', 3, 2, 3, 2, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
