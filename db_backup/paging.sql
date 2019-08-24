/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.1.26-MariaDB : Database - paging
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`paging` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `paging`;

/*Table structure for table `table1` */

DROP TABLE IF EXISTS `table1`;

CREATE TABLE `table1` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `table1` */

insert  into `table1`(`id`,`name`) values 
(1,'A'),
(2,'B'),
(3,'C'),
(4,'D'),
(5,'G'),
(6,'H'),
(7,'I'),
(8,'J'),
(9,'K'),
(10,'L'),
(11,'M'),
(12,'N'),
(13,'O'),
(14,'P'),
(15,'Q'),
(16,'R'),
(17,'S'),
(18,'T'),
(19,'U'),
(20,'V'),
(21,'W'),
(22,'X'),
(23,'Y'),
(24,'Z'),
(25,'E'),
(26,'F'),
(27,'a'),
(28,'b'),
(29,'c'),
(30,'d'),
(31,'e'),
(32,'f'),
(33,'g'),
(34,'h'),
(35,'i'),
(36,'j');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
