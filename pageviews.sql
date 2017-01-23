/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : pageviews

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-01-11 13:58:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for visits
-- ----------------------------
create database pageviews;
use pageviews;
DROP TABLE IF EXISTS `visits`;
CREATE TABLE `visits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) DEFAULT NULL,
  `visittime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of visits
-- ----------------------------
INSERT INTO `visits` VALUES ('1', '0', '2016-01-11 11:37:55');
INSERT INTO `visits` VALUES ('2', '0', '2016-01-11 11:38:18');
INSERT INTO `visits` VALUES ('3', '0', '2016-01-11 11:38:29');
INSERT INTO `visits` VALUES ('4', '0', '2016-01-11 11:38:40');
INSERT INTO `visits` VALUES ('6', '0', '2016-01-11 12:18:59');
INSERT INTO `visits` VALUES ('7', '0', '2016-01-11 12:19:07');
INSERT INTO `visits` VALUES ('8', '0', '2016-01-11 12:20:56');
INSERT INTO `visits` VALUES ('9', '0', '2016-01-11 12:33:39');
INSERT INTO `visits` VALUES ('10', '0', '2016-01-11 12:36:20');
INSERT INTO `visits` VALUES ('11', '0', '2016-01-11 12:40:40');
INSERT INTO `visits` VALUES ('12', '0', '2016-01-10 11:00:00');
INSERT INTO `visits` VALUES ('13', '0', '2016-01-10 14:00:00');
INSERT INTO `visits` VALUES ('14', '0', '2016-01-11 13:00:58');
INSERT INTO `visits` VALUES ('15', '0', '2016-01-11 13:01:57');
INSERT INTO `visits` VALUES ('16', '0', '2016-01-11 13:07:44');
INSERT INTO `visits` VALUES ('17', '0', '2016-01-11 13:07:49');
INSERT INTO `visits` VALUES ('18', '0', '2016-01-11 13:08:34');
INSERT INTO `visits` VALUES ('19', '0', '2016-01-09 13:07:49');
