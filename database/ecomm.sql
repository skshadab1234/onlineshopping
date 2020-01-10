-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2020 at 09:47 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

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
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `pincode` int(6) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `streetaddress` varchar(255) NOT NULL,
  `addresstype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(130, 9, 3, 111),
(131, 17, 2, 1121),
(137, 19, 1, 2),
(141, 15, 3, 121213),
(142, 15, 6, 1),
(146, 13, 14, 1),
(147, 13, 2, 1),
(148, 13, 3, 1),
(150, 20, 19, 11),
(155, 4, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(1, 'MEN', 'MEN'),
(2, 'WOMEN', 'WOMEN'),
(3, 'KIDS', 'KIDS');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `id` int(11) NOT NULL,
  `deals_id` varchar(100) NOT NULL,
  `d_name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `d_img` varchar(20) NOT NULL,
  `d_price` varchar(100) NOT NULL,
  `old_price` varchar(100) NOT NULL,
  `discount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `deals_id`, `d_name`, `slug`, `d_img`, `d_price`, `old_price`, `discount`) VALUES
(1, '99', 'sk', 'sk', 'banner/banner4.jpg', '100', '200', '-20%');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(8, 7, 16, 1),
(9, 8, 14, 1),
(10, 9, 1, 1),
(11, 10, 1, 1),
(12, 11, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `google_users`
--

CREATE TABLE `google_users` (
  `id` int(11) NOT NULL,
  `clint_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `google_email` varchar(60) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `picture_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `google_users`
--

INSERT INTO `google_users` (`id`, `clint_id`, `name`, `last_name`, `google_email`, `gender`, `picture_link`) VALUES
(1, '112819622979604715234', 'SHADABZONE', '', 'ks615044@gmail.com', '', 'https://lh6.googleusercontent.com/-I0A6Csu0O1U/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rccz18RPpf9b92bG_icF5DeUiLlKQ/photo.jpg'),
(2, '111390966180740256479', 'skshadabkhojo', '', 'skshadabkhojo@gmail.com', '', 'https://lh3.googleusercontent.com/a-/AAuE7mDxEkAArCFENNBQ0QjMdgWOiXdgvyN4B6_qNsYu'),
(3, '117994331249149974133', 'hey mr', 'ak', 'flameboyak01@gmail.com', '', 'https://lh3.googleusercontent.com/a-/AAuE7mAjk-v8wS0floIr3ayq901k7Lj2vRSmK0mynhVvkA'),
(4, '117994331249149974133', 'hey mr', 'ak', 'flameboyak01@gmail.com', '', 'https://lh3.googleusercontent.com/a-/AAuE7mAjk-v8wS0floIr3ayq901k7Lj2vRSmK0mynhVvkA'),
(5, '117994331249149974133', 'hey mr', 'ak', 'flameboyak01@gmail.com', '', 'https://lh3.googleusercontent.com/a-/AAuE7mAjk-v8wS0floIr3ayq901k7Lj2vRSmK0mynhVvkA'),
(6, '101969078836697452946', 'all in', 'one video', 'ks579265@gmail.com', '', 'https://lh3.googleusercontent.com/a-/AAuE7mAyIv5IITttgKJqHSTVJphAwqeJOxSemXKzpLFz'),
(7, '101969078836697452946', 'all in', 'one video', 'ks579265@gmail.com', '', 'https://lh3.googleusercontent.com/a-/AAuE7mAyIv5IITttgKJqHSTVJphAwqeJOxSemXKzpLFz'),
(8, '101969078836697452946', 'all in', 'one video', 'ks579265@gmail.com', '', 'https://lh3.googleusercontent.com/a-/AAuE7mAyIv5IITttgKJqHSTVJphAwqeJOxSemXKzpLFz'),
(9, '112819622979604715234', 'SHADABZONE', '', 'ks615044@gmail.com', '', 'https://lh6.googleusercontent.com/-I0A6Csu0O1U/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rccz18RPpf9b92bG_icF5DeUiLlKQ/photo.jpg'),
(10, '112819622979604715234', 'SHADABZONE', '', 'ks615044@gmail.com', '', 'https://lh6.googleusercontent.com/-I0A6Csu0O1U/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rccz18RPpf9b92bG_icF5DeUiLlKQ/photo.jpg'),
(11, '112819622979604715234', 'SHADABZONE', '', 'ks615044@gmail.com', '', 'https://lh6.googleusercontent.com/-I0A6Csu0O1U/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rccz18RPpf9b92bG_icF5DeUiLlKQ/photo.jpg'),
(12, '112819622979604715234', 'SHADABZONE', '', 'ks615044@gmail.com', '', 'https://lh6.googleusercontent.com/-I0A6Csu0O1U/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rccz18RPpf9b92bG_icF5DeUiLlKQ/photo.jpg'),
(13, '112819622979604715234', 'SHADABZONE', '', 'ks615044@gmail.com', '', 'https://lh6.googleusercontent.com/-I0A6Csu0O1U/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rccz18RPpf9b92bG_icF5DeUiLlKQ/photo.jpg'),
(14, '112819622979604715234', 'SHADABZONE', '', 'ks615044@gmail.com', '', 'https://lh6.googleusercontent.com/-I0A6Csu0O1U/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rccz18RPpf9b92bG_icF5DeUiLlKQ/photo.jpg');

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
  `category_id` int(11) NOT NULL,
  `deals` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
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

INSERT INTO `products` (`id`, `product_code`, `category_id`, `deals`, `color`, `brand`, `name`, `size`, `description`, `slug`, `old_price`, `price`, `discount`, `photo`, `date_view`, `counter`) VALUES
(1, 121121, 1, '99', 'Black', 'Hanes ', 'Hanes Men\'s Pullover EcoSmart Fleece Black Hooded Sweatshirt', 'S, M', '<blockquote>\r\n<ul>\r\n	<li>5% polyester created from recycled plastic bottles</li>\r\n	<li>Imported</li>\r\n	<li>Pull On closure</li>\r\n	<li>Machine Wash</li>\r\n	<li>0.7&quot; high</li>\r\n	<li>14&quot; wide</li>\r\n	<li>50% cotton 50% polyester</li>\r\n</ul>\r\n</blockquote>\r\n', 'hanes-men-s-pullover-ecosmart-fleece-black-hooded-sweatshirt', '120', 100, '20%', 'hanes-men-s-pullover-ecosmart-fleece-black-hooded-sweatshirt.jpg', '2019-12-08', 2),
(2, 121232, 1, '99', 'GREY', 'BALEAF', 'BALEAF Men\'s UPF 50+ Sun Protection Hoodie', 'S', '<ul>\r\n	<li>100% Polyester; Sun Protection; Fashionable(Mode Size M)</li>\r\n	<li>Imported</li>\r\n	<li>Technical breathable fabric wicks moisture away from your skin, breathes freely and dries quickly for cool comfort</li>\r\n	<li>Low profile thumbholes help keep sleeves in place &amp; trap warmth</li>\r\n</ul>\r\n', 'baleaf-men-s-upf-50-sun-protection-hoodie', '150', 123, '20%', 'baleaf-men-s-upf-50-sun-protection-hoodie-long-sleeve-performance-hiking-fishing-t-shirt_1572846099.jpg', '2019-11-22', 2),
(3, 455656, 1, '99', 'White', 'SHADABZONE', 'YOUTUBE T-SHIRT FOR MEN', 'S', '<p>YOUTUBE T-SHIRT FOR MEN</p>\r\n', 'youtube-t-shirt-men', '150', 130, '20%', 'youtube-t-shirt-men.jpg', '2019-11-22', 7),
(4, 532131, 1, '99', 'Black', 'ADIDAS', 'Black T-Shirt with Graphic Printed', 'S, M,', '<p>Hleoo</p>\r\n', 'black-t-shirt-graphic-printed', '126', 123, '24%', 'black-t-shirt-graphic-printed.jpeg', '2019-11-21', 10),
(5, 1215156, 1, '99', 'White', 'ADIDAS', 'White Adidas White Printed', 'S', '<ul>\r\n	<li>5% polyester created from recycled plastic bottles</li>\r\n	<li>Imported</li>\r\n	<li>Pull On closure</li>\r\n	<li>Machine Wash</li>\r\n	<li>0.7&quot; high</li>\r\n	<li>14&quot; wide</li>\r\n	<li>50% cotton 50% polyester</li>\r\n</ul>\r\n', 'white-adidas-white-printed', '350', 321, '20%', 'white-adidas-white-printed.jpeg', '2019-11-22', 1),
(6, 112132, 1, '99', 'GREY', 'ADIDAS', 'Grey Adidas Graphic Printed', 'L,XL', '<ul>\r\n	<li>5% polyester created from recycled plastic bottles</li>\r\n	<li>Imported</li>\r\n	<li>Pull On closure</li>\r\n	<li>Machine Wash</li>\r\n	<li>0.7&quot; high</li>\r\n	<li>14&quot; wide</li>\r\n	<li>50% cotton 50% polyester</li>\r\n</ul>\r\n', 'grey-adidas-graphic-printed', '350', 345, '10%', 'grey-adidas-graphic-printed.jpeg', '2019-11-17', 1),
(7, 254578, 1, '99', 'GREY', 'ADIDAS', 'Grey Adidas Graphic Print', 'L', '<ul>\r\n	<li>5% polyester created from recycled plastic bottles</li>\r\n	<li>Imported</li>\r\n	<li>Pull On closure</li>\r\n	<li>Machine Wash</li>\r\n	<li>0.7&quot; high</li>\r\n	<li>14&quot; wide</li>\r\n	<li>50% cotton 50% polyester</li>\r\n</ul>\r\n', 'grey-adidas-graphic-print', '450', 400, '24%', 'grey-adidas-graphic-print.jpeg', '2019-11-22', 7),
(8, 147858, 1, '99', 'Black', 'ADIDAS', 'Black Adidas No print', 'L', '<ul>\r\n	<li>5% polyester created from recycled plastic bottles</li>\r\n	<li>Imported</li>\r\n	<li>Pull On closure</li>\r\n	<li>Machine Wash</li>\r\n	<li>0.7&quot; high</li>\r\n	<li>14&quot; wide</li>\r\n	<li>50% cotton 50% polyester</li>\r\n</ul>\r\n', 'black-adidas-no-print', '245', 200, '24%', 'black-adidas-no-print.jpeg', '2019-11-17', 1),
(9, 254569, 1, '99', 'White', 'ADIDAS', 'Adidas White Printed t-shirt  For Men', 'LX', '<ul>\r\n	<li>5% polyester created from recycled plastic bottles</li>\r\n	<li>Imported</li>\r\n	<li>Pull On closure</li>\r\n	<li>Machine Wash</li>\r\n	<li>0.7&quot; high</li>\r\n	<li>14&quot; wide</li>\r\n	<li>50% cotton 50% polyester</li>\r\n</ul>\r\n', 'adidas-white-printed-t-shirt-men', '250', 234, '12%', 'adidas-white-printed-t-shirt-men.jpeg', '2008-08-08', 1),
(10, 324587, 1, '99', 'Black', 'ADIDAS', 'Black Adidas Graphic Print', 'XL', '<ul>\r\n	<li>5% polyester created from recycled plastic bottles</li>\r\n	<li>Imported</li>\r\n	<li>Pull On closure</li>\r\n	<li>Machine Wash</li>\r\n	<li>0.7&quot; high</li>\r\n	<li>14&quot; wide</li>\r\n	<li>50% cotton 50% polyester</li>\r\n</ul>\r\n', 'black-adidas-graphic-print', '299', 234, '20%', 'black-adidas-graphic-print.jpeg', '2019-11-17', 3),
(11, 215487, 1, '99', 'GREY', 'ADIDAS', 'Adidas Light Grey T-shirt For Men', 'S, X', '<ul>\r\n	<li>5% polyester created from recycled plastic bottles</li>\r\n	<li>Imported</li>\r\n	<li>Pull On closure</li>\r\n	<li>Machine Wash</li>\r\n	<li>0.7&quot; high</li>\r\n	<li>14&quot; wide</li>\r\n	<li>50% cotton 50% polyester</li>\r\n</ul>\r\n', 'adidas-light-grey-t-shirt-men', '150', 120, '24%', 'adidas-light-grey-t-shirt-men.jpeg', '0000-00-00', 0),
(12, 324568, 1, '99', 'Black', 'ADIDAS', 'Adidas Black Printed t-shirt  For Men', 'XL', '<ul>\r\n	<li>5% polyester created from recycled plastic bottles</li>\r\n	<li>Imported</li>\r\n	<li>Pull On closure</li>\r\n	<li>Machine Wash</li>\r\n	<li>0.7&quot; high</li>\r\n	<li>14&quot; wide</li>\r\n	<li>50% cotton 50% polyester</li>\r\n</ul>\r\n', 'adidas-black-printed-t-shirt-men', '249', 200, '24%', 'adidas-black-printed-t-shirt-men.jpeg', '0000-00-00', 0),
(13, 254785, 1, '99', 'Black', 'ADIDAS', 'Adidas Black Print For Men', 'S XL', '<ul>\r\n	<li>5% polyester created from recycled plastic bottles</li>\r\n	<li>Imported</li>\r\n	<li>Pull On closure</li>\r\n	<li>Machine Wash</li>\r\n	<li>0.7&quot; high</li>\r\n	<li>14&quot; wide</li>\r\n	<li>50% cotton 50% polyester</li>\r\n</ul>\r\n', 'adidas-black-print-men', '256', 200, '24%', 'adidas-black-print-men.jpeg', '2019-11-16', 1),
(14, 245697, 2, '99', 'Orange', 'Anouk', 'Anouk Orange Dress For Women/Girls Traditional Dresses', 'M XL', '<p><br />\r\n<br />\r\n&nbsp;&nbsp; &nbsp;5% polyester created from recycled plastic bottles&lt;/li&gt;<br />\r\n&nbsp; &nbsp; imported<br />\r\n&nbsp;&nbsp; Pull On closure<br />\r\n&nbsp;&nbsp; Machine Wash<br />\r\n&nbsp;&nbsp; 0.7&amp;quot; high<br />\r\n&nbsp;&nbsp; 14&amp;quot; wide<br />\r\n&nbsp;&nbsp;50% cotton 50% polyester<br />\r\n&lt;/ul&gt;<br />\r\n&lt;/blockquote&gt;</p>\r\n', 'anouk-orange-dress-women-girls-traditional-dresses', '150', 125, '35%', 'anouk-orange-dress-women-girls-traditional-dresses.jpg', '2019-11-22', 8),
(15, 154878, 1, '99', 'Black', 'Jack and Jones', 'Jack and Jones black graphic Printed', ' S M ', '<p>Ace weekend dressing in this black stripe Polo Neck T-shirt from Jack and Jones</p>\r\n', 'jack-and-jones-black-graphic-printed', '277', 245, '20%', 'jack-and-jones-black-graphic-printed.jpeg', '2019-11-21', 9),
(16, 214737, 2, '', 'Olive, Green, White', 'Libas', 'Libas Women Olive-Green-White Block Print Kurta with Trouse', 'S M L XL', '<p>Libas Women Olive-Green-White Block Print Kurta with Trouse</p>\r\n\r\n<p>Libas Women Olive-Green-White Block Print Kurta with TrouseLibas Women Olive-Green-White Block Print Kurta with Trousev</p>\r\n\r\n<p>Libas Women Olive-Green-White Block Print Kurta with Trouse</p>\r\n\r\n<p>Libas Women Olive-Green-White Block Print Kurta with Trouse</p>\r\n\r\n<p>Libas Women Olive-Green-White Block Print Kurta with TrouseLibas Women Olive-Green-White Block Print Kurta with Trouse</p>\r\n', 'libas-women-olive-green-white-block-print-kurta-trouse', '245', 200, '30%', 'libas-women-olive-green-white-block-print-kurta-trouse.jpg', '0000-00-00', 0),
(17, 200123, 3, '21', 'RED', 'Ginni and Joy', 'Ginni and Joy Red T-Shirts ', 'L XL', '<h3 style=\"font-style: italic;\"><small><big>Red self-design sweatshirt, has a kangaroo pocket, a round neck, long sleeves, straight hem</big></small></h3>\r\n\r\n<h3 style=\"font-style: italic;\"><small><big>Material &amp; Care</big></small></h3>\r\n\r\n<h3 style=\"font-style: italic;\"><small><big>Cotton<br />\r\nMachine-wash</big></small></h3>\r\n\r\n<h3 style=\"font-style: italic;\"><small><big><strong>Specifications</strong></big></small></h3>\r\n\r\n<p>Sleeve Length&nbsp;</p>\r\n\r\n<p>Long Sleeves</p>\r\n', 'ginni-and-joy-red-t-shirts', '150', 123, '70%', 'ginni-and-joy-red-t-shirts.jpg', '2019-12-01', 1),
(18, 0, 3, '22', 'red', 'Ginni and Joy', 'Ginni and joy red T-shirt', 'L', '<p><strong>Ginni and Joy</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n', 'ginni-and-joy-red-t-shirt', '450', 400, '2%', 'ginni-and-joy-red-t-shirt.jpg', '0000-00-00', 0),
(19, 0, 3, '', 'Sky Blue', 'Indian Terrain', 'Indian Terrain Blue T-Shirts ', 'S', '<p>Indian Terrain Blue T-Shirts&nbsp;</p>\r\n\r\n<p>Indian Terrain Blue T-Shirts&nbsp;</p>\r\n\r\n<p>Indian Terrain Blue T-Shirts&nbsp;</p>\r\n', 'indian-terrain-blue-t-shirts', '50020', 50000, '20%', 'indian-terrain-blue-t-shirts_1575487752.jpg', '0000-00-00', 0),
(20, 0, 1, '', 'White', 'SHADABZONE', 'khan Shadab', '', '', 'khan-shadab', '', 400, '20%', 'khan-shadab_1575833070.jpg', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `pay_id`, `sales_date`, `orderStatus`) VALUES
(7, 3, 'MOJO9c09305N30100688', '2019-12-09', NULL),
(8, 2, 'MOJO0103Z05N32895679', '2020-01-03', NULL),
(9, 2, 'MOJO0108S05N06907924', '2020-01-09', NULL),
(10, 2, 'MOJO0109F05A88597312', '2020-01-09', NULL),
(11, 3, 'PAYID-LYLL5IY21293431HV278574S', '2020-01-09', NULL);

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
  `shippingaddress` varchar(255) NOT NULL,
  `shippingstate` varchar(255) NOT NULL,
  `shippingcity` varchar(255) NOT NULL,
  `shippingpincode` varchar(255) NOT NULL,
  `shippingad_type` varchar(11) NOT NULL,
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

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `city`, `state`, `pincode`, `billingad_type`, `shippingaddress`, `shippingstate`, `shippingcity`, `shippingpincode`, `shippingad_type`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(1, 'offical@admin.com', '$2y$10$wBHwxev2QtoswmAsZGTokeLmw7EMBC23wg8abymd3kNB0ItTqkf.q', 1, 'Khan', 'Shadab', 'sayeed manzil121', 'Dunstan', 'South Austra', 400612, '', '', '', '', '', '0', '', '.jpg', 1, '', '5kU3wiLICtjlqNG', '2018-05-01'),
(2, 'ks615044@gmail.com', '$2y$10$UL2lKQlEbQfram1oI3bd/ui7vKgBRtQfiHUB3A5ZBxirIdIRdKsku', 0, 'Shadab ', 'Khan', 'sayeed manzil12111', 'THANE', 'MAHARASHTRA', 400613, 'Office', 'mumbra', 'Mumbai', 'Andheri', '400612', 'Home', '7021918970', '.jpg', 1, '', '', '2019-12-04'),
(3, 'anasshaikh@gmail.com', '$2y$10$uLq.51bDz3FM9O1hIEI6P.kD2tFCpjO8QHXYinIePYgDbUARrhoQm', 0, 'Anas', 'Shaikh', 'mumbra', 'Andheri  ', 'Mumbai  ', 400612, 'Home', '', '', '', '', '', '7021918970', 'favicon.jpg', 1, '', '', '2019-12-09'),
(6, 'shadab@gmail.com', '$2y$10$YJXUI4EJW2WsIGpufpC40u9VRW20.SYgcKVvyn.apLGBT7T8/K.VO', 2, 'Shadab', 'Khan', '', '', '', 0, '', '', '', '', '', '', '', 'PicsArt_11-21-08.jpg', 1, '', '', '2020-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `id` int(11) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `streetaddress` varchar(20) NOT NULL,
  `addresstype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
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
-- Indexes for table `deals`
--
ALTER TABLE `deals`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `google_users`
--
ALTER TABLE `google_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pincode`
--
ALTER TABLE `pincode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
