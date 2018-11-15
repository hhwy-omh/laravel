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

 Date: 15/11/2018 17:13:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for sns_privilege
-- ----------------------------
DROP TABLE IF EXISTS `sns_privilege`;
CREATE TABLE `sns_privilege`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `privilege` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '功能',
  `sub_privilege` int(255) NOT NULL DEFAULT 0 COMMENT '二级功能id',
  `privilege_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '功能地址',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 40 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sns_privilege
-- ----------------------------
INSERT INTO `sns_privilege` VALUES (1, '产品管理', 0, 'icon-desktop');
INSERT INTO `sns_privilege` VALUES (2, '产品类表', 1, 'Products_List');
INSERT INTO `sns_privilege` VALUES (3, '品牌管理', 1, 'Brand_Manage');
INSERT INTO `sns_privilege` VALUES (4, '分类管理', 1, 'Category_Manage');
INSERT INTO `sns_privilege` VALUES (5, '图片管理', 0, 'icon-picture');
INSERT INTO `sns_privilege` VALUES (6, '广告管理', 5, 'advertising');
INSERT INTO `sns_privilege` VALUES (7, '分理管理', 5, 'Sort_ads');
INSERT INTO `sns_privilege` VALUES (8, '交易管理', 0, 'icon-list');
INSERT INTO `sns_privilege` VALUES (9, '交易信息', 8, 'transaction');
INSERT INTO `sns_privilege` VALUES (10, '交易订单', 8, 'Order_Chart');
INSERT INTO `sns_privilege` VALUES (11, '订单管理', 8, 'Orderform');
INSERT INTO `sns_privilege` VALUES (12, '交易金额', 8, 'Amounts');
INSERT INTO `sns_privilege` VALUES (13, '订单处理', 8, 'Order_handling');
INSERT INTO `sns_privilege` VALUES (14, '退款管理', 8, 'Refund');
INSERT INTO `sns_privilege` VALUES (15, '支付管理', 0, 'icon-credit-card');
INSERT INTO `sns_privilege` VALUES (16, '账户管理', 15, 'Cover_management');
INSERT INTO `sns_privilege` VALUES (17, '支付方式', 15, 'payment_method');
INSERT INTO `sns_privilege` VALUES (18, '支付配置', 15, 'Payment_Configure');
INSERT INTO `sns_privilege` VALUES (19, '会员管理', 0, 'icon-user');
INSERT INTO `sns_privilege` VALUES (20, '会员列表', 19, 'user_list');
INSERT INTO `sns_privilege` VALUES (21, '等级管理', 19, 'member_Grading');
INSERT INTO `sns_privilege` VALUES (22, '会员记录管理', 19, 'integration');
INSERT INTO `sns_privilege` VALUES (23, '店铺管理', 0, 'icon-laptop');
INSERT INTO `sns_privilege` VALUES (24, '店铺列表', 23, 'Shop_list');
INSERT INTO `sns_privilege` VALUES (25, '店铺审核', 23, 'Shops_Audit');
INSERT INTO `sns_privilege` VALUES (26, '消息管理', 0, 'icon-comments-alt');
INSERT INTO `sns_privilege` VALUES (27, '留言列表', 26, 'Guestbook');
INSERT INTO `sns_privilege` VALUES (28, '意见反馈', 26, 'Feedback');
INSERT INTO `sns_privilege` VALUES (29, '文章管理', 0, 'icon-bookmark');
INSERT INTO `sns_privilege` VALUES (30, '文章列表', 29, 'article_list');
INSERT INTO `sns_privilege` VALUES (31, '分类管理', 29, 'article_Sort');
INSERT INTO `sns_privilege` VALUES (32, '系统管理', 0, 'icon-cogs');
INSERT INTO `sns_privilege` VALUES (33, '系统设置', 32, 'Systems');
INSERT INTO `sns_privilege` VALUES (34, '系统栏目管理', 32, 'System_section');
INSERT INTO `sns_privilege` VALUES (35, '系统日志', 32, 'System_Logs');
INSERT INTO `sns_privilege` VALUES (36, '管理员管理', 0, 'icon-group');
INSERT INTO `sns_privilege` VALUES (37, '权限管理', 36, 'admin_Competence');
INSERT INTO `sns_privilege` VALUES (38, '管理员列表', 36, 'administrator');
INSERT INTO `sns_privilege` VALUES (39, '个人信息', 36, 'admin_info');

SET FOREIGN_KEY_CHECKS = 1;
