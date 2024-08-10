-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 10, 2024 lúc 02:14 PM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duanmau`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `order_id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `total` decimal(30,0) NOT NULL,
  `status` varchar(50) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `full_name`, `email`, `phone`, `address`, `order_id`, `product_name`, `size`, `total`, `status`, `user_id`) VALUES
(79, 'Nguyễn Thanh Vũ', 'v.untpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 206, 'Pháp Home (2024 - 2025) (x1)', NULL, 226000, '3', 8),
(80, 'Nguyễn Thanh Vũ', 'v.untpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 208, 'Anh Home (2024 - 2025) (x1)', NULL, 130000, '3', 8),
(81, 'Nguyễn Thanh Vũ', 'v.untpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 210, 'BĐN Home (2024 - 2025) (x1)', NULL, 306000, '3', 8),
(82, 'Nguyễn Thanh Vũ', 'v.untpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 212, 'Pháp Home (2024 - 2025) (x1)', NULL, 186000, '3', 8),
(83, 'Nguyễn Thanh Vũ', 'v.untpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 214, 'BĐN Home (2024 - 2025) (x1)', 'XL', 346000, '3', 8),
(84, 'Nguyễn Thanh Vũ', 'v.untpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 216, 'Anh Home (2024 - 2025) (x1), Đức Home (2024 - 2025) (x1)', 'XXL, XL', 387000, '3', 8),
(85, 'Nguyễn Thanh Vũ', 'v.untpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 218, 'Pháp Home (2024 - 2025)', 'M', 226000, '3', 8),
(86, 'Nguyễn Thanh Vũ', 'v.untpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 220, 'Đức Home (2024 - 2025) (x1)', 'XL', 207000, '3', 8),
(88, 'Nguyễn Thanh Vũ', 'v.untpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 224, 'Đức Home (2024 - 2025) (x1)', 'X', 207000, '3', 8),
(89, 'Nguyễn Thanh Vũ', 'vuntpk03665@gmail.com', '987654321', 'Dubai', 227, 'Anh Home (2024 - 2025)', 'XXL', 80000, '3', 15),
(90, 'Nguyễn Thanh Vũ', 'vuntpk03665@gmail.com', '987654321', 'Dubai', 229, 'BĐN Home (2024 - 2025) (x1)', 'XXL', 256000, '2', 15),
(91, 'Nguyễn Thanh Vũ', 'vuntpk03665@gmail.com', '987654321', 'Dubai', 232, 'Arsenal Home (1992/1994) Màu đỏ', ' S', 375000, '2', 15),
(92, 'Nguyễn Thanh Vũ', 'vuntpk03665@gmail.com', '987654321', 'Dubai', 234, 'Cốc Giữ Nhiệt Logo MU Đỏ', '500ml', 170000, '3', 15),
(93, 'Nguyễn Thanh Vũ', 'vuntpk03665@gmail.com', '987654321', 'Dubai', 236, 'BĐN Home (2024 - 2025)', 'X', 346000, '3', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(20,0) NOT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `coupon` decimal(20,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `image`) VALUES
(3, 'Áo tuyển quốc gia', 'photo-2024-07-01-20-38-03_1721636615_669e1707e5925.jpg'),
(4, 'Áo CLB', 'photo-2024-07-01-20-38-02-3_1721654563_669e5d2346d09.jpg'),
(5, 'Phụ kiện', '397acf31-c5cb-4de7-995b-36c000ea_1721654708_669e5db4ce6b5.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_id`, `username`, `text`, `date`) VALUES
(33, 18, 15, 'thanhvu', 'fhdsffvcxv', '2024-08-05 14:41:23'),
(34, 18, 15, 'ngthanhvu', 'sfvc34dfd', '2024-08-08 14:41:40'),
(36, 16, 15, 'sdffs', 'thì người dùng nhập có thể xóa chớ', '2024-08-08 16:31:20'),
(37, 25, 15, 'mu vô địch', 'phấn đào', '2024-08-08 16:31:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` int NOT NULL,
  `code` varchar(50) NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL,
  `max_uses` int DEFAULT '1',
  `uses` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount_amount`, `max_uses`, `uses`, `created_at`, `end_date`) VALUES
(1, 'thanhvu', 10000.00, 986, 0, '2024-08-02 14:59:48', '2024-08-10 00:00:00'),
(2, 'thanhvu1', 50000.00, 131123, 0, '2024-08-05 05:04:49', '2024-08-23 00:00:00'),
(5, '8thang8', 100000.00, 97, 0, '2024-08-08 08:52:12', '2024-08-09 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `total` decimal(30,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `created_at`, `updated_at`, `status`) VALUES
(152, 8, 236000, '2024-07-28 07:07:16', '2024-07-28 07:07:16', '1'),
(153, 8, 236000, '2024-07-28 07:07:17', '2024-07-28 07:07:17', '1'),
(154, 8, 540000, '2024-07-25 07:07:33', '2024-07-28 15:09:45', '1'),
(155, 8, 540000, '2024-07-27 07:07:35', '2024-07-28 14:09:55', '2'),
(156, 15, 236000, '2024-08-01 07:34:32', '2024-08-01 07:34:32', '1'),
(157, 15, 236000, '2024-08-01 07:34:49', '2024-08-01 07:34:49', '1'),
(158, 15, 236000, '2024-08-01 07:35:04', '2024-08-01 07:35:04', '1'),
(159, 15, 771000, '2024-08-01 07:39:35', '2024-08-01 07:39:35', '1'),
(160, 15, 771000, '2024-08-01 07:39:44', '2024-08-01 07:39:44', '1'),
(161, 15, 270000, '2024-08-01 07:41:04', '2024-08-01 07:41:04', '1'),
(162, 15, 270000, '2024-08-01 07:41:10', '2024-08-01 07:41:10', '1'),
(163, 15, 180000, '2024-08-01 07:42:24', '2024-08-01 07:42:24', '1'),
(164, 15, 180000, '2024-08-01 07:42:29', '2024-08-01 07:42:29', '1'),
(165, 15, 156000, '2024-08-01 07:43:25', '2024-08-01 07:43:25', '1'),
(166, 15, 156000, '2024-08-01 07:43:30', '2024-08-01 07:43:30', '1'),
(167, 15, 410000, '2024-08-01 07:51:13', '2024-08-01 07:51:13', '1'),
(168, 15, 410000, '2024-08-01 07:51:20', '2024-08-01 07:51:20', '1'),
(169, 15, 270000, '2024-08-01 07:55:54', '2024-08-01 07:55:54', '1'),
(170, 15, 270000, '2024-08-01 07:55:57', '2024-08-01 07:55:57', '1'),
(171, 8, 180000, '2024-08-03 07:26:17', '2024-08-03 07:26:17', '1'),
(172, 8, 180000, '2024-08-03 07:29:19', '2024-08-03 07:29:19', '1'),
(173, 8, 180000, '2024-08-03 07:31:16', '2024-08-03 07:31:16', '1'),
(174, 8, 170000, '2024-08-03 07:36:24', '2024-08-03 07:36:24', '1'),
(175, 8, 170000, '2024-08-03 07:37:09', '2024-08-03 07:37:09', '1'),
(176, 8, 180000, '2024-08-03 07:38:33', '2024-08-03 07:38:33', '1'),
(177, 8, 180000, '2024-08-03 07:38:57', '2024-08-03 07:38:57', '1'),
(178, 8, 180000, '2024-08-03 07:43:42', '2024-08-03 07:43:42', '1'),
(179, 8, 667000, '2024-08-03 08:01:40', '2024-08-03 08:01:40', '1'),
(180, 8, 667000, '2024-08-03 08:12:21', '2024-08-03 08:12:21', '1'),
(181, 8, 667000, '2024-08-03 08:27:42', '2024-08-03 08:27:42', '1'),
(182, 8, 180000, '2024-08-03 08:49:31', '2024-08-03 08:49:31', '1'),
(183, 8, 180000, '2024-08-04 07:26:09', '2024-08-04 07:26:09', '1'),
(184, 8, 180000, '2024-08-04 07:27:57', '2024-08-04 07:27:57', '1'),
(185, 8, 236000, '2024-08-04 07:31:09', '2024-08-04 07:31:09', '1'),
(186, 8, 236000, '2024-08-04 14:40:19', '2024-08-04 14:40:19', '1'),
(187, 8, 270000, '2024-08-04 15:13:46', '2024-08-04 15:13:46', '1'),
(188, 8, 527000, '2024-08-04 15:15:06', '2024-08-04 15:15:06', '1'),
(189, 8, 646000, '2024-08-04 15:45:21', '2024-08-04 15:45:21', '1'),
(190, 8, 646000, '2024-08-04 15:45:25', '2024-08-04 15:45:25', '1'),
(191, 8, 236000, '2024-08-04 15:52:53', '2024-08-04 15:52:53', '1'),
(192, 8, 236000, '2024-08-04 15:52:56', '2024-08-04 15:52:56', '1'),
(193, 8, 156000, '2024-08-04 15:55:05', '2024-08-04 15:55:05', '1'),
(194, 8, 156000, '2024-08-04 15:55:17', '2024-08-04 15:55:17', '1'),
(195, 8, 472000, '2024-08-04 15:56:45', '2024-08-04 15:56:45', '1'),
(196, 8, 472000, '2024-08-04 15:56:47', '2024-08-04 15:56:47', '1'),
(197, 8, 686000, '2024-08-04 15:59:00', '2024-08-04 15:59:00', '1'),
(198, 8, 686000, '2024-08-04 15:59:04', '2024-08-04 15:59:04', '1'),
(199, 8, 180000, '2024-08-04 16:13:55', '2024-08-04 16:13:55', '1'),
(200, 8, 180000, '2024-08-04 16:13:57', '2024-08-04 16:14:30', '2'),
(201, 8, 356000, '2024-08-04 16:17:02', '2024-08-04 16:17:02', '1'),
(202, 8, 356000, '2024-08-04 16:17:15', '2024-08-04 16:17:15', '1'),
(203, 8, 472000, '2024-08-05 04:54:55', '2024-08-05 04:54:55', '1'),
(204, 8, 472000, '2024-08-05 04:54:58', '2024-08-05 04:55:31', '2'),
(205, 8, 236000, '2024-08-05 05:03:38', '2024-08-05 05:03:38', '1'),
(206, 8, 236000, '2024-08-05 05:03:42', '2024-08-05 05:04:10', '2'),
(207, 8, 180000, '2024-08-05 05:06:37', '2024-08-05 05:06:37', '1'),
(208, 8, 180000, '2024-08-05 05:06:40', '2024-08-05 05:07:14', '2'),
(209, 8, 356000, '2024-08-05 05:20:54', '2024-08-05 05:20:54', '1'),
(210, 8, 356000, '2024-08-05 05:20:57', '2024-08-05 05:21:23', '2'),
(211, 8, 236000, '2024-08-05 05:23:30', '2024-08-05 05:23:30', '1'),
(212, 8, 236000, '2024-08-05 05:23:32', '2024-08-05 05:23:59', '2'),
(213, 8, 356000, '2024-08-05 05:29:38', '2024-08-05 05:29:38', '1'),
(214, 8, 356000, '2024-08-05 05:29:40', '2024-08-05 05:30:06', '2'),
(215, 8, 437000, '2024-08-05 05:30:37', '2024-08-05 05:30:37', '1'),
(216, 8, 437000, '2024-08-05 05:30:42', '2024-08-05 05:31:04', '2'),
(217, 8, 236000, '2024-08-05 06:07:19', '2024-08-05 06:07:19', '1'),
(218, 8, 236000, '2024-08-05 06:07:20', '2024-08-05 06:07:20', '1'),
(219, 8, 257000, '2024-08-05 07:51:29', '2024-08-05 07:51:29', '1'),
(220, 8, 257000, '2024-08-05 07:51:31', '2024-08-05 07:51:57', '2'),
(221, 15, 540000, '2024-08-05 08:32:52', '2024-08-05 08:32:52', '1'),
(222, 15, 540000, '2024-08-05 08:32:58', '2024-08-05 08:32:58', '1'),
(223, 8, 257000, '2024-08-05 09:10:03', '2024-08-05 09:10:03', '1'),
(224, 8, 257000, '2024-08-05 09:10:09', '2024-08-05 09:10:39', '2'),
(225, 8, 236000, '2024-08-07 13:55:23', '2024-08-07 13:55:23', '1'),
(226, 15, 180000, '2024-08-08 08:52:26', '2024-08-08 08:52:26', '1'),
(227, 15, 180000, '2024-08-08 08:52:29', '2024-08-08 09:00:52', '3'),
(228, 15, 356000, '2024-08-08 08:53:19', '2024-08-08 09:03:34', '0'),
(229, 15, 356000, '2024-08-08 08:53:22', '2024-08-08 09:03:28', '0'),
(230, 15, 0, '2024-08-08 09:27:07', '2024-08-08 09:27:07', '1'),
(231, 15, 385000, '2024-08-08 15:11:25', '2024-08-08 15:11:25', '1'),
(232, 15, 385000, '2024-08-08 15:11:28', '2024-08-08 15:11:28', '1'),
(233, 15, 270000, '2024-08-08 15:26:46', '2024-08-08 15:26:46', '1'),
(234, 15, 270000, '2024-08-08 15:33:29', '2024-08-08 15:33:29', '1'),
(235, 15, 356000, '2024-08-09 05:56:08', '2024-08-09 05:56:08', '1'),
(236, 15, 356000, '2024-08-09 05:56:12', '2024-08-09 05:56:12', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `coupon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `size`, `quantity`, `price`, `coupon`, `created_at`, `updated_at`) VALUES
(191, 152, 17, 'XL', 1, 236000.00, NULL, '2024-07-28 07:07:16', '2024-07-28 07:07:16'),
(192, 153, 17, 'XL', 1, 236000.00, NULL, '2024-07-28 07:07:17', '2024-07-28 07:07:17'),
(193, 154, 14, 'XXL', 3, 180000.00, NULL, '2024-07-28 07:07:33', '2024-07-28 07:07:33'),
(194, 155, 14, 'XXL', 3, 180000.00, NULL, '2024-07-28 07:07:35', '2024-07-28 07:07:35'),
(195, 156, 17, 'XXL', 1, 236000.00, NULL, '2024-08-01 07:34:32', '2024-08-01 07:34:32'),
(196, 157, 17, 'XXL', 1, 236000.00, NULL, '2024-08-01 07:34:49', '2024-08-01 07:34:49'),
(197, 158, 17, 'XXL', 1, 236000.00, NULL, '2024-08-01 07:35:04', '2024-08-01 07:35:04'),
(198, 159, 16, 'XL', 3, 257000.00, NULL, '2024-08-01 07:39:35', '2024-08-01 07:39:35'),
(199, 160, 16, 'XL', 3, 257000.00, NULL, '2024-08-01 07:39:44', '2024-08-01 07:39:44'),
(200, 161, 20, '500ml', 1, 270000.00, NULL, '2024-08-01 07:41:04', '2024-08-01 07:41:04'),
(201, 162, 20, '500ml', 1, 270000.00, NULL, '2024-08-01 07:41:10', '2024-08-01 07:41:10'),
(202, 163, 14, 'X', 1, 180000.00, NULL, '2024-08-01 07:42:24', '2024-08-01 07:42:24'),
(203, 164, 14, 'X', 1, 180000.00, NULL, '2024-08-01 07:42:29', '2024-08-01 07:42:29'),
(204, 165, 18, 'X', 1, 156000.00, NULL, '2024-08-01 07:43:25', '2024-08-01 07:43:25'),
(205, 166, 18, 'X', 1, 156000.00, NULL, '2024-08-01 07:43:30', '2024-08-01 07:43:30'),
(206, 167, 19, 'XL', 1, 410000.00, NULL, '2024-08-01 07:51:13', '2024-08-01 07:51:13'),
(207, 168, 19, 'XL', 1, 410000.00, NULL, '2024-08-01 07:51:20', '2024-08-01 07:51:20'),
(208, 169, 20, '500ml', 1, 270000.00, NULL, '2024-08-01 07:55:54', '2024-08-01 07:55:54'),
(209, 170, 20, '500ml', 1, 270000.00, NULL, '2024-08-01 07:55:57', '2024-08-01 07:55:57'),
(210, 171, 14, 'XL', 1, 180000.00, NULL, '2024-08-03 07:26:17', '2024-08-03 07:26:17'),
(211, 172, 14, 'XL', 1, 180000.00, NULL, '2024-08-03 07:29:19', '2024-08-03 07:29:19'),
(212, 173, 14, 'XL', 1, 180000.00, NULL, '2024-08-03 07:31:16', '2024-08-03 07:31:16'),
(213, 174, 14, 'XL', 1, 170000.00, NULL, '2024-08-03 07:36:24', '2024-08-03 07:36:24'),
(214, 175, 14, 'XL', 1, 170000.00, NULL, '2024-08-03 07:37:09', '2024-08-03 07:37:09'),
(215, 176, 14, 'XXL', 1, 180000.00, '10000', '2024-08-03 07:38:33', '2024-08-04 15:33:50'),
(216, 177, 14, 'XXL', 1, 180000.00, NULL, '2024-08-03 07:38:57', '2024-08-03 07:38:57'),
(217, 178, 14, 'XXL', 1, 180000.00, NULL, '2024-08-03 07:43:42', '2024-08-03 07:43:42'),
(218, 179, 19, 'XL', 1, 410000.00, NULL, '2024-08-03 08:01:40', '2024-08-03 08:01:40'),
(219, 179, 16, 'XXL', 1, 257000.00, NULL, '2024-08-03 08:01:40', '2024-08-03 08:01:40'),
(220, 180, 19, 'XL', 1, 410000.00, NULL, '2024-08-03 08:12:21', '2024-08-03 08:12:21'),
(221, 180, 16, 'XXL', 1, 257000.00, NULL, '2024-08-03 08:12:21', '2024-08-03 08:12:21'),
(222, 181, 19, 'XL', 1, 410000.00, NULL, '2024-08-03 08:27:42', '2024-08-03 08:27:42'),
(223, 182, 14, 'XL', 1, 180000.00, NULL, '2024-08-03 08:49:31', '2024-08-03 08:49:31'),
(224, 183, 14, 'XL', 1, 180000.00, NULL, '2024-08-04 07:26:09', '2024-08-04 07:26:09'),
(225, 184, 14, 'XL', 1, 180000.00, NULL, '2024-08-04 07:27:57', '2024-08-04 07:27:57'),
(226, 185, 17, 'XL', 1, 236000.00, NULL, '2024-08-04 07:31:09', '2024-08-04 07:31:09'),
(227, 186, 17, 'XL', 1, 236000.00, NULL, '2024-08-04 14:40:19', '2024-08-04 14:40:19'),
(228, 187, 20, '500ml', 1, 270000.00, NULL, '2024-08-04 15:13:46', '2024-08-04 15:13:46'),
(229, 188, 20, '500ml', 1, 270000.00, '10000', '2024-08-04 15:15:06', '2024-08-04 15:37:32'),
(230, 188, 16, 'XXL', 1, 257000.00, '10000', '2024-08-04 15:15:06', '2024-08-04 15:37:28'),
(231, 189, 17, 'XXL', 1, 236000.00, NULL, '2024-08-04 15:45:21', '2024-08-04 15:45:21'),
(232, 189, 19, 'M', 1, 410000.00, NULL, '2024-08-04 15:45:21', '2024-08-04 15:45:21'),
(233, 190, 17, 'XXL', 1, 236000.00, NULL, '2024-08-04 15:45:25', '2024-08-04 15:45:25'),
(234, 190, 19, 'M', 1, 410000.00, NULL, '2024-08-04 15:45:25', '2024-08-04 15:45:25'),
(235, 191, 17, 'XXL', 1, 236000.00, NULL, '2024-08-04 15:52:53', '2024-08-04 15:52:53'),
(236, 192, 17, 'XXL', 1, 236000.00, NULL, '2024-08-04 15:52:56', '2024-08-04 15:52:56'),
(237, 193, 18, 'XL', 1, 156000.00, NULL, '2024-08-04 15:55:05', '2024-08-04 15:55:05'),
(238, 194, 18, 'XL', 1, 156000.00, NULL, '2024-08-04 15:55:17', '2024-08-04 15:55:17'),
(239, 195, 17, 'XL', 2, 236000.00, NULL, '2024-08-04 15:56:45', '2024-08-04 15:56:45'),
(240, 196, 17, 'XL', 2, 236000.00, NULL, '2024-08-04 15:56:47', '2024-08-04 15:56:47'),
(241, 197, 20, '500ml', 1, 270000.00, NULL, '2024-08-04 15:59:00', '2024-08-04 15:59:00'),
(242, 197, 14, 'XXL', 1, 180000.00, NULL, '2024-08-04 15:59:00', '2024-08-04 15:59:00'),
(243, 197, 17, 'X', 1, 236000.00, NULL, '2024-08-04 15:59:00', '2024-08-04 15:59:00'),
(244, 198, 20, '500ml', 1, 270000.00, NULL, '2024-08-04 15:59:04', '2024-08-04 15:59:04'),
(245, 198, 14, 'XXL', 1, 180000.00, NULL, '2024-08-04 15:59:04', '2024-08-04 15:59:04'),
(246, 198, 17, 'X', 1, 236000.00, NULL, '2024-08-04 15:59:04', '2024-08-04 15:59:04'),
(247, 199, 14, 'XXL', 1, 180000.00, NULL, '2024-08-04 16:13:55', '2024-08-04 16:13:55'),
(248, 200, 14, 'XXL', 1, 180000.00, NULL, '2024-08-04 16:13:57', '2024-08-04 16:13:57'),
(249, 201, 15, 'XXL', 1, 356000.00, NULL, '2024-08-04 16:17:02', '2024-08-04 16:17:02'),
(250, 202, 15, 'XXL', 1, 356000.00, NULL, '2024-08-04 16:17:15', '2024-08-04 16:17:15'),
(251, 203, 17, 'XL', 2, 236000.00, NULL, '2024-08-05 04:54:55', '2024-08-05 04:54:55'),
(252, 204, 17, 'XL', 2, 236000.00, NULL, '2024-08-05 04:54:58', '2024-08-05 04:54:58'),
(253, 205, 17, 'XXL', 1, 236000.00, NULL, '2024-08-05 05:03:38', '2024-08-05 05:03:38'),
(254, 206, 17, 'XXL', 1, 236000.00, NULL, '2024-08-05 05:03:42', '2024-08-05 05:03:42'),
(255, 207, 14, 'XXL', 1, 180000.00, NULL, '2024-08-05 05:06:37', '2024-08-05 05:06:37'),
(256, 208, 14, 'XXL', 1, 180000.00, NULL, '2024-08-05 05:06:40', '2024-08-05 05:06:40'),
(257, 209, 15, 'XL', 1, 356000.00, NULL, '2024-08-05 05:20:54', '2024-08-05 05:20:54'),
(258, 210, 15, 'XL', 1, 356000.00, NULL, '2024-08-05 05:20:57', '2024-08-05 05:20:57'),
(259, 211, 17, 'XXL', 1, 236000.00, NULL, '2024-08-05 05:23:30', '2024-08-05 05:23:30'),
(260, 212, 17, 'XXL', 1, 236000.00, NULL, '2024-08-05 05:23:32', '2024-08-05 05:23:32'),
(261, 213, 15, 'XL', 1, 356000.00, NULL, '2024-08-05 05:29:38', '2024-08-05 05:29:38'),
(262, 214, 15, 'XL', 1, 356000.00, NULL, '2024-08-05 05:29:40', '2024-08-05 05:29:40'),
(263, 215, 14, 'XXL', 1, 180000.00, NULL, '2024-08-05 05:30:37', '2024-08-05 05:30:37'),
(264, 215, 16, 'XL', 1, 257000.00, NULL, '2024-08-05 05:30:37', '2024-08-05 05:30:37'),
(265, 216, 14, 'XXL', 1, 180000.00, NULL, '2024-08-05 05:30:42', '2024-08-05 05:30:42'),
(266, 216, 16, 'XL', 1, 257000.00, NULL, '2024-08-05 05:30:42', '2024-08-05 05:30:42'),
(267, 217, 17, 'M', 1, 236000.00, NULL, '2024-08-05 06:07:19', '2024-08-05 06:07:19'),
(268, 218, 17, 'M', 1, 236000.00, NULL, '2024-08-05 06:07:20', '2024-08-05 06:07:20'),
(269, 219, 16, 'XL', 1, 257000.00, NULL, '2024-08-05 07:51:29', '2024-08-05 07:51:29'),
(270, 220, 16, 'XL', 1, 257000.00, NULL, '2024-08-05 07:51:31', '2024-08-05 07:51:31'),
(271, 221, 20, '500ml', 2, 270000.00, NULL, '2024-08-05 08:32:52', '2024-08-05 08:32:52'),
(272, 222, 20, '500ml', 2, 270000.00, NULL, '2024-08-05 08:32:58', '2024-08-05 08:32:58'),
(273, 223, 16, 'X', 1, 257000.00, NULL, '2024-08-05 09:10:03', '2024-08-05 09:10:03'),
(274, 224, 16, 'X', 1, 257000.00, NULL, '2024-08-05 09:10:09', '2024-08-05 09:10:09'),
(275, 225, 17, 'XL', 1, 236000.00, NULL, '2024-08-07 13:55:23', '2024-08-07 13:55:23'),
(276, 226, 14, 'XXL', 1, 180000.00, NULL, '2024-08-08 08:52:26', '2024-08-08 08:52:26'),
(277, 227, 14, 'XXL', 1, 180000.00, NULL, '2024-08-08 08:52:29', '2024-08-08 08:52:29'),
(278, 228, 15, 'XXL', 1, 356000.00, NULL, '2024-08-08 08:53:19', '2024-08-08 08:53:19'),
(279, 229, 15, 'XXL', 1, 356000.00, NULL, '2024-08-08 08:53:22', '2024-08-08 08:53:22'),
(280, 231, 25, ' S', 1, 385000.00, NULL, '2024-08-08 15:11:25', '2024-08-08 15:11:25'),
(281, 232, 25, ' S', 1, 385000.00, NULL, '2024-08-08 15:11:28', '2024-08-08 15:11:28'),
(282, 233, 20, '500ml', 1, 270000.00, NULL, '2024-08-08 15:26:46', '2024-08-08 15:26:46'),
(283, 234, 20, '500ml', 1, 270000.00, NULL, '2024-08-08 15:33:29', '2024-08-08 15:33:29'),
(284, 235, 15, 'X', 1, 356000.00, NULL, '2024-08-09 05:56:08', '2024-08-09 05:56:08'),
(285, 236, 15, 'X', 1, 356000.00, NULL, '2024-08-09 05:56:12', '2024-08-09 05:56:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int NOT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` text NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `image`, `price`, `quantity`, `size`, `description`, `category_id`) VALUES
(14, 'Anh Home (2024 - 2025)', 'photo-2024-06-26-13-23-57-2_1721636815_669e17cff121f.jpg', 180000, 9, 'S,M,X,XL,XXL', 'Khách hàng có nhu cầu IN TÊN SỐ, đặt đội hoặc mua số lượng lớn từ 7 bộ vui lòng inbox để SHOP hỗ trợ với giá tốt nhất cùng nhiều ưu đãi quà tặng đặc biệt', 3),
(15, 'BĐN Home (2024 - 2025)', 'photo-2024-07-01-20-38-03-3_1721637277_669e199d42170.jpg', 356000, 7, 'S,M,X,XL,XXL', 'Khách hàng có nhu cầu IN TÊN SỐ, đặt đội hoặc mua số lượng lớn từ 7 bộ vui lòng inbox để SHOP hỗ trợ với giá tốt nhất cùng nhiều ưu đãi quà tặng đặc biệt', 3),
(16, 'Đức Home (2024 - 2025)', 'photo-2024-07-01-20-38-04-3_1721637312_669e19c059118.jpg', 257000, 11, 'S,M,X,XL,XXL', 'Khách hàng có nhu cầu IN TÊN SỐ, đặt đội hoặc mua số lượng lớn từ 7 bộ vui lòng inbox để SHOP hỗ trợ với giá tốt nhất cùng nhiều ưu đãi quà tặng đặc biệt', 3),
(17, 'Pháp Home (2024 - 2025)', 'photo-2024-07-04-14-40-07_1721637373_669e19fd84ae0.jpg', 236000, 9, 'S,M,X,XL,XXL', 'Khách hàng có nhu cầu IN TÊN SỐ, đặt đội hoặc mua số lượng lớn từ 7 bộ vui lòng inbox để SHOP hỗ trợ với giá tốt nhất cùng nhiều ưu đãi quà tặng đặc biệt', 3),
(18, 'TBN Home (2024 - 2025)', 'photo-2024-07-04-14-22-26_1721637418_669e1a2ae054d.jpg', 156000, 10, 'S,M,X,XL,XXL', 'Khách hàng có nhu cầu IN TÊN SỐ, đặt đội hoặc mua số lượng lớn từ 7 bộ vui lòng inbox để SHOP hỗ trợ với giá tốt nhất cùng nhiều ưu đãi quà tặng đặc biệt', 3),
(19, 'Dortmund Home (2024-2025)', 'photo-2024-07-01-20-38-02-3 (1)_1721657847_669e69f799cb5.jpg', 410000, 10, 'S,M,X,XL,XXL', 'Khách hàng có nhu cầu IN TÊN SỐ, đặt đội hoặc mua số lượng lớn từ 7 bộ vui lòng inbox để SHOP hỗ trợ với giá tốt nhất cùng nhiều ưu đãi quà tặng đặc biệt', 4),
(20, 'Cốc Giữ Nhiệt Logo MU Đỏ', 'photo-2024-05-27-09-27-59-2-1-1_1721658222_669e6b6e3e734.jpg', 270000, 17, '300ml,500ml', 'Thông tin sản phẩm đang được cập nhật', 5),
(21, 'Juventus Home (2024-2025)', 'photo-2024-06-26-13-22-53_1722092487_66a50bc760a38.jpg', 320000, 31, 'S,M,X,XL,XXL', 'Khách hàng có nhu cầu IN TÊN SỐ, đặt đội hoặc mua số lượng lớn từ 7 bộ vui lòng inbox để SHOP hỗ trợ với giá tốt nhất cùng nhiều ưu đãi quà tặng đặc biệt', 4),
(23, 'MU Away (2024-2025) Màu Xanh', 'photo-2024-07-25-20-26-21-copy-1_1722848042_66b0932a36891.jpg', 310000, 10, 'X, S, M, XL, XXL', 'Khách hàng có nhu cầu IN TÊN SỐ, đặt đội hoặc mua số lượng lớn từ 7 bộ vui lòng inbox để SHOP hỗ trợ với giá tốt nhất cùng nhiều ưu đãi quà tặng đặc biệt', 4),
(25, 'Arsenal Home (1992/1994) Màu đỏ', 'tfd_1723129034_66b4dccac5325.jpg,ao-asrm_1723129034_66b4dccac5be0.jpg', 385000, 9, 'X, S, M, XL, XXL', 'Đang cập nhật', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT 'user',
  `google_id` varchar(255) DEFAULT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `phone`, `full_name`, `address`, `role`, `google_id`, `otp`, `created_at`) VALUES
(4, 'thanhvu', 'nguyenthanhvudvfb@gmail.com', '$2y$10$eZ26s9TZ.kJ.y5YM7uJ45uoJHwJk.bv8DgJIrfkclbbZsD2894XXa', 999999922, NULL, NULL, 'user', NULL, '886575', '2024-08-01 08:03:57'),
(8, 'admin', 'v.untpk03665@gmail.com', '$2y$10$xmNjf02eRESMntTpaNOCYuReNd52ZNw.GSlnrlb9OxHDxHHxZ.4qq', 98334343, 'Nguyễn Thanh Vũ', 'Buôn Ma Thuột', 'admin', NULL, NULL, '2024-07-31 15:22:27'),
(10, 'ngthanhvu12', 'dwi78025@vogco.com', '$2y$10$sAzagaGUfNyx4MOxWUGXaeNTyCCuuKbJiYkVmUgdoOeGXQEX6QizC', 1234567890, NULL, NULL, 'user', NULL, NULL, '2024-07-31 15:22:27'),
(11, 'test', 'test@gmail.com', '$2y$10$FVaOmK67OCGDkdD754GwrOJf1SftkdOTM82zToson59G1AoU5vKe6', 987654321, 'tao ten vu', 'Quy Nhơn', 'user', NULL, NULL, '2024-07-31 15:22:27'),
(13, 'test1', 'test11@gmail.com', '$2y$10$lL3jtAPccuuDg5eHi7ofFufg1MRgXQuR.5qzqWfCJoGIRGyXTq1.C', 987654322, 'tao ten là test', 'dsadsd', 'user', NULL, NULL, '2024-07-31 15:22:27'),
(15, 'GoogleUser4623', 'vuntpk03665@gmail.com', NULL, 987654321, 'Nguyễn Thanh Vũ', 'Dubai', 'admin', '105787577526443010151', NULL, '2024-08-01 14:12:30'),
(16, 'thanhvu007', 'vu.ntpk03665@gmail.com', '$2y$10$iHv.97X7jswFyjp14eD2c.lhS8Hq4x.hD.b.QuKn3xb4Wo5Z5PO56', 987654321, NULL, NULL, 'user', NULL, NULL, '2024-08-08 06:28:43');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_order` (`order_id`),
  ADD KEY `fk_bill_user` (`user_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`),
  ADD KEY `fk_product` (`product_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_users` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order` (`order_id`),
  ADD KEY `fk_order_details_product` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_bill_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_bill_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
