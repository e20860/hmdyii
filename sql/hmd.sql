-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 29 2019 г., 11:03
-- Версия сервера: 8.0.13
-- Версия PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hmd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `products` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Корзина покупателя';

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `keywords` varchar(256) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Категории товаров';

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `img`, `keywords`, `description`) VALUES
(1, 'Куклы', 'dolls.jpg', '', 'Куклы ручной работы - отличный подарок как ребёнку так и взрослому.'),
(2, 'Выкройки', 'vykroyki.jpeg', '', 'Выкройки в формате JPG. Легко масштабируются. С их помощью Вы легко создатите свою неповторимую куклу.'),
(3, 'Наборы', 'nabory.jpg', '', 'Наборы для изготовления кукол - простой способ легко и быстро создать свой шедевр'),
(4, 'Мастер-классы', 'master-classy.jpg', '', 'С помощью мастер-классов Вы вместе с нами шаг за шагом постигнете науку создания уникальных кукол.');

-- --------------------------------------------------------

--
-- Структура таблицы `characteristics`
--

CREATE TABLE `characteristics` (
  `id` int(10) UNSIGNED NOT NULL,
  `prod_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `prod_id` int(10) UNSIGNED NOT NULL,
  `file` varchar(255) NOT NULL,
  `ord` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `prod_id`, `file`, `ord`) VALUES
(1, 1, 'dun_01.png', 1),
(2, 1, 'dun01.jpg', 2),
(4, 1, 'dun02.jpg', 3),
(5, 1, 'dun03.jpg', 4),
(6, 2, 'hrs_01.png', 1),
(7, 2, 'hrs01.jpg', 2),
(8, 2, 'hrs02.jpg', 3),
(9, 2, 'hrs03.jpg', 4),
(10, 3, 'pattern1.jpg', 1),
(11, 3, 'pig01.jpg', 2),
(12, 4, 'pig01.jpg', 1),
(13, 4, 'shp01.jpg', 2),
(14, 5, 'nabory.jpg', 1),
(15, 6, 'vk03.jpeg', 1),
(16, 7, 'mk01.jpeg', 1),
(17, 8, 'mk02.jpeg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `lures`
--

CREATE TABLE `lures` (
  `id` int(10) UNSIGNED NOT NULL,
  `lure_cat` tinyint(4) NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `delivery` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Заказ';

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `created_at`, `updated_at`, `name`, `email`, `phone`, `address`, `status`, `delivery`) VALUES
(7, 1, '2019-04-24 13:09:30', '2019-04-24 13:09:30', 'Петя Мулькин', 'mulkin@mail.mu', 'выфаф', 'фе фке ук нукен ерн кер', 2, 1),
(8, 0, '2019-04-24 16:25:57', '2019-04-24 16:25:57', 'Вася Пупкин', 'poupkine@mail.ru', '903-121-22-11', 'Тридевятое царство. Как зайдёшь, так сразу наискосок', 1, 0),
(9, 0, '2019-04-24 16:27:54', '2019-04-24 16:27:54', 'Вася Пупкин', 'poupkine@mail.ru', '+7-000=000', 'sadjfh asdjhf sdjfh j', 1, 0),
(10, 0, '2019-04-24 16:30:20', '2019-04-24 16:30:20', 'Вася Пупкин', 'poupkine@mail.ru', '+7913-321-42-11', 'lsdajfhlakjdshf ljh d', 1, 0),
(11, 0, '2019-04-24 16:56:02', '2019-04-24 16:56:02', 'Коля Титькин', 'titkin@yandex.ru', '1212-1212-212', 'lk;dfsjg kljg lkjg elkj lkfrjg efrkg', 1, 0),
(12, 0, '2019-04-24 17:04:46', '2019-04-24 17:04:46', 'Сузя Тупкин', 'suzya@tupkin.ru', '121-212-122', 'dfjkhasdfhj sadjhf;lsdakjf skjdf ;lkasdjf;lkj', 1, 0),
(13, 0, '2019-04-25 09:33:07', '2019-04-25 09:33:07', 'werwer', '12@12.com', '12312312312', 'jdsfh  as dk;jkhasd sdjfh', 1, 0),
(14, 0, '2019-04-25 10:09:43', '2019-04-25 10:09:43', 'Вася Ложкин', 'hm.doll@yandex.ru', '111-11-111', 'Nhtnmz [fnf cghfdf', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `ord_items`
--

CREATE TABLE `ord_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `ord_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Состав корзины';

--
-- Дамп данных таблицы `ord_items`
--

INSERT INTO `ord_items` (`id`, `ord_id`, `product_id`, `name`, `price`, `quantity`) VALUES
(9, 7, 1, 'Кукла текстильная №1', 2600, 1),
(10, 7, 2, 'Конь в пальто', 2600, 1),
(11, 8, 1, 'Кукла текстильная №1', 2600, 1),
(12, 8, 2, 'Конь в пальто', 2600, 1),
(13, 9, 1, 'Кукла текстильная №1', 2600, 1),
(14, 9, 2, 'Конь в пальто', 2600, 1),
(15, 10, 1, 'Кукла текстильная №1', 2600, 1),
(16, 10, 2, 'Конь в пальто', 2600, 1),
(17, 11, 1, 'Кукла текстильная №1', 2600, 1),
(18, 11, 2, 'Конь в пальто', 2600, 1),
(19, 12, 1, 'Кукла текстильная №1', 2600, 1),
(20, 12, 2, 'Конь в пальто', 2600, 1),
(21, 13, 1, 'Кукла текстильная №1', 2600, 1),
(22, 14, 7, 'Мастер-класс №1', 2600, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `old_price` int(10) NOT NULL,
  `keywords` varchar(256) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `price`, `old_price`, `keywords`, `description`) VALUES
(1, 1, 'Кукла текстильная №1', 2600, 3500, 'Ключевые слова, теги', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat'),
(2, 1, 'Конь в пальто', 2600, 3500, 'Ключевые слова, теги', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat'),
(3, 2, 'Выкройка №1', 2600, 3500, 'Ключевые слова, теги', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat'),
(4, 2, 'Выкройка №2', 2600, 3500, 'Ключевые слова, теги', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat'),
(5, 3, 'Набор №1', 2600, 3500, 'Ключевые слова, теги', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat'),
(6, 3, 'Набор  №2', 2600, 3500, 'Ключевые слова, теги', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat'),
(7, 4, 'Мастер-класс №1', 2600, 3500, 'Ключевые слова, теги', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat'),
(8, 4, 'Мастер-класс №2', 2600, 3500, 'Ключевые слова, теги', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `prod_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `r_date` date NOT NULL,
  `text` text NOT NULL,
  `rating` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Отзывы о товаре';

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'Новый'),
(2, 'Оплачен'),
(3, 'Завершён');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `adress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `name`, `auth_key`, `access_token`, `phone`, `adress`) VALUES
(1, 'Kzkz', 'hm.doll@yandex.ru', '$2y$13$6a6yYkA.W0/SYUBnDeBcPuw8TUCas1bEVp3gXregtegU6st25RoTi', 'Антонина', 'iXtn_YZCTR2TZDsMyPF6lQmW2JhmtZ0l', 'admin', '', ''),
(2, 'papa', 'e20860@mail.ru', '$2y$13$6a6yYkA.W0/SYUBnDeBcPuw8TUCas1bEVp3gXregtegU6st25RoTi', 'Евгений', 'FYYdmkIw7o5NlcRI8dgd4UoKKOtT1sk9', 'admi', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `wish_list`
--

CREATE TABLE `wish_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `products` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Пожелания покупателей';

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `characteristics`
--
ALTER TABLE `characteristics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_IDX` (`prod_id`);

--
-- Индексы таблицы `lures`
--
ALTER TABLE `lures`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `STATUS_IND` (`status`);

--
-- Индексы таблицы `ord_items`
--
ALTER TABLE `ord_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ord_id` (`ord_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `characteristics`
--
ALTER TABLE `characteristics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `lures`
--
ALTER TABLE `lures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `ord_items`
--
ALTER TABLE `ord_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `characteristics`
--
ALTER TABLE `characteristics`
  ADD CONSTRAINT `prod_fc` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `product_fc` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `ord_items`
--
ALTER TABLE `ord_items`
  ADD CONSTRAINT `ord_items_ibfk_1` FOREIGN KEY (`ord_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ord_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `cat_fc` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `prod_r_fc` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
