-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 11:29 AM
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
-- Database: `tpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `c_id` varchar(50) NOT NULL,
  `p_id` varchar(10) NOT NULL,
  `p_quantity` int(7) NOT NULL,
  `p_size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `c_id`, `p_id`, `p_quantity`, `p_size`) VALUES
(82, '2', '2', 100, '5 x 10');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `c_mail` varchar(50) NOT NULL,
  `c_pass` char(64) NOT NULL,
  `c_gender` varchar(10) NOT NULL,
  `c_age` int(3) NOT NULL,
  `c_tel` varchar(12) NOT NULL,
  `c_img` varchar(50) NOT NULL,
  `c_addr1` varchar(200) NOT NULL,
  `c_addr2` varchar(200) DEFAULT NULL,
  `c_addr3` varchar(200) DEFAULT NULL,
  `c_status` varchar(10) NOT NULL,
  `c_ref` varchar(10) NOT NULL,
  `c_check` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_mail`, `c_pass`, `c_gender`, `c_age`, `c_tel`, `c_img`, `c_addr1`, `c_addr2`, `c_addr3`, `c_status`, `c_ref`, `c_check`) VALUES
(1, 'Stephen Hawking', 'stephen@gmail.com', '$2y$10$tlj1BLrkCUgA9FNkTaK05.6Gm65lDsT94Un.6xgCntPPD0/NesyZm', 'เพศชาย', 76, '0625483641', '102545629-460200140.jpg', '1 Nakhon Pathom Rd, Khwaeng Dusit, Khet Dusit, Krung Thep Maha Nakhon 10300', '222 Vibhavadi Rangsit Rd, Sanambin, Don Mueang, Bangkok 10210', '', '', '362605', '0'),
(2, 'Gorge Washington', 'qwerty@gmail.com', '$2y$10$VXs69/kM6MKTJN/dJgMqCOEsjgWDoup4RFeuHUYrFd5.KqEjRalrW', 'เพศชาย', 25, '0586315277', 'SF_Actor3_5.png', '991 Rama I Rd, Pathum Wan, Bangkok 10330', '299 Charoen Nakhon Rd, Khlong Ton Sai, Khlong San, Bangkok 10600', '222, Mai Khao, Thalang District, Phuket 83110', '', '204781', '1'),
(3, '', 'asdfgh@gmail.com', '$2y$10$KSMH/LcCyFgeyXxavzzY8eXvmfzWACmAD9VFr0mbyP3P4Z4tmBzy.', '', 0, '', '', '', NULL, NULL, '', '300634', '0'),
(5, 'J_P', 'punthung.jirapat@gmail.com', '$2y$10$0NeAiDcdyjZ4db.Ge5gQd.C3/zUPhuXhmUvv/ROfgI6ssiuN8vm1e', '', 0, '05384621586', '', '222 Vibhavadi Rangsit Rd, Sanambin, Don Mueang, Bangkok 10210', '991 Rama I Rd, Pathum Wan, Bangkok 10330', NULL, '', ' null', '1');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(30) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `e_pass` char(64) NOT NULL,
  `e_gender` varchar(10) NOT NULL,
  `e_age` int(3) NOT NULL,
  `e_tel` varchar(12) NOT NULL,
  `e_img` varchar(50) NOT NULL,
  `e_addr1` varchar(200) NOT NULL,
  `e_addr2` varchar(200) DEFAULT NULL,
  `e_addr3` varchar(200) DEFAULT NULL,
  `e_level` varchar(10) NOT NULL,
  `e_status` varchar(10) NOT NULL,
  `e_ref` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id`, `e_name`, `e_mail`, `e_pass`, `e_gender`, `e_age`, `e_tel`, `e_img`, `e_addr1`, `e_addr2`, `e_addr3`, `e_level`, `e_status`, `e_ref`) VALUES
(1, 'Jirapat_P', '1231231230', '9fab6755cd2e8817d3e73b0978ca54a6', '', 10, '098-765-4321', 'gatling_peashooter.jpg', '123456789', '', '', 'พนักงาน', 'พักงาน', ''),
(2, 'J_Pungthung', 'onetwothreefourfive@gmail.com', '2b189c3132a5eb375698f716feea6674', 'เพศชาย', 50, '1234567899', 'Monster_3.png', '928 ถนนสุขุมวิท, พระโขนง, คลองเตย, กรุงเทพมหานคร 10110', '203 ถนน สวนสยาม, เขต คันนายาว, กรุงเทพ10230', 'ถนน ท่าแพ, ตำบล ช้างคลาน, อำเภอเมืองเชียงใหม่ , เชียงใหม่ 50200', 'แอดมิน', 'ปกติ', '856135');

-- --------------------------------------------------------

--
-- Table structure for table `fee_trans`
--

CREATE TABLE `fee_trans` (
  `f_id` int(11) NOT NULL,
  `f_topic` varchar(200) NOT NULL,
  `f_info` text NOT NULL,
  `f_weight` int(11) NOT NULL,
  `f_price` double NOT NULL,
  `f_discount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fee_trans`
--

INSERT INTO `fee_trans` (`f_id`, `f_topic`, `f_info`, `f_weight`, `f_price`, `f_discount`) VALUES
(1, 'จัดส่งฟรี', 'จัดส่งฟรี เมื่อทำการสั่งซื้อสินค้าเกิน 30 กิโลกรัม', 30, 0, 50),
(2, 'จัดส่งปกติ', 'ค่าจัดส่งราคาปกติ', 0, 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE `login_log` (
  `log_id` int(11) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `e_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_log`
--

INSERT INTO `login_log` (`log_id`, `log_time`, `e_id`, `c_id`) VALUES
(1, '2023-12-06 09:07:23', 2, 0),
(2, '2023-12-07 09:16:47', 2, 0),
(3, '2023-12-11 07:41:53', 2, 0),
(4, '2023-12-11 08:24:49', 2, 0),
(5, '2023-12-11 08:25:35', 1, 0),
(6, '2023-12-11 08:26:10', 2, 0),
(7, '2023-12-14 08:34:21', 2, 0),
(8, '2023-12-18 08:48:25', 2, 0),
(9, '2023-12-21 08:16:11', 2, 0),
(10, '2023-12-28 09:28:46', 0, 2),
(11, '2023-12-28 09:28:58', 0, 2),
(12, '2023-12-28 10:12:51', 2, 0),
(13, '2024-01-02 07:53:08', 2, 0),
(14, '2024-01-04 11:42:47', 2, 0),
(15, '2024-01-04 11:42:53', 2, 0),
(16, '2024-01-04 11:43:15', 2, 0),
(17, '2024-01-04 11:44:04', 2, 0),
(18, '2024-01-04 11:51:11', 2, 0),
(19, '2024-01-04 11:51:40', 2, 0),
(20, '2024-01-04 11:54:07', 2, 0),
(21, '2024-01-05 09:00:31', 2, 0),
(22, '2024-01-06 09:55:48', 2, 0),
(23, '2024-01-06 09:59:19', 2, 0),
(24, '2024-01-06 09:59:23', 2, 0),
(25, '2024-01-08 08:05:13', 2, 0),
(26, '2024-01-08 08:05:47', 2, 0),
(27, '2024-01-08 08:06:02', 2, 0),
(28, '2024-01-15 08:14:59', 0, 2),
(29, '2024-01-17 06:57:25', 0, 2),
(30, '2024-01-17 10:48:49', 2, 0),
(31, '2024-01-25 09:46:18', 2, 0),
(32, '2024-01-30 08:43:58', 0, 2),
(33, '2024-01-30 08:54:01', 2, 0),
(34, '2024-02-09 08:05:48', 0, 2),
(35, '2024-02-15 11:29:22', 2, 0),
(36, '2024-02-15 11:30:21', 2, 0),
(37, '2024-02-22 08:41:37', 0, 2),
(38, '2024-03-13 09:03:59', 0, 2),
(39, '2024-03-19 08:15:07', 0, 2),
(40, '2024-03-22 08:08:10', 2, 0),
(41, '2024-03-25 08:28:44', 2, 0),
(42, '2024-03-25 12:10:16', 0, 2),
(43, '2024-04-05 08:32:12', 0, 2),
(44, '2024-04-05 09:24:54', 2, 0),
(45, '2024-04-09 13:20:20', 2, 0),
(46, '2024-04-10 10:22:22', 2, 0),
(47, '2024-04-10 10:22:38', 0, 2),
(48, '2024-04-10 10:23:20', 2, 0),
(49, '2024-04-14 12:16:48', 0, 12),
(50, '2024-04-14 12:23:33', 0, 12),
(51, '2024-04-14 12:24:57', 0, 12),
(52, '2024-04-14 12:26:50', 0, 12),
(53, '2024-04-14 12:46:01', 0, 5),
(54, '2024-04-14 12:46:40', 0, 5),
(55, '2024-04-15 08:34:44', 0, 5),
(56, '2024-04-15 08:34:58', 0, 5),
(57, '2024-04-15 09:06:52', 0, 5),
(58, '2024-04-15 09:18:57', 0, 5),
(59, '2024-04-15 09:27:57', 0, 5),
(60, '2024-04-15 09:28:41', 0, 5),
(61, '2024-04-15 09:31:33', 0, 5),
(62, '2024-04-15 09:35:34', 0, 5),
(63, '2024-04-15 09:35:59', 0, 5),
(64, '2024-04-15 11:13:02', 0, 5),
(65, '2024-04-15 11:13:43', 0, 5),
(66, '2024-04-16 09:11:35', 0, 5),
(67, '2024-04-16 09:11:48', 0, 5),
(68, '2024-04-16 09:18:31', 0, 5),
(69, '2024-04-16 09:20:15', 0, 5),
(70, '2024-04-16 09:22:45', 0, 5),
(71, '2024-04-16 09:27:09', 0, 5),
(72, '2024-04-16 09:28:13', 0, 5),
(73, '2024-04-16 09:28:17', 0, 5),
(74, '2024-04-16 09:28:26', 0, 5),
(75, '2024-04-16 09:28:44', 0, 5),
(76, '2024-04-16 09:29:04', 0, 5),
(77, '2024-04-16 09:29:29', 0, 5),
(78, '2024-04-16 09:29:47', 0, 5),
(79, '2024-04-16 09:30:12', 0, 5),
(80, '2024-04-16 09:43:59', 0, 5),
(81, '2024-04-16 10:35:15', 0, 5),
(82, '2024-04-16 11:07:58', 0, 5),
(83, '2024-04-16 11:09:04', 0, 5),
(84, '2024-04-17 11:57:01', 2, 0),
(85, '2024-04-22 11:30:44', 0, 5),
(86, '2024-04-25 09:41:30', 0, 5),
(87, '2024-04-25 10:23:49', 2, 0),
(88, '2024-04-26 13:30:42', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `n_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `n_topic` varchar(300) NOT NULL,
  `n_info` text NOT NULL,
  `n_img` varchar(100) NOT NULL,
  `n_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`n_id`, `e_id`, `n_topic`, `n_info`, `n_img`, `n_date`) VALUES
(1, 2, 'หัวข้อการทดสอบข่าวสาร', 'ทดสอบการเพิ่มข่าวสารในหน้าข่าวสาร', 'window_xp.jpg', '2023-12-01 08:10:29'),
(2, 2, 'โปรโมชั่น', 'โปรโมชั่นตัวที่ 1', 'space.jpg', '2023-12-01 08:10:35'),
(4, 2, 'เก้าอี้สนาม พับได้ มีกระเป๋า รับน้ำหนักได้ไม่เกิน 120 กก.', '📌📌อ่านรายละเอียดก่อนกดสั่งซื้อ📌📌\r\n\r\n📸กรุณาบันทึกวิดีโอก่อนทำการแกะกล่องสินค้า📸 เพื่อเป็นหลักฐานในการทำเรื่องขอเคลมสินค้า ในกรณีได้สินค้าไม่ครบหรือสินค้ามีปัญหา หากไม่บันทึกวิดีโอทางร้านจะไม่รับผิดชอบในทุกกรณี หากมีวิดีโอหลักฐานชัดเจนเคลมได้ 100%\r\n\r\n******เก้าอี้สนามพับได้ พร้อมที่รองแขน ที่วางแก้วด้านข้าง******\r\n- ขนาด 50x50x80 ซม.\r\n- รับน้ำหนักได้ 120 กก.\r\n- เนื้อผ้าผลิตจาก เส้นใยโพลีเอสเตอร์\r\n- ท่อเหล็กพ่นสีกันสนิมหนา 16 มม.\r\n- ขนาดเก้าอี้เมื่อกาง : 82 x 50 x 80 ซม.\r\n- ขนาดสินค้า: กว้าง 50 ยาว 50 สูง 80 ซม.\r\n- น้ำหนักสินค้า 1.75 กก. \r\n- มี 2 สี ได้แก่ สีกรมและสีดำ', 'chair.jpg', '2024-01-11 11:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `o_date` datetime NOT NULL,
  `o_send` datetime DEFAULT NULL,
  `o_status` varchar(100) NOT NULL,
  `o_received` datetime DEFAULT NULL,
  `o_price` float(15,2) NOT NULL,
  `o_img` varchar(100) NOT NULL,
  `o_address` tinytext NOT NULL,
  `c_mail` varchar(50) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `o_ref` varchar(16) NOT NULL,
  `r_code` varchar(5) NOT NULL,
  `o_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `c_id`, `o_date`, `o_send`, `o_status`, `o_received`, `o_price`, `o_img`, `o_address`, `c_mail`, `c_name`, `o_ref`, `r_code`, `o_type`) VALUES
(165, 5, '2024-04-29 18:10:33', '2024-05-01 19:29:40', 'กำลังตรวจสอบหลักฐานการชำระเงิน', '2024-05-08 19:19:04', 5050.00, 'transaction history.jpeg', '222 Vibhavadi Rangsit Rd, Sanambin, Don Mueang, Bangkok 10210', 'punthung.jirapat@gmail.com', 'J_P', '937674764453098', '', 'การสั่งซื้อสินค้า');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `d_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `d_quantity` int(11) NOT NULL,
  `d_size` varchar(10) NOT NULL,
  `d_status` varchar(50) NOT NULL,
  `o_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`d_id`, `p_id`, `c_id`, `d_quantity`, `d_size`, `d_status`, `o_date`) VALUES
(68, 2, 5, 100, '5x10', 'Ordered', '2024-04-29 18:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_type` varchar(30) NOT NULL,
  `p_size` varchar(50) NOT NULL,
  `p_thick` int(20) NOT NULL,
  `p_color` varchar(50) NOT NULL,
  `p_weight` int(20) NOT NULL,
  `p_price` double(10,2) NOT NULL,
  `p_img` varchar(100) NOT NULL,
  `p_stock` int(11) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_type`, `p_size`, `p_thick`, `p_color`, `p_weight`, `p_price`, `p_img`, `p_stock`, `p_status`) VALUES
(1, 'ถุงหูหิ้วเหรียญแดง ขนาด 5 x 9 นิ้ว', 'ถุงหูหิ้ว (เหรียญแดง)', '5x9', 18, 'สีขาวใส', 60, 0.00, 'page 1/red_white5x9.webp', 0, 'วางจำหน่าย'),
(2, 'ถุงหูหิ้วเหรียญแดง ขนาด 5 x 10 นิ้ว', 'ถุงหูหิ้ว (เหรียญแดง)', '5x10', 18, 'สีขาวใส', 60, 50.00, 'page 1/red_white5x10.webp', 0, 'วางจำหน่าย'),
(3, 'ถุงหูหิ้วเหรียญแดง ขนาด 6 x 11 นิ้ว', 'ถุงหูหิ้ว (เหรียญแดง)', '6x11', 20, 'สีขาวใส', 100, 0.00, 'page 1/red_white6x11.webp', 0, 'วางจำหน่าย'),
(4, 'ถุงหูหิ้วเหรียญแดง ขนาด 6 x 14 นิ้ว', 'ถุงหูหิ้ว (เหรียญแดง)', '6x14', 20, 'สีขาวใส', 130, 0.00, 'page 1/red_white6x14.webp', 0, 'วางจำหน่าย'),
(5, 'ถุงหูหิ้วเหรียญแดง ขนาด 8 x 15 นิ้ว', 'ถุงหูหิ้ว (เหรียญแดง)', '8x15', 24, 'สีขาวใส', 210, 0.00, 'page 1/red_white8x15.webp', 0, 'วางจำหน่าย'),
(6, 'ถุงหูหิ้วเหรียญแดง ขนาด 8 x 16 นิ้ว', 'ถุงหูหิ้ว (เหรียญแดง)', '8x16', 24, 'สีขาวใส', 220, 0.00, 'page 1/red_white8x16.webp', 0, 'วางจำหน่าย'),
(7, 'ถุงหูหิ้วเหรียญแดง ขนาด 9 x 18 นิ้ว', 'ถุงหูหิ้ว (เหรียญแดง)', '9x18', 27, 'สีขาวใส', 310, 0.00, 'page 1/red_white9x18.webp', 0, 'วางจำหน่าย'),
(8, 'ถุงหูหิ้วเหรียญแดง เกรด A ขนาด 12 x 20 นิ้ว', 'ถุงหูหิ้ว (เหรียญแดง)', '12x20', 32, 'สีขาวใส', 510, 0.00, 'page 1/red_white12x20.webp', 0, 'วางจำหน่าย'),
(9, 'ถุงหูหิ้วเหรียญแดง ขนาด 12 x 26 นิ้ว', 'ถุงหูหิ้ว (เหรียญแดง)', '12x26', 32, 'สีขาวใส', 510, 0.00, 'page 1/red_white12x26.webp', 0, 'วางจำหน่าย'),
(10, 'ถุงหูหิ้วเหรียญแดง เกรด A ขนาด 6 x 14 นิ้ว (สีเหลือง)', 'ถุงหูหิ้ว (เหรียญแดง)', '6x14', 20, 'สีเหลือง', 130, 0.00, 'page 1/red_white6x14.webp', 0, 'วางจำหน่าย'),
(11, 'ถุงหูหิ้วเหรียญแดง เกรด A ขนาด 6 x 14 (สีเขียว)', 'ถุงหูหิ้ว (เหรียญแดง)', '6x14', 20, 'สีเขียว', 130, 0.00, 'page 1/red_green6x14.webp', 0, 'วางจำหน่าย'),
(12, 'ถุงหูหิ้วเหรียญแดง เกรด A ขนาด 8 x 15 นิ้ว (สีชมพู)', 'ถุงหูหิ้ว (เหรียญแดง)', '8x15', 24, 'สีชมพู', 210, 0.00, 'page 1/red_pink8x15.webp', 0, 'วางจำหน่าย'),
(13, 'ถุงหูหิ้วเหรียญแดง เกรด A ขนาด 8 x 15 นิ้ว (สีฟ้า)', 'ถุงหูหิ้ว (เหรียญแดง)', '8x15', 24, 'สีฟ้า', 210, 0.00, 'page 2/red_blue8x15.webp', 0, 'วางจำหน่าย'),
(14, 'ถุงหูหิ้วเหรียญแดง เกรด A ขนาด 8 x 16 นิ้ว (สีเขียว)', 'ถุงหูหิ้ว (เหรียญแดง)', '8x16', 24, 'สีเขียว', 220, 0.00, 'page 2/red_green8x16.webp', 0, 'วางจำหน่าย'),
(15, 'ถุงหูหิ้วเหรียญแดง เกรด A ขนาด 8 x 16 นิ้ว (สีเหลือง)', 'ถุงหูหิ้ว (เหรียญแดง)', '8x16', 24, 'สีเหลือง', 220, 0.00, 'page 2/yellow8x16.webp', 0, 'วางจำหน่าย'),
(16, 'ถุงหูหิ้วเหรียญแดง เกรด A ขนาด 12 x 20 นิ้ว (สีชมพู)', 'ถุงหูหิ้ว (เหรียญแดง)', '12x20', 32, 'สีชมพู', 510, 0.00, 'page 2/red_pink.12x20.webp', 0, 'วางจำหน่าย'),
(17, 'ถุงหูหิ้วเหรียญแดง เกรด A ขนาด 12 x 20 นิ้ว (สีเขียว)', 'ถุงหูหิ้ว (เหรียญแดง)', '12x20', 32, 'สีเขียว', 510, 0.00, 'page 2/red_green12x20.webp', 0, 'วางจำหน่าย'),
(18, 'ถุงหูหิ้วเหรียญเขียว ขนาด 6 x 14 นิ้ว', 'ถุงหูหิ้ว (เหรียญเขียว)', '6x14', 25, 'สีขาวใส', 105, 0.00, 'page 2/green_white6x14.webp', 0, 'วางจำหน่าย'),
(19, 'ถุงหูหิ้วเหรียญเขียว ขนาด 8 x 15 นิ้ว', 'ถุงหูหิ้ว (เหรียญเขียว)', '8x15', 33, 'สีขาวใส', 170, 0.00, 'page 2/green_white8x15.webp', 0, 'วางจำหน่าย'),
(20, 'ถุงหูหิ้วเหรียญเขียว ขนาด 9 x 18 นิ้ว', 'ถุงหูหิ้ว (เหรียญเขียว)', '9x18', 35, 'สีขาวใส', 250, 0.00, 'page 2/green_white9x18.webp', 0, 'วางจำหน่าย'),
(21, 'ถุงหูหิ้วเหรียญเขียว ขนาด 12 x 20 นิ้ว', 'ถุงหูหิ้ว (เหรียญเขียว)', '12x20', 65, 'สีขาวใส', 450, 0.00, 'page 2/green_white12x20.webp', 0, 'วางจำหน่าย'),
(22, 'ถุงหูหิ้วเหรียญเขียว ขนาด 12 x 26 นิ้ว', 'ถุงหูหิ้ว (เหรียญเขียว)', '12x26', 65, 'สีขาวใส', 500, 0.00, 'page 2/green_white12x26.webp', 0, 'วางจำหน่าย'),
(23, 'ถุงหูหิ้วเหรียญเขียว ขนาด 8 x 15 นิ้ว (สีชมพู)', 'ถุงหูหิ้ว (เหรียญเขียว)', '8x15', 33, 'สีชมพู', 170, 0.00, 'page 2/green_pink8x15.webp', 0, 'วางจำหน่าย'),
(24, 'ถุงหูหิ้วเหรียญเขียว ขนาด 9 x 18 นิ้ว (สีเหลือง)', 'ถุงหูหิ้ว (เหรียญเขียว)', '9x18', 35, 'สีเหลือง', 250, 0.00, 'page 2/green_yellow9x18.webp', 0, 'วางจำหน่าย'),
(25, 'ถุงหูหิ้วเหรียญเขียว ขนาด 12 x 20 นิ้ว (สีชมพู)', 'ถุงหูหิ้ว (เหรียญเขียว)', '12x20', 65, 'สีชมพู', 450, 0.00, 'page 3/green_pink12x20.webp', 0, 'วางจำหน่าย'),
(26, 'ถุงหูหิ้วเหรียญส้ม ขนาด 6 x 11 นิ้ว', 'ถุงหูหิ้ว (เหรียญส้ม)', '6x11', 20, 'สีขาวใส', 90, 0.00, 'page 3/orange_white6x11.webp', 0, 'วางจำหน่าย'),
(27, 'ถุงหูหิ้วเหรียญส้ม ขนาด 6 x 14 นิ้ว', 'ถุงหูหิ้ว (เหรียญส้ม)', '6x14', 20, 'สีขาวใส', 110, 0.00, 'page 3/orange_white6x14.webp', 0, 'วางจำหน่าย'),
(28, 'ถุงหูหิ้วเหรียญส้ม ขนาด 8 x 15 นิ้ว', 'ถุงหูหิ้ว (เหรียญส้ม)', '8x15', 24, 'สีขาวใส', 180, 0.00, 'page 3/orange_white8x15.webp', 0, 'วางจำหน่าย'),
(29, 'ถุงหูหิ้วเหรียญส้ม ขนาด 8 x 16 นิ้ว', 'ถุงหูหิ้ว (เหรียญส้ม)', '8x16', 24, 'สีขาวใส', 180, 0.00, 'page 3/orange_white8x16.webp', 0, 'วางจำหน่าย'),
(30, 'ถุงหูหิ้วเหรียญส้ม ขนาด 9 x 18 นิ้ว', 'ถุงหูหิ้ว (เหรียญส้ม)', '9x18', 27, 'สีขาวใส', 270, 0.00, 'page 3/orange_white9x18.webp', 0, 'วางจำหน่าย'),
(31, 'ถุงหูหิ้วเหรียญส้ม ขนาด 12 x 20 นิ้ว', 'ถุงหูหิ้ว (เหรียญส้ม)', '12x20', 32, 'สีขาวใส', 470, 0.00, 'page 3/orange_white12x20.webp', 0, 'วางจำหน่าย'),
(32, 'ถุงหูหิ้วเหรียญฟ้า ขนาด 6 x 12 นิ้ว (ถุงห่อฝรั่ง)', 'ถุงหูหิ้ว (ห่อฝรั่ง)', '6x12', 18, 'สีขาวใส', 120, 0.00, 'page 3/blue_white6x12.webp', 0, 'วางจำหน่าย'),
(33, 'ถุงหูหิ้วเหรียญชมพู ขนาด 6 x 11 นิ้ว (500กรัม)', 'ถุงหูหิ้ว (เหรียญใสกิโล)', '6x11', 25, 'สีขาวใส', 500, 0.00, 'page 3/pink_white6x11.webp', 0, 'วางจำหน่าย'),
(34, 'ถุงหูหิ้วเหรียญชมพู ขนาด 6 x 14 นิ้ว (500 กรัม)', 'ถุงหูหิ้ว (เหรียญใสกิโล)', '6x14', 25, 'สีขาวใส', 500, 0.00, 'page 3/pink_white6x14.webp', 0, 'วางจำหน่าย'),
(35, 'ถุงหูหิ้วเหรียญชมพู ขนาด 8 x 15 นิ้ว (500 กรัม)', 'ถุงหูหิ้ว (เหรียญใสกิโล)', '8x15', 33, 'สีขาวใส', 500, 0.00, 'page 3/pink_white8x15.webp', 0, 'วางจำหน่าย'),
(36, 'ถุงหูหิ้วเหรียญชมพู ขนาด 9 x 18 นิ้ว (500 กรัม)', 'ถุงหูหิ้ว (เหรียญใสกิโล)', '9x18', 35, 'สีขาวใส', 500, 0.00, 'page 3/pink_white9x18.webp', 0, 'วางจำหน่าย'),
(37, 'ถุงหูหิ้วม้าส้ม ขนาด 6 x 11 นิ้ว (500 กรัม)', 'ถุงหูหิ้ว (ม้าน้ำส้ม)', '6x11', 30, 'สีขาวใส', 500, 0.00, 'page 4/seahores_orange_white6x11.webp', 0, 'วางจำหน่าย'),
(38, 'ถุงหูหิ้วม้าส้ม ขนาด 6 x 14 นิ้ว (500 กรัม)', 'ถุงหูหิ้ว (ม้าน้ำส้ม)', '6x14', 30, 'สีขาวใส', 500, 0.00, 'page 4/seahores_orange_white6x14.webp', 0, 'วางจำหน่าย'),
(39, 'ถุงหูหิ้วม้าส้ม ขนาด 7 x 15 นิ้ว (500 กรัม)', 'ถุงหูหิ้ว (ม้าน้ำส้ม)', '7x15', 35, 'สีขาวใส', 500, 0.00, 'page 4/seahorse_orange_white7x15.webp', 0, 'วางจำหน่าย'),
(40, 'ถุงหูหิ้วม้าส้ม ขนาด 8 x 16 นิ้ว (500 กรัม)', 'ถุงหูหิ้ว (ม้าน้ำส้ม)', '8x16', 35, 'สีขาวใส', 500, 0.00, 'page 4/seahorse_orange_white8x16.webp', 0, 'วางจำหน่าย'),
(41, 'ถุงหูหิ้วม้าส้ม ขนาด 9 x 18 นิ้ว (500 กรัม)', 'ถุงหูหิ้ว (ม้าน้ำส้ม)', '9x18', 40, 'สีขาวใส', 500, 0.00, 'page 4/seahores_orange_white9x18.webp', 0, 'วางจำหน่าย'),
(42, 'ถุงหูหิ้ว ตรา ม้าน้ำคู่ ขนาด 14 x 26 นิ้ว (รุ่น หนาพิเศษ )', 'ถุงหูหิ้ว (ม้าน้ำหนาพิเศษ)', '14x26', 68, 'สีชมพู', 800, 0.00, 'page 4/seahores_pink_speacial14x26.webp', 0, 'วางจำหน่าย'),
(43, 'ถุงหูหิ้ว ตรา ม้าน้ำคู่ ขนาด 15 x 28 นิ้ว (รุ่น หนาพิเศษ )', 'ถุงหูหิ้ว (ม้าน้ำหนาพิเศษ)', '15x28', 70, 'สีชมพู', 500, 0.00, 'page 4/seahores_pink_speacial15x28.webp', 0, 'วางจำหน่าย'),
(44, 'ถุงหูหิ้ว ตรา ม้าน้ำคู่ ขนาด 15 x 30 นิ้ว (รุ่น หนาพิเศษ )', 'ถุงหูหิ้ว (ม้าน้ำหนาพิเศษ)', '15x30', 65, 'สีขาว', 500, 0.00, 'page 4/seahores_white_speacial15x30.webp', 0, 'วางจำหน่าย'),
(45, 'ถุงหูหิ้ว ตรา ม้าน้ำคู่ ขนาด 18 x 30 นิ้ว (รุ่น หนาพิเศษ )', 'ถุงหูหิ้ว (ม้าน้ำหนาพิเศษ)', '18x30', 75, 'สีชมพู', 1000, 0.00, 'page 4/seahores_pink_speacial18x30.webp', 0, 'วางจำหน่าย'),
(46, 'ถุงหูหิ้วกิโล หนา เกรด AB ขนาด 6 x 11 นิ้ว', 'ถุงหูหิ้ว (กิโลหนา)', '6x11', 55, 'สีขาวใส', 500, 0.00, 'page 4/seahores_blue_white6x11.webp', 0, 'วางจำหน่าย'),
(47, 'ถุงหูหิ้วกิโล หนา เกรด AB ขนาด 6 x 14 นิ้ว', 'ถุงหูหิ้ว (กิโลหนา)', '6x14', 55, 'สีขาวใส', 500, 0.00, 'page 4/seahores_blue_white6x14.webp', 0, 'วางจำหน่าย'),
(48, 'ถุงหูหิ้วกิโล หนา เกรด AB ขนาด 7 x 15 นิ้ว', 'ถุงหูหิ้ว (กิโลหนา)', '7x15', 60, 'สีขาวใส', 500, 0.00, 'page 4/seahores_blue_white7x15.webp', 0, 'วางจำหน่าย'),
(49, 'ถุงหูหิ้วกิโล หนา เกรด AB ขนาด 8 x 16 นิ้ว', 'ถุงหูหิ้ว (กิโลหนา)', '8x16', 60, 'สีขาวใส', 500, 0.00, 'page 5/seahores_blue_white8x16.webp', 0, 'วางจำหน่าย'),
(50, 'ถุงหูหิ้วกิโล หนา เกรด AB ขนาด 9 x 18 นิ้ว', 'ถุงหูหิ้ว (กิโลหนา)', '9x18', 60, 'สีขาวใส', 500, 0.00, 'page 5/seahores_blue_white9x18.webp', 0, 'วางจำหน่าย'),
(51, 'ถุงหูหิ้วกิโล หนา เกรด AB ขนาด 12 x 20 นิ้ว', 'ถุงหูหิ้ว (กิโลหนา)', '12x20', 60, 'สีขาวใส', 500, 0.00, 'page 5/seahores_blue_white12x20.webp', 0, 'วางจำหน่าย'),
(52, 'ถุงหูหิ้วกิโล หนา เกรด AB ขนาด 12 x 26 นิ้ว', 'ถุงหูหิ้ว (กิโลหนา)', '12x26', 60, 'สีขาวใส', 500, 0.00, 'page 5/seahores_blue_white12x26.webp', 0, 'วางจำหน่าย'),
(53, 'ถุงใส่น้ำ HDPE เกรด A ขนาด 5 x 9 นิ้ว', 'ถุงหูหิ้ว (ม้าน้ำ ถุงใส่น้ำ)', '5x9', 65, 'สีขาว', 500, 0.00, 'page 5/hdpe_red_white5x9.webp', 0, 'วางจำหน่าย'),
(54, 'ถุงใส่น้ำ HDPE เกรด A ขนาด 5 x 10 นิ้ว', 'ถุงหูหิ้ว (ม้าน้ำ ถุงใส่น้ำ)', '5x10', 60, 'สีขาว', 500, 0.00, 'page 5/hdpe_red_white5x10.webp', 0, 'วางจำหน่าย'),
(55, 'ถุงใส่น้ำ HDPE เกรด A ขนาด 5 x 11 นิ้ว', 'ถุงหูหิ้ว (ม้าน้ำ ถุงใส่น้ำ)', '5x11', 65, 'สีขาว', 500, 0.00, 'page 5/hdpe_red_white5x11.webp', 0, 'วางจำหน่าย'),
(56, 'ถุงใส่น้ำ HDPE เกรด A ขนาด 6 x 11 นิ้ว', 'ถุงหูหิ้ว (ม้าน้ำ ถุงใส่น้ำ)', '6x11', 65, 'สีขาว', 500, 0.00, 'page 5/hdpe_red_white6x11.webp', 0, 'วางจำหน่าย'),
(57, 'ถุงใส่น้ำ HDPE เกรด A ขนาด 6 x 12 นิ้ว', 'ถุงหูหิ้ว (ม้าน้ำ ถุงใส่น้ำ)', '6x12', 65, 'สีขาว', 500, 0.00, 'page 5/hdpe_red_white6x12.webp', 0, 'วางจำหน่าย'),
(58, 'ถุง HDPE เกรด A ขนาด 6 x 9 นิ้ว (หนา)', 'ถุง HDPE เกรด A', '6x9', 70, 'สีขาว', 500, 0.00, 'page 5/hdpe_pink_white6x9.webp', 0, 'วางจำหน่าย'),
(59, 'ถุง HDPE เกรด A ขนาด 4 1/2 x 7 นิ้ว', 'ถุง HDPE เกรด A', '4.5x7', 60, 'สีขาว', 500, 0.00, 'page 5/hdpe_green_white4.5x7.webp', 0, 'วางจำหน่าย'),
(60, 'ถุง HDPE เกรด A ขนาด 5 x 8 นิ้ว', 'ถุง HDPE เกรด A', '5x8', 60, 'สีขาว', 500, 0.00, 'page 5/hdpe_green_white5x8.webp', 0, 'วางจำหน่าย'),
(61, 'ถุง HDPE เกรด A ขนาด 6 x 9 นิ้ว', 'ถุง HDPE เกรด A', '6x9', 60, 'สีขาว', 500, 0.00, 'page 6/hdpe_green_white6x9.webp', 0, 'วางจำหน่าย'),
(62, 'ถุง HDPE เกรด A ขนาด 7 x 11 นิ้ว', 'ถุง HDPE เกรด A', '7x11', 60, 'สีขาว', 500, 0.00, 'page 6/hdpe_green_white7x11.webp', 0, 'วางจำหน่าย'),
(63, 'ถุง HDPE เกรด A ขนาด 8 x 12 นิ้ว', 'ถุง HDPE เกรด A', '8x12', 60, 'สีขาว', 500, 0.00, 'page 6/hdpe_green_white8x12.webp', 0, 'วางจำหน่าย'),
(64, 'ถุง HDPE เกรด A ขนาด 9 x 14 นิ้ว', 'ถุง HDPE เกรด A', '9x14', 60, 'สีขาว', 500, 0.00, 'page 6/hdpe_green_white9x14.webp', 0, 'วางจำหน่าย'),
(65, 'ถุง HDPE เกรด A ขนาด 10 x 15 นิ้ว', 'ถุง HDPE เกรด A', '10x15', 60, 'สีขาว', 500, 0.00, 'page 6/hdpe_green_white10x15.webp', 0, 'วางจำหน่าย'),
(66, 'ถุง HDPE เกรด A ขนาด 12 x 18 นิ้ว', 'ถุง HDPE เกรด A', '12x18', 60, 'สีขาว', 0, 0.00, 'page 6/hdpe_green_white12x18.webp', 0, 'วางจำหน่าย'),
(67, 'ถุง HDPE เกรด A ขนาด 14 นิ้ว - 20 นิ้ว (แบบมัดละ 500 กรัม)', 'ถุง HDPE เกรด A', '14x20', 60, 'สีขาว', 500, 0.00, 'page 6/hdpe_500_white14x20.webp', 0, 'วางจำหน่าย'),
(68, 'ถุง HDPE เกรด AB (แบบมัดละ 500 กรัม)', 'ถุง HDPE เกรด AB', '20x30 ', 60, 'สีขาว', 500, 0.00, 'page 6/hdpe_500_ab.webp', 0, 'วางจำหน่าย'),
(69, 'ถุง IPP ใสลื่น ตรา ม้าน้ำคู่ ขนาด 4 x 6 นิ้ว', 'ถุง IPP ใสลื่น', '4x6', 150, 'สีขาวใส', 500, 0.00, 'page 6/seahores_ipp_blue4x6.webp', 0, 'วางจำหน่าย'),
(70, 'ถุง IPP ใสลื่น ตรา ม้าน้ำคู่ ขนาด 4 1/2 x 7 นิ้ว', 'ถุง IPP ใสลื่น', '4.5x7', 150, 'สีขาวใส', 500, 0.00, 'page 6/seahores_ipp_blue4.5x7.webp', 0, 'วางจำหน่าย'),
(71, 'ถุง IPP ใสลื่น ตรา ม้าน้ำคู่ ขนาด 5 x 8 นิ้ว', 'ถุง IPP ใสลื่น', '5x8', 150, 'สีขาวใส', 500, 0.00, 'page 6/seahores_ipp_blue5x8.webp', 0, 'วางจำหน่าย'),
(72, 'ถุง IPP ใสลื่น ตรา ม้าน้ำคู่ ขนาด 6 x 9 นิ้ว', 'ถุง IPP ใสลื่น', '6x9', 150, 'สีขาวใส', 500, 0.00, 'page 6/seahores_ipp_blue6x9.webp', 0, 'วางจำหน่าย'),
(73, 'ถุง IPP ใสลื่น ตรา ม้าน้ำคู่ ขนาด 7 x 11 นิ้ว', 'ถุง IPP ใสลื่น', '7x11', 150, 'สีขาวใส', 500, 0.00, 'page 7/seahores_ipp_blue7x11.webp', 0, 'วางจำหน่าย'),
(74, 'ถุง IPP ใสลื่น ตรา ม้าน้ำคู่ ขนาด 8 x 12 นิ้ว', 'ถุง IPP ใสลื่น', '8x12', 150, 'สีขาวใส', 500, 0.00, 'page 7/seahores_ipp_blue8x12.webp', 0, 'วางจำหน่าย'),
(75, 'ถุง IPP ใสพิเศษ ตรา ม้าน้ำคู่ ขนาด 6 x 9 นิ้ว', 'ถุง IPP ใสพิเศษ', '6x9', 210, 'สีขาวใส', 500, 0.00, 'page 7/seahores_ipp_green6x9.webp', 0, 'วางจำหน่าย'),
(76, 'ถุง IPP ใสพิเศษ ตรา ม้าน้ำคู่ ขนาด 7 x 11 นิ้ว', 'ถุง IPP ใสพิเศษ', '7x11', 210, 'สีขาวใส', 500, 0.00, 'page 7/seahores_ipp_green7x11.webp', 0, 'วางจำหน่าย'),
(77, 'ถุง IPP ใสพิเศษ ตรา ม้าน้ำคู่ ขนาด 8 x 12 นิ้ว', 'ถุง IPP ใสพิเศษ', '8x12', 210, 'สีขาวใส', 500, 0.00, 'page 7/seahores_ipp_green8x12.webp', 0, 'วางจำหน่าย'),
(78, 'ถุง IPP ใสพิเศษ ตรา ม้าน้ำคู่ ขนาด 9 x 14 นิ้ว', 'ถุง IPP ใสพิเศษ', '9x14', 210, 'สีขาวใส', 500, 0.00, 'page 7/seahores_ipp_green9x14.webp', 0, 'วางจำหน่าย'),
(79, 'ถุง IPP ใสพิเศษ ตรา ม้าน้ำคู่ ขนาด 10 x 15 นิ้ว', 'ถุง IPP ใสพิเศษ', '10x15', 210, 'สีขาวใส', 500, 0.00, 'page 7/seahores_ipp_green10x15.webp', 0, 'วางจำหน่าย'),
(80, 'ถุง IPP ใสพิเศษ ตรา ม้าน้ำคู่ ขนาด 12 x 18 นิ้ว', 'ถุง IPP ใสพิเศษ', '12x18', 210, 'สีขาวใส', 500, 0.00, 'page 7/seahores_ipp_green12x18.webp', 0, 'วางจำหน่าย'),
(81, 'ถุงหูหิ้วใส PP ตราเหรียญทอง ขนาด 6 x 11 นิ้ว', 'ถุงหูหิ้ว PP', '6x11', 60, 'สีขาวใส', 500, 0.00, 'page 7/pp_pink_white6x11.webp', 0, 'วางจำหน่าย'),
(82, 'ถุงหูหิ้วใส PP ตราเหรียญทอง ขนาด 6 x 14 นิ้ว', 'ถุงหูหิ้ว PP', '6x14', 60, 'สีขาวใส', 500, 0.00, 'page 7/pp_pink_white6x14.webp', 0, 'วางจำหน่าย'),
(83, 'ถุงหูหิ้วใส PP ตราเหรียญทอง ขนาด 7 x 15 นิ้ว', 'ถุงหูหิ้ว PP', '7x15', 60, 'สีขาวใส', 500, 0.00, 'page 7/pp_pink_white7x15.webp', 0, 'วางจำหน่าย'),
(84, 'ถุงหูหิ้วใส PP ตราเหรียญทอง ขนาด 8 x 16 นิ้ว', 'ถุงหูหิ้ว PP', '8x16', 60, 'สีขาวใส', 500, 0.00, 'page 7/pp_pink_white8x16.webp', 0, 'วางจำหน่าย'),
(85, 'ถุงหูหิ้วใส PP ตราเหรียญทอง ขนาด 9 x 18 นิ้ว', 'ถุงหูหิ้ว PP', '9x18', 60, 'สีขาวใส', 500, 0.00, 'page 8/pp_pink_white9x18.webp', 0, 'วางจำหน่าย'),
(86, 'ถุงหูหิ้วใส PP ตราเหรียญทอง ขนาด 12 x 20 นิ้ว', 'ถุงหูหิ้ว PP', '12x20', 60, 'สีขาวใส', 500, 0.00, 'page 8/pp_pink_white12x20.webp', 0, 'วางจำหน่าย'),
(87, 'ถุงร้อนใส PP ขนาด 2 1/2 x 4 นิ้ว', 'ถุงร้อน PP', '2.5x4', 60, 'สีขาวใส', 200, 0.00, 'page 8/pp_hot_white2.5x4.webp', 0, 'วางจำหน่าย'),
(88, 'ถุงร้อนใส PP ขนาด 4 x 7 นิ้ว', 'ถุงร้อน PP', '4x7', 60, 'สีขาวใส', 500, 0.00, 'page 8/pp_hot_white4x7.webp', 0, 'วางจำหน่าย'),
(89, 'ถุงร้อนใส PP ขนาด 3 x 5 นิ้ว', 'ถุงร้อน PP', '3x5', 60, 'สีขาวใส', 200, 0.00, 'page 8/pp_hot_red3x5.webp', 0, 'วางจำหน่าย'),
(90, 'ถุงร้อนใส PP ขนาด 3 1/2 x 6 นิ้ว', 'ถุงร้อน PP', '3.5x6', 60, 'สีขาวใส', 250, 0.00, 'page 8/pp_hot_red3.5x6.webp', 0, 'วางจำหน่าย'),
(91, 'ถุงร้อนใส PP ขนาด 4 x 6 นิ้ว', 'ถุงร้อน PP', '4x6', 60, 'สีขาวใส', 500, 0.00, 'page 8/pp_hot_red4x6.webp', 0, 'วางจำหน่าย'),
(92, 'ถุงร้อนใส PP ขนาด 4 1/2 x 7 นิ้ว', 'ถุงร้อน PP', '4.5x7', 65, 'สีขาวใส', 500, 0.00, 'page 8/pp_hot_red4.5x7.webp', 0, 'วางจำหน่าย'),
(93, 'ถุงร้อนใส PP ขนาด 5 x 8 นิ้ว', 'ถุงร้อน PP', '5x8', 65, 'สีขาวใส', 500, 0.00, 'page 8/pp_hot_red5x8.webp', 0, 'วางจำหน่าย'),
(94, 'ถุงร้อนใส PP ขนาด 5 x 9 นิ้ว', 'ถุงร้อน PP', '5x9', 65, 'สีขาวใส', 500, 0.00, 'page 8/pp_hot_red5x9.webp', 0, 'วางจำหน่าย'),
(95, 'ถุงร้อนใส PP ขนาด 6 x 9 นิ้ว', 'ถุงร้อน PP', '6x9', 70, 'สีขาวใส', 500, 0.00, 'page 8/pp_hot_red6x9.webp', 0, 'วางจำหน่าย'),
(96, 'ถุงร้อนใส PP ขนาด 6 x 10 นิ้ว', 'ถุงร้อน PP', '6x10', 70, 'สีขาวใส', 500, 0.00, 'page 9/pp_hot_red6x10.webp', 0, 'วางจำหน่าย'),
(97, 'ถุงร้อนใส PP ขนาด 6 x 11 นิ้ว', 'ถุงร้อน PP', '6x11', 70, 'สีขาวใส', 500, 0.00, 'page 9/pp_hot_red6x11.webp', 0, 'วางจำหน่าย'),
(98, 'ถุงร้อนใส PP ขนาด 6 x 12 นิ้ว', 'ถุงร้อน PP', '6x12', 70, 'สีขาวใส', 500, 0.00, 'page 9/pp_hot_red6x12.webp', 0, 'วางจำหน่าย'),
(99, 'ถุงร้อนใส PP ขนาด 8 x 12 นิ้ว', 'ถุงร้อน PP', '8x12', 70, 'สีขาวใส', 500, 0.00, 'page 9/pp_hot_red8x12.webp', 0, 'วางจำหน่าย'),
(100, 'ถุงร้อนใส PP ขนาด 9 x 14 นิ้ว', 'ถุงร้อน PP', '9x14', 70, 'สีขาวใส', 500, 0.00, 'page 9/pp_hot_red9x14.webp', 0, 'วางจำหน่าย'),
(101, 'ถุงร้อนใส PP ขนาด 10 x 15 นิ้ว', 'ถุงร้อน PP', '10x15', 70, 'สีขาวใส', 500, 0.00, 'page 8/pp_hot_red10x15.webp', 0, 'วางจำหน่าย'),
(102, 'ถุง PE เกรด A ขนาด 5 x 9 นิ้ว', 'ถุง PE', '5x9', 100, 'สีขาวใส', 500, 0.00, 'page 9/pe_a_blue5x9.webp', 0, 'วางจำหน่าย'),
(103, 'ถุง PE เกรด A ขนาด 6 x 9 นิ้ว', 'ถุง PE', '6x9', 100, 'สีขาวใส', 500, 0.00, 'page 9/pe_a_blue6x9.webp', 0, 'วางจำหน่าย'),
(104, 'ถุง PE เกรด A ขนาด 7 x 11 นิ้ว', 'ถุง PE', '7x11', 80, '500', 0, 0.00, 'page 9/pe_a_blue7x11.webp', 0, 'วางจำหน่าย'),
(105, 'ถุง PE เกรด A ขนาด 8 x 12 นิ้ว', 'ถุง PE', '8x12', 80, '500', 0, 0.00, 'page 9/pe_a_blue8x12.webp', 0, 'วางจำหน่าย'),
(106, 'ถุงพับจีบ ใส IPP ตรา ม้าน้ำคู่ ขนาด 5 x 8 นิ้ว', 'ถุงพับจีบใส', '5x8', 150, '500', 0, 0.00, 'page 9/seahorse_ipp_fold5x8.webp', 0, 'วางจำหน่าย'),
(107, 'ถุงพับจีบ ใส IPP ตรา ม้าน้ำคู่ ขนาด 7 x 11 นิ้ว', 'ถุงพับจีบใส', '7x11', 160, '500', 0, 0.00, 'page 10/seahores_ipp_fold7x11.webp', 0, 'วางจำหน่าย'),
(108, 'ถุงพับจีบ ใส IPP ตรา ม้าน้ำคู่ ขนาด 8 x 12 นิ้ว', 'ถุงพับจีบใส', '8x12', 160, '500', 0, 0.00, 'page 10/seahores_ipp_fold8x12.webp', 0, 'วางจำหน่าย'),
(109, 'ถุงพับจีบ ใส IPP ตรา ม้าน้ำคู่ ขนาด 9 x 14 นิ้ว', 'ถุงพับจีบใส', '9x14', 160, '500', 0, 0.00, 'page 10/seahores_ipp_fold9x14.webp', 0, 'วางจำหน่าย'),
(110, 'ถุง IPP พับจีบ ใส ตรา ม้าน้ำคู่ (พิมพ์ลายผลไม้)', 'ถุงพับจีบพิมพ์', ' ', 0, ' ', 0, 0.00, 'page 10/seahores_ipp_fold_fruit.webp', 0, 'วางจำหน่าย'),
(111, 'ถุง IPP พับจีบ ใส ตรา ม้าน้ำคู่ (พิมพ์ลายหัวใจ)', 'ถุงพับจีบพิมพ์', ' ', 0, ' ', 0, 0.00, 'page 10/seahores_ipp_fold_heart.webp', 0, 'วางจำหน่าย'),
(112, 'ถุง IPP พับจีบ ตราม้าน้ำคู่ (พิมพ์ลายลูกไม้)', 'ถุงพับจีบพิมพ์', ' ', 0, ' ', 0, 0.00, 'page 10/seahores_ipp_fold_lace.webp', 0, 'วางจำหน่าย'),
(113, 'กระดาษเคลือบพลาสติก เกรด A ขนาด 12 x 12 นิ้ว', 'แผ่นห่ออาหาร', '12x12', 0, '1000', 0, 0.00, 'page 10/seahores_hdpe_green12x12.webp', 0, 'วางจำหน่าย'),
(114, 'กระดาษเคลือบพลาสติก เกรด A ขนาด 12 x 14 นิ้ว', 'แผ่นห่ออาหาร', '12x14', 0, '1000', 0, 0.00, 'page 10/seahores_hdpe_green12x14.webp', 0, 'วางจำหน่าย'),
(115, 'แผ่นพลาสติก HDPE เกรด A ขนาด 12 x 12 นิ้ว', 'แผ่นห่ออาหาร', '12x12', 0, '1000', 0, 0.00, 'page 10/seahores_hdpe_red12x12.webp', 0, 'วางจำหน่าย');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `t_id` int(11) NOT NULL,
  `p_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`t_id`, `p_type`) VALUES
(1, 'ถุงพับจีบใส'),
(2, 'ถุงหูหิ้ว (เหรียญแดง)'),
(3, 'ถุงหูหิ้ว (เหรียญเขียว)'),
(4, 'ถุงหูหิ้ว (ห่อฝรั่ง)'),
(5, 'ถุงหูหิ้ว (เหรียญใสกิโล)'),
(6, 'ถุงหูหิ้ว (ม้าน้ำส้ม)'),
(7, 'ถุงหูหิ้ว (ม้าน้ำ หนาพิเศษ)'),
(8, 'ถุงหูหิ้ว (ม้าน้ำ กิโลหนา)'),
(9, 'ถุงหูหิ้ว (ม้าน้ำ ถุงใสน้ำ)'),
(10, 'ถุง HDPE เกรด A'),
(11, 'ถุง HDPE เกรด AB'),
(12, 'ถุง IPP ใสลื่น'),
(13, 'ถุง IPP ใสพิเศษ'),
(14, 'ถุงหูหิ้ว PP'),
(15, 'ถุงร้อน PP'),
(16, 'ถุง PE'),
(17, 'ถุง LLDPE'),
(18, 'ถุงพับจีบ - พิมพ์ลาย'),
(19, 'แผ่นห่ออาหาร');

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `r_id` int(11) NOT NULL,
  `r_status` varchar(30) NOT NULL,
  `r_img` varchar(50) NOT NULL,
  `r_video` varchar(50) NOT NULL,
  `r_cause` varchar(30) NOT NULL,
  `r_note` text NOT NULL,
  `r_code` varchar(5) NOT NULL,
  `o_id` int(7) NOT NULL,
  `o_date` datetime NOT NULL,
  `r_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `screenbag`
--

CREATE TABLE `screenbag` (
  `s_id` int(11) NOT NULL,
  `s_type` varchar(20) NOT NULL,
  `s_size` varchar(10) NOT NULL,
  `s_file` varchar(50) NOT NULL,
  `s_amount` int(7) NOT NULL,
  `s_text` text NOT NULL,
  `s_date` date NOT NULL,
  `c_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `screenbag`
--

INSERT INTO `screenbag` (`s_id`, `s_type`, `s_size`, `s_file`, `s_amount`, `s_text`, `s_date`, `c_id`) VALUES
(1, 'ถุงหูหิ้ว (เหรียญแดง', '5x10', 'Nature_3.png', 1000, 'ทดสอบการใช้งาน', '2024-04-09', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_num` (`c_mail`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id`),
  ADD UNIQUE KEY `c_num` (`e_mail`);

--
-- Indexes for table `fee_trans`
--
ALTER TABLE `fee_trans`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `login_log`
--
ALTER TABLE `login_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`n_id`),
  ADD KEY `e_id` (`e_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_name` (`p_name`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `screenbag`
--
ALTER TABLE `screenbag`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fee_trans`
--
ALTER TABLE `fee_trans`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `screenbag`
--
ALTER TABLE `screenbag`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `employee` (`e_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
