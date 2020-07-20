-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 04:24 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigndelivery`
--

CREATE TABLE `assigndelivery` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `assign_to` varchar(255) NOT NULL,
  `pickup` varchar(255) NOT NULL,
  `ship_address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `order_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigndelivery`
--

INSERT INTO `assigndelivery` (`id`, `product_name`, `assign_to`, `pickup`, `ship_address`, `status`, `order_status`) VALUES
(91, '1', '2', '3', '1', '1', NULL),
(92, '1', '2', '3', '1', '1', NULL),
(93, '1', '2', '4', '1', '1', NULL),
(94, '1', '6', '3', '1', '1', NULL),
(95, '182', '2', '3', '1', '1', NULL),
(96, '183', '2', '3', '2', '1', NULL),
(97, '184', '2', '3', '2', '1', NULL),
(98, '184', '25', '3', '2', '1', NULL),
(99, '183', '17', '5', '2', '2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_image` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_image`, `brand_name`, `category`, `status`) VALUES
(20, '', 'Nike', '1', 0),
(21, '', 'Allen Solly', '1', 0),
(22, 'sdsahakb_1596863285.webp', 'Roadster', '1', 0),
(23, 'bdsakash_1596866688.webp', 'Gap', '1', 1),
(24, '', 'Under Armour', '1', 0),
(25, '', 'Wrogn', '1', 0),
(26, 'sakhbasd_1596866552.webp', 'Here Now', '1', 1),
(27, '', 'V8', '1', 0),
(28, '', 'H and M', '1', 0),
(29, '', 'Mast and Harbour', '1', 0),
(30, '', 'Spykar', '1', 0),
(31, '', 'Wildcraft', '1', 0),
(32, '', 'Invictus', '1', 0),
(33, 'kshsabad_1596866591.webp', 'Levis', '1', 1),
(34, '', 'Louis Philippie', '1', 0),
(35, '', 'W', '2', 0),
(36, '', 'Marks and spencer', '2', 0),
(37, '', 'Only', '2', 0),
(38, '', 'Sangria', '2', 0),
(39, '', 'Biba', '2', 0),
(40, '', 'Cult-sports', '2', 0),
(41, '', 'The Roadster', '2', 0),
(42, '', 'Vishudh', '2', 0),
(43, '', 'Caprese', '2', 0),
(44, '', 'Here Now.', '2', 0),
(45, '', 'Inddus', '2', 0),
(46, '', 'Ginni and Joy', '2', 0),
(47, '', 'Zaveri Pearls', '2', 0),
(48, '', 'Dressberry', '2', 0),
(49, '', 'Rothy Perkins', '2', 0),
(50, '', 'Allen Solly.', '3', 0),
(51, '', 'Kittens', '3', 0),
(52, '', 'Walktrendy', '3', 0),
(53, '', 'Next', '3', 0),
(54, '', 'Indian Terrain', '3', 0),
(55, '', 'Nautinati', '3', 0),
(56, '', 'CuteCumber', '3', 0),
(57, '', 'Mini Klub', '3', 0),
(58, '', 'U.S Pollo', '3', 0),
(59, '', 'H and M.', '3', 0),
(60, '', 'Ginni and Jiny', '3', 0),
(61, '', 'Yk', '3', 0),
(62, 'adhabkss_1596863512.webp', 'United Color of Beneton', '3', 1),
(63, '', 'Gap kids', '3', 0),
(64, '', 'Peppermind', '3', 0),
(65, '', 'pionerr', '1', 0),
(66, '', 'CALVIN KLEIN', '2', 0),
(67, '', 'Hangup', '1', 0),
(68, 'skhdasba_1596867914.webp', 'U.S. Pollo Assn.', '1', 1),
(69, 'Libas.webp', 'Libas', '2', 1),
(70, 'sbakdhsa_1596866814.webp', 'Tokyo Talkies', '2', 1),
(71, 'HRX.webp', 'HRX', '1', 1),
(72, 'Jack & Jones.webp', 'Jack & Jones', '1', 1),
(73, 'Anouk.webp', 'Anouk', '2', 1),
(74, '', 'khan shadab', '', 0),
(75, 'Maybelline.webp', 'Maybelline', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `size`, `color`) VALUES
(2, 18, 182, 1, 22, 'Black'),
(7, 18, 186, 2, 0, 'Brown'),
(9, 18, 185, 2, 0, 'Black'),
(10, 18, 184, 2, 22, 'Black'),
(11, 18, 187, 2, 0, 'Red'),
(12, 6, 188, 12, 0, ''),
(13, 2, 190, 2, 22, 'green'),
(16, 13, 182, 5, 22, 'Black'),
(17, 13, 186, 1, 0, 'Brown'),
(18, 13, 187, 1, 0, 'Red'),
(19, 13, 184, 1, 22, 'Black'),
(20, 17, 189, 1, 0, ''),
(21, 17, 188, 1, 0, ''),
(22, 17, 182, 4, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cat_slug` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`, `photo`) VALUES
(1, 'MENS', 'MEN', '_1593673792.png'),
(2, 'Women', 'Women', '_1594642302.jpg'),
(3, 'KIDS', 'KIDS', '_1593673948.png');

-- --------------------------------------------------------

--
-- Table structure for table `category_banner`
--

CREATE TABLE `category_banner` (
  `id` int(11) NOT NULL,
  `banner_photo` varchar(255) NOT NULL,
  `banner_type` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_banner`
--

INSERT INTO `category_banner` (`id`, `banner_photo`, `banner_type`, `url`) VALUES
(10, 'dh23ak14bsa6_1583045038.webp', '2', 'locals'),
(11, 's61kahsda25b_1582917335.webp', '1', 'locals'),
(13, 'asbhdk524as6_1583045812.webp', '3', 'category.php?category=WOMEN');

-- --------------------------------------------------------

--
-- Table structure for table `category_offer`
--

CREATE TABLE `category_offer` (
  `id` int(11) NOT NULL,
  `offer_photo` varchar(255) NOT NULL,
  `offer_url` varchar(255) NOT NULL,
  `offer_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_offer`
--

INSERT INTO `category_offer` (`id`, `offer_photo`, `offer_url`, `offer_type`) VALUES
(2, 'ifj6ajdgsahb_1583039747.webp', 'H and M', '1'),
(3, 'jadoj1ddia3j_1582938417.webp', 'Car', '1'),
(5, 'oi6jduijdja1_1583035221.webp', 'Women', '2'),
(6, 'kiu2a4gjja6o_1583675721.webp', 'Df', '2'),
(7, 'ais12djahsif.jpg', 'Boys Clothing', '3'),
(8, 'iajssodsaig4.jpg', 'Girls Clothing', '3'),
(9, 'o3udkjdfhiaa.jpg', 'Infants', '3');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `HEX` varchar(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color_name`, `HEX`, `status`) VALUES
(1, 'AliceBlue', '#F0F8FF', 1),
(2, 'AntiqueWhite', '#FAEBD7', 1),
(3, 'Aqua', '#00FFFF', 1),
(4, 'Aquamarine', '#7FFFD4', 1),
(5, 'Azure', '#F0FFFF', 1),
(6, 'Beige', '#F5F5DC', 1),
(7, 'Bisque', '#FFE4C4', 1),
(8, 'Black', '#000000', 1),
(9, 'BlanchedAlmond', '#FFEBCD', 1),
(10, 'Blue', '#0000FF', 1),
(11, 'BlueViolet', '#8A2BE2', 1),
(12, 'Brown', '#A52A2A', 1),
(13, 'BurlyWood', '#DEB887', 1),
(14, 'CadetBlue', '#5F9EA0', 1),
(15, 'Chartreuse', '#7FFF00', 1),
(16, 'Chocolate', '#D2691E', 1),
(17, 'Coral', '#FF7F50', 1),
(18, 'CornflowerBlue', '#6495ED', 1),
(19, 'Cornsilk', '#FFF8DC', 1),
(20, 'Crimson', '#DC143C', 1),
(21, 'Cyan', '#00FFFF', 1),
(22, 'DarkBlue', '#00008B', 1),
(23, 'DarkCyan', '#008B8B', 1),
(24, 'DarkGoldenRod', '#B8860B', 1),
(25, 'DarkGray', '#A9A9A9', 1),
(26, 'DarkGreen', '#006400', 1),
(27, 'DarkKhaki', '#BDB76B', 1),
(28, 'DarkMagenta', '#8B008B', 1),
(29, 'DarkOliveGreen', '#556B2F', 1),
(30, 'DarkOrange', '#FF8C00', 1),
(31, 'DarkOrchid', '#9932CC', 1),
(32, 'DarkRed', '#8B0000', 1),
(33, 'DarkSalmon', '#E9967A', 1),
(34, 'DarkSeaGreen', '#8FBC8F', 1),
(35, 'DarkSlateBlue', '#483D8B', 1),
(36, 'DarkSlateGray', '#2F4F4F', 1),
(37, 'DarkTurquoise', '#00CED1', 1),
(38, 'DarkViolet', '#9400D3', 1),
(39, 'DeepPink', '#FF1493', 1),
(40, 'DeepSkyBlue', '#00BFFF', 1),
(41, 'DimGray', '#696969', 1),
(42, 'DodgerBlue', '#1E90FF', 1),
(43, 'FireBrick', '#B22222', 1),
(44, 'FloralWhite', '#FFFAF0', 1),
(45, 'ForestGreen', '#228B22', 1),
(46, 'Fuchsia', '#FF00FF', 1),
(47, 'Gainsboro', '#DCDCDC', 1),
(48, 'GhostWhite', '#F8F8FF', 1),
(49, 'Gold', '#FFD700', 1),
(50, 'GoldenRod', '#DAA520', 1),
(51, 'Gray', '#808080', 1),
(52, 'Green', '#008000', 1),
(53, 'GreenYellow', '#ADFF2F', 1),
(54, 'HoneyDew', '#F0FFF0', 1),
(55, 'HotPink', '#FF69B4', 1),
(56, 'IndianRed ', '#CD5C5C', 1),
(57, 'Indigo ', '#4B0082', 1),
(58, 'Ivory', '#FFFFF0', 1),
(59, 'Khaki', '#F0E68C', 1),
(60, 'Lavender', '#E6E6FA', 1),
(61, 'LavenderBlush', '#FFF0F5', 1),
(62, 'LawnGreen', '#7CFC00', 1),
(63, 'LemonChiffon', '#FFFACD', 1),
(64, 'LightBlue', '#ADD8E6', 1),
(65, 'LightCoral', '#F08080', 1),
(66, 'LightCyan', '#E0FFFF', 1),
(67, 'LightGoldenRodYellow', '#FAFAD2', 1),
(68, 'LightGray', '#D3D3D3', 1),
(69, 'LightGreen', '#90EE90', 1),
(70, 'LightPink', '#FFB6C1', 1),
(71, 'LightSalmon', '#FFA07A', 1),
(72, 'LightSeaGreen', '#20B2AA', 1),
(73, 'LightSkyBlue', '#87CEFA', 1),
(74, 'LightSlateGray', '#778899', 1),
(75, 'LightSteelBlue', '#B0C4DE', 1),
(76, 'LightYellow', '#FFFFE0', 1),
(77, 'Lime', '#00FF00', 1),
(78, 'LimeGreen', '#32CD32', 1),
(79, 'Linen', '#FAF0E6', 1),
(80, 'Magenta', '#FF00FF', 1),
(81, 'Maroon', '#800000', 1),
(82, 'MediumAquaMarine', '#66CDAA', 1),
(83, 'MediumBlue', '#0000CD', 1),
(84, 'MediumOrchid', '#BA55D3', 1),
(85, 'MediumPurple', '#9370DB', 1),
(86, 'MediumSeaGreen', '#3CB371', 1),
(87, 'MediumSlateBlue', '#7B68EE', 1),
(88, 'MediumSpringGreen', '#00FA9A', 1),
(89, 'MediumTurquoise', '#48D1CC', 1),
(90, 'MediumVioletRed', '#C71585', 1),
(91, 'MidnightBlue', '#191970', 1),
(92, 'MintCream', '#F5FFFA', 1),
(93, 'MistyRose', '#FFE4E1', 1),
(94, 'Moccasin', '#FFE4B5', 1),
(95, 'NavajoWhite', '#FFDEAD', 1),
(96, 'Navy', '#000080', 1),
(97, 'OldLace', '#FDF5E6', 1),
(98, 'Olive', '#808000', 1),
(99, 'OliveDrab', '#6B8E23', 1),
(100, 'Orange', '#FFA500', 1),
(101, 'OrangeRed', '#FF4500', 1),
(102, 'Orchid', '#DA70D6', 1),
(103, 'PaleGoldenRod', '#EEE8AA', 1),
(104, 'PaleGreen', '#98FB98', 1),
(105, 'PaleTurquoise', '#AFEEEE', 1),
(106, 'PaleVioletRed', '#DB7093', 1),
(107, 'PapayaWhip', '#FFEFD5', 1),
(108, 'PeachPuff', '#FFDAB9', 1),
(109, 'Peru', '#CD853F', 1),
(110, 'Pink', '#FFC0CB', 1),
(111, 'Plum', '#DDA0DD', 1),
(112, 'PowderBlue', '#B0E0E6', 1),
(113, 'Purple', '#800080', 1),
(114, 'RebeccaPurple', '#663399', 1),
(115, 'Red', '#FF0000', 1),
(116, 'RosyBrown', '#BC8F8F', 1),
(117, 'RoyalBlue', '#4169E1', 1),
(118, 'SaddleBrown', '#8B4513', 1),
(119, 'Salmon', '#FA8072', 1),
(120, 'SandyBrown', '#F4A460', 1),
(121, 'SeaGreen', '#2E8B57', 1),
(122, 'SeaShell', '#FFF5EE', 1),
(123, 'Sienna', '#A0522D', 1),
(124, 'Silver', '#C0C0C0', 1),
(125, 'SkyBlue', '#87CEEB', 1),
(126, 'SlateBlue', '#6A5ACD', 1),
(127, 'SlateGray', '#708090', 1),
(128, 'Snow', '#FFFAFA', 1),
(129, 'SpringGreen', '#00FF7F', 1),
(130, 'SteelBlue', '#4682B4', 1),
(131, 'Tan', '#D2B48C', 1),
(132, 'Teal', '#008080', 1),
(133, 'Thistle', '#D8BFD8', 1),
(134, 'Tomato', '#FF6347', 1),
(135, 'Turquoise', '#40E0D0', 1),
(136, 'Violet', '#EE82EE', 1),
(137, 'Wheat', '#F5DEB3', 1),
(138, 'White', '#FFFFFF', 1),
(139, 'WhiteSmoke', '#F5F5F5', 1),
(140, 'Yellow', '#FFFF00', 1),
(141, 'YellowGreen', '#9ACD32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_details`
--

CREATE TABLE `delivery_details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `deliver_shipaddress` varchar(255) NOT NULL,
  `deliver_shipcity` varchar(255) NOT NULL,
  `deliver_shipstate` varchar(255) NOT NULL,
  `deliver_shippincode` varchar(6) NOT NULL,
  `deliver_shiptype` varchar(255) NOT NULL,
  `deliver_shipmb` varchar(255) NOT NULL,
  `deliver_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`, `deliver_shipaddress`, `deliver_shipcity`, `deliver_shipstate`, `deliver_shippincode`, `deliver_shiptype`, `deliver_shipmb`, `deliver_status`) VALUES
(1, 4, 182, 2, '', '', '', '', '', '', ''),
(2, 6, 183, 1, '', '', '', '', '', '', ''),
(3, 6, 188, 1, '', '', '', '', '', '', ''),
(4, 6, 182, 1, '', '', '', '', '', '', ''),
(5, 6, 187, 1, '', '', '', '', '', '', ''),
(6, 6, 185, 1, '', '', '', '', '', '', ''),
(7, 6, 184, 5, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `google_users`
--

CREATE TABLE `google_users` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `google_email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `picture_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `activate_code` varchar(50) NOT NULL,
  `reset_code` varchar(50) NOT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email_id`, `status`, `activate_code`, `reset_code`, `added_on`) VALUES
(18, 'ks615044@gmail.com', 1, '6as24as51kbh', '', '2020-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pincode`
--

CREATE TABLE `pincode` (
  `id` int(11) NOT NULL,
  `pincode` int(6) NOT NULL,
  `courier_company` varchar(255) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `state_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pincode`
--

INSERT INTO `pincode` (`id`, `pincode`, `courier_company`, `city_name`, `state_name`) VALUES
(1, 410206, 'DHL Courier', 'Panvel', 'MAHARASHTRA'),
(3, 400612, 'FEDEX', 'Thane', 'MAHARASHTRA'),
(4, 416001, 'Akash Ganga Courier Limited\r\n', 'Kolhapur ', 'MAHARASHTRA');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` int(100) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `color` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `size` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `old_price` varchar(10) NOT NULL,
  `price` double NOT NULL,
  `discount` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `photo2` varchar(200) DEFAULT NULL,
  `photo3` varchar(255) DEFAULT NULL,
  `photo4` varchar(255) DEFAULT NULL,
  `photo5` varchar(255) DEFAULT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `category_id`, `subcategory_id`, `brand_id`, `color`, `name`, `size`, `description`, `slug`, `old_price`, `price`, `discount`, `photo`, `photo2`, `photo3`, `photo4`, `photo5`, `date_view`, `counter`) VALUES
(182, 0, NULL, 9, 28, 'Black', 'Men Black Solid Canvas Trainers', '22,23,24,.25', '<p>sasss</p>\r\n', 'men-black-solid-canvas-trainers', '2100', 2000, 10, 'men-black-solid-canvas-trainers_1594105394.jpg', 'men-black-solid-canvas-trainers_1594105405.jpg', 'men-black-solid-canvas-trainers_1594105417.jpg', '', '', '2020-07-01', 0),
(183, 0, NULL, 10, 28, 'Black', 'Women Black Ribbed Jersey Top', '22,23,24,.25', '<p>Women Black Ribbed Jersey Top</p>\r\n', 'women-black-ribbed-jersey-top', '2100', 2000, 10, 'assa_1594104892.jpg', 'assa_1594104908.jpg', 'assa_1594105364.jpg', 'assa_1594105376.jpg', NULL, '2020-07-06', 0),
(184, 0, NULL, 8, 28, 'Black', 'Women Black Solid Trainers', '22,23,24,.25', '<p>Women Black Solid Trainers</p>\r\n', 'women-black-solid-trainers', '2100', 2000, 10, 'women-black-solid-trainers_1594105273.jpg', 'women-black-solid-trainers_1594105285.jpg', NULL, NULL, NULL, '2020-07-06', 0),
(185, 0, NULL, 9, 28, 'Black', 'Women Black Solid Linen-blend Dress', 's,m,l', '<p>&nbsp;</p>\r\n\r\n<p>sa</p>\r\n', 'women-black-solid-linen-blend-dress', '2100', 1990, 10, 'women-black-solid-linen-blend-dress_1594106446.jpg', 'women-black-solid-linen-blend-dress_1594106460.jpg', 'women-black-solid-linen-blend-dress_1594106473.jpg', 'women-black-solid-linen-blend-dress_1594106489.jpg', NULL, '2020-07-06', 0),
(186, 0, NULL, 8, 28, 'Brown ', 'Women Camel Brown Double-Breasted Wool-Mix Coat', 's,m,l', '<p>Women Camel Brown Double-Breasted Wool-Mix Coat</p>\r\n', 'women-camel-brown-double-breasted-wool-mix-coat', '5999', 4999, 10, 'women-camel-brown-double-breasted-wool-mix-coat_1594107523.jpg', 'women-camel-brown-double-breasted-wool-mix-coat_1594107540.jpg', 'women-camel-brown-double-breasted-wool-mix-coat_1594107555.jpg', 'women-camel-brown-double-breasted-wool-mix-coat_1594107573.jpg', 'women-camel-brown-double-breasted-wool-mix-coat_1594107591.jpg', '2020-07-06', 0),
(187, 0, NULL, 8, 28, 'Red', 'Women Red Flared Dress', 'S, M, L, XL, XXL', '<p>Women Red Flared Dress</p>\r\n', 'women-red-flared-dress', '4999', 2999, 20, 'women-red-flared-dress_1594126988.jpg', 'women-red-flared-dress_1594127025.jpg', 'women-red-flared-dress_1594127079.jpg', 'women-red-flared-dress_1594127095.jpg', 'women-red-flared-dress_1594127110.jpg', '2020-07-06', 0),
(188, 0, NULL, 8, 28, 'White', 'Women White Solid Off-the-shoulder blouse', 'S, M, L, XL, XXL', '<p>h&amp;mWomen White Solid Off-the-shoulder blouse1</p>\r\n', 'women-white-solid-shoulder-blouse', '5999', 4999, 10, 'women-white-solid-shoulder-blouse_1594127360.jpg', 'women-white-solid-shoulder-blouse_1594127377.jpg', 'women-white-solid-shoulder-blouse_1594127393.jpg', 'women-white-solid-shoulder-blouse_1594127420.jpg', NULL, '2020-07-16', 0),
(189, 0, NULL, 8, 21, 'Blue ', 'Men Navy Blue Solid Piqu Shirt Muscle Fit', 'S, M, L, XL, XXL', '<p>Men Navy Blue Solid Piqu Shirt Muscle Fit</p>\r\n', 'men-navy-blue-solid-piqu-shirt-muscle-fit', '1599', 1499, 10, 'men-navy-blue-solid-piqu-shirt-muscle-fit_1594526798.jpg', 'men-navy-blue-solid-piqu-shirt-muscle-fit_1594526852.jpg', 'men-navy-blue-solid-piqu-shirt-muscle-fit_1594526873.jpg', 'men-navy-blue-solid-piqu-shirt-muscle-fit_1594526926.jpg', NULL, '2020-07-16', 0),
(190, 0, NULL, 8, 21, 'green', 'khan shadab', '22,23,24,.25', '<h1>asas</h1>\r\n', 'khan-shadab', '1200', 1000, 10, 'khan-shadab_1594910437.jpg', 'khan-shadab_1594910532.jpg', NULL, NULL, NULL, '2020-07-16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `pay_id`, `sales_date`) VALUES
(4, 18, 'MOJO0701005N84175347', '2020-07-01'),
(5, 18, 'MOJO0701J05N84175380', '2020-07-01'),
(6, 18, 'MOJO0714105N25194770', '2020-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size_status`) VALUES
(2, 'L'),
(3, 'XXL'),
(4, 'XL'),
(5, 'S');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `slider_photo` varchar(255) NOT NULL,
  `slider_type` int(11) NOT NULL DEFAULT '0',
  `slider_off` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_name`, `slider_photo`, `slider_type`, `slider_off`) VALUES
(7, '9', '9_1594199767.webp', 0, NULL),
(13, '2', '2_1583654965.jpg', 1, NULL),
(17, '1', '1_1594620393.jpg', 1, 20),
(18, '3', '3_1583655067.jpg', 1, NULL),
(19, '11', '93_1594199587.webp', 0, NULL),
(20, '15', 'sodfkh6siaa1.jpg', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sub_catslug` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_photo` varchar(255) NOT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `sub_catslug`, `type`, `cat_id`, `subcat_photo`, `added_on`) VALUES
(8, 'New Arrivals', 'New Arrivals', 'women_clothing', 2, '_1596859902.jpg', '2020-07-01'),
(9, 'Top Brands', 'Top Brands', 'women_clothing', 2, '_1596859961.jpg', '2020-07-16'),
(10, 'All Western Wear', 'All Western Wear', 'women_clothing', 2, '_1596860088.webp', '2020-07-16'),
(11, 'Shirts,Tops and Tees', 'Shirts,Tops and Tees', 'women_clothing', 2, '_1596860178.jpg', '2020-07-16'),
(12, 'Dresses', 'Dresses', 'women_clothing', 2, '_1596860313.jpg', '2020-07-16'),
(13, 'Jeans and Jeggings', 'Jeans and Jeggings', 'women_clothing', 2, '_1596860387.png', '2020-07-14'),
(14, 'All Ethic Wear', 'All Ethic Wear', 'women_clothing', 2, '_1596860534.jpeg', '2020-07-08'),
(15, 'Kurtas', 'Kurtas', 'women_clothing', 2, '_1596860598.webp', '2020-07-15'),
(16, 'Salwar Suits', 'Salwar Suits', 'women_clothing', 2, '_1596860661.webp', '2020-07-16'),
(17, 'Sarees', 'Sarees', 'women_clothing', 2, '', '2020-07-16'),
(18, 'Lingerie, Sleep and Lounge', 'Lingerie, Sleep and Lounge', 'women_clothing', 2, '', '2020-07-16'),
(19, 'Sportswear', 'Sportswear', 'women_clothing', 2, '', '2020-07-16'),
(20, 'Fashion Sandals', 'Fashion Sandals', 'women_shoes', 2, '', '2020-07-16'),
(21, 'Pumps and peeptoes', 'Pumps and peeptoes', 'women_shoes', 2, '', '2020-07-16'),
(22, 'Casual Shoes', 'Casual Shoes', 'women_shoes', 2, '', '2020-07-16'),
(23, 'Casual Slippers', 'Casual Slippers', 'women_shoes', 2, '', '2020-07-16'),
(24, 'Boots', 'Boots', 'women_shoes', 2, '', '2020-07-16'),
(25, 'Sports Shoes', 'Sports Shoes', 'women_shoes', 2, '', '2020-07-16'),
(26, 'Flip-Flops', 'Flip-Flops', 'women_shoes', 2, '', '2020-07-16'),
(27, 'Ethic Footwear', 'Ethic Footwear', 'women_shoes', 2, '', '2020-07-16'),
(28, 'Formal Shoes', 'Formal Shoes', 'women_shoes', 2, '', '2020-07-16'),
(29, 'Sunglasses', 'Sunglasses', 'women_sunglass', 2, '', '2020-07-16'),
(30, 'Spectale Frames', 'Spectale Frames', 'women_sunglass', 2, '', '2020-07-16'),
(31, 'Gold & rose-gold', 'Gold & rose-gold', 'women_watch', 2, '', '2020-07-16'),
(32, 'Stainless steel', 'Stainless steel', 'women_watch', 2, '', '2020-07-16'),
(33, 'Leather', 'Leather', 'women_watch', 2, '', '2020-07-16'),
(34, 'Gold Diamond jewellry', 'Gold Diamond jewellry', 'women_jewellery', 2, '', '2020-07-16'),
(35, 'Fashion Jewellery', 'Fashion Jewellery', 'women_jewellery', 2, '', '2020-07-16'),
(36, 'Silver Jewellery', 'Silver Jewellery', 'women_jewellery', 2, '', '2020-07-16'),
(37, 'Handbags', 'Handbags', 'women_handbag', 2, '', '2020-07-16'),
(38, 'Wallet', 'Wallet', 'women_handbag', 2, '', '2020-07-16'),
(39, 'Women Clothing', 'Women Clothing', 'women_banner', 2, 'jiiaaahsdias.jpg', '2020-07-16'),
(40, 'Silver Jawellery', 'Silver Jawellery', 'women_banner', 2, 'aabud31jaiid.jpg', '2020-07-16'),
(41, 'T-Shorts & Polos', 'T-Shorts & Polos', 'men_clothing', 1, '', '2020-07-16'),
(42, 'Shirts', 'Shirts', 'men_clothing', 1, '', '2020-07-16'),
(43, 'Jeans', 'Jeans', 'men_clothing', 1, '', '2020-07-16'),
(44, 'Trouser', 'Trouser', 'men_clothing', 1, '', '2020-07-16'),
(45, 'Innerwear', 'Innerwear', 'men_clothing', 1, '', '2020-07-16'),
(46, 'Sportswear.', 'Sportswear.', 'men_clothing', 1, '', '2020-07-16'),
(47, 'Sleep & Lounge wear', 'Sleep & Lounge wear', 'men_clothing', 1, '', '2020-07-16'),
(48, 'Ethnic Wear', 'Ethnic Wear', 'men_clothing', 1, '', '0000-00-00'),
(49, 'Ties, Shocks & Belts', 'Ties, Shocks & Belts', 'men_clothing', 1, '', '2020-07-16'),
(50, 'Sweaters', 'Sweaters', 'men_clothing', 1, '', '2020-07-16'),
(51, 'Jackets & Coats', 'Jackets & Coats', 'men_clothing', 1, '', '2020-07-16'),
(52, 'Sports Shoes.', 'Sports Shoes.', 'men_shoes', 1, '', '2020-07-16'),
(53, 'Formal Shoes.', 'Formal Shoes.', 'men_shoes', 1, '', '2020-07-16'),
(54, 'Casual Shoes.', 'Casual Shoes.', 'men_shoes', 1, '', '2020-07-16'),
(55, 'Sneakers', 'Sneakers', 'men_shoes', 1, '', '2020-07-16'),
(56, 'Flip-Flops.', 'Flip-Flops.', 'men_shoes', 1, '', '2020-07-16'),
(57, 'Loafers & Mocassians', 'Loafers & Mocassians', 'men_shoes', 1, '', '2020-07-16'),
(58, 'Boots.', 'Boots.', 'men_shoes', 1, '', '2020-07-16'),
(59, 'Sandals & Floaters.', 'Sandals & Floaters.', 'men_shoes', 1, '', '2020-07-16'),
(60, 'Thong Sandals', 'Thong Sandals', 'men_shoes', 1, '', '2020-07-16'),
(61, 'Boat Shoes', 'Boat Shoes', 'men_shoes', 1, '', '2020-07-16'),
(62, 'Metallic', 'Metallic', 'men_watches', 1, '', '2020-07-16'),
(63, 'Chronographs', 'Chronographs', 'men_watches', 1, '', '2020-07-16'),
(64, 'Leather.', 'Leather.', 'men_watches', 1, '', '2020-07-16'),
(65, 'Rings', 'Rings', 'men_jewellery', 1, '', '2020-07-16'),
(66, 'Braclets', 'Braclets', 'men_jewellery', 1, '', '2020-07-16'),
(67, 'Sunglasses.', 'Sunglasses.', 'men_eyewear', 1, '', '2020-07-16'),
(68, 'Spectacle Frames.', 'Spectacle Frames.', 'men_eyewear', 1, '', '2020-07-16'),
(69, 'Men\'s Clothing', 'Men\'s Clothing', 'men_banner', 1, 'jikgub1aia2a.jpg', '2020-07-16'),
(70, 'Running Shooes', 'Running Shooes', 'men_banner', 1, 'i421bsfjiddi.jpg', '2020-07-16'),
(71, 'Girls All Clothing', 'Girls All Clothing', 'girls_clothing', 3, '', '2020-07-16'),
(72, 'Tops & Tees', 'Tops & Tees', 'girls_clothing', 3, '', '2020-07-16'),
(73, 'Dresses .', 'Dresses .', 'girls_clothing', 3, '', '2020-07-16'),
(74, 'Pants', 'Pants', 'girls_clothing', 3, '', '2020-07-16'),
(75, 'Clothing Sets.', 'Clothing Sets.', 'girls_clothing', 3, '', '2020-07-16'),
(76, 'Baby Girl', 'Baby Girl', 'girls_clothing', 3, '', '2020-07-16'),
(77, 'Shoes..', 'Shoes..', 'girls_clothing', 3, '', '2020-07-16'),
(78, 'Watches..', 'Watches..', 'girls_clothing', 3, '', '2020-07-16'),
(79, 'Jewellery', 'Jewellery', 'girls_clothing', 3, '', '2020-07-16'),
(80, 'Sunglasses..', 'Sunglasses..', 'girls_clothing', 3, '', '2020-07-16'),
(81, 'T-Shirts..', 'T-Shirts..', 'boy_clothing', 3, '', '2020-07-16'),
(82, 'Boys All Clothing', 'Boys All Clothing', 'boys_clothing', 3, '', '2020-07-16'),
(83, 'T-Shirts.', 'T-Shirts.', 'boys_clothing', 3, '', '2020-07-16'),
(84, 'Shirts.', 'Shirts.', 'boys_clothing', 3, '', '2020-07-16'),
(85, 'Jeans.', 'Jeans.', 'boys_clothing', 3, '', '2020-07-16'),
(86, 'Pants.', 'Pants.', 'boys_clothing', 3, '', '2020-07-16'),
(87, 'clothing sets..', 'clothing sets..', 'boys_clothing', 3, '', '2020-07-16'),
(88, 'Baby Boy', 'Baby Boy', 'boys_clothing', 3, '', '2020-07-16'),
(89, 'Shoes.', 'Shoes.', 'boys_clothing', 3, '_1596861964.webp', '2020-07-16'),
(90, 'Watches.', 'Watches.', 'boys_clothing', 3, '_1596861913.webp', '2020-07-16'),
(91, 'Sunglasses...', 'Sunglasses...', 'boys_clothing', 3, '_1596861875.webp', '2020-07-16'),
(92, 'Jewellery...', 'Jewellery...', 'boys_clothing', 3, '_1596861778.jpg', '2020-07-16'),
(93, 'All Kids', 'All Kids', 'kids', 3, '_1596861294.jpg', '2020-07-16'),
(94, 'Clothing', 'Clothing', 'kids', 0, '_1596861209.jpg', '2020-07-16'),
(95, 'Shoes', 'Shoes', 'kids', 3, '_1596861165.jpg', '2020-07-16'),
(96, 'Watches', 'Watches', 'kids', 3, '_1596861097.jpeg', '2020-07-16'),
(97, 'Jewellery....', 'Jewellery....', 'kids', 3, '_1596860993.jpg', '2020-07-16'),
(98, 'Sunglasses....', 'Sunglasses....', 'kids', 3, '_1596860916.jpg', '2020-07-16'),
(99, 'School Bag', 'School Bag', 'kids', 3, '_1596860871.jpg', '2020-07-16'),
(100, 'clothing...', 'clothing...', 'baby', 3, '_1596860787.jpg', '2020-07-01'),
(101, 'Shoes...', 'Shoes...', 'baby', 3, '_1596860729.webp', '2020-07-16'),
(102, 'MAX | JUST LAUNCED', 'MAX | JUST LAUNCED', 'kids_img', 3, '_1593704999.jpg', '2020-07-16'),
(103, 'Boys Cloth', 'Boys Cloth', 'kids_img', 3, '_1593705038.jpg', '2020-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `last_login` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `gender` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(10) NOT NULL,
  `state` varchar(12) NOT NULL,
  `pincode` int(6) NOT NULL,
  `billingad_type` varchar(255) NOT NULL,
  `billing_add` varchar(255) NOT NULL,
  `billing_state` varchar(255) NOT NULL,
  `billing_city` varchar(255) NOT NULL,
  `billing_pincode` int(6) NOT NULL,
  `billing_mb` varchar(255) NOT NULL,
  `shippingaddress` varchar(255) NOT NULL,
  `shippingstate` varchar(255) NOT NULL,
  `shippingcity` varchar(255) NOT NULL,
  `shippingpincode` varchar(255) NOT NULL,
  `shippingad_type` varchar(11) NOT NULL,
  `shipping_mb` varchar(255) NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `last_login`, `client_id`, `gender`, `address`, `city`, `state`, `pincode`, `billingad_type`, `billing_add`, `billing_state`, `billing_city`, `billing_pincode`, `billing_mb`, `shippingaddress`, `shippingstate`, `shippingcity`, `shippingpincode`, `shippingad_type`, `shipping_mb`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(13, 'ks615044@gmail.com', '$2y$10$w9LYQk/rEwa5Xmn9FuXU/OJbTvzHIW6WlG56oaIwIOFnZ.l7MRbYu', 1, 'khan', 'shadab', 1595255061, 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', 'khan-shadab_1594910437.jpg', 1, 'ah5k2ad3bs61', 'dUZEMigGaRP9xKL', '2020-07-18'),
(17, 'skshadabkhojo@gmail.com', '$2y$10$IvsGInTSTnJpAiljaOmhYe1U8SfgKtA58FL1evzjFqtmCvApX/Nj2', 2, 'khan', 'shadab', 1595253307, 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 1, '1bk5s32h4sa6', 'saLZdjY1ento9pz', '2020-07-18'),
(18, 'ks579265@gmail.com', '$2y$10$FrZdg7QcqRZp76xs8zU5j.9oU..iHhbReOYUnQkSUdL0ENrriMQ9q', 0, 'Sk', 'Bolte', 1595254994, 0, '', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 1, '25sa4k1sbad3', 'saLZdjY1ento9pz', '2020-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL,
  `warehouse_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id`, `warehouse_name`, `address`, `city`, `state`, `pincode`) VALUES
(3, 'Mukesh Dress Market', 'sayeed Manzil', 'Thane', 'Maharashta', 400612),
(4, 'K.K MARKETS', '', 'MUMBRA', 'MAHARASHTRA', 400612),
(5, 'Supreme Market ', '', 'kurla', 'MAHARASHTRA', 400612);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `product_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`) VALUES
(1, 2, '186'),
(2, 13, '185');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigndelivery`
--
ALTER TABLE `assigndelivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_banner`
--
ALTER TABLE `category_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_offer`
--
ALTER TABLE `category_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_details`
--
ALTER TABLE `delivery_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_users`
--
ALTER TABLE `google_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pincode`
--
ALTER TABLE `pincode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
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
-- AUTO_INCREMENT for table `assigndelivery`
--
ALTER TABLE `assigndelivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_banner`
--
ALTER TABLE `category_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category_offer`
--
ALTER TABLE `category_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `delivery_details`
--
ALTER TABLE `delivery_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `google_users`
--
ALTER TABLE `google_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pincode`
--
ALTER TABLE `pincode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
