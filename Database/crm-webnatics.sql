-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2017 at 10:26 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm-webnatics`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `act_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `activity_type` enum('Call','Email','Meeting') COLLATE utf8mb4_unicode_ci NOT NULL,
  `outcomes` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_person` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `act_id`, `customer_id`, `date`, `activity_type`, `outcomes`, `sales_person`, `created_at`, `updated_at`) VALUES
(1, 'ActID1', 'CID1', '2017-04-16', 'Call', 'Success', 'Mike', '2017-04-16 18:30:00', '2017-04-16 18:30:00'),
(2, 'ActID2', 'CID4', '2017-04-15', 'Meeting', 'Fail', 'Marry', '2017-04-16 14:03:59', '2017-04-18 14:50:33'),
(3, 'ActID3', 'CID2', '2017-04-16', 'Call', 'Success', 'Marry', '2017-04-16 14:04:19', '2017-04-16 14:04:19'),
(4, 'ActID4', 'CID3', '2017-04-14', 'Meeting', 'Pending', 'Nisha', '2017-04-16 14:04:51', '2017-04-16 14:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `cont_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `cont_id`, `customer_id`, `name`, `email`, `contact_no`, `created_at`, `updated_at`) VALUES
(1, 'ContID1', 'CID1', 'Lara', 'lara@email.com', '2345678900', '2017-04-16 18:30:00', '2017-04-18 14:36:40'),
(2, 'ContID2', 'CID4', 'Jane', 'jane@TCP.com', '1234567890', '2017-04-16 14:01:21', '2017-04-18 14:36:56'),
(3, 'ContID3', 'CID2', 'Rebecca', 'bec@gmail.com', '9897876765', '2017-04-16 14:02:30', '2017-04-16 14:02:30'),
(4, 'ContID4', 'CID3', 'Yari', 'yari@yahoo.com', '9896756455', '2017-04-16 14:03:07', '2017-04-16 14:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prov` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brn` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_id`, `company_name`, `address`, `city`, `prov`, `zip`, `country`, `brn`, `website`, `created_at`, `updated_at`) VALUES
(1, 'CID1', 'Testing Company', 'testing address', 'testing city', 'testing prov', '123456', 'testing country', '12345678', 'www.testing.com', '2017-04-16 18:30:00', '2017-04-18 01:12:47'),
(2, 'CID2', 'second testing comp. pvt ltd', 'sec street', 'sec city', 'sec prov', '098765', 'sri lanka', '90897863', 'www.sec-test-company.com', '2017-04-16 13:59:52', '2017-04-16 13:59:52'),
(3, 'CID3', 'Third new Company', 'thr street', 'thr city', 'thr prv', '4565322', 'Signapoor', '456908io', 'www.ThirdComp.com', '2017-04-16 14:00:45', '2017-04-16 14:00:45'),
(4, 'CID4', 'Fourth Testing', 'fr street', 'FrCity', 'FPV', '90989', 'FPCountry', '123456ed', 'www.fourthtesting.com', '2017-04-18 02:15:11', '2017-04-18 02:15:11');

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
(10, '2017_04_12_175114_create_cusotmer', 1),
(11, '2017_04_12_175552_create_contact', 1),
(12, '2017_04_12_180501_create_activity', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
