-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июл 17 2024 г., 17:22
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `online-store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `assortiment`
--

CREATE TABLE `assortiment` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `text` text,
  `type` varchar(11) DEFAULT NULL,
  `small` varchar(11) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '25 см',
  `medium` varchar(11) DEFAULT '30 см',
  `big` varchar(11) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '35 см',
  `price_small` int DEFAULT '500',
  `price_medium` int DEFAULT '700',
  `price_big` int DEFAULT '900'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `assortiment`
--

INSERT INTO `assortiment` (`id`, `name`, `image`, `text`, `type`, `small`, `medium`, `big`, `price_small`, `price_medium`, `price_big`) VALUES
(1, 'Шоколадный кекс', '../project/img/section-catalog/muf1.jpg', 'Кекс с шоколадом', 'muffin', '1 шт', '4 шт', '8 шт', 50, 180, 350),
(2, 'Конфеты из молочного шоколада', '../project/img/section-catalog/cc.jpg', 'Конфеты из молочного шоколада с шоколадной начинкой', 'chocolate', '200 гр', '500 гр', '1000 гр', 150, 380, 750),
(3, 'Печенье с ягодной начинкой', '../project/img/section-catalog/cookie4.jpg', 'Печенье с ягодной начинкой', 'cookie', '200 гр', '500 гр', '1000 гр', 150, 300, 550),
(4, 'Печенье с шоколадом', '../project/img/section-catalog/cookie3.jpg', 'Печенье с шоколадом', 'cookie', '200 гр', '500 гр', '1000 гр', 180, 400, 770),
(5, 'Клубничный кекс', '../project/img/section-catalog/muf4.jpg', 'Кекс с клубникой', 'muffin', '1 шт', '4 шт', '8 шт', 40, 150, 290),
(6, 'Конфеты с ореховой начинкой', '../project/img/section-catalog/cc5.jpg', 'Конфеты из молочного шоколада с ореховой начинкой', 'chocolate', '200 гр', '500 гр', '1000 гр', 200, 400, 800),
(7, 'Печенье с драже', '../project/img/section-catalog/cookie2.jpg', 'Печенье с шоколадным драже', 'cookie', '200 гр', '500 гр', '1000 гр', 170, 350, 650),
(8, 'Конфеты из белого шоколада', '../project/img/section-catalog/cc4.jpg', 'Конфеты из белого шоколада', 'chocolate', '200 гр', '500 гр', '1000 гр', 180, 340, 660),
(9, 'Черничный кекс', '../project/img/section-catalog/muf2.jpg', 'Кекс с черникой', 'muffin', '1 шт', '4 шт', '8 шт', 45, 160, 310);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `assortiment`
--
ALTER TABLE `assortiment`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
