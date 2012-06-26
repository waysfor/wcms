-- phpMyAdmin SQL Dump
-- version 3.5.0-dev
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2012 at 11:34 AM
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
  `tid` int(11) DEFAULT NULL COMMENT '子集',
  `index` int(11) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='后台菜单' AUTO_INCREMENT=14 ;

--
-- Dumping data for table `wcms_c_menu`
--

INSERT INTO `wcms_c_menu` (`id`, `name`, `address`, `tid`, `index`) VALUES
(1, '后台首页', '/', NULL, NULL),
(2, '课程管理', '/history', NULL, 1),
(3, '新闻管理', '/news', NULL, NULL),
(4, '课程管理', '/course_resource', NULL, NULL),
(5, '讲师资源', '/trainer_resource', NULL, NULL),
(6, '客户资源', '/client_resource', NULL, NULL),
(7, '工作计划', '/plan', NULL, NULL),
(8, '统计管理', '/count', NULL, NULL),
(9, '超级管理', '/super', NULL, NULL),
(10, '查看', '/list', 1, 2),
(11, '添加', '/add', 1, NULL),
(12, '搜索', '/search', 1, NULL),
(13, '课程资源', '/list', 4, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
