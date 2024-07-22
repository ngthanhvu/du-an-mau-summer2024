-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th7 18, 2024 lúc 08:29 AM
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
-- Cơ sở dữ liệu: `ngthanhvu`
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
  `total` decimal(30,0) NOT NULL,
  `status` varchar(50) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `full_name`, `email`, `phone`, `address`, `order_id`, `product_name`, `total`, `status`, `user_id`) VALUES
(37, 'Nguyễn Thanh Vũ', 'vuntpk03665@gmail.com', '', '', 115, '', 0, '2', 8),
(38, 'Nguyễn Thanh Vũ', 'vuntpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 117, 'Giày đá bóng', 100000, '1', 8),
(39, 'Nguyễn Thanh Vũ', 'vuntpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 119, '', 0, '2', 8),
(40, 'Nguyễn Thanh Vũ', 'vuntpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 123, '', 0, '2', 8),
(41, 'Nguyễn Thanh Vũ', 'vuntpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 123, '', 0, '2', 8),
(42, 'Nguyễn Thanh Vũ', 'vuntpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 123, '', 0, '2', 8),
(43, 'Nguyễn Thanh Vũ', 'vuntpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 123, '', 0, '2', 8),
(44, 'Nguyễn Thanh Vũ', 'vuntpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 123, 'Giày số 2', 56000, '2', 8),
(45, 'Nguyễn Thanh Vũ', 'vuntpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 125, 'Giày đá bóng', 124000, '2', 8),
(46, 'Nguyễn Thanh Vũ', 'vuntpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 123, 'Giày số 2', 56000, '2', 8),
(47, 'Nguyễn Thanh Vũ', 'vuntpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 127, 'Giày đá bóng', 180000, '2', 8),
(48, 'Nguyễn Thanh Vũ', 'vuntpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 127, 'Giày đá bóng', 180000, '2', 8),
(49, 'Nguyễn Thanh Vũ', 'vuntpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 129, 'Giày đá bóng (x1), Giày số 2 (x1)', 156000, '2', 8),
(50, 'Nguyễn Thanh Vũ', 'vuntpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 131, 'Giày đá bóng (x2), Áo đá bóng việt nam (x1), Giày số 2 (x1)', 280000, '2', 8),
(51, 'Nguyễn Thanh Vũ', 'vuntpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 133, 'Giày đá bóng (x1), Áo đá bóng việt nam (x1)', 124000, '2', 8),
(52, 'Nguyễn Thanh Vũ', 'vuntpk03665@gmail.com', '98334343', 'Buôn Ma Thuột', 135, 'Giày đá bóng, Áo đá bóng việt nam, Giày số 2', 180000, '1', 8);

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
  `price` decimal(20,0) NOT NULL
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
(1, 'Giày đá bóng', 'akka_speed_ii_xanhbien__1__9083e_1720450208_668bfca06d1a1.jpg'),
(2, 'Áo đá bóng', 'quan-ao-da-bong-juventus-1_1720506794_668cd9aaf3b23.jpg');

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
  `status` varchar(50) DEFAULT NULL,
  `payment` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `created_at`, `updated_at`, `status`, `payment`) VALUES
(106, 8, 56000, '2024-07-14 20:49:18', '2024-07-14 20:49:18', '1', NULL),
(107, 8, 56000, '2024-07-14 20:49:20', '2024-07-15 03:49:43', '2', NULL),
(108, 8, 56000, '2024-07-14 20:54:17', '2024-07-14 20:54:17', '1', NULL),
(109, 8, 56000, '2024-07-14 20:54:19', '2024-07-15 03:54:43', '2', NULL),
(110, 8, 124000, '2024-07-14 20:57:23', '2024-07-14 20:57:23', '1', NULL),
(111, 8, 124000, '2024-07-14 20:57:25', '2024-07-15 03:57:45', '2', NULL),
(112, 8, 180000, '2024-07-14 21:04:58', '2024-07-14 21:04:58', '1', NULL),
(113, 8, 180000, '2024-07-14 21:05:00', '2024-07-15 04:07:42', '2', NULL),
(114, 8, 180000, '2024-07-14 21:07:53', '2024-07-14 21:07:53', '1', NULL),
(115, 8, 180000, '2024-07-14 21:07:55', '2024-07-15 04:09:03', '2', NULL),
(116, 8, 100000, '2024-07-15 01:17:21', '2024-07-15 01:17:21', '1', NULL),
(117, 8, 100000, '2024-07-15 01:17:23', '2024-07-15 01:17:23', '1', NULL),
(118, 8, 56000, '2024-07-15 01:17:58', '2024-07-15 01:17:58', '1', NULL),
(119, 8, 56000, '2024-07-15 01:18:01', '2024-07-15 08:18:31', '2', NULL),
(120, 8, 100000, '2024-07-15 02:04:30', '2024-07-15 02:04:30', '1', NULL),
(121, 8, 100000, '2024-07-15 02:04:36', '2024-07-15 02:04:36', '1', NULL),
(122, 8, 56000, '2024-07-15 05:52:39', '2024-07-15 05:52:39', '1', NULL),
(123, 8, 56000, '2024-07-15 05:52:41', '2024-07-15 13:02:25', '2', NULL),
(124, 8, 124000, '2024-07-15 06:01:00', '2024-07-15 06:01:00', '1', NULL),
(125, 8, 124000, '2024-07-15 06:01:02', '2024-07-15 13:01:22', '2', NULL),
(126, 8, 180000, '2024-07-15 06:09:50', '2024-07-15 06:09:50', '1', NULL),
(127, 8, 180000, '2024-07-15 06:09:53', '2024-07-15 13:13:02', '2', NULL),
(128, 8, 156000, '2024-07-15 06:19:05', '2024-07-15 06:19:05', '1', NULL),
(129, 8, 156000, '2024-07-15 06:19:07', '2024-07-15 13:19:30', '2', NULL),
(130, 8, 280000, '2024-07-15 06:27:46', '2024-07-15 06:27:46', '1', NULL),
(131, 8, 280000, '2024-07-15 06:27:48', '2024-07-15 13:28:09', '2', NULL),
(132, 8, 124000, '2024-07-15 06:48:24', '2024-07-15 06:48:24', '1', NULL),
(133, 8, 124000, '2024-07-15 06:48:27', '2024-07-15 13:48:53', '2', NULL),
(134, 8, 180000, '2024-07-15 06:55:52', '2024-07-15 06:55:52', '1', NULL),
(135, 8, 180000, '2024-07-15 06:55:52', '2024-07-15 06:55:52', '1', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(117, 106, 12, 1, 56000.00, '2024-07-14 20:49:18', '2024-07-14 20:49:18'),
(118, 107, 12, 1, 56000.00, '2024-07-14 20:49:20', '2024-07-14 20:49:20'),
(119, 108, 12, 1, 56000.00, '2024-07-14 20:54:17', '2024-07-14 20:54:17'),
(120, 109, 12, 1, 56000.00, '2024-07-14 20:54:19', '2024-07-14 20:54:19'),
(121, 110, 10, 1, 100000.00, '2024-07-14 20:57:23', '2024-07-14 20:57:23'),
(122, 110, 11, 1, 24000.00, '2024-07-14 20:57:23', '2024-07-14 20:57:23'),
(123, 111, 10, 1, 100000.00, '2024-07-14 20:57:25', '2024-07-14 20:57:25'),
(124, 111, 11, 1, 24000.00, '2024-07-14 20:57:25', '2024-07-14 20:57:25'),
(125, 112, 10, 1, 100000.00, '2024-07-14 21:04:58', '2024-07-14 21:04:58'),
(126, 112, 11, 1, 24000.00, '2024-07-14 21:04:58', '2024-07-14 21:04:58'),
(127, 112, 12, 1, 56000.00, '2024-07-14 21:04:58', '2024-07-14 21:04:58'),
(128, 113, 10, 1, 100000.00, '2024-07-14 21:05:00', '2024-07-14 21:05:00'),
(129, 113, 11, 1, 24000.00, '2024-07-14 21:05:00', '2024-07-14 21:05:00'),
(130, 113, 12, 1, 56000.00, '2024-07-14 21:05:00', '2024-07-14 21:05:00'),
(131, 114, 10, 1, 100000.00, '2024-07-14 21:07:53', '2024-07-14 21:07:53'),
(132, 114, 11, 1, 24000.00, '2024-07-14 21:07:53', '2024-07-14 21:07:53'),
(133, 114, 12, 1, 56000.00, '2024-07-14 21:07:53', '2024-07-14 21:07:53'),
(134, 115, 10, 1, 100000.00, '2024-07-14 21:07:55', '2024-07-14 21:07:55'),
(135, 115, 11, 1, 24000.00, '2024-07-14 21:07:55', '2024-07-14 21:07:55'),
(136, 115, 12, 1, 56000.00, '2024-07-14 21:07:55', '2024-07-14 21:07:55'),
(137, 116, 10, 1, 100000.00, '2024-07-15 01:17:21', '2024-07-15 01:17:21'),
(138, 117, 10, 1, 100000.00, '2024-07-15 01:17:23', '2024-07-15 01:17:23'),
(139, 118, 12, 1, 56000.00, '2024-07-15 01:17:58', '2024-07-15 01:17:58'),
(140, 119, 12, 1, 56000.00, '2024-07-15 01:18:01', '2024-07-15 01:18:01'),
(141, 120, 10, 1, 100000.00, '2024-07-15 02:04:30', '2024-07-15 02:04:30'),
(142, 121, 10, 1, 100000.00, '2024-07-15 02:04:36', '2024-07-15 02:04:36'),
(143, 122, 12, 1, 56000.00, '2024-07-15 05:52:39', '2024-07-15 05:52:39'),
(144, 123, 12, 1, 56000.00, '2024-07-15 05:52:41', '2024-07-15 05:52:41'),
(145, 124, 11, 1, 24000.00, '2024-07-15 06:01:00', '2024-07-15 06:01:00'),
(146, 124, 10, 1, 100000.00, '2024-07-15 06:01:00', '2024-07-15 06:01:00'),
(147, 125, 11, 1, 24000.00, '2024-07-15 06:01:02', '2024-07-15 06:01:02'),
(148, 125, 10, 1, 100000.00, '2024-07-15 06:01:02', '2024-07-15 06:01:02'),
(149, 126, 12, 1, 56000.00, '2024-07-15 06:09:50', '2024-07-15 06:09:50'),
(150, 126, 11, 1, 24000.00, '2024-07-15 06:09:50', '2024-07-15 06:09:50'),
(151, 126, 10, 1, 100000.00, '2024-07-15 06:09:50', '2024-07-15 06:09:50'),
(152, 127, 12, 1, 56000.00, '2024-07-15 06:09:53', '2024-07-15 06:09:53'),
(153, 127, 11, 1, 24000.00, '2024-07-15 06:09:53', '2024-07-15 06:09:53'),
(154, 127, 10, 1, 100000.00, '2024-07-15 06:09:53', '2024-07-15 06:09:53'),
(155, 128, 10, 1, 100000.00, '2024-07-15 06:19:05', '2024-07-15 06:19:05'),
(156, 128, 12, 1, 56000.00, '2024-07-15 06:19:05', '2024-07-15 06:19:05'),
(157, 129, 10, 1, 100000.00, '2024-07-15 06:19:07', '2024-07-15 06:19:07'),
(158, 129, 12, 1, 56000.00, '2024-07-15 06:19:07', '2024-07-15 06:19:07'),
(159, 130, 11, 1, 24000.00, '2024-07-15 06:27:46', '2024-07-15 06:27:46'),
(160, 130, 12, 1, 56000.00, '2024-07-15 06:27:46', '2024-07-15 06:27:46'),
(161, 130, 10, 2, 100000.00, '2024-07-15 06:27:46', '2024-07-15 06:27:46'),
(162, 131, 11, 1, 24000.00, '2024-07-15 06:27:48', '2024-07-15 06:27:48'),
(163, 131, 12, 1, 56000.00, '2024-07-15 06:27:48', '2024-07-15 06:27:48'),
(164, 131, 10, 2, 100000.00, '2024-07-15 06:27:48', '2024-07-15 06:27:48'),
(165, 132, 10, 1, 100000.00, '2024-07-15 06:48:24', '2024-07-15 06:48:24'),
(166, 132, 11, 1, 24000.00, '2024-07-15 06:48:24', '2024-07-15 06:48:24'),
(167, 133, 10, 1, 100000.00, '2024-07-15 06:48:27', '2024-07-15 06:48:27'),
(168, 133, 11, 1, 24000.00, '2024-07-15 06:48:27', '2024-07-15 06:48:27'),
(169, 134, 10, 1, 100000.00, '2024-07-15 06:55:52', '2024-07-15 06:55:52'),
(170, 134, 11, 1, 24000.00, '2024-07-15 06:55:52', '2024-07-15 06:55:52'),
(171, 134, 12, 1, 56000.00, '2024-07-15 06:55:52', '2024-07-15 06:55:52'),
(172, 135, 10, 1, 100000.00, '2024-07-15 06:55:52', '2024-07-15 06:55:52'),
(173, 135, 11, 1, 24000.00, '2024-07-15 06:55:52', '2024-07-15 06:55:52'),
(174, 135, 12, 1, 56000.00, '2024-07-15 06:55:52', '2024-07-15 06:55:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int NOT NULL,
  `description` text NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `quantity`, `description`, `category_id`) VALUES
(10, 'Giày đá bóng', 'zocker-inspire-pro-cam_1720506739_668cd973834d5.jpg', 100000, 132131, 'Với sản phẩm gặp tình trạng bong vẩy keo, bong nứt nhỏ ở phần đế, khách hàng liên hệ với Zocker để được hỗ trợ.  Hỗ trợ đổi mới: Với sản phẩm bị bong phần đế ra khỏi giày hoặc mảng bong lớn dẫn đến không thể sử dụng giày, khách hàng sẽ được đổi sang sản phẩm mới.', 1),
(11, 'Áo đá bóng việt nam', '0020625_bo-quan-ao-bong-da-doi-t_1720506835_668cd9d34aa1f.jpg', 24000, 342434, 'Khi thiết kế bộ trang phục sân nhà của Real Madrid, adidas tìm về những truyền thống lâu đời của thành phố nổi danh là quê nhà của CLB. Lấy cảm hứng từ trang phục \"chulapo\" hiện diện tại lễ hội thường niên San Isidro Fiesta của Madrid, họa tiết houndstooth trên chiếc áo đấu bóng đá nguyên mẫu này tạo nên thiết kế đầy phong cách. Với công nghệ HEAT.RDY thoáng khí và huy hiệu CLB in nhiệt, chiếc áo này có thiết kế dành cho sân cỏ.', 2),
(12, 'Giày số 2', 'Untitled_1720704923_668fdf9b4cf33.jpg', 56000, 13213, 'Với sản phẩm gặp tình trạng bong vẩy keo, bong nứt nhỏ ở phần đế, khách hàng liên hệ với Zocker để được hỗ trợ. Hỗ trợ đổi mới: Với sản phẩm bị bong phần đế ra khỏi giày hoặc mảng bong lớn dẫn đến không thể sử dụng giày, khách hàng sẽ được đổi sang sản phẩm mới.', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `phone`, `full_name`, `address`, `role`) VALUES
(4, 'thanhvu', 'a@gmail.com', '$2y$10$GbUyXncL2MfLfM7bOVlUL.lC2Hr3ZBol2EalCcWuoVNRMRc.GxZz.', 999999922, NULL, NULL, 'user'),
(8, 'admin', 'vuntpk03665@gmail.com', '$2y$10$rAQtU2bLI/8oEQGnrhzdLOIR.BLcrQKg319XY1xYSVeYLW4EQ/ZGe', 98334343, 'Nguyễn Thanh Vũ', 'Buôn Ma Thuột', 'admin'),
(10, 'ngthanhvu12', 'dwi78025@vogco.com', '$2y$10$sAzagaGUfNyx4MOxWUGXaeNTyCCuuKbJiYkVmUgdoOeGXQEX6QizC', 1234567890, NULL, NULL, 'user'),
(11, 'test', 'test@gmail.com', '$2y$10$FVaOmK67OCGDkdD754GwrOJf1SftkdOTM82zToson59G1AoU5vKe6', 987654321, 'tao ten vu', 'Quy Nhơn', 'user'),
(12, 'ngthanhvu', 'nguyenvubmt2005@gmail.com', '$2y$10$2R0ptmxDsGUfeSstZkv0E.XNtxvJ6v3GNCZvvMA/k8s/2TqS1yJfS', 987654321, 'Tao là thanh vũ ok', 'Thành phố buồn', 'user');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_order_details_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
