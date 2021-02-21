-- MySQL dump 10.16  Distrib 10.2.36-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: dentos
-- ------------------------------------------------------
-- Server version	10.2.36-MariaDB

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
-- Table structure for table `ad`
--

DROP TABLE IF EXISTS `ad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ad` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `adti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adtd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_pincode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_cnt` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_area` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_picb` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_picc` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_picd` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_pice` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` int(10) unsigned DEFAULT NULL,
  `approved_by_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `ad_cat_id` int(10) DEFAULT NULL,
  `ad_scat_id` int(10) DEFAULT NULL,
  `qty` decimal(10,0) DEFAULT NULL,
  `step` int(2) DEFAULT NULL,
  `ad_price` decimal(18,0) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `aview` int(15) DEFAULT 0,
  `asaved` int(15) DEFAULT 0,
  `ip` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `astep` int(5) DEFAULT 0,
  `bstep` int(5) DEFAULT 0,
  `cstep` int(5) DEFAULT 0,
  `dstep` int(5) DEFAULT 0,
  `adprog` int(10) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `11` (`created_by_id`),
  CONSTRAINT `11` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ad`
--

LOCK TABLES `ad` WRITE;
/*!40000 ALTER TABLE `ad` DISABLE KEYS */;
INSERT INTO `ad` VALUES (74,'Rock Baby','New life','88','887','New','goa','Haryana','121004',NULL,NULL,NULL,'3-a-ad-1608796535.jpg','3-b-ad-1608806838.jpg','3-c-ad-1608806838.jpg','3-d-ad-1608806838.gif','3-e-ad-1608807020.jpg','Approve',3,NULL,'2020-12-24 02:22:26','2021-01-08 05:51:50',NULL,1,8,33,5,2000,'2021-01-08',0,0,'127.0.0.1',1,1,4,2,100),(75,'Jina','sikha','77','88','Refurbished','faridabad','Haryana','121004',NULL,NULL,NULL,'3-a-ad-1608810198.jpg','3-b-ad-1608810078.jpg','3-c-ad-1608810198.jpg','3-d-ad-1608810198.jpg','3-e-ad-1608810198.jpg','Approve',3,NULL,'2020-12-24 05:34:52','2021-01-08 05:51:53',NULL,1,8,77,5,989,'2021-01-08',0,1,'127.0.0.1',1,1,2,1,100),(76,'Usb scanner','Jio phone','28.44','77.464','New','Faridabad','Haryana','121004',NULL,NULL,NULL,'3-a-ad-1610114890.jpg','3-b-ad-1610114890.jpg','3-c-ad-1610114890.jpg','3-d-ad-1610114890.jpg','3-e-ad-1610114890.jpg','Approve',3,NULL,'2021-01-08 08:35:43','2021-01-16 07:46:14',NULL,1,8,77,5,5000,'2021-01-26',2,1,'127.0.0.1',1,1,1,1,100),(77,'Awsome Ad','Sise and beadth and height','28.7777','77.8888','New','faridabad','Haryana','121004',NULL,NULL,NULL,'3-a-ad-1610438952.jpg','3-b-ad-1610438952.jpg','3-c-ad-1610438952.jpg','3-d-ad-1610438952.jpg','3-e-ad-1610438952.jpg','Approve',3,NULL,'2021-01-12 02:34:38','2021-01-16 07:45:41',NULL,1,8,22,5,989,'2021-01-27',1,0,'127.0.0.1',1,1,1,1,100),(78,'Jio phone','Maker free world','28.44','77.464','New','Faridabad','Haryana','121004',NULL,NULL,NULL,'3-a-ad-1610440245.jpg','3-b-ad-1610440245.jpg','3-c-ad-1610440245.jpg','3-d-ad-1610440245.jpg','3-e-ad-1610440245.png','Pending',3,NULL,'2021-01-12 02:56:57','2021-01-12 03:01:13',NULL,1,8,33,5,4000,NULL,0,0,'127.0.0.1',1,1,1,1,100),(79,'Multani Product','hold ti bal','28.7777','77.8888','New','Gld','KGF2','121004',NULL,NULL,NULL,'3-a-ad-1610514581.jpg','3-b-ad-1610514581.jpg','3-c-ad-1610514581.JPG','3-d-ad-1610514581.gif','3-e-ad-1610514581.jpg','Pending',3,NULL,'2021-01-12 23:36:50','2021-01-12 23:39:49',NULL,1,8,556,5,999,NULL,0,0,'127.0.0.1',1,1,1,1,100),(80,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'UNFINISHED',1,NULL,'2021-01-14 07:41:26','2021-01-14 07:41:26',NULL,1,8,NULL,1,NULL,NULL,0,0,NULL,0,0,0,0,20),(81,'Test Title','Hi this is a Test title to check the parameters for API.','77.216721','28.644800','New','New Delhi','Delhi','110023',NULL,NULL,NULL,'4-a-ad-1612720705.jpeg',NULL,NULL,NULL,NULL,'Pending',4,NULL,'2021-02-07 06:13:16','2021-02-07 12:30:05',NULL,1,8,12,5,2300,NULL,0,0,'122.176.29.149',2,2,2,1,80),(82,'Test Title2','Hi This is a Test Title 2','77.216721','28.644800',NULL,'Indirapuram','Uttar Pradesh','110004',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'UNFINISHED',4,NULL,'2021-02-07 12:21:42','2021-02-07 12:31:40',NULL,3,7,NULL,2,NULL,NULL,0,0,NULL,1,0,0,0,40),(83,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'UNFINISHED',4,NULL,'2021-02-07 12:43:10','2021-02-07 12:43:10',NULL,1,1,NULL,1,NULL,NULL,0,0,NULL,0,0,0,0,0),(84,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'UNFINISHED',3,NULL,'2021-02-07 23:43:08','2021-02-07 23:43:08',NULL,1,2,NULL,1,NULL,NULL,0,0,NULL,0,0,0,0,0);
/*!40000 ALTER TABLE `ad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ad_cat`
--

DROP TABLE IF EXISTS `ad_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ad_cat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_fk_335007` (`created_by_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ad_cat`
--

LOCK TABLES `ad_cat` WRITE;
/*!40000 ALTER TABLE `ad_cat` DISABLE KEYS */;
INSERT INTO `ad_cat` VALUES (1,'Clinic On Sale','2020-09-14 02:37:54','2020-09-14 02:37:54',NULL,1),(2,'Covid free','2020-09-14 02:40:33','2020-09-14 02:49:22',NULL,1),(3,'Equipments','2020-09-14 04:12:32','2020-09-14 04:12:32',NULL,1),(4,'Instruments','2020-09-14 04:12:46','2020-09-14 04:12:46',NULL,1),(5,'Implants','2020-09-14 04:12:53','2020-09-14 04:12:53',NULL,1),(6,'Corona Safety','2020-09-14 04:13:21','2020-09-14 04:13:21',NULL,1),(7,'Laboratory','2020-09-14 04:13:27','2020-09-14 04:13:27',NULL,1),(8,'Sterilization','2020-09-14 04:13:38','2020-09-14 04:13:38',NULL,1),(9,'Consumables','2020-09-14 04:13:46','2020-09-14 04:13:46',NULL,1),(10,'Books','2020-09-14 04:13:50','2020-09-14 04:13:50',NULL,1),(11,'Furniture','2020-09-15 23:01:05','2020-09-15 23:01:05',NULL,1);
/*!40000 ALTER TABLE `ad_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ad_entity`
--

DROP TABLE IF EXISTS `ad_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ad_entity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_fk_335007` (`created_by_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ad_entity`
--

LOCK TABLES `ad_entity` WRITE;
/*!40000 ALTER TABLE `ad_entity` DISABLE KEYS */;
INSERT INTO `ad_entity` VALUES (1,'Individual','2020-12-22 07:16:26','2020-12-22 07:16:26',NULL,1),(2,'LLP','2020-12-22 07:16:56','2020-12-22 07:16:56',NULL,1),(3,'ZOom','2020-12-22 07:17:25','2020-12-22 07:17:29','2020-12-22 07:17:29',1);
/*!40000 ALTER TABLE `ad_entity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ad_saved`
--

DROP TABLE IF EXISTS `ad_saved`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ad_saved` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` int(10) unsigned DEFAULT NULL,
  `ad_id` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_fk_335007` (`created_by_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ad_saved`
--

LOCK TABLES `ad_saved` WRITE;
/*!40000 ALTER TABLE `ad_saved` DISABLE KEYS */;
INSERT INTO `ad_saved` VALUES (35,'2021-01-08 05:51:47','2021-01-08 05:51:50','2021-01-08 05:51:50',3,74),(36,'2021-01-08 05:51:53','2021-01-08 05:51:53',NULL,3,75),(37,'2021-01-16 07:40:08','2021-01-16 07:40:08',NULL,3,76);
/*!40000 ALTER TABLE `ad_saved` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ad_subcat`
--

DROP TABLE IF EXISTS `ad_subcat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ad_subcat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` int(10) unsigned DEFAULT NULL,
  `ad_cat_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_fk_335007` (`created_by_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ad_subcat`
--

LOCK TABLES `ad_subcat` WRITE;
/*!40000 ALTER TABLE `ad_subcat` DISABLE KEYS */;
INSERT INTO `ad_subcat` VALUES (7,'Mobile Accessories','2020-09-15 23:05:24','2020-09-15 23:05:24',NULL,1,3),(8,'Dental Clinic','2020-09-15 23:05:40','2020-09-15 23:05:40',NULL,1,1),(9,'Furnished','2020-10-21 02:44:36','2020-10-21 02:44:36',NULL,5,1);
/*!40000 ALTER TABLE `ad_subcat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbranch_company`
--

DROP TABLE IF EXISTS `cbranch_company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cbranch_company` (
  `company_id` int(10) unsigned DEFAULT NULL,
  `cbranch_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbranch_company`
--

LOCK TABLES `cbranch_company` WRITE;
/*!40000 ALTER TABLE `cbranch_company` DISABLE KEYS */;
INSERT INTO `cbranch_company` VALUES (23,5),(23,6),(23,7),(23,8),(24,5),(24,6),(24,7),(24,8),(25,5),(25,6),(25,7),(25,8),(26,5),(26,6),(26,7),(26,8),(27,5),(27,6),(27,7),(27,8),(28,5),(29,5),(30,5),(31,5),(32,5),(32,6),(32,7),(32,8),(33,5),(33,6),(33,7),(33,8),(34,5),(34,6),(34,7),(34,8),(35,5),(35,6),(35,7),(35,8),(36,5),(36,6),(36,7),(36,8),(37,6),(37,7),(37,8),(38,5),(38,6),(39,5),(39,6),(40,5),(40,7),(41,5),(41,7),(42,5),(42,7),(43,5),(43,7),(44,5),(44,7),(45,5),(45,7),(46,5),(46,6),(46,7),(46,8),(47,5),(47,6),(47,7),(47,8),(48,5),(48,6),(48,7),(48,8),(49,5),(49,6),(49,7),(49,8),(50,6),(50,7),(53,5),(53,7);
/*!40000 ALTER TABLE `cbranch_company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbranch_job`
--

DROP TABLE IF EXISTS `cbranch_job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cbranch_job` (
  `job_id` int(10) unsigned DEFAULT NULL,
  `cbranch_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbranch_job`
--

LOCK TABLES `cbranch_job` WRITE;
/*!40000 ALTER TABLE `cbranch_job` DISABLE KEYS */;
INSERT INTO `cbranch_job` VALUES (49,5),(49,6),(49,7),(49,8),(50,5),(50,6),(50,7),(50,8),(51,5),(51,6),(52,6),(52,7),(53,6),(53,7),(54,6),(54,8),(55,7),(56,6),(59,5),(59,7),(60,7),(60,8),(61,5),(61,6),(61,7),(61,8),(62,6),(62,7);
/*!40000 ALTER TABLE `cbranch_job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cbranchs`
--

DROP TABLE IF EXISTS `cbranchs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cbranchs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_fk_335007` (`created_by_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cbranchs`
--

LOCK TABLES `cbranchs` WRITE;
/*!40000 ALTER TABLE `cbranchs` DISABLE KEYS */;
INSERT INTO `cbranchs` VALUES (5,'Delhi','2020-10-19 07:03:19','2020-10-19 07:03:19',NULL,1),(6,'Uttrakhand','2020-10-19 07:03:30','2020-10-19 07:03:30',NULL,1),(7,'Haryana','2020-10-19 07:03:48','2020-10-19 07:03:48',NULL,1),(8,'Himachal','2020-10-19 07:04:21','2020-10-19 07:04:21',NULL,1);
/*!40000 ALTER TABLE `cbranchs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` int(10) unsigned NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,3,NULL,'Hi Dev',5,'App\\Follow','2020-12-30 00:11:52','2020-12-30 00:11:52'),(2,4,1,'Welcome Dev',5,'App\\Follow','2020-12-30 00:12:25','2020-12-30 00:12:25'),(3,3,2,'Thank Youo',5,'App\\Follow','2020-12-30 00:28:06','2020-12-30 00:28:06'),(4,4,2,'Hi no recieve',5,'App\\Follow','2020-12-30 00:30:56','2020-12-30 00:30:56'),(5,3,1,'Hold It',5,'App\\Follow','2020-12-30 00:31:43','2020-12-30 00:31:43'),(6,3,2,'hi user 3',5,'App\\Follow','2020-12-30 00:48:43','2020-12-30 00:48:43'),(7,3,NULL,'Hi',14,'App\\Follow','2021-01-08 05:47:48','2021-01-08 05:47:48'),(8,3,NULL,'Thank you',15,'App\\Follow','2021-01-08 05:48:10','2021-01-08 05:48:10'),(9,3,8,'Moj aa gi h',15,'App\\Follow','2021-01-08 05:48:47','2021-01-08 05:48:47');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companys`
--

DROP TABLE IF EXISTS `companys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companys` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `cmname` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `gst` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pincode` int(15) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `alt_no` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `created_by_id` int(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `cpname` varchar(100) DEFAULT NULL,
  `pan_nmbr` varchar(20) DEFAULT NULL,
  `inco_cert` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companys`
--

LOCK TABLES `companys` WRITE;
/*!40000 ALTER TABLE `companys` DISABLE KEYS */;
INSERT INTO `companys` VALUES (23,'Genuine','image-1608802492.jpg','SGSGGS86A','delhi',121004,'haryana','India','8877667880',NULL,'Gk@mail.com',3,'2020-10-20 03:11:12','2020-12-24 04:04:52',NULL,'ddv',NULL,'uvajcert-1603183272.jpg'),(24,'Matrix','defaultcl.jpg','ZXCVB6886','Mohna',121004,'Haryana','India','8989898980','98989898980','dtw@mail.com',1,'2020-10-20 03:19:04','2020-10-20 03:19:04',NULL,'Uva','VCXXZ65f','defaultci.jpg'),(25,'Tron','uvaclogo-1603184037.jpg','FGDF65GHH','Goohira',121004,'Haryana','Inia','98989898980','6556565555','dk@mail.com',1,'2020-10-20 03:23:57','2020-10-20 03:23:57',NULL,'DDv','ZXCV76454','uvacert-1603184037.jpg'),(26,'Transformer','uvajlogo-1603184587.jpg',NULL,NULL,NULL,NULL,NULL,'99880980009',NULL,'fake@mail.com',1,'2020-10-20 03:33:07','2020-10-20 03:33:07',NULL,'ddvu',NULL,'uvajert-1603184587.png'),(27,'Digital media','uvajlogo-1603185474.jpg',NULL,NULL,NULL,NULL,NULL,'8877669089',NULL,'hiop@mai.com',1,'2020-10-20 03:47:54','2020-10-20 03:47:54',NULL,'Jend',NULL,'uvajert-1603185474.jpg'),(28,'Test','uvajlogo-1603185966.png',NULL,NULL,NULL,NULL,NULL,'9898989898',NULL,'test@test.com',1,'2020-10-20 03:56:06','2020-10-20 03:56:06',NULL,'Test PErson',NULL,'uvajert-1603185966.png'),(29,'Test','uvajlogo-1603185991.png',NULL,NULL,NULL,NULL,NULL,'9898989898',NULL,'test@test.com',1,'2020-10-20 03:56:31','2020-10-20 03:56:31',NULL,'Test PErson',NULL,'uvajert-1603185991.png'),(30,'Test','uvajlogo-1603186088.png',NULL,NULL,NULL,NULL,NULL,'9898989898',NULL,'test@test.com',1,'2020-10-20 03:58:08','2020-10-20 03:58:08',NULL,'Test PErson',NULL,'uvajert-1603186088.png'),(31,'Test','uvajlogo-1603186429.png',NULL,NULL,NULL,NULL,NULL,'9898989898',NULL,'Test@test.com',1,'2020-10-20 04:03:49','2020-10-20 04:03:49',NULL,'jitesh',NULL,'uvajert-1603186429.png'),(32,'Cdac','uvajlogo-1603186506.jpg',NULL,NULL,NULL,NULL,NULL,'9998886776',NULL,'yell@mail.com',1,'2020-10-20 04:05:06','2020-10-20 04:05:06',NULL,'DDvh','zxcvGF','uvajert-1603186506.jpg'),(33,'lSI','uvajlogo-1603186669.jpg',NULL,NULL,NULL,NULL,NULL,'8901575891',NULL,'BOMA@MAIIL.COM',1,'2020-10-20 04:07:49','2020-10-20 04:07:49',NULL,'ddv','78787889889','uvajert-1603186669.JPG'),(34,'lSI','uvajlogo-1603186725.jpg',NULL,NULL,NULL,NULL,NULL,'8901575891',NULL,'BOMA@MAIIL.COM',1,'2020-10-20 04:08:45','2020-10-20 04:08:45',NULL,'ddv','78787889889','uvajert-1603186725.JPG'),(35,'lSI','uvajlogo-1603187841.jpg',NULL,NULL,NULL,NULL,NULL,'8901575891',NULL,'BOMA@MAIIL.COM',1,'2020-10-20 04:27:21','2020-10-20 04:27:21',NULL,'ddv','78787889889','uvajert-1603187841.JPG'),(36,'luck','uvajlogo-1603188375.gif',NULL,NULL,NULL,NULL,NULL,'887766554',NULL,'likj@mail.com',1,'2020-10-20 04:36:15','2020-10-20 04:36:15',NULL,'dcfss','887799007','uvajert-1603188375.gif'),(37,'Dreatas','uvajlogo-1603260653.jpg',NULL,NULL,NULL,NULL,NULL,'8898880909',NULL,'deat@gmail.com',1,'2020-10-21 00:40:53','2020-10-21 00:40:53',NULL,'ddvu','868956789','uvajert-1603260653.jpg'),(38,'Kingman','uvajlogo-1603717275.jpg',NULL,NULL,NULL,NULL,NULL,'8901575891',NULL,'inb@mail.com',1,'2020-10-26 07:31:15','2020-10-26 07:31:15',NULL,'pinta','ZXCCB544','uvajert-1603717275.jpg'),(39,'Kingman','defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'8901575891',NULL,'inb@mail.com',1,'2020-10-26 07:32:51','2020-10-26 07:32:51',NULL,'pinta','ZXCCB544','defaultji.jpg'),(40,'Matrix','defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'8989898980',NULL,'dtw@mail.com',1,'2020-10-29 05:34:44','2020-10-29 05:34:44',NULL,'Uva','VCXXZ65f','defaultji.jpg'),(41,'Matrix','defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'8989898980',NULL,'dtw@mail.com',1,'2020-10-29 05:35:16','2020-10-29 05:35:16',NULL,'Uva','VCXXZ65f','defaultji.jpg'),(42,'Matrix','defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'8989898980',NULL,'dtw@mail.com',1,'2020-10-29 05:35:32','2020-10-29 05:35:32',NULL,'Uva','VCXXZ65f','defaultji.jpg'),(43,'Matrix','defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'8989898980',NULL,'dtw@mail.com',1,'2020-10-29 05:35:52','2020-10-29 05:35:52',NULL,'Uva','VCXXZ65f','defaultji.jpg'),(44,'DK','uvajlogo-1603969683.jpg',NULL,NULL,NULL,NULL,NULL,'9898989898',NULL,'dk@uvatechnology.com',1,'2020-10-29 05:38:03','2020-10-29 05:38:03',NULL,'JM','DL01928219190','uvajert-1603969683.JPG'),(45,'Deepak is my Name','uvajlogo-1603970023.png',NULL,NULL,NULL,NULL,NULL,'9898989898',NULL,'deep@deep.com',1,'2020-10-29 05:43:43','2020-10-29 05:43:43',NULL,'JM','07DL1232231223','uvajert-1603970023.png'),(46,'ters','uvajlogo-1603970131.jpg',NULL,NULL,NULL,NULL,NULL,'467848897',NULL,'ghfjghfjhgfjgh',1,'2020-10-29 05:45:31','2020-10-29 05:45:31',NULL,'sder','SDFFGGGG767','uvajert-1603970131.jpg'),(47,'ters','defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'467848897',NULL,'ghfjghfjhgfjgh',1,'2020-10-29 05:46:32','2020-10-29 05:46:32',NULL,'sder','SDFFGGGG767','defaultji.jpg'),(48,'IBM','uvajlogo-1604147813.jpg',NULL,NULL,NULL,NULL,NULL,'987897990',NULL,'fake@mail.com',1,'2020-10-31 07:06:53','2020-10-31 07:06:53',NULL,'DDV','ZXCVB123','uvajert-1604147813.jpg'),(49,'Gmanh','uvajlogo-1604147920.jpg',NULL,NULL,NULL,NULL,NULL,'9088887889',NULL,'bnam@mail.com',1,'2020-10-31 07:08:40','2020-10-31 07:08:40',NULL,'DDV','ZXCV546','uvajert-1604147920.jpg'),(50,'Dreatas','defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'8898880909',NULL,'deat@gmail.com',1,'2020-11-11 00:25:19','2020-11-11 00:25:19',NULL,'ddvu','868956789','defaultji.jpg'),(51,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,'2021-01-05 00:42:09','2021-01-05 00:42:09',NULL,NULL,NULL,'defaultji.jpg'),(52,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,'2021-01-05 00:44:16','2021-01-05 00:44:16',NULL,NULL,NULL,'defaultji.jpg'),(53,'Goldan King','uvajlogo-1609828209.JPG',NULL,NULL,NULL,NULL,NULL,'9886655689',NULL,'gk@mail.com',3,'2021-01-05 01:00:09','2021-01-05 01:00:09',NULL,'Raman Yadav',NULL,'uvajert-1609828209.jpg'),(54,'DBBD Company','uvajlogo-1612772981.jpg',NULL,NULL,NULL,NULL,NULL,'business no',NULL,'business email',3,'2021-02-08 02:59:41','2021-02-08 02:59:41',NULL,'Contact Person business',NULL,'uvajert-1612772981.jpg'),(55,NULL,'uvajlogo-1612781419.png',NULL,NULL,NULL,NULL,NULL,'9798798978',NULL,'user33@mail.com',4,'2021-02-08 05:20:19','2021-02-08 05:20:19',NULL,'Business Person',NULL,'uvajert-1612781419.png'),(56,NULL,'uvajlogo-1612781448.png',NULL,NULL,NULL,NULL,NULL,'9798798978',NULL,'user33@mail.com',4,'2021-02-08 05:20:48','2021-02-08 05:20:48',NULL,'Business Person',NULL,'uvajert-1612781448.png'),(57,NULL,'uvajlogo-1612782386.png',NULL,NULL,NULL,NULL,NULL,'9798798978',NULL,'user33@mail.com',4,'2021-02-08 05:36:26','2021-02-08 05:36:26',NULL,'Business Person',NULL,'uvajert-1612782386.png'),(58,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'8877669089',NULL,'hiop@mai.com',4,'2021-02-09 00:25:32','2021-02-09 00:25:32',NULL,'Jend',NULL,'defaultji.jpg'),(59,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'8901575891',NULL,'inb@mail.com',4,'2021-02-09 01:37:54','2021-02-09 01:37:54',NULL,'pinta',NULL,'defaultji.jpg'),(60,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'9886655689',NULL,'gk@mail.com',4,'2021-02-09 01:43:45','2021-02-09 01:43:45',NULL,'Raman Yadav',NULL,'defaultji.jpg'),(61,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'9898989898',NULL,'deep@deep.com',4,'2021-02-09 01:45:45','2021-02-09 01:45:45',NULL,'JM',NULL,'defaultji.jpg'),(62,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'9088887889',NULL,'bnam@mail.com',4,'2021-02-09 01:47:50','2021-02-09 01:47:50',NULL,'DDV',NULL,'defaultji.jpg'),(63,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'business no',NULL,'business email',4,'2021-02-09 01:49:58','2021-02-09 01:49:58',NULL,'Contact Person business',NULL,'defaultji.jpg'),(64,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'business no',NULL,'business email',4,'2021-02-09 02:28:23','2021-02-09 02:28:23',NULL,'Contact Person business',NULL,'defaultji.jpg'),(65,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'9898989898',NULL,'deep@deep.com',4,'2021-02-13 04:02:37','2021-02-13 04:02:37',NULL,'JM',NULL,'defaultji.jpg'),(66,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'9798798978',NULL,'user33@mail.com',4,'2021-02-15 01:56:19','2021-02-15 01:56:19',NULL,'Business Person',NULL,'defaultji.jpg'),(67,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'8877669089',NULL,'hiop@mai.com',4,'2021-02-15 05:31:48','2021-02-15 05:31:48',NULL,'Jend',NULL,'defaultji.jpg'),(68,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'9898989898',NULL,'deep@deep.com',4,'2021-02-15 06:30:36','2021-02-15 06:30:36',NULL,'JM',NULL,'defaultji.jpg'),(69,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'9898989898',NULL,'deep@deep.com',4,'2021-02-15 06:30:59','2021-02-15 06:30:59',NULL,'JM',NULL,'defaultji.jpg'),(70,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'9898989898',NULL,'deep@deep.com',4,'2021-02-15 06:38:19','2021-02-15 06:38:19',NULL,'JM',NULL,'defaultji.jpg'),(71,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'9898989898',NULL,'deep@deep.com',4,'2021-02-15 06:38:37','2021-02-15 06:38:37',NULL,'JM',NULL,'defaultji.jpg'),(72,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'9798798978',NULL,'user33@mail.com',4,'2021-02-16 03:29:10','2021-02-16 03:29:10',NULL,'Business Person',NULL,'defaultji.jpg'),(73,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'9798798978',NULL,'user33@mail.com',4,'2021-02-16 03:29:31','2021-02-16 03:29:31',NULL,'Business Person',NULL,'defaultji.jpg'),(74,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'9898989898',NULL,'deep@deep.com',4,'2021-02-16 03:30:36','2021-02-16 03:30:36',NULL,'JM',NULL,'defaultji.jpg'),(75,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'9898989898',NULL,'deep@deep.com',4,'2021-02-16 03:31:25','2021-02-16 03:31:25',NULL,'JM',NULL,'defaultji.jpg'),(76,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'9898989898',NULL,'deep@deep.com',4,'2021-02-16 03:34:02','2021-02-16 03:34:02',NULL,'JM',NULL,'defaultji.jpg'),(77,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'business no',NULL,'business email',4,'2021-02-16 03:34:49','2021-02-16 03:34:49',NULL,'Contact Person business',NULL,'defaultji.jpg'),(78,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'8877669089',NULL,'hiop@mai.com',4,'2021-02-16 03:37:39','2021-02-16 03:37:39',NULL,'Jend',NULL,'defaultji.jpg'),(79,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'8877669089',NULL,'hiop@mai.com',4,'2021-02-16 03:44:03','2021-02-16 03:44:03',NULL,'Jend',NULL,'defaultji.jpg'),(80,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'9088887889',NULL,'bnam@mail.com',4,'2021-02-16 03:45:04','2021-02-16 03:45:04',NULL,'DDV',NULL,'defaultji.jpg'),(81,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'9898989898',NULL,'deep@deep.com',4,'2021-02-16 03:46:10','2021-02-16 03:46:10',NULL,'JM',NULL,'defaultji.jpg'),(82,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'8901575891',NULL,'inb@mail.com',4,'2021-02-16 03:48:05','2021-02-16 03:48:05',NULL,'pinta',NULL,'defaultji.jpg'),(83,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'9898989898',NULL,'deep@deep.com',4,'2021-02-16 04:26:20','2021-02-16 04:26:20',NULL,'JM',NULL,'defaultji.jpg'),(84,NULL,'defaultjl.jpg',NULL,NULL,NULL,NULL,NULL,'9798798978',NULL,'user33@mail.com',4,'2021-02-16 04:26:38','2021-02-16 04:26:38',NULL,'Business Person',NULL,'defaultji.jpg');
/*!40000 ALTER TABLE `companys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `degree_job`
--

DROP TABLE IF EXISTS `degree_job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `degree_job` (
  `job_id` int(10) unsigned DEFAULT NULL,
  `degree_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `degree_job`
--

LOCK TABLES `degree_job` WRITE;
/*!40000 ALTER TABLE `degree_job` DISABLE KEYS */;
INSERT INTO `degree_job` VALUES (49,6),(49,7),(49,8),(50,6),(50,7),(50,8),(51,6),(51,7),(54,6),(54,7),(55,6),(55,7),(55,8),(56,7),(57,6),(57,8),(58,7),(59,7),(60,7),(61,7),(62,6),(63,7),(66,7),(69,7),(178,7);
/*!40000 ALTER TABLE `degree_job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `degrees`
--

DROP TABLE IF EXISTS `degrees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `degrees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_fk_335007` (`created_by_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `degrees`
--

LOCK TABLES `degrees` WRITE;
/*!40000 ALTER TABLE `degrees` DISABLE KEYS */;
INSERT INTO `degrees` VALUES (6,'B. Tech','2020-10-22 23:34:47','2020-10-22 23:34:47',NULL,1),(7,'M.Tech','2020-10-22 23:34:56','2020-10-22 23:34:56',NULL,1),(8,'M.sc','2020-10-22 23:36:48','2020-10-22 23:36:48',NULL,1);
/*!40000 ALTER TABLE `degrees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `educations`
--

DROP TABLE IF EXISTS `educations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `educations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` int(10) unsigned DEFAULT NULL,
  `degree_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_no` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `get_no` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_from` date DEFAULT NULL,
  `e_to` date DEFAULT NULL,
  `college` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fos` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uplace` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ugrade` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `udesc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xtra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_fk_335007` (`created_by_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educations`
--

LOCK TABLES `educations` WRITE;
/*!40000 ALTER TABLE `educations` DISABLE KEYS */;
INSERT INTO `educations` VALUES (15,'2020-11-06 07:01:23','2021-01-14 05:48:02','2021-01-14 05:48:02',3,'B.Tech','9999','8888','2020-11-06','2020-11-07','GOD College','World Science','Earth','A','Fine','Goal'),(16,'2020-11-06 07:04:11','2020-11-06 07:04:11',NULL,3,'Mtech','9897889','77887','2020-11-06','2020-11-07','MVN','Jeography','Palwal','A','HI','Gree'),(17,'2020-11-06 08:59:56','2020-11-06 08:59:56',NULL,2,'MCA','500','475','2013-07-19','2016-07-15','IP University','Master','Delhi','A','dumy','all rounder'),(18,'2020-11-10 23:30:44','2020-11-10 23:30:44',NULL,4,'MCA','400','340','2013-07-04','2016-06-08','IPU','Computer Science','Delhi','A','All Rounder','All Rounder'),(19,'2020-11-19 04:57:09','2020-11-19 05:45:42','2020-11-19 05:45:42',3,'Api Edu Update','9876','432','2020-11-06','2020-11-07','Api college','Api Method','Api World','A+','Excellent','extra'),(20,'2020-12-04 07:02:23','2021-01-08 05:50:53','2021-01-08 05:50:53',3,'apitestr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,'2020-12-04 07:08:50','2021-01-08 05:51:00','2021-01-08 05:51:00',3,'gghghgj',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,'2020-12-04 07:12:56','2021-01-08 05:51:07','2021-01-08 05:51:07',3,'golg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,'2020-12-04 07:20:42','2021-01-14 05:55:15',NULL,28,'bba',NULL,NULL,'2000-09-01','2003-07-31','GSBA','Computer Science','Delhi',NULL,NULL,NULL),(24,'2020-12-04 07:22:39','2021-01-14 05:41:17','2021-01-14 05:41:17',28,'bbc',NULL,NULL,NULL,NULL,'ip','marketing','new Delhi','a','dummy','all rounder'),(25,'2020-12-04 07:30:51','2020-12-04 07:30:51',NULL,28,'mba',NULL,NULL,'2013-12-04','2016-12-04','Ip University','master','new delhi','a','dummy','all rounder'),(26,'2020-12-04 07:31:30','2020-12-04 07:31:30',NULL,28,'mbac',NULL,NULL,'2013-12-04','2016-12-04','Ip University','master','new delhi','a','dummy','all rounder'),(27,'2020-12-04 07:41:36','2020-12-04 07:41:36',NULL,28,'bcom',NULL,NULL,'2015-12-04','2016-12-04','ip University','pass','new delhi','a','dummy','android'),(28,'2020-12-04 07:43:07','2020-12-04 07:43:07',NULL,28,'bcom pass',NULL,NULL,'2020-12-04','2020-12-04','ipuni','pass','delhi','a','a','a'),(29,'2020-12-04 09:09:24','2020-12-04 09:09:24',NULL,28,'BBA BNI',NULL,NULL,'2013-07-10','2016-06-16','Ip University','Banking and Insurance','New Delhi','A+','hi this is a dummy education detail.','Socialist'),(30,'2020-12-05 00:47:43','2020-12-05 00:47:43',NULL,28,'bni',NULL,NULL,'2016-12-05','2019-12-05','ipuniversity','banking n insurance','new delhi','a','dummy','all rounder'),(31,'2020-12-05 01:10:59','2020-12-05 01:10:59',NULL,29,'mma',NULL,NULL,'2015-12-05','2019-12-05','ipu','mma','delhi','a','dummy','activityy'),(32,'2020-12-05 02:16:26','2020-12-05 02:16:26',NULL,29,'testing',NULL,NULL,'2017-12-31','2019-12-05','tesring','testing','location','a','dummy','activity'),(33,'2020-12-05 02:35:00','2020-12-05 02:35:00',NULL,29,'uuu',NULL,NULL,'2014-12-05','2014-12-05','uuu','uuu','uuu','t','isko Urdu','tyt'),(34,'2020-12-05 02:37:03','2020-12-05 02:37:03',NULL,29,'Otto',NULL,NULL,'2016-12-05','2016-12-05','I felt','clicg','truth','hi','likh dude','brig'),(35,'2020-12-05 02:44:02','2020-12-05 02:44:02',NULL,29,'bcompass',NULL,NULL,'2016-12-05','2019-12-05','delhi university','bcompass','new delhi','A+','hello','activity'),(36,'2020-12-05 03:23:50','2020-12-05 03:23:50',NULL,29,'testuniversity',NULL,NULL,'2015-12-05','2019-12-05','test University','testuniversity','delhi','a','dummy','activity'),(37,'2020-12-19 04:51:32','2020-12-19 04:51:32',NULL,3,'mba',NULL,NULL,'2009-12-01','2013-12-19','Indraprastha University','masters ofeducation','new delhi','a','tesr','Al rounder'),(38,'2020-12-22 01:37:52','2020-12-22 01:37:52',NULL,28,'bca',NULL,NULL,'2009-12-22','2013-12-22','Indraprastha','computer','new delhi','a','test','all roundrr'),(39,'2020-12-22 13:58:49','2020-12-22 13:58:49',NULL,5,'BIS (H)',NULL,NULL,'1999-10-01','2003-06-30','GSBA','Computer Science','New Delhi',NULL,NULL,NULL);
/*!40000 ALTER TABLE `educations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense_categories`
--

DROP TABLE IF EXISTS `expense_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_fk_335006` (`created_by_id`),
  CONSTRAINT `created_by_fk_335006` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_categories`
--

LOCK TABLES `expense_categories` WRITE;
/*!40000 ALTER TABLE `expense_categories` DISABLE KEYS */;
INSERT INTO `expense_categories` VALUES (1,'user2categ','2020-12-29 02:57:13','2020-12-29 02:57:13',NULL,3);
/*!40000 ALTER TABLE `expense_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entry_date` date DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `expense_category_id` int(10) unsigned DEFAULT NULL,
  `created_by_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expense_category_fk_334989` (`expense_category_id`),
  KEY `created_by_fk_335008` (`created_by_id`),
  CONSTRAINT `created_by_fk_335008` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`),
  CONSTRAINT `expense_category_fk_334989` FOREIGN KEY (`expense_category_id`) REFERENCES `expense_categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
INSERT INTO `expenses` VALUES (1,'2020-12-30',222.00,'free','2020-12-29 02:58:52','2020-12-29 02:58:52',NULL,1,3);
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `experiances`
--

DROP TABLE IF EXISTS `experiances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experiances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` int(10) unsigned DEFAULT NULL,
  `exp_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etitle` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmp_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmp_loc` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_job` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estart` date DEFAULT NULL,
  `exend` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_fk_335007` (`created_by_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experiances`
--

LOCK TABLES `experiances` WRITE;
/*!40000 ALTER TABLE `experiances` DISABLE KEYS */;
INSERT INTO `experiances` VALUES (1,'2021-02-06 23:55:15','2021-02-06 23:55:15',NULL,2,'Fresher',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'2021-02-06 23:55:15','2021-02-06 23:55:15',NULL,2,'Intern',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'2021-02-06 23:55:15','2021-02-06 23:55:15',NULL,2,'Fresher',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `experiances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `follows`
--

DROP TABLE IF EXISTS `follows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `follows` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `so_title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_imge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_imgd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_imgc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_imgb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_imga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` int(10) unsigned DEFAULT NULL,
  `approved_by_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `so_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_step` int(2) DEFAULT NULL,
  `ev_view` int(20) DEFAULT 0,
  `ip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_like` int(20) DEFAULT 0,
  `so_exp_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `11` (`created_by_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follows`
--

LOCK TABLES `follows` WRITE;
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;
INSERT INTO `follows` VALUES (2,'Test','tahghghsgahgkhgka','Love,Erangel,PUbg','3-e-follow-1608287538.jpg','3-d-follow-1608287329.jpg','3-c-follow-1608287329.jpg','3-b-follow-1608287693.jpg','3-a-follow-1608287329.jpg',3,NULL,'2020-12-17 04:49:34','2020-12-22 00:04:09',NULL,'Pending',3,0,'127.0.0.1',1,NULL),(3,'Dtestr','Hld It','Good for man,last air bender','3-e-follow-1608372967.jpg','3-d-follow-1608372967.jpg','3-c-follow-1608372967.jpg','3-b-follow-1608372967.jpg','3-a-follow-1608372967.jpg',3,NULL,'2020-12-17 05:02:26','2020-12-22 00:04:52',NULL,'Pending',3,0,'127.0.0.1',0,NULL),(4,'det','test','gyuiop,hiop','3-e-follow-1608726073.jpg','3-d-follow-1608726073.jpg','3-c-follow-1608726073.jpg','3-b-follow-1608726073.jpg','3-a-follow-1608726073.jpg',3,NULL,'2020-12-23 06:50:20','2021-01-08 01:12:56',NULL,'Pending',3,0,'127.0.0.1',0,NULL),(5,'Test December','Test december','#test #myfirsttest #mytestdecember','3-e-follow-1608726080.jpeg','3-d-follow-1608726080.jpeg','3-c-follow-1608726080.jpeg','3-b-follow-1608726080.jpeg','3-a-follow-1608726080.jpeg',3,NULL,'2020-12-23 06:50:24','2021-01-08 01:29:15',NULL,'Pending',3,0,'127.0.0.1',0,NULL),(6,'New Year Post','Jonsheen Video','dev Kuar,video','3-e-follow-1609741032.jpg','3-d-follow-1609741032.jpg','3-c-follow-1609741032.jpg','3-b-follow-1609741032.jpg','3-a-follow-1609740706.mp4',3,NULL,'2020-12-31 06:43:08','2021-01-04 00:47:24',NULL,'Pending',3,0,'127.0.0.1',0,NULL),(7,'Tags Completed','Love is Life','video,Good for man','3-e-follow-1609924122.jpg','3-d-follow-1609924122.jpg','3-c-follow-1609924122.JPG','3-b-follow-1609924122.jpg','3-a-follow-1609924122.jpg',3,NULL,'2021-01-06 03:37:25','2021-01-06 03:38:53',NULL,'Pending',3,0,'127.0.0.1',0,NULL),(8,'Travling','A New Gernoy','video','3-e-follow-1610096537.jpg','3-d-follow-1610096537.jpg','3-c-follow-1610096537.jpg','3-b-follow-1610096537.jpg','3-a-follow-1610096537.jpg',3,NULL,'2021-01-08 03:31:00','2021-01-08 03:32:24',NULL,'Pending',3,0,'127.0.0.1',0,NULL),(9,'Dev Kumr','jon','Video','3-e-follow-1610097745.jpg','3-d-follow-1610097745.JPG','3-c-follow-1610097745.jpg','3-b-follow-1610097745.jpg','3-a-follow-1610097745.jpg',3,NULL,'2021-01-08 03:51:40','2021-01-08 03:53:18',NULL,'Pending',3,0,'127.0.0.1',0,NULL),(10,'Jin','makers','video','3-e-follow-1610098134.gif','3-d-follow-1610098134.jpg','3-c-follow-1610098134.jpg','3-b-follow-1610098134.jpg','3-a-follow-1610098134.jpg',3,NULL,'2021-01-08 03:58:19','2021-01-08 05:02:49',NULL,'Pending',3,0,'127.0.0.1',0,NULL),(11,'M phi bhii','tumko chaunga','love,dil','3-e-follow-1610102474.jpg','3-d-follow-1610102474.gif','3-c-follow-1610102474.jpg','3-b-follow-1610102474.jpg','3-a-follow-1610102474.JPG',3,NULL,'2021-01-08 05:10:34','2021-01-08 05:11:52',NULL,'Pending',3,0,'127.0.0.1',0,NULL),(12,'Chahat','pe naraj','video','3-e-follow-1610103167.jpg','3-d-follow-1610103167.jpg','3-c-follow-1610103167.jpg','3-b-follow-1610103167.jpg','3-a-follow-1610103167.jpg',3,NULL,'2021-01-08 05:22:09','2021-01-08 05:22:59',NULL,'Pending',3,0,'127.0.0.1',0,NULL),(13,'Solid','Body','Ajay','3-e-follow-1610103617.jpg','3-d-follow-1610103617.jpg','3-c-follow-1610103617.jpg','3-b-follow-1610103617.jpg','3-a-follow-1610103617.jpg',3,NULL,'2021-01-08 05:29:36','2021-01-08 05:34:06',NULL,'Pending',3,0,'127.0.0.1',0,NULL),(14,'Dev','Love You','Video','3-e-follow-1610104201.jpg','3-d-follow-1610104201.jpg','3-c-follow-1610104201.jpg','3-b-follow-1610104201.jpg','3-a-follow-1610104201.jpg',3,NULL,'2021-01-08 05:37:21','2021-01-08 05:40:18',NULL,'Pending',3,0,'127.0.0.1',0,NULL),(15,'Aankh h','Hold','Video',NULL,'3-d-follow-1610104404.jpg','3-c-follow-1610104404.jpg','3-b-follow-1610104404.jpg','3-a-follow-1610104404.jpg',3,1,'2021-01-08 05:42:35','2021-01-18 07:29:20',NULL,'Approve',3,0,'127.0.0.1',0,NULL),(16,'Modular Design','Principal That Make','video','3-e-follow-1610363006.jpg','3-d-follow-1610363006.jpg','3-c-follow-1610363006.jpg','3-b-follow-1610363006.jpg','3-a-follow-1610363006.JPG',3,1,'2021-01-11 05:32:19','2021-01-18 07:25:47',NULL,'Reject',3,0,'127.0.0.1',0,NULL),(17,'Notifications Fixtue','Final Step','video','3-e-follow-1610366410.jpg','3-d-follow-1610366410.jpg','3-c-follow-1610366410.gif','3-b-follow-1610366410.jpg','3-a-follow-1610366410.jpg',3,1,'2021-01-11 06:29:20','2021-01-18 07:24:14',NULL,'Approve',3,0,'127.0.0.1',0,NULL),(18,'Awsome Places','Love You all','Hi babes','3-e-follow-1610367245.jpg','3-d-follow-1610367245.jpg','3-c-follow-1610367245.jpg','3-b-follow-1610367245.jpg','3-a-follow-1610367245.jpg',3,1,'2021-01-11 06:43:17','2021-02-14 07:47:41',NULL,'Approve',3,0,'127.0.0.1',1,NULL);
/*!40000 ALTER TABLE `follows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `income_categories`
--

DROP TABLE IF EXISTS `income_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `income_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_fk_335007` (`created_by_id`),
  CONSTRAINT `created_by_fk_335007` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `income_categories`
--

LOCK TABLES `income_categories` WRITE;
/*!40000 ALTER TABLE `income_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `income_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incomes`
--

DROP TABLE IF EXISTS `incomes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incomes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entry_date` date DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `income_category_id` int(10) unsigned DEFAULT NULL,
  `created_by_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `income_category_fk_334997` (`income_category_id`),
  KEY `created_by_fk_335009` (`created_by_id`),
  CONSTRAINT `created_by_fk_335009` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`),
  CONSTRAINT `income_category_fk_334997` FOREIGN KEY (`income_category_id`) REFERENCES `income_categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incomes`
--

LOCK TABLES `incomes` WRITE;
/*!40000 ALTER TABLE `incomes` DISABLE KEYS */;
INSERT INTO `incomes` VALUES (1,NULL,NULL,NULL,'2020-09-12 06:19:29','2020-09-12 06:19:29',NULL,NULL,NULL),(2,NULL,NULL,NULL,'2020-09-12 06:23:04','2020-09-12 06:23:04',NULL,NULL,NULL);
/*!40000 ALTER TABLE `incomes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ivents`
--

DROP TABLE IF EXISTS `ivents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ivents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ev_mode` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ev_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ev_dura` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ev_start` date DEFAULT NULL,
  `ev_end` date DEFAULT NULL,
  `ev_time` time DEFAULT NULL,
  `ev_endtime` time DEFAULT NULL,
  `ev_venue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ev_city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ev_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ev_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ev_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` int(10) unsigned DEFAULT NULL,
  `approved_by_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `ev_step` int(2) DEFAULT NULL,
  `ev_view` int(20) DEFAULT 0,
  `ev_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ev_exp_date` date DEFAULT NULL,
  `ip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ev_interest` int(20) DEFAULT 0,
  `ev_save` int(20) DEFAULT 0,
  `ev_about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `11` (`created_by_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ivents`
--

LOCK TABLES `ivents` WRITE;
/*!40000 ALTER TABLE `ivents` DISABLE KEYS */;
INSERT INTO `ivents` VALUES (1,'Offline','Bechlor Party','Multi Day','2020-12-08','2020-12-11','00:00:00',NULL,'Near hp Petrol Pump','Delhi',NULL,'3event-1607411439.jpg','Joli',3,1,'2020-12-07 05:58:27','2020-12-15 03:46:40',NULL,3,3,'Approve',NULL,'127.0.0.1',0,0,NULL),(2,'Online','Days Come Back','Single Day','2020-12-09',NULL,'12:30:00',NULL,NULL,NULL,'www.google.com','3event-1607419629.jpg','gamax',3,1,'2020-12-07 06:20:01','2020-12-11 00:17:33',NULL,3,1,'Approve','2020-12-24','127.0.0.1',0,0,NULL),(3,'Online','Jio Planner','Multi Day','2020-12-10','2020-12-11','13:30:00',NULL,NULL,NULL,'www.google.com','1event-1607504790.jpg','yiop',3,1,'2020-12-07 06:26:26','2020-12-15 03:46:13',NULL,3,5,'Approve','2020-12-24','127.0.0.1',0,0,NULL),(4,'Online','Jinax','Single Day','2020-12-16',NULL,'13:14:00',NULL,NULL,NULL,'www.genuine.co.in','1event-1607514113.jpg','Apple',3,1,'2020-12-07 06:32:14','2020-12-31 06:09:37',NULL,3,4,'Approve','2020-12-24','127.0.0.1',0,0,NULL),(5,'Online','Jio Netwrk','Single Day','2020-12-09',NULL,'12:34:00',NULL,NULL,NULL,'www.google.com','1event-1607514149.jpg','Dev Kumar',3,1,'2020-12-07 23:33:55','2020-12-31 06:09:27',NULL,3,20,'Approve','2020-12-24','127.0.0.1',1,0,NULL),(6,'Online','jIo','Single Day','2020-12-09',NULL,'12:22:00',NULL,NULL,NULL,'www.google.com','1event-1607514183.jpg','dev don',3,1,'2020-12-07 23:41:35','2021-01-12 03:32:08',NULL,3,50,'Approve','2020-12-24','127.0.0.1',0,1,NULL),(7,'Online','Bluetooth increment','Single Day','2020-12-11',NULL,'14:12:00',NULL,NULL,NULL,'www.geniune.co','3event-1607686996.jpg','Youtube',3,1,'2020-12-11 06:12:44','2020-12-11 06:14:39',NULL,3,1,'Approve','2020-12-26','127.0.0.1',0,0,'Desert Man following Description'),(8,'Online','Led Bulb Custmization','Single Day','2020-12-15',NULL,'13:22:00',NULL,NULL,NULL,'www.google.com','3event-1607925580.jpg','Dev lover',3,1,'2020-12-14 00:29:11','2020-12-14 00:31:02',NULL,3,1,'Approve','2020-12-29','127.0.0.1',0,0,'Let Get this paty Started'),(9,'Online','Led Bulb','Single Day','2020-12-14',NULL,'12:23:00',NULL,NULL,NULL,'www.google.com','3event-1607926526.jpg','Dser',3,1,'2020-12-14 00:45:09','2020-12-14 00:47:00',NULL,3,1,'Approve','2020-12-29','127.0.0.1',0,0,'About Me'),(10,'Online','Sound Woffer','Single Day','2020-12-15',NULL,'12:33:00',NULL,NULL,NULL,'genuiine.co.in','1event-1607933362.jpg','jon',1,1,'2020-12-14 02:38:52','2020-12-14 02:40:27',NULL,3,1,'Approve','2020-12-29','127.0.0.1',0,0,'maxsct'),(11,'Online','Sound 2','Single Day','2020-12-15',NULL,'14:22:00',NULL,NULL,NULL,'genuine.co.in','1event-1607933557.jpg','Jiom',1,1,'2020-12-14 02:42:22','2020-12-23 02:26:34',NULL,3,3,'Approve','2020-12-29','127.0.0.1',0,0,'maxs'),(12,'Online','Jio Manager','Single Day','2020-12-15',NULL,'14:22:00',NULL,NULL,NULL,'geniune.co.in','3event-1608032202.jpg','DEvelover',3,NULL,'2020-12-15 05:22:13','2020-12-15 07:32:58',NULL,3,1,'Pending',NULL,'127.0.0.1',0,1,NULL),(13,'Both','New Year Party','Multi Day','2020-12-31','2021-01-01','09:00:00','05:00:00','Mohna','faridabad','www.genuine.com','3event-1609414161.gif','Dev',3,1,'2020-12-31 05:58:55','2020-12-31 06:09:09',NULL,3,2,'Approve','2021-01-15','127.0.0.1',0,0,'GooD Best'),(14,'Online','MOBILE TEST','Single Day','2021-01-09',NULL,'19:33:00','14:30:00',NULL,NULL,'www.google.com','3event-1610114683.jpg','Dev',3,NULL,'2021-01-08 08:34:18','2021-01-08 08:35:00',NULL,3,0,'Pending',NULL,'127.0.0.1',0,0,'Misc'),(15,'Online','Dangal','Single Day','2021-01-13',NULL,'21:08:00','07:08:00',NULL,NULL,'www.geniune.co','3event-1610447545.jpg','Dev',3,1,'2021-01-12 05:02:09','2021-01-15 03:11:07',NULL,3,1,'Approve','2021-01-27','127.0.0.1',1,1,'Go Me');
/*!40000 ALTER TABLE `ivents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_cat`
--

DROP TABLE IF EXISTS `job_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_cat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_fk_335007` (`created_by_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_cat`
--

LOCK TABLES `job_cat` WRITE;
/*!40000 ALTER TABLE `job_cat` DISABLE KEYS */;
INSERT INTO `job_cat` VALUES (1,'IT Jobs','2020-09-19 05:09:14','2020-09-19 05:09:14',NULL,1),(2,'Finance','2020-09-19 05:09:26','2020-09-19 05:09:26',NULL,1);
/*!40000 ALTER TABLE `job_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `job_t` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_dsc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jdate` date DEFAULT NULL,
  `jname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jemail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jadd` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` int(10) unsigned DEFAULT NULL,
  `approved_by_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `j_cat_id` int(15) DEFAULT NULL,
  `cmp_id` int(15) DEFAULT NULL,
  `jentity` int(15) DEFAULT NULL,
  `jstep` int(2) DEFAULT NULL,
  `jstatus` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jminsal` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jminexp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jchat` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jvacancy` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jtype` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jseeker` int(15) DEFAULT 0,
  `jview` int(15) DEFAULT 0,
  `jbook` int(15) DEFAULT 0,
  `jexp_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `11` (`created_by_id`)
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (56,'Web Developer','Lets get statred',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,'2020-12-23 05:53:32','2021-01-04 23:48:44',NULL,1,50,2,3,'Pending','5','1 year',NULL,'3','Part Time','127.0.0.1',0,0,0,NULL),(57,'WebTester','mailoco kaluda',NULL,'Dev','9877890980','sio@mail.com',NULL,NULL,NULL,3,NULL,'2021-01-05 00:44:16','2021-01-05 00:47:27',NULL,1,52,1,3,'Pending','6','2 year','1','5','Full Time','127.0.0.1',0,0,0,NULL),(58,'Project Manager','Jiop  tesbhhgkhghvcvcvbcvcvbccgg',NULL,'Dev','9877890980','sio@mail.com','Haryana 121004 India',NULL,NULL,3,NULL,'2021-01-05 00:54:46','2021-01-05 00:56:05',NULL,1,NULL,1,3,'Pending','4','4 year','1','6','Part Time','127.0.0.1',0,0,0,NULL),(59,'Superwiiser','Holdfdfdfdfdfdfdfdfffgfgfgfssaawwqxff',NULL,'Dev','9877890980','sio@mail.com',NULL,NULL,NULL,3,NULL,'2021-01-05 01:00:10','2021-01-19 00:20:50',NULL,2,53,2,3,'Pending','5','2 year','1','7','Part Time','127.0.0.1',1,1,1,NULL),(60,'Php','Developer moj',NULL,'Dev','9877890980','sio@mail.com','Haryana 121004 India',NULL,NULL,3,NULL,'2021-01-08 08:29:36','2021-01-19 00:08:31',NULL,1,37,2,3,'Pending','4','1 year','1','4','Permanent','127.0.0.1',1,2,0,NULL),(61,'MAgento Developer','Magenta description',NULL,'Dev','9877890980','sio@mail.com','Haryana 121004 India',NULL,NULL,3,1,'2021-01-12 00:19:49','2021-01-14 06:00:46',NULL,1,27,2,3,'Approve','2','1 year','1','2','Full Time','127.0.0.1',0,1,0,'2021-01-29'),(62,'Web Manager','Detection of transrction f web',NULL,'Dev','9877890980','sio@mail.com','Haryana 121004 India',NULL,NULL,3,1,'2021-01-12 00:40:37','2021-01-14 04:01:49',NULL,2,27,2,3,'Approve','4','1 year','1','5','Full Time','127.0.0.1',0,0,0,'2021-01-29'),(63,'Web Developer','Mageta integration',NULL,'Dev','9877890980','sio@mail.com','Haryana 121004 India',NULL,NULL,3,NULL,'2021-01-19 02:03:36','2021-01-19 02:04:45',NULL,1,NULL,1,3,'Pending','5','1 year','1','4','Full Time','127.0.0.1',0,0,0,NULL),(64,NULL,NULL,NULL,'user2','78765980','ibm.gov.in','Mohna',NULL,NULL,3,NULL,'2021-02-08 02:18:42','2021-02-08 02:18:42',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(65,NULL,NULL,NULL,'user2','78765980','ibm.gov.in',NULL,NULL,NULL,3,NULL,'2021-02-08 02:55:00','2021-02-08 02:55:00',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(66,'Job Title','Job DESC',NULL,'user2','78765980','ibm.gov.in',NULL,NULL,NULL,3,NULL,'2021-02-08 02:59:41','2021-02-08 04:04:02',NULL,1,54,2,3,'Pending','2','2','1','4','Permanent','106.196.35.74',0,0,0,NULL),(67,NULL,NULL,NULL,'user3','9898989898','user3@mail.com','Punjabi Bagh',NULL,NULL,4,NULL,'2021-02-08 05:15:40','2021-02-08 05:15:40',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(68,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,'2021-02-08 05:20:19','2021-02-08 05:20:19',NULL,1,55,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(69,'My Job title','My First job Description',NULL,'user3','9898989898','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-08 05:20:48','2021-02-08 05:36:38',NULL,1,56,2,2,'UNFINISHED','1200','1400','1','1','Permanent','192.168.2.1',0,0,0,NULL),(70,NULL,NULL,NULL,'user3','9898989898','user3@mail.com','Punjabi Bagh',NULL,NULL,4,NULL,'2021-02-08 05:36:09','2021-02-08 05:36:52',NULL,1,NULL,1,3,'Pending',NULL,NULL,NULL,NULL,NULL,'192.168.2.1',0,0,0,NULL),(71,NULL,NULL,NULL,'user3','9898989898','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-08 05:36:26','2021-02-08 05:36:26',NULL,1,57,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(72,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-08 23:59:52','2021-02-08 23:59:52',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(73,NULL,NULL,NULL,'User3','8877669089','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-09 00:25:32','2021-02-09 00:25:32',NULL,1,58,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(74,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 00:27:30','2021-02-09 00:27:30',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(75,NULL,NULL,NULL,'User3','8901575891','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-09 01:37:54','2021-02-09 01:37:54',NULL,2,59,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(76,NULL,NULL,NULL,'User3','9886655689','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-09 01:43:45','2021-02-09 01:43:45',NULL,2,60,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(77,NULL,NULL,NULL,'User3','9898989898','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-09 01:45:45','2021-02-09 01:45:45',NULL,NULL,61,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(78,NULL,NULL,NULL,'User3','9088887889','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-09 01:47:50','2021-02-09 01:47:50',NULL,1,62,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(79,NULL,NULL,NULL,'User3','business no','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-09 01:49:58','2021-02-09 01:49:58',NULL,NULL,63,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(80,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 02:23:57','2021-02-09 02:23:57',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(81,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 02:24:08','2021-02-09 02:24:08',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(82,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 02:25:55','2021-02-09 02:25:55',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(83,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 02:26:49','2021-02-09 02:26:49',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(84,NULL,NULL,NULL,'User3','business no','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-09 02:28:23','2021-02-09 02:28:23',NULL,1,64,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(85,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 02:29:18','2021-02-09 02:29:18',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(86,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 02:34:02','2021-02-09 02:34:02',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(87,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 02:34:36','2021-02-09 02:34:36',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(88,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 02:40:00','2021-02-09 02:40:00',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(89,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 02:56:47','2021-02-09 02:56:47',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(90,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 02:57:50','2021-02-09 02:57:50',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(91,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 02:58:01','2021-02-09 02:58:01',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(92,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 02:58:49','2021-02-09 02:58:49',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(93,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 02:59:35','2021-02-09 02:59:35',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(94,NULL,NULL,NULL,'Test','9898989898','test@test.com','Delhi',NULL,NULL,1,NULL,'2021-02-09 03:01:28','2021-02-09 03:01:28',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(95,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 03:04:04','2021-02-09 03:04:04',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(96,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 03:05:16','2021-02-09 03:05:16',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(97,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 03:09:50','2021-02-09 03:09:50',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(98,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 03:17:11','2021-02-09 03:17:11',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(99,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 03:22:09','2021-02-09 03:22:09',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(100,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 03:32:13','2021-02-09 03:32:13',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(101,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 03:36:28','2021-02-09 03:36:28',NULL,2,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(102,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 03:42:57','2021-02-09 03:42:57',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(103,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 03:43:09','2021-02-09 03:43:09',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(104,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 03:48:12','2021-02-09 03:48:12',NULL,2,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(105,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 03:59:12','2021-02-09 03:59:12',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(106,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 04:01:41','2021-02-09 04:01:41',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(107,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 04:06:34','2021-02-09 04:06:34',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(108,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 08:34:52','2021-02-09 08:34:52',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(109,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 12:05:21','2021-02-09 12:05:21',NULL,2,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(110,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 12:08:03','2021-02-09 12:08:03',NULL,2,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(111,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-09 12:10:48','2021-02-09 12:10:48',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(112,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 02:01:40','2021-02-13 02:01:40',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(113,NULL,NULL,NULL,'User3','9898989898','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-13 04:02:37','2021-02-13 04:02:37',NULL,NULL,65,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(114,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 13:10:45','2021-02-13 13:10:45',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(115,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 14:01:07','2021-02-13 14:01:07',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(116,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 14:02:21','2021-02-13 14:02:21',NULL,2,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(117,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 14:13:04','2021-02-13 14:13:04',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(118,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 14:13:15','2021-02-13 14:13:15',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(119,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 14:25:53','2021-02-13 14:25:53',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(120,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 14:26:12','2021-02-13 14:26:12',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(121,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 14:28:44','2021-02-13 14:28:44',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(122,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 14:36:34','2021-02-13 14:36:34',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(123,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 14:36:43','2021-02-13 14:36:43',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(124,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 14:41:09','2021-02-13 14:41:09',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(125,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 14:42:07','2021-02-13 14:42:07',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(126,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 14:49:47','2021-02-13 14:49:47',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(127,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 14:49:54','2021-02-13 14:49:54',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(128,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 14:52:16','2021-02-13 14:52:16',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(129,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 14:58:31','2021-02-13 14:58:31',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(130,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 15:00:56','2021-02-13 15:00:56',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(131,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 15:01:54','2021-02-13 15:01:54',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(132,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 15:02:59','2021-02-13 15:02:59',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(133,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 15:11:39','2021-02-13 15:11:39',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(134,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 15:13:13','2021-02-13 15:13:13',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(135,NULL,NULL,NULL,'test','9898989898','test@test.com','delhi',NULL,NULL,1,NULL,'2021-02-13 15:16:38','2021-02-13 15:16:38',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(136,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 15:20:58','2021-02-13 15:20:58',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(137,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 15:31:10','2021-02-13 15:31:10',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(138,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 15:37:56','2021-02-13 15:37:56',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(139,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 15:47:35','2021-02-13 15:47:35',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(140,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 15:47:45','2021-02-13 15:47:45',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(141,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 15:48:49','2021-02-13 15:48:49',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(142,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 15:52:43','2021-02-13 15:52:43',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(143,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 15:55:19','2021-02-13 15:55:19',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(144,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 15:56:13','2021-02-13 15:56:13',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(145,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 16:01:33','2021-02-13 16:01:33',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(146,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 16:02:26','2021-02-13 16:02:26',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(147,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 16:04:23','2021-02-13 16:04:23',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(148,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 16:05:15','2021-02-13 16:05:15',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(149,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 16:05:50','2021-02-13 16:05:50',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(150,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 16:06:22','2021-02-13 16:06:22',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(151,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 16:06:45','2021-02-13 16:06:45',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(152,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 16:16:18','2021-02-13 16:16:18',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(153,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 16:16:29','2021-02-13 16:16:29',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(154,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 16:17:20','2021-02-13 16:17:20',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(155,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 16:38:29','2021-02-13 16:38:29',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(156,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 16:43:04','2021-02-13 16:43:04',NULL,2,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(157,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-13 16:43:51','2021-02-13 16:43:51',NULL,2,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(158,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-14 00:14:51','2021-02-14 00:14:51',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(159,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-14 00:21:25','2021-02-14 00:21:25',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(160,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-14 00:21:37','2021-02-14 00:21:37',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(161,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-14 00:22:16','2021-02-14 00:22:16',NULL,2,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(162,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-14 00:25:22','2021-02-14 00:25:22',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(163,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-14 00:34:36','2021-02-14 00:34:36',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(164,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-14 00:39:55','2021-02-14 00:39:55',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(165,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-14 00:40:03','2021-02-14 00:40:03',NULL,2,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(166,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-14 00:41:48','2021-02-14 00:41:48',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(167,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-14 01:00:13','2021-02-14 01:00:13',NULL,2,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(168,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-14 01:02:44','2021-02-14 01:02:44',NULL,2,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(169,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-14 01:07:25','2021-02-14 01:07:25',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(170,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-14 01:07:45','2021-02-14 01:07:45',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(171,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-14 01:09:03','2021-02-14 01:09:03',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(172,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-14 01:22:18','2021-02-14 01:22:18',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(173,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-14 03:18:34','2021-02-14 03:18:34',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(174,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 01:22:16','2021-02-15 01:22:16',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(175,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 01:41:07','2021-02-15 01:41:07',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(176,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 01:46:59','2021-02-15 01:46:59',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(177,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 01:49:06','2021-02-15 01:49:06',NULL,2,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(178,'My Job title','My First job Description',NULL,'user3','9898989898','user3@mail.com','Punjabi Bagh',NULL,NULL,4,NULL,'2021-02-15 01:55:24','2021-02-15 01:57:28',NULL,1,NULL,1,2,'UNFINISHED','1200','1400','1','1','Permanent',NULL,0,0,0,NULL),(179,NULL,NULL,NULL,'user3','9898989898','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-15 01:56:19','2021-02-15 01:56:19',NULL,1,66,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(180,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 02:21:57','2021-02-15 02:21:57',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(181,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 02:22:24','2021-02-15 02:22:24',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(182,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 02:23:21','2021-02-15 02:23:21',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(183,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 02:38:22','2021-02-15 02:38:22',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(184,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 02:50:23','2021-02-15 02:50:23',NULL,2,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(185,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 02:51:15','2021-02-15 02:51:15',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(186,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 02:51:24','2021-02-15 02:51:24',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(187,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 03:20:21','2021-02-15 03:20:21',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(188,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 03:20:36','2021-02-15 03:20:36',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(189,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 03:22:01','2021-02-15 03:22:01',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(190,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 03:33:26','2021-02-15 03:33:26',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(191,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 03:33:47','2021-02-15 03:33:47',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(192,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 03:34:07','2021-02-15 03:34:07',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(193,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 03:35:26','2021-02-15 03:35:26',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(194,NULL,NULL,NULL,'user3','9898989898','user3@mail.com','Punjabi Bagh',NULL,NULL,4,NULL,'2021-02-15 03:35:49','2021-02-15 03:35:49',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(195,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 03:36:24','2021-02-15 03:36:24',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(196,NULL,NULL,NULL,'user3','9898989898','user3@mail.com','Punjabi Bagh',NULL,NULL,4,NULL,'2021-02-15 03:39:17','2021-02-15 03:39:17',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(197,NULL,NULL,NULL,'user3','9898989898','user3@mail.com','Punjabi Bagh',NULL,NULL,4,NULL,'2021-02-15 03:40:00','2021-02-15 03:40:00',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(198,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 03:40:49','2021-02-15 03:40:49',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(199,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 03:42:20','2021-02-15 03:42:20',NULL,2,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(200,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 03:45:09','2021-02-15 03:45:09',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(201,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 03:47:16','2021-02-15 03:47:16',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(202,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 03:48:43','2021-02-15 03:48:43',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(203,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 03:53:47','2021-02-15 03:53:47',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(204,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 03:57:53','2021-02-15 03:57:53',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(205,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 03:58:07','2021-02-15 03:58:07',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(206,NULL,NULL,NULL,'User3','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 03:59:53','2021-02-15 03:59:53',NULL,NULL,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(207,NULL,NULL,NULL,'User3','8877669089','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-15 05:31:48','2021-02-15 05:31:48',NULL,1,67,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(208,NULL,NULL,NULL,'User3','9898989898','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-15 06:30:36','2021-02-15 06:30:36',NULL,2,68,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(209,NULL,NULL,NULL,'User3','9898989898','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-15 06:30:59','2021-02-15 06:30:59',NULL,2,69,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(210,NULL,NULL,NULL,'User3','9898989898','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-15 06:38:19','2021-02-15 06:38:19',NULL,NULL,70,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(211,NULL,NULL,NULL,'User3','9898989898','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-15 06:38:37','2021-02-15 06:38:37',NULL,2,71,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(212,NULL,NULL,NULL,'IT Jobs','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 09:19:31','2021-02-15 09:19:31',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(213,NULL,NULL,NULL,'IT Jobs','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 09:19:56','2021-02-15 09:19:56',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(214,NULL,NULL,NULL,'IT Jobs','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 09:20:01','2021-02-15 09:20:01',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(215,NULL,NULL,NULL,'IT Jobs','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 09:20:05','2021-02-15 09:20:05',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(216,NULL,NULL,NULL,'IT Jobs','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 09:20:08','2021-02-15 09:20:08',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(217,NULL,NULL,NULL,'IT Jobs','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 09:20:27','2021-02-15 09:20:27',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(218,NULL,NULL,NULL,'IT Jobs','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 09:20:31','2021-02-15 09:20:31',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(219,NULL,NULL,NULL,'IT Jobs','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 09:28:32','2021-02-15 09:28:32',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(220,NULL,NULL,NULL,'IT Jobs','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 09:28:40','2021-02-15 09:28:40',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(221,NULL,NULL,NULL,'IT Jobs','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 09:29:28','2021-02-15 09:29:28',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(222,NULL,NULL,NULL,'IT Jobs','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 09:29:35','2021-02-15 09:29:35',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(223,NULL,NULL,NULL,'IT Jobs','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 09:30:00','2021-02-15 09:30:00',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(224,NULL,NULL,NULL,'IT Jobs','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 09:30:03','2021-02-15 09:30:03',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(225,NULL,NULL,NULL,'IT Jobs','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 09:30:06','2021-02-15 09:30:06',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(226,NULL,NULL,NULL,'IT Jobs','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 09:31:29','2021-02-15 09:31:29',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(227,NULL,NULL,NULL,'IT Jobs','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 09:31:34','2021-02-15 09:31:34',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(228,NULL,NULL,NULL,'IT Jobs','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 09:34:12','2021-02-15 09:34:12',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(229,NULL,NULL,NULL,'IT Jobs','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 09:34:18','2021-02-15 09:34:18',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(230,NULL,NULL,NULL,'IT Jobs',NULL,'user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 09:45:33','2021-02-15 09:45:33',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(231,NULL,NULL,NULL,'IT Jobs',NULL,'user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 09:47:21','2021-02-15 09:47:21',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(232,NULL,NULL,NULL,'IT Jobs',NULL,'user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 09:48:39','2021-02-15 09:48:39',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(233,NULL,NULL,NULL,'IT Jobs','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-15 23:39:17','2021-02-15 23:39:17',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(234,NULL,NULL,NULL,'IT Jobs','9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,4,NULL,'2021-02-16 03:20:40','2021-02-16 03:20:40',NULL,1,NULL,1,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(235,NULL,NULL,NULL,'User3','9798798978','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-16 03:29:11','2021-02-16 03:29:11',NULL,2,72,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(236,NULL,NULL,NULL,'User3','9798798978','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-16 03:29:31','2021-02-16 03:29:31',NULL,2,73,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(237,NULL,NULL,NULL,'User3','9898989898','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-16 03:30:36','2021-02-16 03:30:36',NULL,1,74,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(238,NULL,NULL,NULL,'User3','9898989898','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-16 03:31:25','2021-02-16 03:31:25',NULL,NULL,75,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(239,NULL,NULL,NULL,'User3','9898989898','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-16 03:34:02','2021-02-16 03:34:02',NULL,NULL,76,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(240,NULL,NULL,NULL,'User3','business no','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-16 03:34:49','2021-02-16 03:34:49',NULL,NULL,77,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(241,NULL,NULL,NULL,'User3','8877669089','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-16 03:37:39','2021-02-16 03:37:39',NULL,2,78,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(242,NULL,NULL,NULL,'User3','8877669089','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-16 03:44:03','2021-02-16 03:44:03',NULL,NULL,79,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(243,NULL,NULL,NULL,'User3','9088887889','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-16 03:45:04','2021-02-16 03:45:04',NULL,2,80,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(244,NULL,NULL,NULL,'User3','9898989898','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-16 03:46:10','2021-02-16 03:46:10',NULL,1,81,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(245,NULL,NULL,NULL,'User3','8901575891','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-16 03:48:06','2021-02-16 03:48:06',NULL,2,82,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(246,NULL,NULL,NULL,'User3','9898989898','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-16 04:26:20','2021-02-16 04:26:20',NULL,NULL,83,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL),(247,NULL,NULL,NULL,'User3','9798798978','user3@mail.com',NULL,NULL,NULL,4,NULL,'2021-02-16 04:26:38','2021-02-16 04:26:38',NULL,2,84,2,1,'UNFINISHED',NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2016_06_01_000001_create_oauth_auth_codes_table',1),(3,'2016_06_01_000002_create_oauth_access_tokens_table',1),(4,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(5,'2016_06_01_000004_create_oauth_clients_table',1),(6,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(7,'2019_09_13_000000_create_permissions_table',1),(8,'2019_09_13_000001_create_roles_table',1),(9,'2019_09_13_000002_create_users_table',1),(10,'2019_09_13_000003_create_expense_categories_table',1),(11,'2019_09_13_000004_create_income_categories_table',1),(12,'2019_09_13_000005_create_expenses_table',1),(13,'2019_09_13_000006_create_incomes_table',1),(14,'2019_09_13_000007_create_permission_role_pivot_table',1),(15,'2019_09_13_000008_create_role_user_pivot_table',1),(16,'2019_09_13_000009_add_relationship_fields_to_expense_categories_table',1),(17,'2019_09_13_000010_add_relationship_fields_to_income_categories_table',1),(18,'2019_09_13_000011_add_relationship_fields_to_expenses_table',1),(19,'2019_09_13_000012_add_relationship_fields_to_incomes_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES ('014c4373-2b1a-4d15-a562-1e9643be98a8','App\\Notifications\\MySocialNotification','App\\User',1,'{\"title\":\"New Job Job Title Created\",\"module\":\"http:\\/\\/dev.joinradix.com\\/admin\\/jobs\\/66\\/edit\",\"type\":3,\"user_agent\":\"PostmanRuntime\\/7.26.8\"}',NULL,'2021-02-08 04:04:08','2021-02-08 04:04:08'),('1358f1ff-ebd2-40a6-8220-70c91cc53f4d','App\\Notifications\\MySocialNotification','App\\User',1,'{\"title\":\"New Job My Job title Created\",\"module\":\"http:\\/\\/dev.joinradix.com\\/admin\\/jobs\\/69\\/edit\",\"type\":4,\"user_agent\":\"PostmanRuntime\\/7.26.10\"}',NULL,'2021-02-08 05:30:04','2021-02-08 05:30:04'),('1a0caf35-1f5a-4fb1-aec1-b5a6203d8e8e','App\\Notifications\\MySocialNotification','App\\User',1,'{\"title\":\"New Job  Created\",\"module\":\"http:\\/\\/dev.joinradix.com\\/admin\\/jobs\\/70\\/edit\",\"type\":4,\"user_agent\":\"PostmanRuntime\\/7.26.10\"}',NULL,'2021-02-08 05:36:57','2021-02-08 05:36:57'),('96b0bdef-7b10-4099-bbf4-513b8e96ec1a','App\\Notifications\\MySocialNotification','App\\User',3,'{\"title\":\"Your Event Aankh h Approve\",\"module\":\"http:\\/\\/dev.joinradix.com\\/admin\\/applyfollows\\/index\",\"type\":3,\"user_agent\":\"Mozilla\\/5.0 (Windows NT 6.3; rv:84.0) Gecko\\/20100101 Firefox\\/84.0\"}',NULL,'2021-01-18 07:29:24','2021-01-18 07:29:24'),('ad8779e6-5440-4995-b709-65497fd7516f','App\\Notifications\\MySocialNotification','App\\User',1,'{\"title\":\"New Job Web Developer Created\",\"module\":\"http:\\/\\/dev.joinradix.com\\/admin\\/jobs\\/63\\/edit\",\"type\":3,\"user_agent\":\"Mozilla\\/5.0 (Linux; Android 10; Infinix X680D) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/89.0.4380.6 Mobile Safari\\/537.36\"}',NULL,'2021-01-19 02:04:52','2021-01-19 02:04:52'),('afeb8d59-d696-423d-9bea-bcf37ad58296','App\\Notifications\\MySocialNotification','App\\User',3,'{\"title\":\"Your Event Notifications Fixtue Approve\",\"module\":\"http:\\/\\/dev.joinradix.com\\/admin\\/applyfollows\\/index\",\"type\":3,\"user_agent\":\"Mozilla\\/5.0 (Windows NT 6.3; rv:84.0) Gecko\\/20100101 Firefox\\/84.0\"}',NULL,'2021-01-18 07:25:10','2021-01-18 07:25:10'),('c3d0d5d2-bbf7-41d8-9ed7-5b9a36b73911','App\\Notifications\\MySocialNotification','App\\User',1,'{\"title\":\"New Ad Test Title Created\",\"module\":\"http:\\/\\/dev.joinradix.com\\/admin\\/ads\\/81\\/edit\",\"type\":4,\"user_agent\":\"Mozilla\\/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/88.0.4324.146 Safari\\/537.36\"}',NULL,'2021-02-07 12:30:15','2021-02-07 12:30:15'),('e3291285-36e0-4910-b0eb-8601589d0ab9','App\\Notifications\\MySocialNotification','App\\User',3,'{\"title\":\"Your Event Modular Design Reject\",\"module\":\"http:\\/\\/dev.joinradix.com\\/admin\\/applyfollows\\/index\",\"type\":3,\"user_agent\":\"Mozilla\\/5.0 (Windows NT 6.3; rv:84.0) Gecko\\/20100101 Firefox\\/84.0\"}',NULL,'2021-01-18 07:25:51','2021-01-18 07:25:51');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` VALUES ('0046b2559b4f4bd13326cf7100172bb71a2e54d68e9c34d3d5d30ab87cba7558fdd2c5e0a24819ca',1,1,'authToken','[]',0,'2020-09-21 23:20:58','2020-09-21 23:20:58','2021-09-22 04:50:58'),('012ebd06993bc62413d52b421bfa8b41be5c7ae6363f188b20971cc520b0fdbc8881c750291932e2',5,1,'authToken','[]',0,'2020-12-22 12:31:41','2020-12-22 12:31:41','2021-12-22 18:01:41'),('017878849e2ba691b4d6af42639c7969f59e26997245a737a42d9063fff5e3d8521bc097ab91e1f4',1,1,'authToken','[]',0,'2020-09-21 16:14:12','2020-09-21 16:14:12','2021-09-21 21:44:12'),('0214467dd12cfc449ee68fa7cfeb2da33a9fe8c77bb94b13648d4855ddabfc6ae6b5d9a7410c3707',2,1,'authToken','[]',0,'2021-02-04 11:51:26','2021-02-04 11:51:26','2022-02-04 17:21:26'),('024d8654fce40d24647885f2b46eb170bc8a6d12e60c218a15e361478f17816e2778bd94a0ea2452',13,1,'authToken','[]',0,'2020-11-23 06:16:57','2020-11-23 06:16:57','2021-11-23 11:46:57'),('026543442711ad50ddc0ba6bc3597a147dbddab0832191f7176142b9c3a666fa8836f41b20b85e74',20,1,'authToken','[]',0,'2020-12-02 08:31:44','2020-12-02 08:31:44','2021-12-02 14:01:44'),('027eff9b11b277aec51fc135da3bda61f7ce01dbe8080eecd1c4dafb7ee703ccc0cee4c77a22a0b0',1,1,'authToken','[]',0,'2020-09-23 00:27:17','2020-09-23 00:27:17','2021-09-23 05:57:17'),('02effb36f4a35b260e5850d446d664df0e863f67527abd4e8a3cd9e7004867273deb0a173f098507',5,1,'authToken','[]',0,'2020-12-22 12:46:18','2020-12-22 12:46:18','2021-12-22 18:16:18'),('04316c2282cda6e61e622cc5a07ffc21c55a21e8de24b99d628458d5003fb0e49f5a4721af587dda',4,1,'authToken','[]',0,'2021-02-09 08:34:23','2021-02-09 08:34:23','2022-02-09 14:04:23'),('05ea881c74dc737d45132defbc7b3d843148d028d9117b8ad931a10fa0eccd9cce7fc42e6d0e1444',1,1,'authToken','[]',0,'2020-12-09 04:57:46','2020-12-09 04:57:46','2021-12-09 10:27:46'),('05fdbb9517873f68428bb6c2223df9c2d62e9bc1c64f75ed53b25997c59ac09758a8c2f5d886e1da',1,1,'authToken','[]',0,'2020-09-21 14:17:09','2020-09-21 14:17:09','2021-09-21 19:47:09'),('061a98d8c28688829719900949d38a577d6fe00d71bba1c1a8c428ae8457c5d2c9720fb7f3127ff1',13,1,'authToken','[]',0,'2020-12-04 00:14:16','2020-12-04 00:14:16','2021-12-04 05:44:16'),('063f18c4eaf3bf4e4da43db89d447a573055e260737be16b944d1d1d7e67a956f192920ab4bd3beb',1,1,'authToken','[]',0,'2020-10-31 07:47:52','2020-10-31 07:47:52','2021-10-31 13:17:52'),('06a6a29f3baad3755cc5fb38283d67642dcb288616b27bd6b77a99c0f8981756ee7a3fb5499c4f72',3,1,'authToken','[]',0,'2020-11-23 02:42:31','2020-11-23 02:42:31','2021-11-23 08:12:31'),('06ad8218127af02e70e37a7b7662a27f6b9e8f5eb568ab05396c89211b0b1c5e9f7009c54688bc56',13,1,'authToken','[]',0,'2020-12-04 00:10:50','2020-12-04 00:10:50','2021-12-04 05:40:50'),('075f402224ddaa04e4a45fd2c8fb633cc12494ea89af06f801cbea87b91acb0ce2698ecb8903ff75',4,1,'authToken','[]',0,'2021-02-09 03:05:04','2021-02-09 03:05:04','2022-02-09 08:35:04'),('07d8fd0097ae8b08319ad36846cfa279e6fdd1c5d8faf96739d1a743a745f80f349fb806fffc4687',1,1,'authToken','[]',0,'2020-12-02 07:50:56','2020-12-02 07:50:56','2021-12-02 13:20:56'),('07e0dbb98b19d96ab068cd02147d2d245b37d1db17c03cca5ddd057570eecac83cc1cbda4ccf77a8',3,1,'authToken','[]',0,'2020-11-24 12:24:53','2020-11-24 12:24:53','2021-11-24 17:54:53'),('08ac42236f1496d5e6828c612d6b04aa4eeb38e97b1a86c55e86fd96ddd83e2ab6d5525648eed615',28,1,'authToken','[]',0,'2020-12-04 05:25:04','2020-12-04 05:25:04','2021-12-04 10:55:04'),('092d4f576bad69fbd4387667110062fc8433d8e324c576a21d47a2a1d700eaeb861da52d6944bdc1',1,1,'authToken','[]',0,'2020-12-21 03:36:25','2020-12-21 03:36:25','2021-12-21 09:06:25'),('098a6bdab8260a98c1329b23a05177b549d1e1ed286cfaeafdf8c1ddab4ff09de549608af518c9cb',12,1,'authToken','[]',0,'2020-11-23 06:02:18','2020-11-23 06:02:18','2021-11-23 11:32:18'),('0a6500154714b97a5c6af82483fb9e3bdf1cf64f57c4fdd346dd17defc9f66bff074417b278eb82c',28,1,'authToken','[]',0,'2020-12-04 05:46:33','2020-12-04 05:46:33','2021-12-04 11:16:33'),('0a9e7a0e203c4c58876e64ff238a1d90aebf9061112f2f88b1da4af89a52ad563b42016b4f772063',4,1,'authToken','[]',0,'2021-02-15 06:38:00','2021-02-15 06:38:00','2022-02-15 12:08:00'),('0ac81ab61b6b12089fc41364b6de45ea109dda2d66fa53f892f198814c23ecc742d0716f10a42ec0',2,1,'authToken','[]',0,'2021-02-05 00:08:36','2021-02-05 00:08:36','2022-02-05 05:38:36'),('0b4a552d31c7bcd5e70109e190b4f5af857392a59f959d4bcfca1ec4ba37edc0082d915abb4b3815',29,1,'authToken','[]',0,'2020-12-05 03:13:26','2020-12-05 03:13:26','2021-12-05 08:43:26'),('0d0496778efa036d8c68d1152e9c4fd795383a1c97ec4fa9ca4f19f731f9d6bbafbd3e4787933e7b',1,1,'authToken','[]',0,'2020-09-17 23:54:16','2020-09-17 23:54:16','2021-09-18 05:24:16'),('0d07a839bfbb789456099b29a23de68bec08a0e4a640aeb040e63d56ba92b5bae550cf0e08261abf',19,1,'authToken','[]',0,'2020-12-02 08:23:13','2020-12-02 08:23:13','2021-12-02 13:53:13'),('0d917ec1ed8745355b89938b1113048aa26c584e5ec03c4faf5d4b8b696f0b03bc51494eef6fbfe9',27,1,'authToken','[]',0,'2020-12-04 00:25:55','2020-12-04 00:25:55','2021-12-04 05:55:55'),('0f502d702fad904ecc74398811a47b91e00d7027543d77aa7c662e7bd795051b60a5b171ad12eb43',28,1,'authToken','[]',0,'2020-12-21 09:45:09','2020-12-21 09:45:09','2021-12-21 15:15:09'),('0f7c69ff6dba380daec351a6f8b1c190abc06f71d028c749304ceb75a50164a4221aea69ce102c0c',1,1,'authToken','[]',0,'2021-02-13 03:42:35','2021-02-13 03:42:35','2022-02-13 09:12:35'),('107f450210b45c9e025a845a45d2605a1d07b96bfb59056054342ab2328a2c3d6017705d49a404af',4,1,'authToken','[]',0,'2021-02-08 05:08:43','2021-02-08 05:08:43','2022-02-08 10:38:43'),('1147a172bb8902074eb979d9aeac04c6dec3618e379a237aa41f13d95f9a5cb8c12841b8a5c127e9',28,1,'authToken','[]',0,'2020-12-17 06:06:45','2020-12-17 06:06:45','2021-12-17 11:36:45'),('1188f736594dad4aadf03c7409b0ce65189c8b9cca80a0416417bb95675bc2b492b42018a133a5bf',3,1,'authToken','[]',0,'2020-11-24 12:24:53','2020-11-24 12:24:53','2021-11-24 17:54:53'),('1296235f19bea9169517df29ca38af7da6f016415beaaa8f8c563ae08c3b6beec2539e2f074cafa1',16,1,'authToken','[]',0,'2020-12-02 08:03:42','2020-12-02 08:03:42','2021-12-02 13:33:42'),('134089c5038736aa107815062f7515444ee529025720b5f4cf798e29ae5902e0a64447aa2f7aa97a',1,1,'authToken','[]',0,'2020-11-02 23:02:11','2020-11-02 23:02:11','2021-11-03 04:32:11'),('136251aa52dcfd9cca3a410fce321493bc4876e88e0f92440cad6270e622c6cb338f460fe97a9ff8',4,1,'authToken','[]',0,'2021-02-08 05:35:58','2021-02-08 05:35:58','2022-02-08 11:05:58'),('13be579818ecbd943352f884768929f3164c6a87a1531f8fd7361b38b6c13dfe08f68f9b9ca68787',12,1,'authToken','[]',0,'2020-11-23 05:58:25','2020-11-23 05:58:25','2021-11-23 11:28:25'),('141c8018c759e0ddcba9b0632c491b9333b463d3f50e8aea0674f8b5688402a83240b48dacaf7ecb',4,1,'authToken','[]',0,'2021-02-15 02:51:05','2021-02-15 02:51:05','2022-02-15 08:21:05'),('144e266dfd997cf48a6372b293ffeb69a9966733d41ed9b1119ec272f47266219f0dc92660cf18eb',4,1,'authToken','[]',0,'2021-02-15 09:19:17','2021-02-15 09:19:17','2022-02-15 14:49:17'),('1533fc2fa779e6d02e8ed2e19f7dfccdd04a883bb7874b8e8b5a966a0f41518f0ae7d3c3bcbc0ecf',2,1,'authToken','[]',0,'2020-10-06 13:35:29','2020-10-06 13:35:29','2021-10-06 19:05:29'),('15a9406d79e0a836182d6c764c74adc6e6cb7f8ed7c15b81af8b1c4edd7590fa7a12bc00ce09898f',4,1,'authToken','[]',0,'2021-02-14 00:21:08','2021-02-14 00:21:08','2022-02-14 05:51:08'),('164e6fdea442077423755f3eeec546709977d73f624452c54f251a87604331b89af641ed0975896b',4,1,'authToken','[]',0,'2021-02-07 03:50:22','2021-02-07 03:50:22','2022-02-07 09:20:22'),('17edab4b54d9ab1a88fdc864385c6f3cc3a2a33b4e29144f310314013ed7d6d579db4e01de5fb2e3',1,1,'authToken','[]',0,'2020-09-18 13:21:48','2020-09-18 13:21:48','2021-09-18 18:51:48'),('1829a19df3271239bd86ee8de4a633c43f34b2652f180f159810fd3fbd1316faf8d0d905da792c31',4,1,'authToken','[]',0,'2021-02-15 09:47:07','2021-02-15 09:47:07','2022-02-15 15:17:07'),('184d73dfc03f01f15a7a5d829d807978067ff24027752f4641a41c55ff53c6f77df6b9c8d40c6471',2,1,'authToken','[]',0,'2020-10-07 07:56:10','2020-10-07 07:56:10','2021-10-07 13:26:10'),('18cf40d34c485f9bfb7220bba71be49eb5a2e2fee9d9f7a93b1f111eedf7c78c618fdb973f5b6929',4,1,'authToken','[]',0,'2021-02-14 00:21:09','2021-02-14 00:21:09','2022-02-14 05:51:09'),('1922b6eb2dc37616b8fdece0713d70925202b00c659db3a2fcc51ef7b196f259dc73e619d9079dbd',28,1,'authToken','[]',0,'2020-12-04 05:36:57','2020-12-04 05:36:57','2021-12-04 11:06:57'),('19eb1d5b646bcb7f59bf373111386fa288012710cd02bed5755e656ab67399a2117f053d7abe722a',1,1,'authToken','[]',0,'2020-09-18 10:27:02','2020-09-18 10:27:02','2021-09-18 15:57:02'),('19f2d0636ef5c01a1f351c907021e86a433077eca4854c799683a168b3149f9cac7cf359d4228c22',1,1,'authToken','[]',0,'2020-11-20 07:15:25','2020-11-20 07:15:25','2021-11-20 12:45:25'),('1a2b230565620bdfdd57b09473fb0ae6f7c57dac627843b36db7f3db8a56a965809931a0465eaafe',34,1,'authToken','[]',0,'2021-01-21 01:54:58','2021-01-21 01:54:58','2022-01-21 07:24:58'),('1ae620e61d7bc79c75b6523c6b0a4a67eee090a7d067e4465d8446b4e37001bfb9fb72285c865e2a',4,1,'authToken','[]',0,'2021-02-07 04:42:11','2021-02-07 04:42:11','2022-02-07 10:12:11'),('1b913ef7ce66d33dc642a91a216fc3a900d9a1c09f681330a7a435c5a0784bc14b6c903049345dd6',4,1,'authToken','[]',0,'2021-02-07 04:44:08','2021-02-07 04:44:08','2022-02-07 10:14:08'),('1bb934eb2baa2668650119891b7bbe5527e7d286f8f41339e8e4b7325edaf9957b7c43d4970181b4',2,1,'authToken','[]',0,'2020-10-06 14:47:45','2020-10-06 14:47:45','2021-10-06 20:17:45'),('1bfa76208b335d0d706304ef63f91ba4ab35e3081ea7b388237d67e335c07587dbe395d03a67f9ce',3,1,'authToken','[]',0,'2020-11-19 03:16:59','2020-11-19 03:16:59','2021-11-19 08:46:59'),('1c4f3b768e8a5b373ce0e574515fa123f348c73fbef1c9cd2a14d7198436bc69f717b3a47abc4dad',29,1,'authToken','[]',0,'2020-12-05 03:13:25','2020-12-05 03:13:25','2021-12-05 08:43:25'),('1c7d747d09215436a2e9cb6870e2f929f0a3b3601f41dc86bc01f8d8e2e47b9dd17a06100dd0a000',13,1,'authToken','[]',0,'2020-11-23 06:08:07','2020-11-23 06:08:07','2021-11-23 11:38:07'),('1ca0df268974e7b3901635210abeec0adb4d2b8ce37214fc286df8527876f2e99b275802569f6fcc',1,1,'authToken','[]',0,'2020-12-03 04:59:43','2020-12-03 04:59:43','2021-12-03 10:29:43'),('1ce35599e2e1355d40cfacc3a6e60cd125a0558f6277f6fb9fb0823a7b3c4ab627f45f395a15d128',4,1,'authToken','[]',0,'2021-02-14 00:25:04','2021-02-14 00:25:04','2022-02-14 05:55:04'),('1d4d6a534228c5685d65dc81632e39b451cd9eb2fd336ca0744f9ac53bb5937e8a3e848e59d07baa',2,1,'authToken','[]',0,'2020-11-22 23:57:30','2020-11-22 23:57:30','2021-11-23 05:27:30'),('1f36eb0eacf3423b901bc7a2099d9301342e8c745a488bbc08abd985815bdb915b33207fa4549a7b',4,1,'authToken','[]',0,'2021-02-16 03:31:07','2021-02-16 03:31:07','2022-02-16 09:01:07'),('1fbadc972faca04140c1f50566111d9cad6199b27e1f43fd911623d17b9c273c1057fb58f29bebc0',34,1,'authToken','[]',0,'2021-01-21 01:54:59','2021-01-21 01:54:59','2022-01-21 07:24:59'),('2006d16405f86a45f9622e5829f650edc68b6cfd92c77d5d918c4c263beca8af221585d4b636bd30',1,1,'authToken','[]',0,'2020-09-17 23:54:16','2020-09-17 23:54:16','2021-09-18 05:24:16'),('2102fc23b5efff815e7ce463ce8e67d21d2947e2b0d0fb653e59bc9e5ae62599b22feb0fc8b362d5',16,1,'authToken','[]',0,'2020-12-02 08:03:19','2020-12-02 08:03:19','2021-12-02 13:33:19'),('219911cf8c75b4bfca6e46041332ef26efa36fe6b1aecf5dc2f151d057c903d6db61260eb8ba8d1f',3,1,'authToken','[]',0,'2020-11-19 00:18:36','2020-11-19 00:18:36','2021-11-19 05:48:36'),('22367f6edcaf0712e0c742f8192fc6c25d9262b79867cf0d5476497a226dfce476a802bbc3c1177a',2,1,'authToken','[]',0,'2020-10-07 07:56:10','2020-10-07 07:56:10','2021-10-07 13:26:10'),('231b7c48402669be711cee531694435a64d4531f14c562c88ddeaa6c7a1e5d41e6bb74f009910729',28,1,'authToken','[]',0,'2020-12-17 06:29:40','2020-12-17 06:29:40','2021-12-17 11:59:40'),('235d4092710ed24489cac20b066507b4d61ad657add1466c6324607b32cd9545761b8d5999efe685',4,1,'authToken','[]',0,'2021-02-09 04:06:23','2021-02-09 04:06:23','2022-02-09 09:36:23'),('24e1a22ffbe0960b6c5fee513f0eff1a34c0722ccf1325713cda53dcfee1f2b1887277585b6ecee5',13,1,'authToken','[]',0,'2020-12-04 00:14:16','2020-12-04 00:14:16','2021-12-04 05:44:16'),('24f952bb18d86ec39fb2740efd229ba1b6aebf03cd3bc50f7633883d7a851f76b6ff694ffaa9db39',2,1,'authToken','[]',0,'2021-02-07 02:29:07','2021-02-07 02:29:07','2022-02-07 07:59:07'),('256eb0f6a537530cc23603009843a4a0c5888607a2bce6d187069747a65c2439a3dfb762d33ac0ce',28,1,'authToken','[]',0,'2020-12-17 06:06:45','2020-12-17 06:06:45','2021-12-17 11:36:45'),('2582fc53a334016c6d56ddd13a63a2a6581e6a9e9f65aea577ae5ed69498fabd0385fc922ee6b2ed',3,1,'authToken','[]',0,'2020-11-19 03:16:59','2020-11-19 03:16:59','2021-11-19 08:46:59'),('25a48072f6c12132ed07c157d1450ccd36119030f3492a734695aa2d6b5f788eeb1b6e7b75120c9a',4,1,'authToken','[]',0,'2021-02-08 06:21:29','2021-02-08 06:21:29','2022-02-08 11:51:29'),('25f008d1d0bac71cffb86f0a467345f2e666bb575742964978dd83d3734e285221d72b74a5b07448',4,1,'authToken','[]',0,'2021-02-15 04:53:29','2021-02-15 04:53:29','2022-02-15 10:23:29'),('26033cfb837f3ae7b808487c63eb992e834335d3ba0c09fa2f491d21827b61f6917d5f7d7ac328a5',4,1,'authToken','[]',0,'2021-02-09 03:42:46','2021-02-09 03:42:46','2022-02-09 09:12:46'),('26f1110c92c51cf7ff1f11f72ba759c4ef78b5905c136dabb59d17238e3cadc7b3d4c65ac85e680b',7,1,'authToken','[]',0,'2020-11-23 05:20:18','2020-11-23 05:20:18','2021-11-23 10:50:18'),('27203402a6ce3f6b1aae2800f4965e9904240c03c5dadb90ce889c09bb61ced165331d1fd2315204',1,1,'authToken','[]',0,'2020-09-21 14:27:46','2020-09-21 14:27:46','2021-09-21 19:57:46'),('277a17b918551790e858b86b46eb92f976fd79a4a1e3a6a244707d42be420b8bdbb74d110133c288',10,1,'authToken','[]',0,'2020-11-23 05:30:04','2020-11-23 05:30:04','2021-11-23 11:00:04'),('27e6454640b6d106893ae238c4512c6d4aa62d771c64aa0f8d2411629c7f650f26da52d80b21cc34',4,1,'authToken','[]',0,'2021-02-08 12:04:04','2021-02-08 12:04:04','2022-02-08 17:34:04'),('2990207ac6c71025c67e30bed0591b79074bb8e19799573385b17a1582127b659ba893719ee58181',28,1,'authToken','[]',0,'2020-12-22 01:16:33','2020-12-22 01:16:33','2021-12-22 06:46:33'),('2b4092360570ff4cb6d0e657dd71cbb9e505e104aa542f08aadd4df2177346987ce75096639860e7',28,1,'authToken','[]',0,'2020-12-17 06:07:20','2020-12-17 06:07:20','2021-12-17 11:37:20'),('2b93f615e7840459eda21bd85d3374f0619e001613cf670ff29b6a5123d06fe75da4f85e3fdc37b3',1,1,'authToken','[]',0,'2020-11-23 07:37:31','2020-11-23 07:37:31','2021-11-23 13:07:31'),('2ba3dd9a7705fa037d7a802586acae6ec3318125c1d593feb4fa18dded96e33c534aaa171b0eb77d',6,1,'authToken','[]',0,'2020-11-23 04:20:22','2020-11-23 04:20:22','2021-11-23 09:50:22'),('2be46d6068b8ecc66881c051ba46740aba333f2bf45be2f7fe81d0765c572bc861f9073fda4be5e6',1,1,'authToken','[]',0,'2020-10-11 06:50:59','2020-10-11 06:50:59','2021-10-11 12:20:59'),('2bec45318e41282f00b5feba9e66972b2fce20efe62d025ab3566cb36c27a75dfc2112964080af85',4,1,'authToken','[]',0,'2021-02-09 02:39:48','2021-02-09 02:39:48','2022-02-09 08:09:48'),('2c1d7ba9bc8c0dd4193179106bb61bac41d8efe12859c754b379b3922b8377d7283e987b60782dba',4,1,'authToken','[]',0,'2021-02-15 03:59:40','2021-02-15 03:59:40','2022-02-15 09:29:40'),('2ce298162463fc40b1bba38cffcf27a3825c7b5b0dd3e20af3682c7803e192f7055f0151d8fcf6fb',17,1,'authToken','[]',0,'2020-12-02 08:09:00','2020-12-02 08:09:00','2021-12-02 13:39:00'),('2d28ed69028d4429674ad8f2830823845a65df80fb0edb496f9db80af6eda6334e9d06813740a0ba',2,1,'authToken','[]',0,'2021-02-05 01:12:44','2021-02-05 01:12:44','2022-02-05 06:42:44'),('2d2c5adef078bb0cf7aeaf2dcaf0c8bfbb868f51537af7bb8a3324ff2b88646c4831fb4e7978dbcb',4,1,'authToken','[]',0,'2021-02-07 05:08:58','2021-02-07 05:08:58','2022-02-07 10:38:58'),('2d61010e6b31f604d8731692e4d26ad0c23e63fe6fd99425b95e78a622956ef88f7203773054bbbf',3,1,'authToken','[]',0,'2020-12-19 04:44:58','2020-12-19 04:44:58','2021-12-19 10:14:58'),('2e8e90c32be6ff2790c963b0750aae7a637e1d35d5e506d23f3f9b24422672fd4482b0893710731a',28,1,'authToken','[]',0,'2020-12-21 00:52:59','2020-12-21 00:52:59','2021-12-21 06:22:59'),('2e90f3f0fc8db86a45ae32778f984f630797f498fe169114708651ca6abf2e341b27bb2d0a8cf184',4,1,'authToken','[]',0,'2021-02-09 03:05:04','2021-02-09 03:05:04','2022-02-09 08:35:04'),('2ea00cc7bb8ffc763738b9d34f628b771d95395135d78c2304971402ef6eb1bf76b50fe49b7bea5d',34,1,'authToken','[]',0,'2021-01-20 23:15:28','2021-01-20 23:15:28','2022-01-21 04:45:28'),('2f4560be851d2f4b901e94708a96bb0a43634ab2c37b9185d371b5f3175dda33579ecbd14204f9db',28,1,'authToken','[]',0,'2020-12-19 08:14:42','2020-12-19 08:14:42','2021-12-19 13:44:42'),('2f6c59133e0c381c8c295339133166330717637ad2cd1f9a7aaa7a4360ca0def5a481e4f937e03c2',4,1,'authToken','[]',0,'2021-02-15 03:59:40','2021-02-15 03:59:40','2022-02-15 09:29:40'),('2fb3b2935b06a61a972217e339a5a2b55559ced029004854aee19352c1090e58eab6768218f697f5',1,1,'authToken','[]',0,'2020-09-18 08:29:22','2020-09-18 08:29:22','2021-09-18 13:59:22'),('2fbf2e12c9dfc4485e968b241bf13c20043da058cd34bb2e0d8f35b824d4edacac87586420a088fc',2,1,'authToken','[]',0,'2020-12-02 07:54:21','2020-12-02 07:54:21','2021-12-02 13:24:21'),('3029232e2a122231fe45df695d5cb4f743930aaf32ec4e1565815084ae676552d2cb7a34aa48263e',5,1,'authToken','[]',0,'2020-12-22 12:48:40','2020-12-22 12:48:40','2021-12-22 18:18:40'),('307ff7054ec6b908681028739bc8f0254f6f73988d0158f91ad31d4db545cf88b94796a7ecdd904c',1,1,'authToken','[]',0,'2020-09-18 13:05:39','2020-09-18 13:05:39','2021-09-18 18:35:39'),('3162a2761e9f48c1c565a99168072ac34075e252b207fe52b62768e00b4f03f97ca1e38d8bd3c5d5',4,1,'authToken','[]',0,'2021-02-15 03:57:41','2021-02-15 03:57:41','2022-02-15 09:27:41'),('31671cbdb7d2b7f61f1d7959673053ffca05ed7c4fc5e9034e8d587e4dec0c0430bd7cf1577d3976',1,1,'authToken','[]',0,'2020-12-02 07:53:37','2020-12-02 07:53:37','2021-12-02 13:23:37'),('31c29ca2b67469b9cfc96b23359bfaaf0d6053eec6931f87f9a2baa449b473a48c84f3da4037e4b3',1,1,'authToken','[]',0,'2020-10-11 06:50:59','2020-10-11 06:50:59','2021-10-11 12:20:59'),('31dc0217b89fb804c0f64b8a793d131f62af402bdbc89a756e9d8c39b741fdda57495ca1c0fd2f90',2,1,'authToken','[]',0,'2020-09-22 06:50:44','2020-09-22 06:50:44','2021-09-22 12:20:44'),('3256cf04450ae4855149477e2d1dfc81df807ba9c92070273a9811c2ae2d5bc42836e294ac00d86d',28,1,'authToken','[]',0,'2020-12-22 12:29:32','2020-12-22 12:29:32','2021-12-22 17:59:32'),('3287e17cc065956903a440fc2e5d8a01442373ea2e1a4e46e6357c9304c861e081b4c8417be222e6',1,1,'authToken','[]',0,'2020-12-02 07:50:56','2020-12-02 07:50:56','2021-12-02 13:20:56'),('339d728ea7c97f86df5d26f533b5359bc1e4508c3b4840bb35d4630371900e9485d7d1b0201abe4b',1,1,'authToken','[]',0,'2020-09-21 16:14:12','2020-09-21 16:14:12','2021-09-21 21:44:12'),('33c336c7af063144095d7cd119f21c4bea1b979a7b26c36c7db555a60081f91675d8e6fdf4ed1ec8',1,1,'authToken','[]',0,'2020-11-02 02:06:31','2020-11-02 02:06:31','2021-11-02 07:36:31'),('33da90c16ec5b24b4d8a2e1a7d25f2885dafe1d41f751c38d0d8fa0c8d1439b4018b30a5076ffca9',3,1,'authToken','[]',0,'2020-11-19 04:37:34','2020-11-19 04:37:34','2021-11-19 10:07:34'),('34c8fa26a65e7384286bebb8d6d0ab49e4fe42d9a6cb1ce375557c14f93710518808e1179cc61cbd',28,1,'authToken','[]',0,'2020-12-19 08:13:54','2020-12-19 08:13:54','2021-12-19 13:43:54'),('35fd2a8c4996ded819b0fa87fca90a7576bf87b43d16c8ddef7aba5a74cd6397dbdc2cc899e33d98',1,1,'authToken','[]',0,'2020-12-19 08:15:17','2020-12-19 08:15:17','2021-12-19 13:45:17'),('36c83d726537a6fedfd2632d6514cf4a1d4729a136059af81760da7975ab9d8b1474c60ef089ed09',28,1,'authToken','[]',0,'2020-12-04 00:42:54','2020-12-04 00:42:54','2021-12-04 06:12:54'),('370c06672ec4e245c2249229252f5bffe225c56882c05df95ad2edeb01a3892a38a392d1da4da105',2,1,'authToken','[]',0,'2020-11-23 07:35:45','2020-11-23 07:35:45','2021-11-23 13:05:45'),('37eb168d452bcaea6f803a67b9c73f2e1165a4e7c7d15d6d304d355ae572fe9c28d28c22ae137f68',1,1,'authToken','[]',0,'2020-10-26 22:55:10','2020-10-26 22:55:10','2021-10-27 04:25:10'),('37f5c6f35a3970ec0d0cde2489eac176a1d44bf4581ce1ff2c3b8f11f8405c9d9d3a2be08a98e15c',28,1,'authToken','[]',0,'2020-12-04 05:27:42','2020-12-04 05:27:42','2021-12-04 10:57:42'),('384d80fd769c30b6a99c99c667d944053ffc4562167b511c936e26afa028063e83903d05343f65a2',3,1,'authToken','[]',0,'2020-11-19 04:37:34','2020-11-19 04:37:34','2021-11-19 10:07:34'),('38e0784f6f8add184e11c75a199a1da489428516321cc27ac36bb92af8dd34e9262854bc4e2f88fb',4,1,'authToken','[]',0,'2020-11-23 02:45:08','2020-11-23 02:45:08','2021-11-23 08:15:08'),('39a826bb7cf6fc9591b13e65dc5b456d304117f9a309a9e09c4ae9360c62e742edc5432c1dd6d7ef',28,1,'authToken','[]',0,'2020-12-23 01:38:22','2020-12-23 01:38:22','2021-12-23 07:08:22'),('39d038327ceab3f32439a56b4a1525bc009c4573574e9aaac564bb567f9d75de60b1c6dc76131459',4,1,'authToken','[]',0,'2021-02-15 09:19:18','2021-02-15 09:19:18','2022-02-15 14:49:18'),('3a4311312106a76278f5ac57d0088307ae9f551785256978f9f18cd03d30fcbfffd64c1912d560c6',3,1,'authToken','[]',0,'2020-11-23 02:46:30','2020-11-23 02:46:30','2021-11-23 08:16:30'),('3ac34170632c6434b76f94465173c8327c79a342b8bbc02c25d3cea57374bffc2622f16197cdb664',1,1,'authToken','[]',0,'2020-12-21 05:43:36','2020-12-21 05:43:36','2021-12-21 11:13:36'),('3b3c538d0ccfdf1efdd24e1e1aa1caed183c724431f3ada461b2072cda1d6bf55b94ee5cb67a616a',2,1,'authToken','[]',0,'2020-09-22 06:50:43','2020-09-22 06:50:43','2021-09-22 12:20:43'),('3c08bb24a833bcbcf462e4db2ac2d069d0b332ee616533b66a9e539cda061921229de49e84ca8d9a',1,1,'authToken','[]',0,'2020-10-03 00:46:12','2020-10-03 00:46:12','2021-10-03 06:16:12'),('3c2ed3d6dbb02a9d17dd976408f3315ba26ff4569e4d2e0b370e6b93d53c100ecef6ce137bc447c1',4,1,'authToken','[]',0,'2021-02-09 01:49:40','2021-02-09 01:49:40','2022-02-09 07:19:40'),('3d9ea68e1c01bca96633dae1fabe146ca1a59dadd8741635483a65444aa7d5af41882f26c6579f7e',1,1,'authToken','[]',0,'2020-09-21 23:20:58','2020-09-21 23:20:58','2021-09-22 04:50:58'),('3e901f4e596e037870e8fd7fe2141c607d246f6467c58ec8683544517663bad44e713cf19a5e8681',5,1,'authToken','[]',0,'2020-12-22 12:31:41','2020-12-22 12:31:41','2021-12-22 18:01:41'),('3f30b3e423bbbcf6ae734ba496e73d9f537c8b5eda9715815aee1305e697f2744c135c372abb888d',28,1,'authToken','[]',0,'2020-12-17 11:32:34','2020-12-17 11:32:34','2021-12-17 17:02:34'),('401d51bc403b2abe415d68380ec2afa4b6fea7e693a7e5e49719381ad09fe3f00a2b77e33d780fb9',4,1,'authToken','[]',0,'2021-02-09 08:34:23','2021-02-09 08:34:23','2022-02-09 14:04:23'),('40b256eb0d1a56cd6d663e787be21442ed598ae7673bd1a9aae4e0461b3bd585c46d824936ddea43',1,1,'authToken','[]',0,'2020-09-21 16:13:41','2020-09-21 16:13:41','2021-09-21 21:43:41'),('418979af4a27d1913ba951aa15bd8ce5a8f05fd9da6a375002a5a86cdaa111f0964a53e8874f6ce8',4,1,'authToken','[]',0,'2021-02-13 04:01:54','2021-02-13 04:01:54','2022-02-13 09:31:54'),('41eb0962d0ac65fca63fef130a4f650da94ad6d9161a069c420a5a5a40e08b78dd4eb9439d84a2ed',2,1,'authToken','[]',0,'2021-02-05 04:40:03','2021-02-05 04:40:03','2022-02-05 10:10:03'),('42832cca9630fb456c5e8f070beb59a7fa7dde0cec9dcaa7c3fcb627b9177e19d4f6e3d0b0478bad',4,1,'authToken','[]',0,'2021-02-15 04:50:03','2021-02-15 04:50:03','2022-02-15 10:20:03'),('42a84dc9d3097dcf82a98140a44e404a62128069f482d378138b2aa25e7c6d6fa197853aa1bb13fe',5,1,'authToken','[]',0,'2020-11-28 04:42:26','2020-11-28 04:42:26','2021-11-28 10:12:26'),('442b71ac7f48846fb4b376804bbf835b54aa416baa63614c9f45a3070cfb32ff57577fb9011fe9ef',1,1,'authToken','[]',0,'2021-02-13 04:01:32','2021-02-13 04:01:32','2022-02-13 09:31:32'),('444fd92b1cdb79aa3a219801135b49042beafff34ef2a7d06ab0560f782630e1b1ee7ae87e92dced',1,1,'authToken','[]',0,'2020-09-21 23:52:04','2020-09-21 23:52:04','2021-09-22 05:22:04'),('44790a220002019a66e5c605abc2f15e82edb64bcfa5ddf9f60452ba18e89cfc816683bd4f3ee860',4,1,'authToken','[]',0,'2021-02-15 08:16:18','2021-02-15 08:16:18','2022-02-15 13:46:18'),('44aea38ac46cd6ced0f8b8b5b51f20677afa7bfd9287f323403c11b19794f752104a033b30f64a78',28,1,'authToken','[]',0,'2020-12-04 03:59:37','2020-12-04 03:59:37','2021-12-04 09:29:37'),('44da37f96f62370abb3c1ee4017403ece83b17e234d39a314d6fff083b260998b280f5d16c4bf31f',1,1,'authToken','[]',0,'2020-09-21 23:21:46','2020-09-21 23:21:46','2021-09-22 04:51:46'),('44e2d9e598a9831d32a2063250690488865b80f02ee8383f5919bbffc84976d5151f85bbc15a30d8',1,1,'authToken','[]',0,'2020-09-21 23:44:24','2020-09-21 23:44:24','2021-09-22 05:14:24'),('454ce2c40a9d5b4c4d54aba0aac746857b7036fe18240b75d06b9c8cac80a63c9f2790f855700c47',1,1,'authToken','[]',0,'2020-12-22 06:53:13','2020-12-22 06:53:13','2021-12-22 12:23:13'),('454d0feb4232738f243bc5260922616700b12ea5b173f76088c45a9b7ba56666afb098b8e7ef5597',4,1,'authToken','[]',0,'2021-02-09 02:39:48','2021-02-09 02:39:48','2022-02-09 08:09:48'),('45c0979d87af9a4adc1a6c86a42f7b06a69787f38133b1543b532af56dc5621bad928824823a37d5',4,1,'authToken','[]',0,'2021-02-15 01:54:21','2021-02-15 01:54:21','2022-02-15 07:24:21'),('4614bf030bd265b9a5675651106f7a7b18160d8d906f6100dc36f9c6162aa7313410b601fbc43d20',4,1,'authToken','[]',0,'2021-02-16 04:25:57','2021-02-16 04:25:57','2022-02-16 09:55:57'),('463812de6560391f8befcfb1793ca1ed0cb4fcc24b4a66c306c71beb34eebfef51bd4a56f4e83323',24,1,'authToken','[]',0,'2020-12-02 08:38:43','2020-12-02 08:38:43','2021-12-02 14:08:43'),('46889e1b6300d189dec49b6deb8ce8895c3067af457d285dae05d92cdf5094929d19eb8c92885227',4,1,'authToken','[]',0,'2021-02-13 16:16:10','2021-02-13 16:16:10','2022-02-13 21:46:10'),('475fbc2846ed999363efbac8be49069b12563ff3305017b3db905673896fa38c52e760c4909b292c',2,1,'authToken','[]',0,'2021-02-04 23:20:19','2021-02-04 23:20:19','2022-02-05 04:50:19'),('486a4ab4277bd1c8ac143869e639f8a7f7be56a947203563aa217e50f63f884d0f2174782fb3304e',1,1,'authToken','[]',0,'2020-09-18 13:21:48','2020-09-18 13:21:48','2021-09-18 18:51:48'),('48879a0190730925036b269de77670e15de8426dc9638eb73b9b0a41de058f3b0e2951c2b3074403',3,1,'authToken','[]',0,'2020-12-22 04:53:13','2020-12-22 04:53:13','2021-12-22 10:23:13'),('49cfc27031dc29d33954b30589f577c27df415677123079b1785efeeede8d7a5d7df704b7e4c2004',4,1,'authToken','[]',0,'2021-02-15 04:51:41','2021-02-15 04:51:41','2022-02-15 10:21:41'),('4a483fe02b5d50f37a803ea46101234a55cda18125f044f17662b80688df993cfcf326558176e48a',1,1,'authToken','[]',0,'2020-09-21 23:37:39','2020-09-21 23:37:39','2021-09-22 05:07:39'),('4adc6345e38814533f761f1bee8749a1a0dd9e53e857426ea670eec8e53590c7e5d0a5f8b4f255bf',1,1,'authToken','[]',0,'2020-11-23 07:37:31','2020-11-23 07:37:31','2021-11-23 13:07:31'),('4bd85b2f472a9b5dc518823a55fe09a41d5d9293c5822398bd74eedc5e77fe40011ec652a446867c',3,1,'authToken','[]',0,'2020-11-23 02:42:31','2020-11-23 02:42:31','2021-11-23 08:12:31'),('4c12fa87073ba433ca15435738fbbc4e1f9a5d685125b16ee88d1755e086e079af09b553850b33f6',24,1,'authToken','[]',0,'2020-12-02 08:39:13','2020-12-02 08:39:13','2021-12-02 14:09:13'),('4c94c523dce14967c0c38b0b5f168ac15c37c04cd5e00df87c007748747503b77796e12a37281367',2,1,'authToken','[]',0,'2020-10-06 13:35:29','2020-10-06 13:35:29','2021-10-06 19:05:29'),('4cd4fde05a2be2358883825af14bdabc5ce24a9192e04a7c928b078a9b06f52d372598b76ecb5264',28,1,'authToken','[]',0,'2020-12-19 08:14:42','2020-12-19 08:14:42','2021-12-19 13:44:42'),('4d129dfeba2023b0268474f9aeafaa435fbc97a201c0a786a9500f72b8fc5ae771eae272b0b817b8',5,1,'authToken','[]',0,'2020-11-24 13:19:31','2020-11-24 13:19:31','2021-11-24 18:49:31'),('4d3fd8c37f62c8c8f8b1e6b4709cdab0727218429c23617600d0dda3583a352d373ba6daf3421936',29,1,'authToken','[]',0,'2020-12-05 01:08:54','2020-12-05 01:08:54','2021-12-05 06:38:54'),('4e6c9cd108728e7865fc6da9b66d01b749509185e0dd208ec6d50582c119f16a3c9542b71108cbb7',28,1,'authToken','[]',0,'2020-12-19 08:13:54','2020-12-19 08:13:54','2021-12-19 13:43:54'),('4e8e5a804b83b5ebce3842b87ec793eed4b542f74578ea0898de0b5a950ab847652829efea535ef9',28,1,'authToken','[]',0,'2020-12-04 05:35:41','2020-12-04 05:35:41','2021-12-04 11:05:41'),('4ffc85212cde50d6116672abd02290a2fa87cc719fd440ea165c900afbf88f4dc75beb6ef4894ac6',4,1,'authToken','[]',0,'2021-02-09 02:59:27','2021-02-09 02:59:27','2022-02-09 08:29:27'),('503beb452bcb80fb6dde452c1e3674987ac7ea13592cfa7215eca44125ec5aa53634dbb620885464',11,1,'authToken','[]',0,'2020-11-23 05:32:11','2020-11-23 05:32:11','2021-11-23 11:02:11'),('50bf361a5e1a110828eaabcfeeda4edd4cde1ad74e3c5005488ff9c04531c176f0bb21e1e37e6d6c',1,1,'authToken','[]',0,'2020-09-18 05:46:41','2020-09-18 05:46:41','2021-09-18 11:16:41'),('512919b27c40c86d74334ae5ef36b76efed53a47dc9853f088ec3a4f7af53f242d029b5207c06ced',1,1,'authToken','[]',0,'2020-09-23 00:27:17','2020-09-23 00:27:17','2021-09-23 05:57:17'),('529d1fa9806dcd3114dbb3f2f5087a9b837cf641ae8c725573d9ad169b6d44e33fc4e282a36b07dc',13,1,'authToken','[]',0,'2020-12-03 13:50:25','2020-12-03 13:50:25','2021-12-03 19:20:25'),('52a527a2b327eacf51a26629303d308f91d1d8d02cb6cbf6d48861e80560dd8c88b54069233c9930',4,1,'authToken','[]',0,'2021-02-09 03:09:40','2021-02-09 03:09:40','2022-02-09 08:39:40'),('52b499c0c12231f1b48590f53af8c5104f620addae32175f300fc5f9bced4e3077dee326277397c5',12,1,'authToken','[]',0,'2020-11-23 05:58:12','2020-11-23 05:58:12','2021-11-23 11:28:12'),('531e41d8c4119044bcd3c0b0c056d2f5f9a7aecf7abb220ce5cd6f7f0cbe720df1373d0b0ea8d1d9',28,1,'authToken','[]',0,'2020-12-04 05:25:04','2020-12-04 05:25:04','2021-12-04 10:55:04'),('5395e8410648d5c0475110f86a4aa4216f482a05defd68d72e4edd476d25f0e86f6712ec0027bd01',1,1,'authToken','[]',0,'2020-09-21 23:22:17','2020-09-21 23:22:17','2021-09-22 04:52:17'),('5574d2f49b964f37d71fc79680dd00e07d26d7921d4320ef884dc47346c94357ae5c39d8a9fca323',4,1,'authToken','[]',0,'2021-02-13 03:41:54','2021-02-13 03:41:54','2022-02-13 09:11:54'),('575a4e283ee893532334f7181ab298e0d442fc42c7250b4c0148b5b850b62e6852ea162c1483b0fd',1,1,'authToken','[]',0,'2020-12-02 07:53:38','2020-12-02 07:53:38','2021-12-02 13:23:38'),('5824ac55c9b5b9e6038739796d93c67c039d9dd7d6390bb38b27a2e0967cb29ce45dcf01cbce6d86',1,1,'authToken','[]',0,'2020-09-21 23:37:39','2020-09-21 23:37:39','2021-09-22 05:07:39'),('58a265414e2b62ba2a4d333ae2e8b0806b3009f49d70ecd946aa224b535838077a5649e3b09bc28d',14,1,'authToken','[]',0,'2020-11-24 12:22:22','2020-11-24 12:22:22','2021-11-24 17:52:22'),('597fb1c214ab0f09b342f0d4ed59896572929c4e5a170b874166d7d071f9927f22bef71a61ee09ab',13,1,'authToken','[]',0,'2020-12-03 13:50:25','2020-12-03 13:50:25','2021-12-03 19:20:25'),('5aeba86cef052a35fbfe1d8016572ae7eee6377ccdc8d15cc4eee8cafce1af7a673f0250941b5db1',28,1,'authToken','[]',0,'2020-12-04 05:35:41','2020-12-04 05:35:41','2021-12-04 11:05:41'),('5b7f6b30cd5c9e7d55407324c4098d60d9ed52680de6ee7d04e60d5c467746e787791a6f81ddf61b',4,1,'authToken','[]',0,'2021-02-08 23:20:56','2021-02-08 23:20:56','2022-02-09 04:50:56'),('5d40f344e268fe784ad2b9f438bb81b176396490158b7e9eb1941fb34eac8380d848da2769a26189',3,1,'authToken','[]',0,'2020-11-18 04:24:00','2020-11-18 04:24:00','2021-11-18 09:54:00'),('5df69250036d97de2b94d9dcc677c663a590f1a2c8fa3f98e85503c9ec90ea175d11e362c32d6557',13,1,'authToken','[]',0,'2020-12-03 13:48:19','2020-12-03 13:48:19','2021-12-03 19:18:19'),('5e055e9b46b97ee865b892b33bf44bfccbac4af7a7af7a8bc4b88dc18bba12fbc658d36af4028b02',3,1,'authToken','[]',0,'2020-11-23 08:01:48','2020-11-23 08:01:48','2021-11-23 13:31:48'),('5e59caf9976245c4135c8c6bc16661f3c59ac076a88570890d837457e39fbfa9fc1d53964553abd6',4,1,'authToken','[]',0,'2021-02-15 04:55:39','2021-02-15 04:55:39','2022-02-15 10:25:39'),('5e5f5d633b5c867c7d46f127d4f62b797e897dfdf93ffd535cbd581e7e3d26589f664b3957f5b372',1,1,'authToken','[]',0,'2020-12-03 05:32:48','2020-12-03 05:32:48','2021-12-03 11:02:48'),('5e98cf4b952953f723fcdede297a737894a498089f6d8880aa334af393fe27ba1a7405a29841d30d',28,1,'authToken','[]',0,'2020-12-17 10:16:46','2020-12-17 10:16:46','2021-12-17 15:46:46'),('5eb32e45a5b782e7c742ebea8c6564dd8252c1ce1ffa8d6ba46ae5e5a5b729efc0335e8fa906d267',1,1,'authToken','[]',0,'2020-09-21 23:44:24','2020-09-21 23:44:24','2021-09-22 05:14:24'),('5eeb428b54225a06d1eec27b6fcd5187731dd1f455ca329b1533dc4e7235b67e3bf340481fb09e20',4,1,'authToken','[]',0,'2021-02-09 01:45:20','2021-02-09 01:45:20','2022-02-09 07:15:20'),('604b3491bacead6b5c4dd42782010a17632f096581f11eb0826d901fb79ca29ce3c6a1d9ed0de0cb',2,1,'authToken','[]',0,'2021-02-05 04:40:04','2021-02-05 04:40:04','2022-02-05 10:10:04'),('620a2b8bf6d82b8a875e8a8d9c255be2f4c35378a5b9271899a6b3b354efea323fb52b414654a7b3',2,1,'authToken','[]',0,'2021-02-05 01:06:10','2021-02-05 01:06:10','2022-02-05 06:36:10'),('623eda1301c514a2a4645fb2a8df539ba76f8c749c6aef85cc79b8bd2477d0cf4d015662265ec44d',28,1,'authToken','[]',0,'2020-12-04 03:59:37','2020-12-04 03:59:37','2021-12-04 09:29:37'),('62e4fe27107bbb08cad289f890cda0e85ffbd50160f7cafdead8576626dd11cf6052559ead32008e',2,1,'authToken','[]',0,'2021-02-04 11:51:27','2021-02-04 11:51:27','2022-02-04 17:21:27'),('62eb4b33c57661768ac70a311481886b8d16ccf94ba7a36685ca55b5736f9f90ec24282aeee08877',4,1,'authToken','[]',0,'2021-02-07 05:08:57','2021-02-07 05:08:57','2022-02-07 10:38:57'),('6330db18e8ddeeeddfcb09ef1ef65c7619d11fe5f4bfd15502bc1c7a6778f8fdae0ea9b7f49fcd80',4,1,'authToken','[]',0,'2021-02-04 23:20:18','2021-02-04 23:20:18','2022-02-05 04:50:18'),('634100016cc1779d75495e6b0bef25cdca66491ef296c6ee53d4ce6f2605c22917a2c5b673bd895a',28,1,'authToken','[]',0,'2020-12-04 00:47:43','2020-12-04 00:47:43','2021-12-04 06:17:43'),('63dab011263da38fc9caff2bb3ad798804b74132762b613a31c2a46cba3e19a58771c0fc584638f0',13,1,'authToken','[]',0,'2020-12-04 00:22:56','2020-12-04 00:22:56','2021-12-04 05:52:56'),('63edb263f20cba98d358b60b4f5754a20334bf1a7bd25c06f4f8d000d9fbdf6d986bfe6b0fe8ffd0',29,1,'authToken','[]',0,'2020-12-05 01:08:54','2020-12-05 01:08:54','2021-12-05 06:38:54'),('63f6b6015636a0131e9191766348e53dd61a148b4ad323c37d2bf1e647d12892c4cfad07cdea2507',5,1,'authToken','[]',0,'2020-12-22 12:21:55','2020-12-22 12:21:55','2021-12-22 17:51:55'),('6425ff44107f8dfde1b537af68b44c8401b22bfa8ac7c1614b0545550aba09c573361f7fa6285ad5',4,1,'authToken','[]',0,'2021-02-09 01:49:40','2021-02-09 01:49:40','2022-02-09 07:19:40'),('6561327fc3c9157fb358503267101f026436b91268ead065500dde53865a78c2de6dbfcbca3bea76',3,1,'authToken','[]',0,'2020-11-21 06:45:17','2020-11-21 06:45:17','2021-11-21 12:15:17'),('66d9f967c877b98ef7e95b968631f7489961136ba99c85782f65c4c9b0a39155b487527e21c805ca',4,1,'authToken','[]',0,'2021-02-15 08:53:16','2021-02-15 08:53:16','2022-02-15 14:23:16'),('676c070873291988b63932d5b6dbe5510024a30ebfa9c5008530c611ffba4a2e1e4ef6aa2915eff2',1,1,'authToken','[]',0,'2020-12-03 04:59:43','2020-12-03 04:59:43','2021-12-03 10:29:43'),('677f8535f5243355506792faf20fa759a2f96d1b90bd62fe6f1fe80529cf49ca7b80d59d83d80012',2,1,'authToken','[]',0,'2021-02-04 23:20:18','2021-02-04 23:20:18','2022-02-05 04:50:18'),('679c44bae1ee2bf90836bb58561d357f272c1289a157712c20c35d8e4011418ae1b3c5663232d883',28,1,'authToken','[]',0,'2020-12-22 12:36:19','2020-12-22 12:36:19','2021-12-22 18:06:19'),('6808eb5861f2b8ca54515fe6eba2fa0ce5b48d3c47e82f39ad2688aab1357e14a3a312534778b481',5,1,'authToken','[]',0,'2020-12-22 12:21:55','2020-12-22 12:21:55','2021-12-22 17:51:55'),('683dfe691e6b1abd418db6bbcfe4f19eedb332fdfa8e09204da0b7ba4ab6321c7f50d114e115d101',1,1,'authToken','[]',0,'2020-12-21 08:48:33','2020-12-21 08:48:33','2021-12-21 14:18:33'),('6846bd39844a5cda5e7f76d8cff11cbcb10d30a9cde45cb0a9662b163677592dbc2ddb4561af4e1a',2,1,'authToken','[]',0,'2020-10-21 13:23:04','2020-10-21 13:23:04','2021-10-21 18:53:04'),('692ce209c72b84ac6618a2a7871d3f3661ae80b588c854698149508fb67416e2d1aca76db316ea05',4,1,'authToken','[]',0,'2021-02-08 22:40:38','2021-02-08 22:40:38','2022-02-09 04:10:38'),('693a88dc426d4334ebb9ee7b052a802239fd99cc9cae03565ebeb064dff8a5e1609b7a1c030d6f08',28,1,'authToken','[]',0,'2020-12-17 06:07:20','2020-12-17 06:07:20','2021-12-17 11:37:20'),('69c8ee2743dd923b72f5530d9752d444a8792d80c32ee6f3f479f44b17f3ae57d1b6cf0c8fdde7da',1,1,'authToken','[]',0,'2020-09-17 11:03:35','2020-09-17 11:03:35','2021-09-17 16:33:35'),('6a07bf6d665675f58fcdf24e0bfbc9dd4c5e3ebf10c8ffa210948a8e6f77af55c0d8b8b415448039',1,1,'authToken','[]',0,'2020-12-21 03:06:21','2020-12-21 03:06:21','2021-12-21 08:36:21'),('6a5586435465795853e7fb8f7fb9c11095d7a19e89679b988b3e963b00fdc78ca3873927d0064b46',4,1,'authToken','[]',0,'2021-02-07 03:28:59','2021-02-07 03:28:59','2022-02-07 08:58:59'),('6a7119b3a3c830c6f8c4cbc54bfdc490c0fa32dd5826c0d213cd402466249532579ddc3edcf75199',1,1,'authToken','[]',0,'2020-09-21 14:17:10','2020-09-21 14:17:10','2021-09-21 19:47:10'),('6b15503f7d0717e0fb7a4c3f003ca6aa6797f2c8cbc6662df637f3aceda8aceb48722230e49feed1',1,1,'authToken','[]',0,'2020-09-18 13:02:34','2020-09-18 13:02:34','2021-09-18 18:32:34'),('6c6261ab1d43aa820b10fad75f9629413c58af52b999471ffcfc5b32523d0d0f89db16a6931c04c7',28,1,'authToken','[]',0,'2020-12-04 00:42:54','2020-12-04 00:42:54','2021-12-04 06:12:54'),('6cb063a922a77ef092d5c645f765de8fed6effe555c4469f706ab6a44cbde58ba103dbe68ee44ac7',4,1,'authToken','[]',0,'2021-02-16 03:43:24','2021-02-16 03:43:24','2022-02-16 09:13:24'),('6cb7f0c057172d0cf93f47e8e41d5ba741faa947e84679af4f646edf572b5b4135cef71b250da9b0',28,1,'authToken','[]',0,'2020-12-21 09:45:09','2020-12-21 09:45:09','2021-12-21 15:15:09'),('6cfdf01475a85196de335484a33f86d1ae2718389fbc7e6a3ed973cad73754c585d68c6728ff77cf',1,1,'authToken','[]',0,'2020-11-23 07:49:03','2020-11-23 07:49:03','2021-11-23 13:19:03'),('6d7ba69977e11c6212fd0334d3e512be9aa9550bc1b88063a99dfe17c57f35a1a1d416e07095ead9',4,1,'authToken','[]',0,'2021-02-15 05:03:14','2021-02-15 05:03:14','2022-02-15 10:33:14'),('6dc2d9ee560914738de69f4e265549c52281c9d2532bbd73dbe1eb2a3139898c1ee3150cc1c147e2',4,1,'authToken','[]',0,'2021-02-08 23:20:56','2021-02-08 23:20:56','2022-02-09 04:50:56'),('6eba7605aed842b2d18db8a23c146f71d2f31c065a771e231455766216e58a9fd185f3f922965027',28,1,'authToken','[]',0,'2020-12-17 06:29:40','2020-12-17 06:29:40','2021-12-17 11:59:40'),('6ebfffbce24f65c788a262f22ae732964614606affa4c58a436eefed1d754f3387119bde8061cefd',5,1,'authToken','[]',0,'2020-12-21 10:00:46','2020-12-21 10:00:46','2021-12-21 15:30:46'),('6fa4177cd9b910b5f2d1e8e96a400550df60cc1c6ff026de5acc3053ee55b786d800753e769e2551',1,1,'authToken','[]',0,'2020-09-18 15:17:30','2020-09-18 15:17:30','2021-09-18 20:47:30'),('7008c7f22e181cef045a061199a8ba3c43d577d6a6a4898bfc3a5f02ebaf62e38d29988df51562fb',1,1,'authToken','[]',0,'2020-09-18 13:23:23','2020-09-18 13:23:23','2021-09-18 18:53:23'),('70d292f7f07e7d403fb89a7170249f735750c11a9ed92e87260343ca472be8a42c9efc5310f91e8a',4,1,'authToken','[]',0,'2021-02-09 03:16:56','2021-02-09 03:16:56','2022-02-09 08:46:56'),('710781af35a9810d84dbffb8705a84ebc1c61317bd31137e20d8bdee6094dec78f32e837dc2bf56d',28,1,'authToken','[]',0,'2020-12-04 05:27:42','2020-12-04 05:27:42','2021-12-04 10:57:42'),('7107e3fd585c4d7ff8a059b1946490a16fa5d636a31ad33c2ad71197f400a46c01868db73bf7d23e',4,1,'authToken','[]',0,'2021-02-09 03:31:46','2021-02-09 03:31:46','2022-02-09 09:01:46'),('71996368eb26c33bc0f58c77cfda6df79c8ddac65401046f96b82e2742cb00cf74a5cfb5ca2d7669',3,1,'authToken','[]',0,'2020-12-19 02:06:12','2020-12-19 02:06:12','2021-12-19 07:36:12'),('71f81c9704cb3482e94e22fd8335885c3dd698144662282d2ec9c913bfe67e6946894317e247591b',15,1,'authToken','[]',0,'2020-11-24 12:31:15','2020-11-24 12:31:15','2021-11-24 18:01:15'),('731501294819df7daa4e217f033fd25db53036eafb3c6ea43f11c8bd5753cdf23469e60754a731c6',1,1,'authToken','[]',0,'2020-12-21 03:36:25','2020-12-21 03:36:25','2021-12-21 09:06:25'),('73ee2b80cb250cf1bb19a47ddcb4d976862ca2ec9e3a80bf5762e4e35f03218e61c2c72277b67382',4,1,'authToken','[]',0,'2021-02-13 13:14:11','2021-02-13 13:14:11','2022-02-13 18:44:11'),('751b914bd230bf5aa381aabd5d7e9973c900b8c79fd4c5681214cca6113d03de629c833e1e2ebe70',1,1,'authToken','[]',0,'2020-12-01 05:43:27','2020-12-01 05:43:27','2021-12-01 11:13:27'),('761c13fb2ce988a7063e1c34e955e1f4256869d22005e3ef1f6e065d29b2ed5bc24a5aea812bdaf3',2,1,'authToken','[]',0,'2021-02-07 02:29:07','2021-02-07 02:29:07','2022-02-07 07:59:07'),('7788531a3d458d727c1f7c3f3aa9ba204a7334f39e8266d12fd46f68a233706fa7391d08c2b4f2c0',3,1,'authToken','[]',0,'2020-11-19 00:18:35','2020-11-19 00:18:35','2021-11-19 05:48:35'),('77a34b20f1cb5e04418de2cf5fe566b8ebb6ad2a697249ab39d29d4c6426d4b03a3a18a674914991',1,1,'authToken','[]',0,'2020-11-02 23:02:12','2020-11-02 23:02:12','2021-11-03 04:32:12'),('789e1c4184233c792ec1f1b209fac45bf91acc9e5bc999a21adcf862e9086a1e4ff6dce0fc0aba14',4,1,'authToken','[]',0,'2021-02-13 01:59:54','2021-02-13 01:59:54','2022-02-13 07:29:54'),('78efe10caad21bb62190b2e9adab4ffda1179fc36265dc4db523e650c2431fb2e1c07bb08225b20e',2,1,'authToken','[]',0,'2021-02-05 00:47:19','2021-02-05 00:47:19','2022-02-05 06:17:19'),('78f969f198664cdbf8f14a2f64c7dae2594e16fec0da5cfcfb2d66eaaaacabad5b5b9f8fda9f4277',1,1,'authToken','[]',0,'2020-09-18 12:56:22','2020-09-18 12:56:22','2021-09-18 18:26:22'),('7b2a92d516c588af95860ab588046ae47b7fd120f0c0d2a89177251906582eb8d1fd5326c6d71493',4,1,'authToken','[]',0,'2021-02-08 11:32:03','2021-02-08 11:32:03','2022-02-08 17:02:03'),('7b6062469ec6f4093d202fafe1cb53ca83187e84f3aa0ba4b9634c9c5c33118e95ce65897dba08fd',23,1,'authToken','[]',0,'2020-12-02 08:37:33','2020-12-02 08:37:33','2021-12-02 14:07:33'),('7c5a091b6ede55be4844a3aef47a56de7777dc58dcddd924dca29da626f93709c52cc1521e9857e0',1,1,'authToken','[]',0,'2020-09-18 12:52:20','2020-09-18 12:52:20','2021-09-18 18:22:20'),('7fcf62ae2ffd0521e099d8eed570d3ad32e4ed8c49125a59185ec52cfd8ad73e014f0af9a58702ad',4,1,'authToken','[]',0,'2021-02-07 03:50:22','2021-02-07 03:50:22','2022-02-07 09:20:22'),('7fcfd6b3fb6429a7f6dfa3f310a4c7217016d3a697b17994fb847d58cb5abc22b665f07a68c80663',1,1,'authToken','[]',0,'2020-09-21 14:34:20','2020-09-21 14:34:20','2021-09-21 20:04:20'),('8002097fe5609b49bdb26e5038803cdcccbf0890455eed7ecc86de4192eeb9e422d004974347ecb7',1,1,'authToken','[]',0,'2020-12-21 04:02:46','2020-12-21 04:02:46','2021-12-21 09:32:46'),('805cd152aa8bbc65ab25e917a73a179472c85400a5d2620634df652d80d9df59d940486536e71b28',2,1,'authToken','[]',0,'2021-02-05 01:12:44','2021-02-05 01:12:44','2022-02-05 06:42:44'),('8091ca950455dc10e7fbae90e6f5c283052fb2c5708d31111738044959dda4a1e1b7271a4fa87392',3,1,'authToken','[]',0,'2020-11-23 07:38:31','2020-11-23 07:38:31','2021-11-23 13:08:31'),('8122087b4b31f83057a35708ddedebb8497f9795fa2807c3694e82673217be2b5af85f5284b37e58',1,1,'authToken','[]',0,'2020-09-21 16:04:20','2020-09-21 16:04:20','2021-09-21 21:34:20'),('81652be8a1298bdfb4781e56b99707788e2faf8ded6a3cd34f1ff73ff9921fcec2000f3b0d68ad4e',2,1,'authToken','[]',0,'2021-02-05 01:06:10','2021-02-05 01:06:10','2022-02-05 06:36:10'),('819c2652ab24ab71572b7881bdb88fdc0cac625f3542124f1ed58872f994a27a24f816d2ae8d60e5',1,1,'authToken','[]',0,'2020-12-22 06:53:12','2020-12-22 06:53:12','2021-12-22 12:23:12'),('81ce3d6b7f2ff9fcba479f75fd96a52e25134dd5b35c4ff46a4d01ab8b33cc9e92113be24651b9ad',1,1,'authToken','[]',0,'2020-09-18 13:02:34','2020-09-18 13:02:34','2021-09-18 18:32:34'),('82e7fc478e51b1d6ff8a34255e144c93c37fed5f4979bb27f2dc01aa5c24e8008ad071aa9b65a1c1',1,1,'authToken','[]',0,'2020-09-21 23:52:04','2020-09-21 23:52:04','2021-09-22 05:22:04'),('8307d90d3ac1be2c0acb23c45d0b05b3a7b2244bdf52e1fdae1f07fadd1a2fbb6ab1eeb5fe2dea39',4,1,'authToken','[]',0,'2021-02-15 04:51:41','2021-02-15 04:51:41','2022-02-15 10:21:41'),('831fbdfba338e2db34847c4f6f1eb02cc6ace356c040337cc3347b80cbe4aac1201639d9bfd10bae',13,1,'authToken','[]',0,'2020-12-04 00:22:56','2020-12-04 00:22:56','2021-12-04 05:52:56'),('83ade80ba25a1142bd02f48a2d0cada267a4685eb07e04fecd551c38d82b16944057b2b1497d0033',25,1,'authToken','[]',0,'2020-12-02 08:55:15','2020-12-02 08:55:15','2021-12-02 14:25:15'),('841365bf1dca776e1d76461ed528b37d795a26eee686dbd4f206443dc1175a19c4250ff710d390a6',1,1,'authToken','[]',0,'2020-09-22 23:44:49','2020-09-22 23:44:49','2021-09-23 05:14:49'),('8460847c26730bbd999890c59a4e69a04135caa12c7deece68467fb40f4bc7ba716eb286e31e16cd',1,1,'authToken','[]',0,'2020-09-21 16:13:42','2020-09-21 16:13:42','2021-09-21 21:43:42'),('858fd80809a1fc6092bd47ffa6ee5b1700516f82914d7e956c1f76360655147e4b530d6dcd936343',1,1,'authToken','[]',0,'2020-09-21 16:12:33','2020-09-21 16:12:33','2021-09-21 21:42:33'),('8623e9b22d399f28e77961f63da690195574187250853fcf7459ea1c767c19d639e605f74faad0aa',4,1,'authToken','[]',0,'2021-02-08 05:11:09','2021-02-08 05:11:09','2022-02-08 10:41:09'),('87134786b2dea973086b97df707eff0d16f39de349d0616995d10f9e6af420ee596a6f6e590a9b59',4,1,'authToken','[]',0,'2021-02-13 00:57:13','2021-02-13 00:57:13','2022-02-13 06:27:13'),('873b5ebdf4c32026a24b04548d2cbf6ca3b237c4557cd1a29f58e0b6ce5aba26b6194cd352fc7144',1,1,'authToken','[]',0,'2020-12-09 05:26:18','2020-12-09 05:26:18','2021-12-09 10:56:18'),('87d5a58c345d80c5f798332c1168b365942921ece1622c37e7b9ecfe92a6b310f5652055d33b3c25',4,1,'authToken','[]',0,'2021-02-15 09:29:14','2021-02-15 09:29:14','2022-02-15 14:59:14'),('88097aaec27de9751a850ef34b1aabd2213ecb7fed427e1dfe7dba8b2e576890aaba4efa65285db9',2,1,'authToken','[]',0,'2020-10-21 13:22:42','2020-10-21 13:22:42','2021-10-21 18:52:42'),('88636aeb9d93d72c9ea4e79cfb9c93e4974091b153e4d1843a5ef499d785de8877fdca6e8407f13b',4,1,'authToken','[]',0,'2021-02-15 08:53:16','2021-02-15 08:53:16','2022-02-15 14:23:16'),('8876640f01400299d799ca99dcc35e6d5ca6ea69b253d5760d61dcb0c6523351dc1d0c3982418f99',5,1,'authToken','[]',0,'2020-11-28 04:42:26','2020-11-28 04:42:26','2021-11-28 10:12:26'),('88cd80b575ee991b4f04e702c79ec65524bc57146df685811a9226f8981ed253692276cbb079c357',12,1,'authToken','[]',0,'2020-11-23 06:07:30','2020-11-23 06:07:30','2021-11-23 11:37:30'),('8938d0e671d323f7130bc0986b29be9a6d08f8848808e1bd631004d2c620a80817c448f98b650b8f',9,1,'authToken','[]',0,'2020-11-23 05:28:20','2020-11-23 05:28:20','2021-11-23 10:58:20'),('89732c2bce4010e86da234478f3d0840e5a3c7d060b2a57770eda378c194afd803f28cbd0543f56e',1,1,'authToken','[]',0,'2020-09-21 14:27:46','2020-09-21 14:27:46','2021-09-21 19:57:46'),('8a297658f408df14ded7f9be5fe7ed93d2d43813c7a1892f45c93e1949e9589fb7e831d9a9853546',1,1,'authToken','[]',0,'2020-12-01 05:43:27','2020-12-01 05:43:27','2021-12-01 11:13:27'),('8a6c7c229bd793b14ed82393e2cfcb072d014b3af2a53ffb7f54655482544a0c9208f6cbdc3ef7f8',13,1,'authToken','[]',0,'2020-11-23 06:18:07','2020-11-23 06:18:07','2021-11-23 11:48:07'),('8b4506f619fce33444326c060ae887f9bd599de0acc6c70580905dceee490316b8371e49faede35e',1,1,'authToken','[]',0,'2020-09-18 08:29:22','2020-09-18 08:29:22','2021-09-18 13:59:22'),('8bd9985d1cd6206398d077576689fbbe4fd8ac3d92f3070faa458bf6d4ced2accd050eb59224cac1',1,1,'authToken','[]',0,'2020-09-18 12:52:20','2020-09-18 12:52:20','2021-09-18 18:22:20'),('8c222f31bcfa6cd6db094e558c5e249252a665abd1ce9e5844092daa98748d03bda53e67ed986850',12,1,'authToken','[]',0,'2020-11-23 06:02:18','2020-11-23 06:02:18','2021-11-23 11:32:18'),('8e3acd6758e98e3bdc0162a292c37453e129eec4c4f839c8f2868c8507db14d312fc1a2bbc10d0b7',1,1,'authToken','[]',0,'2020-09-21 14:34:20','2020-09-21 14:34:20','2021-09-21 20:04:20'),('8ee68e6de2a09e3a80a89b55d39cfddeef13fcae2d9b27dd12a35df7f455277346b55abf40719fdf',2,1,'authToken','[]',0,'2021-02-05 00:47:19','2021-02-05 00:47:19','2022-02-05 06:17:19'),('8f6f1fef63aa9f97a3c2aeb62e43f3ae58e5d2c6de9a3fc4c38905e1394eee3812871f02bf9ba35f',4,1,'authToken','[]',0,'2021-02-05 01:50:18','2021-02-05 01:50:18','2022-02-05 07:20:18'),('9059a1cc456315091b29f60f1dc7b6916cefba58075a09e3081ade30bf2880cc43d01e9c1bca64a8',4,1,'authToken','[]',0,'2021-02-16 03:31:08','2021-02-16 03:31:08','2022-02-16 09:01:08'),('90c1a102bdeaf1db835a717a24e589a9e956ca3935fd0ff250bd28db86bcb2d213faa8f57a4a3de7',1,1,'authToken','[]',0,'2020-10-21 13:22:27','2020-10-21 13:22:27','2021-10-21 18:52:27'),('90efc8f523d555430233ba1e3822b2c01a74bbfaf7064db46a66c6a834316f8bd5d390af09c04c67',4,1,'authToken','[]',0,'2021-02-15 03:35:11','2021-02-15 03:35:11','2022-02-15 09:05:11'),('90f8f1e97a306cf632546ed070362b12c44e462e92f63372ef0098bf0cd42abc432ca0a0bb5a88b6',1,1,'authToken','[]',0,'2020-09-18 13:35:36','2020-09-18 13:35:36','2021-09-18 19:05:36'),('91248e8e23c379e3d03fa831ce8da7c0e0d4d948e70cb82fcea7e86796ce2303958e1ce845b6f1a8',3,1,'authToken','[]',0,'2020-12-22 04:53:13','2020-12-22 04:53:13','2021-12-22 10:23:13'),('92976b21419133354113360ad1464a2c68a6cd2febdce664df6e345088079989dc49fc17037c4af4',1,1,'authToken','[]',0,'2020-10-31 07:47:52','2020-10-31 07:47:52','2021-10-31 13:17:52'),('938fc25c83d68f8d2784200f7bdeebd54b627b9f0950509647c5c38e0bad4704570b6a3552a59153',2,1,'authToken','[]',0,'2020-10-21 13:23:04','2020-10-21 13:23:04','2021-10-21 18:53:04'),('946bc119689ddabb7961fce6d91129eef2200d91acb9f97c42a87f4dda6b049ae4ce29af75427073',1,1,'authToken','[]',0,'2020-09-18 13:35:36','2020-09-18 13:35:36','2021-09-18 19:05:36'),('94b57d85ef4aa9b52105e7ecb5406a0e404dec5fe62e2b06e380eada4b6116e3116cffb247d6094d',5,1,'authToken','[]',0,'2020-12-22 12:46:18','2020-12-22 12:46:18','2021-12-22 18:16:18'),('950e6bf6dc5ddfef54f8fcfacff3c1b1930003488b547cd1e62fda8a8c3978dd76fbc3d25b216e6d',3,1,'authToken','[]',0,'2020-12-22 01:10:22','2020-12-22 01:10:22','2021-12-22 06:40:22'),('958fdf0c491083ea30dd6fdc9400ea09c7be62ffaca7cb8aad77e21e07ce3a26ad06dab6c1326da3',3,1,'authToken','[]',0,'2020-11-23 07:46:45','2020-11-23 07:46:45','2021-11-23 13:16:45'),('95fc58f97dbe9aa082964856aace862e89b7ae2e5a04293bdac4a5be84379c2be4211d091df58c43',5,1,'authToken','[]',0,'2020-11-24 13:19:31','2020-11-24 13:19:31','2021-11-24 18:49:31'),('97a35562daeeaab994b9b098d154f6e0611006be7b5594390e5b04e41955f64b306607c6871da254',4,1,'authToken','[]',0,'2021-02-15 09:13:39','2021-02-15 09:13:39','2022-02-15 14:43:39'),('97adf28c06b0022364fe5f26e5ceea34b72ab9644db0fba9f5d3e9d8905d6fe30e460a25754e99fa',4,1,'authToken','[]',0,'2020-11-23 02:45:08','2020-11-23 02:45:08','2021-11-23 08:15:08'),('9838f461265392f6fda9992526882cc3a36fb8b3a0039f4f23e1e654812fbb87477138b617213502',3,1,'authToken','[]',0,'2020-11-24 12:46:51','2020-11-24 12:46:51','2021-11-24 18:16:51'),('99c79f43238a279471c8a39e20b3046fdcfe46c834b02d70b18f6482ad82e116254f122d2490dd91',4,1,'authToken','[]',0,'2021-02-09 03:09:40','2021-02-09 03:09:40','2022-02-09 08:39:40'),('9a81b1eb31f17778f05fb2ab1d2cccf17927bc003a96607ce66a64bb3b88e21fbb611cd4738c1823',4,1,'authToken','[]',0,'2021-02-13 16:16:10','2021-02-13 16:16:10','2022-02-13 21:46:10'),('9b63554734d22c1fe208fdc7d7c30a41cc30cbbc463b9b673a493df263e2471ee0f0bcc566a45620',3,1,'authToken','[]',0,'2020-12-17 05:35:02','2020-12-17 05:35:02','2021-12-17 11:05:02'),('9c914578e9342f96ddeaa76f42d73f3a8d67f38a428388177609ad8d5cee755bfec9b38c0e1f896b',4,1,'authToken','[]',0,'2021-02-15 01:46:47','2021-02-15 01:46:47','2022-02-15 07:16:47'),('9de67d2bf88843f270521698aff56ef1cf1b11bfbe1c7bad5092d5aea86487a6997ed7cbdacb1dc0',20,1,'authToken','[]',0,'2020-12-02 08:31:45','2020-12-02 08:31:45','2021-12-02 14:01:45'),('9e1eb26b44e76d3342bf2c6c6fbb7b1db2728eb52b28a3e3637cd491ef18ba6d76b268ae26fa537b',3,1,'authToken','[]',0,'2020-11-23 08:24:20','2020-11-23 08:24:20','2021-11-23 13:54:20'),('9eaa3fd95118db34147a832e06b5696dc858dadbc06d9766c0c2fea919e5a29bcc63593f5ed621f6',13,1,'authToken','[]',0,'2020-11-23 06:08:20','2020-11-23 06:08:20','2021-11-23 11:38:20'),('9ed1467288acca0a27156a1eae60294ed85dd06a790a06b5a375fb2a2676f9cbe3ecc7bb1f429530',1,1,'authToken','[]',0,'2020-12-21 08:48:32','2020-12-21 08:48:32','2021-12-21 14:18:32'),('9f963376ca5fede8b6439071b2f3bd20b90b929e1f13d6ff3b5814be635e5e584a4f81a010d23f8a',15,1,'authToken','[]',0,'2020-11-24 12:31:15','2020-11-24 12:31:15','2021-11-24 18:01:15'),('a493474115f09551e4b030cadfca5115114a17cdbe0b4c88d3e12a9086ac034d18d03a5a6e6ab594',12,1,'authToken','[]',0,'2020-11-23 05:58:25','2020-11-23 05:58:25','2021-11-23 11:28:25'),('a4e85b158a79e93e171e5ce80f20a1349e379fe38b376e8feda7ab73d4d94b7394a4174366ee3a5e',13,1,'authToken','[]',0,'2020-12-03 13:48:19','2020-12-03 13:48:19','2021-12-03 19:18:19'),('a64338dd60a829c50d3a018092106ec298189071dbe99a2464425c9ab19c69267b659d89ab060a79',4,1,'authToken','[]',0,'2021-02-15 04:55:39','2021-02-15 04:55:39','2022-02-15 10:25:39'),('a66ea1b8b8e508878863b466d388efd2fbb8192fde468c5bcf3a295644fe873c2da063a09c8a8714',13,1,'authToken','[]',0,'2020-11-23 06:51:09','2020-11-23 06:51:09','2021-11-23 12:21:09'),('a69a42bf919b06baa70fc8021b74329b12a36755aebada24b0bcef60bdd508d90fc443a8447e50ff',1,1,'authToken','[]',0,'2020-12-03 05:32:48','2020-12-03 05:32:48','2021-12-03 11:02:48'),('a6d081581ce804cef53555d0bbc1a53f181f8ca9b02d20c7f255c37774f4a38679397cfb834b6ad7',1,1,'authToken','[]',0,'2020-09-18 13:05:39','2020-09-18 13:05:39','2021-09-18 18:35:39'),('a7cc5b1be0b26a3dbc3928c7ae92c7e68444968dda2f2f05797816a109bebc88290a93c84e7c787f',4,1,'authToken','[]',0,'2021-02-09 02:33:52','2021-02-09 02:33:52','2022-02-09 08:03:52'),('a7ce68da0948196e1770c115385e3e08028692d30e2d9f67d9ab70a16903a4d81c597bb1352c8b7d',28,1,'authToken','[]',0,'2020-12-22 12:29:32','2020-12-22 12:29:32','2021-12-22 17:59:32'),('a85df569a2a0b782a496f96ce196ce25fd31e96178be086aac3526b6b3f1c21114138b81ca5acba6',4,1,'authToken','[]',0,'2021-02-09 04:06:23','2021-02-09 04:06:23','2022-02-09 09:36:23'),('a9685f7397522f8ad59542a9984e07a04829b137af912d90ba4c834493bd1a9470ad5489eae1aac7',1,1,'authToken','[]',0,'2020-09-18 13:20:33','2020-09-18 13:20:33','2021-09-18 18:50:33'),('aaee1c2fe3af3577ac10f928ca956d6e1e594b3448a2a59fff27e28cdcdb2e9755c42106f11fb0cb',3,1,'authToken','[]',0,'2020-12-22 02:42:37','2020-12-22 02:42:37','2021-12-22 08:12:37'),('aafe11c34bf740014d39737b6ee5e4ce91b8953295a7aeee477507a223cbfa70000ae62a62c08e0d',4,1,'authToken','[]',0,'2021-02-15 09:33:59','2021-02-15 09:33:59','2022-02-15 15:03:59'),('adfbf21dcb01b1b6311dc3145d1a3ce1c8880206920e4ae17e03464f768c2e3aa51685bd76a4c0a9',4,1,'authToken','[]',0,'2021-02-04 23:20:19','2021-02-04 23:20:19','2022-02-05 04:50:19'),('ae01efc85ac38351afcfb70df94e7730d0a025cb2862310afec9ecde02a8764fc0115cada3d369f8',28,1,'authToken','[]',0,'2020-12-04 00:47:43','2020-12-04 00:47:43','2021-12-04 06:17:43'),('ae6387d08a1a872228f2d6c8e4fa2f66948c1ffc8cf3236debcd528b950b4995c18f271a04de23e3',4,1,'authToken','[]',0,'2021-02-08 05:08:43','2021-02-08 05:08:43','2022-02-08 10:38:43'),('aec4e61d07b451f86854cd9dc29649f48674a5d31301a6bd2c3bdeb3954f99a59fb87c1066f493ff',20,1,'authToken','[]',0,'2020-12-02 08:31:15','2020-12-02 08:31:15','2021-12-02 14:01:15'),('af89dc251db82d596665354962dcf5ee9c28019093915f265add108c6378fe5983f4761f9a4278c2',4,1,'authToken','[]',0,'2021-02-08 06:21:29','2021-02-08 06:21:29','2022-02-08 11:51:29'),('affc1681f9830e5f3334ead6cc6c0d874e3b823cb61013c12662abd1de14e8977ab0e10437ea136b',4,1,'authToken','[]',0,'2021-02-08 05:11:09','2021-02-08 05:11:09','2022-02-08 10:41:09'),('b0207a241cc85fd14e2f68bd5774e504508989552ba064b4baf901fbcd733b765e89a725295ba59c',28,1,'authToken','[]',0,'2020-12-04 05:36:57','2020-12-04 05:36:57','2021-12-04 11:06:57'),('b17cc0f1651caca5cfdcf0bacd536f154221f94c116f1436db600bad6c0033c8cbe1a48beaeea45c',4,1,'authToken','[]',0,'2021-02-14 00:25:04','2021-02-14 00:25:04','2022-02-14 05:55:04'),('b4428b35a70ec004f7e31d0687a64d0c2cef50d44c0b4797979666c742cb39c5c29b96f50c586474',1,1,'authToken','[]',0,'2020-09-18 05:46:41','2020-09-18 05:46:41','2021-09-18 11:16:41'),('b51b07e2158b2dbfe8a49ddf41ebf2a3f7f620dfce3574b633f3f39ca665373db1ea7d55ae92924a',1,1,'authToken','[]',0,'2020-12-09 05:26:18','2020-12-09 05:26:18','2021-12-09 10:56:18'),('b6837900ab800b35e5c1ab86cd4d1c02fb09b3ff9cbdb8db0f9114613f4037d23ff6ace53aa1d8e8',4,1,'authToken','[]',0,'2021-02-07 03:28:59','2021-02-07 03:28:59','2022-02-07 08:58:59'),('b697128fc3cb0b6f80af25e3d0efca6a57d1b7a572adec492a57a5ecf8bfc7c6f795d7a4b6cce648',4,1,'authToken','[]',0,'2021-02-05 01:50:17','2021-02-05 01:50:17','2022-02-05 07:20:17'),('b70df5dd5e7e68b66a7e161201860aee11f673ac86da03bb0144c4f01453ab06ed726e03ca0553a9',4,1,'authToken','[]',0,'2021-02-15 01:54:21','2021-02-15 01:54:21','2022-02-15 07:24:21'),('b7395c1cedfdfb475692e9a046ccde81b8b587795b59c4c920a7d2857028f26dae424b80fbcb4fe4',3,1,'authToken','[]',0,'2020-12-07 07:44:47','2020-12-07 07:44:47','2021-12-07 13:14:47'),('b798e8f6284416db47295d470b25d5b9eaf09be330a55f210a42fd0d93c7fc02807b95d23531fe9e',1,1,'authToken','[]',0,'2020-09-17 11:03:35','2020-09-17 11:03:35','2021-09-17 16:33:35'),('b7a4941e58a9eaa3ea2181fbf66a7b5e7205bd9f1556b440d7ffc23306a2726aeba2cb49daa3c293',3,1,'authToken','[]',0,'2020-11-21 06:45:17','2020-11-21 06:45:17','2021-11-21 12:15:17'),('b818e6bc2e55da95a5d554ea10daa28dd269f8b7653f30e5f069a6f78ce6f7cb31f79eb2b15c979a',1,1,'authToken','[]',0,'2020-11-23 07:49:03','2020-11-23 07:49:03','2021-11-23 13:19:03'),('b83628689fe0c95e55e733a58be56b933620c0d8f5d99c61e93db0a952b1919751c845ca300f6f2b',11,1,'authToken','[]',0,'2020-11-23 05:31:52','2020-11-23 05:31:52','2021-11-23 11:01:52'),('b88d934cd245794f49f12536c1585fca2c29de4f61b3a835eb3c9736c62ca83a2531468ff15abd42',2,1,'authToken','[]',0,'2021-02-05 00:08:37','2021-02-05 00:08:37','2022-02-05 05:38:37'),('b8d13b2202044603bacc1755ca2d5db3126a046864812b39c8008b1d1ac36cd9fcbdebbf8fb1eded',4,1,'authToken','[]',0,'2021-02-13 13:14:11','2021-02-13 13:14:11','2022-02-13 18:44:11'),('ba16417d7a0e4f95107031c0dd0301fca276f40271b7beb2e13df67d241e8f1d62d236a4dfdb4cdc',28,1,'authToken','[]',0,'2020-12-04 00:40:44','2020-12-04 00:40:44','2021-12-04 06:10:44'),('ba814250a84e58928cefba1de926f87260ac6bf532b485080efc8796284c65e9e3bdf8a3e1cff5c4',14,1,'authToken','[]',0,'2020-11-24 12:22:39','2020-11-24 12:22:39','2021-11-24 17:52:39'),('ba91d5b845f30425f4eddb9ccad7dc7e0a7b67e329f71451d5b29f2ddcdfed77eddcd69e7b7d59c0',3,1,'authToken','[]',0,'2020-11-23 08:24:20','2020-11-23 08:24:20','2021-11-23 13:54:20'),('bb29affd613eeb5e270714ed3b00090c64c0c333fd5bc15a16527e9a17c85c3808c834fa1c92951c',1,1,'authToken','[]',0,'2020-09-21 22:25:21','2020-09-21 22:25:21','2021-09-22 03:55:21'),('bb5c1e52ac4635c3b43c1f621101a85bf78b1eea6f12b79a300bf7571b6a83ce777e8e9c3e4dd3a4',13,1,'authToken','[]',0,'2020-12-04 00:10:50','2020-12-04 00:10:50','2021-12-04 05:40:50'),('bb6dbf5aaed374b61353bafc019478ed0d1cce365a827d0fc59649f545b60429cd83a021c10a0623',4,1,'authToken','[]',0,'2021-02-04 23:19:17','2021-02-04 23:19:17','2022-02-05 04:49:17'),('bb910d6697454c9a63f1219e8efc2ac4e34b8d685059302431e8e1761bcc9abf856de6578003216c',4,1,'authToken','[]',0,'2021-02-08 05:35:58','2021-02-08 05:35:58','2022-02-08 11:05:58'),('bc216b94babd7f369cf53b853d8f86ae2d5772fe43c617d59926ffc2197a78ec174c675b39e16c4b',1,1,'authToken','[]',0,'2020-11-21 02:18:30','2020-11-21 02:18:30','2021-11-21 07:48:30'),('bc4760c40629e3baec2094b21eb7843437894155ea5d5c8fd96a83a8a13338d4b1b8ffc8222616a6',4,1,'authToken','[]',0,'2021-02-15 04:53:28','2021-02-15 04:53:28','2022-02-15 10:23:28'),('bcf727351b96ab4a862473eb595fcf1b5a85abad2508434b35acf5f08ba746fe316a93b781e3a81b',4,1,'authToken','[]',0,'2021-02-15 06:34:00','2021-02-15 06:34:00','2022-02-15 12:04:00'),('bd4578183c86ada6327ee4a6837f83195eec6669f3a45b466d3c0985d67b6771d49efb06d4425949',4,1,'authToken','[]',0,'2021-02-15 09:04:27','2021-02-15 09:04:27','2022-02-15 14:34:27'),('bd5e9e031ac4750c4b3d7b81c6d3dcf84a557ecfae76116274263d17d8ed6f8709c43ba9f94244c3',4,1,'authToken','[]',0,'2021-02-15 02:51:05','2021-02-15 02:51:05','2022-02-15 08:21:05'),('be77883299d8d669be70f55e90104364b5a05b123bd2381cfef5a638368da52f7cd41f169d9a4df9',1,1,'authToken','[]',0,'2020-09-18 12:56:22','2020-09-18 12:56:22','2021-09-18 18:26:22'),('bec2187cf21d54187547c33fa7b72f8db8a63761b7f0a23eb1944e9dc80b057c53598c66d863e66e',1,1,'authToken','[]',0,'2020-09-21 23:20:36','2020-09-21 23:20:36','2021-09-22 04:50:36'),('bf561519a2e2c36c224ff72973b03cefda8dc9dcc0330509b57944b71d3e809883acebe22a3ba28e',4,1,'authToken','[]',0,'2021-02-15 09:33:59','2021-02-15 09:33:59','2022-02-15 15:03:59'),('c088a194035c7e1d3e0aa2c05a8ffa11bf8b9c9524f784e55dca383747e2dfa265d31f2939cb2bcb',4,1,'authToken','[]',0,'2021-02-09 03:59:00','2021-02-09 03:59:00','2022-02-09 09:29:00'),('c1a9ed48242767e7c3b65f9642936ea381aa8d2c9a9c4b281b4cc51927056767205ea594eef0da7f',1,1,'authToken','[]',0,'2020-09-21 23:22:17','2020-09-21 23:22:17','2021-09-22 04:52:17'),('c228e475109f8b077a2e0b8b9ed3b1769a9c5f6af8068e19eaa4f24aa275f9ed99e671b851d0dd33',4,1,'authToken','[]',0,'2021-02-04 23:19:21','2021-02-04 23:19:21','2022-02-05 04:49:21'),('c24b68ea485b16eded68d5e21b1a6f538eeba989faadbd639582ac934832be37321dde3d419960fc',4,1,'authToken','[]',0,'2020-11-23 02:20:08','2020-11-23 02:20:08','2021-11-23 07:50:08'),('c25c019c2256f6abcbfb7bd9a5b14926e2c6c9e395ff09e0ba76aa1cbc9eaae712871b822abf8f02',2,1,'authToken','[]',0,'2021-02-04 11:53:09','2021-02-04 11:53:09','2022-02-04 17:23:09'),('c299eb41477db61b89a19b369ba6a379099d089bd429693107a639b1679ad934e5ee0af39309ea98',3,1,'authToken','[]',0,'2020-11-23 02:46:30','2020-11-23 02:46:30','2021-11-23 08:16:30'),('c29a6aa87fdde201d68db11cafe6a6c4b54a8f2caf83f7efcdcea0a2d1f06d29ef4f1cbd0adef704',4,1,'authToken','[]',0,'2021-02-15 03:47:03','2021-02-15 03:47:03','2022-02-15 09:17:03'),('c2d80f2acef2a9ccb793ba4aa5196993dacf50a8074cd9d702d2067a397b2e7345fefdaba2e39904',3,1,'authToken','[]',0,'2020-11-23 07:46:45','2020-11-23 07:46:45','2021-11-23 13:16:45'),('c43754785d004797e0a7619afddc5be87ff181100ccaee67d272d3ed7ed131160d4a7bcc2f2fa6ba',4,1,'authToken','[]',0,'2021-02-09 02:59:27','2021-02-09 02:59:27','2022-02-09 08:29:27'),('c471d3bc86dc187b244c5d74ee3b3cd0b51c73e6cf6a7431365c8e5132b7249817451e02fd272cb0',3,1,'authToken','[]',0,'2020-12-19 04:44:58','2020-12-19 04:44:58','2021-12-19 10:14:58'),('c4d9a31711bfb7c8882c4954aa5fb90aff297590075c086e3e71b377cc96752985d145d0699ea289',4,1,'authToken','[]',0,'2021-02-09 02:33:52','2021-02-09 02:33:52','2022-02-09 08:03:52'),('c5688e0eed699abd929a28c350d180dd92a8bcf474bb27058f138fb4eb0e28c34fc85bd6aa6a2630',1,1,'authToken','[]',0,'2020-11-02 02:06:31','2020-11-02 02:06:31','2021-11-02 07:36:31'),('c57493bbb9fba3a35fc9fc53fb4b61126c6726ffabb7ee6a04586aefd3185776a3d50dfa7a168c73',3,1,'authToken','[]',0,'2020-12-19 02:06:13','2020-12-19 02:06:13','2021-12-19 07:36:13'),('c5c7139d4a171cb2d645d3ef77a379a12adbea7aae37842c9869ea52cc6c2a70e382f080462f5e78',1,1,'authToken','[]',0,'2020-12-21 03:06:20','2020-12-21 03:06:20','2021-12-21 08:36:20'),('c6816e5a9fae27b395163f4c252ae73137df6f4253cf84ff93db954e04341852527e74d9ca1550da',13,1,'authToken','[]',0,'2020-11-23 06:18:07','2020-11-23 06:18:07','2021-11-23 11:48:07'),('c7a56d6868cbb15fbe76c129340eab2a746db636a67942b09b96adc0bd5a1a8d55a6a90b726ae410',1,1,'authToken','[]',0,'2020-11-21 02:18:30','2020-11-21 02:18:30','2021-11-21 07:48:30'),('c7c9b34d3e9a7ab6888134bb6830bd5a985b92a20310a9a2f5ba0953a289ea781749cc715749731a',2,1,'authToken','[]',0,'2021-02-04 11:53:10','2021-02-04 11:53:10','2022-02-04 17:23:10'),('c85320ed6919108b572a9db88b89bad090328c84138bc491f8618617172af97ecb5c2d696378edf2',3,1,'authToken','[]',0,'2020-11-24 12:46:51','2020-11-24 12:46:51','2021-11-24 18:16:51'),('c8766f6341b9c03a27223237bdd5987f73beb278f67fd59da466434498c22701284cd21f04471aaf',4,1,'authToken','[]',0,'2021-02-15 08:16:18','2021-02-15 08:16:18','2022-02-15 13:46:18'),('c88714cf1514ace2e8a9a56f2e48b2d1776e291f4cdc7e0d805d92f85c77aef301b777b004863ec1',4,1,'authToken','[]',0,'2021-02-15 09:31:14','2021-02-15 09:31:14','2022-02-15 15:01:14'),('c8c1f2ff463c38aba8f2b704b08ee90aa8137f754a0d0edb3201e6286fd37122cc7874df1bbfc237',4,1,'authToken','[]',0,'2020-11-23 02:20:08','2020-11-23 02:20:08','2021-11-23 07:50:08'),('c968b75ff7cc6036391da08772726db0db047abdb1f53c0a735fe45a86b389a3268372a464c63b80',28,1,'authToken','[]',0,'2020-12-22 01:16:33','2020-12-22 01:16:33','2021-12-22 06:46:33'),('ca9793f0bffa75e23772ac1e236baf41f53d1ec4cf9daad68f1395e8c90e77552196c0e327327bbd',28,1,'authToken','[]',0,'2020-12-21 00:52:58','2020-12-21 00:52:58','2021-12-21 06:22:58'),('cb240a81c83485d87dfa0c35adb82016fa1698ae13a2f7c34f5ae7fe7c2d0937947686234b111469',28,1,'authToken','[]',0,'2020-12-04 05:46:33','2020-12-04 05:46:33','2021-12-04 11:16:33'),('cb7698fc9778baada31a94a99a4c5732d00438922ad1dfc7f3ff69a69446983fd12705ee779a73aa',1,1,'authToken','[]',0,'2021-02-13 04:01:33','2021-02-13 04:01:33','2022-02-13 09:31:33'),('cb7bd6ac508c0b686141404379bf0246c996e45cce4a06534471e30b236349fa3fa6379968a14edd',3,1,'authToken','[]',0,'2020-11-18 04:24:01','2020-11-18 04:24:01','2021-11-18 09:54:01'),('cca791f739d4814f022c074d7bf64d8b07d0662a8dd1a5a9d795293da322100a2b95677826d78fd6',4,1,'authToken','[]',0,'2021-02-15 03:35:11','2021-02-15 03:35:11','2022-02-15 09:05:11'),('ce9416776fe7fd2fbe331102007721c6967dcd010c080a116edb4ae14aa0feda8949130012e6e6d9',1,1,'authToken','[]',0,'2020-12-21 04:02:46','2020-12-21 04:02:46','2021-12-21 09:32:46'),('cead25a355a1b02f84e3c7e64a3df6816ca298849eb3b73b5abf0c7ee3a9b92998c1f5f5a3fd2221',29,1,'authToken','[]',0,'2020-12-05 02:48:59','2020-12-05 02:48:59','2021-12-05 08:18:59'),('cfc16a124d3d4083496ae885c5f8fecfa298f53ee265238dcf2d93994c427f7d03d362e03ec23a7d',12,1,'authToken','[]',0,'2020-11-23 06:07:30','2020-11-23 06:07:30','2021-11-23 11:37:30'),('d0f0b872bf820c1fcff17e252a7c8e7b9802ec09833c2c13f4bf045222106ad19dda75a1c1a9ce59',4,1,'authToken','[]',0,'2021-02-15 09:29:14','2021-02-15 09:29:14','2022-02-15 14:59:14'),('d19fb1a5123e197feafa8cb0c39ed37b9d3c3047c90eb2e9423eda9e74ca9af5e6bdea30a90ffff1',3,1,'authToken','[]',0,'2021-02-07 23:30:50','2021-02-07 23:30:50','2022-02-08 05:00:50'),('d2906efcee0b6cc159f4d8da5c8a876304853b8fcee51671ee60ab8711093623b85e90e15e1c8105',4,1,'authToken','[]',0,'2021-02-15 09:13:39','2021-02-15 09:13:39','2022-02-15 14:43:39'),('d2fb4f546778c09d39d32f0e586ee1df2847cc3c7689ed593064289b0ad1362344a5e4739c67aaa2',1,1,'authToken','[]',0,'2020-09-21 23:20:36','2020-09-21 23:20:36','2021-09-22 04:50:36'),('d3271d07d8ea8cf46d2cf960a6bbe90b277f48bd7d1a458a88d621b9bc59fc5d0673b3df01538b0d',1,1,'authToken','[]',0,'2020-09-22 23:44:47','2020-09-22 23:44:47','2021-09-23 05:14:47'),('d3e92f84563972fec682b9dca071f96362276c06b2bb5a71b1585256745426a498d4d4eab2e23a93',21,1,'authToken','[]',0,'2020-12-02 08:33:01','2020-12-02 08:33:01','2021-12-02 14:03:01'),('d4ff953c0409bce1847ee238e5638d668c2a3ec20436bf261d67532fc2818f59e9fed5f3a8d1c89c',4,1,'authToken','[]',0,'2021-02-07 04:42:11','2021-02-07 04:42:11','2022-02-07 10:12:11'),('d53c2c49711f0548d5d909391ea9a1d6f419f69d110db04be6f55d5aebbde7aa3d7455f0053f815b',4,1,'authToken','[]',0,'2021-02-15 09:47:07','2021-02-15 09:47:07','2022-02-15 15:17:07'),('d59d812f962b29a766f5b4d93e85b1ecde8a0940c39d34fee89d7fc073d55f6e50ea503284015205',4,1,'authToken','[]',0,'2021-02-07 03:25:49','2021-02-07 03:25:49','2022-02-07 08:55:49'),('d5f6eac111d7df469a05b41d1f47c51f7eec466a78b39cfbe3271cdc21e5b744565496c696a81930',4,1,'authToken','[]',0,'2021-02-09 03:31:43','2021-02-09 03:31:43','2022-02-09 09:01:43'),('d605dc435dc73cd3c3e6d98fe72e10b71ca9d866c9c1f0daf2827eb9edf126f3ca7842daf3339c53',4,1,'authToken','[]',0,'2021-02-09 03:59:00','2021-02-09 03:59:00','2022-02-09 09:29:00'),('d765d214c1927aba68a7a631e406bbe3afc5396c616ae1e501cd3b5ded6c4e7b1717eea09da887d1',1,1,'authToken','[]',0,'2020-11-20 07:15:25','2020-11-20 07:15:25','2021-11-20 12:45:25'),('d7b26ab2c278df7553ee59ea9d405815ecba9fc3be1abac105446d0daddc16c72ba1fbef7fa4b355',1,1,'authToken','[]',0,'2020-09-18 13:45:00','2020-09-18 13:45:00','2021-09-18 19:15:00'),('d7b8a9be221905fd3cdf8a49c2b30aaa076ee57d66c9ada915ae5f5e9430fc0b0cb38409f5da6f50',4,1,'authToken','[]',0,'2021-02-13 04:01:54','2021-02-13 04:01:54','2022-02-13 09:31:54'),('d817fd6fe4b554162145962667a04383a84c2e2f716e4ec273782527be4e38fa339d6f79a080ead3',11,1,'authToken','[]',0,'2020-11-23 05:32:11','2020-11-23 05:32:11','2021-11-23 11:02:11'),('d8344b87acfb84149aac4289cbb9fad6c6d7d5f5df856ee8dd89b061ca64451c590d399eca6c3d26',29,1,'authToken','[]',0,'2020-12-05 02:48:59','2020-12-05 02:48:59','2021-12-05 08:18:59'),('d8437f2e8392c6be69ec04ae47e9a515ce7c4ff783a89fcd3f8a280b087b65e8e2640c3911a755ee',4,1,'authToken','[]',0,'2021-02-09 03:16:56','2021-02-09 03:16:56','2022-02-09 08:46:56'),('d861e5d3adc7f69712b9601dfed3ec2b0c22d565bd840838bd4a0d1bd9cc0dee57853e7598310aca',3,1,'authToken','[]',0,'2020-11-23 07:38:31','2020-11-23 07:38:31','2021-11-23 13:08:31'),('d9de33f371823621c69e42df4a16c4ada7964a239848dbd9b26733b39865a2664102e9007a5905b3',2,1,'authToken','[]',0,'2020-10-06 14:47:45','2020-10-06 14:47:45','2021-10-06 20:17:45'),('da2f78721a72ffb2d4f706ca70c815c2f5c458ff7c3f21bf3d4203292aec954fd4409bcc6bece8fb',28,1,'authToken','[]',0,'2020-12-22 12:36:19','2020-12-22 12:36:19','2021-12-22 18:06:19'),('dad06f0f253bb6484817c46573801b7520fd6ad5672800f03576397e338cd9dffc450c6c5d344eda',16,1,'authToken','[]',0,'2020-12-02 08:03:42','2020-12-02 08:03:42','2021-12-02 13:33:42'),('dad6022b0f688522e3ddfa04405785ae7e52b57454f5a2ce6ed3b810918f72293d9b167abafbcfdd',3,1,'authToken','[]',0,'2020-12-17 05:35:01','2020-12-17 05:35:01','2021-12-17 11:05:01'),('dadfbe2a9adf33bcdfa74898940674c0a4b6e46cdd4e2e65f045b9b0afa4177dcb7255829dd5de28',1,1,'authToken','[]',0,'2020-12-09 04:57:46','2020-12-09 04:57:46','2021-12-09 10:27:46'),('db008cfcbec3935bbecbc7f5a4afa02dfe6ad3ac2520730574beff5954bd077ea5da66c951d4ce09',1,1,'authToken','[]',0,'2020-10-26 22:55:10','2020-10-26 22:55:10','2021-10-27 04:25:10'),('dbe872a0bf92ca2083f538f91e63a9eb0166a6b7b311e75676444cb7fc88b6e7bca2c132c5d62d3a',8,1,'authToken','[]',0,'2020-11-23 05:25:49','2020-11-23 05:25:49','2021-11-23 10:55:49'),('dcbf3e975196093a4a5d2d4a9b0d3057f88e6fc3dfc0d0c23e1f5003bf5da6681794b4ef1b046f36',1,1,'authToken','[]',0,'2020-09-18 15:17:30','2020-09-18 15:17:30','2021-09-18 20:47:30'),('de27b380c5d065a1a3655cb1b116e3e37946cf6afc476a876fd1f44e53f96f401379919047afe09a',4,1,'authToken','[]',0,'2021-02-15 06:38:00','2021-02-15 06:38:00','2022-02-15 12:08:00'),('defb3bb8647a3fde5a931db1e04251049fa4e0c601cbdb998e6f2aa8ff1da0c3a393fe5471e7fea5',13,1,'authToken','[]',0,'2020-11-23 06:08:21','2020-11-23 06:08:21','2021-11-23 11:38:21'),('df77147ce64fc2023657290b7c8580e2eb8169d4a5d454110b1c0e400263e0bf4f147f20ee91a9e3',4,1,'authToken','[]',0,'2021-02-08 12:04:04','2021-02-08 12:04:04','2022-02-08 17:34:04'),('dfbf224a2b3c091cc09d3991fb31e1d05c79d862f094c52c36b841f08e40415aca6b48070e319f37',4,1,'authToken','[]',0,'2021-02-07 04:44:08','2021-02-07 04:44:08','2022-02-07 10:14:08'),('e01e6665ed70a60371506c0dad0f42871ace586ff5d4f20221ae226b50942cb9bd5a03242f7c8545',4,1,'authToken','[]',0,'2021-02-15 09:04:28','2021-02-15 09:04:28','2022-02-15 14:34:28'),('e099e36c2dad73d1ec38819e6e51292d204479d4a41f659022250b66b8336c910679e52e4786623f',1,1,'authToken','[]',0,'2020-09-21 22:25:20','2020-09-21 22:25:20','2021-09-22 03:55:20'),('e10b01aacc1337488a1a3b7380c61ad771cce3b40903efaa5ad8413dbda3ff6ac2914628bd25c4cc',1,1,'authToken','[]',0,'2021-02-13 03:42:35','2021-02-13 03:42:35','2022-02-13 09:12:35'),('e10b65a45435bf137063d3bf340950be11c5ad840f110d77974eb3165b7b8cf503a0f2eeea54e398',4,1,'authToken','[]',0,'2021-02-08 22:40:38','2021-02-08 22:40:38','2022-02-09 04:10:38'),('e1f45289cf244d34e50c651a706cee5060e5f31b9a63e17b0daeb972a85fee0c66192dfe95cb6515',29,1,'authToken','[]',0,'2020-12-05 01:08:22','2020-12-05 01:08:22','2021-12-05 06:38:22'),('e3950fb11b5cd3e351122a82da606aeda6323efcfa92dbb75fb502878ac4f4402b8bc1217f5700af',22,1,'authToken','[]',0,'2020-12-02 08:36:01','2020-12-02 08:36:01','2021-12-02 14:06:01'),('e3b178695be78ffaed5f8c28ca6de47893edc30ab77551a03579c9516a9f69d5997902a381f59a8e',4,1,'authToken','[]',0,'2021-02-09 01:45:20','2021-02-09 01:45:20','2022-02-09 07:15:20'),('e3c2fd69c775db29eecc75facdf523657591ccb5d630740204afbe55f536496c238c51b51a7f3e6a',4,1,'authToken','[]',0,'2021-02-07 03:25:48','2021-02-07 03:25:48','2022-02-07 08:55:48'),('e420c32b5e6790741a8dd1e54c6533eef5535b2561c213838bf4d268dfc997f03fc3f4816e54db9f',15,1,'authToken','[]',0,'2020-11-24 12:31:03','2020-11-24 12:31:03','2021-11-24 18:01:03'),('e5d9cf5de9e8f520f8c8c84082537bddbf93ad3fc3fc9cf535676419cea6ca72cce2d93f5d046c6f',13,1,'authToken','[]',0,'2020-11-23 06:16:57','2020-11-23 06:16:57','2021-11-23 11:46:57'),('e868cfb1b0722dc70138e966ae4c029370f8b493ccb45629f9c9bbeb3dad40f86eb0635e167ea851',26,1,'authToken','[]',0,'2020-12-04 00:18:21','2020-12-04 00:18:21','2021-12-04 05:48:21'),('e88a2ab4a820996a9540373447d5fddf0fdc342f5e5912f30de3e0f9246084358c38de00d22acac6',2,1,'authToken','[]',0,'2020-12-02 07:54:21','2020-12-02 07:54:21','2021-12-02 13:24:21'),('e8ad68b417bcf800e5bb3e2a0a178963c0f231bedd5aff78cbbcda2a8d1f04d06611612baaa6a7f1',4,1,'authToken','[]',0,'2021-02-15 09:31:14','2021-02-15 09:31:14','2022-02-15 15:01:14'),('e9c2db075d01b90eab4e3333b843a5262ae6cac3eda49f7008b935cb1d052898d7fa32ed964c4f8d',14,1,'authToken','[]',0,'2020-11-24 12:22:39','2020-11-24 12:22:39','2021-11-24 17:52:39'),('ea120c8316284e6f7d09090d807225e4b686c3235b90c05c8cf4d23d0c9387cb71c28ca7a6801773',3,1,'authToken','[]',0,'2020-12-22 01:10:23','2020-12-22 01:10:23','2021-12-22 06:40:23'),('ea2b2f05359f6c5dccb89f2382db09b92ea6b9bad8902b4a9cfd7cc2b75e7b9520cf7b01bd00fa5d',2,1,'authToken','[]',0,'2020-10-21 13:22:42','2020-10-21 13:22:42','2021-10-21 18:52:42'),('ea305c8399af5c216f71e6870b93bcf1fed9baf95ae3b2daab87ac0d6532363b5b313a4da163914a',1,1,'authToken','[]',0,'2020-09-18 13:23:23','2020-09-18 13:23:23','2021-09-18 18:53:23'),('eaa7b9b78f0e344ee5e356ec3906ac13fe717639794ccb14fd2f495c3802ec99381314fa90f64fcc',3,1,'authToken','[]',0,'2020-11-23 07:41:27','2020-11-23 07:41:27','2021-11-23 13:11:27'),('eaedcf1de1231499249dda432770b6c8747d34d550b265d7079354e116fb1aa30aa567f507e06c66',4,1,'authToken','[]',0,'2021-02-16 04:25:57','2021-02-16 04:25:57','2022-02-16 09:55:57'),('eb333cb5b5210602e15cd2e79620ee39bd2413f4991ead1f122f21c950022adbbba8237f4b44eb27',1,1,'authToken','[]',0,'2020-09-18 10:27:02','2020-09-18 10:27:02','2021-09-18 15:57:02'),('edc8ea9d76b3654e7d61072f23708af98d33d26cca85a9c7dbc8b562440a17dbe0787d7a4f31f46e',1,1,'authToken','[]',0,'2020-09-21 16:12:33','2020-09-21 16:12:33','2021-09-21 21:42:33'),('ee4cbc7f492fbdd4132418a0d5eec910be1546c4356c722ce83ffa076c362a24564e049c65c100a1',4,1,'authToken','[]',0,'2021-02-09 03:42:45','2021-02-09 03:42:45','2022-02-09 09:12:45'),('ef7d10853d9729ca9b43af97b09a076a78313dfff5288bfd4f2ca38b7458ea20093cb22e8a3db03b',1,1,'authToken','[]',0,'2020-10-03 00:46:12','2020-10-03 00:46:12','2021-10-03 06:16:12'),('efc336d756790908027f988de8819c88fd05d86f1312271cf943caa3df266b29b0d3cead381290ca',4,1,'authToken','[]',0,'2021-02-15 01:46:48','2021-02-15 01:46:48','2022-02-15 07:16:48'),('f03038a1d8e6b3997c44b16e295e36cedfd01c76f6e367ee361a430b0f623857820f6e016df11f3f',4,1,'authToken','[]',0,'2021-02-13 03:41:54','2021-02-13 03:41:54','2022-02-13 09:11:54'),('f035d457e36206b211d91527bbf0bbf5484c26b9a533ca833f7f6d8ae6a4febcd027d03121602f0f',27,1,'authToken','[]',0,'2020-12-04 00:24:02','2020-12-04 00:24:02','2021-12-04 05:54:02'),('f036a00062e1746fb4aa4b2857f03421b9270bd1aecacf76ef4fe8bcc8d2e404ff395fde84559042',4,1,'authToken','[]',0,'2021-02-15 03:57:41','2021-02-15 03:57:41','2022-02-15 09:27:41'),('f0411331acdaf806675d5ee65a2767600c039ae3f7296515eb646db7a34002226d39ff69740bd35a',4,1,'authToken','[]',0,'2021-02-15 03:47:03','2021-02-15 03:47:03','2022-02-15 09:17:03'),('f05400f690a9383ecb0a3fe90307d6c719b93c76a3646e4e53f05b79a25ef7d7384512d112ac3ebe',1,1,'authToken','[]',0,'2020-09-21 23:21:46','2020-09-21 23:21:46','2021-09-22 04:51:46'),('f06355c619645db840e99fbc5a1f2b9bdb4cb1af089d5f83f0a129bda4c5c10b40eba9059a144fc4',4,1,'authToken','[]',0,'2021-02-13 01:59:55','2021-02-13 01:59:55','2022-02-13 07:29:55'),('f0e878c4803b31ec5030c4cd5507e354fb8a4841fb7d48fe295892468eec028d7899838b7228bcd0',1,1,'authToken','[]',0,'2020-09-21 16:04:20','2020-09-21 16:04:20','2021-09-21 21:34:20'),('f0fe4ee7d4cc23da978438fc16c190db2e35fac8e5d63d95fd9184b80d98f54457104b748b2a398f',18,1,'authToken','[]',0,'2020-12-02 08:14:45','2020-12-02 08:14:45','2021-12-02 13:44:45'),('f184f8192441acbf53fc4e451f0b7971123a717027bff3fdd1dd72bdaf41c00727895b4cf983311a',4,1,'authToken','[]',0,'2021-02-15 06:34:01','2021-02-15 06:34:01','2022-02-15 12:04:01'),('f1f996d7a8e9dc507be51c0b480056ec4b1400ae373022a2b141eced7bde1c80d4f549d646b01167',28,1,'authToken','[]',0,'2020-12-17 10:16:47','2020-12-17 10:16:47','2021-12-17 15:46:47'),('f24e4b13356165955c0beda9eeb5dcf73d2c935e051b6fa21f0ca2708ae46d7c7dd79a7782bb9ca4',24,1,'authToken','[]',0,'2020-12-02 08:39:13','2020-12-02 08:39:13','2021-12-02 14:09:13'),('f263494a3fd3f8631822758aed283b3d5dc249430884f178a983f84e8f8d87e53020793bcab87816',2,1,'authToken','[]',0,'2020-11-23 07:35:45','2020-11-23 07:35:45','2021-11-23 13:05:45'),('f3ef8ed5154e9f21d2f2d9b06e4751cdc514b5d79f6a1ed42bb8e8420b19f76131df5513aee8e1c0',4,1,'authToken','[]',0,'2021-02-13 00:57:12','2021-02-13 00:57:12','2022-02-13 06:27:12'),('f465e9ac1bba052aec327188e37a9370a0eb777f0af3ceaebfb34a8862926ceffb14e1cfc51f0e02',5,1,'authToken','[]',0,'2020-12-21 10:00:45','2020-12-21 10:00:45','2021-12-21 15:30:45'),('f6f4e863c05a8a1b712deea6d730e6cda294e649ed9c9b21acdb6b0ecb38bf727e0d566cafa34d4a',4,1,'authToken','[]',0,'2021-02-08 11:32:02','2021-02-08 11:32:02','2022-02-08 17:02:02'),('f756efed287ddb73b709eb6983fe1ae108814d18e79b01a42aa8047c880ee5fd21a4044df09f3fca',1,1,'authToken','[]',0,'2020-12-21 05:43:35','2020-12-21 05:43:35','2021-12-21 11:13:35'),('f7b4987e88e50604fdebcabed7e5623aba57557b62c59a2cfc4694092d21ad2808be0e033088709a',3,1,'authToken','[]',0,'2021-02-07 23:30:51','2021-02-07 23:30:51','2022-02-08 05:00:51'),('f7ede0a072c9f107adc9aea626ef9741554078515650bc111bdcfd07948a1811b91150bba8bd0e19',13,1,'authToken','[]',0,'2020-11-23 06:51:09','2020-11-23 06:51:09','2021-11-23 12:21:09'),('f86819181e5e4bdce2efcb7c2e01d1a98ad5d6623369ea1338fdaaea9b9e5cf3e8e9f70fe720eac9',3,1,'authToken','[]',0,'2020-11-23 07:41:27','2020-11-23 07:41:27','2021-11-23 13:11:27'),('f8eca20bc3c3fac1756705546e8af9efad94b0b5044e0448496787e36dc0369e1b32e03a0dc0ccc4',28,1,'authToken','[]',0,'2020-12-17 11:32:34','2020-12-17 11:32:34','2021-12-17 17:02:34'),('f9121fc4e365b10a58db386f6fcd6acbe6db11ff47db0655b702bcfb0aab249c5b996ac62b9939f6',4,1,'authToken','[]',0,'2021-02-15 05:03:14','2021-02-15 05:03:14','2022-02-15 10:33:14'),('f9a3f608136802a6fda3339730259cbbf7e11265392747cac6abbbfee4e89bd348ae0ab4f289567c',3,1,'authToken','[]',0,'2020-12-07 07:44:47','2020-12-07 07:44:47','2021-12-07 13:14:47'),('fb7ab24426ce7f399a25b485a5de62cacd78c468cb47db2a683eb23ad5af89384ca96a01a6bd988c',2,1,'authToken','[]',0,'2020-11-22 23:57:30','2020-11-22 23:57:30','2021-11-23 05:27:30'),('fc643044d301be168ccfa98a4db3069ea405b7006d89aea830aa130a3dc06f3d4bddd286b9b9e022',5,1,'authToken','[]',0,'2020-12-22 12:48:40','2020-12-22 12:48:40','2021-12-22 18:18:40'),('fd58a6e81c889b514e21eb392af424833fc3321576f17c7438846f765c7556694719cecae7764fc3',1,1,'authToken','[]',0,'2020-09-18 13:45:00','2020-09-18 13:45:00','2021-09-18 19:15:00'),('fd6fbc5371cd64dce1a638e9f07711283f21614cdccde8434ccf121ec6dfa93a429f4fb3f9a9aaf7',1,1,'authToken','[]',0,'2020-10-21 13:22:28','2020-10-21 13:22:28','2021-10-21 18:52:28'),('fdb6b356f8ecdb7831905e62d9430fa463a16b17103cfcbd22b1a1f7eb8cf4a07d5231ae4b8363dd',27,1,'authToken','[]',0,'2020-12-04 00:25:55','2020-12-04 00:25:55','2021-12-04 05:55:55'),('fdce5f34485f952ff5ec0c71ecf4e21c4ea416af3deb4641d1399c6b478ccaa8a64b79b01b8a7977',1,1,'authToken','[]',0,'2020-12-19 08:15:17','2020-12-19 08:15:17','2021-12-19 13:45:17'),('fe0fdec20e633c87e8175ef980d3f6e40856f796a4e2bf7a7402771bd72a4f59014babe62cb72aab',3,1,'authToken','[]',0,'2020-11-23 08:01:48','2020-11-23 08:01:48','2021-11-23 13:31:48'),('fe1fe5cdf96cc0eb551a184a5137ead1f3071df5dcd41b35cf8430b538edf522900e5532fd005e71',3,1,'authToken','[]',0,'2020-12-22 02:42:37','2020-12-22 02:42:37','2021-12-22 08:12:37'),('feceaec11ea6a1d99c2ec9d81ed15d45d77612616c7082d7c43dbb30c728fe47aa403a4b5dd57532',4,1,'authToken','[]',0,'2021-02-16 03:43:24','2021-02-16 03:43:24','2022-02-16 09:13:24'),('ff4b2315a5f4e3a10b7d5e8b0f73aed96b09c0756d4c097b0dd4678305d50397bbfdc68124e0d6b7',4,1,'authToken','[]',0,'2021-02-15 04:50:03','2021-02-15 04:50:03','2022-02-15 10:20:03'),('ff8315987ec9e7c055c8fe2d5fb33d1acac446bbc94a5cff34c205a3ba01d6fa9a593758ad0a9d3a',1,1,'authToken','[]',0,'2020-09-18 13:20:33','2020-09-18 13:20:33','2021-09-18 18:50:33'),('ffeb4c19c1a763fb86d73ed3214eb280d5b6a081a3f441c2fd4dae5880a999394e55f2459a61d7a4',28,1,'authToken','[]',0,'2020-12-23 01:38:22','2020-12-23 01:38:22','2021-12-23 07:08:22');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,NULL,'Laravel Personal Access Client','pEupSgKjA0qHONE7yzftECKNbwOjzkvii8tX1v8v','http://localhost',1,0,0,'2020-09-17 04:11:56','2020-09-17 04:11:56'),(2,NULL,'Laravel Password Grant Client','pdWAAMPR79XF0BMrF27arv0wGux5SKodlc41XSOr','http://localhost',0,1,0,'2020-09-17 04:11:56','2020-09-17 04:11:56');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2020-09-17 04:11:56','2020-09-17 04:11:56');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `role_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  KEY `role_id_fk_334959` (`role_id`),
  KEY `permission_id_fk_334959` (`permission_id`),
  CONSTRAINT `permission_id_fk_334959` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_id_fk_334959` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),(1,11),(1,12),(1,13),(1,14),(1,15),(1,16),(1,17),(1,18),(1,19),(1,20),(1,21),(1,22),(1,23),(1,24),(1,25),(1,26),(1,27),(1,28),(1,29),(1,30),(1,31),(1,32),(1,33),(1,34),(1,35),(1,36),(1,37),(1,38),(1,39),(1,40),(1,41),(1,42),(2,17),(2,18),(2,19),(2,20),(2,21),(2,22),(2,23),(2,24),(2,25),(2,26),(2,27),(2,28),(2,29),(2,30),(2,31),(2,32),(2,33),(2,34),(2,35),(2,36),(2,37),(2,38),(2,39),(2,40),(2,41),(2,42),(1,43),(1,44),(1,45),(1,46),(1,47),(1,48),(1,49),(1,50),(1,51),(1,52),(2,43),(2,44),(2,45),(2,46),(2,48),(2,49),(2,50),(2,51),(1,53),(1,56),(1,57),(1,58),(1,59),(1,60),(1,61),(1,62),(1,63),(1,64),(1,65),(1,66),(1,67),(1,68),(1,69),(1,70),(1,71),(1,72),(1,73),(1,74),(1,75),(1,76),(1,77),(1,78),(1,79),(2,47),(2,52),(2,54),(2,55),(2,56),(2,57),(2,58),(2,59),(2,60),(2,61),(2,62),(2,63),(2,64),(2,65),(2,66),(2,67),(2,68),(2,69),(2,70),(2,71),(2,72),(2,73),(2,74),(2,75),(2,76),(2,77),(2,78),(2,79),(1,80),(1,81),(1,82),(1,83),(1,84),(2,80),(2,81),(2,82),(2,83),(2,84),(2,85),(2,86),(2,87),(2,88),(2,89),(1,85),(1,86),(1,87),(1,88),(1,89),(2,90),(2,91),(2,92),(2,93),(1,90),(1,91),(1,92),(1,93),(2,94),(2,95),(2,96),(2,97),(2,98),(1,94),(1,95),(1,96),(1,97),(1,98),(2,99),(2,100),(2,101),(2,102),(1,99),(1,100),(1,101),(1,102),(1,103),(2,104),(2,105),(2,106),(2,107),(2,108),(1,104),(1,105),(1,106),(1,107),(1,108),(1,109),(1,110),(2,110),(2,111),(2,112),(2,113),(2,114),(2,115),(1,111),(1,112),(1,113),(1,114),(1,115),(2,116),(2,117),(2,118),(1,116),(1,117),(1,118),(1,54),(1,55),(1,119),(1,120),(1,121),(1,122),(1,123),(1,124),(1,125),(1,126);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'user_management_access','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(2,'permission_create','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(3,'permission_edit','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(4,'permission_show','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(5,'permission_delete','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(6,'permission_access','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(7,'role_create','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(8,'role_edit','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(9,'role_show','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(10,'role_delete','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(11,'role_access','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(12,'user_create','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(13,'user_edit','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(14,'user_show','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(15,'user_delete','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(16,'user_access','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(17,'expense_management_access','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(18,'expense_category_create','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(19,'expense_category_edit','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(20,'expense_category_show','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(21,'expense_category_delete','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(22,'expense_category_access','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(23,'income_category_create','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(24,'income_category_edit','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(25,'income_category_show','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(26,'income_category_delete','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(27,'income_category_access','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(28,'expense_create','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(29,'expense_edit','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(30,'expense_show','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(31,'expense_delete','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(32,'expense_access','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(33,'income_create','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(34,'income_edit','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(35,'income_show','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(36,'income_delete','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(37,'income_access','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(38,'expense_report_create','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(39,'expense_report_edit','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(40,'expense_report_show','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(41,'expense_report_delete','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(42,'expense_report_access','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(43,'a_category_access','2020-09-14 01:34:04','2020-09-14 01:34:04',NULL),(44,'a_category_edit','2020-09-14 01:34:27','2020-09-14 01:34:27',NULL),(45,'a_category_create','2020-09-14 01:34:58','2020-09-14 01:34:58',NULL),(46,'a_category_show','2020-09-14 01:35:30','2020-09-14 01:35:30',NULL),(47,'a_category_delete','2020-09-14 01:35:56','2020-09-14 01:35:56',NULL),(48,'sub_access','2020-09-14 04:06:57','2020-09-14 04:06:57',NULL),(49,'sub_create','2020-09-14 04:07:12','2020-09-14 04:07:12',NULL),(50,'sub_show','2020-09-14 04:07:23','2020-09-14 04:07:23',NULL),(51,'sub_edit','2020-09-14 04:07:34','2020-09-14 04:07:34',NULL),(52,'sub_delete','2020-09-14 04:07:46','2020-09-14 04:07:46',NULL),(53,'adreport_access','2020-09-17 01:14:18','2020-09-17 01:14:18',NULL),(54,'job_cat_create','2020-09-19 05:06:29','2020-09-19 05:06:29',NULL),(55,'job_cat_access','2020-09-19 05:06:47','2020-09-19 05:06:47',NULL),(56,'job_cat_edit','2020-09-19 05:07:09','2020-09-19 05:07:09',NULL),(57,'job_show','2020-09-19 05:07:29','2020-09-19 05:07:29',NULL),(58,'job_delete','2020-09-19 05:07:44','2020-09-19 05:07:44',NULL),(59,'my_save_access','2020-09-22 03:20:42','2020-09-22 03:20:42',NULL),(60,'ujob_create','2020-10-07 06:57:30','2020-10-07 06:57:30',NULL),(61,'ujob_access','2020-10-07 06:57:58','2020-10-07 06:57:58',NULL),(62,'ujob_edit','2020-10-07 06:58:20','2020-10-07 06:58:20',NULL),(63,'ujob_delete','2020-10-07 06:58:43','2020-10-07 06:58:43',NULL),(64,'utalent_access','2020-10-07 07:46:00','2020-10-07 07:46:00',NULL),(65,'utalent_create','2020-10-07 07:46:21','2020-10-07 07:46:21',NULL),(66,'utalent_edit','2020-10-07 07:46:41','2020-10-07 07:46:41',NULL),(67,'utalent_delete','2020-10-07 07:47:08','2020-10-07 07:47:08',NULL),(68,'utalent_show','2020-10-07 07:47:43','2020-10-07 07:47:43',NULL),(69,'ujob_show','2020-10-07 07:48:18','2020-10-07 07:48:18',NULL),(70,'company_access','2020-10-08 05:31:54','2020-10-08 05:31:54',NULL),(71,'company_create','2020-10-08 05:32:32','2020-10-08 05:32:32',NULL),(72,'company_show','2020-10-08 05:32:57','2020-10-08 05:32:57',NULL),(73,'company_delete','2020-10-08 05:33:10','2020-10-08 05:33:10',NULL),(74,'company_edit','2020-10-08 05:33:25','2020-10-08 05:33:40',NULL),(75,'bc_edit','2020-10-12 04:51:45','2020-10-12 04:51:45',NULL),(76,'bc_access','2020-10-12 04:51:58','2020-10-12 04:51:58',NULL),(77,'bc_create','2020-10-12 04:52:22','2020-10-12 04:52:22',NULL),(78,'bc_show','2020-10-12 04:54:00','2020-10-12 04:54:00',NULL),(79,'bc_delete','2020-10-12 04:54:23','2020-10-12 04:54:23',NULL),(80,'jobdegree_access','2020-10-22 05:08:59','2020-10-22 05:08:59',NULL),(81,'jobdegree_edit','2020-10-22 05:09:18','2020-10-22 05:09:18',NULL),(82,'jobdegree_create','2020-10-22 05:09:45','2020-10-22 05:09:45',NULL),(83,'jobdegree_show','2020-10-22 05:10:09','2020-10-22 05:10:09',NULL),(84,'jobdegree_delete','2020-10-22 05:10:26','2020-10-22 05:10:26',NULL),(85,'uedu_access','2020-10-27 05:45:11','2020-10-27 05:45:11',NULL),(86,'uedu_create','2020-10-27 05:45:28','2020-10-27 05:45:28',NULL),(87,'uedu_edit','2020-10-27 05:45:47','2020-10-27 05:45:47',NULL),(88,'uedu_show','2020-10-27 05:46:02','2020-10-27 05:46:02',NULL),(89,'uedu_delete','2020-10-27 05:46:20','2020-10-27 05:46:20',NULL),(90,'uwork_access','2020-10-29 02:06:58','2020-10-29 02:06:58',NULL),(91,'uwork_edit','2020-10-29 02:07:13','2020-10-29 02:07:13',NULL),(92,'uwork_create','2020-10-29 02:07:29','2020-10-29 02:08:06',NULL),(93,'uwork_show','2020-10-29 02:08:26','2020-10-29 02:08:26',NULL),(94,'ubio_access','2020-10-30 07:17:14','2020-10-30 07:17:14',NULL),(95,'ubio_create','2020-10-30 07:17:39','2020-10-30 07:17:39',NULL),(96,'ubio_show','2020-10-30 07:18:00','2020-10-30 07:18:00',NULL),(97,'ubio_delete','2020-10-30 07:18:14','2020-10-30 07:18:14',NULL),(98,'ubio_edit','2020-10-30 07:18:44','2020-10-30 07:18:44',NULL),(99,'naukri_access','2020-11-07 03:59:42','2020-11-07 03:59:42',NULL),(100,'naukri_edit','2020-11-07 04:00:07','2020-11-07 04:00:07',NULL),(101,'naukri_show','2020-11-07 04:00:27','2020-11-07 04:00:27',NULL),(102,'naukri_create','2020-11-07 04:00:48','2020-11-07 04:00:48',NULL),(103,'verify_access','2020-11-23 04:57:41','2020-11-23 04:57:41',NULL),(104,'episode_access','2020-12-07 01:30:16','2020-12-07 01:30:16',NULL),(105,'episode_create','2020-12-07 01:31:59','2020-12-07 01:31:59',NULL),(106,'episode_show','2020-12-07 01:32:18','2020-12-07 01:32:18',NULL),(107,'episode_delete','2020-12-07 01:33:05','2020-12-07 01:33:05',NULL),(108,'episode_edit','2020-12-07 01:33:19','2020-12-07 03:04:54',NULL),(109,'masterev_access','2020-12-08 05:32:01','2020-12-08 05:32:01',NULL),(110,'applyeven_access','2020-12-09 05:50:18','2020-12-09 05:50:18',NULL),(111,'like_access','2020-12-16 07:48:27','2020-12-16 07:48:27',NULL),(112,'like_edit','2020-12-16 07:48:43','2020-12-16 07:48:43',NULL),(113,'like_create','2020-12-16 07:49:03','2020-12-16 07:49:03',NULL),(114,'like_show','2020-12-16 07:49:19','2020-12-16 07:49:19',NULL),(115,'like_delete','2020-12-16 07:49:42','2020-12-16 07:49:42',NULL),(116,'unlike_access','2020-12-19 04:35:21','2020-12-19 04:35:21',NULL),(117,'unlike_create','2020-12-19 04:35:40','2020-12-19 04:35:40',NULL),(118,'unlike_show','2020-12-19 04:35:53','2020-12-19 04:35:53',NULL),(119,'job_ent_access','2020-12-22 07:01:06','2020-12-22 07:01:06',NULL),(120,'job_ent_create','2020-12-22 07:01:24','2020-12-22 07:01:24',NULL),(121,'job_ent_show','2020-12-22 07:01:48','2020-12-22 07:01:48',NULL),(122,'job_ent_delete','2020-12-22 07:02:03','2020-12-22 07:02:03',NULL),(123,'job_ent_edit','2020-12-22 07:02:26','2020-12-22 07:02:26',NULL),(124,'dash_access','2021-01-16 01:09:23','2021-01-16 01:09:23',NULL),(125,'masterfollow_access','2021-01-18 02:27:57','2021-01-18 02:27:57',NULL),(126,'admin_profile_access','2021-01-19 05:26:33','2021-01-19 05:26:33',NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` int(10) unsigned DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `propic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prog` int(10) DEFAULT 0,
  `cedu` int(5) DEFAULT 0,
  `cwork` int(5) DEFAULT 0,
  `cskill` int(5) DEFAULT 0,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_fk_335007` (`created_by_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (1,'Lovely Dev',NULL,'2021-01-20 04:05:15','2021-02-08 01:51:08',NULL,33,'9888878909','devlover03@gmail.com','mhan','31612768868.jpg',NULL,NULL,100,0,3,0,NULL,NULL),(2,'Dev',NULL,'2021-01-20 23:15:26','2021-01-20 23:15:27',NULL,34,'8901575891','devlover03@gmail.com',NULL,NULL,NULL,NULL,25,0,0,0,NULL,NULL),(3,'User3',NULL,'2021-02-07 03:49:21','2021-02-07 03:49:21',NULL,4,'9898989898','user3@mail.com','New Delhi Paschim Vihar',NULL,NULL,NULL,25,0,0,0,NULL,NULL),(4,'User2',NULL,'2021-02-08 01:49:59','2021-02-08 01:49:59',NULL,3,'8901575891','school_kd@mailinator.com','sol',NULL,NULL,NULL,25,0,0,0,NULL,NULL);
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  KEY `user_id_fk_334968` (`user_id`),
  KEY `role_id_fk_334968` (`role_id`),
  CONSTRAINT `role_id_fk_334968` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_id_fk_334968` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1),(2,2),(3,2),(4,2),(5,2),(41,2);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','2019-09-13 13:45:46','2019-09-13 13:45:46',NULL),(2,'User','2019-09-13 13:45:46','2019-09-13 13:45:46',NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `save_ivent`
--

DROP TABLE IF EXISTS `save_ivent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `save_ivent` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(15) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `ivent_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `save_ivent`
--

LOCK TABLES `save_ivent` WRITE;
/*!40000 ALTER TABLE `save_ivent` DISABLE KEYS */;
INSERT INTO `save_ivent` VALUES (1,3,'2020-12-10 05:44:23','2020-12-10 05:44:23',NULL,6),(2,3,'2020-12-15 06:58:54','2020-12-15 06:58:54',NULL,12),(3,1,'2021-01-12 05:06:34','2021-01-12 05:06:34',NULL,15);
/*!40000 ALTER TABLE `save_ivent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `save_job`
--

DROP TABLE IF EXISTS `save_job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `save_job` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(15) unsigned DEFAULT NULL,
  `job_id` int(15) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `save_job`
--

LOCK TABLES `save_job` WRITE;
/*!40000 ALTER TABLE `save_job` DISABLE KEYS */;
INSERT INTO `save_job` VALUES (1,3,49,'2020-11-12 03:02:38','2020-11-12 05:01:46',NULL),(2,3,50,'2020-11-12 03:02:52','2020-11-12 03:02:52',NULL),(3,3,51,'2020-11-12 03:04:22','2020-11-12 03:04:22',NULL),(4,3,52,'2020-11-12 03:04:34','2020-11-12 03:04:34',NULL),(5,1,49,'2020-11-12 05:01:22','2020-11-12 05:01:46',NULL),(6,3,54,'2020-11-21 05:29:38','2020-11-21 05:34:24',NULL),(7,3,59,'2021-01-19 00:20:50','2021-01-19 00:20:50',NULL);
/*!40000 ALTER TABLE `save_job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skill_job`
--

DROP TABLE IF EXISTS `skill_job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skill_job` (
  `job_id` int(10) unsigned DEFAULT NULL,
  `skill_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skill_job`
--

LOCK TABLES `skill_job` WRITE;
/*!40000 ALTER TABLE `skill_job` DISABLE KEYS */;
INSERT INTO `skill_job` VALUES (49,7),(49,8),(49,9),(49,10),(49,11),(50,7),(50,8),(50,9),(50,10),(50,11),(51,7),(51,9),(51,11),(54,7),(54,8),(54,9),(55,7),(55,8),(55,9),(55,10),(55,11),(55,12),(55,13),(55,14),(55,15),(55,16),(56,8),(57,8),(57,10),(57,11),(58,8),(59,8),(60,7),(61,7),(61,8),(61,10),(62,7),(62,8),(63,7),(63,8),(63,9),(63,10),(63,11),(63,12),(63,13),(63,14),(63,15),(63,16),(66,7),(69,7),(178,7);
/*!40000 ALTER TABLE `skill_job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skill_profile`
--

DROP TABLE IF EXISTS `skill_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skill_profile` (
  `profile_id` int(10) unsigned DEFAULT NULL,
  `skill_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skill_profile`
--

LOCK TABLES `skill_profile` WRITE;
/*!40000 ALTER TABLE `skill_profile` DISABLE KEYS */;
INSERT INTO `skill_profile` VALUES (7,7),(7,8),(7,9);
/*!40000 ALTER TABLE `skill_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_fk_335007` (`created_by_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` VALUES (7,'PHP','2020-10-22 23:33:49','2020-10-22 23:33:49',NULL,1),(8,'Laravel','2020-10-22 23:34:02','2020-10-22 23:34:02',NULL,1),(9,'coeignitior','2020-10-22 23:34:13','2020-10-22 23:34:13',NULL,1),(10,'CSS','2020-10-22 23:34:23','2020-10-22 23:34:23',NULL,1),(11,'javascript','2020-10-22 23:34:34','2020-10-22 23:34:34',NULL,1),(12,'3D Render','2020-11-06 00:02:06','2020-11-06 00:02:06',NULL,3),(13,'3D Modeling','2020-11-06 00:06:19','2020-11-06 00:06:19',NULL,3),(14,'Digital Broadband','2020-11-19 23:59:58','2020-11-19 23:59:58',NULL,NULL),(15,'Digital Line','2020-11-20 00:18:11','2020-11-20 00:18:11',NULL,NULL),(16,'SMO','2020-11-20 08:06:20','2020-11-20 08:06:20',NULL,NULL);
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tagging_tag_groups`
--

DROP TABLE IF EXISTS `tagging_tag_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tagging_tag_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tagging_tag_groups_slug_index` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tagging_tag_groups`
--

LOCK TABLES `tagging_tag_groups` WRITE;
/*!40000 ALTER TABLE `tagging_tag_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `tagging_tag_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tagging_tagged`
--

DROP TABLE IF EXISTS `tagging_tagged`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tagging_tagged` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `taggable_id` int(10) unsigned NOT NULL,
  `taggable_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tagging_tagged_taggable_id_index` (`taggable_id`),
  KEY `tagging_tagged_taggable_type_index` (`taggable_type`),
  KEY `tagging_tagged_tag_slug_index` (`tag_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tagging_tagged`
--

LOCK TABLES `tagging_tagged` WRITE;
/*!40000 ALTER TABLE `tagging_tagged` DISABLE KEYS */;
INSERT INTO `tagging_tagged` VALUES (1,1,'App\\Follow','Good For Man','good-for-man'),(2,1,'App\\Follow','Never Give Up','never-give-up'),(3,2,'App\\Follow','Love','love'),(4,2,'App\\Follow','Erangel','erangel'),(5,2,'App\\Follow','Pubg','pubg'),(6,3,'App\\Follow','Good For Man','good-for-man'),(7,3,'App\\Follow','Last Air Bender','last-air-bender'),(8,4,'App\\Follow','Gyuiop','gyuiop'),(9,4,'App\\Follow','Hiop','hiop'),(10,5,'App\\Follow','#test #myfirsttest #mytestdecember','test-myfirsttest-mytestdecember'),(11,6,'App\\Follow','Dev Kuar','dev-kuar'),(12,6,'App\\Follow','Video','video'),(13,7,'App\\Follow','Video','video'),(14,7,'App\\Follow','Good For Man','good-for-man'),(15,8,'App\\Follow','Video','video'),(16,9,'App\\Follow','Video','video'),(17,10,'App\\Follow','Video','video'),(18,11,'App\\Follow','Love','love'),(19,11,'App\\Follow','Dil','dil'),(20,12,'App\\Follow','Video','video'),(21,13,'App\\Follow','Ajay','ajay'),(22,14,'App\\Follow','Video','video'),(23,15,'App\\Follow','Video','video'),(24,16,'App\\Follow','Video','video'),(25,17,'App\\Follow','Video','video'),(26,18,'App\\Follow','Hi Babes','hi-babes');
/*!40000 ALTER TABLE `tagging_tagged` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tagging_tags`
--

DROP TABLE IF EXISTS `tagging_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tagging_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_group_id` int(10) unsigned DEFAULT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suggest` tinyint(1) NOT NULL DEFAULT 0,
  `count` int(10) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `tagging_tags_slug_index` (`slug`),
  KEY `tagging_tags_tag_group_id_foreign` (`tag_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tagging_tags`
--

LOCK TABLES `tagging_tags` WRITE;
/*!40000 ALTER TABLE `tagging_tags` DISABLE KEYS */;
INSERT INTO `tagging_tags` VALUES (1,NULL,'good-for-man','Good For Man',0,3),(2,NULL,'never-give-up','Never Give Up',0,1),(3,NULL,'love','Love',0,2),(4,NULL,'erangel','Erangel',0,1),(5,NULL,'pubg','Pubg',0,1),(6,NULL,'last-air-bender','Last Air Bender',0,1),(7,NULL,'gyuiop','Gyuiop',0,1),(8,NULL,'hiop','Hiop',0,1),(9,NULL,'test-myfirsttest-mytestdecember','#test #myfirsttest #mytestdecember',0,1),(10,NULL,'dev-kuar','Dev Kuar',0,1),(11,NULL,'video','Video',0,10),(12,NULL,'dil','Dil',0,1),(13,NULL,'ajay','Ajay',0,1),(14,NULL,'hi-babes','Hi Babes',0,1);
/*!40000 ALTER TABLE `tagging_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_follow`
--

DROP TABLE IF EXISTS `user_follow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_follow` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(15) unsigned DEFAULT NULL,
  `follow_id` int(15) unsigned DEFAULT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_follow`
--

LOCK TABLES `user_follow` WRITE;
/*!40000 ALTER TABLE `user_follow` DISABLE KEYS */;
INSERT INTO `user_follow` VALUES (2,3,3,NULL,'2020-12-22 00:03:17','2020-12-22 00:04:52','2020-12-22 00:04:52'),(3,3,2,NULL,'2020-12-22 00:04:08','2020-12-22 00:04:08',NULL),(4,3,18,NULL,'2021-02-14 07:47:41','2021-02-14 07:47:41',NULL);
/*!40000 ALTER TABLE `user_follow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_ivent`
--

DROP TABLE IF EXISTS `user_ivent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_ivent` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(15) unsigned DEFAULT NULL,
  `ivent_id` int(15) unsigned DEFAULT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_ivent`
--

LOCK TABLES `user_ivent` WRITE;
/*!40000 ALTER TABLE `user_ivent` DISABLE KEYS */;
INSERT INTO `user_ivent` VALUES (1,3,6,NULL,'2020-12-10 02:47:59','2020-12-10 03:37:57',NULL),(2,3,5,'Hired','2020-12-10 02:50:44','2020-12-11 04:23:57',NULL),(3,3,12,NULL,'2020-12-15 06:29:28','2020-12-15 06:31:01','2020-12-15 06:31:01'),(4,1,15,NULL,'2021-01-12 05:06:27','2021-01-12 05:06:27',NULL);
/*!40000 ALTER TABLE `user_ivent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_job`
--

DROP TABLE IF EXISTS `user_job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_job` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(15) unsigned DEFAULT NULL,
  `job_id` int(15) unsigned DEFAULT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_job`
--

LOCK TABLES `user_job` WRITE;
/*!40000 ALTER TABLE `user_job` DISABLE KEYS */;
INSERT INTO `user_job` VALUES (1,3,49,NULL,'2020-11-10 04:34:54','2020-11-10 04:34:54',NULL),(2,3,49,NULL,'2020-11-10 04:35:30','2020-11-10 04:35:30',NULL),(3,3,50,NULL,'2020-11-10 08:39:56','2020-11-10 08:39:56',NULL),(4,4,51,NULL,'2020-11-10 23:32:50','2020-11-10 23:32:50',NULL),(5,4,50,NULL,'2020-11-10 23:38:38','2020-11-10 23:38:38',NULL),(6,4,53,NULL,'2020-11-11 07:13:31','2020-11-11 07:13:31',NULL),(7,3,51,'Hired','2020-11-11 07:30:27','2020-11-13 07:07:21',NULL),(8,3,52,NULL,'2020-11-21 05:11:36','2020-11-21 05:11:36',NULL),(9,3,54,'Hired','2020-11-21 05:14:45','2020-11-21 06:34:33',NULL),(10,3,59,NULL,'2021-01-19 00:08:23','2021-01-19 00:08:23',NULL),(11,3,60,NULL,'2021-01-19 00:08:31','2021-01-19 00:08:31',NULL),(12,4,1,NULL,'2021-02-05 01:50:38','2021-02-05 01:50:38',NULL);
/*!40000 ALTER TABLE `user_job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_ip` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','malhautrasaab@gmail.com',NULL,'$2y$10$FoTO85P9YF2DNoGhz1zAC.X54rIywwZ5gHFY5pNFH2OLlAGLPmnXy','foTwX0LBbVVUhXApOFc0EXZ79VDuWWcczQP6p1QhYrPbOjkDJz6lHWD9DBqm','2019-09-13 13:51:30','2021-02-13 14:50:42',NULL,NULL,'122.176.29.149','2021-02-13 14:50:42'),(2,'user1','user1@mail.com',NULL,'$2y$10$dWrp50HFtzj8R7WsAfTjjuUCqrtwcehI/L.8Ts9YFNT/2cWIVSxv.','AFK323KFvYlM9YTp65aqWXOs7zEDabfawlLHPb5CRtDn2ORtx1nHOU2mRQFQ','2020-09-15 04:53:36','2021-02-05 02:09:29',NULL,NULL,'192.168.2.1','2021-02-05 02:09:29'),(3,'user2','user2@maiil.com',NULL,'$2y$10$KmqB8MJ4rH0zE6Na3GQ0M.9UIy19scoX7jmWkYsw5EUmTX0p93yC.',NULL,'2020-09-15 04:54:11','2021-02-14 07:42:29',NULL,'9090909090','106.196.35.71','2021-02-14 07:42:29'),(4,'user3','user3@mail.com',NULL,'$2y$10$AzZmfG2N.x4Gg3907IZWEuSlzZ3rfrjEGHRd7HMvw6jHJ0n2Z7h6G',NULL,'2020-09-15 04:55:09','2021-02-13 00:49:47',NULL,NULL,'122.176.29.149','2021-02-13 00:49:47'),(5,'Jatin Mlhotra','jm@uvatechnology.com',NULL,'$2y$10$JJ3UqRtvadTLbQOLiAy1vuzubV51kkX0BbH7WBv7MrbrYgrzbUIoG','2eUNnq57Y5QISOG3NagDzpaiPUAIXdVSzKYF2bRfS5XtmMTVEMCXwfwQeBho','2020-10-21 02:41:28','2020-10-21 02:41:28',NULL,'8826059393',NULL,'2021-01-16 11:52:57'),(41,'Dev LOve','devlover03@gmail.com','2021-01-22 13:09:38','$2y$10$QeThXMB9jIZja2aFprrxMOYGwoWevDERu6MvXTmhXin8njaOhNPwG',NULL,'2021-01-22 07:05:35','2021-02-04 11:58:05',NULL,'8901575891','122.176.29.149','2021-02-04 11:58:05');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-17 12:10:11
