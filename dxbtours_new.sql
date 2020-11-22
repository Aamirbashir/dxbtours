-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 16, 2020 at 03:15 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dxbtours_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

DROP TABLE IF EXISTS `about_us`;
CREATE TABLE IF NOT EXISTS `about_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext DEFAULT NULL,
  `status` enum('Active','InActive') DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brands_list`
--

DROP TABLE IF EXISTS `brands_list`;
CREATE TABLE IF NOT EXISTS `brands_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` mediumtext DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `status` enum('Active','InActive') DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_queries`
--

DROP TABLE IF EXISTS `contact_queries`;
CREATE TABLE IF NOT EXISTS `contact_queries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) DEFAULT NULL,
  `service_name` varchar(250) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `number_of_pax` varchar(10) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_queries`
--

INSERT INTO `contact_queries` (`id`, `name`, `service_name`, `email`, `contact`, `message`, `status`, `number_of_pax`, `date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, NULL, 'Desert Safari', 'aamir_bashir@live.com', '525170000', NULL, NULL, '2', NULL, '2020-10-16 08:40:14', '2020-10-16 08:40:14', NULL),
(17, NULL, 'Basic Desert Safari', 'malik_habib143@yahoo.com', NULL, 'eee', NULL, '3', NULL, '2020-10-16 09:20:16', '2020-10-16 09:20:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `header_text`
--

DROP TABLE IF EXISTS `header_text`;
CREATE TABLE IF NOT EXISTS `header_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `status` enum('Active','InActive') DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `our_team`
--

DROP TABLE IF EXISTS `our_team`;
CREATE TABLE IF NOT EXISTS `our_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `designation` varchar(200) DEFAULT NULL,
  `intro` text DEFAULT NULL,
  `status` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services_list`
--

DROP TABLE IF EXISTS `services_list`;
CREATE TABLE IF NOT EXISTS `services_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `slug` varchar(50) NOT NULL,
  `display_order` int(11) NOT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` mediumtext DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `status` enum('Active','InActive') DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services_list`
--

INSERT INTO `services_list` (`id`, `name`, `title`, `slug`, `display_order`, `short_description`, `long_description`, `logo`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(6, 'Desert Safari', 'Desert Safari', 'desert-safari', 2, 'Experience the thrills of the dunes and witness spectacular views of the sunset during our Desert Safari Tour. Upon reaching the camp in the desert, a traditional Arabian welcome awaits you. Enjoy the true Arabian ambiance at this typical good quality Bedouin campsite, with traditional Arabian carpets, low tables, and cushions for comfortable seating and relaxation.', '<p>Experience the thrills of the dunes and witness spectacular views of the sunset during our Desert Safari Tour. Upon reaching the camp in the desert, a traditional Arabian welcome awaits you. Enjoy the true Arabian ambiance at this typical good quality Bedouin campsite, with traditional Arabian carpets, low tables, and cushions for comfortable seating and relaxation.<br></p>', '7', 'Active', '2020-10-15 10:58:31', '2020-10-15 11:03:31', NULL, 2, 2, NULL),
(7, 'Luxury yachts charter', 'dubai luxury yachts charter', 'luxury-yachts-charter', 1, 'Make Your day Memorable on a luxury yacht with DXB Tours & Travel by JANNAT TOURS, the leading yacht charter company in the UAE. Available for both daily and hourly rent, the yachts showcased by dxbtoursntravel.ae are wholly owned by us. Backed by a professional crew with more than 20 years of sailing experience, our yacht rental service in Dubai aims to deliver the ultimate yachting experience with professionalism, security, and unparalleled luxury.', '<p><span style=\"color: rgb(88, 88, 88); font-family: Hind, sans-serif; font-size: 16px; text-align: center; background-color: rgb(244, 246, 253);\">Make Your day Memorable on a luxury yacht with&nbsp;</span><span style=\"font-weight: bolder; color: rgb(88, 88, 88); font-family: Hind, sans-serif; font-size: 16px; text-align: center; background-color: rgb(244, 246, 253);\">DXB Tours &amp; Travel</span><span style=\"color: rgb(88, 88, 88); font-family: Hind, sans-serif; font-size: 16px; text-align: center; background-color: rgb(244, 246, 253);\">&nbsp;by JANNAT TOURS, the leading yacht charter company in the UAE. Available for both daily and hourly rent, the yachts showcased by <a href=\"http://dxbtoursntravel.ae\" target=\"_blank\">dxbtoursntravel.ae</a> are wholly owned by us. Backed by a professional crew with more than 20 years of sailing experience, our yacht rental service in Dubai aims to deliver the ultimate yachting experience with professionalism, security, and unparalleled luxury.</span><br></p>', '8', 'Active', '2020-10-15 11:08:39', '2020-10-15 11:08:39', NULL, 2, 2, NULL),
(8, 'Dhow Cruise', 'world biggest dhow cruise', 'dhow-cruise', 3, 'Enjoy your night see a trip on the world\'s biggest handmade dhow cruise.', '<p>Enjoy your night see a trip on the world\'s biggest handmade dhow cruise.&nbsp;<br></p>', '9', 'Active', '2020-10-15 11:12:09', '2020-10-15 11:12:10', NULL, 2, 2, NULL),
(9, 'City tour', 'dubai city tour', 'city-tour', 4, 'DXB tours & travel offering a complete city tour to all famous destination of Dubai', '<p>DXB tours &amp; travel offering a complete city tour to all famous destination of dubai<br></p>', '10', 'Active', '2020-10-15 11:14:26', '2020-10-15 11:14:26', NULL, 2, 2, NULL),
(10, 'Complete Tour Package', 'dubai tourism packages', 'complete-tour-package', 4, 'See our complete tour packages including a visit visa, air ticket, hotel reservation, and a visit to all famous Dubai destinations.', '<p>See our complete tour packages including a visit visa, air ticket, hotel reservation, and a visit to all famous Dubai destinations.</p><p><br></p>', '11', 'Active', '2020-10-15 11:30:09', '2020-10-15 11:30:09', NULL, 2, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services_products`
--

DROP TABLE IF EXISTS `services_products`;
CREATE TABLE IF NOT EXISTS `services_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `short_description` varchar(5000) NOT NULL,
  `product_image` varchar(50) DEFAULT NULL,
  `service_id` int(11) NOT NULL,
  `long_description` text NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `number_of_pax` int(11) DEFAULT NULL,
  `price_criteria` text NOT NULL,
  `status` varchar(11) DEFAULT NULL,
  `product_slug` varchar(250) NOT NULL,
  `display_order` int(11) NOT NULL,
  `size` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services_products`
--

INSERT INTO `services_products` (`id`, `name`, `short_description`, `product_image`, `service_id`, `long_description`, `product_price`, `number_of_pax`, `price_criteria`, `status`, `product_slug`, `display_order`, `size`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'VIP Red dune desert Safari', 'Experience the thrills of the red dunes and witness spectacular views of the sunset during our Desert Safari Tour. Upon reaching the camp in the desert, a traditional Arabian welcome awaits you.', '15', 6, '<ul class=\"cont-4\">\r\n\r\n                       \r\n                           <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Pickup &amp; Drop Off from your location by land cruiser 4x4</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Dune Bashing  by land cruiser 25 to 35 minutes (at lehbaab Red sand Dunes)</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Sand Boarding</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Camel Riding</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Arabic Coffee, Tea and Sweets on Arrival</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Barbecue Buffet with Vegetarian &amp; Non-Vegetarian options(5* Quality catering)</li>\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>\r\nHenna Painting</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Sheesha(hubly bubly) At the specific smoking area in the camp</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Photo Opportunities in Traditional Costume</li>\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Sunset Photo Opportunities</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Sitting Area with Carpets, Pillows, and Cushions</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Separate Toilet facility for both Men and Women</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Unlimited soft drinks and water</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Live Shows: Only Camp in Dubai With 7 Live Shows\r\n<ul class=\"singlePageul\">\r\n<li><span class=\"fa fa-share-square-o\"></span> Belly Dance</li>\r\n\r\n<li><span class=\"fa fa-share-square-o\"></span> Fire Show</li>\r\n\r\n<li> <span class=\"fa fa-share-square-o\"></span>Two Tanoura Shows</li>\r\n\r\n<li><span class=\"fa fa-share-square-o\"></span>Arabic Folklore Show</li>\r\n\r\n<li><span class=\"fa fa-share-square-o\"></span>Khaliji Dance Show</li>\r\n\r\n<li><span class=\"fa fa-share-square-o\"></span>Puppet Show</li>\r\n</ul>\r\n</li>\r\n              \r\n                        \r\n                    </ul>', '149', NULL, 'Person', 'Active', 'vip-red-dune-desert-safari', 1, NULL, '2020-10-16 01:08:25', '2020-10-15 22:41:39', NULL, 0, 2, 0),
(5, 'Regular Desert Safari', 'Experience the thrills of the dunes and witness spectacular views of the sunset during our Desert Safari Tour. Upon reaching the camp in the desert, a traditional Arabian welcome awaits you.', '16', 6, '<ul class=\"cont-4\"> <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Pickup &amp; Drop Off from your location by land cruiser 4x4 car</li> <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Dune Bashing  by land cruiser (at lehbaab Red sand Dunes)</li> <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Sand Boarding</li> <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Camel Riding</li> <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Arabic Coffee, Tea and Sweets on Arrival</li> <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Barbecue Buffet with Vegetarian &amp; Non Vegetarian options(5* Quality catering)</li> <li><span class=\"mr-3 fa fa-long-arrow-right\"></span> Henna Painting</li> <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Sheesha (hubly bubly) At specific smoking area in camp</li> <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Photo Opportunities in Traditional Costume</li> <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Sitting Area with Carpets, Pillows and Cushions</li> <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Separate Toilet facility for both Men and Women</li> <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Unlimited soft drinks and water</li> <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Live Shows:Only Camp in Dubai With 7 Live Shows <ul class=\"singlePageul\"> <li><span class=\"fa fa-share-square-o\"></span> Belly Dance</li> <li><span class=\"fa fa-share-square-o\"></span> Fire Show</li> <li> <span class=\"fa fa-share-square-o\"></span>Two Tanoura Shows</li> </ul> </li> </ul>', '100', NULL, 'Person', 'Active', 'regular-desert-safari', 2, NULL, '2020-10-15 21:35:24', '2020-10-15 21:35:25', NULL, 2, 2, NULL),
(6, 'Exclusive Desert Safari', 'Experience the Private thrills of the red dunes and witness spectacular views of the sunset during our Desert Safari Tour with your loved ones. Upon reaching the camp in the desert, a traditional Arabian welcome awaits you', '17', 6, '<ul class=\"cont-4\">\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Number of people from 1 to 6 not more then 5 suitable for family and couples, and Group tour.</li>\r\n                           \r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Pickup &amp; Drop Off from your location by land cruiser 4x4</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Dune Bashing  by land cruiser 35 to 40 minutes (at lehbaab Red sand Dunes)</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Sand Boarding</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Camel Riding</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Arabic Coffee, Tea and Sweets on Arrival</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Barbecue Buffet with Vegetarian &amp; Non Vegetarian options(5* Quality catering)</li>\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>\r\nHenna Painting</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Sheesha(hubly bubly) At specific smooking area in camp</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Photo Opportunities in Traditional Costume</li>\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Sunset Photo Opportunities</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Sitting Area with Carpets, Pillows and Cushions</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Separate Toilet facility for both Men and Women</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Unlimited soft drinks and water</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Live Shows:Only Camp in Dubai With 7 Live Shows\r\n<ul class=\"singlePageul\">\r\n<li><span class=\"fa fa-share-square-o\"></span> Belly Dance</li>\r\n\r\n<li><span class=\"fa fa-share-square-o\"></span> Fire Show</li>\r\n\r\n<li> <span class=\"fa fa-share-square-o\"></span>Two Tanoura Shows</li>\r\n\r\n<li><span class=\"fa fa-share-square-o\"></span>Arabic Folklore Show</li>\r\n\r\n<li><span class=\"fa fa-share-square-o\"></span>Khaliji Dance Show</li>\r\n\r\n<li><span class=\"fa fa-share-square-o\"></span>Puppet Show</li>\r\n</ul>\r\n</li>\r\n     </ul>', '799', 6, 'Car', 'Active', 'exclusive-desert-safari', 3, NULL, '2020-10-15 21:51:56', '2020-10-15 21:51:56', NULL, 2, 2, NULL),
(7, 'Basic Desert Safari', 'Experience the thrills of the red dunes and witness spectacular views of the sunset during our Desert Safari Tour. Upon reaching the camp in the desert, a traditional Arabian welcome awaits you.', '18', 6, '<ul class=\"cont-4\">\r\n\r\n                       \r\n                           <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Pickup &amp; Drop Off from specific location Dubai and Sharjah by Bus or any available car</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Dune Bashing  by land cruiser</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Sand Boarding</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Camel Riding</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Arabic Coffee, Tea and Sweets on Arrival</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Barbecue Buffet with Vegetarian &amp; Non Vegetarian options(5* Quality catering)</li>\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>\r\nHenna Painting</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Sheesha (hubly bubly) At specific smoking area in camp</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Photo Opportunities in Traditional Costume</li>\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Sunset Photo Opportunities</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Sitting Area with Carpets, Pillows and Cushions</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Separate Toilet facility for both Men and Women</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Unlimited soft drinks and water</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Live Shows:Only Camp in Dubai With Live Shows\r\n<ul class=\"singlePageul\">\r\n<li><span class=\"fa fa-share-square-o\"></span> Belly Dance</li>\r\n\r\n<li><span class=\"fa fa-share-square-o\"></span> Fire Show</li>\r\n\r\n<li> <span class=\"fa fa-share-square-o\"></span>Two Tanoura Shows</li>\r\n\r\n\r\n</ul>\r\n</li>\r\n                                 \r\n                    </ul>', '75', 0, 'Person', 'Active', 'basic-desert-safari', 4, NULL, '2020-10-15 22:41:05', '2020-10-15 23:03:28', NULL, 2, 2, NULL),
(8, 'Cheap Desert Safari', 'Experience the thrills of the dunes and witness spectacular views of the sunset during our Desert Safari Tour. Upon reaching the camp in the desert, a traditional Arabian welcome awaits you.', '19', 6, '<ul class=\"cont-4\">\r\n\r\n                       \r\n                           <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Customer will come at meeting point drive through by  Own car</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Dune Bashing  by land cruiser</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Sand Boarding</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Camel Riding</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Arabic Coffee, Tea and Sweets on Arrival</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Barbecue Buffet with Vegetarian &amp; Non Vegetarian options(5* Quality catering)</li>\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>\r\nHenna Painting</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Sheesha(hubly bubly) At specific smooking area in camp</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Photo Opportunities in Traditional Costume</li>\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Sunset Photo Opportunities</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Sitting Area with Carpets, Pillows and Cushions</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Separate Toilet facility for both Men and Women</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Unlimited soft drinks and water</li>\r\n\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Live Shows:Only Camp in Dubai With Live Shows\r\n<ul class=\"singlePageul\">\r\n<li><span class=\"fa fa-share-square-o\"></span> Belly Dance</li>\r\n\r\n<li><span class=\"fa fa-share-square-o\"></span> Fire Show</li>\r\n\r\n<li> <span class=\"fa fa-share-square-o\"></span>Two Tanoura Shows</li>\r\n\r\n\r\n</ul>\r\n</li>\r\n              \r\n                        \r\n                    </ul>', '60', NULL, 'Person', 'Active', 'cheap-desert-safari', 5, NULL, '2020-10-15 22:45:24', '2020-10-15 22:49:34', NULL, 2, 2, NULL),
(9, 'Majesty Luxury Yacht', 'Best yacht charter and boat rental company in Dubai.\r\nWide range of yachts to choose from. Enjoy a day out in the sea with your friends and family.', '23', 7, '<ul class=\"singlePage\">\r\n                                <li><span class=\"fa fa-bed\"></span> 4 Rooms</li>\r\n                                <li><span class=\"fa fa-bath\"></span>Saloon</li>\r\n                                <li><span class=\"fa fa-ship\"></span> Jacuzzi</li>\r\n                                 <li><span class=\"fa fa-ship\"></span> 16 Knots</li>\r\n                                <li><span class=\"fa fa-share-square-o\"></span> Sun Bathing on Fly Deck</li>\r\n                                <li><span class=\"fa fa-share-square-o\"></span> BBQ on Fly Desk</li>\r\n                            </ul>\r\n  <ul class=\"cont-4\">\r\n\r\n                        <b>More:</b>\r\n                        <li><span class=\"mr-3 fa fa-long-arrow-right\"></span> soft drinks, ice, and still water.</li>\r\n                        <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Bathroom amenities, bath, and swim towels.</li>\r\n                        <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Fuel and Berthing at Marina.</li>\r\n                        \r\n                    </ul>', '1999', 44, 'per Hour', 'Active', 'majesty-luxury-yacht', 1, '86 FT', '2020-10-15 23:11:10', '2020-10-15 23:50:42', NULL, 2, 2, NULL),
(10, 'Italian Azimut Luxury Yacht', 'Best yacht charter and boat rental company in Dubai.\r\nWide range of yachts to choose from. Enjoy a day out in the sea with your friends and family.', '24', 7, '<ul class=\"singlePage\">\r\n<li><span class=\"fa fa-bed\"></span> 3 Rooms</li>\r\n                                <li><span class=\"fa fa-bath\"></span> Saloon</li>\r\n                                <li><span class=\"fa fa-ship\"></span> 20 Knots</li>\r\n                                <li><span class=\"fa fa-share-square-o\"></span> Sun Bathing on Fly Deck</li>\r\n                                <li><span class=\"fa fa-share-square-o\"></span> BBQ on Fly Desk</li>\r\n <b>More:</b>\r\n                        <li><span class=\"mr-3 fa fa-long-arrow-right\"></span> soft drinks, ice, and still water.</li>\r\n                        <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Bathroom amenities, bath, and swim towels.</li>\r\n                        <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Fuel and Berthing at Marina.</li>\r\n</ul>', '1599', 25, 'per Hour', 'Active', 'italian-azimut-luxury-yacht', 2, '62 FT', '2020-10-15 23:14:39', '2020-10-15 23:59:33', NULL, 2, 2, NULL),
(11, 'American Sea Ray', 'Best yacht charter and boat rental company in Dubai.\r\nWide range of yachts to choose from. Enjoy a day out in the sea with your friends and family.', '25', 7, '<ul class=\"singlePage\">\r\n  <li><span class=\"fa fa-bed\"></span> 2 Beds</li>\r\n                                <li><span class=\"fa fa-bath\"></span> Saloon</li>\r\n                                <li><span class=\"fa fa-ship\"></span> 20 Knots</li>\r\n                                <li><span class=\"fa fa-share-square-o\"></span> Sun Bathing on Fly Deck</li>\r\n                                <li><span class=\"fa fa-share-square-o\"></span> BBQ on Fly Desk</li>\r\n  <b>More:</b>\r\n                        <li><span class=\"mr-3 fa fa-long-arrow-right\"></span> soft drinks, ice, and still water.</li>\r\n                        <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Bathroom amenities, bath, and swim towels.</li>\r\n                        <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Fuel and Berthing at Marina.</li>\r\n                            </ul>', '799', 11, 'per Hour', 'Active', 'american-sea-ray', 3, '42 FT', '2020-10-15 23:17:47', '2020-10-15 23:58:52', NULL, 2, 2, NULL),
(12, 'Vodoo Sporty Speed Boat', 'Best yacht charter and boat rental company in Dubai.\r\nWide range of yachts to choose from. Enjoy a day out in the sea with your friends and family.', '26', 7, '<ul class=\"cont-4\">\r\n   <li><span class=\"fa fa-bed\"></span>Thrilling adventure</li>\r\n                               <li><span class=\"fa fa-ship\"></span> 28 Knots</li>\r\n                                <li><span class=\"fa fa-share-square-o\"></span> Life Jacket</li>\r\n                                <li><span class=\"fa fa-share-square-o\"></span>Fishing Rods</li>\r\n                            </ul>', '699', 8, 'per Hour', 'Active', 'vodoo-sporty-speed-boat', 4, '36 FT', '2020-10-15 23:20:16', '2020-10-15 23:55:11', NULL, 2, 2, NULL),
(13, 'World Biggest Dhow Cruise (Hand Made)', 'The dhow has long been used as a trading vehicle. \r\nYou can experience the romance of sailing on one of these graceful wooden Hand Made with our special World Biggest Dhow Cruise with 5* Dinner package. The cruise takes place at night, so you can enjoy the breathtaking sight of Dubai by night.\r\n Whether you’re with your family or enjoying a romantic vacation with your special someone, our Dhow Cruise will surely leave you with memories that you will treasure forever.\r\nFrom your hotel or residence in Dubai, we’ll take you to where the dhow is moored so that you can begin your cruise down the Dubai creek. As you enjoy your delicious barbecue buffet dinner, you’ll also be entertained by the special live entertainment including a belly dance done to traditional Arabian music, a magic show and a Tanora Dance.', '27', 8, '<ul class=\"singlePage\">  \r\n<li><span class=\"fa fa-bed\"></span>5</li>\r\n                                <li><span class=\"fa fa-bath\"></span> VIP Majlis</li>\r\n                                <li><span class=\"fa fa-share-square-o\"></span> Air Conditioned Middle Deck</li>\r\n                                <li><span class=\"fa fa-share-square-o\"></span>  Fresh Air Uper Deck</li>\r\n                                <li><span class=\"fa fa-share-square-o\"></span> VIP Sky Deck</li>\r\n <b>More:</b>\r\n                        <li><span class=\"mr-3 fa fa-long-arrow-right\"></span> 2 Hours cruising in Al Seef Dubai</li>\r\n                        <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Red carpet welcome with soft juice, dates &amp; coffee.</li>\r\n                        <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Arabic sweets &amp; fresh fruits</li>\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>5 Star International Buffet including live stations, Arabic appetizers, grilled meats, fresh salads, delicious Arabic sweets</li>\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span> Family Entertainment</li>\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Egyptian artist performance ( known as Tanoura Dance Show )</li>\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span> Pick And Drop From Your Location</li>\r\n\r\n<b>Terms &amp; Conditions:</b>\r\n                        <li><span class=\"mr-3 fa fa-long-arrow-right\"></span> All Prices are on sharing basis.</li>\r\n                        <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Suitable for all age groups</li>\r\n                        <li><span class=\"mr-3 fa fa-long-arrow-right\"></span>Children above 10 years will be charge as adult and less than 3 years will be free</li>\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span> Cancellation should be before 24 hours</li>\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span> Cancellation should be before 24 hours</li>\r\n<li><span class=\"mr-3 fa fa-long-arrow-right\"></span> Rates will be subject to change without further notice</li>\r\n\r\n          \r\n                            </ul>', '300', 0, 'per Person', 'Active', 'world-biggest-dhow-cruise-hand-made', 1, '86 Mtr', '2020-10-16 00:19:36', '2020-10-16 00:19:37', NULL, 2, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

DROP TABLE IF EXISTS `social_links`;
CREATE TABLE IF NOT EXISTS `social_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `icon` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `status` enum('Active','InActive') DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teamsocial`
--

DROP TABLE IF EXISTS `teamsocial`;
CREATE TABLE IF NOT EXISTS `teamsocial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `status` enum('Active','InActive') DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload_file`
--

DROP TABLE IF EXISTS `upload_file`;
CREATE TABLE IF NOT EXISTS `upload_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `parent_table` varchar(150) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `status` enum('Active','InActive') DEFAULT 'Active',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_file`
--

INSERT INTO `upload_file` (`id`, `name`, `parent_id`, `parent_table`, `url`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'g2.jpg', 6, 'services_list', 'services/2020/October/F21uWeusgalST80z9gSaaY7xX0K4cLcOeR9CPFIK.jpeg', 'Active', 2, 2, NULL, '2020-10-15 10:58:31', '2020-10-15 10:58:31', NULL),
(8, 'g1.jpg', 7, 'services_list', 'services/2020/October/EVswmeJVGM1qQXzctKQ2bUbcZBkRp6MaOPE2JXGv.jpeg', 'Active', 2, 2, NULL, '2020-10-15 11:08:39', '2020-10-15 11:08:39', NULL),
(9, 'g3.jpg', 8, 'services_list', 'services/2020/October/7Bah0WvRWce99mIoqVrB2ryKSQE6VEsJqLZDGd5H.jpeg', 'Active', 2, 2, NULL, '2020-10-15 11:12:09', '2020-10-15 11:12:09', NULL),
(10, 'g4.jpg', 9, 'services_list', 'services/2020/October/3OeV8L1ff6AckOwYN99AZEjDh3Sr4h2ya5JeGOgV.jpeg', 'Active', 2, 2, NULL, '2020-10-15 11:14:26', '2020-10-15 11:14:26', NULL),
(11, 'g6.jpg', 10, 'services_list', 'services/2020/October/7h2QFWpXhW8pOT8f1nPfpAfJbd4IC1ifiGcBacWu.jpeg', 'Active', 2, 2, NULL, '2020-10-15 11:30:09', '2020-10-15 11:30:09', NULL),
(12, '1.jpg', 3, 'services_products', 'products/2020/October/KtRdFOaGGT3LVa1rLOtWGOkSkETo1oNlBhF8pxxz.jpeg', 'Active', 2, 2, NULL, '2020-10-15 15:17:41', '2020-10-15 15:17:41', NULL),
(13, '2.jpg', 2, 'services_products', 'products/2020/October/jSsOUu9hqSLBLkObhC7om91AkrnWkgmlfwjsZfjl.jpeg', 'Active', 2, 2, NULL, '2020-10-15 15:23:22', '2020-10-15 15:23:22', NULL),
(14, '5.jpg', 4, 'services_products', 'products/2020/October/0UTQ7g0ymRcNu2RqdwYXmHsm8dI9UFhDzygiDjnD.jpeg', 'Active', 2, 2, NULL, '2020-10-15 15:30:47', '2020-10-15 15:30:47', NULL),
(15, 'RED-DUNES-DESERT-SAFARI-TOUR.jpg', 1, 'services_products', 'products/2020/October/baDqmkBwpEffNYwccqPF7OMbS3b3c2nB9YzNo3a9.jpeg', 'Active', 2, 2, NULL, '2020-10-15 15:52:55', '2020-10-15 15:52:55', NULL),
(16, 'type-of-desert-safari-in-dubai.jpg', 5, 'services_products', 'products/2020/October/XZxOtIrcmAjek3x3SoPbvRc94B3mIIR78JvxcuOR.jpeg', 'Active', 2, 2, NULL, '2020-10-15 16:35:25', '2020-10-15 16:35:25', NULL),
(17, 'Arabian-Adventures_2018_FIT-Dinner-Belly-Dancer_Landscape.jpg', 6, 'services_products', 'products/2020/October/XsFx7b2RqkwIQ9hkhzCw99U2FFj5OxhFshyhEouu.jpeg', 'Active', 2, 2, NULL, '2020-10-15 16:51:56', '2020-10-15 16:51:56', NULL),
(18, 'Dubai-Tour-4X4-Hummer-Safari-with-BBQ-Dinner-9-13667.png', 7, 'services_products', 'products/2020/October/RZ4NZpviXe3xH7DcYWSgDGHDfwdMbxeaFKkwJgPb.jpeg', 'Active', 2, 2, NULL, '2020-10-15 17:41:05', '2020-10-15 17:41:05', NULL),
(19, 'ea.jpg', 8, 'services_products', 'products/2020/October/8jQOTY9sh8t33bRMO65Gs9dFjrd0A4TtGkfiLIKd.jpeg', 'Active', 2, 2, NULL, '2020-10-15 17:49:34', '2020-10-15 17:49:34', NULL),
(20, '86feets.jpeg', 9, 'services_products', 'products/2020/October/AH5HVyNDsXrgsL1uQ5sYnuCS4c9JnR4m2gz4FIQW.jpeg', 'Active', 2, 2, NULL, '2020-10-15 18:11:10', '2020-10-15 18:11:10', NULL),
(21, '62feets.jpeg', 10, 'services_products', 'products/2020/October/2hY2fMCXez0wyRPuEChXCZRYQ5SSbLO2Wpv4jlyz.jpeg', 'Active', 2, 2, NULL, '2020-10-15 18:14:39', '2020-10-15 18:14:39', NULL),
(22, 'speedboat.jpeg', 12, 'services_products', 'products/2020/October/GsdAzP6ukHuyjtDrSPHmWtYmSRazpVUiCyvGgeuH.jpeg', 'Active', 2, 2, NULL, '2020-10-15 18:20:16', '2020-10-15 18:20:16', NULL),
(23, '86feets.jpeg', 9, 'services_products', 'products/2020/October/icnOfdjsJlHHJrSnWwvhypV5AQMuJq1tANeHJzgo.jpeg', 'Active', 2, 2, NULL, '2020-10-15 18:25:09', '2020-10-15 18:25:09', NULL),
(24, '62feets.jpeg', 10, 'services_products', 'products/2020/October/uDmD8RWMQa2aExQpfzsA0Uvp8s72IwiNIXrlUrO2.jpeg', 'Active', 2, 2, NULL, '2020-10-15 18:26:38', '2020-10-15 18:26:38', NULL),
(25, '42feets.jpeg', 11, 'services_products', 'products/2020/October/wCFmU90KBaD6anOyaqg2SBFtQFmb6U66TUtFdaCi.jpeg', 'Active', 2, 2, NULL, '2020-10-15 18:27:09', '2020-10-15 18:27:09', NULL),
(26, 'speedboat.jpeg', 12, 'services_products', 'products/2020/October/Nk79diqaxbLEvbU2btxmqU90GRb354D0jQshVR8l.jpeg', 'Active', 2, 2, NULL, '2020-10-15 18:27:43', '2020-10-15 18:27:43', NULL),
(27, 'g3.jpg', 13, 'services_products', 'products/2020/October/HGjwS6B3xWpDgAhfDEw438yE7DoIGyfr0EvF1DAm.jpeg', 'Active', 2, 2, NULL, '2020-10-15 19:19:37', '2020-10-15 19:19:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','InActive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Aamir Bashir', 'admin@dxbtoursntravel.ae', NULL, '25d55ad283aa400af464c76d713c07ad', NULL, 'Active', '2020-10-15 10:37:33', '2020-10-15 10:37:33');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
