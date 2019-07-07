-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 31, 2017 at 06:01 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `book_borrow`
--

INSERT INTO `book_borrow` (`borrow_id`, `sid`, `username`, `email`, `book_id`, `book_name`, `writer_name`, `book_edition`, `borrow_date`, `return_date`) VALUES
(20, 14310026, 'tipu', 'tstipu69@gmsil.com', 54, 'Machine Learning	', 'Dr. Supratip Ghose	', '7', '08-07-2017', '16-07-2017'),
(21, 2, 'Sohel Rana', 'sohel@gmsil.com', 99, 'Pattern Recognition	', 'N.S.M. Rezaur Rahman	', '8', '09-07-2017', '17-07-2017'),
(24, 6, 'Abdul Barik Tipu	', 'tstipu69@gmail.com', 34570, 'Database Management Systems	', 'Mr. Al-Imtiaz	', '5', '14-06-2017', '22-06-2017'),
(25, 7, 'Jannat', 'jannatul@gmail.com', 95, 'Artificial Intelligence	', 'Salahuddin Haowlader	', '5', '13-06-2017', '20-06-2017'),
(26, 5, 'Sathi', 'b@gmail.com', 93, 'Math', 'Tipu', '7', '15-06-2017', '23-06-2017'),
(28, 8, 'Sodipto saha', 'tstipu69@gmsil.com', 33, 'Software Development	', 'Jaydeb Sarker	', '8', '01-06-2017', '09-06-2017'),
(29, 14310026, 'Tipu', 'tipu@gmail.com', 34572, 'Machine Learning	', 'Dr. Supratip Ghose	', '3', '30-07-2017', '07-08-2017');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34573 ;

--
-- Dumping data for table `book_entry`
--

INSERT INTO `book_entry` (`book_id`, `book_name`, `iso_no`, `writer_name`, `book_code`, `rack_no`, `no_of_copy`, `today_date`) VALUES
(2, 'Project', '3467', 'dgd', 35434, '4', 4, '2017-06-02 00:51:34'),
(3, 'CDNS', '7777', 'Tipu', 3342, '3', 3, '2017-06-02 00:52:32'),
(4, 'Math', '3467', 'SDFG', 3456, '456', 3, '2017-06-02 02:19:33'),
(5, 'Test', '', '', 543, '', 33, '2017-06-04 00:22:54'),
(34564, 'ASD', '', '', 0, '', 0, '2017-07-07 17:28:16'),
(34566, 'Software Dev', '3467', 'Tipu', 5432, '3', 9, '2017-07-09 00:38:29'),
(34567, 'Network', '23416', 'Riyad', 435, '2', 6, '2017-07-10 00:04:37'),
(34568, 'Software Development', '5467', 'Jaydeb Sarker', 34679, '2', 4, '2017-07-10 00:07:35'),
(34569, 'Artificial Intelligence', '546745', 'Salahuddin Haowlader', 4598, '4', 6, '2017-07-10 00:08:09'),
(34570, 'Database Management Systems', '1234', 'Mr. Al-Imtiaz', 768, '3', 7, '2017-07-10 00:09:31'),
(34571, 'Pattern Recognition', '3465', 'N.S.M. Rezaur Rahman', 56485, '4-3', 6, '2017-07-22 14:24:30'),
(34572, 'Machine Learning', '5532', 'Dr. Supratip Ghose', 5148, '4', 4, '2017-07-22 14:26:55');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `book_return`
--

INSERT INTO `book_return` (`return_id`, `sid`, `username`, `book_id`, `book_name`, `borrow_date`, `return_date`, `late_days`, `due`) VALUES
(1, 15289641, 'tipu', 3455, 'Machine Learning', '08-06-2017', '14-06-2017', 24, 240),
(19, 14310026, 'Tipu', 34572, 'Machine Learning	', '06-06-2017', '14-06-2017', 0, 0),
(20, 14310025, 'Sohel Rana	', 34571, 'Pattern Recognition	', '01-06-2017', '09-06-2017', 3, 30),
(21, 12121, 'Abdul Barik Tipu	', 34570, 'Database Management Systems	', '09-06-2017', '17-06-2017', 0, 0),
(22, 4321, 'user', 34569, 'Artificial Intelligence	', '18-07-2017', '26-07-2017', 4, 40),
(23, 1254, 'Jannatul Ferdaus Jannat	', 34568, 'Software Development	', '18-07-2017', '26-07-2017', 2, 20);

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
  `access_control` int(20) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sid`, `username`, `dept`, `batch`, `email`, `phone`, `adress`, `password`, `gender`, `access_control`) VALUES
(0, 'dsds', 'sdsdsd', '', '', 0, '', 'd41d8cd98f00b204e9800998ecf8427e', 'Male', 0),
(1, 'admin', 'CSE', '14', 'tstipu69@gmsil.com', 1737498458, 'Dhaka', '21232f297a57a5a743894a0e4a801fc3', 'Male', 1),
(33, '', 'CSE', '', '', 1737498458, '', 'd41d8cd98f00b204e9800998ecf8427e', 'Male', 0),
(123, 'user', 'N/A', '14', 'rokibjewel@gmail.com', 1737498458, 'netrokona', 'ee11cbb19052e40b07aac0ca060c23ee', 'Female', 0),
(1254, 'Jannatul Ferdaus Jannat', 'EEE', '15', 'jannat@gmail.com', 1754, 'Dhaka', 'c3ac70501ad99a467f14f62dd4642391', 'Female', 0),
(4321, 'user', 'IT', '14', 'jannatulferdausbably@gmail.com', 1737498458, 'Dhaka', 'd93591bdf7860e1e4ee2fca799911215', 'Male', 0),
(12121, 'Abdul Barik Tipu', 'CSE', '14', 'tstipu69@gmail.com', 1737498458, 'Dhaka', 'd41d8cd98f00b204e9800998ecf8427e', 'Male', 0),
(14310025, 'Sohel Rana', 'CSE', '16', 'tstipu69@gmsil.com', 1737498458, 'Netrokona', 'b0baee9d279d34fa1dfd71aadb908c3f', 'Male', 0),
(14310026, 'Tipu', 'CSE', '14', 'tipu@gmail.com', 1754, 'Dhaka', 'd41d8cd98f00b204e9800998ecf8427e', 'Male', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
