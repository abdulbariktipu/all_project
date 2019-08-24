/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.1.26-MariaDB : Database - a_database
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`a_database` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `a_database`;

/*Table structure for table `food` */

DROP TABLE IF EXISTS `food`;

CREATE TABLE `food` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(50) NOT NULL,
  `calories` int(50) NOT NULL,
  `healthy_unhealthy` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `food` */

insert  into `food`(`id`,`food_name`,`calories`,`healthy_unhealthy`) values 
(1,'Pizza',1000,'u'),
(2,'Salad',200,'h'),
(3,'Pasta',600,'h'),
(4,'Ice Cream',700,'u');

/*Table structure for table `hits_count` */

DROP TABLE IF EXISTS `hits_count`;

CREATE TABLE `hits_count` (
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hits_count` */

insert  into `hits_count`(`count`) values 
(2);

/*Table structure for table `hits_count_with_ip` */

DROP TABLE IF EXISTS `hits_count_with_ip`;

CREATE TABLE `hits_count_with_ip` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `ip` text,
  `views` int(22) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hits_count_with_ip` */

/*Table structure for table `hits_ip` */

DROP TABLE IF EXISTS `hits_ip`;

CREATE TABLE `hits_ip` (
  `ip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hits_ip` */

insert  into `hits_ip`(`ip`) values 
('127.0.0.1'),
('::1');

/*Table structure for table `people` */

DROP TABLE IF EXISTS `people`;

CREATE TABLE `people` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `people` */

insert  into `people`(`id`,`name`) values 
(1,'Tipu Sultan'),
(2,'Barik'),
(3,'Badhan'),
(4,'Rana'),
(5,'Abdul Barik Tipu');

/*Table structure for table `pets` */

DROP TABLE IF EXISTS `pets`;

CREATE TABLE `pets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `people_id` int(11) NOT NULL,
  `pet` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `pets` */

insert  into `pets`(`id`,`people_id`,`pet`) values 
(1,1,'Cat'),
(2,3,'Fish'),
(3,2,'Dog'),
(4,4,''),
(5,3,'Bard');

/*Table structure for table `unique_visitors` */

DROP TABLE IF EXISTS `unique_visitors`;

CREATE TABLE `unique_visitors` (
  `date` date NOT NULL,
  `ip` text,
  `views` int(11) DEFAULT '1',
  PRIMARY KEY (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `unique_visitors` */

insert  into `unique_visitors`(`date`,`ip`,`views`) values 
('2018-08-29','127.0.0.1 ::1',2),
('2018-08-30','::1 127.0.0.1',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
