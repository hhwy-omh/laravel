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

 Date: 15/11/2018 17:12:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for sns_users
-- ----------------------------
DROP TABLE IF EXISTS `sns_users`;
CREATE TABLE `sns_users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '头像',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `mobile` bigint(20) UNSIGNED NOT NULL COMMENT '手机号',
  `password` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '登录错误次数',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '邮箱',
  `user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名',
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '邮箱地址随机码',
  `state` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1为激活,0为不激活',
  `id_root` enum('1','0','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1为root,0为用户,2为商家',
  `user_off` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '1' COMMENT '1为开启，0为未开启',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sns_users
-- ----------------------------
INSERT INTO `sns_users` VALUES (1, 'upload/abc.jpg', '2018-11-03 10:47:52', '2018-11-10 16:42:34', 13415018910, '$2y$10$5NnKEfLYLjSzN4lCiBu.AOwXuKvlnr1YT76zVcdtOzXwXRexp2DGa', '0', 'qucan1@126.com', 'user', 'Lpgy2rtOLb8JHWB2swwjknbNvO404fTgWMk7z3gb', '1', '2', '1');
INSERT INTO `sns_users` VALUES (2, 'upload/head_image/2018-11-14/154216468348Min9794abc.jpg', '2018-11-03 17:19:58', '2018-11-15 14:45:21', 13415018911, '$2y$10$J4EXDAE46MGoD5Tsu8lFeuoTuLMna5o6.4XvN6NpgdoLasmCRjsq.', '0', 'qucan1@126.com', '48Min', '0q0zxG0jepXNdmZfotFPLV4g26K6B4BR7KdYs2ms', '1', '1', '1');
INSERT INTO `sns_users` VALUES (3, 'upload/abc.jpg', '2018-11-06 09:09:09', '2018-11-14 09:14:13', 13433423423, '$2y$10$5i/.kqw/iyMRrzvjLtozz.BzAZHyR2ijjje3fSD26bEXXVKq8nFp.', '0', 'qucan1@126.com', 'home', '2QDIbMmcj1K74rxbCOTCU7LAdyLavcf1bU5m4nh7', '1', '2', '1');
INSERT INTO `sns_users` VALUES (4, 'upload/abc.jpg', '2018-11-06 09:11:47', '2018-11-10 16:42:34', 15605672389, '$2y$10$DLPR4ztd4Zi9U3aVwGRrleA.RwYLtUYxruaS9YdaiTaMDTI1hgnzG', '0', 'qucan1@126.com', 'fefe', '2QDIbMmcj1K74rxbCOTCU7LAdyLavcf1bU5m4nh7', '1', '0', '1');
INSERT INTO `sns_users` VALUES (5, 'upload/abc.jpg', '2018-11-06 09:13:07', '2018-11-13 11:27:16', 13329958317, '$2y$10$ZDqLMFl/tmDC1VatHxFViuL5dfsdtCcQRvvsKD1C0imiDD3zLkBQK', '0', 'qucan1@126.com', 'admin', '2QDIbMmcj1K74rxbCOTCU7LAdyLavcf1bU5m4nh7', '1', '2', '1');
INSERT INTO `sns_users` VALUES (6, 'upload/abc.jpg', '2018-11-06 09:15:42', '2018-11-10 16:42:34', 13329951327, '$2y$10$OJZhdWw8/FRx0CHaEkF1VebO6PA.6guaJmwGspzS/lDQXSwQo/nBu', '0', 'qucan1@126.com', '52Hz', '2QDIbMmcj1K74rxbCOTCU7LAdyLavcf1bU5m4nh7', '1', '2', '1');
INSERT INTO `sns_users` VALUES (7, 'upload/abc.jpg', '2018-11-06 09:16:47', '2018-11-10 16:42:34', 17805272279, '$2y$10$fVcRvJAmH6zCu/wCkBVorOHaWSoYOnmc/dY5FiZqh6BMxRIqMybDe', '0', 'qucan1@126.com', 'qucan', '2QDIbMmcj1K74rxbCOTCU7LAdyLavcf1bU5m4nh7', '1', '2', '1');
INSERT INTO `sns_users` VALUES (8, 'upload/abc.jpg', '2018-11-15 11:07:27', '2018-11-15 15:18:52', 13413545345, '$2y$10$s6DpWJ.9c7T/li4l/vfY1.u4dBmCrTzzqLy.Wm3wa6PgXLIlaQC7m', '0', '12315067910@163.com', 'users', 'IoQpqvOBFtRFqtFdOIpx6hibOwUIoCAzKOKWWZLh', '0', '2', '1');

SET FOREIGN_KEY_CHECKS = 1;
