-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 01 2020 г., 14:43
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
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `feedback_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content` text NOT NULL,
  `page` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `page_id` int NOT NULL DEFAULT '0',
  `feedback_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `feedback_name`, `content`, `page`, `page_id`, `feedback_date`) VALUES
(2, 'Андрей', 'wewewewe', 'feedback', 0, '2020-07-01 17:30:51'),
(9, 'sdfsdfs', 'sdfsdfsdf', 'image', 30, '2020-07-01 18:08:27'),
(10, 'sdfsdfs', 'sdfsdfsdf', 'image', 30, '2020-07-01 18:17:58'),
(11, 'Сигизмунд', 'отзыв про сайт', 'feedback', 0, '2020-07-01 18:18:44'),
(12, 'Гаврила', 'отзыв про мангал', 'item', 1, '2020-07-01 18:19:20'),
(13, 'Антрикот', 'отзыв про фото №30', 'image', 30, '2020-07-01 18:20:14');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int NOT NULL,
  `gallery_filename` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gallery_like` int NOT NULL DEFAULT '0',
  `gallery_view` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_filename`, `gallery_like`, `gallery_view`) VALUES
(16, '01.jpg', 0, 0),
(17, '02.jpg', 0, 0),
(18, '03.jpg', 1, 4),
(19, '04.jpg', 0, 0),
(20, '05.jpg', 0, 0),
(21, '06.jpg', 0, 0),
(22, '07.jpg', 1, 2),
(23, '08.jpg', 0, 0),
(24, '09.jpg', 0, 1),
(25, '10.jpg', 3, 2),
(26, '11.jpg', 0, 0),
(27, '12.jpg', 0, 5),
(28, '13.jpg', 2, 4),
(29, '14.jpg', 0, 1),
(30, '15.jpg', 1, 36);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `description`, `image`, `price`) VALUES
(1, 'Мангал', 'Размер 400*240*400*0,4 мм. В комплекте 6 шампуров 34 см из нержавеющей стали. Упаковка - термоусадочная пленка. Толщина стали 0,4 мм.', 'mangal.jpg', 250),
(2, 'Щепа д/копчения', 'Считается, что натуральная щепа для копчения не допускает никакой переработки, обработки, пропитки. Особым образом выбранный тип древесины, ее возраст, география произрастания, качество измельчения влияют на полученную в итоге щепу. Нашим клиентам предлагается щепа для копчения «FireWood», которая отлично подойдет для копчения мяса и рыбы. Наша щепа для копчения имеет свои достоинства: экономный расход, хороший режим тления, отсутствие пыли, небольшое время копчения, высокая степень сушки и т.д.', 'fire_wood.jpg', 120),
(5, 'Гель Супер Момент', 'Идеально для склеивания в различном сочетании таких материалов, как: кожа, дерево, резина, бумага, картон, фарфор, металл, пластики.', 'glue.jpg', 50),
(6, 'Ведро строительное пластиковое', 'Изготовлено из ударопрочного пластика. Ручка металлическая. Внутри ведра нанесена разметка в литрах. Ведро предназначено для размешивания и переноски строительных и клеевых штукатурных растворов.', 'bucket.jpg', 160);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `news_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
