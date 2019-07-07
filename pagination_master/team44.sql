-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2016 at 07:41 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team44`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `detail`) VALUES
(1, 'Concept', 'Web Technologies'),
(2, 'HTML', 'Basic HTML, Special Tags, Formatting Tags, HTML Forms'),
(3, 'CSS', 'Basic CSS, Advanced Topics, '),
(4, 'JAVASCRIPT', 'Syntax, Enable, Location, External, Operators, Variable'),
(5, 'PHP BASIC PART1', 'Introduction To PHP'),
(6, 'PHP Basic 2', 'Arrays and Array Functions'),
(7, 'MySQL Basic', 'Introduction To MySQL'),
(8, 'CMS', 'What is Joomla'),
(9, 'XML', 'What is XML'),
(10, 'PHP Date', 'What''s a timestamp'),
(11, 'Files', 'Reading Files'),
(12, 'JavaScript', 'Ajax Basics'),
(13, 'File Formats', 'Creating PDF Files'),
(14, 'MySQL Database Administrators', 'Understanding MySQL Table Types'),
(15, 'PHP OOP', 'Understanding OOP Concepts');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
