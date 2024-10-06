-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2024 at 10:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL COMMENT 'ลำดับที่',
  `orderID` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `pro_id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสสินค้า',
  `orderPrice` float NOT NULL COMMENT 'ราคาสินค้า',
  `orderQty` int(11) NOT NULL COMMENT 'จำนวนที่สั่งซื้อ',
  `Total` float NOT NULL COMMENT 'ราคารวม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `orderID`, `pro_id`, `orderPrice`, `orderQty`, `Total`) VALUES
(66, 0000000011, 0000000004, 8, 3, 24),
(67, 0000000011, 0000000001, 10, 1, 10),
(68, 0000000012, 0000000002, 20, 1, 20),
(69, 0000000013, 0000000010, 12, 5, 60),
(70, 0000000014, 0000000008, 290, 7, 2030),
(71, 0000000015, 0000000004, 8, 1, 8),
(72, 0000000016, 0000000001, 10, 1, 10),
(73, 0000000017, 0000000001, 10, 1, 10),
(74, 0000000018, 0000000006, 3, 3, 9),
(75, 0000000019, 0000000009, 250, 2, 500),
(76, 0000000020, 0000000009, 250, 1, 250),
(77, 0000000021, 0000000010, 12, 4, 48),
(78, 0000000022, 0000000008, 290, 1, 290),
(79, 0000000023, 0000000009, 250, 1, 250),
(80, 0000000024, 0000000006, 3, 2, 6),
(81, 0000000025, 0000000009, 250, 3, 750),
(82, 0000000026, 0000000010, 12, 1, 12),
(83, 0000000027, 0000000010, 12, 4, 48),
(84, 0000000028, 0000000010, 12, 1, 12),
(85, 0000000029, 0000000004, 8, 2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `orderID` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `Account_Name` varchar(100) NOT NULL COMMENT 'ชื่อบัญชี',
  `pay_time` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'เวลาที่บันทึกข้อมูล',
  `pay_image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'รูปหลักฐานการชำระเงิน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`orderID`, `Account_Name`, `pay_time`, `pay_image`) VALUES
(0000000002, ' นายนำชัย ฮังกาสี2', '2024-10-05 08:46:05', ''),
(0000000003, ' นายนำชัย ฮังกาสี2', '2024-10-05 08:48:33', ''),
(0000000004, ' นายนำชัย ฮังกาสี2', '2024-10-05 08:49:58', 'pr_6700fdb653bc5.png'),
(0000000005, ' นายนำชัย ฮังกาสี2', '2024-10-05 08:51:56', 'pr_6700fe2ca8617.png'),
(0000000007, ' นายนำชัย ฮังกาสี2', '2024-10-05 09:00:41', 'pr_67010039eabc6.png'),
(0000000011, ' นายนำชัย ฮังกาสี2', '2024-10-05 09:08:58', 'pr_6701022a57273.png'),
(0000000012, ' นายนำชัย ฮังกาสี2', '2024-10-05 09:09:36', 'pr_6701025065d41.png'),
(0000000013, ' นายนำชัย ฮังกาสี2', '2024-10-05 09:36:24', 'pr_6701089862730.png'),
(0000000014, ' นายนำชัย ฮังกาสี2', '2024-10-05 11:26:13', 'pr_670122551cd8d.png'),
(0000000015, ' นายนำชัย ฮังกาสี2', '2024-10-05 11:43:32', 'pr_670126642d4c0.png'),
(0000000058, ' ได้แน่', '2024-10-04 16:12:48', 'pr_67001400dc57e.png'),
(0000000059, ' นายนำชัย ฮังกาสี2', '2024-10-04 16:13:51', 'pr_6700143fe9226.png'),
(0000000060, ' นายนำชัย ฮังกาสี2', '2024-10-04 16:24:14', 'pr_670016aed29c0.png'),
(0000000086, 'eiei', '2024-10-06 19:54:52', 'Valorant Screenshot 2024.09.30 - 19.11.41.35.png'),
(0000000123, ' test', '2024-10-06 19:40:06', 'pr_6702e79672b91.png'),
(0000012322, 'eieiei', '2024-10-06 19:53:35', 'Valorant Screenshot 2024.10.05 - 12.09.44.98.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `member_id` int(11) NOT NULL,
  `m_user` varchar(20) NOT NULL,
  `m_pass` varchar(20) NOT NULL,
  `m_level` varchar(50) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `m_email` varchar(100) NOT NULL,
  `lineid` varchar(100) NOT NULL,
  `m_tel` varchar(20) NOT NULL,
  `m_address` varchar(200) NOT NULL,
  `m_img` varchar(250) NOT NULL,
  `date_save` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`member_id`, `m_user`, `m_pass`, `m_level`, `m_name`, `m_email`, `lineid`, `m_tel`, `m_address`, `m_img`, `date_save`) VALUES
(1, 'admin', 'admin', 'admin', 'นายนำชัย ฮังกาสี', 'devtai@gmail.com', '0991231211', '09830009', 'กรุงเทพมหานคร', '39521278220240824_180802.jpg', '2021-06-01 19:04:28'),
(2, '123456', '123456', 'admin', 'dasd', 'sadas@asdsda.com', '', '90', 'asdaa', '21378480720240824_214430.png', '2024-08-24 14:44:30'),
(3, 'aas', 'aas', 'admin', 'Kasfwfs', 'sasdasds@asdsda.com', '', '120901', 'asdas', '204538016820240914_190243.png', '2024-08-24 14:45:34'),
(4, 'member', 'member', 'member', 'นายนำชัย ฮังกาสี2', 'sadas@asdsda.com', '345', '0120901', 'กุก็เก่งเหมือนกันนะเนี้ย 55', '47081500120240915_231243.png', '2024-09-13 15:42:53'),
(44, '6', '6', 'member', 'นายนำชัย ฮังกาสี55', 'sadas@asdsda.com', '', '0983738651', ' grsrsrt', '212491687520240916_141213.jpg', '2024-09-16 07:12:13'),
(45, 'Pond', '1234', 'member', 'test', 'test@test.com', 'test', '1234', ' ttest', '', '2024-10-06 15:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `type_id` int(11) NOT NULL,
  `p_detail` text NOT NULL,
  `p_img` varchar(200) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_qty` varchar(11) NOT NULL,
  `p_unit` varchar(20) NOT NULL,
  `p_view` int(10) NOT NULL DEFAULT 0,
  `datesave` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `p_name`, `type_id`, `p_detail`, `p_img`, `p_price`, `p_qty`, `p_unit`, `p_view`, `datesave`) VALUES
(1, 'ปากกาลูกลื่น', 2, 'เหมาะสำหรับทุกการใช้งาน: ไม่ว่าจะเป็นการเขียนบันทึก การเซ็นเอกสาร หรือการจดบันทึกในที่ประชุม ปากกาลูกลื่นของเราตอบโจทย์ทุกการใช้งาน', '9996243120240824_181423.jpeg', 10, '19', 'ชิ้น', 10, '2021-06-26 16:38:28'),
(2, 'สมุดปกหนา', 1, 'สมุดปกหนา เหมาะสำหรับใช้ เขียนบันทึก ', '102974820120240824_181926.jpg', 20, '4', 'ชิ้น', 42, '2021-06-26 16:46:13'),
(3, 'ดินสอ 2B', 3, 'ดินสอดีต้องดินสอเรา', '179237916720241006_144816.jpeg', 7, '4', 'ชิ้น', 77, '2021-06-26 16:46:35'),
(4, 'ยางลบ', 4, 'ลบได้ ลบดี ลบหมด ยางลบKAB SHOP', '191280412220241006_144716.jpeg', 8, '0', 'ชิ้น', 47, '2021-06-26 16:46:51'),
(6, 'ปากกาลูกลื่น', 2, 'asdasd', '174513131220241006_144658.jpeg', 3, '0', 'ชิ้น', 15, '2024-09-14 10:12:28'),
(8, 'ทดสอบ', 1, 'ทอดสอบ', '177433984320241006_144637.png', 290, '0', 'ชิ้น', 32, '2024-09-30 16:16:10'),
(9, 'ทอดสอบ', 1, 'ทอดสอบ', '196341713420241006_144621.png', 250, '0', 'ชิ้น', 15, '2024-09-30 16:16:32'),
(10, 'ทดสอบ', 1, 'ลอง', '54035211220241005_163413.jpg', 12, '0', 'ชิ้น', 86, '2024-09-30 16:19:33'),
(11, 'test', 0, 'test', '', 111, '2', '', 0, '2024-10-06 17:10:14'),
(12, 'test', 0, 'test', 'Desktop Screenshot 2024.10.06 - 02.48.10.56.png', 111, '2', '', 0, '2024-10-06 17:10:19'),
(13, 'test', 0, 'test', 'Desktop Screenshot 2024.10.06 - 02.48.10.56.png', 111, '2', '', 0, '2024-10-06 17:10:21'),
(14, 'asda', 0, 'asdasda', 'Desktop Screenshot 2024.10.06 - 02.48.10.56.png', 11, '1', '', 0, '2024-10-06 17:11:55'),
(15, 'asda', 0, 'asdasda', 'Desktop Screenshot 2024.10.06 - 02.48.10.56.png', 11, '1', '', 0, '2024-10-06 17:12:42'),
(1234, 'test', 0, 'test', 'Valorant Screenshot 2024.10.06 - 13.10.55.47.png', 12, '1', '', 0, '2024-10-06 17:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(1, 'สมุดเขียน'),
(2, 'ปากกา'),
(3, 'ดินสอ'),
(4, 'ยางลบ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `orderID` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `cus_id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสลูกค้า',
  `cus_name` varchar(60) NOT NULL COMMENT 'ชื่อ-นามสกุล',
  `address` text NOT NULL COMMENT 'ที่อยู่การจัดส่งสินค้า',
  `telephone` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `total_price` float NOT NULL COMMENT 'ราคารวมสุทธิ',
  `order_status` varchar(1) NOT NULL COMMENT '0=ยกเลิก,1=กำลังตรวจสอบ,2=ชำระเงินแล้ว,3=จัดส่งสินค้า',
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่สั่งซื้อ',
  `ems_code` varchar(15) NOT NULL COMMENT 'รหัส EMS'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`orderID`, `cus_id`, `cus_name`, `address`, `telephone`, `total_price`, `order_status`, `reg_date`, `ems_code`) VALUES
(0000000012, 0000000004, 'นายนำชัย ฮังกาสี2', 'กุก็เก่งเหมือนกันนะเนี้ย 55 ', '0120901', 20, '0', '2024-10-05 09:09:23', ''),
(0000000013, 0000000004, 'นายนำชัย ฮังกาสี2', 'กุก็เก่งเหมือนกันนะเนี้ย 55 ', '0120901', 60, '0', '2024-10-05 09:36:00', ''),
(0000000014, 0000000004, 'นายนำชัย ฮังกาสี2', 'กุก็เก่งเหมือนกันนะเนี้ย 55 ', '0120901', 2030, '2', '2024-10-05 11:25:59', ''),
(0000000015, 0000000004, 'นายนำชัย ฮังกาสี2', 'กุก็เก่งเหมือนกันนะเนี้ย 55 ', '0120901', 8, '1', '2024-10-05 11:41:06', ''),
(0000000016, 0000000004, 'นายนำชัย ฮังกาสี2', 'กุก็เก่งเหมือนกันนะเนี้ย 55 ', '0120901', 10, '1', '2024-10-05 14:23:35', ''),
(0000000017, 0000000004, 'นายนำชัย ฮังกาสี2', 'กุก็เก่งเหมือนกันนะเนี้ย 55 ', '0120901', 10, '1', '2024-10-05 17:04:26', ''),
(0000000018, 0000000045, 'test', ' ttest', '1234', 9, '3', '2024-10-06 15:10:15', ''),
(0000000019, 0000000045, 'test', ' ttest', '1234', 500, '2', '2024-10-06 15:10:47', ''),
(0000000020, 0000000045, 'test', ' ttest', '1234', 250, '0', '2024-10-06 16:38:44', ''),
(0000000021, 0000000045, 'test', ' ttest', '1234', 48, '0', '2024-10-06 17:20:04', ''),
(0000000022, 0000000045, 'test', ' ttest', '1234', 290, '1', '2024-10-06 17:58:58', ''),
(0000000023, 0000000045, 'test', ' ttest', '1234', 250, '1', '2024-10-06 19:11:33', ''),
(0000000024, 0000000045, 'test', ' ttest', '1234', 6, '1', '2024-10-06 19:12:20', ''),
(0000000025, 0000000045, 'test', ' ttest', '1234', 750, '1', '2024-10-06 19:12:28', ''),
(0000000026, 0000000045, 'test', ' ttest', '1234', 12, '0', '2024-10-06 19:39:30', ''),
(0000000027, 0000000045, 'test', ' ttest', '1234', 48, '1', '2024-10-06 19:51:38', ''),
(0000000028, 0000000045, 'test', ' ttest', '1234', 12, '1', '2024-10-06 19:54:38', ''),
(0000000029, 0000000045, 'test', ' ttest', '1234', 16, '1', '2024-10-06 20:04:38', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`orderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับที่', AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1235;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `orderID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'เลขที่ใบสั่งซื้อ', AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
