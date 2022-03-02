-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 02 2022 г., 04:43
-- Версия сервера: 5.7.31
-- Версия PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `books_bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `newid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Year` year(4) DEFAULT NULL,
  `ISBN` varchar(13) NOT NULL,
  PRIMARY KEY (`newid`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`newid`, `Name`, `Author`, `Year`, `ISBN`) VALUES
(78, 'ВВЦ', 'Шагидуллин Дамир', 2022, '1000000000000'),
(89, 'oR', 'Шагидуллин Дамир', 2019, '1000000000000'),
(90, 'OK', 'Шагидуллин Дамир', 2019, '1000000000000'),
(91, 'oK', 'Шагидуллин Дамир', 2018, '1000000000000'),
(92, 'oj', 'Шагидуллин Дамир', 2018, '1000000000000'),
(93, 'ЛЩ', 'Шагидуллин Дамир', 2000, '9999999999999'),
(94, 'ui', 'Шагидуллин Дамир', 2000, '9999999999999'),
(95, '7878', 'Шагидуллин Дамир', 2000, '9999999999999'),
(96, '677', 'Шагидуллин Дамир', 2000, '9999999999999'),
(97, '12313', 'Шагидуллин Дамир', 2000, '9999999999999');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
