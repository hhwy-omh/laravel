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

 Date: 15/11/2018 17:13:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for sns_privilege_record
-- ----------------------------
DROP TABLE IF EXISTS `sns_privilege_record`;
CREATE TABLE `sns_privilege_record`  (
  `id` int(11) NOT NULL COMMENT 'id',
  `name_id` int(11) NOT NULL COMMENT '用户名id',
  `privilege_id` int(11) NOT NULL COMMENT '角色id',
  `record` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT '操作的内容',
  `time` datetime(0) NOT NULL COMMENT '操作时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
