/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.22-MariaDB : Database - crud_pdo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`crud_pdo` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `crud_pdo`;

/*Table structure for table `data_saya` */

DROP TABLE IF EXISTS `data_saya`;

CREATE TABLE `data_saya` (
  `id` double(10,0) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `panggilan` varchar(10) NOT NULL,
  `sex` char(1) NOT NULL,
  `email` text NOT NULL,
  `gol_darah` char(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `data_saya` */

insert  into `data_saya`(`id`,`nama`,`panggilan`,`sex`,`email`,`gol_darah`) values (1,'James Victorio Admiralis','James','M','jamesvictorio50@gmail.com','AB'),(2,'Chris Hemsworth','Chris','M','totallyrealchris@gmail.com','O');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
