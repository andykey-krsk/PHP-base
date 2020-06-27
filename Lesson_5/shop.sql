-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 26 2020 г., 13:38
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `gallery_img`
--

CREATE TABLE `gallery` (
  `gallery_id` int NOT NULL,
  `gallery_filename` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gallery_like` int NOT NULL DEFAULT '0',
  `gallery_view` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `gallery_img`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_filename`, `gallery_like`, `gallery_view`) VALUES
(16, '01.jpg', 0, 0),
(17, '02.jpg', 0, 0),
(18, '03.jpg', 0, 0),
(19, '04.jpg', 0, 0),
(20, '05.jpg', 0, 0),
(21, '06.jpg', 0, 0),
(22, '07.jpg', 1, 2),
(23, '08.jpg', 0, 0),
(24, '09.jpg', 0, 1),
(25, '10.jpg', 3, 2),
(26, '11.jpg', 0, 0),
(27, '12.jpg', 0, 1),
(28, '13.jpg', 2, 4),
(29, '14.jpg', 0, 1),
(30, '15.jpg', 0, 11);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `gallery_img`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `gallery_img`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
