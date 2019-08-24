/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.1.26-MariaDB : Database - countrycityarea
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`countrycityarea` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `countrycityarea`;

/*Table structure for table `area` */

DROP TABLE IF EXISTS `area`;

CREATE TABLE `area` (
  `area_id` int(10) NOT NULL AUTO_INCREMENT,
  `city_id` int(20) NOT NULL,
  `area_name` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL,
  PRIMARY KEY (`area_id`),
  KEY `city_id` (`city_id`),
  CONSTRAINT `fK_CITY` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `area` */

insert  into `area`(`area_id`,`city_id`,`area_name`,`comment`) values 
(1,2,'Nadda',''),
(2,1,'Borobari',''),
(3,2,'Mirpur','This is comments'),
(4,4,'Kalihati','I dont know');

/*Table structure for table `city` */

DROP TABLE IF EXISTS `city`;

CREATE TABLE `city` (
  `city_id` int(20) NOT NULL AUTO_INCREMENT,
  `country_id` int(20) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  PRIMARY KEY (`city_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `city` */

insert  into `city`(`city_id`,`country_id`,`city_name`) values 
(1,1,'Gazipur'),
(2,1,'Dhaka'),
(3,2,'Kalkata'),
(4,3,'Karachi'),
(5,5,'WWW');

/*Table structure for table `country` */

DROP TABLE IF EXISTS `country`;

CREATE TABLE `country` (
  `country_id` int(20) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(50) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `country` */

insert  into `country`(`country_id`,`country_name`) values 
(1,'Bangladesh'),
(2,'India'),
(3,'Pakistan'),
(5,'CONGO'),
(6,'Nepal');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
