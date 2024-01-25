-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 06:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` bigint(20) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `name`, `email`, `number`, `landmark`, `city`, `address`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Jogendra Yadav', 'fireboyaj12@gmail.com', 8596356248, 'kalyanpur', 'Kanpur', 'Office', 1, '2024-01-19 03:21:56', '2024-01-19 03:21:56'),
(2, 'Shivangi Yadav', 'shivangiyadav839@gmail.com', 9784105028, 'Kutra', 'Farrukhabad', 'Home', 3, '2024-01-19 05:28:12', '2024-01-19 05:28:12'),
(5, 'Yashii Yadav', 'yashii12@gmail.com', 8596356248, 'Gunjan vihar colony', 'Farrukhabad', 'Home', 15, '2024-01-24 03:03:56', '2024-01-24 03:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `p_id` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `img`, `name`, `price`, `user_id`, `p_id`, `quantity`, `created_at`, `updated_at`) VALUES
(5, 'images\\Apple-iPhone-14.jpg', 'Apple iPhone 14', '57999', 13, 2, 1, '2024-01-19 05:59:33', '2024-01-19 05:59:33'),
(10, 'images\\moto-g62-5g-603x800-1654752527.webp', 'Motrola g62 5G', '15000', 3, 1, 1, '2024-01-23 23:46:21', '2024-01-23 23:46:21'),
(11, 'images\\tv.jpg', 'SAMSUNG (32 Inch)', '12990', 3, 5, 1, '2024-01-23 23:46:33', '2024-01-23 23:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jogendra Yadav', 'fireboyaj12@gmail.com', '$2y$10$XnJhVRKhukmp7vtCrN3Exeg4typ.aPRUqK.4giAndAAcofHA1TqP6', 'admin', 1, '2024-01-19 01:55:55', '2024-01-24 00:50:30'),
(3, 'Shivangi Yadav', 'shivangiyadav839@gmail.com', '$2y$10$jTAHFdJWbRDVs5F0d0H6S.9SvY9Icv6FLudOl9I9sJ1pDGVtQ75gO', 'customer', 1, '2024-01-19 05:27:03', '2024-01-24 00:50:44'),
(13, 'Siya Yadav', 'siya12@gmail.com', '$2y$10$tNrCepGWhv99jNgPJVNPJeTTBPJCrGkmaqBldIXD8/VAaeoWgMUaO', 'customer', 1, '2024-01-19 05:59:23', '2024-01-24 00:50:45'),
(15, 'Yashii Yadav', 'yashii12@gmail.com', '$2y$10$59P.VGFkOFPbI82.JluSVOEQo07oDSYau0Y9BheJOVhJwIbSFfPJ2', 'customer', 1, '2024-01-23 00:57:15', '2024-01-24 00:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `img`, `created_at`, `updated_at`) VALUES
(1, 'HP Pavilion', 'images\\Hp2.jpg', '2024-01-19 03:40:09', '2024-01-19 03:40:09'),
(2, 'HP Pavilion', 'images\\Hp1.jfif', '2024-01-19 03:40:09', '2024-01-19 03:40:09'),
(3, 'ASUS Vivobook Go 15', 'images\\Asus 1.jpg', '2024-01-19 03:43:53', '2024-01-19 03:43:53'),
(4, 'Mi 5A 80 cm (32 inch)', 'images\\mi.jfif', '2024-01-19 03:49:50', '2024-01-19 03:49:50'),
(5, 'realme Pad Mini', 'images\\tab1.jfif', '2024-01-19 04:06:44', '2024-01-19 04:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_12_20_063849_customer', 1),
(5, '2023_12_20_084931_product', 1),
(6, '2023_12_28_051811_create_payments_table', 2),
(7, '2023_12_28_094420_address', 3),
(8, '2024_01_05_071028_wishlist', 3),
(9, '2024_01_19_070658_images', 3),
(10, '2024_01_19_071418_cart', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `r_payment_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `price` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `landmark` varchar(225) NOT NULL,
  `city` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `r_payment_id`, `product_id`, `user_id`, `amount`, `price`, `quantity`, `landmark`, `city`, `created_at`, `updated_at`) VALUES
(1, 'pay_NQPacxjFmyAKAa', '1', '1', '15000', 15000, 1, 'kalyanpur', 'Kanpur', '2024-01-19 03:22:40', '2024-01-19 03:22:40'),
(2, 'pay_NQRjkWgeWJwDTp', '2', '3', '57999', 57999, 1, 'Kutra', 'Farrukhabad', '2024-01-19 05:28:40', '2024-01-19 05:28:40'),
(3, 'pay_NS3kzMQHO5mMpG', '5', '1', '25980', 12990, 2, 'kalyanpur', 'Kanpur', '2024-01-23 07:19:09', '2024-01-23 07:19:09'),
(4, 'pay_NSKUyhkJfRJ5Fj', '7', '20', '197', 197, 1, 'Kakadev', 'Kanpur', '2024-01-23 23:41:54', '2024-01-23 23:41:54'),
(5, 'pay_NSKmCx1T2PxgmQ', '1', '21', '30000', 30000, 2, 'Kutra', 'Kanpur Nagar', '2024-01-23 23:58:12', '2024-01-23 23:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category`, `brand`, `price`, `description`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Motrola g62 5G', 'Mobile', 'Motrola', '15000', '1 YearManufacturer Warranty\r\n\r\n4 GB RAM | 16 GB ROM | Expandable Upto 256 GB\r\n5.5 inch Full HD Display\r\n13MP Rear Camera | 10MP Front Camera\r\n5300 mAh Battery\r\nSnap dragon 7870 Octa Core 1.6GHz Processor', 'images\\moto-g62-5g-603x800-1654752527.webp', '2024-01-19 02:06:03', '2024-01-19 04:17:45'),
(2, 'Apple iPhone 14', 'Mobile', 'Apple', '57999', '128 GB ROM\r\n15.49 cm (6.1 inch) Super Retina XDR Display\r\n12MP + 12MP | 12MP Front Camera\r\nA15 Bionic Chip, 6 Core Processor Processor', 'images\\Apple-iPhone-14.jpg', '2024-01-19 03:27:29', '2024-01-19 06:28:42'),
(3, 'HP Pavilion', 'Laptop', 'HP', '54999', 'Stylish & Portable Thin and Light Laptop\r\n14 inch Full HD, IPS, micro-edge, Antiglare, Low Blue Light, Brightness: 400 nits, 157 ppi, Color Gamut: 100%sRGB\r\nFinger Print Sensor for Faster System Access\r\nLight Laptop without Optical Disk Drive', 'images\\HP.jpg', '2024-01-19 03:40:09', '2024-01-19 03:40:09'),
(4, 'ASUS Vivobook Go 15', 'Laptop', 'ASUS', '19999', 'Stylish & Portable Thin and Light Laptop\r\n15.6 Inch Full HD, 16:9 aspect ratio, LED Backlit, 60Hz refresh rate, 200nits, 45% NTSC color gamut, Anti-glare display\r\nFinger Print Sensor for Faster System Access\r\nLight Laptop without Optical Disk Drive', 'images\\Asus.jpg', '2024-01-19 03:43:53', '2024-01-19 03:43:53'),
(5, 'SAMSUNG (32 Inch)', 'Television & Audio', 'Samsung', '12990', 'Supported Apps: Netflix|Prime Video|Disney+Hotstar|Youtube\r\nOperating System: Tizen\r\nResolution: HD Ready 1366 x 768 Pixels\r\nSound Output: 20 W\r\nRefresh Rate: 50 Hz', 'images\\tv.jpg', '2024-01-19 03:46:39', '2024-01-23 01:26:51'),
(6, 'Mi 5A (32 inch)', 'Television & Audio', 'Mi', '14990', 'Supported Apps: Netflix|Prime Video|Apple TV|Disney+Hotstar|Youtube\r\nOperating System: Android (Google Assistant & Chromecast in-built)\r\nResolution: HD Ready 1366 x 768 Pixels\r\nSound Output: 24 W\r\nRefresh Rate: 60 Hz', 'images\\mi1.jpg', '2024-01-19 03:49:50', '2024-01-23 01:27:05'),
(7, 'Winkel Back Cover', 'Case & Cover', 'Winkel', '197', 'Sales Package\r\n1 Back Case\r\nModel Number\r\nTPU_OnePlus_Nord_Ce3Lite_5G_BK\r\nDesigned For\r\nOnePlus Nord CE 3 Lite 5G\r\nBrand Color\r\nMatte Black\r\nNet Quantity\r\n1\r\nProduct Details\r\nPack of\r\n1', 'images\\cover.jfif', '2024-01-19 03:52:53', '2024-01-23 01:27:27'),
(8, 'Vaku Back Cover', 'Case & Cover', 'Apple', '1499', 'Suitable For: Mobile\r\nMaterial: Thermoplastic Polyurethane\r\nTheme: No Theme\r\nType: Back Cover', 'images\\cover1.jfif', '2024-01-19 03:55:08', '2024-01-23 01:27:55'),
(11, 'realme Pad Mini', 'Tablet', 'Realme', '14999', '6 GB RAM | 128 GB ROM | Expandable Upto 1 TB\r\n22.1 cm (8.7 inch) HD Display\r\n8 MP Primary Camera | 5 MP Front\r\nAndroid 11 | Battery: 6400 mAh Lithium Ion\r\nIdeal Usage: Entertainment, For Kids, Reading and Browsing\r\nVoice Call (Dual Sim, GSM|WCDMA|LTE FDD|TD-LTE)\r\nProcessor: ARM A75, Unisoc T616', 'images\\images.jfif', '2024-01-19 04:13:51', '2024-01-19 04:13:51'),
(12, 'Xiaomi Pad', 'Tablet', 'Xiaomi', '25999', '8 GB RAM | 256 GB ROM\r\n27.94 cm (11.0 inch) Display\r\n13 MP Primary Camera | 8 MP Front\r\nAndroid 13 | Battery: 8840 mAh\r\nIdeal Usage: Entertainment, High Processing Tasks\r\nProcessor: Qualcomm Snapdragon 870', 'images\\tab1.jfif', '2024-01-19 04:15:02', '2024-01-19 04:15:02'),
(13, 'USB C Adapter', 'Computer Accessories', 'Bestor', '149', 'BESTOR 4 PORT USB-C HUB Dual play mirror modes boost your efficiency 2 times. This USB extension hub supports single and dual HDMI displays up to 8340*2160.No driver or software is required, and the extra 4 USB ports can be used quickly. You can always connect to your computer and other devices to avoid frequent use of the Type-C interface that comes with your computer. The top charging port gives you easy access for fast, temporary connections of USB sticks, media readers, small accessories such as USB lights and fans and more. Connect a modem, USB printer, scanner and HD to a convenient USB hub. The 4-port hub supports cascading installation with other USB 3.1 hubs, multiple USB 3.1 device ports - a scalable solution for connecting multiple USB devices.', 'images\\usb.jfif', '2024-01-19 04:17:00', '2024-01-23 01:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `p_id`, `p_name`, `user_id`, `img`, `price`, `created_at`, `updated_at`) VALUES
(6, '3', 'HP Pavilion', '3', 'images\\HP.jpg', '54999', '2024-01-23 23:47:00', '2024-01-23 23:47:00'),
(7, '2', 'Apple iPhone 14', '3', 'images\\Apple-iPhone-14.jpg', '57999', '2024-01-24 01:20:34', '2024-01-24 01:20:34'),
(8, '6', 'Mi 5A (32 inch)', '3', 'images\\mi1.jpg', '14990', '2024-01-24 03:05:05', '2024-01-24 03:05:05'),
(9, '1', 'Motrola g62 5G', '23', 'images\\moto-g62-5g-603x800-1654752527.webp', '15000', '2024-01-24 05:09:41', '2024-01-24 05:09:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
