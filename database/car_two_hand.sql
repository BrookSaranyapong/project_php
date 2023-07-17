/*
 Navicat Premium Data Transfer

 Source Server         : Brook
 Source Server Type    : MySQL
 Source Server Version : 100427 (10.4.27-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : car_two_hand

 Target Server Type    : MySQL
 Target Server Version : 100427 (10.4.27-MariaDB)
 File Encoding         : 65001

 Date: 17/07/2023 00:24:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `u_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `role` enum('admin','user') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'user',
  `last_login` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`u_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'asdf', 'qwer', 'admin', '$2y$10$Bw73kziTG6RIZPXk.TwFYunFSYnFWEMzw1ST4NLBroVJatTGpT4De', 'user', '2023-07-16 18:23:17', '2023-07-10 19:18:28', '2023-07-10 19:18:28');
INSERT INTO `user` VALUES (2, 'admin', 'test', 'admin1', '$2y$10$DdQ3NkVVaJledHaRKeEyfe0FP8bMrNro/t3EzsuPY1RPEXNl3jfOy', 'admin', '2023-07-16 16:53:35', '2023-07-11 19:37:11', '2023-07-11 19:37:11');

SET FOREIGN_KEY_CHECKS = 1;
