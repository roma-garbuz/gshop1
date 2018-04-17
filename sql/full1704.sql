-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 17 2018 г., 16:52
-- Версия сервера: 5.7.19
-- Версия PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `action_recorder`
--

DROP TABLE IF EXISTS `action_recorder`;
CREATE TABLE IF NOT EXISTS `action_recorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `identifier` varchar(255) NOT NULL,
  `success` char(1) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_action_recorder_module` (`module`),
  KEY `idx_action_recorder_user_id` (`user_id`),
  KEY `idx_action_recorder_identifier` (`identifier`),
  KEY `idx_action_recorder_date_added` (`date_added`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `address_book`
--

DROP TABLE IF EXISTS `address_book`;
CREATE TABLE IF NOT EXISTS `address_book` (
  `address_book_id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_id` int(11) NOT NULL,
  `entry_gender` char(1) DEFAULT NULL,
  `entry_company` varchar(255) DEFAULT NULL,
  `entry_firstname` varchar(255) NOT NULL,
  `entry_lastname` varchar(255) NOT NULL,
  `entry_street_address` varchar(255) NOT NULL,
  `entry_suburb` varchar(255) DEFAULT NULL,
  `entry_postcode` varchar(255) NOT NULL,
  `entry_city` varchar(255) NOT NULL,
  `entry_state` varchar(255) DEFAULT NULL,
  `entry_country_id` int(11) NOT NULL DEFAULT '0',
  `entry_zone_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`address_book_id`),
  KEY `idx_address_book_customers_id` (`customers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `address_format`
--

DROP TABLE IF EXISTS `address_format`;
CREATE TABLE IF NOT EXISTS `address_format` (
  `address_format_id` int(11) NOT NULL AUTO_INCREMENT,
  `address_format` varchar(128) NOT NULL,
  `address_summary` varchar(48) NOT NULL,
  PRIMARY KEY (`address_format_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `administrators`
--

DROP TABLE IF EXISTS `administrators`;
CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `banners_id` int(11) NOT NULL AUTO_INCREMENT,
  `banners_url` varchar(255) NOT NULL,
  `banners_group` varchar(10) NOT NULL,
  `sort_order` tinyint(2) DEFAULT '0',
  `date_added` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`banners_id`),
  KEY `idx_banners_group` (`banners_group`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `banners`
--

INSERT INTO `banners` (`banners_id`, `banners_url`, `banners_group`, `sort_order`, `date_added`, `active`) VALUES
(1, 'page/view', 'slider', 2, '2018-04-10 00:00:00', 1),
(2, 'page/view/2', 'slider', 1, '2018-04-10 00:00:00', 1),
(3, '', 'free', 0, '2018-04-12 00:00:00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `banners_description`
--

DROP TABLE IF EXISTS `banners_description`;
CREATE TABLE IF NOT EXISTS `banners_description` (
  `banners_description_id` int(11) NOT NULL AUTO_INCREMENT,
  `banners_id` int(11) NOT NULL,
  `banners_title` varchar(256) NOT NULL,
  `banners_image` varchar(256) NOT NULL,
  `banners_html` text NOT NULL,
  `language_id` int(2) NOT NULL,
  PRIMARY KEY (`banners_description_id`),
  KEY `idx_banners_history_banners_id` (`banners_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `banners_description`
--

INSERT INTO `banners_description` (`banners_description_id`, `banners_id`, `banners_title`, `banners_image`, `banners_html`, `language_id`) VALUES
(1, 1, 'Women Collection 2018 ru', 'slide-04.jpg', 'NEW SEASON Ru', 3),
(2, 1, 'Women Collection 2018 En', 'slide-06.jpg', 'NEW SEASON En', 4),
(3, 2, 'Men New-Season Ru', 'slide-07.jpg', 'Jackets & Coats Ru', 3),
(4, 2, 'Men New-Season En', 'slide-05.jpg', 'Jackets & Coats En', 4),
(5, 3, '', '', 'Free shipping for standard order over $100', 4),
(6, 3, '', '', 'Бесплатная доставка от $100', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `cache_id` varchar(32) NOT NULL DEFAULT '',
  `cache_language_id` tinyint(1) NOT NULL DEFAULT '0',
  `cache_name` varchar(255) NOT NULL DEFAULT '',
  `cache_data` mediumtext NOT NULL,
  `cache_global` tinyint(1) NOT NULL DEFAULT '1',
  `cache_gzip` tinyint(1) NOT NULL DEFAULT '1',
  `cache_method` varchar(20) NOT NULL DEFAULT 'RETURN',
  `cache_date` datetime NOT NULL,
  `cache_expires` datetime NOT NULL,
  PRIMARY KEY (`cache_id`,`cache_language_id`),
  KEY `cache_id` (`cache_id`),
  KEY `cache_language_id` (`cache_language_id`),
  KEY `cache_global` (`cache_global`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_image` varchar(64) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `sort_order` int(3) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`categories_id`),
  KEY `idx_categories_parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_image`, `parent_id`, `sort_order`, `date_added`, `last_modified`, `active`) VALUES
(1, '1.jpg', 0, 2, NULL, NULL, 1),
(2, '2.jpg', 0, 1, NULL, NULL, 1),
(3, 'image3.jpg', 1, 1, NULL, NULL, 1),
(4, 'image4.jpg', 2, 1, NULL, NULL, 1),
(5, NULL, 2, 2, NULL, NULL, 1),
(6, NULL, 5, 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `categories_description`
--

DROP TABLE IF EXISTS `categories_description`;
CREATE TABLE IF NOT EXISTS `categories_description` (
  `categories_id` int(11) NOT NULL DEFAULT '0',
  `language_id` int(11) NOT NULL DEFAULT '1',
  `categories_name` varchar(32) NOT NULL,
  `categories_alias` varchar(255) NOT NULL,
  `categories_description` text NOT NULL,
  `meta_description` text NOT NULL,
  PRIMARY KEY (`categories_id`,`language_id`),
  KEY `idx_categories_name` (`categories_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories_description`
--

INSERT INTO `categories_description` (`categories_id`, `language_id`, `categories_name`, `categories_alias`, `categories_description`, `meta_description`) VALUES
(1, 3, 'Мужчины', 'men', '', ''),
(1, 4, 'Men', 'men', '', ''),
(2, 3, 'Женщины', 'women', '', ''),
(3, 3, 'Сумки', 'bag', '', ''),
(4, 3, 'Обувь', 'shoes', '', ''),
(5, 3, 'Джинсы', 'jeans', '', ''),
(6, 3, 'Кепки', 'caps', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `configuration`
--

DROP TABLE IF EXISTS `configuration`;
CREATE TABLE IF NOT EXISTS `configuration` (
  `configuration_id` int(11) NOT NULL AUTO_INCREMENT,
  `configuration_title` varchar(255) NOT NULL,
  `configuration_key` varchar(255) NOT NULL,
  `configuration_value` text NOT NULL,
  `configuration_description` varchar(255) NOT NULL,
  `configuration_group_id` int(11) NOT NULL,
  `sort_order` int(5) DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `use_function` varchar(255) DEFAULT NULL,
  `set_function` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`configuration_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `configuration_group`
--

DROP TABLE IF EXISTS `configuration_group`;
CREATE TABLE IF NOT EXISTS `configuration_group` (
  `configuration_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `configuration_group_title` varchar(64) NOT NULL,
  `configuration_group_description` varchar(255) NOT NULL,
  `sort_order` int(5) DEFAULT NULL,
  `visible` int(1) DEFAULT '1',
  PRIMARY KEY (`configuration_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `counter`
--

DROP TABLE IF EXISTS `counter`;
CREATE TABLE IF NOT EXISTS `counter` (
  `startdate` char(8) DEFAULT NULL,
  `counter` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `counter_history`
--

DROP TABLE IF EXISTS `counter_history`;
CREATE TABLE IF NOT EXISTS `counter_history` (
  `month` char(8) DEFAULT NULL,
  `counter` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `countries_id` int(11) NOT NULL AUTO_INCREMENT,
  `countries_name` varchar(255) NOT NULL,
  `countries_iso_code_2` char(2) NOT NULL,
  `countries_iso_code_3` char(3) NOT NULL,
  `address_format_id` int(11) NOT NULL,
  PRIMARY KEY (`countries_id`),
  KEY `IDX_COUNTRIES_NAME` (`countries_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `currencies`
--

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE IF NOT EXISTS `currencies` (
  `currencies_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `code` char(3) NOT NULL,
  `symbol_left` varchar(12) DEFAULT NULL,
  `symbol_right` varchar(12) DEFAULT NULL,
  `decimal_point` char(1) DEFAULT NULL,
  `thousands_point` char(1) DEFAULT NULL,
  `decimal_places` char(1) DEFAULT NULL,
  `value` float(13,8) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `base` int(1) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`currencies_id`),
  KEY `idx_currencies_code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `currencies`
--

INSERT INTO `currencies` (`currencies_id`, `title`, `code`, `symbol_left`, `symbol_right`, `decimal_point`, `thousands_point`, `decimal_places`, `value`, `last_updated`, `base`, `active`) VALUES
(5, 'Гривна', 'UAH', NULL, 'грн.', NULL, NULL, NULL, 26.20000076, NULL, 0, 1),
(6, 'Доллар', 'USD', '$', NULL, NULL, NULL, NULL, 1.00000000, NULL, 1, 1),
(7, 'Евро', 'EUR', '€', NULL, NULL, NULL, NULL, 0.88000000, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customers_id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_gender` char(1) DEFAULT NULL,
  `customers_firstname` varchar(255) NOT NULL,
  `customers_lastname` varchar(255) NOT NULL,
  `customers_dob` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `customers_email_address` varchar(255) NOT NULL,
  `customers_default_address_id` int(11) DEFAULT NULL,
  `customers_telephone` varchar(255) NOT NULL,
  `customers_fax` varchar(255) DEFAULT NULL,
  `customers_password` varchar(60) NOT NULL,
  `customers_newsletter` char(1) DEFAULT NULL,
  PRIMARY KEY (`customers_id`),
  KEY `idx_customers_email_address` (`customers_email_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `customers_basket`
--

DROP TABLE IF EXISTS `customers_basket`;
CREATE TABLE IF NOT EXISTS `customers_basket` (
  `customers_basket_id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_id` int(11) NOT NULL,
  `products_id` tinytext NOT NULL,
  `customers_basket_quantity` int(2) NOT NULL,
  `final_price` decimal(15,4) DEFAULT NULL,
  `customers_basket_date_added` char(8) DEFAULT NULL,
  PRIMARY KEY (`customers_basket_id`),
  KEY `idx_customers_basket_customers_id` (`customers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `customers_basket_attributes`
--

DROP TABLE IF EXISTS `customers_basket_attributes`;
CREATE TABLE IF NOT EXISTS `customers_basket_attributes` (
  `customers_basket_attributes_id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_id` int(11) NOT NULL,
  `products_id` tinytext NOT NULL,
  `products_options_id` int(11) NOT NULL,
  `products_options_value_id` int(11) NOT NULL,
  PRIMARY KEY (`customers_basket_attributes_id`),
  KEY `idx_customers_basket_att_customers_id` (`customers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `customers_info`
--

DROP TABLE IF EXISTS `customers_info`;
CREATE TABLE IF NOT EXISTS `customers_info` (
  `customers_info_id` int(11) NOT NULL,
  `customers_info_date_of_last_logon` datetime DEFAULT NULL,
  `customers_info_number_of_logons` int(5) DEFAULT NULL,
  `customers_info_date_account_created` datetime DEFAULT NULL,
  `customers_info_date_account_last_modified` datetime DEFAULT NULL,
  `global_product_notifications` int(1) DEFAULT '0',
  `password_reset_key` char(40) DEFAULT NULL,
  `password_reset_date` datetime DEFAULT NULL,
  PRIMARY KEY (`customers_info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `featured`
--

DROP TABLE IF EXISTS `featured`;
CREATE TABLE IF NOT EXISTS `featured` (
  `featured_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL DEFAULT '0',
  `featured_date_added` datetime DEFAULT NULL,
  `featured_last_modified` datetime DEFAULT NULL,
  `expires_date` datetime DEFAULT NULL,
  `date_status_change` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`featured_id`),
  KEY `idx_products_id` (`products_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `geo_zones`
--

DROP TABLE IF EXISTS `geo_zones`;
CREATE TABLE IF NOT EXISTS `geo_zones` (
  `geo_zone_id` int(11) NOT NULL AUTO_INCREMENT,
  `geo_zone_name` varchar(32) NOT NULL,
  `geo_zone_description` varchar(255) NOT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`geo_zone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `languages_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `code` char(2) NOT NULL,
  `image` varchar(64) DEFAULT NULL,
  `directory` varchar(32) DEFAULT NULL,
  `base` int(1) DEFAULT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`languages_id`),
  KEY `IDX_LANGUAGES_NAME` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`languages_id`, `name`, `code`, `image`, `directory`, `base`, `active`) VALUES
(3, 'Русский', 'Ru', NULL, NULL, 1, 1),
(4, 'English', 'En', NULL, NULL, 0, 1),
(7, 'German', 'De', NULL, NULL, 0, 0),
(8, 'Netherland', 'Nl', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `manufacturers`
--

DROP TABLE IF EXISTS `manufacturers`;
CREATE TABLE IF NOT EXISTS `manufacturers` (
  `manufacturers_id` int(11) NOT NULL AUTO_INCREMENT,
  `manufacturers_image` varchar(64) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`manufacturers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `manufacturers_info`
--

DROP TABLE IF EXISTS `manufacturers_info`;
CREATE TABLE IF NOT EXISTS `manufacturers_info` (
  `manufacturers_id` int(11) NOT NULL,
  `languages_id` int(11) NOT NULL,
  `manufacturers_url` varchar(255) NOT NULL,
  `date_last_click` datetime DEFAULT NULL,
  PRIMARY KEY (`manufacturers_id`,`languages_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme_id` int(11) NOT NULL DEFAULT '0',
  `menu_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `link` text,
  `target_blank` int(1) DEFAULT NULL,
  `class` varchar(64) NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `menu_id` (`menu_id`,`theme_id`)
) ENGINE=MyISAM AUTO_INCREMENT=519 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu_items`
--

INSERT INTO `menu_items` (`id`, `theme_id`, `menu_id`, `parent_id`, `link`, `target_blank`, `class`, `sort_order`) VALUES
(1, 1, 1, 0, 'home', 0, '', 1),
(2, 1, 1, 0, 'home', 0, '', 2),
(3, 1, 1, 0, 'features', 0, '', 3),
(4, 1, 1, 0, 'blog', 0, '', 4),
(5, 1, 1, 0, 'page/abaut', 0, '', 5),
(6, 1, 1, 0, 'contact', 0, '', 6),
(7, 1, 1, 1, 'home', 0, '', 1),
(8, 1, 1, 1, 'home', 0, '', 2),
(9, 1, 1, 1, 'home', NULL, '', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `menu_titles`
--

DROP TABLE IF EXISTS `menu_titles`;
CREATE TABLE IF NOT EXISTS `menu_titles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `item_id` int(11) DEFAULT NULL,
  `title` text,
  `link` text,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=202 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu_titles`
--

INSERT INTO `menu_titles` (`id`, `language_id`, `item_id`, `title`, `link`) VALUES
(133, 3, 1, 'Главная', ''),
(134, 4, 1, 'Home', ''),
(135, 3, 2, 'Магазин', ''),
(136, 4, 2, 'Shop', ''),
(137, 3, 3, 'Рекомендуемые', ''),
(138, 4, 3, 'Features', ''),
(156, 3, 4, 'Блог', ''),
(155, 4, 4, 'Blog', ''),
(154, 3, 5, 'О нас', ''),
(153, 4, 5, 'Abaut', ''),
(152, 3, 6, 'Контакты', ''),
(151, 4, 6, 'T&C', ''),
(150, 15, 14, 'Shopping Cart', ''),
(149, 15, 28, 'uuuuu', ''),
(157, 15, 231, 'Shopping Basket', ''),
(158, 15, 238, 'Home Page', ''),
(176, 17, 230, 'My Account', ''),
(175, 17, 225, 'Shopping Cart', ''),
(174, 17, 224, 'My Account', ''),
(173, 17, 80, 'Home', ''),
(172, 17, 27, '444444444', ''),
(171, 17, 30, 'T&C', ''),
(170, 17, 14, 'Shopping Cart', ''),
(169, 17, 28, 'uuuuu', ''),
(177, 17, 231, 'Shopping Basket', '');

-- --------------------------------------------------------

--
-- Структура таблицы `newsletters`
--

DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE IF NOT EXISTS `newsletters` (
  `newsletters_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `module` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_sent` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `locked` int(1) DEFAULT '0',
  PRIMARY KEY (`newsletters_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orders_id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_id` int(11) NOT NULL,
  `customers_name` varchar(255) NOT NULL,
  `customers_company` varchar(255) DEFAULT NULL,
  `customers_street_address` varchar(255) NOT NULL,
  `customers_suburb` varchar(255) DEFAULT NULL,
  `customers_city` varchar(255) NOT NULL,
  `customers_postcode` varchar(255) NOT NULL,
  `customers_state` varchar(255) DEFAULT NULL,
  `customers_country` varchar(255) NOT NULL,
  `customers_telephone` varchar(255) NOT NULL,
  `customers_email_address` varchar(255) NOT NULL,
  `customers_address_format_id` int(5) NOT NULL,
  `delivery_name` varchar(255) NOT NULL,
  `delivery_company` varchar(255) DEFAULT NULL,
  `delivery_street_address` varchar(255) NOT NULL,
  `delivery_suburb` varchar(255) DEFAULT NULL,
  `delivery_city` varchar(255) NOT NULL,
  `delivery_postcode` varchar(255) NOT NULL,
  `delivery_state` varchar(255) DEFAULT NULL,
  `delivery_country` varchar(255) NOT NULL,
  `delivery_address_format_id` int(5) NOT NULL,
  `billing_name` varchar(255) NOT NULL,
  `billing_company` varchar(255) DEFAULT NULL,
  `billing_street_address` varchar(255) NOT NULL,
  `billing_suburb` varchar(255) DEFAULT NULL,
  `billing_city` varchar(255) NOT NULL,
  `billing_postcode` varchar(255) NOT NULL,
  `billing_state` varchar(255) DEFAULT NULL,
  `billing_country` varchar(255) NOT NULL,
  `billing_address_format_id` int(5) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `cc_type` varchar(20) DEFAULT NULL,
  `cc_owner` varchar(255) DEFAULT NULL,
  `cc_number` varchar(32) DEFAULT NULL,
  `cc_expires` varchar(4) DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_purchased` datetime DEFAULT NULL,
  `orders_status` int(5) NOT NULL,
  `orders_date_finished` datetime DEFAULT NULL,
  `currency` char(3) DEFAULT NULL,
  `currency_value` decimal(14,6) DEFAULT NULL,
  PRIMARY KEY (`orders_id`),
  KEY `idx_orders_customers_id` (`customers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders_products`
--

DROP TABLE IF EXISTS `orders_products`;
CREATE TABLE IF NOT EXISTS `orders_products` (
  `orders_products_id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `products_model` varchar(12) DEFAULT NULL,
  `products_name` varchar(64) NOT NULL,
  `products_price` decimal(15,4) NOT NULL,
  `final_price` decimal(15,4) NOT NULL,
  `products_tax` decimal(7,4) NOT NULL,
  `products_quantity` int(2) NOT NULL,
  PRIMARY KEY (`orders_products_id`),
  KEY `idx_orders_products_orders_id` (`orders_id`),
  KEY `idx_orders_products_products_id` (`products_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders_products_attributes`
--

DROP TABLE IF EXISTS `orders_products_attributes`;
CREATE TABLE IF NOT EXISTS `orders_products_attributes` (
  `orders_products_attributes_id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `orders_products_id` int(11) NOT NULL,
  `products_options` varchar(32) NOT NULL,
  `products_options_values` varchar(32) NOT NULL,
  `options_values_price` decimal(15,4) NOT NULL,
  `price_prefix` char(1) NOT NULL,
  PRIMARY KEY (`orders_products_attributes_id`),
  KEY `idx_orders_products_att_orders_id` (`orders_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders_products_download`
--

DROP TABLE IF EXISTS `orders_products_download`;
CREATE TABLE IF NOT EXISTS `orders_products_download` (
  `orders_products_download_id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL DEFAULT '0',
  `orders_products_id` int(11) NOT NULL DEFAULT '0',
  `orders_products_filename` varchar(255) NOT NULL,
  `download_maxdays` int(2) NOT NULL DEFAULT '0',
  `download_count` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`orders_products_download_id`),
  KEY `idx_orders_products_download_orders_id` (`orders_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders_status`
--

DROP TABLE IF EXISTS `orders_status`;
CREATE TABLE IF NOT EXISTS `orders_status` (
  `orders_status_id` int(11) NOT NULL DEFAULT '0',
  `language_id` int(11) NOT NULL DEFAULT '1',
  `orders_status_name` varchar(32) NOT NULL,
  `public_flag` int(11) DEFAULT '1',
  `downloads_flag` int(11) DEFAULT '0',
  PRIMARY KEY (`orders_status_id`,`language_id`),
  KEY `idx_orders_status_name` (`orders_status_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders_status_history`
--

DROP TABLE IF EXISTS `orders_status_history`;
CREATE TABLE IF NOT EXISTS `orders_status_history` (
  `orders_status_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `orders_status_id` int(5) NOT NULL,
  `date_added` datetime NOT NULL,
  `customer_notified` int(1) DEFAULT '0',
  `comments` text,
  PRIMARY KEY (`orders_status_history_id`),
  KEY `idx_orders_status_history_orders_id` (`orders_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders_total`
--

DROP TABLE IF EXISTS `orders_total`;
CREATE TABLE IF NOT EXISTS `orders_total` (
  `orders_total_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `value` decimal(15,4) NOT NULL,
  `class` varchar(32) NOT NULL,
  `sort_order` int(11) NOT NULL,
  PRIMARY KEY (`orders_total_id`),
  KEY `idx_orders_total_orders_id` (`orders_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `products_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_quantity` int(4) NOT NULL,
  `products_model` varchar(64) DEFAULT NULL,
  `products_image` varchar(64) DEFAULT NULL,
  `products_price` decimal(15,4) NOT NULL,
  `products_date_added` datetime NOT NULL,
  `products_last_modified` datetime DEFAULT NULL,
  `products_weight` decimal(5,2) NOT NULL,
  `products_status` tinyint(1) NOT NULL,
  `products_tax_class_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `products_ordered` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`products_id`),
  KEY `idx_products_model` (`products_model`),
  KEY `idx_products_date_added` (`products_date_added`)
) ENGINE=InnoDB AUTO_INCREMENT=234734 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`products_id`, `products_quantity`, `products_model`, `products_image`, `products_price`, `products_date_added`, `products_last_modified`, `products_weight`, `products_status`, `products_tax_class_id`, `brand_id`, `products_ordered`) VALUES
(234671, 0, '', 'qRdZYB-9pQM.jpg', '510.0000', '2018-04-11 23:08:29', '2018-04-11 23:08:44', '0.00', 1, 0, 0, 0),
(234672, 0, '', '7F__j7ed344.jpg', '510.0000', '2018-04-11 23:08:29', '2018-04-11 23:08:53', '0.00', 1, 0, 0, 0),
(234673, 0, '', '4UiDqOZpK5Q.jpg', '510.0000', '2018-04-11 23:08:29', '2018-04-11 23:09:03', '0.00', 1, 0, 0, 0),
(234675, 0, '', 'rhDxTRjQjuE.jpg', '430.0000', '2018-04-11 23:10:05', NULL, '0.00', 1, 0, 0, 0),
(234676, 0, '', 'hT9meheZSDQ.jpg', '500.0000', '2018-04-11 23:10:34', NULL, '0.00', 1, 0, 0, 0),
(234677, 0, '', 'sehOkunaNTI.jpg', '500.0000', '2018-04-11 23:10:34', '2018-04-11 23:10:46', '0.00', 1, 0, 0, 0),
(234678, 0, '', 'yntBE8rgv8U.jpg', '500.0000', '2018-04-11 23:10:34', '2018-04-11 23:10:56', '0.00', 1, 0, 0, 0),
(234679, 0, '', 'RASH58vVg9Q.jpg', '500.0000', '2018-04-11 23:10:35', '2018-04-11 23:11:06', '0.00', 1, 0, 0, 0),
(234680, 0, '', 'NQ2wcXdMSNA.jpg', '500.0000', '2018-04-11 23:10:35', '2018-04-11 23:11:17', '0.00', 1, 0, 0, 0),
(234681, 0, '', 'RMdceg8kjrY.jpg', '500.0000', '2018-04-11 23:10:35', '2018-04-11 23:11:27', '0.00', 1, 0, 0, 0),
(234684, 0, '', 'gSPWU97kMbc.jpg', '500.0000', '2018-04-11 23:12:14', NULL, '0.00', 1, 0, 0, 0),
(234685, 0, '', 'qLCFagBdPnE.jpg', '500.0000', '2018-04-11 23:12:14', '2018-04-11 23:12:28', '0.00', 1, 0, 0, 0),
(234686, 0, '', 'EU3jtGggDqg.jpg', '500.0000', '2018-04-11 23:12:14', '2018-04-11 23:12:39', '0.00', 1, 0, 0, 0),
(234687, 0, '', '95MSAvIY1Dw.jpg', '500.0000', '2018-04-11 23:12:14', '2018-04-11 23:12:50', '0.00', 1, 0, 0, 0),
(234688, 0, '', '0XKTw3AmATs.jpg', '500.0000', '2018-04-11 23:12:14', '2018-04-11 23:13:05', '0.00', 1, 0, 0, 0),
(234689, 0, '', '-GHPpU98dUc.jpg', '500.0000', '2018-04-11 23:12:15', '2018-04-11 23:13:21', '0.00', 1, 0, 0, 0),
(234704, 0, '', 'oFGUqqkT5Z4.jpg', '500.0000', '2018-04-11 23:17:00', '2018-04-11 23:17:28', '0.00', 1, 0, 0, 0),
(234705, 0, '', 'nt5L519s-FI.jpg', '500.0000', '2018-04-11 23:17:00', '2018-04-11 23:17:39', '0.00', 1, 0, 0, 0),
(234706, 0, '', 'W7TKw9P-5K8.jpg', '500.0000', '2018-04-11 23:17:01', '2018-04-11 23:17:55', '0.00', 1, 0, 0, 0),
(234707, 0, '', 'MoiDCNDPefU.jpg', '500.0000', '2018-04-11 23:17:01', '2018-04-11 23:18:04', '0.00', 1, 0, 0, 0),
(234711, 0, '', 'osAsrM1xkoY.jpg', '785.0000', '2018-04-11 23:19:04', NULL, '0.00', 1, 0, 0, 0),
(234712, 0, '', 'W5tYFAiyVVY.jpg', '785.0000', '2018-04-11 23:19:04', '2018-04-11 23:19:17', '0.00', 1, 0, 0, 0),
(234713, 0, '', 'ikPE1Y1Yi40.jpg', '785.0000', '2018-04-11 23:19:04', '2018-04-11 23:19:27', '0.00', 1, 0, 0, 0),
(234715, 0, '', '5b9yLgCXXbo.jpg', '510.0000', '2018-04-11 23:21:39', NULL, '0.00', 1, 0, 0, 0),
(234716, 0, '', '-iBj_XiRJrE.jpg', '410.0000', '2018-04-11 23:24:06', NULL, '0.00', 1, 0, 0, 0),
(234717, 0, '', 'IuxUN6sDJyY.jpg', '410.0000', '2018-04-11 23:24:06', '2018-04-11 23:24:20', '0.00', 1, 0, 0, 0),
(234718, 0, '', 'N9Hm_yFH2pI.jpg', '410.0000', '2018-04-11 23:24:06', '2018-04-11 23:24:34', '0.00', 1, 0, 0, 0),
(234720, 0, '', 'hpTNYpL6C7w.jpg', '395.0000', '2018-04-11 23:26:34', NULL, '0.00', 1, 0, 0, 0),
(234721, 0, '', 'cSmvaO2a3qI.jpg', '395.0000', '2018-04-11 23:26:35', '2018-04-11 23:26:50', '0.00', 1, 0, 0, 0),
(234722, 0, '', 'JThasvuwqkU.jpg', '395.0000', '2018-04-11 23:26:35', '2018-04-11 23:27:00', '0.00', 1, 0, 0, 0),
(234725, 0, '', 'KmcppE3o-EA.jpg', '540.0000', '2018-04-11 23:27:56', NULL, '0.00', 1, 0, 0, 0),
(234726, 0, '', 'Vvo8S0CC8jA.jpg', '540.0000', '2018-04-11 23:27:56', '2018-04-11 23:28:08', '0.00', 1, 0, 0, 0),
(234727, 0, '', 'j92r2IDfnY4.jpg', '540.0000', '2018-04-11 23:27:56', '2018-04-11 23:28:19', '0.00', 1, 0, 0, 0),
(234729, 0, '', 'GlKDuFgc-08.jpg', '410.0000', '2018-04-11 23:29:09', NULL, '0.00', 1, 0, 0, 0),
(234730, 0, '', 'uQCIPS5I-BQ.jpg', '410.0000', '2018-04-11 23:29:09', '2018-04-11 23:29:25', '0.00', 1, 0, 0, 0),
(234731, 0, '', 'OnfVCO0g9K8.jpg', '410.0000', '2018-04-11 23:29:09', '2018-04-11 23:29:37', '0.00', 1, 0, 0, 0),
(234732, 0, '', 'QyyDiJ5M504.jpg', '410.0000', '2018-04-11 23:29:09', '2018-04-11 23:29:48', '0.00', 1, 0, 0, 0),
(234733, 0, '', 'XCWY0Eked7E.jpg', '410.0000', '2018-04-11 23:29:10', '2018-04-11 23:29:57', '0.00', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `products_attributes`
--

DROP TABLE IF EXISTS `products_attributes`;
CREATE TABLE IF NOT EXISTS `products_attributes` (
  `products_attributes_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `options_id` int(11) NOT NULL,
  `options_values_id` int(11) NOT NULL,
  `options_values_price` decimal(15,4) NOT NULL,
  `price_prefix` char(1) NOT NULL,
  PRIMARY KEY (`products_attributes_id`),
  KEY `idx_products_attributes_products_id` (`products_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products_attributes_download`
--

DROP TABLE IF EXISTS `products_attributes_download`;
CREATE TABLE IF NOT EXISTS `products_attributes_download` (
  `products_attributes_id` int(11) NOT NULL,
  `products_attributes_filename` varchar(255) NOT NULL,
  `products_attributes_maxdays` int(2) DEFAULT '0',
  `products_attributes_maxcount` int(2) DEFAULT '0',
  PRIMARY KEY (`products_attributes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products_description`
--

DROP TABLE IF EXISTS `products_description`;
CREATE TABLE IF NOT EXISTS `products_description` (
  `products_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `products_name` varchar(64) NOT NULL,
  `products_description` text,
  `products_url` varchar(255) DEFAULT NULL,
  `products_viewed` int(5) DEFAULT '0',
  `product_meta_description` text NOT NULL,
  PRIMARY KEY (`products_id`,`language_id`),
  KEY `products_name` (`products_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products_extra_fields`
--

DROP TABLE IF EXISTS `products_extra_fields`;
CREATE TABLE IF NOT EXISTS `products_extra_fields` (
  `products_extra_fields_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_extra_fields_name` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `products_extra_fields_order` int(3) NOT NULL DEFAULT '0',
  `products_extra_fields_status` tinyint(1) NOT NULL DEFAULT '1',
  `languages_id` int(11) NOT NULL DEFAULT '0',
  `category_id` text CHARACTER SET utf8 NOT NULL,
  `google_only` char(1) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  PRIMARY KEY (`products_extra_fields_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products_images`
--

DROP TABLE IF EXISTS `products_images`;
CREATE TABLE IF NOT EXISTS `products_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `image` varchar(64) DEFAULT NULL,
  `htmlcontent` text,
  `sort_order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_images_prodid` (`products_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products_notifications`
--

DROP TABLE IF EXISTS `products_notifications`;
CREATE TABLE IF NOT EXISTS `products_notifications` (
  `products_id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`products_id`,`customers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products_options`
--

DROP TABLE IF EXISTS `products_options`;
CREATE TABLE IF NOT EXISTS `products_options` (
  `products_options_id` int(11) NOT NULL DEFAULT '0',
  `language_id` int(11) NOT NULL DEFAULT '1',
  `products_options_name` varchar(32) NOT NULL,
  PRIMARY KEY (`products_options_id`,`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products_options_values`
--

DROP TABLE IF EXISTS `products_options_values`;
CREATE TABLE IF NOT EXISTS `products_options_values` (
  `products_options_values_id` int(11) NOT NULL DEFAULT '0',
  `language_id` int(11) NOT NULL DEFAULT '1',
  `products_options_values_name` varchar(64) NOT NULL,
  PRIMARY KEY (`products_options_values_id`,`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products_options_values_to_products_options`
--

DROP TABLE IF EXISTS `products_options_values_to_products_options`;
CREATE TABLE IF NOT EXISTS `products_options_values_to_products_options` (
  `products_options_values_to_products_options_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_options_id` int(11) NOT NULL,
  `products_options_values_id` int(11) NOT NULL,
  PRIMARY KEY (`products_options_values_to_products_options_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products_to_categories`
--

DROP TABLE IF EXISTS `products_to_categories`;
CREATE TABLE IF NOT EXISTS `products_to_categories` (
  `products_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  PRIMARY KEY (`products_id`,`categories_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products_to_products_extra_fields`
--

DROP TABLE IF EXISTS `products_to_products_extra_fields`;
CREATE TABLE IF NOT EXISTS `products_to_products_extra_fields` (
  `products_id` int(11) NOT NULL DEFAULT '0',
  `products_extra_fields_id` int(11) NOT NULL DEFAULT '0',
  `products_extra_fields_value` text,
  PRIMARY KEY (`products_id`,`products_extra_fields_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `reviews_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `customers_id` int(11) DEFAULT NULL,
  `customers_name` varchar(255) NOT NULL,
  `reviews_rating` int(1) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `reviews_status` tinyint(1) NOT NULL DEFAULT '0',
  `reviews_read` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reviews_id`),
  KEY `idx_reviews_products_id` (`products_id`),
  KEY `idx_reviews_customers_id` (`customers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `reviews_description`
--

DROP TABLE IF EXISTS `reviews_description`;
CREATE TABLE IF NOT EXISTS `reviews_description` (
  `reviews_id` int(11) NOT NULL,
  `languages_id` int(11) NOT NULL,
  `reviews_text` text NOT NULL,
  PRIMARY KEY (`reviews_id`,`languages_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `sec_directory_whitelist`
--

DROP TABLE IF EXISTS `sec_directory_whitelist`;
CREATE TABLE IF NOT EXISTS `sec_directory_whitelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `directory` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `sesskey` varchar(128) NOT NULL,
  `expiry` int(11) UNSIGNED NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`sesskey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `specials`
--

DROP TABLE IF EXISTS `specials`;
CREATE TABLE IF NOT EXISTS `specials` (
  `specials_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `specials_new_products_price` decimal(15,4) NOT NULL,
  `specials_date_added` datetime DEFAULT NULL,
  `specials_last_modified` datetime DEFAULT NULL,
  `expires_date` datetime DEFAULT NULL,
  `date_status_change` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `start_date` datetime DEFAULT NULL,
  PRIMARY KEY (`specials_id`),
  KEY `idx_specials_products_id` (`products_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tax_class`
--

DROP TABLE IF EXISTS `tax_class`;
CREATE TABLE IF NOT EXISTS `tax_class` (
  `tax_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_class_title` varchar(32) NOT NULL,
  `tax_class_description` varchar(255) NOT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`tax_class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tax_rates`
--

DROP TABLE IF EXISTS `tax_rates`;
CREATE TABLE IF NOT EXISTS `tax_rates` (
  `tax_rates_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_zone_id` int(11) NOT NULL,
  `tax_class_id` int(11) NOT NULL,
  `tax_priority` int(5) DEFAULT '1',
  `tax_rate` decimal(7,4) NOT NULL,
  `tax_description` varchar(255) NOT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`tax_rates_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `theme_menu`
--

DROP TABLE IF EXISTS `theme_menu`;
CREATE TABLE IF NOT EXISTS `theme_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` text NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `theme_menu`
--

INSERT INTO `theme_menu` (`menu_id`, `menu_name`, `last_modified`) VALUES
(1, 'top menu', '2018-04-12 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `usu_cache`
--

DROP TABLE IF EXISTS `usu_cache`;
CREATE TABLE IF NOT EXISTS `usu_cache` (
  `cache_name` varchar(64) NOT NULL,
  `cache_data` mediumtext NOT NULL,
  `cache_date` datetime NOT NULL,
  UNIQUE KEY `cache_name` (`cache_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `whos_online`
--

DROP TABLE IF EXISTS `whos_online`;
CREATE TABLE IF NOT EXISTS `whos_online` (
  `customer_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `session_id` varchar(128) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `time_entry` varchar(14) NOT NULL,
  `time_last_click` varchar(14) NOT NULL,
  `last_page_url` text NOT NULL,
  KEY `idx_whos_online_session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `zones`
--

DROP TABLE IF EXISTS `zones`;
CREATE TABLE IF NOT EXISTS `zones` (
  `zone_id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_country_id` int(11) NOT NULL,
  `zone_code` varchar(32) NOT NULL,
  `zone_name` varchar(255) NOT NULL,
  PRIMARY KEY (`zone_id`),
  KEY `idx_zones_country_id` (`zone_country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `zones_to_geo_zones`
--

DROP TABLE IF EXISTS `zones_to_geo_zones`;
CREATE TABLE IF NOT EXISTS `zones_to_geo_zones` (
  `association_id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_country_id` int(11) NOT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `geo_zone_id` int(11) DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`association_id`),
  KEY `idx_zones_to_geo_zones_country_id` (`zone_country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
