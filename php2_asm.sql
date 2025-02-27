-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th2 27, 2025 lúc 02:11 PM
-- Phiên bản máy phục vụ: 8.0.39
-- Phiên bản PHP: 8.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php2_asm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`) VALUES
(1, 'Trái cây', 'Trái cây', 1),
(3, 'Trà', 'Trà', 1),
(4, 'Có ga', 'Ga', 1),
(5, 'Có cồn', 'cồn', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ingerdients`
--

CREATE TABLE `ingerdients` (
  `id` int NOT NULL,
  `materials_id` int NOT NULL,
  `recipes_id` int NOT NULL,
  `quantity` float NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ingerdients`
--

INSERT INTO `ingerdients` (`id`, `materials_id`, `recipes_id`, `quantity`, `unit`) VALUES
(8, 1, 21, 1, 'Ký'),
(9, 4, 21, 1, 'Cái'),
(10, 5, 21, 1, 'Kg'),
(11, 9, 21, 1, 'Quả'),
(12, 1, 22, 1, 'Ký'),
(13, 8, 22, 1, 'Kg'),
(14, 4, 22, 1, 'Cái'),
(15, 5, 22, 1, 'Kg'),
(16, 10, 23, 2, 'Quả'),
(17, 11, 23, 0, 'Quả'),
(18, 12, 23, 3, 'Quả'),
(19, 4, 23, 1, 'Cái'),
(20, 1, 23, 0.1, 'Ký'),
(21, 5, 23, 0, 'Kg'),
(26, 13, 25, 10, 'Quả'),
(27, 4, 25, 1, 'Cái'),
(28, 5, 25, 0.3, 'Kg'),
(29, 14, 26, 0.1, 'Kg'),
(30, 1, 26, 0.1, 'Ký'),
(31, 4, 26, 1, 'Cái'),
(32, 5, 26, 0.3, 'Kg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventory`
--

CREATE TABLE `inventory` (
  `id` int NOT NULL,
  `quantity` int NOT NULL,
  `material_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `inventory`
--

INSERT INTO `inventory` (`id`, `quantity`, `material_id`) VALUES
(1, 123, 1),
(2, 7, 6),
(3, 102, 7),
(4, 2, 4),
(5, 100, 13),
(6, 100, 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `materials`
--

CREATE TABLE `materials` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `materials`
--

INSERT INTO `materials` (`id`, `name`, `unit`, `created_at`) VALUES
(1, 'Đường', 'Kg', '2025-02-20'),
(4, 'Ly', 'Cái', '2025-02-21'),
(5, 'Đá uống', 'Kg', '2025-02-19'),
(6, 'Chanh ', 'Quả', '2025-02-18'),
(7, 'Sữa', 'Lon', '2025-02-22'),
(8, 'Cà phê hạt', 'Kg', '2025-02-22'),
(9, 'Quả Bưởi', 'Quả', '2025-02-23'),
(10, 'Cam', 'Quả', '2025-02-23'),
(11, 'Dứa', 'Quả', '2025-02-23'),
(12, 'Tắc', 'Quả', '2025-02-23'),
(13, 'Dâu', 'Quả', '2025-02-23'),
(14, 'Nho Xanh', 'Kg', '2025-02-23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `district` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ward` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total` int NOT NULL,
  `status` int DEFAULT '0',
  `payment_method_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `email`, `address`, `province`, `district`, `ward`, `total`, `status`, `payment_method_id`, `user_id`) VALUES
(7, 'khnh', '1312', '123123', '1231', '', '', '', 213123, 0, 0, 1),
(36, 'vubaokhanh', '0947546007', 'admin01@gmail.com', '123123', '', '', '', 60000, 0, 0, 1),
(37, 'vubaokhanh', '0947546007', 'admin01@gmail.com', 'dăd', '', '', '', 35000, 0, 0, 1),
(38, 'vubaokhanh', '0211111111#', 'vubaokhanh2311@gmail.com', 'ădwawda', '', '', '', 25000, 0, 0, 1),
(39, 'vubaokhanh', '0211111111#', 'vubaokhanh2311@gmail.com', 'ădwawda', '', '', '', 25000, 0, 0, 1),
(40, 'vubaokhanh', '0947546007', 'vubaokhanh2311@gmail.com', '12312312', '', '', '', 35000, 0, 0, 1),
(41, 'vubaokhanh', '0947546007', 'vubaokhanh2311@gmail.com', '12312312', '', '', '', 35000, 0, 0, 1),
(42, 'vubaokhanh', '0947546007', 'vubaokhanh2311@gmail.com', '1231213', '', '', '', 60000, 0, 0, 1),
(43, 'vubaokhanh', '0947546007', 'vubaokhanh2311@gmail.com', '1231213', '', '', '', 60000, 0, 0, 1),
(44, 'vubaokhanh', '0947546007', 'vubaokhanh2311@gmail.com', '1231213', '', '', '', 60000, 0, 0, 1),
(45, 'vubaokhanh', '0947546007', 'k@gmail.com', 'ădwawa', '', '', '', 105000, 0, 0, 1),
(46, 'vubaokhanh', '0947546007', 'khanhc@gmail.com', '12312312', '', '', '', 80000, 0, 0, 1),
(47, 'vubaokhanh', '0947546007', 'khanhc@gmail.com', '12312312', '', '', '', 80000, 0, 0, 1),
(48, 'vubaokhanh', '0947546007', 'khanhc@gmail.com', '12312312', '', '', '', 80000, 0, 0, 1),
(49, 'vubaokhanh', '0947546007', 'admin01@gmail.com', '12312', '', '', '', 125000, 0, 0, 1),
(50, 'vubaokhanh', '0947546007', 'admin01@gmail.com', '12312', '', '', '', 125000, 0, 0, 1),
(51, 'vubaokhanh', '0211111111#', 'khanh@gmail.com', 'szfas', '', '', '', 455000, 0, 0, 1),
(52, 'vubaokhanh', '0947546007', 'khanhc@gmail.com', '123123', '', '', '', 25000, 0, 0, 1),
(53, 'vubaokhanh', '0947546007', 'vubaokhanh2311@gmail.com', '12313', '', '', '', 540000, 0, 1, 1),
(54, 'vubaokhanh', '1232131', 'admin01@gmail.com', '13131231', '', '', '', 55000, 0, 1, 1),
(55, 'vubaokhanh', '0947546007', 'vubaokhanh2311@gmail.com', '123123', '', '', '', 540000, 0, 1, 1),
(56, 'vubaokhanh', '0947546007', '123', '12312', '', '', '', 35000, 0, 1, 1),
(57, 'vubaokhanh', '12312', '1312312', '12312', '', '', '', 35000, 0, 1, 1),
(58, 'vubaokhanh', '0991231212', '12312', '131231231', '', '', '', 45000, 0, 1, 1),
(59, 'vubaokhanh', '0947546007', 'vubaokhanh2311@gmail.com', '1231231', '', '', '', 45000, 0, 1, 1),
(60, 'vubaokhanh', '0947546007', 'vubaokhanh2311@gmail.com', '1231231', '', '', '', 45000, 0, 1, 1),
(61, 'vubaokhanh', '0947546007', 'vubaokhanh2311@gmail.com', '1231231', '', '', '', 45000, 0, 1, 1),
(62, 'vubaokhanh123', '0947546007', 'vubaokhanh2311@gmail.com', 'ádasdasd', '', '', '', 45000, 0, 1, 1),
(63, 'vubaokhanh', '0947546007', 'khanhc@gmail.com', '12312312', '', '', '', 850000, 0, 1, 1),
(64, 'demo123', '1231231', 'vubaokhanh2311@gmail.com', '12312312', '', '', '', 45000, 0, 1, 1),
(65, 'Khanh123', '12312312', 'khanhxebe2005@gmail.com', '2312312', '', '', '', 45000, 0, 0, 1),
(66, 'vubaokhanh123', '13123123', 'khanhc@gmail.com', '12312312', '', '', '', 45000, 0, 1, 1),
(67, 'Khanh123', '0947546007', 'vubaokhanh2311@gmail.com', '12312312', '', '', '', 45000, 0, 1, 1),
(68, 'vubaokhanh1212212', '0947546007', 'vubaokhanh2311@gmail.com', '123123123', '', '', '', 170000, 0, 0, 1),
(69, 'vubaokhanh1212212', '0947546007', 'vubaokhanh2311@gmail.com', '2312312', '', '', '', 55000, 0, 1, 1),
(70, 'demo123', '0947546007', 'vubaokhanh2311@gmail.com', '123123', '', '', '', 110000, 0, 1, 1),
(71, 'demo123', '0947546007', 'vubaokhanh2311@gmail.com', '13213', '', '', '', 35000, 0, 1, 1),
(72, 'demo123', '0947546007', 'khanhc@gmail.com', 'q323', '', '', '', 35000, 0, 1, 1),
(73, 'vubaokhanh1212212', '0947546007', 'khanh@gmail.com', '12312312', '', '', '', 35000, 0, 1, 1),
(74, 'demo123', '0947546007', 'vubaokhanh2311@gmail.com', 'ưdadaw', '', '', '', 90000, 0, 1, 1),
(75, 'vubaokhanh1212212', '0947546007', 'vubaokhanh2311@gmail.com', 'qưewew', '', '', '', 35000, 0, 1, 1),
(76, 'vubaokhanh1212212', '0947546007', 'admin01@gmail.com', '22312313', '', '', '', 55000, 0, 1, 1),
(77, 'demo123', '0947546007', 'vubaokhanh2311@gmail.com', '123123', '', '', '', 45000, 0, 1, 1),
(78, 'vubaokhanh1212212', '0947546007', 'vubaokhanh2311@gmail.com', '12312312', '', '', '', 45000, 0, 1, 1),
(79, 'vubaokhanh1212212', '0947546007', 'khanhc@gmail.com', '123123123', '', '', '', 45000, 0, 1, 1),
(80, 'vubaokhanh1212212', '0947546007', 'vubaokhanh2311@gmail.com', '123123', '', '', '', 45000, 0, 1, 1),
(81, 'demo123', '0947546007', 'vubaokhanh2311@gmail.com', '12312', '', '', '', 45000, 0, 1, 1),
(82, 'vubaokhanh1212212', '0947546007', 'k@gmail.com', '1231213', '', '', '', 35000, 0, 1, 1),
(83, 'vubaokhanh1212212', '0947546007', 'vubaokhanh2311@gmail.com', '1231231', NULL, NULL, NULL, 555000, 0, 1, 1),
(84, 'demo123', '0947546007', 'k@gmail.com', '3131231', NULL, NULL, NULL, 510000, 0, 0, 1),
(85, 'demo123', '0947546007', 'k@gmail.com', '3131231', NULL, NULL, NULL, 510000, 0, 0, 1),
(86, 'demo123', '0947546007', 'k@gmail.com', '3131231', NULL, NULL, NULL, 510000, 0, 0, 1),
(87, 'demo123', '0947546007', 'k@gmail.com', '3131231', NULL, NULL, NULL, 510000, 0, 0, 1),
(88, 'demo123', '0947546007', 'k@gmail.com', '3131231', NULL, NULL, NULL, 510000, 0, 0, 1),
(89, 'demo123', '0947546007', 'k@gmail.com', '3131231', NULL, NULL, NULL, 510000, 0, 0, 1),
(90, 'demo123', '0947546007', 'k@gmail.com', '3131231', NULL, NULL, NULL, 510000, 0, 0, 1),
(91, 'demo123', '0947546007', 'k@gmail.com', '3131231', NULL, NULL, NULL, 510000, 0, 0, 1),
(92, 'demo123', '0947546007', 'k@gmail.com', '3131231', NULL, NULL, NULL, 510000, 0, 0, 1),
(93, 'demo123', '0947546007', 'k@gmail.com', '3131231', NULL, NULL, NULL, 510000, 0, 0, 1),
(94, 'demo123', '0947546007', 'k@gmail.com', '3131231', NULL, NULL, NULL, 510000, 0, 0, 1),
(95, 'demo123', '0947546007', 'k@gmail.com', '3131231', NULL, NULL, NULL, 510000, 0, 0, 1),
(96, 'demo123', '0947546007', 'k@gmail.com', '3131231', NULL, NULL, NULL, 510000, 0, 0, 1),
(97, 'demo123', '0947546007', 'k@gmail.com', '3131231', NULL, NULL, NULL, 510000, 0, 0, 1),
(98, 'demo123', '0947546007', 'k@gmail.com', '3131231', NULL, NULL, NULL, 510000, 0, 0, 1),
(99, ' Nước ép chai Bưởi', '0947546007', 'khanh@gmail.com', '12312312312', NULL, NULL, NULL, 200000, 0, 0, 1),
(100, ' Nước ép chai Bưởi', '0947546007', 'khanh@gmail.com', '12312312312', NULL, NULL, NULL, 200000, 0, 0, 1),
(101, ' Nước ép chai Bưởi', '0947546007', 'khanh@gmail.com', '12312312312', NULL, NULL, NULL, 200000, 0, 0, 1),
(102, ' Nước ép chai Bưởi', '0947546007', 'khanh@gmail.com', '12312312312', NULL, NULL, NULL, 200000, 0, 0, 1),
(103, ' Nước ép chai Bưởi', '0947546007', 'khanh@gmail.com', '12312312312', NULL, NULL, NULL, 200000, 0, 0, 1),
(104, 'demo123', '0211111111#', 'vubaokhanh2311@gmail.com', '2123', NULL, NULL, NULL, 270000, 0, 0, 1),
(105, 'demo123', '0211111111#', 'vubaokhanh2311@gmail.com', '2123', NULL, NULL, NULL, 270000, 0, 0, 1),
(106, 'vubaokhanh1212212', '0947546007', 'k@gmail.com', '313123', NULL, NULL, NULL, 150000, 0, 0, 1),
(107, 'vubaokhanh1212212', '0947546007', 'k@gmail.com', '313123', NULL, NULL, NULL, 150000, 0, 0, 1),
(108, 'vubaokhanh1212212', '0947546007', 'k@gmail.com', '313123', NULL, NULL, NULL, 150000, 0, 0, 1),
(109, 'vubaokhanh1212212', '0947546007', 'k@gmail.com', '313123', NULL, NULL, NULL, 150000, 0, 0, 1),
(110, 'vubaokhanh1212212', '0947546007', 'k@gmail.com', '313123', NULL, NULL, NULL, 150000, 0, 0, 1),
(111, 'vubaokhanh1212212', '0947546007', 'k@gmail.com', '313123', NULL, NULL, NULL, 150000, 0, 0, 1),
(112, 'vubaokhanh1212212', '0947546007', 'k@gmail.com', '313123', NULL, NULL, NULL, 150000, 0, 0, 1),
(113, 'vubaokhanh1212212', '0947546007', 'k@gmail.com', '313123', NULL, NULL, NULL, 150000, 0, 0, 1),
(114, 'vubaokhanh1212212', '0947546007', 'k@gmail.com', '313123', NULL, NULL, NULL, 150000, 0, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `quantity`, `price`, `date`, `order_id`, `product_id`) VALUES
(25, 1, 35000, NULL, 7, 2),
(26, 1, 25000, NULL, 7, 5),
(27, 1, 25000, NULL, 7, 5),
(28, 1, 35000, NULL, 7, 2),
(29, 1, 45000, NULL, 7, 1),
(30, 2, 45000, NULL, 50, 1),
(31, 1, 35000, NULL, 50, 2),
(32, 13, 35000, NULL, 51, 2),
(33, 1, 25000, NULL, 52, 5),
(34, 12, 45000, NULL, 53, 1),
(35, 1, 55000, NULL, 54, 7),
(36, 12, 45000, NULL, 55, 1),
(37, 1, 35000, NULL, 56, 2),
(38, 1, 35000, NULL, 57, 2),
(39, 1, 45000, NULL, 58, 1),
(40, 1, 45000, NULL, 61, 1),
(41, 1, 45000, NULL, 62, 1),
(42, 15, 45000, NULL, 63, 1),
(43, 5, 35000, NULL, 63, 2),
(44, 1, 45000, NULL, 64, 1),
(45, 1, 45000, NULL, 65, 1),
(46, 1, 45000, NULL, 66, 6),
(47, 1, 45000, NULL, 67, 1),
(48, 2, 45000, NULL, 68, 1),
(49, 1, 45000, NULL, 68, 6),
(50, 1, 35000, NULL, 68, 2),
(51, 1, 55000, NULL, 69, 7),
(52, 2, 55000, NULL, 70, 7),
(53, 1, 35000, NULL, 71, 2),
(54, 1, 35000, NULL, 72, 2),
(55, 1, 35000, NULL, 73, 2),
(56, 2, 45000, NULL, 74, 1),
(57, 1, 35000, NULL, 75, 2),
(58, 1, 55000, NULL, 76, 7),
(59, 1, 45000, NULL, 77, 1),
(60, 1, 45000, NULL, 78, 1),
(61, 1, 45000, NULL, 79, 1),
(62, 1, 45000, NULL, 80, 6),
(63, 1, 45000, NULL, 81, 6),
(64, 1, 35000, NULL, 82, 2),
(65, 12, 35000, NULL, 83, 2),
(66, 3, 45000, NULL, 83, 1),
(67, 13, 35000, NULL, 84, 2),
(68, 13, 35000, NULL, 85, 2),
(69, 13, 35000, NULL, 86, 2),
(70, 13, 35000, NULL, 87, 2),
(71, 13, 35000, NULL, 88, 2),
(72, 13, 35000, NULL, 89, 2),
(73, 13, 35000, NULL, 90, 2),
(74, 13, 35000, NULL, 91, 2),
(75, 13, 35000, NULL, 92, 2),
(76, 13, 35000, NULL, 93, 2),
(77, 13, 35000, NULL, 94, 2),
(78, 13, 35000, NULL, 95, 2),
(79, 13, 35000, NULL, 96, 2),
(80, 13, 35000, NULL, 97, 2),
(81, 13, 35000, NULL, 98, 2),
(82, 1, 55000, NULL, 98, 7),
(83, 1, 35000, NULL, 99, 2),
(84, 1, 35000, NULL, 100, 2),
(85, 1, 35000, NULL, 101, 2),
(86, 1, 35000, NULL, 102, 2),
(87, 1, 35000, NULL, 103, 2),
(88, 3, 35000, NULL, 104, 2),
(89, 3, 35000, NULL, 105, 2),
(90, 3, 55000, NULL, 105, 7),
(91, 3, 35000, NULL, 106, 2),
(92, 3, 35000, NULL, 107, 2),
(93, 3, 35000, NULL, 108, 2),
(94, 3, 35000, NULL, 109, 2),
(95, 3, 35000, NULL, 110, 2),
(96, 3, 35000, NULL, 111, 2),
(97, 3, 35000, NULL, 112, 2),
(98, 3, 35000, NULL, 113, 2),
(99, 3, 35000, NULL, 114, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `summary` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int NOT NULL,
  `category_post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `discount_price` int NOT NULL,
  `date` timestamp NOT NULL,
  `status` tinyint(1) NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `short_description`, `description`, `price`, `discount_price`, `date`, `status`, `category_id`) VALUES
(1, ' Nước ép chai Bưởi', '20250219140223.jpg', 'Nước ép chai Thủy tinh nguyên chất dung tích 310ml, được dung hòa 1-2% đường phèn tùy loại, dùng nguyên chất vẫn giữ nguyên thể tích và giá, có 2-3 viên đá giữ lạnh. Nước ép được ép tưoi hoàn toàn khi khách đặt, không ép trước.', 'Nước ép chai Thủy tinh nguyên chất dung tích 310ml, được dung hòa 1-2% đường phèn tùy loại, dùng nguyên chất vẫn giữ nguyên thể tích và giá, có 2-3 viên đá giữ lạnh. Nước ép được ép tưoi hoàn toàn khi khách đặt, không ép trước.', 45000, 0, '2025-02-13 15:11:03', 1, 1),
(2, 'Nước ép ly Cam + Dứa + Tắc', 'cam-dua-tac.jpg', 'Nước ép ly Cam + Dứa + Tắc', 'Nước ép ly Cam + Dứa + Tắc', 35000, 0, '2025-02-13 16:08:49', 1, 1),
(5, 'Coffee', '20250220190200.jpg', '000', '000', 25000, 0, '2025-02-20 17:00:00', 1, 1),
(6, 'Nước Ép Dâu Tây (Strawberry Juice)', '20250223140205.jpg', '­­Dâu tây giúp tăng cường hệ miễn dịch\r\nHàm lượng vitamin C trong dâu tây cao, giúp hệ miễn dịch được tăng cường và chống oxy hoá rất hiệu quả, từ đó giúp tăng sức đề kháng của cơ thể, phòng chống được nhiều bệnh viêm nhiễm.', '­­Dâu tây giúp tăng cường hệ miễn dịch\r\nHàm lượng vitamin C trong dâu tây cao, giúp hệ miễn dịch được tăng cường và chống oxy hoá rất hiệu quả, từ đó giúp tăng sức đề kháng của cơ thể, phòng chống được nhiều bệnh viêm nhiễm.', 45000, 0, '2025-02-22 17:00:00', 1, 1),
(7, 'Nước ép nho xanh', '20250223150209.jpg', 'Nước ép của Morning Fruit luôn đạt bốn tiêu chí trước khi giao hàng:\r\n1. 100% nguyên chất, không đường, không chất bảo quản\r\n2. 100% tươi mới. Không ép sẵn, chỉ ép khi khách hàng lên đơn\r\n3. Tuyển chọn từ những dòng trái cây tươi có chất lượng cao, đang được bán trực tiếp tại cửa hàng\r\n4. Trọn dinh dưỡng, giữ tối đa dưỡng chất có trong trái vì sử dụng máy ép chậm hiện đại, tiên tiến', 'Nước ép của Morning Fruit luôn đạt bốn tiêu chí trước khi giao hàng:\r\n1. 100% nguyên chất, không đường, không chất bảo quản\r\n2. 100% tươi mới. Không ép sẵn, chỉ ép khi khách hàng lên đơn\r\n3. Tuyển chọn từ những dòng trái cây tươi có chất lượng cao, đang được bán trực tiếp tại cửa hàng\r\n4. Trọn dinh dưỡng, giữ tối đa dưỡng chất có trong trái vì sử dụng máy ép chậm hiện đại, tiên tiến', 55000, 0, '2025-02-22 17:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` int NOT NULL,
  `date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `date`, `status`) VALUES
(11, '2025-02-19', 0),
(12, '2025-02-18', 0),
(13, '2025-02-22', 0),
(14, '2025-02-19', 0),
(15, '2025-02-19', 0),
(16, '2025-02-19', 0),
(17, '2025-02-19', 0),
(18, '2025-02-22', 1),
(19, '2025-02-22', 1),
(20, '2025-02-22', 1),
(21, '2025-02-22', 1),
(22, '2025-02-22', 0),
(23, '2025-02-21', 1),
(24, '2025-02-21', 1),
(25, '2025-02-21', 1),
(26, '2025-02-21', 1),
(27, '2025-02-22', 0),
(28, '2025-02-22', 0),
(29, '2025-02-22', 1),
(30, '2025-02-22', 1),
(31, '2025-02-22', 0),
(32, '2025-02-22', 0),
(33, '2025-02-13', 1),
(34, '2025-02-23', 0),
(35, '2025-02-23', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `purchase_order_items`
--

CREATE TABLE `purchase_order_items` (
  `id` int NOT NULL,
  `purchase_order_id` int NOT NULL,
  `material_id` int NOT NULL,
  `quantity` int NOT NULL,
  `unit_price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `purchase_order_items`
--

INSERT INTO `purchase_order_items` (`id`, `purchase_order_id`, `material_id`, `quantity`, `unit_price`) VALUES
(1, 11, 5, 123123, 1232131231),
(2, 12, 6, 5, 24000),
(3, 13, 6, 2, 12312),
(4, 21, 6, 2, 1232131231),
(5, 22, 6, 2, 1232131231),
(6, 30, 6, 2, 1232131231),
(7, 31, 7, 100, 1000000),
(8, 32, 7, 2, 10000),
(9, 33, 4, 2, 1232131231),
(10, 34, 13, 100, 1000000),
(11, 35, 14, 100, 1000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` int NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `rating` int NOT NULL,
  `created` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recipes`
--

CREATE TABLE `recipes` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `recipes`
--

INSERT INTO `recipes` (`id`, `product_id`, `name`) VALUES
(21, 1, 'NEB'),
(22, 5, 'CF'),
(23, 2, 'CDT'),
(25, 6, 'NED'),
(26, 7, 'NENX');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `role` tinyint(1) DEFAULT '0',
  `google_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `phone`, `email`, `avatar`, `address`, `status`, `role`, `google_id`) VALUES
(1, 'Khanh123', '$2y$10$OUww1qBDmZSJdpl21R/CrO130BzdEu/l9aBswNcKYJKGvikgtq.U.', '0947546007', 'vubaokhanh2311@gmail.com', '20250220050258.jpg', 'KG', 1, 1, '23131'),
(2, 'vubaokhanh', '$2y$10$vojb3VdFj9LTfC7wgj94YuNxDQLEr4IhFtn1bFoHoSMCdifx9KwEu', '0947546007', 'khanh@gmail.com', '20250220050257.jpg', '', 1, 1, NULL),
(5, 'Vũ Bảo Khanh', NULL, NULL, 'khanhvbpc08901@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocJp-6XUr64MZxni4yhEXz_WaRD58zZUA1HTTvlJFCoYiLJ5DA=s96-c', NULL, 1, 1, '101858653560600871779'),
(6, 'Vũ Bảo Khanh', NULL, NULL, 'khanhxebe2005@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocKKBesW0Sr1LuopMwTWlflkrdfJwDWJ15QcQoeSspuA44NhRBA=s96-c', NULL, 1, 1, '100623611536244910992');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vourcher`
--

CREATE TABLE `vourcher` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `unti` int NOT NULL,
  `date_star` date NOT NULL,
  `date_end` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_user` (`user_id`),
  ADD KEY `fk_comment_product` (`product_id`);

--
-- Chỉ mục cho bảng `ingerdients`
--
ALTER TABLE `ingerdients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ingerdients_materials` (`materials_id`),
  ADD KEY `fk_ingerdients_recipes` (`recipes_id`);

--
-- Chỉ mục cho bảng `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kn_inventory_materials` (`material_id`);

--
-- Chỉ mục cho bảng `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_user` (`user_id`),
  ADD KEY `fk_order_payment` (`payment_method_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orderDetails_order` (`order_id`),
  ADD KEY `fk_order_product` (`product_id`);

--
-- Chỉ mục cho bảng `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_user` (`user_id`),
  ADD KEY `fk_post_category_post` (`category_post_id`);

--
-- Chỉ mục cho bảng `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sp_category` (`category_id`);

--
-- Chỉ mục cho bảng `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_purchase_orders_purchase_order_items` (`purchase_order_id`),
  ADD KEY `fk_materials_purchase_order_items` (`material_id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rating_user` (`user_id`),
  ADD KEY `fk_rating_product` (`product_id`);

--
-- Chỉ mục cho bảng `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recipes_product` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vourcher`
--
ALTER TABLE `vourcher`
  ADD KEY `fk_vourcher_user` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ingerdients`
--
ALTER TABLE `ingerdients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comment_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_comment_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `ingerdients`
--
ALTER TABLE `ingerdients`
  ADD CONSTRAINT `fk_ingerdients_materials` FOREIGN KEY (`materials_id`) REFERENCES `materials` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_ingerdients_recipes` FOREIGN KEY (`recipes_id`) REFERENCES `recipes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `kn_inventory_materials` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_orderDetails_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_post_category_post` FOREIGN KEY (`category_post_id`) REFERENCES `post_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_post_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_sp_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  ADD CONSTRAINT `fk_materials_purchase_order_items` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_purchase_orders_purchase_order_items` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fk_rating_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_rating_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `fk_recipes_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `vourcher`
--
ALTER TABLE `vourcher`
  ADD CONSTRAINT `fk_vourcher_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
