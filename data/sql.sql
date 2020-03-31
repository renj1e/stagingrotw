CREATE DATABASE  IF NOT EXISTS `rotw` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `rotw`;
-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: rotw
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

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
-- Table structure for table `addon_menu`
--

DROP TABLE IF EXISTS `addon_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addon_menu` (
  `amid` int(11) NOT NULL AUTO_INCREMENT,
  `am_vendorid` int(11) DEFAULT NULL,
  `am_name` varchar(45) NOT NULL,
  `am_price` varchar(45) NOT NULL,
  `am_quantity` varchar(45) DEFAULT NULL,
  `am_is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`amid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addon_menu`
--

LOCK TABLES `addon_menu` WRITE;
/*!40000 ALTER TABLE `addon_menu` DISABLE KEYS */;
INSERT INTO `addon_menu` VALUES (1,1,'Hot Sauce','10','9',1,'2020-03-14 19:27:47','2020-03-15 03:27:47'),(2,1,'Cheese','10','9',1,'2020-03-14 19:27:47','2020-03-15 03:27:47');
/*!40000 ALTER TABLE `addon_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `addons`
--

DROP TABLE IF EXISTS `addons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addons` (
  `addid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `addmenuid` int(11) NOT NULL,
  `add_menu_addons` int(11) DEFAULT NULL,
  `addname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adddesc` longtext COLLATE utf8mb4_unicode_ci,
  `addtype` json DEFAULT NULL,
  `addprice` int(11) DEFAULT NULL,
  `addquantity` int(11) DEFAULT NULL,
  `addis_activated` tinyint(4) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`addid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addons`
--

LOCK TABLES `addons` WRITE;
/*!40000 ALTER TABLE `addons` DISABLE KEYS */;
/*!40000 ALTER TABLE `addons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `concustomerid` int(11) NOT NULL,
  `conlabel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_address`
--

DROP TABLE IF EXISTS `customer_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_address` (
  `caid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cacustomerid` int(11) NOT NULL,
  `calabel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `castreet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caprovince` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cacountry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cazipcode` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`caid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_address`
--

LOCK TABLES `customer_address` WRITE;
/*!40000 ALTER TABLE `customer_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `menuid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vendorid` int(11) NOT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdesc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `mtype` longtext COLLATE utf8mb4_unicode_ci,
  `mprice` int(11) NOT NULL,
  `mavatar` longtext COLLATE utf8mb4_unicode_ci,
  `mquantity` int(11) NOT NULL,
  `maddons` longtext COLLATE utf8mb4_unicode_ci,
  `mis_activated` tinyint(4) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`menuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2020_01_21_112056_create_vendors_table',1),(4,'2020_01_21_112231_create_menus_table',1),(5,'2020_01_22_070921_create_add-on_table',1),(7,'2020_01_23_030138_create_order_track_table',2),(8,'2020_01_23_032802_create_customer_address_table',2),(11,'2020_01_23_024518_create_order_table',3),(12,'2020_01_29_071349_create_contact_table',4),(13,'2020_01_31_031333_create_rider_status_table',5),(15,'2020_01_31_045232_create_rider_profile_table',6),(16,'2020_01_31_111559_create_rider_contact_table',6),(17,'2020_02_25_071952_create_websockets_statistics_entries_table',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `orderid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ordercustomerid` int(11) NOT NULL,
  `ordermenuid` int(11) NOT NULL,
  `orderaddons` json NOT NULL,
  `orderquantity` int(11) NOT NULL,
  `ordereta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` enum('oncart','processing','delivered') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_track`
--

DROP TABLE IF EXISTS `order_track`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_track` (
  `order_trackid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_trackcustomerid` int(11) NOT NULL,
  `order_track_riderid` int(11) DEFAULT NULL,
  `order_trackorderid` json NOT NULL,
  `order_trackdelivery_addressid` int(11) NOT NULL,
  `order_trackstatus` enum('oncart','onwishlist','order_confirmed_and_received','processing','purchased','otw','delivered') COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_trackremarks` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_trackdelivery_fee` int(11) DEFAULT NULL,
  `order_tracksched_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_trackid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_track`
--

LOCK TABLES `order_track` WRITE;
/*!40000 ALTER TABLE `order_track` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_track` ENABLE KEYS */;
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
-- Table structure for table `rider_contact`
--

DROP TABLE IF EXISTS `rider_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rider_contact` (
  `rider_contact_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rider_contact_rider_id` int(11) NOT NULL,
  `rider_contact_type` enum('facebook','instagram','landline','mobile') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mobile',
  `rider_contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`rider_contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rider_contact`
--

LOCK TABLES `rider_contact` WRITE;
/*!40000 ALTER TABLE `rider_contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `rider_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rider_profile`
--

DROP TABLE IF EXISTS `rider_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rider_profile` (
  `rider_profile_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rider_profile_rider_id` int(11) NOT NULL,
  `rider_profile_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rider_profile_vehicle_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rider_profile_vehicle_type` enum('motorcycle','tricycle','delivery_van','others') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'others',
  `rider_profile_drivers_license` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rider_profile_avatar` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rider_profile_zip_code` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`rider_profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rider_profile`
--

LOCK TABLES `rider_profile` WRITE;
/*!40000 ALTER TABLE `rider_profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `rider_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rider_status`
--

DROP TABLE IF EXISTS `rider_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rider_status` (
  `rider_status_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rider_status_rider_id` int(11) NOT NULL,
  `rider_status_status` enum('hired','waiting','not_active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`rider_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rider_status`
--

LOCK TABLES `rider_status` WRITE;
/*!40000 ALTER TABLE `rider_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `rider_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female','others') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'others',
  `utype` enum('staff','rider','customer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@gmail.com',NULL,'$2y$10$YhPNKuIBr/SXTcpMs9D0S.y/TlQ.cCJ4QZOKBPZRWpUUhkBiKjxRO','male','staff','active','ZZHqmNd6GgzuiebJH2PCWTG8xgjNMHvkAjxagSgn8isTx0iB6stITFc8BOtk','2020-01-22 00:34:30','2020-01-22 00:34:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendor_contact`
--

DROP TABLE IF EXISTS `vendor_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendor_contact` (
  `vcid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vc_vendor_id` varchar(45) NOT NULL,
  `vc_number` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`vcid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendor_contact`
--

LOCK TABLES `vendor_contact` WRITE;
/*!40000 ALTER TABLE `vendor_contact` DISABLE KEYS */;
INSERT INTO `vendor_contact` VALUES (2,'4','444444444','2020-03-15 04:36:21','2020-03-15 04:36:21');
/*!40000 ALTER TABLE `vendor_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendors` (
  `vendorid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vstreet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vcity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vprovince` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vcountry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vis_activated` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`vendorid`),
  UNIQUE KEY `vendors_vname_unique` (`vname`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendors`
--

LOCK TABLES `vendors` WRITE;
/*!40000 ALTER TABLE `vendors` DISABLE KEYS */;
INSERT INTO `vendors` VALUES (1,'MC Jolly','#23 Poblacion','Alaminos City','Pangasinan','PH',1,NULL,'2020-01-22 00:34:30','2020-01-22 00:34:30');
/*!40000 ALTER TABLE `vendors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `websockets_statistics_entries`
--

DROP TABLE IF EXISTS `websockets_statistics_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `app_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `websockets_statistics_entries`
--

LOCK TABLES `websockets_statistics_entries` WRITE;
/*!40000 ALTER TABLE `websockets_statistics_entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `websockets_statistics_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'rotw'
--

--
-- Dumping routines for database 'rotw'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-15 19:20:32
