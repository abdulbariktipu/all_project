/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.1.26-MariaDB : Database - library
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`library` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `library`;

/*Table structure for table `book_borrow` */

DROP TABLE IF EXISTS `book_borrow`;

CREATE TABLE `book_borrow` (
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `book_borrow` */

insert  into `book_borrow`(`borrow_id`,`sid`,`username`,`email`,`book_id`,`book_name`,`writer_name`,`book_edition`,`borrow_date`,`return_date`) values 
(20,14310026,'tipu','tstipu69@gmsil.com',54,'Machine Learning	','Dr. Supratip Ghose	','7','08-07-2017','16-07-2017'),
(21,2,'Sohel Rana','sohel@gmsil.com',99,'Pattern Recognition	','N.S.M. Rezaur Rahman	','8','09-07-2017','17-07-2017'),
(24,6,'Abdul Barik Tipu	','tstipu69@gmail.com',34570,'Database Management Systems	','Mr. Al-Imtiaz	','5','14-06-2017','22-06-2017'),
(29,14310026,'Tipu','tipu@gmail.com',34572,'Machine Learning	','Dr. Supratip Ghose	','3','30-07-2017','07-08-2017');

/*Table structure for table `book_entry` */

DROP TABLE IF EXISTS `book_entry`;

CREATE TABLE `book_entry` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(50) NOT NULL,
  `iso_no` varchar(50) NOT NULL,
  `writer_name` varchar(50) NOT NULL,
  `book_code` int(50) NOT NULL,
  `rack_no` varchar(50) NOT NULL,
  `no_of_copy` int(11) NOT NULL,
  `today_date` varchar(50) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34570 DEFAULT CHARSET=latin1;

/*Data for the table `book_entry` */

insert  into `book_entry`(`book_id`,`book_name`,`iso_no`,`writer_name`,`book_code`,`rack_no`,`no_of_copy`,`today_date`) values 
(3,'CDNS','7777','Tipu',3342,'3',3,'2017-06-02 00:52:32'),
(5,'Test','47586','Tipu',543,'5',33,'2017-06-04 00:22:54'),
(111,'Pattern Recognition	','47586','Tipu',22342,'5',4,'2018-03-18 16:41:46'),
(22342,'Pattern','342345','TST',43,'54',3,'2018-03-18 16:42:30'),
(34568,'Software Development','5467','Jaydeb Sarker',34679,'3',4,'2017-07-10 00:07:35'),
(34569,'Artificial Intelligence','546745','Salahuddin Haowlader',4598,'4',6,'2017-07-10 00:08:09');

/*Table structure for table `book_return` */

DROP TABLE IF EXISTS `book_return`;

CREATE TABLE `book_return` (
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `book_return` */

insert  into `book_return`(`return_id`,`sid`,`username`,`book_id`,`book_name`,`borrow_date`,`return_date`,`late_days`,`due`) values 
(1,15289641,'tipu',3455,'Machine Learning','08-06-2017','14-06-2017',24,240),
(19,14310026,'Tipu',34572,'Machine Learning	','06-06-2017','14-06-2017',0,0),
(20,14310025,'Sohel Rana	',34571,'Pattern Recognition	','01-06-2017','09-06-2017',3,30),
(21,12121,'Abdul Barik Tipu	',34570,'Database Management Systems	','09-06-2017','17-06-2017',0,0),
(22,4321,'user',34569,'Artificial Intelligence	','18-07-2017','26-07-2017',4,40),
(24,5,'Sathi',93,'Math','15-06-2017','23-06-2017',46,0),
(25,786786,'Rubel',34571,'Pattern Recognition	','26-02-2018','06-03-2018',0,0),
(26,8,'Sodipto saha',33,'Software Development	','01-06-2017','09-06-2017',483,0),
(27,8,'Sodipto saha',33,'Software Development	','01-06-2017','09-06-2017',483,0);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

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
  `access_control` int(20) NOT NULL,
  `user_image` varchar(200) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`sid`,`username`,`dept`,`batch`,`email`,`phone`,`adress`,`password`,`gender`,`access_control`,`user_image`) values 
(1,'admin','CSE','14','tstipu69@gmsil.com',1737498458,'Dhaka','21232f297a57a5a743894a0e4a801fc3','Male',1,'IMG_6940.JPG'),
(33,'','CSE','','',1737498458,'','d41d8cd98f00b204e9800998ecf8427e','Male',0,''),
(123,'user','N/A','14','rokibjewel@gmail.com',1737498458,'netrokona','ee11cbb19052e40b07aac0ca060c23ee','Female',0,'map.jpg'),
(2321,'testing','e','a','tstipu69@gmail.com',23423423,'weqwe','96e79218965eb72c92a549dd5a330112','Female',0,''),
(123456,'user','cse','14','tstipu69@gmail.com',4124,'Dhaka','e10adc3949ba59abbe56e057f20f883e','Male',0,''),
(786786,'Rubel','IT','2018','rubel@gmail.com',2147483647,'Dhaka','e82f236994553ad6ecb71fee393d7a6d','Male',0,''),
(14310025,'Sohel Rana','CSE','16','tstipu69@gmsil.com',1737498458,'Netrokona','b0baee9d279d34fa1dfd71aadb908c3f','Male',0,''),
(14310026,'','CSE','14','tipu@gmail.com',1754,'Dhaka','d41d8cd98f00b204e9800998ecf8427e','Male',0,''),
(1111111111,'','e','a','tstipu69@gmail.com',2345,'admin','96e79218965eb72c92a549dd5a330112','Male',1,'');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
