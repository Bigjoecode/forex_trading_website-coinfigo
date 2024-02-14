-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 01:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `astromine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(6) NOT NULL,
  `name` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `bwallet` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `pm` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `bwallet`, `pm`, `email`, `password`) VALUES
(1, 'Ashley', '1K6af99Qcj1sQzF6BNTq2iJAKbmcL3Fpcn', '', 'admin@mail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `btc`
--

CREATE TABLE `btc` (
  `id` int(11) NOT NULL,
  `usd` double NOT NULL,
  `method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `proof` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package1`
--

CREATE TABLE `package1` (
  `id` int(6) NOT NULL,
  `pname` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `increase` double NOT NULL,
  `bonus` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `froms` double NOT NULL,
  `tos` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package1`
--

INSERT INTO `package1` (`id`, `pname`, `increase`, `bonus`, `duration`, `froms`, `tos`) VALUES
(5, 'STARTERS', 15, '0', 1, 300, 500),
(6, 'PREMIUM', 35, '0', 1, 1000, 10000),
(8, 'SILVER ', 32.5, '0', 2, 2000, 10000),
(9, 'GOLD ', 33.33, '0', 3, 3000, 50000),
(16, 'DIAMOND ', 33.35, '0', 2, 4000, 50000),
(18, 'GOLDEN ', 40, '', 2, 5000, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `package_request`
--

CREATE TABLE `package_request` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `sitename` varchar(255) NOT NULL,
  `siteurl` varchar(255) NOT NULL,
  `sitemail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sitename`, `siteurl`, `sitemail`) VALUES
(1, 'Astro Mine Options', 'https://astromineoptions.com', 'support@astromineoptions.com');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signals`
--

INSERT INTO `signals` (`id`, `symbol`, `t_interval`, `unit`, `amount`, `directions`) VALUES
(24, 'BTCUSDT', '1', '1', '1000', 'buy');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `fname` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `balance` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `account_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'demo',
  `demo_balance` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '50000',
  `id_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verify` int(11) NOT NULL DEFAULT 0,
  `2fa` int(11) NOT NULL DEFAULT 1,
  `2fa_code` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `phone`, `gender`, `country`, `balance`, `account_type`, `demo_balance`, `id_image`, `id_type`, `verify`, `2fa`, `2fa_code`, `date`) VALUES
(1, 'bryte', 'david', 'brytedree@gmail.com', '123456', '123456', 'Male', 'Belgium', '0', 'demo', '50000', NULL, NULL, 0, 1, 482076, '2023-05-03 10:59:30');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `btc`, `eth`, `bnb`, `ltc`, `usdt_erc`, `usdt_trc`) VALUES
(1, 'btbtbtbtbtbtb', 'ehththththth', 'bnbnbnbnbnbnbnbnbnb', 'ltltltltltltltltl', 'usususususususus', 'ususususuusus');

-- --------------------------------------------------------

--
-- Table structure for table `wbtc`
--

CREATE TABLE `wbtc` (
  `id` int(11) NOT NULL,
  `moni` double NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `wal` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wbtc`
--

INSERT INTO `wbtc` (`id`, `moni`, `email`, `status`, `wal`, `date`) VALUES
(1, 4728, 'othow.anade@outlook.com', 'Pending', '1PGBq1e8BuYHMGnwVPXLEzVs2BBmdRX6Nb', '08 Mar,2023'),
(2, 12630, 'sammuelrainey@gmail.com', 'Pending', 'bc1q8wgfa32c4xkg9k8hp5j84zr2p4q43lal3360mv', '31 Mar,2023');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package1`
--
ALTER TABLE `package1`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `package_request`
--
ALTER TABLE `package_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `signals`
--
ALTER TABLE `signals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `stakes`
--
ALTER TABLE `stakes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trade`
--
ALTER TABLE `trade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wbtc`
--
ALTER TABLE `wbtc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
