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

 Date: 15/11/2018 17:12:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for sns_user_role
-- ----------------------------
DROP TABLE IF EXISTS `sns_user_role`;
CREATE TABLE `sns_user_role`  (
  `user_id` int(255) NOT NULL COMMENT '用户id',
  `role_id` int(255) NOT NULL COMMENT '角色id'
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of sns_user_role
-- ----------------------------
INSERT INTO `sns_user_role` VALUES (2, 1);
INSERT INTO `sns_user_role` VALUES (4, 3);
INSERT INTO `sns_user_role` VALUES (3, 1);
INSERT INTO `sns_user_role` VALUES (8, 4);
INSERT INTO `sns_user_role` VALUES (3, 5);
INSERT INTO `sns_user_role` VALUES (1, 1);
INSERT INTO `sns_user_role` VALUES (2, 5);
INSERT INTO `sns_user_role` VALUES (6, 6);
INSERT INTO `sns_user_role` VALUES (5, 2);
INSERT INTO `sns_user_role` VALUES (7, 4);

SET FOREIGN_KEY_CHECKS = 1;
