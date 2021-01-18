-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2021 at 06:31 PM
-- Server version: 5.7.32-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fastofresh`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) NOT NULL DEFAULT '0',
  `short_descrip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `short_descrip`, `description`, `image`, `status`, `meta`, `created_at`, `updated_at`) VALUES
(1, 'Chicken', 0, '<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'chicken.jpg', 'active', 'Chicken', '2021-01-17 23:29:53', '2021-01-18 00:10:56'),
(2, 'Mutton', 0, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'mutton (1).jpg', 'active', 'Mutton', '2021-01-17 23:45:16', '2021-01-18 00:11:53'),
(3, 'fish', 0, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'fish.jpg', 'active', 'fish', '2021-01-18 00:14:00', '2021-01-18 00:14:00'),
(4, 'Cold Cuts', 0, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'coldcut.jpg', 'active', 'Cold Cuts', '2021-01-18 00:17:17', '2021-01-18 00:17:17'),
(5, 'Momos', 0, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'momo.jpg', 'active', 'Momos', '2021-01-18 00:20:36', '2021-01-18 00:20:36');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_min` int(11) NOT NULL,
  `cart_max` int(11) NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `date_expire` date NOT NULL,
  `coupon_type` enum('percent','value') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `description`, `cart_min`, `cart_max`, `coupon_value`, `date_expire`, `coupon_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'perc10', 'description', 0, 0, 10, '2021-01-15', 'percent', 'active', '2021-01-15 06:20:29', '2021-01-15 06:20:29'),
(2, 'sum10', 'description', 0, 0, 10, '2021-01-15', 'value', 'active', '2021-01-15 06:20:29', '2021-01-15 06:20:29');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `userid`, `location`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"addressline1\":\"78964545546\",\"landmark\":\"54\",\"city\":\"45\",\"postalcode\":\"454\",\"mobile\":\"54\"}', '2021-01-14 19:59:33', '2021-01-14 19:59:33'),
(2, 1, '{\"addressline1\":\"asd\",\"landmark\":\"asd\",\"city\":\"asd\",\"postalcode\":\"asd\",\"mobile\":\"asd\"}', '2021-01-18 00:45:30', '2021-01-18 00:45:30');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_06_075335_categories', 1),
(5, '2021_01_06_083008_products', 1),
(6, '2021_01_06_090829_coupon', 1),
(7, '2021_01_07_070845_product_attr', 1),
(8, '2021_01_11_050204_location', 1),
(9, '2021_01_13_053725_orders', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderamount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transactionid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_cart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderdetail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','processing','delivered') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderamount`, `transactionid`, `order_cart`, `orderdetail`, `userid`, `status`, `created_at`, `updated_at`) VALUES
(1, '598', '7', '{\"1\":{\"name\":\"Chicken Curry Cut (Small Pcs)\",\"quantity\":2,\"price\":299,\"photo\":\"https:\\/\\/d2407na1z3fc0t.cloudfront.net\\/prodDev\\/pr_5785b9065d7e1\\/3\\/prod_image\\/1584770439.6565--2020-03-2111:30:39--738?format=webp\"}}', '{\"locationadd\":\"add\",\"loc\":\"{\\\"addressline1\\\":\\\"78964545546\\\",\\\"landmark\\\":\\\"54\\\",\\\"city\\\":\\\"45\\\",\\\"postalcode\\\":\\\"454\\\",\\\"mobile\\\":\\\"54\\\"}\",\"method\":\"online\"}', '1', 'pending', '2021-01-14 20:03:29', '2021-01-14 20:03:29'),
(2, '1052', '9', '{\"2\":{\"name\":\"Chicken Curry Cut - With Skin\",\"quantity\":\"3\",\"price\":151,\"photo\":\"Chicken Curry Cut - Without Skin-min.JPG\"},\"16\":{\"name\":\"Lamb Mince (Keema)\",\"quantity\":\"1\",\"price\":599,\"photo\":\"mutton-keema-recipe-500x500.jpg\"}}', '{\"locationadd\":\"add\",\"loc\":\"{\\\"addressline1\\\":\\\"asd\\\",\\\"landmark\\\":\\\"asd\\\",\\\"city\\\":\\\"asd\\\",\\\"postalcode\\\":\\\"asd\\\",\\\"mobile\\\":\\\"asd\\\"}\",\"method\":\"online\",\"slottime\":\"7:30 PM To 10:00 PM\"}', '1', 'pending', '2021-01-18 01:00:15', '2021-01-18 01:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `short_descrip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_price` bigint(20) NOT NULL,
  `b_price` bigint(20) NOT NULL,
  `information` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `parent_id`, `short_descrip`, `description`, `image`, `s_price`, `b_price`, `information`, `status`, `meta`, `created_at`, `updated_at`) VALUES
(1, 'Chicken Whole - With Skin', 1, '<p><strong>Server 7-8</strong></p>\r\n\r\n<p><strong>1000 to 1200 gms</strong></p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Chicken Whole - With Skin-min.JPG', 279, 349, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'active', 'Chicken', '2021-01-18 01:05:44', '2021-01-18 07:16:14'),
(2, 'Chicken Curry Cut - With Skin', 1, '<p><strong>Serves 3-4</strong></p>\r\n\r\n<p><strong>500 gms</strong></p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Chicken Curry Cut - With Skin-min.JPG', 151, 189, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'active', 'Chicken', '2021-01-18 01:54:17', '2021-01-18 07:18:09'),
(3, 'Chicken Curry Cut - Without Skin', 1, '<p><strong>Serves 3-4&nbsp;</strong></p>\r\n\r\n<p><strong>500 gms</strong></p>', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Chicken Curry Cut - Without Skin-min.JPG', 159, 199, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'active', 'Chicken', '2021-01-18 01:56:57', '2021-01-18 07:21:41'),
(4, 'Premium Chicken Curry Cut (Small Pcs) - Without Skin', 1, '<p><strong>Server 3-4</strong></p>\r\n\r\n<p><strong>500 gms</strong></p>', '<p><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">An ideal blend of bone-in and boneless pieces incorporates breast quarter, a leg and a wing without the tip. This premium chicken curry cuts have a one-of-a-kind flavour and surface. These substantial and delicious bits of solid chickens directly from the ranch (no terrible stuff) are high in nourishments. These are the best bits of chicken for a finger licking curry and would be ideal for any sauce-based dishes.</span></span></span></p>', 'Premium Chicken Curry Cut (Small Pcs) - Without Skin-min.JPG', 167, 209, '<p>An ideal blend of bone-in and boneless pieces incorporates breast quarter, a leg and a wing without the tip. This premium chicken curry cuts have a one-of-a-kind flavour and surface. These substantial and delicious bits of solid chickens directly from the ranch (no terrible stuff) are high in nourishments. These are the best bits of chicken for a finger licking curry and would be ideal for any sauce-based dishes.</p>', 'active', 'Chicken', '2021-01-18 02:21:50', '2021-01-18 07:23:44'),
(5, 'Chicken Wings - Without Skin', 1, '<p>Serves 3-4&nbsp;</p>\r\n\r\n<p>500 Gms</p>', '<p>Chicken wings are very simple to cook, brimming with protein, and generous nourishment food for gatherings and weeknight suppers. Attempt them heated, fried, smoked, grilled or made into soup. Regardless of how you eat chicken wings, they&rsquo;re an adaptable, scrumptious meal worth eating. It has a pleasant crunch to it. What&rsquo;s more, obviously it is worth your while to tear apart with your teeth.</p>', 'Chicken Wings - Without Skin-min.JPG', 199, 249, '<p>Chicken wings are very simple to cook, brimming with protein, and generous nourishment food for gatherings and weeknight suppers. Attempt them heated, fried, smoked, grilled or made into soup. Regardless of how you eat chicken wings, they&rsquo;re an adaptable, scrumptious meal worth eating. It has a pleasant crunch to it. What&rsquo;s more, obviously it is worth your while to tear apart with your teeth.</p>', 'active', 'Chicken', '2021-01-18 02:25:21', '2021-01-18 02:25:21'),
(6, 'Premuim Chicken Drumstick', 1, '<p><strong>Serve 3-4</strong></p>\r\n\r\n<p><strong>500 gms</strong></p>', '<p><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">This dark and fragile meat with bone from the lower leg of the chicken which is rick in iron, zinc and all the basic supplements can satisfy your hankering and even leaves you to need for more. Chicken legs can be set up in various manners &ndash; poached, barbecued, sauteed, roasted, pan-fried or even baked &ndash; and cook wonderfully with milk. These skinless pieces give less calories with divine flavour and mouth-watering deliciousness</span></span></span></p>', 'Premuim Chicken Drumstick-min.JPG', 191, 239, '<p><span style=\"font-size:15px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">This dark and fragile meat with bone from the lower leg of the chicken which is rick in iron, zinc and all the basic supplements can satisfy your hankering and even leaves you to need for more. Chicken legs can be set up in various manners &ndash; poached, barbecued, sauteed, roasted, pan-fried or even baked &ndash; and cook wonderfully with milk. These skinless pieces give less calories with divine flavour and mouth-watering deliciousness</span></span></span></p>', 'active', 'Chicken', '2021-01-18 02:33:30', '2021-01-18 07:26:01'),
(7, 'Premium Chicken Whole Leg with Thigh', 1, '<p><strong>Serves 3-4</strong></p>\r\n\r\n<p><strong>500 gms</strong></p>', '<p>This bit of chicken comprises of chicken thigh and drumstick. It is dark meat which is wealthy in sustenance, flavour and surface. It is bone-in and skinless. This is ideal piece for your supper. It very well oven-baked, barbecued, roasted. It is adaptable, delicious, meaty and moist. Furthermore, not to fail to remember numerous chicken darlings think of it as the most delightful piece of the bird. So, to finish your dinner this is the thing you can generally go for.</p>', 'Premium Chicken Whole Leg with Thigh-min.JPG', 191, 239, '<p>This bit of chicken comprises of chicken thigh and drumstick. It is dark meat which is wealthy in sustenance, flavour and surface. It is bone-in and skinless. This is ideal piece for your supper. It very well oven-baked, barbecued, roasted. It is adaptable, delicious, meaty and moist. Furthermore, not to fail to remember numerous chicken darlings think of it as the most delightful piece of the bird. So, to finish your dinner this is the thing you can generally go for.</p>', 'active', 'Chicken', '2021-01-18 02:43:18', '2021-01-18 07:27:31'),
(8, 'Chicken Breast Boneless', 1, '<p><strong>Serves 3-4&nbsp;</strong></p>\r\n\r\n<p><strong>500 gms</strong></p>', '<p>We&rsquo;re talking juicy, tender, flavourful, perfect chicken breasts that you will love. Chicken breast must be the most flexible meat comes from the breast bone of the winged bird. It is a white meat with almost no fat and it is the ideal sliced to cut up in stir-fries, marinate and grill, pan-fry or stove cook, loaded up with your filling. It has a flexible surface and one of the meatier cuts of the chicken.</p>', 'Chicken Breast Boneless-min.JPG', 199, 249, '<p>We&rsquo;re talking juicy, tender, flavourful, perfect chicken breasts that you will love. Chicken breast must be the most flexible meat comes from the breast bone of the winged bird. It is a white meat with almost no fat and it is the ideal sliced to cut up in stir-fries, marinate and grill, pan-fry or stove cook, loaded up with your filling. It has a flexible surface and one of the meatier cuts of the chicken.</p>', 'active', 'Chicken', '2021-01-18 03:54:41', '2021-01-18 03:54:41'),
(9, 'Chicken Breast Boneless (Chilly Cut / Cubes)', 1, '<p><strong>Serves 3-4</strong></p>\r\n\r\n<p><strong>500 gms</strong></p>', '<p>The chicken cubes are delicate, boneless, completely cut in little pieces so you can take a chomp without any problem. Remembering your wellbeing these pieces are acquired from the healthy chicken&rsquo;s breast portion and plentiful in nutrients, minerals, vitamin and protein. These delectable and delicate chicken pieces are ideal first off or snacks. You can go for chicken salad, popcorn or chunk to appreciate with your friends and family.</p>', 'Chicken Breast Boneless-min (1).JPG', 215, 269, '<p>The chicken cubes are delicate, boneless, completely cut in little pieces so you can take a chomp without any problem. Remembering your wellbeing these pieces are acquired from the healthy chicken&rsquo;s breast portion and plentiful in nutrients, minerals, vitamin and protein. These delectable and delicate chicken pieces are ideal first off or snacks. You can go for chicken salad, popcorn or chunk to appreciate with your friends and family.</p>', 'active', 'Chicken', '2021-01-18 03:58:47', '2021-01-18 03:58:47'),
(10, 'Premium Chicken Thigh Boneless', 1, '<p>Serves 3-4</p>\r\n\r\n<p>500 gms</p>\r\n\r\n<p>&nbsp;</p>', '<p>These Chicken thighs are boneless and skinless cut from the upper leg, over the knee. Since dark meat contains more ligaments, chicken thighs are an extreme cut, they become delicate and juicy when cooked appropriately. They likewise gloat more flavour. In addition, they are rich wellspring of protein and minerals. Boneless chicken thighs are additionally phenomenal for barbecuing and take well to marinades, frying, pan-frying, and roasting.</p>', 'Premium Chicken Thigh Boneless-min.JPG', 231, 289, '<p>These Chicken thighs are boneless and skinless cut from the upper leg, over the knee. Since dark meat contains more ligaments, chicken thighs are an extreme cut, they become delicate and juicy when cooked appropriately. They likewise gloat more flavour. In addition, they are rich wellspring of protein and minerals. Boneless chicken thighs are additionally phenomenal for barbecuing and take well to marinades, frying, pan-frying, and roasting.</p>', 'active', 'Chicken', '2021-01-18 04:06:01', '2021-01-18 04:06:01'),
(11, 'Chicken Mince (Keema)', 1, '<p><strong>Serves 3-4</strong></p>\r\n\r\n<p><strong>500 gms</strong></p>', '<p>Chicken mince is perhaps the most flexible proteins accessible. From spicy Asian dishes to Spanish-roused empanadas you can utilize chicken mince any evening of the week. This delicious meat is acceptable low-fat decision and can fill your heart with joy. You can likewise make burgers, meatballs, keema and a lot more thing which can fulfil your hankering.</p>', 'Chicken Mince (Keema)-min.JPG', 199, 249, '<p>Chicken mince is perhaps the most flexible proteins accessible. From spicy Asian dishes to Spanish-roused empanadas you can utilize chicken mince any evening of the week. This delicious meat is acceptable low-fat decision and can fill your heart with joy. You can likewise make burgers, meatballs, keema and a lot more thing which can fulfil your hankering.</p>', 'active', 'Chicken', '2021-01-18 04:08:32', '2021-01-18 04:08:32'),
(12, 'Chicken Thigh (Kalmi Kabab)', 1, '<p><strong>serve 3-4</strong></p>\r\n\r\n<p><strong>500 gms</strong></p>', '<p>These bone-in, skinless pieces are more delightful, heavenly and succulent. They are dark meat; chicken thighs concoct moist and delicate. It is rich wellspring of protein and minerals. Chicken thighs are eaten as a component of innumerable cooking styles the world over. Chicken thigh is an ideal and most ideal decision for all the meat sweethearts.</p>', 'Chicken Thigh (Kalmi Kabab)-min.JPG', 215, 269, '<p>These bone-in, skinless pieces are more delightful, heavenly and succulent. They are dark meat; chicken thighs concoct moist and delicate. It is rich wellspring of protein and minerals. Chicken thighs are eaten as a component of innumerable cooking styles the world over. Chicken thigh is an ideal and most ideal decision for all the meat sweethearts.</p>', 'active', 'Chicken', '2021-01-18 04:11:52', '2021-01-18 04:11:52'),
(13, 'Chicken Soup Bone', 1, '<p>Serve 3-4</p>\r\n\r\n<p>500 Gms</p>', '<p>These chicken soup bones are cleaned and prepared for your admission. The soup bones contain solid and valuable supplements. These are low in fat, improve bone and joint wellbeing. You can generally add additional species and distinctive thing to chicken soup that remains to be worked out the flavour. It is wealthy in protein and causes you to feel fuller. You can utilize it for tasty soups or broths and make yourself to feel good.</p>', 'Chicken Soup Bone-min.JPG', 159, 199, '<p>These chicken soup bones are cleaned and prepared for your admission. The soup bones contain solid and valuable supplements. These are low in fat, improve bone and joint wellbeing. You can generally add additional species and distinctive thing to chicken soup that remains to be worked out the flavour. It is wealthy in protein and causes you to feel fuller. You can utilize it for tasty soups or broths and make yourself to feel good.</p>', 'active', 'Chicken', '2021-01-18 04:14:18', '2021-01-18 04:14:18'),
(14, 'Chicken Lollypop', 1, '<p>Serve 3-4</p>\r\n\r\n<p>500 gm&nbsp;</p>', '<p>The chicken Lollipop is everything which any meat darling can actually request. This scrumptious and delicious hors d&rsquo;oeuvre is served in most caf&eacute; in India. Meat is cut free from the bone end and pushed down. Presented with hot Szechuan sauce this lollipop offers divine and delicate meat in each and every chomp.</p>', 'Chicken Lollypop-min.JPG', 207, 259, '<p>The chicken Lollipop is everything which any meat darling can actually request. This scrumptious and delicious hors d&rsquo;oeuvre is served in most caf&eacute; in India. Meat is cut free from the bone end and pushed down. Presented with hot Szechuan sauce this lollipop offers divine and delicate meat in each and every chomp.</p>', 'active', 'Chicken', '2021-01-18 04:17:35', '2021-01-18 04:17:35'),
(15, 'Premium Tender Spring Chicken Curry Cut - Whole Bird', 1, '<p><strong>Serve 3-4</strong></p>\r\n\r\n<p><strong>800 to 900 gms</strong></p>', '<p>Blend of bone-in and boneless, altogether cleaned and offered cut from the entire bird. Enjoy the<br />\r\ntenderest chicken, we bring you whole bird cut into thick pieces including drumsticks, breast<br />\r\nquarters, thigh quarters, backbone and wings. These tender pieces are so succulent and plentiful in<br />\r\nprotein, nutrients and minerals. These pieces are ideal for biryani or chicken curry.</p>', 'Premium Tender Spring Chicken Curry Cut - Whole Bird-min.JPG', 239, 299, '<p>Blend of bone-in and boneless, altogether cleaned and offered cut from the entire bird. Enjoy the<br />\r\ntenderest chicken, we bring you whole bird cut into thick pieces including drumsticks, breast<br />\r\nquarters, thigh quarters, backbone and wings. These tender pieces are so succulent and plentiful in<br />\r\nprotein, nutrients and minerals. These pieces are ideal for biryani or chicken curry.</p>', 'active', 'Chicken', '2021-01-18 04:21:13', '2021-01-17 19:30:06'),
(16, 'Lamb Mince (Keema)', 2, '<p>Serves 3-4&nbsp;</p>\r\n\r\n<p>500 gms</p>', '<p>Lamb mince is gentler with extraordinary surface and wealthy as far as flavour. Lamb meat got from the most advantageous hind legs gives you protein, minerals and a great deal measure of nutrition. One of the upsides of lamb mince is its flexibility, and there are a few different ways to cook lamb mince, including heating, barbecuing, and broiling. Additionally, prevalently referred to in our way of life as keema, this meat is low in fat and sound for your body.</p>', 'mutton-keema-recipe-500x500.jpg', 599, 749, '<p>Lamb mince is gentler with extraordinary surface and wealthy as far as flavour. Lamb meat got from the most advantageous hind legs gives you protein, minerals and a great deal measure of nutrition. One of the upsides of lamb mince is its flexibility, and there are a few different ways to cook lamb mince, including heating, barbecuing, and broiling. Additionally, prevalently referred to in our way of life as keema, this meat is low in fat and sound for your body.</p>', 'active', 'Mutton', '2021-01-18 04:25:07', '2021-01-18 04:25:07'),
(17, 'Goat Mince (Keema)', 2, '<p>Serve 3-4</p>\r\n\r\n<p>500 gms</p>', '<p>Gotten from the absolute best boneless goat meat, this meat is minced consummately to remember negligible biting effort. This meat is a lot of lower in fat when contrasted with others and extremely high in protein, giving you a low in fat delectable dish. Otherwise called keema, goat mince has a solid flavour. Ideal for Masala keema or keema curry, this meat is all you need for your meal.</p>', 'Goat Mince (Keema)-min (1).JPG', 599, 749, '<p>Gotten from the absolute best boneless goat meat, this meat is minced consummately to remember negligible biting effort. This meat is a lot of lower in fat when contrasted with others and extremely high in protein, giving you a low in fat delectable dish. Otherwise called keema, goat mince has a solid flavour. Ideal for Masala keema or keema curry, this meat is all you need for your meal.</p>', 'active', 'Mutton', '2021-01-18 04:29:13', '2021-01-18 04:29:13'),
(18, 'Lamb Curry Cut - Premium', 2, '<p>Serves 3-4&nbsp;</p>\r\n\r\n<p>500 gms</p>', '<p>Lamb curry cut is delicate, lean lamb meat cut from the leg, shoulder and the ribs. Slice into pieces and prepared to cook into luscious curries. This velvet finished, scrumptious and juicy lamb is loaded with protein, minerals and nutrients. This blend of bone-in and boneless have a solid and particular flavour. Ideal for lamb curry, lamb josh, lamb stew, our lamb curry cuts will take you on flavourful experience.</p>', 'Lamb Curry Cut - Premium-min (1).JPG', 519, 649, '<p>Lamb curry cut is delicate, lean lamb meat cut from the leg, shoulder and the ribs. Slice into pieces and prepared to cook into luscious curries. This velvet finished, scrumptious and juicy lamb is loaded with protein, minerals and nutrients. This blend of bone-in and boneless have a solid and particular flavour. Ideal for lamb curry, lamb josh, lamb stew, our lamb curry cuts will take you on flavourful experience.</p>', 'active', 'Mutton', '2021-01-18 04:33:35', '2021-01-18 04:33:35'),
(19, 'Lamb Curry Cut (Shoulder)', 2, '<p>Serve 3-4</p>\r\n\r\n<p>500 gm&nbsp;</p>', '<p>Bone-in lamb shoulder curry cut is the delicate meat divide. Bones give additional flavour and goodness to lamb curry. Uniformly cut lamb shoulder is additionally an exceptional wellspring of numerous nutrients and minerals, including iron, zinc, and vitamin B12. Along these lines, lamb meat may advance muscle development, upkeep, and execution just as phenomenal and rich taste.</p>', 'xxxxxxxxxxxxxx.jpg', 559, 699, '<p>Bone-in lamb shoulder curry cut is the delicate meat divide. Bones give additional flavour and goodness to lamb curry. Uniformly cut lamb shoulder is additionally an exceptional wellspring of numerous nutrients and minerals, including iron, zinc, and vitamin B12. Along these lines, lamb meat may advance muscle development, upkeep, and execution just as phenomenal and rich taste.</p>', 'active', 'Mutton', '2021-01-18 04:37:17', '2021-01-18 04:37:17'),
(20, 'Special Lamb Biryani Cut (Leg / Raan)', 2, '<p>Serve 3-4&nbsp;</p>\r\n\r\n<p>500 gms</p>', '<p>Each Indian dining experience&rsquo;s highlight requires nothing not as much as this lamb biryani cut. Moist enormous bone-in and boneless pieces of meat from the leg of lamb have solid fragrant flavour. Otherwise called Raan, these lamb pieces is wealthy in supplements to keep you solid. It adds extravagance to a heavenly lamb biryani. At the point when cooked, it transforms into delicate and succulent adding lavishness to your supper.</p>', 'pppppppppppppp.jpg', 519, 649, '<p>Each Indian dining experience&rsquo;s highlight requires nothing not as much as this lamb biryani cut. Moist enormous bone-in and boneless pieces of meat from the leg of lamb have solid fragrant flavour. Otherwise called Raan, these lamb pieces is wealthy in supplements to keep you solid. It adds extravagance to a heavenly lamb biryani. At the point when cooked, it transforms into delicate and succulent adding lavishness to your supper.</p>', 'active', 'Mutton', '2021-01-18 04:40:52', '2021-01-18 04:40:52'),
(21, 'Goat Curry Cut (Shoulder / Gol Boti & Nali)', 2, '<p><strong>Serves 3-4</strong></p>\r\n\r\n<p><strong>500 gm</strong></p>', '<p><strong>Gol Boti is the unique cut in Mutton. Source from shoulder this cut give you the best insight of Kabab. Devouring Gol Boti gives different medical advantages and furthermore improves nerve capacities. They are additionally utilized for treating Vitamin B12 related iron deficiency. You can plan Mutton boti curry, Mutton boti masala, Mutton boti poriyal, which gives an enticing taste.</strong></p>', 'Goat Curry Cut - Premium-min.JPG', 519, 649, '<p>Gol Boti is the unique cut in Mutton. Source from shoulder this cut give you the best insight of Kabab. Devouring Gol Boti gives different medical advantages and furthermore improves nerve capacities. They are additionally utilized for treating Vitamin B12 related iron deficiency. You can plan Mutton boti curry, Mutton boti masala, Mutton boti poriyal, which gives an enticing taste.</p>', 'active', 'Mutton', '2021-01-18 04:43:42', '2021-01-18 04:43:42'),
(22, 'Special Goat Biryani Cut (Leg / Raan)', 2, '<p>Serve 3-4&nbsp;</p>\r\n\r\n<p>500 gms</p>', '<p>These bone-in and boneless goat biryani meat are slashed in pieces sufficiently little to be placed into utilisation directly. Nonetheless, a strength of bone-in pieces guarantees flavours infuse into biryani for rich and credible taste. Remembering quality, meat is acquired from sound and ranch raised goats. The meat is plentiful in iron, proteins and nutrients. You can utilize these for planning stews and obviously for those lip-smacking biryanis.</p>', 'bbbbbbbbbbbbb.jpg', 519, 649, '<p>These bone-in and boneless goat biryani meat are slashed in pieces sufficiently little to be placed into utilisation directly. Nonetheless, a strength of bone-in pieces guarantees flavours infuse into biryani for rich and credible taste. Remembering quality, meat is acquired from sound and ranch raised goats. The meat is plentiful in iron, proteins and nutrients. You can utilize these for planning stews and obviously for those lip-smacking biryanis.</p>', 'active', 'Mutton', '2021-01-18 04:46:37', '2021-01-18 04:46:37'),
(23, 'Goat Boneless', 2, '<p>Serves 3-4&nbsp;<br />\r\n500 gms</p>', '<p>All things considered, sooner or later we as a whole love meat without the problem of the bones! These boneless pieces are cut from solid and homestead raised goats. Simple cubed delights that ideal any dish you put them into. These pieces are plentiful in nutrients, minerals and supplements. The meat is soggy, caramel red in shading and cold to contact. You can cook it in low warmth for dampness, succulent and delicacy.</p>', 'Goat Boneless-min (1).JPG', 639, 799, '<p>All things considered, sooner or later we as a whole love meat without the problem of the bones! These boneless pieces are cut from solid and homestead raised goats. Simple cubed delights that ideal any dish you put them into. These pieces are plentiful in nutrients, minerals and supplements. The meat is soggy, caramel red in shading and cold to contact. You can cook it in low warmth for dampness, succulent and delicacy.</p>', 'active', 'Mutton', '2021-01-18 04:51:34', '2021-01-18 04:51:34'),
(24, 'Lamb Boneless', 2, '<p>Serves 3-4</p>\r\n\r\n<p>500 gms</p>', '<p>The boneless medium-sized lamb meat is new, delicate and succulent. Acquired from sound, grass-took care of raised lamb, this is plentiful in protein, nutrients, iron, zinc and minerals. Likewise, it helps in forestall iron deficiency. These pieces have a solid flavour and damp in surface. Lamb is generally eaten medium rare or you can use it in curry. They are adequately delicate to be delighted in altogether by all meat darlings.</p>', 'Lamb Boneless-min.JPG', 799, 639, '<p>The boneless medium-sized lamb meat is new, delicate and succulent. Acquired from sound, grass-took care of raised lamb, this is plentiful in protein, nutrients, iron, zinc and minerals. Likewise, it helps in forestall iron deficiency. These pieces have a solid flavour and damp in surface. Lamb is generally eaten medium rare or you can use it in curry. They are adequately delicate to be delighted in altogether by all meat darlings.</p>', 'active', 'Mutton', '2021-01-18 04:53:50', '2021-01-18 04:53:50'),
(25, 'Goat Curry Cut - Premium', 2, '<p>Serves 3-4&nbsp;</p>\r\n\r\n<p>500 gms</p>', '<p>You simply get the best meats from our homestead brought and solid goat up in these curry cuts! Your adaptable ally for regular meaty arrangements, our excellent goat curry cut has a remarkably particularly rich flavour. These rich wellspring of nourishment, minerals and nutrients meat pieces are bone-in and boneless cuts from the neck, shoulders, leg, flank and ribs offer a special taste to govern your dishes.</p>', 'Goat Curry Cut - Premium-min (1).JPG', 559, 699, '<p>You simply get the best meats from our homestead brought and solid goat up in these curry cuts! Your adaptable ally for regular meaty arrangements, our excellent goat curry cut has a remarkably particularly rich flavour. These rich wellspring of nourishment, minerals and nutrients meat pieces are bone-in and boneless cuts from the neck, shoulders, leg, flank and ribs offer a special taste to govern your dishes.</p>', 'active', 'Mutton', '2021-01-18 05:00:22', '2021-01-18 05:00:22'),
(26, 'Goat Curry Cut (Shoulder)', 2, '<p>Serves 3-4</p>\r\n\r\n<p>500 gm</p>', '<p>Perhaps the most pursued cuts of goat meat taken from the shoulder, Goat Shoulder Cut offers bone-in, boneless and delicate bone pieces that turn delicious and delicate upon moderate cooking. These slices are the ideal decision to make a flavourful curry. This meat is plentiful in vitamin B, minerals and protein. The shoulder being the most worked part of goat, an eruption of flavour with each chomp is ensured.</p>', 'Goat Curry Cut - Premium-min (2).JPG', 519, 649, '<p>Perhaps the most pursued cuts of goat meat taken from the shoulder, Goat Shoulder Cut offers bone-in, boneless and delicate bone pieces that turn delicious and delicate upon moderate cooking. These slices are the ideal decision to make a flavourful curry. This meat is plentiful in vitamin B, minerals and protein. The shoulder being the most worked part of goat, an eruption of flavour with each chomp is ensured.</p>', 'active', 'Mutton', '2021-01-18 05:03:00', '2021-01-18 05:03:00'),
(27, 'Goat Ribs & Chops', 2, '<p><strong>Serves 3-4</strong></p>\r\n\r\n<p><strong>500 gm</strong></p>', '<p><strong>These pieces are predominantly cut from upper focus part of the body. It likewise incorporates midsections, shoulders and ribs. Tasty and substantial, blend of consistently cut bits of goat, these ribs and chops are fit to be prepared rapidly for a supper or can be barbecued on the grill. These are plentiful in protein and minerals; it very well may be the brilliant decision for your supper and to fulfil your yearning.</strong></p>', 'lllllllllll.jpg', 559, 699, '<p><strong>These pieces are predominantly cut from upper focus part of the body. It likewise incorporates midsections, shoulders and ribs. Tasty and substantial, blend of consistently cut bits of goat, these ribs and chops are fit to be prepared rapidly for a supper or can be barbecued on the grill. These are plentiful in protein and minerals; it very well may be the brilliant decision for your supper and to fulfil your yearning.</strong></p>', 'active', 'Mutton', '2021-01-18 05:06:18', '2021-01-18 05:18:14'),
(28, 'Special Goat Biryani Cut (Shoulder)', 2, '<p>Serves 3-4</p>', '<p>Cut from the shoulder of solid and ranch raised goat, this blend of bone-in and boneless meat is wealthy in flavour and takes you on the rollercoaster of sublime taste. These pieces are low in fat when contrasted with other goat meat cuts, likewise they are plentiful in protein and minerals. The sinewy surface of goat meat joins the kinds of flavours that go into your biryani.</p>', 'lllllllllllllll.jpg', 559, 699, '<p>Cut from the shoulder of solid and ranch raised goat, this blend of bone-in and boneless meat is wealthy in flavour and takes you on the rollercoaster of sublime taste. These pieces are low in fat when contrasted with other goat meat cuts, likewise they are plentiful in protein and minerals. The sinewy surface of goat meat joins the kinds of flavours that go into your biryani.</p>', 'active', 'Mutton', '2021-01-18 05:24:31', '2021-01-18 05:24:31'),
(29, 'Goat Premium Nahari Cut', 2, '<p>Serves 3-4</p>\r\n\r\n<p>500 gm&nbsp;</p>', '<p>Gotten from the solid and farm raised goat, the Nahari cut incorporates marrow containing shanks and bonier knuckles. It tends to be cooked for long time in soggy warmth. It is plentiful in Vitamin B12, Niacin, zinc and minerals. You can add cloves, dry ginger, cardamom to make it more delectable. This dish will be the feature of the dining experience as a result of its customary foundation.</p>', 'Goat Premium Nahari Cut-min.JPG', 559, 699, '<p>Gotten from the solid and farm raised goat, the Nahari cut incorporates marrow containing shanks and bonier knuckles. It tends to be cooked for long time in soggy warmth. It is plentiful in Vitamin B12, Niacin, zinc and minerals. You can add cloves, dry ginger, cardamom to make it more delectable. This dish will be the feature of the dining experience as a result of its customary foundation.</p>', 'active', 'Mutton', '2021-01-18 05:27:05', '2021-01-18 05:27:05'),
(30, 'Lamb Ribs & Chops', 2, '<p>Serves 3-4</p>\r\n\r\n<p>500 gms</p>', '<p>Lamb ribs are cut from racks of lamb while lamb chops are cuts from the midsection. They are amazingly flavourful and delicate in surface. They are an inconceivable wellspring of protein, iron, zinc and minerals. Nonetheless, they are wealthy in fat when contrasted with other sheep meat. It tends to be cooked, typically over a barbecue or a grill.</p>', 'Lamb Ribs & Chops-min.JPG', 599, 749, '<p>Lamb ribs are cut from racks of lamb while lamb chops are cuts from the midsection. They are amazingly flavourful and delicate in surface. They are an inconceivable wellspring of protein, iron, zinc and minerals. Nonetheless, they are wealthy in fat when contrasted with other sheep meat. It tends to be cooked, typically over a barbecue or a grill.</p>', 'active', 'Mutton', '2021-01-18 06:07:53', '2021-01-18 06:07:53'),
(31, 'Mutton Soup Bones', 2, '<p>Serves 3-4</p>\r\n\r\n<p>500 gm</p>', '<p>These are gotten from the shoulders, ribs and legs to keep you tempted with mutton indulgences. Ideal for rich and nutritious soup and broth when cooked for broadened periods. Taste and minerals from the bones add dietary benefit and glorious taste to it. High on taste and nutrients, you can take your affection for red meat to an unheard-of level with these larger than usual lumps of the goat.</p>', 'Mutton Soup Bones-min.JPG', 319, 399, '<p>These are gotten from the shoulders, ribs and legs to keep you tempted with mutton indulgences. Ideal for rich and nutritious soup and broth when cooked for broadened periods. Taste and minerals from the bones add dietary benefit and glorious taste to it. High on taste and nutrients, you can take your affection for red meat to an unheard-of level with these larger than usual lumps of the goat.</p>', 'active', 'Mutton', '2021-01-18 06:10:49', '2021-01-18 06:10:49'),
(32, 'Mutton Kidney', 2, '<p>Serves 3-4&nbsp;</p>\r\n\r\n<p>500 gm</p>', '<p>Remembering your wellbeing, we offer lamb kidney which are completely cleaned, anti-toxin and pesticides free. Succulent and delightful kidney are delicate and fragile. It has a particular solid flavour. They are especially plentiful in B-nutrients, for example, nutrient B12 and folate. They are additionally plentiful in minerals, iron, magnesium, selenium and zinc, and significant fat-dissolvable nutrients like nutrients A, D, E and K. It very well may be barbecued or saut&eacute;ed to suit your taste.</p>', 'Mutton Kidney-min.JPG', 199, 249, '<p>Remembering your wellbeing, we offer lamb kidney which are completely cleaned, anti-toxin and pesticides free. Succulent and delightful kidney are delicate and fragile. It has a particular solid flavour. They are especially plentiful in B-nutrients, for example, nutrient B12 and folate. They are additionally plentiful in minerals, iron, magnesium, selenium and zinc, and significant fat-dissolvable nutrients like nutrients A, D, E and K. It very well may be barbecued or saut&eacute;ed to suit your taste.</p>', 'active', 'Mutton', '2021-01-18 06:12:46', '2021-01-18 06:12:46'),
(33, 'Mutton Liver Chunks', 2, '<p>Serves 3-4&nbsp;</p>\r\n\r\n<p>500 gm&nbsp;</p>', '<p>Lamb liver is perhaps the most healthfully thick nourishments on earth. It contains critical measures of folate, iron, nutrient B, nutrient A, and copper. These liver pieces are cleaned and ligament free. Otherwise called kaleji, and this can be fried, boiled, heated or cooked into different exquisite dishes like mutton liver masala.</p>', 'Mutton Liver Chunks-min.JPG', 199, 249, '<p>Lamb liver is perhaps the most healthfully thick nourishments on earth. It contains critical measures of folate, iron, nutrient B, nutrient A, and copper. These liver pieces are cleaned and ligament free. Otherwise called kaleji, and this can be fried, boiled, heated or cooked into different exquisite dishes like mutton liver masala.</p>', 'active', 'Mutton', '2021-01-18 06:15:29', '2021-01-18 06:15:29'),
(34, 'Chicken Franfurter', 4, '<p>Serves 3-4</p>\r\n\r\n<p>250 gm&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<p>They are solid, nourishing and whenever snacks. Barbecue, cook or saut&eacute; until the outside is brilliant earthy coloured and serve, as you like. Offered ready to cook, these frankfurters are the ideal harmony between immovability outwardly and delicate surface within.</p>', 'Chicken Franfurter-min.JPG', 279, 349, '<p>They are solid, nourishing and whenever snacks. Barbecue, cook or saut&eacute; until the outside is brilliant earthy coloured and serve, as you like. Offered ready to cook, these frankfurters are the ideal harmony between immovability outwardly and delicate surface within.</p>', 'active', 'Cold Cuts', '2021-01-18 06:18:31', '2021-01-18 06:26:37'),
(35, 'Chicken Salami - Plain', 4, '<p>Serves 3-4</p>\r\n\r\n<p>250 gm&nbsp;</p>', '<p>Chicken salami plain is produced using the mildest, juiciest meat. It is an incredible and unpretentious approach to fulfil your food hankering. Filling and truly delectable simultaneously. It very well may be relished cool, flame broiled or you can eat it any approach to appreciate the delightfulness this salami offers.</p>', 'Chicken Salami - Plain-min.JPG', 279, 349, '<p>Chicken salami plain is produced using the mildest, juiciest meat. It is an incredible and unpretentious approach to fulfil your food hankering. Filling and truly delectable simultaneously. It very well may be relished cool, flame broiled or you can eat it any approach to appreciate the delightfulness this salami offers.</p>', 'active', 'Cold Cuts', '2021-01-18 06:20:57', '2021-01-18 06:25:34'),
(36, 'Chicken Salami - Spicy', 4, '<p>Serves 3-4&nbsp;</p>\r\n\r\n<p>250 gm</p>', '<p><span style=\"font-size:14px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">chicken salami made with extraordinary flavours and premium ingredients gives you ideal mix of flavours. They have low fat substance and are acceptable wellspring of protein and minerals. You can include it in your pizza, sandwich, plate of mixed greens or burger. Simple to cook this is outstanding amongst other alternative in the event that you are needing for some best chicken bites.</span></span></span></p>', 'Chicken Salami - Spicy-min.JPG', 279, 349, '<p><span style=\"font-size:14px\"><span style=\"color:black\"><span style=\"font-family:Calibri,sans-serif\">chicken salami made with extraordinary flavours and premium ingredients gives you ideal mix of flavours. They have low fat substance and are acceptable wellspring of protein and minerals. You can include it in your pizza, sandwich, plate of mixed greens or burger. Simple to cook this is outstanding amongst other alternative in the event that you are needing for some best chicken bites.</span></span></span></p>', 'active', 'Cold Cuts', '2021-01-18 06:23:01', '2021-01-18 06:23:01'),
(37, 'Chicken Ham - Plain', 4, '<p>Serves 3-4&nbsp;</p>\r\n\r\n<p>250 gm&nbsp;</p>', '<p>Chicken Ham Cold Cut are tasty and all you require for your morning meal or supper. They are for all intents and purposes an all-rounder, however goes best heaped on a move, bun, croissant, biscuit or cut bread. Flame broil or toast, prepare into plates of mixed greens, sprinkle over a soup, layer in sandwiches.</p>', 'Chicken Ham - Plain-min.JPG', 279, 349, '<p>Chicken Ham Cold Cut are tasty and all you require for your morning meal or supper. They are for all intents and purposes an all-rounder, however goes best heaped on a move, bun, croissant, biscuit or cut bread. Flame broil or toast, prepare into plates of mixed greens, sprinkle over a soup, layer in sandwiches.<span style=\"display:none\">&nbsp;</span></p>', 'active', 'Cold Cuts', '2021-01-18 06:24:42', '2021-01-18 06:24:42'),
(38, 'Veg Momos', 5, '<p>Serves 2&nbsp;</p>\r\n\r\n<p>300 gm&nbsp;</p>', '<p>Begin your journey with our yummy street style momos<br />\r\npacked with a juicy vegetable stuffing. Psst! The recipe is<br />\r\na secret from Bhutan.</p>', 'Veg Momos-min.jpg', 120, 120, '<p>Begin your journey with our yummy street style momos<br />\r\npacked with a juicy vegetable stuffing. Psst! The recipe is<br />\r\na secret from Bhutan.</p>', 'active', 'Momos', '2021-01-18 06:30:18', '2021-01-18 06:30:18'),
(39, 'Paneer Momos', 5, '<p>Serves 2&nbsp;</p>\r\n\r\n<p>300 gm&nbsp;</p>', '<p>Now for India&rsquo;s very own variant for cheese &ndash; our proud<br />\r\nmelt-inyour-mouth paneer momos! One not to miss out.</p>', 'Paneer Momos-min.jpg', 140, 140, '<p>Now for India&rsquo;s very own variant for cheese &ndash; our proud<br />\r\nmelt-inyour-mouth paneer momos! One not to miss out.</p>', 'active', 'Momos', '2021-01-18 06:34:52', '2021-01-18 06:34:52'),
(40, 'Chicken Momos', 5, '<p>Serves 2</p>\r\n\r\n<p>300 gm&nbsp;</p>', '<p>Here comes the reigning king of momos. Juicy, succulent,<br />\r\nthis palette defining recipe is just the beginning of a<br />\r\nfoodie&rsquo;s journey.</p>', 'Chicken Momos-min.jpg', 140, 140, '<p>Here comes the reigning king of momos. Juicy, succulent,<br />\r\nthis palette defining recipe is just the beginning of a<br />\r\nfoodie&rsquo;s journey.</p>', 'active', 'Momos', '2021-01-18 06:47:35', '2021-01-18 06:47:35'),
(41, 'Mutton Momos', 5, '<p>Serves 2</p>\r\n\r\n<p>300 gm&nbsp;</p>', '<p>If you&rsquo;re a lover of tender mutton cooked to perfection and<br />\r\nstuffed in a momo skin, look no further than this, it&rsquo;s a<br />\r\nwinner.</p>', 'Mutton Momos-min.jpg', 200, 200, '<p>If you&rsquo;re a lover of tender mutton cooked to perfection and<br />\r\nstuffed in a momo skin, look no further than this, it&rsquo;s a<br />\r\nwinner.</p>', 'active', 'Momos', '2021-01-18 06:49:53', '2021-01-18 06:49:53'),
(42, 'Corn & Cheese Momos', 5, '<p>Serves 2&nbsp;</p>\r\n\r\n<p>300 gm&nbsp;</p>', '<p>Fresh golden corn meets molten cheese to create a<br />\r\ngastronomical event for you to remember for a while.</p>', 'Corn & Cheese Momos-min.jpg', 140, 140, '<p>Fresh golden corn meets molten cheese to create a<br />\r\ngastronomical event for you to remember for a while.</p>', 'active', 'Momos', '2021-01-18 06:51:19', '2021-01-18 06:51:19'),
(43, 'Paneer Chilly Cheese Momos', 5, '<p>Serves 2&nbsp;</p>\r\n\r\n<p>300 gm&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<p>Now that sounds like a whole lot of flavours waiting to<br />\r\nburst out of their refined flour skin. Fear not, they are<br />\r\nexactly so and leave you craving for more!</p>', 'Paneer Chilli Cheese Momos-min (1).jpg', 160, 160, '<p>Now that sounds like a whole lot of flavours waiting to<br />\r\nburst out of their refined flour skin. Fear not, they are<br />\r\nexactly so and leave you craving for more!</p>', 'active', 'Momos', '2021-01-18 07:03:16', '2021-01-18 07:03:16'),
(44, 'Chilli Chicken Momos', 5, '<p>Server 2&nbsp;</p>\r\n\r\n<p>300 gm&nbsp;</p>', '<p>Now this variant, has the potential to become a regular<br />\r\nstaple for you on days when you&rsquo;re craving Chinese. Yes<br />\r\nthey&rsquo;re that good!</p>', 'Chilli Chicken Momos-min.jpg', 150, 150, '<p>Now this variant, has the potential to become a regular<br />\r\nstaple for you on days when you&rsquo;re craving Chinese. Yes<br />\r\nthey&rsquo;re that good!</p>', 'active', 'Momos', '2021-01-18 07:08:53', '2021-01-18 07:08:53'),
(45, 'Prawn Momos', 5, '<p>Serves 2</p>\r\n\r\n<p>300 gm&nbsp;</p>', '<p>Now what is that? An experimental entrant, a clear<br />\r\nfavourite with seafood lovers &amp; an emerging star on our<br />\r\nmenu!</p>', 'Prawn Momos-min.jpg', 200, 200, '<p>Now what is that? An experimental entrant, a clear<br />\r\nfavourite with seafood lovers &amp; an emerging star on our<br />\r\nmenu!</p>', 'active', 'Momos', '2021-01-18 07:13:07', '2021-01-18 07:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `product_attr`
--

CREATE TABLE `product_attr` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_price` bigint(20) NOT NULL,
  `b_price` bigint(20) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci,
  `mobile` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `type` enum('user','admin') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `provider_id`, `avatar`, `mobile`, `email_verified_at`, `type`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kumar Abhishek', 'kabhishek18@gmail.com', NULL, '', '', NULL, 'user', 'active', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, '2021-01-15 05:44:16', '2021-01-15 05:44:16'),
(2, 'Kumar Abhishek', 'admin@gmail.com', NULL, '', '', NULL, 'admin', 'active', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, '2021-01-15 05:44:16', '2021-01-15 05:44:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attr`
--
ALTER TABLE `product_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `product_attr`
--
ALTER TABLE `product_attr`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
