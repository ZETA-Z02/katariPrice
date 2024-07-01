-- MySQL dump 10.13  Distrib 8.0.37, for Linux (x86_64)
--
-- Host: localhost    Database: katari
-- ------------------------------------------------------
-- Server version	8.0.37-0ubuntu0.22.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `calc_software`
--

DROP TABLE IF EXISTS `calc_software`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `calc_software` (
  `idcalcsoftware` int NOT NULL AUTO_INCREMENT,
  `nomproyecto` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `iddificultad` int NOT NULL,
  `idlenguaje` int DEFAULT NULL,
  `idaplicacion` int NOT NULL,
  `costoservicio` double NOT NULL,
  `duracionsemanas` int DEFAULT NULL,
  `costomantenimiento` double DEFAULT NULL,
  `tiempomantenimiento` varchar(100) DEFAULT NULL,
  `opciones` varchar(50) DEFAULT NULL,
  `subtotal` double NOT NULL,
  `igv` double NOT NULL,
  `total` double NOT NULL,
  `feCreate` datetime DEFAULT CURRENT_TIMESTAMP,
  `idpersonal` int NOT NULL,
  PRIMARY KEY (`idcalcsoftware`),
  UNIQUE KEY `nomproyecto_UNIQUE` (`nomproyecto`),
  KEY `iddificultad` (`iddificultad`),
  KEY `idlenguaje` (`idlenguaje`),
  KEY `idaplicacion` (`idaplicacion`),
  KEY `idpersonal` (`idpersonal`),
  CONSTRAINT `calc_software_ibfk_1` FOREIGN KEY (`iddificultad`) REFERENCES `dificultad` (`iddificultad`),
  CONSTRAINT `calc_software_ibfk_2` FOREIGN KEY (`idlenguaje`) REFERENCES `lenguajes` (`idlenguaje`),
  CONSTRAINT `calc_software_ibfk_3` FOREIGN KEY (`idaplicacion`) REFERENCES `tipo_aplicacion` (`idaplicacion`),
  CONSTRAINT `calc_software_ibfk_4` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idpersonal`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calc_software`
--

LOCK TABLES `calc_software` WRITE;
/*!40000 ALTER TABLE `calc_software` DISABLE KEYS */;
INSERT INTO `calc_software` VALUES (1,'krvin','test 2',1,3,2,1500,2,1000,'100 meses','con servidor',115169.9,20730.582,135900.482,'2024-06-13 12:23:44',1),(2,'chatbot','asistente de ventas ',1,7,7,800,5,200,'2 meses','sin servidor',2677.7,481.98599999999993,3159.6859999999997,'2024-06-17 10:54:52',1),(3,'PAGINA WEB','una pagina web para el municipio de pomata',1,10,1,1500,3,0,'No Definido','sin servidor',5105.5,918.99,6024.49,'2024-06-17 11:11:15',1),(4,'Sistema de gestion','Sistema para la ferretera nunez',2,9,8,2000,1,100,'2 meses','sin servidor',4306,775.0799999999999,5081.08,'2024-06-17 17:04:55',1),(5,'sistema de gestion de productos y compras','se creara un sistema especializado para la ferreteria',2,10,8,2000,3,0,'No Definido','sin servidor',4356,784.0799999999999,5140.08,'2024-06-17 17:15:24',1),(6,'sistema de transportes','sistema para transportes flores, registro y asignacion de asientos',3,10,1,2000,4,0,'No Definido','sin servidor',6706.5,1207.1699999999998,7913.67,'2024-06-18 10:04:02',1),(7,'sistema de asignacion de tareas','sitema para pachamama radio en la automatizacion de tareas asignadas',2,9,8,2000,3,0,'No Definido','sin servidor',4356,784.0799999999999,5140.08,'2024-06-18 10:12:18',1),(8,'Sistema para adminsitrar ','sistema',2,9,8,1500,1,0,'No Definido','sin servidor',3656,658.0799999999999,4314.08,'2024-06-26 10:56:10',1),(9,'sistema web','sistema de web para desarrolar de un aula virtual',2,9,8,1500,1,0,'No Definido','sin servidor',3656,658.0799999999999,4314.08,'2024-06-26 11:32:20',1);
/*!40000 ALTER TABLE `calc_software` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `costos`
--

DROP TABLE IF EXISTS `costos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `costos` (
  `idcosto` int NOT NULL AUTO_INCREMENT,
  `idservicio` int NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`idcosto`),
  KEY `idservicio` (`idservicio`),
  CONSTRAINT `costos_ibfk_1` FOREIGN KEY (`idservicio`) REFERENCES `tipo_servicio` (`idservicio`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `costos`
--

LOCK TABLES `costos` WRITE;
/*!40000 ALTER TABLE `costos` DISABLE KEYS */;
INSERT INTO `costos` VALUES (1,100,'analisis estadistico',150),(2,100,'tesis pregrado',250),(3,100,'tesis maestria',450),(4,100,'tesis doctorado',800),(5,200,'software institucional',1500),(6,200,'software personal',800),(7,200,'software empresarial',2000),(8,200,'aulas virtuales',2500),(9,300,'instalacion por punto',25.5),(10,300,'certificacion por puntos',35),(11,300,'cableado',100),(12,300,'instalacion basica',200),(13,300,'cable simple',1.5),(14,300,'cable intermedio',2),(15,300,'cable superior',3),(16,300,'conector rj45 hembra',8),(17,300,'conector rj45 macho',2),(18,300,'canaletas x m',10),(19,100,'tesis postgrado',350);
/*!40000 ALTER TABLE `costos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `cotizacion_juridica`
--

DROP TABLE IF EXISTS `cotizacion_juridica`;
/*!50001 DROP VIEW IF EXISTS `cotizacion_juridica`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `cotizacion_juridica` AS SELECT 
 1 AS `idcotizacion`,
 1 AS `idjuridica`,
 1 AS `razonsocial`,
 1 AS `ruc`,
 1 AS `telefono`,
 1 AS `email`,
 1 AS `rubro`,
 1 AS `direccion`,
 1 AS `tiposervicio`,
 1 AS `idcosto`,
 1 AS `idpersonal`,
 1 AS `dias`,
 1 AS `precio`,
 1 AS `cantidad`,
 1 AS `descripcion`,
 1 AS `estado`,
 1 AS `feCreate`,
 1 AS `feLimite`,
 1 AS `redesDetalles`,
 1 AS `idcalcsoftware`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `cotizacion_natural`
--

DROP TABLE IF EXISTS `cotizacion_natural`;
/*!50001 DROP VIEW IF EXISTS `cotizacion_natural`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `cotizacion_natural` AS SELECT 
 1 AS `idcotizacion`,
 1 AS `idnatural`,
 1 AS `nombres`,
 1 AS `dni`,
 1 AS `ciudad`,
 1 AS `telefono`,
 1 AS `email`,
 1 AS `direccion`,
 1 AS `tiposervicio`,
 1 AS `idcosto`,
 1 AS `idpersonal`,
 1 AS `dias`,
 1 AS `precio`,
 1 AS `cantidad`,
 1 AS `descripcion`,
 1 AS `estado`,
 1 AS `feCreate`,
 1 AS `feLimite`,
 1 AS `redesDetalles`,
 1 AS `idcalcsoftware`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `cotizaciones`
--

DROP TABLE IF EXISTS `cotizaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cotizaciones` (
  `idcotizacion` int NOT NULL AUTO_INCREMENT,
  `idnatural` int DEFAULT NULL,
  `idjuridica` int DEFAULT NULL,
  `idservicio` int NOT NULL,
  `idcosto` int NOT NULL,
  `idpersonal` int NOT NULL,
  `dias` int NOT NULL,
  `precio` double NOT NULL,
  `cantidad` int NOT NULL,
  `descripcion` text NOT NULL,
  `estado` varchar(15) NOT NULL,
  `feCreate` datetime DEFAULT CURRENT_TIMESTAMP,
  `feLimite` date NOT NULL,
  `redesDetalles` varchar(200) DEFAULT NULL,
  `idcalcsoftware` int DEFAULT NULL,
  PRIMARY KEY (`idcotizacion`),
  KEY `idnatural` (`idnatural`),
  KEY `idjuridica` (`idjuridica`),
  KEY `idservicio` (`idservicio`),
  KEY `idcosto` (`idcosto`),
  KEY `idpersonal` (`idpersonal`),
  KEY `idcalcsoftware` (`idcalcsoftware`),
  CONSTRAINT `cotizaciones_ibfk_1` FOREIGN KEY (`idnatural`) REFERENCES `pernatural` (`idnatural`),
  CONSTRAINT `cotizaciones_ibfk_2` FOREIGN KEY (`idjuridica`) REFERENCES `perjuridica` (`idjuridica`),
  CONSTRAINT `cotizaciones_ibfk_3` FOREIGN KEY (`idservicio`) REFERENCES `tipo_servicio` (`idservicio`),
  CONSTRAINT `cotizaciones_ibfk_4` FOREIGN KEY (`idcosto`) REFERENCES `costos` (`idcosto`),
  CONSTRAINT `cotizaciones_ibfk_5` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idpersonal`),
  CONSTRAINT `cotizaciones_ibfk_6` FOREIGN KEY (`idcalcsoftware`) REFERENCES `calc_software` (`idcalcsoftware`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cotizaciones`
--

LOCK TABLES `cotizaciones` WRITE;
/*!40000 ALTER TABLE `cotizaciones` DISABLE KEYS */;
INSERT INTO `cotizaciones` VALUES (1,1,NULL,100,2,1,3,280,1,'tesis de pregrado para la U de arequipa','proyecto','2024-05-30 21:44:22','2024-06-04',NULL,NULL),(2,1,NULL,100,2,4,3,280,1,'Test BarOn ICE','espera','2024-06-03 14:09:16','2024-06-03',NULL,NULL),(3,7,NULL,100,1,7,3,250,1,'nnnn','proyecto','2024-05-13 18:46:36','2024-06-11',NULL,NULL),(4,NULL,2,100,1,7,2,170,1,'análisis estadístico para el agua ','espera','2024-05-17 09:49:24','2024-06-28',NULL,NULL),(5,NULL,2,100,1,7,2,170,1,'análisis estadístico para el agua ','espera','2024-05-17 09:49:30','2024-06-28',NULL,NULL),(6,NULL,2,100,1,3,2,170,1,'análisis estadístico para el agua ','espera','2024-04-17 09:49:34','2024-06-28',NULL,NULL),(7,8,NULL,200,6,7,1,3159.6859999999997,1,'para la persona herlyh, chatbot basico','espera','2024-04-17 10:55:30','2024-06-19',NULL,2),(8,NULL,4,200,5,3,21,6024.49,1,'pagina web para la muni pomata ','espera','2024-04-17 11:12:03','2024-06-17',NULL,3),(9,NULL,5,100,1,3,1,160,1,'analisis estadistico sobre ingreso de clientes y ganancias','espera','2024-06-17 16:48:37','2024-06-28',NULL,NULL),(10,NULL,6,100,1,3,3,180,1,'analisis de clientes y ganancias durante el año 2023, predicciones de clientes 2024','espera','2024-06-17 16:51:09','2024-06-28',NULL,NULL),(11,NULL,7,100,1,3,3,180,1,'Analisis de costos y ganancias en la produccion','espera','2024-06-17 16:53:35','2024-06-26',NULL,NULL),(12,NULL,8,100,1,3,2,170,1,'analisis estadistico administrativo de costos, gastos.','espera','2024-06-17 16:55:59','2024-06-24',NULL,NULL),(13,NULL,9,200,7,3,1,5081.08,1,'Sistema para la ferreteria nunez','espera','2024-06-17 17:05:27','2024-06-19',NULL,4),(14,NULL,10,300,10,3,10,286,1,'Instalacion de redes para ferreteria','espera','2024-06-17 17:13:49','2024-06-27','http://localhost/katariPrice/dumps/excel/Cot.:COMERCIAL FERRETERIA SAN JOSE E.I.R.L.10/404.png',NULL),(15,NULL,11,200,7,4,21,5140.08,1,'sistema de gestion','espera','2024-06-17 17:15:39','2024-06-28',NULL,5),(16,NULL,12,200,7,4,28,7913.67,1,'sistema de transportes','espera','2024-06-18 10:04:23','2024-06-28',NULL,6),(17,NULL,13,300,10,4,1,61,1,'conexión de cableado','espera','2024-06-18 10:06:55','2024-06-28','Sin Archivo(Excel) Disponible',NULL),(18,NULL,14,100,1,4,1,160,1,'analisis estadistico de numero de clientes y noticias recepcionadas por el publico en general','espera','2024-06-18 10:10:30','2024-06-26',NULL,NULL),(19,NULL,15,200,7,1,2,5140.08,2,'sistema de pachamama radio','espera','2024-06-18 10:12:48','2024-06-26',NULL,7),(20,9,NULL,100,2,1,3,280,1,'tesis de pregrado para la universidad de arequipa','espera','2024-06-18 10:14:50','2024-06-28',NULL,NULL),(21,10,NULL,100,3,1,3,480,1,'tesis de maestria  universidad del altiplano','cancelado','2024-06-18 10:16:28','2024-06-29',NULL,NULL),(22,11,NULL,100,4,7,2,820,1,'tesis de doctorado para la universidad del altiplano','espera','2024-06-18 10:23:43','2024-06-30',NULL,NULL),(23,NULL,4,200,5,7,21,4314.08,1,'','espera','2024-06-26 10:56:46','2024-06-30',NULL,8),(24,11,NULL,200,5,1,21,4314.08,1,'se cancela','espera','2024-06-26 11:33:53','2024-06-28',NULL,9),(25,11,NULL,100,2,1,21,460,1,'holaa','espera','2024-06-27 10:36:54','2024-06-28',NULL,NULL),(26,12,NULL,100,1,1,1,160,1,'Analisis estadistico en cotizaciones de la empresa katari A&C','espera','2024-06-30 09:12:17','2024-06-28',NULL,NULL),(27,12,NULL,100,1,1,2,170,1,'Analisis estadistico de cotizaciones en katari','aceptado','2024-06-30 09:13:09','2024-06-30',NULL,NULL),(28,2,NULL,100,2,8,2,270,1,'tesis pregrado para analisis estadistico sobre impacto de las drogas','espera','2024-06-30 10:31:29','2024-07-01',NULL,NULL),(29,8,NULL,100,1,1,2,170,1,'analisis estadistico','cancelado','2024-06-30 10:37:10','2024-07-06',NULL,NULL),(30,9,NULL,100,1,8,2,170,1,'analisis estadistico sobre el impacto de el intenet en ni;os','cancelado','2024-06-30 11:37:47','2024-07-06',NULL,NULL),(31,9,NULL,100,1,8,2,170,1,'analisis estadistico sobre el impacto de el intenet en ni;os','espera','2024-06-30 11:37:52','2024-07-06',NULL,NULL),(32,1,NULL,100,19,8,2,370,1,'doctorado','aceptado','2024-06-30 11:38:34','2024-07-06',NULL,NULL),(33,12,NULL,100,2,1,2,270,1,'tesis de mecanica electrica','espera','2024-06-30 16:38:27','2024-07-05',NULL,NULL),(34,13,NULL,100,4,1,2,820,1,'tesis de doctorado impacto en el medio ambiente','aceptado','2024-06-30 16:58:40','2024-07-06',NULL,NULL);
/*!40000 ALTER TABLE `cotizaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dificultad`
--

DROP TABLE IF EXISTS `dificultad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dificultad` (
  `iddificultad` int NOT NULL AUTO_INCREMENT,
  `factor` double NOT NULL,
  PRIMARY KEY (`iddificultad`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dificultad`
--

LOCK TABLES `dificultad` WRITE;
/*!40000 ALTER TABLE `dificultad` DISABLE KEYS */;
INSERT INTO `dificultad` VALUES (1,0.1),(2,0.2),(3,0.3),(4,0.4),(5,0.5);
/*!40000 ALTER TABLE `dificultad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gastos`
--

DROP TABLE IF EXISTS `gastos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gastos` (
  `idgasto` int NOT NULL AUTO_INCREMENT,
  `idproyecto` int NOT NULL,
  `descripcion` text NOT NULL,
  `cantidad` int NOT NULL,
  `monto` double NOT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idgasto`),
  KEY `idproyecto` (`idproyecto`),
  CONSTRAINT `gastos_ibfk_1` FOREIGN KEY (`idproyecto`) REFERENCES `proyectos` (`idproyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gastos`
--

LOCK TABLES `gastos` WRITE;
/*!40000 ALTER TABLE `gastos` DISABLE KEYS */;
/*!40000 ALTER TABLE `gastos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lenguajes`
--

DROP TABLE IF EXISTS `lenguajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lenguajes` (
  `idlenguaje` int NOT NULL AUTO_INCREMENT,
  `lenguaje` varchar(50) NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`idlenguaje`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lenguajes`
--

LOCK TABLES `lenguajes` WRITE;
/*!40000 ALTER TABLE `lenguajes` DISABLE KEYS */;
INSERT INTO `lenguajes` VALUES (1,'java',9),(2,'c#',9),(3,'c++',9),(4,'python',8),(5,'python desktop',8),(6,'python flask',7),(7,'python djanfo',7),(8,'R',6),(9,'php vanila',5),(10,'php framework',5),(11,'node js',5),(12,'html',2),(13,'css',3),(14,'js',4);
/*!40000 ALTER TABLE `lenguajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `idlogin` int NOT NULL AUTO_INCREMENT,
  `idpersonal` int NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idlogin`),
  KEY `idpersonal` (`idpersonal`),
  CONSTRAINT `login_ibfk_1` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idpersonal`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,1,'zeta','zeta','1'),(3,3,'johan','johan','1'),(4,4,'josue','josue','1'),(5,5,'elmer','elmer','1'),(6,6,'kevin','kevin','1'),(7,7,'alberto','alberto','1'),(8,8,'victor','victor','1');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `natural_tabla`
--

DROP TABLE IF EXISTS `natural_tabla`;
/*!50001 DROP VIEW IF EXISTS `natural_tabla`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `natural_tabla` AS SELECT 
 1 AS `idnatural`,
 1 AS `nombres`,
 1 AS `dni`,
 1 AS `telefono`,
 1 AS `email`,
 1 AS `direccion`,
 1 AS `ciudad`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `pago_detalles`
--

DROP TABLE IF EXISTS `pago_detalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pago_detalles` (
  `idpagodetalle` int NOT NULL AUTO_INCREMENT,
  `idpago` int NOT NULL,
  `monto` double NOT NULL,
  `concepto` varchar(50) NOT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idpagodetalle`),
  KEY `idpago` (`idpago`),
  CONSTRAINT `pago_detalles_ibfk_1` FOREIGN KEY (`idpago`) REFERENCES `pagos` (`idpago`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago_detalles`
--

LOCK TABLES `pago_detalles` WRITE;
/*!40000 ALTER TABLE `pago_detalles` DISABLE KEYS */;
INSERT INTO `pago_detalles` VALUES (1,1,50,'Primer Pago','2024-05-30 21:45:12'),(2,1,43,'Nuevo Pago','2024-05-30 22:30:04'),(3,1,30,'pago nuevo ','2024-06-18 19:37:45'),(4,2,20,'Primer Pago','2024-06-26 10:40:03');
/*!40000 ALTER TABLE `pago_detalles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagos` (
  `idpago` int NOT NULL AUTO_INCREMENT,
  `idproyecto` int NOT NULL,
  `nomproyecto` varchar(100) NOT NULL,
  `idnatural` int DEFAULT NULL,
  `idjuridica` int DEFAULT NULL,
  `monto` double NOT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  `saldo` double NOT NULL,
  `igv` double NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`idpago`),
  KEY `idproyecto` (`idproyecto`),
  KEY `idnatural` (`idnatural`),
  KEY `idjuridica` (`idjuridica`),
  CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`idproyecto`) REFERENCES `proyectos` (`idproyecto`),
  CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`idnatural`) REFERENCES `pernatural` (`idnatural`),
  CONSTRAINT `pagos_ibfk_3` FOREIGN KEY (`idjuridica`) REFERENCES `perjuridica` (`idjuridica`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
INSERT INTO `pagos` VALUES (1,1,'Tesis de pregrado ',1,NULL,123,'2024-05-30 21:45:12',157,50.4,280),(2,2,'analisis estadistico de unac',7,NULL,20,'2024-06-26 10:40:03',230,45,250);
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perjuridica`
--

DROP TABLE IF EXISTS `perjuridica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perjuridica` (
  `idjuridica` int NOT NULL AUTO_INCREMENT,
  `razonsocial` varchar(200) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `web` varchar(100) DEFAULT NULL,
  `ruc` varchar(11) NOT NULL,
  `rubro` varchar(50) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `feCreate` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdate` date DEFAULT NULL,
  PRIMARY KEY (`idjuridica`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perjuridica`
--

LOCK TABLES `perjuridica` WRITE;
/*!40000 ALTER TABLE `perjuridica` DISABLE KEYS */;
INSERT INTO `perjuridica` VALUES (1,'Archivo','234534534','archivo@gmail.com','archivo.com','34654654365','archivos','av. el ejercito','2024-06-05 22:39:49','2024-06-18'),(2,'EMP.MUNICIPAL DE SANEAMIENTO BASICO PUNO S A','987656544','emsa@puno.com','https://emsapuno.pe/apps/consulta/login','20163947693','saneamiento basico','JR. ARICA NRO 115 ','2024-06-17 09:47:15',NULL),(3,'COMERCIAL FUJIMOTO SRL EN LIQUIDACION','946785436','fujimoto@gmail.com','www.fujimoto.wordpress.com','20275602885','Comercial fujimoto','NRO R-3 INT. 3 URB. SAN ANDRES V ETAPA ','2024-06-17 10:56:56','2024-06-18'),(4,'MUNICIPALIDAD DISTRITAL DE POMATA','955521457','munipomata@gob.pe','https://portal.munipomata.gob.pe/#','20146266208','web','AV. LIMA NORTE NRO 245 CERCADO ','2024-06-17 11:07:51',NULL),(5,'COMERCIAL FERRETERIA PUNO E.I.R.L.','973486534','comercialFerre@gmail.com','www.ferreteriaComer.com','20448163424','Empresa Individual de Responsabilidad Limitada','AV. SOL NRO 877 BARRIO PORTEÑO ','2024-06-17 16:48:08',NULL),(6,'COMERCIAL FERRETERA TRIPLEY S.R.L.','943587562','tripley@gmail.com','www.tripleyFerre.com','20136714784','ferreteria y reparaciones','AV. LAS AMAPOLAS NRO Z-1 INT. 10 URB. FCO.MALASPINA BRYSON ','2024-06-17 16:50:23',NULL),(7,'COMERCIAL FERRETERA YOLED  E.I.R.L.','962378547','yoled@gmail.com','www.yoled.wordpress.com','20524055563','FERRETERA YOLED ','AV. CAMINO REAL NRO 371 INT. A ','2024-06-17 16:53:11',NULL),(8,'COMERCIAL FERRETERIA JHON EMPRESA INDIVIDUAL DE RESPONSABILIDAD LIMITADA','945876585','jhon@gmail.com','www.jhon.wordpress.com','20602388370','FERRETERIA JHON','AV. VENEZUELA NRO 409 URB. LAS AMERICAS ','2024-06-17 16:55:11',NULL),(9,'COMERCIAL FERRETERIA NUÑEZ SOCIEDAD ANONIMA CERRADA','936873276','nunezFerre@gmail.com','www.nunez.wordpress.com','20542245833','FERRETERIA NUEZ','AV. LIMA NRO 626 ','2024-06-17 17:00:24',NULL),(10,'COMERCIAL FERRETERIA SAN JOSE E.I.R.L.','932678543','ferreteriasanjose@gmail.com','www.sanjoseferreteria.wordpress.com','20600038738','ferreteria san jose','AV. TARAPACA NRO 420 ALTO MISTI ','2024-06-17 17:13:12',NULL),(11,'COMERCIAL FERRETERO EL DORADO SOCIEDAD ANONIMA CERRADA - COMERCIAL FERRETERO EL DORADO S.A.C.','965326754','eldoradosociedad@gmail.com','www.eldoradosociedadanonima.com','20602479693','ferretero el dorado','MZA. C LOTE 1 A.V. EL DORADO ','2024-06-17 17:14:45',NULL),(12,'COMERCIAL FLORESI E.I.R.L.','937575523','flores@gmail.com','www.florescomercial.wordpress.com','20600106431','empresa de buses, transportes','JR. AMAZONAS NRO 183 SEC. 1 ','2024-06-18 10:02:45',NULL),(13,'COMERCIAL FLORETE EMPRESA INDIVIDUAL DE RESPONSABILIDAD LIMITADA','912732864','floreteempre@gmail.com','www.floreteempre.wordpress.com','20519948924','empresa de flores','JR. BAMBAS NRO 561 INT. 103 CERCADO DE LIMA ','2024-06-18 10:06:00',NULL),(14,'GRUPO GAMTEK E.I.R.L.','932432123','gamtek@gmail.com','www.gamtek.com','20611333006','soluciones informaticas','JR. HUASCAR NRO 709 BAR. 15 DE AGOSTO ','2024-06-18 10:07:56',NULL),(15,'INS DE DESARROLLO EDUC Y ASESORIA LEGAL','962357654','pachamama@hotmail.org','www.pachamamaradio.org','20405391156','radio y noticias','JR. ACORA NRO 222 BARRIO LAYKAKOTA ','2024-06-18 10:09:59',NULL),(16,'AGROLIGHT PERU S.A.C.','972378463','agrolight@gmail.com','agrolight.com','20552103816','agrolight','PJ. JORGE BASADRE NRO 158 URB. POP LA UNIVERSAL 2DA ET. ','2024-06-26 10:46:28',NULL);
/*!40000 ALTER TABLE `perjuridica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pernatural`
--

DROP TABLE IF EXISTS `pernatural`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pernatural` (
  `idnatural` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `dni` int NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `feCreate` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdate` date DEFAULT NULL,
  PRIMARY KEY (`idnatural`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pernatural`
--

LOCK TABLES `pernatural` WRITE;
/*!40000 ALTER TABLE `pernatural` DISABLE KEYS */;
INSERT INTO `pernatural` VALUES (1,'deyvin ','arpasi mamani',53425432,'masculino','Arequipa','348543875','deyvis@gmail.com','JR no se','2024-05-30 21:44:00',NULL),(2,'Josue  ','Llatasi Chagua',32463425,'masculino','Juli','834658345','josue@gmail.com','july','2024-06-05 22:38:54',NULL),(3,'Bryans ','Rejes Puma',89346587,'masculino','Puno','834675874','rejes@gmail.com','4 de noviembre','2024-06-05 22:44:11',NULL),(4,'Shandee Giovani','Cahui Lupaca',34523453,'masculino','Arequipa','979437503','shadee@gmail.com','jr. puno','2024-06-05 22:45:47',NULL),(5,'Diego Jhoel','Torres Chino',73245354,'masculino','Puno','909707301','diego@gmail.com','jr. leoncio prado','2024-06-05 22:47:22','2024-06-17'),(6,'Julio Cesar ','Mita Quispe',89763458,'masculino','Puno','384658943','julio@gmail.com','jr. manazo','2024-06-05 22:48:08',NULL),(7,'EDGAR','APAZA CHOQUE',40023528,'masculino','Puno','935017466','edgarapazac@gmail.com','av','2024-06-13 18:44:33',NULL),(8,'HERLYH','CHOQUEMAMANI FRANCO',43121319,'masculino','ILAVE','980903047','herlynchoquemamani@gmail.com','Av. Andres Avelino Caceres','2024-06-17 10:05:51',NULL),(9,'ALDO ANDRES','APAZA CHAMBI',1873701,'masculino','puno','932754732','aldo@gmail.com','puno','2024-06-18 10:14:22',NULL),(10,'RICHAR','NEIRA COAQUIRA',1325635,'masculino','puno','973656467','richar@gmail.com','puno','2024-06-18 10:15:58',NULL),(11,'KEVIN JOSUE','GALLEGOS CHOQUE',70452953,'masculino','puno','934672638','gallegoskevin2727@gmail.com','puno','2024-06-18 10:23:09',NULL),(12,'JERSSON PELAYO','QUISPE APAZA',72535244,'masculino','puno','998777712','jersson.z032@gmail.com','jr Tupac Yupanqui #181','2024-06-25 09:08:53',NULL),(13,'YOJAN VICTOR','QUISPE APAZA',72535242,'masculino','puno','932432534','dota2jersson3@gmail.com','jr tupac yupanqui','2024-06-30 16:58:18',NULL);
/*!40000 ALTER TABLE `pernatural` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal` (
  `idpersonal` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `dni` int NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `fechaNac` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `feCreate` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdate` date DEFAULT NULL,
  PRIMARY KEY (`idpersonal`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (1,'Jersson Pelayo','Quispe Apaza',72535244,'masculino','998777712','2003-11-02','jersson.z032@gmail.com','http://localhost/katariPrice/dumps/img/Jersson Pelayo72535244/1361430.png','2024-05-30 21:40:55','2024-06-18'),(3,'Johan Victor','Quispe Apaza',72535242,'masculino','998712321','1999-03-06','johanvic@gmail.com','http://localhost/katariPrice/dumps/img/Johan Victor72535242/tuxRock4.jpeg','2024-06-04 06:43:10',NULL),(4,'Jouse Rosell','Llatasi Chagua',87364258,'masculino','238764237','2003-12-06','josue@gmail.com','http://localhost/katariPrice/dumps/img/Jouse Rosell87364258/tuxBasket.jpeg','2024-06-04 06:58:58',NULL),(5,'Elmer Gabriel','Quispe Ponce',32784354,'masculino','676534652','2003-03-02','elmer@gmail.com','http://localhost/katariPrice/dumps/img/Elmer Gabriel32784354/tux3.jpeg','2024-06-04 06:59:38',NULL),(6,'Kevin Josue','Gallegos Choque',87643587,'masculino','456534754','2004-02-01','kavin@gmail.com','http://localhost/katariPrice/dumps/img/Kevin Josue87643587/tux1.jpeg','2024-06-04 07:00:33',NULL),(7,'alberto','rodriguez',23987342,'masculino','532453425','1999-03-02','alberto@gmail.com','http://localhost/katariPrice/dumps/img/alberto23987342/tuxRock2.jpeg','2024-06-04 07:01:10',NULL),(8,'Victor Huallpa','Huahuacondori',12345324,'masculino','456542534','2000-01-01','victor@gmail.com','http://localhost/katariPrice/dumps/img/Victor Huallpa12345324/1920x1080-126683-cars-3-lightning-mcqueen-jackson-storm-cruz-ramirez-4k-8k.jpg','2024-06-04 07:04:47',NULL);
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyectoavances`
--

DROP TABLE IF EXISTS `proyectoavances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proyectoavances` (
  `idavance` int NOT NULL AUTO_INCREMENT,
  `idproyecto` int NOT NULL,
  `idpersonal` int NOT NULL,
  `reportes` int NOT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  `porcentaje` double NOT NULL,
  `totalactividades` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idavance`),
  KEY `idproyecto` (`idproyecto`),
  KEY `idpersonal` (`idpersonal`),
  CONSTRAINT `proyectoavances_ibfk_1` FOREIGN KEY (`idproyecto`) REFERENCES `proyectos` (`idproyecto`),
  CONSTRAINT `proyectoavances_ibfk_2` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idpersonal`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectoavances`
--

LOCK TABLES `proyectoavances` WRITE;
/*!40000 ALTER TABLE `proyectoavances` DISABLE KEYS */;
INSERT INTO `proyectoavances` VALUES (1,1,1,2,'2024-05-30 21:45:12',20,'10'),(2,2,1,0,'2024-06-26 10:40:03',0,'2');
/*!40000 ALTER TABLE `proyectoavances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyectoinformes`
--

DROP TABLE IF EXISTS `proyectoinformes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proyectoinformes` (
  `idproyinforme` int NOT NULL AUTO_INCREMENT,
  `idproyecto` int NOT NULL,
  `idpersonal` int NOT NULL,
  `asunto` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  `iniciales` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idproyinforme`),
  KEY `idproyecto` (`idproyecto`),
  KEY `idpersonal` (`idpersonal`),
  CONSTRAINT `proyectoinformes_ibfk_1` FOREIGN KEY (`idproyecto`) REFERENCES `proyectos` (`idproyecto`),
  CONSTRAINT `proyectoinformes_ibfk_2` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idpersonal`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectoinformes`
--

LOCK TABLES `proyectoinformes` WRITE;
/*!40000 ALTER TABLE `proyectoinformes` DISABLE KEYS */;
INSERT INTO `proyectoinformes` VALUES (1,1,1,'','','2024-05-30 21:46:20',''),(2,1,1,'','','2024-05-30 21:55:46','');
/*!40000 ALTER TABLE `proyectoinformes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyectos`
--

DROP TABLE IF EXISTS `proyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proyectos` (
  `idproyecto` int NOT NULL AUTO_INCREMENT,
  `nomproyecto` varchar(100) NOT NULL,
  `idnatural` int DEFAULT NULL,
  `idjuridica` int DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `idservicio` int NOT NULL,
  `totalactividades` int NOT NULL,
  `descripcion` text NOT NULL,
  `pendientepago` double NOT NULL,
  `total` double NOT NULL,
  `feEntrega` date NOT NULL,
  `feCreate` datetime DEFAULT CURRENT_TIMESTAMP,
  `feUpdate` date DEFAULT NULL,
  `idpersonal` int NOT NULL,
  `idcotizacion` int DEFAULT NULL,
  PRIMARY KEY (`idproyecto`),
  KEY `idnatural` (`idnatural`),
  KEY `idjuridica` (`idjuridica`),
  KEY `idservicio` (`idservicio`),
  KEY `idpersonal` (`idpersonal`),
  CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`idnatural`) REFERENCES `pernatural` (`idnatural`),
  CONSTRAINT `proyectos_ibfk_2` FOREIGN KEY (`idjuridica`) REFERENCES `perjuridica` (`idjuridica`),
  CONSTRAINT `proyectos_ibfk_3` FOREIGN KEY (`idservicio`) REFERENCES `tipo_servicio` (`idservicio`),
  CONSTRAINT `proyectos_ibfk_4` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idpersonal`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectos`
--

LOCK TABLES `proyectos` WRITE;
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
INSERT INTO `proyectos` VALUES (1,'Tesis de pregrado ',1,NULL,'proceso',100,10,'Tesis de pregrado  para la universisdad de arequipa',157,280,'2024-06-02','2024-05-30 21:45:12',NULL,1,1),(2,'analisis estadistico de unac',7,NULL,'proceso',100,2,'analisis estadistico para joven universitario',230,250,'2024-06-28','2024-06-26 10:40:03',NULL,1,3);
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `proyectos_juridica`
--

DROP TABLE IF EXISTS `proyectos_juridica`;
/*!50001 DROP VIEW IF EXISTS `proyectos_juridica`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `proyectos_juridica` AS SELECT 
 1 AS `idproyecto`,
 1 AS `idjuridica`,
 1 AS `nomproyecto`,
 1 AS `razonsocial`,
 1 AS `ruc`,
 1 AS `telefono`,
 1 AS `email`,
 1 AS `direccion`,
 1 AS `estado`,
 1 AS `tiposervicio`,
 1 AS `pendientepago`,
 1 AS `total`,
 1 AS `totalactividades`,
 1 AS `descripcion`,
 1 AS `feEntrega`,
 1 AS `feCreate`,
 1 AS `idpersonal`,
 1 AS `idcotizacion`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `proyectos_natural`
--

DROP TABLE IF EXISTS `proyectos_natural`;
/*!50001 DROP VIEW IF EXISTS `proyectos_natural`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `proyectos_natural` AS SELECT 
 1 AS `idproyecto`,
 1 AS `idnatural`,
 1 AS `nomproyecto`,
 1 AS `nombres`,
 1 AS `dni`,
 1 AS `telefono`,
 1 AS `email`,
 1 AS `ciudad`,
 1 AS `direccion`,
 1 AS `estado`,
 1 AS `tiposervicio`,
 1 AS `pendientepago`,
 1 AS `total`,
 1 AS `totalactividades`,
 1 AS `descripcion`,
 1 AS `feEntrega`,
 1 AS `feCreate`,
 1 AS `idpersonal`,
 1 AS `idcotizacion`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `tipo_aplicacion`
--

DROP TABLE IF EXISTS `tipo_aplicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_aplicacion` (
  `idaplicacion` int NOT NULL AUTO_INCREMENT,
  `aplicacion` varchar(100) NOT NULL,
  `precio` double NOT NULL,
  `descripcion` text,
  PRIMARY KEY (`idaplicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_aplicacion`
--

LOCK TABLES `tipo_aplicacion` WRITE;
/*!40000 ALTER TABLE `tipo_aplicacion` DISABLE KEYS */;
INSERT INTO `tipo_aplicacion` VALUES (1,'escritorio',3000,'aplicacion de escritorio'),(2,'modulo',2800,NULL),(3,'servicios',2900,''),(4,'android basico',1000,NULL),(5,'android intermedio',2500,NULL),(6,'android avanzado',3800,NULL),(7,'web basico',1000,NULL),(8,'web intermedio ',1500,'web con base de datos'),(9,'web avanzado',2200,NULL);
/*!40000 ALTER TABLE `tipo_aplicacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_servicio`
--

DROP TABLE IF EXISTS `tipo_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_servicio` (
  `idservicio` int NOT NULL AUTO_INCREMENT,
  `tiposervicio` varchar(100) NOT NULL,
  PRIMARY KEY (`idservicio`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_servicio`
--

LOCK TABLES `tipo_servicio` WRITE;
/*!40000 ALTER TABLE `tipo_servicio` DISABLE KEYS */;
INSERT INTO `tipo_servicio` VALUES (100,'estadistica'),(200,'software'),(300,'redes');
/*!40000 ALTER TABLE `tipo_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `cotizacion_juridica`
--

/*!50001 DROP VIEW IF EXISTS `cotizacion_juridica`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`jersson`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `cotizacion_juridica` AS select `c`.`idcotizacion` AS `idcotizacion`,`c`.`idjuridica` AS `idjuridica`,`j`.`razonsocial` AS `razonsocial`,`j`.`ruc` AS `ruc`,`j`.`telefono` AS `telefono`,`j`.`email` AS `email`,`j`.`rubro` AS `rubro`,`j`.`direccion` AS `direccion`,`s`.`tiposervicio` AS `tiposervicio`,`c`.`idcosto` AS `idcosto`,`c`.`idpersonal` AS `idpersonal`,`c`.`dias` AS `dias`,`c`.`precio` AS `precio`,`c`.`cantidad` AS `cantidad`,`c`.`descripcion` AS `descripcion`,`c`.`estado` AS `estado`,`c`.`feCreate` AS `feCreate`,`c`.`feLimite` AS `feLimite`,`c`.`redesDetalles` AS `redesDetalles`,`c`.`idcalcsoftware` AS `idcalcsoftware` from ((`cotizaciones` `c` join `perjuridica` `j` on((`c`.`idjuridica` = `j`.`idjuridica`))) join `tipo_servicio` `s` on((`s`.`idservicio` = `c`.`idservicio`))) where (`c`.`idjuridica` is not null) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `cotizacion_natural`
--

/*!50001 DROP VIEW IF EXISTS `cotizacion_natural`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`jersson`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `cotizacion_natural` AS select `c`.`idcotizacion` AS `idcotizacion`,`c`.`idnatural` AS `idnatural`,concat(`n`.`nombre`,' ',`n`.`apellidos`) AS `nombres`,`n`.`dni` AS `dni`,`n`.`ciudad` AS `ciudad`,`n`.`telefono` AS `telefono`,`n`.`email` AS `email`,`n`.`direccion` AS `direccion`,`s`.`tiposervicio` AS `tiposervicio`,`c`.`idcosto` AS `idcosto`,`c`.`idpersonal` AS `idpersonal`,`c`.`dias` AS `dias`,`c`.`precio` AS `precio`,`c`.`cantidad` AS `cantidad`,`c`.`descripcion` AS `descripcion`,`c`.`estado` AS `estado`,`c`.`feCreate` AS `feCreate`,`c`.`feLimite` AS `feLimite`,`c`.`redesDetalles` AS `redesDetalles`,`c`.`idcalcsoftware` AS `idcalcsoftware` from ((`cotizaciones` `c` join `pernatural` `n` on((`c`.`idnatural` = `n`.`idnatural`))) join `tipo_servicio` `s` on((`s`.`idservicio` = `c`.`idservicio`))) where (`c`.`idnatural` is not null) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `natural_tabla`
--

/*!50001 DROP VIEW IF EXISTS `natural_tabla`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`jersson`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `natural_tabla` AS select `pernatural`.`idnatural` AS `idnatural`,concat(`pernatural`.`nombre`,' ',`pernatural`.`apellidos`) AS `nombres`,`pernatural`.`dni` AS `dni`,`pernatural`.`telefono` AS `telefono`,`pernatural`.`email` AS `email`,`pernatural`.`direccion` AS `direccion`,`pernatural`.`ciudad` AS `ciudad` from `pernatural` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `proyectos_juridica`
--

/*!50001 DROP VIEW IF EXISTS `proyectos_juridica`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`jersson`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `proyectos_juridica` AS select `p`.`idproyecto` AS `idproyecto`,`j`.`idjuridica` AS `idjuridica`,`p`.`nomproyecto` AS `nomproyecto`,`j`.`razonsocial` AS `razonsocial`,`j`.`ruc` AS `ruc`,`j`.`telefono` AS `telefono`,`j`.`email` AS `email`,`j`.`direccion` AS `direccion`,`p`.`estado` AS `estado`,`s`.`tiposervicio` AS `tiposervicio`,`p`.`pendientepago` AS `pendientepago`,`p`.`total` AS `total`,`p`.`totalactividades` AS `totalactividades`,`p`.`descripcion` AS `descripcion`,`p`.`feEntrega` AS `feEntrega`,`p`.`feCreate` AS `feCreate`,`p`.`idpersonal` AS `idpersonal`,`p`.`idcotizacion` AS `idcotizacion` from ((`proyectos` `p` join `perjuridica` `j` on((`p`.`idjuridica` = `j`.`idjuridica`))) join `tipo_servicio` `s` on((`p`.`idservicio` = `s`.`idservicio`))) where (`p`.`idjuridica` is not null) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `proyectos_natural`
--

/*!50001 DROP VIEW IF EXISTS `proyectos_natural`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`jersson`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `proyectos_natural` AS select `p`.`idproyecto` AS `idproyecto`,`n`.`idnatural` AS `idnatural`,`p`.`nomproyecto` AS `nomproyecto`,concat(`n`.`nombre`,' ',`n`.`apellidos`) AS `nombres`,`n`.`dni` AS `dni`,`n`.`telefono` AS `telefono`,`n`.`email` AS `email`,`n`.`ciudad` AS `ciudad`,`n`.`direccion` AS `direccion`,`p`.`estado` AS `estado`,`s`.`tiposervicio` AS `tiposervicio`,`p`.`pendientepago` AS `pendientepago`,`p`.`total` AS `total`,`p`.`totalactividades` AS `totalactividades`,`p`.`descripcion` AS `descripcion`,`p`.`feEntrega` AS `feEntrega`,`p`.`feCreate` AS `feCreate`,`p`.`idpersonal` AS `idpersonal`,`p`.`idcotizacion` AS `idcotizacion` from ((`proyectos` `p` join `pernatural` `n` on((`p`.`idnatural` = `n`.`idnatural`))) join `tipo_servicio` `s` on((`p`.`idservicio` = `s`.`idservicio`))) where (`p`.`idnatural` is not null) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-30 21:05:11
