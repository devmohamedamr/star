/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : starshine

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-05-28 00:00:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `airline`
-- ----------------------------
DROP TABLE IF EXISTS `airline`;
CREATE TABLE `airline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `airline_name` varchar(100) DEFAULT NULL,
  `airline_description` varchar(1000) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of airline
-- ----------------------------

-- ----------------------------
-- Table structure for `car`
-- ----------------------------
DROP TABLE IF EXISTS `car`;
CREATE TABLE `car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `car_name` varchar(100) DEFAULT NULL,
  `car_description` varchar(1000) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of car
-- ----------------------------

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `language_id` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'hotel', 'hotel reservation ', null, '2');
INSERT INTO `category` VALUES ('2', 'airline', 'flight reservtion', null, '2');
INSERT INTO `category` VALUES ('3', 'restaurant', 'restaurant reservation', null, '2');
INSERT INTO `category` VALUES ('4', 'seeder', null, null, '2');
INSERT INTO `category` VALUES ('5', 'car rental', null, null, '2');
INSERT INTO `category` VALUES ('6', 'ship rental ', null, null, '2');
INSERT INTO `category` VALUES ('7', 'tourism programs', null, null, '2');
INSERT INTO `category` VALUES ('8', '', null, null, null);

-- ----------------------------
-- Table structure for `city`
-- ----------------------------
DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(50) DEFAULT NULL,
  `city_code` varchar(10) DEFAULT NULL,
  `country_id` varchar(500) DEFAULT NULL,
  `language_id` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`id`,`country_id`,`language_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of city
-- ----------------------------
INSERT INTO `city` VALUES ('1', 'cairo', 'cai', '1', '2');
INSERT INTO `city` VALUES ('2', 'spain', 'sp', '2', '2');

-- ----------------------------
-- Table structure for `country`
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(50) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `country_map` varchar(150) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `language_id` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of country
-- ----------------------------
INSERT INTO `country` VALUES ('1', 'egypt', null, null, null, '2');
INSERT INTO `country` VALUES ('2', 'spain', null, null, null, '2');

-- ----------------------------
-- Table structure for `hotel`
-- ----------------------------
DROP TABLE IF EXISTS `hotel`;
CREATE TABLE `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_name` varchar(100) DEFAULT NULL,
  `hotel_description` varchar(1000) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hotel
-- ----------------------------

-- ----------------------------
-- Table structure for `language`
-- ----------------------------
DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of language
-- ----------------------------
INSERT INTO `language` VALUES ('1', 'ar');
INSERT INTO `language` VALUES ('2', 'en');
INSERT INTO `language` VALUES ('3', 'ge');

-- ----------------------------
-- Table structure for `restaurant`
-- ----------------------------
DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_name` varchar(100) DEFAULT NULL,
  `restaurant_description` varchar(1000) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of restaurant
-- ----------------------------

-- ----------------------------
-- Table structure for `seeder`
-- ----------------------------
DROP TABLE IF EXISTS `seeder`;
CREATE TABLE `seeder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seeder_name` varchar(100) DEFAULT NULL,
  `seeder_description` varchar(1000) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of seeder
-- ----------------------------

-- ----------------------------
-- Table structure for `ship`
-- ----------------------------
DROP TABLE IF EXISTS `ship`;
CREATE TABLE `ship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ship_name` varchar(100) DEFAULT NULL,
  `ship_description` varchar(1000) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ship
-- ----------------------------

-- ----------------------------
-- Table structure for `tourism_locations`
-- ----------------------------
DROP TABLE IF EXISTS `tourism_locations`;
CREATE TABLE `tourism_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(100) DEFAULT NULL,
  `location_description` varchar(1000) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tourism_locations
-- ----------------------------
