/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : laravelsms

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-10-06 09:41:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for academics
-- ----------------------------
DROP TABLE IF EXISTS `academics`;
CREATE TABLE `academics` (
  `academic_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `academic` varchar(50) NOT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  `updated_at` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`academic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of academics
-- ----------------------------
INSERT INTO `academics` VALUES ('1', '2016-2017', '2017-05-29 11:12:40.000000', '2017-05-29 11:12:40.000000');
INSERT INTO `academics` VALUES ('2', '2017-2018', '2017-05-29 11:12:58.000000', '2017-05-29 11:12:58.000000');

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admins
-- ----------------------------

-- ----------------------------
-- Table structure for batchs
-- ----------------------------
DROP TABLE IF EXISTS `batchs`;
CREATE TABLE `batchs` (
  `batch_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `batch` varchar(50) NOT NULL,
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of batchs
-- ----------------------------
INSERT INTO `batchs` VALUES ('1', 'Batch I');
INSERT INTO `batchs` VALUES ('2', 'Batch II');
INSERT INTO `batchs` VALUES ('3', 'Batch III');

-- ----------------------------
-- Table structure for classes
-- ----------------------------
DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
  `class_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `academic_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `time_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of classes
-- ----------------------------
INSERT INTO `classes` VALUES ('1', '2', '1', '1', '1', '1', '1', '2017-05-01', '2017-05-31', '1');
INSERT INTO `classes` VALUES ('2', '2', '4', '3', '2', '1', '2', '2017-05-01', '2017-05-31', '1');
INSERT INTO `classes` VALUES ('3', '2', '1', '2', '3', '1', '2', '2017-05-01', '2017-05-31', '1');
INSERT INTO `classes` VALUES ('4', '2', '6', '1', '1', '1', '1', '2017-05-01', '2017-05-31', '1');
INSERT INTO `classes` VALUES ('5', '2', '1', '1', '1', '1', '1', '2017-05-01', '2017-05-31', '1');
INSERT INTO `classes` VALUES ('6', '1', '7', '1', '1', '1', '1', '2017-05-01', '2017-05-31', '1');

-- ----------------------------
-- Table structure for fees
-- ----------------------------
DROP TABLE IF EXISTS `fees`;
CREATE TABLE `fees` (
  `fee_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `academic_id` int(11) NOT NULL,
  `fee_heading` varchar(100) NOT NULL,
  `fee_type_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`fee_id`),
  UNIQUE KEY `program_id` (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fees
-- ----------------------------
INSERT INTO `fees` VALUES ('1', '2', '6', '2', 'School Fees', '1', '120');
INSERT INTO `fees` VALUES ('2', '1', '1', '2', 'School Fees', '1', '80');

-- ----------------------------
-- Table structure for feetypes
-- ----------------------------
DROP TABLE IF EXISTS `feetypes`;
CREATE TABLE `feetypes` (
  `fee_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `fee_type` varchar(50) NOT NULL,
  PRIMARY KEY (`fee_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feetypes
-- ----------------------------
INSERT INTO `feetypes` VALUES ('1', 'school fee');

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(10) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'Computer');
INSERT INTO `groups` VALUES ('2', 'Management');
INSERT INTO `groups` VALUES ('3', 'English');
INSERT INTO `groups` VALUES ('4', 'Accounting');

-- ----------------------------
-- Table structure for levels
-- ----------------------------
DROP TABLE IF EXISTS `levels`;
CREATE TABLE `levels` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `level` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of levels
-- ----------------------------
INSERT INTO `levels` VALUES ('1', '1', 'Level I', 'This is Level I of Microsoft Word');
INSERT INTO `levels` VALUES ('2', '6', 'Level I', 'This is Level I of Adobe After Effect CS6');
INSERT INTO `levels` VALUES ('3', '5', 'Level I', 'This is Level I of Adobe Photoshop CS6');
INSERT INTO `levels` VALUES ('4', '1', 'Level II', 'This is Level II of Microsoft Word');
INSERT INTO `levels` VALUES ('5', '6', 'Level II', 'This is Level II of Adobe After Effect CS6');
INSERT INTO `levels` VALUES ('6', '2', 'Level I', 'This is Level I of Microsoft Excel');
INSERT INTO `levels` VALUES ('7', '2', 'Level II', 'This is Level II of Microsoft Excel');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2', '2017_05_15_022323_Create_Roles_Table', '1');
INSERT INTO `migrations` VALUES ('3', '2017_05_15_023218_Create_Users_Table', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `password_resets_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for programs
-- ----------------------------
DROP TABLE IF EXISTS `programs`;
CREATE TABLE `programs` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `program` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of programs
-- ----------------------------
INSERT INTO `programs` VALUES ('1', 'Microsoft Word', 'administrative course');
INSERT INTO `programs` VALUES ('2', 'Microsoft Excel', 'administrative course');
INSERT INTO `programs` VALUES ('3', 'Vb.net Programming', 'Programming');
INSERT INTO `programs` VALUES ('4', 'C#.net Programming', 'Programming');
INSERT INTO `programs` VALUES ('5', 'Adobe Photoshop CS6', 'This is Photoshop');
INSERT INTO `programs` VALUES ('6', 'Adobe After Effect CS6', 'This is Adobe After Effect CS6');

-- ----------------------------
-- Table structure for receiptdetails
-- ----------------------------
DROP TABLE IF EXISTS `receiptdetails`;
CREATE TABLE `receiptdetails` (
  `receipt_id` int(11) NOT NULL,
  `transact_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of receiptdetails
-- ----------------------------
INSERT INTO `receiptdetails` VALUES ('1', '1', '1');
INSERT INTO `receiptdetails` VALUES ('2', '2', '2');

-- ----------------------------
-- Table structure for receipts
-- ----------------------------
DROP TABLE IF EXISTS `receipts`;
CREATE TABLE `receipts` (
  `receipt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of receipts
-- ----------------------------
INSERT INTO `receipts` VALUES ('1');
INSERT INTO `receipts` VALUES ('2');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Admin', null, null);
INSERT INTO `roles` VALUES ('2', 'Receiptionish', null, null);
INSERT INTO `roles` VALUES ('3', 'Manager', null, null);
INSERT INTO `roles` VALUES ('4', 'CEO', null, null);

-- ----------------------------
-- Table structure for shifts
-- ----------------------------
DROP TABLE IF EXISTS `shifts`;
CREATE TABLE `shifts` (
  `shift_id` int(11) NOT NULL AUTO_INCREMENT,
  `shift` varchar(50) NOT NULL,
  PRIMARY KEY (`shift_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shifts
-- ----------------------------
INSERT INTO `shifts` VALUES ('1', 'Morning');
INSERT INTO `shifts` VALUES ('2', 'Evening');
INSERT INTO `shifts` VALUES ('3', 'Afternoon');

-- ----------------------------
-- Table structure for statuses
-- ----------------------------
DROP TABLE IF EXISTS `statuses`;
CREATE TABLE `statuses` (
  `status_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of statuses
-- ----------------------------
INSERT INTO `statuses` VALUES ('1', '1', '5');
INSERT INTO `statuses` VALUES ('2', '2', '4');

-- ----------------------------
-- Table structure for studentfees
-- ----------------------------
DROP TABLE IF EXISTS `studentfees`;
CREATE TABLE `studentfees` (
  `s_fee_id` int(11) NOT NULL AUTO_INCREMENT,
  `fee_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `discount` float NOT NULL,
  PRIMARY KEY (`s_fee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of studentfees
-- ----------------------------
INSERT INTO `studentfees` VALUES ('1', '1', '4', '1', '250', '0');
INSERT INTO `studentfees` VALUES ('2', '2', '1', '1', '80', '0');
INSERT INTO `studentfees` VALUES ('3', '1', '2', '6', '120', '0');

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `rac` varchar(50) DEFAULT NULL,
  `status` tinyint(11) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `national_card` varchar(50) DEFAULT NULL,
  `passport` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `village` varchar(50) DEFAULT NULL,
  `commune` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `current_address` varchar(200) DEFAULT NULL,
  `dateregistered` varchar(50) DEFAULT NULL,
  `photo` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES ('1', 'Samnang', 'Im', '0', '2017-06-01', 'applephagna@gmail.com', 'Rac', '1', 'Khmer', '180022898', '180022898', '078343143', 'មណ្ឌល៣', 'ស្លក្រាម', 'សៀមរាប', 'សៀមរាប', 'ភូមិខ្នារចាស់ សង្កាត់ជ្រាវ ស្រុកសៀមរាប ខេត្តសៀមរាប', null, '29071.2017-06-08.1496906069.jpg', '1');
INSERT INTO `students` VALUES ('2', 'Sok', 'Somalay', '1', '2007-03-01', 'malaytailor@gmail.com', 'rac', '1', 'khmer', '000000001', '00000001', '077549538', 'siem reap', 'siem reap', 'siem reap', 'siem reap', 'siem reap', null, '98765.2017-08-30.1504092518.jpg', '1');
INSERT INTO `students` VALUES ('3', 'Samnang', 'Im', '0', '2017-06-01', 'applephagna@gmail.com', 'Rac', '1', 'Khmer', '180022898', '180022898', '078343143', 'មណ្ឌល៣', 'ស្លក្រាម', 'សៀមរាប', 'សៀមរាប', 'ភូមិខ្នារចាស់ សង្កាត់ជ្រាវ ស្រុកសៀមរាប ខេត្តសៀមរាប', null, '29071.2017-06-08.1496906069.jpg', '1');
INSERT INTO `students` VALUES ('4', 'Samnang', 'Im', '0', '2017-06-01', 'applephagna@gmail.com', 'Rac', '1', 'Khmer', '180022898', '180022898', '078343143', 'មណ្ឌល៣', 'ស្លក្រាម', 'សៀមរាប', 'សៀមរាប', 'ភូមិខ្នារចាស់ សង្កាត់ជ្រាវ ស្រុកសៀមរាប ខេត្តសៀមរាប', null, '29071.2017-06-08.1496906069.jpg', '1');
INSERT INTO `students` VALUES ('5', 'Sok', 'Somalay', '1', '2007-03-01', 'malaytailor@gmail.com', 'rac', '1', 'khmer', '000000001', '00000001', '077549538', 'siem reap', 'siem reap', 'siem reap', 'siem reap', 'siem reap', null, '98765.2017-08-30.1504092518.jpg', '1');
INSERT INTO `students` VALUES ('6', 'Samnang', 'Im', '0', '2017-06-01', 'applephagna@gmail.com', 'Rac', '1', 'Khmer', '180022898', '180022898', '078343143', 'មណ្ឌល៣', 'ស្លក្រាម', 'សៀមរាប', 'សៀមរាប', 'ភូមិខ្នារចាស់ សង្កាត់ជ្រាវ ស្រុកសៀមរាប ខេត្តសៀមរាប', null, '29071.2017-06-08.1496906069.jpg', '1');
INSERT INTO `students` VALUES ('7', 'Sok', 'Somalay', '1', '2007-03-01', 'malaytailor@gmail.com', 'rac', '1', 'khmer', '000000001', '00000001', '077549538', 'siem reap', 'siem reap', 'siem reap', 'siem reap', 'siem reap', null, '98765.2017-08-30.1504092518.jpg', '1');
INSERT INTO `students` VALUES ('8', 'Samnang', 'Im', '0', '2017-06-01', 'applephagna@gmail.com', 'Rac', '1', 'Khmer', '180022898', '180022898', '078343143', 'មណ្ឌល៣', 'ស្លក្រាម', 'សៀមរាប', 'សៀមរាប', 'ភូមិខ្នារចាស់ សង្កាត់ជ្រាវ ស្រុកសៀមរាប ខេត្តសៀមរាប', null, '29071.2017-06-08.1496906069.jpg', '1');
INSERT INTO `students` VALUES ('9', 'Sok', 'Somalay', '1', '2007-03-01', 'malaytailor@gmail.com', 'rac', '1', 'khmer', '000000001', '00000001', '077549538', 'siem reap', 'siem reap', 'siem reap', 'siem reap', 'siem reap', null, '98765.2017-08-30.1504092518.jpg', '1');
INSERT INTO `students` VALUES ('10', 'Samnang', 'Im', '0', '2017-06-01', 'applephagna@gmail.com', 'Rac', '1', 'Khmer', '180022898', '180022898', '078343143', 'មណ្ឌល៣', 'ស្លក្រាម', 'សៀមរាប', 'សៀមរាប', 'ភូមិខ្នារចាស់ សង្កាត់ជ្រាវ ស្រុកសៀមរាប ខេត្តសៀមរាប', null, '29071.2017-06-08.1496906069.jpg', '1');
INSERT INTO `students` VALUES ('11', 'Samnang', 'Im', '0', '2017-06-01', 'applephagna@gmail.com', 'Rac', '1', 'Khmer', '180022898', '180022898', '078343143', 'មណ្ឌល៣', 'ស្លក្រាម', 'សៀមរាប', 'សៀមរាប', 'ភូមិខ្នារចាស់ សង្កាត់ជ្រាវ ស្រុកសៀមរាប ខេត្តសៀមរាប', null, '29071.2017-06-08.1496906069.jpg', '1');
INSERT INTO `students` VALUES ('12', 'Sok', 'Somalay', '1', '2007-03-01', 'malaytailor@gmail.com', 'rac', '1', 'khmer', '000000001', '00000001', '077549538', 'siem reap', 'siem reap', 'siem reap', 'siem reap', 'siem reap', null, '98765.2017-08-30.1504092518.jpg', '1');
INSERT INTO `students` VALUES ('13', 'Samnang', 'Im', '0', '2017-06-01', 'applephagna@gmail.com', 'Rac', '1', 'Khmer', '180022898', '180022898', '078343143', 'មណ្ឌល៣', 'ស្លក្រាម', 'សៀមរាប', 'សៀមរាប', 'ភូមិខ្នារចាស់ សង្កាត់ជ្រាវ ស្រុកសៀមរាប ខេត្តសៀមរាប', null, '29071.2017-06-08.1496906069.jpg', '1');
INSERT INTO `students` VALUES ('14', 'Samnang', 'Im', '0', '2017-06-01', 'applephagna@gmail.com', 'Rac', '1', 'Khmer', '180022898', '180022898', '078343143', 'មណ្ឌល៣', 'ស្លក្រាម', 'សៀមរាប', 'សៀមរាប', 'ភូមិខ្នារចាស់ សង្កាត់ជ្រាវ ស្រុកសៀមរាប ខេត្តសៀមរាប', null, '29071.2017-06-08.1496906069.jpg', '1');
INSERT INTO `students` VALUES ('15', 'Sok', 'Somalay', '1', '2007-03-01', 'malaytailor@gmail.com', 'rac', '1', 'khmer', '000000001', '00000001', '077549538', 'siem reap', 'siem reap', 'siem reap', 'siem reap', 'siem reap', null, '98765.2017-08-30.1504092518.jpg', '1');
INSERT INTO `students` VALUES ('16', 'Samnang', 'Im', '0', '2017-06-01', 'applephagna@gmail.com', 'Rac', '1', 'Khmer', '180022898', '180022898', '078343143', 'មណ្ឌល៣', 'ស្លក្រាម', 'សៀមរាប', 'សៀមរាប', 'ភូមិខ្នារចាស់ សង្កាត់ជ្រាវ ស្រុកសៀមរាប ខេត្តសៀមរាប', null, '29071.2017-06-08.1496906069.jpg', '1');
INSERT INTO `students` VALUES ('17', 'Samnang', 'Im', '0', '2017-06-01', 'applephagna@gmail.com', 'Rac', '1', 'Khmer', '180022898', '180022898', '078343143', 'មណ្ឌល៣', 'ស្លក្រាម', 'សៀមរាប', 'សៀមរាប', 'ភូមិខ្នារចាស់ សង្កាត់ជ្រាវ ស្រុកសៀមរាប ខេត្តសៀមរាប', null, '29071.2017-06-08.1496906069.jpg', '1');
INSERT INTO `students` VALUES ('18', 'Sok', 'Somalay', '1', '2007-03-01', 'malaytailor@gmail.com', 'rac', '1', 'khmer', '000000001', '00000001', '077549538', 'siem reap', 'siem reap', 'siem reap', 'siem reap', 'siem reap', null, '98765.2017-08-30.1504092518.jpg', '1');
INSERT INTO `students` VALUES ('19', 'Samnang', 'Im', '0', '2017-06-01', 'applephagna@gmail.com', 'Rac', '1', 'Khmer', '180022898', '180022898', '078343143', 'មណ្ឌល៣', 'ស្លក្រាម', 'សៀមរាប', 'សៀមរាប', 'ភូមិខ្នារចាស់ សង្កាត់ជ្រាវ ស្រុកសៀមរាប ខេត្តសៀមរាប', null, '29071.2017-06-08.1496906069.jpg', '1');
INSERT INTO `students` VALUES ('20', 'Samnang', 'Im', '0', '2017-06-01', 'applephagna@gmail.com', 'Rac', '1', 'Khmer', '180022898', '180022898', '078343143', 'មណ្ឌល៣', 'ស្លក្រាម', 'សៀមរាប', 'សៀមរាប', 'ភូមិខ្នារចាស់ សង្កាត់ជ្រាវ ស្រុកសៀមរាប ខេត្តសៀមរាប', null, '29071.2017-06-08.1496906069.jpg', '1');
INSERT INTO `students` VALUES ('21', 'Sok', 'Somalay', '1', '2007-03-01', 'malaytailor@gmail.com', 'rac', '1', 'khmer', '000000001', '00000001', '077549538', 'siem reap', 'siem reap', 'siem reap', 'siem reap', 'siem reap', null, '98765.2017-08-30.1504092518.jpg', '1');
INSERT INTO `students` VALUES ('22', 'Samnang', 'Im', '0', '2017-06-01', 'applephagna@gmail.com', 'Rac', '1', 'Khmer', '180022898', '180022898', '078343143', 'មណ្ឌល៣', 'ស្លក្រាម', 'សៀមរាប', 'សៀមរាប', 'ភូមិខ្នារចាស់ សង្កាត់ជ្រាវ ស្រុកសៀមរាប ខេត្តសៀមរាប', null, '29071.2017-06-08.1496906069.jpg', '1');
INSERT INTO `students` VALUES ('23', 'Samnang', 'Im', '0', '2017-06-01', 'applephagna@gmail.com', 'Rac', '1', 'Khmer', '180022898', '180022898', '078343143', 'មណ្ឌល៣', 'ស្លក្រាម', 'សៀមរាប', 'សៀមរាប', 'ភូមិខ្នារចាស់ សង្កាត់ជ្រាវ ស្រុកសៀមរាប ខេត្តសៀមរាប', null, '29071.2017-06-08.1496906069.jpg', '1');
INSERT INTO `students` VALUES ('24', 'Sok', 'Somalay', '1', '2007-03-01', 'malaytailor@gmail.com', 'rac', '1', 'khmer', '000000001', '00000001', '077549538', 'siem reap', 'siem reap', 'siem reap', 'siem reap', 'siem reap', null, '98765.2017-08-30.1504092518.jpg', '1');
INSERT INTO `students` VALUES ('25', 'Samnang', 'Im', '0', '2017-06-01', 'applephagna@gmail.com', 'Rac', '1', 'Khmer', '180022898', '180022898', '078343143', 'មណ្ឌល៣', 'ស្លក្រាម', 'សៀមរាប', 'សៀមរាប', 'ភូមិខ្នារចាស់ សង្កាត់ជ្រាវ ស្រុកសៀមរាប ខេត្តសៀមរាប', null, '29071.2017-06-08.1496906069.jpg', '1');

-- ----------------------------
-- Table structure for times
-- ----------------------------
DROP TABLE IF EXISTS `times`;
CREATE TABLE `times` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(50) NOT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of times
-- ----------------------------
INSERT INTO `times` VALUES ('1', '07:30AM-11:30AM');
INSERT INTO `times` VALUES ('2', '1:30PM-5:30PM');
INSERT INTO `times` VALUES ('3', '5:30PM-9:30PM');

-- ----------------------------
-- Table structure for transactions
-- ----------------------------
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `transact_id` int(11) NOT NULL AUTO_INCREMENT,
  `transact_date` date NOT NULL,
  `fee_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `s_fee_id` int(10) unsigned NOT NULL,
  `paid` float NOT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`transact_id`),
  KEY `student_id` (`student_id`),
  KEY `s_fee_id` (`s_fee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of transactions
-- ----------------------------
INSERT INTO `transactions` VALUES ('1', '2017-06-08', '2', '1', '1', '2', '80', 'Complete', 'USD');
INSERT INTO `transactions` VALUES ('2', '2017-08-30', '1', '1', '2', '3', '80', 'Paid 80$ first one', 'Paid for first time');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', 'Apple Phagna', 'applephagna', 'applephagna@gmail.com', '$2y$10$P8kZhdnrvJg8nmvg9JGRA.Z912DShm4iM4XH0G8CCeyZRAiZJ.g4W', 'qJedrbRl89', '1', '2017-05-14 04:46:03', '2017-05-14 04:46:03');
INSERT INTO `users` VALUES ('2', '2', 'user', 'user', 'user@gmail.com', '$2y$10$htBrH9gKigkCvc3/lgHt3ukdgWHmtCE1DWQbwGbzgZQcdx40pdyj2', 'PXXV5cs8pPRXfXO7mjnss3YOvF5HKmTgD0aRhAbVzHHyIB5j4A5XOJ6TiKz7', '1', '2017-05-14 04:47:37', '2017-05-14 04:47:37');
