/*
 Navicat Premium Data Transfer

 Source Server         : mvc
 Source Server Type    : MySQL
 Source Server Version : 50721
 Source Host           : localhost:3306
 Source Schema         : lar_sns

 Target Server Type    : MySQL
 Target Server Version : 50721
 File Encoding         : 65001

 Date: 15/11/2018 17:13:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for sns_role
-- ----------------------------
DROP TABLE IF EXISTS `sns_role`;
CREATE TABLE `sns_role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `admin` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '角色名称',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理员描述',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sns_role
-- ----------------------------
INSERT INTO `sns_role` VALUES (6, '超普管理员', '拥有很大一部分，可以修改大部分。');
INSERT INTO `sns_role` VALUES (3, '支付管理员', '拥有部分权限，主要进行资金管理');
INSERT INTO `sns_role` VALUES (4, '系统管理员', '操作系统的大部分权限');
INSERT INTO `sns_role` VALUES (1, '普通管理员', '拥有大部分权限。');
INSERT INTO `sns_role` VALUES (2, '资金管理员', '拥有部分权限，主要进行资金管理');
INSERT INTO `sns_role` VALUES (5, '超级管理员', 'root');

SET FOREIGN_KEY_CHECKS = 1;
