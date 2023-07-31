/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - bdbh
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bdbh` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `bdbh`;

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id_Clientes` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  `APaterno` varchar(100) DEFAULT NULL,
  `AMaterno` varchar(100) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Clientes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `clientes` */

/*Table structure for table `direccion` */

DROP TABLE IF EXISTS `direccion`;

CREATE TABLE `direccion` (
  `id_Dir` int(11) NOT NULL AUTO_INCREMENT,
  `Calle` varchar(200) DEFAULT NULL,
  `Colonia` varchar(200) DEFAULT NULL,
  `Municipio` varchar(200) DEFAULT NULL,
  `Estado` varchar(200) DEFAULT NULL,
  `id_Clientes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Dir`),
  KEY `id_Clientes` (`id_Clientes`),
  CONSTRAINT `id_Clientes` FOREIGN KEY (`id_Clientes`) REFERENCES `clientes` (`id_Clientes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `direccion` */

/*Table structure for table `empleados` */

DROP TABLE IF EXISTS `empleados`;

CREATE TABLE `empleados` (
  `id_Emp` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `APaterno` varchar(50) DEFAULT NULL,
  `AMaterno` varchar(50) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Emp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `empleados` */

/*Table structure for table `entregas` */

DROP TABLE IF EXISTS `entregas`;

CREATE TABLE `entregas` (
  `id_Entregas` int(11) NOT NULL AUTO_INCREMENT,
  `id_Ped` int(11) DEFAULT NULL,
  `id_Dir` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `id_Emp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Entregas`),
  KEY `id_Ped` (`id_Ped`),
  KEY `id_Dir` (`id_Dir`),
  KEY `id_Emp` (`id_Emp`),
  CONSTRAINT `id_Dir` FOREIGN KEY (`id_Dir`) REFERENCES `direccion` (`id_Dir`),
  CONSTRAINT `id_Emp` FOREIGN KEY (`id_Emp`) REFERENCES `empleados` (`id_Emp`),
  CONSTRAINT `id_Ped` FOREIGN KEY (`id_Ped`) REFERENCES `pedido` (`id_Pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `entregas` */

/*Table structure for table `pedido` */

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE `pedido` (
  `id_Pedido` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `FEntrega` varchar(100) NOT NULL,
  `Total` double NOT NULL,
  `id_Entregas` int(11) NOT NULL,
  `id_Clientes` int(11) NOT NULL,
  `Costo_Envio` double NOT NULL,
  PRIMARY KEY (`id_Pedido`),
  KEY `id_Entr` (`id_Entregas`),
  KEY `id_Cl` (`id_Clientes`),
  CONSTRAINT `id_Cl` FOREIGN KEY (`id_Clientes`) REFERENCES `clientes` (`id_Clientes`),
  CONSTRAINT `id_Entr` FOREIGN KEY (`id_Entregas`) REFERENCES `entregas` (`id_Entregas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pedido` */

/*Table structure for table `pedido_detalle` */

DROP TABLE IF EXISTS `pedido_detalle`;

CREATE TABLE `pedido_detalle` (
  `id_PD` int(11) NOT NULL AUTO_INCREMENT,
  `id_PF` int(11) NOT NULL,
  `Precio` double DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Subtotal` double DEFAULT NULL,
  `id_Pedido` int(11) NOT NULL,
  PRIMARY KEY (`id_PD`),
  KEY `id_PF` (`id_PF`),
  KEY `id_Pedido` (`id_Pedido`),
  CONSTRAINT `id_PF` FOREIGN KEY (`id_PF`) REFERENCES `productofabricado` (`id_PF`),
  CONSTRAINT `id_Pedido` FOREIGN KEY (`id_Pedido`) REFERENCES `pedido` (`id_Pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pedido_detalle` */

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `id_produc` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(300) NOT NULL,
  PRIMARY KEY (`id_produc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `producto` */

/*Table structure for table `productofabricado` */

DROP TABLE IF EXISTS `productofabricado`;

CREATE TABLE `productofabricado` (
  `id_PF` int(11) NOT NULL AUTO_INCREMENT,
  `id_produc` int(11) NOT NULL,
  `id_sabor` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` double DEFAULT NULL,
  PRIMARY KEY (`id_PF`),
  KEY `id_produc` (`id_produc`),
  KEY `id_sabor` (`id_sabor`),
  CONSTRAINT `id_produc` FOREIGN KEY (`id_produc`) REFERENCES `producto` (`id_produc`),
  CONSTRAINT `id_sabor` FOREIGN KEY (`id_sabor`) REFERENCES `sabores` (`id_sabor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `productofabricado` */

/*Table structure for table `sabores` */

DROP TABLE IF EXISTS `sabores`;

CREATE TABLE `sabores` (
  `id_sabor` int(11) NOT NULL AUTO_INCREMENT,
  `Sabor` varchar(150) NOT NULL,
  PRIMARY KEY (`id_sabor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `sabores` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_us` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(150) DEFAULT NULL,
  `Passwrd` varchar(150) DEFAULT NULL,
  `Tipo_usuario` enum('Administrados','Normal') DEFAULT NULL,
  `id_Dir` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_us`),
  KEY `id_d` (`id_Dir`),
  CONSTRAINT `id_d` FOREIGN KEY (`id_Dir`) REFERENCES `direccion` (`id_Dir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `usuarios` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
