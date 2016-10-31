/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50128
Source Host           : localhost:3306
Source Database       : webshell

Target Server Type    : MYSQL
Target Server Version : 50128
File Encoding         : 65001

Date: 2016-10-31 22:27:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for w8_webshell
-- ----------------------------
DROP TABLE IF EXISTS `w8_webshell`;
CREATE TABLE `w8_webshell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `charset` varchar(255) DEFAULT NULL,
  `extra` varchar(255) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of w8_webshell
-- ----------------------------
INSERT INTO `w8_webshell` VALUES ('62', 'http://127.0.0.1/typecho/phpinfo.php', '1', null, '001', 'PHP', '1477627583');
INSERT INTO `w8_webshell` VALUES ('61', 'http://127.0.0.1/phpinfo.php', '1', null, '测试00', 'PHP', '1477574542');
INSERT INTO `w8_webshell` VALUES ('66', 'aaa', 'ff', null, 'aa', 'ASP', '1477839243');
INSERT INTO `w8_webshell` VALUES ('67', 'ffsa', 'f', null, 'a', 'JSP', '1477839247');
INSERT INTO `w8_webshell` VALUES ('70', 'e', 'qw', null, 'afa', 'ASPX', '1477839262');
