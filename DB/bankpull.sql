-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2017 at 12:38 AM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank123_bankpull`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_autopull`
--

CREATE TABLE `tbl_autopull` (
  `id` int(10) NOT NULL,
  `i_balance` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `d_create` datetime NOT NULL,
  `i_bank_list` int(4) NOT NULL,
  `s_ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_autopull_transaction_bay`
--

CREATE TABLE `tbl_autopull_transaction_bay` (
  `id` int(7) NOT NULL,
  `i_bank_list` int(6) NOT NULL,
  `d_datetime` datetime NOT NULL,
  `s_info` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `i_out` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `i_in` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `i_total` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `s_channel` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `i_posted` int(6) NOT NULL,
  `d_create` datetime NOT NULL,
  `d_update` datetime NOT NULL,
  `i_read` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_autopull_transaction_bbl`
--

CREATE TABLE `tbl_autopull_transaction_bbl` (
  `id` int(7) NOT NULL,
  `i_bank_list` int(6) NOT NULL,
  `d_datetime` datetime NOT NULL,
  `s_info` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `i_out` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `i_in` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `i_total` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `s_channel` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `i_posted` int(6) NOT NULL,
  `d_create` datetime NOT NULL,
  `d_update` datetime NOT NULL,
  `i_read` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_autopull_transaction_kbank`
--

CREATE TABLE `tbl_autopull_transaction_kbank` (
  `id` int(7) NOT NULL,
  `i_bank_list` int(6) NOT NULL,
  `d_datetime` datetime NOT NULL,
  `s_info` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `i_out` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `i_in` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `i_total` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `s_channel` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `i_posted` int(6) NOT NULL,
  `d_create` datetime NOT NULL,
  `d_update` datetime NOT NULL,
  `i_read` tinyint(4) NOT NULL,
  `s_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `s_bankno` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_autopull_transaction_ktb`
--

CREATE TABLE `tbl_autopull_transaction_ktb` (
  `id` int(7) NOT NULL,
  `i_bank_list` int(6) NOT NULL,
  `d_datetime` datetime NOT NULL,
  `s_info` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `i_out` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `i_in` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `i_total` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `s_channel` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `i_posted` int(6) NOT NULL,
  `d_create` datetime NOT NULL,
  `d_update` datetime NOT NULL,
  `i_read` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_autopull_transaction_scb`
--

CREATE TABLE `tbl_autopull_transaction_scb` (
  `id` int(7) NOT NULL,
  `i_bank_list` int(6) NOT NULL,
  `d_datetime` datetime NOT NULL,
  `s_info` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `i_out` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `i_in` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `i_total` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `s_channel` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `i_posted` int(6) NOT NULL,
  `d_create` datetime NOT NULL,
  `d_update` datetime NOT NULL,
  `i_read` tinyint(4) NOT NULL,
  `s_transactioncode` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `id` int(7) NOT NULL,
  `s_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `s_fname_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `s_fname_th` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `s_url` text COLLATE utf8_unicode_ci NOT NULL,
  `s_icon` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `i_index` int(3) NOT NULL,
  `i_status` int(3) NOT NULL DEFAULT '1',
  `s_js` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `i_calendar` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`id`, `s_name`, `s_fname_en`, `s_fname_th`, `s_url`, `s_icon`, `i_index`, `i_status`, `s_js`, `i_calendar`) VALUES
(1, 'SCB', 'The Siam Commercial Bank Public Company Limited', 'ธนาคารไทยพาณิชย์', 'https://www.nagieos.com/SCB.php', 'scb.png', 0, 1, 'scb.js', 0),
(2, 'KBank', 'Kasikornbank Public Company Limited', 'ธนาคารกสิกรไทย', 'https://www.nagieos.com/KBANK.php', 'kbank.png', 0, 1, 'kbank.js', 0),
(3, 'KTB', 'Krung Thai Bank Public Company Limited', 'ธนาคารกรุงไทย', 'https://www.nagieos.com/KTB.php', 'ktb.png', 0, 1, 'ktb.js', 0),
(4, 'BBL', 'Bangkok Bank Public Company Limited', 'ธนาคารกรุงเทพ', 'https://www.nagieos.com/BBL.php', 'bbl.png', 0, 1, 'bbl.js', 0),
(5, 'BAY', 'Bank of Ayudhya Public Company Limited', 'ธนาคารกรุงศรีอยุธยา', 'https://www.nagieos.com/BAY.php', 'bay.png', 0, 1, 'bay.js', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank_history`
--

CREATE TABLE `tbl_bank_history` (
  `id` int(7) NOT NULL,
  `i_bank_list` int(6) NOT NULL,
  `s_ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `i_total` double NOT NULL,
  `i_posted` int(6) NOT NULL,
  `d_create` datetime NOT NULL,
  `i_status` tinyint(1) NOT NULL,
  `s_time` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank_list`
--

CREATE TABLE `tbl_bank_list` (
  `id` int(7) NOT NULL,
  `i_bank` int(6) NOT NULL,
  `s_key` varchar(100) CHARACTER SET utf8 NOT NULL,
  `s_account_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `s_account_no` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `s_account_username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `s_account_password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `i_index` int(3) NOT NULL,
  `i_status` int(3) NOT NULL DEFAULT '1',
  `i_posted` int(6) NOT NULL,
  `d_create` datetime NOT NULL,
  `d_update` datetime NOT NULL,
  `d_lastpull` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `i_balance` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `s_encrypteduser` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `s_encryptedpass` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank_transaction`
--

CREATE TABLE `tbl_bank_transaction` (
  `id` int(7) NOT NULL,
  `i_bank_list` int(6) NOT NULL,
  `d_datetime` datetime NOT NULL,
  `s_info` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `i_out` double NOT NULL,
  `i_in` double NOT NULL,
  `i_total` double NOT NULL,
  `s_channel` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `i_posted` int(6) NOT NULL,
  `d_create` datetime NOT NULL,
  `d_update` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cronjob`
--

CREATE TABLE `tbl_cronjob` (
  `id` int(10) NOT NULL,
  `i_balance` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `d_create` datetime NOT NULL,
  `i_bank_list` int(4) NOT NULL,
  `s_ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cronjob_transaction`
--

CREATE TABLE `tbl_cronjob_transaction` (
  `id` int(7) NOT NULL,
  `i_bank_list` int(6) NOT NULL,
  `d_datetime` datetime NOT NULL,
  `s_info` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `i_out` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `i_in` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `i_total` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `s_channel` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `i_posted` int(6) NOT NULL,
  `d_create` datetime NOT NULL,
  `d_update` datetime NOT NULL,
  `i_read` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int(6) NOT NULL,
  `s_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `s_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `i_level` int(3) NOT NULL,
  `s_display_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `s_nickname` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `i_posted` int(5) NOT NULL,
  `d_create` datetime NOT NULL,
  `d_update` datetime NOT NULL,
  `s_img` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `s_username`, `s_password`, `i_level`, `s_display_name`, `s_nickname`, `i_posted`, `d_create`, `d_update`, `s_img`) VALUES
(1, 'admin', '11', 1, 'Anonymous1', 'Admin', 1, '0000-00-00 00:00:00', '2017-08-17 11:03:34', '1.jpg?v=1502942615'),
(2, 'adminuser', '1111', 2, 'Admin User', 'AdminUser', 1, '0000-00-00 00:00:00', '2017-07-15 12:27:18', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_useronline`
--

CREATE TABLE `tbl_useronline` (
  `id` int(10) NOT NULL,
  `SID` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `day` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `i_member` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_useronline`
--

INSERT INTO `tbl_useronline` (`id`, `SID`, `time`, `day`, `i_member`) VALUES
(798, '933f1369e62938fb00d404c8c542487a0c9ff9d4', '1502968714', '228', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_webconfig`
--

CREATE TABLE `tbl_webconfig` (
  `id` int(6) NOT NULL,
  `s_title` text COLLATE utf8_unicode_ci NOT NULL,
  `s_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `s_description` text COLLATE utf8_unicode_ci NOT NULL,
  `s_icon` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `s_about` text COLLATE utf8_unicode_ci NOT NULL,
  `s_contact` text COLLATE utf8_unicode_ci NOT NULL,
  `s_phone` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `s_email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `s_facebook` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `s_google` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `s_twitter` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `s_dev_by` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `s_logo` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `s_webstats` text COLLATE utf8_unicode_ci NOT NULL,
  `s_title_descript` text COLLATE utf8_unicode_ci NOT NULL,
  `s_fav` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `s_site_name` text COLLATE utf8_unicode_ci NOT NULL,
  `s_skins` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_webconfig`
--

INSERT INTO `tbl_webconfig` (`id`, `s_title`, `s_keyword`, `s_description`, `s_icon`, `s_about`, `s_contact`, `s_phone`, `s_email`, `s_facebook`, `s_google`, `s_twitter`, `s_dev_by`, `s_logo`, `s_webstats`, `s_title_descript`, `s_fav`, `s_site_name`, `s_skins`) VALUES
(1, 'Bank Transections', 'Bank Transections', 'Bank Transections', 'icon', '<p><strong>เกี่ยวกับเรา</strong></p>', '<p><strong>ติดต่อเรา</strong></p>', 'phone', 'email', 'facebook', 'google', 'twitter', '--a', '1.png', '', '', '1.ico', 'Bank Transections', 'blue');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_autopull`
--
ALTER TABLE `tbl_autopull`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_autopull_transaction_bay`
--
ALTER TABLE `tbl_autopull_transaction_bay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_autopull_transaction_bbl`
--
ALTER TABLE `tbl_autopull_transaction_bbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_autopull_transaction_kbank`
--
ALTER TABLE `tbl_autopull_transaction_kbank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_autopull_transaction_ktb`
--
ALTER TABLE `tbl_autopull_transaction_ktb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_autopull_transaction_scb`
--
ALTER TABLE `tbl_autopull_transaction_scb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bank_history`
--
ALTER TABLE `tbl_bank_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bank_list`
--
ALTER TABLE `tbl_bank_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bank_transaction`
--
ALTER TABLE `tbl_bank_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cronjob`
--
ALTER TABLE `tbl_cronjob`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cronjob_transaction`
--
ALTER TABLE `tbl_cronjob_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_useronline`
--
ALTER TABLE `tbl_useronline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_webconfig`
--
ALTER TABLE `tbl_webconfig`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_autopull`
--
ALTER TABLE `tbl_autopull`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_autopull_transaction_bay`
--
ALTER TABLE `tbl_autopull_transaction_bay`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_autopull_transaction_bbl`
--
ALTER TABLE `tbl_autopull_transaction_bbl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_autopull_transaction_kbank`
--
ALTER TABLE `tbl_autopull_transaction_kbank`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_autopull_transaction_ktb`
--
ALTER TABLE `tbl_autopull_transaction_ktb`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_autopull_transaction_scb`
--
ALTER TABLE `tbl_autopull_transaction_scb`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_bank_history`
--
ALTER TABLE `tbl_bank_history`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_bank_list`
--
ALTER TABLE `tbl_bank_list`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_bank_transaction`
--
ALTER TABLE `tbl_bank_transaction`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_cronjob`
--
ALTER TABLE `tbl_cronjob`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_cronjob_transaction`
--
ALTER TABLE `tbl_cronjob_transaction`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_useronline`
--
ALTER TABLE `tbl_useronline`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=799;
--
-- AUTO_INCREMENT for table `tbl_webconfig`
--
ALTER TABLE `tbl_webconfig`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
