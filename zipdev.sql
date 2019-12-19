CREATE DATABASE  IF NOT EXISTS `zipdev` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `zipdev`;
-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: nflfamilia.fun    Database: zipdev
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.16.04.2

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
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `surnames` varchar(255) NOT NULL,
  `photo` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'test','Gadot','http://localhost:8000/images/91ZaCSPdqIL._SY550_.jpg','2019-12-18 18:46:16','2019-12-19 00:29:39'),(3,'john','rambo','http://localhost:8000/images/91ZaCSPdqIL._SY550_.jpg','2019-12-18 19:05:36','2019-12-18 23:18:38'),(4,'john','rambo',NULL,'2019-12-18 19:11:26','2019-12-18 19:11:26'),(5,'john','rambo',NULL,'2019-12-18 19:12:14','2019-12-18 19:12:14'),(6,'john','rambo',NULL,'2019-12-18 19:14:07','2019-12-18 19:14:07'),(7,'john','rambo',NULL,'2019-12-18 19:14:17','2019-12-18 19:14:17'),(8,'john','rambo',NULL,'2019-12-18 19:18:52','2019-12-18 19:18:52'),(9,'john','rambo',NULL,'2019-12-18 19:20:09','2019-12-18 19:20:09'),(11,'john','rambo',NULL,'2019-12-18 19:22:26','2019-12-18 19:22:26'),(12,'john','rambo',NULL,'2019-12-18 19:23:39','2019-12-18 19:23:39'),(13,'john','rambo',NULL,'2019-12-18 19:23:51','2019-12-18 19:23:51'),(14,'john','rambo',NULL,'2019-12-18 19:26:47','2019-12-18 19:26:47'),(16,'john','rambo',NULL,'2019-12-18 19:56:41','2019-12-18 19:56:41'),(17,'john','rambo',NULL,'2019-12-18 20:57:27','2019-12-18 20:57:27'),(18,'john','rambo',NULL,'2019-12-18 20:58:01','2019-12-18 20:58:01'),(19,'john','rambo',NULL,'2019-12-18 20:59:06','2019-12-18 20:59:06'),(20,'john','rambo',NULL,'2019-12-18 21:00:13','2019-12-18 21:00:13'),(21,'john','rambo',NULL,'2019-12-18 21:00:53','2019-12-18 21:00:53'),(23,'john','rambo',NULL,'2019-12-18 21:16:33','2019-12-18 21:16:33'),(24,'john','rambo',NULL,'2019-12-18 22:19:27','2019-12-18 22:19:27'),(25,'Gal','Gadot','http://localhost:8000images/2018-07-21 11.44.15.jpg','2019-12-18 22:59:43','2019-12-18 22:59:43'),(26,'Gal','Gadot','http://localhost:8000images/2018-07-21 11.44.15.jpg','2019-12-18 23:01:27','2019-12-18 23:01:27'),(27,'Gal','Gadot','http://localhost:8000/images/2018-07-21 11.44.15.jpg','2019-12-18 23:02:31','2019-12-18 23:02:31'),(28,'Gal','Gadot','http://localhost:8000/images/2018-07-21 11.44.15.jpg','2019-12-18 23:07:10','2019-12-18 23:07:10'),(29,'Gal','Gadot','http://localhost:8000/images/2018-07-21 11.44.15.jpg','2019-12-18 23:07:39','2019-12-18 23:07:39'),(30,'Gal','Gadot','http://localhost:8000/images/2018-07-21 11.44.15.jpg','2019-12-19 00:17:47','2019-12-19 00:17:47'),(32,'john','rambo',NULL,'2019-12-19 00:24:05','2019-12-19 00:24:05'),(33,'john','rambo',NULL,'2019-12-19 00:26:40','2019-12-19 00:26:40'),(34,'john','rambo',NULL,'2019-12-19 00:26:50','2019-12-19 00:26:50'),(35,'john','rambo',NULL,'2019-12-19 00:27:13','2019-12-19 00:27:13'),(36,'Gal','Gadot','http://localhost:8000/images/2018-07-21 11.44.15.jpg','2019-12-19 00:27:24','2019-12-19 00:27:24'),(37,'Gal','Gadot','http://localhost:8000/images/2018-07-21 11.44.15.jpg','2019-12-19 00:27:46','2019-12-19 00:27:46');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emails` (
  `id_email` int(11) NOT NULL AUTO_INCREMENT,
  `contacts_id_contact` int(11) NOT NULL,
  `email` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_email`),
  KEY `contact_key_idx` (`contacts_id_contact`),
  CONSTRAINT `contact_email_key` FOREIGN KEY (`contacts_id_contact`) REFERENCES `contacts` (`id_contact`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emails`
--

LOCK TABLES `emails` WRITE;
/*!40000 ALTER TABLE `emails` DISABLE KEYS */;
INSERT INTO `emails` VALUES (4,23,'Fred@test.com','2019-12-18 21:37:50','2019-12-18 21:37:50'),(5,24,'johnRambo@test.com','2019-12-18 22:19:28','2019-12-18 22:19:28'),(6,35,'johnRamcccbo@test.com','2019-12-19 00:27:14','2019-12-19 00:27:14'),(7,37,'test@test.com','2019-12-19 00:27:47','2019-12-19 00:27:47');
/*!40000 ALTER TABLE `emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phone_numbers`
--

DROP TABLE IF EXISTS `phone_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phone_numbers` (
  `id_phone_number` int(11) NOT NULL AUTO_INCREMENT,
  `contacts_id_contact` int(11) NOT NULL,
  `number` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_phone_number`),
  KEY `contact_phone_key_idx` (`contacts_id_contact`),
  CONSTRAINT `contact_phone_key` FOREIGN KEY (`contacts_id_contact`) REFERENCES `contacts` (`id_contact`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phone_numbers`
--

LOCK TABLES `phone_numbers` WRITE;
/*!40000 ALTER TABLE `phone_numbers` DISABLE KEYS */;
INSERT INTO `phone_numbers` VALUES (6,23,'123456789','2019-12-18 21:16:34','2019-12-18 21:16:34'),(8,24,'123456789','2019-12-18 22:19:28','2019-12-18 22:19:28'),(9,29,'1234555555','2019-12-18 23:07:40','2019-12-18 23:07:40'),(10,30,'1234555555','2019-12-19 00:17:47','2019-12-19 00:17:47'),(12,32,'12345678009','2019-12-19 00:24:05','2019-12-19 00:24:05'),(13,35,'12345678009','2019-12-19 00:27:13','2019-12-19 00:27:13'),(14,36,'1234555555','2019-12-19 00:27:24','2019-12-19 00:27:24'),(15,37,'1234555555','2019-12-19 00:27:46','2019-12-19 00:27:46'),(16,23,'12345678','2019-12-19 00:29:17','2019-12-19 00:29:17');
/*!40000 ALTER TABLE `phone_numbers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-18 18:36:46
