-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2024 at 10:38 AM
-- Server version: 10.5.23-MariaDB-cll-lve
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coinmktg_hello`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(6) NOT NULL,
  `name` varchar(122) NOT NULL,
  `bwallet` varchar(122) NOT NULL,
  `pm` varchar(111) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `bwallet`, `pm`, `email`, `password`) VALUES
(1, 'Coinfigo Trading', '1K6af99Qcj1sQzF6BNTq2iJAKbmcL3Fpcn', '', 'admin@coinfigo.com', '$Udochukwu1999$');

-- --------------------------------------------------------

--
-- Table structure for table `btc`
--

CREATE TABLE `btc` (
  `id` int(11) NOT NULL,
  `usd` double NOT NULL,
  `method` varchar(255) NOT NULL,
  `email` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `proof` varchar(255) NOT NULL,
  `uto` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `btc`
--

INSERT INTO `btc` (`id`, `usd`, `method`, `email`, `status`, `proof`, `uto`, `date`) VALUES
(1, 300, 'bitcoin', 'coinbaze017@gmail.com', 'Completed', '655e902aee63f.png', 'btbtbtbtbtbtb', '22 Nov,2023'),
(2, 5000, 'litecoin', 'techvalley100@gmail.com', 'Completed', '655ed44945218.png', 'LSbQYbdPBcSkQ1b1oaXpz2zSRoDdtyzbM5', '23 Nov,2023'),
(3, 1000, 'Ethereum', 'techvalley100@gmail.com', 'Completed', '6560e6dd53b4a.png', '0x5f4db05b50eddc9e2f917be888ac528224ffaac9', '24 Nov,2023'),
(4, 50, 'usdttrc', 'onyiagerald333@gmail.com', 'Completed', '6561ef9732ccc.png', 'TZE3iMCospN4MWHPFxfqJYReT6k1dVDb95', '25 Nov,2023'),
(5, 1000, 'bitcoin', 'onyiagerald333@gmail.com', 'Completed', '6565167e89fed.png', '1Co4bn8Y9eAgSgQ57u9zwgWhxs1BDk1hNV', '27 Nov,2023'),
(6, 100, 'bitcoin', 'smithmendel00@gmail.com', 'Completed', '6568dd217b87b.png', '1Co4bn8Y9eAgSgQ57u9zwgWhxs1BDk1hNV', '30 Nov,2023'),
(7, 500, 'bitcoin', 'coinbaze017@gmail.com', 'Completed', '65690bf40bbbd.png', '1Co4bn8Y9eAgSgQ57u9zwgWhxs1BDk1hNV', '30 Nov,2023'),
(8, 2000, 'bitcoin', 'quantumfc111@gmail.com', 'Completed', '65691c731e165.png', '1Co4bn8Y9eAgSgQ57u9zwgWhxs1BDk1hNV', '30 Nov,2023'),
(10, 1000, 'bitcoin', 'ernstmarcelin32@gmail.com', 'Completed', '656a35243844a.png', 'bc1qdlgw2u9fnpeap03zhjxqh0n6n93gt58kdqhdvf', '01 Dec,2023');

-- --------------------------------------------------------

--
-- Table structure for table `package1`
--

CREATE TABLE `package1` (
  `id` int(6) NOT NULL,
  `pname` varchar(122) NOT NULL,
  `increase` double NOT NULL,
  `bonus` varchar(255) DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `froms` double NOT NULL,
  `tos` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package1`
--

INSERT INTO `package1` (`id`, `pname`, `increase`, `bonus`, `duration`, `froms`, `tos`) VALUES
(5, 'SILVER PLAN', 10, '0', 10, 200, 1000),
(6, 'GOLD PLAN', 15, '0', 10, 5000, 10000),
(8, 'DIAMOND PLAN', 20, '0', 10, 20000, 50000),
(9, 'PLATINUM PLAN', 35, '0', 10, 100000, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `package_request`
--

CREATE TABLE `package_request` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_request`
--

INSERT INTO `package_request` (`id`, `email`, `plan_id`, `status`) VALUES
(8, 'onyiagerald333@gmail.com', 6, 'Approved'),
(31, 'coinbaze017@gmail.com', 9, 'Pending'),
(33, 'techvalley100@gmail.com', 6, 'Approved'),
(34, 'ernstmarcelin32@gmail.com', 6, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `sitename` varchar(255) NOT NULL,
  `siteurl` varchar(255) NOT NULL,
  `sitemail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sitename`, `siteurl`, `sitemail`) VALUES
(1, 'coinfigo.com', 'coinfigo.com', 'support@coinfigo.com');

-- --------------------------------------------------------

--
-- Table structure for table `signals`
--

CREATE TABLE `signals` (
  `id` int(11) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `t_interval` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `directions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signals`
--

INSERT INTO `signals` (`id`, `symbol`, `t_interval`, `unit`, `amount`, `directions`) VALUES
(24, 'BTCUSDT', '1', '1', '1000', 'buy'),
(26, 'LTCBTC', '2', '2', '500', 'buy'),
(27, 'Btcusdt', '2 minutes', '2', '1$', 'buy');

-- --------------------------------------------------------

--
-- Table structure for table `stakes`
--

CREATE TABLE `stakes` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `currency` varchar(111) NOT NULL,
  `increase` double NOT NULL,
  `duration` int(111) NOT NULL,
  `pdate` varchar(111) NOT NULL,
  `froms` double NOT NULL,
  `activate` tinyint(4) NOT NULL,
  `usd` double NOT NULL,
  `profit` double NOT NULL,
  `payday` varchar(100) NOT NULL,
  `lprofit` double NOT NULL,
  `status` varchar(50) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `stakes`
--

INSERT INTO `stakes` (`id`, `email`, `currency`, `increase`, `duration`, `pdate`, `froms`, `activate`, `usd`, `profit`, `payday`, `lprofit`, `status`, `end_date`, `date`) VALUES
(1, 'coinbaze017@gmail.com', 'bitcoin', 13.8, 7, '2023-11-23 00:31:32', 0, 0, 200, 193.2, '2023/11/30', 165.6, '', '2023-11-30 00:31:32', '2023-11-23 00:31:32'),
(2, 'techvalley100@gmail.com', 'bitcoin', 8.05, 3, '2023-11-24 17:40:50', 0, 0, 1000, 241.5, '2023/11/27', 80.5, '', '2023-11-27 17:40:50', '2023-11-24 17:40:50'),
(3, 'coinbaze017@gmail.com', 'ethereum', 66, 30, '2023-11-30 23:11:04', 0, 1, 20, 26.4, '2023/12/02', 26.4, '', '2023-12-30 23:11:04', '2023-11-30 23:11:04'),
(4, 'techvalley100@gmail.com', 'ethereum', 0, 15, '2023-12-01 18:36:50', 0, 1, 5000, 0, '2023/12/02', 0, '', '2023-12-16 18:36:50', '2023-12-01 18:36:50'),
(5, 'onyiagerald333@gmail.com', 'ethereum', 0, 180, '2023-12-24 21:45:42', 0, 1, 2000, 0, '2024/02/14', 0, '', '2024-06-21 21:45:42', '2023-12-24 21:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `trade`
--

CREATE TABLE `trade` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `trade_type` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `units` varchar(255) NOT NULL,
  `trade_interval` varchar(255) NOT NULL,
  `market` varchar(255) NOT NULL,
  `profit` varchar(255) NOT NULL DEFAULT '0',
  `status` varchar(255) NOT NULL,
  `trade_exp` varchar(255) NOT NULL,
  `trade_set` varchar(255) NOT NULL,
  `win_loss` int(11) NOT NULL,
  `credited` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trade`
--

INSERT INTO `trade` (`id`, `email`, `trade_type`, `amount`, `symbol`, `units`, `trade_interval`, `market`, `profit`, `status`, `trade_exp`, `trade_set`, `win_loss`, `credited`) VALUES
(1, 'onyiagerald333@gmail.com', 'live', '100', 'EURUSD', '5', '10 minutes', 'sell', '0', '2', '2024-01-14 00:44:25', '2024-01-14 00:34:25', 0, 1),
(2, 'onyiagerald333@gmail.com', 'live', '50', 'BTCUSDT', '1', '1 minute', 'sell', '0', '2', '2024-01-14 00:43:50', '2024-01-14 00:42:50', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `fname` varchar(1000) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL DEFAULT '0',
  `account_type` varchar(255) NOT NULL DEFAULT 'demo',
  `demo_balance` varchar(255) NOT NULL DEFAULT '50000',
  `id_image` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) DEFAULT NULL,
  `verify` int(11) NOT NULL DEFAULT 0,
  `2fa` int(11) NOT NULL DEFAULT 1,
  `2fa_code` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `phone`, `gender`, `country`, `balance`, `account_type`, `demo_balance`, `id_image`, `id_type`, `verify`, `2fa`, `2fa_code`, `date`) VALUES
(1, 'bryte', 'david', 'brytedree@gmail.com', '123456', '123456', 'Male', 'Belgium', '0', 'live', '50000', NULL, NULL, 0, 1, 576304, '2023-05-03 10:59:30'),
(2, 'Joe', 'Hi', 'geniojoe@gmail.com', 'hi123456', '1245858', 'Male', 'Anguilla', '0', 'live', '50000', NULL, NULL, 0, 1, 957320, '2023-11-22 14:27:42'),
(11, 'Joe', 'Hello', 'techvalley100@gmail.com', 'hi12345', '1234458', 'Male', 'Armenia', '49241.5', 'live', '50000', 'IMG_1391.jpg', 'Drivers License', 1, 1, 950472, '2023-11-23 04:19:35'),
(12, 'Gerald', 'Onyia', 'onyiagerald333@gmail.com', '*Alan1999*', '09038536219', 'Male', 'Nigeria', '1550', 'live', '50000', 'IMG_20231228_020907.jpg', 'National ID', 1, 1, 531468, '2023-11-24 19:20:53'),
(13, 'Soul', 'Gold', 'nicklovesyou0147@gmail.com', 'Wemadeit@2023', '+12467899990', 'Male', 'United States of America', '0', 'live', '50000', NULL, NULL, 0, 1, 597643, '2023-11-24 21:07:20'),
(14, 'sam', 'fred', 'grticon4u@gmail.com', '12345678', '08057191986', 'Male', 'Nigeria', '0', 'live', '50000', NULL, NULL, 0, 1, 926815, '2023-11-28 07:44:46'),
(15, 'BENJAMIN', 'ELUJEKWUTE', 'elujekwutebenjamin@gmail.com', 'Elu_jnr_', '+2349037013612', 'Male', 'Nigeria', '0', 'live', '50000', NULL, NULL, 0, 1, 674289, '2023-11-28 18:02:20'),
(16, 'Alan', 'Karim', 'alank0662@gmail.com', '*Aln1999*', '08107662861', 'Male', 'Bahamas', '0', 'live', '50000', NULL, NULL, 0, 1, 96238, '2023-11-28 18:53:09'),
(18, 'Joe', 'Kay', 'lucacify@gmail.com', 'hi12345', '138485959', 'Male', 'Antigua &amp; Barbuda', '3000', 'live', '50000', '656a295cb23f8.png', 'Drivers License', 2, 1, 62754, '2023-11-28 21:14:07'),
(26, 'Rose', 'Ugo', 'mejortechworl@gmail.com', 'you1234', '13566789', 'Male', 'Angola', '0', 'live', '50000', NULL, NULL, 0, 1, 29317, '2023-11-29 04:46:35'),
(27, 'Rose', 'Ugo', 'mejortechworld@gmail.com', 'you1234', '13566789', 'Male', 'Angola', '0', 'live', '50000', NULL, NULL, 0, 1, 564132, '2023-11-29 04:47:39'),
(29, 'Sol', 'mike', 'coinbaze017@gmail.com', '123456', '4245656', 'Male', 'New Caledonia', '34', 'live', '50000', NULL, NULL, 1, 1, 139758, '2023-11-29 23:40:01'),
(30, 'Smith', 'Mendel', 'smithmendel00@gmail.com', 'Smith1234', '08107662861', 'Male', 'Armenia', '100', 'live', '50000', NULL, NULL, 0, 1, 846915, '2023-11-30 19:02:05'),
(31, 'james', 'brown', 'quantumfc111@gmail.com', '123456', '4253565356', 'Male', 'Nauru', '1990', 'live', '50000', NULL, NULL, 1, 1, 640178, '2023-11-30 23:30:44'),
(32, 'Ernst', 'Marcelin', 'ernst.marcelin@yahoo.com', 'Datsun510cost900', '8328360798', 'Male', 'United States of America', '0', 'live', '50000', NULL, NULL, 0, 1, 506439, '2023-12-01 03:28:12'),
(33, 'Ernst', 'Marcelin', 'ernstmarcelin32@gmail.com', 'Datsun510cost900', '8328360798', 'Male', 'United States of America', '10000', 'live', '50000', 'Screenshot_20220725-152319_LinkedIn.jpg', 'Drivers License', 2, 1, 269378, '2023-12-01 04:33:18'),
(34, 'Catie', 'Perkin', 'perkinscatie555@gmail.com', '123456', '2354882983', 'Female', 'Algeria', '0', 'live', '50000', 'IMG-20231130-WA0001.jpg', NULL, 0, 1, 452803, '2023-12-02 01:41:07'),
(35, 'Pontchee Micarme', 'Clermont', 'pontcheemicarmeclermont@gmail.com', 'Clermid090', '9842771569', 'Male', 'United States of America', '0', 'live', '50000', NULL, NULL, 0, 1, 380546, '2023-12-02 15:21:57'),
(36, 'James', 'Markris', 'j3313644@gmail.com', '25829941', '07025829941', 'Male', 'Nigeria', '0', 'live', '50000', NULL, NULL, 0, 1, 827150, '2023-12-07 08:26:10'),
(37, 'Douglas', 'Thompson', 'Thetruthone900@gmail.com', 'Freedom89$', '8432913791', 'Male', 'United States of America', '0', 'live', '50000', NULL, NULL, 0, 1, 352614, '2024-01-12 18:31:05'),
(38, 'asiwaju', 'chuku', 'humblechuku211@gmail.com', 'Humble2018', '08159691888', 'Male', 'Nigeria', '0', 'live', '50000', NULL, NULL, 0, 1, 634817, '2024-01-16 09:07:45'),
(39, 'asiwaju', 'chuku', 'humblechuku1996@gmail.com', 'Humble2018', '08159691888', 'Male', 'Nigeria', '0', 'live', '50000', NULL, NULL, 0, 1, 917528, '2024-01-16 09:09:34'),
(40, 'Derrell', 'Mckinney', 'derrellwilliams1919@gmail.com', 'lilderrell85', '12424334834', 'Male', 'Bahamas', '0', 'live', '50000', 'inbound543995064352097639.jpg', NULL, 0, 1, 429036, '2024-01-19 18:18:47'),
(41, 'dfdf', 'dfdfdf', 'wupylosu@tutuapp.bid', 'Asdf1234', '+917952250021', 'Male', 'Afganistan', '0', 'live', '50000', NULL, NULL, 0, 1, 816095, '2024-01-20 15:07:02'),
(42, 'ErnestTic', 'ErnestTic', 'michaeladams1270868@gmail.com', 'Trustinseo123', '89693256216', '1', 'Belize', '0', 'live', '50000', NULL, NULL, 0, 1, 651430, '2024-01-22 12:31:16'),
(43, 'Vin', 'Lot', 'metachat26@gmail.com', '12345Lv', '07067062345', 'Male', 'Argentina', '0', 'live', '50000', NULL, NULL, 0, 1, 21584, '2024-01-29 17:44:28'),
(44, 'sdsd', 'sdsd', 'fegyfivo@pelagius.net', 'Asdf1234', '09788555899', 'Male', 'India', '0', 'live', '50000', NULL, NULL, 0, 1, 821456, '2024-01-31 05:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `btc` varchar(255) NOT NULL,
  `eth` varchar(255) NOT NULL,
  `bnb` varchar(255) NOT NULL,
  `ltc` varchar(255) NOT NULL,
  `usdt_erc` varchar(255) NOT NULL,
  `usdt_trc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `btc`, `eth`, `bnb`, `ltc`, `usdt_erc`, `usdt_trc`) VALUES
(1, 'bc1qdlgw2u9fnpeap03zhjxqh0n6n93gt58kdqhdvf', '0x5f4db05b50eddc9e2f917be888ac528224ffaac9', '0x5f4db05b50eddc9e2f917be888ac528224ffaac9', 'LSbQYbdPBcSkQ1b1oaXpz2zSRoDdtyzbM5', '0x5f4db05b50eddc9e2f917be888ac528224ffaac9', 'TZE3iMCospN4MWHPFxfqJYReT6k1dVDb95');

-- --------------------------------------------------------

--
-- Table structure for table `wbtc`
--

CREATE TABLE `wbtc` (
  `id` int(11) NOT NULL,
  `moni` double NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `wal` varchar(200) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wbtc`
--

INSERT INTO `wbtc` (`id`, `moni`, `email`, `status`, `wal`, `date`) VALUES
(1, 4728, 'othow.anade@outlook.com', 'Pending', '1PGBq1e8BuYHMGnwVPXLEzVs2BBmdRX6Nb', '08 Mar,2023'),
(2, 12630, 'sammuelrainey@gmail.com', 'Pending', 'bc1q8wgfa32c4xkg9k8hp5j84zr2p4q43lal3360mv', '31 Mar,2023'),
(3, 1000, 'techvalley100@gmail.com', 'Completed', 'dB8QbQtUBrLHAkuRYxdPpMFfhJNSl6VWhyfNH9EJ', '24 Nov,2023'),
(4, 20, 'onyiagerald333@gmail.com', 'Completed', '1Co4bn8Y9eAgSgQ57u9zwgWhxs1BDk1hNV', '25 Nov,2023'),
(6, 20, 'coinbaze017@gmail.com', 'Pending', 'qefrethdujdkyklu..;', '30 Nov,2023'),
(7, 20, 'coinbaze017@gmail.com', 'Pending', 'qefrethdujdkyklu..;', '30 Nov,2023'),
(8, 10, 'coinbaze017@gmail.com', 'Pending', 'qefrethdujdkyklu', '30 Nov,2023'),
(9, 20, 'coinbaze017@gmail.com', 'Pending', 'qefrethdujdkyklu', '30 Nov,2023'),
(10, 10, 'quantumfc111@gmail.com', 'Pending', 'qefrethdujdkyklu', '30 Nov,2023'),
(11, 300, 'onyiagerald333@gmail.com', 'Completed', 'bc1qthjh6m6ztwtsh9ea5dfmxlj3ny689pp2ax8wxn', '30 Dec,2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `btc`
--
ALTER TABLE `btc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package1`
--
ALTER TABLE `package1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_request`
--
ALTER TABLE `package_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signals`
--
ALTER TABLE `signals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stakes`
--
ALTER TABLE `stakes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade`
--
ALTER TABLE `trade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wbtc`
--
ALTER TABLE `wbtc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `btc`
--
ALTER TABLE `btc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `package1`
--
ALTER TABLE `package1`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `package_request`
--
ALTER TABLE `package_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `signals`
--
ALTER TABLE `signals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `stakes`
--
ALTER TABLE `stakes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trade`
--
ALTER TABLE `trade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wbtc`
--
ALTER TABLE `wbtc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
