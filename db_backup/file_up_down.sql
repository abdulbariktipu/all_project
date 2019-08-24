/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.1.26-MariaDB : Database - file_up_down
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`file_up_down` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `file_up_down`;

/*Table structure for table `upload_table` */

DROP TABLE IF EXISTS `upload_table`;

CREATE TABLE `upload_table` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `file` varchar(200) NOT NULL,
  `caption` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `upload_table` */

insert  into `upload_table`(`id`,`file`,`caption`) values 
(3,'FAQ_PDF.pdf',''),
(7,'computergraphics-130724040124-phpapp02.pdf',''),
(9,'Check_Uncheck (Select_Deselect) All Checkboxes Using jQuery - YouTube.MP4',''),
(10,'Check All Checkboxes by select single check box in java script - YouTube.MP4',''),
(13,'IMG_20171017_195431.jpg','caption'),
(14,'IMG20171019150758.jpg','TEST');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
