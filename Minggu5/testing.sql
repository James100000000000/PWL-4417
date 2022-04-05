/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.22-MariaDB : Database - test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`test` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `test`;

/*Table structure for table `kendaraan` */

DROP TABLE IF EXISTS `kendaraan`;

CREATE TABLE `kendaraan` (
  `no plat` int(15) NOT NULL,
  `tahun` year(4) NOT NULL,
  `tarif` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`no plat`),
  CONSTRAINT `kendaraan_ibfk_1` FOREIGN KEY (`no plat`) REFERENCES `transaksi` (`no transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kendaraan` */

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `no ktp` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telepon` int(15) NOT NULL,
  KEY `no ktp` (`no ktp`),
  CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`no ktp`) REFERENCES `transaksi` (`no transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pelanggan` */

/*Table structure for table `sopir` */

DROP TABLE IF EXISTS `sopir`;

CREATE TABLE `sopir` (
  `id sopir` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` int(20) NOT NULL,
  `sim` varchar(15) NOT NULL,
  `tarif` int(50) NOT NULL,
  PRIMARY KEY (`id sopir`),
  CONSTRAINT `sopir_ibfk_1` FOREIGN KEY (`id sopir`) REFERENCES `transaksi` (`no transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sopir` */

/*Table structure for table `tipe kendaraan` */

DROP TABLE IF EXISTS `tipe kendaraan`;

CREATE TABLE `tipe kendaraan` (
  `ide type` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`ide type`),
  CONSTRAINT `tipe kendaraan_ibfk_1` FOREIGN KEY (`ide type`) REFERENCES `kendaraan` (`no plat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tipe kendaraan` */

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `no transaksi` int(11) NOT NULL,
  `tanggal pesan` int(11) NOT NULL,
  `tanggal pinjam` int(11) NOT NULL,
  `tangggal kembali rencana` int(11) NOT NULL,
  `jam kembali rencana` int(11) NOT NULL,
  `tanggal kembali realisasi` int(11) NOT NULL,
  `jam kembali realisasi` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `kilometer pinjam` int(11) NOT NULL,
  `kilometer kembali` int(11) NOT NULL,
  `bbm pinjam` int(11) NOT NULL,
  `bbm kembali` int(11) NOT NULL,
  `kondisi mobil pinjam` int(11) NOT NULL,
  `kondisi mobil kembali` int(11) NOT NULL,
  `kerusakan` int(11) NOT NULL,
  `biaya kerusakan` int(11) NOT NULL,
  `biaya bbm` int(11) NOT NULL,
  PRIMARY KEY (`no transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
