-- MySQL dump 10.13  Distrib 5.5.24, for Win64 (x86)
--
-- Host: localhost    Database: comedor
-- ------------------------------------------------------
-- Server version	5.5.24-log

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
-- Table structure for table `administrador`
--
drop database if exists comedor;
create database comedor;
use comedor;
DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `CURP` varchar(20) NOT NULL,
  PRIMARY KEY (`CURP`),
  KEY `fk_administrador_persona1_idx` (`CURP`),
  CONSTRAINT `fk_administrador_persona1` FOREIGN KEY (`CURP`) REFERENCES `persona` (`CURP`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES ('ADMIN','ADMIN','ADMIN1234');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alimentos`
--

DROP TABLE IF EXISTS `alimentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alimentos` (
  `nombre_a` varchar(250) NOT NULL,
  `ruta` varchar(250) DEFAULT NULL,
  `id_alimento` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) NOT NULL,
  PRIMARY KEY (`id_alimento`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alimentos`
--

LOCK TABLES `alimentos` WRITE;
/*!40000 ALTER TABLE `alimentos` DISABLE KEYS */;
INSERT INTO `alimentos` VALUES ('JUGO DE NARANJA','bf08d-5c523-jugo_de_naranja.png',1,'BEBIDAS'),('HUEVOS CON JAMON','71da3-3cf35-huevo_con_jamon.jpg',2,'PLATO FUERTE'),('CARNE DE RES','149bd-52f6b-carne.jpg',3,'PLATO FUERTE'),('HUEVO','9d5d0-0c0a6-huevo.jpg',4,'PLATO FUERTE'),('GELATINA DE LIMÓN','bd96a-3c190-gelatina_con_limon.jpg',5,'POSTRE'),('AVENA CON LECHE','b7a2f-6c0d5-avena_con_leche.jpg',6,'POSTRE'),('LECHE DE VACA ENTERA','ddde4-758a3-leche.jpg',7,'BEBIDA');
/*!40000 ALTER TABLE `alimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `control_asistencia`
--

DROP TABLE IF EXISTS `control_asistencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `control_asistencia` (
  `id_a` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(250) DEFAULT NULL,
  `nivel` varchar(45) NOT NULL,
  `menu_id_c` int(11) NOT NULL,
  `nino_CURP` varchar(20) NOT NULL,
  PRIMARY KEY (`id_a`),
  KEY `fk_control_asistencia_cronograma_menu1_idx` (`menu_id_c`),
  KEY `fk_control_asistencia_nino1_idx` (`nino_CURP`),
  CONSTRAINT `fk_control_asistencia_cronograma_menu1` FOREIGN KEY (`menu_id_c`) REFERENCES `cronograma_menu` (`id_c`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_control_asistencia_nino1` FOREIGN KEY (`nino_CURP`) REFERENCES `nino` (`CURP`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `control_asistencia`
--

LOCK TABLES `control_asistencia` WRITE;
/*!40000 ALTER TABLE `control_asistencia` DISABLE KEYS */;
INSERT INTO `control_asistencia` VALUES (1,'COME REGULAR','BIEN',1,'ARTURITO1234'),(2,'COME EXCELENTE','BIEN',1,'JUANITO1234'),(3,'COMIÓ REGULAR','BIEN',2,'ARTURITO1234'),(4,'COMIÓ MUY BIEN','EXCELENTE',2,'JUANITO1234'),(5,'come mucho','EXCELENTE',4,'ARTURITO1234'),(6,'no come bien','MUY POCO',4,'JUANITO1234'),(7,'no come vegetales','MUY POCO',6,'ARTURITO1234'),(8,'se come todo','EXCELENTE',6,'JUANITO1234');
/*!40000 ALTER TABLE `control_asistencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cronograma_menu`
--

DROP TABLE IF EXISTS `cronograma_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cronograma_menu` (
  `id_c` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `CURP` varchar(20) NOT NULL,
  `modalidad` varchar(100) NOT NULL,
  PRIMARY KEY (`id_c`),
  KEY `fk_cronograma_menu_administrador1_idx` (`CURP`),
  CONSTRAINT `fk_cronograma_menu_administrador1` FOREIGN KEY (`CURP`) REFERENCES `administrador` (`CURP`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cronograma_menu`
--

LOCK TABLES `cronograma_menu` WRITE;
/*!40000 ALTER TABLE `cronograma_menu` DISABLE KEYS */;
INSERT INTO `cronograma_menu` VALUES (1,'2017-08-06','ADMIN1234','DESAYUNO'),(2,'2017-08-06','ADMIN1234','COMIDA'),(3,'2017-08-07','ADMIN1234','DESAYUNO'),(4,'2017-08-08','ADMIN1234','DESAYUNO'),(5,'2017-08-08','ADMIN1234','DESAYUNO'),(6,'2017-08-09','ADMIN1234','DESAYUNO'),(7,'2017-08-10','ADMIN1234','DESAYUNO'),(8,'2017-08-09','ADMIN1234','DESAYUNO');
/*!40000 ALTER TABLE `cronograma_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_cronograma`
--

DROP TABLE IF EXISTS `detalle_cronograma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_cronograma` (
  `ID_DETALLE` int(11) NOT NULL AUTO_INCREMENT,
  `id_c` int(11) NOT NULL,
  `id_alimento` int(11) NOT NULL,
  PRIMARY KEY (`ID_DETALLE`),
  KEY `fk_DETALLE_CRONOGRAMA_cronograma_menu1_idx` (`id_c`),
  KEY `fk_DETALLE_CRONOGRAMA_alimentos1_idx` (`id_alimento`),
  CONSTRAINT `fk_DETALLE_CRONOGRAMA_alimentos1` FOREIGN KEY (`id_alimento`) REFERENCES `alimentos` (`id_alimento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DETALLE_CRONOGRAMA_cronograma_menu1` FOREIGN KEY (`id_c`) REFERENCES `cronograma_menu` (`id_c`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_cronograma`
--

LOCK TABLES `detalle_cronograma` WRITE;
/*!40000 ALTER TABLE `detalle_cronograma` DISABLE KEYS */;
INSERT INTO `detalle_cronograma` VALUES (1,1,1),(2,1,2),(3,2,7),(4,2,3),(5,2,5),(6,3,1),(7,3,2),(8,3,5),(10,4,3),(11,4,5),(12,4,1),(13,5,1),(14,5,5),(15,6,1),(16,6,2),(17,6,3),(18,6,7),(19,7,2),(20,7,1),(21,8,1),(22,8,2);
/*!40000 ALTER TABLE `detalle_cronograma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nino`
--

DROP TABLE IF EXISTS `nino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nino` (
  `CURP` varchar(20) NOT NULL,
  `grupo` varchar(45) NOT NULL,
  `tutor_CURP` varchar(20) NOT NULL,
  `grado` varchar(410) NOT NULL,
  PRIMARY KEY (`CURP`),
  KEY `fk_nino_persona1_idx` (`CURP`),
  KEY `fk_nino_tutor1_idx` (`tutor_CURP`),
  CONSTRAINT `fk_nino_persona1` FOREIGN KEY (`CURP`) REFERENCES `persona` (`CURP`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_nino_tutor1` FOREIGN KEY (`tutor_CURP`) REFERENCES `tutor` (`CURP`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nino`
--

LOCK TABLES `nino` WRITE;
/*!40000 ALTER TABLE `nino` DISABLE KEYS */;
INSERT INTO `nino` VALUES ('ARTURITO1234','A','ANA1234','1'),('JUANITO1234','A','ANA1234','1'),('KEVIN1234','A','ANA1234','3'),('PEDRITO1234','A','ANA1234','2');
/*!40000 ALTER TABLE `nino` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `CURP` varchar(20) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `paterno` varchar(45) NOT NULL,
  `materno` varchar(45) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`CURP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES ('ADMIN1234','ADMINISTRADOR','ADMINISTRADOR','ADMINISTRADOR','4b793-antonio.jpg'),('ANA1234','ANA','FRANK','JAMES','916cf-2dc93-3025b-ana.jpg'),('ARTURITO1234','ARTURITO','RÍOS','SOTO','96a14-507cb-nina3.jpg'),('HOUSE1234','HOUSE','JAMES','','a6817-205ea-doctor_house.jpg'),('JUANITO1234','JUANITO','JAMES','BROWN','56299-5a071-52ce3-nina2.jpg'),('KEVIN1234','KEVIN','GORDILLO','PORTILLO','24d02-d5509-nino1.jpg'),('PEDRITO1234','PEDRITO','GARCÍA','SÁNCHEZ','c5bfb-06f68-nino2.jpg');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutor`
--

DROP TABLE IF EXISTS `tutor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tutor` (
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `CURP` varchar(20) NOT NULL,
  PRIMARY KEY (`CURP`),
  KEY `fk_tutor_persona1_idx` (`CURP`),
  CONSTRAINT `fk_tutor_persona1` FOREIGN KEY (`CURP`) REFERENCES `persona` (`CURP`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutor`
--

LOCK TABLES `tutor` WRITE;
/*!40000 ALTER TABLE `tutor` DISABLE KEYS */;
INSERT INTO `tutor` VALUES ('ANA','ANA','ANA1234');
/*!40000 ALTER TABLE `tutor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-08 19:25:30
