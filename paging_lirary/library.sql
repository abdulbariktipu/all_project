-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2017 at 06:47 PM
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
  `return_date` varchar(50) NOT NULL,
  `today_date` varchar(50) NOT NULL,
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=124527 ;

--
-- Dumping data for table `book_entry`
--

INSERT INTO `book_entry` (`book_id`, `book_name`, `iso_no`, `writer_name`, `book_code`, `rack_no`, `no_of_copy`, `return_date`, `today_date`) VALUES
(102327, 'Math', 'ISBN205E25', 'Tipu', 44, '36', 4, '03/13/2017', '2017-03-07'),
(124521, 'AI', '2W3E4R', 'TASDE', 30000, '3', 1, '03/14/2017', '2017-03-07'),
(3456, 'ASD', '5532', 'dgd', 45, '3', 4, '04/23/2017', '2017-04-22 22:38:01'),
(1, 'A', '2', 'D', 3, '4', 6, '04/20/2017', '2017-04-22 22:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `username2` varchar(50) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `access_control` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `username2`, `birthdate`, `email`, `password`, `access_control`) VALUES
(53, 'a', 'a', '01/31/2017', 'asdf@sdlf.com', '0cc175b9c0f1b6a831c399e269772661', 0),
(56, 't', 's', '02/06/2017', 'dfgs@sdf.sdfg', 'e358efa489f58062f10dd7316b65649e', 0),
(59, 's', 's', '02/06/2017', 's@sdf.cks', '0305d718926ac8776a442023509c21ce', 0),
(60, 'user3', 'Rahman', '02/06/2017', 'asdf@sdf.cmk', '92877af70a45fd6a2ed7fe81e1236b78', 0),
(61, 'admin', 'user45', '02/06/2017', 'admin@sdf.dfg', '21232f297a57a5a743894a0e4a801fc3', 1),
(62, 'w', 'w', '02/06/2017', 'w@w.com', '23e65a679105b85c5dc7034fded4fb5f', 0),
(63, 'Tipu', 'Sultan', '02/06/2017', 'tipu@l2nsoft.com', 'c14612be7995f7f6dbef250bf976fc0d', 0),
(64, 'test1', 'test1', '02/06/2017', 'sadf@asdf.ckd', '5a105e8b9d40e1329780d62ea2265d8a', 0),
(65, 'test2', 'test2', '02/06/2017', 'dfasd@sdfasd.ckd', 'ad0234829205b9033196ba818f7a872b', 0),
(66, 'library', 'project', '02/06/2017', 'library@project.com', 'd521f765a49c72507257a2620612ee96', 0),
(67, 'admin2', 'er', '02/15/2017', 'tipu@ls.com', 'c4ca4238a0b923820dcc509a6f75849b', 1),
(68, 'user', 'user', '02/15/2017', 'user@user.com', 'c4ca4238a0b923820dcc509a6f75849b', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
