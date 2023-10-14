-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2023 at 09:21 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_marriage`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` varchar(100) NOT NULL DEFAULT '0',
  `booking_status` varchar(100) NOT NULL DEFAULT '0',
  `booking_amount` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_status`, `booking_amount`, `user_id`) VALUES
(14, '2023-10-14', '2', 800, 1),
(15, '2023-10-14', '2', 7898, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_quantity` varchar(100) NOT NULL DEFAULT '1',
  `product_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `cart_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `cart_quantity`, `product_id`, `booking_id`, `cart_status`) VALUES
(16, '1', 2, 14, 4),
(17, '1', 4, 15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(2, 'Footwears'),
(3, 'Jewellery'),
(4, 'Outfit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complainttype_id` int(11) NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `complaint_date` varchar(100) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL DEFAULT 'Not Yet Replyed',
  `user_id` int(11) NOT NULL,
  `complaint_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complainttype_id`, `complaint_content`, `complaint_date`, `complaint_reply`, `user_id`, `complaint_status`) VALUES
(1, 1, 'aduacuakcvaevbav', '2023-09-24', 'bspdcihciwliccwciwcwcw', 1, 1),
(2, 1, 'product has an low quality', '2023-09-24', 'sorry for the trouble we  will look into it   plz return the product to the shop', 1, 1),
(3, 1, 'sdfsdfdfsf', '2023-09-25', 'ffffffff', 1, 1),
(4, 1, 'low quality product', '2023-10-05', 'Not Yet Replyed', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complainttype`
--

CREATE TABLE `tbl_complainttype` (
  `complainttype_id` int(11) NOT NULL,
  `complainttype_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complainttype`
--

INSERT INTO `tbl_complainttype` (`complainttype_id`, `complainttype_name`) VALUES
(1, 'product complaint'),
(2, 'site complaint'),
(3, 'shop complaint');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(3, 'Kasaragod'),
(4, 'Kannur'),
(6, 'Wayanad'),
(8, 'Kozhikode'),
(9, 'Malappuram'),
(10, 'Palakkad'),
(11, 'Thrissur'),
(12, 'Ernakulam'),
(13, 'Idukki'),
(14, 'Alappuzha'),
(15, 'Pathanamthitta'),
(18, 'Kottayam'),
(19, 'Kollam'),
(20, 'Thiruvananthapuram');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(100) NOT NULL,
  `feedback_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(100) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(1, 'kasaragod', 3),
(2, 'Kanhangad', 3),
(3, 'Nileshwar', 3),
(4, 'Manjeshwar', 3),
(5, 'payyanur', 4),
(6, 'Iritty', 4),
(7, 'Parassinikkadave', 4),
(8, 'Mannathavady', 6),
(9, 'Kalpetta', 6),
(10, 'Sultan Bathery', 6),
(11, 'Beypore', 8),
(12, 'Feroke', 8),
(13, 'Kadalundi', 8),
(14, 'Malappuram', 9),
(15, 'Tirur', 9),
(16, 'Nilambur', 9),
(17, 'Manjeri', 9),
(18, 'Mannarkkad', 10),
(19, 'Shoranur', 10),
(20, 'Pattambi', 10),
(21, 'Irijalakuda', 11),
(22, 'Kodungallur', 11),
(23, 'Guruvayur', 11),
(24, 'Chalakudy', 11),
(25, 'Kochi', 12),
(26, 'Aluva', 12),
(27, 'Angamaly', 12),
(28, 'Muvattupuzha', 12),
(29, 'Thodupuzha', 13),
(30, 'Munnar', 13),
(31, 'Kattappana', 13),
(32, 'Alappuzha', 14),
(33, 'Cherthala', 14),
(34, 'Haripad', 14),
(36, 'Chengannur', 14),
(37, 'Pathanamthitta', 15),
(38, 'Thiruvalla', 15),
(39, 'Aranmula', 15),
(40, 'Adoor', 15),
(41, 'Changanassery', 18),
(42, 'Vaikom', 18),
(43, 'Ettumanoor', 18),
(44, 'Erumeli', 18),
(45, 'Kollam', 19),
(46, 'Kottarakkara', 19),
(47, 'Chavara', 19),
(48, 'Oachira', 19),
(49, 'Thiruvananthapuram', 20),
(50, 'Kilimanoor', 20),
(51, 'varkala', 20),
(52, 'Neyyattinkara', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_photo` varchar(100) NOT NULL,
  `product_details` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_photo`, `product_details`, `product_price`, `shop_id`, `subcategory_id`) VALUES
(2, 'Wedding Shoes For Men', 'shoes.webp', 'Sole: Thermoplastic Elastomers\r\nClosure: Lace-Up\r\nFit Type: Regular\r\nShoe Width: Medium\r\nMaterial:- ', 800, 1, 2),
(3, 'Bridal Necklace', 'necklace.webp', 'Date First Available ‏ : ‎ 31 December 2015\r\nManufacturer ‏ : ‎ Traditsiya\r\nASIN ‏ : ‎ B01A0VWUB0\r\nI', 530000, 1, 8),
(4, 'Suit For Men', 'suit.webp', 'Men Suit Black Wedding Suit Groom Wear Suit 3 Piece Suit One Button Suit Party Wear Suit For Men Din', 7898, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `review_datetime` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_review` varchar(100) NOT NULL,
  `user_rating` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `review_datetime`, `product_id`, `user_review`, `user_rating`, `user_name`) VALUES
(1, '2023-09-24 12:26:57', 1, 'nice', '5', 'shiva'),
(2, '2023-09-24 12:44:07', 2, 'good', '4', 'shiva'),
(3, '2023-09-25 10:21:00', 3, 'ggggggggggggggg', '5', 'shiva');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `service_photo` varchar(500) NOT NULL,
  `service_price` int(100) NOT NULL,
  `service_details` varchar(100) NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`service_id`, `service_name`, `service_photo`, `service_price`, `service_details`, `shop_id`) VALUES
(2, 'hair coloring', '640px-Haircoloring.webp', 300, 'red plaing coloring', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_servicebooking`
--

CREATE TABLE `tbl_servicebooking` (
  `servicebooking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `servicebooking_details` varchar(100) NOT NULL,
  `servicebooking_status` int(11) NOT NULL DEFAULT 0,
  `district_id` int(11) NOT NULL,
  `servicebooking_date` varchar(100) NOT NULL,
  `servicebooked_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_servicebooking`
--

INSERT INTO `tbl_servicebooking` (`servicebooking_id`, `user_id`, `service_id`, `servicebooking_details`, `servicebooking_status`, `district_id`, `servicebooking_date`, `servicebooked_date`) VALUES
(8, 1, 2, 'ddawdaaa', 3, 3, '2023-10-27', '2023-10-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE `tbl_shop` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `shop_contact` varchar(100) NOT NULL,
  `shop_address` varchar(100) NOT NULL,
  `shop_email` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  `shop_photo` varchar(100) NOT NULL,
  `shop_proof` varchar(100) NOT NULL,
  `shop_status` varchar(100) NOT NULL DEFAULT '0',
  `shop_password` varchar(100) NOT NULL,
  `shop_doj` varchar(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shop_id`, `shop_name`, `shop_contact`, `shop_address`, `shop_email`, `place_id`, `shop_photo`, `shop_proof`, `shop_status`, `shop_password`, `shop_doj`, `type_id`) VALUES
(1, 'Sks', '8567100654', 'acb complex,bc street,eranakulam,kerala.\r\npin-671345', 'Skscompany@gmail.com', 25, '360_F_144860625_rU5bVqcOkqiIEbuKIJzI4eoFHLTkkzSS.webp', 'young-woman-with-shopping-bags-standing-clothing-store_52137-20576.webp', '1', 'Shiva1324', '20230923', 4),
(3, 'amal', '89557598349', 'abs building,gh citiy,malappuram,kerala.\r\npin-655544', 'amalindusties@gamil.com', 14, 'wallpaperflare.com_wallpaper.jpg', 'wallpaperflare.com_wallpaper.jpg', '1', 'shiva2323', '20230924', 5),
(4, 'yaseen', '9876543214', 'bc  building,gh nagar,alapuzha,kerala.\r\npin-675584', 'yaseenfootwear@gmail.com', 32, 'wallpaperflare.com_wallpaper.jpg', 'wallpaperflare.com_wallpaper.jpg', '1', 'yaseen123', '20230924', 4),
(5, 'thrishal', '76867686775', 'nileshwar ,hhh street,kannur,kerala.\r\npin-6754544', 'thirshal@gmail.com', 5, 'wallpaperflare.com_wallpaper.jpg', 'wallpaperflare.com_wallpaper.jpg', '1', 'thirshal123', '20230924', 5),
(8, 'sks saloon', '7456739345', 'sks saloon,bc road,chathurakinar,kasaragod.\r\npin-671314', 'skssaloon@gmail.com', 3, 'photo_2023-09-23_19-41-28.jpg', 'photo_2023-09-23_19-41-28.jpg', '1', 'sks123', '2023-10-06', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `stock_quantity` varchar(100) NOT NULL,
  `stock_date` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_quantity`, `stock_date`, `product_id`) VALUES
(1, '20', '2023-09-24', 1),
(2, '30', '2023-09-24', 2),
(3, '30', '2023-09-24', 3),
(4, '40', '2023-09-24', 4),
(5, '30', '2023-09-24', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(1, 'Heels', 2),
(2, 'Shoes', 2),
(3, 'Sandal', 2),
(4, 'Loafer', 2),
(5, 'Mule', 2),
(6, 'Derby', 2),
(7, 'Earring', 3),
(8, 'Necklace', 3),
(9, 'Bracelet', 3),
(10, 'Ring', 3),
(11, 'Bnagle', 3),
(12, 'Suit', 4),
(13, 'Gown', 4),
(14, 'Sari', 4),
(15, 'Skirt', 4),
(16, 'Lehanga', 4),
(17, 'Nail saloon', 5),
(18, 'Spa saloon', 5),
(19, 'Hybrid saloon', 5),
(20, 'Hair saloon', 5),
(21, 'Arabic Mehndi', 6),
(22, 'Indian Mehndi', 6),
(23, 'Moroccan Mehndi', 6),
(24, 'Bridal Mehndi', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(4, 'Product'),
(5, 'Service');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_contact` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_proof` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `user_dob` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_email`, `user_address`, `user_password`, `user_photo`, `user_proof`, `place_id`, `user_gender`, `user_dob`) VALUES
(1, 'Shivaprasad', '8547100654', 'Shivaprasad3253@gmail.com', 'shiva mansion,kochi,ernakulam,kerala.\r\npin-678123', 'Shiva123', 'photo_2023-09-23_19-41-28.jpg', 'photo_2023-09-23_19-41-28.jpg', 25, 'male', 2003),
(2, 'nandhana p', '87456456456', 'nandhana@gmail.com', 'punnasseri house,tirur,malappuram,kerala.\r\npin-679582', 'nandhana123', 'wallpaperflare.com_wallpaper.jpg', 'wallpaperflare.com_wallpaper.jpg', 15, 'female', 2004),
(3, 'ashfaque', '8945267912', 'kushfaque@gmail.com', 'arakkalhouse,kochi,ernakulam', 'kushfauqe', 'wallpaperflare.com_wallpaper.jpg', 'wallpaperflare.com_wallpaper.jpg', 25, 'male', 2003),
(4, '', '', '', '', '', '', '', 0, '', 0),
(5, '', '', '', '', '', '', '', 0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  ADD PRIMARY KEY (`complainttype_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_servicebooking`
--
ALTER TABLE `tbl_servicebooking`
  ADD PRIMARY KEY (`servicebooking_id`);

--
-- Indexes for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  MODIFY `complainttype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_servicebooking`
--
ALTER TABLE `tbl_servicebooking`
  MODIFY `servicebooking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
