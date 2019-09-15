/*
 Navicat Premium Data Transfer

 Source Server         : mpampam
 Source Server Type    : MySQL
 Source Server Version : 50532
 Source Host           : localhost:3306
 Source Schema         : dokpol

 Target Server Type    : MySQL
 Target Server Version : 50532
 File Encoding         : 65001

 Date: 15/09/2019 16:33:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for auth
-- ----------------------------
DROP TABLE IF EXISTS `auth`;
CREATE TABLE `auth`  (
  `id_auth` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `groups` int(11) NULL DEFAULT NULL,
  `active` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `update_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_auth`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of auth
-- ----------------------------
INSERT INTO `auth` VALUES (1, 'mpampam', '', 'logo68x69.png', 'superadmin@mail.com', '$2y$10$Ug/q.me0MEtY.K0R/LJnducfo3xrBxSsqTdW1Vv7iChfQXgBIdS.2', 1, '1', NULL, 1, '2018-03-20 11:22:17', '2018-04-02 01:57:17');
INSERT INTO `auth` VALUES (2, 'admin', '', '150px-Lambang_Polda_Sulsel.png', 'admin@mail.com', '$2y$10$vII/rQdG1FHd3KE0bKKh4OhaFBnr7y0BhJkzQhqSUEkZJu2ZW7CtK', 39, '1', NULL, 1, NULL, '2018-12-08 08:57:44');
INSERT INTO `auth` VALUES (3, 'Operator', '', '', 'operator@mail.com', '$2y$10$MNSBYmKpadexVNFennNN0uEdkWXa6wDV67gCkVnm0cX6q6EGzihQy', 2, '1', 1, NULL, '2018-04-07 03:30:59', NULL);

-- ----------------------------
-- Table structure for auth_sess
-- ----------------------------
DROP TABLE IF EXISTS `auth_sess`;
CREATE TABLE `auth_sess`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_auth` int(11) NULL DEFAULT NULL,
  `ip_address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_agent` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `country` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 154 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of auth_sess
-- ----------------------------
INSERT INTO `auth_sess` VALUES (107, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '', '', '2018-05-19 04:12:33');
INSERT INTO `auth_sess` VALUES (108, 3, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '', '', '2018-05-19 04:16:33');
INSERT INTO `auth_sess` VALUES (109, 2, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '', '', '2018-05-19 04:16:52');
INSERT INTO `auth_sess` VALUES (110, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '', '', '2018-05-19 04:23:08');
INSERT INTO `auth_sess` VALUES (111, 2, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '', '', '2018-05-19 04:23:46');
INSERT INTO `auth_sess` VALUES (112, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '', '', '2018-05-19 04:44:17');
INSERT INTO `auth_sess` VALUES (113, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '', '', '2018-05-20 04:25:22');
INSERT INTO `auth_sess` VALUES (114, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '', '', '2018-05-20 05:07:04');
INSERT INTO `auth_sess` VALUES (115, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '', '', '2018-05-21 04:10:27');
INSERT INTO `auth_sess` VALUES (116, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '', '', '2018-06-29 09:04:43');
INSERT INTO `auth_sess` VALUES (117, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.62 Safari/537.36', '', '', '2018-07-01 11:30:29');
INSERT INTO `auth_sess` VALUES (118, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '', '', '2018-07-03 02:11:40');
INSERT INTO `auth_sess` VALUES (119, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '', '', '2018-07-06 10:18:26');
INSERT INTO `auth_sess` VALUES (120, 1, '192.168.43.1', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.91 Mobile Safari/537.36', '', '', '2018-07-07 12:41:54');
INSERT INTO `auth_sess` VALUES (121, 1, '192.168.43.1', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.91 Mobile Safari/537.36', '', '', '2018-07-07 03:53:10');
INSERT INTO `auth_sess` VALUES (122, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '', '', '2018-07-07 09:22:20');
INSERT INTO `auth_sess` VALUES (123, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '', '', '2018-07-09 02:32:11');
INSERT INTO `auth_sess` VALUES (124, 1, '192.168.43.1', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.91 Mobile Safari/537.36', '', '', '2018-07-09 05:26:36');
INSERT INTO `auth_sess` VALUES (125, 1, '192.168.43.166', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '', '', '2018-07-09 05:35:22');
INSERT INTO `auth_sess` VALUES (126, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '', '', '2018-07-10 12:54:11');
INSERT INTO `auth_sess` VALUES (127, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '', '', '2018-07-11 01:53:56');
INSERT INTO `auth_sess` VALUES (128, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '', '', '2018-07-12 03:48:54');
INSERT INTO `auth_sess` VALUES (129, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '', '', '2018-07-12 11:10:32');
INSERT INTO `auth_sess` VALUES (130, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '', '', '2018-07-14 03:36:49');
INSERT INTO `auth_sess` VALUES (131, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '', '', '2018-07-15 12:42:59');
INSERT INTO `auth_sess` VALUES (132, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '', '', '2018-07-16 12:37:21');
INSERT INTO `auth_sess` VALUES (133, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '', '', '2018-07-18 02:39:57');
INSERT INTO `auth_sess` VALUES (134, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '', '', '2018-07-18 02:44:48');
INSERT INTO `auth_sess` VALUES (135, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '', '', '2018-07-18 02:57:56');
INSERT INTO `auth_sess` VALUES (136, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '', '', '2018-08-26 02:53:22');
INSERT INTO `auth_sess` VALUES (137, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '', '', '2018-09-01 02:05:07');
INSERT INTO `auth_sess` VALUES (138, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '', '', '2018-09-18 04:02:09');
INSERT INTO `auth_sess` VALUES (139, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '', '', '2018-09-18 04:16:13');
INSERT INTO `auth_sess` VALUES (140, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '', '', '2018-09-18 07:52:35');
INSERT INTO `auth_sess` VALUES (141, 1, '192.168.43.166', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '', '', '2018-09-18 07:56:40');
INSERT INTO `auth_sess` VALUES (142, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '', '', '2018-09-19 12:15:18');
INSERT INTO `auth_sess` VALUES (143, 2, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '', '', '2018-09-19 06:00:26');
INSERT INTO `auth_sess` VALUES (144, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '', '', '2018-09-20 02:14:54');
INSERT INTO `auth_sess` VALUES (145, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '', '', '2018-09-26 05:10:08');
INSERT INTO `auth_sess` VALUES (146, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '', '', '2018-09-27 04:57:35');
INSERT INTO `auth_sess` VALUES (147, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '', '', '2018-09-27 08:26:28');
INSERT INTO `auth_sess` VALUES (148, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '', '', '2018-10-07 02:07:26');
INSERT INTO `auth_sess` VALUES (149, 2, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '', '', '2018-10-07 05:20:24');
INSERT INTO `auth_sess` VALUES (150, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', '', '', '2018-10-18 02:10:45');
INSERT INTO `auth_sess` VALUES (151, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36', '', '', '2018-12-06 11:32:30');
INSERT INTO `auth_sess` VALUES (152, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36', '', '', '2018-12-08 08:56:22');
INSERT INTO `auth_sess` VALUES (153, 2, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36', '', '', '2018-12-08 08:57:55');

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups`  (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `access` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `update_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_level`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 40 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (1, 'superadmin', 'AKSES SEMUA MODUL', '[\"1\",\"43\",\"42\",\"44\",\"2\",\"41\",\"47\",\"40\",\"46\",\"33\",\"3\",\"4\",\"5\"]', 1, 1, '2018-03-25 10:17:13', '2018-09-19 04:15:19');
INSERT INTO `groups` VALUES (39, 'Admin', 'ADMIN', '[\"1\",\"43\",\"42\",\"44\",\"41\",\"47\",\"40\",\"46\",\"3\",\"5\"]', 2, 1, '2018-05-19 04:26:24', '2018-10-07 05:18:51');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `icon` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `is_active` int(11) NOT NULL,
  `is_parent` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, 'Beranda', 'administrator/home', 'fa fa-home', 'esa', 1, 0, 2);
INSERT INTO `menu` VALUES (2, 'Manajemen Menu', 'administrator/menus', 'fa fa-list', '', 1, 0, 6);
INSERT INTO `menu` VALUES (3, 'Manajemen Admin', '#', 'fa fa-user', '', 1, 0, 12);
INSERT INTO `menu` VALUES (4, 'Groups', 'administrator/groups', 'fa fa-circle-o', '', 1, 3, 13);
INSERT INTO `menu` VALUES (5, 'Pengguna', 'administrator/pengguna', 'fa fa-circle-o', '', 1, 3, 14);
INSERT INTO `menu` VALUES (33, 'Profile', 'administrator/profile', 'fa fa-users', '', 1, 41, 11);
INSERT INTO `menu` VALUES (40, 'agama', 'administrator/ref_agama', 'fa fa-star', '', 1, 41, 9);
INSERT INTO `menu` VALUES (41, 'data referensi', '#', 'fa fa-list', '', 1, 0, 7);
INSERT INTO `menu` VALUES (42, 'DATA PEMERIKSA', 'administrator/Mst_dokter', 'fa fa-user-md', '', 1, 0, 4);
INSERT INTO `menu` VALUES (43, 'DATA TAHANAN', 'administrator/Mst_tahanan', 'fa fa-users', '', 1, 0, 3);
INSERT INTO `menu` VALUES (44, 'DATA REKAM MEDIS', 'administrator/Trans_rekam_medis', 'fa fa-medkit', '', 1, 0, 5);
INSERT INTO `menu` VALUES (45, 'trans_luka', 'administrator/Trans_luka', 'fa fa-circle-o', '', 0, 0, 1);
INSERT INTO `menu` VALUES (46, 'Pekerjaan', 'administrator/ref_pekerjaan', 'fa fa-briefcase ', '', 1, 41, 10);
INSERT INTO `menu` VALUES (47, 'Data Polres/Polsek', 'administrator/Ref_polres', 'fa fa-folder', '', 1, 41, 8);

-- ----------------------------
-- Table structure for mst_dokter
-- ----------------------------
DROP TABLE IF EXISTS `mst_dokter`;
CREATE TABLE `mst_dokter`  (
  `id_pemeriksa` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tempat_lhr` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_lhr` date NULL DEFAULT NULL,
  `telepon` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `alumni` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pemeriksa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mst_dokter
-- ----------------------------
INSERT INTO `mst_dokter` VALUES (1, '1223321312', 'Dr. Muhammad Irfan Ibnu S.kom', 'makassar', '2018-09-25', '', '', '', '2018-07-01 11:48:22', '2018-09-19 05:58:10', 1);
INSERT INTO `mst_dokter` VALUES (2, '123456', 'Adrimun S.kep', 'Bulukumba', '1995-09-30', '32112', 'Jl. mannuruki raya', 'Akper Bhayangkara', '2018-07-02 12:06:42', '2018-09-27 05:05:11', 1);

-- ----------------------------
-- Table structure for mst_tahanan
-- ----------------------------
DROP TABLE IF EXISTS `mst_tahanan`;
CREATE TABLE `mst_tahanan`  (
  `id_tahanan` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `jenis_kelamin` enum('pria','wanita') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'pria',
  `kebangsaan` enum('WNI','WNA') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'WNI',
  `id_agama` int(11) NULL DEFAULT NULL,
  `pekerjaan` int(11) NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `update_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_tahanan`, `nik`) USING BTREE,
  INDEX `id_agama`(`id_agama`) USING BTREE,
  INDEX `pekerjaan`(`pekerjaan`) USING BTREE,
  INDEX `id_tahanan`(`id_tahanan`) USING BTREE,
  CONSTRAINT `AGAMA_TAHANAN` FOREIGN KEY (`id_agama`) REFERENCES `ref_agama` (`id_agama`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `PEKERJAAN_TAHANAN` FOREIGN KEY (`pekerjaan`) REFERENCES `ref_pekerjaan` (`id_perkerjaan`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mst_tahanan
-- ----------------------------
INSERT INTO `mst_tahanan` VALUES (6, '12344', 'Abdullah bin rahim', 'makassar', '1990-11-22', 'pria', 'WNI', 3, 1, 'Jl. Abdul kadir Makassar', 'koin_demokrat-aceh-jaya-buka-pendaftaran-caleg-31-05-2018-ioJesdomLo.png', '2018-09-27 05:24:25', '2018-10-07 05:33:28', 1, 2);

-- ----------------------------
-- Table structure for profile
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile`  (
  `id_profile` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tlp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fax` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `web` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_profile`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES (1, 'BIDDOKKES POLDA SULSEL', 'MAKASSAR', '-', '-', '-', 'mpampam5@gmail.com', '-', '-', '-', '-');

-- ----------------------------
-- Table structure for ref_agama
-- ----------------------------
DROP TABLE IF EXISTS `ref_agama`;
CREATE TABLE `ref_agama`  (
  `id_agama` int(11) NOT NULL AUTO_INCREMENT,
  `agama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `update_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_agama`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ref_agama
-- ----------------------------
INSERT INTO `ref_agama` VALUES (2, 'islam', '2018-06-29 11:07:15', NULL, 1, NULL);
INSERT INTO `ref_agama` VALUES (3, 'kristen', '2018-06-29 11:07:55', NULL, 1, NULL);
INSERT INTO `ref_agama` VALUES (4, 'hindu', '2018-06-29 11:08:34', NULL, 1, NULL);
INSERT INTO `ref_agama` VALUES (6, 'budha', '2018-09-27 05:03:29', NULL, 1, NULL);

-- ----------------------------
-- Table structure for ref_pekerjaan
-- ----------------------------
DROP TABLE IF EXISTS `ref_pekerjaan`;
CREATE TABLE `ref_pekerjaan`  (
  `id_perkerjaan` int(11) NOT NULL AUTO_INCREMENT,
  `pekerjaan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_perkerjaan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ref_pekerjaan
-- ----------------------------
INSERT INTO `ref_pekerjaan` VALUES (1, 'TIDAK ADA');
INSERT INTO `ref_pekerjaan` VALUES (2, 'POLRI');
INSERT INTO `ref_pekerjaan` VALUES (3, 'TNI');
INSERT INTO `ref_pekerjaan` VALUES (4, 'PNS');
INSERT INTO `ref_pekerjaan` VALUES (5, 'WIRASWASTA');
INSERT INTO `ref_pekerjaan` VALUES (6, 'PELAJAR');

-- ----------------------------
-- Table structure for ref_polres
-- ----------------------------
DROP TABLE IF EXISTS `ref_polres`;
CREATE TABLE `ref_polres`  (
  `id_pol` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_pol`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ref_polres
-- ----------------------------
INSERT INTO `ref_polres` VALUES (1, 'Polrestabes Makassar', '+62 411 319277', 'jln.ahmad yani no 9. Makassar  sulawesi selatan. Kode Pos :92152.');

-- ----------------------------
-- Table structure for trans_luka
-- ----------------------------
DROP TABLE IF EXISTS `trans_luka`;
CREATE TABLE `trans_luka`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rekam_medik` int(11) NULL DEFAULT NULL,
  `jenis_luka` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `posisi_luka` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `update_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of trans_luka
-- ----------------------------
INSERT INTO `trans_luka` VALUES (1, 18, 'Memar', 'Kaki kiri', '07122018125150.jpg', 'Luka memar akibat terjatuh', '2018-12-07 12:51:56', '2018-12-07 02:26:19', 1, 1);
INSERT INTO `trans_luka` VALUES (6, 18, 'Memar', 'Kepala', NULL, 'Bekas jatuh', '2018-12-07 02:28:26', NULL, 1, NULL);

-- ----------------------------
-- Table structure for trans_rekam_medis
-- ----------------------------
DROP TABLE IF EXISTS `trans_rekam_medis`;
CREATE TABLE `trans_rekam_medis`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_tahanan` int(11) NULL DEFAULT NULL,
  `id_dokter` int(11) NULL DEFAULT NULL,
  `perkara` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rutan` int(11) NULL DEFAULT NULL,
  `tgl_masuk` date NULL DEFAULT NULL,
  `tgl_pemeriksaan` date NULL DEFAULT NULL,
  `tinggi_badan` int(11) NULL DEFAULT NULL COMMENT 'cm',
  `berat_badan` int(11) NULL DEFAULT NULL COMMENT 'kg',
  `suhu_badan` float NULL DEFAULT NULL COMMENT 'celcius',
  `tensi_darah` int(11) NULL DEFAULT NULL COMMENT 'MnHg',
  `denyut_nadi` int(11) NULL DEFAULT NULL COMMENT 'x/menit',
  `pernapasan` int(11) NULL DEFAULT NULL COMMENT 'x/menit',
  `riwayat_penyakit` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `keluhan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `pemeriksaan_tubuh` enum('tidak ada luka','ada luka') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'tidak ada luka',
  `therapi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `usulan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `update_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_dokter`(`id_dokter`) USING BTREE,
  INDEX `id_tahanan`(`id_tahanan`) USING BTREE,
  INDEX `id_tahanan_2`(`id_tahanan`) USING BTREE,
  INDEX `rutan`(`rutan`) USING BTREE,
  CONSTRAINT `RELASI_DOKTER_TRANS` FOREIGN KEY (`id_dokter`) REFERENCES `mst_dokter` (`id_pemeriksa`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `RELASI_POLSRES_TRANS` FOREIGN KEY (`rutan`) REFERENCES `ref_polres` (`id_pol`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `RELASI_TAHANAN_TRANS` FOREIGN KEY (`id_tahanan`) REFERENCES `mst_tahanan` (`id_tahanan`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of trans_rekam_medis
-- ----------------------------
INSERT INTO `trans_rekam_medis` VALUES (18, '07102018052526', 6, 1, 'pasal 365 kuhp', 1, '2018-10-07', '2018-10-07', 34, 76, 766, 78, 87, 89, '-', '-', 'ada luka', '-', '-', '2018-10-07 05:26:20', '2018-12-06 11:56:22', 2, 1);

SET FOREIGN_KEY_CHECKS = 1;
