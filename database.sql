-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 17, 2023 lúc 04:03 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `du_an_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'0' COMMENT '1 là đã đặt hàng'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `variant_id`, `quantity`, `status`) VALUES
(53, 35, 48, 1, b'1'),
(54, 35, 49, 2, b'1'),
(55, 35, 50, 2, b'1'),
(56, 35, 51, 3, b'1'),
(57, 35, 52, 3, b'1'),
(58, 35, 53, 3, b'1'),
(66, 35, 61, 1, b'1'),
(67, 35, 62, 1, b'1'),
(69, 35, 64, 1, b'1'),
(70, 35, 65, 1, b'1'),
(151, 35, 146, 4, b'1'),
(152, 35, 147, 5, b'1'),
(155, 35, 150, 10, b'1'),
(161, 35, 156, 2, b'1'),
(162, 35, 157, 1, b'1'),
(163, 35, 158, 1, b'1'),
(167, 36, 162, 6, b'1'),
(170, 36, 165, 1, b'1'),
(172, 35, 167, 3, b'1'),
(173, 35, 168, 4, b'1'),
(177, 36, 172, 3, b'1'),
(178, 36, 173, 1, b'1'),
(179, 36, 174, 1, b'1'),
(180, 35, 175, 3, b'1'),
(185, 40, 180, 5, b'1'),
(186, 35, 181, 5, b'0'),
(188, 35, 183, 8, b'0'),
(189, 35, 184, 8, b'0'),
(190, 35, 185, 8, b'0'),
(192, 18, 187, 1, b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'T-Shirts'),
(2, 'Polos'),
(3, ' Hoodies'),
(4, 'Jackets'),
(11, 'Shorts'),
(12, ' Pants'),
(13, 'áo cà sa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--
-- Error reading structure for table du_an_1.category: #1932 - Table &#039;du_an_1.category&#039; doesn&#039;t exist in engine
-- Error reading data for table du_an_1.category: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `du_an_1`.`category`&#039; at line 1

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `color_id` int(10) NOT NULL COMMENT 'color id',
  `color_name` varchar(50) NOT NULL COMMENT 'color name'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`color_id`, `color_name`) VALUES
(1, 'Yellow'),
(2, 'Gray'),
(3, 'Black'),
(4, 'Brown');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `user_id`, `product_id`) VALUES
(1, 'sản phẩm tốt', 35, 38),
(2, 'sản phảm tốt', 36, 37),
(3, 'sản phẩm tốt\r\n', 35, 72),
(4, 'san pham chat luowngj', 35, 71),
(5, 'co\'', 35, 71),
(6, 'fahafhsf', 35, 72),
(7, 'sanr phamr chat luowng', 35, 72),
(8, 'sản phẩm chất  lượng', 18, 72),
(9, '', 18, 72),
(10, 'fsdddffffffffffffffffffffffffYour email address will not be published. Required fields are marked *Your email address will not be published. Required fields are marked *Your email address will not be published. Required fields are marked *Your email address will not be published. Required fields are marked *Your email address will not be published. Required fields are marked *Your email address will not be published. Required fields are marked *Your email address will not be published. Required fields are marked *Your email address will not be published. Required fields are marked *Your email address will not be published. Required fields are marked *Your email address will not be published. Required fields are marked *Your email address will not be published. Required fields are marked *Your email address will not be published. Required fields are marked *Your email address will not be published. Required fields are marked *Your email address will not be published. Required fields are marked *Your email address will not be published. Required fields are marked *', 18, 72),
(11, '124234234234', 18, 72),
(12, '-**!&U###$', 18, 72);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `email` varchar(50) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subject` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`email`, `name`, `subject`, `message`, `id`) VALUES
('huynvph30433@fpt.edu.vn', 'nguyễn văn huy', 'áo', 'áo tôi chưa được giao', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `details`
--
-- Error reading structure for table du_an_1.details: #1932 - Table &#039;du_an_1.details&#039; doesn&#039;t exist in engine
-- Error reading data for table du_an_1.details: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `du_an_1`.`details`&#039; at line 1

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `img_id` int(10) NOT NULL COMMENT 'id ảnh',
  `img_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên ảnh',
  `product_id` int(11) NOT NULL COMMENT 'id sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`img_id`, `img_name`, `product_id`) VALUES
(192, '1259301620_6_1_1.jpg', 37),
(193, '1259301620_6_3_1.jpg', 37),
(194, '1259301620_2_4_1.jpg', 37),
(197, '0962310710_6_1_1.jpg', 38),
(198, '0962310710_6_3_1.jpg', 38),
(199, '0962310710_2_4_1.jpg', 38),
(200, '3665301022_6_1_1.jpg', 39),
(201, '3665301022_6_3_1.jpg', 39),
(202, '3665301022_2_2_1.jpg', 39),
(203, '3992325183_6_1_1.jpg', 40),
(204, '3992325183_2_1_1.jpg', 40),
(205, '3992325183_2_2_1.jpg', 40),
(206, '4877248922_6_1_1.jpg', 41),
(207, '4877248922_2_2_1.jpg', 41),
(208, '4877248922_2_1_1.jpg', 41),
(209, '6427104800_6_1_1.jpg', 42),
(210, '6427104800_2_1_1.jpg', 42),
(211, '6427104800_1_1_1.jpg', 42),
(212, '4729300802_6_1_1.jpg', 44),
(213, '4729300802_1_1_1.jpg', 44),
(214, '4729300802_2_3_1.jpg', 44),
(217, '0761350251_6_1_1.jpg', 57),
(218, '0761350251_2_2_1.jpg', 57),
(219, '0761350251_2_1_1.jpg', 57),
(228, '6462426711_6_1_1.jpg', 43),
(234, '6462426711_2_2_1.jpg', 43),
(235, '6462426711_2_1_1.jpg', 43),
(236, '4729302707_6_1_1.jpg', 58),
(237, '4729302707_2_2_1.jpg', 58),
(238, '4729302707_1_1_1.jpg', 58),
(239, '0962328044_6_1_1.jpg', 59),
(240, '0962328044_2_4_1.jpg', 59),
(241, '0962328044_2_3_1.jpg', 59),
(242, '0962328044_2_2_1.jpg', 59),
(247, '5320425700_6_1_1.jpg', 61),
(248, '5320425700_6_3_1.jpg', 61),
(249, '5320425700_2_2_1.jpg', 61),
(250, '5320425700_1_1_1.jpg', 61),
(251, '7505300413_6_1_1.jpg', 62),
(252, '7505300413_2_1_1.jpg', 62),
(253, '7505300413_2_5_1.jpg', 62),
(254, '7505300413_2_6_1.jpg', 62),
(255, '3427320800_6_1_1.jpg', 63),
(256, '3427320800_2_2_1.jpg', 63),
(257, '3427320800_2_4_1.jpg', 63),
(258, '3427320800_1_1_1.jpg', 63),
(259, '0706304420_6_1_1.jpg', 64),
(260, '0706304420_2_4_1.jpg', 64),
(261, '0706304420_2_2_1.jpg', 64),
(262, '0706304420_2_1_1.jpg', 64),
(263, '0761439621_6_1_1.jpg', 65),
(264, '0761439621_2_2_1.jpg', 65),
(265, '0761439621_2_4_1.jpg', 65),
(266, '0761439621_1_1_1.jpg', 65),
(267, '2634309802_6_1_1.jpg', 66),
(268, '2634309802_6_2_1.jpg', 66),
(269, '2634309802_6_3_1.jpg', 66),
(270, '0722317401_6_1_1.jpg', 67),
(271, '0722317401_2_4_1.jpg', 67),
(272, '0722317401_2_2_1.jpg', 67),
(273, '0722317401_1_1_1.jpg', 67),
(274, '5575376445_6_1_1.jpg', 68),
(275, '5575376445_2_2_1.jpg', 68),
(276, '5575376445_2_4_1.jpg', 68),
(277, '5575376445_1_1_1.jpg', 68),
(286, '7948773500_6_1_1.jpg', 71),
(287, '7948773500_2_3_1.jpg', 71),
(288, '7948773500_2_2_1.jpg', 71),
(289, '7948773500_2_1_1.jpg', 71),
(294, '4391304515_6_2_1.jpg', 69),
(295, '4391304515_2_3_1.jpg', 69),
(296, '4391304515_2_5_1.jpg', 69),
(297, '4391304515_1_1_1.jpg', 69),
(298, '3918600401_6_1_1.jpg', 60),
(299, '3918600401_2_6_1.jpg', 60),
(301, '3918600401_1_1_1.jpg', 60),
(302, '4391304515_6_2_1.jpg', 70),
(303, '4391304515_2_3_1.jpg', 70),
(304, '4391304515_2_5_1.jpg', 70),
(305, '4391304515_1_1_1.jpg', 70),
(328, '3918600401_6_1_1.jpg', 72),
(329, '3918600401_2_6_1.jpg', 72),
(330, '3918600401_2_3_1.jpg', 72),
(331, '3918600401_1_1_1.jpg', 72);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL COMMENT 'ngày đặt hàng',
  `order_status` bit(1) NOT NULL COMMENT '1 là đã sãn sàng 0 là ',
  `user_id` int(11) NOT NULL COMMENT 'khóa ngoi với bảng user\r\n',
  `total_price` int(12) NOT NULL COMMENT 'tổng tiền',
  `address` text NOT NULL COMMENT 'địa chỉ',
  `note` text NOT NULL COMMENT 'chú thích',
  `shipping` int(11) NOT NULL DEFAULT 0 COMMENT 'phí giao hàng'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `order_status`, `user_id`, `total_price`, `address`, `note`, `shipping`) VALUES
(17, '2023-08-03', b'1', 35, 3017000, 'hanoi tr??ng chinh', 'giao nhanh cho tôi', 20000),
(43, '2023-08-09', b'1', 36, 7515000, 'dâdas tr??ng chinh', 'saaadasda', 20000),
(44, '2023-08-10', b'0', 35, 6313000, 'hanoi tr??ng chinh', 'tôi không th? nh?n hàng vào ch?  nh?t', 20000),
(45, '2023-08-18', b'1', 40, 5015000, 'hanoi tr??ng chinh', 'Boc ky hang', 20000),
(46, '2023-12-01', b'1', 18, 990000, 'adada adad', 'adada', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_carts`
--

CREATE TABLE `order_carts` (
  `order_id` int(11) NOT NULL COMMENT 'các rows có order_id bằng nhau thì trong 1 hóa đơn',
  `cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `order_carts`
--

INSERT INTO `order_carts` (`order_id`, `cart_id`) VALUES
(17, 172),
(43, 177),
(43, 178),
(43, 179),
(44, 173),
(44, 180),
(45, 185),
(46, 192);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `date_added` date NOT NULL COMMENT 'ngày nhập kho',
  `quantity` int(11) NOT NULL,
  `sold` int(11) NOT NULL COMMENT 'đã bán'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `name`, `description`, `price`, `date_added`, `quantity`, `sold`) VALUES
(37, 1, 'T-SHIRT WITH CONTRAST SLOGAN', 'COMPOSITION, CARE & ORIGIN\nCOMPOSITION\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\nOUTER SHELL\n100% cotton\nCARE\nCaring for your clothes is caring for the environment.\nLower temperature washes and delicate spin cycles are gentler on garments and help to protect the colour, shape and structure of the fabric. Furthermore, they reduce the amount of energy used in care processes.', 799000, '2023-07-23', 170, 7),
(38, 1, 'CONTRAST TEXTURED T-SHIRT', 'COMPOSITION, CARE & ORIGIN\r\nCOMPOSITION\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\nOUTER SHELL\r\nMAIN FABRIC\r\n100% polyester\r\nSECONDARY FABRIC\r\n98% cotton\r\n2% elastane\r\nWhich contains at least:\r\nOUTER SHELL\r\n80% RCS certified recycled polyester\r\nCERTIFIED MATERIALS\r\nRCS CERTIFIED RECYCLED POLYESTER\r\nNowadays, recycled polyester is mainly made from PET plastic waste. This is a type of plastic that is widely used in a variety of items, such as plastic bottles. Using recycled materials helps limit the production of virgin polyester fibre. It is certified to the Recycled Content Standard (RCS), which verifies the recycled content and tracks it from source to final product.\r\n\r\nCARE\r\nCaring for your clothes is caring for the environment.\r\nLower temperature washes and delicate spin cycles are gentler on garments and help to protect the colour, shape and structure of the fabric. Furthermore, they reduce the amount of energy used in care processes.', 999000, '2023-07-24', 9, 0),
(39, 1, 'TULLE T-SHIRT WITH ABSTRACT PRINT', 'COMPOSITION, CARE & ORIGIN\r\nCOMPOSITION\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\nOUTER SHELL\r\n91% polyester\r\n9% elastane\r\nWhich contains at least:\r\nOUTER SHELL\r\n50% RCS certified recycled polyester\r\nCERTIFIED MATERIALS\r\nRCS CERTIFIED RECYCLED POLYESTER\r\nNowadays, recycled polyester is mainly made from PET plastic waste. This is a type of plastic that is widely used in a variety of items, such as plastic bottles. Using recycled materials helps limit the production of virgin polyester fibre. It is certified to the Recycled Content Standard (RCS), which verifies the recycled content and tracks it from source to final product.', 799000, '2023-07-24', 43, 0),
(40, 2, 'TEXTURED POLO SHIR', 'COMPOSITION, CARE & ORIGIN\r\nCOMPOSITION\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\nOUTER SHELL\r\n70% cotton\r\n25% polyester\r\n5% elastane\r\nCARE\r\nCaring for your clothes is caring for the environment.\r\nLower temperature washes and delicate spin cycles are gentler on garments and help to protect the colour, shape and structure of the fabric. Furthermore, they reduce the amount of energy used in care processes.', 1299000, '2023-07-24', 21, 0),
(41, 2, 'LINEN POLO COLLAR BLOUSE', 'COMPOSITION, CARE & ORIGIN\nCOMPOSITION\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\nOUTER SHELL\n100% linen\nWhich contains at least:\nOUTER SHELL\n100% certified European grown linen\nCERTIFIED MATERIALS\nCERTIFIED EUROPEAN GROWN LINEN\nEuropean-grown flax-linen is grown without using genetically modified seeds and limiting the use of pesticides and fertilizers. It is produced in Western Europe and traced along the value chain, according to the EUROPEAN FLAX™ standard of the  Alliance for European Flax-Linen and Hemp.\nCARE\nCaring for your clothes is caring for the environment.\nLower temperature washes and delicate spin cycles are gentler on garments and help to protect the colour, shape and structure of the fabric. Furthermore, they reduce the amount of energy used in care processes.', 1299000, '2023-07-24', 21, 0),
(42, 2, 'POINTELLE KNIT OVERSIZE POLO SWEATER', 'COMPOSITION, CARE & ORIGIN\r\n\r\nCOMPOSITION\r\n\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\n\r\nOUTER SHELL\r\n57% cotton\r\n\r\n43% polyester\r\n\r\n<h4>CARE</h4>\r\nCaring for your clothes is caring for the environment.\r\nLower temperature washes and delicate spin cycles are gentler on garments and help to protect the colour, shape and structure of the fabric. Furthermore, they reduce the amount of energy used in care processes.', 999000, '2023-07-24', 33, 0),
(43, 2, 'TEXTURED POLO SHIRT', 'COMPOSITION, CARE & ORIGIN\r\nCOMPOSITION\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\nOUTER SHELL\r\nMAIN FABRIC\r\n100% cotton\r\nSECONDARY FABRIC\r\n96% cotton\r\n4% elastane\r\nCOLLAR\r\n97% cotton\r\n2% polyester\r\n1% elastane\r\nCARE\r\nCaring for your clothes is caring for the environment.\r\nLower temperature washes and delicate spin cycles are gentler on garments and help to protect the colour, shape and structure of the fabric. Furthermore, they reduce the amount of energy used in care processes.', 899000, '2023-07-24', 48, 0),
(44, 3, 'OVERSIZE HOODIE', 'COMPOSITION, CARE & ORIGIN\r\nCOMPOSITION\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\nOUTER SHELL\r\nMAIN FABRIC\r\n83% cotton\r\n3% elastane\r\n14% polyester\r\nSECONDARY FABRIC\r\n97% cotton\r\n3% elastane\r\nLINING\r\n83% cotton\r\n14% polyester\r\n3% elastane\r\nWhich contains at least:\r\nOUTER SHELL\r\n15% RCS certified recycled cotton\r\nCERTIFIED MATERIALS\r\nRCS CERTIFIED RECYCLED COTTON\r\nThis fibre is made from recycled cotton textile waste. Using recycled materials helps limit the consumption of raw materials. It is certified to the Recycled Content Standard (RCS), which verifies the recycled content and tracks it from source to final product.', 1199000, '2023-07-24', 33, 0),
(57, 3, 'HOODIE made of cotton', 'COMPOSITION, CARE & ORIGIN\r\nCOMPOSITION\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\nOUTER SHELL\r\nMAIN FABRIC\r\n63% cotton\r\n37% polyester\r\nDETAILS\r\n99% cotton\r\n1% elastane\r\nLINING\r\n63% cotton\r\n37% polyester\r\nWhich contains at least:\r\nOUTER SHELL\r\n15% RCS certified recycled cotton\r\nCERTIFIED MATERIALS\r\nRCS CERTIFIED RECYCLED COTTON\r\nThis fibre is made from recycled cotton textile waste. Using recycled materials helps limit the consumption of raw materials. It is certified to the Recycled Content Standard (RCS), which verifies the recycled content and tracks it from source to final product.\r\n\r\nCARE\r\nCaring for your clothes is caring for the environment.\r\nLower temperature washes and delicate spin cycles are gentler on garments and help to protect the colour, shape and structure of the fabric. Furthermore, they reduce the amount of energy used in care processes.', 1199000, '2023-08-02', 60, 6),
(58, 3, 'HOODIE Sleeveless loose-fitting hoodie', 'COMPOSITION, CARE & ORIGIN\r\nCOMPOSITION\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\nOUTER SHELL\r\nMAIN FABRIC\r\n83% cotton\r\n3% elastane\r\n14% polyester\r\nSECONDARY FABRIC\r\n97% cotton\r\n3% elastane\r\nLINING\r\n83% cotton\r\n14% polyester\r\n3% elastane\r\nWhich contains at least:\r\nOUTER SHELL\r\n15% RCS certified recycled cotton\r\nCERTIFIED MATERIALS\r\nRCS CERTIFIED RECYCLED COTTON\r\nThis fibre is made from recycled cotton textile waste. Using recycled materials helps limit the consumption of raw materials. It is certified to the Recycled Content Standard (RCS), which verifies the recycled content and tracks it from source to final product.\r\n\r\nCARE\r\nCaring for your clothes is caring for the environment.\r\nLower temperature washes and delicate spin cycles are gentler on garments and help to protect the colour, shape and structure of the fabric. Furthermore, they reduce the amount of energy used in care processes.', 999000, '2023-08-02', 33, 0),
(59, 3, 'WASHED EFFECT HOODIE', 'COMPOSITION, CARE & ORIGIN\r\nCOMPOSITION\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\nOUTER SHELL\r\nMAIN FABRIC\r\n65% cotton\r\n35% polyester\r\nSECONDARY FABRIC\r\n98% cotton\r\n2% elastane\r\nLINING\r\n65% cotton\r\n35% polyester\r\nCARE\r\nCaring for your clothes is caring for the environment.\r\nLower temperature washes and delicate spin cycles are gentler on garments and help to protect the colour, shape and structure of the fabric. Furthermore, they reduce the amount of energy used in care processes.', 1299000, '2023-08-02', 23, 0),
(60, 4, 'VINYL EFFECT BOMBER JACKET', 'COMPOSITION, CARE & ORIGIN\r\nCOMPOSITION\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\nOUTER SHELL\r\nBASE FABRIC\r\n79% viscose\r\n5% cotton\r\n2% other fibres\r\n14% polyester\r\nCOATING\r\n100% polyurethane\r\nLINING\r\n100% polyester\r\nFILLING\r\n100% polyester\r\nCARE\r\nCaring for your clothes is caring for the environment.\r\nTo keep your jackets and coats clean, you only need to freshen them up and go over them with a cloth or a clothes brush. This process is more gentle on fabrics and also reduces water and energy consumption when washing.', 799000, '2023-08-02', 78, 1),
(61, 4, 'TECHNICAL JACKET', 'COMPOSITION, CARE & ORIGIN\r\nCOMPOSITION\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\nOUTER SHELL\r\n60% cotton\r\n40% polyamide\r\nLINING\r\n65% polyester\r\n35% cotton\r\nFILLING\r\n100% polyester\r\nWhich contains at least:\r\nOUTER SHELL\r\n40% RCS certified recycled polyamide\r\nFILLING\r\n100% RCS certified recycled polyester filling\r\nCERTIFIED MATERIALS\r\nRCS CERTIFIED RECYCLED POLYAMIDE\r\nThis fibre is made from polyamide waste recovered from other productions and other waste products, such as fishing nets. Transforming waste into new materials helps limit the extraction of raw materials. It is certified to the Recycled Content Standard (RCS), which verifies the recycled content and tracks it from source to final product.\r\n\r\nRCS CERTIFIED RECYCLED POLYESTER FILLING\r\nThis fibre can be used as filling. It is mainly made from PET plastic waste, which is type of plastic widely used in various type of products. This process helps limit the production of virgin polyester fibre. It is certified to the Recycled Content Standard (RCS), which verifies the recycled content and tracks it from source to final product.', 1999000, '2023-08-02', 21, 0),
(62, 4, 'JACKET WITH CONTRAST TOPSTITCHING', 'COMPOSITION, CARE & ORIGIN\r\nCOMPOSITION\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\nOUTER SHELL\r\n100% cotton\r\nWhich contains at least:\r\nOUTER SHELL\r\n50% OCS certified organically grown cotton\r\nCERTIFIED MATERIALS\r\nOCS CERTIFIED ORGANICALLY GROWN COTTON\r\nThis fibre is produced using no artificial fertilisers or pesticides and is grown from seeds that have not been genetically modified. We are currently working with the Organic Content Standard (OCS) that monitors the process from the source to the end product.\r\n\r\nCARE\r\nCaring for your clothes is caring for the environment.\r\nTo keep your jackets and coats clean, you only need to freshen them up and go over them with a cloth or a clothes brush. This process is more gentle on fabrics and also reduces water and energy consumption when washing.', 1999000, '2023-08-02', 50, 0),
(63, 4, 'FAUX LEATHER JACKET', 'COMPOSITION, CARE & ORIGIN\r\nCOMPOSITION\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\nOUTER SHELL\r\nBASE FABRIC\r\n100% polyester\r\nCOATING\r\n100% polyurethane\r\nLINING\r\n100% polyester\r\nCARE\r\nCaring for your clothes is caring for the environment.\r\nTo keep your jackets and coats clean, you only need to freshen them up and go over them with a cloth or a clothes brush. This process is more gentle on fabrics and also reduces water and energy consumption when washing.', 2199000, '2023-08-02', 66, 0),
(64, 4, 'SATIN JACKET WITH EMBROIDERED SLOGAN', 'COMPOSITION, CARE & ORIGIN\r\n\r\nCOMPOSITION\r\n\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\n\r\nOUTER SHELL\r\nBODY\r\n61% polyester\r\n37% cotton\r\n2% elastane\r\n\r\nEMBELLISHMENT\r\n75% cotton\r\n3% elastane\r\n22% polyester\r\n\r\nLINING\r\n100% polyester\r\n\r\nCARE\r\nCaring for your clothes is caring for the environment.\r\nTo keep your jackets and coats clean, you only need to freshen them up and go over them with a cloth or a clothes brush. This process is more gentle on fabrics and also reduces water and energy consumption when washing.\r\n\r\nMachine wash at max. 30ºC/86ºF with short spin cycle\r\n\r\nDo not use bleach\r\nIron at a maximum of 110ºC/230ºF\r\nDry clean with tetrachloroethylene\r\nDo not tumble dry\r\n\r\nORIGIN\r\nWe work with our suppliers, workers, unions and international organizations to develop a supply chain in which human rights are respected and promoted, contributing to the United Nations Sustainable Development Goals. \r\n\r\nThanks to the collaboration with our suppliers, we work to know the facilities and processes used to manufacture our products in order to know their traceability.', 2299000, '2023-08-02', 37, 0),
(65, 11, 'PREMIUM BERMUDA JOGGERS', 'COMPOSITION, CARE & ORIGIN\r\n\r\nCOMPOSITION\r\n\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\n\r\nOUTER SHELL\r\n84% cotton\r\n16% polyester\r\n\r\nCARE\r\nCaring for your clothes is caring for the environment.\r\nLower temperature washes and delicate spin cycles are gentler on garments and help to protect the colour, shape and structure of the fabric. Furthermore, they reduce the amount of energy used in care processes', 899000, '2023-08-02', 44, 0),
(66, 11, 'ACID WASH SWIMMING TRUNKS', 'COMPOSITION, CARE & ORIGIN\r\n\r\nCOMPOSITION\r\n\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\n\r\nOUTER SHELL\r\n100% polyamide\r\nLINING\r\n100% polyester\r\n\r\nCARE\r\nCaring for your clothes is caring for the environment.\r\nLower temperature washes and delicate spin cycles are gentler on garments and help to protect the colour, shape and structure of the fabric. Furthermore, they reduce the amount of energy used in care processes.', 899000, '2023-08-02', 34, 0),
(67, 11, 'CARGO JOGGER BERMUDA SHORTS', 'COMPOSITION, CARE & ORIGIN\r\n\r\nCOMPOSITION\r\n\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\n\r\nOUTER SHELL\r\n100% cotton\r\n\r\nCARE\r\nCaring for your clothes is caring for the environment.\r\nLower temperature washes and delicate spin cycles are gentler on garments and help to protect the colour, shape and structure of the fabric. Furthermore, they reduce the amount of energy used in care processes.', 999000, '2023-08-02', 24, 0),
(68, 11, 'DENIM UTILITY BERMUDA SHORTS', 'COMPOSITION, CARE & ORIGIN\r\n\r\nCOMPOSITION\r\n\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\n\r\nOUTER SHELL\r\n100% cotton\r\n\r\nCARE\r\nCaring for your clothes is caring for the environment.\r\nTo lengthen the life of denim garments, always turn them inside out and wash at low temperatures. This will help you preserve their colours and the structure of the fabric, as well as reduce energy consumption.', 1699000, '2023-08-02', 10, 0),
(69, 11, 'TECHNICAL BERMUDA SHORTS - LIMITED EDITION', 'COMPOSITION, CARE & ORIGIN\r\n\r\nCOMPOSITION\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\n\r\nOUTER SHELL\r\n100% polyamide\r\nWhich contains at least:\r\n\r\nOUTER SHELL\r\n50% RCS certified recycled polyamide\r\n\r\nCERTIFIED MATERIALS\r\n\r\nRCS CERTIFIED RECYCLED POLYAMIDE\r\nThis fibre is made from polyamide waste recovered from other productions and other waste products, such as fishing nets. Transforming waste into new materials helps limit the extraction of raw materials. It is certified to the Recycled Content Standard (RCS), which verifies the recycled content and tracks it from source to final product.', 1699000, '2023-08-02', 21, 0),
(70, 12, 'TROUSERS WITH CONTRAST TOPSTITCHING', 'COMPOSITION, CARE & ORIGIN\r\n\r\nCOMPOSITION\r\n\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\n\r\nOUTER SHELL\r\n66% polyester\r\n28% viscose\r\n6% elastane\r\n\r\nWhich contains at least:\r\n\r\nOUTER SHELL\r\n40% RCS certified recycled polyester\r\n\r\nCERTIFIED MATERIALS\r\n\r\nRCS CERTIFIED RECYCLED POLYESTER\r\nNowadays, recycled polyester is mainly made from PET plastic waste. This is a type of plastic that is widely used in a variety of items, such as plastic bottles. Using recycled materials helps limit the production of virgin polyester fibre. It is certified to the Recycled Content Standard (RCS), which verifies the recycled content and tracks it from source to final product.\r\n\r\nCARE\r\n\r\nCaring for your clothes is caring for the environment.\r\n\r\nLower temperature washes and delicate spin cycles are gentler on garments and help to protect the colour, shape and structure of the fabric. Furthermore, they reduce the amount of energy used in care processes.\r\nMachine wash at max. 30ºC/86ºF with short spin cycle\r\n\r\nDo not use bleach\r\nIron at a maximum of 110ºC/230ºF\r\nDry clean with tetrachloroethylene\r\nDo not tumble dry\r\nORIGIN\r\nWe work with our suppliers, workers, unions and international organizations to develop a supply chain in which human rights are respected and promoted, contributing to the United Nations Sustainable Development Goals. \r\n\r\nThanks to the collaboration with our suppliers, we work to know the facilities and processes used to manufacture our products in order to know their traceability.\r\nMade in China', 1699000, '2023-08-02', 4, 9),
(71, 12, 'EXTRA-LONG CREASED EFFECT TROUSERS', 'COMPOSITION, CARE & ORIGIN\r\n\r\nCOMPOSITION\r\n\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\n\r\nOUTER SHELL\r\n83% viscose\r\n17% polyamide\r\n\r\nCARE\r\nCaring for your clothes is caring for the environment.\r\nLower temperature washes and delicate spin cycles are gentler on garments and help to protect the colour, shape and structure of the fabric. Furthermore, they reduce the amount of energy used in care processes.', 899000, '2023-08-02', 7, 14),
(72, 12, 'HIGH-WAIST TROUSERS', 'COMPOSITION, CARE & ORIGIN\r\n\r\nCOMPOSITION\r\n\r\nWe work with monitoring programmes to ensure compliance with our social, environmental and health and safety standards for our products. To assess compliance, we have developed a programme of audits and continuous improvement plans.\r\n\r\nOUTER SHELL\r\n71% polyester\r\n22% viscose\r\n7% elastane\r\n\r\nCARE\r\nCaring for your clothes is caring for the environment.\r\nLower temperature washes and delicate spin cycles are gentler on garments and help to protect the colour, shape and structure of the fabric. Furthermore, they reduce the amount of energy used in care processes.\r\n\r\nMachine wash at max. 30ºC/86ºF with short spin cycle\r\n\r\nDo not use bleach\r\n\r\nIron at a maximum of 110ºC/230ºF\r\n\r\nDry clean with tetrachloroethylene\r\n\r\nTumble dry low\r\n\r\nORIGIN\r\nWe work with our suppliers, workers, unions and international organizations to develop a supply chain in which human rights are respected and promoted, contributing to the United Nations Sustainable Development Goals. \r\n\r\nThanks to the collaboration with our suppliers, we work to know the facilities and processes used to manufacture our products in order to know their traceability.\r\n\r\nThis garment has been made in the following origins:\r\nMade in China\r\nMade in Cambodia\r\nMade in Turkey\r\nMade in Spain', 990000, '2023-08-02', 7, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_variants`
--

CREATE TABLE `product_variants` (
  `variant_id` int(10) NOT NULL COMMENT 'id biến thể',
  `product_id` int(10) NOT NULL COMMENT 'id sản phẩm',
  `size_id` int(10) NOT NULL COMMENT 'id size',
  `color_id` int(10) NOT NULL COMMENT 'id color'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `product_variants`
--

INSERT INTO `product_variants` (`variant_id`, `product_id`, `size_id`, `color_id`) VALUES
(4, 41, 4, 2),
(5, 41, 4, 2),
(6, 39, 4, 2),
(7, 39, 4, 2),
(8, 39, 4, 2),
(9, 39, 4, 2),
(10, 38, 4, 2),
(11, 38, 4, 2),
(12, 43, 4, 2),
(13, 42, 4, 2),
(14, 38, 2, 4),
(15, 38, 2, 4),
(16, 38, 2, 4),
(17, 38, 2, 4),
(18, 38, 2, 4),
(19, 38, 2, 4),
(20, 37, 3, 4),
(21, 37, 3, 4),
(22, 38, 4, 2),
(23, 38, 4, 2),
(24, 38, 4, 2),
(25, 38, 4, 2),
(26, 38, 4, 2),
(27, 38, 4, 2),
(28, 38, 4, 2),
(29, 38, 4, 2),
(30, 38, 4, 2),
(31, 38, 4, 2),
(32, 38, 4, 2),
(33, 39, 4, 2),
(34, 41, 4, 2),
(35, 41, 4, 2),
(36, 38, 4, 2),
(37, 38, 4, 2),
(38, 38, 4, 2),
(39, 38, 4, 2),
(40, 38, 4, 2),
(41, 38, 4, 2),
(42, 38, 4, 2),
(43, 38, 4, 2),
(44, 37, 4, 2),
(45, 42, 4, 2),
(46, 44, 2, 2),
(47, 42, 4, 2),
(48, 38, 4, 2),
(49, 39, 4, 2),
(50, 43, 4, 2),
(51, 41, 4, 2),
(52, 41, 4, 2),
(53, 41, 4, 2),
(54, 42, 4, 2),
(55, 42, 4, 2),
(56, 42, 4, 2),
(57, 42, 4, 2),
(58, 42, 4, 2),
(59, 42, 4, 2),
(60, 42, 4, 2),
(61, 42, 4, 2),
(62, 42, 4, 2),
(63, 42, 4, 2),
(64, 42, 4, 2),
(65, 42, 4, 2),
(66, 42, 4, 2),
(67, 42, 4, 2),
(68, 42, 4, 2),
(69, 42, 4, 2),
(70, 42, 4, 2),
(71, 42, 4, 2),
(72, 42, 4, 2),
(73, 42, 4, 2),
(74, 42, 4, 2),
(75, 42, 4, 2),
(76, 42, 4, 2),
(77, 42, 4, 2),
(78, 42, 4, 2),
(79, 42, 4, 2),
(80, 42, 4, 2),
(81, 42, 4, 2),
(82, 42, 4, 2),
(83, 42, 4, 2),
(84, 42, 4, 2),
(85, 42, 4, 2),
(86, 42, 4, 2),
(87, 42, 4, 2),
(88, 42, 4, 2),
(89, 42, 4, 2),
(90, 42, 4, 2),
(91, 42, 4, 2),
(92, 42, 4, 2),
(93, 42, 4, 2),
(94, 42, 4, 2),
(95, 42, 4, 2),
(96, 42, 4, 2),
(97, 42, 4, 2),
(98, 42, 4, 2),
(99, 42, 4, 2),
(100, 42, 4, 2),
(101, 42, 4, 2),
(102, 42, 4, 2),
(103, 42, 4, 2),
(104, 42, 4, 2),
(105, 42, 4, 2),
(106, 42, 4, 2),
(107, 42, 4, 2),
(108, 42, 4, 2),
(109, 42, 4, 2),
(110, 42, 4, 2),
(111, 42, 4, 2),
(112, 42, 4, 2),
(113, 42, 4, 2),
(114, 42, 4, 2),
(115, 42, 4, 2),
(116, 42, 4, 2),
(117, 42, 4, 2),
(118, 42, 4, 2),
(119, 42, 4, 2),
(120, 42, 4, 2),
(121, 42, 4, 2),
(122, 43, 4, 2),
(123, 43, 4, 2),
(124, 43, 4, 2),
(125, 43, 4, 2),
(126, 43, 4, 2),
(127, 43, 4, 2),
(128, 43, 4, 2),
(129, 43, 4, 2),
(130, 43, 4, 2),
(131, 43, 4, 2),
(132, 43, 4, 2),
(133, 43, 4, 2),
(134, 43, 4, 2),
(135, 43, 4, 2),
(136, 43, 4, 2),
(137, 43, 4, 2),
(138, 43, 4, 2),
(139, 43, 4, 2),
(140, 43, 4, 2),
(141, 43, 4, 2),
(142, 43, 4, 2),
(143, 43, 4, 2),
(144, 43, 4, 2),
(145, 43, 4, 2),
(146, 39, 4, 2),
(147, 39, 4, 2),
(148, 39, 4, 2),
(149, 39, 4, 2),
(150, 38, 4, 2),
(151, 39, 3, 3),
(152, 39, 3, 3),
(153, 38, 4, 2),
(154, 38, 4, 2),
(155, 38, 4, 2),
(156, 41, 4, 2),
(157, 41, 4, 2),
(158, 39, 4, 2),
(159, 63, 4, 3),
(160, 63, 3, 3),
(161, 63, 3, 3),
(162, 37, 4, 3),
(163, 60, 4, 2),
(164, 60, 4, 2),
(165, 60, 4, 2),
(166, 72, 2, 3),
(167, 72, 2, 3),
(168, 71, 4, 2),
(169, 72, 4, 2),
(170, 70, 4, 2),
(171, 70, 4, 2),
(172, 70, 4, 2),
(173, 57, 4, 2),
(174, 57, 4, 2),
(175, 71, 3, 3),
(176, 71, 4, 2),
(177, 68, 2, 2),
(178, 71, 4, 2),
(179, 72, 3, 3),
(180, 72, 3, 3),
(181, 37, 6, 2),
(182, 37, 6, 2),
(183, 37, 6, 2),
(184, 37, 6, 2),
(185, 37, 6, 2),
(186, 72, 4, 2),
(187, 72, 4, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `sales`
--

INSERT INTO `sales` (`sale_id`, `user_id`, `pay_id`, `sales_date`) VALUES
(9, 9, 'PAY-1RT494832H294925RLLZ7TZA', '2018-05-10'),
(10, 9, 'PAY-21700797GV667562HLLZ7ZVY', '2018-05-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `size_id` int(1) NOT NULL COMMENT 'size id',
  `size_name` varchar(10) NOT NULL COMMENT 'size name'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`size_id`, `size_name`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(6, 'XXL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` bit(1) NOT NULL COMMENT '1 là admin',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `photo` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` bit(1) NOT NULL COMMENT '1 là đang kích hoạt',
  `created_on` date NOT NULL,
  `sex` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'giới tính'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `type`, `name`, `address`, `phone_number`, `photo`, `status`, `created_on`, `sex`) VALUES
(9, 'harry@den.com', '$2y$10$Oongyx.Rv0Y/vbHGOxywl.qf18bXFiZOcEaI4ZpRRLzFNGKAhObSC', b'0', 'Den', 'Silay City, Negros Occidental', '0909273571', 'khám phá game.png', b'0', '2018-05-09', 'Male'),
(18, 'huynvph30433@fpt.edu.vn', '$2y$10$H/ebUn96bqR8CuWEhGeXseP0xQVSoIMMUhLH0H27wfCKtrR.nguUe', b'1', 'nguyễn văn huy', 'chợ rồng', '0386601111', 'z3580893126227_41c2ed7282c8d65c8ff3d95f472ff183.jpg', b'0', '2023-07-14', 'nam'),
(20, 'huynvph30433@fpt.edu.vn', '$2y$10$snxrsuR8brIWQvqA/N/SCesAqdN8lHONDtMLiGPEw8jzSvsXHsDr6', b'1', 'nguyễn văn huy 3', 'eqeqeqrq', '0386601111', 'main-qimg-c5912cc0d90103f7d72330d0b047c2b2-lq.jpg', b'1', '2023-07-14', 'Femate'),
(24, 'huynvph30433@fpt.edu.vn', '$2y$10$xnKM/YrjA52g9R9TnvUlouLeyYhnQIn.9rpdYK.xZEjAjOL1LoxGm', b'0', 'nguyễn văn huy', 'hải dương', '0386601111', 'z3580893126227_41c2ed7282c8d65c8ff3d95f472ff183.jpg', b'1', '2023-07-16', 'Male'),
(26, 'huynvph30433@fpt.edu.vn', '$2y$10$A/jwwfWX3qi1h3/WEhvygu0o27ui/0iWCfF.TM6TamIyoW0YhQlB2', b'0', 'nguyễn văn huy', 'adafa', '0386601111', 'z3580893126227_41c2ed7282c8d65c8ff3d95f472ff183.jpg', b'1', '2023-07-16', 'Femate'),
(27, 'huynvph30433@fpt.edu.vn', '$2y$10$k/c1H3x5vFTb9nlP91mdhuHW2gkcZt4EBycKTBVPuMBQN7QNuxfaq', b'0', 'nguyễn văn huy', 'adafa', '0386601111', 'z3580893126227_41c2ed7282c8d65c8ff3d95f472ff183.jpg', b'1', '2023-07-16', 'Femate'),
(28, 'huynvph30433@fpt.edu.vn', '$2y$10$DhXygiFUVZ1UmR4G32fxM.I4Q74Gxuw.LPMjGlVk1uq/s24j5XTJC', b'0', 'nguyễn văn huy', 'adafa', '0386601111', 'khám phá game.png', b'1', '2023-07-16', 'nam'),
(29, 'huynvph30433@fpt.edu.vn', '$2y$10$PVs3VW3BjQ/ezZ9ZqROnLO.BzmSuqLcpme0rNkzKejcv7m7Amtusu', b'0', 'nguyễn văn huy', 'adafa', '0386601111', 'z3580893126227_41c2ed7282c8d65c8ff3d95f472ff183.jpg', b'1', '2023-07-16', 'Femate'),
(30, 'huynvph30433@fpt.edu.vn', '$2y$10$IAreu6ZxLhEGB5uvRTecveonwldosGLgJMInHqeIyVJBNqpS6KqPa', b'0', 'nguyễn văn huy', 'adafa', '0386601111', 'z3580893126227_41c2ed7282c8d65c8ff3d95f472ff183.jpg', b'1', '2023-07-16', 'Femate'),
(31, 'huynvph30433@fpt.edu.vn', '$2y$10$nuBzwiToXyn1uKzFsCn64.35h9ys9i3kJmfY0vj94yS2aU.6GVzIS', b'0', 'nguyễn văn huy', 'adaadad', '0386601111', 'khám phá game.png', b'1', '2023-07-16', 'Femate'),
(32, 'huynvph30433@fpt.edu.vn', '$2y$10$wLUCXpX3sMbMLMpE1wMYJeig/zD9B9RcQqwYwRBp0NeSJQuBrNvBK', b'0', 'nguyễn văn huy', 'adaadad', '0386601111', 'du_an.png', b'1', '2023-07-16', 'Femate'),
(33, 'huynvph30433@fpt.edu.vn', '$2y$10$pUcb/nBRfO3UxP403BwRPe6i1qQ1DvaElg8RBQbdA4shvih7Azgg2', b'0', 'nguyễn văn huy', 'sdasfad', '0386601111', 'Screenshot 2023-06-30 223849.png', b'1', '2023-07-17', 'Femate'),
(34, 'huynvph30433@fpt.edu.vn', '$2y$10$ceARqiAvj6mb1fOLGQiYsOl108j2iV57Fv0IyARLjqllJuNYyWQfe', b'1', '\0', '', '', '', b'1', '2023-07-19', ''),
(35, 'huynguyen@fpt.edu.vn', '$2y$10$ZWQwR7YJQa.DpLQaccCC.O/cA7zzNbnFrzZ/.hOQ2Cy8hJRcqSR9G', b'1', 'nguyễn văn huy', 'tp.Hải Dương', '0386601130', 'z3580893126227_41c2ed7282c8d65c8ff3d95f472ff183.jpg', b'1', '2023-07-19', 'nam'),
(36, 'huynguyen3005@fpt.edu.vn', '$2y$10$OojQ/R9izzTXgv/pP3aE7eNMLpdB.7XQrnhqaB0AKIxLqsJVUuzHS', b'0', 'nguyễn văn huy', 'hải dương', '0386601130', 'khám phá game.png', b'1', '2023-07-19', 'Male'),
(37, 'dainmph30444@fpt.edu.vn', '$2y$10$gJlWKUaMPcUY40P2ozBZgeg5XPD5ToJ0fcPPJAn1DtEHcPy4ZtA7G', b'0', 'Nguyễn Minh Đại', '', '', '', b'1', '2023-07-25', ''),
(38, 'huynguyen@f11111pt.edu.vn', '$2y$10$aDgbyofcLoRbtKOWZKfvQ.FhFiBXdSXhiICeawKQrLYxYJZOjxZ6C', b'0', 'nguyễn văn huy', '', '', 'khám phá game.png', b'1', '2023-08-01', ''),
(39, 'huynguyen1111@fpt.edu.vn', '$2y$10$PwHqp74O7O5qPfs3HWFge./MmKUZS5rW96324V5LX67AxDlD9.MBm', b'0', 'huy nguyen', '', '', '', b'1', '2023-08-10', ''),
(40, 'dainguyen2234@gmail.com', '$2y$10$nJzQ4gy4nqYjZbdi8RcYnuEaffVlReZFPy.ylRk/X1gtGQT7SZ3Li', b'0', 'Nguyen Minh Dai', '', '', '', b'1', '2023-08-18', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlist`
--

INSERT INTO `wishlist` (`user_id`, `product_id`) VALUES
(37, 40),
(37, 38),
(35, 68),
(35, 72),
(35, 71),
(35, 69),
(35, 60),
(36, 72),
(36, 60),
(36, 38),
(35, 62),
(18, 43),
(18, 68),
(18, 65);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `variant_id` (`variant_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_carts`
--
ALTER TABLE `order_carts`
  ADD PRIMARY KEY (`order_id`,`cart_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`variant_id`),
  ADD KEY `color` (`color_id`),
  ADD KEY `size` (`size_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'color id', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id ảnh', AUTO_INCREMENT=332;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `variant_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id biến thể', AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT cho bảng `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` int(1) NOT NULL AUTO_INCREMENT COMMENT 'size id', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`variant_id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `order_carts`
--
ALTER TABLE `order_carts`
  ADD CONSTRAINT `order_carts_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`),
  ADD CONSTRAINT `order_carts_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Các ràng buộc cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `color` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`),
  ADD CONSTRAINT `product_variants_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `size` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`size_id`);

--
-- Các ràng buộc cho bảng `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
