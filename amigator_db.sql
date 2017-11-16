-- MySQL dump 10.13  Distrib 5.6.16, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: amigator_db
-- ------------------------------------------------------
-- Server version	5.6.16-1~exp1

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
-- Table structure for table `ads`
--

DROP TABLE IF EXISTS `ads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerID` int(10) unsigned NOT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT 'Заголовок',
  `data` text,
  `cityID` int(10) unsigned DEFAULT NULL COMMENT 'Расположение',
  `sex` enum('M','F','C') NOT NULL DEFAULT 'M' COMMENT 'С кем',
  `date` timestamp NULL DEFAULT NULL COMMENT 'Когда',
  `content` text COMMENT 'Текст объявления',
  `timeCreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Создан',
  `sortDate` timestamp NULL DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `city` (`cityID`),
  KEY `customerID` (`customerID`),
  CONSTRAINT `ads_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ads_ibfk_2` FOREIGN KEY (`cityID`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Обьявления';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ads`
--

LOCK TABLES `ads` WRITE;
/*!40000 ALTER TABLE `ads` DISABLE KEYS */;
INSERT INTO `ads` VALUES (1,1,'Супер тестовое мего обявление','Всякие дебильные данные',1,'F','1982-02-01 21:00:00','Привет, мир! Я текст этого обьявления','2017-10-23 13:10:29','2017-10-23 21:00:00',0,1),(2,1,'Ищу напарника для поездки в горы или на скалодром объявление минимум в две строки','Мой вес:	75 кг\r\nМой уровень:	7А\r\nМои занятия:	Скалодром, Поездка на скалы',NULL,'F',NULL,'Очевидно, что выразительное аккумулирует глубокий модернизм. Типическое, в первом приближении, диссонирует ритм. Калокагатия дает синтез искусств. Возрождение, следовательно, образует сокращенный экспрессионизм. Переходное состояние просветляет диахронический подход. Структурализм начинает психологический параллелизм. Биографический метод, в том числе, заканчивает непосредственный диахронический подход.','2017-10-24 12:09:49','2017-10-24 09:09:49',0,1),(3,2,'Ищу напарника для поездки в горы или на скалодром объявление минимум в две строки','Нет данных',NULL,'M',NULL,'\r\nНа странице лобби при выборе каждой игры к кнопке “Играть” добавить кнопку “Просмотр” и расположить ее под \"Играть\".\r\n- При нажатии “Играть” - игроку предлагают сразу купить билет, а потом загружаем игру. (Экономим 1 загрузку)\r\n- При нажатии “Просмотр” - переходим на игру для первичного ознакомления (как сейчас). \r\n\r\n--\r\nЭто сообщение было автоматически сгенерировано JIRA.\r\nЕсли Вы считаете, что оно отправлено ошибочно, пожалуйста свяжитесь с Вашим администратором JIRA: https://jira.emict.net/secure/ContactAdministrators!default.jspa\r\nБолее подробную информацию о JIRA, см.: http://www.atlassian.com/software/jira','2017-10-25 08:48:20','2017-10-25 05:48:20',0,1);
/*!40000 ALTER TABLE `ads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ads_interests`
--

DROP TABLE IF EXISTS `ads_interests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ads_interests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adsID` int(10) unsigned NOT NULL,
  `interestID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customerID` (`adsID`),
  KEY `interestID` (`interestID`),
  CONSTRAINT `ads_interests_ibfk_1` FOREIGN KEY (`adsID`) REFERENCES `ads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ads_interests_ibfk_2` FOREIGN KEY (`interestID`) REFERENCES `interest` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='Интересы пользователей';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ads_interests`
--

LOCK TABLES `ads_interests` WRITE;
/*!40000 ALTER TABLE `ads_interests` DISABLE KEYS */;
INSERT INTO `ads_interests` VALUES (1,1,1),(2,1,2),(7,2,1),(8,2,2),(9,2,3),(10,2,4),(11,3,6),(12,3,7);
/*!40000 ALTER TABLE `ads_interests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Категории';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `countryId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `countryId` (`countryId`),
  CONSTRAINT `city_ibfk_1` FOREIGN KEY (`countryId`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Города';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,1),(2,1);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city_translation`
--

DROP TABLE IF EXISTS `city_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city_translation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sourceID` int(10) unsigned NOT NULL,
  `language` varchar(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sourceID` (`sourceID`),
  CONSTRAINT `city_translation_ibfk_1` FOREIGN KEY (`sourceID`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Переводы';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city_translation`
--

LOCK TABLES `city_translation` WRITE;
/*!40000 ALTER TABLE `city_translation` DISABLE KEYS */;
INSERT INTO `city_translation` VALUES (1,1,'ru','Москва'),(2,2,'ru','Санкт-Петербург');
/*!40000 ALTER TABLE `city_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `common_images`
--

DROP TABLE IF EXISTS `common_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `common_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file` varchar(255) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `common_images`
--

LOCK TABLES `common_images` WRITE;
/*!40000 ALTER TABLE `common_images` DISABLE KEYS */;
INSERT INTO `common_images` VALUES (1,'/uploads/custom/49e7dd0bac6f0aefbc1b185ed83eee08/66fc0e2cad15520b60da4ff4e1aa8303.jpg',NULL),(2,'/uploads/custom/49e7dd0bac6f0aefbc1b185ed83eee08/574221ee9b1001d4da7ea0607b40ac00.jpg',NULL);
/*!40000 ALTER TABLE `common_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `participantsCount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Компании';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_category`
--

DROP TABLE IF EXISTS `company_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `companyID` int(10) unsigned NOT NULL,
  `categoryID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `companyID` (`companyID`),
  KEY `categoryID` (`categoryID`),
  CONSTRAINT `company_category_ibfk_1` FOREIGN KEY (`companyID`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `company_category_ibfk_2` FOREIGN KEY (`categoryID`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_category`
--

LOCK TABLES `company_category` WRITE;
/*!40000 ALTER TABLE `company_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_interests`
--

DROP TABLE IF EXISTS `company_interests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_interests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `companyID` int(10) unsigned NOT NULL,
  `interestID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `interestID` (`interestID`),
  KEY `companyID` (`companyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Связь интересов с компаниями';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_interests`
--

LOCK TABLES `company_interests` WRITE;
/*!40000 ALTER TABLE `company_interests` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_interests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_participant`
--

DROP TABLE IF EXISTS `company_participant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_participant` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `companyID` int(10) unsigned NOT NULL,
  `participantID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `companyID` (`companyID`),
  KEY `participantID` (`participantID`),
  CONSTRAINT `company_participant_ibfk_1` FOREIGN KEY (`companyID`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `company_participant_ibfk_2` FOREIGN KEY (`participantID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Связь компаний и пользователей в них';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_participant`
--

LOCK TABLES `company_participant` WRITE;
/*!40000 ALTER TABLE `company_participant` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_participant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Страны';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1);
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country_translation`
--

DROP TABLE IF EXISTS `country_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country_translation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sourceID` int(10) unsigned NOT NULL,
  `language` varchar(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sourceID` (`sourceID`),
  CONSTRAINT `country_translation_ibfk_1` FOREIGN KEY (`sourceID`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Переводы';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country_translation`
--

LOCK TABLES `country_translation` WRITE;
/*!40000 ALTER TABLE `country_translation` DISABLE KEYS */;
INSERT INTO `country_translation` VALUES (1,1,'ru','Россия');
/*!40000 ALTER TABLE `country_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `fullName` varchar(255) DEFAULT NULL,
  `birthday` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sex` int(1) NOT NULL DEFAULT '1',
  `title` varchar(1024) DEFAULT NULL,
  `about` text,
  `code` char(32) DEFAULT NULL,
  `registrationIp` varchar(16) DEFAULT NULL,
  `registrationTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cityID` int(10) unsigned NOT NULL,
  `authID` varchar(64) DEFAULT NULL,
  `authMethod` varchar(16) DEFAULT NULL,
  `unsetMessage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cityID` (`cityID`),
  CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`cityID`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'kasp89s@gmail.com','8349efb1b90fb33b41698cbe945769c4',1,'Тестовый тип','1977-10-11 09:06:23',1,NULL,NULL,NULL,NULL,'2017-09-26 14:19:57',1,NULL,NULL,NULL),(2,'kasp89s@mail.com','cde41e37ce579fb05fd152cb4f69d512',0,'Даша Куесосович','1989-10-09 12:47:02',2,NULL,'Я простопоц!!!','59d24c0e3d9bd','127.0.0.1','2017-10-02 14:24:14',1,NULL,NULL,'Я Вас всех ябаааал!!!!!!!!!!!!!!!!1');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_comment`
--

DROP TABLE IF EXISTS `customer_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerID` int(10) unsigned NOT NULL,
  `text` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likePoint` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `customerID` (`customerID`),
  CONSTRAINT `customer_comment_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Коментарии';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_comment`
--

LOCK TABLES `customer_comment` WRITE;
/*!40000 ALTER TABLE `customer_comment` DISABLE KEYS */;
INSERT INTO `customer_comment` VALUES (2,2,'Комментик','2017-10-10 09:01:40',0),(4,2,'efkdpfksdofsf','2017-10-10 09:06:17',0),(5,2,'Мероприятие невиданного охвата и с колоссальной идеей. Для меня честь и удовольствие работать с такой замечательной и очень молодой командой. То, что мы сделали за эти несколько месяцев, — это настоящий подвиг. Коля , Мари , спасибо вам, что привлекли. Работать в коллективе людей, для которых нет невыполнимых задач, - это самый лучший опыт.','2017-10-10 09:09:03',0),(6,2,'Прямо сейчас трансляция Comic Con в San Diego! В 1080, между прочим, Marvel мочат) Ну-ка, покажите нам Quicksilver ^____^','2017-10-10 09:09:53',0);
/*!40000 ALTER TABLE `customer_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_comment_answer`
--

DROP TABLE IF EXISTS `customer_comment_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_comment_answer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `commentID` int(10) unsigned NOT NULL,
  `customerID` int(10) unsigned NOT NULL,
  `text` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `likePoint` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `commentID` (`commentID`),
  KEY `customerID` (`customerID`),
  CONSTRAINT `customer_comment_answer_ibfk_1` FOREIGN KEY (`commentID`) REFERENCES `customer_comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `customer_comment_answer_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='Ответы на Коментарии';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_comment_answer`
--

LOCK TABLES `customer_comment_answer` WRITE;
/*!40000 ALTER TABLE `customer_comment_answer` DISABLE KEYS */;
INSERT INTO `customer_comment_answer` VALUES (1,4,2,'бла-бла','2017-10-10 09:53:11',0),(2,4,2,'ебучий хер!','2017-10-10 09:56:30',0),(3,5,2,'Бальной ублюдок','2017-10-10 09:56:59',0),(4,5,2,'Бальной ублюдок','2017-10-10 10:01:15',0),(5,5,2,'Бальной ублюдок','2017-10-10 10:05:55',0),(6,2,2,'','2017-10-10 11:33:19',0),(7,2,2,'','2017-10-10 11:34:21',0),(8,2,2,'','2017-10-10 11:34:27',0);
/*!40000 ALTER TABLE `customer_comment_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_comment_answer_image`
--

DROP TABLE IF EXISTS `customer_comment_answer_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_comment_answer_image` (
  `commentID` int(10) unsigned NOT NULL,
  `imageID` int(10) unsigned NOT NULL,
  KEY `commentID` (`commentID`),
  KEY `imageID` (`imageID`),
  CONSTRAINT `customer_comment_answer_image_ibfk_1` FOREIGN KEY (`imageID`) REFERENCES `common_images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `customer_comment_answer_image_ibfk_2` FOREIGN KEY (`commentID`) REFERENCES `customer_comment_answer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_comment_answer_image`
--

LOCK TABLES `customer_comment_answer_image` WRITE;
/*!40000 ALTER TABLE `customer_comment_answer_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_comment_answer_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_comment_image`
--

DROP TABLE IF EXISTS `customer_comment_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_comment_image` (
  `commentID` int(10) unsigned NOT NULL,
  `imageID` int(10) unsigned NOT NULL,
  KEY `commentID` (`commentID`),
  KEY `imageID` (`imageID`),
  CONSTRAINT `customer_comment_image_ibfk_1` FOREIGN KEY (`commentID`) REFERENCES `customer_comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `customer_comment_image_ibfk_2` FOREIGN KEY (`imageID`) REFERENCES `common_images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_comment_image`
--

LOCK TABLES `customer_comment_image` WRITE;
/*!40000 ALTER TABLE `customer_comment_image` DISABLE KEYS */;
INSERT INTO `customer_comment_image` VALUES (4,1),(5,2);
/*!40000 ALTER TABLE `customer_comment_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_friend`
--

DROP TABLE IF EXISTS `customer_friend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_friend` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customerID` int(10) unsigned NOT NULL,
  `friendID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customerID` (`customerID`),
  KEY `friendID` (`friendID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_friend`
--

LOCK TABLES `customer_friend` WRITE;
/*!40000 ALTER TABLE `customer_friend` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_friend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_image`
--

DROP TABLE IF EXISTS `customer_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerID` int(10) unsigned NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `isMain` tinyint(1) NOT NULL DEFAULT '0',
  `likePoint` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customerID` (`customerID`),
  CONSTRAINT `customer_image_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COMMENT='Картинки пользователей';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_image`
--

LOCK TABLES `customer_image` WRITE;
/*!40000 ALTER TABLE `customer_image` DISABLE KEYS */;
INSERT INTO `customer_image` VALUES (27,2,'27b06d68793d9de1b9a9474865e87af9.jpg',1,1,'2017-10-09 08:57:11'),(28,1,'66fc0e2cad15520b60da4ff4e1aa8303.jpg',1,0,'2017-10-11 07:36:18'),(29,2,'51a3218ff934eeb9559f4e957ac5bc60.jpg',0,0,'2017-10-27 09:45:40'),(30,2,'afacdb0a401ccdf6b48551bbc00e8a74.jpg',0,0,'2017-10-27 09:46:34'),(31,2,'a43683d33b40f413228d54e3c6ed4a2f.jpg',0,0,'2017-10-27 09:46:52'),(32,2,'437175ba4191210ee004e1d937494d09.png',0,0,'2017-10-27 09:47:09'),(33,2,'d9f9133fb120cd6096870bc2b496805b.png',0,0,'2017-10-27 09:47:28');
/*!40000 ALTER TABLE `customer_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_image_comment`
--

DROP TABLE IF EXISTS `customer_image_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_image_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imageID` int(10) unsigned NOT NULL COMMENT 'Фотография',
  `text` text COMMENT 'Текст',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата',
  `likePoint` int(11) NOT NULL DEFAULT '0' COMMENT 'Лайков',
  `customerID` int(10) unsigned NOT NULL COMMENT 'Пользователь',
  PRIMARY KEY (`id`),
  KEY `imageID` (`imageID`),
  KEY `customerID` (`customerID`),
  CONSTRAINT `customer_image_comment_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `customer_image_comment_ibfk_3` FOREIGN KEY (`imageID`) REFERENCES `customer_image` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='Комментарии к фотографиям пользователей';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_image_comment`
--

LOCK TABLES `customer_image_comment` WRITE;
/*!40000 ALTER TABLE `customer_image_comment` DISABLE KEYS */;
INSERT INTO `customer_image_comment` VALUES (1,27,'Cyka','2017-10-27 12:02:20',0,2),(2,27,'Cyka','2017-10-27 12:08:34',0,2),(3,27,'Cyka','2017-10-27 12:08:45',0,2),(4,27,'Балда сука','2017-10-27 12:08:59',0,2),(5,27,'jkjkjkjkjk','2017-10-27 12:21:42',0,2),(6,27,'jkjkjkjkjk','2017-10-27 12:24:12',0,2),(7,29,'Ебуэ ты гандон :)','2017-10-27 12:46:04',0,2),(8,29,'Ебуэ ты гандон :)','2017-10-27 12:46:36',0,2),(9,29,'Ебуэ ты гандон :)','2017-10-27 12:46:46',0,2),(10,29,'Ебуэ ты гандон :)','2017-10-27 12:46:54',0,2),(11,29,'Ебуэ ты гандон :)','2017-10-27 12:47:10',0,2),(12,29,'Ебуэ ты гандон :)','2017-10-27 12:47:29',0,2);
/*!40000 ALTER TABLE `customer_image_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_interests`
--

DROP TABLE IF EXISTS `customer_interests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_interests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerID` int(10) unsigned NOT NULL,
  `interestID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customerID` (`customerID`),
  KEY `interestID` (`interestID`),
  CONSTRAINT `customer_interests_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `customer_interests_ibfk_2` FOREIGN KEY (`interestID`) REFERENCES `interest` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Интересы пользователей';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_interests`
--

LOCK TABLES `customer_interests` WRITE;
/*!40000 ALTER TABLE `customer_interests` DISABLE KEYS */;
INSERT INTO `customer_interests` VALUES (1,2,2),(2,2,3),(3,1,6),(4,1,7);
/*!40000 ALTER TABLE `customer_interests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_languages`
--

DROP TABLE IF EXISTS `customer_languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerID` int(10) unsigned NOT NULL,
  `languageID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customerID` (`customerID`),
  KEY `languageID` (`languageID`),
  CONSTRAINT `customer_languages_ibfk_1` FOREIGN KEY (`languageID`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `customer_languages_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_languages`
--

LOCK TABLES `customer_languages` WRITE;
/*!40000 ALTER TABLE `customer_languages` DISABLE KEYS */;
INSERT INTO `customer_languages` VALUES (1,2,2),(2,1,3);
/*!40000 ALTER TABLE `customer_languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infopage`
--

DROP TABLE IF EXISTS `infopage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `infopage` (
  `id` int(10) unsigned NOT NULL,
  `code` varchar(45) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `createTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infopage`
--

LOCK TABLES `infopage` WRITE;
/*!40000 ALTER TABLE `infopage` DISABLE KEYS */;
/*!40000 ALTER TABLE `infopage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interest`
--

DROP TABLE IF EXISTS `interest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interest` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoryID` int(10) unsigned NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoryID` (`categoryID`),
  CONSTRAINT `interest_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `interest_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Интересы';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interest`
--

LOCK TABLES `interest` WRITE;
/*!40000 ALTER TABLE `interest` DISABLE KEYS */;
INSERT INTO `interest` VALUES (1,1,1),(2,1,1),(3,1,1),(4,1,1),(5,1,1),(6,2,1),(7,2,1);
/*!40000 ALTER TABLE `interest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interest_category`
--

DROP TABLE IF EXISTS `interest_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interest_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Категории интересов';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interest_category`
--

LOCK TABLES `interest_category` WRITE;
/*!40000 ALTER TABLE `interest_category` DISABLE KEYS */;
INSERT INTO `interest_category` VALUES (1,1),(2,2),(3,3),(4,NULL),(5,NULL),(6,NULL),(7,NULL);
/*!40000 ALTER TABLE `interest_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interest_category_translation`
--

DROP TABLE IF EXISTS `interest_category_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interest_category_translation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sourceID` int(10) unsigned NOT NULL,
  `language` varchar(5) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sourceID` (`sourceID`),
  CONSTRAINT `interest_category_translation_ibfk_1` FOREIGN KEY (`sourceID`) REFERENCES `interest_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Переводы категорий интересов';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interest_category_translation`
--

LOCK TABLES `interest_category_translation` WRITE;
/*!40000 ALTER TABLE `interest_category_translation` DISABLE KEYS */;
INSERT INTO `interest_category_translation` VALUES (1,1,'ru','Спорт'),(2,2,'ru','Путешествие'),(3,3,'ru','Работа, бизнес'),(4,4,'ru','Знакомства'),(5,5,'ru','Прогулка'),(6,6,'ru','Игры'),(7,7,'ru','Обучение');
/*!40000 ALTER TABLE `interest_category_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interest_translation`
--

DROP TABLE IF EXISTS `interest_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interest_translation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sourceID` int(10) unsigned NOT NULL,
  `language` varchar(5) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sourceID` (`sourceID`),
  CONSTRAINT `interest_translation_ibfk_1` FOREIGN KEY (`sourceID`) REFERENCES `interest` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Переводы интересов';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interest_translation`
--

LOCK TABLES `interest_translation` WRITE;
/*!40000 ALTER TABLE `interest_translation` DISABLE KEYS */;
INSERT INTO `interest_translation` VALUES (1,1,'ru','Скалолазание'),(2,2,'ru','Волейбол'),(3,3,'ru','Футбол'),(4,4,'ru','Бокс'),(5,5,'ru','Рыбалка'),(6,6,'ru','За границу'),(7,7,'ru','По России');
/*!40000 ALTER TABLE `interest_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(5) DEFAULT NULL,
  `system` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Отображать как системный',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Языки';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'ru',1),(2,'en',1),(3,'fr',0);
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages_translation`
--

DROP TABLE IF EXISTS `languages_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages_translation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sourceID` int(10) unsigned NOT NULL,
  `language` varchar(5) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sourceID` (`sourceID`),
  CONSTRAINT `languages_translation_ibfk_1` FOREIGN KEY (`sourceID`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Переводы языков';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages_translation`
--

LOCK TABLES `languages_translation` WRITE;
/*!40000 ALTER TABLE `languages_translation` DISABLE KEYS */;
INSERT INTO `languages_translation` VALUES (1,1,'ru','Русский'),(2,1,'en','Russian'),(3,2,'ru','Английский'),(4,3,'ru','Французский');
/*!40000 ALTER TABLE `languages_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_i18n`
--

DROP TABLE IF EXISTS `main_i18n`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_i18n` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(32) NOT NULL COMMENT 'Название категории перевода.',
  PRIMARY KEY (`id`),
  KEY `INDEXCategory` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8 COMMENT='Главная таблица переводов интерфейса.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_i18n`
--

LOCK TABLES `main_i18n` WRITE;
/*!40000 ALTER TABLE `main_i18n` DISABLE KEYS */;
INSERT INTO `main_i18n` VALUES (1,'app'),(2,'app'),(3,'app'),(4,'app'),(5,'app'),(6,'app'),(7,'app'),(8,'app'),(9,'app'),(10,'app'),(11,'app'),(12,'app'),(13,'app'),(14,'app'),(15,'app'),(16,'app'),(17,'app'),(18,'app'),(19,'app'),(20,'app'),(21,'app'),(22,'app'),(23,'app'),(24,'app'),(25,'app'),(26,'app'),(27,'app'),(28,'app'),(29,'app'),(30,'app'),(31,'app'),(32,'app'),(33,'app'),(34,'app'),(35,'app'),(36,'app'),(37,'app'),(38,'app'),(39,'app'),(40,'app'),(41,'app'),(42,'app'),(43,'app'),(44,'app'),(45,'app'),(46,'app'),(47,'app'),(48,'app'),(49,'app'),(50,'app'),(51,'app'),(52,'app'),(53,'app'),(54,'app'),(55,'app'),(56,'app'),(57,'app'),(58,'app'),(59,'app'),(60,'app'),(61,'app'),(62,'app'),(63,'app'),(64,'app'),(65,'app'),(66,'app'),(67,'app'),(68,'app'),(69,'app'),(70,'app'),(71,'app'),(72,'app'),(73,'app'),(74,'app'),(75,'app'),(76,'app'),(77,'app'),(78,'app'),(79,'app'),(80,'app'),(81,'app'),(82,'app'),(83,'app'),(84,'app'),(85,'app'),(86,'app'),(87,'app'),(88,'app'),(89,'app'),(90,'app'),(91,'app'),(92,'app'),(93,'app'),(94,'app'),(95,'app'),(96,'app'),(97,'app'),(98,'app'),(99,'app'),(100,'app'),(101,'app'),(102,'app'),(103,'app'),(104,'app'),(105,'app'),(106,'app'),(107,'app'),(108,'app'),(109,'app'),(110,'app'),(111,'app'),(112,'app'),(113,'app'),(114,'app'),(115,'app'),(116,'app'),(117,'app'),(118,'app'),(119,'app'),(120,'app'),(121,'app'),(122,'app'),(123,'app'),(124,'app'),(125,'app'),(126,'app'),(127,'app'),(128,'app'),(129,'app'),(130,'app'),(131,'app'),(132,'app'),(133,'app'),(134,'app'),(135,'app'),(136,'app'),(137,'app'),(138,'app'),(139,'app'),(140,'app'),(141,'app'),(142,'app'),(143,'app');
/*!40000 ALTER TABLE `main_i18n` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_i18n_translation`
--

DROP TABLE IF EXISTS `main_i18n_translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_i18n_translation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sourceId` int(10) unsigned NOT NULL COMMENT 'Ссылка на исходник.',
  `language` varchar(5) DEFAULT NULL COMMENT 'Название языка.',
  `message` text CHARACTER SET utf8 COLLATE utf8_bin COMMENT 'Текст перевода.',
  PRIMARY KEY (`id`),
  KEY `FKI18nTranslationToI18n` (`sourceId`),
  KEY `INDEXLanguage` (`language`),
  CONSTRAINT `FKI18nTranslationToI18n` FOREIGN KEY (`sourceId`) REFERENCES `main_i18n` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8 COMMENT='Переводы интерфейса.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_i18n_translation`
--

LOCK TABLES `main_i18n_translation` WRITE;
/*!40000 ALTER TABLE `main_i18n_translation` DISABLE KEYS */;
INSERT INTO `main_i18n_translation` VALUES (1,1,'ru','Ваш комментарий'),(2,2,'ru','Отправить'),(3,3,'ru','Запись со стены'),(4,4,'ru','Нравится'),(5,5,'ru','Это спам'),(6,6,'ru','Удалить'),(7,7,'ru','Ответить'),(8,8,'ru','Загрузить еще'),(9,9,'ru','Моя страница'),(10,10,'ru','Мои сообщения'),(11,11,'ru','Мои объявления'),(12,12,'ru','Мои друзья'),(13,13,'ru','Мои компании'),(14,14,'ru','Мои фотографии'),(15,15,'ru','Мои видеозаписи'),(16,16,'ru','Мои настройки'),(17,17,'ru','В контакты'),(18,18,'ru','Страна'),(19,19,'ru','Город'),(20,20,'ru','Языки'),(21,21,'ru','День рождения'),(22,22,'ru','лет'),(23,23,'ru','О себе'),(24,24,'ru','Изменить описание'),(25,25,'ru','Мой аватар'),(26,26,'ru','Все готово'),(27,27,'ru','Расскажите о своем объявлении'),(28,28,'ru','Мои данные'),(29,29,'ru','Мои предпочтения'),(30,30,'ru','Пол'),(31,31,'ru','Дата встречи'),(32,32,'ru','Смотреть профиль'),(33,33,'ru','Поиск по сообщениям'),(34,34,'ru','За период'),(35,35,'ru','Все'),(36,36,'ru','От меня'),(37,37,'ru','Мне'),(38,38,'ru','Создать новое'),(39,39,'ru','Новое объявление'),(40,40,'ru','Заголовок'),(41,41,'ru','Популярные цели'),(42,42,'ru','Нет подходящей цели'),(43,43,'ru','Добавьте свою'),(44,44,'ru','Расположение'),(45,45,'ru','В моем городе'),(46,46,'ru','Не важно'),(47,47,'ru','С кем'),(48,48,'ru','Когда'),(49,49,'ru','Точная дата'),(50,50,'ru','Выбрать дату'),(51,51,'ru','Решим вместе'),(52,52,'ru','Текст объявления'),(53,53,'ru','Введите текст объявления'),(54,54,'ru','Опубликовать'),(55,55,'ru','Вход'),(56,56,'ru','Регистрация'),(57,57,'ru','Запомнить'),(58,58,'ru','Войти'),(59,59,'ru','Шаг'),(60,60,'ru','Расскажите немного о себе, Имя'),(61,61,'ru','Необходимо выбрать фото профиля'),(62,62,'ru','Мои интересы'),(63,63,'ru','Знаю языки'),(64,64,'ru','Добавить язык'),(65,65,'ru','Обязательно напишите о себе'),(66,66,'ru','Это поможет другим лучше узнать вас'),(67,67,'ru','Не ленитесь, напишите хоть что-нибудь'),(68,68,'ru','Зарегистрироваться'),(69,69,'ru','Пожалуйста, авторизуйтесь'),(70,70,'ru','Запомнить меня'),(71,71,'ru','Забыли пароль?'),(72,72,'ru','Вход через соц.сети'),(73,73,'ru','Twitter'),(74,74,'ru','Facebook'),(75,75,'ru','Вконтакте'),(76,76,'ru','Одноклассники'),(77,77,'ru','Имя'),(78,78,'ru','Эл.почта'),(79,79,'ru','Пароль'),(80,80,'ru','Муж'),(81,81,'ru','Жен'),(82,82,'ru','Interest Translations'),(83,83,'ru','Update'),(84,84,'ru','Delete'),(85,85,'ru','Are you sure you want to delete this item?'),(86,86,'ru','Create Interest Translation'),(87,87,'ru','Search'),(88,88,'ru','Reset'),(89,89,'ru','Create'),(90,90,'ru','Update {modelClass}: '),(91,91,'ru','Interest Categories'),(92,92,'ru','Create Interest Category'),(93,93,'ru','Interest Category Translations'),(94,94,'ru','Create Interest Category Translation'),(95,95,'ru','Interests'),(96,96,'ru','Create Interest'),(97,97,'ru','ID'),(98,98,'ru','Сортировка'),(99,99,'ru','Код'),(100,100,'ru','Отображать как системный'),(101,101,'ru','Ads ID'),(102,102,'ru','Interest ID'),(103,103,'ru','Парольдолжен быть от 6 до 16 символов'),(104,104,'ru','Имя должно быть от 2 до 16 символов'),(105,105,'ru','Дата рождения'),(106,106,'ru','Январь'),(107,107,'ru','Февраль'),(108,108,'ru','Март'),(109,109,'ru','Апрель'),(110,110,'ru','Май'),(111,111,'ru','Июнь'),(112,112,'ru','Июль'),(113,113,'ru','Август'),(114,114,'ru','Сентябрь'),(115,115,'ru','Октябрь'),(116,116,'ru','Ноябрь'),(117,117,'ru','Декабрь'),(118,118,'ru','Comment ID'),(119,119,'ru','Image ID'),(120,120,'ru','Пользователь'),(121,121,'ru','Интересы'),(122,122,'ru','Создан'),(123,123,'ru','Активен'),(124,124,'ru','Sender ID'),(125,125,'ru','Receiver ID'),(126,126,'ru','Text'),(127,127,'ru','Date'),(128,128,'ru','Flag'),(129,129,'ru','Категория'),(130,130,'ru','Язык'),(131,131,'ru','Натменование'),(132,132,'ru','Category'),(133,133,'ru','File'),(134,134,'ru','Source ID'),(135,135,'ru','Language'),(136,136,'ru','Message'),(137,137,'ru','Customer ID'),(138,138,'ru','Like Point'),(139,139,'ru','Language ID'),(140,140,'ru','isMain'),(141,141,'ru','likePoint'),(142,142,'ru','Интерес'),(143,143,'ru','Наименование');
/*!40000 ALTER TABLE `main_i18n_translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `senderID` int(10) unsigned NOT NULL,
  `receiverID` int(10) unsigned NOT NULL,
  `text` text,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `senderID` (`senderID`),
  KEY `receiverID` (`receiverID`),
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`senderID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiverID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Сообщения';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,1,2,'Привет от первого второму','2017-10-11 09:06:56',1),(2,1,2,'Привет от первого второму еще разок','2017-10-11 09:20:14',1),(3,2,1,'Привет от второго первому','2017-10-11 09:15:03',1),(4,2,1,'Ну здароф ебучий шакал','2017-10-11 10:33:41',1),(5,1,2,'Ах ты сраная шлюха!!!!!!!!!!','2017-10-11 10:37:36',1),(6,1,2,'Hoopmessenger: http://hoopmessenger.com/dl Меня зовут Паша Бумчик, мне 19 лет, у меня плохая дикция, но это не мешает мне быть','2017-10-11 10:39:21',1);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  `userGroupId` int(10) unsigned NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `description` text,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `userGroupId` (`userGroupId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (0,'admin@example.com','',1,0,NULL),(1,'kasp89s@gmail.com','8349efb1b90fb33b41698cbe945769c4',1,1,'Мудила'),(4,'kasp89s@mail.ru','g65uerden',2,1,'Hello word'),(6,'test@admin.com','e10adc3949ba59abbe56e057f20f883e',1,1,'');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usergroup`
--

DROP TABLE IF EXISTS `usergroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usergroup` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `actions` set('user','customer','banner','info-page','manufacture','discount','coupon','shipping-method','payment-method','news','news-letter-subscriber','product','category','order','group','customer-group','specification','option','comment','languages') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usergroup`
--

LOCK TABLES `usergroup` WRITE;
/*!40000 ALTER TABLE `usergroup` DISABLE KEYS */;
INSERT INTO `usergroup` VALUES (1,'Супер админ','user,customer,banner,info-page,manufacture,discount,coupon,shipping-method,payment-method,news,news-letter-subscriber,product,category,order,group,customer-group,specification,option,comment,languages'),(2,'Админ','banner,info-page,manufacture,discount,coupon,news,news-letter-subscriber,product');
/*!40000 ALTER TABLE `usergroup` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-16 11:20:20
