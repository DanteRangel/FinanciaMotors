-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: FinanciaMotors
-- ------------------------------------------------------
-- Server version	5.7.13-0ubuntu0.16.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Cliente`
--

DROP TABLE IF EXISTS `Cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clave_cliente` varchar(45) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Cliente_persona1_idx` (`id_persona`),
  KEY `fk_Cliente_Empresa1_idx` (`id_empresa`),
  CONSTRAINT `fk_Cliente_Empresa1` FOREIGN KEY (`id_empresa`) REFERENCES `Empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cliente_persona1` FOREIGN KEY (`id_persona`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cliente`
--

LOCK TABLES `Cliente` WRITE;
/*!40000 ALTER TABLE `Cliente` DISABLE KEYS */;
INSERT INTO `Cliente` VALUES (2,'CFM-2',38,4),(3,'CFM-3',39,NULL),(4,'CFM-4',40,5);
/*!40000 ALTER TABLE `Cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Empresa`
--

DROP TABLE IF EXISTS `Empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `rfc` varchar(45) NOT NULL,
  `razon_social` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Empresa`
--

LOCK TABLES `Empresa` WRITE;
/*!40000 ALTER TABLE `Empresa` DISABLE KEYS */;
INSERT INTO `Empresa` VALUES (3,'dsad','asd','aasd'),(4,'mejikanito','asdad','mejikanito cs de cv'),(5,'Fantacias Miguel','1231addasd12','ALPURA');
/*!40000 ALTER TABLE `Empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Marca`
--

DROP TABLE IF EXISTS `Marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Marca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Marca`
--

LOCK TABLES `Marca` WRITE;
/*!40000 ALTER TABLE `Marca` DISABLE KEYS */;
INSERT INTO `Marca` VALUES (4,'Ford'),(5,'nissan'),(6,'DODGE'),(7,'Toyota');
/*!40000 ALTER TABLE `Marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Permiso`
--

DROP TABLE IF EXISTS `Permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Permiso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Permiso`
--

LOCK TABLES `Permiso` WRITE;
/*!40000 ALTER TABLE `Permiso` DISABLE KEYS */;
INSERT INTO `Permiso` VALUES (1,'Administrador'),(2,'Vendedor');
/*!40000 ALTER TABLE `Permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Persona`
--

DROP TABLE IF EXISTS `Persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellidoPaterno` varchar(255) NOT NULL,
  `apellidoMaterno` varchar(255) DEFAULT NULL,
  `telefono_cel` varchar(45) DEFAULT NULL,
  `telefono_otro` varchar(45) DEFAULT NULL,
  `correo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Persona`
--

LOCK TABLES `Persona` WRITE;
/*!40000 ALTER TABLE `Persona` DISABLE KEYS */;
INSERT INTO `Persona` VALUES (36,'Dante Ulses','Rangel','Robles','5566751526','23134432','dante.rangelrobles@gmail.com'),(37,'dasd','asdas','asdasd','1213242','12312312','asdas|@as.as'),(38,'Dante','Rangel','Robles','12312311','123123312','dante_uli@gmail.com'),(39,'EDUARDO','SALGUERO','.','5569164281','5590001742','edsalfinanciamotors@gmail.com'),(40,'CRISTIAN','MARTINEZ','ROBLES','55123123123','1231231321','cristian@gmail.com'),(41,'Carlos','Jimenez','.','5512121212','5512121212','cart_jim@hotmail.com');
/*!40000 ALTER TABLE `Persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Servicios`
--

DROP TABLE IF EXISTS `Servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Servicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Servicios`
--

LOCK TABLES `Servicios` WRITE;
/*!40000 ALTER TABLE `Servicios` DISABLE KEYS */;
INSERT INTO `Servicios` VALUES (3,'Rines'),(4,'Cambio de Llantas'),(5,'Afinación');
/*!40000 ALTER TABLE `Servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Servicios_Vehiculo`
--

DROP TABLE IF EXISTS `Servicios_Vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Servicios_Vehiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_servicio` int(11) NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `costo` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_servicio`,`id_vehiculo`,`id`) USING BTREE,
  KEY `fk_Servicios_has_Vehiculo_Vehiculo1_idx` (`id_vehiculo`),
  KEY `fk_Servicios_has_Vehiculo_Servicios1_idx` (`id_servicio`),
  KEY `id` (`id`),
  CONSTRAINT `fk_Servicios_has_Vehiculo_Servicios1` FOREIGN KEY (`id_servicio`) REFERENCES `Servicios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Servicios_has_Vehiculo_Vehiculo1` FOREIGN KEY (`id_vehiculo`) REFERENCES `Vehiculo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Servicios_Vehiculo`
--

LOCK TABLES `Servicios_Vehiculo` WRITE;
/*!40000 ALTER TABLE `Servicios_Vehiculo` DISABLE KEYS */;
INSERT INTO `Servicios_Vehiculo` VALUES (5,3,4,'123','2016-09-23'),(9,3,7,'1230','2016-09-17'),(6,4,4,'3242.234','2016-09-16'),(7,4,4,'32131.12','2016-09-23'),(8,4,5,'12312.12','2016-09-16'),(11,4,7,'87687','2016-09-17');
/*!40000 ALTER TABLE `Servicios_Vehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Vehiculo`
--

DROP TABLE IF EXISTS `Vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Vehiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `anio` varchar(4) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `color` varchar(45) DEFAULT NULL,
  `transmision` tinyint(1) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `costo` double NOT NULL,
  `factura` tinyint(1) NOT NULL,
  `serie` varchar(45) NOT NULL,
  `id_tipoVehiculo` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `kilometraje` double NOT NULL,
  `fecha_llegada` datetime DEFAULT NULL,
  `fecha_salida` datetime NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Vehiculo_tipoVehiculo_idx` (`id_tipoVehiculo`),
  KEY `fk_Vehiculo_Marca1_idx` (`id_marca`),
  CONSTRAINT `fk_Vehiculo_Marca1` FOREIGN KEY (`id_marca`) REFERENCES `Marca` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Vehiculo_tipoVehiculo` FOREIGN KEY (`id_tipoVehiculo`) REFERENCES `tipoVehiculo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Vehiculo`
--

LOCK TABLES `Vehiculo` WRITE;
/*!40000 ALTER TABLE `Vehiculo` DISABLE KEYS */;
INSERT INTO `Vehiculo` VALUES (4,'mazda','2014','adsddas',0,'verde',0,'carro deportivo con ',123123,0,'2131231',9,6,23123,NULL,'0000-00-00 00:00:00',0),(5,'Jetta','2016','modelo2',1,'Verde',0,'dasdasdasdas',123.12,2,'312312312312321',10,6,132123.12,NULL,'0000-00-00 00:00:00',0),(6,'ASDASDSADAS','1231','ASASDASD',1,'ASDD',1,'ASDASDSAD',12313221,1,'aaaaaa',10,5,1231231,'2016-09-22 00:00:00','2016-09-30 00:00:00',123.12),(7,'FORD','2013','modelo',0,'BLANCO',0,'LIMITED, ELEVADORES ELECTRICOS, SEGUROS ELECT',123,1,'3JHJASDJAKSDHKASDHAKJH',9,4,29000,NULL,'0000-00-00 00:00:00',0),(8,'jetta','1231','modelo',1,'asdas',0,'asdas',12312.12,1,'asdas',10,5,1231.12,NULL,'0000-00-00 00:00:00',0),(9,'dantea','1231','modelo',0,'12321',0,'12321',123123.123,0,'1231231',9,4,1231231,NULL,'0000-00-00 00:00:00',0),(10,'daasdas','1992','12321',1,'Verde',0,'123123',123123123,2,'123123123123',11,5,12312321.12,NULL,'0000-00-00 00:00:00',1231.98);
/*!40000 ALTER TABLE `Vehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Vendedor`
--

DROP TABLE IF EXISTS `Vendedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Vendedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `clave_vendedor` varchar(45) NOT NULL,
  `password` varchar(60) NOT NULL,
  `remember_token` varchar(60) DEFAULT NULL,
  `id_permiso` int(11) NOT NULL,
  `img_src` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clave_vendedor` (`clave_vendedor`),
  KEY `fk_Vendedor_persona1_idx` (`id_persona`),
  KEY `id_permiso` (`id_permiso`),
  CONSTRAINT `Vendedor_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `Persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Vendedor`
--

LOCK TABLES `Vendedor` WRITE;
/*!40000 ALTER TABLE `Vendedor` DISABLE KEYS */;
INSERT INTO `Vendedor` VALUES (14,36,'V-14','$2y$10$ozXyKtKSvJOe9o3mdO/HeO64/iGMQ6M2PV9RtVCE1dAJPzB4S8622','J3T9Go5Hk523GRNqEu4qgSNPNHo1eMCH9Fq6smBJ99yDuvGKHlrvbfYNy7I2',1,'dante.jpeg',1),(15,41,'V-15','$2y$10$hDjWUZIqCWgo9M8WSUKxpOCkqKyOSHk3DXHJ3n1HZ8PI3Eck0gLk2','7ICJtixO54Yv903ADUxZw6j2RDM2RjnCdYEseJdvomE1Jgczioat8RXyjJyK',2,'yo.jpg',1);
/*!40000 ALTER TABLE `Vendedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ventas`
--

DROP TABLE IF EXISTS `Ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_vehiculo` int(11) NOT NULL,
  `precio_venta` double NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_vehiculo` (`id_vehiculo`),
  KEY `fk_Ventas_Vehiculo1_idx` (`id_vehiculo`),
  KEY `fk_Ventas_Cliente1_idx` (`id_cliente`),
  KEY `fk_Ventas_Vendedor1_idx` (`id_vendedor`),
  CONSTRAINT `fk_Ventas_Cliente1` FOREIGN KEY (`id_cliente`) REFERENCES `Cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Ventas_Vehiculo1` FOREIGN KEY (`id_vehiculo`) REFERENCES `Vehiculo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Ventas_Vendedor1` FOREIGN KEY (`id_vendedor`) REFERENCES `Vendedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ventas`
--

LOCK TABLES `Ventas` WRITE;
/*!40000 ALTER TABLE `Ventas` DISABLE KEYS */;
INSERT INTO `Ventas` VALUES (1,4,231123,2,14,'2016-09-17'),(3,5,876878,2,14,'2016-09-15');
/*!40000 ALTER TABLE `Ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoVehiculo`
--

DROP TABLE IF EXISTS `tipoVehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoVehiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoVehiculo`
--

LOCK TABLES `tipoVehiculo` WRITE;
/*!40000 ALTER TABLE `tipoVehiculo` DISABLE KEYS */;
INSERT INTO `tipoVehiculo` VALUES (9,'dante123'),(10,'ola k ase'),(11,'Camión');
/*!40000 ALTER TABLE `tipoVehiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-09 13:20:00
