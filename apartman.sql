/*
Navicat MySQL Data Transfer

Source Server         : okul
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : apartman

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-03-14 23:55:40
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `aidatlar`
-- ----------------------------
DROP TABLE IF EXISTS `aidatlar`;
CREATE TABLE `aidatlar` (
  `aidat_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_isim` varchar(255) NOT NULL,
  `a_fiyat` decimal(10,2) NOT NULL,
  PRIMARY KEY (`aidat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of aidatlar
-- ----------------------------
INSERT INTO `aidatlar` VALUES ('16', 'qwd', '1234.00');
INSERT INTO `aidatlar` VALUES ('17', 'sdf', '234.00');

-- ----------------------------
-- Table structure for `duyuru_tablosu`
-- ----------------------------
DROP TABLE IF EXISTS `duyuru_tablosu`;
CREATE TABLE `duyuru_tablosu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `duyuru_metni` text DEFAULT NULL,
  `tarih` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of duyuru_tablosu
-- ----------------------------
INSERT INTO `duyuru_tablosu` VALUES ('16', 'dfgdfgdfgdf', '2024-03-14 15:51:13');
INSERT INTO `duyuru_tablosu` VALUES ('19', 'gsdrgds', '2024-03-14 22:46:08');

-- ----------------------------
-- Table structure for `giderler`
-- ----------------------------
DROP TABLE IF EXISTS `giderler`;
CREATE TABLE `giderler` (
  `gider_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_isim` varchar(25) DEFAULT '',
  `g_fiyat` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`gider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of giderler
-- ----------------------------
INSERT INTO `giderler` VALUES ('1', 'ege', '11');

-- ----------------------------
-- Table structure for `kullanici`
-- ----------------------------
DROP TABLE IF EXISTS `kullanici`;
CREATE TABLE `kullanici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isim` varchar(44) DEFAULT NULL,
  `soyisim` varchar(44) DEFAULT NULL,
  `rol` varchar(44) DEFAULT NULL,
  `email` varchar(44) DEFAULT NULL,
  `sifre` varchar(44) DEFAULT NULL,
  `hesap_tarih` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of kullanici
-- ----------------------------
INSERT INTO `kullanici` VALUES ('1', 'tuwce', 'sadfs', 'admin', 'tuwce@gmail.com', '123456', null);
INSERT INTO `kullanici` VALUES ('2', 'ege', 'sadfs', 'uye', 'ege@gmail.com', '123456', null);

-- ----------------------------
-- Table structure for `kullanicilar`
-- ----------------------------
DROP TABLE IF EXISTS `kullanicilar`;
CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isim` varchar(255) NOT NULL,
  `blok` varchar(10) NOT NULL,
  `daire` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of kullanicilar
-- ----------------------------
INSERT INTO `kullanicilar` VALUES ('4', 'hannya', 'C', '1');
INSERT INTO `kullanicilar` VALUES ('5', 'sdf', 'C', '1');
INSERT INTO `kullanicilar` VALUES ('6', 'sdf', 'C', '1');
INSERT INTO `kullanicilar` VALUES ('7', 'ege', 'B', '1');
INSERT INTO `kullanicilar` VALUES ('9', 'ege', 'B', '1');
INSERT INTO `kullanicilar` VALUES ('12', '213', 'B', '1');
INSERT INTO `kullanicilar` VALUES ('14', 'ege', 'B', '1');
INSERT INTO `kullanicilar` VALUES ('15', 'ege', 'B', '1');
INSERT INTO `kullanicilar` VALUES ('16', 'hannya', 'B', '1');
INSERT INTO `kullanicilar` VALUES ('17', 'as', 'B', '3');
INSERT INTO `kullanicilar` VALUES ('18', 'as', 'A', '3');
INSERT INTO `kullanicilar` VALUES ('19', 'as', 'A', '3');
INSERT INTO `kullanicilar` VALUES ('20', 'as', 'A', '3');
INSERT INTO `kullanicilar` VALUES ('21', 'as', 'A', '3');
INSERT INTO `kullanicilar` VALUES ('22', '34', 'A', '4');
INSERT INTO `kullanicilar` VALUES ('23', '34', 'A', '4');
INSERT INTO `kullanicilar` VALUES ('24', '34', 'A', '4');
INSERT INTO `kullanicilar` VALUES ('25', 'as', 'A', '4');
INSERT INTO `kullanicilar` VALUES ('26', 'ege', 'A', '12');

-- ----------------------------
-- Table structure for `k_log`
-- ----------------------------
DROP TABLE IF EXISTS `k_log`;
CREATE TABLE `k_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(35) DEFAULT '',
  `isim` varchar(35) DEFAULT NULL,
  `giris` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of k_log
-- ----------------------------
INSERT INTO `k_log` VALUES ('1', 'tuwce@gmail.com', 'tuwce', '2024-03-13');
INSERT INTO `k_log` VALUES ('2', 'tuwce@gmail.com', 'tuwce', '2024-03-13');
INSERT INTO `k_log` VALUES ('3', 'tuwce@gmail.com', 'tuwce', '2024-03-13');
INSERT INTO `k_log` VALUES ('4', 'tuwce@gmail.com', 'tuwce', '2024-03-13');
INSERT INTO `k_log` VALUES ('5', 'tuwce@gmail.com', 'tuwce', '2024-03-13');
INSERT INTO `k_log` VALUES ('6', 'ege@gmail.com', 'ege', '2024-03-13');
INSERT INTO `k_log` VALUES ('7', 'tuwce@gmail.com', 'tuwce', '2024-03-13');
INSERT INTO `k_log` VALUES ('8', 'ege@gmail.com', 'ege', '2024-03-13');
INSERT INTO `k_log` VALUES ('9', 'tuwce@gmail.com', 'tuwce', '2024-03-13');
INSERT INTO `k_log` VALUES ('10', 'ege@gmail.com', 'ege', '2024-03-13');
INSERT INTO `k_log` VALUES ('11', 'tuwce@gmail.com', 'tuwce', '2024-03-13');
INSERT INTO `k_log` VALUES ('12', 'tuwce@gmail.com', 'tuwce', '2024-03-14');
INSERT INTO `k_log` VALUES ('13', 'tuwce@gmail.com', 'tuwce', '2024-03-14');
INSERT INTO `k_log` VALUES ('14', 'tuwce@gmail.com', 'tuwce', '2024-03-14');
INSERT INTO `k_log` VALUES ('15', 'tuwce@gmail.com', 'tuwce', '2024-03-14');
INSERT INTO `k_log` VALUES ('16', 'ege@gmail.com', 'ege', '2024-03-14');
INSERT INTO `k_log` VALUES ('17', 'tuwce@gmail.com', 'tuwce', '2024-03-14');
INSERT INTO `k_log` VALUES ('18', 'tuwce@gmail.com', 'tuwce', '2024-03-14');
INSERT INTO `k_log` VALUES ('19', 'tuwce@gmail.com', 'tuwce', '2024-03-14');
INSERT INTO `k_log` VALUES ('20', 'tuwce@gmail.com', 'tuwce', '2024-03-14');
INSERT INTO `k_log` VALUES ('21', 'tuwce@gmail.com', 'tuwce', '2024-03-14');
INSERT INTO `k_log` VALUES ('22', 'tuwce@gmail.com', 'tuwce', '2024-03-14');
INSERT INTO `k_log` VALUES ('23', 'tuwce@gmail.com', 'tuwce', '2024-03-14');
INSERT INTO `k_log` VALUES ('24', 'ege@gmail.com', 'ege', '2024-03-14');
INSERT INTO `k_log` VALUES ('25', 'tuwce@gmail.com', 'tuwce', '2024-03-14');
INSERT INTO `k_log` VALUES ('26', 'ege@gmail.com', 'ege', '2024-03-14');
INSERT INTO `k_log` VALUES ('27', 'ege@gmail.com', 'ege', '2024-03-14');
INSERT INTO `k_log` VALUES ('28', 'tuwce@gmail.com', 'tuwce', '2024-03-14');
INSERT INTO `k_log` VALUES ('29', 'tuwce@gmail.com', 'tuwce', '2024-03-14');
INSERT INTO `k_log` VALUES ('30', 'ege@gmail.com', 'ege', '2024-03-14');
INSERT INTO `k_log` VALUES ('31', 'tuwce@gmail.com', 'tuwce', '2024-03-14');
INSERT INTO `k_log` VALUES ('32', 'tuwce@gmail.com', 'tuwce', '2024-03-14');
INSERT INTO `k_log` VALUES ('33', 'ege@gmail.com', 'ege', '2024-03-14');

-- ----------------------------
-- Table structure for `odenen_aidatlar`
-- ----------------------------
DROP TABLE IF EXISTS `odenen_aidatlar`;
CREATE TABLE `odenen_aidatlar` (
  `aidat_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_isim` varchar(255) NOT NULL,
  `a_fiyat` decimal(10,2) NOT NULL,
  PRIMARY KEY (`aidat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of odenen_aidatlar
-- ----------------------------
INSERT INTO `odenen_aidatlar` VALUES ('1', 'sf', '324.00');
INSERT INTO `odenen_aidatlar` VALUES ('2', 'fsdsdf', '0.00');
INSERT INTO `odenen_aidatlar` VALUES ('3', 'sdf', '342.00');
INSERT INTO `odenen_aidatlar` VALUES ('4', 'sdf', '342.00');
INSERT INTO `odenen_aidatlar` VALUES ('5', 'dfg', '435.00');
INSERT INTO `odenen_aidatlar` VALUES ('6', 'SDF', '234.00');
INSERT INTO `odenen_aidatlar` VALUES ('7', 'DFG', '345.00');
INSERT INTO `odenen_aidatlar` VALUES ('8', 'fsadf', '32.00');
INSERT INTO `odenen_aidatlar` VALUES ('9', 'sdfv', '123.00');
INSERT INTO `odenen_aidatlar` VALUES ('10', 'gdfg3', '45.00');
INSERT INTO `odenen_aidatlar` VALUES ('11', '', '0.00');
INSERT INTO `odenen_aidatlar` VALUES ('12', '', '0.00');
INSERT INTO `odenen_aidatlar` VALUES ('13', '', '0.00');
INSERT INTO `odenen_aidatlar` VALUES ('14', 'ege', '1312.00');
INSERT INTO `odenen_aidatlar` VALUES ('15', 'sdfsdf', '243234.00');

-- ----------------------------
-- Table structure for `odenen_giderler`
-- ----------------------------
DROP TABLE IF EXISTS `odenen_giderler`;
CREATE TABLE `odenen_giderler` (
  `gider_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_isim` varchar(55) DEFAULT NULL,
  `g_fiyat` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`gider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of odenen_giderler
-- ----------------------------
INSERT INTO `odenen_giderler` VALUES ('2', 'ege', '312');
INSERT INTO `odenen_giderler` VALUES ('3', 'ege', '213');
INSERT INTO `odenen_giderler` VALUES ('4', 'ege', '12');
INSERT INTO `odenen_giderler` VALUES ('5', '', '');

-- ----------------------------
-- Table structure for `tasinan_kullanicilar`
-- ----------------------------
DROP TABLE IF EXISTS `tasinan_kullanicilar`;
CREATE TABLE `tasinan_kullanicilar` (
  `kullanici_id` int(11) NOT NULL AUTO_INCREMENT,
  `isim` varchar(34) DEFAULT NULL,
  `blok` varchar(50) NOT NULL,
  `yeni_daire` int(11) NOT NULL,
  PRIMARY KEY (`kullanici_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of tasinan_kullanicilar
-- ----------------------------
INSERT INTO `tasinan_kullanicilar` VALUES ('1', null, 'C', '1');
INSERT INTO `tasinan_kullanicilar` VALUES ('2', null, 'B', '1');
INSERT INTO `tasinan_kullanicilar` VALUES ('3', 'ege', 'B', '11');
INSERT INTO `tasinan_kullanicilar` VALUES ('8', 'ege', 'B', '12');
INSERT INTO `tasinan_kullanicilar` VALUES ('10', 'ege', 'A', '12');
INSERT INTO `tasinan_kullanicilar` VALUES ('11', 'hannya', 'A', '3');
INSERT INTO `tasinan_kullanicilar` VALUES ('13', 'efg', 'A', '11');
