-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2017 at 02:16 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bilet_tm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `article_category_id` int(11) NOT NULL,
  `image_name` varchar(65) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `article_category_id`, `image_name`, `post_date`) VALUES
(1, 1, '100x100_pic33.png', '2017-08-12 04:46:31'),
(2, 1, '100x100_pic33.png', '2017-08-12 04:51:41'),
(3, 1, '100x100_pic33.png', '2017-08-12 04:52:07'),
(4, 1, '100x100_pic33.png', '2017-08-12 04:52:16'),
(5, 2, NULL, '2017-08-12 05:13:33'),
(6, 3, '50x50_pic22.png', '2017-08-12 06:54:36'),
(7, 3, '50x50_pic22.png', '2017-08-14 07:30:53'),
(8, 3, '50x50_pic22.png', '2017-08-14 07:32:42'),
(9, 3, '50x50_pic22.png', '2017-08-14 07:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE `article_category` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `article_category_translation`
--

CREATE TABLE `article_category_translation` (
  `article_category_id` int(11) NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `article_category_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_category_translation`
--

INSERT INTO `article_category_translation` (`article_category_id`, `language_id`, `article_category_name`) VALUES
(2, 2, 'Maglumat'),
(3, 2, 'Peýdalar'),
(1, 2, 'Täzelikler'),
(2, 1, 'Информация'),
(1, 1, 'Новости'),
(3, 1, 'Примушества');

-- --------------------------------------------------------

--
-- Table structure for table `article_translation`
--

CREATE TABLE `article_translation` (
  `article_id` int(11) NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `html_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_translation`
--

INSERT INTO `article_translation` (`article_id`, `language_id`, `title`, `html_description`) VALUES
(1, 1, 'Прошла вторая по счету выставка «Ярмарка Мастеров»', 'Третьего июня в первые сами мастера собственноручно организовали выставку своих работ, и она прошла на УРА! Учитывая желание публики организовали очередную выставку. Все любители и ценители искусство и те, кто занимается им были приглашены на любительское мероприятия.'),
(2, 1, 'Торжественное празднование 50 дней до начала Игр «Ашхабад 2017»', 'Обратный отсчет оставшихся 50 дней до начала V Азиатских игр в закрытых помещениях и по боевым искусствам широко отпразднован организаторами Игр «Ашхабад 2017» массовыми велопробегами по всей столице, а также проведен медиабрифинг, чтобы проинформировать журналистов о ходе подготовки.'),
(3, 1, 'Запуск продажи билетов на Игры «Ашхабад 2017» по всему Туркменистану', 'В субботу, 29 июля по всему Туркменистану началась продажа билетов на предстоящие V Азиатские игры в закрытых помещениях и по боевым искусствам «Ашхабад 2017».<br /> Более 700 000 билетов поступили в продажу на более чем 220 спортивных сессий. Зрители смогут увидеть выступления лучших спортсменов Азии и Океании по 21 виду спорта в течение 12 дней.'),
(4, 1, 'Современное торговое оборудование для ресторанного бизнеса', '<p>Компания «Туркмен транзит» предлагают широкий выбор оборудования для общепита от различных производителей и по различным ценам: от самых доступных до брендовых.</p>\r\n<ol type=\"1\"><li>Электронное торговое оборудование, POS – системы, сенсорный POS-терминал</li><li>Электронные весы, сканер штрих кода, принтеры этикеток, принтер чеков</li><li>Противокражные рамки</li><li>Расходные материалы</li></ol>'),
(5, 1, 'Куда сходить в Ашхабаде сегодня, завтра на выходных', '<p class=\"theatreInfoText\"><b>Каждую пятницу и субботу, ресторан-клуб «Кервен» подарит вам не забываемые вечера с улетными шоу программами и розыгрышами призов, убойные и зажигательными треками!!!<br />\r\n<i>ул.Арчабиль, отель Чандыбиль<br />\r\nтел. 48 99 90 / 48 99 91</i>\r\n</b></p>\r\n<p class=\"theatreInfoText\">Гасан Мамедов и кафе-бар «Нагина» приглашает всех любителей классической и живой музыки на концерт легендарного Гасана Мамедова! Не упусти возможность насладиться игрой на скрипке в исполнении Гасана Мамедова!<br />\r\n<i>ул. Баба Джепбарова<br />\r\nтел. 22 28 45 / 72 74 73</i>\r\n</p>\r\n<p class=\"theatreInfoText\"><b>Каждый четверг, ЖЕНСКИЙ ДЕНЬ в ASHGABAT Restaurant & Lounge  \r\nМилые дамы, Ashgabat coffee & cafe дарит скидку -30 % на все меню женской компании, а вечером еще и коктейль. Специально для женщин будет живой вокал от Эзиза.<br />\r\n<i>ул.Махтымкули<br />\r\nтел.+993 63 19 80 08<br />\r\nwww.tm-restoran.com</i>\r\n</b></p>\r\n'),
(6, 1, 'Совершать онлайн покупки', '		'),
(7, 1, 'Оставлять свои комментарии', ''),
(8, 1, 'Читать новости', ''),
(9, 1, 'Получать рассылки о предстоящих событиях', '');

-- --------------------------------------------------------

--
-- Table structure for table `auditorium`
--

CREATE TABLE `auditorium` (
  `id` int(10) UNSIGNED NOT NULL,
  `cultural_place_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `seats_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auditorium`
--

INSERT INTO `auditorium` (`id`, `cultural_place_id`, `name`, `seats_no`) VALUES
(1, 1, '1', 50),
(2, 2, '1', 50),
(3, 5, '1', 100);

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7);

-- --------------------------------------------------------

--
-- Table structure for table `category_translation`
--

CREATE TABLE `category_translation` (
  `category_id` tinyint(4) NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_translation`
--

INSERT INTO `category_translation` (`category_id`, `language_id`, `category_name`) VALUES
(6, 2, 'ÇAGALAR'),
(1, 2, 'ESASY'),
(2, 2, 'KINOTEATR'),
(5, 2, 'KONSERT'),
(4, 2, 'SERGI'),
(7, 2, 'SPORT'),
(3, 2, 'TEATR'),
(4, 1, 'ВЫСТАВКА'),
(1, 1, 'ГЛАВНЫЙ'),
(6, 1, 'ДЕТИ'),
(2, 1, 'КИНОТЕАТР'),
(5, 1, 'КОНЦЕРТ'),
(7, 1, 'СПОРТ'),
(3, 1, 'ТЕАТР');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) UNSIGNED NOT NULL,
  `show_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `comment` longtext NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `star_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `show_id`, `user_id`, `name`, `comment`, `comment_date`, `star_count`) VALUES
(1, 1, 1, 'shagy', 'govy', '2017-08-23 06:40:22', 4),
(2, 7, 1, 'shagy', 'helooo', '2017-08-24 06:45:21', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cultural_place`
--

CREATE TABLE `cultural_place` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `tel1` varchar(45) NOT NULL,
  `tel2` varchar(45) DEFAULT NULL,
  `tel3` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `email` varchar(65) DEFAULT NULL,
  `image_name` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cultural_place`
--

INSERT INTO `cultural_place` (`id`, `category_id`, `tel1`, `tel2`, `tel3`, `fax`, `email`, `image_name`) VALUES
(1, 2, '111111', '111112', '111113', '111114', 'kino1@mail.ru', 'kino1'),
(2, 2, '222221', '222222', '222223', '222224', 'kino2@mail.ru', 'kino2'),
(3, 3, '333331', '333332', '333333', '333334', 'teatr1@mail.ru', 'mollanepesTeatr'),
(4, 3, '333332', '333333', '333334', '333335', 'teatr2@mail.ru', 'mainTeatr'),
(5, 4, '(+993)12 39 89 81', '(+993)12 39 88 38', '(+993)12 39 88 92', '(+993) 12 39 89 79', 'info@cci.gov.tm', 'exhibition1');

-- --------------------------------------------------------

--
-- Table structure for table `cultural_place_translation`
--

CREATE TABLE `cultural_place_translation` (
  `cultural_place_id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `place_name` varchar(100) NOT NULL,
  `cultural_place_description` text NOT NULL,
  `place_city` varchar(45) NOT NULL,
  `place_street` varchar(65) NOT NULL,
  `work_hour` varchar(45) DEFAULT NULL,
  `off_day` varchar(45) DEFAULT NULL,
  `bus` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cultural_place_translation`
--

INSERT INTO `cultural_place_translation` (`cultural_place_id`, `language_id`, `place_name`, `cultural_place_description`, `place_city`, `place_street`, `work_hour`, `off_day`, `bus`) VALUES
(1, 1, 'Кинотеатр 1', 'про кинотеатр 1', 'Ашхабад', 'ул. Махтымкули 56', 'с 9:00 до 18:00 Обед с 13:00 до 14:00', 'Суббота и Воскресение', '1, 2, 3, 4'),
(1, 2, 'Kinoteatr 1', 'kinoteatr 1 barada', 'Aşgabat', 'köçe Magtymguly 56', '9\'dan 18\'e çenli, Arakesme 1\'dan 2\'a çenli', 'Şenbe we Ýekşenbe', '1, 2, 3, 4'),
(2, 1, 'Кинотеатр 2', 'про кинотеатр 2', 'Ашхабад', 'ул. Кемине 65', 'с 8:00 до 17:00 Обед с 12:00 до 13:00', 'Воскресение', '5, 6, 8, 9'),
(2, 2, 'kinoteatr2', 'Kinoteatr 2 barada', 'Aşgabat', 'köçe Kemine 65', '8\'den 17\'ä çenli, Arakesme 12\'den 1\'a çenli', 'Ýekşenbe', '4, 5, 6, 9'),
(3, 1, 'Театр моллонепес', 'про моллонепес', 'Ашхабад', 'ул. молонепес 95', 'с 9:00 до 18:00, Обед с 13:00 до 14:00', 'Суббота и Воскресение', '1, 2, 3, 4'),
(3, 2, 'Mollonepes Teatry', 'mollonepes barada', 'Aşgabat', 'köçe Mollonepes 95', '9\'dan 18\'e çenli, Arakesme 1den 2\'ä çenli', 'Şenbe Ýekşenbe', '1, 2, 3, 4'),
(4, 1, 'Театр Главный', 'про главный', 'Ашхабад', 'ул. Главный 65', 'с 10:00 до 19:00, Обед с 14:00 до 15:00', 'Воскресение', '5, 6, 7, 8'),
(4, 2, 'Esasy Teatr', 'Esasy teatr barada', 'Aşgabat', 'köçe esasy 65', '10\'dan 19\'a çenli, Arakesme 2den 3\'e çenli', 'Ýekşenbe', '5, 6, 7, 8'),
(5, 1, 'Выставочный зал Торгово-промышленной палаты', 'Все информация про выставочный зал', 'Ашхабад', 'пр. Чандыбиль', 'с 9:00 до 18:00, Обед с 13:00 до 14:00', 'Воскресение', '58');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `code` varchar(10) NOT NULL,
  `locale` varchar(225) NOT NULL,
  `image` varchar(65) NOT NULL,
  `directory` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`, `code`, `locale`, `image`, `directory`) VALUES
(1, 'Руский', 'RU', 'ru-RU', '', ''),
(2, 'Türkmençe', 'TM', 'tk-TKM', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `show_id` int(10) UNSIGNED NOT NULL,
  `like_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`id`, `user_id`, `show_id`, `like_status`) VALUES
(4, 1, 1, 1),
(5, 1, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1503390290),
('m140209_132017_init', 1503392453),
('m140403_174025_create_account_table', 1503392453),
('m140504_113157_update_tables', 1503392453),
('m140504_130429_create_token_table', 1503392453),
('m140506_102106_rbac_init', 1503649518),
('m140830_171933_fix_ip_field', 1503392453),
('m140830_172703_change_account_table_name', 1503392453),
('m141222_110026_update_ip_field', 1503392453),
('m141222_135246_alter_username_length', 1503392453),
('m150614_103145_update_social_account_table', 1503392453),
('m150623_212711_fix_username_notnull', 1503392453),
('m151218_234654_add_timezone_to_profile', 1503392453),
('m160929_103127_add_last_login_at_to_user_table', 1503392453);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `show_id` int(10) UNSIGNED NOT NULL,
  `ticket_count` int(11) NOT NULL,
  `amount` decimal(6,2) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `confirmation_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `show_id`, `ticket_count`, `amount`, `date_created`, `confirmation_number`) VALUES
(1, 1, 1, 1, '30.00', '2017-08-23 11:24:15', 'asasas-asas-asas-as');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(1, 'Leo', 'leo@mail.ru', 'leo@mail.ru', 'da225a326dc25180401ee0a54a2de95a', 'turkmenistan', 'http://leo.ru', 'i am leo hahaha', 'Asia/Ashgabat'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(10) UNSIGNED NOT NULL,
  `reservation_type_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `screening_id` int(10) UNSIGNED NOT NULL,
  `reserved` tinyint(1) NOT NULL,
  `ext_order_id` varchar(100) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `reserv_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reserv_hour` int(11) NOT NULL,
  `reserv_min` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `reservation_type_id`, `user_id`, `screening_id`, `reserved`, `ext_order_id`, `paid`, `active`, `reserv_date`, `reserv_hour`, `reserv_min`) VALUES
(1, 1, 1, 1, 0, '', 0, 0, '2017-08-25 12:07:30', 17, 16),
(2, 1, 1, 1, 0, '', 0, 0, '2017-08-25 12:07:24', 17, 19),
(3, 1, 1, 1, 0, '', 0, 0, '2017-08-25 12:07:19', 17, 20),
(4, 1, 1, 1, 0, '', 0, 0, '2017-08-25 12:07:13', 17, 21),
(5, 1, 1, 1, 0, '', 0, 0, '2017-08-25 12:07:06', 17, 22),
(6, 1, 1, 1, 0, '', 0, 0, '2017-08-25 12:07:00', 17, 24),
(7, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 12:06:07', 10, 30),
(8, 1, 1, 1, 0, '', 0, 0, '2017-08-19 08:31:15', 12, 53),
(9, 1, 1, 1, 0, '', 0, 0, '2017-08-19 08:31:15', 12, 56),
(10, 1, 1, 1, 0, '', 0, 0, '2017-08-19 09:21:42', 13, 32),
(11, 1, 1, 1, 0, '', 0, 0, '2017-08-19 10:00:30', 14, 56),
(12, 1, 1, 1, 0, '', 0, 0, '2017-08-19 10:10:30', 15, 4),
(13, 1, 1, 2, 0, '', 0, 0, '2017-08-19 10:10:30', 15, 4),
(14, 1, 1, 2, 0, '', 0, 0, '2017-08-19 10:50:30', 15, 46),
(15, 1, 1, 1, 0, '', 0, 0, '2017-08-22 12:15:30', 16, 53),
(16, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 05:50:30', 10, 28),
(17, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 05:55:30', 10, 31),
(18, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 06:10:30', 10, 49),
(19, 1, 1, 2, 0, 'a-1', 0, 0, '2017-08-25 07:30:31', 12, 10),
(20, 1, 1, 2, 0, 'a-1', 0, 0, '2017-08-25 07:35:31', 12, 14),
(21, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 07:40:31', 12, 19),
(22, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 07:40:31', 12, 19),
(23, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 07:50:30', 12, 26),
(24, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 07:50:30', 12, 27),
(25, 1, 1, 2, 0, 'a-1', 0, 0, '2017-08-25 07:50:31', 12, 27),
(26, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 07:55:31', 12, 31),
(27, 1, 1, 2, 0, 'a-1', 0, 0, '2017-08-25 07:55:31', 12, 31),
(28, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 10:35:31', 15, 15),
(29, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 10:40:31', 15, 16),
(30, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 10:45:31', 15, 22),
(31, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 10:50:31', 15, 29),
(32, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 10:55:30', 15, 33),
(33, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 10:55:30', 15, 34),
(34, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:00:30', 15, 36),
(35, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:00:30', 15, 39),
(36, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:05:30', 15, 42),
(37, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:05:30', 15, 43),
(38, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:10:30', 15, 47),
(39, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:15:30', 15, 54),
(40, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:15:30', 15, 54),
(41, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:15:30', 15, 55),
(42, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:15:30', 15, 55),
(43, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:20:30', 15, 57),
(44, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:20:30', 15, 58),
(45, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:20:30', 16, 0),
(46, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:20:30', 16, 0),
(47, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:25:30', 16, 1),
(48, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:30:30', 16, 10),
(49, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:40:30', 16, 20),
(50, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:45:30', 16, 25),
(51, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:50:30', 16, 26),
(52, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:50:30', 16, 26),
(53, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:50:30', 16, 27),
(54, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:50:30', 16, 27),
(55, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 11:55:30', 16, 33),
(56, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 12:05:30', 16, 42),
(57, 1, 1, 2, 0, 'a-1', 0, 0, '2017-08-25 12:10:30', 16, 50),
(58, 1, 1, 2, 0, 'a-1', 0, 0, '2017-08-25 12:15:30', 16, 52),
(59, 1, 1, 2, 0, 'a-1', 0, 0, '2017-08-25 12:25:30', 17, 1),
(60, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 12:25:30', 17, 1),
(61, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 12:25:30', 17, 1),
(62, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 12:25:30', 17, 2),
(63, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 12:25:30', 17, 2),
(64, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 12:30:30', 17, 6),
(65, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 12:30:30', 17, 7),
(66, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-25 12:55:30', 17, 35),
(67, 1, 1, 2, 1, 'a-1', 0, 1, '2017-08-25 13:09:18', 18, 9),
(68, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-28 11:00:30', 15, 39),
(69, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-28 11:15:30', 15, 53),
(70, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-28 11:40:30', 16, 19),
(71, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-28 11:40:30', 16, 20),
(72, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-28 11:45:30', 16, 21),
(73, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-28 11:45:30', 16, 23),
(74, 1, 1, 1, 0, 'a-1', 0, 0, '2017-08-28 11:45:30', 16, 25);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_type`
--

CREATE TABLE `reservation_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `reservation_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation_type`
--

INSERT INTO `reservation_type` (`id`, `reservation_type`) VALUES
(1, 'regular');

-- --------------------------------------------------------

--
-- Table structure for table `screening`
--

CREATE TABLE `screening` (
  `id` int(10) UNSIGNED NOT NULL,
  `auditorium_id` int(10) UNSIGNED NOT NULL,
  `show_id` int(10) UNSIGNED NOT NULL,
  `screening_start` date NOT NULL,
  `start_hour` int(11) NOT NULL,
  `start_min` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `screening`
--

INSERT INTO `screening` (`id`, `auditorium_id`, `show_id`, `screening_start`, `start_hour`, `start_min`) VALUES
(1, 1, 1, '2017-08-10', 17, 45),
(2, 2, 2, '2017-08-10', 17, 15);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `id` int(10) UNSIGNED NOT NULL,
  `auditorium_id` int(10) UNSIGNED NOT NULL,
  `row` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`id`, `auditorium_id`, `row`, `number`) VALUES
(1, 1, 10, 5),
(2, 2, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `seat_reserved`
--

CREATE TABLE `seat_reserved` (
  `id` int(10) UNSIGNED NOT NULL,
  `seat_id` int(10) UNSIGNED NOT NULL,
  `screening_id` int(10) UNSIGNED NOT NULL,
  `reservation_id` int(10) UNSIGNED NOT NULL,
  `row` int(11) NOT NULL,
  `colum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seat_reserved`
--

INSERT INTO `seat_reserved` (`id`, `seat_id`, `screening_id`, `reservation_id`, `row`, `colum`) VALUES
(1, 1, 1, 4, 1, 3),
(2, 1, 1, 5, 10, 5),
(3, 1, 1, 6, 5, 3),
(4, 1, 1, 6, 5, 4),
(5, 1, 1, 7, 1, 1),
(6, 1, 1, 8, 1, 2),
(7, 1, 1, 8, 1, 3),
(8, 1, 1, 8, 1, 4),
(9, 1, 1, 8, 1, 5),
(10, 1, 1, 9, 2, 1),
(11, 1, 1, 9, 2, 2),
(12, 1, 1, 9, 2, 3),
(13, 1, 1, 9, 2, 4),
(14, 1, 1, 9, 2, 5),
(15, 1, 1, 10, 1, 2),
(16, 1, 1, 10, 1, 3),
(17, 1, 1, 10, 1, 4),
(18, 1, 1, 10, 1, 5),
(19, 1, 1, 11, 1, 2),
(20, 1, 1, 11, 1, 3),
(21, 1, 1, 11, 1, 4),
(22, 1, 1, 11, 1, 5),
(23, 1, 1, 12, 1, 2),
(24, 1, 1, 12, 1, 3),
(25, 1, 1, 12, 1, 4),
(26, 1, 1, 12, 1, 5),
(27, 2, 2, 13, 1, 1),
(28, 2, 2, 13, 1, 2),
(29, 2, 2, 13, 1, 3),
(30, 2, 2, 13, 1, 4),
(31, 2, 2, 13, 1, 5),
(32, 2, 2, 13, 1, 6),
(33, 2, 2, 13, 1, 7),
(34, 2, 2, 13, 1, 8),
(35, 2, 2, 13, 1, 9),
(36, 2, 2, 13, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `show`
--

CREATE TABLE `show` (
  `id` int(10) UNSIGNED NOT NULL,
  `show_category_id` int(10) UNSIGNED NOT NULL,
  `cultural_place_id` int(10) UNSIGNED NOT NULL,
  `begin_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `start_hour` int(11) NOT NULL,
  `start_min` int(11) NOT NULL,
  `end_hour` int(11) NOT NULL,
  `end_min` int(11) NOT NULL,
  `image_name` varchar(65) NOT NULL,
  `show_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `show`
--

INSERT INTO `show` (`id`, `show_category_id`, `cultural_place_id`, `begin_date`, `end_date`, `start_hour`, `start_min`, `end_hour`, `end_min`, `image_name`, `show_status`) VALUES
(1, 1, 1, '2017-08-30 00:00:00', '2017-08-30 00:00:00', 19, 45, 19, 50, '200x150_pic22.png', 1),
(2, 1, 2, '2017-08-26 00:00:00', '2017-08-26 00:00:00', 17, 15, 19, 30, '200x150_pic22.png', 1),
(3, 1, 1, '2017-08-11 00:00:00', '2017-08-11 00:00:00', 17, 30, 18, 45, '200x150_pic22.png', 1),
(4, 1, 2, '2017-08-11 00:00:00', '2017-08-11 00:00:00', 15, 45, 17, 50, '200x150_pic22.png', 1),
(5, 3, 5, '2017-09-07 00:00:00', '2017-09-09 00:00:00', 9, 0, 16, 0, '200x150_pic22.png', 0),
(6, 3, 5, '2017-10-03 00:00:00', '2017-10-05 00:00:00', 9, 0, 16, 0, '200x150_pic22.png', 0),
(7, 3, 5, '2017-10-11 00:00:00', '2017-10-12 00:00:00', 9, 0, 16, 0, '200x150_pic22.png', 0),
(8, 3, 5, '2017-11-01 00:00:00', '2017-11-02 00:00:00', 9, 0, 16, 0, '200x150_pic22.png', 0),
(9, 3, 5, '2017-11-09 00:00:00', '2017-11-11 00:00:00', 9, 0, 16, 0, '200x150_pic22.png', 0),
(10, 3, 5, '2017-11-25 00:00:00', '2017-11-26 00:00:00', 9, 0, 16, 0, '200x150_pic22.png', 0),
(11, 3, 5, '2017-12-01 00:00:00', '2017-12-05 00:00:00', 9, 0, 16, 0, '200x150_pic22.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `show_category`
--

CREATE TABLE `show_category` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `show_category`
--

INSERT INTO `show_category` (`id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `show_category_translation`
--

CREATE TABLE `show_category_translation` (
  `show_category_id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `show_category_translation`
--

INSERT INTO `show_category_translation` (`show_category_id`, `language_id`, `category_name`) VALUES
(1, 2, 'Kino'),
(3, 2, 'Sergi'),
(2, 2, 'Teatr'),
(3, 1, 'Выставка'),
(1, 1, 'Кино'),
(2, 1, 'Театр');

-- --------------------------------------------------------

--
-- Table structure for table `show_translation`
--

CREATE TABLE `show_translation` (
  `show_id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `show_name` varchar(65) NOT NULL,
  `show_description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `show_translation`
--

INSERT INTO `show_translation` (`show_id`, `language_id`, `show_name`, `show_description`) VALUES
(1, 1, 'Человек Паук 3', 'филм про парня которы спасает мир от злодеев'),
(1, 2, 'Möý adam 3', 'dünyani erbetliklerden goraýan bir oglan barada'),
(2, 1, 'Фарсаж 5', 'про гонки'),
(2, 2, 'Farsaj 5', 'maşyn ýaryş barada'),
(3, 1, 'Гари потер', 'фильм про магии '),
(3, 2, 'Gari Poter', 'jadygöýler barada kino'),
(4, 1, 'Гадкий Я', 'про минионов'),
(4, 2, 'Men Biderek', 'minionlar barada kino'),
(5, 1, 'Развития энергетической промышленности', 'Международная выставка и научная конференция «Основные направления развития энергетической промышленности Туркменистана»'),
(6, 1, 'Научная конференция', 'XI Международная выставка и научная конференция телекоммуникации, телеметрии и информационных технологий «Туркментел – 2017»'),
(7, 1, 'Выставка экономических достижений Туркменистана', 'Выставка экономических достижений Туркменистана, посвященная 26-ти летию Независимости Туркменистана'),
(8, 1, 'Туристическая выставка ', 'Международная туристическая выставка и конференция «Туризм и путешествия»'),
(9, 1, 'Научная конференция', 'Международная выставка и научная конференция «Образование и спорт в эпоху могущества и счастья»'),
(10, 1, 'Выставка-ярмарка хлопковой продукции', 'VII международная выставка-ярмарка хлопковой продукции Туркменистана и международная конференция «Хлопковая продукция Туркменистана и мировой рынок»'),
(11, 1, 'Выставка производственных технологий', 'Международная выставка производственных технологий импортозамещения');

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`id`, `email`) VALUES
(1, 'shuhratberdiyev@gmail.com'),
(2, 'shuhratberdiyev@gmail.com'),
(3, 'shuhratberdiyev@gmail.com'),
(4, 'shuhratberdiyev@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(10) UNSIGNED NOT NULL,
  `show_id` int(10) UNSIGNED NOT NULL,
  `total_ticket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `show_id`, `total_ticket`) VALUES
(1, 1, 50),
(2, 2, 40),
(3, 3, 45),
(4, 4, 30);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_data_option_translation`
--

CREATE TABLE `ticket_data_option_translation` (
  `ticket_option_data_id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `option_value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_data_option_translation`
--

INSERT INTO `ticket_data_option_translation` (`ticket_option_data_id`, `language_id`, `option_value`) VALUES
(1, 1, 'Рубль'),
(1, 2, 'Manat'),
(2, 1, 'Рубль'),
(2, 2, 'Manat'),
(3, 1, 'Рубль'),
(3, 2, 'Manat'),
(4, 1, 'Рубль'),
(4, 2, 'Manat'),
(5, 1, 'Рубль'),
(5, 2, 'Manat');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_has_order`
--

CREATE TABLE `ticket_has_order` (
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `seat_reserved_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_option`
--

CREATE TABLE `ticket_option` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_option`
--

INSERT INTO `ticket_option` (`id`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_option_data`
--

CREATE TABLE `ticket_option_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_option_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `ticket_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_option_data`
--

INSERT INTO `ticket_option_data` (`id`, `ticket_option_id`, `ticket_id`, `ticket_price`) VALUES
(1, 1, 1, 30),
(2, 2, 1, 50),
(3, 1, 2, 30),
(4, 1, 3, 30),
(5, 1, 4, 30);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_option_translation`
--

CREATE TABLE `ticket_option_translation` (
  `ticket_option_id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `option_name` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_option_translation`
--

INSERT INTO `ticket_option_translation` (`ticket_option_id`, `language_id`, `option_name`) VALUES
(1, 1, 'Обычный'),
(1, 2, 'Ýönekeý'),
(2, 1, 'Вип'),
(2, 2, 'Wip');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(2, 'HuCkOo5UmJfhrVkwqzoI8Q3Kj-GkVWg_', 1503462711, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `last_login_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`) VALUES
(1, 'shagy', 'shuhratberdiyev@gmail.com', '$2y$12$MogTTv25TmWv4/BwSsli9usqMaXHdM2zCIwfEkF9TqDkkdslrVVYO', '5rfW5trLfcdoqJSPd8vVDJ7eo6iEfd-J', 1503564382, NULL, NULL, '::1', 1503393288, 1503556878, 0, 1503917582),
(2, 'admin', 'shagy@mail.ru', '$2y$12$fRNzGZ7DVMFppA1Dlxs5MewJOiEXaK/Ra/fEQbzALpQ.W6IYbBdYC', 'kmlv-89THl12xp47jAImUQdkJPSRMQ6f', 1503472732, NULL, NULL, '::1', 1503462711, 1503462711, 0, 1503638280);

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `id` int(10) UNSIGNED NOT NULL,
  `show_id` int(10) UNSIGNED NOT NULL,
  `number_visit` int(11) NOT NULL,
  `date_visit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_article_article_category1_idx` (`article_category_id`);

--
-- Indexes for table `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `article_category_translation`
--
ALTER TABLE `article_category_translation`
  ADD PRIMARY KEY (`article_category_id`,`language_id`),
  ADD UNIQUE KEY `article_category_name_UNIQUE` (`article_category_name`),
  ADD KEY `fk_article_category_translation_language1_idx` (`language_id`);

--
-- Indexes for table `article_translation`
--
ALTER TABLE `article_translation`
  ADD PRIMARY KEY (`article_id`,`language_id`),
  ADD KEY `fk_article_translation_language1_idx` (`language_id`);

--
-- Indexes for table `auditorium`
--
ALTER TABLE `auditorium`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_auditorium_cultural_place1_idx` (`cultural_place_id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_translation`
--
ALTER TABLE `category_translation`
  ADD PRIMARY KEY (`category_id`,`language_id`),
  ADD UNIQUE KEY `category_name_UNIQUE` (`category_name`),
  ADD KEY `fk_table1_language1_idx` (`language_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_show1_idx` (`show_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cultural_place`
--
ALTER TABLE `cultural_place`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tel1_UNIQUE` (`tel1`),
  ADD KEY `fk_public_center_category_idx` (`category_id`);

--
-- Indexes for table `cultural_place_translation`
--
ALTER TABLE `cultural_place_translation`
  ADD PRIMARY KEY (`cultural_place_id`,`language_id`),
  ADD KEY `fk_cultural_place_translation_language1_idx` (`language_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_like_user1_idx` (`user_id`),
  ADD KEY `fk_like_show1_idx` (`show_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_user1_idx` (`user_id`),
  ADD KEY `fk_order_show1_idx` (`show_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reservation_reservation_type1_idx` (`reservation_type_id`),
  ADD KEY `fk_reservation_user1_idx` (`user_id`),
  ADD KEY `fk_reservation_screening1_idx` (`screening_id`);

--
-- Indexes for table `reservation_type`
--
ALTER TABLE `reservation_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `screening`
--
ALTER TABLE `screening`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_screening_auditorium1_idx` (`auditorium_id`),
  ADD KEY `fk_screening_show1_idx` (`show_id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_seat_auditorium1_idx` (`auditorium_id`);

--
-- Indexes for table `seat_reserved`
--
ALTER TABLE `seat_reserved`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_seat_reserved_seat1_idx` (`seat_id`),
  ADD KEY `fk_seat_reserved_screening1_idx` (`screening_id`),
  ADD KEY `fk_seat_reserved_reservation1_idx` (`reservation_id`);

--
-- Indexes for table `show`
--
ALTER TABLE `show`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_show_show_category1_idx` (`show_category_id`),
  ADD KEY `fk_show_cultural_place1_idx` (`cultural_place_id`);

--
-- Indexes for table `show_category`
--
ALTER TABLE `show_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `show_category_translation`
--
ALTER TABLE `show_category_translation`
  ADD PRIMARY KEY (`show_category_id`,`language_id`),
  ADD UNIQUE KEY `category_name_UNIQUE` (`category_name`),
  ADD KEY `fk_show_category_translation_language1_idx` (`language_id`);

--
-- Indexes for table `show_translation`
--
ALTER TABLE `show_translation`
  ADD PRIMARY KEY (`show_id`,`language_id`),
  ADD KEY `fk_show_translation_show1_idx` (`show_id`),
  ADD KEY `fk_show_translation_language1` (`language_id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ticket_show1_idx` (`show_id`);

--
-- Indexes for table `ticket_data_option_translation`
--
ALTER TABLE `ticket_data_option_translation`
  ADD PRIMARY KEY (`ticket_option_data_id`,`language_id`),
  ADD KEY `fk_ticket_data_option_translation_language1_idx` (`language_id`);

--
-- Indexes for table `ticket_has_order`
--
ALTER TABLE `ticket_has_order`
  ADD PRIMARY KEY (`ticket_id`,`order_id`,`seat_reserved_id`),
  ADD KEY `fk_ticket_has_order_order1_idx` (`order_id`),
  ADD KEY `fk_ticket_has_order_ticket1_idx` (`ticket_id`),
  ADD KEY `fk_ticket_has_order_seat_reserved1_idx` (`seat_reserved_id`);

--
-- Indexes for table `ticket_option`
--
ALTER TABLE `ticket_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_option_data`
--
ALTER TABLE `ticket_option_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ticket_option_data_ticket_option1_idx` (`ticket_option_id`),
  ADD KEY `fk_ticket_option_data_ticket1_idx` (`ticket_id`);

--
-- Indexes for table `ticket_option_translation`
--
ALTER TABLE `ticket_option_translation`
  ADD PRIMARY KEY (`ticket_option_id`,`language_id`),
  ADD KEY `fk_table2_language1_idx` (`language_id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_visit_show1_idx` (`show_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `article_category`
--
ALTER TABLE `article_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `auditorium`
--
ALTER TABLE `auditorium`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cultural_place`
--
ALTER TABLE `cultural_place`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `reservation_type`
--
ALTER TABLE `reservation_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `screening`
--
ALTER TABLE `screening`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `seat_reserved`
--
ALTER TABLE `seat_reserved`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `show`
--
ALTER TABLE `show`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `show_category`
--
ALTER TABLE `show_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ticket_option`
--
ALTER TABLE `ticket_option`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ticket_option_data`
--
ALTER TABLE `ticket_option_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_article_category1` FOREIGN KEY (`article_category_id`) REFERENCES `article_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `article_category_translation`
--
ALTER TABLE `article_category_translation`
  ADD CONSTRAINT `fk_article_category_translation_article_category1` FOREIGN KEY (`article_category_id`) REFERENCES `article_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_article_category_translation_language1` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `article_translation`
--
ALTER TABLE `article_translation`
  ADD CONSTRAINT `fk_article_translation_article1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_article_translation_language1` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `auditorium`
--
ALTER TABLE `auditorium`
  ADD CONSTRAINT `fk_auditorium_cultural_place1` FOREIGN KEY (`cultural_place_id`) REFERENCES `cultural_place` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_translation`
--
ALTER TABLE `category_translation`
  ADD CONSTRAINT `fk_table1_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_table1_language1` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_show1` FOREIGN KEY (`show_id`) REFERENCES `show` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cultural_place`
--
ALTER TABLE `cultural_place`
  ADD CONSTRAINT `fk_public_center_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cultural_place_translation`
--
ALTER TABLE `cultural_place_translation`
  ADD CONSTRAINT `fk_cultural_place_translation_cultural_place1` FOREIGN KEY (`cultural_place_id`) REFERENCES `cultural_place` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cultural_place_translation_language1` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `fk_like_show1` FOREIGN KEY (`show_id`) REFERENCES `show` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_like_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_show1` FOREIGN KEY (`show_id`) REFERENCES `show` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_reservation_reservation_type1` FOREIGN KEY (`reservation_type_id`) REFERENCES `reservation_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservation_screening1` FOREIGN KEY (`screening_id`) REFERENCES `screening` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservation_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `screening`
--
ALTER TABLE `screening`
  ADD CONSTRAINT `fk_screening_auditorium1` FOREIGN KEY (`auditorium_id`) REFERENCES `auditorium` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_screening_show1` FOREIGN KEY (`show_id`) REFERENCES `show` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `fk_seat_auditorium1` FOREIGN KEY (`auditorium_id`) REFERENCES `auditorium` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `seat_reserved`
--
ALTER TABLE `seat_reserved`
  ADD CONSTRAINT `fk_seat_reserved_reservation1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_seat_reserved_screening1` FOREIGN KEY (`screening_id`) REFERENCES `screening` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_seat_reserved_seat1` FOREIGN KEY (`seat_id`) REFERENCES `seat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `show`
--
ALTER TABLE `show`
  ADD CONSTRAINT `fk_show_cultural_place1` FOREIGN KEY (`cultural_place_id`) REFERENCES `cultural_place` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_show_show_category1` FOREIGN KEY (`show_category_id`) REFERENCES `show_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `show_category_translation`
--
ALTER TABLE `show_category_translation`
  ADD CONSTRAINT `fk_show_category_translation_language1` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_table1_show_category1` FOREIGN KEY (`show_category_id`) REFERENCES `show_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `show_translation`
--
ALTER TABLE `show_translation`
  ADD CONSTRAINT `fk_show_translation_language1` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_show_translation_show1` FOREIGN KEY (`show_id`) REFERENCES `show` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_ticket_show1` FOREIGN KEY (`show_id`) REFERENCES `show` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ticket_data_option_translation`
--
ALTER TABLE `ticket_data_option_translation`
  ADD CONSTRAINT `fk_ticket_data_option_translation_language1` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_data_option_translation_ticket_option_data1` FOREIGN KEY (`ticket_option_data_id`) REFERENCES `ticket_option_data` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ticket_has_order`
--
ALTER TABLE `ticket_has_order`
  ADD CONSTRAINT `fk_ticket_has_order_order1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_has_order_seat_reserved1` FOREIGN KEY (`seat_reserved_id`) REFERENCES `seat_reserved` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_has_order_ticket1` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ticket_option_data`
--
ALTER TABLE `ticket_option_data`
  ADD CONSTRAINT `fk_ticket_option_data_ticket1` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_option_data_ticket_option1` FOREIGN KEY (`ticket_option_id`) REFERENCES `ticket_option` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ticket_option_translation`
--
ALTER TABLE `ticket_option_translation`
  ADD CONSTRAINT `fk_table2_language1` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_table2_ticket_option1` FOREIGN KEY (`ticket_option_id`) REFERENCES `ticket_option` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `fk_visit_show1` FOREIGN KEY (`show_id`) REFERENCES `show` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
