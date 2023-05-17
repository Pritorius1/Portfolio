-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 11 2022 г., 20:44
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
-- База данных: `bebra`
--

-- --------------------------------------------------------

--
-- Структура таблицы `kategory`
--

CREATE TABLE `kategory` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `kategory`
--

INSERT INTO `kategory` (`id`, `name`) VALUES
(1, 'Седан'),
(2, 'Купэ'),
(3, 'Гиперкар'),
(4, 'Универсал'),
(5, 'Суперкар');

-- --------------------------------------------------------

--
-- Структура таблицы `korzina`
--

CREATE TABLE `korzina` (
  `id` int NOT NULL,
  `id_tov` int NOT NULL,
  `img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kolvo` int NOT NULL,
  `price` int NOT NULL,
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tovar`
--

CREATE TABLE `tovar` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategory` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `material` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sire` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `all` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tovar`
--

INSERT INTO `tovar` (`id`, `name`, `kategory`, `price`, `img`, `about`, `color`, `material`, `sire`, `all`) VALUES
(1, 'mercedes maybach s class', 'Седан', 13000299, '1.png', '', 'Черный', 'Металлик', 'Германия', ''),
(2, 'Rolls Royce Cullinan', 'Универсал', 6641590, '2.png', '\r\n', 'Песчаный', 'Перламутровый', 'Британия', ''),
(3, 'Rolls Royce Wraith', 'Седан', 14000000, '3.png', '', 'Черно-белый', '', '', ''),
(4, 'Bentley Bentayga', 'Купэ', 24000000, '4.png', '', 'Мультиколор', 'Металлик', 'Британия', ''),
(5, 'Pagani Zonda', 'Гиперкар', 87000000, '5.png', '', 'хром, Белый', '', '', ''),
(6, 'koenigsegg Regera', 'Гиперкар', 80000000, '6.png', '', 'Серый', 'Алюминий, карбон', '', ''),
(7, 'Koenigsegg Agera', 'Гиперкар', 89000000, '7.png', '', 'Серый', 'Карбон алюминий', '', ''),
(8, 'Bugatti Veyron', 'Гиперкар', 83000000, '8.png', '', 'Черный', 'Алюминий', '', ''),
(9, 'Bugatti Chiron', 'Гиперкар', 120000000, '9.png', '', 'Черный синий', 'Алюминий карбон', '', ''),
(10, 'Aston-Martin DB9 Carbon White', 'Купэ', 17000000, '10.png', '', 'Белый', 'Карбон', '', ''),
(11, 'BMW M8', 'Купэ', 14000000, '11.png', '', 'Синий', 'Алюминий', '', ''),
(12, 'Tesla Model S', 'Седан', 18000000, '12.png', '', 'Белый', '', '', ''),
(13, 'Tesla Plaid', 'Седан', 19000000, '13.png', '', 'Серый', '', 'США', '\r\n'),
(14, 'Porsche 911', 'Купэ', 24000000, '14.png', '', 'Белый', '', '', ''),
(15, 'Porsche Panamera', 'Седан', 22000000, '15.png', '', 'Черный', 'Металлик', 'Германия', ''),
(16, 'Porsche Cayman', 'Купэ', 28000000, '16.png', '', 'Желтый', '', 'Германия', ''),
(17, 'Porche Taycan', 'Купэ', 26000000, '17.png', '', 'Белый', '', 'Германия', ''),
(18, 'Porche Cayenne', 'Универсал', 10000000, '18.png', '', 'Черный', 'Алюминий', 'Германия', ''),
(19, 'Lamborghini Huracán', 'Спорткар', 23000000, '19.png', '', 'Зеленый', '', '', ''),
(20, 'Lamborghini Urus', 'Универсал', 24000000, '20.png', '', 'Желтый', '', 'Италия', ''),
(21, 'Lamborghini Aventador', 'Суперкар', 38000000, '21.png', '', 'Красный', '', 'Италия', ''),
(22, 'Lamborghini Veneno', 'Гиперкар', 83000000, '22.png', '', 'Графит', '', 'Италия', ''),
(23, 'Lamborghini Centenario', 'Гиперкар', 94000000, '23.png', '', 'Черный', '', 'Италия', ''),
(24, 'Lamborghini Sian', 'Гиперкар', 124000000, '24.png', '', 'Зеленый', '', 'Италия', ''),
(25, 'Ferrari LaFerrari', 'Суперкар', 67000000, '25.png', '', 'Красный', '', 'Италия', ''),
(26, 'Ferrari 812 Superfast', 'Суперкар', 27000000, '26.png', '', 'Желтый', '', 'Италия', ''),
(27, 'Ferrari Roma', 'Суперкар', 20000000, '27.png', '', '', '', 'Италия', ''),
(28, 'Pagani Huayra', 'Гиперкар', 43000000, '28.png', '', '', '', '', '\r\n'),
(29, 'Aston Martin One-77', 'Купэ', 38000000, '29.png', '', '', '', '', ''),
(30, 'Lykan HyperSport', 'Суперкар', 64000000, '30.png', '', 'Черный', '', '', ''),
(31, 'Toyota Corolla IX', 'Седан', 280000, '31.png', 'Квентин Тарантино', 'Белый', 'Алюминий', '', ''),
(32, 'Dodge Viper', 'Купэ', 12, '32.png', 'Кчау', 'Красный', 'Аха', '', ''),
(33, 'McLaren 540', 'Суперкар', 34792185, '33.png', '', 'Серый', '', '', ''),
(34, 'McLaren 720s', 'Суперкар', 67000000, '34.png', '', 'Синий', '', '', ''),
(35, 'McLaren P1', 'Гиперкар', 83000000, '35.png', '', '', 'Черный', '', ''),
(36, 'Aston Martin Valkyrie', 'Гиперкар', 67000000, '36.png', '', 'Серый', '', '', ''),
(37, 'McLaren Senna', 'Гиперкар', 83000000, '37.png', '', 'Небесно синий', '', '', ''),
(38, 'Aston Martin Valhalla', 'Гиперкар', 67000000, '38.png', '', 'Лазурно синий', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `fio` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `pass`, `email`, `adress`, `tel`, `avatar`, `status`, `fio`, `region`) VALUES
(8, 'admin', 'admin', 'admin', 'admin', 'admin', '', 1, 'admin', 'admin'),
(13, '1', '15', 'sdf', 'sdf', 'sdf', '3.png', 0, 'fds', 'sdf');

-- --------------------------------------------------------

--
-- Структура таблицы `zakaz`
--

CREATE TABLE `zakaz` (
  `id` int NOT NULL,
  `id_tov` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `kol-vo` int NOT NULL,
  `about` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `zakaz`
--

INSERT INTO `zakaz` (`id`, `id_tov`, `name`, `img`, `price`, `kol-vo`, `about`, `date`, `login`) VALUES
(18, 1, 'Письменный стол Франческа', '1.png', 13299, 13300, '', '2022-09-27', '1 ');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `kategory`
--
ALTER TABLE `kategory`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `korzina`
--
ALTER TABLE `korzina`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tovar`
--
ALTER TABLE `tovar`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zakaz`
--
ALTER TABLE `zakaz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `kategory`
--
ALTER TABLE `kategory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `korzina`
--
ALTER TABLE `korzina`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT для таблицы `tovar`
--
ALTER TABLE `tovar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `zakaz`
--
ALTER TABLE `zakaz`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
