-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 02 2023 г., 23:04
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
-- База данных: `prak`
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
(1, 'Суперкар'),
(2, 'Спорт'),
(3, 'Люкс'),
(4, 'Кроссовер'),
(5, 'Кабриолет');

-- --------------------------------------------------------

--
-- Структура таблицы `korzina`
--

CREATE TABLE `korzina` (
  `id` int NOT NULL,
  `id_tov` int NOT NULL,
  `img` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `about` varchar(100) NOT NULL,
  `kolvo` int NOT NULL,
  `price` int NOT NULL,
  `login` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `brand` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kolvo` int NOT NULL,
  `all` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tovar`
--

INSERT INTO `tovar` (`id`, `name`, `kategory`, `price`, `img`, `about`, `brand`, `country`, `kolvo`, `all`) VALUES
(1, 'Bugatti Veyron Grand', 'Суперкар', 111367200, '1.png', 'Grand Sport Vitesse', 'Tiffany Green', 'Великобритания', 1, 'Всего было выпущено всего 450 Bugatti Veyron, из которых 92, как полагают, являются Grand Sport Vitesse, и еще меньшее количество из них имеют полностью открытый кузов из углеродного волокна. Он войдет в историю как один из самых значительных автомобилей в истории автомобилестроения, став самым быстрым серийным кабриолетом в мире после своей мировой премьеры'),
(2, 'Ferrari F12 TDF', 'Суперкар', 23690000, '2.png', 'Этот изысканный Ferrari 1 из 799 назван в честь Тур де Франс', 'Giallo Triplo Strato', 'Италия', 1, 'Этот изысканный Ferrari 1 из 799 назван в честь Тур де Франс, не велосипедной гонки, а шоссейной гонки, проходившей во Франции, в которой Ferrari доминировала в 50-60-е годы. F12 TDF основан на стандартной модели F12 Berlinetta, но Ferrari сфокусировала его на трассе и довела все аспекты до 11-ти. Мощность невероятного 6,3-литрового V12, который развивает обороты до 8900 об/мин, возросла до чудовищной мощности в 769 л.с. Благодаря использованию деталей двигателя, соответствующих спецификациям гонок. Коробка передач F1 DCT была переработана, чтобы обеспечить на 30% более быстрое переключение передач вверх и на 40% более быстрое переключение передач вниз. TDF также отличается гораздо более угрожающей функциональной аэродинамикой, включая увеличенный сплиттер active-aero и отличительные элементы \"Аэробриджа\" сразу за передними колесами, предназначенные для увеличения прижимной силы и удержания автомобиля на трассе. Добавьте к этому щедрое использование углеродного волокна и хитрости по снижению веса, чтобы добиться экономии веса на 110 кг по сравнению со стандартным F12, и действительно неудивительно, что TDF является одним из самых быстрых легальных дорожных Ferrari в мире.'),
(3, 'McLaren Senna', 'Суперкар', 69689700, '3.png', 'Сенна. Имя, от которого у любого фаната автоспорта мурашки пробегают по спине.', 'MSO Nerello Red', 'Великобритания', 1, 'Сенна. Имя, от которого у любого фаната автоспорта мурашки пробегают по спине. Это связано с тем, что Аритон Сенна широко известен как один из величайших гонщиков Формулы-1 всех времен, выигравший 3 чемпионата мира в составе команды McLaren F1 с конца 80-х по начало 90-х. Перенесемся на 17 лет вперед, и McLaren отдаст дань уважения этому невероятному бразильскому гонщику, создав самый экстремальный дорожный автомобиль McLaren, когда-либо построенный. Это не просто маркетинговое мероприятие для McLaren, поскольку они тщательно спроектировали автомобиль от аэродинамики до шасси и силовой установки и тесно сотрудничали с племянником Айртона Бруно Сенной при разработке автомобиля, а также с Фондом Сенны, чтобы использовать это название.'),
(4, 'Mercedes McLaren', 'Суперкар', 52591617, '4.png', 'Рожденный в результате партнерства McLaren и Mercedes-Benz\r\n', 'Crystal Galaxite Black Metallic', 'Германия', 1, 'Появившийся в результате партнерства McLaren и программы Mercedes-Benz F1 с Гордоном Мюрреем в качестве главного инженера, Mercedes-Benz SLR McLaren был впервые представлен в 1999 году с концептом Vision SLR (Sport Light Racing), вдохновленным купе 300SLR Uhlenhaut. Кокпит отделан карбоновым бачком, а алюминиевый подрамник служит опорой для произведения искусства спереди - 5,4-литрового V8 с наддувом, выдающего чудовищные 617 л.с. Каждая панель кузова изготовлена из углеродного волокна, при этом SLR является одним из первых серийных автомобилей, оснащенных карбон-керамическими тормозами, и первым серийным автомобилем, в котором полностью использован монокок из углеродного волокна.'),
(5, 'Lamborghini Aventador', 'Суперкар', 37689417, '5.png', 'Представлен миру на конкурсе элегантности Pebble Beach Concours d\'Elegance 2018', 'Verde Mantis', 'Италия', 1, 'Представленный миру на Pebble Beach Concours d\'Elegance 2018, SVJ сразу же привлек внимание автомобильного мира как последняя версия Aventador. SVJ (Super Veloce Jota), ограниченный всего 900 экземплярами по всему миру, добавляет букву “J” в конце названия и без того невероятно быстрых вариантов SV. Это, казалось бы, безобидное письмо на самом деле относится к приложению J FIA, содержащему спецификации для омологации автомобиля в гоночной серии, что дает некоторое представление о намерениях этого автомобиля.'),
(6, 'Mercedes AMG', 'Спорт', 36812817, '6.png', 'Черная серия. Флагман из флагманов.', 'Obsidian Black', 'Германия', 1, 'Черная серия. Флагман из флагманов. Самая агрессивная и чистая форма AMG, выпущенная в Аффальтербахе. Рецепт серии Black - это тот, по которому некоторое время создавались короли треков, и итерация AMG GT не стала исключением. Серия AMG GT Black, безусловно, выглядит соответствующим образом: вентиляционные отверстия, жалюзи и агрессивные линии кузова подчеркивают каждый дюйм.'),
(7, 'McLaren Spider', 'Кабриолет', 35059617, '7.png', 'McLaren F1 GTR Longtail был гоночным автомобилем в Ле-Мане\r\n', 'Chicane Effect', 'Великобритания', 1, 'McLaren F1 GTR Longtail был гоночным автомобилем в Ле-Мане, созданным на базе внедорожного McLaren F1. Всего было построено 10 машин, включая прототип, который выиграл свою дебютную гонку в Ле-Мане. Таким образом, огромный успех GTR Формулы-1 в гонках означает, что наследие автоспорта тесно связано с именем Longtail, поэтому оно было передано только самым результативным дорожным McLarens.'),
(8, 'Aston Martin Vanquish', 'Спорт', 32868117, '8.png', 'легендарные партнерские отношения', 'Ming Blue', 'Великобритания', 1, 'Отношения между Aston Martin и Zagato - одно из самых прочных и легендарных партнерских отношений в автомобильном мире. Начиная с 1960 года, когда был создан DB4 GT Zagato, который сейчас продается на аукционе за более чем 10 миллионов фунтов стерлингов, эти два мастера своего дела время от времени собираются вместе, чтобы создать эксклюзивную, ограниченную серию по-настоящему особенных автомобилей. Последним Aston, получившим \"лечение от Zagato\", является и без того потрясающий Vanquish 2012 года выпуска.'),
(9, 'Ferrari 458 Speciale', 'спорт', 31991517, '9.png', 'Ferrari 458 Speciale - это высокопроизводительный', 'Grigio Ferro', 'Италия', 1, 'Ferrari 458 Speciale - это высокопроизводительный вариант уже нашумевшего 458 Italia. Speciale получает множество улучшений производительности, начиная с увеличения мощности 4,5-литрового V8 до чуть менее 600 л.с. при 9000 оборотах в минуту.'),
(10, 'Ferrari 488', 'Спорт', 27608517, '10.png', 'Ferrari 488 Pista - последняя в длинной линейке', 'Rosso Fuoco', 'Италия', 1, 'Ferrari 488 Pista - последняя в длинной линейке феноменальных хардкорных трековых версий суперкаров Ferrari V8. Следуя по стопам таких легенд, как 430 Scuderia и 458 Speciale, за исключением того, что на этот раз есть одно существенное отличие: 488 Pista оснащен турбонаддувом. Некоторые пуристы Ferrari будут воротить нос от Ferrari с турбонаддувом, удобно забывая о легендарном F40, но правда в том, что в наши дни темное искусство турбонаддува на этом уровне значительно эволюционировало и просто дает невероятно мощные силовые агрегаты с крутящим моментом и великолепной линейной подачей.'),
(11, 'Porsche 911', 'Спорт', 17527617, '11.png', 'Porsche 911 Turbo S всегда был непревзойденной машиной.', 'Gentian Blue', 'Германия', 1, 'Porsche 911 Turbo S всегда был непревзойденной машиной для вождения, неизменно демонстрирующей непревзойденные характеристики по всем направлениям.'),
(12, 'Mercedes-Maybach S650', 'Кабриолет', 24106500, '12.png', 'Mercedes-Maybach S650 - это роскошный кабриолет', 'Ruby Black Metallic', 'Германия', 1, 'Mercedes-Maybach S650 - это роскошный кабриолет, сочетающий в себе инженерную точность Mercedes S-класса и роскошь дизайна Maybach.'),
(13, 'Lamborghini Huracán', 'Кабриолет', 20157417, '13.png', 'Lamborghini Huracan LP640-4 Performant', 'Grigio Lynx', 'Италия', 1, 'Как и предыдущая модель LP570-4 Superleggera, Lamborghini Huracan LP640-4 Performante - это максимально ориентированная на трассу облегченная дорожная версия и без того блистательного шедевра Lamborghini V10.'),
(14, 'Porsche 911 Cabriolet', 'Кабриолет', 33900000, '14.png', 'Porsche 911 Turbo S', 'Gentian Blue Metallic', 'Германия', 1, 'Porsche 911 Turbo S всегда был непревзойденной машиной для вождения, неизменно демонстрирующей непревзойденные характеристики по всем направлениям. Поколение 992 вывело этот пакет на новый уровень. Переработанная версия двигателя 992 Carrera расположена сзади с некоторыми дополнительными функциями и изменениями компонентов, включая более широкий канал, симметричные турбины и пьезокристаллические форсунки.'),
(15, 'Ferrari 458 Spider', 'Кабриолет', 14897817, '15.png', 'огромный технологический скачок вперед\r\n', 'Nero Daytona', 'Италия', 1, 'Будучи преемником хорошо зарекомендовавшего себя Ferrari F430 Spider, 458 Spider должен был занять достойное место в качестве следующего \"младшего Ferrari\" в длинной череде впечатляющих примеров со времен Dino - и он занял их. Появление именно этого автомобиля получило широкую оценку как веха в долгой истории Ferrari и один из лучших универсальных суперкаров, когда-либо выпускавшихся Ferrari, представляющий собой огромный технологический скачок вперед по сравнению со своими предшественниками.'),
(16, 'Rolls-Royce Cullinan', 'Кроссовер', 29800017, '16.png', 'материалы высочайшего качества', 'Black Diamond', 'Великобритания', 1, 'Демонстрируя непревзойденную роскошь и утонченность, Cullinan мгновенно стал самым дорогим внедорожником на рынке и, конечно же, понравится ультраэлите. Это первый в мире внедорожник, оснащенный дверями coach, торговой маркой этого престижного британского бренда, который приветствует вас в салоне, как ничто другое прежде, и внутри вы найдете высочайший уровень комфорта и технологий, а также материалы высочайшего качества, доступные в любом автомобиле.\r\n'),
(17, 'Range Rover P530', 'Кроссовер', 17089317, '17.png', 'Range Rover всегда приходит на ум при упоминании слов ‘роскошь’', 'Carpathian Grey', 'Великобритания', 1, 'Range Rover всегда приходит на ум при упоминании слов ‘роскошь’ и ‘внедорожник’. Другие производители, возможно, пытались подражать рецептуре, используемой Land Rover, однако ни у кого из них нет большего опыта в производстве роскошных внедорожников.'),
(18, 'Mercedes AMG G63', 'Кроссовер', 16826337, '18.png', 'Роскошный внедорожник стал обязательным автомобилем на дороге', 'Cavansite Blue Metallic', 'Германия', 1, 'Роскошный внедорожник стал обязательным автомобилем на дороге, и, учитывая множество конкурентов, возможно, ни один из них не вызвал такого большого интереса, как новый G-универсал и, в частности, G63 AMG.'),
(19, 'Bentley Bentayga', 'Кроссовер', 15336117, '19.png', 'Небольшие усовершенствования позволили новой Bentayga заявить о себе', 'Dark Sapphire', 'Великобритания', 1, 'В 2020 году Bentley Bentayga подвергся рестайлингу, улучшившему внешний вид, а также обновившему шасси и интерьер на более новые технологии. Изменения в экстерьере незначительны, но эффективны благодаря немного более агрессивному переднему бамперу и задней двери багажника. Небольшие усовершенствования позволили новой Bentayga заявить о себе на дороге еще больше, чем модели до рестайлинга.\r\n'),
(20, 'Audi RS Q8', 'Кроссовер', 20690000, '20.png', 'Audi RS Q8 - флагманский внедорожник от Audi', 'Navarra Blue', 'Германия', 1, 'Audi RS Q8 - флагманский внедорожник от Audi, оснащенный по последнему слову техники. Внешний дизайн RS Q8 отличается внушительной решеткой радиатора, придающей ему непревзойденный вид на дороге.'),
(21, 'Bentley Continental', 'Люкс', 11566737, '21.png', 'Новый Bentley Continental GT, безусловно, выглядит соответствующим ', 'Onyx Black', 'Великобритания', 1, 'Новый Bentley Continental GT, безусловно, выглядит соответствующим образом: более широкий, удлиненный и в то же время более низкий дизайн кузова придает автомобилю более спортивный вид, сохраняя при этом характерные мускулистые арки задних колес. Плавные линии этого автомобиля создают ощущение скорости и элегантности даже на стоянке, а его выпуклые изгибы намекают на скрытую за ними мощь. Благодаря совершенно новой трансмиссии, состоящей из сильно переработанного двигателя W12 с двойным турбонаддувом, наконец-то работающего в паре с изящной 8-ступенчатой коробкой передач с двойным сцеплением, новый continental не уступает по своим характеристикам.'),
(22, 'Tesla Model X', 'Люкс', 15000000, '22.png', 'После своего выпуска Model X была самым безопасным', 'Midnight Silver Metallic', 'США', 1, 'После своего выпуска Model X была самым безопасным, быстрым и производительным спортивным внедорожником в истории. Модель X Performance Ludicrous с полным приводом в точности соответствует своему названию - невероятно быстрая. Он способен разгоняться с нуля до 62 миль в час всего за 2,8 секунды благодаря аккумулятору емкостью 100 кВт*ч и высокопроизводительному полному приводу. Максимальная скорость составляет 162 мили в час, а Tesla утверждает, что дальность полета составляет 370 миль.'),
(23, 'Maserati MC20', 'Люкс', 21910617, '23.png', 'MC20 - это долгожданный новый двухместный среднемоторный спортивный', 'Nero Essenza', 'Великобритания', 1, 'MC20 - это долгожданный новый двухместный среднемоторный спортивный автомобиль Maserati, выпущенный в сотрудничестве с инжиниринговой компанией Dallara motorsport. Это позволило Maserati впервые использовать монокок из углеродного волокна, что позволило снизить вес и повысить эксплуатационные характеристики. Утверждается, что эта конструкция является самой жесткой из всех, которые Maserati внедрила в производство, улучшая конструкцию легендарного MC12.'),
(24, 'Bugatti Veyron', 'Люкс', 120000000, '24.png', 'С момента своего запуска в 2005 году Bugatti Veyron', 'Single Tone Black Metallic', 'Франция', 1, 'С момента своего запуска в 2005 году Bugatti Veyron стал одним из самых известных автомобилей всех времен. Разработка Veyron была одной из величайших технологических задач, когда-либо известных в автомобильной промышленности, и 17 лет спустя ее достижения, возможно, находят еще больший отклик сегодня. Обладая мощностью 1001 л.с., максимальной скоростью 253 мили в час и способностью разгоняться с 0 до 62 миль в час всего за 2,5 секунды, Veyron стал самым быстрым серийным автомобилем из когда-либо созданных.');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `adres` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `gorod` varchar(100) NOT NULL,
  `fio` varchar(100) NOT NULL,
  `dr` varchar(100) NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `email`, `img`, `adres`, `tel`, `gorod`, `fio`, `dr`, `pass`, `status`) VALUES
(1, 'admin11', '@mail.ru', 'wallpapersden.com_76396-2932x2932.jpg', 'Х211', '89968407531', 'Якутск', 'vdcч', '2004-12-12', 'admin11', '1'),
(13, '11', '13ads1', '0.png', '14asd1', '163541', '15vc1', '17dsf1', '2004-11-11', '11', '0'),
(14, '1342sdf', 'ываsdf', 'wallpapersden.com_76396-2932x2932.jpg', 'sdfsdsdf', '124235', 'ываtyh', 'ываsdf', '3455-05-31', 'q', '1'),
(15, 'Ayar', '123@gmail.com', 'cart-empty.png', '20/2', '21331231', 'Yakutsk', 'Ayar H.Y.', '06.08.2004', '123', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `zakaz`
--

CREATE TABLE `zakaz` (
  `id` int NOT NULL,
  `id_tov` int NOT NULL,
  `img` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `about` varchar(100) NOT NULL,
  `kolvo` int NOT NULL,
  `price` int NOT NULL,
  `login` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `zakaz`
--

INSERT INTO `zakaz` (`id`, `id_tov`, `img`, `name`, `about`, `kolvo`, `price`, `login`, `status`) VALUES
(24, 1, '1.png', 'Bugatti Veyron Grand', 'Grand Sport Vitesse', 1, 111367200, 'ayar', 'Новый');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `korzina`
--
ALTER TABLE `korzina`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `tovar`
--
ALTER TABLE `tovar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `zakaz`
--
ALTER TABLE `zakaz`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
