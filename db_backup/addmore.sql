/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.1.26-MariaDB : Database - addmore
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`addmore` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `addmore`;

/*Table structure for table `inventory` */

DROP TABLE IF EXISTS `inventory`;

CREATE TABLE `inventory` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `make` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `serial` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

/*Data for the table `inventory` */

insert  into `inventory`(`id`,`make`,`model`,`serial`) values 
(1,'test 1','test 2','1234'),
(5,'Make 1','Model 1','Serial 1'),
(6,'Make 2','Model 2','Serial 2'),
(7,'Make 3','Model  3','Serial 3'),
(9,'','',''),
(10,'xcvb','dsdfg','2222'),
(11,'asa','as','dss'),
(12,'dafs','zxcv','352'),
(13,'test','','safsdf'),
(14,'Tipu','33','11'),
(15,'22','33','444'),
(16,'A','23','231'),
(17,'C','BBw','987'),
(18,'D','BMW','543'),
(19,'qwe','bfv','165'),
(20,'sd','32','3322'),
(21,'as','fs','54554'),
(22,'as','',''),
(23,'ast','',''),
(24,'sdsd','',''),
(25,'sdsd','',''),
(26,'asas','',''),
(27,'dsdsd','',''),
(28,'dsdsd','',''),
(29,'asasd','',''),
(30,'dsdsd','',''),
(32,'sds','',''),
(33,'dsdsd','',''),
(35,'sds3','',''),
(36,'QW','ER',''),
(38,'hu','lk',''),
(39,'rt','jh',''),
(41,'uy','kj',''),
(42,'asasasa','sasasas',''),
(43,'asasasa2','sasasasww','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
