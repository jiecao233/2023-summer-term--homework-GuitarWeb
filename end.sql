-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2023-07-11 16:50:37
-- 服务器版本： 8.0.31
-- PHP 版本： 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `end`
--

-- --------------------------------------------------------

--
-- 表的结构 `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `username` char(20) COLLATE utf8mb4_general_ci NOT NULL,
  `pwd` varbinary(46) NOT NULL,
  `head` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT './img/head/default_head.jpg',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `account`
--

INSERT INTO `account` (`username`, `pwd`, `head`) VALUES
('zyc12345', 0xcf500d0ebc2306577d182c45ec9e0c78, './img/head/default_head.jpg'),
('zyc67890', 0x6fb4817ac53604b318255cbea554130c, './img/head/default_head.jpg'),
('zyczyc12345', 0x77c42fad5e87c41449ab5d3e865054d1, './img/head/default_head.jpg'),
('zyc987', 0xcf500d0ebc2306577d182c45ec9e0c78, './img/head/default_head.jpg'),
('zyc654', 0x77c42fad5e87c41449ab5d3e865054d1, './img/head/default_head.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` char(20) COLLATE utf8mb4_general_ci NOT NULL,
  `pwd` varbinary(46) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`username`, `pwd`) VALUES
('zycAdmin12345', 0xcf500d0ebc2306577d182c45ec9e0c78);

-- --------------------------------------------------------

--
-- 表的结构 `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `name` char(50) COLLATE utf8mb4_general_ci NOT NULL,
  `path` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `enable` tinyint(1) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `banner`
--

INSERT INTO `banner` (`name`, `path`, `enable`) VALUES
('Aaron Marshall Sig Banner', './img/banner/Aaron Marshall Sig Banner.jpg', 1),
('Black Friday Special Banner', './img/banner/Black Friday Special Banner.jpg', 1),
('C-1 Ea Banner', './img/banner/C-1 Ea Banner.png', 1),
('GT BASS BANNER', './img/banner/GT BASS BANNER.jpg', 1),
('NICK JOHNSTON PT BANNER', ' ./img/banner/NICK JOHNSTON PT BANNER.jpg', 1),
('Reaper Custom Banner', ' ./img/banner/Reaper Custom Banner.jpg', 0),
('Rob Scallon Signature Banner', './img/banner/Rob Scallon Signature Banner.jpg', 1),
('SVSS REIGN banner', './img/banner/SVSS REIGN banner.jpg', 0),
('Ternlet Banner', './img/banner/Ternlet Banner.png', 1);

-- --------------------------------------------------------

--
-- 表的结构 `good`
--

DROP TABLE IF EXISTS `good`;
CREATE TABLE IF NOT EXISTS `good` (
  `name` char(50) COLLATE utf8mb4_general_ci NOT NULL,
  `path` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `good`
--

INSERT INTO `good` (`name`, `path`, `price`) VALUES
('Banshee Mach-6 Evertune.Fallout Burst', './img/good/Banshee Mach-6 Evertune.Fallout Burst.01.png', 1699),
('C-5 Silver Mountain.Toxic Venom', './img/good/C-5 Silver Mountain.Toxic Venom (TXV).01.png', 1349),
('C-6 Deluxe.Satin Aqua', './img/good/C-6 Deluxe.Satin Aqua.01.png', 349),
('Jack Fowler Traditional HT.Black Pearl', './img/good/Jack Fowler Traditional HT.Black Pearl.01.png', 1049),
('Keith Merrow KM-7 Mk-III Hybrid.Snowblind', './img/good/Keith Merrow KM-7 Mk-III Hybrid.Snowblind.01.png', 1499),
('Model-T 4 Exotic Black Limba.Natural Satin', './img/good/Model-T 4 Exotic Black Limba.Natural Satin.01.png', 1199),
('Omen Elite-7 MS.Black Cherry Burst', './img/good/Omen Elite-7 MS.Black Cherry Burst.01.png', 749),
('Solo-II Custom.Aged Black Satin (ABSN)', './img/good/Solo-II Custom.Aged Black Satin (ABSN).01.png', 999);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
