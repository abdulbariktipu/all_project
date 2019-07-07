-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 10, 2017 at 06:14 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_borrow`
--

CREATE TABLE IF NOT EXISTS `book_borrow` (
  `borrow_id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `writer_name` varchar(100) NOT NULL,
  `book_edition` varchar(50) NOT NULL,
  `borrow_date` varchar(50) NOT NULL,
  `return_date` varchar(50) NOT NULL,
  PRIMARY KEY (`borrow_id`),
  KEY `sid` (`sid`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `book_borrow`
--

INSERT INTO `book_borrow` (`borrow_id`, `sid`, `username`, `email`, `book_id`, `book_name`, `writer_name`, `book_edition`, `borrow_date`, `return_date`) VALUES
(20, 14310026, 'tipu', '', 54, 'CDNS', 'Tipu', '', '08-07-2017', '16-07-2017'),
(21, 2, 'admin', 'tstipu69@gmsil.com', 99, 'CDNS', 'Tipu', '8', '09-07-2017', '17-07-2017'),
(24, 6, 'Rokib', 'rokibjewel@gmail.com', 96, 'ASD', 'Tipu', '5', '14-06-2017', '22-06-2017'),
(25, 7, 'sultan', 'tstipu69@gmsil.com', 95, 'wewe', 'SDFG', '5', '13-06-2017', '20-06-2017'),
(26, 5, 'Sathi', 'b@gmail.com', 93, 'Math', 'Tipu', '7', '15-06-2017', '23-06-2017'),
(28, 8, 'Sodipto saha', 'tstipu69@gmsil.com', 33, 'ASD', 'Tipu', '8', '01-06-2017', '09-06-2017');

-- --------------------------------------------------------

--
-- Table structure for table `book_entry`
--

CREATE TABLE IF NOT EXISTS `book_entry` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(50) NOT NULL,
  `iso_no` varchar(50) NOT NULL,
  `writer_name` varchar(50) NOT NULL,
  `book_code` int(50) NOT NULL,
  `rack_no` varchar(50) NOT NULL,
  `no_of_copy` int(11) NOT NULL,
  `today_date` varchar(50) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34571 ;

--
-- Dumping data for table `book_entry`
--

INSERT INTO `book_entry` (`book_id`, `book_name`, `iso_no`, `writer_name`, `book_code`, `rack_no`, `no_of_copy`, `today_date`) VALUES
(2, 'Project', '3467', 'dgd', 35434, '4', 4, '2017-06-02 00:51:34'),
(3, 'CDNS', '7777', 'Tipu', 3342, '3', 3, '2017-06-02 00:52:32'),
(4, 'Math', '3467', 'SDFG', 3456, '456', 3, '2017-06-02 02:19:33'),
(5, 'Test', '', '', 543, '', 33, '2017-06-04 00:22:54'),
(34564, 'ASD', '', '', 0, '', 0, '2017-07-07 17:28:16'),
(34565, 'tetr', '', '', 0, '', 0, '2017-07-09 00:38:01'),
(34566, 'sert', '3467', 'Tipu', 5, '3', 8, '2017-07-09 00:38:29'),
(34567, 'ASD', '', '', 0, '', 0, '2017-07-10 00:04:37'),
(34568, 'CDNS', '', '', 0, '', 0, '2017-07-10 00:07:35'),
(34569, 'CDNS', '', '', 0, '', 0, '2017-07-10 00:08:09'),
(34570, '', '', '', 0, '', 0, '2017-07-10 00:09:31');

-- --------------------------------------------------------

--
-- Table structure for table `book_return`
--

CREATE TABLE IF NOT EXISTS `book_return` (
  `return_id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `borrow_date` varchar(50) NOT NULL,
  `return_date` varchar(50) NOT NULL,
  `late_days` int(50) NOT NULL,
  `due` int(50) NOT NULL,
  PRIMARY KEY (`return_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `book_return`
--

INSERT INTO `book_return` (`return_id`, `sid`, `username`, `book_id`, `book_name`, `borrow_date`, `return_date`, `late_days`, `due`) VALUES
(1, 15289641, 'tipu', 3455, 'ASD', '08-06-2017', '14-06-2017', 24, 240),
(19, 4, 'Sodipto saha', 97, 'Softer dev', '06-06-2017', '14-06-2017', 25, 0),
(20, 3, 'tipu', 98, 'Math', '01-06-2017', '09-06-2017', 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `sid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(44) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sid`, `username`, `dept`, `batch`, `email`, `phone`, `adress`, `password`, `gender`) VALUES
(0, 'azq', 'azq', 'azq', 'azq', 0, 'azq', 'd41d8cd98f00b204e9800998ecf8427e', 'Male'),
(33, '', 'CSE', '', '', 0, '', 'd41d8cd98f00b204e9800998ecf8427e', 'Male'),
(61, 'admin', 'user45', '02/06/2017', 'admin@sdf.dfg', 0, '', '21232f297a57a5a743894a0e4a801fc3', ''),
(63, 'Tipu', 'Sultan', '02/06/2017', 'tipu@l2nsoft.com', 0, 'madaripur', 'c14612be7995f7f6dbef250bf976fc0d', ''),
(68, 'user', 'user', '02/15/2017', 'user@user.com', 0, 'gerimara', 'c4ca4238a0b923820dcc509a6f75849b', ''),
(12121, 'tipu', 'cse', '14', 'tstipu69@gmail.com', 1737498458, 'Dhaka', 'd41d8cd98f00b204e9800998ecf8427e', 'Male'),
(15289641, 'admin', '', '15-2', '', 0, '', 'd41d8cd98f00b204e9800998ecf8427e', 'Male'),
(152896415, 'Rokib', 'LLB', '16', 'tstipu69@gmail.com', 1737498458, '', 'd41d8cd98f00b204e9800998ecf8427e', 'Male');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
