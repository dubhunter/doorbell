-- MySQL dump 10.13  Distrib 5.5.29, for osx10.8 (i386)
--
-- Host: localhost    Database: doorbell
-- ------------------------------------------------------
-- Server version	5.5.29

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
-- Table structure for table `access_code_subscribers`
--

DROP TABLE IF EXISTS `access_code_subscribers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access_code_subscribers` (
  `access_code_subscriber_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `access_code_id` bigint(20) NOT NULL,
  `subscriber_id` bigint(20) NOT NULL,
  PRIMARY KEY (`access_code_subscriber_id`),
  UNIQUE KEY `access_code_subscriber_id` (`access_code_subscriber_id`) USING BTREE,
  KEY `access_code_id` (`access_code_id`),
  KEY `subscriber_id` (`subscriber_id`),
  CONSTRAINT `access_code_fk` FOREIGN KEY (`access_code_id`) REFERENCES `access_codes` (`access_code_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subscriber_fk` FOREIGN KEY (`subscriber_id`) REFERENCES `subscribers` (`subscriber_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_code_subscribers`
--

LOCK TABLES `access_code_subscribers` WRITE;
/*!40000 ALTER TABLE `access_code_subscribers` DISABLE KEYS */;
/*!40000 ALTER TABLE `access_code_subscribers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `access_codes`
--

DROP TABLE IF EXISTS `access_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access_codes` (
  `access_code_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `code` varchar(4) NOT NULL,
  `valid_from` datetime NOT NULL,
  `valid_to` datetime NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`access_code_id`),
  UNIQUE KEY `access_code_id` (`access_code_id`) USING BTREE,
  UNIQUE KEY `code` (`code`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_codes`
--

LOCK TABLES `access_codes` WRITE;
/*!40000 ALTER TABLE `access_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `access_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `access_logs`
--

DROP TABLE IF EXISTS `access_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access_logs` (
  `access_log_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `access_code_id` bigint(20) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`access_log_id`),
  UNIQUE KEY `access_log_id` (`access_log_id`) USING BTREE,
  KEY `access_code_id` (`access_code_id`),
  CONSTRAINT `access_code_fk2` FOREIGN KEY (`access_code_id`) REFERENCES `access_codes` (`access_code_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_logs`
--

LOCK TABLES `access_logs` WRITE;
/*!40000 ALTER TABLE `access_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `access_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operators`
--

DROP TABLE IF EXISTS `operators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operators` (
  `operator_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`operator_id`),
  UNIQUE KEY `operator_id` (`operator_id`) USING BTREE,
  UNIQUE KEY `name` (`name`) USING BTREE,
  UNIQUE KEY `phone` (`phone`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operators`
--

LOCK TABLES `operators` WRITE;
/*!40000 ALTER TABLE `operators` DISABLE KEYS */;
/*!40000 ALTER TABLE `operators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscribers` (
  `subscriber_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`subscriber_id`),
  UNIQUE KEY `subscriber_id` (`subscriber_id`) USING BTREE,
  UNIQUE KEY `name` (`name`) USING BTREE,
  UNIQUE KEY `phone` (`phone`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribers`
--

LOCK TABLES `subscribers` WRITE;
/*!40000 ALTER TABLE `subscribers` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscribers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-10-31 22:36:56
