-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 05 2018 г., 14:01
-- Версия сервера: 5.6.17
-- Версия PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `amigator_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
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
  KEY `customerID` (`customerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Обьявления' AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `ads`
--

INSERT INTO `ads` (`id`, `customerID`, `title`, `data`, `cityID`, `sex`, `date`, `content`, `timeCreate`, `sortDate`, `views`, `active`) VALUES
(1, 1, 'Супер тестовое мего обявление', 'Всякие дебильные данные', 1, 'F', '1982-02-01 21:00:00', 'Привет, мир! Я текст этого обьявления', '2017-10-23 13:10:29', '2017-10-23 21:00:00', 0, 1),
(2, 1, 'Ищу напарника для поездки в горы или на скалодром объявление минимум в две строки', 'Мой вес:	75 кг\r\nМой уровень:	7А\r\nМои занятия:	Скалодром, Поездка на скалы', 1, 'F', NULL, 'Очевидно, что выразительное аккумулирует глубокий модернизм. Типическое, в первом приближении, диссонирует ритм. Калокагатия дает синтез искусств. Возрождение, следовательно, образует сокращенный экспрессионизм. Переходное состояние просветляет диахронический подход. Структурализм начинает психологический параллелизм. Биографический метод, в том числе, заканчивает непосредственный диахронический подход.', '2017-10-24 12:09:49', '2017-10-24 09:09:49', 0, 1),
(3, 2, 'Ищу напарника для поездки в горы или на скалодром объявление минимум в две строки', 'Нет данных', 1, 'M', NULL, '\r\nНа странице лобби при выборе каждой игры к кнопке “Играть” добавить кнопку “Просмотр” и расположить ее под "Играть".\r\n- При нажатии “Играть” - игроку предлагают сразу купить билет, а потом загружаем игру. (Экономим 1 загрузку)\r\n- При нажатии “Просмотр” - переходим на игру для первичного ознакомления (как сейчас). \r\n\r\n--\r\nЭто сообщение было автоматически сгенерировано JIRA.\r\nЕсли Вы считаете, что оно отправлено ошибочно, пожалуйста свяжитесь с Вашим администратором JIRA: https://jira.emict.net/secure/ContactAdministrators!default.jspa\r\nБолее подробную информацию о JIRA, см.: http://www.atlassian.com/software/jira', '2017-10-25 08:48:20', '2017-10-25 05:48:20', 0, 1),
(4, 2, 'Новое объявление', 'Новое объявление', 1, 'M', NULL, 'Новое объявлениеНовое объявлениеНовое объявлениеНовое объявлениеНовое объявление', '2017-12-07 13:45:01', '2017-12-07 12:45:01', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `ads_interests`
--

CREATE TABLE IF NOT EXISTS `ads_interests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adsID` int(10) unsigned NOT NULL,
  `interestID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customerID` (`adsID`),
  KEY `interestID` (`interestID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Интересы пользователей' AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `ads_interests`
--

INSERT INTO `ads_interests` (`id`, `adsID`, `interestID`) VALUES
(1, 1, 1),
(2, 1, 2),
(7, 2, 1),
(8, 2, 2),
(9, 2, 3),
(10, 2, 4),
(11, 3, 6),
(12, 3, 7),
(19, 4, 1),
(20, 4, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `ads_participant`
--

CREATE TABLE IF NOT EXISTS `ads_participant` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `adsID` int(10) unsigned NOT NULL,
  `participantID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `companyID` (`adsID`),
  KEY `participantID` (`participantID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Связь компаний и пользователей в них' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Категории' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `category_translation`
--

CREATE TABLE IF NOT EXISTS `category_translation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sourceID` int(10) unsigned NOT NULL,
  `language` varchar(5) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sourceID` (`sourceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `countryId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `countryId` (`countryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Города' AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `countryId`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `city_translation`
--

CREATE TABLE IF NOT EXISTS `city_translation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sourceID` int(10) unsigned NOT NULL,
  `language` varchar(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sourceID` (`sourceID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Переводы' AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `city_translation`
--

INSERT INTO `city_translation` (`id`, `sourceID`, `language`, `name`) VALUES
(1, 1, 'ru', 'Москва'),
(2, 2, 'ru', 'Санкт-Петербург');

-- --------------------------------------------------------

--
-- Структура таблицы `common_images`
--

CREATE TABLE IF NOT EXISTS `common_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file` varchar(255) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `common_images`
--

INSERT INTO `common_images` (`id`, `file`, `date`) VALUES
(1, '/uploads/custom/49e7dd0bac6f0aefbc1b185ed83eee08/66fc0e2cad15520b60da4ff4e1aa8303.jpg', NULL),
(2, '/uploads/custom/49e7dd0bac6f0aefbc1b185ed83eee08/574221ee9b1001d4da7ea0607b40ac00.jpg', NULL),
(3, '/uploads/custom/18bd85455fd764b5e91f254fe871e664/a87ff679a2f3e71d9181a67b7542122c.jpg', NULL),
(4, '/uploads/custom/18bd85455fd764b5e91f254fe871e664/a87ff679a2f3e71d9181a67b7542122c.jpg', NULL),
(5, '/uploads/custom/18bd85455fd764b5e91f254fe871e664/a87ff679a2f3e71d9181a67b7542122c.jpg', NULL),
(6, '/uploads/custom/18bd85455fd764b5e91f254fe871e664/574221ee9b1001d4da7ea0607b40ac00.jpg', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerID` int(10) unsigned NOT NULL,
  `cityID` int(10) unsigned NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `participantsCount` int(11) NOT NULL DEFAULT '0',
  `timeCreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sortDate` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cityID` (`cityID`),
  KEY `customerID` (`customerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Компании' AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `company`
--

INSERT INTO `company` (`id`, `customerID`, `cityID`, `title`, `url`, `name`, `image`, `description`, `participantsCount`, `timeCreate`, `sortDate`) VALUES
(4, 2, 1, 'ТАйтл!', 'http://amigator.local', 'Название компании', '/uploads/company/4/eccbc87e4b5ce2fe28308fd9f2a7baf3.jpg', 'Информация о компании', 0, '2017-12-07 14:20:33', '2017-12-07 13:20:33'),
(5, 1, 1, 'Мы - Охуенные Толкинисты!!!', 'http://amigator.local', 'Мы - Толкинисты!!!', '/uploads/company/5/c81e728d9d4c2f636f067f89cc14862c.jpg', 'Мы - Толкинисты!!! Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!Мы - Охуенные Толкинисты!!!', 0, '2017-12-07 15:13:23', '2017-12-07 14:13:23');

-- --------------------------------------------------------

--
-- Структура таблицы `company_category`
--

CREATE TABLE IF NOT EXISTS `company_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `companyID` int(10) unsigned NOT NULL,
  `categoryID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `companyID` (`companyID`),
  KEY `categoryID` (`categoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `company_comment`
--

CREATE TABLE IF NOT EXISTS `company_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerID` int(10) unsigned NOT NULL,
  `text` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likePoint` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `customerID` (`customerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Коментарии' AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `company_comment`
--

INSERT INTO `company_comment` (`id`, `customerID`, `text`, `date`, `likePoint`) VALUES
(1, 1, 'Мероприятие невиданного охвата и с колоссальной идеей. Для меня честь и удовольствие работать с такой замечательной и очень молодой командой. То, что мы сделали за эти несколько месяцев, — это настоящий подвиг. Коля , Мари , спасибо вам, что привлекли. Работать в коллективе людей, для которых нет невыполнимых задач, - это самый лучший опыт.', '2017-12-07 15:31:16', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `company_comment_answer`
--

CREATE TABLE IF NOT EXISTS `company_comment_answer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `commentID` int(10) unsigned NOT NULL,
  `customerID` int(10) unsigned NOT NULL,
  `text` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `likePoint` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `commentID` (`commentID`),
  KEY `customerID` (`customerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Ответы на Коментарии' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `company_comment_answer_image`
--

CREATE TABLE IF NOT EXISTS `company_comment_answer_image` (
  `commentID` int(10) unsigned NOT NULL,
  `imageID` int(10) unsigned NOT NULL,
  KEY `commentID` (`commentID`),
  KEY `imageID` (`imageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `company_comment_image`
--

CREATE TABLE IF NOT EXISTS `company_comment_image` (
  `commentID` int(10) unsigned NOT NULL,
  `imageID` int(10) unsigned NOT NULL,
  KEY `commentID` (`commentID`),
  KEY `imageID` (`imageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `company_comment_image`
--

INSERT INTO `company_comment_image` (`commentID`, `imageID`) VALUES
(1, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `company_interests`
--

CREATE TABLE IF NOT EXISTS `company_interests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `companyID` int(10) unsigned NOT NULL,
  `interestID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `interestID` (`interestID`),
  KEY `companyID` (`companyID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Связь интересов с компаниями' AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `company_interests`
--

INSERT INTO `company_interests` (`id`, `companyID`, `interestID`) VALUES
(7, 4, 1),
(8, 4, 2),
(9, 5, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `company_participant`
--

CREATE TABLE IF NOT EXISTS `company_participant` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `companyID` int(10) unsigned NOT NULL,
  `participantID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `companyID` (`companyID`),
  KEY `participantID` (`participantID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Связь компаний и пользователей в них' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Страны' AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Структура таблицы `country_translation`
--

CREATE TABLE IF NOT EXISTS `country_translation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sourceID` int(10) unsigned NOT NULL,
  `language` varchar(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sourceID` (`sourceID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Переводы' AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `country_translation`
--

INSERT INTO `country_translation` (`id`, `sourceID`, `language`, `name`) VALUES
(1, 1, 'ru', 'Россия');

-- --------------------------------------------------------

--
-- Структура таблицы `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `fullName` varchar(255) DEFAULT NULL,
  `birthday` timestamp NULL DEFAULT NULL,
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
  KEY `cityID` (`cityID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `customer`
--

INSERT INTO `customer` (`id`, `email`, `password`, `isActive`, `fullName`, `birthday`, `sex`, `title`, `about`, `code`, `registrationIp`, `registrationTime`, `cityID`, `authID`, `authMethod`, `unsetMessage`) VALUES
(1, 'kasp89s@gmail.com', '8349efb1b90fb33b41698cbe945769c4', 1, 'Тестовый тип', '1977-10-11 09:06:23', 1, NULL, NULL, NULL, NULL, '2017-09-26 14:19:57', 1, NULL, NULL, NULL),
(2, 'kasp89s@mail.com', '8349efb1b90fb33b41698cbe945769c4', 1, 'Даша Куесосович', '1989-10-09 12:47:02', 2, NULL, 'Я простопоц!!!', '59d24c0e3d9bd', '127.0.0.1', '2017-10-02 14:24:14', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `customer_comment`
--

CREATE TABLE IF NOT EXISTS `customer_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerID` int(10) unsigned NOT NULL,
  `text` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likePoint` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `customerID` (`customerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Коментарии' AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `customer_comment`
--

INSERT INTO `customer_comment` (`id`, `customerID`, `text`, `date`, `likePoint`) VALUES
(2, 2, 'Комментик', '2017-10-10 09:01:40', 0),
(4, 2, 'efkdpfksdofsf', '2017-10-10 09:06:17', 0),
(5, 2, 'Мероприятие невиданного охвата и с колоссальной идеей. Для меня честь и удовольствие работать с такой замечательной и очень молодой командой. То, что мы сделали за эти несколько месяцев, — это настоящий подвиг. Коля , Мари , спасибо вам, что привлекли. Работать в коллективе людей, для которых нет невыполнимых задач, - это самый лучший опыт.', '2017-10-10 09:09:03', 0),
(6, 2, 'Прямо сейчас трансляция Comic Con в San Diego! В 1080, между прочим, Marvel мочат) Ну-ка, покажите нам Quicksilver ^____^', '2017-10-10 09:09:53', 0),
(7, 2, 'CIcke', '2017-12-07 15:10:53', 0),
(8, 2, 'sdsadsadasda', '2017-12-07 15:11:19', 0),
(9, 1, 'dsadsadasd', '2017-12-07 15:11:56', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `customer_comment_answer`
--

CREATE TABLE IF NOT EXISTS `customer_comment_answer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `commentID` int(10) unsigned NOT NULL,
  `customerID` int(10) unsigned NOT NULL,
  `text` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `likePoint` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `commentID` (`commentID`),
  KEY `customerID` (`customerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Ответы на Коментарии' AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `customer_comment_answer`
--

INSERT INTO `customer_comment_answer` (`id`, `commentID`, `customerID`, `text`, `date`, `likePoint`) VALUES
(1, 4, 2, 'бла-бла', '2017-10-10 09:53:11', 0),
(2, 4, 2, 'ебучий хер!', '2017-10-10 09:56:30', 0),
(3, 5, 2, 'Бальной ублюдок', '2017-10-10 09:56:59', 0),
(4, 5, 2, 'Бальной ублюдок', '2017-10-10 10:01:15', 0),
(5, 5, 2, 'Бальной ублюдок', '2017-10-10 10:05:55', 0),
(6, 2, 2, '', '2017-10-10 11:33:19', 0),
(7, 2, 2, '', '2017-10-10 11:34:21', 0),
(8, 2, 2, '', '2017-10-10 11:34:27', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `customer_comment_image`
--

CREATE TABLE IF NOT EXISTS `customer_comment_image` (
  `commentID` int(10) unsigned NOT NULL,
  `imageID` int(10) unsigned NOT NULL,
  KEY `commentID` (`commentID`),
  KEY `imageID` (`imageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customer_comment_image`
--

INSERT INTO `customer_comment_image` (`commentID`, `imageID`) VALUES
(4, 1),
(5, 2),
(7, 3),
(8, 4),
(9, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `customer_friend`
--

CREATE TABLE IF NOT EXISTS `customer_friend` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customerID` int(10) unsigned NOT NULL,
  `friendID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customerID` (`customerID`),
  KEY `friendID` (`friendID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `customer_image`
--

CREATE TABLE IF NOT EXISTS `customer_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerID` int(10) unsigned NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `isMain` tinyint(1) NOT NULL DEFAULT '0',
  `likePoint` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customerID` (`customerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Картинки пользователей' AUTO_INCREMENT=37 ;

--
-- Дамп данных таблицы `customer_image`
--

INSERT INTO `customer_image` (`id`, `customerID`, `file`, `isMain`, `likePoint`, `date`) VALUES
(27, 2, '27b06d68793d9de1b9a9474865e87af9.jpg', 1, 1, '2017-10-09 08:57:11'),
(28, 1, '66fc0e2cad15520b60da4ff4e1aa8303.jpg', 1, 0, '2017-10-11 07:36:18'),
(29, 2, '51a3218ff934eeb9559f4e957ac5bc60.jpg', 0, 0, '2017-10-27 09:45:40'),
(30, 2, 'afacdb0a401ccdf6b48551bbc00e8a74.jpg', 0, 0, '2017-10-27 09:46:34'),
(31, 2, 'a43683d33b40f413228d54e3c6ed4a2f.jpg', 0, 0, '2017-10-27 09:46:52'),
(32, 2, '437175ba4191210ee004e1d937494d09.png', 0, 0, '2017-10-27 09:47:09'),
(33, 2, 'd9f9133fb120cd6096870bc2b496805b.png', 0, 0, '2017-10-27 09:47:28'),
(34, 2, '66fc0e2cad15520b60da4ff4e1aa8303.jpg', 0, 0, '2017-12-06 10:29:25'),
(35, 2, 'eccbc87e4b5ce2fe28308fd9f2a7baf3.jpg', 0, 0, '2017-12-06 10:29:43'),
(36, 2, 'c4ca4238a0b923820dcc509a6f75849b.jpg', 0, 0, '2017-12-06 10:30:16');

-- --------------------------------------------------------

--
-- Структура таблицы `customer_image_comment`
--

CREATE TABLE IF NOT EXISTS `customer_image_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imageID` int(10) unsigned NOT NULL COMMENT 'Фотография',
  `text` text COMMENT 'Текст',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата',
  `likePoint` int(11) NOT NULL DEFAULT '0' COMMENT 'Лайков',
  `customerID` int(10) unsigned NOT NULL COMMENT 'Пользователь',
  PRIMARY KEY (`id`),
  KEY `imageID` (`imageID`),
  KEY `customerID` (`customerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Комментарии к фотографиям пользователей' AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `customer_image_comment`
--

INSERT INTO `customer_image_comment` (`id`, `imageID`, `text`, `date`, `likePoint`, `customerID`) VALUES
(1, 27, 'Cyka', '2017-10-27 12:02:20', 0, 2),
(2, 27, 'Cyka', '2017-10-27 12:08:34', 0, 2),
(3, 27, 'Cyka', '2017-10-27 12:08:45', 0, 2),
(4, 27, 'Балда сука', '2017-10-27 12:08:59', 0, 2),
(5, 27, 'jkjkjkjkjk', '2017-10-27 12:21:42', 0, 2),
(6, 27, 'jkjkjkjkjk', '2017-10-27 12:24:12', 0, 2),
(7, 29, 'Ебуэ ты гандон :)', '2017-10-27 12:46:04', 0, 2),
(8, 29, 'Ебуэ ты гандон :)', '2017-10-27 12:46:36', 0, 2),
(9, 29, 'Ебуэ ты гандон :)', '2017-10-27 12:46:46', 0, 2),
(10, 29, 'Ебуэ ты гандон :)', '2017-10-27 12:46:54', 0, 2),
(11, 29, 'Ебуэ ты гандон :)', '2017-10-27 12:47:10', 0, 2),
(12, 29, 'Ебуэ ты гандон :)', '2017-10-27 12:47:29', 0, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `customer_interests`
--

CREATE TABLE IF NOT EXISTS `customer_interests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerID` int(10) unsigned NOT NULL,
  `interestID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customerID` (`customerID`),
  KEY `interestID` (`interestID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Интересы пользователей' AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `customer_interests`
--

INSERT INTO `customer_interests` (`id`, `customerID`, `interestID`) VALUES
(1, 2, 2),
(2, 2, 3),
(3, 1, 6),
(4, 1, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `customer_languages`
--

CREATE TABLE IF NOT EXISTS `customer_languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerID` int(10) unsigned NOT NULL,
  `languageID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customerID` (`customerID`),
  KEY `languageID` (`languageID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `customer_languages`
--

INSERT INTO `customer_languages` (`id`, `customerID`, `languageID`) VALUES
(1, 2, 2),
(2, 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `infopage`
--

CREATE TABLE IF NOT EXISTS `infopage` (
  `id` int(10) unsigned NOT NULL,
  `code` varchar(45) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `createTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `infopage`
--

INSERT INTO `infopage` (`id`, `code`, `title`, `content`, `createTime`, `updateTime`) VALUES
(0, 'about', 'О нас', '<p>1</p>', '2017-11-28 14:32:23', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `interest`
--

CREATE TABLE IF NOT EXISTS `interest` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoryID` int(10) unsigned NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categoryID` (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Интересы' AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `interest`
--

INSERT INTO `interest` (`id`, `categoryID`, `sort`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 1),
(6, 2, 1),
(7, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `interest_category`
--

CREATE TABLE IF NOT EXISTS `interest_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Категории интересов' AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `interest_category`
--

INSERT INTO `interest_category` (`id`, `sort`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, NULL),
(5, NULL),
(6, NULL),
(7, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `interest_category_translation`
--

CREATE TABLE IF NOT EXISTS `interest_category_translation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sourceID` int(10) unsigned NOT NULL,
  `language` varchar(5) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sourceID` (`sourceID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Переводы категорий интересов' AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `interest_category_translation`
--

INSERT INTO `interest_category_translation` (`id`, `sourceID`, `language`, `name`) VALUES
(1, 1, 'ru', 'Спорт'),
(2, 2, 'ru', 'Путешествие'),
(3, 3, 'ru', 'Работа, бизнес'),
(4, 4, 'ru', 'Знакомства'),
(5, 5, 'ru', 'Прогулка'),
(6, 6, 'ru', 'Игры'),
(7, 7, 'ru', 'Обучение');

-- --------------------------------------------------------

--
-- Структура таблицы `interest_translation`
--

CREATE TABLE IF NOT EXISTS `interest_translation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sourceID` int(10) unsigned NOT NULL,
  `language` varchar(5) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sourceID` (`sourceID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Переводы интересов' AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `interest_translation`
--

INSERT INTO `interest_translation` (`id`, `sourceID`, `language`, `name`) VALUES
(1, 1, 'ru', 'Скалолазание'),
(2, 2, 'ru', 'Волейбол'),
(3, 3, 'ru', 'Футбол'),
(4, 4, 'ru', 'Бокс'),
(5, 5, 'ru', 'Рыбалка'),
(6, 6, 'ru', 'За границу'),
(7, 7, 'ru', 'По России');

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(5) DEFAULT NULL,
  `system` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Отображать как системный',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Языки' AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`id`, `code`, `system`) VALUES
(1, 'ru', 1),
(2, 'en', 1),
(3, 'de', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `languages_translation`
--

CREATE TABLE IF NOT EXISTS `languages_translation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sourceID` int(10) unsigned NOT NULL,
  `language` varchar(5) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sourceID` (`sourceID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Переводы языков' AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `languages_translation`
--

INSERT INTO `languages_translation` (`id`, `sourceID`, `language`, `name`) VALUES
(1, 1, 'ru', 'Русский'),
(2, 1, 'en', 'Russian'),
(3, 2, 'ru', 'Английский'),
(4, 3, 'ru', 'Немецкий');

-- --------------------------------------------------------

--
-- Структура таблицы `main_i18n`
--

CREATE TABLE IF NOT EXISTS `main_i18n` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(32) NOT NULL COMMENT 'Название категории перевода.',
  PRIMARY KEY (`id`),
  KEY `INDEXCategory` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Главная таблица переводов интерфейса.' AUTO_INCREMENT=331 ;

--
-- Дамп данных таблицы `main_i18n`
--

INSERT INTO `main_i18n` (`id`, `category`) VALUES
(144, 'app'),
(145, 'app'),
(146, 'app'),
(147, 'app'),
(148, 'app'),
(149, 'app'),
(150, 'app'),
(151, 'app'),
(152, 'app'),
(153, 'app'),
(154, 'app'),
(155, 'app'),
(156, 'app'),
(157, 'app'),
(158, 'app'),
(159, 'app'),
(160, 'app'),
(161, 'app'),
(162, 'app'),
(163, 'app'),
(164, 'app'),
(165, 'app'),
(166, 'app'),
(167, 'app'),
(168, 'app'),
(169, 'app'),
(170, 'app'),
(171, 'app'),
(172, 'app'),
(173, 'app'),
(174, 'app'),
(175, 'app'),
(176, 'app'),
(177, 'app'),
(178, 'app'),
(179, 'app'),
(180, 'app'),
(181, 'app'),
(182, 'app'),
(183, 'app'),
(184, 'app'),
(185, 'app'),
(186, 'app'),
(187, 'app'),
(188, 'app'),
(189, 'app'),
(190, 'app'),
(191, 'app'),
(192, 'app'),
(193, 'app'),
(194, 'app'),
(195, 'app'),
(196, 'app'),
(197, 'app'),
(198, 'app'),
(199, 'app'),
(200, 'app'),
(201, 'app'),
(202, 'app'),
(203, 'app'),
(204, 'app'),
(205, 'app'),
(206, 'app'),
(207, 'app'),
(208, 'app'),
(209, 'app'),
(210, 'app'),
(211, 'app'),
(212, 'app'),
(213, 'app'),
(214, 'app'),
(215, 'app'),
(216, 'app'),
(217, 'app'),
(218, 'app'),
(219, 'app'),
(220, 'app'),
(221, 'app'),
(222, 'app'),
(223, 'app'),
(224, 'app'),
(225, 'app'),
(226, 'app'),
(227, 'app'),
(228, 'app'),
(229, 'app'),
(230, 'app'),
(231, 'app'),
(232, 'app'),
(233, 'app'),
(234, 'app'),
(235, 'app'),
(236, 'app'),
(237, 'app'),
(238, 'app'),
(239, 'app'),
(240, 'app'),
(241, 'app'),
(242, 'app'),
(243, 'app'),
(244, 'app'),
(245, 'app'),
(246, 'app'),
(247, 'app'),
(248, 'app'),
(249, 'app'),
(250, 'app'),
(251, 'app'),
(252, 'app'),
(253, 'app'),
(254, 'app'),
(255, 'app'),
(256, 'app'),
(257, 'app'),
(258, 'app'),
(259, 'app'),
(260, 'app'),
(261, 'app'),
(262, 'app'),
(263, 'app'),
(264, 'app'),
(265, 'app'),
(266, 'app'),
(267, 'app'),
(268, 'app'),
(269, 'app'),
(270, 'app'),
(271, 'app'),
(272, 'app'),
(273, 'app'),
(274, 'app'),
(275, 'app'),
(276, 'app'),
(277, 'app'),
(278, 'app'),
(279, 'app'),
(280, 'app'),
(281, 'app'),
(282, 'app'),
(283, 'app'),
(284, 'app'),
(285, 'app'),
(286, 'app'),
(287, 'app'),
(288, 'app'),
(289, 'app'),
(290, 'app'),
(291, 'app'),
(292, 'app'),
(293, 'app'),
(294, 'app'),
(295, 'app'),
(296, 'app'),
(297, 'app'),
(298, 'app'),
(299, 'app'),
(300, 'app'),
(301, 'app'),
(302, 'app'),
(303, 'app'),
(304, 'app'),
(305, 'app'),
(306, 'app'),
(307, 'app'),
(308, 'app'),
(309, 'app'),
(310, 'app'),
(311, 'app'),
(312, 'app'),
(313, 'app'),
(314, 'app'),
(315, 'app'),
(316, 'app'),
(317, 'app'),
(318, 'app'),
(319, 'app'),
(320, 'app'),
(321, 'app'),
(322, 'app'),
(323, 'app'),
(324, 'app'),
(325, 'app'),
(326, 'app'),
(327, 'app'),
(328, 'app'),
(329, 'app'),
(330, 'app');

-- --------------------------------------------------------

--
-- Структура таблицы `main_i18n_translation`
--

CREATE TABLE IF NOT EXISTS `main_i18n_translation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sourceId` int(10) unsigned NOT NULL COMMENT 'Ссылка на исходник.',
  `language` varchar(5) DEFAULT NULL COMMENT 'Название языка.',
  `message` text CHARACTER SET utf8 COLLATE utf8_bin COMMENT 'Текст перевода.',
  PRIMARY KEY (`id`),
  KEY `FKI18nTranslationToI18n` (`sourceId`),
  KEY `INDEXLanguage` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Переводы интерфейса.' AUTO_INCREMENT=562 ;

--
-- Дамп данных таблицы `main_i18n_translation`
--

INSERT INTO `main_i18n_translation` (`id`, `sourceId`, `language`, `message`) VALUES
(1, 144, 'ru', 'Значение присудствует в регистре:'),
(2, 144, 'en', 'Значение присудствует в регистре:'),
(3, 144, 'fr', 'Значение присудствует в регистре:'),
(4, 145, 'ru', 'ID'),
(5, 145, 'en', 'ID'),
(6, 145, 'fr', 'ID'),
(7, 146, 'ru', 'Пользователь'),
(8, 146, 'en', 'Пользователь'),
(9, 146, 'fr', 'Пользователь'),
(10, 147, 'ru', 'Заголовок'),
(11, 147, 'en', 'Заголовок'),
(12, 147, 'fr', 'Заголовок'),
(13, 148, 'ru', 'Мои данные'),
(14, 148, 'en', 'Мои данные'),
(15, 148, 'fr', 'Мои данные'),
(16, 149, 'ru', 'Интересы'),
(17, 149, 'en', 'Интересы'),
(18, 149, 'fr', 'Интересы'),
(19, 150, 'ru', 'Расположение'),
(20, 150, 'en', 'Расположение'),
(21, 150, 'fr', 'Расположение'),
(22, 151, 'ru', 'С кем'),
(23, 151, 'en', 'С кем'),
(24, 151, 'fr', 'С кем'),
(25, 152, 'ru', 'Когда'),
(26, 152, 'en', 'Когда'),
(27, 152, 'fr', 'Когда'),
(28, 153, 'ru', 'Текст объявления'),
(29, 153, 'en', 'Текст объявления'),
(30, 153, 'fr', 'Текст объявления'),
(31, 154, 'ru', 'Создан'),
(32, 154, 'en', 'Создан'),
(33, 154, 'fr', 'Создан'),
(34, 155, 'ru', 'Сортировка'),
(35, 155, 'en', 'Сортировка'),
(36, 155, 'fr', 'Сортировка'),
(37, 156, 'ru', 'Просмотры'),
(38, 156, 'en', 'Просмотры'),
(39, 156, 'fr', 'Просмотры'),
(40, 157, 'ru', 'Активен'),
(41, 157, 'en', 'Активен'),
(42, 157, 'fr', 'Активен'),
(43, 158, 'ru', 'Ads ID'),
(44, 158, 'en', 'Ads ID'),
(45, 158, 'fr', 'Ads ID'),
(46, 159, 'ru', 'Interest ID'),
(47, 159, 'en', 'Interest ID'),
(48, 159, 'fr', 'Interest ID'),
(49, 160, 'ru', 'Парольдолжен быть от 6 до 16 символов'),
(50, 160, 'en', 'Парольдолжен быть от 6 до 16 символов'),
(51, 160, 'fr', 'Парольдолжен быть от 6 до 16 символов'),
(52, 161, 'ru', 'Старый пароль'),
(53, 161, 'en', 'Старый пароль'),
(54, 161, 'fr', 'Старый пароль'),
(55, 162, 'ru', 'Новый пароль'),
(56, 162, 'en', 'Новый пароль'),
(57, 162, 'fr', 'Новый пароль'),
(58, 163, 'ru', 'Еще раз'),
(59, 163, 'en', 'Еще раз'),
(60, 163, 'fr', 'Еще раз'),
(61, 164, 'ru', 'Не верный пароль!'),
(62, 164, 'en', 'Не верный пароль!'),
(63, 164, 'fr', 'Не верный пароль!'),
(64, 165, 'ru', 'File'),
(65, 165, 'en', 'File'),
(66, 165, 'fr', 'File'),
(67, 166, 'ru', 'Date'),
(68, 166, 'en', 'Date'),
(69, 166, 'fr', 'Date'),
(70, 167, 'ru', 'Customer ID'),
(71, 167, 'en', 'Customer ID'),
(72, 167, 'fr', 'Customer ID'),
(73, 168, 'ru', 'Text'),
(74, 168, 'en', 'Text'),
(75, 168, 'fr', 'Text'),
(76, 169, 'ru', 'Like Point'),
(77, 169, 'en', 'Like Point'),
(78, 169, 'fr', 'Like Point'),
(79, 170, 'ru', 'Comment ID'),
(80, 170, 'en', 'Comment ID'),
(81, 170, 'fr', 'Comment ID'),
(82, 171, 'ru', 'Image ID'),
(83, 171, 'en', 'Image ID'),
(84, 171, 'fr', 'Image ID'),
(85, 172, 'ru', 'isMain'),
(86, 172, 'en', 'isMain'),
(87, 172, 'fr', 'isMain'),
(88, 173, 'ru', 'Language ID'),
(89, 173, 'en', 'Language ID'),
(90, 173, 'fr', 'Language ID'),
(91, 174, 'ru', 'Category'),
(92, 174, 'en', 'Category'),
(93, 174, 'fr', 'Category'),
(94, 175, 'ru', 'Source ID'),
(95, 175, 'en', 'Source ID'),
(96, 175, 'fr', 'Source ID'),
(97, 176, 'ru', 'Language'),
(98, 176, 'en', 'Language'),
(99, 176, 'fr', 'Language'),
(100, 177, 'ru', 'Message'),
(101, 177, 'en', 'Message'),
(102, 177, 'fr', 'Message'),
(103, 178, 'ru', 'Категория'),
(104, 178, 'en', 'Категория'),
(105, 178, 'fr', 'Категория'),
(106, 179, 'ru', 'Язык'),
(107, 179, 'en', 'Язык'),
(108, 179, 'fr', 'Язык'),
(109, 180, 'ru', 'Натменование'),
(110, 180, 'en', 'Натменование'),
(111, 180, 'fr', 'Натменование'),
(112, 181, 'ru', 'Интерес'),
(113, 181, 'en', 'Интерес'),
(114, 181, 'fr', 'Интерес'),
(115, 182, 'ru', 'Наименование'),
(116, 182, 'en', 'Наименование'),
(117, 182, 'fr', 'Наименование'),
(118, 183, 'ru', 'Код'),
(119, 183, 'en', 'Код'),
(120, 183, 'fr', 'Код'),
(121, 184, 'ru', 'Отображать как системный'),
(122, 184, 'en', 'Отображать как системный'),
(123, 184, 'fr', 'Отображать как системный'),
(124, 185, 'ru', 'Sender ID'),
(125, 185, 'en', 'Sender ID'),
(126, 185, 'fr', 'Sender ID'),
(127, 186, 'ru', 'Receiver ID'),
(128, 186, 'en', 'Receiver ID'),
(129, 186, 'fr', 'Receiver ID'),
(130, 187, 'ru', 'Flag'),
(131, 187, 'en', 'Flag'),
(132, 187, 'fr', 'Flag'),
(133, 188, 'ru', 'Имя должно быть от 2 до 16 символов'),
(134, 188, 'en', 'Имя должно быть от 2 до 16 символов'),
(135, 188, 'fr', 'Имя должно быть от 2 до 16 символов'),
(136, 189, 'ru', 'Дата рождения'),
(137, 189, 'en', 'Дата рождения'),
(138, 189, 'fr', 'Дата рождения'),
(139, 190, 'ru', 'Январь'),
(140, 190, 'en', 'Январь'),
(141, 190, 'fr', 'Январь'),
(142, 191, 'ru', 'Февраль'),
(143, 191, 'en', 'Февраль'),
(144, 191, 'fr', 'Февраль'),
(145, 192, 'ru', 'Март'),
(146, 192, 'en', 'Март'),
(147, 192, 'fr', 'Март'),
(148, 193, 'ru', 'Апрель'),
(149, 193, 'en', 'Апрель'),
(150, 193, 'fr', 'Апрель'),
(151, 194, 'ru', 'Май'),
(152, 194, 'en', 'Май'),
(153, 194, 'fr', 'Май'),
(154, 195, 'ru', 'Июнь'),
(155, 195, 'en', 'Июнь'),
(156, 195, 'fr', 'Июнь'),
(157, 196, 'ru', 'Июль'),
(158, 196, 'en', 'Июль'),
(159, 196, 'fr', 'Июль'),
(160, 197, 'ru', 'Август'),
(161, 197, 'en', 'Август'),
(162, 197, 'fr', 'Август'),
(163, 198, 'ru', 'Сентябрь'),
(164, 198, 'en', 'Сентябрь'),
(165, 198, 'fr', 'Сентябрь'),
(166, 199, 'ru', 'Октябрь'),
(167, 199, 'en', 'Октябрь'),
(168, 199, 'fr', 'Октябрь'),
(169, 200, 'ru', 'Ноябрь'),
(170, 200, 'en', 'Ноябрь'),
(171, 200, 'fr', 'Ноябрь'),
(172, 201, 'ru', 'Декабрь'),
(173, 201, 'en', 'Декабрь'),
(174, 201, 'fr', 'Декабрь'),
(175, 202, 'ru', 'Create Interest'),
(176, 202, 'en', 'Create Interest'),
(177, 202, 'fr', 'Create Interest'),
(178, 203, 'ru', 'Interests'),
(179, 203, 'en', 'Interests'),
(180, 203, 'fr', 'Interests'),
(181, 204, 'ru', 'Update {modelClass}: '),
(182, 204, 'en', 'Update {modelClass}: '),
(183, 204, 'fr', 'Update {modelClass}: '),
(184, 205, 'ru', 'Update'),
(185, 205, 'en', 'Update'),
(186, 205, 'fr', 'Update'),
(187, 206, 'ru', 'Delete'),
(188, 206, 'en', 'Delete'),
(189, 206, 'fr', 'Delete'),
(190, 207, 'ru', 'Are you sure you want to delete this item?'),
(191, 207, 'en', 'Are you sure you want to delete this item?'),
(192, 207, 'fr', 'Are you sure you want to delete this item?'),
(193, 208, 'ru', 'Create'),
(194, 208, 'en', 'Create'),
(195, 208, 'fr', 'Create'),
(196, 209, 'ru', 'Search'),
(197, 209, 'en', 'Search'),
(198, 209, 'fr', 'Search'),
(199, 210, 'ru', 'Reset'),
(200, 210, 'en', 'Reset'),
(201, 210, 'fr', 'Reset'),
(202, 211, 'ru', 'Create Interest Category'),
(203, 211, 'en', 'Create Interest Category'),
(204, 211, 'fr', 'Create Interest Category'),
(205, 212, 'ru', 'Interest Categories'),
(206, 212, 'en', 'Interest Categories'),
(207, 212, 'fr', 'Interest Categories'),
(208, 213, 'ru', 'Create Interest Category Translation'),
(209, 213, 'en', 'Create Interest Category Translation'),
(210, 213, 'fr', 'Create Interest Category Translation'),
(211, 214, 'ru', 'Interest Category Translations'),
(212, 214, 'en', 'Interest Category Translations'),
(213, 214, 'fr', 'Interest Category Translations'),
(214, 215, 'ru', 'Create Interest Translation'),
(215, 215, 'en', 'Create Interest Translation'),
(216, 215, 'fr', 'Create Interest Translation'),
(217, 216, 'ru', 'Interest Translations'),
(218, 216, 'en', 'Interest Translations'),
(219, 216, 'fr', 'Interest Translations'),
(220, 217, 'ru', 'Create I18n Translation'),
(221, 217, 'en', 'Create I18n Translation'),
(222, 217, 'fr', 'Create I18n Translation'),
(223, 218, 'ru', 'I18n Translations'),
(224, 218, 'en', 'I18n Translations'),
(225, 218, 'fr', 'I18n Translations'),
(226, 219, 'ru', 'Мои объявления'),
(227, 219, 'en', 'Мои объявления'),
(228, 219, 'fr', 'Мои объявления'),
(229, 220, 'ru', 'Создать новое'),
(230, 220, 'en', 'Создать новое'),
(231, 220, 'fr', 'Создать новое'),
(232, 221, 'ru', 'Активные объявления'),
(233, 221, 'en', 'Активные объявления'),
(234, 221, 'fr', 'Активные объявления'),
(235, 222, 'ru', 'Поднять на 1 место'),
(236, 222, 'en', 'Поднять на 1 место'),
(237, 222, 'fr', 'Поднять на 1 место'),
(238, 223, 'ru', 'Снять с публикации'),
(239, 223, 'en', 'Снять с публикации'),
(240, 223, 'fr', 'Снять с публикации'),
(241, 224, 'ru', 'Объявление на'),
(242, 224, 'en', 'Объявление на'),
(243, 224, 'fr', 'Объявление на'),
(244, 225, 'ru', 'месте в категории'),
(245, 225, 'en', 'месте в категории'),
(246, 225, 'fr', 'месте в категории'),
(247, 226, 'ru', 'Редактировать'),
(248, 226, 'en', 'Редактировать'),
(249, 226, 'fr', 'Редактировать'),
(250, 227, 'ru', 'Поднятие объявления на 1 место'),
(251, 227, 'en', 'Поднятие объявления на 1 место'),
(252, 227, 'fr', 'Поднятие объявления на 1 место'),
(253, 228, 'ru', 'Стоимость'),
(254, 228, 'en', 'Стоимость'),
(255, 228, 'fr', 'Стоимость'),
(256, 229, 'ru', 'Способ оплаты'),
(257, 229, 'en', 'Способ оплаты'),
(258, 229, 'fr', 'Способ оплаты'),
(259, 230, 'ru', 'Создано'),
(260, 230, 'en', 'Создано'),
(261, 230, 'fr', 'Создано'),
(262, 231, 'ru', 'Просмотров'),
(263, 231, 'en', 'Просмотров'),
(264, 231, 'fr', 'Просмотров'),
(265, 232, 'ru', 'Объявления в архиве'),
(266, 232, 'en', 'Объявления в архиве'),
(267, 232, 'fr', 'Объявления в архиве'),
(268, 233, 'ru', 'Опубликовать'),
(269, 233, 'en', 'Опубликовать'),
(270, 233, 'fr', 'Опубликовать'),
(271, 234, 'ru', 'Добавлено'),
(272, 234, 'en', 'Добавлено'),
(273, 234, 'fr', 'Добавлено'),
(274, 235, 'ru', 'Все готово'),
(275, 235, 'en', 'Все готово'),
(276, 235, 'fr', 'Все готово'),
(277, 236, 'ru', 'Расскажите о своем объявлении'),
(278, 236, 'en', 'Расскажите о своем объявлении'),
(279, 236, 'fr', 'Расскажите о своем объявлении'),
(280, 237, 'ru', 'Мои предпочтения'),
(281, 237, 'en', 'Мои предпочтения'),
(282, 237, 'fr', 'Мои предпочтения'),
(283, 238, 'ru', 'Город'),
(284, 238, 'en', 'Город'),
(285, 238, 'fr', 'Город'),
(286, 239, 'ru', 'Не важно'),
(287, 239, 'en', 'Не важно'),
(288, 239, 'fr', 'Не важно'),
(289, 240, 'ru', 'Пол'),
(290, 240, 'en', 'Пол'),
(291, 240, 'fr', 'Пол'),
(292, 241, 'ru', 'Дата встречи'),
(293, 241, 'en', 'Дата встречи'),
(294, 241, 'fr', 'Дата встречи'),
(295, 242, 'ru', 'Смотреть профиль'),
(296, 242, 'en', 'Смотреть профиль'),
(297, 242, 'fr', 'Смотреть профиль'),
(298, 243, 'ru', 'Ваш комментарий'),
(299, 243, 'en', 'Ваш комментарий'),
(300, 243, 'fr', 'Ваш комментарий'),
(301, 244, 'ru', 'Отправить'),
(302, 244, 'en', 'Отправить'),
(303, 244, 'fr', 'Отправить'),
(304, 245, 'ru', 'Запись со стены'),
(305, 245, 'en', 'Запись со стены'),
(306, 245, 'fr', 'Запись со стены'),
(307, 246, 'ru', 'Нравится'),
(308, 246, 'en', 'Нравится'),
(309, 246, 'fr', 'Нравится'),
(310, 247, 'ru', 'Это спам'),
(311, 247, 'en', 'Это спам'),
(312, 247, 'fr', 'Это спам'),
(313, 248, 'ru', 'Удалить'),
(314, 248, 'en', 'Удалить'),
(315, 248, 'fr', 'Удалить'),
(316, 249, 'ru', 'Ответить'),
(317, 249, 'en', 'Ответить'),
(318, 249, 'fr', 'Ответить'),
(319, 250, 'ru', 'Загрузить еще'),
(320, 250, 'en', 'Загрузить еще'),
(321, 250, 'fr', 'Загрузить еще'),
(322, 251, 'ru', 'Моя страница'),
(323, 251, 'en', 'Моя страница'),
(324, 251, 'fr', 'Моя страница'),
(325, 252, 'ru', 'Мои сообщения'),
(326, 252, 'en', 'Мои сообщения'),
(327, 252, 'fr', 'Мои сообщения'),
(328, 253, 'ru', 'Мои друзья'),
(329, 253, 'en', 'Мои друзья'),
(330, 253, 'fr', 'Мои друзья'),
(331, 254, 'ru', 'Мои компании'),
(332, 254, 'en', 'Мои компании'),
(333, 254, 'fr', 'Мои компании'),
(334, 255, 'ru', 'Мои фотографии'),
(335, 255, 'en', 'Мои фотографии'),
(336, 255, 'fr', 'Мои фотографии'),
(337, 256, 'ru', 'Мои видеозаписи'),
(338, 256, 'en', 'Мои видеозаписи'),
(339, 256, 'fr', 'Мои видеозаписи'),
(340, 257, 'ru', 'Мои настройки'),
(341, 257, 'en', 'Мои настройки'),
(342, 257, 'fr', 'Мои настройки'),
(343, 258, 'ru', 'Новое объявление'),
(344, 258, 'en', 'Новое объявление'),
(345, 258, 'fr', 'Новое объявление'),
(346, 259, 'ru', 'Популярные цели'),
(347, 259, 'en', 'Популярные цели'),
(348, 259, 'fr', 'Популярные цели'),
(349, 260, 'ru', 'Нет подходящей цели'),
(350, 260, 'en', 'Нет подходящей цели'),
(351, 260, 'fr', 'Нет подходящей цели'),
(352, 261, 'ru', 'Добавьте свою'),
(353, 261, 'en', 'Добавьте свою'),
(354, 261, 'fr', 'Добавьте свою'),
(355, 262, 'ru', 'В моем городе'),
(356, 262, 'en', 'В моем городе'),
(357, 262, 'fr', 'В моем городе'),
(358, 263, 'ru', 'Точная дата'),
(359, 263, 'en', 'Точная дата'),
(360, 263, 'fr', 'Точная дата'),
(361, 264, 'ru', 'Выбрать дату'),
(362, 264, 'en', 'Выбрать дату'),
(363, 264, 'fr', 'Выбрать дату'),
(364, 265, 'ru', 'Решим вместе'),
(365, 265, 'en', 'Решим вместе'),
(366, 265, 'fr', 'Решим вместе'),
(367, 266, 'ru', 'Введите текст объявления'),
(368, 266, 'en', 'Введите текст объявления'),
(369, 266, 'fr', 'Введите текст объявления'),
(370, 267, 'ru', 'В контакты'),
(371, 267, 'en', 'В контакты'),
(372, 267, 'fr', 'В контакты'),
(373, 268, 'ru', 'Сохранить'),
(374, 268, 'en', 'Сохранить'),
(375, 268, 'fr', 'Сохранить'),
(376, 269, 'ru', 'Страна'),
(377, 269, 'en', 'Страна'),
(378, 269, 'fr', 'Страна'),
(379, 270, 'ru', 'Языки'),
(380, 270, 'en', 'Языки'),
(381, 270, 'fr', 'Языки'),
(382, 271, 'ru', 'День рождения'),
(383, 271, 'en', 'День рождения'),
(384, 271, 'fr', 'День рождения'),
(385, 272, 'ru', 'лет'),
(386, 272, 'en', 'лет'),
(387, 272, 'fr', 'лет'),
(388, 273, 'ru', 'О себе'),
(389, 273, 'en', 'О себе'),
(390, 273, 'fr', 'О себе'),
(391, 274, 'ru', 'Изменить описание'),
(392, 274, 'en', 'Изменить описание'),
(393, 274, 'fr', 'Изменить описание'),
(394, 275, 'ru', 'Мой аватар'),
(395, 275, 'en', 'Мой аватар'),
(396, 275, 'fr', 'Мой аватар'),
(397, 276, 'ru', 'Поиск по сообщениям'),
(398, 276, 'en', 'Поиск по сообщениям'),
(399, 276, 'fr', 'Поиск по сообщениям'),
(400, 277, 'ru', 'За период'),
(401, 277, 'en', 'За период'),
(402, 277, 'fr', 'За период'),
(403, 278, 'ru', 'Все'),
(404, 278, 'en', 'Все'),
(405, 278, 'fr', 'Все'),
(406, 279, 'ru', 'От меня'),
(407, 279, 'en', 'От меня'),
(408, 279, 'fr', 'От меня'),
(409, 280, 'ru', 'Мне'),
(410, 280, 'en', 'Мне'),
(411, 280, 'fr', 'Мне'),
(412, 281, 'ru', 'Загрузить фото'),
(413, 281, 'en', 'Загрузить фото'),
(414, 281, 'fr', 'Загрузить фото'),
(415, 282, 'ru', 'Показать 10 комментариев'),
(416, 282, 'en', 'Показать 10 комментариев'),
(417, 282, 'fr', 'Показать 10 комментариев'),
(418, 283, 'ru', 'Заблокировать пользователя'),
(419, 283, 'en', 'Заблокировать пользователя'),
(420, 283, 'fr', 'Заблокировать пользователя'),
(421, 284, 'ru', 'Удалить комментарий'),
(422, 284, 'en', 'Удалить комментарий'),
(423, 284, 'fr', 'Удалить комментарий'),
(424, 285, 'ru', 'Общие'),
(425, 285, 'en', 'Общие'),
(426, 285, 'fr', 'Общие'),
(427, 286, 'ru', 'Приватность'),
(428, 286, 'en', 'Приватность'),
(429, 286, 'fr', 'Приватность'),
(430, 287, 'ru', 'Безопасность'),
(431, 287, 'en', 'Безопасность'),
(432, 287, 'fr', 'Безопасность'),
(433, 288, 'ru', 'Платежи'),
(434, 288, 'en', 'Платежи'),
(435, 288, 'fr', 'Платежи'),
(436, 289, 'ru', 'Изменить пароль'),
(437, 289, 'en', 'Изменить пароль'),
(438, 289, 'fr', 'Изменить пароль'),
(439, 290, 'ru', 'Пароль успешно изменен'),
(440, 290, 'en', 'Пароль успешно изменен'),
(441, 290, 'fr', 'Пароль успешно изменен'),
(442, 291, 'ru', 'Вы можете удалить свой профиль'),
(443, 291, 'en', 'Вы можете удалить свой профиль'),
(444, 291, 'fr', 'Вы можете удалить свой профиль'),
(445, 292, 'ru', 'здесь'),
(446, 292, 'en', 'здесь'),
(447, 292, 'fr', 'здесь'),
(448, 293, 'ru', 'Удаление профиля'),
(449, 293, 'en', 'Удаление профиля'),
(450, 293, 'fr', 'Удаление профиля'),
(451, 294, 'ru', 'Пожалуйста, укажите причину, по которой вы хотите удалить свой профиль'),
(452, 294, 'en', 'Пожалуйста, укажите причину, по которой вы хотите удалить свой профиль'),
(453, 294, 'fr', 'Пожалуйста, укажите причину, по которой вы хотите удалить свой профиль'),
(454, 295, 'ru', 'Надоело всё, хочу повесится'),
(455, 295, 'en', 'Надоело всё, хочу повесится'),
(456, 295, 'fr', 'Надоело всё, хочу повесится'),
(457, 296, 'ru', 'Жена бросила сын пидарас'),
(458, 296, 'en', 'Жена бросила сын пидарас'),
(459, 296, 'fr', 'Жена бросила сын пидарас'),
(460, 297, 'ru', 'С работы уволили, ипотека и автокредит'),
(461, 297, 'en', 'С работы уволили, ипотека и автокредит'),
(462, 297, 'fr', 'С работы уволили, ипотека и автокредит'),
(463, 298, 'ru', 'Друзья не зовут бухать а сами бухают суки'),
(464, 298, 'en', 'Друзья не зовут бухать а сами бухают суки'),
(465, 298, 'fr', 'Друзья не зовут бухать а сами бухают суки'),
(466, 299, 'ru', 'Другая причина'),
(467, 299, 'en', 'Другая причина'),
(468, 299, 'fr', 'Другая причина'),
(469, 300, 'ru', 'Отмена'),
(470, 300, 'en', 'Отмена'),
(471, 300, 'fr', 'Отмена'),
(472, 301, 'ru', 'Удалить профиль'),
(473, 301, 'en', 'Удалить профиль'),
(474, 301, 'fr', 'Удалить профиль'),
(475, 302, 'ru', 'Настройки приватности'),
(476, 302, 'en', 'Настройки приватности'),
(477, 302, 'fr', 'Настройки приватности'),
(478, 303, 'ru', 'Кто может просматривать мой профиль'),
(479, 303, 'en', 'Кто может просматривать мой профиль'),
(480, 303, 'fr', 'Кто может просматривать мой профиль'),
(481, 304, 'ru', 'Вход'),
(482, 304, 'en', 'Вход'),
(483, 304, 'fr', 'Вход'),
(484, 305, 'ru', 'Регистрация'),
(485, 305, 'en', 'Регистрация'),
(486, 305, 'fr', 'Регистрация'),
(487, 306, 'ru', 'Запомнить'),
(488, 306, 'en', 'Запомнить'),
(489, 306, 'fr', 'Запомнить'),
(490, 307, 'ru', 'Войти'),
(491, 307, 'en', 'Войти'),
(492, 307, 'fr', 'Войти'),
(493, 308, 'ru', 'Пожалуйста, авторизуйтесь'),
(494, 308, 'en', 'Пожалуйста, авторизуйтесь'),
(495, 308, 'fr', 'Пожалуйста, авторизуйтесь'),
(496, 309, 'ru', 'Запомнить меня'),
(497, 309, 'en', 'Запомнить меня'),
(498, 309, 'fr', 'Запомнить меня'),
(499, 310, 'ru', 'Забыли пароль?'),
(500, 310, 'en', 'Забыли пароль?'),
(501, 310, 'fr', 'Забыли пароль?'),
(502, 311, 'ru', 'Вход через соц.сети'),
(503, 311, 'en', 'Вход через соц.сети'),
(504, 311, 'fr', 'Вход через соц.сети'),
(505, 312, 'ru', 'Twitter'),
(506, 312, 'en', 'Twitter'),
(507, 312, 'fr', 'Twitter'),
(508, 313, 'ru', 'Facebook'),
(509, 313, 'en', 'Facebook'),
(510, 313, 'fr', 'Facebook'),
(511, 314, 'ru', 'Вконтакте'),
(512, 314, 'en', 'Вконтакте'),
(513, 314, 'fr', 'Вконтакте'),
(514, 315, 'ru', 'Одноклассники'),
(515, 315, 'en', 'Одноклассники'),
(516, 315, 'fr', 'Одноклассники'),
(517, 316, 'ru', 'Имя'),
(518, 316, 'en', 'Имя'),
(519, 316, 'fr', 'Имя'),
(520, 317, 'ru', 'Эл.почта'),
(521, 317, 'en', 'Эл.почта'),
(522, 317, 'fr', 'Эл.почта'),
(523, 318, 'ru', 'Пароль'),
(524, 318, 'en', 'Пароль'),
(525, 318, 'fr', 'Пароль'),
(526, 319, 'ru', 'Муж'),
(527, 319, 'en', 'Муж'),
(528, 319, 'fr', 'Муж'),
(529, 320, 'ru', 'Жен'),
(530, 320, 'en', 'Жен'),
(531, 320, 'fr', 'Жен'),
(532, 321, 'ru', 'Зарегистрироваться'),
(533, 321, 'en', 'Зарегистрироваться'),
(534, 321, 'fr', 'Зарегистрироваться'),
(535, 322, 'ru', 'Шаг'),
(536, 322, 'en', 'Шаг'),
(537, 322, 'fr', 'Шаг'),
(538, 323, 'ru', 'Расскажите немного о себе, Имя'),
(539, 323, 'en', 'Расскажите немного о себе, Имя'),
(540, 323, 'fr', 'Расскажите немного о себе, Имя'),
(541, 324, 'ru', 'Необходимо выбрать фото профиля'),
(542, 324, 'en', 'Необходимо выбрать фото профиля'),
(543, 324, 'fr', 'Необходимо выбрать фото профиля'),
(544, 325, 'ru', 'Мои интересы'),
(545, 325, 'en', 'Мои интересы'),
(546, 325, 'fr', 'Мои интересы'),
(547, 326, 'ru', 'Знаю языки'),
(548, 326, 'en', 'Знаю языки'),
(549, 326, 'fr', 'Знаю языки'),
(550, 327, 'ru', 'Добавить язык'),
(551, 327, 'en', 'Добавить язык'),
(552, 327, 'fr', 'Добавить язык'),
(553, 328, 'ru', 'Обязательно напишите о себе'),
(554, 328, 'en', 'Обязательно напишите о себе'),
(555, 328, 'fr', 'Обязательно напишите о себе'),
(556, 329, 'ru', 'Это поможет другим лучше узнать вас'),
(557, 329, 'en', 'Это поможет другим лучше узнать вас'),
(558, 329, 'fr', 'Это поможет другим лучше узнать вас'),
(559, 330, 'ru', 'Не ленитесь, напишите хоть что-нибудь'),
(560, 330, 'en', 'Do not be lazy, write at least something'),
(561, 330, 'fr', 'Не ленитесь, напишите хоть что-нибудь');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `senderID` int(10) unsigned NOT NULL,
  `receiverID` int(10) unsigned NOT NULL,
  `text` text,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `senderID` (`senderID`),
  KEY `receiverID` (`receiverID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Сообщения' AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `senderID`, `receiverID`, `text`, `date`, `flag`) VALUES
(1, 1, 2, 'Привет от первого второму', '2017-10-11 09:06:56', 1),
(2, 1, 2, 'Привет от первого второму еще разок', '2017-10-11 09:20:14', 1),
(3, 2, 1, 'Привет от второго первому', '2017-10-11 09:15:03', 1),
(4, 2, 1, 'Ну здароф ебучий шакал', '2017-10-11 10:33:41', 1),
(5, 1, 2, 'Ах ты сраная шлюха!!!!!!!!!!', '2017-10-11 10:37:36', 1),
(6, 1, 2, 'Hoopmessenger: http://hoopmessenger.com/dl Меня зовут Паша Бумчик, мне 19 лет, у меня плохая дикция, но это не мешает мне быть', '2017-10-11 10:39:21', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
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

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `userGroupId`, `isActive`, `description`) VALUES
(0, 'admin@example.com', '', 1, 0, NULL),
(1, 'kasp89s@gmail.com', '8349efb1b90fb33b41698cbe945769c4', 1, 1, 'Мудила'),
(4, 'kasp89s@mail.ru', 'g65uerden', 2, 1, 'Hello word'),
(6, 'test@admin.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `usergroup`
--

CREATE TABLE IF NOT EXISTS `usergroup` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `actions` set('user','customer','banner','info-page','manufacture','discount','coupon','shipping-method','payment-method','news','news-letter-subscriber','product','category','order','group','customer-group','specification','option','comment','languages') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `usergroup`
--

INSERT INTO `usergroup` (`id`, `name`, `actions`) VALUES
(1, 'Супер админ', 'user,customer,banner,info-page,manufacture,discount,coupon,shipping-method,payment-method,news,news-letter-subscriber,product,category,order,group,customer-group,specification,option,comment,languages'),
(2, 'Админ', 'banner,info-page,manufacture,discount,coupon,news,news-letter-subscriber,product');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ads_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ads_ibfk_2` FOREIGN KEY (`cityID`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ads_interests`
--
ALTER TABLE `ads_interests`
  ADD CONSTRAINT `ads_interests_ibfk_1` FOREIGN KEY (`adsID`) REFERENCES `ads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ads_interests_ibfk_2` FOREIGN KEY (`interestID`) REFERENCES `interest` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ads_participant`
--
ALTER TABLE `ads_participant`
  ADD CONSTRAINT `ads_participant_ibfk_2` FOREIGN KEY (`participantID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ads_participant_ibfk_1` FOREIGN KEY (`adsID`) REFERENCES `ads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `category_translation`
--
ALTER TABLE `category_translation`
  ADD CONSTRAINT `category_translation_ibfk_1` FOREIGN KEY (`sourceID`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`countryId`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `city_translation`
--
ALTER TABLE `city_translation`
  ADD CONSTRAINT `city_translation_ibfk_1` FOREIGN KEY (`sourceID`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`cityID`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `company_category`
--
ALTER TABLE `company_category`
  ADD CONSTRAINT `company_category_ibfk_1` FOREIGN KEY (`companyID`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_category_ibfk_2` FOREIGN KEY (`categoryID`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `company_comment`
--
ALTER TABLE `company_comment`
  ADD CONSTRAINT `company_comment_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `company_comment_answer`
--
ALTER TABLE `company_comment_answer`
  ADD CONSTRAINT `company_comment_answer_ibfk_1` FOREIGN KEY (`commentID`) REFERENCES `company_comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_comment_answer_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `company_comment_answer_image`
--
ALTER TABLE `company_comment_answer_image`
  ADD CONSTRAINT `company_comment_answer_image_ibfk_1` FOREIGN KEY (`imageID`) REFERENCES `common_images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_comment_answer_image_ibfk_2` FOREIGN KEY (`commentID`) REFERENCES `customer_comment_answer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `company_comment_image`
--
ALTER TABLE `company_comment_image`
  ADD CONSTRAINT `company_comment_image_ibfk_1` FOREIGN KEY (`commentID`) REFERENCES `company_comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_comment_image_ibfk_2` FOREIGN KEY (`imageID`) REFERENCES `common_images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `company_interests`
--
ALTER TABLE `company_interests`
  ADD CONSTRAINT `company_interests_ibfk_1` FOREIGN KEY (`companyID`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_interests_ibfk_2` FOREIGN KEY (`interestID`) REFERENCES `interest` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `company_participant`
--
ALTER TABLE `company_participant`
  ADD CONSTRAINT `company_participant_ibfk_1` FOREIGN KEY (`companyID`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_participant_ibfk_2` FOREIGN KEY (`participantID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `country_translation`
--
ALTER TABLE `country_translation`
  ADD CONSTRAINT `country_translation_ibfk_1` FOREIGN KEY (`sourceID`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`cityID`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `customer_comment`
--
ALTER TABLE `customer_comment`
  ADD CONSTRAINT `customer_comment_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `customer_comment_answer`
--
ALTER TABLE `customer_comment_answer`
  ADD CONSTRAINT `customer_comment_answer_ibfk_1` FOREIGN KEY (`commentID`) REFERENCES `customer_comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_comment_answer_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `customer_comment_image`
--
ALTER TABLE `customer_comment_image`
  ADD CONSTRAINT `customer_comment_image_ibfk_1` FOREIGN KEY (`commentID`) REFERENCES `customer_comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_comment_image_ibfk_2` FOREIGN KEY (`imageID`) REFERENCES `common_images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `customer_image`
--
ALTER TABLE `customer_image`
  ADD CONSTRAINT `customer_image_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `customer_image_comment`
--
ALTER TABLE `customer_image_comment`
  ADD CONSTRAINT `customer_image_comment_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_image_comment_ibfk_3` FOREIGN KEY (`imageID`) REFERENCES `customer_image` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `customer_interests`
--
ALTER TABLE `customer_interests`
  ADD CONSTRAINT `customer_interests_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_interests_ibfk_2` FOREIGN KEY (`interestID`) REFERENCES `interest` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `customer_languages`
--
ALTER TABLE `customer_languages`
  ADD CONSTRAINT `customer_languages_ibfk_1` FOREIGN KEY (`languageID`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_languages_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `interest`
--
ALTER TABLE `interest`
  ADD CONSTRAINT `interest_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `interest_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `interest_category_translation`
--
ALTER TABLE `interest_category_translation`
  ADD CONSTRAINT `interest_category_translation_ibfk_1` FOREIGN KEY (`sourceID`) REFERENCES `interest_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `interest_translation`
--
ALTER TABLE `interest_translation`
  ADD CONSTRAINT `interest_translation_ibfk_1` FOREIGN KEY (`sourceID`) REFERENCES `interest` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `languages_translation`
--
ALTER TABLE `languages_translation`
  ADD CONSTRAINT `languages_translation_ibfk_1` FOREIGN KEY (`sourceID`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `main_i18n_translation`
--
ALTER TABLE `main_i18n_translation`
  ADD CONSTRAINT `FKI18nTranslationToI18n` FOREIGN KEY (`sourceId`) REFERENCES `main_i18n` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`senderID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiverID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
