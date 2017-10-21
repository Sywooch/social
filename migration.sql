--
-- Структура таблицы `ads`
--

DROP TABLE IF EXISTS `ads`;
CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT 'Заголовок',
  `city` int(10) UNSIGNED DEFAULT NULL COMMENT 'Расположение',
  `sex` enum('M','F','C') NOT NULL DEFAULT 'M' COMMENT 'С кем',
  `date` timestamp NULL DEFAULT NULL COMMENT 'Когда',
  `content` text DEFAULT NULL COMMENT 'Текст объявления',
  `timeCreate` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Создан',
  PRIMARY KEY (`id`),
  KEY `city` (`city`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Обьявления';


DROP TABLE IF EXISTS `ads_interests`;
CREATE TABLE IF NOT EXISTS `ads_interests` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `adsID` int(10) UNSIGNED NOT NULL,
  `interestID` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customerID` (`adsID`),
  KEY `interestID` (`interestID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Интересы пользователей';

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `ads_interests`
--
ALTER TABLE `ads_interests`
  ADD CONSTRAINT `ads_interests_ibfk_1` FOREIGN KEY (`adsID`) REFERENCES `ads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ads_interests_ibfk_2` FOREIGN KEY (`interestID`) REFERENCES `interest` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

