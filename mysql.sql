-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Окт 02 2017 г., 17:39
-- Версия сервера: 5.6.16-1~exp1
-- Версия PHP: 5.6.31-4+ubuntu16.04.1+deb.sury.org+4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `amigator_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Категории';

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `id` int(10) UNSIGNED NOT NULL,
  `countryId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Города';

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

CREATE TABLE `city_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `sourceID` int(10) UNSIGNED NOT NULL,
  `language` varchar(5) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Переводы';

--
-- Дамп данных таблицы `city_translation`
--

INSERT INTO `city_translation` (`id`, `sourceID`, `language`, `name`) VALUES
(1, 1, 'ru', 'Москва'),
(2, 2, 'ru', 'Санкт-Петербург');

-- --------------------------------------------------------

--
-- Структура таблицы `company`
--

CREATE TABLE `company` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `participantsCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Компании';

-- --------------------------------------------------------

--
-- Структура таблицы `company_category`
--

CREATE TABLE `company_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `companyID` int(10) UNSIGNED NOT NULL,
  `categoryID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `company_interests`
--

CREATE TABLE `company_interests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `companyID` int(10) UNSIGNED NOT NULL,
  `interestID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Связь интересов с компаниями';

-- --------------------------------------------------------

--
-- Структура таблицы `company_participant`
--

CREATE TABLE `company_participant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `companyID` int(10) UNSIGNED NOT NULL,
  `participantID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Связь компаний и пользователей в них';

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Страны';

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Структура таблицы `country_translation`
--

CREATE TABLE `country_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `sourceID` int(10) UNSIGNED NOT NULL,
  `language` varchar(5) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Переводы';

--
-- Дамп данных таблицы `country_translation`
--

INSERT INTO `country_translation` (`id`, `sourceID`, `language`, `name`) VALUES
(1, 1, 'ru', 'Россия');

-- --------------------------------------------------------

--
-- Структура таблицы `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `fullName` varchar(255) DEFAULT NULL,
  `birthday` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `code` char(32) DEFAULT NULL,
  `registrationIp` varchar(16) DEFAULT NULL,
  `registrationTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cityID` int(10) UNSIGNED NOT NULL,
  `authID` varchar(64) DEFAULT NULL,
  `authMethod` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customer`
--

INSERT INTO `customer` (`id`, `email`, `password`, `isActive`, `fullName`, `birthday`, `code`, `registrationIp`, `registrationTime`, `cityID`, `authID`, `authMethod`) VALUES
(1, 'kasp89s@gmail.com', '8349efb1b90fb33b41698cbe945769c4', 1, NULL, '2017-10-02 13:27:10', NULL, NULL, '2017-09-26 14:19:57', 1, NULL, NULL),
(2, 'kasp89s@mail.com', '8349efb1b90fb33b41698cbe945769c4', 0, 'Сергей', '0000-00-00 00:00:00', '59d24c0e3d9bd', '127.0.0.1', '2017-10-02 14:24:14', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `customeraddress`
--

CREATE TABLE `customeraddress` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerId` int(10) UNSIGNED NOT NULL,
  `countryCode` char(3) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `isPrimary` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `customer_friend`
--

CREATE TABLE `customer_friend` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customerID` int(10) UNSIGNED NOT NULL,
  `friendID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `infopage`
--

CREATE TABLE `infopage` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(45) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `createTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `interests`
--

CREATE TABLE `interests` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Интересы';

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `senderID` int(10) UNSIGNED NOT NULL,
  `receiverID` int(10) UNSIGNED NOT NULL,
  `text` text,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Сообщения';

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countryId` (`countryId`);

--
-- Индексы таблицы `city_translation`
--
ALTER TABLE `city_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sourceID` (`sourceID`);

--
-- Индексы таблицы `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `company_category`
--
ALTER TABLE `company_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companyID` (`companyID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Индексы таблицы `company_interests`
--
ALTER TABLE `company_interests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interestID` (`interestID`),
  ADD KEY `companyID` (`companyID`);

--
-- Индексы таблицы `company_participant`
--
ALTER TABLE `company_participant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companyID` (`companyID`),
  ADD KEY `participantID` (`participantID`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `country_translation`
--
ALTER TABLE `country_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sourceID` (`sourceID`);

--
-- Индексы таблицы `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cityID` (`cityID`);

--
-- Индексы таблицы `customer_friend`
--
ALTER TABLE `customer_friend`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `friendID` (`friendID`);

--
-- Индексы таблицы `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `senderID` (`senderID`),
  ADD KEY `receiverID` (`receiverID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `city_translation`
--
ALTER TABLE `city_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `company_category`
--
ALTER TABLE `company_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `company_interests`
--
ALTER TABLE `company_interests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `company_participant`
--
ALTER TABLE `company_participant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `country_translation`
--
ALTER TABLE `country_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `customer_friend`
--
ALTER TABLE `customer_friend`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`countryId`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `company_category`
--
ALTER TABLE `company_category`
  ADD CONSTRAINT `company_category_ibfk_1` FOREIGN KEY (`companyID`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_category_ibfk_2` FOREIGN KEY (`categoryID`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Ограничения внешнего ключа таблицы `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`senderID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiverID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
