/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.4.11-MariaDB : Database - sic
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sic` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

/*Table structure for table `clientes` */

CREATE TABLE `clientes` (
  `cod_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(147) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cod_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `clientes` */

insert  into `clientes`(`cod_cliente`,`nome`,`cpf`,`email`,`telefone`) values (1,'Rodrigo Cardoso da Luz','088.066.049-02','diazrma@gmail.com','(47) 99159-6863');

/*Table structure for table `logs` */

CREATE TABLE `logs` (
  `cod_log` int(11) NOT NULL AUTO_INCREMENT,
  `acao` varchar(50) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`cod_log`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `logs` */

insert  into `logs`(`cod_log`,`acao`,`data`,`time`) values (1,'Cadastrou Cliente: Rodrigo Cardoso da Luz','2020-05-15','16:37:10');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
