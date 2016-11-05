-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1:3306
-- 生成日期: 2016 年 11 月 05 日 05:40
-- 服务器版本: 5.1.28
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `webshell`
--

-- --------------------------------------------------------

--
-- 表的结构 `w8_user`
--

CREATE TABLE IF NOT EXISTS `w8_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `admin` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 导出表中的数据 `w8_user`
--

INSERT INTO `w8_user` (`id`, `password`, `email`, `admin`) VALUES
(1, '12d4b5f48cf4f74fcd0a070a921d7acd', 'w8ay@qq.com', 1);

-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1:3306
-- 生成日期: 2016 年 11 月 05 日 05:40
-- 服务器版本: 5.1.28
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `webshell`
--

-- --------------------------------------------------------

--
-- 表的结构 `w8_webshell`
--

CREATE TABLE IF NOT EXISTS `w8_webshell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `charset` varchar(255) DEFAULT NULL,
  `extra` varchar(255) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `time` int(10) DEFAULT NULL,
  `uid` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- 导出表中的数据 `w8_webshell`
--

INSERT INTO `w8_webshell` (`id`, `url`, `pass`, `charset`, `extra`, `type`, `time`, `uid`) VALUES
(1, 'http://127.0.0.1/typecho/phpinfo.php', '1', NULL, '001', 'PHP', 1477627583, 1),
(2, 'http://127.0.0.1/phpinfo.php', '1', NULL, '测试00', 'PHP', 1477574542, 1);
