/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.1.26-MariaDB : Database - dependent-dropdown-options
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dependent-dropdown-options` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dependent-dropdown-options`;

/*Table structure for table `country` */

DROP TABLE IF EXISTS `country`;

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `country` */

insert  into `country`(`id`,`country_name`) values 
(1,'Brazil'),
(2,'China'),
(3,'France'),
(4,'India'),
(5,'USA');

/*Table structure for table `states` */

DROP TABLE IF EXISTS `states`;

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `countryID` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `states` */

insert  into `states`(`id`,`name`,`countryID`) values 
(1,'Sao Paulo','Brazil'),
(2,'Rio de Janeiro','Brazil'),
(3,'Ceara','Brazil'),
(4,'Santa Catarina','Brazil'),
(5,'Espirito Santo','Brazil'),
(6,'Beijing','China'),
(7,'Hebei','China'),
(8,'Jiangsu','2'),
(9,'Guangdong','2'),
(10,'Guangdong','2'),
(11,'Ile-de-France','France'),
(12,'Midi-Pyrenees','France'),
(13,'Picardie','3'),
(14,'Franche-Comte','3'),
(15,'Alsace','3'),
(16,'Haryana','India'),
(17,'Andhra Pradesh','India'),
(18,'Delhi','4'),
(19,'Tamil Nadu','4'),
(20,'Uttar Pradesh','4'),
(21,'California','USA\n'),
(22,'Iowa','USA\n'),
(23,'New York4','USA\n'),
(24,'New Jersey','5'),
(25,'Massachusetts','5');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
