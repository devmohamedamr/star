/*
MySQL Backup
Source Server Version: 5.5.5
Source Database: starshine
Date: 5/29/2019 08:52:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `airline`
-- ----------------------------
DROP TABLE IF EXISTS `airline`;
CREATE TABLE `airline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `airline_name` varchar(100) DEFAULT NULL,
  `airline_description` varchar(1000) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `language_id` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `car`
-- ----------------------------
DROP TABLE IF EXISTS `car`;
CREATE TABLE `car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `car_name` varchar(100) DEFAULT NULL,
  `car_description` varchar(1000) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `feature_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `category`
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
--  Table structure for `city`
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
--  Table structure for `country`
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
--  Table structure for `feature`
-- ----------------------------
DROP TABLE IF EXISTS `feature`;
CREATE TABLE `feature` (
  `id` int(11) NOT NULL,
  `feature_name` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `hotel`
-- ----------------------------
DROP TABLE IF EXISTS `hotel`;
CREATE TABLE `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_name` varchar(100) DEFAULT NULL,
  `hotel_description` varchar(1000) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `feature_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `language`
-- ----------------------------
DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_code` varchar(3) DEFAULT NULL,
  `language_name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `restaurant`
-- ----------------------------
DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_name` varchar(100) DEFAULT NULL,
  `restaurant_description` varchar(1000) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `feature_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `seeder`
-- ----------------------------
DROP TABLE IF EXISTS `seeder`;
CREATE TABLE `seeder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seeder_name` varchar(100) DEFAULT NULL,
  `seeder_description` varchar(1000) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `feature_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `ship`
-- ----------------------------
DROP TABLE IF EXISTS `ship`;
CREATE TABLE `ship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ship_name` varchar(100) DEFAULT NULL,
  `ship_description` varchar(1000) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `feature_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `tourism_locations`
-- ----------------------------
DROP TABLE IF EXISTS `tourism_locations`;
CREATE TABLE `tourism_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(100) DEFAULT NULL,
  `location_description` varchar(1000) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `feature_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `category` VALUES ('1','hotel','hotel reservation ',NULL,'2'), ('2','airline','flight reservtion',NULL,'2'), ('3','restaurant','restaurant reservation',NULL,'2'), ('4','seeder',NULL,NULL,'2'), ('5','car rental',NULL,NULL,'2'), ('6','ship rental ',NULL,NULL,'2'), ('7','tourism programs',NULL,NULL,'2'), ('8','',NULL,NULL,NULL);
INSERT INTO `city` VALUES ('1','cairo','cai','1','2'), ('2','spain','sp','2','2');
INSERT INTO `country` VALUES ('1','egypt',NULL,NULL,NULL,'2'), ('2','spain',NULL,NULL,NULL,'2');
INSERT INTO `language` VALUES ('1','ar','arabic'), ('2','en','english'), ('3','ge','germany');
