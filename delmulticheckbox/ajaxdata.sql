-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 Des 2016 pada 00.53
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ajaxdata`
--
CREATE DATABASE IF NOT EXISTS `ajaxdata` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ajaxdata`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabledata`
--

CREATE TABLE IF NOT EXISTS `tabledata` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabledata`
--

INSERT INTO `tabledata` (`id`, `name`, `tgl`) VALUES
(1, 'T Ghazali', '2016-12-04'),
(2, 'Code Tube', '2016-12-28'),
(3, 'Murad', '2016-12-30'),
(4, 'Ahmad', '2016-12-09'),
(5, 'Irjen', '2017-01-28'),
(6, 'Rundisa', '2016-12-13'),
(7, 'Milekai', '2016-12-11'),
(8, 'Franko', '2016-12-25'),
(9, 'Urang', '2016-12-11'),
(10, 'Kameraik', '2016-12-18'),
(11, 'Inisul', '2016-12-07'),
(12, 'Sulaiman', '2016-12-18'),
(13, 'Mioekan', '2016-12-04'),
(14, 'Titto', '2016-12-28'),
(15, 'Budi', '2017-01-14'),
(16, 'Beta', '2016-12-19'),
(17, 'Salman', '2016-12-11'),
(18, 'Ali', '2016-12-16'),
(19, 'Fatima', '2016-12-13'),
(20, 'Annisa', '2016-12-28'),
(21, 'Aisha', '2016-12-13'),
(22, 'Lisa', '2016-12-11'),
(23, 'Abdullah', '2016-12-05'),
(24, 'Teuku Reka', '2016-12-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabledata`
--
ALTER TABLE `tabledata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabledata`
--
ALTER TABLE `tabledata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
