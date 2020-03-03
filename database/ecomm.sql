-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2020 at 11:15 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

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
(66, 'CALVIN KLEIN.png', 'CALVIN KLEIN', '2');

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
(210, 18, 61, 1);

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
(1, 'MEN', 'MEN', '_1583062158.webp'),
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
(6, 'jd3iobjaagua_1583064951.webp', 'Df', '2'),
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

--
-- Dumping data for table `delivery_details`
--

INSERT INTO `delivery_details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 2);

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
(1, 1, 1, 1, 'sayyed manzil', 'thane', 'Maharashtra', '400612', 'HOME', '7021918970', 'N/A'),
(2, 2, 2, 2, 'sayyed manzil1221', 'thane', 'KANPUR', '400612', 'OFFICE', '7012457885', 'N/A'),
(3, 3, 2, 1, '', '', '', '', '', '', '');

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
  `discount` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `category_id`, `subcategory_id`, `brand_id`, `color`, `name`, `size`, `description`, `slug`, `old_price`, `price`, `discount`, `photo`, `date_view`, `counter`) VALUES
(24, 0, NULL, 102, 22, 'Black & Grey', 'Roadster Men Black  & Grey Regular fit and checked shirt', 'X, Xl', '<p>Roadster Men Black &amp; Grey Regular fit and checked shirt&nbsp;</p>\r\n', 'roadster-men-black-grey-regular-fit-and-checked-shirt', '500', 459, '20%', 'roadster-men-black-grey-regular-fit-and-checked-shirt.webp', '0000-00-00', 0),
(27, 0, NULL, 101, 20, 'White', 'Nike T-Shirts For Men', 'xl', '<p>Nike T-Shirts For Men</p>\r\n', 'nike-t-shirts-men', '350', 200, '12%', 'nike-t-shirts-men_1583137047.jpg', '0000-00-00', 0),
(28, 0, NULL, 101, 22, 'Grey and Black', 'Roadster Tshirts - Buy Roadster Tshirts ', 'xl', '<p>Roadster Tshirts - Buy Roadster Tshirts&nbsp;</p>\r\n', 'roadster-tshirts-buy-roadster-tshirts', '600', 525, '20%', 'roadster-tshirts-buy-roadster-tshirts_1583137312.jpg', '0000-00-00', 0),
(29, 0, NULL, 96, 20, 'black', 'Nike Debuts Self-Fitting Smart-Sneaker ', 'UK, UK6, UK7', '<p>Nike Debuts Self-Fitting Smart-Sneaker&nbsp;</p>\r\n', 'nike-debuts-self-fitting-smart-sneaker', '1254', 950, '12%', '_1583146712.jpg', '0000-00-00', 0),
(30, 0, NULL, 94, 65, 'BLACK', 'Blazzer Pionner bRAND With new black color', 'xl', '<p>Blazzer Pionner bRAND With new black color</p>\r\n', 'blazzer-pionner-brand-new-black-color', '3542', 2500, '12%', '_1583147084.jpg', '0000-00-00', 0),
(31, 0, NULL, 94, 65, 'black', 'Pioneer Camp New style suit blazer men ', 'xl', '<p>Pioneer Camp New style suit blazer men&nbsp;</p>\r\n', 'pioneer-camp-new-style-suit-blazer-men', '700', 650, '12%', '_1583147349.webp', '0000-00-00', 0),
(32, 0, NULL, 94, 65, 'Grey', 'Royal Pioneer Corps Blazer', 'xl', '<p><a href=\"https://www.jointservicesclothing.com/Royal_Pioneer_Corps_Blazer/p1235663_14592024.aspx\" target=\"_blank\">Royal Pioneer Corps Blazer</a></p>\r\n', 'royal-pioneer-corps-blazer', '600', 564, '12%', 'royal-pioneer-corps-blazer_1583206698.jpg', '0000-00-00', 0),
(33, 0, NULL, 94, 21, 'Blue ', 'Allen Solly Suits & Blazers, Allen Solly Blue Blazer for Men ', 'XL, X, L', '<p>Allen Solly Suits &amp; Blazers, Allen Solly Blue Blazer for Men&nbsp;</p>\r\n', 'allen-solly-suits-blazers-allen-solly-blue-blazer-men', '3000', 2500, '5%', '_1583207005.jpg', '0000-00-00', 0),
(34, 0, NULL, 94, 21, 'Blue', 'Allen Solly Blue Blazer', 'xl, x, l', '<p>Allen Solly Blue Blazer</p>\r\n', 'allen-solly-blue-blazer', '2500', 2454, '5%', 'allen-solly-blue-blazer_1583207172.jpg', '0000-00-00', 0),
(35, 0, NULL, 94, 21, 'Maroon', ' Allen Solly Sport Suits & Blazers, Allen Solly Maroon Wimbledon Blazer for Men', 'xl, s, l, m', '<p>&nbsp;Allen Solly Sport Suits &amp; Blazers, Allen Solly Maroon Wimbledon Blazer for Men</p>\r\n', 'allen-solly-sport-suits-blazers-allen-solly-maroon-wimbledon-blazer-men', '3000', 2800, '20%', 'allen-solly-sport-suits-blazers-allen-solly-maroon-wimbledon-blazer-men_1583208707.jpg', '0000-00-00', 0),
(36, 0, NULL, 94, 21, 'Grey ', 'Allen Solly Grey Wimbledon Blazer', 'xl', '<p>Allen Solly Grey Wimbledon Blazer</p>\r\n', 'allen-solly-grey-wimbledon-blazer', '2500', 2000, '12%', 'allen-solly-grey-wimbledon-blazer_1583210057.png', '0000-00-00', 0),
(37, 0, NULL, 94, 21, 'Grey ', 'Allen Solly Grey Blazer', 'xl, l, s', '<p>Allen Solly Grey Blazer</p>\r\n', 'allen-solly-grey-blazer', '600', 560, '12%', '_1583218736.jpg', '0000-00-00', 0),
(38, 0, NULL, 94, 21, 'black', '  Allen Solly Black Blazer', 'xl, s', '<p>&nbsp; Allen Solly Black Blazer</p>\r\n', 'allen-solly-black-blazer', '650', 500, '11%', '_1583218867.jpg', '0000-00-00', 0),
(39, 0, NULL, 94, 21, 'maroon', ' Allen Solly Maroon Blazer for Men ', 'xl, s,l,xxl,xxl', '<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.allensolly.com/product/allen-solly-maroon-blazer-430436.html?source=similar\" target=\"_blank\">&nbsp;Allen Solly Maroon Blazer for Men&nbsp;</a></p>\r\n', 'allen-solly-maroon-blazer-men', '600', 500, '11%', '_1583219059.jpg', '0000-00-00', 0),
(40, 0, NULL, 94, 24, 'blue', '  Under Armour 1291660 Blazer Mens', 'standard', '<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.sportsdirect.com/under-armour-1291660-blazer-mens-369295\" target=\"_blank\">Under Armour 1291660 Blazer Mens</a></p>\r\n\r\n<p>&nbsp;</p>\r\n', 'under-armour-1291660-blazer-mens', '2000', 1000, '12%', 'under-armour-1291660-blazer-mens_1583219603.jpg', '0000-00-00', 0),
(41, 0, NULL, 96, 20, 'green', ' Nike Air Presto By You Custom Men\'s Shoe', '7,8,9,10', '<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.nike.com/u/air-presto-id-shoe-44988\" target=\"_blank\">Nike Air Presto By You Custom Men&#39;s Shoe</a></p>\r\n', 'nike-air-presto-you-custom-men-s-shoe', '5000', 3500, '12%', '_1583219752.jpg', '0000-00-00', 0),
(42, 0, NULL, 96, 20, 'black/white', ' Nike Men\'s Black/White Fly by Low Running Shoes (908973-001)', '7,8,9,10', '<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.amazon.in/Nike-Black-White-Running-908973-001/dp/B07JCRJGHK\" target=\"_blank\">Nike Men&#39;s Black/White Fly by Low Running Shoes (908973-001)</a></p>\r\n', 'nike-men-s-black-white-fly-low-running-shoes-908973-001', '1200', 1000, '5%', '_1583219880.jpg', '0000-00-00', 0),
(43, 0, NULL, 96, 20, 'white', ' AIR MAX AXIS W', '8,9,10', '<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.google.com/url?sa=i&amp;url=https%3A%2F%2Fwww.spartoo.eu%2FNike-AIR-MAX-AXIS-W-x15624508.php&amp;psig=AOvVaw1y9JnWLL-WeMmA2obUENu8&amp;ust=1583306036250000&amp;source=images&amp;cd=vfe&amp;ved=0CAkQjhxqFwoTCOiZk97g_ecCFQAAAAAdAAAAABAk\" target=\"_blank\">AIR MAX AXIS W</a></p>\r\n', 'air-max-axis-w', '1000', 800, '12%', '_1583219991.jpg', '0000-00-00', 0),
(44, 0, NULL, 96, 20, 'neon', '  Men - Nike The 10: Nike Air Force 1 Low \'Off White\' - Ao4606-700', '8,9,10', '<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.walmart.ca/en/ip/Nike-Men-Nike-The-10-Nike-Air-Force-1-Low-Off-White-Ao4606-700-Size-8/5QC681WL7OPZ\" target=\"_blank\">Nike - Men - Nike The 10: Nike Air Force 1 Low &#39;Off White&#39; - Ao4606-700</a></p>\r\n', 'men-nike-10-nike-air-force-1-low-white-ao4606-700', '1000', 800, '12%', '_1583220110.jpg', '0000-00-00', 0),
(45, 0, NULL, 96, 20, 'light blue', '  Air Max 97 Shanghai Kaleidoscope', '8,9,10', '<p><a href=\"https://wethenew.com/a/l/en/products/nike-air-max-97-shanghai-kaleidoscope\" target=\"_blank\">Air Max 97 Shanghai Kaleidoscope</a></p>\r\n', 'air-max-97-shanghai-kaleidoscope', '600', 300, '11%', '_1583220228.png', '0000-00-00', 0),
(46, 0, NULL, 96, 20, 'black', ' Nike Men\'s Metcon Sport Training Shoes', '8,9,10', '', 'nike-men-s-metcon-sport-training-shoes', '600', 500, '12%', '_1583220324.jpg', '0000-00-00', 0),
(47, 0, NULL, 118, 20, 'black', ' Nike Women Black AS W NSW AIR DRESS Printed T-shirt Dress', 'xl, s,xxl,l,m', '', 'nike-women-black-as-w-nsw-air-dress-printed-t-shirt-dress', '500', 400, '12%', '_1583220420.jpg', '0000-00-00', 0),
(48, 0, NULL, 101, 20, 'white', ' White Nike T-Shirt', 'xl, s', '', 'white-nike-t-shirt', '1000', 800, '11%', '_1583220492.jpg', '0000-00-00', 0),
(49, 0, NULL, 101, 20, 'greenish-blue', 'Nike Men\'s Polyester Sports T-Shirt ', 'xl, s', '', 'nike-men-s-polyester-sports-t-shirt', '2000', 1000, '50%', '_1583220578.jpg', '0000-00-00', 0),
(50, 0, NULL, 118, 20, 'black', ' Nike Black Solid AS W NK DRY T-shirt', 'xl', '<p>&nbsp;Nike Black Solid AS W NK DRY T-shirt</p>\r\n', 'nike-black-solid-as-w-nk-dry-t-shirt', '5000', 2500, '50%', '_1583220669.jpg', '0000-00-00', 0),
(51, 0, NULL, 118, 66, 'red', 'Disha Patani In Calvin Klein T-Shirt', 'xl, s', '<p>Disha Patani In Calvin Klein T-Shirt</p>\r\n', 'disha-patani-calvin-klein-t-shirt', '10000', 1000, '12%', '_1583220957.jpg', '0000-00-00', 0),
(52, 0, NULL, 118, 66, 'PINK', ' Calvin Klein T-Shirt', 'xl', '<p>&nbsp;Calvin Klein T-Shirt</p>\r\n', 'calvin-klein-t-shirt', '1000', 500, '11%', '_1583221085.jpg', '0000-00-00', 0),
(53, 0, NULL, 101, 66, 'BLACK', ' Calvin Klein  T-shirt In Black', 'xl, s', '<p>&nbsp;Calvin Klein &nbsp;T-shirt In Black</p>\r\n', 'calvin-klein-t-shirt-black', '500', 250, '12%', '_1583221180.jpg', '0000-00-00', 0),
(54, 0, NULL, 101, 66, 'BLACK', ' Urban T-Shirt blue / White | Calvin Klein Jeans T-Shirts', 'xl, s', '<p>&nbsp;T-Shirt blue / White | Calvin Klein Jeans T-Shirts</p>\r\n', 'urban-t-shirt-blue-white-calvin-klein-jeans-t-shirts', '1000', 500, '12%', '_1583221257.jpg', '0000-00-00', 0),
(55, 0, NULL, 118, 66, 'BLACK', ' Calvin Klein Cropped T-Shirt', 'xl, s', '<p>&nbsp;Calvin Klein Cropped T-Shirt</p>\r\n', 'calvin-klein-cropped-t-shirt', '500', 250, '12%', '_1583221330.jpg', '0000-00-00', 0),
(56, 0, NULL, 118, 66, 'BLUE', ' T-Shirt by Calvin Klein', 'xl, s', '<p>&nbsp;T-Shirt by Calvin Klein</p>\r\n', 't-shirt-calvin-klein', '2000', 1000, '12%', '_1583221405.jpg', '0000-00-00', 0),
(57, 0, NULL, 101, 66, 'GREEN', 'green classic 90 s calvin klein ', 'xl, s', '<p>green classic 90 s calvin klein&nbsp;</p>\r\n', 'green-classic-90-s-calvin-klein', '5000', 1200, '11%', '_1583221485.jpg', '0000-00-00', 0),
(58, 0, NULL, 93, 20, 'black', ' Nike wash hybrid French Terry short', 'xl, s', '<p>&nbsp;Nike wash hybrid French Terry short</p>\r\n', 'nike-wash-hybrid-french-terry-short', '150', 120, '11%', '_1583221669.jpg', '0000-00-00', 0),
(59, 0, NULL, 93, 20, 'maroon', 'Nike Fashion Underwear', '60-90', '<p>Nike Fashion Underwear</p>\r\n', 'nike-fashion-underwear', '2000', 1000, '11%', '_1583221784.jpg', '0000-00-00', 0),
(60, 0, NULL, 93, 20, 'green', ' Nike Pro Combat Men\'s 6 Compression Shorts Underwea', '60-95', '<p>&nbsp;Nike Pro Combat Men&#39;s 6 Compression Shorts Underwea</p>\r\n', 'nike-pro-combat-men-s-6-compression-shorts-underwea', '1000', 500, '12%', '_1583221897.jpg', '0000-00-00', 0),
(61, 0, NULL, 93, 20, 'grey', ' Nike Men`s Running Training Outdoor Underwear', '60-95', '<p>&nbsp;Nike Men`s Running Training Outdoor Underwear</p>\r\n', 'nike-men-s-running-training-outdoor-underwear', '800', 500, '11%', '_1583222005.jpg', '0000-00-00', 0),
(62, 0, NULL, 93, 20, 'red', 'nike underwear set', '60-100', '<p>nike underwear set</p>\r\n', 'nike-underwear-set', '500', 250, '11%', '_1583222240.jpg', '0000-00-00', 0),
(63, 0, NULL, 93, 20, 'blue', ' NIKE Nike half underwear short pants jersey - BULUE blue blue men ', '60-100', '<p>&nbsp;NIKE Nike half underwear short pants jersey - BULUE blue blue men&nbsp;</p>\r\n', 'nike-nike-half-underwear-short-pants-jersey-bulue-blue-blue-men', '500', 250, '12%', '_1583222309.jpg', '0000-00-00', 0),
(64, 0, NULL, 93, 20, 'white', ' Thermal Jersey Technical Underwear Nike', 'xl, s', '<p>&nbsp;Thermal Jersey Technical Underwear Nike</p>\r\n', 'thermal-jersey-technical-underwear-nike', '2000', 1000, '12%', '_1583222385.jpg', '0000-00-00', 0),
(65, 0, NULL, 93, 20, 'black', ' socks', 'standard', '<p>&nbsp;socks</p>\r\n', 'socks', '1000', 500, '11%', '_1583222484.jpg', '0000-00-00', 0),
(66, 0, NULL, 95, 20, 'steelblue', ' Buy Apple Watch Nike', '', '<p>&nbsp;Buy Apple Watch Nike</p>\r\n', 'buy-apple-watch-nike', '1500', 1200, '12%', '_1583228007.jpg', '0000-00-00', 0),
(67, 0, NULL, 95, 20, 'RED', 'Nike - Children\'s Watch, Steel Band, Red/Grey: Amazon.co ...', 'standard', '<p>Nike WD0139689 - Children&#39;s Watch, Steel Band, Red/Grey:&nbsp;</p>\r\n', 'nike-children-s-watch-steel-band-red-grey-amazon-co', '1500', 1100, '12%', '_1583229284.jpg', '0000-00-00', 0),
(68, 0, NULL, 95, 20, 'BLUE', ' Nike Kids\' R0017-607 Triax Junior Watch: Amazon.co.uk: Sports .', 'standard', '<p>Nike Kids&#39; R0017-607 Triax Junior Watch: Amazon.co.uk: Sports&nbsp;</p>\r\n', 'nike-kids-r0017-607-triax-junior-watch-amazon-co-uk-sports', '1300', 1000, '12%', '_1583229570.jpg', '0000-00-00', 0),
(69, 0, NULL, 96, 20, 'NAVY BLACK', ' eBay Nike Sock Dart Premium SE Mens Navy Casual Lifestyle Sneakers Shoes 859553-', '8-9-10', '<p><a href=\"https://www.google.com/url?sa=i&amp;url=https%3A%2F%2Fwww.ebay.com%2Fc%2F1074826354&amp;psig=AOvVaw0H5t1albeD8we-d5y7WC70&amp;ust=1583316271556000&amp;source=images&amp;cd=vfe&amp;ved=0CAkQjhxqFwoTCNjp9u6G_ucCFQAAAAAdAAAAABAH\" target=\"_blank\">Nike Sock Dart Premium SE Mens Navy Casual Lifestyle Sneakers Shoes 859553-</a></p>\r\n', 'ebay-nike-sock-dart-premium-se-mens-navy-casual-lifestyle-sneakers-shoes-859553', '7000', 4000, '12%', '_1583230095.jpg', '0000-00-00', 0),
(70, 0, NULL, 96, 20, 'red', ' Man\'s Nike Vandal High Supreme Casual Shoe Gym Red/black/white ', '8,9,10', '<p>&nbsp;Man&#39;s Nike Vandal High Supreme Casual Shoe Gym Red/black/white&nbsp;</p>\r\n', 'man-s-nike-vandal-high-supreme-casual-shoe-gym-red-black-white', '5000', 2500, '11%', '_1583230376.jpg', '0000-00-00', 0);

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
(1, 2, 'MOJO0218H05N63080432', '2020-02-18'),
(2, 6, 'MOJO0218T05N63080519', '2020-02-18'),
(3, 18, 'MOJO0228T05N09840185', '2020-02-28');

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
(118, 'T-Shirts (Women)', 'T-Shirts (Women)', 'women', '');

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
(18, 'ks615044@gmail.com', '$2y$10$V4YO0Eb.Yvo6a.MWA6bW1eGbDz/7IkEM5kv4tfNFje31J.HzHAjHG', 0, 'khan', 'shadab', 'sayeed manzil12111', 'THANE  ', 'MAHARASHTRA ', 400613, 'Office', '', '', '', 0, '', '', '', '', '', '', '', '', 'favicon.jpg', 1, 'dhkb6a21a34s', '', '2020-02-18');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
