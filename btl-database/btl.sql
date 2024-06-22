/*
 Navicat Premium Data Transfer

 Source Server         : localhost 3306
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : btl

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 08/05/2024 00:32:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `ten` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('admin', '123456');

-- ----------------------------
-- Table structure for doanphi
-- ----------------------------
DROP TABLE IF EXISTS `doanphi`;
CREATE TABLE `doanphi`  (
  `madoanvien` int NOT NULL,
  `ngaynop` date NOT NULL,
  `hannop` date NOT NULL,
  INDEX `madoanvien`(`madoanvien` ASC) USING BTREE,
  CONSTRAINT `doanphi_ibfk_1` FOREIGN KEY (`madoanvien`) REFERENCES `doanvien` (`madoanvien`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of doanphi
-- ----------------------------
INSERT INTO `doanphi` VALUES (1, '2022-03-21', '2023-03-21');
INSERT INTO `doanphi` VALUES (2, '2021-04-21', '2022-04-21');
INSERT INTO `doanphi` VALUES (3, '2021-05-21', '2022-05-21');
INSERT INTO `doanphi` VALUES (4, '2021-06-21', '2022-06-21');
INSERT INTO `doanphi` VALUES (5, '2021-07-21', '2022-07-21');
INSERT INTO `doanphi` VALUES (6, '2021-08-21', '2022-08-21');
INSERT INTO `doanphi` VALUES (7, '2021-09-21', '2022-09-21');
INSERT INTO `doanphi` VALUES (8, '2021-10-21', '2022-10-21');
INSERT INTO `doanphi` VALUES (9, '2021-11-21', '2022-11-21');
INSERT INTO `doanphi` VALUES (10, '2021-12-21', '2022-12-21');
INSERT INTO `doanphi` VALUES (11, '2021-01-09', '2022-01-09');
INSERT INTO `doanphi` VALUES (12, '2021-02-21', '2022-02-21');
INSERT INTO `doanphi` VALUES (13, '2022-03-15', '2023-03-15');
INSERT INTO `doanphi` VALUES (14, '2022-04-15', '2023-04-15');
INSERT INTO `doanphi` VALUES (15, '2022-05-15', '2023-05-15');
INSERT INTO `doanphi` VALUES (16, '2022-06-15', '2023-06-15');
INSERT INTO `doanphi` VALUES (17, '2022-07-15', '2023-07-15');
INSERT INTO `doanphi` VALUES (18, '2022-08-15', '2023-08-15');
INSERT INTO `doanphi` VALUES (19, '2022-09-15', '2023-09-15');
INSERT INTO `doanphi` VALUES (20, '2022-10-15', '2023-10-15');
INSERT INTO `doanphi` VALUES (20, '2022-10-20', '2023-10-20');
INSERT INTO `doanphi` VALUES (21, '2022-10-21', '2023-10-21');
INSERT INTO `doanphi` VALUES (22, '2022-10-22', '2023-10-22');
INSERT INTO `doanphi` VALUES (23, '2022-10-23', '2023-10-23');
INSERT INTO `doanphi` VALUES (24, '2022-10-24', '2023-10-24');
INSERT INTO `doanphi` VALUES (25, '2022-10-25', '2023-10-25');
INSERT INTO `doanphi` VALUES (26, '2023-10-26', '2024-10-26');
INSERT INTO `doanphi` VALUES (27, '2022-10-27', '2023-10-27');
INSERT INTO `doanphi` VALUES (28, '2022-10-28', '2023-10-28');
INSERT INTO `doanphi` VALUES (29, '2012-10-29', '2013-10-29');
INSERT INTO `doanphi` VALUES (30, '2022-10-30', '2013-10-30');
INSERT INTO `doanphi` VALUES (32, '2023-05-12', '2024-05-12');
INSERT INTO `doanphi` VALUES (33, '2023-05-13', '2024-05-13');
INSERT INTO `doanphi` VALUES (34, '2023-05-14', '2024-05-14');
INSERT INTO `doanphi` VALUES (35, '2023-05-15', '2024-05-15');
INSERT INTO `doanphi` VALUES (36, '2023-05-16', '2024-05-16');
INSERT INTO `doanphi` VALUES (37, '2023-05-17', '2024-05-17');
INSERT INTO `doanphi` VALUES (38, '2023-05-18', '2024-05-18');
INSERT INTO `doanphi` VALUES (39, '2023-05-19', '2024-05-19');
INSERT INTO `doanphi` VALUES (40, '2023-05-30', '2024-05-30');
INSERT INTO `doanphi` VALUES (41, '2023-07-20', '2024-07-20');
INSERT INTO `doanphi` VALUES (42, '2023-07-22', '2024-07-22');
INSERT INTO `doanphi` VALUES (43, '2023-07-23', '2024-07-23');
INSERT INTO `doanphi` VALUES (44, '2023-07-24', '2024-07-24');
INSERT INTO `doanphi` VALUES (45, '2023-07-25', '2024-07-25');

-- ----------------------------
-- Table structure for doanvien
-- ----------------------------
DROP TABLE IF EXISTS `doanvien`;
CREATE TABLE `doanvien`  (
  `madoanvien` int NOT NULL AUTO_INCREMENT,
  `hoten` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `malop` int NOT NULL,
  `que` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `hoatdong` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `noiohientai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ngayvaodoan` date NOT NULL,
  `noivaodoan` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`madoanvien`) USING BTREE,
  INDEX `malop`(`malop` ASC) USING BTREE,
  CONSTRAINT `doanvien_ibfk_1` FOREIGN KEY (`malop`) REFERENCES `lop` (`malop`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of doanvien
-- ----------------------------
INSERT INTO `doanvien` VALUES (1, 'Đinh Thành Nam', 1, 'Hà Nội', 'Giỏi', 'Hà Nội', '2016-05-18', 'Hà Nội');
INSERT INTO `doanvien` VALUES (2, 'Lê Việt Hùng', 1, 'Hà Nam', 'Khá', 'Hà Nội', '2013-03-12', 'Hà Nam');
INSERT INTO `doanvien` VALUES (3, 'Hoàng Mạnh Tấn', 1, 'Ninh Bình', 'Yếu', 'Hà Nội', '2013-05-05', 'Ninh Bình');
INSERT INTO `doanvien` VALUES (4, 'Hoàng Trọng Nhân', 1, 'Quảng Trị', 'Tốt', 'Hà Nội', '2013-07-20', 'Quảng Trị');
INSERT INTO `doanvien` VALUES (5, 'Lê Việt Mạnh', 1, 'Phủ Lý', 'Khá', 'Hà Nội', '2013-01-20', 'Phủ Lý');
INSERT INTO `doanvien` VALUES (6, 'Hoàng Minh Hiền', 2, 'Ninh Bình', 'Tốt', 'Hà Nội', '2013-05-18', 'Ninh Bình');
INSERT INTO `doanvien` VALUES (7, 'Dỗ Tiến Anh', 2, 'Hà Nam', 'Khá', 'Hà Nội', '2013-03-12', 'Hà Nam');
INSERT INTO `doanvien` VALUES (8, 'Nguyễn Thị Na', 2, 'Vĩnh Phúc', 'Yếu', 'Hà Nội', '2013-09-09', 'Vĩnh Phúc');
INSERT INTO `doanvien` VALUES (9, 'Lê Quế Anh', 2, 'Quảng Nam', 'Tốt', 'Hà Nội', '2013-03-20', 'Quảng Nam');
INSERT INTO `doanvien` VALUES (10, 'Chu Đức Mạnh', 2, 'Phủ Lý', 'Khá', 'Hà Nội', '2013-07-22', 'Phủ Lý');
INSERT INTO `doanvien` VALUES (11, 'Lại Trọng Nhân', 3, 'Gia Lâm', 'Tốt', 'Hà Nội', '2013-02-22', 'Gia Lâm');
INSERT INTO `doanvien` VALUES (12, 'Đỗ Huy Hùng', 3, 'Hà Nam', 'Khá', 'Hà Nội', '2013-04-11', 'Hà Nam');
INSERT INTO `doanvien` VALUES (13, 'Tống Thị Kim', 3, 'Bắc Ninh', 'Yếu', 'Hà Nội', '2013-05-05', 'Bắc Ninh');
INSERT INTO `doanvien` VALUES (14, 'Nguyễn Việt Lê', 3, 'Nam Định', 'Tốt', 'Hà Nội', '2013-06-12', 'Nam Định');
INSERT INTO `doanvien` VALUES (15, 'Đào Thị Hà', 3, 'Phủ Lý', 'Khá', 'Hà Nội', '2013-01-20', 'Phủ Lý');
INSERT INTO `doanvien` VALUES (16, 'Hoàng Mạnh Nghĩa', 4, 'Ninh Bình', 'Tốt', 'Hà Nội', '2013-05-18', 'Ninh Bình');
INSERT INTO `doanvien` VALUES (17, 'Nông Đức Hoàng', 4, 'Hà Nam', 'Khá', 'Hà Nội', '2013-04-13', 'Hà Nam');
INSERT INTO `doanvien` VALUES (18, 'Nguyễn Văn Sơn', 4, 'Quảng Ninh', 'Yếu', 'Hà Nội', '2013-11-21', 'Quảng Ninh');
INSERT INTO `doanvien` VALUES (19, 'Lại Mạnh Thắng', 4, 'Quảng Trị', 'Tốt', 'Hà Nội', '2013-12-11', 'Quảng trị');
INSERT INTO `doanvien` VALUES (20, 'Chu Việt Hùng', 4, 'Hà Nam', 'Khá', 'Hà Nội', '2013-10-30', 'Hà Nam');
INSERT INTO `doanvien` VALUES (21, 'Nguyễn Việt Lê', 5, 'Bắc Ninh', 'Tốt', 'Hà Nội', '2013-05-14', 'Bắc Ninh');
INSERT INTO `doanvien` VALUES (22, 'Lê Mạnh Hoàng', 5, 'Hà Nam', 'Khá', 'Hà Nội', '2013-03-30', 'Hà Nam');
INSERT INTO `doanvien` VALUES (23, 'Hoàng Mạnh Tùng', 5, 'Thái Bình', 'Yếu', 'Hà Nội', '2013-05-14', 'Thái Bình');
INSERT INTO `doanvien` VALUES (24, 'Hoàng Đại Nam', 5, 'Quảng Trị', 'Tốt', 'Hà Nội', '2013-07-24', 'Quảng trị');
INSERT INTO `doanvien` VALUES (25, 'Lê Việt Đức', 5, 'Phủ Lý', 'Khá', 'Hà Nội', '2013-03-20', 'Phủ Lý');
INSERT INTO `doanvien` VALUES (26, 'Nguyễn Hoàng Dũng', 6, 'Ninh Bình', 'Tốt', 'Hà Nội', '2013-05-18', 'Ninh Bình');
INSERT INTO `doanvien` VALUES (27, 'Lê Việt Hùng', 6, 'Hà Nam', 'Khá', 'Hà Nội', '2013-03-12', 'Hà Nam');
INSERT INTO `doanvien` VALUES (28, 'Hoàng Mạnh Tấn', 6, 'Ninh Bình', 'Yếu', 'Hà Nội', '2013-05-05', 'Ninh Bình');
INSERT INTO `doanvien` VALUES (29, 'Hoàng Trọng Nhân', 6, 'Quảng Trị', 'Tốt', 'Hà Nội', '2013-07-20', 'Quảng trị');
INSERT INTO `doanvien` VALUES (30, 'Lê Việt Mạnh', 6, 'Phủ Lý', 'Khá', 'Hà Nội', '2013-01-20', 'Phủ Lý');
INSERT INTO `doanvien` VALUES (31, 'Nguyễn Lê Việt', 7, 'Thái Bình', 'Tốt', 'Hà Nội', '2013-05-14', 'Thái Bình');
INSERT INTO `doanvien` VALUES (32, 'Lê Việt Huy', 7, 'Hà Nội', 'Khá', 'Hà Nội', '2013-03-23', 'Hà Nội');
INSERT INTO `doanvien` VALUES (33, 'Hoàng Mạnh Tùng', 7, 'Ninh Bình', 'Yếu', 'Hà Nội', '2013-05-14', 'Ninh Bình');
INSERT INTO `doanvien` VALUES (34, 'Hoàng Trọng Hải', 7, 'Quảng Nam', 'Tốt', 'Hà Nội', '2013-07-20', 'Quảng Nam');
INSERT INTO `doanvien` VALUES (35, 'Lê Việt Anh', 7, 'Phủ Lý', 'Khá', 'Hà Nội', '2013-01-24', 'Phủ Lý');
INSERT INTO `doanvien` VALUES (36, 'Nguyễn Hoàng Hải', 8, 'Ninh Bình', 'Tốt', 'Hà Nội', '2013-02-18', 'Ninh Bình');
INSERT INTO `doanvien` VALUES (37, 'Lê Việt Bình', 8, 'Hà Nam', 'Khá', 'Hà Nội', '2013-03-12', 'Hà Nam');
INSERT INTO `doanvien` VALUES (38, 'Hoàng Mạnh Sơng', 8, 'Ninh Bình', 'Yếu', 'Hà Nội', '2013-03-05', 'Ninh Bình');
INSERT INTO `doanvien` VALUES (39, 'Hoàng Trọng Nhàn', 8, 'Phú Yên', 'Tốt', 'Hà Nội', '2013-12-20', 'Phú Yên');
INSERT INTO `doanvien` VALUES (40, 'Lê Việt Hương', 8, 'Phủ Lý', 'Khá', 'Hà Nội', '2013-01-11', 'Phủ Lý');
INSERT INTO `doanvien` VALUES (41, 'Nguyễn Huy Dũng', 9, 'Ninh Bình', 'Tốt', 'Hà Nội', '2013-05-18', 'Ninh Bình');
INSERT INTO `doanvien` VALUES (42, 'Lê Việt Dũng', 9, 'Hà Nam', 'Khá', 'Hà Nội', '2013-03-12', 'Hà Nam');
INSERT INTO `doanvien` VALUES (43, 'Hoàng Thị Mai', 9, 'Phủ Lý', 'Yếu', 'Hà Nội', '2013-05-05', 'Phủ Lý');
INSERT INTO `doanvien` VALUES (44, 'Hoàng Lại Nhân', 9, 'Lạng Sơn', 'Tốt', 'Hà Nội', '2013-07-20', 'Lạng Sơn');
INSERT INTO `doanvien` VALUES (45, 'Lê Vân Mạnh', 9, 'Phủ Lý', 'Khá', 'Hà Nội', '2013-01-20', 'Phủ Lý');

-- ----------------------------
-- Table structure for khoahoc
-- ----------------------------
DROP TABLE IF EXISTS `khoahoc`;
CREATE TABLE `khoahoc`  (
  `makhoahoc` int NOT NULL AUTO_INCREMENT,
  `tenkhoahoc` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaybatdau` date NULL DEFAULT NULL,
  `ngayketthuc` date NULL DEFAULT NULL,
  PRIMARY KEY (`makhoahoc`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of khoahoc
-- ----------------------------
INSERT INTO `khoahoc` VALUES (1, 'K21', '2021-05-17', '2024-05-17');
INSERT INTO `khoahoc` VALUES (2, 'K22', '2022-07-25', '2025-07-25');
INSERT INTO `khoahoc` VALUES (3, 'K23', '2023-06-30', '2026-06-30');

-- ----------------------------
-- Table structure for lop
-- ----------------------------
DROP TABLE IF EXISTS `lop`;
CREATE TABLE `lop`  (
  `malop` int NOT NULL AUTO_INCREMENT,
  `tenlop` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `manganh` int NOT NULL,
  PRIMARY KEY (`malop`) USING BTREE,
  INDEX `manganh`(`manganh` ASC) USING BTREE,
  CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`manganh`) REFERENCES `nganhhoc` (`manganh`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lop
-- ----------------------------
INSERT INTO `lop` VALUES (1, 'CNTT1', 1);
INSERT INTO `lop` VALUES (2, 'CNTT2', 2);
INSERT INTO `lop` VALUES (3, 'CNTT3', 3);
INSERT INTO `lop` VALUES (4, 'TA1', 4);
INSERT INTO `lop` VALUES (5, 'TA2', 5);
INSERT INTO `lop` VALUES (6, 'TA3', 6);
INSERT INTO `lop` VALUES (7, 'TKDH1', 7);
INSERT INTO `lop` VALUES (8, 'TKDH2', 8);
INSERT INTO `lop` VALUES (9, 'TKDH3', 9);

-- ----------------------------
-- Table structure for nganhhoc
-- ----------------------------
DROP TABLE IF EXISTS `nganhhoc`;
CREATE TABLE `nganhhoc`  (
  `manganh` int NOT NULL AUTO_INCREMENT,
  `tennganh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `makhoahoc` int NOT NULL,
  PRIMARY KEY (`manganh`) USING BTREE,
  INDEX `makhoahoc`(`makhoahoc` ASC) USING BTREE,
  CONSTRAINT `nganhhoc_ibfk_1` FOREIGN KEY (`makhoahoc`) REFERENCES `khoahoc` (`makhoahoc`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nganhhoc
-- ----------------------------
INSERT INTO `nganhhoc` VALUES (1, 'Mạng', 1);
INSERT INTO `nganhhoc` VALUES (2, 'Công nghệ thông tin', 1);
INSERT INTO `nganhhoc` VALUES (3, 'Cơ điện tử', 1);
INSERT INTO `nganhhoc` VALUES (4, 'Ngôn ngữ Anh', 2);
INSERT INTO `nganhhoc` VALUES (5, 'SP Tiếng Anh', 2);
INSERT INTO `nganhhoc` VALUES (6, 'Tiếng Anh ', 2);
INSERT INTO `nganhhoc` VALUES (7, 'Thiết kế nội thất', 3);
INSERT INTO `nganhhoc` VALUES (8, 'Thiết kế máy', 3);
INSERT INTO `nganhhoc` VALUES (9, 'Thiết kế nhà', 3);

SET FOREIGN_KEY_CHECKS = 1;
