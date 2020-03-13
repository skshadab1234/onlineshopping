-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2020 at 07:37 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

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
(94, '1', '6', '3', '1', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_image` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_image`, `brand_name`, `category`) VALUES
(20, 'Nike.webp', 'Nike', '1'),
(21, 'Allen Solly.webp', 'Allen Solly', '1'),
(22, 'Roadster.webp', 'Roadster', '1'),
(23, 'Gap.webp', 'Gap', '1'),
(24, 'Under Armour.webp', 'Under Armour', '1'),
(25, 'Wrogn.webp', 'Wrogn', '1'),
(26, 'Here Now.webp', 'Here Now', '1'),
(27, 'V8.webp', 'V8', '1'),
(28, 'H and M.webp', 'H and M', '1'),
(29, 'Mast and Harbour.webp', 'Mast and Harbour', '1'),
(30, 'Spaykar.webp', 'Spaykar', '1'),
(31, 'Wildcraft.webp', 'Wildcraft', '1'),
(32, 'Invictus.webp', 'Invictus', '1'),
(33, 'Levis.webp', 'Levis', '1'),
(34, 'Louis Philippie.webp', 'Louis Philippie', '1'),
(35, 'W.webp', 'W', '2'),
(36, 'Marks and spencer.webp', 'Marks and spencer', '2'),
(37, 'Only.webp', 'Only', '2'),
(38, 'Sangria.webp', 'Sangria', '2'),
(39, 'Biba.webp', 'Biba', '2'),
(40, 'Cult-sports.webp', 'Cult-sports', '2'),
(41, 'The Roadster.webp', 'The Roadster', '2'),
(42, 'Vishudh.webp', 'Vishudh', '2'),
(43, 'Caprese.webp', 'Caprese', '2'),
(44, 'Here Now..webp', 'Here Now.', '2'),
(45, 'Inddus.webp', 'Inddus', '2'),
(46, 'Ginni and Joy.webp', 'Ginni and Joy', '2'),
(47, 'Zaveri Pearls.webp', 'Zaveri Pearls', '2'),
(48, 'Dressberry.webp', 'Dressberry', '2'),
(49, 'Rothy Perkins.webp', 'Rothy Perkins', '2'),
(50, 'Allen Solly..webp', 'Allen Solly.', '3'),
(51, 'Kittens.webp', 'Kittens', '3'),
(52, 'Walktrendy.webp', 'Walktrendy', '3'),
(53, 'Next.webp', 'Next', '3'),
(54, 'Indian Terrain.webp', 'Indian Terrain', '3'),
(55, 'ahdbssak_1583053775.webp', 'Nautinati', '3'),
(56, 'CuteCumber.webp', 'CuteCumber', '3'),
(57, 'Mini Klub.webp', 'Mini Klub', '3'),
(58, 'U.S Pollo.webp', 'U.S Pollo', '3'),
(59, 'ksbdhaas_1583053991.webp', 'H and M.', '3'),
(60, 'Ginni and Jiny.webp', 'Ginni and Jiny', '3'),
(61, 'Yk.webp', 'Yk', '3'),
(62, 'United Color of Beneton.webp', 'United Color of Beneton', '3'),
(63, 'Gap kids.webp', 'Gap kids', '3'),
(64, 'Peppermind.webp', 'Peppermind', '3'),
(65, 'pionerr.png', 'pionerr', '1'),
(66, 'CALVIN KLEIN.png', 'CALVIN KLEIN', '2'),
(67, 'Hangup.png', 'Hangup', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(197, 17, 3, 1),
(201, 3, 1, 400),
(202, 3, 2, 11),
(203, 1, 21, 10),
(205, 14, 4, 1),
(292, 18, 62, 1);

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
(1, 'MENS', 'MEN', '_1583062158.webp'),
(2, 'WOMEN', 'WOMEN', '_1583062186.webp'),
(3, 'KIDS', 'KIDS', '_1583062200.webp');

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

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
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
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `category_id`, `subcategory_id`, `brand_id`, `color`, `name`, `size`, `description`, `slug`, `old_price`, `price`, `discount`, `photo`, `date_view`, `counter`) VALUES
(24, 0, NULL, 102, 22, 'Black & Grey', 'Roadster Men Black  & Grey Regular fit and checked shirt', 'X, Xl', '<p>Roadster Men Black &amp; Grey Regular fit and checked shirt&nbsp;</p>\r\n', 'roadster-men-black-grey-regular-fit-and-checked-shirt', '500', 459, 20, 'roadster-men-black-grey-regular-fit-and-checked-shirt.webp', '0000-00-00', 0),
(27, 0, NULL, 101, 20, 'White', 'Nike T-Shirts For Men', 'xl', '<p>Nike T-Shirts For Men</p>\r\n', 'nike-t-shirts-men', '350', 200, 12, 'nike-t-shirts-men_1583137047.jpg', '0000-00-00', 0),
(28, 0, NULL, 101, 22, 'Grey and Black', 'Roadster Tshirts - Buy Roadster Tshirts ', 'xl', '<p>Roadster Tshirts - Buy Roadster Tshirts&nbsp;</p>\r\n', 'roadster-tshirts-buy-roadster-tshirts', '600', 525, 20, 'roadster-tshirts-buy-roadster-tshirts_1583137312.jpg', '0000-00-00', 0),
(29, 0, NULL, 96, 20, 'black', 'Nike Debuts Self-Fitting Smart-Sneaker ', 'UK, UK6, UK7', '<p>Nike Debuts Self-Fitting Smart-Sneaker&nbsp;</p>\r\n', 'nike-debuts-self-fitting-smart-sneaker', '1254', 950, 12, '_1583146712.jpg', '0000-00-00', 0),
(30, 0, NULL, 94, 65, 'BLACK', 'Blazzer Pionner bRAND With new black color', 'xl', '<p>Blazzer Pionner bRAND With new black color</p>\r\n', 'blazzer-pionner-brand-new-black-color', '3542', 2500, 12, '_1583147084.jpg', '0000-00-00', 0),
(31, 0, NULL, 94, 65, 'black', 'Pioneer Camp New style suit blazer men ', 'xl', '<p>Pioneer Camp New style suit blazer men&nbsp;</p>\r\n', 'pioneer-camp-new-style-suit-blazer-men', '700', 650, 12, '_1583147349.webp', '0000-00-00', 0),
(32, 0, NULL, 94, 65, 'Grey', 'Royal Pioneer Corps Blazer', 'xl', '<p><a href=\"https://www.jointservicesclothing.com/Royal_Pioneer_Corps_Blazer/p1235663_14592024.aspx\" target=\"_blank\">Royal Pioneer Corps Blazer</a></p>\r\n', 'royal-pioneer-corps-blazer', '600', 564, 12, 'royal-pioneer-corps-blazer_1583206698.jpg', '0000-00-00', 0),
(33, 0, NULL, 94, 21, 'Blue ', 'Allen Solly Suits & Blazers, Allen Solly Blue Blazer for Men ', 'XL, X, L', '<p>Allen Solly Suits &amp; Blazers, Allen Solly Blue Blazer for Men&nbsp;</p>\r\n', 'allen-solly-suits-blazers-allen-solly-blue-blazer-men', '3000', 2500, 5, '_1583207005.jpg', '0000-00-00', 0),
(34, 0, NULL, 94, 21, 'Blue', 'Allen Solly Blue Blazer', 'xl, x, l', '<p>Allen Solly Blue Blazer</p>\r\n', 'allen-solly-blue-blazer', '2500', 2454, 5, 'allen-solly-blue-blazer_1583207172.jpg', '0000-00-00', 0),
(35, 0, NULL, 94, 21, 'Maroon', ' Allen Solly Sport Suits & Blazers, Allen Solly Maroon Wimbledon Blazer for Men', 'xl, s, l, m', '<p>&nbsp;Allen Solly Sport Suits &amp; Blazers, Allen Solly Maroon Wimbledon Blazer for Men</p>\r\n', 'allen-solly-sport-suits-blazers-allen-solly-maroon-wimbledon-blazer-men', '3000', 2800, 20, 'allen-solly-sport-suits-blazers-allen-solly-maroon-wimbledon-blazer-men_1583208707.jpg', '0000-00-00', 0),
(36, 0, NULL, 94, 21, 'Grey ', 'Allen Solly Grey Wimbledon Blazer', 'xl', '<p>Allen Solly Grey Wimbledon Blazer</p>\r\n', 'allen-solly-grey-wimbledon-blazer', '2500', 2000, 12, 'allen-solly-grey-wimbledon-blazer_1583210057.png', '0000-00-00', 0),
(37, 0, NULL, 94, 21, 'Grey ', 'Allen Solly Grey Blazer', 'xl, l, s', '<p>Allen Solly Grey Blazer</p>\r\n', 'allen-solly-grey-blazer', '600', 560, 12, '_1583218736.jpg', '0000-00-00', 0),
(38, 0, NULL, 94, 21, 'black', '  Allen Solly Black Blazer', 'xl, s', '<p>&nbsp; Allen Solly Black Blazer</p>\r\n', 'allen-solly-black-blazer', '650', 500, 11, '_1583218867.jpg', '0000-00-00', 0),
(39, 0, NULL, 94, 21, 'maroon', ' Allen Solly Maroon Blazer for Men ', 'xl, s,l,xxl,xxl', '<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.allensolly.com/product/allen-solly-maroon-blazer-430436.html?source=similar\" target=\"_blank\">&nbsp;Allen Solly Maroon Blazer for Men&nbsp;</a></p>\r\n', 'allen-solly-maroon-blazer-men', '600', 500, 11, '_1583219059.jpg', '0000-00-00', 0),
(40, 0, NULL, 94, 24, 'blue', '  Under Armour 1291660 Blazer Mens', 'standard', '<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.sportsdirect.com/under-armour-1291660-blazer-mens-369295\" target=\"_blank\">Under Armour 1291660 Blazer Mens</a></p>\r\n\r\n<p>&nbsp;</p>\r\n', 'under-armour-1291660-blazer-mens', '2000', 1000, 12, 'under-armour-1291660-blazer-mens_1583219603.jpg', '0000-00-00', 0),
(41, 0, NULL, 96, 20, 'green', ' Nike Air Presto By You Custom Men\'s Shoe', '7,8,9,10', '<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.nike.com/u/air-presto-id-shoe-44988\" target=\"_blank\">Nike Air Presto By You Custom Men&#39;s Shoe</a></p>\r\n', 'nike-air-presto-you-custom-men-s-shoe', '5000', 3500, 12, '_1583219752.jpg', '0000-00-00', 0),
(42, 0, NULL, 96, 20, 'black/white', ' Nike Men\'s Black/White Fly by Low Running Shoes (908973-001)', '7,8,9,10', '<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.amazon.in/Nike-Black-White-Running-908973-001/dp/B07JCRJGHK\" target=\"_blank\">Nike Men&#39;s Black/White Fly by Low Running Shoes (908973-001)</a></p>\r\n', 'nike-men-s-black-white-fly-low-running-shoes-908973-001', '1200', 1000, 5, '_1583219880.jpg', '0000-00-00', 0),
(43, 0, NULL, 96, 20, 'white', ' AIR MAX AXIS W', '8,9,10', '<p>AIR MAX AXIS W</p>\r\n', 'air-max-axis-w', '1000', 800, 12, '_1583219991.jpg', '0000-00-00', 0),
(44, 0, NULL, 96, 20, 'neon', '  Men - Nike The 10: Nike Air Force 1 Low \'Off White\' - Ao4606-700', '8,9,10', '<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.walmart.ca/en/ip/Nike-Men-Nike-The-10-Nike-Air-Force-1-Low-Off-White-Ao4606-700-Size-8/5QC681WL7OPZ\" target=\"_blank\">Nike - Men - Nike The 10: Nike Air Force 1 Low &#39;Off White&#39; - Ao4606-700</a></p>\r\n', 'men-nike-10-nike-air-force-1-low-white-ao4606-700', '1000', 800, 12, '_1583220110.jpg', '0000-00-00', 0),
(45, 0, NULL, 96, 20, 'light blue', '  Air Max 97 Shanghai Kaleidoscope', '8,9,10', '<p>Air Max 97 Shanghai Kaleidoscope</p>\r\n', 'air-max-97-shanghai-kaleidoscope', '600', 300, 11, '_1583220228.png', '0000-00-00', 0),
(46, 0, NULL, 96, 20, 'black', ' Nike Men\'s Metcon Sport Training Shoes', '8,9,10', '', 'nike-men-s-metcon-sport-training-shoes', '600', 500, 12, '_1583220324.jpg', '0000-00-00', 0),
(47, 0, NULL, 118, 20, 'black', ' Nike Women Black AS W NSW AIR DRESS Printed T-shirt Dress', 'xl, s,xxl,l,m', '', 'nike-women-black-as-w-nsw-air-dress-printed-t-shirt-dress', '500', 400, 12, '_1583220420.jpg', '0000-00-00', 0),
(48, 0, NULL, 101, 20, 'white', ' White Nike T-Shirt', 'xl, s', '', 'white-nike-t-shirt', '1000', 800, 11, '_1583220492.jpg', '0000-00-00', 0),
(49, 0, NULL, 101, 20, 'greenish-blue', 'Nike Men\'s Polyester Sports T-Shirt ', 'xl, s', '', 'nike-men-s-polyester-sports-t-shirt', '2000', 1000, 50, '_1583220578.jpg', '0000-00-00', 0),
(50, 0, NULL, 118, 20, 'black', ' Nike Black Solid AS W NK DRY T-shirt', 'xl', '<p>&nbsp;Nike Black Solid AS W NK DRY T-shirt</p>\r\n', 'nike-black-solid-as-w-nk-dry-t-shirt', '5000', 2500, 50, '_1583220669.jpg', '0000-00-00', 0),
(51, 0, NULL, 118, 66, 'red', 'Disha Patani In Calvin Klein T-Shirt', 'xl, s', '<p>Disha Patani In Calvin Klein T-Shirt</p>\r\n', 'disha-patani-calvin-klein-t-shirt', '10000', 1000, 12, '_1583220957.jpg', '0000-00-00', 0),
(52, 0, NULL, 118, 66, 'PINK', ' Calvin Klein T-Shirt', 'xl', '<p>&nbsp;Calvin Klein T-Shirt</p>\r\n', 'calvin-klein-t-shirt', '1000', 500, 11, '_1583221085.jpg', '0000-00-00', 0),
(55, 0, NULL, 118, 66, 'BLACK', ' Calvin Klein Cropped T-Shirt', 'xl, s', '<p>&nbsp;Calvin Klein Cropped T-Shirt</p>\r\n', 'calvin-klein-cropped-t-shirt', '500', 250, 12, '_1583221330.jpg', '0000-00-00', 0),
(56, 0, NULL, 118, 66, 'BLUE', ' T-Shirt by Calvin Klein', 'xl, s', '<p>&nbsp;T-Shirt by Calvin Klein</p>\r\n', 't-shirt-calvin-klein', '2000', 1000, 12, '_1583221405.jpg', '0000-00-00', 0),
(58, 0, NULL, 93, 20, 'black', ' Nike wash hybrid French Terry short', 'xl, s', '<p>&nbsp;Nike wash hybrid French Terry short</p>\r\n', 'nike-wash-hybrid-french-terry-short', '150', 120, 11, '_1583221669.jpg', '0000-00-00', 0),
(59, 0, NULL, 93, 20, 'maroon', 'Nike Fashion Underwear', '60-90', '<p>Nike Fashion Underwear</p>\r\n', 'nike-fashion-underwear', '2000', 1000, 11, '_1583221784.jpg', '0000-00-00', 0),
(60, 0, NULL, 93, 20, 'green', ' Nike Pro Combat Men\'s 6 Compression Shorts Underwea', '60-95', '<p>&nbsp;Nike Pro Combat Men&#39;s 6 Compression Shorts Underwea</p>\r\n', 'nike-pro-combat-men-s-6-compression-shorts-underwea', '1000', 500, 12, '_1583221897.jpg', '0000-00-00', 0),
(61, 0, NULL, 93, 20, 'grey', ' Nike Men`s Running Training Outdoor Underwear', '60-95', '<p>&nbsp;Nike Men`s Running Training Outdoor Underwear</p>\r\n', 'nike-men-s-running-training-outdoor-underwear', '800', 500, 11, '_1583222005.jpg', '0000-00-00', 0),
(62, 0, NULL, 93, 20, 'red', 'nike underwear set', '60-100', '<p>nike underwear set</p>\r\n', 'nike-underwear-set', '500', 250, 11, '_1583222240.jpg', '0000-00-00', 0),
(63, 0, NULL, 93, 20, 'blue', ' NIKE Nike half underwear short pants jersey - BULUE blue blue men ', '60-100', '<p>&nbsp;NIKE Nike half underwear short pants jersey - BULUE blue blue men&nbsp;</p>\r\n', 'nike-nike-half-underwear-short-pants-jersey-bulue-blue-blue-men', '500', 250, 12, '_1583222309.jpg', '0000-00-00', 0),
(64, 0, NULL, 93, 20, 'white', ' Thermal Jersey Technical Underwear Nike', 'xl, s', '<p>&nbsp;Thermal Jersey Technical Underwear Nike</p>\r\n', 'thermal-jersey-technical-underwear-nike', '2000', 1000, 12, '_1583222385.jpg', '0000-00-00', 0),
(65, 0, NULL, 93, 20, 'black', ' socks', 'standard', '<p>&nbsp;socks</p>\r\n', 'socks', '1000', 500, 11, '_1583222484.jpg', '0000-00-00', 0),
(66, 0, NULL, 95, 20, 'steelblue', ' Buy Apple Watch Nike', '', '<p>&nbsp;Buy Apple Watch Nike</p>\r\n', 'buy-apple-watch-nike', '1500', 1200, 12, '_1583228007.jpg', '0000-00-00', 0),
(67, 0, NULL, 95, 20, 'RED', 'Nike - Children\'s Watch, Steel Band, Red/Grey: Amazon.co ...', 'standard', '<p>Nike WD0139689 - Children&#39;s Watch, Steel Band, Red/Grey:&nbsp;</p>\r\n', 'nike-children-s-watch-steel-band-red-grey-amazon-co', '1500', 1100, 12, '_1583229284.jpg', '0000-00-00', 0),
(68, 0, NULL, 95, 20, 'BLUE', ' Nike Kids\' R0017-607 Triax Junior Watch: Amazon.co.uk: Sports .', 'standard', '<p>Nike Kids&#39; R0017-607 Triax Junior Watch: Amazon.co.uk: Sports&nbsp;</p>\r\n', 'nike-kids-r0017-607-triax-junior-watch-amazon-co-uk-sports', '1300', 1000, 12, '_1583229570.jpg', '0000-00-00', 0),
(69, 0, NULL, 96, 20, 'NAVY BLACK', ' eBay Nike Sock Dart Premium SE Mens Navy Casual Lifestyle Sneakers Shoes 859553-', '8-9-10', '<p><a href=\"https://www.google.com/url?sa=i&amp;url=https%3A%2F%2Fwww.ebay.com%2Fc%2F1074826354&amp;psig=AOvVaw0H5t1albeD8we-d5y7WC70&amp;ust=1583316271556000&amp;source=images&amp;cd=vfe&amp;ved=0CAkQjhxqFwoTCNjp9u6G_ucCFQAAAAAdAAAAABAH\" target=\"_blank\">Nike Sock Dart Premium SE Mens Navy Casual Lifestyle Sneakers Shoes 859553-</a></p>\r\n', 'ebay-nike-sock-dart-premium-se-mens-navy-casual-lifestyle-sneakers-shoes-859553', '7000', 4000, 12, '_1583230095.jpg', '0000-00-00', 0),
(70, 0, NULL, 96, 20, 'red', ' Man\'s Nike Vandal High Supreme Casual Shoe Gym Red/black/white ', '8,9,10', '<p>&nbsp;Man&#39;s Nike Vandal High Supreme Casual Shoe Gym Red/black/white&nbsp;</p>\r\n', 'man-s-nike-vandal-high-supreme-casual-shoe-gym-red-black-white', '5000', 2500, 11, '_1583230376.jpg', '0000-00-00', 0),
(71, 0, NULL, 94, 24, 'brown', ' Sportswear Rowing Crepe Blazer', 's,m,l,xl,xxl', '<p>&nbsp;Sportswear Rowing Crepe Blazer</p>\r\n', 'sportswear-rowing-crepe-blazer', '2000', 1000, 30, '_1583309493.jpeg', '0000-00-00', 0),
(72, 0, NULL, 94, 24, 'green', ' Blazer stretchy! NWT L NWT', 's,m,xl,xxl', '<p>&nbsp;Blazer stretchy! NWT L NWT</p>\r\n', 'blazer-stretchy-nwt-l-nwt', '1000', 750, 10, '_1583309615.jpg', '0000-00-00', 0),
(73, 0, NULL, 97, 21, 'grey', 'Allen Solly Grey Trousers', '34-40', '<p>Allen Solly Grey Trousers</p>\r\n', 'allen-solly-grey-trousers', '800', 500, 30, '_1583309721.jpg', '0000-00-00', 0),
(74, 0, NULL, 97, 21, 'browm', 'Casual Cotton Chinos Trousers Pants', '28-40', '<p>Casual Cotton Chinos Trousers Pants</p>\r\n', 'casual-cotton-chinos-trousers-pants', '2600', 2000, 11, '_1583309798.jpg', '0000-00-00', 0),
(75, 0, NULL, 97, 21, 'light blue', ' Mens Cotton Light Blue Trouser', '28-40', '<p>&nbsp;Mens Cotton Light Blue Trouser</p>\r\n', 'mens-cotton-light-blue-trouser', '2000', 1000, 12, '_1583309897.jpg', '0000-00-00', 0),
(76, 0, NULL, 97, 21, 'light pink', 'Sandy Slim Fit Pleat-Front Trousers', '28-40', '<p>Sandy Slim Fit Pleat-Front Trousers</p>\r\n', 'sandy-slim-fit-pleat-front-trousers', '2000', 1200, 20, '_1583309966.jpg', '0000-00-00', 0),
(77, 0, NULL, 97, 21, 'white', ' Kurta Pants ', '28-40', '<p>&nbsp;Kurta Pants&nbsp;</p>\r\n', 'kurta-pants', '500', 300, 10, '_1583310085.jpg', '0000-00-00', 0),
(78, 0, NULL, 97, 22, 'BLUE', 'Lino Pants ', '28-40', '<p>Lino Pants&nbsp;</p>\r\n', 'lino-pants', '3000', 2000, 10, '_1583310165.jpg', '0000-00-00', 0),
(79, 0, NULL, 97, 23, 'BROWN', 'Military Style Loose Fit Baggy Cargo Pants Men Multi Pocket Cargo Pants For Men Casual Cotton Straight ', '28-40', '<p>Military Style Loose Fit Baggy Cargo Pants Men Multi Pocket Cargo Pants For Men Casual Cotton Straight&nbsp;</p>\r\n', 'military-style-loose-fit-baggy-cargo-pants-men-multi-pocket-cargo-pants-men-casual-cotton-straight', '2500', 2000, 20, '_1583310256.jpg', '0000-00-00', 0),
(80, 0, NULL, 98, 21, 'RED', ' Maroon plain raw silk men-kurtas', 'XL', '<p>&nbsp;Maroon plain raw silk men-kurtas</p>\r\n', 'maroon-plain-raw-silk-men-kurtas', '2500', 2000, 3, '_1583310367.jpg', '0000-00-00', 0),
(81, 0, NULL, 98, 23, 'BLUE', 'Sayesha Mens\' Solid Blue Self Design Cotton Long Kurta ', 'S,M,L', '<p>Sayesha Mens&#39; Solid Blue Self Design Cotton Long Kurta&nbsp;</p>\r\n', 'sayesha-mens-solid-blue-self-design-cotton-long-kurta', '3000', 2000, 25, '_1583310467.jpg', '0000-00-00', 0),
(82, 0, NULL, 97, 23, 'PURPLE', ' Vastramay Men Purple Cotton Kurta ', 'XL,XXL', '<p>&nbsp;Vastramay Men Purple Cotton Kurta</p>\r\n', 'vastramay-men-purple-cotton-kurta', '1200', 1000, 10, '_1583310537.png', '0000-00-00', 0),
(83, 0, NULL, 98, 24, 'GREY', ' Grey Cowl Kurta Set', 'S,M,L,XL', '<p>&nbsp;Grey Cowl Kurta Set</p>\r\n', 'grey-cowl-kurta-set', '2500', 2000, 12, 'grey-cowl-kurta-set_1583310777.jpg', '0000-00-00', 0),
(84, 0, NULL, 98, 25, 'LIGHT ORANGE', ' Light Orange Embroidered Kurta ', 'S,M,L,XL', '<p>&nbsp;Light Orange Embroidered Kurta&nbsp;</p>\r\n', 'light-orange-embroidered-kurta', '2000', 1500, 20, 'light-orange-embroidered-kurta_1583310733.jpg', '0000-00-00', 0),
(85, 0, NULL, 98, 26, 'BROWN SILK', 'kurta pajama Silk Golden Kurta', 'S,M,L', '<p>kurta pajama Silk Golden Kurta</p>\r\n', 'kurta-pajama-silk-golden-kurta', '1000', 875, 12, '_1583310863.jpg', '0000-00-00', 0),
(86, 0, NULL, 98, 27, 'BLACK', 'Black Kurta Set', 'S,M', '<p>Black Kurta Set</p>\r\n', 'black-kurta-set', '2000', 1500, 12, 'black-kurta-set_1583311051.jpg', '0000-00-00', 0),
(87, 0, NULL, 98, 21, 'GREY', ' Grey Block Printed Kurta', 'XL', '<p>&nbsp;Grey Block Printed Kurta</p>\r\n', 'grey-block-printed-kurta', '4500', 2500, 30, '_1583310994.jpg', '0000-00-00', 0),
(88, 0, NULL, 99, 20, 'BLUE', 'Buy Sapper Mens Denim Jean 890483291(Denim Blue, Medium) ', '28-40', '<p>Buy Sapper Mens Denim Jean 890483291(Denim Blue, Medium)&nbsp;</p>\r\n', 'buy-sapper-mens-denim-jean-890483291-denim-blue-medium', '1000', 800, 12, '_1583311183.jpg', '0000-00-00', 0),
(89, 0, NULL, 99, 21, 'BLUE', ' Gap Skinny Built-In Flex Distressed Jeans', '28-42', '<p>&nbsp;Gap Skinny Built-In Flex Distressed Jeans</p>\r\n', 'gap-skinny-built-flex-distressed-jeans', '2000', 1000, 12, '_1583311254.jpg', '0000-00-00', 0),
(90, 0, NULL, 99, 22, 'BLACK', ' Pants Pencil Leg Hot Sale Cowboy Trousers', '28-44', '<p>&nbsp;Pants Pencil Leg Hot Sale Cowboy Trousers</p>\r\n', 'pants-pencil-leg-hot-sale-cowboy-trousers', '1000', 500, 12, '_1583311327.jpg', '0000-00-00', 0),
(91, 0, NULL, 99, 21, 'BLUE', ' Buy Stylish Men\'s Jeans', '28-44', '<p>&nbsp;- Buy Stylish Men&#39;s Jeans</p>\r\n', 'buy-stylish-men-s-jeans', '1200', 1000, 50, '_1583311415.jpg', '0000-00-00', 0),
(92, 0, NULL, 99, 22, 'BLUE', 'No Boundaries Men\'s Skinny Jean', '28-42', '<p>No Boundaries Men&#39;s Skinny Jean</p>\r\n', 'no-boundaries-men-s-skinny-jean', '1100', 1000, 15, '_1583311496.jpg', '0000-00-00', 0),
(93, 0, NULL, 99, 22, 'BLACK', 'Men’s denim - Organic denim', '22-40', '<p>Men&rsquo;s denim - Organic denim</p>\r\n', 'men-s-denim-organic-denim', '2000', 1500, 23, '_1583311613.jpg', '0000-00-00', 0),
(94, 0, NULL, 94, 67, 'Blue', 'Men Blue Solid Regular Fit Single-Breasted Blazer', 'x,xl', '<p>Men Blue Solid Regular Fit Single-Breasted Blazer</p>\r\n', 'men-blue-solid-regular-fit-single-breasted-blazer', '300', 200, 20, '_1583503842.webp', '0000-00-00', 0),
(95, 0, NULL, 94, 67, 'Black and White', 'Black & White Checked Slim Fit Blazer', 'x,xl,s', '<p>Black &amp; White Checked Slim Fit Blazer</p>\r\n', 'black-white-checked-slim-fit-blazer', '304', 205, 20, '_1583504016.webp', '0000-00-00', 0),
(96, 0, NULL, 94, 67, 'Blue', 'Blue Solid Single Breasted Casual Linen Blazer', 'xl', '<h1>Blue Solid Single Breasted Casual Linen Blazer</h1>\r\n', 'blue-solid-single-breasted-casual-linen-blazer', '255', 200, 20, 'blue-solid-single-breasted-casual-linen-blazer_1583504212.webp', '0000-00-00', 0),
(97, 0, NULL, 94, 67, 'Grey', 'Men Grey & Yellow Printed Bandhgala Blazer', 'x,xl', '<p>Men Grey &amp; Yellow Printed Bandhgala Blazer</p>\r\n', 'men-grey-yellow-printed-bandhgala-blazer', '600', 500, 20, '_1583504357.webp', '0000-00-00', 0),
(98, 0, NULL, 94, 67, 'Blue', 'Men Blue Self-Design Regular-Fit Bandhgala Blazer', 'x,xl', '<p>Men Blue Self-Design Regular-Fit Bandhgala Blazer</p>\r\n', 'men-blue-self-design-regular-fit-bandhgala-blazer', '600', 500, 20, '_1583504450.webp', '0000-00-00', 0),
(99, 0, NULL, 94, 67, 'Black', 'Men Black Solid Bandhgala Blazer', 'x,xl', '<p>Men Black Solid Bandhgala Blazer</p>\r\n', 'men-black-solid-bandhgala-blazer', '355', 205, 20, '_1583504554.webp', '0000-00-00', 0),
(100, 0, NULL, 94, 67, 'Black', 'Black Regular Fit Single-Breasted Ethnic Bandhgala Blazer', 'x,l', '<p>Black Regular Fit Single-Breasted Ethnic Bandhgala Blazer</p>\r\n', 'black-regular-fit-single-breasted-ethnic-bandhgala-blazer', '2500', 1000, 20, '_1583504630.webp', '0000-00-00', 0),
(101, 0, NULL, 94, 67, 'Blue', 'Men Solid Linen Single-Breasted Slim Fit Blaze', 'x,xl', '<p>Men Solid Linen Single-Breasted Slim Fit Blaze</p>\r\n', 'men-solid-linen-single-breasted-slim-fit-blaze', '5000', 3000, 20, 'men-solid-linen-single-breasted-slim-fit-blaze_1583504751.webp', '0000-00-00', 0),
(102, 0, NULL, 94, 67, 'Blue', 'Men Blue & Off-White Printed Single-Breasted Blazer', 'x,xl', '<p>Men Blue &amp; Off-White Printed Single-Breasted Blazer</p>\r\n', 'men-blue-white-printed-single-breasted-blazer', '5000', 2000, 20, '_1583504838.webp', '0000-00-00', 0),
(103, 0, NULL, 94, 67, 'White', 'Men White Self Design Tuxedo Blazer', 'x,xl', '<p>Men White Self Design Tuxedo Blazer</p>\r\n', 'men-white-self-design-tuxedo-blazer', '3020', 2500, 20, '_1583505041.webp', '0000-00-00', 0),
(104, 0, NULL, 94, 67, 'Blue', 'Men Blue & White Printed Bandhgala Blazer', 'x,xl', '<p>Men Blue &amp; White Printed Bandhgala Blazer</p>\r\n', 'men-blue-white-printed-bandhgala-blazer', '600', 580, 20, '_1583505193.webp', '0000-00-00', 0),
(105, 0, NULL, 94, 67, 'Black', 'Men Black & White Geometric Regular Fit Print Tuxedo Blazer', 'x,xl', '<p>Men Black &amp; White Geometric Regular Fit Print Tuxedo Blazer</p>\r\n', 'men-black-white-geometric-regular-fit-print-tuxedo-blazer', '3000', 2099, 20, 'men-black-white-geometric-regular-fit-print-tuxedo-blazer_1583505591.webp', '0000-00-00', 0),
(106, 0, NULL, 94, 67, 'Black', 'Men Black Velvet Regular Fit Single-Breasted Party Blazer', 'x,xl', '<p>Men Black Velvet Regular Fit Single-Breasted Party Blazer</p>\r\n', 'men-black-velvet-regular-fit-single-breasted-party-blazer', '3000', 2058, 20, '_1583505685.webp', '0000-00-00', 0),
(107, 0, NULL, 94, 67, 'Brown', 'Men Brown Printed Bandhgala Blazer', 'x,xl', '<p>Men Brown Printed Bandhgala Blazer</p>\r\n', 'men-brown-printed-bandhgala-blazer', '3000', 2399, 20, '_1583505764.webp', '0000-00-00', 0),
(108, 0, NULL, 94, 67, 'Pink', 'Men Black & Pink Printed Bandhgala Casual Blaze', 'x,xl', '<p>Men Black &amp; Pink Printed Bandhgala Casual Blaze</p>\r\n', 'men-black-pink-printed-bandhgala-casual-blaze', '3000', 2399, 20, '_1583505856.webp', '0000-00-00', 0),
(109, 0, NULL, 94, 67, 'Red ', 'Men Red Self Design Regular Fit Single-Breasted Blazer', 'x,xl', '<p>Men Red Self Design Regular Fit Single-Breasted Blazer</p>\r\n', 'men-red-self-design-regular-fit-single-breasted-blazer', '2000', 1979, 20, '_1583506209.webp', '0000-00-00', 0),
(110, 0, NULL, 94, 67, 'Black', 'Men Black Solid Pathani Kurta', 'x,xl', '<p>Men Black Solid Pathani Kurta</p>\r\n\r\n<h3>&nbsp;</h3>\r\n', 'men-black-solid-pathani-kurta', '3000', 2399, 20, '_1583506444.webp', '0000-00-00', 0),
(111, 0, NULL, 94, 67, 'Rust', 'Men Rust Printed Bandhgala', 'x,xl', '<p>Men Rust Printed Bandhgala</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'men-rust-printed-bandhgala', '2500', 1999, 20, '_1583506726.webp', '0000-00-00', 0),
(112, 0, NULL, 94, 67, 'Blue', 'Men Blue Solid Nehru Jacket', 'x,xl', '<p>Men Blue Solid Nehru Jacket</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'men-blue-solid-nehru-jacket', '2500', 2300, 20, 'men-blue-solid-nehru-jacket_1583507462.webp', '0000-00-00', 0),
(113, 0, NULL, 102, 21, 'black', ' Baby Clothes Men Shirts Legible Casual Social Formal Shirt Men', 's,m', '', 'baby-clothes-men-shirts-legible-casual-social-formal-shirt-men', '2000', 1200, 10, '_1583908748.jpg', '0000-00-00', 0),
(114, 0, NULL, 102, 22, 'pink', ' Mens Dress Shirts Cotton Solid Casual Shirt Men Slim Fit Plus Size Long ', 's,m', '', 'mens-dress-shirts-cotton-solid-casual-shirt-men-slim-fit-plus-size-long', '2000', 1200, 10, '_1583909842.webp', '0000-00-00', 0),
(115, 0, NULL, 93, 47, 'white', ' Innerwear  ', 's,m', '<p>&nbsp;Innerwear &nbsp;</p>\r\n', 'innerwear', '2000', 1200, 10, '_1584035418.jpg', '0000-00-00', 0),
(116, 0, NULL, 93, 22, 'red', ' Fashioning India Since 1968 ', 's,m', '<p>&nbsp;Fashioning India Since 1968&nbsp;</p>\r\n', 'fashioning-india-since-1968', '2000', 1200, 10, '_1584035504.jpg', '0000-00-00', 0),
(117, 0, NULL, 93, 21, 'black', ' Allen Solly Buy Allen Solly Innerwear for Men Online India | ', 's,m', '<p>&nbsp;Allen Solly Buy Allen Solly Innerwear for Men Online India |&nbsp;</p>\r\n', 'allen-solly-buy-allen-solly-innerwear-men-online-india', '2000', 1200, 10, '_1584035628.jpg', '0000-00-00', 0),
(118, 0, NULL, 93, 21, 'black', 'Allen Solly Black Brief', 's,m', '<p>Allen Solly Black Brief</p>\r\n', 'allen-solly-black-brief', '2000', 1200, 10, '_1584035744.jpg', '0000-00-00', 0),
(119, 0, NULL, 93, 21, 'white', 'Allen Solly White Brief', 's,m', '<p>Allen Solly White Brief</p>\r\n', 'allen-solly-white-brief', '2000', 1200, 10, '_1584035954.jpg', '0000-00-00', 0),
(120, 0, NULL, 93, 21, 'grey', 'Allen Solly Grey Brief', 's,m', '<p>Allen Solly Grey Brief</p>\r\n', 'allen-solly-grey-brief', '1000', 800, 10, '_1584036020.jpg', '0000-00-00', 0),
(121, 0, NULL, 93, 21, 'black', ' Allen Solly Navy Brief', 's,m', '<p>&nbsp;Allen Solly Navy Brief</p>\r\n', 'allen-solly-navy-brief', '2000', 1200, 10, '_1584036093.jpg', '0000-00-00', 0),
(122, 0, NULL, 93, 21, 'grey', ' Allen Solly Navy Brief vv', 's,m', '<p>&nbsp;Allen Solly Navy Brief vv</p>\r\n', 'allen-solly-navy-brief-vv', '2000', 1200, 10, '_1584036241.jpg', '0000-00-00', 0),
(123, 0, NULL, 93, 21, 'red', ' Allen Solly Navy Vest for Men ', '', '<p>&nbsp;Allen Solly Navy Vest for Men&nbsp;</p>\r\n', 'allen-solly-navy-vest-men', '2000', 1200, 0, '_1584036309.jpg', '0000-00-00', 0),
(124, 0, NULL, 93, 21, 'grey', ' Allen Solly Grey Vest', 's,m', '<p>&nbsp;Allen Solly Grey Vest</p>\r\n', 'allen-solly-grey-vest', '2000', 1200, 10, '_1584036385.jpg', '0000-00-00', 0),
(125, 0, NULL, 93, 21, 'light grey', 'allen Solly Innerwear Vests Jackets', 's,m', '<p>allen Solly Innerwear Vests Jackets</p>\r\n', 'allen-solly-innerwear-vests-jackets', '2000', 1200, 10, '_1584036488.jpg', '0000-00-00', 0),
(126, 0, NULL, 93, 24, 'grey', ' Under Armour Men\'s Compression Clothing ', 's,m', '<p>&nbsp;Under Armour Men&#39;s Compression Clothing&nbsp;</p>\r\n', 'under-armour-men-s-compression-clothing', '2000', 1200, 10, '_1584036596.webp', '0000-00-00', 0),
(127, 0, NULL, 93, 24, 'grey', 'under armour inner', 's,m', '<p>under armour inner</p>\r\n', 'under-armour-inner', '2000', 1200, 10, '_1584036714.jpg', '0000-00-00', 0),
(128, 0, NULL, 93, 24, 'black', ' Cricket Under Armour Lighter Longer PO Hoodie', 's,m', '<p><a href=\"https://www.prodirectcricket.com/products/Under-Armour-Lighter-Longer-PO-Hoodie-Black-Black-Mens-Clothing-1331609-001-196605.aspx\" target=\"_blank\">&nbsp;Cricket Under Armour Lighter Longer PO Hoodie</a></p>\r\n', 'cricket-under-armour-lighter-longer-po-hoodie', '2000', 1200, 10, '_1584036785.webp', '0000-00-00', 0),
(129, 0, NULL, 93, 24, 'black', ' under armour us females inners .', 's,m', '<p>&nbsp;under armour us females inners .</p>\r\n', 'under-armour-us-females-inners', '2000', 1200, 10, '_1584036903.jpg', '0000-00-00', 0),
(130, 0, NULL, 95, 20, 'black', 'Nike Series 5 GPS + Cellular 40mm Space Gray ', '', '<p>Nike Series 5 GPS + Cellular 40mm Space Gray</p>\r\n', 'nike-series-5-gps-cellular-40mm-space-gray', '2000', 1200, 10, '_1584037029.webp', '0000-00-00', 0),
(131, 0, NULL, 95, 20, 'black', ' Nike Oregon Square', '', '<p>&nbsp;Nike Oregon Square</p>\r\n', 'nike-oregon-square', '2000', 1200, 10, '_1584037103.jpg', '0000-00-00', 0),
(132, 0, NULL, 95, 20, 'black', ' Apple Watch Nike', '', '<p>&nbsp;Apple Watch Nike</p>\r\n', 'apple-watch-nike', '2000', 1200, 10, '_1584037225.jpeg', '0000-00-00', 0),
(133, 0, NULL, 95, 22, 'black', ' SPY The Best Menâ€™s Watches ', '', '<p>&nbsp;SPY The Best Men&rsquo;s Watches&nbsp;</p>\r\n', 'spy-best-men-s-watches', '500', 200, 10, '_1584037298.jpg', '0000-00-00', 0),
(134, 0, NULL, 95, 40, 'black', ' SPY The Best Menâ€™s Watches qq', '', '<p>&nbsp;SPY The Best Men&rsquo;s Watches qq</p>\r\n', 'spy-best-men-s-watches-qq', '1200', 1000, 10, '_1584037374.webp', '0000-00-00', 0),
(135, 0, NULL, 95, 23, 'black', 'Watch Smartwatch', '', '<p>Watch Smartwatch</p>\r\n', 'watch-smartwatch', '2000', 1200, 10, '_1584037445.jpg', '0000-00-00', 0),
(136, 0, NULL, 95, 22, 'black', 'Heritage 1921 - Men\'s Watch -', '', '<p>Heritage 1921 - Men&#39;s Watch -</p>\r\n', 'heritage-1921-men-s-watch', '2000', 1200, 10, '_1584037490.jpg', '0000-00-00', 0),
(137, 0, NULL, 95, 22, 'black', ' men\'s running stopwatch', '', '', 'men-s-running-stopwatch', '2000', 1200, 10, 'men-s-running-stopwatch_1584037763.jpg', '0000-00-00', 0),
(138, 0, NULL, 95, 22, 'brown', ' SHENGKE Women Watches', '', '', 'shengke-women-watches', '2000', 1200, 10, '_1584037594.jpg', '0000-00-00', 0),
(139, 0, NULL, 95, 23, 'black', 'SHENGKE Watches', '', '<p>SHENGKE Watches</p>\r\n', 'shengke-watches', '2000', 1200, 10, '_1584037663.jpg', '0000-00-00', 0),
(140, 0, NULL, 95, 22, 'black', 'Checkmate Black Dial Leather Strap Watch', 's,m', '<p>Checkmate Black Dial Leather Strap Watch</p>\r\n', 'checkmate-black-dial-leather-strap-watch', '2000', 1200, 10, '_1584037852.webp', '0000-00-00', 0),
(141, 0, NULL, 95, 23, 'black', ' Watches - Buy ', 's,m', '<p>&nbsp;Watches - Buy&nbsp;</p>\r\n', 'watches-buy', '2000', 1200, 10, '_1584037903.jpeg', '0000-00-00', 0),
(142, 0, NULL, 95, 24, 'pink', ' Men\'s Lacoste 12.12 ', '', '', 'men-s-lacoste-12-12', '2000', 1200, 10, '_1584037978.jpg', '0000-00-00', 0),
(143, 0, NULL, 95, 21, 'black', 'Curl Asia Beacon Black Leather', '', '<p>Curl Asia Beacon Black Leather</p>\r\n', 'curl-asia-beacon-black-leather', '2000', 1200, 10, '_1584038025.jpg', '0000-00-00', 0),
(144, 0, NULL, 95, 23, 'black', 'smartwatch, plus adult Marvel watches ', '', '<p>smartwatch, plus adult Marvel watches&nbsp;</p>\r\n', 'smartwatch-plus-adult-marvel-watches', '2000', 1200, 10, '_1584038121.webp', '0000-00-00', 0),
(145, 0, NULL, 95, 22, 'grey', ' Master Ultra Thin RÃ©serve', '', '<p>&nbsp;Master Ultra Thin R&eacute;serve</p>\r\n', 'master-ultra-thin-reserve', '2000', 1200, 10, '_1584038186.webp', '0000-00-00', 0),
(146, 0, NULL, 95, 23, 'brown', ' Master Ultra Thin RÃ©servet', '', '<p>&nbsp;Master Ultra Thin R&eacute;servet</p>\r\n', 'master-ultra-thin-reservet', '2000', 1200, 10, '_1584038256.jpg', '0000-00-00', 0),
(147, 0, NULL, 96, 21, 'dark grey', ' Allen Solly Footwear,', '', '<p>&nbsp;Allen Solly Footwear,</p>\r\n', 'allen-solly-footwear', '2000', 1200, 10, '_1584038412.jpg', '0000-00-00', 0),
(148, 0, NULL, 96, 21, 'grey', 'allen Solly Grey Casual Shoes', 's,m', '<p>allen Solly Grey Casual Shoes</p>\r\n', 'allen-solly-grey-casual-shoes', '2000', 1200, 10, '_1584038521.jpg', '0000-00-00', 0),
(149, 0, NULL, 95, 21, 'white', 'Allen Solly White Casual Shoes', 's,m', '<p>Allen Solly White Casual Shoes</p>\r\n', 'allen-solly-white-casual-shoes', '2000', 1200, 10, '_1584038581.jpg', '0000-00-00', 0),
(150, 0, NULL, 96, 21, 'black', ' Allen Solly Black Boots', 's,m', '<p>&nbsp;Allen Solly Black Boots</p>\r\n', 'allen-solly-black-boots', '2000', 1200, 10, '_1584038638.jpg', '0000-00-00', 0),
(151, 0, NULL, 96, 21, 'blue', 'Allen Solly Blue Casual Shoes', 's,m', '<p>Allen Solly Blue Casual Shoes</p>\r\n', 'allen-solly-blue-casual-shoes', '2000', 1200, 10, '_1584038701.jpg', '0000-00-00', 0),
(152, 0, NULL, 96, 21, 'black', ' ALLEN SOLLY SHOES', '', '<p>&nbsp;ALLEN SOLLY SHOES</p>\r\n', 'allen-solly-shoes', '2000', 1200, 10, 'allen-solly-shoes_1584038780.jpg', '0000-00-00', 0),
(153, 0, NULL, 96, 21, 'white', 'Allen Solly White Lace Up Shoes', 's,m', '<p>Allen Solly White Lace Up Shoes</p>\r\n', 'allen-solly-white-lace-up-shoes', '2000', 1200, 10, 'allen-solly-white-lace-up-shoes_1584038949.jpg', '0000-00-00', 0),
(154, 0, NULL, 96, 21, 'black', ' Allen solly aMen Black Casual Shoes', '', '<p>&nbsp;Allen solly aMen Black Casual Shoes</p>\r\n', 'allen-solly-amen-black-casual-shoes', '2000', 1200, 10, '_1584038897.jpg', '0000-00-00', 0),
(155, 0, NULL, 96, 21, 'brown', ' Allen Solly Brown Sneaker Shoes ', 's,m', '<p>&nbsp;Allen Solly Brown Sneaker Shoes&nbsp;</p>\r\n', 'allen-solly-brown-sneaker-shoes', '2000', 1200, 10, '_1584039034.jpg', '0000-00-00', 0),
(156, 0, NULL, 96, 21, 'green', ' Allen Solly green Sneaker Shoes ', 's,m', '<p>&nbsp;Allen Solly green Sneaker Shoes&nbsp;</p>\r\n', 'allen-solly-green-sneaker-shoes', '2000', 1200, 10, '_1584039092.jpeg', '0000-00-00', 0),
(157, 0, NULL, 97, 22, 'brown', 'Men Pants Custom Mens Chinos', '', '<p>Men Pants Custom Mens Chinos</p>\r\n', 'men-pants-custom-mens-chinos', '2000', 1200, 10, '_1584039215.jpg', '0000-00-00', 0),
(158, 0, NULL, 97, 23, 'green', ' Olive Green Solid Brooklyn Fit Chino Trousers', 's,m', '<p>&nbsp;Olive Green Solid Brooklyn Fit Chino Trousers</p>\r\n', 'olive-green-solid-brooklyn-fit-chino-trousers', '2000', 1200, 10, '_1584039439.jpg', '0000-00-00', 0),
(159, 0, NULL, 97, 24, 'blue', 'Slim Coastal Chinos', 's,m', '<p>Slim Coastal Chinos</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'slim-coastal-chinos', '2000', 1200, 10, '_1584039498.jpg', '0000-00-00', 0),
(160, 0, NULL, 97, 23, 'brown', 'Trousers & Chinos for Men', 's,m', '<p>Trousers &amp; Chinos for Men</p>\r\n', 'trousers-chinos-men', '2000', 1200, 10, '_1584039616.jpg', '0000-00-00', 0),
(161, 0, NULL, 97, 23, 'black', 'Chinos ', 's,m', '<p>Chinos</p>\r\n', 'chinos', '2000', 1200, 10, '_1584039696.jpeg', '0000-00-00', 0),
(162, 0, NULL, 97, 24, 'pink', ' Women\'s Cotton Lycra Official Pant', 's,m', '<p>&nbsp;Women&#39;s Cotton Lycra Official Pant</p>\r\n', 'women-s-cotton-lycra-official-pant', '2000', 1200, 10, '_1584039745.jpg', '0000-00-00', 0),
(163, 0, NULL, 97, 26, 'black', 'Men\'s Size 46 Inch Trousers', '46', '<p>Men&#39;s Size 46 Inch Trousers</p>\r\n', 'men-s-size-46-inch-trousers', '2000', 1200, 10, '_1584039931.jpg', '0000-00-00', 0),
(164, 0, NULL, 97, 30, 'brown', ' Men\'s clothes - Fashion.gr', 's,m', '<p>&nbsp;Men&#39;s clothes - Fashion.gr</p>\r\n', 'men-s-clothes-fashion-gr', '2000', 1200, 10, '_1584039988.jpg', '0000-00-00', 0),
(165, 0, NULL, 97, 33, 'red', ' Men\'s clothes - Fashion.gryy', 's,m', '<p>&nbsp;Men&#39;s clothes - Fashion.gryy</p>\r\n', 'men-s-clothes-fashion-gryy', '2000', 1200, 10, '_1584040035.jpg', '0000-00-00', 0),
(166, 0, NULL, 97, 27, 'white', 'Men\'s Trousers & Chinosff', 's,m', '<p>Men&#39;s Trousers &amp; Chinosff</p>\r\n', 'men-s-trousers-chinosff', '2000', 1200, 10, '_1584040104.jpg', '0000-00-00', 0),
(167, 0, NULL, 99, 20, 'blue', 'Plus Size Blue Stonewash Riot ', 's,m', '<p>Plus Size Blue Stonewash Riot</p>\r\n', 'plus-size-blue-stonewash-riot', '2000', 1200, 10, '_1584040220.jpg', '0000-00-00', 0),
(168, 0, NULL, 99, 23, 'blue', 'Butt Shaper Mid Rise Skinny Jeans ', 's,m', '', 'butt-shaper-mid-rise-skinny-jeans', '2000', 1200, 10, '_1584040306.jpg', '0000-00-00', 0),
(169, 0, NULL, 99, 23, 'black', 'Stretch Parkour Jeans', 's,m', '<p>Stretch Parkour Jeans</p>\r\n', 'stretch-parkour-jeans', '2000', 1200, 10, '_1584040358.jpg', '0000-00-00', 0),
(170, 0, NULL, 99, 27, 'black', ' Slim Fit Stretch Cotton Denim Jeans for Men | Emporio Armani', 's,m', '<p>Slim Fit Stretch Cotton Denim Jeans for Men | Emporio Armani</p>\r\n', 'slim-fit-stretch-cotton-denim-jeans-men-emporio-armani', '2000', 1200, 10, '_1584040425.jpg', '0000-00-00', 0),
(171, 0, NULL, 99, 26, 'black', ' Jeans Fit Guide', 's,m', '<p>&nbsp;Jeans Fit Guide</p>\r\n', 'jeans-fit-guide', '2000', 1200, 10, 'jeans-fit-guide_1584040601.jpg', '0000-00-00', 0),
(172, 0, NULL, 99, 21, 'black', ' Solly Jeans & Jeggings', 's,m', '<p>&nbsp;Solly Jeans &amp; Jeggings</p>\r\n', 'solly-jeans-jeggings', '2000', 1200, 10, '_1584040669.jpg', '0000-00-00', 0),
(173, 0, NULL, 101, 20, 'white', ' Nike  Sportswear Men\'s T-Shirt 4', 's,m', '<p>&nbsp;Nike &nbsp;Sportswear Men&#39;s T-Shirt 4</p>\r\n', 'nike-sportswear-men-s-t-shirt-4', '2000', 1200, 10, '_1584040815.jpg', '0000-00-00', 0),
(174, 0, NULL, 101, 20, 'white', ' Nike Sportswear Men\'s T-Shirt 46', 's,m', '<p>&nbsp;Nike Sportswear Men&#39;s T-Shirt 46</p>\r\n', 'nike-sportswear-men-s-t-shirt-46', '2000', 1200, 10, '_1584040906.jpg', '0000-00-00', 0),
(175, 0, NULL, 101, 20, 'black', ' Nike SB Floral Old School', 's,m', '<p>&nbsp;Nike SB Floral Old School</p>\r\n', 'nike-sb-floral-old-school', '2000', 1200, 10, '_1584040979.jpg', '0000-00-00', 0),
(176, 0, NULL, 101, 20, 'black', ' Nike SB Floral Old School 67', 's,m', '<p>&nbsp;Nike SB Floral Old School 67</p>\r\n', 'nike-sb-floral-old-school-67', '2000', 1200, 10, '_1584041033.jpg', '0000-00-00', 0),
(177, 0, NULL, 101, 20, 'white', ' Nike SB Floral Old School 678', 's,m', '<p>&nbsp;Nike SB Floral Old School 678</p>\r\n', 'nike-sb-floral-old-school-678', '2000', 1200, 10, '_1584041086.jpeg', '0000-00-00', 0),
(178, 0, NULL, 101, 20, 'black', ' Nike SB Floral Old School 67888', 's,m', '<p>&nbsp;Nike SB Floral Old School 67888</p>\r\n', 'nike-sb-floral-old-school-67888', '2000', 1200, 10, '_1584041132.jpg', '0000-00-00', 0),
(179, 0, NULL, 101, 20, 'black', ' Nike ohohohSB Floral Old School 67888', 's,m', '<p>&nbsp;Nike ohohohSB Floral Old School 67888</p>\r\n', 'nike-ohohohsb-floral-old-school-67888', '', 1200, 10, '_1584041183.jpg', '0000-00-00', 0),
(180, 0, NULL, 102, 23, 'black', 'SN Casual Shirts for Men,', 's,m', '<p>&nbsp;Casual Shirts for Men,</p>\r\n', 'sn-casual-shirts-men', '2000', 1200, 10, '_1584041264.jpg', '0000-00-00', 0),
(181, 0, NULL, 102, 29, 'black', ' Casual Shirts for Men,8', 's,m', '<p>&nbsp;Casual Shirts for Men,8</p>\r\n', 'casual-shirts-men-8', '2000', 1200, 10, '_1584041314.jpg', '0000-00-00', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `slider_photo` varchar(255) NOT NULL,
  `slider_type` int(11) NOT NULL DEFAULT 0,
  `slider_off` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_name`, `slider_photo`, `slider_type`, `slider_off`) VALUES
(7, '97', 'a13aojjga6b4.jpg', 0, NULL),
(13, '2', '2_1583654965.jpg', 1, NULL),
(17, '1', '1_1583654498.jpg', 1, 20),
(18, '3', '3_1583655067.jpg', 1, NULL),
(19, '93', '0_1583655837.jpg', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sub_catslug` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `subcat_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `sub_catslug`, `type`, `subcat_photo`) VALUES
(91, 'MEN', 'MEN', 'Him', '_1583039922.webp'),
(92, 'women', 'women', 'Her', '_1583060819.webp'),
(93, 'Innerwear ', 'Innerwear ', 'men', '_1583040123.webp'),
(94, 'Blazzer and suits', 'Blazzer and suits', 'men', '_1583040177.webp'),
(95, 'Watches', 'Watches', 'men', '_1583040586.webp'),
(96, 'Casual Shoes', 'Casual Shoes', 'men', 'a2jfskjid4bd.webp'),
(97, 'Trousers and Chinnos', 'Trousers and Chinnos', 'men', '6ufa2jjajds5.webp'),
(98, 'Kurtas and kurtas sets', 'Kurtas and kurtas sets', 'men', 'buadaj1ds5jh.webp'),
(99, 'Jeans', 'Jeans', 'men', 'd5asahiaga3s.webp'),
(101, 'T-shirts', 'T-shirts', 'men', 'j13ssa4bd6ja.webp'),
(102, 'Shirts', 'Shirts', 'men', 'sif4ud5j3aao.webp'),
(103, 'Dresses', 'Dresses', 'women', 'hgsafoiijaku.webp'),
(104, 'Kurtas and kurtas set', 'Kurtas and kurtas set', 'women', 'ujfadi3dj61i.webp'),
(105, 'Tops', 'Tops', 'women', '36da2oisbisg.webp'),
(106, 'Women Jeans', 'Women Jeans', 'women ', 'aoiad2db5h4s.webp'),
(107, 'Flats and heels', 'Flats and heels', 'women ', 'iiafoui3jhgj.webp'),
(108, 'Sarees', 'Sarees', 'women', 'aioa5k4hiafj.webp'),
(109, 'Handbags', 'Handbags', 'women', 'hasi6juoaj2d.webp'),
(110, 'Jewellery ', 'Jewellery ', 'women', 'uaa36i5j4jbj.webp'),
(111, 'Beauty and Makeup', 'Beauty and Makeup', 'women', 'ias2iji1d6jk.webp'),
(112, 'brands', 'brands', 'Him', 'sdofd3j4ao12.webp'),
(113, 'Kids', 'Kids', '', 'ia1odj32a56g.webp'),
(114, 'Babies (0 - 2 yrs)', 'Babies (0 - 2 yrs)', 'Kids', 'iaaj45dada1f.webp'),
(115, 'Toddlers (2 - 6 yrs)', 'Toddlers (2 - 6 yrs)', 'Kids', 'sfgi6aj1k3js.webp'),
(116, 'Kids (6 - 12 yrs)', 'Kids (6 - 12 yrs)', 'Kids', 'a5ahjjasusoi.webp'),
(117, 'Preteens ( 12 yrs )', 'Preteens ( 12 yrs )', 'Kids', 'jshdjsa4f3ju.webp'),
(118, 'T-Shirts (Women)', 'T-Shirts (Women)', 'women', '_1583412528.jpg');

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

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `city`, `state`, `pincode`, `billingad_type`, `billing_add`, `billing_state`, `billing_city`, `billing_pincode`, `billing_mb`, `shippingaddress`, `shippingstate`, `shippingcity`, `shippingpincode`, `shippingad_type`, `shipping_mb`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(1, 'offical@admin.com', '$2y$10$wBHwxev2QtoswmAsZGTokeLmw7EMBC23wg8abymd3kNB0ItTqkf.q', 1, 'Khan', 'Shadab', 'sayeed manzil121', 'Dunstan', 'South Austra', 400612, '', '', '', '', 0, '', '', '', '', '', '0', '', '', 'youtube-t-shirt-men.jpg', 1, '', '5kU3wiLICtjlqNG', '2018-05-01'),
(2, 'skshadabkhojo@gmail.com', '$2y$10$uLq.51bDz3FM9O1hIEI6P.kD2tFCpjO8QHXYinIePYgDbUARrhoQm', 2, 'Anas', 'Shaikh', 'mumbra', 'Andheri  ', 'Mumbai  ', 400612, 'Home', 'as', '', '', 0, '', '', '', '', '', '', '', '7021918970', 'favicon.jpg', 1, '', '', '2019-12-09'),
(6, 'shadab@gmail.com', '$2y$10$YJXUI4EJW2WsIGpufpC40u9VRW20.SYgcKVvyn.apLGBT7T8/K.VO', 2, 'Shadab', 'Khan', '64555', '', '', 0, 'Home', 'sayeed manzil', 'Maharashtra', 'Thane', 400612, '7021918970', 'Suresh Nagar', 'Maharashtra', 'Thane', '400612', 'Home', '702191860', '', 'PicsArt_11-21-08.jpg', 1, '', '', '2020-01-10'),
(14, 'madihasayyed99@gmail.com', '$2y$10$OiyirtsGjnUhzIdkvBjlke2ekPlV7jkLoGlsH/GQ1yoNtO0H6Kwzm', 0, 'madiha', 'kadiri', '', '', '', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', 'women.webp', 1, 'h5k41ss6ab3d', '', '2020-01-21'),
(18, 'ks615044@gmail.com', '$2y$10$V4YO0Eb.Yvo6a.MWA6bW1eGbDz/7IkEM5kv4tfNFje31J.HzHAjHG', 0, 'khan', 'shadab', 'sayeed manzil12111', 'THANE    ', 'MAHARASHTRA ', 400613, 'Office', '', '', '', 0, '', '', '', '', '', '', '', '', 'favicon.jpg', 1, 'dhkb6a21a34s', '', '2020-02-18');

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
  `product_id` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category_banner`
--
ALTER TABLE `category_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category_offer`
--
ALTER TABLE `category_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `delivery_details`
--
ALTER TABLE `delivery_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pincode`
--
ALTER TABLE `pincode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
