/*
 Navicat Premium Data Transfer

 Source Server         : mvc
 Source Server Type    : MySQL
 Source Server Version : 50721
 Source Host           : localhost:3306
 Source Schema         : c_s

 Target Server Type    : MySQL
 Target Server Version : 50721
 File Encoding         : 65001

 Date: 21/11/2018 08:22:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for class
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '分类名称',
  `name_id` int(255) NOT NULL COMMENT '上级id',
  `up_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '-' COMMENT '所有上级id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 26 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES (1, '服装', 0, '-');
INSERT INTO `class` VALUES (2, '男装', 1, '-1-');
INSERT INTO `class` VALUES (3, '牛仔', 2, '-1-2-');
INSERT INTO `class` VALUES (4, '夹克', 2, '-1-2-');
INSERT INTO `class` VALUES (5, '西装', 2, '-1-2-');
INSERT INTO `class` VALUES (6, '女装', 1, '-1-');
INSERT INTO `class` VALUES (7, '连衣裙', 6, '-1-6-');
INSERT INTO `class` VALUES (8, '雪纺衫', 6, '-1-6-');
INSERT INTO `class` VALUES (9, '洗护', 0, '-');
INSERT INTO `class` VALUES (10, '个人护理', 9, '-9-');
INSERT INTO `class` VALUES (11, '洗发水', 10, '-9-10-');
INSERT INTO `class` VALUES (12, '护发素', 10, '-9-10-');
INSERT INTO `class` VALUES (13, '美妆', 9, '-9-');
INSERT INTO `class` VALUES (14, '洁面', 13, '-9-13-');
INSERT INTO `class` VALUES (15, '精华', 13, '-9-13-');
INSERT INTO `class` VALUES (16, '防晒', 13, '-9-13-');
INSERT INTO `class` VALUES (17, '家用电器', 0, '-');
INSERT INTO `class` VALUES (18, '电视', 17, '-17-');
INSERT INTO `class` VALUES (19, '空调', 17, '-17-');
INSERT INTO `class` VALUES (20, '曲面电视', 18, '-17-18-');
INSERT INTO `class` VALUES (21, '液晶电视', 18, '-17-18-');
INSERT INTO `class` VALUES (22, '超薄电视', 18, '-17-18-');
INSERT INTO `class` VALUES (23, '柜式空调', 19, '-17-19-');
INSERT INTO `class` VALUES (24, '中心空调', 19, '-17-19-');
INSERT INTO `class` VALUES (25, '静音空调', 19, '-17-19-');

SET FOREIGN_KEY_CHECKS = 1;
