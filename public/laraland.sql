-- Adminer 4.7.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `languages` (`id`, `name`, `locale`, `img`, `created_at`, `updated_at`) VALUES
(1,	'Russian',	'ru',	NULL,	'2019-09-16 13:52:54',	'2019-09-16 13:52:56'),
(2,	'Ukraine',	'ua',	NULL,	'2019-09-16 13:54:04',	'2019-09-16 13:54:06');

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `media` (`id`, `model_type`, `model_id`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(25,	'App\\Section',	8,	'media',	'w-0001',	'w-0001.jpg',	'image/jpeg',	'media',	156215,	'[]',	'[]',	'[]',	1,	'2019-09-26 09:47:37',	'2019-09-26 09:47:37'),
(26,	'App\\Section',	8,	'media',	'w-0002',	'w-0002.jpg',	'image/jpeg',	'media',	177314,	'[]',	'[]',	'[]',	2,	'2019-09-26 09:47:37',	'2019-09-26 09:47:37'),
(27,	'App\\Section',	8,	'media',	'w-0003',	'w-0003.jpg',	'image/jpeg',	'media',	143400,	'[]',	'[]',	'[]',	3,	'2019-09-26 09:47:37',	'2019-09-26 09:47:37'),
(28,	'App\\Section',	8,	'media',	'w-0004',	'w-0004.jpg',	'image/jpeg',	'media',	135893,	'[]',	'[]',	'[]',	4,	'2019-09-26 09:47:37',	'2019-09-26 09:47:37'),
(29,	'App\\Section',	8,	'media',	'w-0005',	'w-0005.jpg',	'image/jpeg',	'media',	149088,	'[]',	'[]',	'[]',	5,	'2019-09-26 09:47:37',	'2019-09-26 09:47:37'),
(30,	'App\\Section',	8,	'media',	'w-0006',	'w-0006.jpg',	'image/jpeg',	'media',	166155,	'[]',	'[]',	'[]',	6,	'2019-09-26 09:47:37',	'2019-09-26 09:47:37'),
(31,	'App\\Section',	8,	'media',	'w-0007',	'w-0007.jpg',	'image/jpeg',	'media',	197554,	'[]',	'[]',	'[]',	7,	'2019-09-26 09:47:38',	'2019-09-26 09:47:38'),
(32,	'App\\Section',	8,	'media',	'w-0008',	'w-0008.jpg',	'image/jpeg',	'media',	159892,	'[]',	'[]',	'[]',	8,	'2019-09-26 09:47:38',	'2019-09-26 09:47:38'),
(33,	'App\\Section',	8,	'media',	'w-0009',	'w-0009.jpg',	'image/jpeg',	'media',	171368,	'[]',	'[]',	'[]',	9,	'2019-09-26 09:47:38',	'2019-09-26 09:47:38'),
(34,	'App\\Section',	8,	'media',	'w-0010',	'w-0010.jpg',	'image/jpeg',	'media',	157628,	'[]',	'[]',	'[]',	10,	'2019-09-26 09:47:38',	'2019-09-26 09:47:38');

DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'main',	'2019-09-16 13:59:02',	'2019-09-16 13:59:02'),
(2,	'admin',	'2019-09-16 13:59:11',	'2019-09-16 13:59:11');

DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `menu_items` (`id`, `menu_id`, `parent_id`, `label`, `link`, `lang`, `position`, `created_at`, `updated_at`) VALUES
(1,	1,	0,	'Главная',	'/',	'ru',	1,	NULL,	NULL),
(2,	1,	0,	'О компании',	'o-nas',	'ru',	2,	NULL,	NULL),
(3,	1,	0,	'Контакты',	'kontauti',	'ru',	3,	NULL,	NULL),
(4,	2,	0,	'Панель Управления',	'/admin',	'ru',	1,	NULL,	NULL),
(5,	2,	0,	'Страницы',	'/admin/pages',	'ru',	2,	NULL,	NULL),
(6,	2,	0,	'Меню',	'/admin/menu',	'ru',	4,	NULL,	NULL),
(7,	2,	0,	'Настройки',	'/admin/settings',	'ru',	5,	NULL,	NULL),
(8,	2,	0,	'Секции для страниц',	'/admin/sections',	'ru',	3,	NULL,	NULL);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11,	'2014_10_12_000000_create_users_table',	1),
(12,	'2014_10_12_100000_create_password_resets_table',	1),
(13,	'2019_06_27_160835_create_pages_table',	1),
(14,	'2019_08_26_065708_add_lang_to_pages_translate_table',	1),
(15,	'2019_08_26_071308_create_languages_table',	1),
(16,	'2019_08_26_131800_create_settings_table',	1),
(17,	'2019_08_26_150554_add_fiels_to_settings_table',	1),
(18,	'2019_08_31_103758_add_meta_data_to_pages_translate_table',	1),
(19,	'2019_09_02_161602_create_menus_table',	1),
(21,	'2019_09_02_161628_create_menu_items_table',	2),
(22,	'2019_09_16_135721_create_sections_table',	2),
(23,	'2019_09_16_160907_add_page_id_to_sections_table',	2),
(24,	'2019_09_23_110655_create_media_table',	3);

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pages` (`id`, `slug`, `created_at`, `updated_at`) VALUES
(1,	'glavnaya',	'2019-09-16 13:57:49',	'2019-09-16 13:57:49'),
(2,	'o-nas',	'2019-09-16 13:58:12',	'2019-09-16 13:58:12'),
(3,	'kontauti',	'2019-09-16 13:58:35',	'2019-09-16 13:58:35');

DROP TABLE IF EXISTS `pages_translate`;
CREATE TABLE `pages_translate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `lang` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ru',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `pages_translate_page_id_foreign` (`page_id`),
  CONSTRAINT `pages_translate_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pages_translate` (`id`, `page_id`, `title`, `body`, `lang`, `meta_title`, `meta_description`) VALUES
(1,	1,	'Главная',	'<p>текст</p>',	'ru',	NULL,	NULL),
(2,	2,	'О нас',	'<p>FERESKI – это производство обуви высокого качества.&nbsp;<br>Более 25 лет мы непрерывно развиваем и модернизируем наше производство, улучшая его технологическое и программное оснащение. Отбираем наилучшие комплектующие, а также осуществляем поиск и обучение лучших специалистов. Благодаря этому компания FERESKI обеспечивает своих покупателей продуктом наивысшего качества. Мы внимательно следим за последними модными тенденциями и в соответствии с ними прокладываем собственный дизайнерский курс. При этом используем наиболее удачные решения, стили и формы. Обувное производство FERESKI представляет вашему вниманию обувь высокого качества по демократичным ценам. Это - множество классических и современных образов, из которых вы сможете выбрать именно то, что идеально дополнит ваш стиль, подчеркнет ваши внешние данные и будет удобно сидеть на ноге. Обувь FERESKI станет вашим надежным спутником и личной мерой комфорта. Благодаря качественному выбору сырья, наша продукция способна радовать вас долгие годы. Обувь нашего производства всегда с достоинством переходит из сезона в сезон, не заставляя жалеть о потраченных средствах.&nbsp;<br>Выбрав FERESKI, вы получаете гармонию качества, цены и комфорта.</p>',	'ru',	'FERESKI – производство обуви',	'FERESKI – это производство обуви высокого качества.  Обувное производство FERESKI представляет вашему вниманию обувь высокого качества по демократичным ценам'),
(3,	3,	'Контакты',	'<p>текст контакты</p>',	'ru',	'Fereski - Контактная информация',	NULL);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `sections`;
CREATE TABLE `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `className` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `page_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sections_page_id_foreign` (`page_id`),
  CONSTRAINT `sections_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sections` (`id`, `idName`, `className`, `type`, `created_at`, `updated_at`, `page_id`) VALUES
(8,	'winter-collection',	'winter-collection',	'collection',	'2019-09-26 09:47:37',	'2019-09-27 12:38:30',	1);

DROP TABLE IF EXISTS `sections_translate`;
CREATE TABLE `sections_translate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `section_id` int(10) unsigned NOT NULL,
  `lang` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sections_translate_section_id_foreign` (`section_id`),
  CONSTRAINT `sections_translate_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sections_translate` (`id`, `section_id`, `lang`, `data`, `created_at`, `updated_at`) VALUES
(6,	8,	'ru',	'a:4:{s:5:\"title\";s:39:\"Fereski Зимняя коллекция\";s:11:\"description\";s:381:\"More text description more text words section description section chars images lorem ipsum selection bomber man solid foudation special evryone woul service katana words stop.\r\n\r\nMore text description more text words section description section chars images lorem ipsum selection bomber man solid foudation special evryone woul service katana words stop ipsum selection bomber man.\";s:4:\"link\";s:1:\"#\";s:7:\"bgColor\";s:7:\"#ffffff\";}',	'2019-09-26 09:47:38',	'2019-09-27 12:42:21'),
(7,	8,	'ru',	'a:4:{s:5:\"title\";s:39:\"Fereski Зимняя коллекция\";s:11:\"description\";s:381:\"More text description more text words section description section chars images lorem ipsum selection bomber man solid foudation special evryone woul service katana words stop.\r\n\r\nMore text description more text words section description section chars images lorem ipsum selection bomber man solid foudation special evryone woul service katana words stop ipsum selection bomber man.\";s:4:\"link\";s:1:\"#\";s:7:\"bgColor\";s:7:\"#ffffff\";}',	'2019-09-27 12:36:11',	'2019-09-27 12:42:21');

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ru',
  PRIMARY KEY (`id`),
  KEY `settings_key_index` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `settings` (`id`, `key`, `value`, `group`, `label`, `type`, `lang`) VALUES
(1,	'translation',	'0',	'global',	'Translation',	'checkbox',	'ru'),
(2,	'sales-contact',	'+38 (067)  523 61 01 +38 (067) 622 42 89 +38 (097) 721 04 04 (руководитель отдела)',	'other',	'Отдел продаж:',	'text',	'ru'),
(3,	'push-contact',	'+38 (097) 329 74 29',	'other',	'Отдел снабжения:',	'text',	'ru'),
(4,	'address',	'вулиця Верещагіна, 107, Дніпро́, Дніпропетровська, 49000',	'other',	'Адрес',	'text',	'ru'),
(5,	'map',	'<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1321.0294640856214!2d35.051247!3d48.5321024!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0:0x0!2zNDjCsDMxJzU1LjgiTiAzNcKwMDMnMDguNCJF!5e0!3m2!1sru!2sua!4v1569831304244!5m2!1sru!2sua\" width=\"100%\" height=\"480\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>',	'other',	'Google Map',	'text',	'ru'),
(6,	'schedule',	'Понедельник — Пятница с 9:00 до 18:00',	'other',	'График работы:',	'text',	'ru');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Aleksey',	'vasilenko75@gmail.com',	NULL,	'$2y$10$WdBzYdEpU1hKrL18qas5Nu4gHcOXQFJt3aomNZmzK8kWlg210pdgG',	'wLBmfr2MNN0pt67bhmUaSX0V5Es4taTRsOMR7umnljlX6qnsiLhGJ9SSyMND',	'2019-09-16 13:56:41',	'2019-09-16 13:56:41');

-- 2019-09-30 09:24:15
