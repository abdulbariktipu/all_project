-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2018 at 02:59 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_borrow`
--

CREATE TABLE `book_borrow` (
  `borrow_id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `writer_name` varchar(100) NOT NULL,
  `book_edition` varchar(50) NOT NULL,
  `borrow_date` varchar(50) NOT NULL,
  `return_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_borrow`
--

INSERT INTO `book_borrow` (`borrow_id`, `sid`, `username`, `email`, `book_id`, `book_name`, `writer_name`, `book_edition`, `borrow_date`, `return_date`) VALUES
(20, 14310026, 'tipu', 'tstipu69@gmsil.com', 54, 'Machine Learning	', 'Dr. Supratip Ghose	', '7', '08-07-2017', '16-07-2017'),
(21, 2, 'Sohel Rana', 'sohel@gmsil.com', 99, 'Pattern Recognition	', 'N.S.M. Rezaur Rahman	', '8', '09-07-2017', '17-07-2017'),
(24, 6, 'Abdul Barik Tipu	', 'tstipu69@gmail.com', 34570, 'Database Management Systems	', 'Mr. Al-Imtiaz	', '5', '14-06-2017', '22-06-2017'),
(25, 7, 'Jannat', 'jannatul@gmail.com', 95, 'Artificial Intelligence	', 'Salahuddin Haowlader	', '5', '13-06-2017', '20-06-2017'),
(28, 8, 'Sodipto saha', 'tstipu69@gmsil.com', 33, 'Software Development	', 'Jaydeb Sarker	', '8', '01-06-2017', '09-06-2017'),
(29, 14310026, 'Tipu', 'tipu@gmail.com', 34572, 'Machine Learning	', 'Dr. Supratip Ghose	', '3', '30-07-2017', '07-08-2017');

-- --------------------------------------------------------

--
-- Table structure for table `book_entry`
--

CREATE TABLE `book_entry` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `iso_no` varchar(50) NOT NULL,
  `writer_name` varchar(50) NOT NULL,
  `book_code` int(50) NOT NULL,
  `rack_no` varchar(50) NOT NULL,
  `no_of_copy` int(11) NOT NULL,
  `today_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_entry`
--

INSERT INTO `book_entry` (`book_id`, `book_name`, `iso_no`, `writer_name`, `book_code`, `rack_no`, `no_of_copy`, `today_date`) VALUES
(2, 'Project', '3467', 'dgd', 35434, '4', 4, '2017-06-02 00:51:34'),
(3, 'CDNS', '7777', 'Tipu', 3342, '3', 3, '2017-06-02 00:52:32'),
(4, 'Math', '3467', 'SDFG', 3456, '456', 3, '2017-06-02 02:19:33'),
(5, 'Test', '', '', 543, '', 33, '2017-06-04 00:22:54'),
(34568, 'Software Development', '5467', 'Jaydeb Sarker', 34679, '3', 4, '2017-07-10 00:07:35'),
(34569, 'Artificial Intelligence', '546745', 'Salahuddin Haowlader', 4598, '4', 6, '2017-07-10 00:08:09'),
(34571, 'Pattern Recognition', '3465', 'N.S.M. Rezaur Rahman', 56485, '4-3=2', 6, '2017-07-22 14:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `book_return`
--

CREATE TABLE `book_return` (
  `return_id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `borrow_date` varchar(50) NOT NULL,
  `return_date` varchar(50) NOT NULL,
  `late_days` int(50) NOT NULL,
  `due` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_return`
--

INSERT INTO `book_return` (`return_id`, `sid`, `username`, `book_id`, `book_name`, `borrow_date`, `return_date`, `late_days`, `due`) VALUES
(1, 15289641, 'tipu', 3455, 'Machine Learning', '08-06-2017', '14-06-2017', 24, 240),
(19, 14310026, 'Tipu', 34572, 'Machine Learning	', '06-06-2017', '14-06-2017', 0, 0),
(20, 14310025, 'Sohel Rana	', 34571, 'Pattern Recognition	', '01-06-2017', '09-06-2017', 3, 30),
(21, 12121, 'Abdul Barik Tipu	', 34570, 'Database Management Systems	', '09-06-2017', '17-06-2017', 0, 0),
(22, 4321, 'user', 34569, 'Artificial Intelligence	', '18-07-2017', '26-07-2017', 4, 40),
(23, 1254, 'Jannatul Ferdaus Jannat	', 34568, 'Software Development	', '18-07-2017', '26-07-2017', 2, 20),
(24, 5, 'Sathi', 93, 'Math', '15-06-2017', '23-06-2017', 46, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(44) NOT NULL,
  `access_control` int(20) NOT NULL
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
(2321, 'testing', 'e', 'a', 'tstipu69@gmail.com', 23423423, 'weqwe', '96e79218965eb72c92a549dd5a330112', 'Female', 0),
(4321, 'user', 'IT', '14', 'jannatulferdausbably@gmail.com', 1737498458, 'Dhaka', 'd93591bdf7860e1e4ee2fca799911215', 'Male', 0),
(123456, 'user', 'cse', '14', 'tstipu69@gmail.com', 4124, 'Dhaka', 'e10adc3949ba59abbe56e057f20f883e', 'Male', 0),
(14310025, 'Sohel Rana', 'CSE', '16', 'tstipu69@gmsil.com', 1737498458, 'Netrokona', 'b0baee9d279d34fa1dfd71aadb908c3f', 'Male', 0),
(14310026, '', 'CSE', '14', 'tipu@gmail.com', 1754, 'Dhaka', 'd41d8cd98f00b204e9800998ecf8427e', 'Male', 0),
(1111111111, '', 'e', 'a', 'tstipu69@gmail.com', 2345, 'admin', '96e79218965eb72c92a549dd5a330112', 'Male', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_borrow`
--
ALTER TABLE `book_borrow`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `sid` (`sid`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `book_entry`
--
ALTER TABLE `book_entry`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_return`
--
ALTER TABLE `book_return`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_borrow`
--
ALTER TABLE `book_borrow`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `book_entry`
--
ALTER TABLE `book_entry`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34572;
--
-- AUTO_INCREMENT for table `book_return`
--
ALTER TABLE `book_return`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
