-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2017 at 07:14 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tolet_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `tolet_id` int(11) NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `name`, `phone`, `description`, `created`, `tolet_id`) VALUES
(38, 'sodipto saha', 98761, 'badhan', '2017-03-21 00:04:37', 41),
(39, 'tipu vai ', 88347, 'gerimara', '2017-03-21 00:23:02', 41),
(40, 'badhan', 647475, 'Test', '2017-03-21 01:06:22', 41),
(44, 'Tipu', 1737498458, 'Test', '2017-03-23 21:56:55', 43),
(45, 'Abdul Barik Tipu', 17375839, 'Dropdowns\r\nAccordions\r\nConvert Weights\r\nAnimated Buttons\r\nSide Navigation\r\nTop Navigation\r\nJS Animations\r\nModal Boxes\r\nProgress Bars\r\nParallax', '2017-03-24 00:28:34', 43),
(46, 'Abdul Barik Tipu', 17375839, 'Dropdowns\r\nAccordions\r\nConvert Weights\r\nAnimated Buttons\r\nSide Navigation\r\nTop Navigation\r\nJS Animations\r\nModal Boxes\r\nProgress Bars\r\nParallax', '2017-03-24 00:29:48', 43),
(47, 'Abdul Barik Tipu', 17375839, 'Dropdowns\r\nAccordions\r\nConvert Weights\r\nAnimated Buttons\r\nSide Navigation\r\nTop Navigation\r\nJS Animations\r\nModal Boxes\r\nProgress Bars\r\nParallax', '2017-03-24 00:30:28', 43),
(48, 'Abdul Barik Tipu', 17375839, 'Dropdowns\r\nAccordions\r\nConvert Weights\r\nAnimated Buttons\r\nSide Navigation\r\nTop Navigation\r\nJS Animations\r\nModal Boxes\r\nProgress Bars\r\nParallax', '2017-03-24 00:30:52', 43),
(49, 'Tipu', 93302, 'Test Description', '2017-03-24 01:29:55', 41),
(50, 'asdf', 343, 'ggg', '2017-03-31 14:43:46', 0),
(51, 'badhan', 4444, 'hd', '2017-03-31 14:43:56', 0),
(52, 'tttt', 4444, 'dfgdg', '2017-03-31 14:44:24', 40),
(53, 'badhan', 4444, 'hd', '2017-03-31 14:44:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hedar`
--

CREATE TABLE IF NOT EXISTS `hedar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hedar` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `hedar`
--

INSERT INTO `hedar` (`id`, `hedar`) VALUES
(1, 'Test'),
(2, 'sdfasdf'),
(3, 'asdfas'),
(4, 'sultan'),
(5, 'tipu'),
(6, 'Register, Login and Logout user php mysql'),
(7, 'ZXY'),
(8, 'L2N'),
(9, 'Name: Abdul Barik Tipu\r\nAddr: Dhaka'),
(10, 'Name: Abdul Barik Tipu\r\nAddr: Dhaka'),
(11, 'Register user php mysql'),
(12, 'Showing 1 to 6 of 6 entries'),
(13, 'Name'),
(14, 'Register '),
(15, 'Name'),
(16, 'Registration, Login, Logout and List view user php mysql It''s free!'),
(17, 'Registration, Login, Logout and List view user php mysql'),
(18, '1'),
(19, '2'),
(20, '3'),
(21, '1,'),
(22, '2,'),
(23, '3,'),
(24, '4,'),
(25, '5,'),
(26, '03/10/2016');

-- --------------------------------------------------------

--
-- Table structure for table `tolet_table`
--

CREATE TABLE IF NOT EXISTS `tolet_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `created` varchar(200) NOT NULL,
  `requard_date` date NOT NULL,
  `description` varchar(500) NOT NULL,
  `address` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `tolet_table`
--

INSERT INTO `tolet_table` (`id`, `path`, `username`, `email`, `phone`, `created`, `requard_date`, `description`, `address`) VALUES
(40, 'images//images.jpg', 'Test-1', 'tstipu69@gmail.com', 1737498458, '2017-03-02 22:50:17', '2011-08-19', 'Test', 'Dhaka'),
(41, 'images//3.jpg', 'Test-2', 'tssathi69@gmail.com', 1737498458, '2017-03-02 22:57:18', '2011-08-19', 'Test', 'Dhaka'),
(42, 'images//586f7e2f94f7b9.21099476.jpg', '', '', 0, '2017-03-02 23:08:19', '2011-08-19', '', ''),
(43, 'images//42bddaf7.jpg', 'Test-3', 'tssathi69@gmail.com', 1737498458, '2017-03-02 23:10:19', '2011-08-19', 'Test', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `username2` varchar(50) NOT NULL,
  `access_control` int(20) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `file` varchar(50) NOT NULL,
  `regDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=118 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `username2`, `access_control`, `birthdate`, `email`, `password`, `file`, `regDate`) VALUES
(72, 'fgsadfg', 'sdfgsd', 0, '10/09/2016', 'tstipu69@gmail.com', 'c81e728d9d4c2f636f067f89cc14862c', '', '2016-10-09 12:36:29'),
(73, 'fgdfg', 'dfgdfg', 0, '10/09/2016', 'tstipu69@gmail.com', 'a87ff679a2f3e71d9181a67b7542122c', '', '2016-10-09 12:38:09'),
(76, 'Image', 'images', 0, '10/09/2016', 'images@gfv.mnb', '59b514174bffe4ae402b3d63aad79fe0', 'images//user-login-icon.png', '2016-10-09 14:02:52'),
(91, 'Sathi', 'asdf', 0, '', 'asf@sdf.bvc', 'sfsf', '', '0000-00-00 00:00:00'),
(92, 'tstipu', 'Tipu', 0, '10/09/2016', 'tstipu69@gmail.com', 'dd859d04868ef52089e0ccf782d65d60', 'images/', '2016-10-09 15:09:10'),
(93, 'tipu', 'Sultan', 0, '10/16/2016', 'tipu@l.com', 'd2762f79d9ec16dba82af6ba40a8f264', '', '2016-10-16 09:51:15'),
(94, 'Sathi', 'Sathi', 0, '10/16/2016', 'sathi@gmail.com', '1d27bd874690fbf2ca516dfd26af85e6', '', '2016-10-16 09:54:42'),
(97, 'B', 'Y', 0, '', 'tstipu69@gmail.com', '', 'images/dua-qunut-in-bangla-1-2-s-307x512.jpg', '2016-10-16 10:06:05'),
(98, 'c', 'c', 0, '10/17/2016', 'tstipu69@gmail.com', '4a8a08f09d37b73795649038408b5f33', 'images/IMG_20161017_004025.jpg', '2016-10-17 15:26:25'),
(99, 'Tarek', 'Hasan', 0, '12/14/2016', 'tarek@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'images/govt-calendar-f-2016.jpg', '2016-12-11 15:02:06'),
(100, 'user4', 'user4', 0, '01/10/2017', 'user@sus.com', '3f02ebe3d7929b091e3d8ccfde2f3bc6', 'images/WP_20131221_009.jpg', '2017-01-09 10:32:44'),
(101, 'Tipu', 'Sultan', 0, '01/09/2017', 'tipu@sd.com', 'd2762f79d9ec16dba82af6ba40a8f264', 'images/15-transactions-in-dbms-6-728.jpg', '2017-01-09 12:28:54'),
(102, 'Sohel', 'Rana', 0, '01/09/2017', 'sohel@sss.com', 'c4ca4238a0b923820dcc509a6f75849b', 'images/15-transactions-in-dbms-6-728.jpg', '2017-01-09 12:30:29'),
(103, 'a', 'b', 0, '01/03/2017', 'afg@sdf.nbg', '0cc175b9c0f1b6a831c399e269772661', '', '2017-01-15 11:27:29'),
(104, 'Sajanur', 'Rahman', 0, '01/15/2017', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '2017-01-15 11:31:06'),
(105, 'Sajanur', 'Rahman', 0, '08/25/1990', 'rajann2508@gmail.com', '40e95fec92ad9396fd4b0e693ff3f3b9', '', '2017-01-15 11:32:03'),
(106, 'c', 'd', 0, '01/16/2017', 'aca@dfdf.bbv', '4a8a08f09d37b73795649038408b5f33', '', '2017-01-16 13:56:41'),
(107, 'x', 'c', 0, '01/16/2017', 'asdf@dfgf.vbg', '9dd4e461268c8034f5c8564e155c67a6', '', '2017-01-16 13:57:02'),
(108, 'd', 'd', 0, '01/16/2017', 'sfd@dfmn.ngd', '8277e0910d750195b448797616e091ad', '', '2017-01-16 13:57:53'),
(109, 'c', 's', 0, '01/16/2017', 'asd@dfdf.com', '4a8a08f09d37b73795649038408b5f33', '', '2017-01-16 17:01:27'),
(110, 'z', 'x', 0, '01/16/2017', 'sdf@sdf.com', 'fbade9e36a3f36d3d676c1b808451dd7', '', '2017-01-16 17:01:53'),
(111, '', '', 0, '01/16/2017', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '2017-01-16 17:06:36'),
(112, '', '', 0, '01/17/2017', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '2017-01-17 12:27:26'),
(113, 'Kamrul', 'Hasan', 0, '01/26/1990', 'kamrul@gmaol.com', '7f69ba1ad3a61c1cd04d16e7bba988d8', '', '2017-01-26 16:08:57'),
(114, '', '', 0, '02/01/2017', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '2017-02-01 13:39:47'),
(115, '', '', 0, '02/01/2017', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '2017-02-01 13:40:11'),
(116, 'ttt', 'ttt', 0, '03/02/2017', 'tstipu@gmail.com', 'e358efa489f58062f10dd7316b65649e', '', '2017-03-02 21:45:35'),
(117, 'Admin', 'Admin', 1, '03/02/2017', 'tstipu@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', '2017-03-02 21:47:14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
