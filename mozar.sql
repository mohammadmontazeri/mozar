-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 01, 2019 at 03:13 PM
-- Server version: 5.7.26
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `alphashop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `is_parent` enum('0','1') COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent`, `is_parent`, `created_at`) VALUES
(1, 'دیجیتال', NULL, '0', 1566213308),
(2, 'خحخخ', NULL, '0', 1566213323);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text COLLATE utf8_persian_ci NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `is_parent` enum('0','1') COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `pro_id`, `user_id`, `body`, `parent`, `is_parent`, `status`, `created_at`) VALUES
(11, 5, 1, 'دیدکاهی داری بنویس ...1', NULL, '1', 1, 1567076787),
(12, 3, 1, 'دیدکاهی داری بنویس ...2', NULL, '0', 1, 1567076806),
(13, 3, 1, 'ndfgnd', NULL, '1', 1, 1567076914),
(14, 3, 1, 'دیدکاهی داری بنویس ...sfv', NULL, '0', 1, 1567076940),
(15, 3, 1, 'دیدکاهی داری بنویس ...sfberb', NULL, '0', 1, 1567076944),
(16, 3, 1, 'دیدکاهی داری بنویس ..sfbvefb', NULL, '0', 1, 1567076948),
(17, 3, 1, '                                wcffef                                ', 13, '0', 1, 1567080124),
(18, 5, 1, 'سلاااااااامممم', 11, '0', 1, 1567080756),
(19, 5, 1, 'دیدکاهی داری بنویس ...ljfnvjdnbj', NULL, '0', 1, 1567095914),
(20, 3, 5, 'gfddgfdgfdg', NULL, '1', 1, 1567333832),
(21, 3, 5, 'hjvhvjh', 20, '1', 1, 1567333861),
(22, 3, 1, 'mnjmbmbmb                                ', 21, '0', 1, 1567333886);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `number` int(11) NOT NULL DEFAULT '1',
  `basket` enum('0','1') COLLATE utf8_persian_ci DEFAULT '0',
  `status` enum('0','1') COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `pro_id`, `number`, `basket`, `status`, `created_at`) VALUES
(6, 1, 3, 1, '0', '1', 1567199422),
(7, 1, 4, 12, '0', '1', 1567199530),
(8, 4, 3, 1, '0', '1', 1567202928),
(9, 1, 6, 1, '1', '0', 1567202935),
(12, 1, 5, 18, '1', '0', 1567319124),
(13, 5, 3, 5, '0', '1', 1567333471),
(14, 5, 5, 1, '0', '0', 1567333480);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `authority` bigint(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(75) COLLATE utf8_persian_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `price`, `authority`, `user_id`, `order_id`, `created_at`) VALUES
(3, 452569, NULL, 1, '6-7-', 1567202897),
(4, 452425, NULL, 4, '8-', 1567202956),
(5, 2262125, NULL, 5, '13-', 1567333503);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `detail` text COLLATE utf8_persian_ci NOT NULL,
  `price` int(11) NOT NULL,
  `tags` varchar(250) COLLATE utf8_persian_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `viewed` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `image`, `cat_id`, `detail`, `price`, `tags`, `status`, `viewed`, `created_at`) VALUES
(1, 'sdvsdv', 'uploads/962_.JPG', 1, '<p>sadvsdfv</p>\r\n', 242, 'موبایل', '0', 5, 1566319815),
(3, 'آموزش ایجکس', 'uploads/242_.JPG', 1, '<p>به نام خدا&nbsp;</p>\r\n\r\n<p>امروز درباره <span style=\"color:#e74c3c\">آموزش ایجکس</span> با شما صحبت خواهم کرد&nbsp;</p>\r\n', 452425, 'nn-موبایل', '0', 8, 1566361954),
(4, 'wewewew', 'uploads/410_.JPG', 2, '<p>fvdsfvdfvbdf bcv dfbsdfgbsdfbsdbdb</p>\r\n', 12, 'موبایل-لپتاب', '0', 3, 1566384871),
(5, 'uyuyuyuy', 'uploads/168_.JPG', 1, '<p>asfdssigsyfgwhgfkfg</p>\r\n', 452425, 'لپتاب', '0', 5, 1566385167),
(6, 'dfdffdfdfdfd', 'uploads/166_.JPG', 1, '<p>advsfvsfvd</p>\r\n', 141, 'موبایل-لپتاب', '0', 2, 1566385813);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`) VALUES
(1, 'موبایل', 1587458257),
(4, 'لپ تاب', 1566316644),
(5, 'بازیها', 1566316655),
(6, 'لوازم اداری ', 1566371505);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `role` varchar(50) COLLATE utf8_persian_ci NOT NULL DEFAULT 'user',
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `role`, `created_at`) VALUES
(1, 'منتظری', 'montazeriput95@gmail.com', '70352f41061eda4ff3c322094af068ba70c3b38b', '1', 'admin', 1566212678),
(4, 'علی', 'a@a.com', 'fb96549631c835eb239cd614cc6b5cb7d295121a', '0', 'user', 1566848912),
(5, 'mmm', 'm@m.com', '7c222fb2927d828af22f592134e8932480637c0d', '0', 'user', 1567333448);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products` (`pro_id`) USING BTREE,
  ADD KEY `comments` (`parent`) USING BTREE,
  ADD KEY `users` (`user_id`) USING BTREE;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users` (`user_id`) USING BTREE,
  ADD KEY `products` (`pro_id`) USING BTREE;

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories` (`cat_id`) USING BTREE;

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`parent`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
