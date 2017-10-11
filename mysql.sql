-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Окт 11 2017 г., 17:54
-- Версия сервера: 5.6.16-1~exp1
-- Версия PHP: 5.6.31-6+ubuntu16.04.1+deb.sury.org+1

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
-- Структура таблицы `common_images`
--

CREATE TABLE `common_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` varchar(255) NOT NULL,
  `date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `common_images`
--

INSERT INTO `common_images` (`id`, `file`, `date`) VALUES
(1, '/uploads/custom/49e7dd0bac6f0aefbc1b185ed83eee08/66fc0e2cad15520b60da4ff4e1aa8303.jpg', NULL),
(2, '/uploads/custom/49e7dd0bac6f0aefbc1b185ed83eee08/574221ee9b1001d4da7ea0607b40ac00.jpg', NULL);

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
  `birthday` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sex` int(1) NOT NULL DEFAULT '1',
  `title` varchar(1024) DEFAULT NULL,
  `about` text,
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

INSERT INTO `customer` (`id`, `email`, `password`, `isActive`, `fullName`, `birthday`, `sex`, `title`, `about`, `code`, `registrationIp`, `registrationTime`, `cityID`, `authID`, `authMethod`) VALUES
(1, 'kasp89s@gmail.com', '8349efb1b90fb33b41698cbe945769c4', 1, 'Тестовый тип', '1977-10-11 09:06:23', 1, NULL, NULL, NULL, NULL, '2017-09-26 14:19:57', 1, NULL, NULL),
(2, 'kasp89s@mail.com', '8349efb1b90fb33b41698cbe945769c4', 1, 'Даша Куесосович', '1989-10-09 12:47:02', 2, NULL, 'Я простопоц!!!', '59d24c0e3d9bd', '127.0.0.1', '2017-10-02 14:24:14', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `customer_comment`
--

CREATE TABLE `customer_comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerID` int(10) UNSIGNED NOT NULL,
  `text` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likePoint` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Коментарии';

--
-- Дамп данных таблицы `customer_comment`
--

INSERT INTO `customer_comment` (`id`, `customerID`, `text`, `date`, `likePoint`) VALUES
(2, 2, 'Комментик', '2017-10-10 09:01:40', 0),
(4, 2, 'efkdpfksdofsf', '2017-10-10 09:06:17', 0),
(5, 2, 'Мероприятие невиданного охвата и с колоссальной идеей. Для меня честь и удовольствие работать с такой замечательной и очень молодой командой. То, что мы сделали за эти несколько месяцев, — это настоящий подвиг. Коля , Мари , спасибо вам, что привлекли. Работать в коллективе людей, для которых нет невыполнимых задач, - это самый лучший опыт.', '2017-10-10 09:09:03', 0),
(6, 2, 'Прямо сейчас трансляция Comic Con в San Diego! В 1080, между прочим, Marvel мочат) Ну-ка, покажите нам Quicksilver ^____^', '2017-10-10 09:09:53', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `customer_comment_answer`
--

CREATE TABLE `customer_comment_answer` (
  `id` int(10) UNSIGNED NOT NULL,
  `commentID` int(10) UNSIGNED NOT NULL,
  `customerID` int(10) UNSIGNED NOT NULL,
  `text` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `likePoint` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Ответы на Коментарии';

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
-- Структура таблицы `customer_comment_answer_image`
--

CREATE TABLE `customer_comment_answer_image` (
  `commentID` int(10) UNSIGNED NOT NULL,
  `imageID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `customer_comment_image`
--

CREATE TABLE `customer_comment_image` (
  `commentID` int(10) UNSIGNED NOT NULL,
  `imageID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customer_comment_image`
--

INSERT INTO `customer_comment_image` (`commentID`, `imageID`) VALUES
(4, 1),
(5, 2);

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
-- Структура таблицы `customer_image`
--

CREATE TABLE `customer_image` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerID` int(10) UNSIGNED NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `isMain` tinyint(1) NOT NULL DEFAULT '0',
  `likePoint` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Картинки пользователей';

--
-- Дамп данных таблицы `customer_image`
--

INSERT INTO `customer_image` (`id`, `customerID`, `file`, `isMain`, `likePoint`, `date`) VALUES
(27, 2, '27b06d68793d9de1b9a9474865e87af9.jpg', 1, 1, '2017-10-09 08:57:11'),
(28, 1, '66fc0e2cad15520b60da4ff4e1aa8303.jpg', 1, 0, '2017-10-11 07:36:18');

-- --------------------------------------------------------

--
-- Структура таблицы `customer_interests`
--

CREATE TABLE `customer_interests` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerID` int(10) UNSIGNED NOT NULL,
  `interestID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Интересы пользователей';

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

CREATE TABLE `customer_languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerID` int(10) UNSIGNED NOT NULL,
  `languageID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Структура таблицы `interest`
--

CREATE TABLE `interest` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoryID` int(10) UNSIGNED NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Интересы';

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

CREATE TABLE `interest_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `sort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Категории интересов';

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

CREATE TABLE `interest_category_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `sourceID` int(10) UNSIGNED NOT NULL,
  `language` varchar(5) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Переводы категорий интересов';

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

CREATE TABLE `interest_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `sourceID` int(10) UNSIGNED NOT NULL,
  `language` varchar(5) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Переводы интересов';

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

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(5) DEFAULT NULL,
  `system` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Отображать как системный'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Языки';

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`id`, `code`, `system`) VALUES
(1, 'ru', 1),
(2, 'en', 1),
(3, 'fr', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `languages_translation`
--

CREATE TABLE `languages_translation` (
  `id` int(10) UNSIGNED NOT NULL,
  `sourceID` int(10) UNSIGNED NOT NULL,
  `language` varchar(5) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Переводы языков';

--
-- Дамп данных таблицы `languages_translation`
--

INSERT INTO `languages_translation` (`id`, `sourceID`, `language`, `name`) VALUES
(1, 1, 'ru', 'Русский'),
(2, 1, 'en', 'Russian'),
(3, 2, 'ru', 'Английский'),
(4, 3, 'ru', 'Французский');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `senderID` int(10) UNSIGNED NOT NULL,
  `receiverID` int(10) UNSIGNED NOT NULL,
  `text` text,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Сообщения';

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

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  `userGroupId` int(10) UNSIGNED NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `description` text
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

CREATE TABLE `usergroup` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `actions` set('user','customer','banner','info-page','manufacture','discount','coupon','shipping-method','payment-method','news','news-letter-subscriber','product','category','order','group','customer-group','specification','option','comment','languages') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `usergroup`
--

INSERT INTO `usergroup` (`id`, `name`, `actions`) VALUES
(1, 'Супер админ', 'user,customer,banner,info-page,manufacture,discount,coupon,shipping-method,payment-method,news,news-letter-subscriber,product,category,order,group,customer-group,specification,option,comment,languages'),
(2, 'Админ', 'banner,info-page,manufacture,discount,coupon,news,news-letter-subscriber,product');

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
-- Индексы таблицы `common_images`
--
ALTER TABLE `common_images`
  ADD PRIMARY KEY (`id`);

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
-- Индексы таблицы `customer_comment`
--
ALTER TABLE `customer_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerID` (`customerID`);

--
-- Индексы таблицы `customer_comment_answer`
--
ALTER TABLE `customer_comment_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentID` (`commentID`),
  ADD KEY `customerID` (`customerID`);

--
-- Индексы таблицы `customer_comment_answer_image`
--
ALTER TABLE `customer_comment_answer_image`
  ADD KEY `commentID` (`commentID`),
  ADD KEY `imageID` (`imageID`);

--
-- Индексы таблицы `customer_comment_image`
--
ALTER TABLE `customer_comment_image`
  ADD KEY `commentID` (`commentID`),
  ADD KEY `imageID` (`imageID`);

--
-- Индексы таблицы `customer_friend`
--
ALTER TABLE `customer_friend`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `friendID` (`friendID`);

--
-- Индексы таблицы `customer_image`
--
ALTER TABLE `customer_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerID` (`customerID`);

--
-- Индексы таблицы `customer_interests`
--
ALTER TABLE `customer_interests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `interestID` (`interestID`);

--
-- Индексы таблицы `customer_languages`
--
ALTER TABLE `customer_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `languageID` (`languageID`);

--
-- Индексы таблицы `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Индексы таблицы `interest_category`
--
ALTER TABLE `interest_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `interest_category_translation`
--
ALTER TABLE `interest_category_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sourceID` (`sourceID`);

--
-- Индексы таблицы `interest_translation`
--
ALTER TABLE `interest_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sourceID` (`sourceID`);

--
-- Индексы таблицы `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `languages_translation`
--
ALTER TABLE `languages_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sourceID` (`sourceID`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `senderID` (`senderID`),
  ADD KEY `receiverID` (`receiverID`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `userGroupId` (`userGroupId`);

--
-- Индексы таблицы `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для таблицы `common_images`
--
ALTER TABLE `common_images`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT для таблицы `customer_comment`
--
ALTER TABLE `customer_comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `customer_comment_answer`
--
ALTER TABLE `customer_comment_answer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `customer_friend`
--
ALTER TABLE `customer_friend`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `customer_image`
--
ALTER TABLE `customer_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT для таблицы `customer_interests`
--
ALTER TABLE `customer_interests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `customer_languages`
--
ALTER TABLE `customer_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `interest`
--
ALTER TABLE `interest`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `interest_category`
--
ALTER TABLE `interest_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `interest_category_translation`
--
ALTER TABLE `interest_category_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `interest_translation`
--
ALTER TABLE `interest_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `languages_translation`
--
ALTER TABLE `languages_translation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

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
  ADD CONSTRAINT `customer_comment_answer_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_comment_answer_ibfk_1` FOREIGN KEY (`commentID`) REFERENCES `customer_comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `customer_comment_answer_image`
--
ALTER TABLE `customer_comment_answer_image`
  ADD CONSTRAINT `customer_comment_answer_image_ibfk_2` FOREIGN KEY (`commentID`) REFERENCES `customer_comment_answer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_comment_answer_image_ibfk_1` FOREIGN KEY (`imageID`) REFERENCES `common_images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `customer_comment_image`
--
ALTER TABLE `customer_comment_image`
  ADD CONSTRAINT `customer_comment_image_ibfk_2` FOREIGN KEY (`imageID`) REFERENCES `common_images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_comment_image_ibfk_1` FOREIGN KEY (`commentID`) REFERENCES `customer_comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `customer_image`
--
ALTER TABLE `customer_image`
  ADD CONSTRAINT `customer_image_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `customer_interests`
--
ALTER TABLE `customer_interests`
  ADD CONSTRAINT `customer_interests_ibfk_2` FOREIGN KEY (`interestID`) REFERENCES `interest` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_interests_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `customer_languages`
--
ALTER TABLE `customer_languages`
  ADD CONSTRAINT `customer_languages_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_languages_ibfk_1` FOREIGN KEY (`languageID`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Ограничения внешнего ключа таблицы `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`senderID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiverID`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
