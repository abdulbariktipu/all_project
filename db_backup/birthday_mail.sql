/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.1.26-MariaDB : Database - birthday_mail
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`birthday_mail` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `birthday_mail`;

/*Table structure for table `birth_day` */

DROP TABLE IF EXISTS `birth_day`;

CREATE TABLE `birth_day` (
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `birth_day` varchar(20) NOT NULL,
  `birth_day_a` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `birth_day` */

insert  into `birth_day`(`user_id`,`name`,`birth_day`,`birth_day_a`) values 
(1,'Tipu','04/03/2018','04/03/2018');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
