-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 09:28 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `full_name`, `u_email`, `u_pass`) VALUES
(0, 'pavanacharya', 'pavanachar0123@gmail.com', 'pavan1234');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendanceid` int(10) NOT NULL,
  `empid` int(10) NOT NULL,
  `attendance_type` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendanceid`, `empid`, `attendance_type`, `date`, `status`) VALUES
(0, 0, 'Present', '2022-08-07', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `beautycategory`
--

CREATE TABLE `beautycategory` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `beautysubcat`
--

CREATE TABLE `beautysubcat` (
  `subcat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(10) NOT NULL,
  `brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(0, 'bindhu');

-- --------------------------------------------------------

--
-- Table structure for table `brandoffer`
--

CREATE TABLE `brandoffer` (
  `offer_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `offer_name` varchar(10) NOT NULL,
  `offer_pre` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cancel`
--

CREATE TABLE `cancel` (
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `room_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `room_no` int(11) NOT NULL,
  `canceldate` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `prodid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `billid` int(11) NOT NULL,
  `ostatus` int(11) NOT NULL,
  `brand_offer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `roomtype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `checkindate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `checkintime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `checkoutdate` date NOT NULL,
  `room_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empid` int(10) NOT NULL,
  `empname` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `designation` varchar(125) NOT NULL,
  `salary` float(10,2) NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(250) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `empname`, `gender`, `emailid`, `password`, `designation`, `salary`, `contact_no`, `dob`, `address`, `status`) VALUES
(0, 'pavanacharya', 'Male', 'pavan12@gmail.com', 'pavan1234', '1234', 10000.00, '1234567890', '0000-00-00', 'udupi', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `subj_detail` varchar(10) NOT NULL,
  `feedback` text NOT NULL,
  `posted_date` datetime NOT NULL,
  `star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `o_statusid` int(11) NOT NULL,
  `purchase_order_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prodimage`
--

CREATE TABLE `prodimage` (
  `image_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `instock` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_type` varchar(20) NOT NULL,
  `total_amt` double(10,2) NOT NULL,
  `card_no` varchar(16) NOT NULL,
  `card_ccv` int(4) NOT NULL,
  `exp_month` int(11) NOT NULL,
  `exp_year` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `shipping_add` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `deliver_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `r_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `preview` text NOT NULL,
  `posted_date` datetime NOT NULL,
  `subject` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_no` int(11) NOT NULL,
  `r_typeid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_no`, `r_typeid`, `status`) VALUES
(202, 6, 0),
(203, 6, 0),
(204, 6, 0),
(205, 8, 0),
(206, 8, 1),
(207, 8, 0),
(208, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_book`
--

CREATE TABLE `room_book` (
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `services` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `roomtype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `checkindate` date NOT NULL,
  `checkintime` time NOT NULL,
  `checkoutdate` date NOT NULL,
  `occupancy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `confirm` int(11) NOT NULL,
  `roon_no` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `cancel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_book`
--

INSERT INTO `room_book` (`name`, `email_id`, `mobile`, `address`, `services`, `roomtype`, `checkindate`, `checkintime`, `checkoutdate`, `occupancy`, `confirm`, `roon_no`, `status`, `cancel`) VALUES
('pavanacharya', 'pavanachar0123@gmail.com', '8970931564', 'katapadi', 'food', 'special', '2022-08-09', '10:00:00', '2022-08-10', 'single', 0, 0, 0, 0),
('pavanacharya', 'pavanachar0123@gmail.com', '8970931564', 'katapadi', 'food', 'special', '2022-08-08', '09:45:00', '2022-08-09', 'single', 0, 0, 0, 0),
('pavanacharya', 'pavanachar0123@gmail.com', '8970931564', 'katapadi', 'food', 'special', '2022-08-10', '09:00:00', '2022-08-11', 'dubble', 0, 0, 0, 0),
('pavanacharya', 'pavanachar0123@gmail.com', '8970931564', 'katapadi', 'food', 'standard', '2022-08-08', '09:00:00', '2022-08-09', 'dubble', 2, 206, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_category`
--

CREATE TABLE `room_category` (
  `r_typeid` int(11) NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `detail` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `booked` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_category`
--

INSERT INTO `room_category` (`r_typeid`, `type`, `price`, `detail`, `img`, `booked`, `available`, `total`) VALUES
(6, 'special', 200, 'nn', '5.jpg', 7, 0, 7),
(8, 'standard', 500, 'family', '6257553_18120716310070154573.jpg', 2, 2, 4),
(10, 'single', 450, 'single', 'Suit_img.jpg', 0, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(10) NOT NULL,
  `empid` int(10) NOT NULL,
  `basicsalary` int(11) NOT NULL,
  `salarymonth` int(11) NOT NULL,
  `noworkingdays` int(10) NOT NULL,
  `daysworked` int(10) NOT NULL,
  `salary` float(10,2) NOT NULL,
  `deduction` float(10,2) NOT NULL,
  `bonus` float(10,2) NOT NULL,
  `overtime` float(10,2) NOT NULL,
  `date` date NOT NULL,
  `salyear` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `empid`, `basicsalary`, `salarymonth`, `noworkingdays`, `daysworked`, `salary`, `deduction`, `bonus`, `overtime`, `date`, `salyear`, `status`) VALUES
(1, 4, 5000, 8, 31, 1, 161.00, 0.00, 0.00, 0.00, '0000-00-00', 2020, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(11) NOT NULL,
  `seller_name` varchar(150) NOT NULL,
  `seller_email` varchar(100) NOT NULL,
  `seller_phone` varchar(15) NOT NULL,
  `seller_password` varchar(10) NOT NULL,
  `seller_address` text NOT NULL,
  `seller_city` varchar(100) NOT NULL,
  `company_pan` varchar(15) NOT NULL,
  `vat_tin_no` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sellerpayment`
--

CREATE TABLE `sellerpayment` (
  `payid` int(11) NOT NULL,
  `sellerid` int(11) NOT NULL,
  `total_amt` decimal(10,2) NOT NULL,
  `paidamount` decimal(10,2) NOT NULL,
  `admin_per` decimal(10,2) NOT NULL,
  `paid_date` date NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `s_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`s_name`, `details`, `image`) VALUES
('SWIMMING POOL', 'Guests staying at hotel may use the swimming pool area free of charge. Guests can swim at their own ', 'pool icon.png'),
('AIR CONDITIONER', 'The Samsung air conditioner has been designed from the ground up to be outstandingly efficient.', 'a.png'),
('FAST AND FREE WIFI', 'Hotel internet services is a full solution provider for secure wired and wireless internet services', 'ic.jfif'),
('CAB SERVICE', 'A taxicab known as a taxi or a cab  is a type of vehicle for hire with a driver used by a single pas', 'park.png'),
('CARD SERVICE', 'The guest indicated the method of payment he/she planned to use like credit cards, direct billing or', 'cc.jfif'),
('LAUNDRY SERVICE', 'Pay for any laundry services received. The total should be added to user bill, so you can take care ', 'ln.png');

-- --------------------------------------------------------

--
-- Table structure for table `shippingaddress`
--

CREATE TABLE `shippingaddress` (
  `adr_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `address_line1` text NOT NULL,
  `address_line2` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `emailid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblselleraccount`
--

CREATE TABLE `tblselleraccount` (
  `actid` int(11) NOT NULL,
  `sellerid` int(11) NOT NULL,
  `accountno` varchar(25) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblselleraccount`
--

INSERT INTO `tblselleraccount` (`actid`, `sellerid`, `accountno`, `bankname`, `branch`) VALUES
(1, 1, '08247588974563', 'canara bank', 'mallikatte');

-- --------------------------------------------------------

--
-- Table structure for table `tblstock`
--

CREATE TABLE `tblstock` (
  `stockid` int(11) NOT NULL,
  `prodid` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `type` varchar(15) NOT NULL,
  `pdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `contact_no`, `address`, `email_id`, `password`, `dob`, `status`, `gender`) VALUES
(0, 'AJESH', '9686618739', 'KATAPADY', 'rk.ajesh238@gmail.com', '12345678', '2020-08-31', 'Active', ''),
(0, 'ramya', '9865688956', 'uhhhh', 'ramya@gmail.com', '123456', '2020-08-31', 'Active', 'Male'),
(0, 'fervez', '7894561230', 'sad', 'bmfervez@gmail.com', '123456789', '2020-09-01', 'Active', 'Male'),
(0, 'pavanacharya', '8970931564', 'katapadi', 'pavanachar0123@gmail.com', 'pavan1234', '0000-00-00', 'Active', 'Male'),
(0, 'pavan acharya', '8970931564', 'katapadi', 'pavanachar0123@gamil.com', 'pavan123', '0000-00-00', 'Active', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wid` int(11) NOT NULL,
  `prodid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `brand_offer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wid`, `prodid`, `qty`, `userid`, `brand_offer`) VALUES
(1, 27, 1, 9, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendanceid`);

--
-- Indexes for table `beautycategory`
--
ALTER TABLE `beautycategory`
  --ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `beautysubcat`
--
ALTER TABLE `beautysubcat`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `brandoffer`
--
ALTER TABLE `brandoffer`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
   ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`o_statusid`);

--
-- Indexes for table `prodimage`
--
ALTER TABLE `prodimage`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `room_category`
--
ALTER TABLE `room_category`
  ADD PRIMARY KEY (`r_typeid`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `sellerpayment`
--
ALTER TABLE `sellerpayment`
  ADD PRIMARY KEY (`payid`);

--
-- Indexes for table `shippingaddress`
--
ALTER TABLE `shippingaddress`
  ADD PRIMARY KEY (`adr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `room_category`
--
ALTER TABLE `room_category`
  MODIFY `r_typeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
