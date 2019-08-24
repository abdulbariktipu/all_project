/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.1.26-MariaDB : Database - codeigniter
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`codeigniter` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `codeigniter`;

/*Table structure for table `baby` */

DROP TABLE IF EXISTS `baby`;

CREATE TABLE `baby` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `meaning` varchar(50) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `txtMsg` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `baby` */

insert  into `baby`(`id`,`name`,`meaning`,`gender`,`religion`,`txtMsg`) values 
(1,'tipu','no','m','i',''),
(18,'tipu','no','ad','',''),
(19,'tipu','','m','',''),
(20,'e','e','e','',''),
(21,'tipu','','m','',''),
(22,'tipu','','m','',''),
(23,'tipu','no','m','',''),
(24,'tipu','no','ad','',''),
(25,'tani','no','as','',''),
(26,'Sultan','Your','M','islam','Drop Us a Message'),
(27,'d','s','as','e',''),
(28,'ee','ee','eee','ee','ee'),
(29,'we','we','er','we',''),
(30,'eer','erer','tet','er','');

/*Table structure for table `contact_info` */

DROP TABLE IF EXISTS `contact_info`;

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` int(11) NOT NULL,
  `message` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `contact_info` */

insert  into `contact_info`(`id`,`name`,`email`,`telephone`,`message`) values 
(1,'A','tstipu69@gmail.ocm',0,''),
(2,'b','tstipu@gmail.ocm',2147483647,'tesy');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`) values 
(1,'tipu','tstipu69@gmail.com','202cb962ac59075b964b07152d234b70'),
(10,'tani','tstipu69@gmail.com','202cb962ac59075b964b07152d234b70'),
(11,'tani','tstipu69@gmail.com','81dc9bdb52d04dc20036dbd8313ed055');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
