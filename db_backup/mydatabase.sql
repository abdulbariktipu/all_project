/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.1.26-MariaDB : Database - mydatabase
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mydatabase` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `mydatabase`;

/*Table structure for table `active` */

DROP TABLE IF EXISTS `active`;

CREATE TABLE `active` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `active` */

insert  into `active`(`id`,`status`) values 
(2,'Inactive'),
(7,'Active'),
(9,'Active'),
(10,'Active'),
(11,'Active'),
(12,'Active'),
(13,'Active'),
(14,'Active'),
(15,'Inactive'),
(16,'Active'),
(17,'Inactive'),
(18,'Inactive'),
(19,'Inactive');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
