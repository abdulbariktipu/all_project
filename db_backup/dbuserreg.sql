/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.1.26-MariaDB : Database - dbuserreg
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbuserreg` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbuserreg`;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `sid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(44) NOT NULL,
  `access_control` int(20) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`sid`,`username`,`country`,`state`,`password`,`gender`,`access_control`) values 
(0,'','1Brazil','state','d41d8cd98f00b204e9800998ecf8427e','Male',0),
(2321,'adminas','4','state','96e79218965eb72c92a549dd5a330112','Male',0),
(33333,'bbbbbb','5USA','California','d41d8cd98f00b204e9800998ecf8427e','Female',0),
(44444,'werqwer','2China','state','96e79218965eb72c92a549dd5a330112','Male',0),
(151515,'Tipu sultan','4India','Delhi','d41d8cd98f00b204e9800998ecf8427e','Male',0),
(14310026,'Tipu','Dhaka','','d41d8cd98f00b204e9800998ecf8427e','Male',0),
(123452342,'tipusultan','','','e10adc3949ba59abbe56e057f20f883e','Male',0),
(676776767,'vhhvhvhhvhhvhvh','2China','9Guangdong','d41d8cd98f00b204e9800998ecf8427e','Male',0),
(2147483647,'bbbbbbbbbb','Brazil','Sao Paulo','d41d8cd98f00b204e9800998ecf8427e','Female',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
