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

 Date: 19/07/2023 23:37:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for appoint_car
-- ----------------------------
DROP TABLE IF EXISTS `appoint_car`;
CREATE TABLE `appoint_car`  (
  `App_id` int NOT NULL COMMENT 'รหัสนัดหมาย',
  `App_date` datetime NULL DEFAULT NULL COMMENT 'วันที่นัดหมาย',
  `App_time` time NULL DEFAULT NULL COMMENT 'เวลานัดหมาย',
  `Ty_id` int NULL DEFAULT NULL COMMENT 'รหัสประเภทรถยนต์ FK (Type_car)',
  `Cus_id` int NULL DEFAULT NULL COMMENT 'เลขบัตรประชาชน FK(Customer_car(_id))',
  PRIMARY KEY (`App_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of appoint_car
-- ----------------------------

-- ----------------------------
-- Table structure for contract_car
-- ----------------------------
DROP TABLE IF EXISTS `contract_car`;
CREATE TABLE `contract_car`  (
  `Cont_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสทำสัญญา (PK)',
  `Cont_date` datetime NULL DEFAULT NULL COMMENT 'วันที่ทำสัญญา',
  `Cont_time` datetime NULL DEFAULT NULL COMMENT 'เวลาทำสัญญา',
  `Cont_location` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'สถานที่จัดทำสัญญา',
  `Cont_Payment` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'เลือกวิธีการชำระเงิน',
  `Cont_Status` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'สถานะ',
  `Dep_id` int NULL DEFAULT NULL COMMENT 'รหัสโอนค่ามัดจำ FK (Deposit_car)',
  PRIMARY KEY (`Cont_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contract_car
-- ----------------------------

-- ----------------------------
-- Table structure for data_cars
-- ----------------------------
DROP TABLE IF EXISTS `data_cars`;
CREATE TABLE `data_cars`  (
  `Car_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสรถยนต์',
  `Car_brand` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ยี่ห้อ',
  `Car_regisnum` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'เลขทะเบียน',
  `Car_chassi` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Chassis Number\r\n(serial id)',
  `Car_color` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'สี',
  `Car_model` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'รุ่น',
  `Car_mile` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'เลขไมล์',
  `Car_time` datetime NULL DEFAULT NULL COMMENT 'วันที่จดทะเบียนรถยน',
  `Sale_fac` year NULL DEFAULT NULL COMMENT 'ปีที่ผลิต',
  `Car_sell` int NULL DEFAULT NULL COMMENT 'ราคาที่รับมา',
  `Car_gear` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ระบบเกียร์',
  `Car_cappaci` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ความจุเครื่องยนต์',
  `Ty_id` int NULL DEFAULT NULL COMMENT 'รหัสประเภทรถยนต์',
  `List_id` int NULL DEFAULT NULL COMMENT 'รหัสรายการรับรถยนต์',
  PRIMARY KEY (`Car_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_cars
-- ----------------------------
INSERT INTO `data_cars` VALUES (1, 'ford', '123456', 'gh1234', 'red', 'super', '144444', '2023-07-19 22:38:39', 2010, 900000, 'auto', '5000c', 1, 1);

-- ----------------------------
-- Table structure for deposit_car
-- ----------------------------
DROP TABLE IF EXISTS `deposit_car`;
CREATE TABLE `deposit_car`  (
  `Dep_id` int NOT NULL COMMENT 'รหัสโอนค่ามัดจำ (PK)',
  `Dep_day` datetime NULL DEFAULT NULL COMMENT 'วันที่โอน',
  `Dep_status` enum('success','pending','fail') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'สถานะ',
  `App_id` int NULL DEFAULT NULL COMMENT 'รหัสนัดหมาย FK(Appoint_car)',
  `Cus_id` int NULL DEFAULT NULL COMMENT 'id ข้อมูลลูกค้า FK(Customer_car)',
  PRIMARY KEY (`Dep_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of deposit_car
-- ----------------------------

-- ----------------------------
-- Table structure for get_car
-- ----------------------------
DROP TABLE IF EXISTS `get_car`;
CREATE TABLE `get_car`  (
  `Get_id` int NOT NULL COMMENT 'รหัสรายการรับรถ',
  `Get_date` datetime NULL DEFAULT NULL COMMENT 'วันที่/เวลา',
  `Ty_id` int NULL DEFAULT NULL COMMENT 'รหัสประเภทรถยนต์ FK (Type_car)',
  `Ow_id` int NULL DEFAULT NULL COMMENT 'รหัสเจ้าของร้าน FK(Owner_car)',
  `Car_id` int NULL DEFAULT NULL COMMENT 'รหัสรถยนต์ FK (Cars_car)',
  PRIMARY KEY (`Get_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of get_car
-- ----------------------------

-- ----------------------------
-- Table structure for sale_car
-- ----------------------------
DROP TABLE IF EXISTS `sale_car`;
CREATE TABLE `sale_car`  (
  `Sale_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสขายรถยนต์ PK',
  `Sale_time` datetime NULL DEFAULT NULL COMMENT 'วันที่ประกาศขาย',
  `Sale_price` int NULL DEFAULT NULL COMMENT 'ราคาขาย',
  `Sale_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ชื่อเจ้าของรถ',
  `Cus_id` int NULL DEFAULT NULL COMMENT 'เลขบัตรประชาชน FK(Customer_car)',
  `Car_id` int NULL DEFAULT NULL COMMENT 'รหัสรถยนต์ FK (Cars_car)',
  PRIMARY KEY (`Sale_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sale_car
-- ----------------------------
INSERT INTO `sale_car` VALUES (1, '2023-07-19 22:48:41', 300000, 'Your_name', 1, 1);

-- ----------------------------
-- Table structure for type_car
-- ----------------------------
DROP TABLE IF EXISTS `type_car`;
CREATE TABLE `type_car`  (
  `Ty_id` int NOT NULL AUTO_INCREMENT,
  `Type_data` enum('รถเก๋ง','รถกระบะ 2 ประตู','รถกระบะ 4 ประตู','รถกระบะ CAB') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Car_id` int NOT NULL,
  PRIMARY KEY (`Ty_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of type_car
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `u_id` int NOT NULL AUTO_INCREMENT,
  `cus_id` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `role` enum('admin','user') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'user',
  `image` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `last_login` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`u_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, '9078052412351', 'user', 'qwer', 'admin', '$2y$10$Bw73kziTG6RIZPXk.TwFYunFSYnFWEMzw1ST4NLBroVJatTGpT4De', 'user', 'https://cdn-icons-png.flaticon.com/512/1077/1077114.png', 'nobaxo2954@muzitp.com', '0123456789', 'thailand', '2023-07-19 17:31:59', '2023-07-10 19:18:28', '2023-07-10 19:18:28');
INSERT INTO `user` VALUES (2, '7013448806819', 'admin', 'test', 'admin1', '$2y$10$DdQ3NkVVaJledHaRKeEyfe0FP8bMrNro/t3EzsuPY1RPEXNl3jfOy', 'admin', 'https://cdn-icons-png.flaticon.com/512/1077/1077114.png', 'test@test.com', '0123456789', 'thailand', '2023-07-19 17:32:13', '2023-07-11 19:37:11', '2023-07-11 19:37:11');

SET FOREIGN_KEY_CHECKS = 1;
