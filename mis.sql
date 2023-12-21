/*
SQLyog Enterprise v10.42 
MySQL - 5.5.25a-log : Database - mis
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mis` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `mis`;

/*Table structure for table `cctv` */

DROP TABLE IF EXISTS `cctv`;

CREATE TABLE `cctv` (
  `name` varchar(100) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `port` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `cctv_log` */

DROP TABLE IF EXISTS `cctv_log`;

CREATE TABLE `cctv_log` (
  `name` varchar(20) NOT NULL,
  `waktu` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image` blob NOT NULL,
  PRIMARY KEY (`name`,`waktu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `cctv_vloss` */

DROP TABLE IF EXISTS `cctv_vloss`;

CREATE TABLE `cctv_vloss` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `image` blob NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Table structure for table `network` */

DROP TABLE IF EXISTS `network`;

CREATE TABLE `network` (
  `name` varchar(500) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `response` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `network_detail` */

DROP TABLE IF EXISTS `network_detail`;

CREATE TABLE `network_detail` (
  `name` varchar(500) NOT NULL,
  `bulan` date NOT NULL,
  `success` bigint(20) NOT NULL,
  `fail` bigint(20) NOT NULL,
  `lastfail` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `network_detail_temp` */

DROP TABLE IF EXISTS `network_detail_temp`;

CREATE TABLE `network_detail_temp` (
  `name` varchar(500) NOT NULL,
  `bulan` date NOT NULL,
  `success` bigint(20) NOT NULL,
  `fail` bigint(20) NOT NULL,
  `lastfail` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `network_exception` */

DROP TABLE IF EXISTS `network_exception`;

CREATE TABLE `network_exception` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(100) NOT NULL,
  `name` varchar(500) NOT NULL,
  `total` int(11) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

/*Table structure for table `network_log` */

DROP TABLE IF EXISTS `network_log`;

CREATE TABLE `network_log` (
  `name` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `time` datetime NOT NULL,
  `totaldown` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `network_log_temp` */

DROP TABLE IF EXISTS `network_log_temp`;

CREATE TABLE `network_log_temp` (
  `name` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `time` datetime NOT NULL,
  `totaldown` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `network_temp` */

DROP TABLE IF EXISTS `network_temp`;

CREATE TABLE `network_temp` (
  `name` varchar(500) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `response` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `routers` */

DROP TABLE IF EXISTS `routers`;

CREATE TABLE `routers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `port` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/* Function  structure for function  `sym_transaction_id_pre_5_7_6` */

/*!50003 DROP FUNCTION IF EXISTS `sym_transaction_id_pre_5_7_6` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `sym_transaction_id_pre_5_7_6`() RETURNS varchar(50) CHARSET latin1
    READS SQL DATA
begin                                                                                                                          
    declare comm_value varchar(50);                                                                                             
    declare comm_cur cursor for select VARIABLE_VALUE from INFORMATION_SCHEMA.SESSION_STATUS where VARIABLE_NAME='COM_COMMIT';  
    open comm_cur;                                                                                                              
    fetch comm_cur into comm_value;                                                                                             
    close comm_cur;                                                                                                             
    return concat(concat(connection_id(), '.'), comm_value);                                                                    
 end */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
