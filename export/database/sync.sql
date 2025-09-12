-- MySQL dump 10.13  Distrib 8.0.43, for Linux (x86_64)
--
-- Host: 91.98.44.131    Database: staging
-- ------------------------------------------------------
-- Server version	8.0.43-0ubuntu0.24.04.1

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
-- Table structure for table `assets_meta`
--

DROP TABLE IF EXISTS `assets_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assets_meta` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `container` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `basename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `assets_meta_container_folder_basename_unique` (`container`,`folder`,`basename`),
  KEY `assets_meta_container_index` (`container`),
  KEY `assets_meta_folder_index` (`folder`),
  KEY `assets_meta_basename_index` (`basename`),
  KEY `assets_meta_filename_index` (`filename`),
  KEY `assets_meta_extension_index` (`extension`),
  KEY `assets_meta_path_index` (`path`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assets_meta`
--

LOCK TABLES `assets_meta` WRITE;
/*!40000 ALTER TABLE `assets_meta` DISABLE KEYS */;
INSERT INTO `assets_meta` VALUES (1,'uploads','/','1063-1000x1000.jpg','1063-1000x1000','jpg','1063-1000x1000.jpg','{\"data\": [], \"size\": 204006, \"width\": 1000, \"height\": 1000, \"duration\": null, \"mime_type\": \"image/jpeg\", \"last_modified\": 1757441254}','2025-09-09 18:07:34','2025-09-09 18:07:34');
/*!40000 ALTER TABLE `assets_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blueprints`
--

DROP TABLE IF EXISTS `blueprints`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blueprints` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `namespace` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `handle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blueprints_handle_namespace_unique` (`handle`,`namespace`),
  KEY `blueprints_namespace_index` (`namespace`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blueprints`
--

LOCK TABLES `blueprints` WRITE;
/*!40000 ALTER TABLE `blueprints` DISABLE KEYS */;
INSERT INTO `blueprints` VALUES (1,NULL,'default','{\"fields\": [{\"field\": {\"type\": \"markdown\", \"display\": \"Content\", \"localizable\": true}, \"handle\": \"content\"}]}','2025-09-09 21:12:02',NULL),(2,'forms','contact','{\"tabs\": {\"main\": {\"__count\": 0, \"display\": \"Hauptteil\", \"sections\": [{\"fields\": [{\"field\": {\"type\": \"select\", \"width\": 33, \"display\": \"Salutation\", \"options\": [{\"key\": \"mrs\", \"value\": \"Frau\"}, {\"key\": \"mr\", \"value\": \"Herr\"}], \"localizable\": false, \"placeholder\": \"Salutation\"}, \"handle\": \"salutation\"}, {\"field\": {\"type\": \"text\", \"width\": 66, \"display\": \"Company\", \"localizable\": false}, \"handle\": \"company\"}, {\"field\": {\"type\": \"text\", \"width\": 50, \"display\": \"First name\", \"validate\": [\"required\"], \"localizable\": false}, \"handle\": \"first_name\"}, {\"field\": {\"type\": \"text\", \"width\": 50, \"display\": \"Last name\", \"validate\": [\"required\"], \"localizable\": false}, \"handle\": \"last_name\"}, {\"field\": {\"type\": \"text\", \"display\": \"Email\", \"validate\": [\"required\"], \"input_type\": \"email\", \"localizable\": false}, \"handle\": \"email\"}, {\"field\": {\"type\": \"text\", \"display\": \"Phone\", \"input_type\": \"tel\", \"localizable\": false}, \"handle\": \"phone\"}, {\"field\": {\"type\": \"textarea\", \"display\": \"Notes\", \"localizable\": false}, \"handle\": \"notes\"}, {\"field\": {\"type\": \"toggle\", \"display\": \"Privacy\", \"validate\": [\"required\"], \"localizable\": false, \"hide_display\": true, \"instructions\": \"By providing this information, you agree that we may process your personal data in accordance with our <a href=\\\"#\\\">Privacy Policy</a>.\"}, \"handle\": \"privacy\"}], \"__count\": 0}]}}}','2025-09-09 21:13:26','2025-09-11 19:57:22');
/*!40000 ALTER TABLE `blueprints` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entries`
--

DROP TABLE IF EXISTS `entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entries` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int DEFAULT NULL,
  `collection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blueprint` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entries_site_index` (`site`),
  KEY `entries_origin_id_index` (`origin_id`),
  KEY `entries_uri_index` (`uri`),
  KEY `entries_date_index` (`date`),
  KEY `entries_order_index` (`order`),
  KEY `entries_collection_index` (`collection`),
  KEY `entries_blueprint_index` (`blueprint`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entries`
--

LOCK TABLES `entries` WRITE;
/*!40000 ALTER TABLE `entries` DISABLE KEYS */;
INSERT INTO `entries` VALUES ('59db8116-8a6f-4926-8cac-e82e0df9675a','nl','6f865e6e-b0a5-438a-adb5-4415b2f95705',1,'homepage','/',NULL,1,'pages','page','{\"title\": \"Homepage\", \"blocks\": [{\"id\": \"mfft0d6c\", \"type\": \"text\", \"element\": \"h1\", \"enabled\": true, \"heading\": \"Headline\", \"wysiwyg\": [{\"type\": \"paragraph\", \"attrs\": {\"textAlign\": \"left\"}, \"content\": [{\"text\": \"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.\", \"type\": \"text\"}]}], \"overline\": \"Overline\"}, {\"id\": \"mfft0p9i\", \"type\": \"text_image\", \"image\": \"1063-1000x1000.jpg\", \"element\": \"h2\", \"enabled\": true, \"heading\": \"Headline\", \"wysiwyg\": [{\"type\": \"paragraph\", \"attrs\": {\"textAlign\": \"left\"}, \"content\": [{\"text\": \"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.\", \"type\": \"text\"}]}], \"overline\": \"Overline\", \"lazy_loading\": true, \"reverse_order\": false, \"center_content_vertically\": true}, {\"id\": \"mfdwdaja\", \"form\": \"contact\", \"type\": \"form\", \"element\": \"h2\", \"enabled\": true, \"heading\": \"Heading\", \"overline\": \"Overline\"}], \"updated_by\": 2, \"meta_robots\": \"index, follow\", \"__localized_fields\": []}','2025-09-10 09:51:09','2025-09-11 19:31:43'),('6f865e6e-b0a5-438a-adb5-4415b2f95705','en',NULL,1,'homepage','/',NULL,1,'pages','page','{\"title\": \"Homepage\", \"blocks\": [{\"id\": \"mfft0d6c\", \"type\": \"text\", \"element\": \"h1\", \"enabled\": true, \"heading\": \"Headline\", \"wysiwyg\": [{\"type\": \"paragraph\", \"attrs\": {\"textAlign\": \"left\"}, \"content\": [{\"text\": \"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.\", \"type\": \"text\"}]}], \"overline\": \"Overline\"}, {\"id\": \"mfft0p9i\", \"type\": \"text_image\", \"image\": \"1063-1000x1000.jpg\", \"element\": \"h2\", \"enabled\": true, \"heading\": \"Headline\", \"wysiwyg\": [{\"type\": \"paragraph\", \"attrs\": {\"textAlign\": \"left\"}, \"content\": [{\"text\": \"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.\", \"type\": \"text\"}]}], \"overline\": \"Overline\", \"lazy_loading\": true, \"reverse_order\": false, \"center_content_vertically\": true}, {\"id\": \"mfdwdaja\", \"form\": \"contact\", \"type\": \"form\", \"element\": \"h2\", \"enabled\": true, \"heading\": \"Heading\", \"overline\": \"Overline\"}], \"updated_by\": 2, \"meta_robots\": \"index, follow\"}','2025-09-10 09:50:50','2025-09-11 19:31:43'),('d655b217-abfb-46b0-a8a2-a66a9f3f3e7c','de','6f865e6e-b0a5-438a-adb5-4415b2f95705',1,'homepage','/',NULL,1,'pages','page','{\"title\": \"Homepage\", \"blocks\": [{\"id\": \"mfft0d6c\", \"type\": \"text\", \"element\": \"h1\", \"enabled\": true, \"heading\": \"Headline\", \"wysiwyg\": [{\"type\": \"paragraph\", \"attrs\": {\"textAlign\": \"left\"}, \"content\": [{\"text\": \"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.\", \"type\": \"text\"}]}], \"overline\": \"Overline\"}, {\"id\": \"mfft0p9i\", \"type\": \"text_image\", \"image\": \"1063-1000x1000.jpg\", \"element\": \"h2\", \"enabled\": true, \"heading\": \"Headline\", \"wysiwyg\": [{\"type\": \"paragraph\", \"attrs\": {\"textAlign\": \"left\"}, \"content\": [{\"text\": \"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.\", \"type\": \"text\"}]}], \"overline\": \"Overline\", \"lazy_loading\": true, \"reverse_order\": false, \"center_content_vertically\": true}, {\"id\": \"mfdwdaja\", \"form\": \"contact\", \"type\": \"form\", \"element\": \"h2\", \"enabled\": true, \"heading\": \"Heading\", \"overline\": \"Overline\"}], \"updated_by\": 2, \"meta_robots\": \"index, follow\", \"__localized_fields\": []}','2025-09-10 09:51:12','2025-09-11 19:31:43'),('d68cf718-9fac-465d-808b-8213a9bc39cd','en',NULL,1,'subpage','/subpage',NULL,2,'pages','page','{\"title\": \"Subpage\", \"blocks\": [], \"parent\": \"6f865e6e-b0a5-438a-adb5-4415b2f95705\", \"updated_by\": 2, \"meta_robots\": \"index, follow\"}','2025-09-10 12:35:47','2025-09-10 12:35:47');
/*!40000 ALTER TABLE `entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_submissions`
--

DROP TABLE IF EXISTS `form_submissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `form_submissions` (
  `id` decimal(14,4) NOT NULL,
  `form` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` json DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `form_submissions_id_unique` (`id`),
  UNIQUE KEY `form_submissions_form_created_at_unique` (`form`,`created_at`),
  KEY `form_submissions_form_index` (`form`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_submissions`
--

LOCK TABLES `form_submissions` WRITE;
/*!40000 ALTER TABLE `form_submissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `form_submissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forms`
--

DROP TABLE IF EXISTS `forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `handle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `forms_handle_unique` (`handle`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forms`
--

LOCK TABLES `forms` WRITE;
/*!40000 ALTER TABLE `forms` DISABLE KEYS */;
INSERT INTO `forms` VALUES (1,'contact','Contact','{\"data\": [], \"email\": null, \"store\": true, \"honeypot\": \"honeypot\"}','2025-09-05 17:52:34','2025-09-05 17:52:34');
/*!40000 ALTER TABLE `forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `global_set_variables`
--

DROP TABLE IF EXISTS `global_set_variables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `global_set_variables` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `handle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `global_set_variables_handle_index` (`handle`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `global_set_variables`
--

LOCK TABLES `global_set_variables` WRITE;
/*!40000 ALTER TABLE `global_set_variables` DISABLE KEYS */;
INSERT INTO `global_set_variables` VALUES (1,'site_options','nl',NULL,'[]','2025-09-05 18:02:18','2025-09-05 18:02:18'),(2,'site_options','en',NULL,'[]','2025-09-05 18:02:47','2025-09-05 18:02:47'),(3,'site_options','de',NULL,'[]','2025-09-05 18:02:47','2025-09-05 18:02:47'),(4,'master_data','nl',NULL,'[]','2025-09-05 18:03:41','2025-09-05 18:03:41'),(5,'master_data','en',NULL,'[]','2025-09-10 07:17:48','2025-09-10 07:17:48'),(6,'master_data','de',NULL,'[]','2025-09-10 07:17:48','2025-09-10 07:17:48');
/*!40000 ALTER TABLE `global_set_variables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `global_sets`
--

DROP TABLE IF EXISTS `global_sets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `global_sets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `handle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `global_sets_handle_unique` (`handle`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `global_sets`
--

LOCK TABLES `global_sets` WRITE;
/*!40000 ALTER TABLE `global_sets` DISABLE KEYS */;
INSERT INTO `global_sets` VALUES (1,'site_options','Site Options','[]','2025-09-05 18:02:18','2025-09-05 18:02:18'),(2,'master_data','Master data','[]','2025-09-05 18:03:41','2025-09-05 18:03:41');
/*!40000 ALTER TABLE `global_sets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_user`
--

DROP TABLE IF EXISTS `group_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `group_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `group_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_user_user_id_foreign` (`user_id`),
  CONSTRAINT `group_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_user`
--

LOCK TABLES `group_user` WRITE;
/*!40000 ALTER TABLE `group_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_03_07_100000_create_asset_table',1),(5,'2024_03_07_100000_create_entries_table_with_string_ids',1),(6,'2024_03_07_100000_create_form_submissions_table',1),(7,'2024_03_07_100000_create_forms_table',1),(8,'2024_03_07_100000_create_global_variables_table',1),(9,'2024_03_07_100000_create_globals_table',1),(10,'2024_03_07_100000_create_navigation_trees_table',1),(11,'2024_03_07_100000_create_taxonomies_table',1),(12,'2024_03_07_100000_create_terms_table',1),(13,'2024_03_07_100000_create_tokens_table',1),(14,'2024_05_15_100000_modify_form_submissions_id',1),(15,'2025_09_05_132931_statamic_auth_tables',1),(16,'2024_03_07_100000_create_blueprints_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_activation_tokens`
--

DROP TABLE IF EXISTS `password_activation_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_activation_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_activation_tokens_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_activation_tokens`
--

LOCK TABLES `password_activation_tokens` WRITE;
/*!40000 ALTER TABLE `password_activation_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_activation_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taxonomies`
--

DROP TABLE IF EXISTS `taxonomies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taxonomies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `handle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sites` json DEFAULT NULL,
  `settings` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `taxonomies_handle_unique` (`handle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxonomies`
--

LOCK TABLES `taxonomies` WRITE;
/*!40000 ALTER TABLE `taxonomies` DISABLE KEYS */;
/*!40000 ALTER TABLE `taxonomies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taxonomy_terms`
--

DROP TABLE IF EXISTS `taxonomy_terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taxonomy_terms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `site` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taxonomy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `taxonomy_terms_slug_taxonomy_site_unique` (`slug`,`taxonomy`,`site`),
  KEY `taxonomy_terms_site_index` (`site`),
  KEY `taxonomy_terms_uri_index` (`uri`),
  KEY `taxonomy_terms_taxonomy_index` (`taxonomy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxonomy_terms`
--

LOCK TABLES `taxonomy_terms` WRITE;
/*!40000 ALTER TABLE `taxonomy_terms` DISABLE KEYS */;
/*!40000 ALTER TABLE `taxonomy_terms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tokens`
--

DROP TABLE IF EXISTS `tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `handler` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` json NOT NULL,
  `expire_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tokens_token_unique` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tokens`
--

LOCK TABLES `tokens` WRITE;
/*!40000 ALTER TABLE `tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trees`
--

DROP TABLE IF EXISTS `trees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `handle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tree` json DEFAULT NULL,
  `settings` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `trees_handle_type_locale_unique` (`handle`,`type`,`locale`),
  KEY `trees_type_index` (`type`),
  KEY `trees_locale_index` (`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trees`
--

LOCK TABLES `trees` WRITE;
/*!40000 ALTER TABLE `trees` DISABLE KEYS */;
INSERT INTO `trees` VALUES (1,'primary_navigation','navigation','nl','[{\"id\": \"d850a3a7-a0a6-495c-8768-c3503d2dc92d\", \"entry\": \"b8d24cbb-b120-4102-9cb2-6137b7505f07\"}]','[]','2025-09-05 17:05:36','2025-09-05 17:09:00'),(2,'pages','collection','nl','[{\"entry\": \"59db8116-8a6f-4926-8cac-e82e0df9675a\"}]','[]','2025-09-05 17:08:37','2025-09-10 09:52:15'),(3,'pages','collection','de','[{\"entry\": \"d655b217-abfb-46b0-a8a2-a66a9f3f3e7c\"}]','[]','2025-09-09 18:04:36','2025-09-10 09:52:35'),(4,'pages','collection','en','[{\"entry\": \"6f865e6e-b0a5-438a-adb5-4415b2f95705\"}, {\"entry\": \"d68cf718-9fac-465d-808b-8213a9bc39cd\"}]','[]','2025-09-10 09:50:50','2025-09-10 12:35:47'),(5,'footer_navigation','navigation','en','[{\"id\": \"ab7a249c-034e-481c-9340-09fce23e7cca\", \"url\": \"https://www.mindtwo.de/impressum\", \"title\": \"Imprint\"}, {\"id\": \"0d8dc5e9-d914-413e-ac55-e66a878aecfa\", \"url\": \"https://www.mindtwo.de/datenschutz\", \"title\": \"Privacy\"}]','[]','2025-09-10 11:47:47','2025-09-10 11:48:20'),(6,'primary_navigation','navigation','en','[{\"id\": \"0de6fc70-28ed-47e6-88d2-531d7e2e95ee\", \"entry\": \"6f865e6e-b0a5-438a-adb5-4415b2f95705\"}, {\"id\": \"2b2cc140-f938-4a9b-9c5c-6fd0664d3eac\", \"entry\": \"d68cf718-9fac-465d-808b-8213a9bc39cd\"}]','[]','2025-09-10 12:33:05','2025-09-10 12:36:04'),(7,'primary_navigation','navigation','de','[]','[]','2025-09-10 12:33:05','2025-09-10 12:33:05'),(8,'meta_navigation','navigation','de','[]','[]','2025-09-10 12:33:21','2025-09-10 12:33:21'),(9,'meta_navigation','navigation','en','[]','[]','2025-09-10 12:33:21','2025-09-10 12:33:21'),(10,'meta_navigation','navigation','nl','[]','[]','2025-09-10 12:33:21','2025-09-10 12:33:21');
/*!40000 ALTER TABLE `trees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `super` tinyint(1) NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preferences` json DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Oliver Lieske','lieske@mindtwo.de',NULL,'$2y$12$6HX34syoH9ZeWPFhOUwEC.jXoVk4d8zbzZda6ZQRL9hp7lfajdgTG',NULL,'2025-09-05 14:36:45','2025-09-05 14:36:45',1,NULL,NULL,NULL),(2,'Christian Arenz','arenz@mindtwo.de',NULL,'$2y$12$0I0utEqPSy.e0JSPOIFxvewuW1jy5ePKTKovFdqfs34tjbzlKifdG',NULL,'2025-09-05 14:40:23','2025-09-05 14:40:23',1,NULL,NULL,'2025-09-09 18:04:14');
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

-- Dump completed on 2025-09-11 19:57:32
