-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 02 2022 г., 01:47
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cms`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(4) NOT NULL,
  `page_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `page_id`, `user_id`, `comment`, `date`) VALUES
(1, 1, 10, '131231', '2022-06-01 15:40:59'),
(2, 1, 10, '131231', '2022-06-01 15:41:42'),
(3, 1, 10, '131231fsafsd', '2022-06-01 15:41:49'),
(4, 1, 10, '131231fsafsd', '2022-06-01 15:42:03'),
(5, 1, 10, '131231fsafsd', '2022-06-01 15:42:08'),
(6, 1, 10, '123123', '2022-06-01 15:44:00'),
(7, 1, 10, 'Hello, World!', '2022-06-01 16:22:25');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `href` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 555
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `href`, `title`, `sort`) VALUES
(1, 0, 'yandex.ru', 'cайты', 556),
(2, 0, 'yandex.ru', 'cайты23', 555),
(3, 1, 'yandex.ru', 'cайты3213123', 555);

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `url` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `url`, `title`, `content`, `active`) VALUES
(1, 'test', 'ТЕСТИЛ\n<img src=\"https://doctor-veterinar.ru/media/k2/items/cache/675d28c04794e3c683f4419536c4c15f_L.jpg\" \nwidth=\"150px\">', '123312 мфафвафывафвыа', 1),
(2, 'test2', 'Тайтл', 'Закрыто', 0),
(3, 'test3', 'title', 'gsfdgsdgsdfgsdfg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `active` int(11) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `date`, `active`, `admin`) VALUES
(5, '123', '123', '2022-05-12', 1, 0),
(6, 'Петя', '123', '2022-05-12', 1, 0),
(7, 'Арбуз', '123', '2022-05-12', 1, 0),
(8, 'Мп', '$2y$10$9f1w7AtcAmbd1hrUjVjvtOaqDYpKTK9modexQU5A3T9qSFa2wV9yS', '2022-05-12', 1, 0),
(9, 'joho', '$2y$10$zUx16VpzDTLIrFSQTRgSH.7JYdqxhVmgxc.GMIax63/dCpwgE5krW', '2022-05-12', 1, 0),
(10, 'Keldowin', '$2y$10$p8OFyENR.qRO3In3PujvVuZe4qxKi3ZPEyBBuhZVTikO5wN5fKk2S', '2022-05-12', 1, 0),
(11, '1231', '$2y$10$ouDk1O1jhVp57jsQha1KYu942F9FFkHJXouGj5NMv4qjpv9sfr7Hi', '2022-05-12', 1, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
