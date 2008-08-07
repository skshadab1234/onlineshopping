-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2008 at 08:38 PM
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
(64, 'Peppermind.webp', 'Peppermind', '3');

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
(207, 18, 24, 1);

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
(25, 0, NULL, 102, 22, 'Ted', 'Hx', 'Xh', '', 'hx', '267', 266, 'Db', 'hx.webp', '0000-00-00', 0);

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
(117, 'Preteens ( 12 yrs )', 'Preteens ( 12 yrs )', 'Kids', 'jshdjsa4f3ju.webp');

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
(18, 'ks615044@gmail.com', '$2y$10$V4YO0Eb.Yvo6a.MWA6bW1eGbDz/7IkEM5kv4tfNFje31J.HzHAjHG', 0, 'khan', 'shadab', 'sayeed manzil12111', 'THANE', 'MAHARASHTRA', 400613, 'Office', '', '', '', 0, '', '', '', '', '', '', '', '', 'youtube-t-shirt-men.jpg', 1, 'dhkb6a21a34s', '', '2020-02-18');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

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
