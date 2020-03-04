-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2018 at 04:08 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `blog_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `blog_name`, `short_description`, `long_description`, `blog_image`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ড. কামালের আয়–ব্যয়ের হিসাব খতিয়ে দেখছে এনবিআর', 'গণফোরামের সভাপতি ও জাতীয় ঐক্যফ্রন্টের শীর্ষ নেতা ড. কামাল হোসেনের আয়-ব্যয়ের হিসাব খতিয়ে দেখছে জাতীয় রাজস্ব বোর্ড (এনবিআর)। দুর্নীতি দমন কমিশনের চিঠির পরিপ্রেক্ষিতে এ উদ্যোগ নিয়েছে এনবিআর। জাতীয় ভ্যাট দিবস উপলক্ষে আয়োজিত এক সংবাদ সম্মেলনে এনবিআরের চেয়ারম্যান মোশাররফ হোসেন ভূঁইয়া এ কথা জানান।', '<p><img alt=\"ড. কামাল হোসেন। ফাইল ছবি\" src=\"https://paloimages.prothom-alo.com/contents/cache/images/640x358x1/uploads/media/2018/04/20/a3981e7af6a61a1cb7f6c98ab861c0e0-5ada059e4da29.jpg\" />ড. কামাল হোসেন। ফাইল ছবিগণফোরামের সভাপতি ও জাতীয় ঐক্যফ্রন্টের শীর্ষ নেতা ড. কামাল হোসেনের আয়-ব্যয়ের হিসাব খতিয়ে দেখছে জাতীয় রাজস্ব বোর্ড (এনবিআর)। দুর্নীতি দমন কমিশনের চিঠির পরিপ্রেক্ষিতে এ উদ্যোগ নিয়েছে এনবিআর। জাতীয় ভ্যাট দিবস উপলক্ষে আয়োজিত এক সংবাদ সম্মেলনে এনবিআরের চেয়ারম্যান মোশাররফ হোসেন ভূঁইয়া এ কথা জানান।</p>\r\n\r\n<p>এক সাংবাদিকের প্রশ্ন ছিল ড. কামাল হোসেন নিয়ম মেনে কর দিচ্ছেন কি না? এ-সংক্রান্ত দুদকের চিঠির পরিপ্রেক্ষিতে কী ব্যবস্থা নেওয়া হয়েছে। জবাবে মোশাররফ হোসেন ভূঁইয়া বলেন, &lsquo;এনবিআর কাজ করছে। সময় লাগবে। ব্যাংক হিসাবের খবর নিতে হবে। খড়্গহস্ত হলে অনেকেই ভাববেন বিরোধী দলের হয়ে ইলেকশন করছেন এ জন্য তড়িঘড়ি হচ্ছে। পরিস্থিতি যাতে ওই লাইনে না যায়।&rsquo;<br />\r\n<br />\r\nতবে কি তাঁকে ছাড় দেওয়া হচ্ছে? এমন প্রশ্নের জবাবে এনবিআর চেয়ারম্যান বলেন, &lsquo;তাঁকে ছাড় দিচ্ছি না।&rsquo;</p>', './blog-images/4.jpg', 1, '2018-12-09 07:46:26', '2018-12-09 07:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Education', 'dqwdwd', 1, '2018-12-09 07:45:51', '2018-12-09 07:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `visitor_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `visitor_id`, `blog_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'test comment', '2018-12-09 08:52:00', '2018-12-09 08:52:00'),
(2, 2, 1, 'This is another comment', '2018-12-09 08:54:00', '2018-12-09 08:54:00'),
(3, 2, 1, 'This is annother comment', '2018-12-09 08:54:52', '2018-12-09 08:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_04_124011_create_blogs_table', 1),
(4, '2018_12_09_133135_create_comments_table', 1),
(5, '2018_12_09_133748_create_visitors_table', 1),
(6, '2018_12_09_134418_create_categories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Al Amin Hossain Khan', 'admin@gmail.com', NULL, '$2y$10$S9JkRxK6CIBQGElmthspy..vpymHMuSuwKusxbfClckqM5KYj8BGW', NULL, '2018-12-09 07:45:39', '2018-12-09 07:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `first_name`, `last_name`, `email_address`, `password`, `address`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 'Rohim', 'Khan', 'rohim@gmail.com', '$2y$10$aGh4VowR1ZF6XyAmspAHV.yWPKrQkA4qqdEL5Vg7N0w2EKjkH2XEK', 'Dhaka', '12312312', '2018-12-09 07:52:47', '2018-12-09 07:52:47'),
(2, 'Sojib', 'Khan', 'khan@gmail.com', '$2y$10$qqG8lmdWc0yr5wO4DE/.yuCfOyHnXnmSrUgo63QH4omvkRE0RtKPq', 'Dhaka', '01715123456', '2018-12-09 07:53:30', '2018-12-09 07:53:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
