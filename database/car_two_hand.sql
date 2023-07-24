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

 Date: 24/07/2023 10:56:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for appoint_cars
-- ----------------------------
DROP TABLE IF EXISTS `appoint_cars`;
CREATE TABLE `appoint_cars`  (
  `App_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสนัดหมาย',
  `App_date` datetime NULL DEFAULT NULL COMMENT 'วันที่นัดหมาย',
  `App_time` time NULL DEFAULT NULL COMMENT 'เวลานัดหมาย',
  `Ty_id` int NULL DEFAULT NULL COMMENT 'รหัสประเภทรถยนต์ FK (Type_car)',
  `Cus_id` int NULL DEFAULT NULL COMMENT 'เลขบัตรประชาชน FK(Customer_car(_id))',
  PRIMARY KEY (`App_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of appoint_cars
-- ----------------------------

-- ----------------------------
-- Table structure for auth_cars
-- ----------------------------
DROP TABLE IF EXISTS `auth_cars`;
CREATE TABLE `auth_cars`  (
  `u_id` int NOT NULL AUTO_INCREMENT,
  `cus_id` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'เลขบัตรประชาชน',
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ชื่อ',
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'สกุล',
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ชื่อผู้ใช้',
  `password` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'รหัสผ่าน',
  `role` enum('admin','user') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'user' COMMENT 'สิทธิ์การเข้าถึง',
  `image` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'image_profile',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'อีเมลล์',
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'เบอร์โทรศัพท์',
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'ที่อยู่',
  `last_login` datetime NULL DEFAULT NULL COMMENT 'วันที่ล็อกอินครั้งล่าสุด',
  `updated_at` datetime NULL DEFAULT NULL COMMENT 'วันที่แก้ไขโปรไฟล์ครั้งล่าสุด',
  `created_at` datetime NULL DEFAULT NULL COMMENT 'วันที่เป็นสมาชิก',
  PRIMARY KEY (`u_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_cars
-- ----------------------------
INSERT INTO `auth_cars` VALUES (1, '9078052412351', 'admin', 'test', 'admin', '$2y$10$a4RFYw9N4huMDQU89SvzN.K2cJmX1j3RH/eQ4psU/y6RaE65nRM1e', 'admin', 'https://cdn-icons-png.flaticon.com/512/1077/1077114.png', 'test@gmail.com', '0123456789', 'bangkok', '2023-07-24 05:35:54', '2023-07-23 16:54:31', '2023-07-23 16:54:31');

-- ----------------------------
-- Table structure for brand_cars
-- ----------------------------
DROP TABLE IF EXISTS `brand_cars`;
CREATE TABLE `brand_cars`  (
  `b_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสยี่ห้อรถยนต์',
  `b_brand` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ยี่ห้อ (brand)',
  `b_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'สถานะปิดการมองเห็น{true/flase}',
  `Car_id` int NULL DEFAULT NULL COMMENT 'รหัสรถยนต์',
  PRIMARY KEY (`b_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of brand_cars
-- ----------------------------

-- ----------------------------
-- Table structure for contract_cars
-- ----------------------------
DROP TABLE IF EXISTS `contract_cars`;
CREATE TABLE `contract_cars`  (
  `Cont_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสทำสัญญา (PK)',
  `Cont_time` datetime NULL DEFAULT NULL COMMENT 'วันที่ทำสัญญา',
  `Cont_location` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'สถานที่จัดทำสัญญา',
  `Cont_Payment` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'เลือกวิธีการชำระเงิน',
  `Cont_Status` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'สถานะ',
  `Dep_id` int NULL DEFAULT NULL COMMENT 'รหัสโอนค่ามัดจำ FK (Deposit_car)',
  PRIMARY KEY (`Cont_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contract_cars
-- ----------------------------

-- ----------------------------
-- Table structure for deposit_cars
-- ----------------------------
DROP TABLE IF EXISTS `deposit_cars`;
CREATE TABLE `deposit_cars`  (
  `Dep_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสโอนค่ามัดจำ (PK)',
  `Dep_day` datetime NULL DEFAULT NULL COMMENT 'วันที่โอน',
  `Dep_status` enum('success','pending','fail') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'สถานะ',
  `App_id` int NULL DEFAULT NULL COMMENT 'รหัสนัดหมาย FK(Appoint_car)',
  `Cus_id` int NULL DEFAULT NULL COMMENT 'id ข้อมูลลูกค้า FK(Customer_car)',
  PRIMARY KEY (`Dep_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of deposit_cars
-- ----------------------------

-- ----------------------------
-- Table structure for get_cars
-- ----------------------------
DROP TABLE IF EXISTS `get_cars`;
CREATE TABLE `get_cars`  (
  `Get_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายการรับรถ',
  `Get_date` datetime NULL DEFAULT NULL COMMENT 'วันที่/เวลา',
  `Ty_id` int NULL DEFAULT NULL COMMENT 'รหัสประเภทรถยนต์ FK (Type_car)',
  `Ow_id` int NULL DEFAULT NULL COMMENT 'รหัสเจ้าของร้าน FK(Owner_car)',
  `Car_id` int NULL DEFAULT NULL COMMENT 'รหัสรถยนต์ FK (Cars_car)',
  PRIMARY KEY (`Get_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of get_cars
-- ----------------------------

-- ----------------------------
-- Table structure for information_cars
-- ----------------------------
DROP TABLE IF EXISTS `information_cars`;
CREATE TABLE `information_cars`  (
  `Car_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสรถยนต์',
  `Car_brand` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ยี่ห้อ',
  `Car_regisnum` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'เลขทะเบียน',
  `Car_chassi` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Chassis Number\r\n(serial id)',
  `Car_mile` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'เลขไมล์',
  `Car_time` datetime NULL DEFAULT NULL COMMENT 'วันที่จดทะเบียนรถยน',
  `Car_year` year NULL DEFAULT NULL COMMENT 'ปีที่ผลิต',
  `Car_cappaci` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ความจุเครื่องยนต์',
  `Ty_id` int NULL DEFAULT NULL COMMENT 'รหัสประเภทรถยนต์',
  `List_id` int NULL DEFAULT NULL COMMENT 'รหัสรายการรับรถยนต์',
  `m_id` int NULL DEFAULT NULL COMMENT 'รหัสรุ่นรถยนต์',
  `b_id` int NULL DEFAULT NULL COMMENT 'รหัสยี่ห้อรถยนต์',
  PRIMARY KEY (`Car_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of information_cars
-- ----------------------------

-- ----------------------------
-- Table structure for model_cars
-- ----------------------------
DROP TABLE IF EXISTS `model_cars`;
CREATE TABLE `model_cars`  (
  `m_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสยี่ห้อรถยนต์',
  `m_model` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'รุ่น',
  `m_status` enum('true','false') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'true' COMMENT 'สถานะปิดการมองเห็น{true/flase}',
  `Car_id` int NULL DEFAULT NULL COMMENT 'FK (Cars_car)',
  PRIMARY KEY (`m_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_cars
-- ----------------------------

-- ----------------------------
-- Table structure for sale_cars
-- ----------------------------
DROP TABLE IF EXISTS `sale_cars`;
CREATE TABLE `sale_cars`  (
  `Sale_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสขายรถยนต์ PK',
  `Sale_time` datetime NULL DEFAULT NULL COMMENT 'วันที่ประกาศขาย',
  `Sale_price` int NULL DEFAULT NULL COMMENT 'ราคาขาย',
  `Sale_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ชื่อเจ้าของรถ',
  `Cus_id` int NULL DEFAULT NULL COMMENT 'เลขบัตรประชาชน FK(Customer_car)',
  `Car_id` int NULL DEFAULT NULL COMMENT 'รหัสรถยนต์ FK (Cars_car)',
  PRIMARY KEY (`Sale_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sale_cars
-- ----------------------------

-- ----------------------------
-- Table structure for transfer_cars
-- ----------------------------
DROP TABLE IF EXISTS `transfer_cars`;
CREATE TABLE `transfer_cars`  (
  `Tran_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสการโอนกรรมสิทธิ์ PK',
  `Tran_date` datetime NULL DEFAULT NULL COMMENT 'วันที่โอนกรรมสิทธิ์',
  `Tran_time` datetime NULL DEFAULT NULL COMMENT 'เวลา',
  `Tran_carregis` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'คู่มือจดทะเบียนรถ(image)',
  `Tran_idcard` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'สำเนาบัตรประชาชนเจ้าของรถ(image)',
  `Tran_trans` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'สำเนาบัตรประชาชนผู้รับโอน(image)',
  `Tran_attorney` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'หนังสือมอบอำนาจ(image)',
  `Cont_id` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'รหัสทำสัญญา FK(Contract_car)',
  PRIMARY KEY (`Tran_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transfer_cars
-- ----------------------------

-- ----------------------------
-- Table structure for type_cars
-- ----------------------------
DROP TABLE IF EXISTS `type_cars`;
CREATE TABLE `type_cars`  (
  `Ty_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทรถยนต์',
  `Type_data` enum('รถเก๋ง','รถกระบะ 2 ประตู','รถกระบะ 4 ประตู','รถกระบะ CAB') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ประเภทรถยนต์',
  `Car_id` int NOT NULL COMMENT 'รหัสรถยนต์ FK (Cars_car)',
  `Ty_cappaci` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ความจุเครื่องยนต์',
  `Ty_color` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'สี',
  `Ty_gear` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ระบบเกียร์',
  PRIMARY KEY (`Ty_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of type_cars
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
