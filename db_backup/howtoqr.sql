/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.1.26-MariaDB : Database - howtoqr
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`howtoqr` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `howtoqr`;

/*Table structure for table `qrcodes` */

DROP TABLE IF EXISTS `qrcodes`;

CREATE TABLE `qrcodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qrUsername` varchar(250) NOT NULL,
  `qrContent` varchar(250) NOT NULL,
  `qrImg` varchar(250) NOT NULL,
  `qrlink` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

/*Data for the table `qrcodes` */

insert  into `qrcodes`(`id`,`qrUsername`,`qrContent`,`qrImg`,`qrlink`) values 
(42,'tipu','www.test.com ...Develop By Ravi Khadka','meravi19312.png','localhost/qrcodemeravi19312.png'),
(43,'Abdul Barik Tipu','www.xvide.com ...Develop By Tipu','meravi28393.png','localhost/qrcodemeravi28393.png'),
(44,'tipu','www.xvide.com','meravi26478.png','localhost/qrcodemeravi26478.png'),
(45,'tipu','xvideo','meravi27995.png','localhost/qrcodemeravi27995.png');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
