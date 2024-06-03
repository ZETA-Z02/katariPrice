-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: katari
-- ------------------------------------------------------
-- Server version	8.0.36-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
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
  `nomproyecto` varchar(22) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calc_software`
--

LOCK TABLES `calc_software` WRITE;
/*!40000 ALTER TABLE `calc_software` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cotizaciones`
--

LOCK TABLES `cotizaciones` WRITE;
/*!40000 ALTER TABLE `cotizaciones` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,1,'zeta','zeta','1');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago_detalles`
--

LOCK TABLES `pago_detalles` WRITE;
/*!40000 ALTER TABLE `pago_detalles` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perjuridica`
--

LOCK TABLES `perjuridica` WRITE;
/*!40000 ALTER TABLE `perjuridica` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pernatural`
--

LOCK TABLES `pernatural` WRITE;
/*!40000 ALTER TABLE `pernatural` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectoavances`
--

LOCK TABLES `proyectoavances` WRITE;
/*!40000 ALTER TABLE `proyectoavances` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectoinformes`
--

LOCK TABLES `proyectoinformes` WRITE;
/*!40000 ALTER TABLE `proyectoinformes` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectos`
--

LOCK TABLES `proyectos` WRITE;
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
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

-- Dump completed on 2024-05-30 21:39:30
