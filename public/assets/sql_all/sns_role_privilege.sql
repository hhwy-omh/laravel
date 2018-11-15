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

 Date: 15/11/2018 17:12:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for sns_role_privilege
-- ----------------------------
DROP TABLE IF EXISTS `sns_role_privilege`;
CREATE TABLE `sns_role_privilege`  (
  `role_id` int(11) NOT NULL COMMENT '角色id',
  `privilege_id` int(11) NOT NULL COMMENT '功能id'
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of sns_role_privilege
-- ----------------------------
INSERT INTO `sns_role_privilege` VALUES (6, 17);
INSERT INTO `sns_role_privilege` VALUES (5, 9);
INSERT INTO `sns_role_privilege` VALUES (1, 39);
INSERT INTO `sns_role_privilege` VALUES (6, 16);
INSERT INTO `sns_role_privilege` VALUES (6, 14);
INSERT INTO `sns_role_privilege` VALUES (4, 2);
INSERT INTO `sns_role_privilege` VALUES (4, 3);
INSERT INTO `sns_role_privilege` VALUES (6, 13);
INSERT INTO `sns_role_privilege` VALUES (6, 12);
INSERT INTO `sns_role_privilege` VALUES (6, 11);
INSERT INTO `sns_role_privilege` VALUES (4, 11);
INSERT INTO `sns_role_privilege` VALUES (4, 37);
INSERT INTO `sns_role_privilege` VALUES (6, 10);
INSERT INTO `sns_role_privilege` VALUES (6, 9);
INSERT INTO `sns_role_privilege` VALUES (6, 18);
INSERT INTO `sns_role_privilege` VALUES (1, 38);
INSERT INTO `sns_role_privilege` VALUES (1, 37);
INSERT INTO `sns_role_privilege` VALUES (1, 35);
INSERT INTO `sns_role_privilege` VALUES (1, 34);
INSERT INTO `sns_role_privilege` VALUES (1, 33);
INSERT INTO `sns_role_privilege` VALUES (1, 25);
INSERT INTO `sns_role_privilege` VALUES (1, 24);
INSERT INTO `sns_role_privilege` VALUES (1, 22);
INSERT INTO `sns_role_privilege` VALUES (1, 21);
INSERT INTO `sns_role_privilege` VALUES (1, 20);
INSERT INTO `sns_role_privilege` VALUES (5, 10);
INSERT INTO `sns_role_privilege` VALUES (5, 11);
INSERT INTO `sns_role_privilege` VALUES (5, 12);
INSERT INTO `sns_role_privilege` VALUES (5, 13);
INSERT INTO `sns_role_privilege` VALUES (5, 14);
INSERT INTO `sns_role_privilege` VALUES (5, 16);
INSERT INTO `sns_role_privilege` VALUES (5, 17);
INSERT INTO `sns_role_privilege` VALUES (5, 18);
INSERT INTO `sns_role_privilege` VALUES (5, 20);
INSERT INTO `sns_role_privilege` VALUES (5, 21);
INSERT INTO `sns_role_privilege` VALUES (5, 22);

SET FOREIGN_KEY_CHECKS = 1;
