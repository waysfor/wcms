-- phpMyAdmin SQL Dump
-- version 3.5.0-dev
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2012 at 11:43 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `wcms_c_menu`
--

CREATE TABLE IF NOT EXISTS `wcms_c_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL COMMENT 'url名称',
  `address` varchar(20) NOT NULL COMMENT 'url地址',
  `tid` text COMMENT '子集',
  `index` int(11) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='后台菜单' AUTO_INCREMENT=14 ;

--
-- Dumping data for table `wcms_c_menu`
--

INSERT INTO `wcms_c_menu` (`id`, `name`, `address`, `tid`, `index`) VALUES
(1, '后台首页', '/', '999', 1),
(2, '课程管理', '/history', '10,11,12', 2),
(3, '新闻管理', '/news', '10,11,12', 3),
(4, '课程资源', '/course_resource', '10,11,12', 4),
(5, '讲师资源', '/trainer_resource', '10,11,12', 5),
(6, '客户资源', '/client_resource', '10,11,12', 6),
(7, '工作计划', '/plan', '10,11', 7),
(8, '统计管理', '/count', '10', 8),
(9, '超级管理', '/super', '10', 9),
(10, '查看', '/list', '0', NULL),
(11, '添加', '/add', '0', NULL),
(12, '搜索', '/search', '0', NULL),
(13, '添加功能', '/list', '0', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
