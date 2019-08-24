/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.1.26-MariaDB : Database - email-to-user-register
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`email-to-user-register` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `email-to-user-register`;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userid` int(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(55) NOT NULL,
  `last_name` varchar(55) NOT NULL,
  `city_name` varchar(55) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`userid`,`first_name`,`last_name`,`city_name`,`email`) values 
(24,'Tipu','Sultan','Dhaka','tstipu69@gmail.com'),
(25,'Tipu','Sultan','Dhaka','tstipu69@gmail.com'),
(26,'Tipu','Sultan','Dhaka','tstipu69@gmail.com'),
(27,'Tipu','Sultan','Dhaka','tstipu69@gmail.com'),
(28,'Abdul Barik','Tipu','Naogaon','14310026@uits.edu.bd'),
(29,'Tipu','Sultan','Dhaka','tstipu69@gmail.com'),
(30,'Tipu','Sultan','Dhaka','tstipu69@gmail.com'),
(31,'','','',''),
(32,'Tipu','Sultan','czxc','tstipu69@gmail.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
