-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2020 at 06:44 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ask_me_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(27, '2019_08_19_000000_create_failed_jobs_table', 1),
(28, '2020_08_11_104245_create_super_admins_table', 1),
(29, '2020_08_11_152853_create_countries_table', 1),
(30, '2020_08_11_153952_create_states_table', 1),
(31, '2020_08_11_154013_create_cities_table', 1),
(32, '2020_08_12_183238_create_cuisines_table', 1),
(33, '2020_08_12_184312_create_privacy_policies_table', 1),
(34, '2020_08_14_154829_create_restaurants_table', 1),
(35, '2020_08_18_173126_create_restaurant_users_table', 1),
(36, '2020_08_18_175147_create_restaurant_ingredient_units_table', 1),
(37, '2020_08_18_181138_create_restaurant_ingredient_categories_table', 1),
(38, '2020_08_18_182041_create_restaurant_ingredients_table', 1),
(39, '2020_08_18_182233_create_restaurant_suppliers_table', 1),
(40, '2020_08_20_162929_create_restaurant_purchases_table', 2),
(41, '2020_08_20_162956_create_restaurant_purchase_ingredients_table', 2),
(42, '2020_08_21_145512_create_restaurant_customers_table', 3),
(44, '2020_08_21_162524_create_restaurant_food_menu_categories_table', 4),
(47, '2020_08_21_162454_create_restaurant_food_menu_shifts_table', 5),
(48, '2020_08_22_073301_create_restaurant_kitchen_panels_table', 6),
(50, '2020_08_31_142507_create_restaurant_food_menu_modifiers_table', 7),
(51, '2020_08_31_142649_create_restaurant_food_menu_modifier_ingredients_table', 8),
(52, '2020_09_01_163108_create_restaurant_settings_taxes_table', 9),
(53, '2020_09_01_163213_create_restaurant_settings_tax_fields_table', 9),
(54, '2020_09_01_163225_create_restaurant_settings_logos_table', 9),
(57, '2020_09_01_175425_create_restaurant_settings_social_links_table', 10),
(58, '2020_09_04_171558_create_restaurant_food_menus_table', 11),
(59, '2020_09_04_171638_create_restaurant_food_menu_ingredients_table', 12),
(60, '2020_09_04_171937_create_restaurant_modifier_for_food_menus_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cities`
--

CREATE TABLE `tbl_cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_cities`
--

INSERT INTO `tbl_cities` (`id`, `name`, `country`, `state`, `country_id`, `state_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 'Bangladesh', 'Nikunja', 1, 1, 'Live', '2020-08-19 08:46:56', '2020-08-19 08:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_countries`
--

INSERT INTO `tbl_countries` (`id`, `name`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 'Live', '2020-08-19 08:46:39', '2020-08-19 08:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cuisines`
--

CREATE TABLE `tbl_cuisines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_privacy_policies`
--

CREATE TABLE `tbl_privacy_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `privacy_policies` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_privacy_policies`
--

INSERT INTO `tbl_privacy_policies` (`id`, `privacy_policies`, `created_at`, `updated_at`) VALUES
(1, 'We at Wasai LLC respect the privacy of your personal information and, as such, make every effort to ensure your information is protected and remains private. As the owner and operator of loremipsum.io (the \"Website\") hereafter referred to in this Privacy Policy as \"Lorem Ipsum\", \"us\", \"our\" or \"we\", we have provided this Privacy Policy to explain how we collect, use, share and protect information about the users of our Website (hereafter referred to as “user”, “you” or \"your\"). For the purposes of this Agreement, any use of the terms \"Lorem Ipsum\", \"us\", \"our\" or \"we\" includes Wasai LLC, without limitation. We will not use or share your personal information with anyone except as described in this Privacy Policy.\n\nThis Privacy Policy will inform you about the types of personal data we collect, the purposes for which we use the data, the ways in which the data is handled and your rights with regard to your personal data. Furthermore, this Privacy Policy is intended to satisfy the obligation of transparency under the EU General Data Protection Regulation 2016/679 (\"GDPR\") and the laws implementing GDPR.\n\nFor the purpose of this Privacy Policy the Data Controller of personal data is Wasai LLC and our contact details are set out in the Contact section at the end of this Privacy Policy. Data Controller means the natural or legal person who (either alone or jointly or in common with other persons) determines the purposes for which and the manner in which any personal information are, or are to be, processed.\n\nFor purposes of this Privacy Policy, \"Your Information\" or \"Personal Data\" means information about you, which may be of a confidential or sensitive nature and may include personally identifiable information (\"PII\") and/or financial information. PII means individually identifiable information that would allow us to determine the actual identity of a specific living person, while sensitive data may include information, comments, content and other information that you voluntarily provide.\n\nLorem Ipsum collects information about you when you use our Website to access our services, and other online products and services (collectively, the “Services”) and through other interactions and communications you have with us. The term Services includes, collectively, various applications, websites, widgets, email notifications and other mediums, or portions of such mediums, through which you have accessed this Privacy Policy.\n\nWe may change this Privacy Policy from time to time. If we decide to change this Privacy Policy, we will inform you by posting the revised Privacy Policy on the Site. Those changes will go into effect on the \"Last updated\" date shown at the end of this Privacy Policy. By continuing to use the Site or Services, you consent to the revised Privacy Policy. We encourage you to periodically review the Privacy Policy for the latest information on our privacy practices.\n\nBY ACCESSING OR USING OUR SERVICES, YOU CONSENT TO THE COLLECTION, TRANSFER, MANIPULATION, STORAGE, DISCLOSURE AND OTHER USES OF YOUR INFORMATION (COLLECTIVELY, \"USE OF YOUR INFORMATION\") AS DESCRIBED IN THIS PRIVACY POLICY. IF YOU DO NOT AGREE WITH OR CONSENT TO THIS PRIVACY POLICY YOU MAY NOT ACCESS OR USE OUR SERVICES.', '2020-08-19 08:46:12', '2020-08-19 08:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurants`
--

CREATE TABLE `tbl_restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approval_status` enum('Approve','Disapprove') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Disapprove',
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurants`
--

INSERT INTO `tbl_restaurants` (`id`, `restaurant_id`, `name`, `phone`, `email`, `country_id`, `state_id`, `city_id`, `address`, `approval_status`, `del_status`, `created_at`, `updated_at`) VALUES
(2, '58vn0b', 'Zachery Young', '+1 (945) 212-9735', 'porad@mailinator.com', 1, 1, 1, 'Mollitia quaerat del', 'Approve', 'Live', '2020-08-19 08:47:56', '2020-08-19 09:54:39'),
(3, '8p9nbg', 'Barrett Ramsey', '+1 (608) 504-9769', 'diny@mailinator.com', 1, 1, 1, 'Quisquam amet fugia', 'Approve', 'Live', '2020-08-19 08:49:33', '2020-09-02 04:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_customers`
--

CREATE TABLE `tbl_restaurant_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_customers`
--

INSERT INTO `tbl_restaurant_customers` (`id`, `name`, `phone`, `email`, `address`, `apt`, `city_id`, `state_id`, `zip`, `code`, `country_id`, `note`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'Diana Lawrence', '', 'qesyn@mailinator.com', 'Quis consectetur aut', 'Reprehenderit mollit', 1, 1, '45163', 'Est est eum laborum', 1, 'Et itaque laborum do', 3, '2', 'Deleted', '2020-08-21 09:39:05', '2020-08-21 09:58:28'),
(2, 'Jolene Finch', '+1 (367) 406-7914', 'wiwalypyp@mailinator.com', 'Est sapiente est nec', 'Consectetur quam in', 1, 1, '80775', 'Officia enim volupta', 1, 'Cum nobis perferendi', 3, '2', 'Live', '2020-08-21 09:58:42', '2020-08-21 09:58:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_food_menus`
--

CREATE TABLE `tbl_restaurant_food_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `dine_in_price` double(10,2) NOT NULL,
  `take_away_price` double(10,2) NOT NULL,
  `delivery_order_price` double(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `veg_item` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `beverage` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `shift_id` bigint(20) UNSIGNED NOT NULL,
  `panel_id` bigint(20) UNSIGNED NOT NULL,
  `tax_info` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_food_menus`
--

INSERT INTO `tbl_restaurant_food_menus` (`id`, `name`, `code`, `cat_id`, `dine_in_price`, `take_away_price`, `delivery_order_price`, `description`, `photo`, `veg_item`, `beverage`, `shift_id`, `panel_id`, `tax_info`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'Nelle Hewitt', '01', 5, 150.00, 633.00, 757.00, 'Quas deserunt tempor', NULL, 'Yes', 'No', 10, 2, '[{\"tax_field_id\":\"7\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"0\"}]', 3, '2', 'Deleted', '2020-09-05 05:18:35', '2020-09-05 07:20:45'),
(2, 'Joan Hogan', '02', 5, 930.00, 612.00, 958.00, 'Sapiente quis soluta', '1599311557_beautiful-clouds-landscape.jpg', 'No', 'No', 10, 2, '[{\"tax_field_id\":\"7\",\"tax_field_name\":\"VAT\",\"tax_field_percentage\":\"7\"}]', 3, '2', 'Live', '2020-09-05 05:27:39', '2020-09-05 07:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_food_menu_categories`
--

CREATE TABLE `tbl_restaurant_food_menu_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delay_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_food_menu_categories`
--

INSERT INTO `tbl_restaurant_food_menu_categories` (`id`, `name`, `delay_time`, `description`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'Noodles', '20', 'Bla bla bla', 3, '2', 'Live', '2020-08-21 13:31:25', '2020-08-21 13:34:12'),
(2, 'Lamar Sweet', '100', 'Sit omnis ea unde of', 3, '2', 'Deleted', '2020-08-21 13:34:20', '2020-08-21 13:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_food_menu_ingredients`
--

CREATE TABLE `tbl_restaurant_food_menu_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ing_id` bigint(20) UNSIGNED NOT NULL,
  `consumption` double(10,2) NOT NULL,
  `food_menu_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_food_menu_ingredients`
--

INSERT INTO `tbl_restaurant_food_menu_ingredients` (`id`, `ing_id`, `consumption`, `food_menu_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 2, 123.00, 2, 'Deleted', '2020-09-05 05:27:39', '2020-09-05 07:12:53'),
(2, 1, 1230.00, 2, 'Deleted', '2020-09-05 05:27:39', '2020-09-05 07:12:53'),
(3, 2, 123.00, 2, 'Deleted', '2020-09-05 07:09:28', '2020-09-05 07:12:53'),
(4, 1, 1230.00, 2, 'Deleted', '2020-09-05 07:09:28', '2020-09-05 07:12:53'),
(5, 2, 123.00, 2, 'Deleted', '2020-09-05 07:11:13', '2020-09-05 07:12:53'),
(6, 2, 123.00, 2, 'Deleted', '2020-09-05 07:11:30', '2020-09-05 07:12:53'),
(7, 2, 123.00, 2, 'Deleted', '2020-09-05 07:12:28', '2020-09-05 07:12:53'),
(8, 2, 123.00, 2, 'Deleted', '2020-09-05 07:12:37', '2020-09-05 07:12:53'),
(9, 2, 123.00, 2, 'Live', '2020-09-05 07:12:53', '2020-09-05 07:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_food_menu_modifiers`
--

CREATE TABLE `tbl_restaurant_food_menu_modifiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_food_menu_modifiers`
--

INSERT INTO `tbl_restaurant_food_menu_modifiers` (`id`, `name`, `price`, `description`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(8, 'Test', 100.00, '', 3, '2', 'Deleted', '2020-08-31 12:05:51', '2020-09-05 07:20:38'),
(9, 'Cora Barker', 560.00, 'Dolorem iste itaque', 3, '2', 'Live', '2020-08-31 12:10:11', '2020-08-31 12:10:11'),
(10, 'Cheyenne Jordan', 526.00, 'Ut laboris ullam lab', 3, '2', 'Live', '2020-09-05 10:38:58', '2020-09-05 10:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_food_menu_modifier_ingredients`
--

CREATE TABLE `tbl_restaurant_food_menu_modifier_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ig_id` bigint(20) UNSIGNED NOT NULL,
  `consumption` double(10,2) NOT NULL,
  `mod_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_food_menu_modifier_ingredients`
--

INSERT INTO `tbl_restaurant_food_menu_modifier_ingredients` (`id`, `ig_id`, `consumption`, `mod_id`, `del_status`, `created_at`, `updated_at`) VALUES
(4, 1, 123.00, 8, 'Deleted', '2020-08-31 12:05:51', '2020-09-05 07:20:38'),
(5, 1, 123.00, 9, 'Deleted', '2020-08-31 12:10:11', '2020-08-31 12:16:50'),
(6, 2, 2458.00, 9, 'Deleted', '2020-08-31 12:13:03', '2020-08-31 12:16:50'),
(7, 1, 1230.00, 9, 'Live', '2020-08-31 12:16:50', '2020-08-31 12:16:50'),
(8, 1, 1230.00, 10, 'Live', '2020-09-05 10:38:58', '2020-09-05 10:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_food_menu_shifts`
--

CREATE TABLE `tbl_restaurant_food_menu_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_time` time NOT NULL,
  `ending_time` time NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_food_menu_shifts`
--

INSERT INTO `tbl_restaurant_food_menu_shifts` (`id`, `name`, `starting_time`, `ending_time`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(9, 'Breakfast', '08:00:00', '10:00:00', 3, '2', 'Live', '2020-08-22 00:44:24', '2020-08-22 00:44:24'),
(10, 'Lunch', '12:00:00', '15:00:00', 3, '2', 'Live', '2020-08-22 00:44:54', '2020-08-22 00:44:54'),
(11, 'Wallace Becker', '11:29:00', '11:50:00', 3, '2', 'Deleted', '2020-08-22 01:19:15', '2020-08-22 01:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_ingredients`
--

CREATE TABLE `tbl_restaurant_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `purchase_price` double(10,2) NOT NULL,
  `alert_quantity` double(10,2) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_ingredients`
--

INSERT INTO `tbl_restaurant_ingredients` (`id`, `name`, `category_id`, `unit_id`, `purchase_price`, `alert_quantity`, `code`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 5, 9, 99.00, 10.00, '123', 3, '2', 'Live', '2020-08-20 02:39:06', '2020-08-20 02:39:06'),
(2, 'Banana', 5, 9, 60.00, 4.00, '321', 3, '2', 'Live', '2020-08-20 02:39:06', '2020-08-20 02:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_ingredient_categories`
--

CREATE TABLE `tbl_restaurant_ingredient_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_ingredient_categories`
--

INSERT INTO `tbl_restaurant_ingredient_categories` (`id`, `name`, `description`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(2, 'Oil', 'Bla bla bla', 3, '2', 'Live', '2020-08-19 11:00:55', '2020-08-19 11:00:55'),
(5, 'Fruit', NULL, 3, '2', 'Live', '2020-08-20 02:31:35', '2020-08-20 02:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_ingredient_units`
--

CREATE TABLE `tbl_restaurant_ingredient_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_ingredient_units`
--

INSERT INTO `tbl_restaurant_ingredient_units` (`id`, `name`, `description`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'Kg', 'Bla bla bla', 3, '2', 'Deleted', '2020-08-19 11:07:43', '2020-08-19 11:08:38'),
(2, 'Kg', 'Bla bla bla', 3, '2', 'Live', '2020-08-19 11:08:48', '2020-08-19 11:08:48'),
(9, 'Pcs', NULL, 3, '2', 'Live', '2020-08-20 02:31:35', '2020-08-20 02:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_kitchen_panels`
--

CREATE TABLE `tbl_restaurant_kitchen_panels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_kitchen_panels`
--

INSERT INTO `tbl_restaurant_kitchen_panels` (`id`, `name`, `description`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'Fatima Boyle', 'Incididunt dolore et', 3, '2', 'Deleted', '2020-08-22 01:48:57', '2020-08-22 01:50:02'),
(2, 'Melvin French', 'Nostrud deserunt nis', 3, '2', 'Live', '2020-08-22 01:50:08', '2020-08-22 01:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_modifier_for_food_menus`
--

CREATE TABLE `tbl_restaurant_modifier_for_food_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mdf_id` bigint(20) UNSIGNED NOT NULL,
  `fd_menu_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_modifier_for_food_menus`
--

INSERT INTO `tbl_restaurant_modifier_for_food_menus` (`id`, `mdf_id`, `fd_menu_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 9, 2, 'Deleted', '2020-09-05 08:00:29', '2020-09-05 10:39:37'),
(2, 9, 2, 'Deleted', '2020-09-05 10:30:39', '2020-09-05 10:39:37'),
(3, 9, 2, 'Deleted', '2020-09-05 10:34:09', '2020-09-05 10:39:37'),
(4, 9, 2, 'Deleted', '2020-09-05 10:37:59', '2020-09-05 10:39:37'),
(5, 10, 2, 'Deleted', '2020-09-05 10:39:21', '2020-09-05 10:39:37'),
(6, 10, 2, 'Deleted', '2020-09-05 10:39:28', '2020-09-05 10:39:37'),
(7, 9, 2, 'Deleted', '2020-09-05 10:39:28', '2020-09-05 10:39:37'),
(8, 9, 2, 'Live', '2020-09-05 10:39:37', '2020-09-05 10:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_purchases`
--

CREATE TABLE `tbl_restaurant_purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` double(10,2) NOT NULL,
  `grand_total` double(10,2) NOT NULL,
  `paid` double(10,2) NOT NULL,
  `due` double(10,2) NOT NULL,
  `purchase_type` enum('Direct Purchase','Purchase Request') COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_purchases`
--

INSERT INTO `tbl_restaurant_purchases` (`id`, `reference_no`, `supplier_id`, `date`, `subtotal`, `grand_total`, `paid`, `due`, `purchase_type`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, '000001', 2, '2020-08-20', 1089.00, 1089.00, 1000.00, 89.00, 'Direct Purchase', 3, '2', 'Deleted', '2020-08-20 12:30:57', '2020-08-20 13:07:52'),
(2, '000001', 2, '2020-08-20', 110889.00, 110889.00, 1000.00, 109889.00, 'Direct Purchase', 3, '2', 'Live', '2020-08-20 13:08:27', '2020-08-21 04:13:51'),
(3, '000002', 2, '2020-08-21', 1791249.00, 1791249.00, 10000.00, 1781249.00, 'Direct Purchase', 3, '2', 'Live', '2020-08-21 05:04:02', '2020-08-21 05:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_purchase_ingredients`
--

CREATE TABLE `tbl_restaurant_purchase_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ingredient_id` bigint(20) UNSIGNED NOT NULL,
  `unit_price` double(10,2) NOT NULL,
  `quantity_amount` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_purchase_ingredients`
--

INSERT INTO `tbl_restaurant_purchase_ingredients` (`id`, `ingredient_id`, `unit_price`, `quantity_amount`, `total`, `purchase_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 1, 99.00, 123.00, 12177.00, 1, 'Live', '2020-08-20 12:30:57', '2020-08-21 05:09:58'),
(2, 1, 99.00, 11.00, 1089.00, 2, 'Live', '2020-08-20 13:08:27', '2020-08-20 13:08:27'),
(3, 1, 123.00, 14563.00, 1791249.00, 3, 'Live', '2020-08-21 05:04:02', '2020-08-21 05:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_settings_logos`
--

CREATE TABLE `tbl_restaurant_settings_logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_settings_logos`
--

INSERT INTO `tbl_restaurant_settings_logos` (`id`, `logo`, `restaurant_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1599040581_Iq5UY9.jpg', 3, '2', '2020-09-02 03:51:20', '2020-09-02 03:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_settings_social_links`
--

CREATE TABLE `tbl_restaurant_settings_social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_settings_social_links`
--

INSERT INTO `tbl_restaurant_settings_social_links` (`id`, `facebook_username`, `facebook_password`, `twitter_username`, `twitter_password`, `instagram_username`, `instagram_password`, `restaurant_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'jofiluqy', '$2y$10$9DIzGO15btXRf32gYdc9h.GqodbuWlRtcpBMv4VgEBBzrZJMElara', 'bycozet', '$2y$10$3CIfKAYl32nQsFzQCU.3AuIr4oz8fGK.AcOnn2jGAtnwj0jPXIlFG', 'tipasuq', '$2y$10$VL5/EBbu2fp9w1jJzT5N.OKSaf7JKhv.iqTjVorn/UkoP6qShoNuC', 3, '2', '2020-09-02 04:09:19', '2020-09-02 04:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_settings_taxes`
--

CREATE TABLE `tbl_restaurant_settings_taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `collect_tax` enum('Yes','No') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_settings_taxes`
--

INSERT INTO `tbl_restaurant_settings_taxes` (`id`, `collect_tax`, `reg_no`, `restaurant_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Yes', '0123456789', 3, '2', '2020-09-02 03:51:20', '2020-09-02 04:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_settings_tax_fields`
--

CREATE TABLE `tbl_restaurant_settings_tax_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_settings_tax_fields`
--

INSERT INTO `tbl_restaurant_settings_tax_fields` (`id`, `tax_id`, `name`, `created_at`, `updated_at`) VALUES
(7, 1, 'VAT', '2020-09-02 04:20:15', '2020-09-02 04:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_suppliers`
--

CREATE TABLE `tbl_restaurant_suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `routing_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_suppliers`
--

INSERT INTO `tbl_restaurant_suppliers` (`id`, `name`, `contact_person`, `phone`, `email`, `fax`, `bank_name`, `account_number`, `routing_number`, `address`, `description`, `category_id`, `order_method`, `restaurant_id`, `user_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'Josephine Hewitt', 'Eos accusantium a d', '+1 (231) 656-9683', 'gokujutoci@mailinator.com', '+1 (867) 883-3471', 'Oscar Boyd', '338', '100', 'Ad ea in est quas n', 'Possimus sed tempor', 2, '[\"Email\",\"Fax\"]', 3, '2', 'Deleted', '2020-08-19 11:02:06', '2020-08-19 11:03:47'),
(2, 'Madison Gutierrez', 'Ut qui vero maiores', '+1 (495) 263-9022', 'jugoce@mailinator.com', '+1 (178) 995-8407', 'Kai Davidson', '253', '519', 'Optio dolor non atq', 'Et labore aliquid te', 2, '[\"Email\"]', 3, '2', 'Live', '2020-08-19 11:03:52', '2020-08-19 11:03:52'),
(3, 'Amethyst Sherman', 'Accusamus vitae aute', '+1 (632) 958-9212', NULL, NULL, NULL, NULL, NULL, NULL, 'Accusamus sit et qui', NULL, NULL, 3, '2', 'Live', '2020-08-21 05:46:11', '2020-08-21 05:46:11'),
(4, 'Kathleen Ruiz', 'Voluptas cum reicien', '+1 (729) 876-1892', NULL, NULL, NULL, NULL, NULL, NULL, 'Eos dolores Nam qua', NULL, NULL, 3, '2', 'Live', '2020-08-21 05:47:52', '2020-08-21 05:47:52'),
(5, 'Alana Charles', 'Officiis ipsam sunt', '+1 (675) 537-4952', NULL, NULL, NULL, NULL, NULL, NULL, 'Ullam consectetur fu', NULL, NULL, 3, '2', 'Live', '2020-08-21 05:48:20', '2020-08-21 05:48:20'),
(6, 'Xantha Craft', 'Sit iure officia exp', '+1 (381) 717-5402', NULL, NULL, NULL, NULL, NULL, NULL, 'Quia molestiae est a', NULL, NULL, 3, '2', 'Live', '2020-08-21 05:52:17', '2020-08-21 05:52:17'),
(7, 'Callie Guerrero', 'Ut natus consectetur', '+1 (728) 847-7359', NULL, NULL, NULL, NULL, NULL, NULL, 'Pariatur Asperiores', NULL, NULL, 3, '2', 'Live', '2020-08-21 05:53:20', '2020-08-21 05:53:20'),
(8, 'Callie Guerrero', 'Ut natus consectetur', '+1 (728) 847-7359', NULL, NULL, NULL, NULL, NULL, NULL, 'Pariatur Asperiores', NULL, NULL, 3, '2', 'Live', '2020-08-21 05:53:21', '2020-08-21 05:53:21'),
(9, 'Talon Howell', 'Explicabo Soluta qu', '+1 (441) 566-8247', NULL, NULL, NULL, NULL, NULL, NULL, 'Maiores dolor simili', NULL, NULL, 3, '2', 'Live', '2020-08-21 05:53:50', '2020-08-21 05:53:50'),
(10, 'Orli Merrill', 'Optio commodi paria', '+1 (124) 842-4928', NULL, NULL, NULL, NULL, NULL, NULL, 'Natus nisi molestiae', NULL, NULL, 3, '2', 'Live', '2020-08-21 05:54:22', '2020-08-21 05:54:22'),
(11, 'Sopoline Walters', 'Incidunt hic delect', '+1 (767) 237-1739', NULL, NULL, NULL, NULL, NULL, NULL, 'Velit aliquip exerc', NULL, NULL, 3, '2', 'Live', '2020-08-21 05:54:52', '2020-08-21 05:54:52'),
(12, 'Halee Fox', 'Consectetur dolore o', '+1 (226) 227-1972', NULL, NULL, NULL, NULL, NULL, NULL, 'Non blanditiis asper', NULL, NULL, 3, '2', 'Live', '2020-08-21 05:56:01', '2020-08-21 05:56:01'),
(13, 'Minerva Schroeder', 'Enim sed praesentium', '+1 (546) 811-5915', NULL, NULL, NULL, NULL, NULL, NULL, 'Architecto esse ex d', NULL, NULL, 3, '2', 'Live', '2020-08-21 05:56:22', '2020-08-21 05:56:22'),
(14, 'Sylvia Jacobson', 'Eos et sed velit p', '+1 (155) 767-5659', NULL, NULL, NULL, NULL, NULL, NULL, 'Corporis officia vol', NULL, NULL, 3, '2', 'Live', '2020-08-21 06:02:05', '2020-08-21 06:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_restaurant_users`
--

CREATE TABLE `tbl_restaurant_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manager_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT 0,
  `email_verification_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Manager',
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_restaurant_users`
--

INSERT INTO `tbl_restaurant_users` (`id`, `manager_name`, `manager_phone`, `manager_email`, `password`, `email_verified_at`, `email_verified`, `email_verification_token`, `role`, `del_status`, `restaurant_id`, `created_at`, `updated_at`) VALUES
(1, 'Grace Gilliam', '+1 (962) 627-9779', 'qanejoqyv@mailinator.com', '$2y$10$uogZ/2ivC2Fn2EvDr.1dDevcngdq4tIiYlCLFfZWfR8nNri1Pr1n6', NULL, 0, 's10E8QZXebt2bsnTsPBErhEILI4Kcwm3', 'Manager', 'Live', 2, '2020-08-19 08:47:56', '2020-08-19 08:47:56'),
(2, 'Sydnee Larson', '+1 (141) 187-4196', 'nyzaw@mailinator.com', '$2y$10$TEAR75Qy73msQthdb0bkmuMwAJw3whjc/6fEbDTWWz7PqmjjdBTum', '2020-08-19 09:19:47', 1, 'CJE11byzfNwrTgXy4GkWo31q5UQaSclb', 'Manager', 'Live', 3, '2020-08-19 08:49:33', '2020-08-19 09:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_states`
--

CREATE TABLE `tbl_states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `del_status` enum('Live','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Live',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_states`
--

INSERT INTO `tbl_states` (`id`, `name`, `country`, `country_id`, `del_status`, `created_at`, `updated_at`) VALUES
(1, 'Nikunja', 'Bangladesh', 1, 'Live', '2020-08-19 08:46:46', '2020-08-19 08:46:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_super_admins`
--

CREATE TABLE `tbl_super_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_super_admins`
--

INSERT INTO `tbl_super_admins` (`id`, `user_name`, `email`, `phone_number`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@doorsoft.co', '01812391633', '$2y$10$/i25PhkNg/X4eUmVCmQPyOU1GrUoLQ9e5GjAYy6o9qi0/EclpTHoW', '2020-08-19 08:46:12', '2020-08-19 08:46:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_cities_country_id_foreign` (`country_id`),
  ADD KEY `tbl_cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cuisines`
--
ALTER TABLE `tbl_cuisines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_privacy_policies`
--
ALTER TABLE `tbl_privacy_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_restaurants`
--
ALTER TABLE `tbl_restaurants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_restaurants_restaurant_id_unique` (`restaurant_id`),
  ADD KEY `tbl_restaurants_country_id_foreign` (`country_id`),
  ADD KEY `tbl_restaurants_state_id_foreign` (`state_id`),
  ADD KEY `tbl_restaurants_city_id_foreign` (`city_id`);

--
-- Indexes for table `tbl_restaurant_customers`
--
ALTER TABLE `tbl_restaurant_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_restaurant_customers_city_id_foreign` (`city_id`),
  ADD KEY `tbl_restaurant_customers_state_id_foreign` (`state_id`),
  ADD KEY `tbl_restaurant_customers_country_id_foreign` (`country_id`),
  ADD KEY `tbl_restaurant_customers_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `tbl_restaurant_food_menus`
--
ALTER TABLE `tbl_restaurant_food_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `tbl_restaurant_food_menus_shift_id_foreign` (`shift_id`),
  ADD KEY `tbl_restaurant_food_menus_panel_id_foreign` (`panel_id`),
  ADD KEY `tbl_restaurant_food_menus_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `tbl_restaurant_food_menu_categories`
--
ALTER TABLE `tbl_restaurant_food_menu_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_restaurant_food_menu_categories_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `tbl_restaurant_food_menu_ingredients`
--
ALTER TABLE `tbl_restaurant_food_menu_ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ing_id` (`ing_id`),
  ADD KEY `food_menu_id` (`food_menu_id`);

--
-- Indexes for table `tbl_restaurant_food_menu_modifiers`
--
ALTER TABLE `tbl_restaurant_food_menu_modifiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_restaurant_food_menu_modifiers_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `tbl_restaurant_food_menu_modifier_ingredients`
--
ALTER TABLE `tbl_restaurant_food_menu_modifier_ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ig_id` (`ig_id`),
  ADD KEY `mod_id` (`mod_id`);

--
-- Indexes for table `tbl_restaurant_food_menu_shifts`
--
ALTER TABLE `tbl_restaurant_food_menu_shifts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_restaurant_food_menu_shifts_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `tbl_restaurant_ingredients`
--
ALTER TABLE `tbl_restaurant_ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_restaurant_ingredients_category_id_foreign` (`category_id`),
  ADD KEY `tbl_restaurant_ingredients_unit_id_foreign` (`unit_id`),
  ADD KEY `tbl_restaurant_ingredients_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `tbl_restaurant_ingredient_categories`
--
ALTER TABLE `tbl_restaurant_ingredient_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_restaurant_ingredient_categories_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `tbl_restaurant_ingredient_units`
--
ALTER TABLE `tbl_restaurant_ingredient_units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_restaurant_ingredient_units_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `tbl_restaurant_kitchen_panels`
--
ALTER TABLE `tbl_restaurant_kitchen_panels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_restaurant_kitchen_panels_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `tbl_restaurant_modifier_for_food_menus`
--
ALTER TABLE `tbl_restaurant_modifier_for_food_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mdf_id` (`mdf_id`),
  ADD KEY `fd_menu_id` (`fd_menu_id`);

--
-- Indexes for table `tbl_restaurant_purchases`
--
ALTER TABLE `tbl_restaurant_purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_restaurant_purchases_supplier_id_foreign` (`supplier_id`),
  ADD KEY `tbl_restaurant_purchases_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `tbl_restaurant_purchase_ingredients`
--
ALTER TABLE `tbl_restaurant_purchase_ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_restaurant_purchase_ingredients_ingredient_id_foreign` (`ingredient_id`),
  ADD KEY `tbl_restaurant_purchase_ingredients_purchase_id_foreign` (`purchase_id`);

--
-- Indexes for table `tbl_restaurant_settings_logos`
--
ALTER TABLE `tbl_restaurant_settings_logos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_restaurant_settings_logos_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `tbl_restaurant_settings_social_links`
--
ALTER TABLE `tbl_restaurant_settings_social_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_restaurant_settings_social_links_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `tbl_restaurant_settings_taxes`
--
ALTER TABLE `tbl_restaurant_settings_taxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_restaurant_settings_taxes_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `tbl_restaurant_settings_tax_fields`
--
ALTER TABLE `tbl_restaurant_settings_tax_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_restaurant_settings_tax_fields_tax_id_foreign` (`tax_id`);

--
-- Indexes for table `tbl_restaurant_suppliers`
--
ALTER TABLE `tbl_restaurant_suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_restaurant_suppliers_category_id_foreign` (`category_id`),
  ADD KEY `tbl_restaurant_suppliers_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `tbl_restaurant_users`
--
ALTER TABLE `tbl_restaurant_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_restaurant_users_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `tbl_states`
--
ALTER TABLE `tbl_states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_states_country_id_foreign` (`country_id`);

--
-- Indexes for table `tbl_super_admins`
--
ALTER TABLE `tbl_super_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_super_admins_user_name_unique` (`user_name`),
  ADD UNIQUE KEY `tbl_super_admins_email_unique` (`email`),
  ADD UNIQUE KEY `tbl_super_admins_phone_number_unique` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cuisines`
--
ALTER TABLE `tbl_cuisines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_privacy_policies`
--
ALTER TABLE `tbl_privacy_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_restaurants`
--
ALTER TABLE `tbl_restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_restaurant_customers`
--
ALTER TABLE `tbl_restaurant_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_restaurant_food_menus`
--
ALTER TABLE `tbl_restaurant_food_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_restaurant_food_menu_categories`
--
ALTER TABLE `tbl_restaurant_food_menu_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_restaurant_food_menu_ingredients`
--
ALTER TABLE `tbl_restaurant_food_menu_ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_restaurant_food_menu_modifiers`
--
ALTER TABLE `tbl_restaurant_food_menu_modifiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_restaurant_food_menu_modifier_ingredients`
--
ALTER TABLE `tbl_restaurant_food_menu_modifier_ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_restaurant_food_menu_shifts`
--
ALTER TABLE `tbl_restaurant_food_menu_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_restaurant_ingredients`
--
ALTER TABLE `tbl_restaurant_ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_restaurant_ingredient_categories`
--
ALTER TABLE `tbl_restaurant_ingredient_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_restaurant_ingredient_units`
--
ALTER TABLE `tbl_restaurant_ingredient_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_restaurant_kitchen_panels`
--
ALTER TABLE `tbl_restaurant_kitchen_panels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_restaurant_modifier_for_food_menus`
--
ALTER TABLE `tbl_restaurant_modifier_for_food_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_restaurant_purchases`
--
ALTER TABLE `tbl_restaurant_purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_restaurant_purchase_ingredients`
--
ALTER TABLE `tbl_restaurant_purchase_ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_restaurant_settings_logos`
--
ALTER TABLE `tbl_restaurant_settings_logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_restaurant_settings_social_links`
--
ALTER TABLE `tbl_restaurant_settings_social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_restaurant_settings_taxes`
--
ALTER TABLE `tbl_restaurant_settings_taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_restaurant_settings_tax_fields`
--
ALTER TABLE `tbl_restaurant_settings_tax_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_restaurant_suppliers`
--
ALTER TABLE `tbl_restaurant_suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_restaurant_users`
--
ALTER TABLE `tbl_restaurant_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_states`
--
ALTER TABLE `tbl_states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_super_admins`
--
ALTER TABLE `tbl_super_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  ADD CONSTRAINT `tbl_cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `tbl_countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `tbl_states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurants`
--
ALTER TABLE `tbl_restaurants`
  ADD CONSTRAINT `tbl_restaurants_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `tbl_cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_restaurants_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `tbl_countries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_restaurants_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `tbl_states` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tbl_restaurant_customers`
--
ALTER TABLE `tbl_restaurant_customers`
  ADD CONSTRAINT `tbl_restaurant_customers_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `tbl_cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_restaurant_customers_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `tbl_countries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_restaurant_customers_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_restaurant_customers_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `tbl_states` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tbl_restaurant_food_menus`
--
ALTER TABLE `tbl_restaurant_food_menus`
  ADD CONSTRAINT `cat_id` FOREIGN KEY (`cat_id`) REFERENCES `tbl_restaurant_ingredient_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_restaurant_food_menus_panel_id_foreign` FOREIGN KEY (`panel_id`) REFERENCES `tbl_restaurant_kitchen_panels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_restaurant_food_menus_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_restaurant_food_menus_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `tbl_restaurant_food_menu_shifts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_food_menu_categories`
--
ALTER TABLE `tbl_restaurant_food_menu_categories`
  ADD CONSTRAINT `tbl_restaurant_food_menu_categories_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_food_menu_ingredients`
--
ALTER TABLE `tbl_restaurant_food_menu_ingredients`
  ADD CONSTRAINT `food_menu_id` FOREIGN KEY (`food_menu_id`) REFERENCES `tbl_restaurant_food_menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ing_id` FOREIGN KEY (`ing_id`) REFERENCES `tbl_restaurant_ingredients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_food_menu_modifiers`
--
ALTER TABLE `tbl_restaurant_food_menu_modifiers`
  ADD CONSTRAINT `tbl_restaurant_food_menu_modifiers_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_food_menu_modifier_ingredients`
--
ALTER TABLE `tbl_restaurant_food_menu_modifier_ingredients`
  ADD CONSTRAINT `ig_id` FOREIGN KEY (`ig_id`) REFERENCES `tbl_restaurant_ingredients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mod_id` FOREIGN KEY (`mod_id`) REFERENCES `tbl_restaurant_food_menu_modifiers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_food_menu_shifts`
--
ALTER TABLE `tbl_restaurant_food_menu_shifts`
  ADD CONSTRAINT `tbl_restaurant_food_menu_shifts_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_ingredients`
--
ALTER TABLE `tbl_restaurant_ingredients`
  ADD CONSTRAINT `tbl_restaurant_ingredients_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `tbl_restaurant_ingredient_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_restaurant_ingredients_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_restaurant_ingredients_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `tbl_restaurant_ingredient_units` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tbl_restaurant_ingredient_categories`
--
ALTER TABLE `tbl_restaurant_ingredient_categories`
  ADD CONSTRAINT `tbl_restaurant_ingredient_categories_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_ingredient_units`
--
ALTER TABLE `tbl_restaurant_ingredient_units`
  ADD CONSTRAINT `tbl_restaurant_ingredient_units_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_kitchen_panels`
--
ALTER TABLE `tbl_restaurant_kitchen_panels`
  ADD CONSTRAINT `tbl_restaurant_kitchen_panels_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_modifier_for_food_menus`
--
ALTER TABLE `tbl_restaurant_modifier_for_food_menus`
  ADD CONSTRAINT `fd_menu_id` FOREIGN KEY (`fd_menu_id`) REFERENCES `tbl_restaurant_food_menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mdf_id` FOREIGN KEY (`mdf_id`) REFERENCES `tbl_restaurant_food_menu_modifiers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_purchases`
--
ALTER TABLE `tbl_restaurant_purchases`
  ADD CONSTRAINT `tbl_restaurant_purchases_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_restaurant_purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `tbl_restaurant_suppliers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tbl_restaurant_purchase_ingredients`
--
ALTER TABLE `tbl_restaurant_purchase_ingredients`
  ADD CONSTRAINT `tbl_restaurant_purchase_ingredients_ingredient_id_foreign` FOREIGN KEY (`ingredient_id`) REFERENCES `tbl_restaurant_ingredients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_restaurant_purchase_ingredients_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `tbl_restaurant_purchases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_settings_logos`
--
ALTER TABLE `tbl_restaurant_settings_logos`
  ADD CONSTRAINT `tbl_restaurant_settings_logos_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_settings_social_links`
--
ALTER TABLE `tbl_restaurant_settings_social_links`
  ADD CONSTRAINT `tbl_restaurant_settings_social_links_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_settings_taxes`
--
ALTER TABLE `tbl_restaurant_settings_taxes`
  ADD CONSTRAINT `tbl_restaurant_settings_taxes_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_settings_tax_fields`
--
ALTER TABLE `tbl_restaurant_settings_tax_fields`
  ADD CONSTRAINT `tbl_restaurant_settings_tax_fields_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `tbl_restaurant_settings_taxes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_suppliers`
--
ALTER TABLE `tbl_restaurant_suppliers`
  ADD CONSTRAINT `tbl_restaurant_suppliers_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `tbl_restaurant_ingredient_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_restaurant_suppliers_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_restaurant_users`
--
ALTER TABLE `tbl_restaurant_users`
  ADD CONSTRAINT `tbl_restaurant_users_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `tbl_restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_states`
--
ALTER TABLE `tbl_states`
  ADD CONSTRAINT `tbl_states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `tbl_countries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
