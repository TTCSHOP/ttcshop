-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 31, 2020 lúc 05:33 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbbtl`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `advertisement`
--

CREATE TABLE `advertisement` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `dateModified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `advertisement`
--

INSERT INTO `advertisement` (`id`, `name`, `image`, `position`, `dateModified`) VALUES
(5, 'qc1', 'ads3.jpg', 4, '2020-05-26'),
(6, 'qc2', 'ads1.jpg', 5, '2020-05-26'),
(7, 'qc3', 'ad22.jpg', 3, '2020-05-26'),
(8, 'qc4', 'ad4.jpg', 2, '2020-05-26'),
(9, 'qc5', 'ad5.jpg', 2, '2020-05-26'),
(10, 'qc6', 'ad_1.png', 1, '2020-05-26'),
(11, 'qc7', 'ad_2.jpg', 1, '2020-05-26'),
(12, 'qc8', 'ad_3.jpg', 1, '2020-05-26'),
(13, 'qc9', 'ad6.jpg', 1, '2020-05-26'),
(14, 'qc10', 'ad7.jpg', 1, '2020-05-26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dateModified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `dateModified`) VALUES
(1, 'SamSung', '2020-05-26'),
(2, 'Iphone', '2020-05-26'),
(5, 'Xiaomi', '2020-05-26'),
(6, 'Oppo', '2020-05-26'),
(7, 'Vsmart', '2020-05-26'),
(8, 'Huawei', '2020-05-26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `orderID` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `priceEach` int(10) UNSIGNED NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `orderID`, `product_id`, `amount`, `priceEach`, `status`) VALUES
(1, 1, 7, 4, 15900000, 'shipped'),
(2, 1, 7, 4, 15900000, '2020-04-20 10:14:02'),
(3, 1, 2, 2, 71980000, '2020-04-20 10:14:02'),
(4, 17, 2, 2, 71980000, '2020-04-20 10:57:52'),
(5, 18, 1, 1, 29990000, '2020-04-20 14:21:02'),
(6, 19, 3, 1, 11000000, '2020-04-20 15:21:33'),
(7, 20, 1, 1, 29990000, '2020-04-20 15:28:23'),
(8, 21, 1, 23, 59980000, '2020-04-20 15:29:35'),
(9, 21, 2, 23, 71980000, '2020-04-20 15:29:35'),
(10, 21, 3, 2, 11000000, '2020-04-20 15:29:35'),
(13, 23, 2, 1, 35990000, '2020-04-21 01:48:29'),
(14, 24, 1, 2, 59980000, '2020-04-21 01:55:58'),
(15, 25, 2, 4, 71980000, '2020-04-26 11:14:55'),
(16, 25, 1, 48, 39980000, '2020-04-26 11:14:55'),
(17, 25, 3, 2, 11000000, '2020-04-26 11:14:56'),
(18, 25, 5, 3, 74700000, '2020-04-26 11:14:56'),
(19, 25, 4, 1, 23990000, '2020-04-26 11:14:56'),
(20, 26, 1, 1, 19990000, '2020-04-27 04:04:50'),
(21, 25, 1, 1, 39980000, '2020-04-30 11:18:59'),
(22, 28, 2, 20, 639800000, '2020-05-01 06:30:46'),
(23, 29, 2, 1, 31990000, '2020-05-21 15:55:12'),
(24, 29, 1, 1, 25700000, '2020-05-21 15:55:12'),
(25, 38, 1, 1, 25700000, '2020-05-31 10:21:50'),
(26, 38, 2, 1, 31990000, '2020-05-31 10:21:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `dateModified` date NOT NULL,
  `phoneNumber` int(10) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `dateModified`, `phoneNumber`, `address`) VALUES
(1, 12, '2020-04-20', 1234567, 'trung văn'),
(2, 12, '2020-04-20', 975109203, 'Trung Văn- Nam Từ Liêm'),
(3, 12, '2020-04-20', 975109203, 'Trung Văn- Nam Từ Liêm'),
(4, 12, '2020-04-20', 975109203, 'Trung Văn- Nam Từ Liêm'),
(5, 12, '2020-04-20', 975109203, 'Trung Văn- Nam Từ Liêm'),
(6, 12, '2020-04-20', 975109203, 'Trung Văn- Nam Từ Liêm'),
(7, 12, '2020-04-20', 975109203, 'Trung Văn- Nam Từ Liêm'),
(8, 12, '2020-04-20', 975109203, 'Trung Văn- Nam Từ Liêm'),
(9, 12, '2020-04-20', 975109203, 'Trung Văn- Nam Từ Liêm'),
(10, 12, '2020-04-20', 975109203, 'Trung Văn- Nam Từ Liêm'),
(11, 12, '2020-04-20', 975109203, 'Trung Văn- Nam Từ Liêm'),
(12, 12, '2020-04-20', 975109203, 'Trung Văn- Nam Từ Liêm'),
(13, 12, '2020-04-20', 975109203, 'Trung Văn- Nam Từ Liêm'),
(14, 12, '2020-04-20', 975109203, 'Trung Văn- Nam Từ Liêm'),
(15, 12, '2020-04-20', 975109203, 'Trung Văn- Nam Từ Liêm'),
(16, 12, '2020-04-20', 123456789, 'Trung Văn- Nam Từ Liêm'),
(17, 40, '2020-04-20', 986155, 'tuyiuiop'),
(18, 41, '2020-04-20', 956346258, 'ưert'),
(19, 56, '2020-04-20', 12344, 'something'),
(20, 48, '2020-04-20', 964875742, '1234'),
(21, 1, '2020-04-20', 12030203, 'adfadf'),
(22, 12, '2020-04-20', 975109203, 'Trung Văn- Nam Từ Liêm'),
(23, 57, '2020-04-21', 975109203, 'Trung Văn- Nam Từ Liêm'),
(24, 64, '2020-04-21', 975109203, 'Trung Văn- Nam Từ Liêm'),
(25, 67, '2020-04-26', 975109203, 'Trung Văn- Nam Từ Liêm'),
(26, 70, '2020-04-27', 365341179, '38 Dương Quảng Hàm'),
(27, 67, '2020-04-30', 975109203, 'Trung Văn- Nam Từ Liêm'),
(28, 72, '2020-05-01', 123456789, 'Hà Nội'),
(29, 76, '2020-05-21', 964875742, '1234'),
(30, 1, '2020-05-31', 12345678, 'ABC'),
(31, 1, '2020-05-31', 0, '12345'),
(32, 1, '2020-05-31', 123, '123'),
(33, 1, '2020-05-31', 11, '11'),
(34, 1, '2020-05-31', 12, '12'),
(35, 1, '2020-05-31', 0, 'a'),
(36, 1, '2020-05-31', 0, 'b'),
(37, 1, '2020-05-31', 0, 'c'),
(38, 1, '2020-05-31', 11, 'd');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productdetails`
--

CREATE TABLE `productdetails` (
  `id` int(11) UNSIGNED NOT NULL,
  `screen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `camera` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sim` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image3` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isdeleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `productdetails`
--

INSERT INTO `productdetails` (`id`, `screen`, `camera`, `cpu`, `ram`, `rom`, `sim`, `pin`, `image1`, `image2`, `image3`, `youtube`, `isdeleted`) VALUES
(1, 'Dynamic AMOLED 2X, 120Hz(1080p), HDR10+, Gorilla Glass 6, 6.9 inches (3200 x 1440 pixel)', '4 camera zoom 100x', 'Exynos 990 7nm', '12 GB', '256 GB', '2 SIM (Nano-SIM)', '4200 mah.Có sạc nhanh', 's20 ultra_1.png', 's20 ultra_2.png', 's20 ultra_3.png', 'https://www.youtube.com/embed/71lpO1asWcQ', NULL),
(2, 'OLED, 5.8', 'trước: 12 MPsau: 3 camera 12 MP', 'Apple A13 Bionic 6 nhân', '6 GB', '256 GB', '1 eSIM & 1 Nano SIM, Hỗ trợ 4G', '3046 mAh', 'iphone-11-pro_1.png', 'iphone-11-pro_2.png', 'iphone-11-pro_3.png', 'https://www.youtube.com/embed/6ruPEnnr5aw', NULL),
(3, '6.5 inches,IPS LCD', 'sau: Chính 12 MP & Phụ 2 MP, 2 MP\r\ntrước: 8 MP', 'MediaTek Helio P35 8 nhân', '4 GB', '128 GB', '2 SIM (Nano-SIM)', '4230 mAh', 'oppo-a31_1.jpg', 'oppo-a31_2.png', 'oppo-a31_3.jpg', 'https://www.youtube.com/embed/zNeV-', NULL),
(4, '6.58 inches,OLED, Quad HD+ (2K+)', 'sau: Chính 50 MP & Phụ 40 MP,12 MP, TOF 3Dtrước:Chính 32 MP & Phụ IR TOF 3D', 'Kirin 990 8 nhân', '8 GB', '256 GB', '2 SIM (Nano-SIM)', '4200 mah.Sạc nhanh 40W', 'p40-pro-blue.webp', 'xiaomi-redmi-note-8-1.webp', 'p40-pro-silver.jpg', 'https://www.youtube.com/embed/j7RrmxArydA', NULL),
(5, '6.8 inches,Dynamic AMOLED QHD+ Infinity-O\r\n\r\n', 'sau: Chính 12 MP & Phụ 12 MP, 16 MP, TOF 3D\r\ntrước:10 MP', 'Exynos 9825 8 nhân', '12 GB', '256 GB', '2 SIM (Nano-SIM)', '4300 mAh.Có sạc nhanh', 'note_10_plus_den_1.jpg', 'note_10_plus_xanh.jpg', 'note_10_plus_trang_3.jpg', 'https://www.youtube.com/embed/idpYkc6hh8Q', NULL),
(6, '6.5 inches,IPS LCD\r\n', 'sau: Chính 13 MP & Phụ 8 MP, 2 MP\r\ntrước: 8 MP', 'Snapdragon 632 8 nhân', '4 GB', '64 GB', ' 2 Nano SIM, Hỗ trợ 4G', '5000 mAh.Có sạc nhanh', 'vsmart-joy-3-1_1.jpg', 'joy-3_2.jpg', 'vsmart-joy-3-1_3.jpg', 'https://www.youtube.com/embed/w5pWxwDn4TY', NULL),
(7, 'Super AMOLED, 6.4\", HD+', 'sau: Chính 25 MP & Phụ 8 MP, 5 MP\r\ntrước: 16 MP', 'Exynos 7904 8 nhân', '4 GB', '64 GB', ' 2 Nano SIM, Hỗ trợ 4G', '4000 mAh.Có sạc nhanh', 'a30s_1.jpg', 'a30s_2.jpg', 'a30s_3.png', 'https://www.youtube.com/embed/dYK4_fGO4yI', NULL),
(8, 'TFT, 6.5\", HD+', 'sau:	Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP\r\ntrước:	16 MP', 'Snapdragon 665 8 nhân', ' 8 GB', '128 GB', ' 2 Nano SIM, Hỗ trợ 4G', '5000 mAh', 'oppo-a9_1.jpg', 'oppo-a9_2.jpg', 'oppo-a9_3.jpg', 'https://www.youtube.com/embed/nYC5VzVkWok', NULL),
(57, 'Super AMOLED, 6.4\", Full HD+', 'sau: Chính 48 MP & Phụ 8 MP, 5 MP\r\ntrước: 20 MP', 'Exynos 9611 8 nhân', '4 GB', '64 GB', ' 2 Nano SIM, Hỗ trợ 4G', '6000mAh, có sạc nhanh', 'ss-m21-den-1_1.png', 'ss-m21-den-1_2.png', 'ss-m21-den-1_3.png', 'https://www.youtube.com/embed/UpdIKdPgcKE', NULL),
(68, '11', '11', '11', '11', '11', '11', '11', '681px-Interactive_icon.svg.png', '681px-Interactive_icon.svg.png', '681px-Interactive_icon.svg.png', '11', 1),
(69, 'dfghjkl', 'fghjkl', 'cc', 'fvgnm,', 'sdfghjk', 'kj', 'sdfgnm', '91860170_2879564685446560_4334066157116981248_o.jpg', '91860170_2879564685446560_4334066157116981248_o.jpg', '91860170_2879564685446560_4334066157116981248_o.jpg', 'aszdxfcgvhbjnkbbg', 1),
(70, '6.47 inches Amoled  1920 x 1080 pixels', '64 MP, f/1.9, 26mm (wide), 1/1.72', '	Octa-core (2x2.2 GHz Kryo 470 Gold & 6x1.8 GHz Kryo 470 Silver)', '6 GB', '64 GB', '2 sim', 'Li-Po 5260 mAh battery', 'mi-note-10-lite_2jpg.jpg', 'mi-note-10-lite_1.jpg', 'mi-note-10-lite_3_1.jpg', '', NULL),
(71, '1', '1', '1', '1', '1', '1', '1', '87384696_3528760760530573_6181668960807682048_n.jpg', '87384696_3528760760530573_6181668960807682048_n.jpg', '87384696_3528760760530573_6181668960807682048_n.jpg', '1', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `brief description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dateModified` date NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantityInStock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `brief description`, `image`, `dateModified`, `category`, `quantityInStock`) VALUES
(1, 'Samsung Galaxy S20 Ultra', 25700000, 'Tặng kèm galaxy buds+, bảo hành 1 đổi 1 12 tháng', 'phone1.jpeg', '2020-04-23', 'SamSung', 16),
(2, 'iPhone 11 Pro 256GB  Chính hãng', 31990000, 'Giảm 200.000đ khi mua kèm tai nghe airpods và bảo hành 12 tháng 1 đổi 1', 'phone2.jpg', '2020-04-23', 'Iphone', 12),
(3, 'Oppo A31', 3790000, 'Bảo hành 12 tháng 1 đổi 1', 'phone3.jpg', '2020-04-23', 'Oppo', 24),
(4, ' Huawei P40 Pro', 21990000, 'Tặng pin sạc dự phòng anker powercore 20000mah pd a1275', 'huaweipro40.jpg', '2020-04-23', 'Huawei', 16),
(5, 'Samsung Galaxy Note 10+', 23600000, 'Tặng galaxy buds+ bảo hành 1 đổi 1 12 tháng', 'phone5.jpeg', '2020-04-23', 'SamSung', 10),
(6, 'Vsmart Joy 3', 3300000, 'Tặng sim 4g mobifone c90n 4gb/ngày', 'phone6.jpg', '2020-04-23', 'Vsmart', 18),
(7, 'Samsung Galaxy A30s', 5300000, 'Tặng sim 4g mobifone c90n 4gb/ngày', 'phone7.jpeg', '2020-04-23', 'SamSung', 24),
(8, 'Oppo A9', 5990000, 'Tặng sim 4g mobifone c90n 4gb/ngày\r\n', 'oppoa9.jpg', '2020-04-23', 'Oppo', 12),
(57, 'Samsung Galaxy M21', 5490000, 'Tặng sạc dự phòng Samsung 10000 mah', 'phone7.jpeg', '2020-04-23', 'SamSung', 11),
(68, '11', 11, '11', '681px-Interactive_icon.svg.png', '2020-05-01', 'SamSung', -1),
(69, '0975109203', 1111, 'dfghjk', '91860170_2879564685446560_4334066157116981248_o.jpg', '2020-05-18', 'SamSung', -1),
(70, 'Mi Note 10 Lite', 8250000, 'Hotsales từ 23/5 - 24/5: Giảm sốc chỉ còn 7.750.000đ (số lượng có hạn, không áp dụng cùng chương trình khác)', 'mi-note-10-lite_1.jpg', '2020-05-21', 'Xiaomi', 10),
(71, 'abc', 1, '1', '87384696_3528760760530573_6181668960807682048_n.jpg', '2020-05-26', 'SamSung', -1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateModified` date NOT NULL,
  `authorization` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `dateModified`, `authorization`) VALUES
(1, 'ngatrinh', 'ttntrinhnga@gmail.com', 'ngatrinh', '2020-04-06', ''),
(9, 'nga', 'ttntrinhoanh@gmail.com', '12345', '2020-04-08', ''),
(10, 'nga', 'ttntrinhN@gmail.com', '12', '2020-04-08', '1'),
(11, 'nga', 'ttntrinhO@gmail.com', '123', '2020-04-08', '1'),
(12, 'oanh', 'ttntrinhOanh0804@gmail.com', '123', '2020-04-08', '1'),
(13, 'nga', 'ttntrinhDAI@gmail.com', '123', '2020-04-08', '1'),
(14, 'nga', 'ttntrinhMN@gmail.com', '123', '2020-04-08', '1'),
(15, '', 'abc@gmail.com', '12345', '2020-04-13', '1'),
(16, '', 'cdf@gmail.com', '12345', '2020-04-13', '1'),
(17, '', 'hab@gmail.com', '123456', '2020-04-14', '1'),
(18, '', 'hbd@gmail.com', '12345', '2020-04-14', '1'),
(19, '', 'abcd@gmail.com', '12345', '2020-04-14', '1'),
(20, '', '123@gmail.com', '12345', '2020-04-14', '1'),
(21, '', 'ttntrinhnga@gmail.com12345', '1234', '2020-04-14', '1'),
(22, '', '123456@gmail.com', '12345', '2020-04-14', '1'),
(23, '', '09@gmail.com', '1234', '2020-04-14', '1'),
(24, '', '12@gmail.com', '123', '2020-04-14', '1'),
(25, '', '000@gmail.com', '0000', '2020-04-14', '1'),
(26, '', '099@gmail.com', '0000', '2020-04-14', '1'),
(27, '', 'ttnTTN@gmail.com', '111', '2020-04-14', '1'),
(28, '', 'ttnTTO@gmail.com', '111', '2020-04-14', '1'),
(29, '', 'TTN@gmail.com', '111', '2020-04-14', '1'),
(30, '', '1111@gmail.com', '1111', '2020-04-14', '1'),
(31, '', 'abcdef@gmail.com', '111', '2020-04-14', '1'),
(32, '', '', '', '2020-04-14', '1'),
(33, '', 'nga@gmail.com', '1234', '2020-04-14', '1'),
(34, '', 'Oanh0804@gmail.com', '12345', '2020-04-14', '1'),
(35, '', '123nga@gmail.com', '12345', '2020-04-14', '1'),
(36, '', 'ga1111@gmail.com', '11111111', '2020-04-14', '1'),
(37, '', 'ttntrinh1111@gmail.com', '11111111', '2020-04-14', '1'),
(38, 'nga', 'oanhtrinhthi@gmail.com', '11111111', '2020-04-17', '1'),
(39, 'nguyvotien', 'nguyvt@gmail.com', '123456', '2020-04-17', '1'),
(40, 'toilaideptrai', '190010khongco@gmail', '<6', '2020-04-20', '1'),
(41, 'Nga ngu người', 'aaaa@gmail.com', '111111', '2020-04-20', '1'),
(42, 'Vũ Thị Trang', 'vuthitrang2772000@gmail.com', '2772000a3', '2020-04-20', '1'),
(43, 'vanhung', 'hungganhh19@gmail.com', 'th06012000', '2020-04-20', '1'),
(44, 'Thảo Hoàng', 'hoangthithao11a3@gmail.com', 'thao11032000', '2020-04-20', '1'),
(45, 'Anhariana', 'sehunanh19112000@gmail.com', '19112000', '2020-04-20', '1'),
(46, 'Trần Nam', 'namtranpt00@gmail.com', '123456', '2020-04-20', '1'),
(47, 'hoangvu', 'hoangvu@gmail.com', '0987816718', '2020-04-20', '1'),
(48, 'besttv1123', 'tranmanhduc0964875742@gmail.com', 'thuyduyen_03', '2020-04-20', '1'),
(49, 'lecuong', 'lecuong@gmail.com', '1111111', '2020-04-20', '1'),
(50, 'ngoclyo', 'ngoclyo@gmail.com', '1111111', '2020-04-20', '1'),
(51, 'sophie', 'sophie@gmail.com', '1111111', '2020-04-20', '1'),
(52, 'lyo', 'lyo@gmail.com', '1111111', '2020-04-20', '1'),
(53, 'aaaa', '180@gmail.com', '11111111', '2020-04-20', '1'),
(54, '18020943', '18020943@gmail.com', '11111111', '2020-04-20', '1'),
(55, 'Nga Ngu Người Dở Hơi Tập Bơi', 'lan@gmail.com', '111111', '2020-04-20', '1'),
(56, 'occhos', 'someone@gmail.com', '12345678', '2020-04-20', '1'),
(57, 'nga', 'ngasophie@gmail.com', '1111111', '2020-04-21', '1'),
(58, 'nga', 'ttnsophie@gmail.com', '1111111', '2020-04-21', '1'),
(59, 'nga', '18020943vnu@gmail.com', '11111111', '2020-04-21', '1'),
(60, 'ngatrinhthi', 'ngatrinhthi@gmail.com', '11111111', '2020-04-21', '1'),
(61, 'ngatrinhthi', 'dddd@gmail.com', '11111111', '2020-04-21', '1'),
(62, 'nga', 'hhhh@gmail.com', '1111111', '2020-04-21', '1'),
(63, '18020943', '18020943nga@gmail.com', '1111111', '2020-04-21', '1'),
(64, '18020943', 'llllll@gmail.com', '1111111', '2020-04-21', '1'),
(65, 'Nga', 'abcddd@gmail.com', '1234567', '2020-04-21', '1'),
(66, 'nga', 'ngatrinh164@gmail.com', 'ngatrinh164', '2020-04-21', '1'),
(67, 'Nga', 'ttntrinhnga@gmail.com', 'ngatrinh', '2020-04-23', '0'),
(68, 'Hà', 'qqqq@ffff.com', '11111111', '2020-04-26', '1'),
(69, 'Nam Trần', 'namtranpt00@gmail.com', 'ttcadmin', '2020-04-26', '0'),
(70, 'fasfhjkaf', 'thaidhns23@gmail.com', 'thai2305', '2020-04-27', '1'),
(71, 'Trần Mạnh Đức', 'tranducpo@gmail.com', 'ttcadmin', '2020-05-01', '0'),
(72, 'diazzz', 'daluffyu@yahoo.com', '123456', '2020-05-01', '1'),
(75, '18021198', 'tabitabi305@gmail.com', '123456', '2020-05-13', '1'),
(76, 'besttv1123', 'duc@gmail.com', '1111111', '2020-05-21', '1'),
(77, 'Teacher', 'csdl@gmail.com', 'ttcadmin', '2020-05-21', '0');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `PK` (`name`) USING BTREE;

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `productID` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`user_id`);

--
-- Chỉ mục cho bảng `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderID` FOREIGN KEY (`orderID`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productID` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `userID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `productdetails`
--
ALTER TABLE `productdetails`
  ADD CONSTRAINT `product_details` FOREIGN KEY (`id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
