/*
Navicat MySQL Data Transfer

Source Server         : DaoDangSon
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : myweb

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-11-20 01:18:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `super_man` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('1', 'daodangson.it@gmail.com', '$2y$10$A3X0FZPtyORT6fAA.I6wuOxepk91uOcG.9buUKeeOCayAuyoxr0Ga', 'Dao Dang Son', '01632399789', 'Cam Ly - Luc Nam - Bac Giang', '2016-11-05 23:00:25', '1', '1', null, null, null);

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PUBLISHED',
  `date` date NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of articles
-- ----------------------------

-- ----------------------------
-- Table structure for article_tag
-- ----------------------------
DROP TABLE IF EXISTS `article_tag`;
CREATE TABLE `article_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of article_tag
-- ----------------------------

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) DEFAULT '0',
  `nav_item_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'PHP', 'cat1479136645.jpg', 'Hoc lap trinh php', 'Hoc lap trinh php', 'Hoc lap trinh php', null, null, '2016-11-14 15:18:19', '2016-11-14 15:18:19', null);
INSERT INTO `categories` VALUES ('2', 'CSS', 'cat1479136819.jpg', 'CSS', 'CSS', 'CSS', null, null, '2016-11-14 15:20:19', '2016-11-14 15:20:19', null);
INSERT INTO `categories` VALUES ('3', 'Javascript', 'cat1479137170.jpg', 'Javascript', 'Javascript', 'Javascript', null, null, '2016-11-14 15:20:45', '2016-11-14 15:20:45', null);
INSERT INTO `categories` VALUES ('4', 'fsdfdsf', 'cat1479137170.jpg', 'fdsfds', 'fsdfa', 'fdsafdas', null, null, '2016-11-14 15:26:10', '2016-11-14 15:26:10', null);

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `super_man` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('1', 'daodangson.it@gmail.com', '$2y$10$tK67T2MuLT246r85g0c7VesbxuORGk54VGt2hIqNN2eJKI8lvuCPu', 'Dao Dang Son', '01632399789', 'Cam Ly - Luc Nam - Bac Giang', '2016-11-19 16:05:14', '1', '1', 'DPA9yp0F1t4MDOaTIf8sWGxZ149NSvPtqejn4KyXa9LqgZeXVlmcSTvsvBbo', null, '2016-11-19 09:05:14');

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `birthday` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `super_man` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES ('1', 'daodangson.it@gmail.com', '$2y$10$f1cVwMhTK1T139DDHwSQPOAZLFWQHST6bJhhvNKgDyik.bHgu9ppi', 'Dao Dang Son', '01632399789', 'Cam Ly - Luc Nam - Bac Giang', '1', '2016-11-05 23:00:25', '1', null, null, null);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2016_11_05_145643_create-table-categories', '1');
INSERT INTO `migrations` VALUES ('4', '2016_11_05_153904_create-table-navigation', '1');
INSERT INTO `migrations` VALUES ('5', '2016_06_01_000001_create_oauth_auth_codes_table', '2');
INSERT INTO `migrations` VALUES ('6', '2016_06_01_000002_create_oauth_access_tokens_table', '2');
INSERT INTO `migrations` VALUES ('7', '2016_06_01_000003_create_oauth_refresh_tokens_table', '2');
INSERT INTO `migrations` VALUES ('8', '2016_06_01_000004_create_oauth_clients_table', '2');
INSERT INTO `migrations` VALUES ('9', '2016_06_01_000005_create_oauth_personal_access_clients_table', '2');
INSERT INTO `migrations` VALUES ('10', '2015_08_04_130507_create_article_tag_table', '3');
INSERT INTO `migrations` VALUES ('11', '2015_08_04_130520_create_articles_table', '3');
INSERT INTO `migrations` VALUES ('12', '2016_11_19_060205_create_soft_delete', '4');

-- ----------------------------
-- Table structure for navigates
-- ----------------------------
DROP TABLE IF EXISTS `navigates`;
CREATE TABLE `navigates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of navigates
-- ----------------------------
INSERT INTO `navigates` VALUES ('1', 'Menu', '0', '', '0', '0');
INSERT INTO `navigates` VALUES ('2', 'Navigate Items', '0', '', '0', '0');
INSERT INTO `navigates` VALUES ('3', 'Tutorial', '2', '', '0', '0');
INSERT INTO `navigates` VALUES ('4', 'Category', '0', '', '0', '0');
INSERT INTO `navigates` VALUES ('5', 'Customer', '0', '', '0', '0');
INSERT INTO `navigates` VALUES ('6', 'User', '0', '', '0', '0');
INSERT INTO `navigates` VALUES ('7', 'Admin', '0', '', '0', '0');
INSERT INTO `navigates` VALUES ('8', 'Roles & Permissions ', '0', '', '0', '0');

-- ----------------------------
-- Table structure for navigate_items
-- ----------------------------
DROP TABLE IF EXISTS `navigate_items`;
CREATE TABLE `navigate_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nav_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of navigate_items
-- ----------------------------
INSERT INTO `navigate_items` VALUES ('1', 'Thêm mới', 'admin.menu.create', null, '1', '0', null);
INSERT INTO `navigate_items` VALUES ('2', 'Danh sách', 'admin.menu.index', null, '1', '0', null);
INSERT INTO `navigate_items` VALUES ('3', 'Thêm mới', 'admin.menu-item.create', null, '2', '0', null);
INSERT INTO `navigate_items` VALUES ('4', 'Danh sách', 'admin.menu-item.index', null, '2', '0', null);
INSERT INTO `navigate_items` VALUES ('5', 'Bài viết mới', 'customer.post.create', null, '3', '0', null);
INSERT INTO `navigate_items` VALUES ('6', 'Danh sách bài viết', 'customer.post.index', null, '3', '0', null);
INSERT INTO `navigate_items` VALUES ('7', 'Thêm mới', 'admin.category.create', null, '4', '0', null);
INSERT INTO `navigate_items` VALUES ('8', 'Danh sách', 'admin.category.index', null, '4', '0', null);
INSERT INTO `navigate_items` VALUES ('9', 'Thêm mới', 'admin.get_register', null, '7', '0', null);
INSERT INTO `navigate_items` VALUES ('10', 'Danh sách', 'admin.get_list_admin', null, '7', '0', null);
INSERT INTO `navigate_items` VALUES ('11', 'Thêm mới', 'admin.customer.create', null, '5', '0', null);
INSERT INTO `navigate_items` VALUES ('12', 'Danh sách', 'admin.customer.index', null, '5', '0', null);
INSERT INTO `navigate_items` VALUES ('13', 'Thêm mới', 'admin.get_register', null, '6', '0', null);
INSERT INTO `navigate_items` VALUES ('14', 'Danh sách', 'admin.get_list_admin', null, '5', '0', null);

-- ----------------------------
-- Table structure for oauth_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of oauth_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for oauth_auth_codes
-- ----------------------------
DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of oauth_auth_codes
-- ----------------------------

-- ----------------------------
-- Table structure for oauth_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of oauth_clients
-- ----------------------------
INSERT INTO `oauth_clients` VALUES ('1', null, 'My Application Personal Access Client', 'r3kxiA20DnHS0Q3xsNcRjyygnB2VRyLd3n7WH2gl', 'http://localhost', '1', '0', '0', '2016-11-08 14:30:57', '2016-11-08 14:30:57');
INSERT INTO `oauth_clients` VALUES ('2', null, 'My Application Password Grant Client', 'E5rH5HBKy8gma8pToIPJFDbU43dh7DZO6Gi1ZkMu', 'http://localhost', '0', '1', '0', '2016-11-08 14:30:57', '2016-11-08 14:30:57');
INSERT INTO `oauth_clients` VALUES ('3', null, 'My Application Personal Access Client', 'DxuVhkxdvrehLSbLNQlrn92KlKfHhiREsVi0khXd', 'http://localhost', '1', '0', '0', '2016-11-08 14:41:09', '2016-11-08 14:41:09');
INSERT INTO `oauth_clients` VALUES ('4', null, 'My Application Password Grant Client', 'gHfb5jl0iiAFSjMYTja7YRVIliijIQ8VYtDcnsyc', 'http://localhost', '0', '1', '0', '2016-11-08 14:41:09', '2016-11-08 14:41:09');
INSERT INTO `oauth_clients` VALUES ('5', null, 'My Application Personal Access Client', 'sD5HbafVr71hOITmcuGzFeYRtN5R4imxYJPPqIVe', 'http://localhost', '1', '0', '0', '2016-11-08 14:41:25', '2016-11-08 14:41:25');
INSERT INTO `oauth_clients` VALUES ('6', null, 'My Application Password Grant Client', 'Svx1T58RXCba8ZAqf1VcYRiHVVVPe5V8nXjNJccM', 'http://localhost', '0', '1', '0', '2016-11-08 14:41:25', '2016-11-08 14:41:25');
INSERT INTO `oauth_clients` VALUES ('7', '2', 'son', 'tvjJZGePaMp0cVDXjIVHm1oiipE5WsNqT5IBOxCb', 'http://localhost', '0', '0', '0', '2016-11-08 15:56:47', '2016-11-08 15:56:47');

-- ----------------------------
-- Table structure for oauth_personal_access_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of oauth_personal_access_clients
-- ----------------------------
INSERT INTO `oauth_personal_access_clients` VALUES ('1', '1', '2016-11-08 14:30:57', '2016-11-08 14:30:57');
INSERT INTO `oauth_personal_access_clients` VALUES ('2', '3', '2016-11-08 14:41:09', '2016-11-08 14:41:09');
INSERT INTO `oauth_personal_access_clients` VALUES ('3', '5', '2016-11-08 14:41:25', '2016-11-08 14:41:25');

-- ----------------------------
-- Table structure for oauth_refresh_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of oauth_refresh_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('1', 'fsdf', null, 'sfsda', 'fdsf', 'fdsfads', 'fsdfads', '<p>fdsfads</p>\r\n', null, null, null, null, null);
INSERT INTO `posts` VALUES ('2', 'fsda', null, 'fdsa', 'fsad', 'fsadf', 'fadsfasd', '<p>fsdafsad</p>\r\n', null, null, null, null, null);
INSERT INTO `posts` VALUES ('3', 'fsda', null, 'fdsa', 'fsad', 'fsadf', 'fadsfasd', '<p>fsdafsad</p>\r\n', null, null, null, null, null);
INSERT INTO `posts` VALUES ('4', 'fadsfdasa', null, 'fdsafds', 'fdsafdsa', 'fdsafds', 'fdsafads', '<p><img alt=\"\" src=\"http://son.dev/photos//dfsdfd/5823465a8276b.jpg\" style=\"height:183px; width:275px\" /></p>\r\n', null, null, null, null, null);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `super_man` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'daodangson.it@gmail.com', '$2y$10$ZYovgTylpKq59pUswtdZuO5YFBLfx0vJqBRPp3qeJhaXESyQkh2IW', 'Dao Dang Son', '01632399789', 'Cam Ly - Luc Nam - Bac Giang', '2016-11-05 23:00:25', '1', '1', null, null, null);

-- ----------------------------
-- Table structure for writers
-- ----------------------------
DROP TABLE IF EXISTS `writers`;
CREATE TABLE `writers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `super_man` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of writers
-- ----------------------------
INSERT INTO `writers` VALUES ('1', 'daodangson.it@gmail.com', '$2y$10$ZYovgTylpKq59pUswtdZuO5YFBLfx0vJqBRPp3qeJhaXESyQkh2IW', 'Dao Dang Son', '01632399789', 'Cam Ly - Luc Nam - Bac Giang', '2016-11-05 23:00:25', '1', '1', null, null, null);
