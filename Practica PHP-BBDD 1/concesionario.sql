-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: concesionario
-- ------------------------------------------------------
-- Server version	8.0.17

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
-- Table structure for table `alquileres`
--

DROP TABLE IF EXISTS `alquileres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alquileres` (
  `id_alquiler` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) unsigned DEFAULT NULL,
  `id_coche` int(10) unsigned DEFAULT NULL,
  `prestado` datetime DEFAULT NULL,
  `devuelto` datetime DEFAULT NULL,
  PRIMARY KEY (`id_alquiler`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alquileres`
--

LOCK TABLES `alquileres` WRITE;
/*!40000 ALTER TABLE `alquileres` DISABLE KEYS */;
INSERT INTO `alquileres` VALUES (2,5,23,'2024-12-09 00:00:00',NULL),(3,3,24,'2024-12-09 00:00:00','2025-02-27 00:00:00'),(4,3,20,'2023-10-29 00:00:00','2024-07-10 00:00:00'),(5,4,20,'2024-12-09 00:00:00','2025-01-10 00:00:00'),(6,3,23,'2022-08-28 00:00:00','2022-11-30 00:00:00'),(7,3,23,'2022-08-28 00:00:00','2022-11-30 00:00:00');
/*!40000 ALTER TABLE `alquileres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coches`
--

DROP TABLE IF EXISTS `coches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coches` (
  `id_coche` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `modelo` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `alquilado` tinyint(1) DEFAULT NULL,
  `foto` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_coche`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coches`
--

LOCK TABLES `coches` WRITE;
/*!40000 ALTER TABLE `coches` DISABLE KEYS */;
INSERT INTO `coches` VALUES (18,'clio','renault','blanco',8400,0,'../fotos/Captura de pantalla 2024-12-03 132805.png'),(19,'megane','renault','naranja',4000,0,'../fotos/Captura de pantalla 2024-12-03 133353.png'),(20,'308','peugeot','gris',6050,0,'../fotos/Captura de pantalla 2024-12-03 133614.png'),(21,'ibiza','seat','blanco',12400,0,'../fotos/Captura de pantalla 2024-12-03 134038.png'),(22,'c3','citroen','blanco',6000,0,'../fotos/Captura de pantalla 2024-12-03 134642.png'),(23,'rio','kia','rojo',9700,1,'../fotos/Captura de pantalla 2024-12-03 135034.png'),(24,'corolla','toyota','naranja',14700,1,'../fotos/Captura de pantalla 2024-12-03 135340.png'),(25,'a3','audi','verde',18900,1,'../fotos/Captura de pantalla 2024-12-03 135442.png');
/*!40000 ALTER TABLE `coches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(100) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `saldo` float DEFAULT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (15,'$2y$10$cz3cElB.IPaCHM9Obi8iv.B6jXnbxkCJ7fanKR8VS0L3Fvei7p8zm','ismael','lamarti','11864529W',9283,0),(16,'$2y$10$2m/LL4FfUcxarR8ueWodrOGknBbbSOgzDOI5TMV3Ns7L5LfF3RNRW','pepe','rojas','50319669Q',20000,1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-21 13:57:12
