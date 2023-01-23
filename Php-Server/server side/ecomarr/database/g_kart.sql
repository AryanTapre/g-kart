-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 06:22 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g_kart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_ecom`
--

CREATE TABLE `admin_ecom` (
  `a_id` int(10) NOT NULL,
  `a_name` varchar(20) NOT NULL,
  `a_email` varchar(30) NOT NULL,
  `a_password` varchar(30) NOT NULL,
  `a_contact_no` varchar(10) NOT NULL,
  `a_address` text NOT NULL,
  `a_city` varchar(15) NOT NULL,
  `a_d_o_b` date NOT NULL,
  `a_status` int(5) NOT NULL,
  `profile_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_ecom`
--

INSERT INTO `admin_ecom` (`a_id`, `a_name`, `a_email`, `a_password`, `a_contact_no`, `a_address`, `a_city`, `a_d_o_b`, `a_status`, `profile_photo`) VALUES
(64033210, 'Aryan Tapre', 'glammerkart@gmail.com', '1234', '9409187245', 'c-1/387 Raj abhishek city homes,palsana roadpardi ,kande,sachin,surat 394230', 'surat', '2002-07-24', 1, 'admin_upload/admin_profile.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `category_ecom`
--

CREATE TABLE `category_ecom` (
  `c_id` int(30) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_desc` text NOT NULL,
  `c_date` date NOT NULL,
  `c_status` int(5) NOT NULL,
  `c_image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_ecom`
--

INSERT INTO `category_ecom` (`c_id`, `c_name`, `c_desc`, `c_date`, `c_status`, `c_image`) VALUES
(32, 'clothes', ' Shop Online from trendy apparels for women, men & kids at best prices', '2021-04-10', 1, 0x63617465676f72795f75706c6f6164732f636c6f74682e6a7067),
(33, 'laptop', 'Buy Laptops Online at Lowest Prices', '2021-04-12', 1, 0x63617465676f72795f75706c6f6164732f6c6170746f705f6361742e6a7067),
(35, 'smart phone', 'A smartphone is a mobile phone that includes advanced functionality ', '2021-04-12', 1, 0x63617465676f72795f75706c6f6164732f6d6f62696c655f6361742e6a706567),
(36, 'shoes', 'A shoe is an item of footwear intended to protect and comfort the human foot.', '2021-04-12', 1, 0x63617465676f72795f75706c6f6164732f73686f65735f6361742e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_ecom`
--

CREATE TABLE `feedback_ecom` (
  `f_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  `f_desc` text NOT NULL,
  `f_date` date NOT NULL,
  `p_id` int(20) NOT NULL,
  `p_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_ecom`
--

INSERT INTO `feedback_ecom` (`f_id`, `u_id`, `f_desc`, `f_date`, `p_id`, `p_name`) VALUES
(2, 2065, 'product was good', '2021-01-05', 25, 'redmi 9 prime');

-- --------------------------------------------------------

--
-- Table structure for table `order_ecom`
--

CREATE TABLE `order_ecom` (
  `o_id` int(10) NOT NULL,
  `p_id` int(20) NOT NULL,
  `u_id` int(10) NOT NULL,
  `o_date` date NOT NULL,
  `o_amount` int(20) NOT NULL,
  `o_ship_address` text NOT NULL,
  `o_zipcode` text NOT NULL,
  `quantity` int(50) NOT NULL,
  `p_name` text NOT NULL,
  `p_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_ecom`
--

INSERT INTO `order_ecom` (`o_id`, `p_id`, `u_id`, `o_date`, `o_amount`, `o_ship_address`, `o_zipcode`, `quantity`, `p_name`, `p_image`) VALUES
(1, 5, 2048, '2021-02-23', 500, 'c-1/387 raj abhishek city homes palsana road pardi sachin', '394230', 1, '', ''),
(87, 32, 2093, '2021-04-12', 78, '', '394230', 1, 'DELL Inspiron Core i7 11th Gen', 'product_uploads/dell_pr_4.jpeg'),
(88, 32, 2093, '2021-04-12', 78, 'raj ABHISHEK', '394230', 1, 'DELL Inspiron Core i7 11th Gen', 'product_uploads/dell_pr_4.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `payment_ecom`
--

CREATE TABLE `payment_ecom` (
  `pay_id` int(10) NOT NULL,
  `pay_date` date NOT NULL,
  `amount` varchar(10) NOT NULL,
  `o_id` int(10) NOT NULL,
  `payment_mode` varchar(30) NOT NULL,
  `full_amount` varchar(15) NOT NULL,
  `bank_account_no` varchar(30) NOT NULL,
  `bank_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_ecom`
--

INSERT INTO `payment_ecom` (`pay_id`, `pay_date`, `amount`, `o_id`, `payment_mode`, `full_amount`, `bank_account_no`, `bank_name`) VALUES
(1, '2020-02-12', '2020', 1, 'cod', '2020', '', 'axis'),
(2, '2020-02-12', '2020', 1, 'cod', '2020', '', 'axis'),
(3, '2020-02-12', '2020', 1, 'cod', '2020', '1010101010', 'axis');

-- --------------------------------------------------------

--
-- Table structure for table `product_ecom`
--

CREATE TABLE `product_ecom` (
  `p_id` int(20) NOT NULL,
  `p_name` text NOT NULL,
  `c_id` int(30) NOT NULL,
  `s_c_id` int(10) NOT NULL,
  `p_code` varchar(30) NOT NULL,
  `p_status` int(15) NOT NULL,
  `p_date` date NOT NULL,
  `p_image` text NOT NULL,
  `p_stock` int(30) NOT NULL,
  `p_price` int(15) NOT NULL,
  `p_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_ecom`
--

INSERT INTO `product_ecom` (`p_id`, `p_name`, `c_id`, `s_c_id`, `p_code`, `p_status`, `p_date`, `p_image`, `p_stock`, `p_price`, `p_desc`) VALUES
(26, 'roadester', 29, 9, 'c589', 1, '2021-03-09', 'product_uploads/roadester.PNG', 200, 1979, 'Men Blue Solid Sneakers'),
(28, 'Men Tailored Fit Solid', 32, 11, 'cn-005wc4', 1, '2021-04-10', 'product_uploads/shirt_main.jpeg', 500, 527, 'Men Tailored Fit Solid Spread Collar Casual Shirt'),
(29, 'ELL Inspiron 3000 Core i5 10th Gen', 33, 12, '4568c1', 1, '2021-04-12', 'product_uploads/dell_pr_1.jpeg', 100, 66990, '(8 GB/1 TB HDD/256 GB SSD/Windows 10 Home/2 GB Graphics) 3593 Laptop'),
(30, 'DELL Inspiron 3000 Core i3 10th Gen', 33, 12, '4568c2', 1, '2021-04-12', 'product_uploads/dell_pr_2_1.jpeg', 50, 40000, '(4 GB/1 TB HDD/Windows 10 Home) Inspiron 3593'),
(31, 'DELL Inspiron Ryzen 3 Dual Core 3250U', 33, 12, '4568c3', 1, '2021-04-12', 'product_uploads/dell_pr_3.jpeg', 100, 36790, '(4 GB/1 TB HDD/256 GB SSD/Windows 10 Home) Inspiron'),
(32, 'DELL Inspiron Core i7 11th Gen', 33, 12, '4568c4', 1, '2021-04-12', 'product_uploads/dell_pr_4.jpeg', 100, 78, '(8 GB/512 GB SSD/Windows 10 Home/2 GB Graphics)'),
(33, 'DELL Inspiron Core i3 11th Gen', 33, 12, '4568c5', 1, '2021-04-12', 'product_uploads/dell_pr_5.jpeg', 100, 54, '4 GB/512 GB SSD/Windows 10 Home) Inspiron 5406 2 in 1 Laptop  (14 inch, Silver, 1.72 kg, With MS Office)'),
(34, 'Redmi 9 Prime', 35, 13, '4568c10', 1, '2021-04-12', 'product_uploads/m_pr_1.jpeg', 100, 9, '(Space Blue, 64 GB)  (4 GB RAM)'),
(35, 'Redmi 9 Prime', 35, 13, '4568c9', 1, '2021-04-12', 'product_uploads/mi_pr_2_1.jpg', 100, 9, '(Mint Green, 64 GB)  (4 GB RAM)'),
(36, 'Redmi 8A Dua', 35, 13, '4568c13', 1, '2021-04-12', 'product_uploads/mi_pr_3_1.jpg', 100, 6, ' (Midnight Grey, 32 GB)  (2 GB RAM)'),
(37, 'Redmi 8A Dua', 35, 13, '456845', 1, '2021-04-12', 'product_uploads/mi_pr_4_1.jpg', 200, 7, ' (Ocean Blue, 32 GB)  (3 GB RAM)'),
(38, 'Revolution 3', 36, 14, '4568c78', 1, '2021-04-12', 'product_uploads/nike_pr_1.jpeg', 100, 1, 'Revolution 3 Running Shoes For Men'),
(39, 'Downshifter ', 36, 14, '4568c89', 1, '2021-04-12', 'product_uploads/nike_pr_2_1.jpeg', 100, 2, 'Downshifter 10 Running Shoes For Men  (Black)'),
(40, 'Revolution 5', 36, 14, '456860', 1, '2021-04-12', 'product_uploads/nike_pr_3_1.jpeg', 100, 2, 'Revolution 5 EXT Running Shoes For Men  (Black)'),
(41, 'Renew Ride 2', 36, 14, '4568c50', 1, '2021-04-12', 'product_uploads/nike_pr_4_1.jpeg', 200, 3, 'Renew Ride 2 Running Shoes For Men  (Black)'),
(42, 'Nike Fly.By Mid', 36, 14, '4568c53', 1, '2021-04-12', 'product_uploads/nike_pr_6_1.jpeg', 100, 3, 'Nike Fly.By Mid 2 Basketball Shoe Basketball Shoes For Men  (Black)');

-- --------------------------------------------------------

--
-- Table structure for table `product_gallery`
--

CREATE TABLE `product_gallery` (
  `p_g_id` int(10) NOT NULL,
  `p_id` varchar(10) NOT NULL,
  `p_image` text NOT NULL,
  `p_status` int(5) NOT NULL,
  `p_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_gallery`
--

INSERT INTO `product_gallery` (`p_g_id`, `p_id`, `p_image`, `p_status`, `p_date`) VALUES
(5, '22', 'product_uploads/.Screenshot (320).png', 1, '2021-02-24'),
(6, '22', 'product_uploads/.Screenshot (321).png', 1, '2021-02-24'),
(7, '23', 'product_uploads/.Screenshot (287).png', 1, '2021-02-24'),
(8, '23', 'product_uploads/.Screenshot (288).png', 1, '2021-02-24'),
(9, '24', 'product_uploads/.4.jpg', 1, '2021-02-28'),
(10, '24', 'product_uploads/.kali-linux-wallpaper-v8.png', 1, '2021-02-28'),
(11, '25', 'product_uploads/.2.jpg', 1, '2021-02-28'),
(12, '25', 'product_uploads/.3.png', 1, '2021-02-28'),
(13, '26', 'product_uploads/.roadester2.PNG', 1, '2021-03-09'),
(14, '26', 'product_uploads/.roadester3.PNG', 1, '2021-03-09'),
(15, '27', 'product_uploads/.2.jpg', 1, '2021-04-02'),
(16, '27', 'product_uploads/.3.png', 1, '2021-04-02'),
(17, '28', 'product_uploads/.shirt_multi_1.jpeg', 1, '2021-04-10'),
(18, '28', 'product_uploads/.shirt_multi_2.jpeg', 1, '2021-04-10'),
(19, '29', 'product_uploads/.dell_pr_1_1.jpeg', 1, '2021-04-12'),
(20, '29', 'product_uploads/.dell_pr_1_2.jpeg', 1, '2021-04-12'),
(21, '30', 'product_uploads/.dell_pr_2_1.jpeg', 1, '2021-04-12'),
(22, '30', 'product_uploads/.dell_pr_2_2.jpeg', 1, '2021-04-12'),
(23, '31', 'product_uploads/.dell_pr_3_1.jpeg', 1, '2021-04-12'),
(24, '31', 'product_uploads/.dell_pr_3_2.jpeg', 1, '2021-04-12'),
(25, '32', 'product_uploads/.dell_pr_4.jpeg', 1, '2021-04-12'),
(26, '32', 'product_uploads/.dell_pr_4_1.jpeg', 1, '2021-04-12'),
(27, '33', 'product_uploads/.dell_pr_5_1.jpeg', 1, '2021-04-12'),
(28, '33', 'product_uploads/.dell_pr_5_2.jpeg', 1, '2021-04-12'),
(29, '34', 'product_uploads/.m_pr_1.jpeg', 1, '2021-04-12'),
(30, '34', 'product_uploads/.mi_pr_2.jpg', 1, '2021-04-12'),
(31, '35', 'product_uploads/.mi_pr_2_1.jpg', 1, '2021-04-12'),
(32, '35', 'product_uploads/.mi_pr_2_2.jpg', 1, '2021-04-12'),
(33, '36', 'product_uploads/.mi_pr_3_1.jpg', 1, '2021-04-12'),
(34, '36', 'product_uploads/.mi_pr_3_2.jpg', 1, '2021-04-12'),
(35, '37', 'product_uploads/.mi_pr_4_1.jpg', 1, '2021-04-12'),
(36, '37', 'product_uploads/.mi_pr_4_2.jpg', 1, '2021-04-12'),
(37, '38', 'product_uploads/.nike_pr_1.jpeg', 1, '2021-04-12'),
(38, '38', 'product_uploads/.nike_pr_2.jpeg', 1, '2021-04-12'),
(39, '39', 'product_uploads/.nike_pr_2_1.jpeg', 1, '2021-04-12'),
(40, '39', 'product_uploads/.nike_pr_2_2.jpeg', 1, '2021-04-12'),
(41, '40', 'product_uploads/.nike_pr_3_1.jpeg', 1, '2021-04-12'),
(42, '40', 'product_uploads/.nike_pr_3_2.jpeg', 1, '2021-04-12'),
(43, '41', 'product_uploads/.nike_pr_4_1.jpeg', 1, '2021-04-12'),
(44, '41', 'product_uploads/.nike_pr_4_2.jpeg', 1, '2021-04-12'),
(45, '42', 'product_uploads/.nike_pr_6_1.jpeg', 1, '2021-04-12'),
(46, '42', 'product_uploads/.nike_pr_6_2.jpeg', 1, '2021-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_ecom`
--

CREATE TABLE `sub_category_ecom` (
  `s_c_id` int(10) NOT NULL,
  `s_c_name` varchar(20) NOT NULL,
  `s_c_pic` text NOT NULL,
  `s_c_status` int(30) NOT NULL,
  `s_c_desc` text NOT NULL,
  `c_id` int(30) NOT NULL,
  `s_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category_ecom`
--

INSERT INTO `sub_category_ecom` (`s_c_id`, `s_c_name`, `s_c_pic`, `s_c_status`, `s_c_desc`, `c_id`, `s_date`) VALUES
(8, 'mi', 'subcategory_upload/redmi4a.jpg', 1, 'it is a Chinese', 28, '2021-02-11'),
(9, 'reebok', 'subcategory_upload/reebok_cover.PNG', 1, 'Men Navy Blue Travellar LP Running Shoes', 29, '2021-03-09'),
(10, 'Sony Bravia', 'subcategory_upload/Screenshot (631).png', 1, 'Sony Bravia 138.8 cm (55 inches) 4K Ultra HD Smart LED TV KD-55X7002G ', 30, '2021-04-02'),
(11, 'shirts', 'subcategory_upload/shirts.jpg', 1, 'A shirt is a cloth garment for the upper body', 32, '2021-04-10'),
(12, 'dell', 'subcategory_upload/dell_laptop_subcat.jpg', 1, 'Best Overall: Dell XPS 13 (9310)', 33, '2021-04-12'),
(13, 'mi', 'subcategory_upload/mi_subcat.jpg', 1, 'mi smart phones cheap', 35, '2021-04-12'),
(14, 'nike', 'subcategory_upload/nike_subcat.jpeg', 1, 'Nike shoes provide excellent support – Nike shoes', 36, '2021-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `user_ecom`
--

CREATE TABLE `user_ecom` (
  `u_id` int(10) NOT NULL,
  `u_name` text NOT NULL,
  `u_fname` varchar(10) NOT NULL,
  `u_lname` varchar(10) NOT NULL,
  `u_email` varchar(30) NOT NULL,
  `u_password` varchar(15) NOT NULL,
  `u_contact_no` varchar(10) NOT NULL,
  `pincode` int(6) NOT NULL,
  `u_address` text NOT NULL,
  `u_city` varchar(15) NOT NULL,
  `u_state` varchar(10) NOT NULL,
  `u_dob` date NOT NULL,
  `u_regdate` date NOT NULL,
  `u_country` varchar(10) NOT NULL,
  `u_status` int(5) NOT NULL,
  `u_gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_ecom`
--

INSERT INTO `user_ecom` (`u_id`, `u_name`, `u_fname`, `u_lname`, `u_email`, `u_password`, `u_contact_no`, `pincode`, `u_address`, `u_city`, `u_state`, `u_dob`, `u_regdate`, `u_country`, `u_status`, `u_gender`) VALUES
(2065, 'panvi', 'panvi', 'tapre', 'taprepanvi16@gmail.com', '123456789', '', 0, '', '', '', '0000-00-00', '2021-04-05', '', 0, 'fe-male'),
(2093, '', '', '', 'abc@gmail.com', 'abc', '', 0, '', '', '', '0000-00-00', '2021-04-12', '', 0, 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_ecom`
--
ALTER TABLE `admin_ecom`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `category_ecom`
--
ALTER TABLE `category_ecom`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `feedback_ecom`
--
ALTER TABLE `feedback_ecom`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `order_ecom`
--
ALTER TABLE `order_ecom`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `payment_ecom`
--
ALTER TABLE `payment_ecom`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `product_ecom`
--
ALTER TABLE `product_ecom`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`p_g_id`);

--
-- Indexes for table `sub_category_ecom`
--
ALTER TABLE `sub_category_ecom`
  ADD PRIMARY KEY (`s_c_id`);

--
-- Indexes for table `user_ecom`
--
ALTER TABLE `user_ecom`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_ecom`
--
ALTER TABLE `admin_ecom`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64033211;

--
-- AUTO_INCREMENT for table `category_ecom`
--
ALTER TABLE `category_ecom`
  MODIFY `c_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `feedback_ecom`
--
ALTER TABLE `feedback_ecom`
  MODIFY `f_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_ecom`
--
ALTER TABLE `order_ecom`
  MODIFY `o_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `payment_ecom`
--
ALTER TABLE `payment_ecom`
  MODIFY `pay_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_ecom`
--
ALTER TABLE `product_ecom`
  MODIFY `p_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `p_g_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `sub_category_ecom`
--
ALTER TABLE `sub_category_ecom`
  MODIFY `s_c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_ecom`
--
ALTER TABLE `user_ecom`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2094;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
