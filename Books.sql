-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 28 2019 г., 23:04
-- Версия сервера: 5.6.41
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Books`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Books`
--

CREATE TABLE `books` (
  `Autor` varchar(100) NOT NULL,
  `Book's` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Books`
--

INSERT INTO `Books` (`Autor`, `Book's`) VALUES
('Лермонтов', 'Герой нашего времени'),
('Лермонтов', 'Герой нашего времени'),
('Лермонтов', 'Герой нашего времени'),
('Лермонтов', 'Герой нашего времени'),
('Лермонтов', 'Герой нашего времени'),
('Эрих Мария Ремарк', 'Три товарища,На западном фронте без перем,Триумфальная арка'),
('Пушкин', 'Мороз,и,солнце,день,чудесный,а,что,ты,спишь,мой,друг,прелестный');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;