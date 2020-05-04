-- MySQL dump 10.13  Distrib 5.6.47, for Linux (x86_64)
--
-- Host: localhost    Database: postar
-- ------------------------------------------------------
-- Server version	5.6.47

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
-- Table structure for table `auts`
--

DROP TABLE IF EXISTS `auts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auts` (
  `ids` int(10) unsigned NOT NULL,
  `nameSurname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ids`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auts`
--

LOCK TABLES `auts` WRITE;
/*!40000 ALTER TABLE `auts` DISABLE KEYS */;
INSERT INTO `auts` VALUES (1,'Andreja Vidovic','2020-05-04 14:52:17',NULL);
/*!40000 ALTER TABLE `auts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bils`
--

DROP TABLE IF EXISTS `bils`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bils` (
  `ids` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postCodeName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxNumber` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ids`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bils`
--

LOCK TABLES `bils` WRITE;
/*!40000 ALTER TABLE `bils` DISABLE KEYS */;
INSERT INTO `bils` VALUES (1,'Andreja','Vidovic','Pri jezu 6','2000 Maribor',123456789,'2020-05-04 14:52:17',NULL);
/*!40000 ALTER TABLE `bils` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `erps`
--

DROP TABLE IF EXISTS `erps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `erps` (
  `ids` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nameSurname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postCode` int(11) NOT NULL,
  `taxNumber` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ids`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `erps`
--

LOCK TABLES `erps` WRITE;
/*!40000 ALTER TABLE `erps` DISABLE KEYS */;
/*!40000 ALTER TABLE `erps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postar_log`
--

DROP TABLE IF EXISTS `postar_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postar_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `system` varchar(50) DEFAULT '0',
  `ids` int(11) DEFAULT '0',
  `name` varchar(50) DEFAULT '0',
  `surname` varchar(50) DEFAULT '0',
  `address` varchar(50) DEFAULT '0',
  `postCode` int(11) DEFAULT '0',
  `postName` varchar(50) DEFAULT '0',
  `taxNumber` int(11) DEFAULT '0',
  `phone` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postar_log`
--

LOCK TABLES `postar_log` WRITE;
/*!40000 ALTER TABLE `postar_log` DISABLE KEYS */;
INSERT INTO `postar_log` VALUES (18,'ERP',1,'Andreja','Vidovic','Pri jezu 6',2000,'Maribor',123456789,31346765,'2020-05-04 14:52:16');
/*!40000 ALTER TABLE `postar_log` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-04 16:54:05
