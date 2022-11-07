-- MySQL dump 10.19  Distrib 10.2.39-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: klatch
-- ------------------------------------------------------
-- Server version	10.2.39-MariaDB

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
  `ad_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  PRIMARY KEY (`id`),
  KEY `11` (`created_by_id`),
  CONSTRAINT `11` FOREIGN KEY (`created_by_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ad`
--

LOCK TABLES `ad` WRITE;
/*!40000 ALTER TABLE `ad` DISABLE KEYS */;
INSERT INTO `ad` VALUES (45,'Usb Fan','Low ower','28.44','77.464','Refurbished','Faridabad','Haryana','121004','uva-1600767222.jpg','Approve',1,NULL,'2020-09-22 04:02:25','2020-09-22 07:31:48',NULL,3,7,10,5,2000,'2020-10-07',0,1),(46,'usb Llight','Mobile Campatible','28.44','77.464','New','Faridabad','Haryana','121004','uva-1600767315.jpg','Approve',1,NULL,'2020-09-22 04:04:05','2020-09-23 13:04:28',NULL,3,7,20,5,3000,'2020-10-07',0,2),(47,'Puneet - Test','Portal Test','111','111',NULL,'New Delhi','Delhi','110015',NULL,'UNFINISHED',1,NULL,'2020-09-23 13:22:02','2020-09-23 13:24:01',NULL,1,8,NULL,2,NULL,NULL,0,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ad_saved`
--

LOCK TABLES `ad_saved` WRITE;
/*!40000 ALTER TABLE `ad_saved` DISABLE KEYS */;
INSERT INTO `ad_saved` VALUES (10,'2020-09-22 07:09:41','2020-09-22 07:10:14','2020-09-22 07:10:14',1,46),(11,'2020-09-22 07:12:34','2020-09-22 07:31:32','2020-09-22 07:31:32',1,46),(12,'2020-09-22 07:12:41','2020-09-22 07:31:48','2020-09-22 07:31:48',1,45),(13,'2020-09-22 07:28:29','2020-09-22 07:28:29',NULL,2,46),(14,'2020-09-23 13:04:28','2020-09-23 13:04:28',NULL,1,46);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ad_subcat`
--

LOCK TABLES `ad_subcat` WRITE;
/*!40000 ALTER TABLE `ad_subcat` DISABLE KEYS */;
INSERT INTO `ad_subcat` VALUES (7,'Mobile Accessories','2020-09-15 23:05:24','2020-09-15 23:05:24',NULL,1,3),(8,'Dental Clinic','2020-09-15 23:05:40','2020-09-15 23:05:40',NULL,1,1);
/*!40000 ALTER TABLE `ad_subcat` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_categories`
--

LOCK TABLES `expense_categories` WRITE;
/*!40000 ALTER TABLE `expense_categories` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
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
INSERT INTO `oauth_access_tokens` VALUES ('0046b2559b4f4bd13326cf7100172bb71a2e54d68e9c34d3d5d30ab87cba7558fdd2c5e0a24819ca',1,1,'authToken','[]',0,'2020-09-21 23:20:58','2020-09-21 23:20:58','2021-09-22 04:50:58'),('017878849e2ba691b4d6af42639c7969f59e26997245a737a42d9063fff5e3d8521bc097ab91e1f4',1,1,'authToken','[]',0,'2020-09-21 16:14:12','2020-09-21 16:14:12','2021-09-21 21:44:12'),('05fdbb9517873f68428bb6c2223df9c2d62e9bc1c64f75ed53b25997c59ac09758a8c2f5d886e1da',1,1,'authToken','[]',0,'2020-09-21 14:17:09','2020-09-21 14:17:09','2021-09-21 19:47:09'),('0d0496778efa036d8c68d1152e9c4fd795383a1c97ec4fa9ca4f19f731f9d6bbafbd3e4787933e7b',1,1,'authToken','[]',0,'2020-09-17 23:54:16','2020-09-17 23:54:16','2021-09-18 05:24:16'),('17edab4b54d9ab1a88fdc864385c6f3cc3a2a33b4e29144f310314013ed7d6d579db4e01de5fb2e3',1,1,'authToken','[]',0,'2020-09-18 13:21:48','2020-09-18 13:21:48','2021-09-18 18:51:48'),('19eb1d5b646bcb7f59bf373111386fa288012710cd02bed5755e656ab67399a2117f053d7abe722a',1,1,'authToken','[]',0,'2020-09-18 10:27:02','2020-09-18 10:27:02','2021-09-18 15:57:02'),('2006d16405f86a45f9622e5829f650edc68b6cfd92c77d5d918c4c263beca8af221585d4b636bd30',1,1,'authToken','[]',0,'2020-09-17 23:54:16','2020-09-17 23:54:16','2021-09-18 05:24:16'),('27203402a6ce3f6b1aae2800f4965e9904240c03c5dadb90ce889c09bb61ced165331d1fd2315204',1,1,'authToken','[]',0,'2020-09-21 14:27:46','2020-09-21 14:27:46','2021-09-21 19:57:46'),('2fb3b2935b06a61a972217e339a5a2b55559ced029004854aee19352c1090e58eab6768218f697f5',1,1,'authToken','[]',0,'2020-09-18 08:29:22','2020-09-18 08:29:22','2021-09-18 13:59:22'),('307ff7054ec6b908681028739bc8f0254f6f73988d0158f91ad31d4db545cf88b94796a7ecdd904c',1,1,'authToken','[]',0,'2020-09-18 13:05:39','2020-09-18 13:05:39','2021-09-18 18:35:39'),('31dc0217b89fb804c0f64b8a793d131f62af402bdbc89a756e9d8c39b741fdda57495ca1c0fd2f90',2,1,'authToken','[]',0,'2020-09-22 06:50:44','2020-09-22 06:50:44','2021-09-22 12:20:44'),('339d728ea7c97f86df5d26f533b5359bc1e4508c3b4840bb35d4630371900e9485d7d1b0201abe4b',1,1,'authToken','[]',0,'2020-09-21 16:14:12','2020-09-21 16:14:12','2021-09-21 21:44:12'),('3b3c538d0ccfdf1efdd24e1e1aa1caed183c724431f3ada461b2072cda1d6bf55b94ee5cb67a616a',2,1,'authToken','[]',0,'2020-09-22 06:50:43','2020-09-22 06:50:43','2021-09-22 12:20:43'),('3d9ea68e1c01bca96633dae1fabe146ca1a59dadd8741635483a65444aa7d5af41882f26c6579f7e',1,1,'authToken','[]',0,'2020-09-21 23:20:58','2020-09-21 23:20:58','2021-09-22 04:50:58'),('40b256eb0d1a56cd6d663e787be21442ed598ae7673bd1a9aae4e0461b3bd585c46d824936ddea43',1,1,'authToken','[]',0,'2020-09-21 16:13:41','2020-09-21 16:13:41','2021-09-21 21:43:41'),('444fd92b1cdb79aa3a219801135b49042beafff34ef2a7d06ab0560f782630e1b1ee7ae87e92dced',1,1,'authToken','[]',0,'2020-09-21 23:52:04','2020-09-21 23:52:04','2021-09-22 05:22:04'),('44da37f96f62370abb3c1ee4017403ece83b17e234d39a314d6fff083b260998b280f5d16c4bf31f',1,1,'authToken','[]',0,'2020-09-21 23:21:46','2020-09-21 23:21:46','2021-09-22 04:51:46'),('44e2d9e598a9831d32a2063250690488865b80f02ee8383f5919bbffc84976d5151f85bbc15a30d8',1,1,'authToken','[]',0,'2020-09-21 23:44:24','2020-09-21 23:44:24','2021-09-22 05:14:24'),('486a4ab4277bd1c8ac143869e639f8a7f7be56a947203563aa217e50f63f884d0f2174782fb3304e',1,1,'authToken','[]',0,'2020-09-18 13:21:48','2020-09-18 13:21:48','2021-09-18 18:51:48'),('4a483fe02b5d50f37a803ea46101234a55cda18125f044f17662b80688df993cfcf326558176e48a',1,1,'authToken','[]',0,'2020-09-21 23:37:39','2020-09-21 23:37:39','2021-09-22 05:07:39'),('50bf361a5e1a110828eaabcfeeda4edd4cde1ad74e3c5005488ff9c04531c176f0bb21e1e37e6d6c',1,1,'authToken','[]',0,'2020-09-18 05:46:41','2020-09-18 05:46:41','2021-09-18 11:16:41'),('5395e8410648d5c0475110f86a4aa4216f482a05defd68d72e4edd476d25f0e86f6712ec0027bd01',1,1,'authToken','[]',0,'2020-09-21 23:22:17','2020-09-21 23:22:17','2021-09-22 04:52:17'),('5824ac55c9b5b9e6038739796d93c67c039d9dd7d6390bb38b27a2e0967cb29ce45dcf01cbce6d86',1,1,'authToken','[]',0,'2020-09-21 23:37:39','2020-09-21 23:37:39','2021-09-22 05:07:39'),('5eb32e45a5b782e7c742ebea8c6564dd8252c1ce1ffa8d6ba46ae5e5a5b729efc0335e8fa906d267',1,1,'authToken','[]',0,'2020-09-21 23:44:24','2020-09-21 23:44:24','2021-09-22 05:14:24'),('69c8ee2743dd923b72f5530d9752d444a8792d80c32ee6f3f479f44b17f3ae57d1b6cf0c8fdde7da',1,1,'authToken','[]',0,'2020-09-17 11:03:35','2020-09-17 11:03:35','2021-09-17 16:33:35'),('6a7119b3a3c830c6f8c4cbc54bfdc490c0fa32dd5826c0d213cd402466249532579ddc3edcf75199',1,1,'authToken','[]',0,'2020-09-21 14:17:10','2020-09-21 14:17:10','2021-09-21 19:47:10'),('6b15503f7d0717e0fb7a4c3f003ca6aa6797f2c8cbc6662df637f3aceda8aceb48722230e49feed1',1,1,'authToken','[]',0,'2020-09-18 13:02:34','2020-09-18 13:02:34','2021-09-18 18:32:34'),('6fa4177cd9b910b5f2d1e8e96a400550df60cc1c6ff026de5acc3053ee55b786d800753e769e2551',1,1,'authToken','[]',0,'2020-09-18 15:17:30','2020-09-18 15:17:30','2021-09-18 20:47:30'),('7008c7f22e181cef045a061199a8ba3c43d577d6a6a4898bfc3a5f02ebaf62e38d29988df51562fb',1,1,'authToken','[]',0,'2020-09-18 13:23:23','2020-09-18 13:23:23','2021-09-18 18:53:23'),('78f969f198664cdbf8f14a2f64c7dae2594e16fec0da5cfcfb2d66eaaaacabad5b5b9f8fda9f4277',1,1,'authToken','[]',0,'2020-09-18 12:56:22','2020-09-18 12:56:22','2021-09-18 18:26:22'),('7c5a091b6ede55be4844a3aef47a56de7777dc58dcddd924dca29da626f93709c52cc1521e9857e0',1,1,'authToken','[]',0,'2020-09-18 12:52:20','2020-09-18 12:52:20','2021-09-18 18:22:20'),('7fcfd6b3fb6429a7f6dfa3f310a4c7217016d3a697b17994fb847d58cb5abc22b665f07a68c80663',1,1,'authToken','[]',0,'2020-09-21 14:34:20','2020-09-21 14:34:20','2021-09-21 20:04:20'),('8122087b4b31f83057a35708ddedebb8497f9795fa2807c3694e82673217be2b5af85f5284b37e58',1,1,'authToken','[]',0,'2020-09-21 16:04:20','2020-09-21 16:04:20','2021-09-21 21:34:20'),('81ce3d6b7f2ff9fcba479f75fd96a52e25134dd5b35c4ff46a4d01ab8b33cc9e92113be24651b9ad',1,1,'authToken','[]',0,'2020-09-18 13:02:34','2020-09-18 13:02:34','2021-09-18 18:32:34'),('82e7fc478e51b1d6ff8a34255e144c93c37fed5f4979bb27f2dc01aa5c24e8008ad071aa9b65a1c1',1,1,'authToken','[]',0,'2020-09-21 23:52:04','2020-09-21 23:52:04','2021-09-22 05:22:04'),('8460847c26730bbd999890c59a4e69a04135caa12c7deece68467fb40f4bc7ba716eb286e31e16cd',1,1,'authToken','[]',0,'2020-09-21 16:13:42','2020-09-21 16:13:42','2021-09-21 21:43:42'),('858fd80809a1fc6092bd47ffa6ee5b1700516f82914d7e956c1f76360655147e4b530d6dcd936343',1,1,'authToken','[]',0,'2020-09-21 16:12:33','2020-09-21 16:12:33','2021-09-21 21:42:33'),('89732c2bce4010e86da234478f3d0840e5a3c7d060b2a57770eda378c194afd803f28cbd0543f56e',1,1,'authToken','[]',0,'2020-09-21 14:27:46','2020-09-21 14:27:46','2021-09-21 19:57:46'),('8b4506f619fce33444326c060ae887f9bd599de0acc6c70580905dceee490316b8371e49faede35e',1,1,'authToken','[]',0,'2020-09-18 08:29:22','2020-09-18 08:29:22','2021-09-18 13:59:22'),('8bd9985d1cd6206398d077576689fbbe4fd8ac3d92f3070faa458bf6d4ced2accd050eb59224cac1',1,1,'authToken','[]',0,'2020-09-18 12:52:20','2020-09-18 12:52:20','2021-09-18 18:22:20'),('8e3acd6758e98e3bdc0162a292c37453e129eec4c4f839c8f2868c8507db14d312fc1a2bbc10d0b7',1,1,'authToken','[]',0,'2020-09-21 14:34:20','2020-09-21 14:34:20','2021-09-21 20:04:20'),('90f8f1e97a306cf632546ed070362b12c44e462e92f63372ef0098bf0cd42abc432ca0a0bb5a88b6',1,1,'authToken','[]',0,'2020-09-18 13:35:36','2020-09-18 13:35:36','2021-09-18 19:05:36'),('946bc119689ddabb7961fce6d91129eef2200d91acb9f97c42a87f4dda6b049ae4ce29af75427073',1,1,'authToken','[]',0,'2020-09-18 13:35:36','2020-09-18 13:35:36','2021-09-18 19:05:36'),('a6d081581ce804cef53555d0bbc1a53f181f8ca9b02d20c7f255c37774f4a38679397cfb834b6ad7',1,1,'authToken','[]',0,'2020-09-18 13:05:39','2020-09-18 13:05:39','2021-09-18 18:35:39'),('a9685f7397522f8ad59542a9984e07a04829b137af912d90ba4c834493bd1a9470ad5489eae1aac7',1,1,'authToken','[]',0,'2020-09-18 13:20:33','2020-09-18 13:20:33','2021-09-18 18:50:33'),('b4428b35a70ec004f7e31d0687a64d0c2cef50d44c0b4797979666c742cb39c5c29b96f50c586474',1,1,'authToken','[]',0,'2020-09-18 05:46:41','2020-09-18 05:46:41','2021-09-18 11:16:41'),('b798e8f6284416db47295d470b25d5b9eaf09be330a55f210a42fd0d93c7fc02807b95d23531fe9e',1,1,'authToken','[]',0,'2020-09-17 11:03:35','2020-09-17 11:03:35','2021-09-17 16:33:35'),('bb29affd613eeb5e270714ed3b00090c64c0c333fd5bc15a16527e9a17c85c3808c834fa1c92951c',1,1,'authToken','[]',0,'2020-09-21 22:25:21','2020-09-21 22:25:21','2021-09-22 03:55:21'),('be77883299d8d669be70f55e90104364b5a05b123bd2381cfef5a638368da52f7cd41f169d9a4df9',1,1,'authToken','[]',0,'2020-09-18 12:56:22','2020-09-18 12:56:22','2021-09-18 18:26:22'),('bec2187cf21d54187547c33fa7b72f8db8a63761b7f0a23eb1944e9dc80b057c53598c66d863e66e',1,1,'authToken','[]',0,'2020-09-21 23:20:36','2020-09-21 23:20:36','2021-09-22 04:50:36'),('c1a9ed48242767e7c3b65f9642936ea381aa8d2c9a9c4b281b4cc51927056767205ea594eef0da7f',1,1,'authToken','[]',0,'2020-09-21 23:22:17','2020-09-21 23:22:17','2021-09-22 04:52:17'),('d2fb4f546778c09d39d32f0e586ee1df2847cc3c7689ed593064289b0ad1362344a5e4739c67aaa2',1,1,'authToken','[]',0,'2020-09-21 23:20:36','2020-09-21 23:20:36','2021-09-22 04:50:36'),('d7b26ab2c278df7553ee59ea9d405815ecba9fc3be1abac105446d0daddc16c72ba1fbef7fa4b355',1,1,'authToken','[]',0,'2020-09-18 13:45:00','2020-09-18 13:45:00','2021-09-18 19:15:00'),('dcbf3e975196093a4a5d2d4a9b0d3057f88e6fc3dfc0d0c23e1f5003bf5da6681794b4ef1b046f36',1,1,'authToken','[]',0,'2020-09-18 15:17:30','2020-09-18 15:17:30','2021-09-18 20:47:30'),('e099e36c2dad73d1ec38819e6e51292d204479d4a41f659022250b66b8336c910679e52e4786623f',1,1,'authToken','[]',0,'2020-09-21 22:25:20','2020-09-21 22:25:20','2021-09-22 03:55:20'),('ea305c8399af5c216f71e6870b93bcf1fed9baf95ae3b2daab87ac0d6532363b5b313a4da163914a',1,1,'authToken','[]',0,'2020-09-18 13:23:23','2020-09-18 13:23:23','2021-09-18 18:53:23'),('eb333cb5b5210602e15cd2e79620ee39bd2413f4991ead1f122f21c950022adbbba8237f4b44eb27',1,1,'authToken','[]',0,'2020-09-18 10:27:02','2020-09-18 10:27:02','2021-09-18 15:57:02'),('edc8ea9d76b3654e7d61072f23708af98d33d26cca85a9c7dbc8b562440a17dbe0787d7a4f31f46e',1,1,'authToken','[]',0,'2020-09-21 16:12:33','2020-09-21 16:12:33','2021-09-21 21:42:33'),('f05400f690a9383ecb0a3fe90307d6c719b93c76a3646e4e53f05b79a25ef7d7384512d112ac3ebe',1,1,'authToken','[]',0,'2020-09-21 23:21:46','2020-09-21 23:21:46','2021-09-22 04:51:46'),('f0e878c4803b31ec5030c4cd5507e354fb8a4841fb7d48fe295892468eec028d7899838b7228bcd0',1,1,'authToken','[]',0,'2020-09-21 16:04:20','2020-09-21 16:04:20','2021-09-21 21:34:20'),('fd58a6e81c889b514e21eb392af424833fc3321576f17c7438846f765c7556694719cecae7764fc3',1,1,'authToken','[]',0,'2020-09-18 13:45:00','2020-09-18 13:45:00','2021-09-18 19:15:00'),('ff8315987ec9e7c055c8fe2d5fb33d1acac446bbc94a5cff34c205a3ba01d6fa9a593758ad0a9d3a',1,1,'authToken','[]',0,'2020-09-18 13:20:33','2020-09-18 13:20:33','2021-09-18 18:50:33');
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
INSERT INTO `permission_role` VALUES (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),(1,11),(1,12),(1,13),(1,14),(1,15),(1,16),(1,43),(1,44),(1,45),(1,46),(1,47),(1,48),(1,49),(1,50),(1,51),(1,52),(2,43),(2,44),(2,45),(2,46),(2,48),(2,49),(2,50),(2,51),(1,53),(1,54),(1,55),(1,56),(1,57),(1,58),(1,59);
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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'user_management_access','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(2,'permission_create','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(3,'permission_edit','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(4,'permission_show','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(5,'permission_delete','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(6,'permission_access','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(7,'role_create','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(8,'role_edit','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(9,'role_show','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(10,'role_delete','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(11,'role_access','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(12,'user_create','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(13,'user_edit','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(14,'user_show','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(15,'user_delete','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(16,'user_access','2019-09-13 13:51:30','2019-09-13 13:51:30',NULL),(17,'expense_management_access','2019-09-13 13:51:30','2020-09-22 14:06:28','2020-09-22 14:06:28'),(18,'expense_category_create','2019-09-13 13:51:30','2020-09-22 14:06:28','2020-09-22 14:06:28'),(19,'expense_category_edit','2019-09-13 13:51:30','2020-09-22 14:06:28','2020-09-22 14:06:28'),(20,'expense_category_show','2019-09-13 13:51:30','2020-09-22 14:06:28','2020-09-22 14:06:28'),(21,'expense_category_delete','2019-09-13 13:51:30','2020-09-22 14:06:28','2020-09-22 14:06:28'),(22,'expense_category_access','2019-09-13 13:51:30','2020-09-22 14:06:28','2020-09-22 14:06:28'),(23,'income_category_create','2019-09-13 13:51:30','2020-09-22 14:06:28','2020-09-22 14:06:28'),(24,'income_category_edit','2019-09-13 13:51:30','2020-09-22 14:06:28','2020-09-22 14:06:28'),(25,'income_category_show','2019-09-13 13:51:30','2020-09-22 14:06:28','2020-09-22 14:06:28'),(26,'income_category_delete','2019-09-13 13:51:30','2020-09-22 14:06:28','2020-09-22 14:06:28'),(27,'income_category_access','2019-09-13 13:51:30','2020-09-22 14:06:28','2020-09-22 14:06:28'),(28,'expense_create','2019-09-13 13:51:30','2020-09-22 14:06:28','2020-09-22 14:06:28'),(29,'expense_edit','2019-09-13 13:51:30','2020-09-22 14:06:28','2020-09-22 14:06:28'),(30,'expense_show','2019-09-13 13:51:30','2020-09-22 14:06:28','2020-09-22 14:06:28'),(31,'expense_delete','2019-09-13 13:51:30','2020-09-22 14:06:28','2020-09-22 14:06:28'),(32,'expense_access','2019-09-13 13:51:30','2020-09-22 14:06:28','2020-09-22 14:06:28'),(33,'income_create','2019-09-13 13:51:30','2020-09-22 14:05:53','2020-09-22 14:05:53'),(34,'income_edit','2019-09-13 13:51:30','2020-09-22 14:05:53','2020-09-22 14:05:53'),(35,'income_show','2019-09-13 13:51:30','2020-09-22 14:05:53','2020-09-22 14:05:53'),(36,'income_delete','2019-09-13 13:51:30','2020-09-22 14:05:53','2020-09-22 14:05:53'),(37,'income_access','2019-09-13 13:51:30','2020-09-22 14:05:36','2020-09-22 14:05:36'),(38,'expense_report_create','2019-09-13 13:51:30','2020-09-22 14:05:27','2020-09-22 14:05:27'),(39,'expense_report_edit','2019-09-13 13:51:30','2020-09-22 14:05:18','2020-09-22 14:05:18'),(40,'expense_report_show','2019-09-13 13:51:30','2020-09-22 14:05:10','2020-09-22 14:05:10'),(41,'expense_report_delete','2019-09-13 13:51:30','2020-09-22 14:05:01','2020-09-22 14:05:01'),(42,'expense_report_access','2019-09-13 13:51:30','2020-09-22 14:04:53','2020-09-22 14:04:53'),(43,'a_category_access','2020-09-14 01:34:04','2020-09-14 01:34:04',NULL),(44,'a_category_edit','2020-09-14 01:34:27','2020-09-14 01:34:27',NULL),(45,'a_category_create','2020-09-14 01:34:58','2020-09-14 01:34:58',NULL),(46,'a_category_show','2020-09-14 01:35:30','2020-09-14 01:35:30',NULL),(47,'a_category_delete','2020-09-14 01:35:56','2020-09-14 01:35:56',NULL),(48,'sub_access','2020-09-14 04:06:57','2020-09-14 04:06:57',NULL),(49,'sub_create','2020-09-14 04:07:12','2020-09-14 04:07:12',NULL),(50,'sub_show','2020-09-14 04:07:23','2020-09-14 04:07:23',NULL),(51,'sub_edit','2020-09-14 04:07:34','2020-09-14 04:07:34',NULL),(52,'sub_delete','2020-09-14 04:07:46','2020-09-14 04:07:46',NULL),(53,'adreport_access','2020-09-17 01:14:18','2020-09-17 01:14:18',NULL),(54,'job_cat_create','2020-09-19 05:06:29','2020-09-19 05:06:29',NULL),(55,'job_cat_access','2020-09-19 05:06:47','2020-09-19 05:06:47',NULL),(56,'job_cat_edit','2020-09-19 05:07:09','2020-09-19 05:07:09',NULL),(57,'job_show','2020-09-19 05:07:29','2020-09-19 05:07:29',NULL),(58,'job_delete','2020-09-19 05:07:44','2020-09-19 05:07:44',NULL),(59,'my_save_access','2020-09-22 03:20:42','2020-09-22 03:20:42',NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
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
INSERT INTO `role_user` VALUES (1,1),(2,2),(3,2),(4,2);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@admin.com',NULL,'$2y$10$7lWBYLr.gWEtXaHTbwss2uj2Ouf6A6FQrYtbh4Z5pkGPphkeMBJya','eL86VjuOUVXcBRgXKD4tgciGJe69qJGqVo4raHSuR47o7RZmkAdezEYU9XXI','2019-09-13 13:51:30','2020-09-15 23:00:02',NULL),(2,'user1','user1@mail.com',NULL,'$2y$10$dWrp50HFtzj8R7WsAfTjjuUCqrtwcehI/L.8Ts9YFNT/2cWIVSxv.','tmR33K1J9hOk6Chx6xJcrPOYHfdRoFCC3LywZqmxtygbZPszqvFL01LxdSAx','2020-09-15 04:53:36','2020-09-21 12:30:19',NULL),(3,'user2','user2@maiil.com',NULL,'$2y$10$KmqB8MJ4rH0zE6Na3GQ0M.9UIy19scoX7jmWkYsw5EUmTX0p93yC.',NULL,'2020-09-15 04:54:11','2020-09-15 04:54:11',NULL),(4,'user3','user3@mail.com',NULL,'$2y$10$AzZmfG2N.x4Gg3907IZWEuSlzZ3rfrjEGHRd7HMvw6jHJ0n2Z7h6G',NULL,'2020-09-15 04:55:09','2020-09-15 04:55:09',NULL);
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

-- Dump completed on 2022-10-13 12:18:58
