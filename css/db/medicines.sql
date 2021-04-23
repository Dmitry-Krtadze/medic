-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 23 2021 г., 21:19
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `medicines`
--

-- --------------------------------------------------------

--
-- Структура таблицы `active_substance`
--

CREATE TABLE `active_substance` (
  `id_substance` int UNSIGNED NOT NULL,
  `name_substance` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `active_substance`
--

INSERT INTO `active_substance` (`id_substance`, `name_substance`) VALUES
(1, 'Глицын');

-- --------------------------------------------------------

--
-- Структура таблицы `fabricator`
--

CREATE TABLE `fabricator` (
  `id_fabricator` int UNSIGNED NOT NULL,
  `name_fabricator` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `source_src` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `fabricator`
--

INSERT INTO `fabricator` (`id_fabricator`, `name_fabricator`, `source_src`) VALUES
(256, 'Медгруп', 'https://medgroup.com');

-- --------------------------------------------------------

--
-- Структура таблицы `medicinal_product`
--

CREATE TABLE `medicinal_product` (
  `id_medicinal` int UNSIGNED NOT NULL,
  `name_medicinal` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_substanse_prod` int UNSIGNED NOT NULL,
  `id_fabricator_prod` int UNSIGNED NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `medicinal_product`
--

INSERT INTO `medicinal_product` (`id_medicinal`, `name_medicinal`, `id_substanse_prod`, `id_fabricator_prod`, `price`) VALUES
(42, 'Глицын Медгруп', 1, 256, 16);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `active_substance`
--
ALTER TABLE `active_substance`
  ADD PRIMARY KEY (`id_substance`),
  ADD UNIQUE KEY `substance_id` (`id_substance`);

--
-- Индексы таблицы `fabricator`
--
ALTER TABLE `fabricator`
  ADD PRIMARY KEY (`id_fabricator`),
  ADD UNIQUE KEY `fabricator_id` (`id_fabricator`);

--
-- Индексы таблицы `medicinal_product`
--
ALTER TABLE `medicinal_product`
  ADD PRIMARY KEY (`id_medicinal`),
  ADD UNIQUE KEY `id_substanse_prod` (`id_substanse_prod`,`id_fabricator_prod`),
  ADD KEY `id_fabricator_prod` (`id_fabricator_prod`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `medicinal_product`
--
ALTER TABLE `medicinal_product`
  MODIFY `id_medicinal` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `medicinal_product`
--
ALTER TABLE `medicinal_product`
  ADD CONSTRAINT `medicinal_product_ibfk_1` FOREIGN KEY (`id_fabricator_prod`) REFERENCES `fabricator` (`id_fabricator`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medicinal_product_ibfk_2` FOREIGN KEY (`id_substanse_prod`) REFERENCES `active_substance` (`id_substance`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
