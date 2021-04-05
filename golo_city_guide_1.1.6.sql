# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.23)
# Database: golo_114
# Generation Time: 2020-06-22 15:43:36 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table amenities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `amenities`;

CREATE TABLE `amenities` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `amenities` WRITE;
/*!40000 ALTER TABLE `amenities` DISABLE KEYS */;

INSERT INTO `amenities` (`id`, `name`, `icon`, `created_at`, `updated_at`)
VALUES
	(6,'Free wifi','5dc050bbc831e_1572884667.svg','2019-11-02 16:02:01','2019-11-04 16:25:12'),
	(7,'Reservations','5dc050b32b5a5_1572884659.svg','2019-11-04 14:37:01','2019-11-04 16:24:19'),
	(8,'Credit cards','5dc050aa39545_1572884650.svg','2019-11-04 14:37:19','2019-11-04 16:24:10'),
	(9,'Non smoking','5dc0509592350_1572884629.svg','2019-11-04 14:40:22','2019-11-04 16:23:49'),
	(10,'Air conditioner','5e1fd3ff3dd32_1579144191.svg','2019-11-04 16:21:12','2020-01-16 03:09:51'),
	(11,'Car parking','5e1fd3ea806fe_1579144170.svg','2019-11-04 16:24:54','2020-01-16 03:09:30'),
	(12,'Swimming pool','5dc050fc4f6dc_1572884732.svg','2019-11-04 16:25:32','2019-11-04 16:25:32'),
	(13,'Cocktails','5e1fcee15a95e_1579142881.svg','2019-11-04 16:33:05','2020-01-16 02:48:01');

/*!40000 ALTER TABLE `amenities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table amenities_translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `amenities_translations`;

CREATE TABLE `amenities_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `amenities_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `amenities_translations_amenities_id_locale_unique` (`amenities_id`,`locale`),
  KEY `amenities_translations_locale_index` (`locale`),
  CONSTRAINT `amenities_translations_amenities_id_foreign` FOREIGN KEY (`amenities_id`) REFERENCES `amenities` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `amenities_translations` WRITE;
/*!40000 ALTER TABLE `amenities_translations` DISABLE KEYS */;

INSERT INTO `amenities_translations` (`id`, `amenities_id`, `locale`, `name`)
VALUES
	(1,6,'en','Free wifi'),
	(2,7,'en','Reservations'),
	(3,8,'en','Credit cards'),
	(4,9,'en','Non smoking'),
	(5,10,'en','Air conditioner'),
	(6,11,'en','Car parking'),
	(7,12,'en','Swimming pool'),
	(8,13,'en','Cocktails');

/*!40000 ALTER TABLE `amenities_translations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table bookings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bookings`;

CREATE TABLE `bookings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `place_id` int(11) DEFAULT NULL,
  `numbber_of_adult` int(11) DEFAULT NULL,
  `numbber_of_children` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `name` varchar(255) DEFAULT '',
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `type` int(2) DEFAULT NULL,
  `status` int(2) DEFAULT '2' COMMENT 'status default pending: 2',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;

INSERT INTO `bookings` (`id`, `user_id`, `place_id`, `numbber_of_adult`, `numbber_of_children`, `date`, `time`, `name`, `email`, `phone_number`, `message`, `type`, `status`, `created_at`, `updated_at`)
VALUES
	(60,8,19,1,1,'2020-02-11','01:00:00','',NULL,NULL,NULL,1,1,'2020-02-10 08:04:16','2020-02-10 08:34:42'),
	(61,8,18,NULL,NULL,NULL,NULL,'Kevin','kevin@uxper.co','+81337120819','Hello, I need a book',2,0,'2020-02-10 08:07:52','2020-02-13 03:48:21'),
	(63,8,41,1,1,'2020-02-16','01:30:00','',NULL,NULL,NULL,1,2,'2020-02-15 08:00:37','2020-02-15 08:00:37'),
	(65,13,19,1,1,'2020-02-16','01:30:00','',NULL,NULL,NULL,1,2,'2020-02-15 11:15:23','2020-02-15 11:15:23'),
	(66,13,19,1,1,'2020-02-16','01:30:00','',NULL,NULL,NULL,1,2,'2020-02-15 11:17:32','2020-02-15 11:17:32'),
	(67,13,19,1,1,'2020-02-21','01:00:00','',NULL,NULL,NULL,1,2,'2020-02-15 11:18:26','2020-02-15 11:18:26'),
	(68,13,19,1,1,'2020-02-21','01:00:00','',NULL,NULL,NULL,1,2,'2020-02-15 11:18:29','2020-02-15 11:18:29'),
	(73,8,41,1,0,'2020-02-16','12:30:00','',NULL,NULL,NULL,1,2,'2020-02-15 11:28:30','2020-02-15 11:28:30'),
	(74,8,19,1,0,'2020-02-15','12:30:00','',NULL,NULL,NULL,1,1,'2020-02-15 16:34:02','2020-02-16 08:13:43'),
	(75,8,19,1,0,'2020-02-15','12:30:00','',NULL,NULL,NULL,1,1,'2020-02-15 16:35:38','2020-02-16 04:10:46');

/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT '0',
  `is_feature` int(11) DEFAULT '0',
  `feature_title` varchar(255) DEFAULT NULL,
  `icon_map_marker` varchar(255) DEFAULT NULL,
  `color_code` varchar(80) DEFAULT NULL,
  `type` varchar(10) DEFAULT 'place',
  `status` int(11) DEFAULT '1',
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`, `slug`, `priority`, `is_feature`, `feature_title`, `icon_map_marker`, `color_code`, `type`, `status`, `seo_title`, `seo_description`, `created_at`, `updated_at`)
VALUES
	(11,'See & Do','see-do',100,1,'Must See & Do','5ddba7be9c049_1574676414.svg',NULL,'place',1,NULL,NULL,'2019-10-25 11:11:08','2019-12-21 11:24:22'),
	(12,'Eat & Drink','eat-drink',20,1,'Where to Eat','5ddba7c95e36a_1574676425.svg',NULL,'place',1,NULL,NULL,'2019-10-25 11:11:19','2019-12-21 11:24:03'),
	(13,'Stay','stay',10,1,'Place to stay','5ddba7d25d9f9_1574676434.svg',NULL,'place',1,NULL,NULL,'2019-10-25 11:11:45','2019-12-21 11:25:25'),
	(15,'Beaches','beaches',0,0,NULL,NULL,NULL,'post',1,NULL,NULL,'2019-11-27 08:57:25','2019-11-27 08:57:25'),
	(16,'Road Trips','road-trips',0,0,NULL,NULL,NULL,'post',1,NULL,NULL,'2019-11-27 08:57:32','2019-11-27 08:57:32'),
	(17,'Take a break','take-a-break',0,0,NULL,NULL,NULL,'post',1,NULL,NULL,'2019-11-27 08:57:38','2019-11-27 08:57:38'),
	(18,'Tips & Tricks','tips-tricks',0,0,NULL,NULL,NULL,'post',1,NULL,NULL,'2019-11-27 08:57:45','2019-11-27 08:57:45'),
	(19,'Unique Stay','unique-stay',0,0,NULL,NULL,NULL,'post',1,NULL,NULL,'2019-11-27 08:57:55','2019-11-27 08:57:55');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table category_translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category_translations`;

CREATE TABLE `category_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `feature_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_translations_category_id_locale_unique` (`category_id`,`locale`),
  KEY `category_translations_locale_index` (`locale`),
  CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `category_translations` WRITE;
/*!40000 ALTER TABLE `category_translations` DISABLE KEYS */;

INSERT INTO `category_translations` (`id`, `category_id`, `locale`, `name`, `feature_title`)
VALUES
	(1,11,'en','See & Do',NULL),
	(2,12,'en','Eat & Drink',NULL),
	(3,13,'en','Stay',NULL),
	(4,15,'en','Beaches',NULL),
	(5,16,'en','Road Trips',NULL),
	(6,17,'en','Take a break',NULL),
	(7,18,'en','Tips & Tricks',NULL),
	(8,19,'en','Unique Stay',NULL);

/*!40000 ALTER TABLE `category_translations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `best_time_to_visit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `priority` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;

INSERT INTO `cities` (`id`, `country_id`, `name`, `slug`, `intro`, `description`, `thumb`, `banner`, `best_time_to_visit`, `currency`, `language`, `lat`, `lng`, `priority`, `status`, `seo_title`, `seo_description`, `created_at`, `updated_at`)
VALUES
	(23,6,'Paris','paris','The city of love','Second City? Not by our count. It’s world-class in so many categories magnificent architecture, stunning museums, brilliant chefs, a massive brewing scene, and so much to do that you’ll never see it all. Scratch the surface in the Loop and on the Gold Coast.','5dbfe6899b2fc_1572857481.jpg','5dbfe6899b750_1572857481.jpg','Anytime','U. S. Dollar','English',48.85661400000001,2.3522219000000177,0,1,NULL,NULL,'2019-10-25 11:09:36','2019-11-25 08:35:01'),
	(24,8,'Bangkok','bangkok','When in doubt, get a tuk-tuk','It isn’t a conventional charm that keeps us coming back to Bangkok. The Thai capital doesn’t have an Old Town like Hanoi, the modernity of Hong Kong, or the density of temples like Siem Reap (though few places in Southeast Asia are as spectacular as Wat Arun at sunrise).','5dbff91de1e74_1572862237.jpeg','5dbff91de1ff1_1572862237.jpeg','Nov to Apr','Thai Baht','Thai',13.7563309,100.50176510000006,0,1,NULL,NULL,'2019-11-04 10:10:37','2019-12-01 10:49:09'),
	(25,12,'Tokyo','tokyo','The world\'s best city, found in translation','Tokyo (東京, Tōkyō) is Japan’s capital and the world’s most populous metropolis. It is also one of Japan’s 47 prefectures, consisting of 23 central city wards and multiple cities, towns and villages west of the city center. The Izu and Ogasawara Islands are also part of Tokyo.','5dbff9bb02d31_1572862395.jpeg','5dbff9bb02f77_1572862395.jpeg','Anytime','Yen','Japanish',35.6803997,139.76901739999994,0,1,NULL,NULL,'2019-11-04 10:13:15','2019-12-01 10:48:38'),
	(26,11,'New York','newyork','The entire world in one place','To know “The City” like a local might still be the greatest badge of honor for travelers. But take a breath: you won’t be able to cover the countless museums, galleries, restaurants, watering holes—and, yes, $1 pizza slices—all in one visit, but that’s the good news.','5dbffa52407d0_1572862546.jpeg','5dbffa524098a_1572862546.jpeg','April to December','U.S. dollar','English',40.7127753,-74.0059728,0,1,NULL,NULL,'2019-11-04 10:15:46','2019-12-01 10:48:54'),
	(27,9,'Barcelona','barcelona','Just don’t confuse it with Spain','Barcelona is a city full of wonder and beauty, where there’s a pronounced passion for life, food, culture, and of course, architecture. Where else can you surf in the morning, do a master tour of Gaudí’s surreal buildings (the Sagrada Familia and the Parc Güell, to name a couple).','5dbffaefcbc49_1572862703.jpeg','5dbffaefcbe36_1572862703.jpeg','Anytime','U. S. Dollar','Spainish',41.38506389999999,2.1734034999999494,0,1,NULL,NULL,'2019-11-04 10:18:23','2019-12-01 10:49:48'),
	(28,7,'Amsterdam','amsterdam','The other canal city','Of all the cities in Europe, Amsterdam is one of the most delightful, its bustling markets, magnificent art galleries, olive-green canals and gabled houses famous throughout the world. One of its special charms is its small-city feel with all the key attractions within easy walking distance.','5dbffba4b4e30_1572862884.jpeg','5dbffba4b4fed_1572862884.jpeg','Anytime','U. S. Dollar','English',52.3666969,4.894539799999961,0,1,NULL,NULL,'2019-11-04 10:21:24','2019-12-01 10:50:02'),
	(29,11,'Los Angeles','los-angeles','Cinematic city of dreams','From the Hollywood hills to the Venice Beach boardwalk, Los Angeles is a cinematic city of dreams, where every sunset feels like a scene from a movie. The center of the entertainment world','5ddbaa735069a_1574677107.jpeg','5dbffcae4fbe7_1572863150.jpeg','Anytime','U. S. Dollar','English',34.0522342,-118.2436849,0,1,NULL,NULL,'2019-11-04 10:25:50','2019-11-25 10:18:27'),
	(30,10,'London','london','Where the pubs are as old as the monuments','London is as much about innovation as tradition; it’s a place that’s impossible to finish discovering, where the promise of something new is always in the air.','5ddbaa332c9b5_1574677043.jpeg','5dbffd3d0ad05_1572863293.jpeg','May, Sep, Dec','Pound','English',51.5073509,-0.12775829999998223,0,1,NULL,NULL,'2019-11-04 10:28:13','2019-12-01 10:50:26');

/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table city_translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `city_translations`;

CREATE TABLE `city_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `city_translations_city_id_locale_unique` (`city_id`,`locale`),
  KEY `city_translations_locale_index` (`locale`),
  CONSTRAINT `city_translations_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `city_translations` WRITE;
/*!40000 ALTER TABLE `city_translations` DISABLE KEYS */;

INSERT INTO `city_translations` (`id`, `city_id`, `locale`, `name`, `intro`, `description`)
VALUES
	(1,23,'en','Paris','The city of love','Second City? Not by our count. It’s world-class in so many categories magnificent architecture, stunning museums, brilliant chefs, a massive brewing scene, and so much to do that you’ll never see it all. Scratch the surface in the Loop and on the Gold Coa'),
	(2,24,'en','Bangkok','When in doubt, get a tuk-tuk','It isn’t a conventional charm that keeps us coming back to Bangkok. The Thai capital doesn’t have an Old Town like Hanoi, the modernity of Hong Kong, or the density of temples like Siem Reap (though few places in Southeast Asia are as spectacular as Wat A'),
	(3,25,'en','Tokyo','The world\'s best city, found in translation','Tokyo (東京, Tōkyō) is Japan’s capital and the world’s most populous metropolis. It is also one of Japan’s 47 prefectures, consisting of 23 central city wards and multiple cities, towns and villages west of the city center. The Izu and Ogasawara Islands are'),
	(4,26,'en','New York','The entire world in one place','To know “The City” like a local might still be the greatest badge of honor for travelers. But take a breath: you won’t be able to cover the countless museums, galleries, restaurants, watering holes—and, yes, $1 pizza slices—all in one visit, but that’s th'),
	(5,27,'en','Barcelona','Just don’t confuse it with Spain','Barcelona is a city full of wonder and beauty, where there’s a pronounced passion for life, food, culture, and of course, architecture. Where else can you surf in the morning, do a master tour of Gaudí’s surreal buildings (the Sagrada Familia and the Parc'),
	(6,28,'en','Amsterdam','The other canal city','Of all the cities in Europe, Amsterdam is one of the most delightful, its bustling markets, magnificent art galleries, olive-green canals and gabled houses famous throughout the world. One of its special charms is its small-city feel with all the key attr'),
	(7,29,'en','Los Angeles','Cinematic city of dreams','From the Hollywood hills to the Venice Beach boardwalk, Los Angeles is a cinematic city of dreams, where every sunset feels like a scene from a movie. The center of the entertainment world'),
	(8,30,'en','London','Where the pubs are as old as the monuments','London is as much about innovation as tradition; it’s a place that’s impossible to finish discovering, where the promise of something new is always in the air.');

/*!40000 ALTER TABLE `city_translations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table countries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;

INSERT INTO `countries` (`id`, `name`, `slug`, `priority`, `status`, `seo_title`, `seo_description`, `seo_cover_image`, `created_at`, `updated_at`)
VALUES
	(6,'France','france',0,1,NULL,NULL,NULL,'2019-10-25 11:05:59','2019-10-25 11:05:59'),
	(7,'Netherlands','netherlands',0,1,NULL,NULL,NULL,'2019-11-04 08:47:53','2019-11-04 08:47:53'),
	(8,'Thailand','thailand',0,1,NULL,NULL,NULL,'2019-11-04 08:48:17','2019-11-04 08:48:17'),
	(9,'Spain','spain',0,1,NULL,NULL,NULL,'2019-11-04 08:48:38','2019-11-04 08:48:38'),
	(10,'United Kingdom','united-kingdom',0,1,NULL,NULL,NULL,'2019-11-04 08:48:54','2019-11-04 08:48:54'),
	(11,'United States','united-states',0,1,NULL,NULL,NULL,'2019-11-04 08:49:46','2019-11-04 08:49:46'),
	(12,'Japan','japan',0,1,NULL,NULL,NULL,'2019-11-04 08:50:17','2019-11-04 08:50:17');

/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table languages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `native_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;

INSERT INTO `languages` (`id`, `name`, `native_name`, `code`, `is_default`, `is_active`, `created_at`, `updated_at`)
VALUES
	(1,'Abkhaz','аҧсуа','ab',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(2,'Afar','Afaraf','aa',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(3,'Afrikaans','Afrikaans','af',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(4,'Akan','Akan','ak',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(5,'Albanian','Shqip','sq',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(6,'Amharic','አማርኛ','am',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(7,'Arabic','العربية','ar',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(8,'Aragonese','Aragonés','an',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(9,'Armenian','Հայերեն','hy',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(10,'Assamese','অসমীয়া','as',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(11,'Avaric','авар мацӀ, магӀарул мацӀ','av',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(12,'Avestan','avesta','ae',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(13,'Aymara','aymar aru','ay',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(14,'Azerbaijani','azərbaycan dili','az',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(15,'Bambara','bamanankan','bm',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(16,'Bashkir','башҡорт теле','ba',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(17,'Basque','euskara, euskera','eu',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(18,'Belarusian','Беларуская','be',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(19,'Bengali','বাংলা','bn',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(20,'Bihari','भोजपुरी','bh',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(21,'Bislama','Bislama','bi',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(22,'Bosnian','bosanski jezik','bs',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(23,'Breton','brezhoneg','br',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(24,'Bulgarian','български език','bg',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(25,'Burmese','ဗမာစာ','my',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(26,'Catalan; Valencian','Català','ca',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(27,'Chamorro','Chamoru','ch',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(28,'Chechen','нохчийн мотт','ce',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(29,'Chichewa; Chewa; Nyanja','chiCheŵa, chinyanja','ny',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(30,'Chinese','中文 (Zhōngwén), 汉语, 漢語','zh',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(31,'Chuvash','чӑваш чӗлхи','cv',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(32,'Cornish','Kernewek','kw',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(33,'Corsican','corsu, lingua corsa','co',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(34,'Cree','ᓀᐦᐃᔭᐍᐏᐣ','cr',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(35,'Croatian','hrvatski','hr',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(36,'Czech','česky, čeština','cs',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(37,'Danish','dansk','da',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(38,'Divehi; Dhivehi; Maldivian;','ދިވެހި','dv',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(39,'Dutch','Nederlands, Vlaams','nl',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(40,'English','English','en',1,1,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(41,'Esperanto','Esperanto','eo',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(42,'Estonian','eesti, eesti keel','et',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(43,'Ewe','Eʋegbe','ee',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(44,'Faroese','føroyskt','fo',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(45,'Fijian','vosa Vakaviti','fj',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(46,'Finnish','suomi, suomen kieli','fi',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(47,'French','français, langue française','fr',0,1,'2020-04-02 00:20:54','2020-04-02 00:21:33'),
	(48,'Fula; Fulah; Pulaar; Pular','Fulfulde, Pulaar, Pular','ff',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(49,'Galician','Galego','gl',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(50,'Georgian','ქართული','ka',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(51,'German','Deutsch','de',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(52,'Greek, Modern','Ελληνικά','el',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(53,'Guaraní','Avañeẽ','gn',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(54,'Gujarati','ગુજરાતી','gu',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(55,'Haitian; Haitian Creole','Kreyòl ayisyen','ht',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(56,'Hausa','Hausa, هَوُسَ','ha',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(57,'Hebrew (modern)','עברית','he',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(58,'Herero','Otjiherero','hz',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(59,'Hindi','हिन्दी, हिंदी','hi',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(60,'Hiri Motu','Hiri Motu','ho',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(61,'Hungarian','Magyar','hu',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(62,'Interlingua','Interlingua','ia',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(63,'Indonesian','Bahasa Indonesia','id',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(64,'Interlingue','Originally called Occidental; then Interlingue after WWII','ie',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(65,'Irish','Gaeilge','ga',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(66,'Igbo','Asụsụ Igbo','ig',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(67,'Inupiaq','Iñupiaq, Iñupiatun','ik',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(68,'Ido','Ido','io',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(69,'Icelandic','Íslenska','is',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(70,'Italian','Italiano','it',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(71,'Inuktitut','ᐃᓄᒃᑎᑐᑦ','iu',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(72,'Japanese','日本語 (にほんご／にっぽんご)','ja',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(73,'Javanese','basa Jawa','jv',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(74,'Kalaallisut, Greenlandic','kalaallisut, kalaallit oqaasii','kl',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(75,'Kannada','ಕನ್ನಡ','kn',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(76,'Kanuri','Kanuri','kr',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(77,'Kashmiri','कश्मीरी, كشميري‎','ks',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(78,'Kazakh','Қазақ тілі','kk',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(79,'Khmer','ភាសាខ្មែរ','km',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(80,'Kikuyu, Gikuyu','Gĩkũyũ','ki',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(81,'Kinyarwanda','Ikinyarwanda','rw',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(82,'Kirghiz, Kyrgyz','кыргыз тили','ky',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(83,'Komi','коми кыв','kv',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(84,'Kongo','KiKongo','kg',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(85,'Korean','한국어 (韓國語), 조선말 (朝鮮語)','ko',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(86,'Kurdish','Kurdî, كوردی‎','ku',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(87,'Kwanyama, Kuanyama','Kuanyama','kj',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(88,'Latin','latine, lingua latina','la',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(89,'Luxembourgish, Letzeburgesch','Lëtzebuergesch','lb',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(90,'Luganda','Luganda','lg',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(91,'Limburgish, Limburgan, Limburger','Limburgs','li',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(92,'Lingala','Lingála','ln',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(93,'Lao','ພາສາລາວ','lo',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(94,'Lithuanian','lietuvių kalba','lt',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(95,'Luba-Katanga','','lu',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(96,'Latvian','latviešu valoda','lv',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(97,'Manx','Gaelg, Gailck','gv',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(98,'Macedonian','македонски јазик','mk',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(99,'Malagasy','Malagasy fiteny','mg',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(100,'Malay','bahasa Melayu, بهاس ملايو‎','ms',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(101,'Malayalam','മലയാളം','ml',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(102,'Maltese','Malti','mt',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(103,'Māori','te reo Māori','mi',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(104,'Marathi (Marāṭhī)','मराठी','mr',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(105,'Marshallese','Kajin M̧ajeļ','mh',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(106,'Mongolian','монгол','mn',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(107,'Nauru','Ekakairũ Naoero','na',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(108,'Navajo, Navaho','Diné bizaad, Dinékʼehǰí','nv',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(109,'Norwegian Bokmål','Norsk bokmål','nb',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(110,'North Ndebele','isiNdebele','nd',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(111,'Nepali','नेपाली','ne',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(112,'Ndonga','Owambo','ng',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(113,'Norwegian Nynorsk','Norsk nynorsk','nn',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(114,'Norwegian','Norsk','no',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(115,'Nuosu','ꆈꌠ꒿ Nuosuhxop','ii',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(116,'South Ndebele','isiNdebele','nr',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(117,'Occitan','Occitan','oc',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(118,'Ojibwe, Ojibwa','ᐊᓂᔑᓈᐯᒧᐎᓐ','oj',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(119,'Old Church Slavonic, Church Slavic, Church Slavonic, Old Bulgarian, Old Slavonic','ѩзыкъ словѣньскъ','cu',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(120,'Oromo','Afaan Oromoo','om',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(121,'Oriya','ଓଡ଼ିଆ','or',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(122,'Ossetian, Ossetic','ирон æвзаг','os',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(123,'Panjabi, Punjabi','ਪੰਜਾਬੀ, پنجابی‎','pa',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(124,'Pāli','पाऴि','pi',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(125,'Persian','فارسی','fa',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(126,'Polish','polski','pl',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(127,'Pashto, Pushto','پښتو','ps',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(128,'Portuguese','Português','pt',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(129,'Quechua','Runa Simi, Kichwa','qu',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(130,'Romansh','rumantsch grischun','rm',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(131,'Kirundi','kiRundi','rn',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(132,'Romanian, Moldavian, Moldovan','română','ro',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(133,'Russian','русский язык','ru',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(134,'Sanskrit (Saṁskṛta)','संस्कृतम्','sa',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(135,'Sardinian','sardu','sc',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(136,'Sindhi','सिन्धी, سنڌي، سندھی‎','sd',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(137,'Northern Sami','Davvisámegiella','se',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(138,'Samoan','gagana faa Samoa','sm',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(139,'Sango','yângâ tî sängö','sg',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(140,'Serbian','српски језик','sr',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(141,'Scottish Gaelic; Gaelic','Gàidhlig','gd',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(142,'Shona','chiShona','sn',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(143,'Sinhala, Sinhalese','සිංහල','si',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(144,'Slovak','slovenčina','sk',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(145,'Slovene','slovenščina','sl',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(146,'Somali','Soomaaliga, af Soomaali','so',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(147,'Southern Sotho','Sesotho','st',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(148,'Spanish; Castilian','español, castellano','es',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(149,'Sundanese','Basa Sunda','su',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(150,'Swahili','Kiswahili','sw',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(151,'Swati','SiSwati','ss',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(152,'Swedish','svenska','sv',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(153,'Tamil','தமிழ்','ta',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(154,'Telugu','తెలుగు','te',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(155,'Tajik','тоҷикӣ, toğikī, تاجیکی‎','tg',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(156,'Thai','ไทย','th',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(157,'Tigrinya','ትግርኛ','ti',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(158,'Tibetan Standard, Tibetan, Central','བོད་ཡིག','bo',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(159,'Turkmen','Türkmen, Түркмен','tk',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(160,'Tagalog','Wikang Tagalog, ᜏᜒᜃᜅ᜔ ᜆᜄᜎᜓᜄ᜔','tl',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(161,'Tswana','Setswana','tn',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(162,'Tonga (Tonga Islands)','faka Tonga','to',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(163,'Turkish','Türkçe','tr',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(164,'Tsonga','Xitsonga','ts',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(165,'Tatar','татарча, tatarça, تاتارچا‎','tt',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(166,'Twi','Twi','tw',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(167,'Tahitian','Reo Tahiti','ty',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(168,'Uighur, Uyghur','Uyƣurqə, ئۇيغۇرچە‎','ug',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(169,'Ukrainian','українська','uk',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(170,'Urdu','اردو','ur',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(171,'Uzbek','zbek, Ўзбек, أۇزبېك‎','uz',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(172,'Venda','Tshivenḓa','ve',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(173,'Vietnamese','Tiếng Việt','vi',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(174,'Volapük','Volapük','vo',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(175,'Walloon','Walon','wa',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(176,'Welsh','Cymraeg','cy',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(177,'Wolof','Wollof','wo',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(178,'Western Frisian','Frysk','fy',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(179,'Xhosa','isiXhosa','xh',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(180,'Yiddish','ייִדיש','yi',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(181,'Yoruba','Yorùbá','yo',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54'),
	(182,'Zhuang, Chuang','Saɯ cueŋƅ, Saw cuengh','za',0,0,'2020-04-02 00:20:54','2020-04-02 00:20:54');

/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ltm_translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ltm_translations`;

CREATE TABLE `ltm_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `key` text COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `ltm_translations` WRITE;
/*!40000 ALTER TABLE `ltm_translations` DISABLE KEYS */;

INSERT INTO `ltm_translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`)
VALUES
	(1,0,'en','_json','Search results',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(2,0,'en','_json','results for',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(3,0,'en','_json','My account',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(4,0,'en','_json','Reset Password',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(5,0,'en','_json','New password',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(6,0,'en','_json','Enter new password',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(7,0,'en','_json','Re-new password',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(8,0,'en','_json','Save',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(9,0,'en','_json','Profile',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(10,0,'en','_json','Places',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(11,0,'en','_json','Wishlist',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(12,0,'en','_json','Profile Setting',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(13,0,'en','_json','Avatar',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(14,0,'en','_json','Upload new',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(15,0,'en','_json','Basic Info',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(16,0,'en','_json','Full name',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(17,0,'en','_json','Enter your name',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(18,0,'en','_json','Email',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(19,0,'en','_json','Phone',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(20,0,'en','_json','Enter phone number',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(21,0,'en','_json','Facebook',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(22,0,'en','_json','Enter facebook',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(23,0,'en','_json','Instagram',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(24,0,'en','_json','Enter instagram',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(25,0,'en','_json','Update',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(26,0,'en','_json','Change Password',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(27,0,'en','_json','Old password',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(28,0,'en','_json','Enter old password',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(29,0,'en','_json','Place',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(30,0,'en','_json','All cities',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(31,0,'en','_json','All categories',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(32,0,'en','_json','Search',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(33,0,'en','_json','ID',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(34,0,'en','_json','Thumb',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(35,0,'en','_json','Place name',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(36,0,'en','_json','City',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(37,0,'en','_json','Category',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(38,0,'en','_json','Status',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(39,0,'en','_json','Edit',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(40,0,'en','_json','View',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(41,0,'en','_json','Delete',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(42,0,'en','_json','No item found',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(43,0,'en','_json','Login',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(44,0,'en','_json','Sign Up',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(45,0,'en','_json','My Places',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(46,0,'en','_json','Logout',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(47,0,'en','_json','Destinations',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(48,0,'en','_json','Continue with',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(49,0,'en','_json','Forgot password',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(50,0,'en','_json','Add place',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(51,0,'en','_json','Discover amazing things to do everywhere you go.',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(52,0,'en','_json','About Us',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(53,0,'en','_json','Blog',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(54,0,'en','_json','Faqs',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(55,0,'en','_json','Contact',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(56,0,'en','_json','Contact Us',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(57,0,'en','_json','Back to list',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(58,0,'en','_json','Show all',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(59,0,'en','_json','Introducing',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(60,0,'en','_json','Currency',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(61,0,'en','_json','Languages',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(62,0,'en','_json','Best time to visit',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(63,0,'en','_json','Maps view',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(64,0,'en','_json','See all',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(65,0,'en','_json','No places',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(66,0,'en','_json','results',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(67,0,'en','_json','Clear All',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(68,0,'en','_json','Sort By',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(69,0,'en','_json','Newest',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(70,0,'en','_json','Average rating',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(71,0,'en','_json','Price: Low to high',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(72,0,'en','_json','Price: High to low',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(73,0,'en','_json','Free',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(74,0,'en','_json','Low: $',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(75,0,'en','_json','Medium: $$',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(76,0,'en','_json','High: $$$',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(77,0,'en','_json','Types',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(78,0,'en','_json','Amenities',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(79,0,'en','_json','Explorer Other Cities',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(80,0,'en','_json','No cities',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(81,0,'en','_json','Explore the world',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(82,0,'en','_json','Type a city or location',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(83,0,'en','_json','Popular:',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(84,0,'en','_json','Popular cities',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(85,0,'en','_json','Get the App',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(86,0,'en','_json','Download the app and go to travel the world.',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(87,0,'en','_json','Related stories',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(88,0,'en','_json','View more',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(89,0,'en','_json','We want to hear from you.',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(90,0,'en','_json','Our Offices',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(91,0,'en','_json','London (HQ)',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(92,0,'en','_json','Unit TAP.E, 80 Long Lane, London, SE1 4GT',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(93,0,'en','_json','+44 (0)34 5312 3505','+44 (0)34 5312 3505','2020-04-01 22:50:11','2020-04-02 00:25:22'),
	(94,0,'en','_json','Get Direction',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(95,0,'en','_json','Paris',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(96,0,'en','_json','Station F, 2 Parvis Alan Turing, 8742, Paris France',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(97,0,'en','_json','Get in touch with us',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(98,0,'en','_json','First name',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(99,0,'en','_json','Last name',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(100,0,'en','_json','Phone number',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(101,0,'en','_json','Message',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(102,0,'en','_json','Send Message',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(103,0,'en','_json','Genaral',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(104,0,'en','_json','Location',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(105,0,'en','_json','Contact info',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(106,0,'en','_json','Social network',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(107,0,'en','_json','Open hours',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(108,0,'en','_json','Media',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(109,0,'en','_json','Edit my place',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(110,0,'en','_json','Add new place',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(111,0,'en','_json','What the name of place',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(112,0,'en','_json','Price Range',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(113,0,'en','_json','Description',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(114,0,'en','_json','Select Category',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(115,0,'en','_json','Place Type',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(116,0,'en','_json','Select Place Type',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(117,0,'en','_json','Place Address',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(118,0,'en','_json','Select country',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(119,0,'en','_json','Select city',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(120,0,'en','_json','Full Address',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(121,0,'en','_json','Place Location at Google Map',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(122,0,'en','_json','Your email address',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(123,0,'en','_json','Your phone number',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(124,0,'en','_json','Website',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(125,0,'en','_json','Your website url',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(126,0,'en','_json','Social Networks',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(127,0,'en','_json','Select network',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(128,0,'en','_json','Enter URL include http or www',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(129,0,'en','_json','Add more',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(130,0,'en','_json','Opening Hours',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(131,0,'en','_json','Thumb image',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(132,0,'en','_json','Maximum file size: 1 MB',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(133,0,'en','_json','Gallery Images',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(134,0,'en','_json','Video',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(135,0,'en','_json','Youtube, Vimeo video url',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(136,0,'en','_json','Login to submit',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(137,0,'en','_json','Submit',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(138,0,'en','_json','Gallery',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(139,0,'en','_json','Overview',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(140,0,'en','_json','Show more',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(141,0,'en','_json','Location & Maps',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(142,0,'en','_json','Direction',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(143,0,'en','_json','Review',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(144,0,'en','_json','to review',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(145,0,'en','_json','Write a review',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(146,0,'en','_json','Rate This Place',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(147,0,'en','_json','Booking online',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(148,0,'en','_json','Book now',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(149,0,'en','_json','Make a reservation',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(150,0,'en','_json','Send me a message',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(151,0,'en','_json','Send',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(152,0,'en','_json','Banner Ads',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(153,0,'en','_json','By Booking.com',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(154,0,'en','_json','Adults',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(155,0,'en','_json','Childrens',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(156,0,'en','_json','You won\'t be charged yet',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(157,0,'en','_json','You successfully created your booking.',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(158,0,'en','_json','An error occurred. Please try again.',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(159,0,'en','_json','Similar places',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(160,0,'en','_json','by',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(161,0,'en','_json','Related Articles',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(162,0,'en','_json','All',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(163,0,'en','_json','reviews',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(164,0,'en','_json','404 Error',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(165,0,'en','_json','Sorry, we couldn\'t find that page.',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(166,0,'en','_json','OOPS!',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(167,0,'en','_json','We can\'t find the page or studio you\'re looking for.',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(168,0,'en','_json','Make sure you\'ve typed in the URL correctly or try go',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(169,0,'en','_json','Homepage',NULL,'2020-04-01 22:50:11','2020-04-01 22:50:11'),
	(170,0,'fr','_json','Explore the world','Explore le monde','2020-04-01 22:57:36','2020-04-02 00:25:22'),
	(171,0,'fr','_json','Destinations','Les destinations','2020-04-01 22:58:13','2020-04-02 00:25:22'),
	(172,0,'fr','_json','Add place','Ajouter Un Lieu','2020-04-01 23:03:20','2020-04-02 00:25:22'),
	(173,0,'fr','_json','Type a city or location','Saisissez une ville ou un emplacement','2020-04-01 23:04:19','2020-04-02 00:25:22'),
	(174,0,'fr','_json','Popular cities','Villes populaires','2020-04-01 23:04:41','2020-04-02 00:25:22'),
	(175,0,'fr','_json','Get the App','Obtenir l\'application','2020-04-01 23:06:12','2020-04-02 00:25:22'),
	(176,0,'fr','_json','Download the app and go to travel the world.','Téléchargez l\'application et partez parcourir le monde.','2020-04-01 23:06:45','2020-04-02 00:25:22'),
	(177,0,'fr','_json','Related stories','Histoires liées','2020-04-01 23:07:21','2020-04-02 00:25:22'),
	(178,0,'fr','_json','Discover amazing things to do everywhere you go.','Découvrez des choses incroyables à faire partout où vous allez.','2020-04-01 23:07:54','2020-04-02 00:25:22'),
	(179,0,'fr','_json','About Us','À propos de nous','2020-04-01 23:08:47','2020-04-02 00:25:22'),
	(180,0,'fr','_json','Popular:','Populaire','2020-04-01 23:10:33','2020-04-02 00:25:22'),
	(181,0,'fr','_json','Places','Des Endroits','2020-04-01 23:11:04','2020-04-02 00:25:22'),
	(182,0,'fr','_json','View more','Voir plus','2020-04-01 23:11:47','2020-04-02 00:25:22'),
	(183,0,'fr','_json','Introducing','Présentation','2020-04-01 23:27:56','2020-04-02 00:25:22'),
	(184,0,'fr','_json','Currency','DEVISE','2020-04-01 23:28:21','2020-04-02 00:25:22'),
	(185,0,'fr','_json','Languages','LANGUES','2020-04-01 23:28:47','2020-04-02 00:25:22'),
	(186,0,'fr','_json','Best time to visit','MEILLEUR MOMENT POUR VISITER','2020-04-01 23:29:07','2020-04-02 00:25:22'),
	(187,0,'fr','_json','Explorer Other Cities','Explorer d\'autres villes','2020-04-01 23:29:43','2020-04-02 00:25:22'),
	(188,0,'fr','_json','Maps view','Affichage des cartes','2020-04-01 23:33:26','2020-04-02 00:25:22'),
	(189,0,'fr','_json','See all','Voir tout','2020-04-01 23:33:50','2020-04-02 00:25:22'),
	(190,0,'fr','_json','Overview','Aperçu','2020-04-01 23:39:49','2020-04-02 00:25:22'),
	(191,0,'fr','_json','Location & Maps','Emplacement et cartes','2020-04-01 23:40:08','2020-04-02 00:25:22'),
	(192,0,'fr','_json','Contact info','Informations de contact','2020-04-01 23:40:28','2020-04-02 00:25:22'),
	(193,0,'fr','_json','Opening Hours','Horaires d\'ouvertures','2020-04-01 23:40:49','2020-04-02 00:25:22'),
	(194,0,'fr','_json','Our Offices','Horaires d\'ouvertures','2020-04-01 23:41:12','2020-04-02 00:25:22'),
	(195,0,'fr','_json','Write a review','Écrire une critique','2020-04-01 23:41:32','2020-04-02 00:25:22'),
	(196,0,'fr','_json','Rate This Place','Évaluez cet endroit','2020-04-01 23:41:51','2020-04-02 00:25:22'),
	(197,0,'fr','_json','Submit','Soumettre','2020-04-01 23:42:11','2020-04-02 00:25:22'),
	(198,0,'fr','_json','Similar places','Endroits similaires','2020-04-01 23:42:41','2020-04-02 00:25:22'),
	(199,0,'fr','_json','Gallery','Galerie','2020-04-01 23:43:08','2020-04-02 00:25:22'),
	(200,0,'fr','_json','Show more','Montre plus','2020-04-01 23:43:35','2020-04-02 00:25:22'),
	(201,0,'fr','_json','Get in touch with us','Prenez contact avec nous','2020-04-01 23:44:58','2020-04-02 00:25:22'),
	(202,0,'fr','_json','404 Error','Erreur 404','2020-04-01 23:45:17','2020-04-02 00:25:22'),
	(203,0,'fr','_json','Add more','Ajouter plus de','2020-04-01 23:45:31','2020-04-02 00:25:22'),
	(204,0,'fr','_json','Add new place','Ajouter un nouveau lieu','2020-04-01 23:45:48','2020-04-02 00:25:22'),
	(205,0,'fr','_json','Adults','Adultes','2020-04-01 23:46:12','2020-04-02 00:25:22'),
	(206,0,'fr','_json','All','Toute','2020-04-01 23:46:24','2020-04-02 00:25:22'),
	(207,0,'fr','_json','All categories','Toutes catégories','2020-04-01 23:46:34','2020-04-02 00:25:22'),
	(208,0,'fr','_json','All cities','Toutes les villes','2020-04-01 23:46:45','2020-04-02 00:25:22'),
	(209,0,'fr','_json','Amenities','Agréments','2020-04-01 23:46:55','2020-04-02 00:25:22'),
	(210,0,'fr','_json','An error occurred. Please try again.','Une erreur est survenue. Veuillez réessayer.','2020-04-01 23:47:06','2020-04-02 00:25:22'),
	(211,0,'fr','_json','Avatar','Avatar','2020-04-01 23:47:18','2020-04-02 00:25:22'),
	(212,0,'fr','_json','Average rating','Note moyenne','2020-04-01 23:47:28','2020-04-02 00:25:22'),
	(213,0,'fr','_json','Back to list','Retour à la liste','2020-04-01 23:47:38','2020-04-02 00:25:22'),
	(214,0,'fr','_json','Banner Ads','Bannière publicitaire','2020-04-01 23:47:50','2020-04-02 00:25:22'),
	(215,0,'fr','_json','Basic Info','Informations de base','2020-04-01 23:48:14','2020-04-02 00:25:22'),
	(216,0,'fr','_json','Blog','Blog','2020-04-01 23:48:25','2020-04-02 00:25:22'),
	(217,0,'fr','_json','Book now','Reserve maintenant','2020-04-01 23:48:37','2020-04-02 00:25:22'),
	(218,0,'fr','_json','Booking online','Réservation en ligne','2020-04-01 23:48:46','2020-04-02 00:25:22'),
	(219,0,'fr','_json','by','par','2020-04-01 23:48:55','2020-04-02 00:25:22'),
	(220,0,'fr','_json','By Booking.com','Par Booking.com','2020-04-01 23:49:07','2020-04-02 00:25:22'),
	(221,0,'fr','_json','Category','Catégorie','2020-04-01 23:49:18','2020-04-02 00:25:22'),
	(222,0,'fr','_json','Change Password','Changer le mot de passe','2020-04-01 23:49:28','2020-04-02 00:25:22'),
	(223,0,'fr','_json','Childrens','Enfants','2020-04-01 23:49:38','2020-04-02 00:25:22'),
	(224,0,'fr','_json','City','Ville','2020-04-01 23:49:48','2020-04-02 00:25:22'),
	(225,0,'fr','_json','Clear All','Tout effacer','2020-04-01 23:49:58','2020-04-02 00:25:22'),
	(226,0,'fr','_json','Contact','Contact','2020-04-01 23:50:08','2020-04-02 00:25:22'),
	(227,0,'fr','_json','Contact Us','Nous contacter','2020-04-01 23:50:17','2020-04-02 00:25:22'),
	(228,0,'fr','_json','Continue with','Continue avec','2020-04-01 23:50:26','2020-04-02 00:25:22'),
	(229,0,'fr','_json','Delete','Supprimer','2020-04-01 23:50:37','2020-04-02 00:25:22'),
	(230,0,'fr','_json','Description','La description','2020-04-01 23:50:46','2020-04-02 00:25:22'),
	(231,0,'fr','_json','Direction','Direction','2020-04-01 23:50:56','2020-04-02 00:25:22'),
	(232,0,'fr','_json','Edit','Éditer','2020-04-01 23:51:07','2020-04-02 00:25:22'),
	(233,0,'fr','_json','Edit my place','Modifier ma place','2020-04-01 23:51:20','2020-04-02 00:25:22'),
	(234,0,'fr','_json','Email','Email','2020-04-01 23:51:25','2020-04-02 00:25:22'),
	(235,0,'fr','_json','Enter facebook','Entrez facebook','2020-04-01 23:51:48','2020-04-02 00:25:22'),
	(236,0,'fr','_json','Enter instagram','Enter instagram','2020-04-01 23:51:53','2020-04-02 00:25:22'),
	(237,0,'fr','_json','Enter new password','Entrez un nouveau mot de passe','2020-04-01 23:52:05','2020-04-02 00:25:22'),
	(238,0,'fr','_json','Enter old password','Entrez l\'ancien mot de passe','2020-04-01 23:52:15','2020-04-02 00:25:22'),
	(239,0,'fr','_json','Enter phone number','Entrez le numéro de téléphone','2020-04-01 23:52:27','2020-04-02 00:25:22'),
	(240,0,'fr','_json','Enter URL include http or www','Entrez l\'URL inclure http ou www','2020-04-01 23:52:37','2020-04-02 00:25:22'),
	(241,0,'fr','_json','Enter your name','Entrez votre nom','2020-04-01 23:52:48','2020-04-02 00:25:22'),
	(242,0,'fr','_json','Facebook','Facebook','2020-04-01 23:52:53','2020-04-02 00:25:22'),
	(243,0,'fr','_json','Faqs','Faqs','2020-04-01 23:52:57','2020-04-02 00:25:22'),
	(244,0,'fr','_json','First name','Prénom','2020-04-01 23:53:05','2020-04-02 00:25:22'),
	(245,0,'fr','_json','Forgot password','Mot de passe oublié','2020-04-01 23:53:14','2020-04-02 00:25:22'),
	(246,0,'fr','_json','Free','Gratuite','2020-04-01 23:53:24','2020-04-02 00:25:22'),
	(247,0,'fr','_json','Full Address','Adresse complète','2020-04-01 23:53:35','2020-04-02 00:25:22'),
	(248,0,'fr','_json','Full name','Nom complet','2020-04-01 23:53:43','2020-04-02 00:25:22'),
	(249,0,'fr','_json','Gallery Images','Galerie d\'images','2020-04-01 23:53:54','2020-04-02 00:25:22'),
	(250,0,'fr','_json','Genaral','Générale','2020-04-01 23:54:04','2020-04-02 00:25:22'),
	(251,0,'fr','_json','Get Direction','Get Direction','2020-04-01 23:54:15','2020-04-02 00:25:22'),
	(252,0,'fr','_json','High: $$$','Élevé: $$$','2020-04-01 23:54:26','2020-04-02 00:25:22'),
	(253,0,'fr','_json','Homepage','Page d\'accueil','2020-04-01 23:54:35','2020-04-02 00:25:22'),
	(254,0,'fr','_json','Last name','Nom de famille','2020-04-01 23:54:48','2020-04-02 00:25:22'),
	(255,0,'fr','_json','Location','Emplacement','2020-04-01 23:54:59','2020-04-02 00:25:22'),
	(256,0,'fr','_json','Login','S\'identifier','2020-04-01 23:55:09','2020-04-02 00:25:22'),
	(257,0,'fr','_json','Login to submit','Login to submit','2020-04-01 23:55:15','2020-04-02 00:25:22'),
	(258,0,'fr','_json','Logout','Se déconnecter','2020-04-01 23:55:28','2020-04-02 00:25:22'),
	(259,0,'fr','_json','Low: $','Faible: $','2020-04-01 23:55:39','2020-04-02 00:25:22'),
	(260,0,'fr','_json','Make a reservation','Faire une réservation','2020-04-01 23:55:49','2020-04-02 00:25:22'),
	(261,0,'fr','_json','Make sure you\'ve typed in the URL correctly or try go','Assurez-vous que vous avez correctement saisi l\'URL ou essayez d\'aller','2020-04-01 23:55:59','2020-04-02 00:25:22'),
	(262,0,'fr','_json','Maximum file size: 1 MB','Taille maximale du fichier: 1 Mo','2020-04-01 23:56:38','2020-04-02 00:25:22'),
	(263,0,'fr','_json','Media','Médias','2020-04-01 23:56:49','2020-04-02 00:25:22'),
	(264,0,'fr','_json','Medium: $$','Moyen: $$','2020-04-01 23:56:59','2020-04-02 00:25:22'),
	(265,0,'fr','_json','Message','Message','2020-04-01 23:57:11','2020-04-02 00:25:22'),
	(266,0,'fr','_json','My account','Mon compte','2020-04-01 23:57:21','2020-04-02 00:25:22'),
	(267,0,'fr','_json','My Places','Mes lieux','2020-04-01 23:57:33','2020-04-02 00:25:22'),
	(268,0,'fr','_json','New password','New password','2020-04-01 23:57:47','2020-04-02 00:25:22'),
	(269,0,'fr','_json','Newest','Le plus récent','2020-04-01 23:57:56','2020-04-02 00:25:22'),
	(270,0,'fr','_json','No cities','Pas de villes','2020-04-01 23:58:05','2020-04-02 00:25:22'),
	(271,0,'fr','_json','No item found','Aucun élément trouvé','2020-04-01 23:58:13','2020-04-02 00:25:22'),
	(272,0,'fr','_json','No places','Aucun endroit','2020-04-01 23:58:24','2020-04-02 00:25:22'),
	(273,0,'fr','_json','Old password','Ancien mot de passe','2020-04-01 23:58:34','2020-04-02 00:25:22'),
	(274,0,'fr','_json','Open hours','Heures d\'ouverture','2020-04-01 23:58:44','2020-04-02 00:25:22'),
	(275,0,'fr','_json','Phone','Téléphone','2020-04-01 23:58:54','2020-04-02 00:25:22'),
	(276,0,'fr','_json','Phone number','Numéro de téléphone','2020-04-01 23:59:04','2020-04-02 00:25:22'),
	(277,0,'fr','_json','Place','Endroit','2020-04-01 23:59:14','2020-04-02 00:25:22'),
	(278,0,'fr','_json','Place Address','Adresse du lieu','2020-04-01 23:59:27','2020-04-02 00:25:22'),
	(279,0,'fr','_json','Place Location at Google Map','Placer la position sur Google Map','2020-04-01 23:59:36','2020-04-02 00:25:22'),
	(280,0,'fr','_json','Place name','Nom du lieu','2020-04-01 23:59:45','2020-04-02 00:25:22'),
	(281,0,'fr','_json','Place Type','Type de lieu','2020-04-01 23:59:56','2020-04-02 00:25:22'),
	(282,0,'fr','_json','Price Range','Échelle des prix','2020-04-02 00:00:08','2020-04-02 00:25:22'),
	(283,0,'fr','_json','Price: High to low','Prix: de haut en bas','2020-04-02 00:00:16','2020-04-02 00:25:22'),
	(284,0,'fr','_json','Price: Low to high','Price: Low to high','2020-04-02 00:00:22','2020-04-02 00:25:22'),
	(285,0,'fr','_json','Profile','Profil','2020-04-02 00:00:32','2020-04-02 00:25:22'),
	(286,0,'fr','_json','Profile Setting','Réglage du profil','2020-04-02 00:00:41','2020-04-02 00:25:22'),
	(287,0,'fr','_json','Re-new password','Nouveau mot de passe','2020-04-02 00:00:50','2020-04-02 00:25:22'),
	(288,0,'fr','_json','Related Articles','Articles Liés','2020-04-02 00:01:01','2020-04-02 00:25:22'),
	(289,0,'fr','_json','Reset Password','réinitialiser le mot de passe','2020-04-02 00:01:12','2020-04-02 00:25:22'),
	(290,0,'fr','_json','results','résultats','2020-04-02 00:01:23','2020-04-02 00:25:22'),
	(291,0,'fr','_json','results for','résultats pour','2020-04-02 00:01:32','2020-04-02 00:25:22'),
	(292,0,'fr','_json','Review','La revue','2020-04-02 00:01:42','2020-04-02 00:25:22'),
	(293,0,'fr','_json','reviews','Commentaires','2020-04-02 00:01:53','2020-04-02 00:25:22'),
	(294,0,'fr','_json','Save','sauvegarder','2020-04-02 00:02:04','2020-04-02 00:25:22'),
	(295,0,'fr','_json','Search','Chercher','2020-04-02 00:02:15','2020-04-02 00:25:22'),
	(296,0,'fr','_json','Search results','Résultats de recherche','2020-04-02 00:02:24','2020-04-02 00:25:22'),
	(297,0,'fr','_json','Select Category','Choisir une catégorie','2020-04-02 00:02:33','2020-04-02 00:25:22'),
	(298,0,'fr','_json','Select city','Sélectionnez une ville','2020-04-02 00:02:42','2020-04-02 00:25:22'),
	(299,0,'fr','_json','Select country','Choisissez le pays','2020-04-02 00:02:54','2020-04-02 00:25:22'),
	(300,0,'fr','_json','Select network','Sélectionnez réseau','2020-04-02 00:03:05','2020-04-02 00:25:22'),
	(301,0,'fr','_json','Select Place Type','Sélectionnez le type de lieu','2020-04-02 00:03:13','2020-04-02 00:25:22'),
	(302,0,'fr','_json','Send','Envoyer','2020-04-02 00:03:22','2020-04-02 00:25:22'),
	(303,0,'fr','_json','Send me a message','Envoyez-moi un message','2020-04-02 00:03:32','2020-04-02 00:25:22'),
	(304,0,'fr','_json','Send Message','Envoyer le message','2020-04-02 00:03:42','2020-04-02 00:25:22'),
	(305,0,'fr','_json','Show all','Afficher tout','2020-04-02 00:03:50','2020-04-02 00:25:22'),
	(306,0,'fr','_json','Sign Up','S\'inscrire','2020-04-02 00:04:00','2020-04-02 00:25:22'),
	(307,0,'fr','_json','Social network','Réseau social','2020-04-02 00:04:09','2020-04-02 00:25:22'),
	(308,0,'fr','_json','Social Networks','Réseau social','2020-04-02 00:04:14','2020-04-02 00:25:22'),
	(309,0,'fr','_json','Sorry, we couldn\'t find that page.','Désolé, nous n\'avons pas pu trouver cette page.','2020-04-02 00:04:28','2020-04-02 00:25:22'),
	(310,0,'fr','_json','Sort By','Trier par','2020-04-02 00:04:39','2020-04-02 00:25:22'),
	(311,0,'fr','_json','Status','Statut','2020-04-02 00:04:53','2020-04-02 00:25:22'),
	(312,0,'fr','_json','Thumb','Thumb','2020-04-02 00:05:04','2020-04-02 00:25:22'),
	(313,0,'fr','_json','Thumb image','Image du pouce','2020-04-02 00:05:14','2020-04-02 00:25:22'),
	(314,0,'fr','_json','to review','réviser','2020-04-02 00:05:23','2020-04-02 00:25:22'),
	(315,0,'fr','_json','Types','Les types','2020-04-02 00:05:33','2020-04-02 00:25:22'),
	(316,0,'fr','_json','Update','Mise à jour','2020-04-02 00:05:43','2020-04-02 00:25:22'),
	(317,0,'fr','_json','Upload new','Importer un nouveau','2020-04-02 00:05:54','2020-04-02 00:25:22'),
	(318,0,'fr','_json','Video','Vidéo','2020-04-02 00:06:04','2020-04-02 00:25:22'),
	(319,0,'fr','_json','View','Vue','2020-04-02 00:06:13','2020-04-02 00:25:22'),
	(320,0,'fr','_json','We can\'t find the page or studio you\'re looking for.','Nous ne trouvons pas la page ou le studio que vous recherchez.','2020-04-02 00:06:26','2020-04-02 00:25:22'),
	(321,0,'fr','_json','We want to hear from you.','Nous voulons de vos nouvelles.','2020-04-02 00:06:40','2020-04-02 00:25:22'),
	(322,0,'fr','_json','Website','Site Internet','2020-04-02 00:06:52','2020-04-02 00:25:22'),
	(323,0,'fr','_json','What the name of place','quel est le nom du lieu','2020-04-02 00:07:13','2020-04-02 00:25:22'),
	(324,0,'fr','_json','Wishlist','Liste de souhaits','2020-04-02 00:07:24','2020-04-02 00:25:22'),
	(325,0,'fr','_json','You successfully created your booking.','Vous avez créé votre réservation avec succès.','2020-04-02 00:07:35','2020-04-02 00:25:22'),
	(326,0,'fr','_json','You won\'t be charged yet','You won\'t be charged yet','2020-04-02 00:07:43','2020-04-02 00:25:22'),
	(327,0,'fr','_json','Your email address','Votre adresse email','2020-04-02 00:07:54','2020-04-02 00:25:22'),
	(328,0,'fr','_json','Your phone number','Votre numéro de téléphone','2020-04-02 00:08:05','2020-04-02 00:25:22'),
	(329,0,'fr','_json','Your website url','L\'adresse URL de votre site','2020-04-02 00:08:15','2020-04-02 00:25:22'),
	(330,0,'fr','_json','Youtube, Vimeo video url','Youtube, URL vidéo Vimeo','2020-04-02 00:08:26','2020-04-02 00:25:22'),
	(331,0,'en','Loading','..',NULL,'2020-06-22 15:09:16','2020-06-22 15:09:16'),
	(332,0,'en','_json','Business Listing',NULL,'2020-06-22 15:09:16','2020-06-22 15:09:16'),
	(333,0,'en','_json','cities',NULL,'2020-06-22 15:09:16','2020-06-22 15:09:16'),
	(334,0,'en','_json','categories',NULL,'2020-06-22 15:09:16','2020-06-22 15:09:16'),
	(335,0,'en','_json','Where',NULL,'2020-06-22 15:09:16','2020-06-22 15:09:16'),
	(336,0,'en','_json','Browse Businesses by Category',NULL,'2020-06-22 15:09:16','2020-06-22 15:09:16'),
	(337,0,'en','_json','Trending Business Places',NULL,'2020-06-22 15:09:16','2020-06-22 15:09:16'),
	(338,0,'en','_json','Featured Cities',NULL,'2020-06-22 15:09:16','2020-06-22 15:09:16'),
	(339,0,'en','_json','Choose the city you\'ll be living in next',NULL,'2020-06-22 15:09:16','2020-06-22 15:09:16'),
	(340,0,'en','_json','Who we are',NULL,'2020-06-22 15:09:16','2020-06-22 15:09:16'),
	(341,0,'en','_json','Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident.',NULL,'2020-06-22 15:09:16','2020-06-22 15:09:16'),
	(342,0,'en','_json','Read more',NULL,'2020-06-22 15:09:16','2020-06-22 15:09:16'),
	(343,0,'en','_json','People Talking About Us',NULL,'2020-06-22 15:09:16','2020-06-22 15:09:16'),
	(344,0,'en','_json','From Our Blog',NULL,'2020-06-22 15:09:16','2020-06-22 15:09:16'),
	(345,0,'en','_json','Filter',NULL,'2020-06-22 15:09:16','2020-06-22 15:09:16'),
	(346,0,'en','_json','Price Filter',NULL,'2020-06-22 15:09:16','2020-06-22 15:09:16'),
	(347,0,'en','_json','More',NULL,'2020-06-22 15:09:17','2020-06-22 15:09:17'),
	(348,0,'en','_json','Apply',NULL,'2020-06-22 15:09:17','2020-06-22 15:09:17'),
	(349,0,'en','_json','Maps',NULL,'2020-06-22 15:09:17','2020-06-22 15:09:17'),
	(350,0,'en','_json','Nothing found!',NULL,'2020-06-22 15:09:17','2020-06-22 15:09:17'),
	(351,0,'en','_json','We\'re sorry but we do not have any listings matching your search, try to change you search settings',NULL,'2020-06-22 15:09:17','2020-06-22 15:09:17'),
	(352,0,'en','_json','Close',NULL,'2020-06-22 15:09:17','2020-06-22 15:09:17'),
	(353,0,'en','_json','Search places ...',NULL,'2020-06-22 15:09:17','2020-06-22 15:09:17'),
	(354,0,'en','_json','Find',NULL,'2020-06-22 15:09:17','2020-06-22 15:09:17'),
	(355,0,'en','_json','Or',NULL,'2020-06-22 15:09:17','2020-06-22 15:09:17'),
	(356,0,'en','_json','Lost your password? Please enter your email address. You will receive a link to create a new password via email.',NULL,'2020-06-22 15:09:17','2020-06-22 15:09:17'),
	(357,0,'en','_json','Dashboard',NULL,'2020-06-22 15:09:17','2020-06-22 15:09:17'),
	(358,0,'en','_json','Company',NULL,'2020-06-22 15:09:17','2020-06-22 15:09:17'),
	(359,0,'en','_json','Support',NULL,'2020-06-22 15:09:17','2020-06-22 15:09:17'),
	(360,0,'en','_json','Email: support@domain.com',NULL,'2020-06-22 15:09:17','2020-06-22 15:09:17'),
	(361,0,'en','_json','Phone: 1 (00) 832 2342',NULL,'2020-06-22 15:09:17','2020-06-22 15:09:17'),
	(362,0,'en','_json','https://uxper.co',NULL,'2020-06-22 15:09:17','2020-06-22 15:09:17'),
	(363,0,'en','_json','UxPer',NULL,'2020-06-22 15:09:17','2020-06-22 15:09:17'),
	(364,0,'en','_json','All rights reserved.',NULL,'2020-06-22 15:09:17','2020-06-22 15:09:17'),
	(365,0,'en','_json','Log In',NULL,'2020-06-22 15:09:17','2020-06-22 15:09:17'),
	(366,0,'en','_json','Sign-up to receive regular updates from us.',NULL,'2020-06-22 15:09:17','2020-06-22 15:09:17'),
	(367,0,'en','_json','The Golo App',NULL,'2020-06-22 15:09:17','2020-06-22 15:09:17');

/*!40000 ALTER TABLE `ltm_translations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table place_translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `place_translations`;

CREATE TABLE `place_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `place_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `place_translations_place_id_locale_unique` (`place_id`,`locale`),
  KEY `place_translations_locale_index` (`locale`),
  CONSTRAINT `place_translations_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `place_translations` WRITE;
/*!40000 ALTER TABLE `place_translations` DISABLE KEYS */;

INSERT INTO `place_translations` (`id`, `place_id`, `locale`, `name`, `description`)
VALUES
	(1,17,'en','Septime','A Parisian restaurant serving up haute-cuisine without the pretention.\r\n\r\nSeptime may regularly rank as one of the world’s best restaurants, but it carries with it none of the stuffiness of its counterparts. Housed in an unmarked street-level building in the 11th Arrondissement, and furnished with wooden chairs and tables, the restaurant has made a name for itself on the back of an unpretentious menu featuring sustainably-sourced ingredients in unusual combinations.\r\n\r\nGraphic designer-turned-chef Bertrand Grébaut is part of a younger cohort of cooks keen to throw off the shackles that sometimes constrain traditional French cuisine: Lobster with wild strawberries and poached egg in hay broth have both featured on the (frequently changing) menu.'),
	(2,19,'en','Boot Café','Boot Café is an understated coffee shop on a quiet street between the busier Rue de Turenne and Boulevard Beaumarchais in Le Marais. Only postcards and photos are tacked to the walls, and the menu is limited to coffee, tea and the selection of cakes that sit under glass domes on the counter.\r\n\r\nThe name choice is as simple as its interiors: Boot Café is so-called because the space was once a shoe shop. The café retains some trappings of its former life thanks to a Cordonnerie sign painted on its fading blue façade and a large red boot trade sign hanging adjacent.'),
	(3,20,'en','Le Babalou','With its purple facade and small pavement terrace, it is hard to miss Le Babalou on the rue Lamarck, one of the main streets winding down from Sacre-Coeur. Le Babalou specialises in fine Italian cuisine, offering a great choice of authentic pizzas and fresh pasta dishes, all prepared with fresh, seasonal ingredients. Desserts are no less authentic, featuring some delicious favourite Italian sweet treats such as homemade tiramisu and panna cotta. Le Babalou’s interesting interior is reminiscent of a living room complete with patterned wallpaper, well-stocked bookshelves and a fine collection of lampshades, making this a great spot to feel immersed in the area.'),
	(4,21,'en','Musée Guimet','The outstanding Musée Guimet boasts the western world’s biggest collection of Asian art, thanks to the 19th-century wanderings of Lyonnaise industrialist Émile Guimet. Exhibits, enriched by the state’s vast holdings, are laid out geographically in airy, light-filled rooms. Just past the entry, you can find the largest assemblage of Khmer sculpture outside Cambodia. The second floor has statuary and masks from Nepal, ritual funerary art from Tibet, and jewelry and fabrics from India. Peek into the library rotunda, where Monsieur Guimet once entertained the city’s notables under the gaze of eight caryatids atop Ionic columns; Mata Hari danced here in 1905. The much-heralded Chinese collection, made up of 20,000-odd objects, covers seven millennia, while the impressive Buddhist Pantheon features scores of Budhhas from China and Japan. Grab a free English-language audioguide and brochure at the entrance. If you need a pick-me-up, stop at the Salon des Porcelaines café on the lower level for a ginger milk shake. And don’t miss the Guimet’s adjunct space just up the street at 19 avenue d’Iéna. The Hôtel d’Heidelbach contains a Japanese garden and the museum’s collection of Asian furniture; admission is free with a Musée Guimet ticket.'),
	(5,22,'en','Palais Royal','The quietest, most romantic Parisian garden is enclosed within the former home of Cardinal Richelieu (1585–1642). It’s the perfect place to while away an afternoon, cuddling with your sweetheart on a bench under the trees, soaking up the sunshine beside the fountain, or browsing the 400-year-old arcades that are now home to boutiques ranging from quirky (picture Anna Joliet’s music boxes) to chic (think designs by Stella McCartney). One of the city’s oldest restaurants is here, the haute-cuisine Le Grand Véfour, where brass plaques recall regulars like Napoléon and Victor Hugo. Built in 1629, the palais became royal when Richelieu bequeathed it to Louis XIII. Other famous residents include Jean Cocteau and Colette, who wrote of her pleasurable “country” view of the province à Paris. Today, the garden often plays host to giant-size temporary art installations sponsored by another tenant, the Ministry of Culture. The courtyard off Place Colette is outfitted with an eye-catching collection of squat black-and-white columns created in 1986 by artist Daniel Buren.'),
	(6,23,'en','The Louvre','Simply put, the Louvre is the world’s greatest art museum—and the largest, with 675,000 square feet of works from almost every civilization on earth. The Mona Lisa is, of course, a top draw, along with the Venus de Milo and Winged Victory. These and many more of the globe’s most coveted treasures are displayed in three wings—the Richelieu, the Sully, and the Denon—which are arranged like a horseshoe. Nestled in the middle is I.M. Pei’s Pyramide, the giant glass pyramid surrounded by a trio of smaller ones that opened in 1989 over the new entrance in the Cour Napoléon. To plot your course through the complex, grab a color-coded map at the information desk. For an excellent overview, book a 90-minute English-language tour (€12, daily at 11 and 2); slick Nintendo 3DS multimedia guides (€5; pay for it when you buy your ticket), available at the entrance to each wing, offer a self-guided alternative.'),
	(7,24,'en','Notre Dame','Looming above Place du Parvis, this Gothic sanctuary is the symbolic heart of Paris and, for many, of France itself. Napoléon was crowned here, and kings and queens exchanged marriage vows before its altar. Begun in 1163, completed in 1345, badly damaged during the Revolution, and restored in the 19th century by Eugène Viollet-le-Duc, Notre-Dame may not be the country’s oldest or largest cathedral, but in beauty and architectural harmony it has few peers—as you can see by studying the front facade. Its ornate doors seem like hands joined in prayer, the sculpted kings above them form a noble procession, and the west rose window gleams with what seems like divine light.'),
	(8,27,'en','Generator Paris','Generator Paris is a spacious and modern hostel in the centre of Paris – it’s also one of the biggest. With nearly 200 guest rooms on offer, this immense hostel is never a lonely place to stay. You’ll be welcomed by cheap prices and a friendly space to chill and mingle with like-minded travelers up on the hidden rooftop terrace, where you can enjoy breathtaking panoramic views over Parisian rooftops. Whilst it’s centrally located in the 10th arrondissement of Paris, you’re never too far away from nature, which is great if you’re staying during the summer. The relaxing green expanse of Parc des Buttes Chaumont is a quiet haven of calm; it’s especially popular with picnickers and is less than a 15-minute walk away. There’s lots of lockable storage space, a laundry service, and fun events program too.'),
	(9,28,'en','The Loft Boutique','The Loft Boutique Hostel & Hotel is located in the 20th arrondissement of Paris, just a 10-minute walk away from the famous Grands Boulevards. There’s an outside terrace tucked away in a quiet, cute courtyard where you can tuck into a croissant and coffee every morning like a true Parisian. It’s a great place to mingle and meet with other travelers in a calmer setting compared to some of the other more party-loving hostels on this list. There might not be many parties here, as it doubles up as a hotel too, but the nearby Grands Boulevards offers a lively stretch of bars and nightlife in case you find yourself wanting a wilder evening of fun.');

/*!40000 ALTER TABLE `place_translations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table place_type_translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `place_type_translations`;

CREATE TABLE `place_type_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `place_type_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `place_type_translations_place_type_id_locale_unique` (`place_type_id`,`locale`),
  KEY `place_type_translations_locale_index` (`locale`),
  CONSTRAINT `place_type_translations_place_type_id_foreign` FOREIGN KEY (`place_type_id`) REFERENCES `place_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `place_type_translations` WRITE;
/*!40000 ALTER TABLE `place_type_translations` DISABLE KEYS */;

INSERT INTO `place_type_translations` (`id`, `place_type_id`, `locale`, `name`)
VALUES
	(1,25,'en','Restaurant'),
	(2,26,'en','Coffee Shop'),
	(3,27,'en','Activity'),
	(4,28,'en','Museum'),
	(5,29,'en','Temple'),
	(6,30,'en','Culture'),
	(7,31,'en','Park'),
	(8,32,'en','Market'),
	(9,33,'en','Hostel'),
	(10,34,'en','Hotel'),
	(11,35,'en','Luxury'),
	(12,36,'en','Apartment'),
	(13,37,'en','Bars'),
	(14,38,'en','Bakeries'),
	(15,39,'en','Sight');

/*!40000 ALTER TABLE `place_type_translations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table place_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `place_types`;

CREATE TABLE `place_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `place_types` WRITE;
/*!40000 ALTER TABLE `place_types` DISABLE KEYS */;

INSERT INTO `place_types` (`id`, `category_id`, `name`, `created_at`, `updated_at`)
VALUES
	(25,12,'Restaurant','2019-10-25 11:17:39','2019-10-25 11:17:39'),
	(26,12,'Coffee Shop','2019-10-25 11:17:50','2019-10-25 11:17:50'),
	(27,11,'Activity','2019-11-04 16:39:38','2019-11-04 16:39:38'),
	(28,11,'Museum','2019-11-04 16:39:53','2019-11-04 16:39:53'),
	(29,11,'Temple','2019-11-04 16:40:09','2019-11-04 16:40:09'),
	(30,11,'Culture','2019-11-04 16:40:25','2019-11-04 16:40:25'),
	(31,11,'Park','2019-11-04 16:40:39','2019-11-04 16:40:39'),
	(32,11,'Market','2019-11-04 16:40:54','2019-11-04 16:40:54'),
	(33,13,'Hostel','2019-11-04 16:41:13','2019-11-04 16:41:13'),
	(34,13,'Hotel','2019-11-04 16:41:22','2019-11-04 16:41:22'),
	(35,13,'Luxury','2019-11-04 16:41:33','2019-11-04 16:41:33'),
	(36,13,'Apartment','2019-11-04 16:42:03','2019-11-04 16:42:03'),
	(37,12,'Bars','2019-11-04 16:42:21','2019-11-04 16:42:21'),
	(38,12,'Bakeries','2019-11-04 16:42:39','2019-11-04 16:42:39'),
	(39,11,'Sight','2019-12-01 03:38:03','2019-12-01 03:38:03');

/*!40000 ALTER TABLE `place_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table places
# ------------------------------------------------------------

DROP TABLE IF EXISTS `places`;

CREATE TABLE `places` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `place_type` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` longtext,
  `price_range` int(11) DEFAULT NULL,
  `amenities` varchar(255) DEFAULT '',
  `address` varchar(255) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `social` varchar(500) DEFAULT '' COMMENT 'array',
  `opening_hour` varchar(500) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `gallery` longtext,
  `video` varchar(255) DEFAULT NULL,
  `booking_type` int(2) DEFAULT NULL,
  `link_bookingcom` varchar(255) DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `places` WRITE;
/*!40000 ALTER TABLE `places` DISABLE KEYS */;

INSERT INTO `places` (`id`, `user_id`, `country_id`, `city_id`, `category`, `place_type`, `name`, `slug`, `description`, `price_range`, `amenities`, `address`, `lat`, `lng`, `email`, `phone_number`, `website`, `social`, `opening_hour`, `thumb`, `gallery`, `video`, `booking_type`, `link_bookingcom`, `status`, `seo_title`, `seo_description`, `updated_at`, `created_at`)
VALUES
	(17,8,6,23,'[\"12\"]','[\"25\"]','Septime','septime','A Parisian restaurant serving up haute-cuisine without the pretention.\r\n\r\nSeptime may regularly rank as one of the world’s best restaurants, but it carries with it none of the stuffiness of its counterparts. Housed in an unmarked street-level building in the 11th Arrondissement, and furnished with wooden chairs and tables, the restaurant has made a name for itself on the back of an unpretentious menu featuring sustainably-sourced ingredients in unusual combinations.\r\n\r\nGraphic designer-turned-chef Bertrand Grébaut is part of a younger cohort of cooks keen to throw off the shackles that sometimes constrain traditional French cuisine: Lobster with wild strawberries and poached egg in hay broth have both featured on the (frequently changing) menu.',2,'[\"11\",\"10\",\"9\",\"8\",\"7\",\"6\"]','80 Rue de Charonne, 75011 Paris, France',48.85363479999999,2.3809006999999838,NULL,'03 73673 34',NULL,'[{\"name\":\"Facebook\",\"url\":\"Septime\"},{\"name\":\"Instagram\",\"url\":\"Septime\"}]','[{\"title\":\"Monday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Tuesday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Wednesday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Thursday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Friday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Saturday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Sunday\",\"value\":\"10:00 AM - 11:00 PM\"}]','5dc437bd604d3_1573140413.jpg','[\"5dc437b219656_1573140402.jpg\"]',NULL,1,NULL,1,NULL,NULL,'2020-01-13 02:38:49','2019-11-07 15:26:53'),
	(19,8,6,23,'[\"12\"]','[\"26\"]','Boot Café','boot-cafe','Boot Café is an understated coffee shop on a quiet street between the busier Rue de Turenne and Boulevard Beaumarchais in Le Marais. Only postcards and photos are tacked to the walls, and the menu is limited to coffee, tea and the selection of cakes that sit under glass domes on the counter.\r\n\r\nThe name choice is as simple as its interiors: Boot Café is so-called because the space was once a shoe shop. The café retains some trappings of its former life thanks to a Cordonnerie sign painted on its fading blue façade and a large red boot trade sign hanging adjacent.',1,'[\"13\",\"11\",\"10\",\"9\",\"8\",\"7\",\"6\"]','19 Rue du Pont aux Choux, 75003 Paris, France',48.861154,2.36530879999998,NULL,NULL,NULL,'[{\"name\":\"Facebook\",\"url\":\"BootCaf\\u00e9\"},{\"name\":\"Instagram\",\"url\":\"BootCaf\\u00e9\"}]','[{\"title\":\"Monday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Tuesday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Wednesday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Thursday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Friday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Saturday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Sunday\",\"value\":\"10:00 AM - 11:00 PM\"}]','5dc4395a1c54b_1573140826.jpeg','[\"5dc4394865842_1573140808.jpeg\"]',NULL,1,NULL,1,NULL,NULL,'2020-01-16 01:46:15','2019-11-07 15:33:46'),
	(20,8,6,23,'[\"12\"]','[\"25\"]','Le Babalou','le-babalou','With its purple facade and small pavement terrace, it is hard to miss Le Babalou on the rue Lamarck, one of the main streets winding down from Sacre-Coeur. Le Babalou specialises in fine Italian cuisine, offering a great choice of authentic pizzas and fresh pasta dishes, all prepared with fresh, seasonal ingredients. Desserts are no less authentic, featuring some delicious favourite Italian sweet treats such as homemade tiramisu and panna cotta. Le Babalou’s interesting interior is reminiscent of a living room complete with patterned wallpaper, well-stocked bookshelves and a fine collection of lampshades, making this a great spot to feel immersed in the area.',2,'[\"13\",\"11\",\"9\",\"8\",\"7\",\"6\"]','4 Rue Lamarck, 75018 Paris, France',48.88652829999999,2.3442967999999382,NULL,'+33142513732',NULL,'[{\"name\":\"Facebook\",\"url\":\"babalou\"},{\"name\":\"Instagram\",\"url\":\"babalou\"}]','[{\"title\":\"Monday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Tuesday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Wednesday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Thursday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Friday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Saturday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Sunday\",\"value\":\"Closed\"}]','5dc43ab7b6572_1573141175.jpeg','[\"5dc43ab04ce69_1573141168.jpeg\"]',NULL,1,NULL,1,NULL,NULL,'2020-01-16 01:45:59','2019-11-07 15:39:35'),
	(21,8,6,23,'[\"11\"]','[\"28\"]','Musée Guimet','musee-guimet','The outstanding Musée Guimet boasts the western world’s biggest collection of Asian art, thanks to the 19th-century wanderings of Lyonnaise industrialist Émile Guimet. Exhibits, enriched by the state’s vast holdings, are laid out geographically in airy, light-filled rooms. Just past the entry, you can find the largest assemblage of Khmer sculpture outside Cambodia. The second floor has statuary and masks from Nepal, ritual funerary art from Tibet, and jewelry and fabrics from India. Peek into the library rotunda, where Monsieur Guimet once entertained the city’s notables under the gaze of eight caryatids atop Ionic columns; Mata Hari danced here in 1905. The much-heralded Chinese collection, made up of 20,000-odd objects, covers seven millennia, while the impressive Buddhist Pantheon features scores of Budhhas from China and Japan. Grab a free English-language audioguide and brochure at the entrance. If you need a pick-me-up, stop at the Salon des Porcelaines café on the lower level for a ginger milk shake. And don’t miss the Guimet’s adjunct space just up the street at 19 avenue d’Iéna. The Hôtel d’Heidelbach contains a Japanese garden and the museum’s collection of Asian furniture; admission is free with a Musée Guimet ticket.',1,'','6 Place d\'Iéna, 75116 Paris, France',48.8651488,2.293550900000014,NULL,'015625433',NULL,'[{\"name\":\"Facebook\",\"url\":\"getgolo\"},{\"name\":\"Instagram\",\"url\":\"getgolo\"}]','[{\"title\":\"Monday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Tuesday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Wednesday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Thursday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Friday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Saturday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Sunday\",\"value\":\"Closed\"}]','5dc4402dba8a4_1573142573.jpeg','[\"5dc4401792bce_1573142551.jpeg\"]',NULL,4,NULL,1,NULL,NULL,'2019-12-25 02:02:23','2019-11-07 16:02:53'),
	(22,8,6,23,'[\"11\"]','[\"28\"]','Palais Royal','palais-royal','The quietest, most romantic Parisian garden is enclosed within the former home of Cardinal Richelieu (1585–1642). It’s the perfect place to while away an afternoon, cuddling with your sweetheart on a bench under the trees, soaking up the sunshine beside the fountain, or browsing the 400-year-old arcades that are now home to boutiques ranging from quirky (picture Anna Joliet’s music boxes) to chic (think designs by Stella McCartney). One of the city’s oldest restaurants is here, the haute-cuisine Le Grand Véfour, where brass plaques recall regulars like Napoléon and Victor Hugo. Built in 1629, the palais became royal when Richelieu bequeathed it to Louis XIII. Other famous residents include Jean Cocteau and Colette, who wrote of her pleasurable “country” view of the province à Paris. Today, the garden often plays host to giant-size temporary art installations sponsored by another tenant, the Ministry of Culture. The courtyard off Place Colette is outfitted with an eye-catching collection of squat black-and-white columns created in 1986 by artist Daniel Buren.',1,'','Place du Palais Royal, 75001 Paris, France',48.8623531,2.3371230999999852,NULL,'01 944 8453',NULL,'[{\"name\":\"Facebook\",\"url\":null}]','[{\"title\":\"Monday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Tuesday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Wednesday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Thursday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Friday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Saturday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Sunday\",\"value\":\"10:00 AM - 11:00 PM\"}]','5e5b6535f3761_1583047989.jpg','[\"5dc440f4484f5_1573142772.jpeg\"]',NULL,4,NULL,1,NULL,NULL,'2020-03-01 07:33:09','2019-11-07 16:06:22'),
	(23,8,6,23,'[\"11\"]','[\"29\",\"30\"]','The Louvre','the-louvre','Simply put, the Louvre is the world’s greatest art museum—and the largest, with 675,000 square feet of works from almost every civilization on earth. The Mona Lisa is, of course, a top draw, along with the Venus de Milo and Winged Victory. These and many more of the globe’s most coveted treasures are displayed in three wings—the Richelieu, the Sully, and the Denon—which are arranged like a horseshoe. Nestled in the middle is I.M. Pei’s Pyramide, the giant glass pyramid surrounded by a trio of smaller ones that opened in 1989 over the new entrance in the Cour Napoléon. To plot your course through the complex, grab a color-coded map at the information desk. For an excellent overview, book a 90-minute English-language tour (€12, daily at 11 and 2); slick Nintendo 3DS multimedia guides (€5; pay for it when you buy your ticket), available at the entrance to each wing, offer a self-guided alternative.',0,'','Rue de Rivoli, Paris, France',48.8604501,2.342244800000003,NULL,'0140205317',NULL,'[{\"name\":\"Facebook\",\"url\":null}]','[{\"title\":\"Monday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Tuesday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Wednesday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Thursday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Friday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Saturday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Sunday\",\"value\":\"10:00 AM - 11:00 PM\"}]','5dc442bd5d76c_1573143229.jpg','[\"5dc442a37da0e_1573143203.jpg\"]',NULL,4,NULL,1,NULL,NULL,'2019-12-25 02:05:05','2019-11-07 16:13:25'),
	(24,8,6,23,'[\"11\"]','[\"28\",\"30\"]','Notre Dame','notre-dame','Looming above Place du Parvis, this Gothic sanctuary is the symbolic heart of Paris and, for many, of France itself. Napoléon was crowned here, and kings and queens exchanged marriage vows before its altar. Begun in 1163, completed in 1345, badly damaged during the Revolution, and restored in the 19th century by Eugène Viollet-le-Duc, Notre-Dame may not be the country’s oldest or largest cathedral, but in beauty and architectural harmony it has few peers—as you can see by studying the front facade. Its ornate doors seem like hands joined in prayer, the sculpted kings above them form a noble procession, and the west rose window gleams with what seems like divine light.',0,'','6 Parvis Notre-Dame - Pl. Jean-Paul II, 75004 Paris, France',48.85296820000001,2.3499021000000084,NULL,'0142345610',NULL,'[{\"name\":\"Facebook\",\"url\":null}]','[{\"title\":\"Monday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Tuesday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Wednesday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Thursday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Friday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Saturday\",\"value\":\"10:00 AM - 11:00 PM\"},{\"title\":\"Sunday\",\"value\":\"10:00 AM - 11:00 PM\"}]','5dc443292cef6_1573143337.jpeg','[\"5dfde775d238a_1576920949.jpg\"]',NULL,4,NULL,1,NULL,NULL,'2019-12-23 14:38:24','2019-11-07 16:15:37'),
	(27,8,6,23,'[\"13\"]','[\"33\"]','Generator Paris','generator-paris','Generator Paris is a spacious and modern hostel in the centre of Paris – it’s also one of the biggest. With nearly 200 guest rooms on offer, this immense hostel is never a lonely place to stay. You’ll be welcomed by cheap prices and a friendly space to chill and mingle with like-minded travelers up on the hidden rooftop terrace, where you can enjoy breathtaking panoramic views over Parisian rooftops. Whilst it’s centrally located in the 10th arrondissement of Paris, you’re never too far away from nature, which is great if you’re staying during the summer. The relaxing green expanse of Parc des Buttes Chaumont is a quiet haven of calm; it’s especially popular with picnickers and is less than a 15-minute walk away. There’s lots of lockable storage space, a laundry service, and fun events program too.',1,'[\"12\",\"11\",\"10\",\"8\",\"7\",\"6\"]','Place du Colonel Fabien, Paris, France',48.8780382,2.36985930000003,NULL,'+33157327263',NULL,'[{\"name\":\"Facebook\",\"url\":\"generator\"},{\"name\":\"Instagram\",\"url\":\"generator\"}]','[{\"title\":\"Monday\",\"value\":null},{\"title\":\"Tuesday\",\"value\":null},{\"title\":\"Wednesday\",\"value\":null},{\"title\":\"Thursday\",\"value\":null},{\"title\":\"Friday\",\"value\":null},{\"title\":\"Saturday\",\"value\":null},{\"title\":\"Sunday\",\"value\":null}]','5dc445a1b93bf_1573143969.jpeg','[\"5dc4459ae3af3_1573143962.jpeg\"]',NULL,3,'https://www.booking.com/?aid=1266181',1,NULL,NULL,'2019-12-20 06:18:38','2019-11-07 16:26:09'),
	(28,8,6,23,'[\"13\"]','[\"34\"]','The Loft Boutique','the-loft-boutique','The Loft Boutique Hostel & Hotel is located in the 20th arrondissement of Paris, just a 10-minute walk away from the famous Grands Boulevards. There’s an outside terrace tucked away in a quiet, cute courtyard where you can tuck into a croissant and coffee every morning like a true Parisian. It’s a great place to mingle and meet with other travelers in a calmer setting compared to some of the other more party-loving hostels on this list. There might not be many parties here, as it doubles up as a hotel too, but the nearby Grands Boulevards offers a lively stretch of bars and nightlife in case you find yourself wanting a wilder evening of fun.',1,'[\"12\",\"11\",\"10\",\"8\",\"7\",\"6\"]','Rue Julien Lacroix, 75020 Paris, France',48.87060030000001,2.3840256999999383,NULL,'01 2343343',NULL,'[{\"name\":\"Facebook\",\"url\":null}]','[{\"title\":\"Monday\",\"value\":null},{\"title\":\"Tuesday\",\"value\":null},{\"title\":\"Wednesday\",\"value\":null},{\"title\":\"Thursday\",\"value\":null},{\"title\":\"Friday\",\"value\":null},{\"title\":\"Saturday\",\"value\":null},{\"title\":\"Sunday\",\"value\":null}]','5dc44a5e563b8_1573145182.jpeg','[\"5dc44a54b0535_1573145172.jpeg\"]',NULL,3,'https://www.booking.com/?aid=1266181',1,NULL,NULL,'2019-12-20 06:18:17','2019-11-07 16:46:22');

/*!40000 ALTER TABLE `places` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table post_translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `post_translations`;

CREATE TABLE `post_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_translations_post_id_locale_unique` (`post_id`,`locale`),
  KEY `post_translations_locale_index` (`locale`),
  CONSTRAINT `post_translations_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `post_translations` WRITE;
/*!40000 ALTER TABLE `post_translations` DISABLE KEYS */;

INSERT INTO `post_translations` (`id`, `post_id`, `locale`, `title`, `content`)
VALUES
	(1,10,'en','About Us','<div class=\"company-info flex-inline\"><img src=\"https://lara.getgolo.com/assets/images/about-02.jpg\" alt=\"Our Company\" />\r\n<div class=\"ci-content\">Our Company\r\n<h2>Mission statement</h2>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n</div>\r\n</div>\r\n<!-- .company-info -->\r\n<div class=\"our-team\">\r\n<div class=\"container\">\r\n<h2 class=\"title align-center\">Meet Our Team</h2>\r\n</div>\r\n<div class=\"ot-content grid grid-4\">\r\n<div class=\"grid-item ot-item hover__box\">\r\n<div class=\"hover__box__thumb\"><img src=\"https://lara.getgolo.com/assets/images/people-1.jpg\" alt=\"\" /></div>\r\n<div class=\"ot-info\">\r\n<h3>Jaspreet Bhamrai</h3>\r\n<span class=\"job\">Co - founder</span></div>\r\n</div>\r\n<div class=\"grid-item ot-item hover__box\">\r\n<div class=\"hover__box__thumb\"><img src=\"https://lara.getgolo.com/assets/images/people-2.jpg\" alt=\"\" /></div>\r\n<div class=\"ot-info\">\r\n<h3>Justine Robinson</h3>\r\n<span class=\"job\">Marketing Guru</span></div>\r\n</div>\r\n<div class=\"grid-item ot-item hover__box\">\r\n<div class=\"hover__box__thumb\"><img src=\"https://lara.getgolo.com/assets/images/people-3.jpg\" alt=\"\" /></div>\r\n<div class=\"ot-info\">\r\n<h3>Jeremías Romero</h3>\r\n<span class=\"job\">Designer</span></div>\r\n</div>\r\n<div class=\"grid-item ot-item hover__box\">\r\n<div class=\"hover__box__thumb\"><img src=\"https://lara.getgolo.com/assets/images/people-4.jpg\" alt=\"\" /></div>\r\n<div class=\"ot-info\">\r\n<h3>Rutherford Brannan</h3>\r\n<span class=\"job\">Mobile developer</span></div>\r\n</div>\r\n</div>\r\n<!-- .ot-content --></div>\r\n<!-- .our-team -->\r\n<div class=\"join-team align-center\">\r\n<div class=\"container\">\r\n<h2 class=\"title\">Join our team</h2>\r\n<div class=\"jt-content\">\r\n<p>We’re always looking for talented individuals and <br />people who are hungry to do great work.</p>\r\n<a class=\"btn\" title=\"View openings\" href=\"#\">View openings</a></div>\r\n</div>\r\n</div>\r\n<!-- .join-team -->'),
	(2,11,'en','Faqs','<h2 class=\"title align-center\">How may we be of help?</h2>\r\n<ul class=\"accordion first-open\">\r\n<li>\r\n<h3 class=\"accordion-title\"><a href=\"#\">What is Golo Theme?</a></h3>\r\n<div class=\"accordion-content\">\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>\r\n</div>\r\n</li>\r\n<li>\r\n<h3 class=\"accordion-title\"><a href=\"#\">Why should I save on Schoolable?</a></h3>\r\n<div class=\"accordion-content\">\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>\r\n</div>\r\n</li>\r\n<li>\r\n<h3 class=\"accordion-title\"><a href=\"#\">How secure is my money?</a></h3>\r\n<div class=\"accordion-content\">\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>\r\n</div>\r\n</li>\r\n<li>\r\n<h3 class=\"accordion-title\"><a href=\"#\">How much can I save on Golo?</a></h3>\r\n<div class=\"accordion-content\">\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>\r\n</div>\r\n</li>\r\n<li>\r\n<h3 class=\"accordion-title\"><a href=\"#\">How many saving plans can I create?</a></h3>\r\n<div class=\"accordion-content\">\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>\r\n</div>\r\n</li>\r\n</ul>'),
	(3,13,'en','My Story When I Backpacked Around The World','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec odio nulla. Donec sed eros ut erat finibus pharetra. Vivamus quis rhoncus felis, ut euismod dolor. Aliquam in ante eget leo cursus mattis vel non est. Vestibulum non purus elementum, placerat quam at, interdum lectus. In erat mi, tincidunt a congue at, pulvinar eu sapien. Etiam placerat efficitur arcu nec tincidunt.</p>\r\n<p>Nullam egestas risus risus. In ac maximus metus. Morbi fermentum justo quis varius dictum. Cras laoreet dolor sit amet arcu auctor, in consectetur lectus luctus. Pellentesque luctus est eget sapien luctus, at convallis diam hendrerit.</p>\r\n<h2>Cras laoreet dolor sit amet</h2>\r\n<p>In magna tortor, facilisis vel finibus quis, placerat eget lacus. Mauris iaculis diam augue, non fringilla libero tincidunt a. In quis felis finibus, ultricies eros ut, tincidunt tortor. Etiam non semper dolor, eget iaculis mauris. Nulla quis purus gravida urna maximus tincidunt vulputate interdum massa. Quisque tellus est, ultricies nec lorem eget, sagittis tincidunt ipsum. Cras laoreet a ligula non laoreet. Vestibulum elementum quam lacinia sapien semper interdum.</p>\r\n<blockquote class=\"wp-block-quote\">\r\n<p><em>Nullam facilisis ipsum nec eros vestibulum sollicitudin. Maecenas sed odio a lorem scelerisque consectetur. Aliquam accumsan dui elit, in vulputate nisl aliquam non. Donec iaculis mauris nulla, eleifend auctor nisi commodo eget.</em></p>\r\n<cite> Famous Thinker</cite></blockquote>\r\n<blockquote class=\"wp-block-quote\"><cite>Donec nec convallis ligula, eu bibendum lorem. Etiam et molestie ex. Mauris placerat libero sed ipsum efficitur elementum. Vivamus sapien sem, lacinia vitae tortor quis, egestas cursus magna. Phasellus consequat nibh lorem, ac egestas justo commodo et. Quisque ac ligula semper, maximus sem rutrum, placerat velit. Aenean dignissim suscipit enim, quis posuere nulla sodales nec. Sed vitae felis a leo faucibus congue in vel ex.</cite></blockquote>'),
	(4,14,'en','Where to Eat in Paris: A Complete Guide','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec odio nulla. Donec sed eros ut erat finibus pharetra. Vivamus quis rhoncus felis, ut euismod dolor. Aliquam in ante eget leo cursus mattis vel non est. Vestibulum non purus elementum, placerat quam at, interdum lectus. In erat mi, tincidunt a congue at, pulvinar eu sapien. Etiam placerat efficitur arcu nec tincidunt.</p>\r\n<p>Nullam egestas risus risus. In ac maximus metus. Morbi fermentum justo quis varius dictum. Cras laoreet dolor sit amet arcu auctor, in consectetur lectus luctus. Pellentesque luctus est eget sapien luctus, at convallis diam hendrerit.</p>\r\n<figure class=\"wp-block-image\"><img class=\"wp-image-178\" src=\"https://wp.getgolo.com/wp-content/uploads/2019/10/photo-1567529692333-de9fd6772897-1024x683.jpeg\" sizes=\"(max-width: 1024px) 100vw, 1024px\" srcset=\"https://wp.getgolo.com/wp-content/uploads/2019/10/photo-1567529692333-de9fd6772897-1024x683.jpeg 1024w, https://wp.getgolo.com/wp-content/uploads/2019/10/photo-1567529692333-de9fd6772897-600x400.jpeg 600w, https://wp.getgolo.com/wp-content/uploads/2019/10/photo-1567529692333-de9fd6772897-300x200.jpeg 300w, https://wp.getgolo.com/wp-content/uploads/2019/10/photo-1567529692333-de9fd6772897-768x512.jpeg 768w, https://wp.getgolo.com/wp-content/uploads/2019/10/photo-1567529692333-de9fd6772897.jpeg 1650w\" alt=\"\" /></figure>\r\n<h2>Cras laoreet dolor sit amet</h2>\r\n<p>In magna tortor, facilisis vel finibus quis, placerat eget lacus. Mauris iaculis diam augue, non fringilla libero tincidunt a. In quis felis finibus, ultricies eros ut, tincidunt tortor. Etiam non semper dolor, eget iaculis mauris. Nulla quis purus gravida urna maximus tincidunt vulputate interdum massa. Quisque tellus est, ultricies nec lorem eget, sagittis tincidunt ipsum. Cras laoreet a ligula non laoreet. Vestibulum elementum quam lacinia sapien semper interdum.</p>'),
	(5,15,'en','Wonderings: are the stars our destination?','<p>Aside from a few forays to France, the furthest my maternal grandparents travelled was Pembrokeshire, Wales (repeat visits to a wind-buffeted static caravan in Croes-goch, if you must know). Just a generation later, my parents&rsquo; peregrinations had encompassed most of Western Europe.</p>\r\n<p><img src=\"/storage/photos/8/photo-1495562569060-2eec283d3391.jpeg\" alt=\"\" /></p>\r\n<p>As of writing, I&rsquo;ve visited about 50 countries (I counted them up once, but have forgotten the total), most of them during two spells of backpacking &ndash; first across the US, then around the world &ndash; plus others as and when the opportunity arose.</p>\r\n<p>My wife has been to twice that number of destinations, and I&rsquo;d wager that a significant proportion of the people who comprise Lonely Planet&rsquo;s extended community &ndash; staff and contributors, followers and fans &ndash; have led equally footloose lives.</p>\r\n<p>The trend continues, too: my son, four, and daughter, one, have already visited many more places than my grandparents did in their entire lives. In fact, Harvey probably covered more miles&nbsp;<em>in utero</em>&nbsp;than they managed in total.</p>\r\n<figure class=\"wp-block-image\"><img class=\"wp-image-120\" src=\"https://wp.getgolo.com/wp-content/uploads/2019/10/the-16-copper-statues-which-fbfe-diaporama-1024x656.jpg\" sizes=\"(max-width: 1024px) 100vw, 1024px\" srcset=\"https://wp.getgolo.com/wp-content/uploads/2019/10/the-16-copper-statues-which-fbfe-diaporama-1024x656.jpg 1024w, https://wp.getgolo.com/wp-content/uploads/2019/10/the-16-copper-statues-which-fbfe-diaporama-600x384.jpg 600w, https://wp.getgolo.com/wp-content/uploads/2019/10/the-16-copper-statues-which-fbfe-diaporama-300x192.jpg 300w, https://wp.getgolo.com/wp-content/uploads/2019/10/the-16-copper-statues-which-fbfe-diaporama-768x492.jpg 768w, https://wp.getgolo.com/wp-content/uploads/2019/10/the-16-copper-statues-which-fbfe-diaporama.jpg 2048w\" alt=\"\" />\r\n<figcaption>Caption of Image</figcaption>\r\n</figure>\r\n<h4>Our expanding horizons</h4>\r\n<p>You can visualise each generation&rsquo;s expanding horizons as a series of concentric circles, like ripples spreading out from a stone dropped in a pond; assuming that trend doesn&rsquo;t go into reverse (which is possible, of course, given variables like climate change), where will the edge of my children&rsquo;s known universe lie? Just as I have explored the far side of this planet, might they explore the far side of another world?</p>\r\n<p>It&rsquo;s not as far-fetched as it sounds. As it often does, the stuff of science fiction has become the stuff of science fact: the race for space is more competitive now than it has been at any time since Neil Armstrong took that famous first step on the surface of the Moon, an epoch-defining moment that happened 50 years ago this July.</p>');

/*!40000 ALTER TABLE `post_translations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `category` varchar(500) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` longtext,
  `thumb` varchar(255) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `user_id`, `category`, `title`, `slug`, `content`, `thumb`, `type`, `status`, `seo_title`, `seo_description`, `created_at`, `updated_at`)
VALUES
	(10,8,NULL,'About Us','about-us','<div class=\"company-info flex-inline\"><img src=\"https://lara.getgolo.com/assets/images/about-02.jpg\" alt=\"Our Company\" />\r\n<div class=\"ci-content\">Our Company\r\n<h2>Mission statement</h2>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n</div>\r\n</div>\r\n<!-- .company-info -->\r\n<div class=\"our-team\">\r\n<div class=\"container\">\r\n<h2 class=\"title align-center\">Meet Our Team</h2>\r\n</div>\r\n<div class=\"ot-content grid grid-4\">\r\n<div class=\"grid-item ot-item hover__box\">\r\n<div class=\"hover__box__thumb\"><img src=\"https://lara.getgolo.com/assets/images/people-1.jpg\" alt=\"\" /></div>\r\n<div class=\"ot-info\">\r\n<h3>Jaspreet Bhamrai</h3>\r\n<span class=\"job\">Co - founder</span></div>\r\n</div>\r\n<div class=\"grid-item ot-item hover__box\">\r\n<div class=\"hover__box__thumb\"><img src=\"https://lara.getgolo.com/assets/images/people-2.jpg\" alt=\"\" /></div>\r\n<div class=\"ot-info\">\r\n<h3>Justine Robinson</h3>\r\n<span class=\"job\">Marketing Guru</span></div>\r\n</div>\r\n<div class=\"grid-item ot-item hover__box\">\r\n<div class=\"hover__box__thumb\"><img src=\"https://lara.getgolo.com/assets/images/people-3.jpg\" alt=\"\" /></div>\r\n<div class=\"ot-info\">\r\n<h3>Jeremías Romero</h3>\r\n<span class=\"job\">Designer</span></div>\r\n</div>\r\n<div class=\"grid-item ot-item hover__box\">\r\n<div class=\"hover__box__thumb\"><img src=\"https://lara.getgolo.com/assets/images/people-4.jpg\" alt=\"\" /></div>\r\n<div class=\"ot-info\">\r\n<h3>Rutherford Brannan</h3>\r\n<span class=\"job\">Mobile developer</span></div>\r\n</div>\r\n</div>\r\n<!-- .ot-content --></div>\r\n<!-- .our-team -->\r\n<div class=\"join-team align-center\">\r\n<div class=\"container\">\r\n<h2 class=\"title\">Join our team</h2>\r\n<div class=\"jt-content\">\r\n<p>We’re always looking for talented individuals and <br />people who are hungry to do great work.</p>\r\n<a class=\"btn\" title=\"View openings\" href=\"#\">View openings</a></div>\r\n</div>\r\n</div>\r\n<!-- .join-team -->','5df473fb078bd_1576301563.jpg','page',1,NULL,NULL,'2019-11-27 09:04:37','2019-12-14 05:32:43'),
	(11,8,NULL,'Faqs','faqs','<h2 class=\"title align-center\">How may we be of help?</h2>\r\n<ul class=\"accordion first-open\">\r\n<li>\r\n<h3 class=\"accordion-title\"><a href=\"#\">What is Golo Theme?</a></h3>\r\n<div class=\"accordion-content\">\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>\r\n</div>\r\n</li>\r\n<li>\r\n<h3 class=\"accordion-title\"><a href=\"#\">Why should I save on Schoolable?</a></h3>\r\n<div class=\"accordion-content\">\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>\r\n</div>\r\n</li>\r\n<li>\r\n<h3 class=\"accordion-title\"><a href=\"#\">How secure is my money?</a></h3>\r\n<div class=\"accordion-content\">\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>\r\n</div>\r\n</li>\r\n<li>\r\n<h3 class=\"accordion-title\"><a href=\"#\">How much can I save on Golo?</a></h3>\r\n<div class=\"accordion-content\">\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>\r\n</div>\r\n</li>\r\n<li>\r\n<h3 class=\"accordion-title\"><a href=\"#\">How many saving plans can I create?</a></h3>\r\n<div class=\"accordion-content\">\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.</p>\r\n</div>\r\n</li>\r\n</ul>',NULL,'page',1,NULL,NULL,'2019-12-21 07:49:42','2019-12-21 07:49:42'),
	(13,8,'[\"17\"]','My Story When I Backpacked Around The World','my-story-when-i-backpacked-around-the-world','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec odio nulla. Donec sed eros ut erat finibus pharetra. Vivamus quis rhoncus felis, ut euismod dolor. Aliquam in ante eget leo cursus mattis vel non est. Vestibulum non purus elementum, placerat quam at, interdum lectus. In erat mi, tincidunt a congue at, pulvinar eu sapien. Etiam placerat efficitur arcu nec tincidunt.</p>\r\n<p>Nullam egestas risus risus. In ac maximus metus. Morbi fermentum justo quis varius dictum. Cras laoreet dolor sit amet arcu auctor, in consectetur lectus luctus. Pellentesque luctus est eget sapien luctus, at convallis diam hendrerit.</p>\r\n<h2>Cras laoreet dolor sit amet</h2>\r\n<p>In magna tortor, facilisis vel finibus quis, placerat eget lacus. Mauris iaculis diam augue, non fringilla libero tincidunt a. In quis felis finibus, ultricies eros ut, tincidunt tortor. Etiam non semper dolor, eget iaculis mauris. Nulla quis purus gravida urna maximus tincidunt vulputate interdum massa. Quisque tellus est, ultricies nec lorem eget, sagittis tincidunt ipsum. Cras laoreet a ligula non laoreet. Vestibulum elementum quam lacinia sapien semper interdum.</p>\r\n<blockquote class=\"wp-block-quote\">\r\n<p><em>Nullam facilisis ipsum nec eros vestibulum sollicitudin. Maecenas sed odio a lorem scelerisque consectetur. Aliquam accumsan dui elit, in vulputate nisl aliquam non. Donec iaculis mauris nulla, eleifend auctor nisi commodo eget.</em></p>\r\n<cite> Famous Thinker</cite></blockquote>\r\n<blockquote class=\"wp-block-quote\"><cite>Donec nec convallis ligula, eu bibendum lorem. Etiam et molestie ex. Mauris placerat libero sed ipsum efficitur elementum. Vivamus sapien sem, lacinia vitae tortor quis, egestas cursus magna. Phasellus consequat nibh lorem, ac egestas justo commodo et. Quisque ac ligula semper, maximus sem rutrum, placerat velit. Aenean dignissim suscipit enim, quis posuere nulla sodales nec. Sed vitae felis a leo faucibus congue in vel ex.</cite></blockquote>','5e19722ddd48c_1578725933.jpeg','blog',1,NULL,NULL,'2020-01-11 06:58:53','2020-01-11 06:58:53'),
	(14,8,'[\"18\"]','Where to Eat in Paris: A Complete Guide','where-to-eat-in-paris-a-complete-guide','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec odio nulla. Donec sed eros ut erat finibus pharetra. Vivamus quis rhoncus felis, ut euismod dolor. Aliquam in ante eget leo cursus mattis vel non est. Vestibulum non purus elementum, placerat quam at, interdum lectus. In erat mi, tincidunt a congue at, pulvinar eu sapien. Etiam placerat efficitur arcu nec tincidunt.</p>\r\n<p>Nullam egestas risus risus. In ac maximus metus. Morbi fermentum justo quis varius dictum. Cras laoreet dolor sit amet arcu auctor, in consectetur lectus luctus. Pellentesque luctus est eget sapien luctus, at convallis diam hendrerit.</p>\r\n<figure class=\"wp-block-image\"><img class=\"wp-image-178\" src=\"https://wp.getgolo.com/wp-content/uploads/2019/10/photo-1567529692333-de9fd6772897-1024x683.jpeg\" sizes=\"(max-width: 1024px) 100vw, 1024px\" srcset=\"https://wp.getgolo.com/wp-content/uploads/2019/10/photo-1567529692333-de9fd6772897-1024x683.jpeg 1024w, https://wp.getgolo.com/wp-content/uploads/2019/10/photo-1567529692333-de9fd6772897-600x400.jpeg 600w, https://wp.getgolo.com/wp-content/uploads/2019/10/photo-1567529692333-de9fd6772897-300x200.jpeg 300w, https://wp.getgolo.com/wp-content/uploads/2019/10/photo-1567529692333-de9fd6772897-768x512.jpeg 768w, https://wp.getgolo.com/wp-content/uploads/2019/10/photo-1567529692333-de9fd6772897.jpeg 1650w\" alt=\"\" /></figure>\r\n<h2>Cras laoreet dolor sit amet</h2>\r\n<p>In magna tortor, facilisis vel finibus quis, placerat eget lacus. Mauris iaculis diam augue, non fringilla libero tincidunt a. In quis felis finibus, ultricies eros ut, tincidunt tortor. Etiam non semper dolor, eget iaculis mauris. Nulla quis purus gravida urna maximus tincidunt vulputate interdum massa. Quisque tellus est, ultricies nec lorem eget, sagittis tincidunt ipsum. Cras laoreet a ligula non laoreet. Vestibulum elementum quam lacinia sapien semper interdum.</p>','5e5b692e51298_1583049006.jpg','blog',1,NULL,NULL,'2020-01-11 07:01:15','2020-03-01 07:50:06'),
	(15,8,'[\"17\"]','Wonderings: are the stars our destination?','wonderings-are-the-stars-our-destination','<p>Aside from a few forays to France, the furthest my maternal grandparents travelled was Pembrokeshire, Wales (repeat visits to a wind-buffeted static caravan in Croes-goch, if you must know). Just a generation later, my parents&rsquo; peregrinations had encompassed most of Western Europe.</p>\r\n<p><img src=\"/storage/photos/8/photo-1495562569060-2eec283d3391.jpeg\" alt=\"\" /></p>\r\n<p>As of writing, I&rsquo;ve visited about 50 countries (I counted them up once, but have forgotten the total), most of them during two spells of backpacking &ndash; first across the US, then around the world &ndash; plus others as and when the opportunity arose.</p>\r\n<p>My wife has been to twice that number of destinations, and I&rsquo;d wager that a significant proportion of the people who comprise Lonely Planet&rsquo;s extended community &ndash; staff and contributors, followers and fans &ndash; have led equally footloose lives.</p>\r\n<p>The trend continues, too: my son, four, and daughter, one, have already visited many more places than my grandparents did in their entire lives. In fact, Harvey probably covered more miles&nbsp;<em>in utero</em>&nbsp;than they managed in total.</p>\r\n<figure class=\"wp-block-image\"><img class=\"wp-image-120\" src=\"https://wp.getgolo.com/wp-content/uploads/2019/10/the-16-copper-statues-which-fbfe-diaporama-1024x656.jpg\" sizes=\"(max-width: 1024px) 100vw, 1024px\" srcset=\"https://wp.getgolo.com/wp-content/uploads/2019/10/the-16-copper-statues-which-fbfe-diaporama-1024x656.jpg 1024w, https://wp.getgolo.com/wp-content/uploads/2019/10/the-16-copper-statues-which-fbfe-diaporama-600x384.jpg 600w, https://wp.getgolo.com/wp-content/uploads/2019/10/the-16-copper-statues-which-fbfe-diaporama-300x192.jpg 300w, https://wp.getgolo.com/wp-content/uploads/2019/10/the-16-copper-statues-which-fbfe-diaporama-768x492.jpg 768w, https://wp.getgolo.com/wp-content/uploads/2019/10/the-16-copper-statues-which-fbfe-diaporama.jpg 2048w\" alt=\"\" />\r\n<figcaption>Caption of Image</figcaption>\r\n</figure>\r\n<h4>Our expanding horizons</h4>\r\n<p>You can visualise each generation&rsquo;s expanding horizons as a series of concentric circles, like ripples spreading out from a stone dropped in a pond; assuming that trend doesn&rsquo;t go into reverse (which is possible, of course, given variables like climate change), where will the edge of my children&rsquo;s known universe lie? Just as I have explored the far side of this planet, might they explore the far side of another world?</p>\r\n<p>It&rsquo;s not as far-fetched as it sounds. As it often does, the stuff of science fiction has become the stuff of science fact: the race for space is more competitive now than it has been at any time since Neil Armstrong took that famous first step on the surface of the Moon, an epoch-defining moment that happened 50 years ago this July.</p>','5e5b64922eccf_1583047826.jpeg','blog',1,NULL,NULL,'2020-01-11 07:03:48','2020-03-01 07:30:26');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table reviews
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `place_id` int(11) DEFAULT NULL,
  `score` float DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;

INSERT INTO `reviews` (`id`, `user_id`, `place_id`, `score`, `comment`, `status`, `created_at`, `updated_at`)
VALUES
	(5,8,23,5,'Great route. Too fast English delivery. So much traffic that the guide description first match to visiting places at time. Frequent buses and helpful employees. Over all time well spent.',1,'2019-12-14 01:36:33','2019-12-17 11:47:25'),
	(6,8,24,5,'Great route. Too fast English delivery. So much traffic that the guide description first match to visiting places at time. Frequent buses and helpful employees. Over all time well spent.',1,'2019-12-14 01:36:57','2019-12-14 01:36:57'),
	(7,8,22,5,'Great route. Too fast English delivery. So much traffic that the guide description first match to visiting places at time. Frequent buses and helpful employees. Over all time well spent.',1,'2019-12-14 01:38:09','2019-12-14 01:38:09'),
	(17,8,21,5,'Excellent service and awesome food. Truly a 5 star restaurant. Service is seamless and spot on. Food was prepared perfectly.',1,'2019-12-14 10:59:30','2019-12-14 10:59:30'),
	(23,8,17,5,'Excellent service and awesome food. Truly a 5 star restaurant. Service is seamless and spot on. Food was prepared perfectly.',1,'2019-12-14 11:01:44','2019-12-14 11:01:44'),
	(25,8,19,5,'Excellent service and awesome food. Truly a 5 star restaurant. Service is seamless and spot on. Food was prepared perfectly.',1,'2019-12-14 11:02:07','2019-12-14 11:02:07'),
	(26,8,20,5,'Excellent service and awesome food. Truly a 5 star restaurant. Service is seamless and spot on. Food was prepared perfectly.',1,'2019-12-14 11:02:19','2019-12-14 11:02:19'),
	(27,8,16,5,'Excellent service and awesome food. Truly a 5 star restaurant. Service is seamless and spot on. Food was prepared perfectly.',1,'2019-12-14 11:02:35','2019-12-14 11:02:35'),
	(29,8,27,5,'The location was near the subway, metro, & train stations. It also had excellent access to all kinds of shopping & good restaurants.',1,'2019-12-14 11:04:25','2019-12-14 11:04:25'),
	(30,8,28,5,'The location was near the subway, metro, & train stations. It also had excellent access to all kinds of shopping & good restaurants.',1,'2019-12-14 11:04:38','2019-12-14 11:04:38');

/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `val` text COLLATE utf8mb4_unicode_ci,
  `type` char(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'string',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`id`, `name`, `val`, `type`, `created_at`, `updated_at`)
VALUES
	(11,'app_name','City Guide Travel Laravel Platform','string','2019-12-18 07:53:47','2019-12-18 07:55:23'),
	(13,'logo','5df9db8757535_1576655751.png','image','2019-12-18 07:55:23','2019-12-18 07:55:51'),
	(14,'email_system','hello@uxper.co','string','2019-12-21 10:18:55','2020-02-11 01:50:43'),
	(15,'ads_sidebar_banner_link','https://www.getyourguide.com','string','2019-12-21 10:18:55','2019-12-23 14:37:34'),
	(16,'ads_sidebar_banner_image','5e02cf9f0538b_1577242527.jpg','image','2019-12-21 10:19:03','2019-12-25 02:55:27'),
	(17,'home_description','Golo is a Laravel Theme built on the Laravel 5.8 framework. With this theme, you can create your own City Travel Guide website with Points of Interest group by Categories (Sight, Restaurant, Drink, Shopping, Hotel, Fitness, Beaty, Activities...)','string','2020-06-22 15:09:58','2020-06-22 15:09:58'),
	(18,'mail_driver','smtp','string','2020-06-22 15:09:58','2020-06-22 15:09:58'),
	(19,'mail_host','smtp.googlemail.com','string','2020-06-22 15:09:58','2020-06-22 15:09:58'),
	(20,'mail_port','465','string','2020-06-22 15:09:58','2020-06-22 15:09:58'),
	(21,'mail_username',NULL,'string','2020-06-22 15:09:58','2020-06-22 15:09:58'),
	(22,'mail_password',NULL,'string','2020-06-22 15:09:58','2020-06-22 15:09:58'),
	(23,'mail_encryption','ssl','string','2020-06-22 15:09:58','2020-06-22 15:09:58'),
	(24,'mail_from_address','hello@uxper.co','string','2020-06-22 15:09:58','2020-06-22 15:09:58'),
	(25,'mail_from_name','uxper','string','2020-06-22 15:09:58','2020-06-22 15:09:58'),
	(26,'facebook_app_id',NULL,'string','2020-06-22 15:09:58','2020-06-22 15:09:58'),
	(27,'facebook_app_secret',NULL,'string','2020-06-22 15:09:58','2020-06-22 15:09:58'),
	(28,'google_app_id',NULL,'string','2020-06-22 15:09:58','2020-06-22 15:09:58'),
	(29,'google_app_secret',NULL,'string','2020-06-22 15:09:58','2020-06-22 15:09:58'),
	(30,'goolge_map_api_key',NULL,'string','2020-06-22 15:09:58','2020-06-22 15:09:58'),
	(31,'style_rtl','0','string','2020-06-22 15:09:58','2020-06-22 15:09:58'),
	(32,'template','01','string','2020-06-22 15:09:58','2020-06-22 15:42:00');

/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table social_accounts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `social_accounts`;

CREATE TABLE `social_accounts` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table testimonial_translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `testimonial_translations`;

CREATE TABLE `testimonial_translations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `testimonial_id` int(11) DEFAULT NULL,
  `locale` varchar(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `testimonial_translations` WRITE;
/*!40000 ALTER TABLE `testimonial_translations` DISABLE KEYS */;

INSERT INTO `testimonial_translations` (`id`, `testimonial_id`, `locale`, `name`, `job_title`, `content`)
VALUES
	(3,10,'en','Kari Granleese','CEO Alididi','Really useful app to find interesting things to see do, drink and eat in new places. I’ve been using it regularly in my travels over the past few months.'),
	(4,10,'fr','teststs 22222 fr','frrr',NULL),
	(5,11,'en','Lorealdonae','Travellers','I use this app for everything!I’ m a very adventurous person so I love to try new restaurants, hair salons, even nightlife when I’m in different cities!'),
	(6,11,'fr','test 1 fr',NULL,NULL),
	(7,12,'en','Alexkaay','Local Guide','I adore learning about new as well as old local, especially small independent business\'. And this is just the place for doing so.');

/*!40000 ALTER TABLE `testimonial_translations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table testimonials
# ------------------------------------------------------------

DROP TABLE IF EXISTS `testimonials`;

CREATE TABLE `testimonials` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;

INSERT INTO `testimonials` (`id`, `name`, `job_title`, `avatar`, `content`, `status`, `created_at`, `updated_at`)
VALUES
	(10,NULL,NULL,'5ee19cf5de0ab_1591844085.jpg',NULL,1,'2020-05-28 15:27:45','2020-06-11 02:54:45'),
	(11,NULL,NULL,'5ee19d9a2b42a_1591844250.jpg',NULL,1,'2020-05-28 15:41:35','2020-06-11 02:57:30'),
	(12,NULL,NULL,'5ee19e4de3586_1591844429.jpg',NULL,1,'2020-06-11 03:00:29','2020-06-11 03:00:29');

/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `api_token`, `avatar`, `phone_number`, `facebook`, `instagram`, `is_admin`, `status`, `created_at`, `updated_at`)
VALUES
	(8,'Christian','lara@getgolo.com',NULL,'$2y$10$feNkNEN2adtyRSwreot3oudyGoSS1ofnAxzlhQJl2llUcwp1A4wD2','RJPyvvpZlfghwk1a2AgvJBHnwKLIbltTsPSahqYO6DwzGPwY1FB0isdeqRZO',NULL,'5df4c0533bb17_1576321107.png','+813371208190',NULL,NULL,1,1,'2019-11-08 21:22:25','2020-02-15 09:36:34'),
	(13,'Kevin','demo@getgolo.com',NULL,'$2y$10$JzW.POk/BDCKYHulJmtXaOLGSXQ1LZIKYSdMjRJ.ifiqsP3FxWHyK','wPFaVXXOQbYnEwTvcUCHGPkppSw6YtAarbt0XnotpnY5WnRbkMcIzETXNAgR',NULL,NULL,'+81337120819','facebook.com/uxper.co','instagram.com/uxper.co',1,1,'2019-11-08 21:22:25','2019-12-14 10:53:55'),
	(14,'Nathan','nathan@gmail.com',NULL,'$2y$10$XjpZkW/r6PUcxf6R7Dh7wO3uz5tnsc60r.ot3NinwmCyLzgy8nSG.','KcQO55az9XbRtaXp78nxp1NZJHSZHww0yF82AquVHyqfgQnCSZyaHP2nQygu',NULL,NULL,'0912222222','facebook.com/nathan','instagram.com/nathan',0,1,'2019-12-14 09:09:31','2019-12-21 07:07:24'),
	(16,'Clayton Smith','clayton01@gmail.com',NULL,'$2y$10$25oej/ly24weFwhWSJrA4u/8c5CysWh4iMpW/M2PgWMBqXKx4VJKa',NULL,NULL,NULL,NULL,NULL,NULL,0,1,'2020-01-21 06:52:43','2020-01-21 06:52:43');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table wishlists
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wishlists`;

CREATE TABLE `wishlists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `place_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;

INSERT INTO `wishlists` (`id`, `user_id`, `place_id`, `created_at`, `updated_at`)
VALUES
	(1,8,21,'2020-06-22 15:42:16','2020-06-22 15:42:16'),
	(2,8,23,'2020-06-22 15:42:34','2020-06-22 15:42:34'),
	(3,8,19,'2020-06-22 15:42:36','2020-06-22 15:42:36'),
	(4,8,28,'2020-06-22 15:42:37','2020-06-22 15:42:37');

/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
