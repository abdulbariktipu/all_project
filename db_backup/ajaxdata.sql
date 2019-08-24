/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.1.26-MariaDB : Database - ajaxdata
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ajaxdata` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ajaxdata`;

/*Table structure for table `ajax_example` */

DROP TABLE IF EXISTS `ajax_example`;

CREATE TABLE `ajax_example` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `wpm` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ajax_example` */

insert  into `ajax_example`(`id`,`name`,`age`,`sex`,`wpm`) values 
(1,'Frank',45,'m',87),
(2,'Jerry',120,'m',20),
(3,'Jill',22,'f',72),
(4,'Julie',35,'f',90),
(5,'Regis',75,'m',44),
(6,'Sunltan',33,'m',40),
(7,'Tania',21,'m',30),
(8,'Tipu',33,'m',44),
(9,'Tipu',31,'f',445),
(10,'Regis',33,'f',4);

/*Table structure for table `autorefresh` */

DROP TABLE IF EXISTS `autorefresh`;

CREATE TABLE `autorefresh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `message` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `autorefresh` */

insert  into `autorefresh`(`id`,`user`,`message`) values 
(1,'','zsfasdf'),
(2,'','asfasfasf'),
(3,'','age'),
(4,'','tipu'),
(5,'','tania'),
(6,'sdfs','sdfsfd'),
(7,'Tipu','This is test message'),
(8,'TA','DFDF'),
(9,'Sultan','Messa'),
(10,'javaScript','auto refresh for javaScript');

/*Table structure for table `lib_supplier` */

DROP TABLE IF EXISTS `lib_supplier`;

CREATE TABLE `lib_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `lib_supplier` */

insert  into `lib_supplier`(`id`,`supplier_name`,`type`) values 
(1,'Apex','1,32,23'),
(2,'Batta',' 2 ,3'),
(3,'Asus','2'),
(4,'Samsung','5,28'),
(5,'Microsoft','1,3,4,2,6,7'),
(6,'Apple','5,7,8');

/*Table structure for table `statuses` */

DROP TABLE IF EXISTS `statuses`;

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(1000) NOT NULL,
  `deleted` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `statuses` */

insert  into `statuses`(`id`,`status`,`deleted`) values 
(1,'TEST','0'),
(33,'AFAFA','0'),
(34,'SFSF','0'),
(35,'','0'),
(36,'DFSF','0'),
(37,'DFSFSS','0'),
(38,'DFSFSSDGD','0'),
(39,'R','0'),
(40,'df','0'),
(41,'dff','0'),
(42,'dffe','0'),
(43,'sdfs','0'),
(44,'ttt','0'),
(45,'tttd','0'),
(46,'tttds','0'),
(47,'sd','0'),
(48,'sdasa','0'),
(49,'Tipu','0');

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `students` */

insert  into `students`(`id`,`name`,`email`,`contact`) values 
(1,'T','S','D'),
(2,'tipu','',''),
(3,'tipu','',''),
(4,'tipu','',''),
(5,'tipu','tstipu69@gmail.com','sd'),
(6,'tipu','tstipu69@gmail.coms','sd'),
(7,'tipu','tstipu69@gmail.comss','sd'),
(8,'tipu','01624259161','ds'),
(9,'tipu','01624259161s','ds'),
(10,'tani','tstipu69@gmai','asd'),
(11,'tani','ad','asd'),
(12,'tani','adl','asd');

/*Table structure for table `tabledata` */

DROP TABLE IF EXISTS `tabledata`;

CREATE TABLE `tabledata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `tabledata` */

insert  into `tabledata`(`id`,`name`,`tgl`) values 
(2,'Code Tube','2016-12-28'),
(3,'Murad','2016-12-30'),
(4,'Ahmad','2016-12-09'),
(5,'Irjen','2017-01-28'),
(6,'Rundisa','2016-12-13'),
(7,'Milekai','2016-12-11'),
(8,'Franko','2016-12-25'),
(9,'Urang','2016-12-11'),
(10,'Kameraik','2016-12-18'),
(11,'Inisul','2016-12-07'),
(12,'Sulaiman','2016-12-18'),
(13,'Mioekan','2016-12-04'),
(14,'Titto','2016-12-28'),
(15,'Budi','2017-01-14'),
(16,'Beta','2016-12-19'),
(17,'Salman','2016-12-11'),
(18,'Ali','2016-12-16'),
(19,'Fatima','2016-12-13'),
(20,'Annisa','2016-12-28'),
(21,'Aisha','2016-12-13'),
(22,'Lisa','2016-12-11'),
(23,'Abdullah','2016-12-05'),
(24,'Teuku Reka','2016-12-27');

/*Table structure for table `test` */

DROP TABLE IF EXISTS `test`;

CREATE TABLE `test` (
  `id` int(11) DEFAULT NULL,
  `name` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `test` */

/*Table structure for table `ttt` */

DROP TABLE IF EXISTS `ttt`;

CREATE TABLE `ttt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(50) NOT NULL,
  `email` int(50) NOT NULL,
  `gender` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ttt` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`email`) values 
(1,'admin','admin','tstipu69@gmail.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
