/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - db_restoran
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_restoran` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_restoran`;

/*Table structure for table `tb_level` */

DROP TABLE IF EXISTS `tb_level`;

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(150) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tb_level` */

insert  into `tb_level`(`id_level`,`nama_level`) values 
(1,'Administrator'),
(2,'Pelayan'),
(3,'Kasir'),
(4,'Owner'),
(5,'Pelanggan'),
(6,'Koki');

/*Table structure for table `tb_masakan` */

DROP TABLE IF EXISTS `tb_masakan`;

CREATE TABLE `tb_masakan` (
  `id_masakan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_masakan` varchar(150) NOT NULL,
  `harga` varchar(150) NOT NULL,
  `stok` int(11) NOT NULL,
  `status_masakan` varchar(150) NOT NULL,
  `gambar_masakan` varchar(150) NOT NULL,
  PRIMARY KEY (`id_masakan`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `tb_masakan` */

insert  into `tb_masakan`(`id_masakan`,`nama_masakan`,`harga`,`stok`,`status_masakan`,`gambar_masakan`) values 
(8,'Sate Ayam','11000',11,'tersedia','Sate Ayam.jpeg'),
(14,'Sayur Asem','7500',67,'tersedia','Sayur Asem.jpeg'),
(18,'Ayam Geprek','11000',15,'tersedia','Ayam Geprek.jpeg'),
(19,'Nasi Pecel','7000',4,'tersedia','Nasi Pecel.jpg'),
(20,'Cincau','5000',94,'tersedia','Cincau.jpg');

/*Table structure for table `tb_order` */

DROP TABLE IF EXISTS `tb_order`;

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) DEFAULT NULL,
  `id_pengunjung` int(11) NOT NULL,
  `waktu_pesan` datetime NOT NULL,
  `no_meja` int(11) NOT NULL,
  `total_harga` varchar(150) NOT NULL,
  `uang_bayar` varchar(150) DEFAULT NULL,
  `uang_kembali` varchar(150) DEFAULT NULL,
  `status_order` varchar(150) NOT NULL,
  PRIMARY KEY (`id_order`),
  KEY `id_admin` (`id_admin`),
  KEY `id_pengunjung` (`id_pengunjung`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

/*Data for the table `tb_order` */

insert  into `tb_order`(`id_order`,`id_admin`,`id_pengunjung`,`waktu_pesan`,`no_meja`,`total_harga`,`uang_bayar`,`uang_kembali`,`status_order`) values 
(24,1,15,'2020-06-03 21:22:56',2,'13500','15000','1500','sudah bayar'),
(25,1,1,'2023-08-05 11:35:09',0,'21000','42000','21000','sudah bayar'),
(26,1,1,'2023-08-05 13:19:15',5,'30000','50000','20000','sudah bayar'),
(30,7,15,'2023-08-05 14:05:13',5,'45500','50000','4500','sudah bayar'),
(31,7,1,'2023-08-05 15:00:55',1,'19500','19500','0','sudah bayar'),
(32,7,6,'2023-08-05 15:03:27',1,'19500','20000','500','sudah bayar'),
(33,7,6,'2023-08-05 15:11:44',1,'23000','25000','2000','sudah bayar'),
(34,7,6,'2023-08-05 15:35:09',2,'5000','10000','5000','sudah bayar'),
(39,7,15,'2023-08-07 22:24:42',6,'12000','15000','3000','sudah bayar'),
(40,7,17,'2023-08-08 00:12:48',2,'23500','24000','500','sudah bayar'),
(41,7,17,'2023-08-08 02:17:03',1,'24000','25000','1000','sudah bayar'),
(42,7,15,'2023-08-11 22:07:50',5,'23500','25000','1500','sudah bayar'),
(43,7,15,'2023-08-11 22:26:15',2,'16000','20000','4000','sudah bayar');

/*Table structure for table `tb_pesan` */

DROP TABLE IF EXISTS `tb_pesan`;

CREATE TABLE `tb_pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `id_masakan` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status_pesan` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pesan` */

insert  into `tb_pesan`(`id_pesan`,`id_user`,`id_order`,`id_masakan`,`jumlah`,`status_pesan`) values 
(59,15,24,20,1,'sudah'),
(60,15,24,18,1,'sudah'),
(62,1,25,19,3,'sudah'),
(63,1,26,20,3,'sudah'),
(64,1,26,14,3,'sudah'),
(74,15,30,20,5,'sudah'),
(75,15,30,8,3,'sudah'),
(76,1,31,20,1,'sudah'),
(77,1,31,19,1,'sudah'),
(78,1,31,14,1,'sudah'),
(79,6,32,20,1,'sudah'),
(81,6,32,14,1,'sudah'),
(83,6,33,20,1,'sudah'),
(86,6,34,20,1,'sudah'),
(89,15,39,20,1,'sudah'),
(90,15,39,19,1,'sudah'),
(91,17,40,20,1,'sudah'),
(92,17,40,18,1,'sudah'),
(93,17,40,14,1,'sudah'),
(94,17,41,20,2,'sudah'),
(95,17,41,19,2,'sudah'),
(96,15,42,20,1,'sudah'),
(97,15,42,18,1,'sudah'),
(98,15,42,14,1,'sudah'),
(99,15,43,20,1,'sudah'),
(100,15,43,18,1,'sudah');

/*Table structure for table `tb_pesanan` */

DROP TABLE IF EXISTS `tb_pesanan`;

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(3) NOT NULL AUTO_INCREMENT,
  `id_order` int(3) NOT NULL,
  `no_meja` int(3) NOT NULL,
  `status_order` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pesanan` */

/*Table structure for table `tb_stok` */

DROP TABLE IF EXISTS `tb_stok`;

CREATE TABLE `tb_stok` (
  `id_stok` int(11) NOT NULL AUTO_INCREMENT,
  `id_pesan` int(11) NOT NULL,
  `jumlah_terjual` int(11) DEFAULT NULL,
  `status_cetak` varchar(150) NOT NULL,
  PRIMARY KEY (`id_stok`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

/*Data for the table `tb_stok` */

insert  into `tb_stok`(`id_stok`,`id_pesan`,`jumlah_terjual`,`status_cetak`) values 
(1,46,1,'belum cetak'),
(2,47,2,'belum cetak'),
(3,48,2,'belum cetak'),
(4,49,1,'belum cetak'),
(5,50,2,'belum cetak'),
(6,51,0,'belum cetak'),
(7,52,0,'belum cetak'),
(8,53,0,'belum cetak'),
(9,54,0,'belum cetak'),
(10,55,0,'belum cetak'),
(11,56,2,'belum cetak'),
(12,57,1,'belum cetak'),
(13,58,6,'belum cetak'),
(14,59,1,'belum cetak'),
(15,60,1,'belum cetak'),
(16,61,0,'belum cetak'),
(17,62,3,'belum cetak'),
(18,63,3,'belum cetak'),
(19,64,3,'belum cetak'),
(20,65,2,'belum cetak'),
(21,66,2,'belum cetak'),
(22,67,3,'belum cetak'),
(23,68,3,'belum cetak'),
(24,69,1,'belum cetak'),
(25,70,0,'belum cetak'),
(26,71,1,'belum cetak'),
(27,72,1,'belum cetak'),
(28,73,1,'belum cetak'),
(29,74,5,'belum cetak'),
(30,75,3,'belum cetak'),
(31,76,1,'belum cetak'),
(32,77,1,'belum cetak'),
(33,78,1,'belum cetak'),
(34,79,1,'belum cetak'),
(35,80,1,'belum cetak'),
(36,81,1,'belum cetak'),
(37,82,0,'belum cetak'),
(38,83,1,'belum cetak'),
(39,84,1,'belum cetak'),
(40,85,1,'belum cetak'),
(41,86,1,'belum cetak'),
(42,87,1,'belum cetak'),
(43,88,1,'belum cetak'),
(44,89,1,'belum cetak'),
(45,90,1,'belum cetak'),
(46,91,1,'belum cetak'),
(47,92,1,'belum cetak'),
(48,93,1,'belum cetak'),
(49,94,2,'belum cetak'),
(50,95,2,'belum cetak'),
(51,96,1,'belum cetak'),
(52,97,1,'belum cetak'),
(53,98,1,'belum cetak'),
(54,99,1,'belum cetak'),
(55,100,1,'belum cetak');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  `id_level` int(11) NOT NULL,
  `status` varchar(150) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  KEY `id_level` (`id_level`),
  CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`username`,`password`,`nama_user`,`id_level`,`status`) values 
(1,'Admin','123','Gilang',1,'aktif'),
(6,'Pelayan','123','Berlian',2,'aktif'),
(7,'Kasir','123','Fitri',3,'aktif'),
(8,'Owner','123','Bambang',4,'aktif'),
(15,'Pelanggan','123','Rafli',5,'aktif'),
(16,'Koki','123','Pahmi',6,'aktif'),
(17,'Pelanggan2','123','Ujang',5,'aktif');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
