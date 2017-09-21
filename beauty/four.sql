/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50521
Source Host           : localhost:3306
Source Database       : four

Target Server Type    : MYSQL
Target Server Version : 50521
File Encoding         : 65001

Date: 2016-12-06 14:11:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `beauty_account`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_account`;
CREATE TABLE `beauty_account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) unsigned NOT NULL,
  `remark` varchar(32) NOT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '0为冻结，1为激活',
  `time` int(11) NOT NULL,
  `balance` float(20,2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_account
-- ----------------------------
INSERT INTO `beauty_account` VALUES ('1', '9', '郑州', '1', '1480489113', '3116.00');
INSERT INTO `beauty_account` VALUES ('2', '34', '22', '1', '1480665499', '55166.00');
INSERT INTO `beauty_account` VALUES ('4', '35', 'xz', '1', '1480665636', '5697.00');
INSERT INTO `beauty_account` VALUES ('5', '8', '123123', '1', '1480663850', '7290.00');
INSERT INTO `beauty_account` VALUES ('6', '45', '5644545654', '1', '1480592967', '99822.00');
INSERT INTO `beauty_account` VALUES ('7', '6', 'huyua ', '1', '1480594813', '10002.00');

-- ----------------------------
-- Table structure for `beauty_account_cash`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_account_cash`;
CREATE TABLE `beauty_account_cash` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `cashtime` int(11) NOT NULL,
  `cashmoney` float(20,2) NOT NULL,
  `cashsum` float(20,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_account_cash
-- ----------------------------
INSERT INTO `beauty_account_cash` VALUES ('1', '9', '1478744158', '245.00', '245.00');
INSERT INTO `beauty_account_cash` VALUES ('2', '9', '1478751274', '518.00', '763.00');
INSERT INTO `beauty_account_cash` VALUES ('3', '9', '1478751582', '1000.00', '1763.00');
INSERT INTO `beauty_account_cash` VALUES ('4', '9', '1478753370', '1000.00', '2763.00');
INSERT INTO `beauty_account_cash` VALUES ('5', '34', '1478756259', '1000.00', '1000.00');
INSERT INTO `beauty_account_cash` VALUES ('6', '34', '1478756326', '1000.00', '2000.00');
INSERT INTO `beauty_account_cash` VALUES ('7', '34', '1478761262', '514.00', '2514.00');
INSERT INTO `beauty_account_cash` VALUES ('8', '34', '1479467869', '1000.00', '3514.00');
INSERT INTO `beauty_account_cash` VALUES ('9', '34', '1480153625', '5000.00', '8514.00');
INSERT INTO `beauty_account_cash` VALUES ('10', '34', '1480592702', '1000.00', '9514.00');
INSERT INTO `beauty_account_cash` VALUES ('11', '34', '1480665499', '1000.00', '10514.00');

-- ----------------------------
-- Table structure for `beauty_account_recharge`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_account_recharge`;
CREATE TABLE `beauty_account_recharge` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `rechargetime` int(11) NOT NULL,
  `rechargemoney` float(20,2) NOT NULL,
  `rechargesum` float(20,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_account_recharge
-- ----------------------------
INSERT INTO `beauty_account_recharge` VALUES ('1', '9', '1478673451', '10000.00', '10000.00');
INSERT INTO `beauty_account_recharge` VALUES ('2', '9', '1478673585', '10000.00', '20000.00');
INSERT INTO `beauty_account_recharge` VALUES ('3', '34', '1478756217', '10000.00', '10000.00');
INSERT INTO `beauty_account_recharge` VALUES ('4', '34', '1478835786', '10000.00', '20000.00');
INSERT INTO `beauty_account_recharge` VALUES ('5', '34', '1478835839', '20000.00', '40000.00');
INSERT INTO `beauty_account_recharge` VALUES ('6', '34', '1478836120', '20000.00', '60000.00');
INSERT INTO `beauty_account_recharge` VALUES ('7', '34', '1478859732', '50000.00', '110000.00');
INSERT INTO `beauty_account_recharge` VALUES ('34', '34', '1479461566', '500.00', '110500.00');
INSERT INTO `beauty_account_recharge` VALUES ('35', '34', '1479467459', '500.00', '111000.00');
INSERT INTO `beauty_account_recharge` VALUES ('36', '35', '1480051672', '10000.00', '10000.00');
INSERT INTO `beauty_account_recharge` VALUES ('37', '34', '1480324843', '10000.00', '121000.00');
INSERT INTO `beauty_account_recharge` VALUES ('38', '34', '1480592013', '1000.00', '122000.00');
INSERT INTO `beauty_account_recharge` VALUES ('39', '8', '1480592265', '10000.00', '10000.00');
INSERT INTO `beauty_account_recharge` VALUES ('40', '45', '1480592949', '100000.00', '100000.00');
INSERT INTO `beauty_account_recharge` VALUES ('41', '6', '1480594809', '10000.00', '10000.00');
INSERT INTO `beauty_account_recharge` VALUES ('42', '6', '1480594789', '111.00', '10111.00');
INSERT INTO `beauty_account_recharge` VALUES ('43', '34', '1480665466', '1000.00', '123000.00');

-- ----------------------------
-- Table structure for `beauty_account_trade`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_account_trade`;
CREATE TABLE `beauty_account_trade` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `tradetime` int(11) NOT NULL,
  `trademoney` float(20,2) NOT NULL,
  `tradesum` float(20,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_account_trade
-- ----------------------------
INSERT INTO `beauty_account_trade` VALUES ('1', '9', '1478741226', '1015.00', '1015.00');
INSERT INTO `beauty_account_trade` VALUES ('2', '9', '1478742082', '1740.00', '2755.00');
INSERT INTO `beauty_account_trade` VALUES ('26', '9', '1478747363', '1690.00', '4445.00');
INSERT INTO `beauty_account_trade` VALUES ('27', '9', '1478747372', '1690.00', '6135.00');
INSERT INTO `beauty_account_trade` VALUES ('28', '9', '1478747373', '1690.00', '7825.00');
INSERT INTO `beauty_account_trade` VALUES ('29', '9', '1478747373', '1690.00', '9515.00');
INSERT INTO `beauty_account_trade` VALUES ('30', '9', '1478747373', '1690.00', '11205.00');
INSERT INTO `beauty_account_trade` VALUES ('31', '9', '1478747392', '1690.00', '12895.00');
INSERT INTO `beauty_account_trade` VALUES ('33', '9', '1478748368', '342.00', '13237.00');
INSERT INTO `beauty_account_trade` VALUES ('34', '34', '1478759220', '2025.00', '2025.00');
INSERT INTO `beauty_account_trade` VALUES ('35', '34', '1478759352', '282.00', '2307.00');
INSERT INTO `beauty_account_trade` VALUES ('36', '34', '1478760708', '179.00', '2486.00');
INSERT INTO `beauty_account_trade` VALUES ('37', '34', '1478835309', '3220.00', '5706.00');
INSERT INTO `beauty_account_trade` VALUES ('38', '34', '1478835653', '1560.00', '7266.00');
INSERT INTO `beauty_account_trade` VALUES ('39', '9', '1478835474', '312.00', '13549.00');
INSERT INTO `beauty_account_trade` VALUES ('40', '34', '1478835889', '16500.00', '23766.00');
INSERT INTO `beauty_account_trade` VALUES ('41', '34', '1478835986', '5800.00', '29566.00');
INSERT INTO `beauty_account_trade` VALUES ('42', '34', '1478836136', '11100.00', '40666.00');
INSERT INTO `beauty_account_trade` VALUES ('43', '34', '1478845310', '3450.00', '44116.00');
INSERT INTO `beauty_account_trade` VALUES ('44', '34', '1478845574', '6900.00', '51016.00');
INSERT INTO `beauty_account_trade` VALUES ('45', '34', '1478846447', '4950.00', '55966.00');
INSERT INTO `beauty_account_trade` VALUES ('46', '34', '1478859754', '643.00', '56609.00');
INSERT INTO `beauty_account_trade` VALUES ('47', '34', '1478859923', '45.00', '56654.00');
INSERT INTO `beauty_account_trade` VALUES ('48', '9', '1478859856', '40.00', '13589.00');
INSERT INTO `beauty_account_trade` VALUES ('49', '34', '1478921930', '36.00', '56690.00');
INSERT INTO `beauty_account_trade` VALUES ('50', '34', '1478923453', '36.00', '56726.00');
INSERT INTO `beauty_account_trade` VALUES ('51', '34', '1478924945', '208.00', '56934.00');
INSERT INTO `beauty_account_trade` VALUES ('52', '34', '1478925323', '159.00', '57093.00');
INSERT INTO `beauty_account_trade` VALUES ('62', '9', '1479883080', '443.00', '14032.00');
INSERT INTO `beauty_account_trade` VALUES ('64', '35', '1480051685', '580.00', '580.00');
INSERT INTO `beauty_account_trade` VALUES ('65', '35', '1480052208', '263.00', '843.00');
INSERT INTO `beauty_account_trade` VALUES ('67', '35', '1480054803', '79.00', '922.00');
INSERT INTO `beauty_account_trade` VALUES ('68', '35', '1480055641', '79.00', '1001.00');
INSERT INTO `beauty_account_trade` VALUES ('69', '35', '1480055680', '89.00', '1090.00');
INSERT INTO `beauty_account_trade` VALUES ('70', '35', '1480056809', '259.00', '1349.00');
INSERT INTO `beauty_account_trade` VALUES ('71', '35', '1480057405', '168.00', '1517.00');
INSERT INTO `beauty_account_trade` VALUES ('72', '35', '1480128146', '40.00', '1557.00');
INSERT INTO `beauty_account_trade` VALUES ('73', '35', '1480128237', '79.00', '1636.00');
INSERT INTO `beauty_account_trade` VALUES ('74', '35', '1480129474', '31.00', '1667.00');
INSERT INTO `beauty_account_trade` VALUES ('77', '34', '1480295892', '79.00', '57172.00');
INSERT INTO `beauty_account_trade` VALUES ('79', '35', '1480324284', '49.00', '1716.00');
INSERT INTO `beauty_account_trade` VALUES ('81', '35', '1480394523', '67.00', '1783.00');
INSERT INTO `beauty_account_trade` VALUES ('82', '35', '1480394563', '291.00', '2074.00');
INSERT INTO `beauty_account_trade` VALUES ('83', '35', '1480394563', '291.00', '2365.00');
INSERT INTO `beauty_account_trade` VALUES ('84', '35', '1480394903', '435.00', '2800.00');
INSERT INTO `beauty_account_trade` VALUES ('86', '35', '1480482148', '59.00', '2859.00');
INSERT INTO `beauty_account_trade` VALUES ('87', '35', '1480482305', '89.00', '2948.00');
INSERT INTO `beauty_account_trade` VALUES ('88', '9', '1480489113', '89.00', '14121.00');
INSERT INTO `beauty_account_trade` VALUES ('124', '35', '1480580499', '79.00', '3027.00');
INSERT INTO `beauty_account_trade` VALUES ('125', '35', '1480582065', '79.00', '3106.00');
INSERT INTO `beauty_account_trade` VALUES ('131', '35', '1480590869', '312.00', '3418.00');
INSERT INTO `beauty_account_trade` VALUES ('132', '35', '1480590906', '99.00', '3517.00');
INSERT INTO `beauty_account_trade` VALUES ('133', '35', '1480590942', '79.00', '3596.00');
INSERT INTO `beauty_account_trade` VALUES ('134', '35', '1480590967', '222.00', '3818.00');
INSERT INTO `beauty_account_trade` VALUES ('138', '35', '1480591095', '99.00', '3917.00');
INSERT INTO `beauty_account_trade` VALUES ('139', '35', '1480591998', '347.00', '4264.00');
INSERT INTO `beauty_account_trade` VALUES ('140', '8', '1480592271', '368.00', '368.00');
INSERT INTO `beauty_account_trade` VALUES ('141', '8', '1480592366', '159.00', '527.00');
INSERT INTO `beauty_account_trade` VALUES ('142', '34', '1480593103', '99.00', '57271.00');
INSERT INTO `beauty_account_trade` VALUES ('143', '45', '1480592967', '178.00', '178.00');
INSERT INTO `beauty_account_trade` VALUES ('144', '34', '1480593707', '49.00', '57320.00');
INSERT INTO `beauty_account_trade` VALUES ('145', '8', '1480593865', '79.00', '606.00');
INSERT INTO `beauty_account_trade` VALUES ('146', '6', '1480594813', '109.00', '109.00');
INSERT INTO `beauty_account_trade` VALUES ('147', '8', '1480639852', '79.00', '685.00');
INSERT INTO `beauty_account_trade` VALUES ('148', '8', '1480639968', '368.00', '1053.00');
INSERT INTO `beauty_account_trade` VALUES ('149', '8', '1480663651', '313.00', '1366.00');
INSERT INTO `beauty_account_trade` VALUES ('150', '8', '1480663697', '439.00', '1805.00');
INSERT INTO `beauty_account_trade` VALUES ('151', '8', '1480663760', '169.00', '1974.00');
INSERT INTO `beauty_account_trade` VALUES ('152', '8', '1480663850', '736.00', '2710.00');
INSERT INTO `beauty_account_trade` VALUES ('153', '35', '1480665636', '39.00', '4303.00');

-- ----------------------------
-- Table structure for `beauty_activity`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_activity`;
CREATE TABLE `beauty_activity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aname` varchar(255) DEFAULT NULL COMMENT '活动名称',
  `starttime` varchar(255) DEFAULT NULL,
  `stoptime` varchar(255) DEFAULT NULL,
  `rules` varchar(255) DEFAULT NULL COMMENT '积分：10个积分是1元；促销是打几折',
  `bid` int(10) DEFAULT NULL COMMENT '参加活动的id号',
  `astatus` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '1是活动正在进行 0是活动结束',
  `addtime` varchar(255) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_activity
-- ----------------------------
INSERT INTO `beauty_activity` VALUES ('2', '限时团购', '1477497600', '1482940800', '团购减20', '3', '1', '1477550841');
INSERT INTO `beauty_activity` VALUES ('15', '限时特卖', '1479312000', '1482076800', '满299减100', '2', '1', '1478317758');
INSERT INTO `beauty_activity` VALUES ('16', '限时特卖', '1478448000', '1480867200', '满388减100', '16', '1', '1480563904');

-- ----------------------------
-- Table structure for `beauty_addresses`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_addresses`;
CREATE TABLE `beauty_addresses` (
  `id` mediumint(32) unsigned NOT NULL AUTO_INCREMENT,
  `mid` varchar(20) DEFAULT NULL,
  `area` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `address` varchar(80) NOT NULL,
  `telephone` varchar(15) DEFAULT '' COMMENT '电话号码',
  `mobile` varchar(15) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `ecode` varchar(20) DEFAULT '000000' COMMENT '邮编默认为000000',
  `addtime` int(32) NOT NULL,
  `isdefault` tinyint(1) DEFAULT '0' COMMENT '1代表默认地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_addresses
-- ----------------------------
INSERT INTO `beauty_addresses` VALUES ('1', '35', '河南省开封市顺河回族区', '佳琳', '薛店镇', '', '15560138662', '', '', '1478770504', '0');
INSERT INTO `beauty_addresses` VALUES ('7', '34', '河南省-开封市-市辖区', 'zz', '郑州', '', 'zz', '', '', '1478920922', '0');
INSERT INTO `beauty_addresses` VALUES ('8', '34', '青海省-果洛自治州-市辖区', 'admin', 'zz', '', 'zz', '', '', '1478920941', '0');
INSERT INTO `beauty_addresses` VALUES ('27', '38', '河南省-周口市-郸城县', '13213', '1321123', '3214342432', '18736199128', '21311', '1321321', '1479452096', '0');
INSERT INTO `beauty_addresses` VALUES ('29', '5', '河南省-信阳市-罗山县', '123123', '123132', '1234134', '18736199128', '231', '3213', '1479792767', '0');
INSERT INTO `beauty_addresses` VALUES ('32', '8', '河南省鹤壁市浚县', '沈燕燕', '吕谭乡123214', '', '18303873562', '', '', '1479874056', '0');
INSERT INTO `beauty_addresses` VALUES ('33', '9', '河南省-开封市-市辖区', '邵总', '东京大道', '125615', '15737893350', '21356@qq.com', '23121', '1479882658', '0');
INSERT INTO `beauty_addresses` VALUES ('36', '35', '安徽省-芜湖市-芜湖县', 'sdsad', 'sadas', '', '13849573110', 'sad@163.com', '000000', '1480129661', '0');
INSERT INTO `beauty_addresses` VALUES ('40', '35', '青海省-海南自治州-市辖区', 'wangsaipu', 'sadndjksanfasdf', '5281128', '17720161202', '12@.a.com', '000000', '1480573013', '0');
INSERT INTO `beauty_addresses` VALUES ('43', '11', '北京市-北京市-密云县', '宋海', '北京市-北京市-密云县', '', '15688774241', '', '', '1480590569', '0');
INSERT INTO `beauty_addresses` VALUES ('44', '45', '河南省-焦作市-武陟县', '邵增辉', '武陟县嘉应观乡辛庄8组8号', '', '15737893350', '914732587@qq.com', '454950', '1480592788', '0');
INSERT INTO `beauty_addresses` VALUES ('45', '8', '新疆区-博尔塔拉州-博乐市', '周贝贝', '12312321432', '', '18739794296', '', '', '1480663590', '1');
INSERT INTO `beauty_addresses` VALUES ('46', '6', '河南省-郑州市-二七区', 'zhoubeibdei', '21312341243e213', '', '18739794296', null, '000000', '1480664743', '1');

-- ----------------------------
-- Table structure for `beauty_admin`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_admin`;
CREATE TABLE `beauty_admin` (
  `id` tinyint(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `permissions` tinyint(4) DEFAULT '2' COMMENT '1为超级管理员，2为普通管理员',
  `status` tinyint(2) DEFAULT '1' COMMENT '1为激活状态，0为停权状态',
  `online` tinyint(4) DEFAULT '0' COMMENT '在线为1，不在线为0',
  `addtime` int(11) NOT NULL,
  `edittime` int(11) NOT NULL,
  `lastlogin` int(11) DEFAULT NULL,
  `lastip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_admin
-- ----------------------------
INSERT INTO `beauty_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'b968243ba3623fc2477099988072a063', '1', '1', '1', '1476850000', '1480235837', '1481004056', '127.0.0.1');
INSERT INTO `beauty_admin` VALUES ('2', 'totti', 'b644d4a60aceb4d8f5483476cc305669', 'b968243ba3623fc2477099988072a063', '2', '1', '1', '1477550960', '1480503014', '1480665397', '192.168.4.55');
INSERT INTO `beauty_admin` VALUES ('3', 'dawang', '13b08f4e45e27f23a078a9683b0bc38b', '13b08f4e45e27f23a078a9683b0bc38b', '2', '1', '1', '1477551046', '1480296185', '1480665691', '192.168.4.55');
INSERT INTO `beauty_admin` VALUES ('4', 'baiwenfei', '155f337f34e0482b1987a8806e310c44', '155f337f34e0482b1987a8806e310c44', '2', '1', '0', '1477551176', '1480296200', '1480665018', '192.168.4.55');
INSERT INTO `beauty_admin` VALUES ('5', 'songhao', 'd5378260ff8bdae7482cd41f4dc55bc7', 'd5378260ff8bdae7482cd41f4dc55bc7', '2', '1', '0', '1477551229', '1480150092', '1480470532', '127.0.0.1');
INSERT INTO `beauty_admin` VALUES ('6', 'beibei', 'e10adc3949ba59abbe56e057f20f883e', '46d294deab9987e94ced5c0f7b478f5d', '1', '1', '0', '1478325390', '1480484919', '1480664407', '192.168.4.55');
INSERT INTO `beauty_admin` VALUES ('7', 'yanyan', '7219b9b60d9d70a9a7014369d88ebefe', '7219b9b60d9d70a9a7014369d88ebefe', '1', '1', '1', '1478325423', '1480571588', '1480662318', '192.168.4.55');
INSERT INTO `beauty_admin` VALUES ('8', 'admin1', '21232f297a57a5a743894a0e4a801fc3', 'b968243ba3623fc2477099988072a063', '1', '1', '1', '1479214542', '1479298892', '1480507136', '127.0.0.1');
INSERT INTO `beauty_admin` VALUES ('9', 'admin2', '21232f297a57a5a743894a0e4a801fc3', 'b968243ba3623fc2477099988072a063', '1', '1', '0', '1477551186', '1479298911', '1479258141', '127.0.0.1');
INSERT INTO `beauty_admin` VALUES ('10', 'admin3', '21232f297a57a5a743894a0e4a801fc3', 'b968243ba3623fc247709998', '1', '1', '0', '1477551186', '1479298911', null, null);
INSERT INTO `beauty_admin` VALUES ('11', 'admin4', '21232f297a57a5a743894a0e4a801fc3', 'b968243ba3623fc2477099988072a063', '1', '1', '0', '1480149727', '1480149727', null, null);
INSERT INTO `beauty_admin` VALUES ('12', 'admin5', '21232f297a57a5a743894a0e4a801fc3', 'b968243ba3623fc2477099988072a063', '1', '1', '0', '1480149755', '1480149755', '1480665212', '192.168.4.55');

-- ----------------------------
-- Table structure for `beauty_admin_nav`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_admin_nav`;
CREATE TABLE `beauty_admin_nav` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `navname` varchar(30) NOT NULL,
  `navurl` varchar(120) DEFAULT NULL,
  `pid` tinyint(3) unsigned DEFAULT '0',
  `path` varchar(100) DEFAULT NULL,
  `priority` smallint(5) unsigned NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_admin_nav
-- ----------------------------
INSERT INTO `beauty_admin_nav` VALUES ('1', '后台首页', 'Admin/Index/main', '0', '1', '0');
INSERT INTO `beauty_admin_nav` VALUES ('2', '系统管理', 'Admin/Nav/System', '0', '2', '50');
INSERT INTO `beauty_admin_nav` VALUES ('3', '权限管理', 'Admin/Nav/Auth', '0', '3', '100');
INSERT INTO `beauty_admin_nav` VALUES ('4', '品牌管理', 'Admin/Nav/Brand', '0', '4', '200');
INSERT INTO `beauty_admin_nav` VALUES ('5', '分类管理', 'Admin/Nav/Category', '0', '5', '300');
INSERT INTO `beauty_admin_nav` VALUES ('6', '商品管理', 'Admin/Nav/Goods', '0', '6', '400');
INSERT INTO `beauty_admin_nav` VALUES ('7', '会员管理', 'Admin/Nav/User', '0', '7', '500');
INSERT INTO `beauty_admin_nav` VALUES ('8', '订单管理', 'Admin/Nav/Order', '0', '8', '600');
INSERT INTO `beauty_admin_nav` VALUES ('9', '广告管理', 'Admin/Nav/Advertise', '0', '9', '700');
INSERT INTO `beauty_admin_nav` VALUES ('10', '活动发布', 'Admin/Nav/Sale', '0', '10', '800');
INSERT INTO `beauty_admin_nav` VALUES ('11', '评论管理', 'Admin/Nav/Comment', '0', '11', '900');
INSERT INTO `beauty_admin_nav` VALUES ('12', '反馈管理', 'Admin/Nav/Feedback', '0', '12', '1000');
INSERT INTO `beauty_admin_nav` VALUES ('13', '菜单列表', 'Admin/AdminNav/index', '2', '2,13', '51');
INSERT INTO `beauty_admin_nav` VALUES ('14', '添加菜单', 'Admin/AdminNav/add', '2', '2,14', '52');
INSERT INTO `beauty_admin_nav` VALUES ('15', '管理员列表', 'Admin/Admin/index', '3', '3,15', '110');
INSERT INTO `beauty_admin_nav` VALUES ('16', '添加管理员', 'Admin/Admin/add', '3', '3,16', '120');
INSERT INTO `beauty_admin_nav` VALUES ('17', '个人信息修改', 'Admin/Admin/changeInfo', '48', '48,17', '81');
INSERT INTO `beauty_admin_nav` VALUES ('18', '管理组列表', 'Admin/AuthGroup/index', '3', '3,18', '140');
INSERT INTO `beauty_admin_nav` VALUES ('19', '添加管理组', 'Admin/AuthGroup/add', '3', '3,19', '150');
INSERT INTO `beauty_admin_nav` VALUES ('20', '权限列表', 'Admin/AuthRule/index', '3', '3,20', '160');
INSERT INTO `beauty_admin_nav` VALUES ('21', '添加权限', 'Admin/AuthRule/add', '3', '3,21', '170');
INSERT INTO `beauty_admin_nav` VALUES ('22', '品牌列表', 'Admin/Brand/index', '4', '4,22', '201');
INSERT INTO `beauty_admin_nav` VALUES ('23', '添加品牌', 'Admin/AddBrand/add', '4', '4,23', '202');
INSERT INTO `beauty_admin_nav` VALUES ('24', '分类列表', 'Admin/Category/index', '5', '5,24', '301');
INSERT INTO `beauty_admin_nav` VALUES ('25', '添加分类', 'Admin/Category/add', '5', '5,25', '302');
INSERT INTO `beauty_admin_nav` VALUES ('26', '商品列表', 'Admin/Goods/index', '6', '6,26', '401');
INSERT INTO `beauty_admin_nav` VALUES ('27', '添加商品', 'Admin/Goods/addAct', '6', '6,27', '402');
INSERT INTO `beauty_admin_nav` VALUES ('28', '会员列表', 'Admin/User/UserList', '7', '7,28', '501');
INSERT INTO `beauty_admin_nav` VALUES ('29', '订单列表', 'Admin/Order/index', '8', '8,29', '601');
INSERT INTO `beauty_admin_nav` VALUES ('30', '待付款订单', 'Admin/Order/dfk', '8', '8,30', '602');
INSERT INTO `beauty_admin_nav` VALUES ('31', '待发货订单', 'Admin/Order/dfh', '8', '8,31', '603');
INSERT INTO `beauty_admin_nav` VALUES ('32', '已发货订单', 'Admin/Order/yfh', '8', '8,32', '604');
INSERT INTO `beauty_admin_nav` VALUES ('33', '已收货订单', 'Admin/Order/ysh', '8', '8,33', '605');
INSERT INTO `beauty_admin_nav` VALUES ('34', '广告列表', 'Admin/Advertise/index', '9', '9,34', '701');
INSERT INTO `beauty_admin_nav` VALUES ('35', '添加广告', 'Admin/Advertise/add', '9', '9,35', '702');
INSERT INTO `beauty_admin_nav` VALUES ('36', '活动列表', 'Admin/Sale/index', '10', '10,36', '801');
INSERT INTO `beauty_admin_nav` VALUES ('37', '添加活动', 'Admin/Sale/add', '10', '10,37', '802');
INSERT INTO `beauty_admin_nav` VALUES ('38', '评论列表', 'Admin/Comment/index', '11', '11,38', '901');
INSERT INTO `beauty_admin_nav` VALUES ('39', '反馈列表', 'Admin/Feedback/index', '12', '12,39', '1001');
INSERT INTO `beauty_admin_nav` VALUES ('45', '金币管理', 'Admin/Nav/Golds', '0', '45', '1100');
INSERT INTO `beauty_admin_nav` VALUES ('46', '金币商品列表', 'Admin/Golds/index', '45', '45,46', '1101');
INSERT INTO `beauty_admin_nav` VALUES ('47', '添加金币商品', 'Admin/Golds/addAct', '45', '45,47', '1102');
INSERT INTO `beauty_admin_nav` VALUES ('48', '信息管理', 'Admin/Nav/Message', '0', '48', '80');
INSERT INTO `beauty_admin_nav` VALUES ('49', '我的站内信', 'Admin/Message/index', '48', '48,49', '82');
INSERT INTO `beauty_admin_nav` VALUES ('50', '发送站内信', 'Admin/Message/sendMessage', '48', '48,50', '83');
INSERT INTO `beauty_admin_nav` VALUES ('51', '发送站内信', 'Admin/User/sendUserMessage', '7', '7,51', '502');
INSERT INTO `beauty_admin_nav` VALUES ('52', '已回复列表', 'Admin/Comment/yiresponse', '11', '11,52', '902');
INSERT INTO `beauty_admin_nav` VALUES ('53', '未回复列表', 'Admin/Comment/weiresponse', '11', '11,53', '903');
INSERT INTO `beauty_admin_nav` VALUES ('54', '已评价订单', 'Admin/Order/ypj', '8', '8,54', '606');
INSERT INTO `beauty_admin_nav` VALUES ('55', '底部管理', 'Admin/Nav/Footer', '0', '55', '1200');
INSERT INTO `beauty_admin_nav` VALUES ('56', '底部列表', 'Admin/Foote/index', '55', '55,56', '1201');
INSERT INTO `beauty_admin_nav` VALUES ('57', '添加底部', 'Admin/Foote/add', '55', '55,57', '1202');
INSERT INTO `beauty_admin_nav` VALUES ('58', '微信管理', 'Admin/Nav/WeiXin', '0', '58', '1300');
INSERT INTO `beauty_admin_nav` VALUES ('59', '微信菜单', 'Admin/WeiXin/createMenu', '58', '58,59', '1301');

-- ----------------------------
-- Table structure for `beauty_advertise`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_advertise`;
CREATE TABLE `beauty_advertise` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `position` int(2) NOT NULL DEFAULT '6' COMMENT '1为轮播广告,2为一楼广告,3为二楼广告,4为三楼广告,5为手机广告,6为其他广告',
  `status` tinyint(3) unsigned DEFAULT '1' COMMENT '0为下架，1为展示',
  `addtime` varchar(30) DEFAULT NULL,
  `detail` varchar(60) NOT NULL DEFAULT '',
  `picurl` varchar(50) DEFAULT NULL COMMENT '图片路径',
  `picname` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_advertise
-- ----------------------------
INSERT INTO `beauty_advertise` VALUES ('1', '欧莱凯脸部保湿油', '1', '1', '1478573108', '欧莱凯，来自韩国的护理专家', '2016-11-03/', '581ad06f564ab.png');
INSERT INTO `beauty_advertise` VALUES ('2', '补水保湿套装', '1', '0', '1478152446', '补水保湿舒缓养肤', '2016-11-03/', '581ad0ff11a81.png');
INSERT INTO `beauty_advertise` VALUES ('3', '海泉护眼套装', '1', '0', '1478572610', '超精华护眼液，深补水深滋养', '2016-11-03/', '581ad18b9dc17.png');
INSERT INTO `beauty_advertise` VALUES ('4', '靓肤气垫水', '1', '0', '1478572533', '气垫水，亮肤遮瑕', '2016-11-03/', '581ad20658b2c.png');
INSERT INTO `beauty_advertise` VALUES ('5', '素颜霜', '1', '0', '1478152767', '懒人素颜霜，提亮好气色', '2016-11-03/', '581ad23f8cba0.png');
INSERT INTO `beauty_advertise` VALUES ('6', '相宜本草补水套装', '1', '0', '1478152870', '打造精致柔光肌', '2016-11-03/', '581ad2a7032da.png');
INSERT INTO `beauty_advertise` VALUES ('7', '弹嫩洗颜霜', '2', '0', '1478153021', '新品上市，面部3D立体科技', '2016-11-03/', '581ad33d826b7.png');
INSERT INTO `beauty_advertise` VALUES ('8', '喜马拉雅面膜', '2', '1', '1478153096', '新品上市，补水保湿面膜', '2016-11-03/', '581ad388cebe1.png');
INSERT INTO `beauty_advertise` VALUES ('9', '自然堂面部补水套装', '2', '1', '1478153297', '凝时休眠科技', '2016-11-03/', '581ad451638a2.png');
INSERT INTO `beauty_advertise` VALUES ('10', '雪润隔离霜', '3', '0', '1478153374', '隔离防晒，妆前养护', '2016-11-03/', '581ad49f08eba.png');
INSERT INTO `beauty_advertise` VALUES ('11', '自然堂洁面乳', '2', '0', '1478153441', '活泉精华补水', '2016-11-03/', '581ad4e17e81f.png');
INSERT INTO `beauty_advertise` VALUES ('12', '冰川保湿水', '3', '1', '1478153528', '来自冰川的保湿精华', '2016-11-03/', '581ad5382c197.png');
INSERT INTO `beauty_advertise` VALUES ('13', '相宜本草套装', '3', '1', '1478153586', '经典套装', '2016-11-03/', '581ad5722fe14.png');
INSERT INTO `beauty_advertise` VALUES ('14', '轻透无暇修颜霜', '3', '0', '1478153702', '轻薄裸妆，多效合一', '2016-11-03/', '581ad5e6c1373.png');
INSERT INTO `beauty_advertise` VALUES ('15', '冰希黎香水', '4', '1', '1478418590', '持久淡香，细腻浪漫', '2016-11-06/', '581ee09e960d0.png');
INSERT INTO `beauty_advertise` VALUES ('16', '迪卡香水', '4', '0', '1478833955', '迪卡香水', '2016-11-11/', '582537233577a.png');
INSERT INTO `beauty_advertise` VALUES ('18', '轮播', '1', '1', '1479471590', '这是轮播广告', '2016-11-18/', '582ef1e6bac01.png');
INSERT INTO `beauty_advertise` VALUES ('19', '轮播', '1', '1', '1479471617', '轮播广告', '2016-11-18/', '582ef201220ad.png');
INSERT INTO `beauty_advertise` VALUES ('20', '轮播', '1', '1', '1479471684', '这是轮播广告', '2016-11-18/', '582ef2444f2b8.png');
INSERT INTO `beauty_advertise` VALUES ('21', '轮播', '1', '1', '1479471994', '这是轮播广告', '2016-11-18/', '582ef26923fba.jpg');
INSERT INTO `beauty_advertise` VALUES ('23', '轮播', '1', '1', '1479472157', '这是轮播广告', '2016-11-18/', '582ef41dee5f4.jpg');
INSERT INTO `beauty_advertise` VALUES ('24', '香水', '2', '1', '1480236590', '香水', '2016-11-27/', '583a9e2e7b0dd.png');
INSERT INTO `beauty_advertise` VALUES ('25', '美肤', '2', '1', '1480236968', '美肤', '2016-11-27/', '583a9fa8b48a7.png');
INSERT INTO `beauty_advertise` VALUES ('26', '香水彩妆', '4', '1', '1480237284', '香水彩妆', '2016-11-27/', '583aa0e4d8c08.png');
INSERT INTO `beauty_advertise` VALUES ('27', '顶部广告', '5', '1', '1480563880', '顶部广告', '2016-11-30/', '583ec1ab5f2f2.png');
INSERT INTO `beauty_advertise` VALUES ('28', '顶部广告', '5', '1', '1480563855', '顶部广告', '2016-11-30/', '583ec2397f32c.jpg');
INSERT INTO `beauty_advertise` VALUES ('29', '中间广告', '5', '1', '1480563946', '中间广告', '2016-12-01/', '583f9ceb03354.png');
INSERT INTO `beauty_advertise` VALUES ('30', '中间广告', '5', '1', '1480563969', '中间广告', '2016-12-01/', '583f9d01e89ca.jpg');
INSERT INTO `beauty_advertise` VALUES ('31', '底部广告', '5', '1', '1480564021', '底部广告', '2016-12-01/', '583f9d359287c.jpg');

-- ----------------------------
-- Table structure for `beauty_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_auth_group`;
CREATE TABLE `beauty_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(4) DEFAULT '1',
  `rules` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='用户组表';

-- ----------------------------
-- Records of beauty_auth_group
-- ----------------------------
INSERT INTO `beauty_auth_group` VALUES ('1', '超级管理员', '1', '1,41,40,42,43,44,2,13,14,3,15,16,18,20,21,19,4,22,23,5,24,25,6,26,27,7,28,51,9,34,35,8,29,30,31,32,33,54,10,36,37,11,38,52,53,45,46,47,12,39,48,17,49,50,55,56,57,58,59');
INSERT INTO `beauty_auth_group` VALUES ('2', '品牌管理员', '1', '1,41,40,42,43,44,4,22,23,48,17,49,50');
INSERT INTO `beauty_auth_group` VALUES ('3', '商品管理员', '1', '1,41,40,42,43,44,6,26,27,11,38,52,53,481,482,483');
INSERT INTO `beauty_auth_group` VALUES ('4', '订单管理员', '1', '1,41,40,42,43,44,8,29,30,31,32,33,54,48,17,49,50');
INSERT INTO `beauty_auth_group` VALUES ('5', '广告管理员', '1', '1,41,40,42,43,44,9,34,35,484,488,48,17,49,50');
INSERT INTO `beauty_auth_group` VALUES ('6', '活动管理员', '1', '1,41,40,42,43,44,10,36,37,48,17,49,50');
INSERT INTO `beauty_auth_group` VALUES ('7', '评论管理员', '1', '1,41,40,42,43,44,11,38,52,53,48,17,49,50');
INSERT INTO `beauty_auth_group` VALUES ('8', '反馈管理员', '1', '1,41,40,42,43,44,12,39,48,17,49,50');
INSERT INTO `beauty_auth_group` VALUES ('10', '分类管理员', '1', '1,41,40,42,43,44,5,24,25,48,17,49,50');
INSERT INTO `beauty_auth_group` VALUES ('11', '会员管理员', '1', '1,41,40,42,43,44,7,28,51,48,17,49,50');
INSERT INTO `beauty_auth_group` VALUES ('12', '金币管理员', '1', '1,41,40,42,43,44,45,46,47,48,17,49,50');
INSERT INTO `beauty_auth_group` VALUES ('13', '底部管理员', '1', '1,41,40,42,43,44,55,56,57');

-- ----------------------------
-- Table structure for `beauty_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_auth_group_access`;
CREATE TABLE `beauty_auth_group_access` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL COMMENT '用户id',
  `group_id` mediumint(8) unsigned NOT NULL COMMENT '用户组id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=209 DEFAULT CHARSET=utf8 COMMENT='用户组明细表';

-- ----------------------------
-- Records of beauty_auth_group_access
-- ----------------------------
INSERT INTO `beauty_auth_group_access` VALUES ('206', '2', '5');
INSERT INTO `beauty_auth_group_access` VALUES ('166', '4', '2');
INSERT INTO `beauty_auth_group_access` VALUES ('144', '5', '10');
INSERT INTO `beauty_auth_group_access` VALUES ('195', '9', '1');
INSERT INTO `beauty_auth_group_access` VALUES ('167', '4', '11');
INSERT INTO `beauty_auth_group_access` VALUES ('207', '7', '5');
INSERT INTO `beauty_auth_group_access` VALUES ('165', '3', '4');
INSERT INTO `beauty_auth_group_access` VALUES ('200', '2', '11');
INSERT INTO `beauty_auth_group_access` VALUES ('186', '6', '13');
INSERT INTO `beauty_auth_group_access` VALUES ('185', '6', '7');
INSERT INTO `beauty_auth_group_access` VALUES ('197', '11', '1');
INSERT INTO `beauty_auth_group_access` VALUES ('194', '8', '1');
INSERT INTO `beauty_auth_group_access` VALUES ('192', '1', '1');
INSERT INTO `beauty_auth_group_access` VALUES ('184', '6', '3');
INSERT INTO `beauty_auth_group_access` VALUES ('205', '7', '12');
INSERT INTO `beauty_auth_group_access` VALUES ('204', '7', '10');
INSERT INTO `beauty_auth_group_access` VALUES ('203', '7', '8');
INSERT INTO `beauty_auth_group_access` VALUES ('202', '7', '6');
INSERT INTO `beauty_auth_group_access` VALUES ('198', '12', '1');
INSERT INTO `beauty_auth_group_access` VALUES ('196', '10', '1');
INSERT INTO `beauty_auth_group_access` VALUES ('208', '10', '5');

-- ----------------------------
-- Table structure for `beauty_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_auth_rule`;
CREATE TABLE `beauty_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '' COMMENT '规则表达式，为空表示存在就验证，不为空表示按照条件验证',
  `pid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=491 DEFAULT CHARSET=utf8 COMMENT='规则表';

-- ----------------------------
-- Records of beauty_auth_rule
-- ----------------------------
INSERT INTO `beauty_auth_rule` VALUES ('1', 'Admin/Index/index', '后台首页', '1', '1', '', '0', '1');
INSERT INTO `beauty_auth_rule` VALUES ('2', 'Admin/Nav/System', '系统管理', '1', '1', '', '0', '2');
INSERT INTO `beauty_auth_rule` VALUES ('3', 'Admin/Nav/Auth', '权限管理', '1', '1', '', '0', '3');
INSERT INTO `beauty_auth_rule` VALUES ('4', 'Admin/Nav/Brand', '品牌管理', '1', '1', '', '0', '4');
INSERT INTO `beauty_auth_rule` VALUES ('5', 'Admin/Nav/Category', '分类管理', '1', '1', '', '0', '5');
INSERT INTO `beauty_auth_rule` VALUES ('6', 'Admin/Nav/Goods', '商品管理', '1', '1', '', '0', '6');
INSERT INTO `beauty_auth_rule` VALUES ('7', 'Admin/Nav/User', '会员管理', '1', '1', '', '0', '7');
INSERT INTO `beauty_auth_rule` VALUES ('41', 'Admin/Index/footer', '后台尾部', '1', '1', '', '1', '1,41');
INSERT INTO `beauty_auth_rule` VALUES ('9', 'Admin/Nav/Advertise', '广告管理', '1', '1', '', '0', '9');
INSERT INTO `beauty_auth_rule` VALUES ('8', 'Admin/Nav/Order', '订单管理', '1', '1', '', '0', '8');
INSERT INTO `beauty_auth_rule` VALUES ('10', 'Admin/Nav/Sale', '活动管理', '1', '1', '', '0', '10');
INSERT INTO `beauty_auth_rule` VALUES ('11', 'Admin/Nav/Comment', '评论管理', '1', '1', '', '0', '11');
INSERT INTO `beauty_auth_rule` VALUES ('29', 'Admin/Order/index', '订单列表', '1', '1', '', '8', '8,29');
INSERT INTO `beauty_auth_rule` VALUES ('30', 'Admin/Order/dfk', '待付款订单', '1', '1', '', '8', '8,30');
INSERT INTO `beauty_auth_rule` VALUES ('31', 'Admin/Order/dfh', '待发货订单', '1', '1', '', '8', '8,31');
INSERT INTO `beauty_auth_rule` VALUES ('32', 'Admin/Order/yfh', '已发货订单', '1', '1', '', '8', '8,32');
INSERT INTO `beauty_auth_rule` VALUES ('33', 'Admin/Order/ysh', '已收货订单', '1', '1', '', '8', '8,33');
INSERT INTO `beauty_auth_rule` VALUES ('36', 'Admin/Sale/index', '活动列表', '1', '1', '', '10', '10,36');
INSERT INTO `beauty_auth_rule` VALUES ('37', 'Admin/Sale/add', '添加活动', '1', '1', '', '10', '10,37');
INSERT INTO `beauty_auth_rule` VALUES ('38', 'Admin/Comment/index', '评论列表', '1', '1', '', '11', '11,38');
INSERT INTO `beauty_auth_rule` VALUES ('45', 'Admin/Nav/Golds', '金币管理', '1', '1', '', '0', '45');
INSERT INTO `beauty_auth_rule` VALUES ('40', 'Admin/Index/top', '后台头部', '1', '1', '', '1', '1,40');
INSERT INTO `beauty_auth_rule` VALUES ('42', 'Admin/Index/main', '后台主页', '1', '1', '', '1', '1,42');
INSERT INTO `beauty_auth_rule` VALUES ('43', 'Admin/Index/left', '后台左边', '1', '1', '', '1', '1,43');
INSERT INTO `beauty_auth_rule` VALUES ('12', 'Admin/Nav/Feedback', '反馈管理', '1', '1', '', '0', '12');
INSERT INTO `beauty_auth_rule` VALUES ('15', 'Admin/Admin/index', '管理员列表', '1', '1', '', '3', '3,15');
INSERT INTO `beauty_auth_rule` VALUES ('16', 'Admin/Admin/add', '添加管理员', '1', '1', '', '3', '3,16');
INSERT INTO `beauty_auth_rule` VALUES ('17', 'Admin/Admin/changeInfo', '个人信息修改', '1', '1', '', '48', '48,17');
INSERT INTO `beauty_auth_rule` VALUES ('18', 'Admin/AuthGroup/index', '管理组列表', '1', '1', '', '3', '3,18');
INSERT INTO `beauty_auth_rule` VALUES ('20', 'Admin/AuthRule/index', '权限列表', '1', '1', '', '3', '3,20');
INSERT INTO `beauty_auth_rule` VALUES ('21', 'Admin/AuthRule/add', '添加权限', '1', '1', '', '3', '3,21');
INSERT INTO `beauty_auth_rule` VALUES ('13', 'Admin/AdminNav/index', '菜单列表', '1', '1', '', '2', '2,13');
INSERT INTO `beauty_auth_rule` VALUES ('14', 'Admin/AdminNav/add', '添加菜单', '1', '1', '', '2', '2,14');
INSERT INTO `beauty_auth_rule` VALUES ('39', 'Admin/Feedback/index', '反馈列表', '1', '1', '', '12', '12,39');
INSERT INTO `beauty_auth_rule` VALUES ('19', 'Admin/AuthGroup/add', '添加管理组', '1', '1', '', '3', '3,19');
INSERT INTO `beauty_auth_rule` VALUES ('22', 'Admin/Brand/index', '品牌列表', '1', '1', '', '4', '4,22');
INSERT INTO `beauty_auth_rule` VALUES ('23', 'Admin/AddBrand/add', '添加品牌', '1', '1', '', '4', '4,23');
INSERT INTO `beauty_auth_rule` VALUES ('24', 'Admin/Category/index', '分类列表', '1', '1', '', '5', '5,24');
INSERT INTO `beauty_auth_rule` VALUES ('25', 'Admin/Category/add', '添加分类', '1', '1', '', '5', '5,25');
INSERT INTO `beauty_auth_rule` VALUES ('26', 'Admin/Goods/index', '商品列表', '1', '1', '', '6', '6,26');
INSERT INTO `beauty_auth_rule` VALUES ('27', 'Admin/Goods/addAct', '添加商品', '1', '1', '', '6', '6,27');
INSERT INTO `beauty_auth_rule` VALUES ('28', 'Admin/User/UserList', '会员列表', '1', '1', '', '7', '7,28');
INSERT INTO `beauty_auth_rule` VALUES ('34', 'Admin/Advertise/index', '广告列表', '1', '1', '', '9', '9,34');
INSERT INTO `beauty_auth_rule` VALUES ('35', 'Admin/Advertise/add', '添加广告', '1', '1', '', '9', '9,35');
INSERT INTO `beauty_auth_rule` VALUES ('44', 'Admin/Admin/loginout', '后台退出', '1', '1', '', '1', '1,44');
INSERT INTO `beauty_auth_rule` VALUES ('48', 'Admin/Nav/Message', '信息管理', '1', '1', '', '0', '48');
INSERT INTO `beauty_auth_rule` VALUES ('46', 'Admin/Golds/index', '金币商品列表', '1', '1', '', '45', '45,46');
INSERT INTO `beauty_auth_rule` VALUES ('47', 'Admin/Golds/addAct', '添加金币商品', '1', '1', '', '45', '45,47');
INSERT INTO `beauty_auth_rule` VALUES ('49', 'Admin/Message/index', '我的站内信', '1', '1', '', '48', '48,49');
INSERT INTO `beauty_auth_rule` VALUES ('50', 'Admin/Message/sendMessage', '发送站内信', '1', '1', '', '48', '48,50');
INSERT INTO `beauty_auth_rule` VALUES ('51', 'Admin/User/sendUserMessage', '发送站内信', '1', '1', '', '7', '7,51');
INSERT INTO `beauty_auth_rule` VALUES ('52', 'Admin/Comment/yiresponse', '已回复列表', '1', '1', '', '11', '11,52');
INSERT INTO `beauty_auth_rule` VALUES ('53', 'Admin/Comment/weiresponse', '未回复列表', '1', '1', '', '11', '11,53');
INSERT INTO `beauty_auth_rule` VALUES ('54', 'Admin/Order/ypj', '已评价订单', '1', '1', '', '8', '8,54');
INSERT INTO `beauty_auth_rule` VALUES ('55', 'Admin/Nav/Footer', '底部管理', '1', '1', '', '0', '55');
INSERT INTO `beauty_auth_rule` VALUES ('56', 'Admin/Foote/index', '底部列表', '1', '1', '', '55', '55,56');
INSERT INTO `beauty_auth_rule` VALUES ('57', 'Admin/Foote/add', '添加底部', '1', '1', '', '55', '55,57');
INSERT INTO `beauty_auth_rule` VALUES ('58', 'Admin/Nav/WeiXin', '微信管理', '1', '1', '', '0', '58');
INSERT INTO `beauty_auth_rule` VALUES ('59', 'Admin/WeiXin/createMenu', '微信菜单', '1', '1', '', '58', '58,59');

-- ----------------------------
-- Table structure for `beauty_brands`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_brands`;
CREATE TABLE `beauty_brands` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT COMMENT '品牌id',
  `bname` varchar(32) NOT NULL,
  `blogopath` varchar(100) DEFAULT NULL COMMENT 'logo图片的保存路径',
  `bcate` varchar(255) DEFAULT '0' COMMENT '活动名称',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1为上架，0位下架',
  `addtime` varchar(50) DEFAULT NULL COMMENT '品牌添加的时间',
  `aid` int(10) unsigned DEFAULT '0' COMMENT '活动的id  0为不参加活动',
  `blogoname` varchar(80) DEFAULT '' COMMENT 'logo图片的名称',
  `brandtype` tinyint(10) unsigned DEFAULT '1' COMMENT '1国际大牌，2推荐品牌，3国货精品',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_brands
-- ----------------------------
INSERT INTO `beauty_brands` VALUES ('1', '韩束', '2016-11-10/', '0', '1', '2016-11-10', '0', '58242daaa5f5e.jpg', '1');
INSERT INTO `beauty_brands` VALUES ('2', '雅思兰黛', '2016-11-10/', '0', '1', '2016-11-10', '0', '58243a3d6643c.jpg', '1');
INSERT INTO `beauty_brands` VALUES ('3', '御泥坊', '2016-11-10/', '0', '1', '2016-11-10', '0', '58243a7dc0c35.jpg', '3');
INSERT INTO `beauty_brands` VALUES ('4', '拉芳', '2016-11-10/', '0', '1', '2016-11-10', '0', '58243b5a01039.jpg', '2');
INSERT INTO `beauty_brands` VALUES ('5', '卡姿兰', '2016-11-10/', '0', '1', '2016-11-10', '0', '58245973cdd65.jpg', '2');
INSERT INTO `beauty_brands` VALUES ('6', '高夫', '2016-11-10/', '0', '1', '2016-11-10', '0', '5824612cd2bd4.jpg', '2');
INSERT INTO `beauty_brands` VALUES ('7', 'OSM', '2016-11-11/', '0', '1', '2016-11-11', '0', '582596db6df57.jpg', '1');
INSERT INTO `beauty_brands` VALUES ('8', '丸美', '2016-11-15/', '0', '1', '2016-11-15', '0', '582afc47f362a.jpg', '1');
INSERT INTO `beauty_brands` VALUES ('9', 'One leaf', '2016-11-15/', '0', '1', '2016-11-15', '0', '582afca1bfe79.jpg', '1');
INSERT INTO `beauty_brands` VALUES ('10', 'OlAy', '2016-11-15/', '0', '1', '2016-11-15', '0', '582afcd76d66f.jpg', '1');
INSERT INTO `beauty_brands` VALUES ('11', '森田药粧', '2016-11-16/', '0', '0', '2016-11-16', '0', '582bb1b3d4709.jpg', '1');
INSERT INTO `beauty_brands` VALUES ('12', '丝塔芙', '2016-11-16/', '0', '1', '2016-11-16', '0', '582bb1e8966ea.jpg', '1');
INSERT INTO `beauty_brands` VALUES ('13', '薇姿', '2016-11-16/', '0', '1', '2016-11-16', '0', '582bb1fd7bde5.jpg', '1');
INSERT INTO `beauty_brands` VALUES ('14', '凡茜', '2016-11-16/', '0', '1', '2016-11-16', '0', '582bb23e864c5.jpg', '1');
INSERT INTO `beauty_brands` VALUES ('15', '膜法世家', '2016-11-16/', '0', '1', '2016-11-16', '0', '582bb2e2af2a3.jpg', '2');
INSERT INTO `beauty_brands` VALUES ('16', '水密码', '2016-11-16/', '0', '1', '2016-11-16', '0', '582bb30f3578c.png', '2');
INSERT INTO `beauty_brands` VALUES ('17', '自然堂', '2016-11-16/', '0', '1', '2016-11-16', '0', '582bb3477adc7.jpg', '3');
INSERT INTO `beauty_brands` VALUES ('18', '植美村', '2016-11-16/', '0', '1', '2016-11-16', '0', '582bb3eeb0b5c.jpg', '3');
INSERT INTO `beauty_brands` VALUES ('19', '温碧泉', '2016-11-16/', '0', '1', '2016-11-16', '0', '582bb4104d91d.jpg', '3');
INSERT INTO `beauty_brands` VALUES ('20', '大宝', '2016-11-28/', '0', '1', '2016-11-28', '0', '583beb1b3ab80.jpg', '3');

-- ----------------------------
-- Table structure for `beauty_brandtype`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_brandtype`;
CREATE TABLE `beauty_brandtype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brandtype` varchar(50) NOT NULL DEFAULT '1推荐品牌' COMMENT '1国际大牌，2推荐品牌，3国货精品',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_brandtype
-- ----------------------------
INSERT INTO `beauty_brandtype` VALUES ('1', '国际大牌');
INSERT INTO `beauty_brandtype` VALUES ('2', '推荐品牌');
INSERT INTO `beauty_brandtype` VALUES ('3', '国货精品');

-- ----------------------------
-- Table structure for `beauty_cart`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_cart`;
CREATE TABLE `beauty_cart` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `mid` tinyint(3) unsigned NOT NULL,
  `gid` tinyint(3) unsigned NOT NULL,
  `buynum` int(10) unsigned NOT NULL,
  `addtime` varchar(30) NOT NULL,
  `sumprice` int(10) unsigned NOT NULL,
  `ml` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_cart
-- ----------------------------
INSERT INTO `beauty_cart` VALUES ('15', '45', '39', '1', '1480592514', '99', '30');
INSERT INTO `beauty_cart` VALUES ('16', '45', '55', '1', '1480592523', '79', '25');
INSERT INTO `beauty_cart` VALUES ('17', '34', '49', '5', '1480594020', '795', '120');
INSERT INTO `beauty_cart` VALUES ('18', '5', '65', '1', '1480662604', '332', '50');
INSERT INTO `beauty_cart` VALUES ('19', '5', '70', '1', '1480662610', '222', '75');
INSERT INTO `beauty_cart` VALUES ('20', '5', '49', '1', '1480662620', '120', '100');
INSERT INTO `beauty_cart` VALUES ('21', '5', '48', '1', '1480662772', '189', '150');
INSERT INTO `beauty_cart` VALUES ('24', '8', '3', '1', '1480663774', '189', '120');
INSERT INTO `beauty_cart` VALUES ('25', '8', '3', '1', '1480663778', '140', '150');

-- ----------------------------
-- Table structure for `beauty_category`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_category`;
CREATE TABLE `beauty_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cname` varchar(255) NOT NULL,
  `pid` smallint(10) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `show` tinyint(11) unsigned NOT NULL DEFAULT '1',
  `addtime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_category
-- ----------------------------
INSERT INTO `beauty_category` VALUES ('1', '面部护理', '0', '1', '1', '1477468673');
INSERT INTO `beauty_category` VALUES ('2', '面霜', '1', '1,2', '1', '1477468684');
INSERT INTO `beauty_category` VALUES ('3', '补水面霜', '2', '1,2,3,2,3', '1', '1477468702');
INSERT INTO `beauty_category` VALUES ('4', '美白面霜', '2', '1,2,3,2,4', '1', '1477468710');
INSERT INTO `beauty_category` VALUES ('5', '保湿面霜', '2', '1,2,3,2,5', '1', '1477468722');
INSERT INTO `beauty_category` VALUES ('6', '淡斑面霜', '2', '1,2,3,2,6', '1', '1477468752');
INSERT INTO `beauty_category` VALUES ('7', '眼霜', '1', '1,7', '1', '1477468775');
INSERT INTO `beauty_category` VALUES ('8', '淡化黑眼圈', '7', '1,7,8', '1', '1477468843');
INSERT INTO `beauty_category` VALUES ('9', '淡斑', '7', '1,7,9', '1', '1477468866');
INSERT INTO `beauty_category` VALUES ('10', '明目', '7', '1,7,10', '1', '1477468874');
INSERT INTO `beauty_category` VALUES ('11', '补水', '1', '1,11', '1', '1477468943');
INSERT INTO `beauty_category` VALUES ('12', '面膜', '1', '1,12', '1', '1477468971');
INSERT INTO `beauty_category` VALUES ('13', '美白', '12', '1,12,13', '1', '1477469003');
INSERT INTO `beauty_category` VALUES ('14', '巨补水', '12', '1,12,14', '1', '1477469026');
INSERT INTO `beauty_category` VALUES ('15', '保湿淡斑', '12', '1,12,15', '1', '1477469037');
INSERT INTO `beauty_category` VALUES ('16', '清洁', '12', '1,12,16', '1', '1477469073');
INSERT INTO `beauty_category` VALUES ('17', '护肤套装', '1', '1,17', '1', '1477469192');
INSERT INTO `beauty_category` VALUES ('18', '水乳套装', '17', '1,17,18', '1', '1477469211');
INSERT INTO `beauty_category` VALUES ('19', '补水四件套', '17', '1,17,19', '1', '1477469534');
INSERT INTO `beauty_category` VALUES ('20', '美白水乳', '17', '1,17,20', '1', '1477469544');
INSERT INTO `beauty_category` VALUES ('21', '祛痘美白', '17', '1,17,21', '1', '1477469553');
INSERT INTO `beauty_category` VALUES ('22', '身体护理', '0', '22', '1', '1477469566');
INSERT INTO `beauty_category` VALUES ('23', '沐浴露', '22', '22,23', '1', '1477469644');
INSERT INTO `beauty_category` VALUES ('24', '晒后修护', '22', '22,24', '1', '1477470928');
INSERT INTO `beauty_category` VALUES ('25', '精油区', '22', '22,25', '1', '1477470961');
INSERT INTO `beauty_category` VALUES ('26', '美白身体乳', '23', '22,23,26', '1', '1477471076');
INSERT INTO `beauty_category` VALUES ('27', '保湿身体乳', '23', '22,23,27', '1', '1477471084');
INSERT INTO `beauty_category` VALUES ('28', '清洁身体乳', '23', '22,23,28', '1', '1477471113');
INSERT INTO `beauty_category` VALUES ('29', '防晒乳', '24', '22,24,29', '1', '1477471134');
INSERT INTO `beauty_category` VALUES ('30', '修护乳', '24', '22,24,30', '1', '1477471142');
INSERT INTO `beauty_category` VALUES ('31', '保湿', '25', '22,25,31', '1', '1477471210');
INSERT INTO `beauty_category` VALUES ('32', '深层滋养', '25', '22,25,32', '1', '1477471221');
INSERT INTO `beauty_category` VALUES ('33', '香水彩妆', '0', '33', '1', '1477471238');
INSERT INTO `beauty_category` VALUES ('34', '卸妆', '33', '33,34', '1', '1477471267');
INSERT INTO `beauty_category` VALUES ('35', '防晒', '33', '33,35', '1', '1477471273');
INSERT INTO `beauty_category` VALUES ('36', 'BB霜', '33', '33,36', '1', '1477471282');
INSERT INTO `beauty_category` VALUES ('37', '香水区', '33', '33,37', '1', '1477471294');
INSERT INTO `beauty_category` VALUES ('38', '深层清洁', '34', '33,34,38', '1', '1477471313');
INSERT INTO `beauty_category` VALUES ('39', '保湿滋养', '34', '33,34,39', '1', '1477471342');
INSERT INTO `beauty_category` VALUES ('40', '深层卸妆油', '34', '33,34,40', '1', '1477471369');
INSERT INTO `beauty_category` VALUES ('41', '深层卸妆水', '34', '33,34,41', '1', '1477471377');
INSERT INTO `beauty_category` VALUES ('42', '美白防晒', '35', '33,35,42', '1', '1477471417');
INSERT INTO `beauty_category` VALUES ('43', '保湿防晒', '35', '33,35,43', '1', '1477471893');
INSERT INTO `beauty_category` VALUES ('44', '控油', '35', '33,35,44', '1', '1477472150');
INSERT INTO `beauty_category` VALUES ('45', '修颜防晒', '35', '33,35,45', '1', '1477472163');
INSERT INTO `beauty_category` VALUES ('46', '修颜BB霜', '36', '33,36,46', '1', '1477472196');
INSERT INTO `beauty_category` VALUES ('47', '控油保湿BB霜', '36', '33,36,47', '1', '1477472205');
INSERT INTO `beauty_category` VALUES ('48', '美白BB霜', '36', '33,36,48', '1', '1477472212');
INSERT INTO `beauty_category` VALUES ('49', '遮瑕BB霜', '36', '33,36,49', '1', '1477472309');
INSERT INTO `beauty_category` VALUES ('50', '止汗露', '37', '33,37,50', '1', '1477472615');
INSERT INTO `beauty_category` VALUES ('51', '绿茶香水', '37', '33,37,51', '1', '1477472637');
INSERT INTO `beauty_category` VALUES ('52', '玫瑰香水', '37', '33,37,52', '1', '1477472730');
INSERT INTO `beauty_category` VALUES ('53', '洗发护发', '0', '53', '1', '1477473063');
INSERT INTO `beauty_category` VALUES ('54', '洗发套装', '53', '53,54', '1', '1477473081');
INSERT INTO `beauty_category` VALUES ('55', '洗发乳', '53', '53,55', '1', '1477473087');
INSERT INTO `beauty_category` VALUES ('56', '护发素', '53', '53,56', '1', '1477473095');
INSERT INTO `beauty_category` VALUES ('57', '护发精油', '53', '53,57', '1', '1477473103');
INSERT INTO `beauty_category` VALUES ('58', '止痒去屑', '54', '54,58', '1', '1477473212');
INSERT INTO `beauty_category` VALUES ('59', '修复柔顺', '54', '54,59', '1', '1477473222');
INSERT INTO `beauty_category` VALUES ('60', '柔顺', '55', '53,55,60', '1', '1477473394');
INSERT INTO `beauty_category` VALUES ('61', '滋养', '55', '53,55,61', '1', '1477473408');
INSERT INTO `beauty_category` VALUES ('62', '修复发根', '55', '53,55,62', '1', '1477473417');
INSERT INTO `beauty_category` VALUES ('63', '去屑止痒', '55', '53,55,63', '1', '1477473427');
INSERT INTO `beauty_category` VALUES ('64', '修护', '56', '53,56,64', '1', '1477473437');
INSERT INTO `beauty_category` VALUES ('65', '多效修复', '56', '53,56,65', '1', '1477473601');
INSERT INTO `beauty_category` VALUES ('66', '补水活性', '56', '53,56,66', '1', '1477473640');
INSERT INTO `beauty_category` VALUES ('67', '滋养精油', '57', '53,57,67', '1', '1477473676');
INSERT INTO `beauty_category` VALUES ('68', '免洗精油', '57', '53,57,68', '1', '1477473692');
INSERT INTO `beauty_category` VALUES ('69', '丝滑润养', '57', '53,57,69', '1', '1477473748');
INSERT INTO `beauty_category` VALUES ('70', '男性护肤', '0', '70', '1', '1477474013');
INSERT INTO `beauty_category` VALUES ('71', '洁面', '70', '70,71', '1', '1477474026');
INSERT INTO `beauty_category` VALUES ('72', '祛痘洁面乳', '71', '70,71,72', '1', '1477474051');
INSERT INTO `beauty_category` VALUES ('73', '美白面乳', '71', '70,71,73', '1', '1477474057');
INSERT INTO `beauty_category` VALUES ('74', '保湿洁面乳', '71', '70,71,74', '1', '1477474065');
INSERT INTO `beauty_category` VALUES ('75', '清洁面乳', '71', '70,71,75', '1', '1477474072');
INSERT INTO `beauty_category` VALUES ('76', '润肤乳', '70', '70,76', '1', '1477474096');
INSERT INTO `beauty_category` VALUES ('77', '保湿润护乳', '76', '70,76,77', '1', '1477474113');
INSERT INTO `beauty_category` VALUES ('78', '美白润护乳', '76', '70,76,78', '1', '1477474124');
INSERT INTO `beauty_category` VALUES ('79', '清洁润护乳', '76', '70,76,79', '1', '1477474130');
INSERT INTO `beauty_category` VALUES ('80', '男性爽肤水', '70', '70,80', '1', '1477474191');
INSERT INTO `beauty_category` VALUES ('81', '滋养清爽', '80', '70,80,81', '1', '1477474207');
INSERT INTO `beauty_category` VALUES ('82', '保湿', '80', '70,80,82', '1', '1477474226');
INSERT INTO `beauty_category` VALUES ('83', '护肤单品', '0', '83', '1', '1477474276');
INSERT INTO `beauty_category` VALUES ('84', '补水', '83', '83,84', '1', '1477474285');
INSERT INTO `beauty_category` VALUES ('85', '美白', '83', '83,85', '1', '1477474312');
INSERT INTO `beauty_category` VALUES ('86', '保湿', '83', '83,86', '1', '1477474321');
INSERT INTO `beauty_category` VALUES ('87', '美妆单品', '0', '87', '1', '1478411210');
INSERT INTO `beauty_category` VALUES ('88', '修复保湿', '86', '83,86,88', '1', '1478413838');
INSERT INTO `beauty_category` VALUES ('89', '美白补水', '85', '83,85,89', '1', '1478413850');
INSERT INTO `beauty_category` VALUES ('90', '滋养护肤', '85', '83,85,90', '1', '1478413865');
INSERT INTO `beauty_category` VALUES ('91', '补水保湿', '86', '83,86,91', '1', '1478413885');
INSERT INTO `beauty_category` VALUES ('92', '补水 滋养', '84', '83,84,92', '1', '1478413904');
INSERT INTO `beauty_category` VALUES ('93', '乳液', '87', '87,93', '1', '1478759790');
INSERT INTO `beauty_category` VALUES ('94', '精华水', '87', '87,94', '1', '1478759795');
INSERT INTO `beauty_category` VALUES ('95', '粉底液', '87', '87,95', '1', '1478759861');
INSERT INTO `beauty_category` VALUES ('96', '修复抗衰老', '94', '87,94,96', '1', '1478759892');
INSERT INTO `beauty_category` VALUES ('97', '靓白乳液', '93', '87,93,97', '1', '1478759926');
INSERT INTO `beauty_category` VALUES ('98', '保湿透气不油腻', '95', '87,95,98', '1', '1478760392');
INSERT INTO `beauty_category` VALUES ('99', '自然靓白', '95', '87,95,99', '1', '1478760427');
INSERT INTO `beauty_category` VALUES ('100', '洗面奶', '83', '83,100', '1', '1478762746');
INSERT INTO `beauty_category` VALUES ('101', '消去痘痘', '100', '83,100,101', '1', '1478762865');
INSERT INTO `beauty_category` VALUES ('102', '美白控油', '100', '83,100,102', '1', '1478762886');
INSERT INTO `beauty_category` VALUES ('103', '口红', '33', '33,103', '1', '1478772529');
INSERT INTO `beauty_category` VALUES ('104', '多效保湿', '11', '1,11,104', '1', '1479967447');

-- ----------------------------
-- Table structure for `beauty_collect`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_collect`;
CREATE TABLE `beauty_collect` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(11) DEFAULT NULL COMMENT '用户名',
  `gid` int(11) DEFAULT NULL COMMENT '商品id',
  `goodsname` varchar(255) DEFAULT NULL,
  `imageurl` varchar(255) DEFAULT NULL COMMENT '图片路径',
  `imagename` varchar(255) DEFAULT NULL,
  `saleprice` varchar(255) DEFAULT NULL COMMENT '商品价格',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_collect
-- ----------------------------
INSERT INTO `beauty_collect` VALUES ('39', '6', '25', '温碧泉补水面膜', '2016-11-02/', '5819afc7a42e1.jpg', '256.00');
INSERT INTO `beauty_collect` VALUES ('46', '34', '44', '御泥坊美白嫩肤护肤套装补水保湿滋润提亮肤色秋冬正', '2016-11-10/', '58244ee7ac2d1.jpg', '99.00');
INSERT INTO `beauty_collect` VALUES ('195', '9', '62', '雅诗兰黛口红 花漾倾慕丰唇膏 玻尿酸持久保湿滋养', '2016-11-10/', '58245935bdf8a.jpg', '128.00');
INSERT INTO `beauty_collect` VALUES ('196', '9', '63', '雅诗兰黛晶透沁白淡斑晚安膜8g 滋润修护 免洗面膜', '2016-11-10/', '58245a23c0517.jpg', '223.00');
INSERT INTO `beauty_collect` VALUES ('197', '9', '64', '雅诗兰黛晶透沁白淡斑晚安膜10g 滋润修护 免洗面膜', '2016-11-10/', '58245a9c0aa5d.jpg', '220.00');
INSERT INTO `beauty_collect` VALUES ('228', '38', '6', '韩束玻尿酸补水面膜亮肤蚕丝紧致弹润面膜贴保湿美白晒后修复正品', '2016-11-10/', '58243439b4a1e.jpg', '69.00');
INSERT INTO `beauty_collect` VALUES ('229', '38', '37', '韩束韩粉世家天然水润不易脱色口红', '2016-11-10/', '582448445930d.jpg', '99.00');
INSERT INTO `beauty_collect` VALUES ('230', '38', '62', '雅诗兰黛口红 花漾倾慕丰唇膏 玻尿酸持久保湿滋养', '2016-11-10/', '58245935bdf8a.jpg', '128.00');
INSERT INTO `beauty_collect` VALUES ('234', '8', '7', '韩束红石榴面膜贴 美白祛黄保湿紧致修复补水秋冬补水面膜', '2016-11-10/', '582434a1ae459.jpg', '89.00');
INSERT INTO `beauty_collect` VALUES ('235', '8', '8', '韩束雪莲玻尿酸补水亮肤蚕丝巨补水面膜', '2016-11-10/', '58243529a3799.jpg', '89.00');
INSERT INTO `beauty_collect` VALUES ('237', '5', '4', '韩束雪白肌护肤品套装女 秋冬补水化妆品套装正品', '2016-11-10/', '5824317e7ac5c.jpg', '279.00');
INSERT INTO `beauty_collect` VALUES ('238', '5', '6', '韩束玻尿酸补水面膜亮肤蚕丝紧致弹润面膜贴保湿美白晒后修复正品', '2016-11-10/', '58243439b4a1e.jpg', '69.00');
INSERT INTO `beauty_collect` VALUES ('239', '5', '25', '韩束红石榴爽肤水化妆水补水保湿', '2016-11-10/', '58243f8dac8b3.jpg', '99.00');
INSERT INTO `beauty_collect` VALUES ('240', '8', '6', '韩束玻尿酸补水面膜亮肤蚕丝紧致弹润面膜贴保湿美白晒后修复正品', '2016-11-10/', '58243439b4a1e.jpg', '69.00');
INSERT INTO `beauty_collect` VALUES ('241', '5', '16', '韩束墨菊巨补水保湿水润芦荟胶面霜 ', '2016-11-10/', '58243925e57ad.jpg', '49.00');
INSERT INTO `beauty_collect` VALUES ('242', '5', '7', '韩束红石榴面膜贴 美白祛黄保湿紧致修复补水秋冬补水面膜', '2016-11-10/', '582434a1ae459.jpg', '89.00');
INSERT INTO `beauty_collect` VALUES ('246', '5', '39', '御泥坊自然栌斗泥面膜男女通用', '2016-11-10/', '58244c95271e3.jpg', '99.00');
INSERT INTO `beauty_collect` VALUES ('247', '5', '58', '御泥坊葡萄籽琉璃亮颜黑面膜21片美白保湿补水去黄淡斑去暗沉男女', '2016-11-10/', '58245593844db.jpg', '99.00');
INSERT INTO `beauty_collect` VALUES ('248', '5', '62', '雅诗兰黛口红 花漾倾慕丰唇膏 玻尿酸持久保湿滋养', '2016-11-10/', '58245935bdf8a.jpg', '128.00');
INSERT INTO `beauty_collect` VALUES ('249', '5', '59', '御泥坊男士黑茶控油矿物洁面乳深层清洁淡化黑头收毛孔洗面奶正品', '2016-11-10/', '582455d8264a8.jpg', '39.90');
INSERT INTO `beauty_collect` VALUES ('250', '5', '3', '韩束墨菊巨补水秋冬化妆品保湿补水美白滋润乳液爽肤水护肤品套装', '2016-11-10/', '582430ff31b4b.jpg', '140.00');

-- ----------------------------
-- Table structure for `beauty_comment`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_comment`;
CREATE TABLE `beauty_comment` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '代表是否显示回复',
  `content` varchar(100) DEFAULT NULL,
  `response` varchar(100) DEFAULT NULL,
  `coaddtime` varchar(30) DEFAULT NULL COMMENT '评论时间',
  `cosid` int(4) DEFAULT NULL COMMENT '评论的好坏指全部，2好，3中，4差',
  `cstatus` int(4) DEFAULT NULL COMMENT '是否评论5代表未评论6代表已评论',
  `respid` int(4) DEFAULT '1' COMMENT '回复状态：1代表未回复，2代表已回复',
  `gid` int(4) NOT NULL,
  `mid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `readdtime` varchar(255) DEFAULT NULL COMMENT '回复时间',
  `ml` int(11) DEFAULT NULL,
  `imageurl` varchar(255) DEFAULT NULL,
  `imagename` varchar(255) DEFAULT NULL,
  `picname` varchar(255) DEFAULT NULL,
  `picurl` varchar(255) DEFAULT NULL,
  `zuijia` varchar(255) DEFAULT NULL,
  `isimage` int(11) DEFAULT '0' COMMENT '0指没有晒图，1指晒图',
  `zuijiacount` int(11) DEFAULT '0' COMMENT '0指未追加评价，1指追加评价',
  `zuijiatime` int(11) DEFAULT NULL COMMENT '追加的时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_comment
-- ----------------------------
INSERT INTO `beauty_comment` VALUES ('1', 'bu231242314314234', '我们会继续女里', '1480590785', '2', '6', '2', '1', '8', '8', '1480664519', '200', '2016-12-01/', '584005c1133b8.jpg', '584006001e85c.jpg', '2016-12-01/', '1232143214235432534', '1', '1', '1480590848');
INSERT INTO `beauty_comment` VALUES ('2', '123214231432154325423', '我们会继续女里', '1480590829', '2', '5', '2', '42', '8', '6', '1480664519', '30', '2016-12-01/', '584005ed1d3e8.jpg', null, null, null, '1', '0', null);
INSERT INTO `beauty_comment` VALUES ('3', '2`1231434r523543534', null, '1480590829', '3', '5', '1', '39', '8', '6', null, '30', null, null, null, null, null, '0', '0', null);
INSERT INTO `beauty_comment` VALUES ('4', 'weddfsgvfgvsf', '谢谢亲们的支持哦，我们会继续努力', '1480591220', '1', '5', '2', '39', '35', '17', '1480595506', '30', null, null, null, null, null, '0', '0', null);
INSERT INTO `beauty_comment` VALUES ('5', 'ghjkjkgjhkjk', '谢谢亲们的支持哦，我们会继续努力', '1480592057', '1', '6', '2', '37', '35', '25', '1480595506', '15', null, null, null, null, '13254854544', '0', '1', '1480592084');
INSERT INTO `beauty_comment` VALUES ('6', 'kjh,k,kjh,jjhkjh', '谢谢亲们的支持哦，我们会继续努力', '1480592057', '1', '6', '2', '39', '35', '25', '1480595506', '30', null, null, null, null, '3\n226596565', '0', '1', '1480592084');
INSERT INTO `beauty_comment` VALUES ('7', 'iuglvck;fj/.', '谢谢亲们的支持哦，我们会继续努力', '1480592057', '1', '6', '2', '49', '35', '25', '1480595506', '120', null, null, null, null, '362\n265556555', '0', '1', '1480592084');
INSERT INTO `beauty_comment` VALUES ('8', 'dsasdsaddasdsad', '谢谢亲们的支持哦，我们会继续努力', '1480593313', '1', '5', '2', '39', '45', '29', '1480595506', '30', null, null, null, null, null, '0', '0', null);
INSERT INTO `beauty_comment` VALUES ('9', 'dsaddddddddddd', '谢谢亲们的支持哦，我们会继续努力', '1480593313', '1', '5', '2', '55', '45', '29', '1480595506', '25', null, null, null, null, null, '0', '0', null);
INSERT INTO `beauty_comment` VALUES ('10', '1321312432423r23', '我们会继续女里', '1480593894', '2', '5', '2', '1', '8', '7', '1480664519', '150', '2016-12-01/', '584011e661956.jpg', null, null, null, '1', '0', null);
INSERT INTO `beauty_comment` VALUES ('11', '3we1232143213432123', '我们会继续女里', '1480593927', '2', '5', '2', '42', '8', '4', '1480664519', '30', '2016-12-01/', '584012077b480.jpg', null, null, null, '1', '0', null);
INSERT INTO `beauty_comment` VALUES ('12', '421432412432141234214', '谢谢亲们的支持哦，我们会继续努力', '1480593927', '1', '5', '2', '34', '8', '4', '1480595506', '30', null, null, null, null, null, '0', '0', null);
INSERT INTO `beauty_comment` VALUES ('13', '213214324r3241234', null, '1480593941', '3', '5', '1', '32', '8', '5', null, '80', null, null, null, null, null, '0', '0', null);
INSERT INTO `beauty_comment` VALUES ('14', '2131242314123', '谢谢亲们的支持哦，我们会继续努力', '1480594402', '1', '5', '2', '1', '8', '22', '1480595506', '150', '2016-12-01/', '584013e27d4fd.jpg', null, null, null, '1', '0', null);
INSERT INTO `beauty_comment` VALUES ('15', '23131241324', '谢谢亲们的支持哦，我们会继续努力', '1480594402', '1', '5', '2', '1', '8', '22', '1480595506', '200', null, null, null, null, null, '0', '0', null);
INSERT INTO `beauty_comment` VALUES ('17', '13213123241234', '我们会继续女里', '1480663902', '2', '5', '2', '49', '8', '24', '1480664519', '120', '2016-12-02/', '5841235e09177.jpg', null, null, null, '1', '0', null);
INSERT INTO `beauty_comment` VALUES ('18', '214314113432432423', '我们会继续女里', '1480664041', '2', '6', '2', '1', '8', '36', '1480664519', '150', '2016-12-02/', '584123e975b11.jpg', '5841240c36feb.jpg', '2016-12-02/', '2141243214321432', '1', '1', '1480664076');
INSERT INTO `beauty_comment` VALUES ('19', '3214124324523432', null, '1480664041', '3', '6', '1', '1', '8', '36', null, '200', null, null, '5841240c36feb.jpg', '2016-12-02/', '234235432534543534', '0', '1', '1480664076');

-- ----------------------------
-- Table structure for `beauty_comment_status`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_comment_status`;
CREATE TABLE `beauty_comment_status` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `costatus` varchar(30) NOT NULL DEFAULT '' COMMENT '评论的好坏',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_comment_status
-- ----------------------------
INSERT INTO `beauty_comment_status` VALUES ('1', '好评');
INSERT INTO `beauty_comment_status` VALUES ('2', '中评');
INSERT INTO `beauty_comment_status` VALUES ('3', '差评');

-- ----------------------------
-- Table structure for `beauty_count`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_count`;
CREATE TABLE `beauty_count` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `gcount` int(11) DEFAULT '0' COMMENT '点赞次数',
  `addtime` int(11) DEFAULT NULL,
  `stoptime` int(11) DEFAULT NULL,
  `todaycount` int(11) DEFAULT '0' COMMENT '一天之内的点赞次数',
  `mid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_count
-- ----------------------------
INSERT INTO `beauty_count` VALUES ('1', '1', '26', '1479120681', '1479139200', '0', '8');
INSERT INTO `beauty_count` VALUES ('2', '38', '1', '1479372144', '1479398400', '0', '8');
INSERT INTO `beauty_count` VALUES ('3', '62', '1', '1479381838', '1479398400', '0', '5');
INSERT INTO `beauty_count` VALUES ('4', '73', '1', '1479385025', '1479398400', '0', '8');
INSERT INTO `beauty_count` VALUES ('5', '75', '4', '1479388492', '1479398400', '3', '8');
INSERT INTO `beauty_count` VALUES ('6', '59', '7', '1479438234', '1479484800', '3', '8');
INSERT INTO `beauty_count` VALUES ('7', '60', '4', '1479457090', '1479484800', '3', '8');
INSERT INTO `beauty_count` VALUES ('8', '55', '4', '1479457117', '1479484800', '3', '8');
INSERT INTO `beauty_count` VALUES ('9', '1', '4', '1479457396', '1479484800', '3', '16');
INSERT INTO `beauty_count` VALUES ('10', '2', '4', '1479457875', '1479484800', '3', '16');
INSERT INTO `beauty_count` VALUES ('11', '3', '3', '1479457974', '1479484800', '3', '16');
INSERT INTO `beauty_count` VALUES ('12', '70', '3', '1479459162', '1479484800', '3', '16');
INSERT INTO `beauty_count` VALUES ('13', '38', '3', '1479459405', '1479484800', '3', '16');
INSERT INTO `beauty_count` VALUES ('14', '62', '3', '1479460721', '1479484800', '3', '16');
INSERT INTO `beauty_count` VALUES ('15', '40', '3', '1479543389', '1479571200', '0', '8');
INSERT INTO `beauty_count` VALUES ('16', '2', '3', '1479544017', '1479571200', '3', '8');
INSERT INTO `beauty_count` VALUES ('17', '3', '7', '1479544048', '1479571200', '3', '8');
INSERT INTO `beauty_count` VALUES ('18', '5', '7', '1479544284', '1479571200', '3', '8');
INSERT INTO `beauty_count` VALUES ('19', '6', '7', '1479544310', '1479571200', '3', '8');
INSERT INTO `beauty_count` VALUES ('20', '4', '6', '1479544362', '1479571200', '3', '8');
INSERT INTO `beauty_count` VALUES ('21', '72', '3', '1479544439', '1479571200', '3', '8');
INSERT INTO `beauty_count` VALUES ('22', '7', '3', '1480414511', '1480435200', '3', '8');
INSERT INTO `beauty_count` VALUES ('23', '8', '3', '1480415763', '1480435200', '3', '8');
INSERT INTO `beauty_count` VALUES ('24', '48', '1', '1480467775', '1480521600', '1', '8');
INSERT INTO `beauty_count` VALUES ('25', '44', '1', '1480473597', '1480521600', '1', '8');
INSERT INTO `beauty_count` VALUES ('26', '24', '6', '1480476976', '1480521600', '0', '8');
INSERT INTO `beauty_count` VALUES ('27', '37', '3', '1480590371', '1480608000', '3', '8');

-- ----------------------------
-- Table structure for `beauty_foote`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_foote`;
CREATE TABLE `beauty_foote` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `pid` smallint(10) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `show` tinyint(11) unsigned NOT NULL DEFAULT '1',
  `addtime` varchar(255) DEFAULT NULL,
  `newtitle` varchar(255) DEFAULT NULL,
  `newcontent` text,
  `newaddtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of beauty_foote
-- ----------------------------
INSERT INTO `beauty_foote` VALUES ('1', '购物指南', '0', '1', '1', '2131234124321', null, null, null);
INSERT INTO `beauty_foote` VALUES ('2', '购物流程', '1', '1,2', '1', '21312312312', '购物流程', '\n 1、注册账号: 消费者在跨境网注册会员账号。\n\n2、会员登入：登入跨境网会员账号。\n\n3、浏览选购商品：跨境网所有店铺、商品都是经过海关备案并需经中国海关查验后方可放行，拥有合法正品保障，消费者可以根据商品信息放心选购。\n\n4、加入购物车：挑选自己喜欢的商品并加入购物车。\n\n5、结算中心：进入结算中心核对您的订单信息。\n\n6、填写信息：订单信息无误，填写您的收货信息、选择配送方式、支付方式及上传身份证信息等（消费者提供个人身份证件，可以享受个人行邮税免税额度，并且跨境网凭借您的身份证信息，便于为您的订单提供单独报关单据。）\n\n7、确认订单支付货款：消费者对选购商品、配送等进行最后确认，支付全部货款。\n\n8、签收评价商品：消费者收到商品，检查商品品质，确认满意签收商品，并对商品进行如实评价，货款汇入商家账号。若收到商品与商家描述不符等问题，拒绝签收并及时联系商家客服。\n     ', '1480506275');
INSERT INTO `beauty_foote` VALUES ('3', '会员介绍', '1', '1,3', '1', '213213122·1', '会员介绍', '会员体系可能大家并不会陌生，在日常生活的商场百货以及互联网论坛和电商上比较常见的一种模式，用于区分核心消费者或者通过等级的区分来引导用户行为。而在建立会员体系的时候我认为要从以下几个要点去考虑。\n\n一．建立会员体系要考虑当前的运营策略\n会员体系的建立实际也是网站运营的一部分，需要承担一定的运营成本。所以在判断是否要建立会员体系的时候，要先考虑本身的运营策略。 例如，之前美团网站有尝试过会员体系，对不同会员进行不同的优惠以及专享活动，可是在今年年初的时候，将这类活动给取消了，取而代之的是那些新用户专享的活动。前者是核心用户维系，后者则是用户受众的扩张（或者是同类型产品的运营策略让其不得不这样做）。了解现阶段主要目的，而不是盲目的建立会员体系。\n\n二．会员体系中的成长值获取\n会员体系当中有对会员等级制度有一个量化的数值称为成长值或者经验值，期获取的方式主要有两个方面，交易行为或者非交易行为。\n\n1.交易行为\n\n此类行为为会员成长值获取的主要行为，该行为的判定结合各类电商网站可以有以下几个注意点选择。\n\n第一，将平台的交易产品类别进行区分筛选出对平台贡献度较小的产品，将其排除在外。例如淘宝和京东将其平台上的旅游产品（酒店，机票，景点门票等）的交易不计入成长值的交易行为。前者是阿里独立出旅游业务 去啊（有新的积分体系）后者是京东的主营还是以实体商品为主（3C数码）此类业务可能是和运营商合作的关系。对平台带来的价值不大。\n\n第二，与平台自身的虚拟货币的区分。平台出来会员体系以外还可能会有一定的积分系统（如天猫积分，京豆等）运营活动当中的优惠券，以及其他虚拟货币。进行区分也是为了使用户每次获得的成长值都是由用户真金白银换取回来的，降低平台的运营管理难度。\n\n第三，对交易订单的筛选（主要是订单价格）判断是否给予成长值。这一方面还是要看平台的经营类别了。像淘宝（C2C）和美团百度糯米（O2O）存在许多小额交易的平台，可能不需要商品价格的限定，而像京东，天猫，苏宁（B2C）这类主营就是品牌类的产品，平均价格偏高，需要一定的订单价格的限定。京东10元以下的交易不给予成长值。当然也存在高价格订单的加成行为，例如天猫，商品超过多少会有成长值得加成。（不过他要达到的升级数值也高）\n\n第四，对终端设备的偏向。这个也好理解，无线终端现在对平台的价值越来越重要。对无线端的成长值加成也只是平台无线化的一种方式（还有其他的无线专享价等等）\n\n第五，对每天成长值封顶的限定（实际上我这个没看懂）一般平台都没有对会员成长值的限定（对积分获取的限定倒是有）不过淘宝存在这种机制，不知道哪位大神可以给我解释一下。\n\n2.非交易行为\n\n这类行为是为了引导用户行为，提高平台的活跃度，促进交易等等。主要包含以下几类。\n\n第一，登陆签到赠予成长值等等。这类为比较常见的非交易行为，每天完成一次，连续几天还有赠送等等。不过这类行为对平台的贡献较低，成长值设定的较小。\n\n第二，每月累积一定的购物天数赠送一定的积分。此类方式是在上一种方式吸引用户进入平台以后促进其交易的设定，也比较常见。相对与第一种对平台带来的价值较大，成长值设定会高一些。\n\n第三，评价获取成长值，这类行为对平台带来的影响是间接效应，优质的评论可能会促进产品的销售，以及对问题卖家的筛选。 对平台的贡献还是比较高的，所以在获取成长值以外，还结合平台的积分系统，给予一定的积分。因此在这类行为上可操作的点还是比较多的。可以根据平台自身特点对评价行为进行审核（或者用户举报等），过滤掉那些低质量评价（拷贝其他人的评价这类的）在商品的评价界面上呈现高质量的评价（图片配一定文字）。不过主导用户进行高质量的评论还是积分的赠送，成长值只是辅助作用。\n\n以上是会员体系当中的一部分，个人感觉还是将其分成两篇文章比较好，在下一篇文章中会从会员体系成长值有效期，会员等级的确定和特权的界定进行思考。\n\n文／雪域小男孩（简书作者）\n原文链接：http://www.jianshu.com/p/7b2c694a0481\n著作权归作者所有，转载请联系作者获得授权，并标注“简书作者”。', '1480506609');
INSERT INTO `beauty_foote` VALUES ('4', '常见问题', '1', '1,4', '1', '213123123', '常见问题', '\n                       解析电商网站运营最常见的三大问题 \n早在十几年前，随着全球外贸金融行业的飞速发展，电商之火便在国内迅速蔓延，传统企业纷纷把线下业务做到了线上，意图通过互联网特性来实现企业低成本高收益的目标，这让原本竞争激烈的行业市场更加白日化，而由此带来的传统电商企业大洗牌不胜枚举；许多中小商家由于资金、人才、资源等方面的匮乏，无法应对大数据时代多网互联的竞争浪潮，相继宣布破产倒闭。  虽然今天我们看到一些电商网站也能够正常的运营，但殊不知他们正面临着各种瓶颈，如果还不进行改革创新，也许在不久的将来也会遭遇同样的命运。讲到这里，笔者不得不感叹：中小电商企业在国内运营发展想要经久不衰、持续盈利真的是非常不容易。为什么这么说呢？传统中小电商企业运营过程中，对外要面对当今行业间存在的恶性不良竞争，对内还要进行改革创新不断突破显性或者隐性的瓶颈问题，可以说思路和策略最大程度上决定了电商企业的未来命运。那么，现如今传统电商企业遭遇的瓶颈是哪些原因导致的呢？下面简单的从五个方面为大家讲述。  一、大部分企业进行产品宣传时，全网最低价被当成吸引用户眼球的法宝  网上购物谁都想买到质量好价格便宜的产品，但事实真的是这样吗？笔者要郑重的Say NO，目前许多企业利用客户对低价格的敏感心理宣称自己的产品是全网最低价格，事实上没有一家企业敢绝对保证产品的价格是全网最低的；并且企业在面对恶性的低价竞争时不断压缩产品的成本，一些质量不合格的产品也被包装成正品出售，给客户带来了一定的使用风险。作为企业主，不要以为全网最低价这样的虚假信息客户很难识破，他们只是对您还没有彻底失望，等到绝望的那一天丢弃你只在一念之间。因此，笔者建议企业进行产品宣传时，最好不要使用一些虚假欺骗客户之类的广告词，以免造成不良的口碑。  二、为竞争为牟利，部分电商企业使用假促销等不正当营销手段，加速了整个行业市场的恶性发展  部分电商企业在进行营销推广时，投入的金钱成本非常大。特别是为了与同行比产品比价格，许多企业把单笔成交利润降得很低，与同行比谁的优惠政策更大，从而吸引用户购买。虽说这么做也能够给企业带来一定的收益，但长久下去会出现企业产品有促销的卖的很好，没促销的几乎卖不出去，一旦形成这种形式，企业就不得不考虑进行运营上的调整，会把产品原本的价格调至很高，开展促销活动的时候与非常低的促销价格形成对比，给客户一种非常实惠的错觉，实际上这是一种假促销首选，加速了整个行业市场进行的恶性循环发展，损害了广大消费者的利益。  三、物流出现大城市与基层乡镇的两极分化发展，使得电商企业的基层发展难度颇大 近几年，几乎所有电商企业对于商品物流的问题进行了极大改进，以便于快速送货至客户手中，这确实也满足了一些用户对于快速送货的要求，但只是针对于大城市用户而言，许多乡镇的送货情况还是不能被用户认同，此时物流就出现了大城市与基层乡镇的两极分化发展\n                        ', '1480506712');
INSERT INTO `beauty_foote` VALUES ('5', '联系客服', '1', '1,5', '1', '213123123', '联系客服', '1、可以点击首页右边侧栏的联系我们\n\n2、或者点击底部的联系我们\n\n3、可以通过客服问一些关于商品的一些问题\n\n4、可以通过客服了解我们的一些商品\n\n5、通过客服进行退换货\n\n6、有什么对产品不满意的可以联系客服', '1480506922');
INSERT INTO `beauty_foote` VALUES ('10', '配送方式', '0', '10', '1', '1480490180', null, null, null);
INSERT INTO `beauty_foote` VALUES ('11', '上门自提', '10', '10,11', '1', '1480507000', '上门自提', '     为了让消费者能够买得放心，京东在多年以前便提供了上门自提服务。目前来看，京东已提供了北京、上海、广州、深圳等几十个城市的多个自提点。笔者的第一次上门自提，就是在京东完成的。购物当天，笔者事先查询了自提点的具体位置和联系电话，之后便坐着公车来到了自提点。由于地图比较清晰，所以找到自提点并不是很困难。不过需要注意的是，虽然是当面交易，但是自提点还是与家电卖场有所不同。只有在笔者先付款的情况下，京东才肯把货物交给笔者。类似于家电卖场那种先验货后付款的购机模式，在京东自提点是行不通的。\n　　 如果开箱之后发现了货物存在破损或故障，那么就需要到自提点的另一个窗口去办理退换货。在这里提醒广大读者，如果货物开箱不良，最好办理退货而不是换货。因为只有选择退货，才能当场就把钱要回来。而如果办理换货的话，则需要另约一天再次“上门自提”。\n　　最后需要说明的是，京东上门自提订单原则上是免收配送费用的。但如果一个ID账号在一个月内有过1次以上或一年内有过3次以上，在规定的时间内无理由不履约提货，京东将在相应的ID账户里每单扣除50个积分作为运费。时间计算方法为：成功提交订单后向前推算30天为一个月，成功提交订单后向前推算365天为一年，不以自然月和自然年计算。', '1480507001');
INSERT INTO `beauty_foote` VALUES ('12', '配送服务查询', '10', '10,12', '1', '1480494882', '配送服务查询', '    配送是电子商务的重要组成部分，对于大部分非电子产品来说，配送是它们到达顾客手中的必经之路。因此，有网上交易发生，就有对电子商务配送的需求。这些需求可以由电子商务企业自身的配送系统来完成，但更多的是由社会化的配送体系来承担。这是电子商务配送发展的必然趋势。随着电子商务的不断成熟，即便是B2B的订单也会逐渐呈现出多批次、小批量、地域广、不确定的特点。在日益激烈的竞争环境中，电子商务企业不可能用太多精力来应对越来越复杂的配送任务。因此，电子商务企业对社会化配送服务的需求将随着电子商务的发展而日益增长。\n　　我国的电子商务尚处于起步阶段，虽然这两年来电子商务交易量涨幅较大，但其绝对规模还很小。截至2001年7月，全国只有2000多万网络人口，差不多只相当于两个特大城市居民的数量，这些用户中参与过网上购物的比例仅为31.9%。而且，目前通过网络销售的商品品种也很少。2000年网上购物的主要商品是书籍、计算机软件和硬件、通讯产品、音乐光盘和影碟、家电产品、鲜花等。企业方面，2000年中国的15000家国有大中型企业中，仅有10%基本实现了信息化，中小企业中这个比例则更低。大部分上网的企业也仅仅局限于在网上发布产品介绍等。\n　　同时，国内电子商务的发展速度与发达国家相比还存在很大差距。目前，阻碍电子商务快速发展的原因很多，除了配送能力不足外，网络普及率不高、网上结算体系不完善、法律政策环境不健全等都是阻碍电子商务进一步发展的重要因素。虽然这些问题的根本解决还有待时日，但是，应该看到，政府、银行和企业等有关方面己经认识到问题的严重性，并做出了相当程度的努力。实践证明，种种障碍正在得到不同程度的缓解。', '1480507050');
INSERT INTO `beauty_foote` VALUES ('13', '配送费收取标准', '10', '10,13', '1', '1480494908', '配送费收取标准', '符合以下任一情形，收取运费：\n\n1）注册会员、铜牌会员、银牌会员、金牌会员用户购买京东自营商品单笔订单总金额（按减去直降和返现促销的金额）：小于59元，则需每单承担5元运费；满59元则免运费。\n2) 钻石级别会员用户、企业会员用户购买京东自营商品小于39元，则需每单承担5元运费；满39元则免运费。\n3）所有级别会员如需配送至偏远地区（西藏、新疆，以京东公示区域为准）时，需按购买商品件数额外收取运费10元/件。\n用户订单选择京东上门自提方式免运费。（如选择极速达约定服务的除外）\n\n用户订单选择“极速达”配送服务，则单笔订单收取49元运费（所有级别会员均收取）。\n\n用户购买入驻京东的第三方卖家商品，则按卖家在商品详情页公示的运费标准收取，不同的卖家店铺收取的标准各异，一般存在情形如下：\n\n1) 同一店铺内商品，每单固定运费。\n2) 同一店铺内商品，每单满一定金额免运费，不满则收取一定运费。\n3) 按订单中不同商品类型分别收取运费。\n4）其他公示的运费标准。              ', '1480507114');
INSERT INTO `beauty_foote` VALUES ('14', '支付方式', '0', '14', '1', '1480494927', null, null, null);
INSERT INTO `beauty_foote` VALUES ('15', '货到付款', '14', '14,15', '1', '1480494944', '货到付款', '    货到付款是个好东西，为什么？因为它解决了很多没有网银没有支付宝的消费者也来体验一把网络购物。但是，货到付款也是把双刃剑，弄不好会“刺伤”卖家，似乎货到付款成了淘宝众多功能中的一个鸡肋“食之无肉，弃之有味”。\n\n   货到付款的好处是什么？\n\n   提高用户体验，这是首先要想到的。什么叫用户体验，就是在淘宝街上逛着逛着，突然看到一件很喜欢的东西，可惜网银里面没钱，现在又是半夜三更的，出去存钱极为不方便，这个时候，货到付款就帮了个大忙。\n\n   从淘宝的角度来讲，货到付款无疑是其大淘宝战略中的一个重要环节，因为货到付款在开疆辟土，吸引那些没有网银或是对电脑购物操作不熟悉的中老年消费者才是关键。目前，国内电商积极建设自己的物流系统，也是为货到付款做铺垫，自己的物流、自己的员工、自己来收钱。一系列的环节都走到位，消费者想不买你的东西都难。以前消费者还有借口说自己没有网银，不方面网上购物，现在是不需要网银了，直接货到付款了，还有神马不方便的呢？\n\n   货到付款的坏处是什么？\n\n   感觉有很多，先慢慢分析一下。\n \n   物流成本的增加。货到付款选择的快递公司有限，不是顺丰就是宅急送，申通圆通都暂时不支持，而顺丰一个字贵（运费贵），宅急送一个字慢（取件慢）。这些都是额外增加的物流成本，如果遇到拒收，好了，钱不仅没赚到，反而亏了双倍运费。\n\n   不是有运费险么？扯淡的，为何？一是赔偿额度低，发个顺丰不超重的话一去一回40块，赔多少呢？顶死20块，这个不是你想赔多少就赔多少，而是保险公司说赔多少就赔多少；二是一笔订单拒收，货在快递那压一个星期发回，等发回后一个星期后物流状态改变，18个工作日后开始理赔，一系列证明材料要上交，等弄完了，好了等着吧，等到猴年马月了。\n\n   经营费用成本的增加。哪些方面？电话费要多交吧，货到付款一般都是需要提前电话联系的，确定好各类信息卖家才敢发货，也许每个月多接些货到付款的单子，电话费就要多交不少，而且都是长途。\n\n   沟通成本的增加。以前一个客服通过旺旺跟十几名顾客沟通，现在好了，为了一个货到付款，也许一个客服要跟顾客电话沟通一上午，为何？因为货到付款的顾客一般都是初次接触淘宝或者是网购，很多经验不熟悉，你也许要从怎么操作一步步的教起。好了，货到付款让卖家成了淘宝义务培训新手买家的学校了。\n\n   退货风险的增加。因为是货到付款，所以没给钱我想退就退，也许对某个产品很好奇，以前没见过，想见一下，于是淘宝一搜，找到一个货到付款的，谈妥发货，好了，收到货了，看了产品了，感觉一般，拒收了。货到付款让卖家成为一个免费的橱窗，而且是送上门的橱窗，想看就看，而且不要钱的看。            ', '1480507205');
INSERT INTO `beauty_foote` VALUES ('16', '在线支付', '14', '14,16', '1', '1480494960', '在线支付', '　一个方便快捷的支付过程，也是电子商务购物体验中重要的组成部分。虽然还有很多人不知疲惫的奔波于各大商场，但是随着电子支付业务的成熟与发展，网络信任体系的逐步构建，网络购物已经成为了人们生活必不可少的生活方式。同时，随着在线支付的普及，网购团体也深深地体会到，无论是在线支付还是线下支付，只要能够为其提供快捷安全的支付服务，他们必将一直热衷于电子商务，热衷于这种快捷便利的消费方式。\n　　一、引导银行介入\n　　我国电子商务的交易资金的支付清算主要有三种清算模式：一，经营电子商务的企业自行办理交易资金支付结算业务；二，经营电子商务的企业通过第三方交易资金支付清算公司办理交易资金支付结算业务；三，由银行充当第三交方易资金支付清算公司这一角色，为企业提供交易资金支付结算服务。第三种清算模式是最近几年来才兴起的，是直接将银行引入电子商务的清算模式。例如：2005年浦东发展银行与宝钢东方钢铁共同推出的“安信宝”业务，就是成功实施第三种电子商务在线支付的成功案例。这也说明我国商业银行通过在线支付业务逐步介入到电子商务中的步伐已经开启，这也必将为我国电子商务未来更安全、更便捷的为消费者提供服务奠定了坚实的基础。\n　　在欧美等发达国家，通过银行为客户提供的网上银行实施在线支付已经占到了银行业务总量的50%以上，瑞典这一比例更是高达60%，且一直保持着强劲的发展态势。虽然我国近几年来在线支付业务与电子商务已经完成了初步融合，但是据发达国家的发展水平还存在着很大的差距。随着银行不断地介入电子商务业务，未来银行肯定不仅仅参与电子商务的在线支付业务，而是在更多的业务中与电子商务相互融合。在线支付是这个融合的开始，同时也是引导银行介入电子商务的重要手段，为电子商务发展空间的进一步扩展提供了必要的渠道。\n　　二、促进联合发展\n　　电子商务业务的飞速发展，急剧刺激了在线支付业务需求的迅猛增长，同时也孕育了网上支付行业的诞生。据我国工信部统计，截止2010年底，我国网上支付市场规模已经突破了5000亿元大关。巨大的市场诱惑力和广阔的市场前景，诱发了数量众多的第三方支付公司的诞生。根据工商部门资料显示，目前我国已经有400余家企业经营范围涵盖了第三方支付业务。而从事第三方支付业务能否为客户提供便捷安全的服务，很大程度上决定于第三方支付企业与银行间的合作关系。现在我国电子商务网上支付业务最大的障碍已经不再是技术限制，而是如何形成一个良性的商业循环体系。而在线支付正是电子商务良性循环体系的核心所在，在线支付将电子商务的商家、消费者、银行、第三方支付公司，以及网络运营商等多有涉及电子商务的各个对象联系到了一起，只有各个对象联合发展、和谐发展最终才能够实现电子商务的同创共赢。', '1480507263');
INSERT INTO `beauty_foote` VALUES ('17', '售后服务', '0', '17', '1', '1480495822', null, null, null);
INSERT INTO `beauty_foote` VALUES ('18', '售后政策', '17', '17,18', '1', '1480507322', '售后政策', '    电商以低价的优势，展开了与实体店激烈的抗衡。消费者在能得到实惠的前提下，更注重的是产品的质量和售后，所以电商和线下实体店一样，完善的售后服务必将会为企业赢得更多的回头客，创造更大的利润空间。而电商的模式也造就了它的售后会有很多不尽人意的地方，如何应对和完善也成为电商们首要解决的问题。\n　　一、物流造成的售后问题\n　　随着电商的兴起，也成就了物流业的繁荣，能抓住这有利时机，做好配送服务，创造盈利的物流，其配送体系必须有一个强大的信息系统来支撑，而在服务方面，也要加强产品包装避免破损率，因物流中产品破损造成的退换货产生的物流费用，即使不需要消费者承担，来回的时间过长，也会降低顾客对电商服务的满意度，特别是电商节日促销的“火爆”，也成了对物流的最大考验，更看出各物流在应对销售旺季的及时调配还做的不够完善。物流成电商成败之关键，物流的各项配套服务也需要更大的提升，来适应电商的发展。\n　　二、产品质量造成的售后问题\n　　质量是企业生存之根本，产品质量做的不好，注定是走不长久的，价格不贵的商品，即使有些消费者因怕麻烦不再调换，也会下次再也不会来商家购物，商家失去的不只是表面的这一个顾客，还有这一个顾客背后的更多资源。所以产品质量的把关是非常重要的，可能因为质检的一点忽视，就给商家造成更多的损失，退换货的运费是一方面，品牌在顾客心中树立的形象才是商家更需要珍惜的。\n　　三、服务人员的整体素质造成的售后问题\n　　对于企业一线人员的服务素质，所能带来的价值，从这几年，品牌入驻商超的导购人员就可以看出来，同等品质的两个品牌，有导购人员的会比没有的销售好几倍，而一个品牌，轮流值班的两个导购员，从一个月的报表里看，销售业绩能相差到10%-40%，这就可以看出导购人员的销售技巧、反应能力和主动销售意识等的强弱，所带来的成交率是相差很大的。电商也是一样，在线客服对产品不专业不熟悉，不能让顾客疑问及时得到解答，就很容易失去一个准客户，因为服务人员对产品不熟悉，造成客户买的产品不合适引起退换货的，或仓库发错货的，首先都会给顾客造成很多不便，后续的售后处理得当还能维护一个顾客，反之必会失去一部分顾客。\n　　电商的售后服务，消费者期待更高的提升，而商家也希望用服务来增强顾客的体验度，在多样化的服务前提下，做好最基本的质量第一，用心服务，企业才能走的更高更远。   ', '1480507322');
INSERT INTO `beauty_foote` VALUES ('19', '价格保护', '17', '17,19', '1', '1480500302', '价格保护', '    手机、电视价格大战如火如荼，早前的促销活动还没结束，新的活动就已出炉，所以“一买完就降价”，这种倒霉事不少人都遇到过。为此，不少电商平台推出了“价格保护”措施，声称可对一定时间范围内的降价行为进行补偿。这事儿听起来不错，但要想享受这个服务，把补偿拿到手，就没那么容易了。\n  如果今天我们不提及“价格保护”，恐怕许多人都不知道电商还有这么一项服务。在推出早期，电商的宣传力度很大，甚至会在产品展示图上打上大大的LOGO，但装进口袋的钱想要它再掏出来，显然不是件容易的事，所以电商现在采取的做法是“低调”处理。就拿京东来说，在整个购物的过程中没有任何关于“价格保护”的提示，购物完成后在“我的订单”中，也没有快捷按钮，除非你留意到左侧边栏“客服服务”下的菜单，点击进入后才能申请这项服务。而苏宁易购的做法更甚，在产品页面以及“我的易购”一二级页面中，根本找不到价格保护的链接，只有主动去找客服申请，才能有说法，否则就当自动放弃。     ', '1480507686');
INSERT INTO `beauty_foote` VALUES ('20', '取消订单', '17', '17,20', '1', '1480500329', '取消订单', '1、先点击取消订单按钮\n\n2、填写取消订单的原因\n\n3、订单取消之后可以对该订单进行删除\n\n4、取消订单将对用户的利益非常有利\n\n5、将用户的利益放到最高地位\n', '1480507621');
INSERT INTO `beauty_foote` VALUES ('21', '特色服务', '0', '21', '1', '1480500357', null, null, null);
INSERT INTO `beauty_foote` VALUES ('22', '延保服务', '21', '21,22', '1', '1480500371', '延保服务', '    作为最早进入国内的海外电商，亚马逊在价格战方面与本土电商可谓是旗鼓相当，几乎从未落入下风。数次价格大战当中，与本土电商可谓是互有胜负。而就延保服务来看，亚马逊同样保持了“互有胜负”的市场风格。以诺基亚Lumia 520T手机为例，其延保1年的费用是75元，这个价格与本土电商相比，并不算高，甚至还算是偏低水平。不过值得注意的是，亚马逊只提供延保购买服务，却并不提供“意外险”购买服务，这方面就明显弱于了本土电商。\n　　所谓“意外险”服务，其实就是针对那些因为液体意外泼溅或渗入、意外坠落或其它类似碰撞、意外的外力挤压、异常的电流冲击（也被称之为电涌）所造成的数码类产品物理损坏，予以完全免费或极少收费的维修服务。虽然各大电商对于“意外险”的具体定义还有所差异，但是以上的几种情况基本上实现了“通用”，都包括在“意外险”的条款当中。对于经常公务出差的商旅人士和住宿环境恶劣的学生群体来说，“意外”其实是再平常不过的事情。有鉴于此，无法提供意外险服务的亚马逊，在吸引上述两大购买群体时就显得有些势单力薄了。\n ', '1480507809');

-- ----------------------------
-- Table structure for `beauty_footprint`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_footprint`;
CREATE TABLE `beauty_footprint` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(10) unsigned NOT NULL COMMENT '是商品id',
  `goodsname` varchar(255) DEFAULT NULL,
  `imageurl` varchar(255) DEFAULT NULL,
  `imagename` varchar(255) DEFAULT NULL,
  `saleprice` float(10,2) DEFAULT NULL,
  `addtime` varchar(255) DEFAULT NULL COMMENT '浏览时间',
  `mid` int(11) unsigned DEFAULT NULL COMMENT '用户id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=228 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_footprint
-- ----------------------------
INSERT INTO `beauty_footprint` VALUES ('3', '24', '正品拉芳 洗护套装神器包邮植物去屑洗发水+护发素止痒控油洗头膏', '2016-11-10/', '58243f254f07d.jpg', '49.90', '1480664375', '6');
INSERT INTO `beauty_footprint` VALUES ('23', '61', '御泥坊清爽平衡矿物爽肤水150ml补水清爽控油清洁收缩毛孔化妆水', '2016-11-10/', '582458a804e2e.jpg', '69.00', '1478934635', '34');
INSERT INTO `beauty_footprint` VALUES ('24', '65', '雅诗兰黛香水正品 欢沁清悦淡香氛50ml 女士 清新淡香', '2016-11-10/', '58245b07e14a0.jpg', '332.00', '1480596223', '5');
INSERT INTO `beauty_footprint` VALUES ('25', '62', '雅诗兰黛口红 花漾倾慕丰唇膏 玻尿酸持久保湿滋养', '2016-11-10/', '58245935bdf8a.jpg', '128.00', '1478831637', '6');
INSERT INTO `beauty_footprint` VALUES ('26', '65', '雅诗兰黛香水正品 欢沁清悦淡香氛50ml 女士 清新淡香', '2016-11-10/', '58245b07e14a0.jpg', '332.00', '1478837115', '34');
INSERT INTO `beauty_footprint` VALUES ('27', '70', '雅诗兰黛面膜 多效智妍面膜75ml 舒缓肌肤 润养赋活', '2016-11-10/', '58245cfb44719.jpg', '222.00', '1478835241', '9');
INSERT INTO `beauty_footprint` VALUES ('28', '65', '雅诗兰黛香水正品 欢沁清悦淡香氛50ml 女士 清新淡香', '2016-11-10/', '58245b07e14a0.jpg', '332.00', '1478835276', '9');
INSERT INTO `beauty_footprint` VALUES ('29', '53', '御泥坊红石榴套装4件套四件套女美白抗皱亮肤补水保湿护肤品包邮', '2016-11-10/', '58245374d70ed.jpg', '222.00', '1478835513', '9');
INSERT INTO `beauty_footprint` VALUES ('30', '34', '胜韩束曼诗贝丹玻尿酸面部精华水', '2016-11-10/', '582446795c0f0.jpg', '59.00', '1480592786', '34');
INSERT INTO `beauty_footprint` VALUES ('31', '53', '御泥坊红石榴套装4件套四件套女美白抗皱亮肤补水保湿护肤品包邮', '2016-11-10/', '58245374d70ed.jpg', '222.00', '1478859818', '34');
INSERT INTO `beauty_footprint` VALUES ('32', '52', '御泥坊美白睡眠面膜护肤品套装补水保湿亮肤色清洁乳液正品包邮', '2016-11-10/', '5824531ae3f64.jpg', '399.00', '1478934675', '34');
INSERT INTO `beauty_footprint` VALUES ('33', '39', '御泥坊自然栌斗泥面膜男女通用', '2016-11-10/', '58244c95271e3.jpg', '99.00', '1480592825', '34');
INSERT INTO `beauty_footprint` VALUES ('34', '51', '御泥坊黑玫瑰美白去黄蚕丝睡眠面膜水乳套装秋冬亮肤补水保湿淡斑', '2016-11-10/', '58245289ef5d9.jpg', '159.00', '1478934656', '34');
INSERT INTO `beauty_footprint` VALUES ('35', '34', '胜韩束曼诗贝丹玻尿酸面部精华水', '2016-11-10/', '582446795c0f0.jpg', '59.00', '1480580171', '9');
INSERT INTO `beauty_footprint` VALUES ('36', '69', '雅诗兰黛白金眼霜 白金级奢宠润养眼霜15ml 提拉紧致 淡化细纹', '2016-11-10/', '58245c8c2d29f.jpg', '222.00', '1478931336', '34');
INSERT INTO `beauty_footprint` VALUES ('37', '38', '御泥坊玫瑰滋养睡眠面膜 免洗补水保湿锁水滋润护肤化妆正品男女', '2016-11-10/', '58244bc4567ec.jpg', '39.00', '1478837047', '34');
INSERT INTO `beauty_footprint` VALUES ('38', '32', '韩束超能精华水80ml 乳液 美白补水保湿', '2016-11-10/', '582445a3d6cf5.jpg', '89.00', '1478837055', '34');
INSERT INTO `beauty_footprint` VALUES ('39', '29', '韩束墨菊眼霜眼部精华淡化细纹黑眼圈眼', '2016-11-10/', '582442c1a5ed6.jpg', '100.00', '1478837083', '34');
INSERT INTO `beauty_footprint` VALUES ('40', '53', '御泥坊红石榴套装4件套四件套女美白抗皱亮肤补水保湿护肤品包邮', '2016-11-10/', '58245374d70ed.jpg', '222.00', '1478843517', '6');
INSERT INTO `beauty_footprint` VALUES ('42', '53', '御泥坊红石榴套装4件套四件套女美白抗皱亮肤补水保湿护肤品包邮', '2016-11-10/', '58245374d70ed.jpg', '222.00', '1479015451', '5');
INSERT INTO `beauty_footprint` VALUES ('44', '60', '御泥坊男士深海水动力洁面乳 温和洁净水润保湿不紧绷面部护理', '2016-11-10/', '582456106f194.jpg', '39.90', '1478845224', '34');
INSERT INTO `beauty_footprint` VALUES ('45', '59', '御泥坊男士黑茶控油矿物洁面乳深层清洁淡化黑头收毛孔洗面奶正品', '2016-11-10/', '582455d8264a8.jpg', '39.90', '1478845228', '34');
INSERT INTO `beauty_footprint` VALUES ('46', '44', '御泥坊美白嫩肤护肤套装补水保湿滋润提亮肤色秋冬正', '2016-11-10/', '58244ee7ac2d1.jpg', '99.00', '1478846396', '34');
INSERT INTO `beauty_footprint` VALUES ('48', '50', '御泥坊 矿物养肤霜(滋润型) 补水保湿滋润营养面霜正品正品包邮', '2016-11-10/', '582451f864203.jpg', '208.00', '1478934592', '34');
INSERT INTO `beauty_footprint` VALUES ('49', '72', '卡姿兰睫毛膏防水不晕染 大眼睛多效睫毛膏纤长浓密卷翘 包邮', '2016-11-10/', '58245e2547df7.jpg', '36.00', '1478922202', '34');
INSERT INTO `beauty_footprint` VALUES ('62', '23', '韩束红bb霜 墨菊深度保湿遮瑕强素颜霜亮肤', '2016-11-10/', '58243edbd063e.jpg', '89.00', '1478857844', '5');
INSERT INTO `beauty_footprint` VALUES ('63', '49', '御泥坊银杏亮采焕肤睡眠套装 补水保湿提亮肤色 美白嫩肤淡斑正品', '2016-11-10/', '582451482c714.jpg', '159.00', '1480594014', '34');
INSERT INTO `beauty_footprint` VALUES ('64', '33', '韩束墨菊深度补水精华水30ml保湿补水', '2016-11-10/', '58244628948c5.jpg', '99.00', '1479283395', '34');
INSERT INTO `beauty_footprint` VALUES ('65', '73', '正品 卡姿兰眉粉 包邮防水防汗眉笔持久不脱妆染画眉膏送眉卡', '2016-11-10/', '58245eb553e4e.jpg', '45.00', '1478859879', '34');
INSERT INTO `beauty_footprint` VALUES ('66', '73', '正品 卡姿兰眉粉 包邮防水防汗眉笔持久不脱妆染画眉膏送眉卡', '2016-11-10/', '58245eb553e4e.jpg', '45.00', '1478914144', '9');
INSERT INTO `beauty_footprint` VALUES ('67', '72', '卡姿兰睫毛膏防水不晕染 大眼睛多效睫毛膏纤长浓密卷翘 包邮', '2016-11-10/', '58245e2547df7.jpg', '36.00', '1479985398', '9');
INSERT INTO `beauty_footprint` VALUES ('68', '37', '韩束韩粉世家天然水润不易脱色口红', '2016-11-10/', '582448445930d.jpg', '99.00', '1478915539', '9');
INSERT INTO `beauty_footprint` VALUES ('69', '75', '卡姿兰口红正品金致胶原美芯唇膏br05东京樱持久保湿豆沙健康粉红', '2016-11-10/', '58245f471f7c8.jpg', '83.00', '1478921987', '34');
INSERT INTO `beauty_footprint` VALUES ('72', '48', '御泥坊红石榴矿物补水亮肤去黄10件套装亮肤保湿抗氧化去黄护肤品', '2016-11-10/', '582450e911f7c.jpg', '189.00', '1478934669', '34');
INSERT INTO `beauty_footprint` VALUES ('73', '70', '雅诗兰黛面膜 多效智妍面膜75ml 舒缓肌肤 润养赋活', '2016-11-10/', '58245cfb44719.jpg', '222.00', '1478934661', '34');
INSERT INTO `beauty_footprint` VALUES ('74', '76', '卡姿兰BB霜专柜正品 焕采水润无瑕BB霜 遮瑕隔离保湿美白控油裸妆', '2016-11-10/', '5824602860665.jpg', '223.00', '1478934627', '34');
INSERT INTO `beauty_footprint` VALUES ('75', '66', '雅诗兰黛套装 多效智妍精华霜+智妍眼霜 深层滋养', '2016-11-10/', '58245bb0502e0.jpg', '146.00', '1478934681', '34');
INSERT INTO `beauty_footprint` VALUES ('79', '3', '韩束墨菊巨补水秋冬化妆品保湿补水美白滋润乳液爽肤水护肤品套装', '2016-11-10/', '582430ff31b4b.jpg', '140.00', '1480663134', '5');
INSERT INTO `beauty_footprint` VALUES ('81', '44', '御泥坊美白嫩肤护肤套装补水保湿滋润提亮肤色秋冬正', '2016-11-10/', '58244ee7ac2d1.jpg', '99.00', '1479015463', '5');
INSERT INTO `beauty_footprint` VALUES ('82', '8', '韩束雪莲玻尿酸补水亮肤蚕丝巨补水面膜', '2016-11-10/', '58243529a3799.jpg', '89.00', '1480067898', '5');
INSERT INTO `beauty_footprint` VALUES ('86', '38', '御泥坊玫瑰滋养睡眠面膜 免洗补水保湿锁水滋润护肤化妆正品男女', '2016-11-10/', '58244bc4567ec.jpg', '39.00', '1480663161', '5');
INSERT INTO `beauty_footprint` VALUES ('87', '7', '韩束红石榴面膜贴 美白祛黄保湿紧致修复补水秋冬补水面膜', '2016-11-10/', '582434a1ae459.jpg', '89.00', '1480322568', '5');
INSERT INTO `beauty_footprint` VALUES ('88', '39', '御泥坊自然栌斗泥面膜男女通用', '2016-11-10/', '58244c95271e3.jpg', '99.00', '1479379355', '5');
INSERT INTO `beauty_footprint` VALUES ('89', '67', '雅诗兰黛小棕瓶眼霜+修护精华套装 补水保湿', '2016-11-10/', '58245c09d7382.jpg', '103.00', '1480322907', '5');
INSERT INTO `beauty_footprint` VALUES ('93', '33', '韩束墨菊深度补水精华水30ml保湿补水', '2016-11-10/', '58244628948c5.jpg', '99.00', '1479458666', '16');
INSERT INTO `beauty_footprint` VALUES ('94', '38', '御泥坊玫瑰滋养睡眠面膜 免洗补水保湿锁水滋润护肤化妆正品男女', '2016-11-10/', '58244bc4567ec.jpg', '39.00', '1479460389', '16');
INSERT INTO `beauty_footprint` VALUES ('99', '6', '韩束玻尿酸补水面膜亮肤蚕丝紧致弹润面膜贴保湿美白晒后修复正品', '2016-11-10/', '58243439b4a1e.jpg', '69.00', '1479466703', '38');
INSERT INTO `beauty_footprint` VALUES ('100', '22', '拉芳洗发水750m顺去屑止痒清爽控油顺滑', '2016-11-10/', '58243d572cbec.jpg', '40.00', '1479532157', '38');
INSERT INTO `beauty_footprint` VALUES ('101', '59', '御泥坊男士黑茶控油矿物洁面乳深层清洁淡化黑头收毛孔洗面奶正品', '2016-11-10/', '582455d8264a8.jpg', '39.90', '1479466747', '35');
INSERT INTO `beauty_footprint` VALUES ('102', '5', '韩束伊然美丽赋活九件套装依然美白补水四件套抗皱紧致化妆品正品', '2016-11-10/', '58243202b92a9.jpg', '469.00', '1479467218', '16');
INSERT INTO `beauty_footprint` VALUES ('103', '2', '韩束紫竹控油八件套装女士洗面奶爽肤水乳液抗痘祛痘补水正品包邮', '2016-11-10/', '5824308e9b4fc.jpg', '389.00', '1479467433', '16');
INSERT INTO `beauty_footprint` VALUES ('104', '38', '御泥坊玫瑰滋养睡眠面膜 免洗补水保湿锁水滋润护肤化妆正品男女', '2016-11-10/', '58244bc4567ec.jpg', '39.00', '1479468444', '37');
INSERT INTO `beauty_footprint` VALUES ('105', '40', '御泥坊矿物养肤霜滋润型50g补水锁水保湿持久面霜秋冬 护肤品男女', '2016-11-10/', '58244d013225f.jpg', '85.00', '1480506998', '37');
INSERT INTO `beauty_footprint` VALUES ('109', '65', '雅诗兰黛香水正品 欢沁清悦淡香氛50ml 女士 清新淡香', '2016-11-10/', '58245b07e14a0.jpg', '332.00', '1479534540', '38');
INSERT INTO `beauty_footprint` VALUES ('112', '62', '雅诗兰黛口红 花漾倾慕丰唇膏 玻尿酸持久保湿滋养', '2016-11-10/', '58245935bdf8a.jpg', '128.00', '1479534305', '38');
INSERT INTO `beauty_footprint` VALUES ('113', '44', '御泥坊美白嫩肤护肤套装补水保湿滋润提亮肤色秋冬正', '2016-11-10/', '58244ee7ac2d1.jpg', '99.00', '1479538226', '38');
INSERT INTO `beauty_footprint` VALUES ('114', '40', '御泥坊矿物养肤霜滋润型50g补水锁水保湿持久面霜秋冬 护肤品男女', '2016-11-10/', '58244d013225f.jpg', '85.00', '1479540767', '38');
INSERT INTO `beauty_footprint` VALUES ('120', '5', '韩束伊然美丽赋活九件套装依然美白补水四件套抗皱紧致化妆品正品', '2016-11-10/', '58243202b92a9.jpg', '469.00', '1479876499', '34');
INSERT INTO `beauty_footprint` VALUES ('121', '61', '御泥坊清爽平衡矿物爽肤水150ml补水清爽控油清洁收缩毛孔化妆水', '2016-11-10/', '582458a804e2e.jpg', '69.00', '1479882859', '9');
INSERT INTO `beauty_footprint` VALUES ('125', '32', '韩束超能精华水80ml 乳液 美白补水保湿', '2016-11-10/', '582445a3d6cf5.jpg', '89.00', '1479985532', '9');
INSERT INTO `beauty_footprint` VALUES ('128', '72', '卡姿兰睫毛膏防水不晕染 大眼睛多效睫毛膏纤长浓密卷翘 包邮', '2016-11-10/', '58245e2547df7.jpg', '36.00', '1479987606', '5');
INSERT INTO `beauty_footprint` VALUES ('129', '66', '雅诗兰黛套装 多效智妍精华霜+智妍眼霜 深层滋养', '2016-11-10/', '58245bb0502e0.jpg', '146.00', '1480051225', '5');
INSERT INTO `beauty_footprint` VALUES ('130', '64', '雅诗兰黛晶透沁白淡斑晚安膜10g 滋润修护 免洗面膜', '2016-11-10/', '58245a9c0aa5d.jpg', '220.00', '1479991684', '5');
INSERT INTO `beauty_footprint` VALUES ('133', '71', '雅诗兰黛晶透沁白精华露30ml 淡斑淡印 补水保湿', '2016-11-10/', '58245d559ba4a.jpg', '198.00', '1479991582', '5');
INSERT INTO `beauty_footprint` VALUES ('134', '1', '韩束红BB六件套装红石榴套装专柜正品补水美白保湿去黄淡斑化妆品', '2016-11-10/', '5824302e8ff5f.jpg', '199.00', '1480322987', '5');
INSERT INTO `beauty_footprint` VALUES ('135', '32', '韩束超能精华水80ml 乳液 美白补水保湿', '2016-11-10/', '582445a3d6cf5.jpg', '89.00', '1479991631', '5');
INSERT INTO `beauty_footprint` VALUES ('136', '63', '雅诗兰黛晶透沁白淡斑晚安膜8g 滋润修护 免洗面膜', '2016-11-10/', '58245a23c0517.jpg', '223.00', '1480580269', '5');
INSERT INTO `beauty_footprint` VALUES ('141', '24', '正品拉芳 洗护套装神器包邮植物去屑洗发水+护发素止痒控油洗头膏', '2016-11-10/', '58243f254f07d.jpg', '49.90', '1480051199', '5');
INSERT INTO `beauty_footprint` VALUES ('142', '34', '胜韩束曼诗贝丹玻尿酸面部精华水', '2016-11-10/', '582446795c0f0.jpg', '59.00', '1480324266', '35');
INSERT INTO `beauty_footprint` VALUES ('143', '66', '雅诗兰黛套装 多效智妍精华霜+智妍眼霜 深层滋养', '2016-11-10/', '58245bb0502e0.jpg', '146.00', '1480052170', '35');
INSERT INTO `beauty_footprint` VALUES ('145', '28', '韩束兰花活力眼霜15g去黑眼圈眼袋', '2016-11-10/', '58244256b2599.jpg', '89.00', '1480294839', '34');
INSERT INTO `beauty_footprint` VALUES ('146', '31', '新品韩束一叶子明目眼霜', '2016-11-10/', '5824439c03346.jpg', '89.00', '1480128221', '35');
INSERT INTO `beauty_footprint` VALUES ('147', '26', '韩束墨菊巨补水女 爽肤水', '2016-11-10/', '58243fe1a5e76.jpg', '89.00', '1480057378', '35');
INSERT INTO `beauty_footprint` VALUES ('148', '37', '韩束韩粉世家天然水润不易脱色口红', '2016-11-10/', '582448445930d.jpg', '99.00', '1480591953', '35');
INSERT INTO `beauty_footprint` VALUES ('151', '4', '韩束雪白肌护肤品套装女 秋冬补水化妆品套装正品', '2016-11-10/', '5824317e7ac5c.jpg', '279.00', '1480056783', '35');
INSERT INTO `beauty_footprint` VALUES ('153', '55', '御泥坊男士深海水动力面膜15片美白保湿补水提亮肤色去黑头护肤品', '2016-11-10/', '58245418bf77c.jpg', '79.00', '1480067881', '5');
INSERT INTO `beauty_footprint` VALUES ('154', '73', '正品 卡姿兰眉粉 包邮防水防汗眉笔持久不脱妆染画眉膏送眉卡', '2016-11-10/', '58245eb553e4e.jpg', '45.00', '1480128010', '35');
INSERT INTO `beauty_footprint` VALUES ('155', '72', '卡姿兰睫毛膏防水不晕染 大眼睛多效睫毛膏纤长浓密卷翘 包邮', '2016-11-10/', '58245e2547df7.jpg', '36.00', '1480394509', '35');
INSERT INTO `beauty_footprint` VALUES ('156', '67', '雅诗兰黛小棕瓶眼霜+修护精华套装 补水保湿', '2016-11-10/', '58245c09d7382.jpg', '103.00', '1480131961', '9');
INSERT INTO `beauty_footprint` VALUES ('157', '4', '韩束雪白肌护肤品套装女 秋冬补水化妆品套装正品', '2016-11-10/', '5824317e7ac5c.jpg', '279.00', '1480580260', '5');
INSERT INTO `beauty_footprint` VALUES ('158', '47', '御泥坊旅行套装 玫瑰红石榴美白清爽 补水保湿控油收毛孔亮肤去黄', '2016-11-10/', '5824507f12325.jpg', '89.90', '1480134132', '5');
INSERT INTO `beauty_footprint` VALUES ('159', '4', '韩束雪白肌护肤品套装女 秋冬补水化妆品套装正品', '2016-11-10/', '5824317e7ac5c.jpg', '279.00', '1480415816', '8');
INSERT INTO `beauty_footprint` VALUES ('160', '31', '新品韩束一叶子明目眼霜', '2016-11-10/', '5824439c03346.jpg', '89.00', '1480226898', '8');
INSERT INTO `beauty_footprint` VALUES ('161', '1', '韩束红BB六件套装红石榴套装专柜正品补水美白保湿去黄淡斑化妆品', '2016-11-10/', '5824302e8ff5f.jpg', '199.00', '1480663790', '8');
INSERT INTO `beauty_footprint` VALUES ('162', '69', '雅诗兰黛白金眼霜 白金级奢宠润养眼霜15ml 提拉紧致 淡化细纹', '2016-11-10/', '58245c8c2d29f.jpg', '222.00', '1480233449', '8');
INSERT INTO `beauty_footprint` VALUES ('163', '34', '胜韩束曼诗贝丹玻尿酸面部精华水', '2016-11-10/', '582446795c0f0.jpg', '59.00', '1480591006', '8');
INSERT INTO `beauty_footprint` VALUES ('164', '47', '御泥坊旅行套装 玫瑰红石榴美白清爽 补水保湿控油收毛孔亮肤去黄', '2016-11-10/', '5824507f12325.jpg', '89.90', '1480234033', '8');
INSERT INTO `beauty_footprint` VALUES ('165', '29', '韩束墨菊眼霜眼部精华淡化细纹黑眼圈眼', '2016-11-10/', '582442c1a5ed6.jpg', '100.00', '1480418362', '8');
INSERT INTO `beauty_footprint` VALUES ('166', '26', '韩束墨菊巨补水女 爽肤水', '2016-11-10/', '58243fe1a5e76.jpg', '89.00', '1480240973', '8');
INSERT INTO `beauty_footprint` VALUES ('167', '7', '韩束红石榴面膜贴 美白祛黄保湿紧致修复补水秋冬补水面膜', '2016-11-10/', '582434a1ae459.jpg', '89.00', '1480414508', '8');
INSERT INTO `beauty_footprint` VALUES ('168', '65', '雅诗兰黛香水正品 欢沁清悦淡香氛50ml 女士 清新淡香', '2016-11-10/', '58245b07e14a0.jpg', '332.00', '1480238894', '8');
INSERT INTO `beauty_footprint` VALUES ('169', '6', '韩束玻尿酸补水面膜亮肤蚕丝紧致弹润面膜贴保湿美白晒后修复正品', '2016-11-10/', '58243439b4a1e.jpg', '69.00', '1480415515', '8');
INSERT INTO `beauty_footprint` VALUES ('170', '71', '雅诗兰黛晶透沁白精华露30ml 淡斑淡印 补水保湿', '2016-11-10/', '58245d559ba4a.jpg', '198.00', '1480238951', '8');
INSERT INTO `beauty_footprint` VALUES ('171', '42', '御泥坊红石榴矿物蚕丝面膜贴21片30ml 深层保湿补水提亮抗氧化', '2016-11-10/', '58244e29c3673.jpg', '79.00', '1480639835', '8');
INSERT INTO `beauty_footprint` VALUES ('172', '68', '雅诗兰黛白金眼霜 白金级紧颜眼部修护精华露15ml 淡化细纹 保湿', '2016-11-10/', '58245c465d42f.jpg', '255.00', '1480238984', '8');
INSERT INTO `beauty_footprint` VALUES ('173', '27', '韩束化妆品 兰花补水保湿滋养抗氧化 乳液', '2016-11-10/', '58244047e0375.jpg', '49.00', '1480241179', '8');
INSERT INTO `beauty_footprint` VALUES ('174', '33', '韩束墨菊深度补水精华水30ml保湿补水', '2016-11-10/', '58244628948c5.jpg', '99.00', '1480577125', '8');
INSERT INTO `beauty_footprint` VALUES ('175', '74', '卡姿兰口红持久保湿不易脱色滋润不干豆沙色咬唇妆唇膏正品送小样', '2016-11-10/', '58245ef7ec311.jpg', '69.00', '1480240979', '8');
INSERT INTO `beauty_footprint` VALUES ('176', '75', '卡姿兰口红正品金致胶原美芯唇膏br05东京樱持久保湿豆沙健康粉红', '2016-11-10/', '58245f471f7c8.jpg', '83.00', '1480578527', '8');
INSERT INTO `beauty_footprint` VALUES ('177', '16', '韩束墨菊巨补水保湿水润芦荟胶面霜 ', '2016-11-10/', '58243925e57ad.jpg', '49.00', '1480293479', '5');
INSERT INTO `beauty_footprint` VALUES ('178', '31', '新品韩束一叶子明目眼霜', '2016-11-10/', '5824439c03346.jpg', '89.00', '1480293525', '5');
INSERT INTO `beauty_footprint` VALUES ('179', '70', '雅诗兰黛面膜 多效智妍面膜75ml 舒缓肌肤 润养赋活', '2016-11-10/', '58245cfb44719.jpg', '222.00', '1480594819', '5');
INSERT INTO `beauty_footprint` VALUES ('180', '49', '御泥坊银杏亮采焕肤睡眠套装 补水保湿提亮肤色 美白嫩肤淡斑正品', '2016-11-10/', '582451482c714.jpg', '159.00', '1480323440', '5');
INSERT INTO `beauty_footprint` VALUES ('181', '49', '御泥坊银杏亮采焕肤睡眠套装 补水保湿提亮肤色 美白嫩肤淡斑正品', '2016-11-10/', '582451482c714.jpg', '159.00', '1480593819', '8');
INSERT INTO `beauty_footprint` VALUES ('182', '0', null, null, null, null, '1480501367', '5');
INSERT INTO `beauty_footprint` VALUES ('183', '3', '韩束墨菊巨补水秋冬化妆品保湿补水美白滋润乳液爽肤水护肤品套装', '2016-11-10/', '582430ff31b4b.jpg', '140.00', '1480663771', '8');
INSERT INTO `beauty_footprint` VALUES ('184', '55', '御泥坊男士深海水动力面膜15片美白保湿补水提亮肤色去黑头护肤品', '2016-11-10/', '58245418bf77c.jpg', '79.00', '1480331965', '8');
INSERT INTO `beauty_footprint` VALUES ('185', '76', '卡姿兰BB霜专柜正品 焕采水润无瑕BB霜 遮瑕隔离保湿美白控油裸妆', '2016-11-10/', '5824602860665.jpg', '223.00', '1480578538', '8');
INSERT INTO `beauty_footprint` VALUES ('186', '44', '御泥坊美白嫩肤护肤套装补水保湿滋润提亮肤色秋冬正', '2016-11-10/', '58244ee7ac2d1.jpg', '99.00', '1480476616', '8');
INSERT INTO `beauty_footprint` VALUES ('187', '63', '雅诗兰黛晶透沁白淡斑晚安膜8g 滋润修护 免洗面膜', '2016-11-10/', '58245a23c0517.jpg', '223.00', '1480334368', '35');
INSERT INTO `beauty_footprint` VALUES ('188', '27', '韩束化妆品 兰花补水保湿滋养抗氧化 乳液', '2016-11-10/', '58244047e0375.jpg', '49.00', '1480665623', '35');
INSERT INTO `beauty_footprint` VALUES ('189', '29', '韩束墨菊眼霜眼部精华淡化细纹黑眼圈眼', '2016-11-10/', '582442c1a5ed6.jpg', '100.00', '1480394549', '35');
INSERT INTO `beauty_footprint` VALUES ('190', '32', '韩束超能精华水80ml 乳液 美白补水保湿', '2016-11-10/', '582445a3d6cf5.jpg', '89.00', '1480394925', '35');
INSERT INTO `beauty_footprint` VALUES ('191', '5', '韩束伊然美丽赋活九件套装依然美白补水四件套抗皱紧致化妆品正品', '2016-11-10/', '58243202b92a9.jpg', '469.00', '1480663717', '8');
INSERT INTO `beauty_footprint` VALUES ('192', '8', '韩束雪莲玻尿酸补水亮肤蚕丝巨补水面膜', '2016-11-10/', '58243529a3799.jpg', '89.00', '1480417101', '8');
INSERT INTO `beauty_footprint` VALUES ('193', '0', null, null, null, null, '1480417582', '8');
INSERT INTO `beauty_footprint` VALUES ('194', '48', '御泥坊红石榴矿物补水亮肤去黄10件套装亮肤保湿抗氧化去黄护肤品', '2016-11-10/', '582450e911f7c.jpg', '189.00', '1480467813', '8');
INSERT INTO `beauty_footprint` VALUES ('195', '24', '正品拉芳 洗护套装神器包邮植物去屑洗发水+护发素止痒控油洗头膏', '2016-11-10/', '58243f254f07d.jpg', '49.00', '1480664338', '8');
INSERT INTO `beauty_footprint` VALUES ('196', '9', '韩束一叶子补水美白保湿淡斑面膜 专柜正品', '2016-11-10/', '582435af18f51.jpg', '69.00', '1480482133', '35');
INSERT INTO `beauty_footprint` VALUES ('197', '25', '韩束红石榴爽肤水化妆水补水保湿', '2016-11-10/', '58243f8dac8b3.jpg', '99.00', '1480482292', '35');
INSERT INTO `beauty_footprint` VALUES ('198', '2', '韩束紫竹控油八件套装女士洗面奶爽肤水乳液抗痘祛痘补水正品包邮', '2016-11-10/', '5824308e9b4fc.jpg', '389.00', '1480487099', '5');
INSERT INTO `beauty_footprint` VALUES ('199', '25', '韩束红石榴爽肤水化妆水补水保湿', '2016-11-10/', '58243f8dac8b3.jpg', '99.00', '1480577020', '8');
INSERT INTO `beauty_footprint` VALUES ('200', '42', '御泥坊红石榴矿物蚕丝面膜贴21片30ml 深层保湿补水提亮抗氧化', '2016-11-10/', '58244e29c3673.jpg', '79.00', '1480571239', '5');
INSERT INTO `beauty_footprint` VALUES ('201', '29', '韩束墨菊眼霜眼部精华淡化细纹黑眼圈眼', '2016-11-10/', '582442c1a5ed6.jpg', '100.00', '1480571342', '5');
INSERT INTO `beauty_footprint` VALUES ('202', '55', '御泥坊男士深海水动力面膜15片美白保湿补水提亮肤色去黑头护肤品', '2016-11-10/', '58245418bf77c.jpg', '79.00', '1480575154', '6');
INSERT INTO `beauty_footprint` VALUES ('203', '71', '雅诗兰黛晶透沁白精华露30ml 淡斑淡印 补水保湿', '2016-11-10/', '58245d559ba4a.jpg', '198.00', '1480575415', '6');
INSERT INTO `beauty_footprint` VALUES ('204', '72', '卡姿兰睫毛膏防水不晕染 大眼睛多效睫毛膏纤长浓密卷翘 包邮', '2016-11-10/', '58245e2547df7.jpg', '36.00', '1480577663', '8');
INSERT INTO `beauty_footprint` VALUES ('205', '37', '韩束韩粉世家天然水润不易脱色口红', '2016-11-10/', '582448445930d.jpg', '99.00', '1480590369', '8');
INSERT INTO `beauty_footprint` VALUES ('206', '20', '韩束粉BB霜 妆遮瑕强持久隔离亮白补水', '2016-11-10/', '58243bc0e3133.jpg', '89.00', '1480580484', '35');
INSERT INTO `beauty_footprint` VALUES ('207', '23', '韩束红bb霜 墨菊深度保湿遮瑕强素颜霜亮肤', '2016-11-10/', '58243edbd063e.jpg', '89.00', '1480581992', '35');
INSERT INTO `beauty_footprint` VALUES ('208', '73', '正品 卡姿兰眉粉 包邮防水防汗眉笔持久不脱妆染画眉膏送眉卡', '2016-11-10/', '58245eb553e4e.jpg', '45.00', '1480583792', '5');
INSERT INTO `beauty_footprint` VALUES ('209', '44', '御泥坊美白嫩肤护肤套装补水保湿滋润提亮肤色秋冬正', '2016-11-10/', '58244ee7ac2d1.jpg', '99.00', '1480588592', '6');
INSERT INTO `beauty_footprint` VALUES ('210', '47', '御泥坊旅行套装 玫瑰红石榴美白清爽 补水保湿控油收毛孔亮肤去黄', '2016-11-10/', '5824507f12325.jpg', '89.90', '1480585331', '6');
INSERT INTO `beauty_footprint` VALUES ('211', '34', '胜韩束曼诗贝丹玻尿酸面部精华水', '2016-11-10/', '582446795c0f0.jpg', '59.00', '1480585365', '6');
INSERT INTO `beauty_footprint` VALUES ('212', '32', '韩束超能精华水80ml 乳液 美白补水保湿', '2016-11-10/', '582445a3d6cf5.jpg', '89.00', '1480589767', '8');
INSERT INTO `beauty_footprint` VALUES ('213', '24', '正品拉芳 洗护套装神器包邮植物去屑洗发水+护发素止痒控油洗头膏', '2016-11-10/', '58243f254f07d.jpg', '49.00', '1480590072', '11');
INSERT INTO `beauty_footprint` VALUES ('214', '5', '韩束伊然美丽赋活九件套装依然美白补水四件套抗皱紧致化妆品正品', '2016-11-10/', '58243202b92a9.jpg', '469.00', '1480590526', '11');
INSERT INTO `beauty_footprint` VALUES ('215', '57', '御泥坊男士黑茶清爽控油矿物泥浆面膜清洁控油淡黑头收缩毛孔护肤', '2016-11-10/', '58245514365a9.jpg', '99.00', '1480590893', '35');
INSERT INTO `beauty_footprint` VALUES ('216', '55', '御泥坊男士深海水动力面膜15片美白保湿补水提亮肤色去黑头护肤品', '2016-11-10/', '58245418bf77c.jpg', '79.00', '1480590929', '35');
INSERT INTO `beauty_footprint` VALUES ('217', '77', '水密码化妆品套装女秋冬季补水保湿美白控油水乳液护肤品正品丹姿', '2016-12-01/', '583f9c8d6cf11.jpg', '179.00', '1480591072', '8');
INSERT INTO `beauty_footprint` VALUES ('218', '53', '御泥坊红石榴套装4件套四件套女美白抗皱亮肤补水保湿护肤品包邮', '2016-11-10/', '58245374d70ed.jpg', '222.00', '1480590954', '35');
INSERT INTO `beauty_footprint` VALUES ('219', '39', '御泥坊自然栌斗泥面膜男女通用', '2016-11-10/', '58244c95271e3.jpg', '99.00', '1480591962', '35');
INSERT INTO `beauty_footprint` VALUES ('220', '49', '御泥坊银杏亮采焕肤睡眠套装 补水保湿提亮肤色 美白嫩肤淡斑正品', '2016-11-10/', '582451482c714.jpg', '159.00', '1480591972', '35');
INSERT INTO `beauty_footprint` VALUES ('221', '39', '御泥坊自然栌斗泥面膜男女通用', '2016-11-10/', '58244c95271e3.jpg', '99.00', '1480592512', '45');
INSERT INTO `beauty_footprint` VALUES ('222', '55', '御泥坊男士深海水动力面膜15片美白保湿补水提亮肤色去黑头护肤品', '2016-11-10/', '58245418bf77c.jpg', '79.00', '1480592521', '45');
INSERT INTO `beauty_footprint` VALUES ('223', '5', '韩束伊然美丽赋活九件套装依然美白补水四件套抗皱紧致化妆品正品', '2016-11-10/', '58243202b92a9.jpg', '469.00', '1480593886', '6');
INSERT INTO `beauty_footprint` VALUES ('224', '77', '水密码化妆品套装女秋冬季补水保湿美白控油水乳液护肤品正品丹姿', '2016-12-01/', '583f9c8d6cf11.jpg', '179.00', '1480594803', '6');
INSERT INTO `beauty_footprint` VALUES ('225', '12', '韩束红石榴水面霜50ml补水保湿养面霜', '2016-11-10/', '5824372f55413.jpg', '79.00', '1480595571', '6');
INSERT INTO `beauty_footprint` VALUES ('226', '1', '韩束红BB六件套装红石榴套装专柜正品补水美白保湿去黄淡斑化妆品', '2016-11-10/', '5824302e8ff5f.jpg', '199.00', '1480664689', '6');
INSERT INTO `beauty_footprint` VALUES ('227', '1', '韩束红BB六件套装红石榴套装专柜正品补水美白保湿去黄淡斑化妆品', '2016-11-10/', '5824302e8ff5f.jpg', '199.00', '1480665815', '35');

-- ----------------------------
-- Table structure for `beauty_golds`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_golds`;
CREATE TABLE `beauty_golds` (
  `id` int(40) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `goodsname` varchar(80) NOT NULL,
  `marketprice` float(7,2) NOT NULL DEFAULT '0.00' COMMENT '市场价格',
  `saleprice` float(7,2) NOT NULL DEFAULT '0.00' COMMENT '销售价格',
  `addtime` int(32) DEFAULT '0' COMMENT '上架时间',
  `imageurl` varchar(50) DEFAULT NULL COMMENT '图片路径',
  `salenum` smallint(10) DEFAULT '0' COMMENT '商品销售数量',
  `cid` smallint(10) NOT NULL COMMENT '商品分类id',
  `bid` smallint(10) NOT NULL COMMENT '商品品牌id',
  `show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1代表展示，0代表下架',
  `num` int(11) NOT NULL DEFAULT '10000' COMMENT '库存量',
  `collectnum` int(11) DEFAULT '0' COMMENT '收藏的数量',
  `description` varchar(255) DEFAULT NULL,
  `imagename` varchar(255) DEFAULT NULL,
  `goodscount` int(11) DEFAULT '0' COMMENT '商品点赞的次数',
  `ml` varchar(255) DEFAULT NULL COMMENT '容量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_golds
-- ----------------------------
INSERT INTO `beauty_golds` VALUES ('1', '韩束红BB六件套装红石榴套装专柜正品补水美白保湿去黄淡斑化妆品', '299.00', '269.00', '1479087192', '2016-11-10/', '100', '1', '1', '1', '10000', '3', '150ml,液体,盒装,任何人群', '5824302e8ff5f.jpg', '26', '200');
INSERT INTO `beauty_golds` VALUES ('2', '韩束紫竹控油八件套装女士洗面奶爽肤水乳液抗痘祛痘补水正品包邮', '399.00', '389.00', '1478766735', '2016-11-10/', '1001', '22', '1', '1', '10000', '3', '150ml,液体,礼盒包装,20-30岁女性', '5824308e9b4fc.jpg', '0', '100');
INSERT INTO `beauty_golds` VALUES ('3', '韩束墨菊巨补水秋冬化妆品保湿补水美白滋润乳液爽肤水护肤品套装', '150.00', '140.00', '1478766847', '2016-11-10/', '800', '18', '1', '1', '10000', '1', '150ml,礼盒包装,液体,20-25岁女性', '582430ff31b4b.jpg', '0', '200');
INSERT INTO `beauty_golds` VALUES ('4', '韩束雪白肌护肤品套装女 秋冬补水化妆品套装正品', '299.00', '279.00', '1479087166', '2016-11-10/', '1', '1', '1', '1', '10000', '0', '160ml,膏状,盒装,任何人群', '5824317e7ac5c.jpg', '0', '150');
INSERT INTO `beauty_golds` VALUES ('5', '韩束伊然美丽赋活九件套装依然美白补水四件套抗皱紧致化妆品正品', '499.00', '469.00', '1478767107', '2016-11-10/', '1', '19', '1', '1', '9999', '0', '200ml,液体,礼盒套装,30-40岁的女性', '58243202b92a9.jpg', '0', '30');
INSERT INTO `beauty_golds` VALUES ('6', '韩束玻尿酸补水面膜亮肤蚕丝紧致弹润面膜贴保湿美白晒后修复正品', '79.00', '69.00', '1478767674', '2016-11-10/', '25', '13', '1', '1', '10000', '2', '25ml,液体,盒装,任何人群', '58243439b4a1e.jpg', '0', '50');
INSERT INTO `beauty_golds` VALUES ('7', '韩束红石榴面膜贴 美白祛黄保湿紧致修复补水秋冬补水面膜', '99.00', '89.00', '1478767778', '2016-11-10/', '1', '13', '1', '1', '9999', '2', '25ml,片裝,礼盒包装,任何人群', '582434a1ae459.jpg', '0', '20');
INSERT INTO `beauty_golds` VALUES ('67', '温碧泉保湿面膜', '88.00', '180.00', '1481004475', '2016-11-25/', '883', '2', '19', '1', '124589', '0', '', '584645d15179f.jpg', '0', '25');
INSERT INTO `beauty_golds` VALUES ('68', '丸美眼霜正品新肌丝滑眼乳霜 淡化细纹提拉紧致眼部补水', '334.00', '200.00', '1481003457', '2016-11-30/', '1000', '92', '8', '1', '24562', '0', '适合任何人群', '584651c153246.jpg', '0', '100');

-- ----------------------------
-- Table structure for `beauty_goods`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_goods`;
CREATE TABLE `beauty_goods` (
  `id` int(40) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `goodsname` varchar(80) NOT NULL,
  `marketprice` float(7,2) NOT NULL DEFAULT '0.00' COMMENT '市场价格',
  `discount` tinyint(4) NOT NULL DEFAULT '0' COMMENT '折扣',
  `saleprice` float(7,2) NOT NULL DEFAULT '0.00' COMMENT '销售价格',
  `addtime` int(32) DEFAULT '0' COMMENT '上架时间',
  `imageurl` varchar(50) DEFAULT NULL COMMENT '图片路径',
  `salenum` smallint(10) DEFAULT '0' COMMENT '商品销售数量',
  `cid` smallint(10) NOT NULL COMMENT '商品分类id',
  `aid` smallint(10) DEFAULT NULL COMMENT '管理员id',
  `bid` smallint(10) unsigned zerofill NOT NULL COMMENT '商品品牌id',
  `show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1代表展示，0代表下架',
  `num` int(11) NOT NULL DEFAULT '10000' COMMENT '库存量',
  `collectnum` int(11) DEFAULT '0' COMMENT '收藏的数量',
  `score` varchar(255) DEFAULT '0' COMMENT '积分',
  `description` varchar(255) DEFAULT NULL,
  `imagename` varchar(255) DEFAULT NULL,
  `goodscount` int(11) DEFAULT '0' COMMENT '商品点赞的次数',
  `ismember` int(11) DEFAULT '0' COMMENT '0指不被专享，1指黄金会员专享',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_goods
-- ----------------------------
INSERT INTO `beauty_goods` VALUES ('1', '韩束红BB六件套装红石榴套装专柜正品补水美白保湿去黄淡斑化妆品', '299.00', '30', '199.00', '1479886708', '2016-11-10/', '6', '1', null, '0000000003', '1', '9988', '3', '10', '150ml,膏状,盒装,任何人群', '5824302e8ff5f.jpg', '30', '0');
INSERT INTO `beauty_goods` VALUES ('2', '韩束紫竹控油八件套装女士洗面奶爽肤水乳液抗痘祛痘补水正品包邮', '399.00', '10', '389.00', '1478766735', '2016-11-10/', '1000', '22', null, '0000000001', '1', '10000', '3', '8', '150ml,液体,礼盒包装,20-30岁女性', '5824308e9b4fc.jpg', '7', '0');
INSERT INTO `beauty_goods` VALUES ('3', '韩束墨菊巨补水秋冬化妆品保湿补水美白滋润乳液爽肤水护肤品套装', '150.00', '10', '140.00', '1478766847', '2016-11-10/', '801', '18', null, '0000000001', '1', '9999', '2', '6', '150ml,礼盒包装,液体,20-25岁女性', '582430ff31b4b.jpg', '10', '0');
INSERT INTO `beauty_goods` VALUES ('4', '韩束雪白肌护肤品套装女 秋冬补水化妆品套装正品', '299.00', '20', '279.00', '1479087166', '2016-11-10/', '1', '1', null, '0000000001', '1', '9999', '1', '8', '160ml,膏状,盒装,任何人群', '5824317e7ac5c.jpg', '6', '0');
INSERT INTO `beauty_goods` VALUES ('5', '韩束伊然美丽赋活九件套装依然美白补水四件套抗皱紧致化妆品正品', '499.00', '30', '469.00', '1478767107', '2016-11-10/', '3', '19', null, '0000000001', '1', '9997', '0', '20', '200ml,液体,礼盒套装,30-40岁的女性', '58243202b92a9.jpg', '7', '0');
INSERT INTO `beauty_goods` VALUES ('6', '韩束玻尿酸补水面膜亮肤蚕丝紧致弹润面膜贴保湿美白晒后修复正品', '79.00', '10', '69.00', '1478767674', '2016-11-10/', '25', '13', null, '0000000001', '1', '10000', '5', '6', '25ml,液体,盒装,任何人群', '58243439b4a1e.jpg', '7', '0');
INSERT INTO `beauty_goods` VALUES ('7', '韩束红石榴面膜贴 美白祛黄保湿紧致修复补水秋冬补水面膜', '99.00', '10', '89.00', '1478767778', '2016-11-10/', '1', '13', null, '0000000001', '1', '9999', '4', '10', '25ml,片裝,礼盒包装,任何人群', '582434a1ae459.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('8', '韩束雪莲玻尿酸补水亮肤蚕丝巨补水面膜', '99.00', '10', '89.00', '1478767914', '2016-11-10/', '500', '14', null, '0000000001', '1', '10000', '3', '10', '25ml,片裝,盒装,年轻女性', '58243529a3799.jpg', '1', '0');
INSERT INTO `beauty_goods` VALUES ('9', '韩束一叶子补水美白保湿淡斑面膜 专柜正品', '79.00', '10', '69.00', '1478771128', '2016-11-10/', '1', '1', null, '0000000001', '1', '9999', '0', '10', '25ml,片状,盒装，任何人群', '582435af18f51.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('10', '韩束一叶子面膜蒙面歌王礼盒原液酵素淡斑补水', '179.00', '10', '169.00', '1478768174', '2016-11-10/', '1', '15', null, '0000000001', '1', '9999', '2', '10', '25ml,片装,礼盒包装,任何人群', '5824362d977ae.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('11', '韩束 墨菊巨补水面霜保湿巨补水', '99.00', '10', '89.00', '1478768318', '2016-11-10/', '68', '3', null, '0000000001', '1', '10000', '0', '10', '80ml,膏状,礼盒包装,30-40岁女性', '582436bd66f37.png', '0', '0');
INSERT INTO `beauty_goods` VALUES ('12', '韩束红石榴水面霜50ml补水保湿养面霜', '89.00', '10', '79.00', '1478768431', '2016-11-10/', '19', '3', null, '0000000001', '1', '10000', '0', '10', '50ml,膏状,盒装,35-40岁的女性', '5824372f55413.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('13', '韩束红石 亮白补水保湿面霜', '109.00', '10', '99.00', '1478768575', '2016-11-10/', '300', '5', null, '0000000001', '1', '10000', '0', '10', '80ml,膏状,礼盒包装,20-30岁女性干性皮肤', '582437bf6434b.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('14', '正品韩束雪白肌去黄袪斑润肤面霜', '179.00', '10', '169.00', '1478768690', '2016-11-10/', '20', '6', null, '0000000001', '1', '10000', '0', '10', '50ml,膏状,礼盒包装,20-30女性干性皮肤', '58243831c487a.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('15', '韩束水补水保湿霜清爽不油腻面霜', '69.00', '9', '60.00', '1478768816', '2016-11-10/', '12', '5', null, '0000000001', '1', '10000', '0', '8', '50ml,膏状,礼盒包装,20-30岁女性油性皮肤', '582438afc9f3a.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('16', '韩束墨菊巨补水保湿水润芦荟胶面霜 ', '59.00', '10', '49.00', '1478768934', '2016-11-10/', '2', '3', null, '0000000001', '1', '10000', '1', '10', '280ml,膏状,礼盒包装,任何人群', '58243925e57ad.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('17', '韩束芦荟胶180g补水保湿面霜', '69.00', '10', '59.00', '1478769026', '2016-11-10/', '45', '3', null, '0000000001', '1', '10000', '0', '5', '180ml,膏状,礼盒包装,任何人群', '58243981f23d6.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('18', '韩束水嫩亮颜保湿补水面霜透润', '99.00', '10', '89.00', '1478769127', '2016-11-10/', '20', '5', null, '0000000001', '1', '10000', '0', '20', '50ml,膏状,礼盒包装,任何人群', '582439e72f5d3.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('19', '韩束兰花修复霜50ml 补水保湿滋润面霜', '99.00', '10', '89.00', '1478769228', '2016-11-10/', '30', '3', null, '0000000001', '1', '10000', '0', '10', '50ml,凝胶,礼盒包装,任何人群', '58243a4c23d59.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('20', '韩束粉BB霜 妆遮瑕强持久隔离亮白补水', '99.00', '10', '89.00', '1478769601', '2016-11-10/', '46', '49', null, '0000000001', '1', '9999', '0', '10', '30ml,膏状,礼盒包装,年轻女性', '58243bc0e3133.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('21', '韩束逆天白BB霜裸妆遮瑕强美白防晒隔离', '99.00', '10', '89.00', '1478769699', '2016-11-10/', '37', '42', null, '0000000001', '1', '10000', '0', '10', '30ml,膏状,礼盒裝,25-35岁女性', '58243c2336dd1.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('22', '拉芳洗发水750m顺去屑止痒清爽控油顺滑', '42.80', '2', '40.00', '1478770007', '2016-11-10/', '1', '63', null, '0000000004', '1', '9999', '0', '10', '750ml,乳状,瓶装,老少皆宜', '58243d572cbec.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('23', '韩束红bb霜 墨菊深度保湿遮瑕强素颜霜亮肤', '99.00', '10', '89.00', '1478770396', '2016-11-10/', '30', '49', null, '0000000001', '1', '9999', '1', '10', '30ml,乳状,盒装,20-35女性', '58243edbd063e.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('24', '正品拉芳 洗护套装神器包邮植物去屑洗发水+护发素止痒控油洗头膏', '50.00', '0', '49.00', '1480332634', '2016-11-10/', '22', '53', null, '0000000004', '1', '10000', '0', '10', '750ml,膏状,盒装,任何人群', '58243f254f07d.jpg', '6', '1');
INSERT INTO `beauty_goods` VALUES ('25', '韩束红石榴爽肤水化妆水补水保湿', '109.00', '10', '99.00', '1478770574', '2016-11-10/', '1', '93', null, '0000000001', '1', '9997', '1', '10', '100ml,液体,瓶装,20-40岁女性', '58243f8dac8b3.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('26', '韩束墨菊巨补水女 爽肤水', '99.00', '10', '89.00', '1478770658', '2016-11-10/', '2', '93', null, '0000000001', '1', '9997', '1', '10', '120ml,液体,瓶装,20-35岁女性', '58243fe1a5e76.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('27', '韩束化妆品 兰花补水保湿滋养抗氧化 乳液', '59.00', '10', '49.00', '1478771039', '2016-11-10/', '5', '93', null, '0000000001', '1', '9999', '0', '10', '150ml,乳状,瓶装,任何人群', '58244047e0375.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('28', '韩束兰花活力眼霜15g去黑眼圈眼袋', '99.00', '10', '89.00', '1478771287', '2016-11-10/', '6', '8', null, '0000000001', '1', '9999', '0', '10', '15ml,膏状,盒装,有黑眼圈人群', '58244256b2599.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('29', '韩束墨菊眼霜眼部精华淡化细纹黑眼圈眼', '109.00', '9', '100.00', '1478771394', '2016-11-10/', '3', '8', null, '0000000001', '1', '9989', '0', '10', '15ml,膏状,盒装,任何人群', '582442c1a5ed6.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('30', '韩束红石榴眼霜去黑眼圈眼袋', '159.00', '10', '149.00', '1478771497', '2016-11-10/', '3', '8', null, '0000000001', '1', '10000', '0', '10', '15ml,膏状,盒装,有黑眼圈人群', '582443291d6eb.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('31', '新品韩束一叶子明目眼霜', '99.00', '10', '89.00', '1478771612', '2016-11-10/', '1', '10', null, '0000000001', '1', '9998', '0', '10', '30ml,乳状,瓶装,有细纹人群', '5824439c03346.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('32', '韩束超能精华水80ml 乳液 美白补水保湿', '99.00', '10', '89.00', '1478772132', '2016-11-10/', '6', '94', null, '0000000001', '1', '9994', '0', '10', '80ml,液体,瓶装,任何人群', '582445a3d6cf5.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('33', '韩束墨菊深度补水精华水30ml保湿补水', '109.00', '10', '99.00', '1478772265', '2016-11-10/', '1', '94', null, '0000000001', '1', '9996', '0', '10', '30ml,液体,瓶装,年轻女性', '58244628948c5.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('34', '胜韩束曼诗贝丹玻尿酸面部精华水', '69.00', '10', '59.00', '1478772345', '2016-11-10/', '5', '94', null, '0000000001', '1', '9881', '0', '10', '30ml,液体,瓶装,任何人群', '582446795c0f0.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('35', '韩束红石榴100ml 洗面奶补水美白去黄控油', '59.00', '10', '49.00', '1478772507', '2016-11-10/', '36', '102', null, '0000000001', '1', '10000', '0', '10', '100ml,乳状,盒装,女性', '5824471ae4591.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('36', '韩束兰花温和去角质素130ml 洗面奶', '69.00', '10', '59.00', '1478772611', '2016-11-10/', '4', '100', null, '0000000001', '1', '10000', '0', '10', '130ml,乳状,盒装,任何人群', '58244783763c5.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('37', '韩束韩粉世家天然水润不易脱色口红', '109.00', '10', '99.00', '1478772804', '2016-11-10/', '4', '103', null, '0000000001', '1', '9994', '4', '10', '15ml,膏状,盒装,任何人群', '582448445930d.jpg', '3', '0');
INSERT INTO `beauty_goods` VALUES ('38', '御泥坊玫瑰滋养睡眠面膜 免洗补水保湿锁水滋润护肤化妆正品男女', '66.00', '0', '39.00', '1478773701', '2016-11-10/', '2', '87', null, '0000000003', '1', '45893', '4', '0', '15ml,膏状,盒装,任何人群', '58244bc4567ec.jpg', '4', '0');
INSERT INTO `beauty_goods` VALUES ('39', '御泥坊自然栌斗泥面膜男女通用', '108.00', '0', '99.00', '1478773909', '2016-11-10/', '6', '87', null, '0000000003', '1', '45890', '2', '0', '30ml,膏状,盒装,任何人群', '58244c95271e3.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('40', '御泥坊矿物养肤霜滋润型50g补水锁水保湿持久面霜秋冬 护肤品男女', '125.00', '0', '85.00', '1478774017', '2016-11-10/', '501', '1', null, '0000000003', '1', '125477', '1', '0', '100ml,膏状,盒装,任何人群', '58244d013225f.jpg', '3', '0');
INSERT INTO `beauty_goods` VALUES ('41', '御泥坊绿豆原浆泥面膜收缩毛孔美肤男女用深层清洁控油护肤品正品', '255.00', '0', '118.00', '1478774119', '2016-11-10/', '425', '12', null, '0000000003', '1', '2478976', '0', '0', '120ml,膏状,盒装,任何人群', '58244d6794808.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('42', '御泥坊红石榴矿物蚕丝面膜贴21片30ml 深层保湿补水提亮抗氧化', '128.00', '0', '79.00', '1479086890', '2016-11-10/', '5', '1', null, '0000000003', '1', '12450', '0', '0', '30ml,片状,盒装,任何人群', '58244e29c3673.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('43', '御泥坊红石榴矿物蚕丝面膜贴21片30ml 深层保湿补水提亮抗氧化', '128.00', '0', '79.00', '1478774315', '2016-11-10/', '66', '14', null, '0000000003', '1', '12455', '1', '0', '30ml,液体,盒装,任何人群', '58244e2b64f17.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('44', '御泥坊美白嫩肤护肤套装补水保湿滋润提亮肤色秋冬正', '199.00', '0', '99.00', '1480332109', '2016-11-10/', '51', '1', null, '0000000003', '1', '1194', '2', '0', '80ml,液体,瓶装,任何人群', '58244ee7ac2d1.jpg', '1', '1');
INSERT INTO `beauty_goods` VALUES ('45', '御泥坊竹萃玫瑰热销面膜控油收毛孔补水保湿套装正冬', '299.00', '0', '209.00', '1478774739', '2016-11-10/', '4000', '12', null, '0000000003', '1', '1245', '0', '0', '30ml,膏状,盒装,任何人群', '58244fd37c718.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('46', '御泥坊芦荟补水保湿凝胶150g 补水保湿晒后修护补水保湿', '155.00', '0', '123.00', '1478774816', '2016-11-10/', '100', '12', null, '0000000003', '1', '1452', '0', '0', '125ml,膏状,盒装,任何人群', '582450208bec8.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('47', '御泥坊旅行套装 玫瑰红石榴美白清爽 补水保湿控油收毛孔亮肤去黄', '169.90', '0', '89.90', '1479086805', '2016-11-10/', '275', '1', null, '0000000003', '1', '14588', '0', '0', '80ml,膏状,盒装,任何人群', '5824507f12325.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('48', '御泥坊红石榴矿物补水亮肤去黄10件套装亮肤保湿抗氧化去黄护肤品', '399.00', '0', '189.00', '1480332595', '2016-11-10/', '165', '1', null, '0000000003', '1', '45898', '0', '0', '200ml,膏状,盒装,任何人群', '582450e911f7c.jpg', '1', '1');
INSERT INTO `beauty_goods` VALUES ('49', '御泥坊银杏亮采焕肤睡眠套装 补水保湿提亮肤色 美白嫩肤淡斑正品', '189.00', '0', '159.00', '1479086824', '2016-11-10/', '49', '1', null, '0000000003', '1', '4585', '0', '0', '120ml,膏状,盒装,任何人群', '582451482c714.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('50', '御泥坊 矿物养肤霜(滋润型) 补水保湿滋润营养面霜正品正品包邮', '299.00', '0', '208.00', '1478775288', '2016-11-10/', '200', '2', null, '0000000003', '1', '9993', '1', '0', '100ml,膏状,盒装,任何人群', '582451f864203.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('51', '御泥坊黑玫瑰美白去黄蚕丝睡眠面膜水乳套装秋冬亮肤补水保湿淡斑', '189.00', '0', '159.00', '1479086778', '2016-11-10/', '2', '1', null, '0000000003', '1', '124576', '0', '0', '120ml,膏状,套盒装,任何人群', '58245289ef5d9.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('52', '御泥坊美白睡眠面膜护肤品套装补水保湿亮肤色清洁乳液正品包邮', '499.00', '0', '399.00', '1478775579', '2016-11-10/', '2', '13', null, '0000000003', '1', '7890', '0', '0', '150ml,乳状,盒装,任何人群', '5824531ae3f64.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('53', '御泥坊红石榴套装4件套四件套女美白抗皱亮肤补水保湿护肤品包邮', '324.00', '0', '222.00', '1479086751', '2016-11-10/', '62', '1', null, '0000000003', '1', '4727', '3', '0', '120ml,膏状,套盒装,任何人群', '58245374d70ed.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('54', '御泥坊美白睡眠面膜护肤品套装补水保湿亮肤色清洁乳液正品包邮', '108.00', '0', '99.00', '1479086724', '2016-11-10/', '301', '83', null, '0000000003', '1', '4589', '0', '0', '80ml,膏状,盒装,任何人群', '582453d3e3dc2.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('55', '御泥坊男士深海水动力面膜15片美白保湿补水提亮肤色去黑头护肤品', '88.00', '0', '79.00', '1480302698', '2016-11-10/', '14', '70', null, '0000000003', '1', '4587', '1', '0', '&lt;pre&gt;25ml,液体,盒装，任何人群&lt;/pre&gt;', '58245418bf77c.jpg', '4', '1');
INSERT INTO `beauty_goods` VALUES ('56', '御泥坊男士控油护肤套装 补水保湿清爽清洁收缩毛孔化妆正品秋冬', '108.00', '0', '79.90', '1479086655', '2016-11-10/', '58', '70', null, '0000000003', '1', '5689', '1', '0', '120ml,膏状,盒装,任何人群', '58245461b4860.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('57', '御泥坊男士黑茶清爽控油矿物泥浆面膜清洁控油淡黑头收缩毛孔护肤', '189.00', '0', '99.00', '1479086623', '2016-11-10/', '449', '83', null, '0000000003', '1', '45687', '0', '0', '200ml,膏状,盒装,任何人群', '58245514365a9.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('58', '御泥坊葡萄籽琉璃亮颜黑面膜21片美白保湿补水去黄淡斑去暗沉男女', '128.00', '0', '99.00', '1479086605', '2016-11-10/', '25', '70', null, '0000000003', '1', '1245', '1', '0', '25ml,膏状,盒装,任何人群', '58245593844db.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('59', '御泥坊男士黑茶控油矿物洁面乳深层清洁淡化黑头收毛孔洗面奶正品', '59.00', '0', '39.90', '1479086582', '2016-11-10/', '2', '70', null, '0000000003', '1', '45696', '1', '0', '100ml,膏状,盒装,任何人群', '582455d8264a8.jpg', '7', '0');
INSERT INTO `beauty_goods` VALUES ('60', '御泥坊男士深海水动力洁面乳 温和洁净水润保湿不紧绷面部护理', '59.00', '0', '39.90', '1479086566', '2016-11-10/', '55', '70', null, '0000000003', '1', '7895', '0', '0', '100ml,膏状,盒装,任何人群', '582456106f194.jpg', '4', '0');
INSERT INTO `beauty_goods` VALUES ('61', '御泥坊清爽平衡矿物爽肤水150ml补水清爽控油清洁收缩毛孔化妆水', '99.00', '2', '69.00', '1478777000', '2016-11-10/', '154', '94', null, '0000000003', '1', '2202', '0', '0', '100ml,液体,瓶装,任何人群', '582458a804e2e.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('62', '雅诗兰黛口红 花漾倾慕丰唇膏 玻尿酸持久保湿滋养', '145.00', '2', '128.00', '1479086545', '2016-11-10/', '88', '33', null, '0000000002', '1', '2578', '6', '0', '30ml,膏状,盒装,任何人群', '58245935bdf8a.jpg', '4', '0');
INSERT INTO `beauty_goods` VALUES ('63', '雅诗兰黛晶透沁白淡斑晚安膜8g 滋润修护 免洗面膜', '256.00', '2', '223.00', '1479086527', '2016-11-10/', '55', '83', null, '0000000002', '1', '4589', '1', '0', '30ml,膏状,盒装,任何人群', '58245a23c0517.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('64', '雅诗兰黛晶透沁白淡斑晚安膜10g 滋润修护 免洗面膜', '225.00', '3', '220.00', '1479086493', '2016-11-10/', '45', '83', null, '0000000002', '1', '4596', '1', '0', '10ml,液体,盒装,任何人群', '58245a9c0aa5d.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('65', '雅诗兰黛香水正品 欢沁清悦淡香氛50ml 女士 清新淡香', '456.00', '20', '332.00', '1479086434', '2016-11-10/', '67', '33', null, '0000000002', '1', '4500', '0', '0', '50ml,液体,盒装,任何人群', '58245b07e14a0.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('66', '雅诗兰黛套装 多效智妍精华霜+智妍眼霜 深层滋养', '156.00', '5', '146.00', '1479086402', '2016-11-10/', '1', '1', null, '0000000002', '1', '52457', '0', '0', '30ml,块状,盒装,任何人群', '58245bb0502e0.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('67', '雅诗兰黛小棕瓶眼霜+修护精华套装 补水保湿', '126.00', '5', '103.00', '1479086379', '2016-11-10/', '11', '1', null, '0000000002', '1', '8952', '0', '0', '15ml,块状,盒装,任何人群', '58245c09d7382.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('68', '雅诗兰黛白金眼霜 白金级紧颜眼部修护精华露15ml 淡化细纹 保湿', '355.00', '5', '255.00', '1479086350', '2016-11-10/', '10', '1', null, '0000000002', '1', '2563', '0', '0', '15ml,块状,盒装,任何人群', '58245c465d42f.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('69', '雅诗兰黛白金眼霜 白金级奢宠润养眼霜15ml 提拉紧致 淡化细纹', '266.00', '10', '222.00', '1479086325', '2016-11-10/', '53', '87', null, '0000000002', '1', '2456', '1', '0', '30ml,块状,盒装,任何人群', '58245c8c2d29f.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('70', '雅诗兰黛面膜 多效智妍面膜75ml 舒缓肌肤 润养赋活', '253.00', '20', '222.00', '1479086301', '2016-11-10/', '45', '87', null, '0000000002', '1', '8952', '0', '0', '30ml,块状,盒装,任何人群', '58245cfb44719.jpg', '3', '0');
INSERT INTO `beauty_goods` VALUES ('71', '雅诗兰黛晶透沁白精华露30ml 淡斑淡印 补水保湿', '236.00', '10', '198.00', '1479086256', '2016-11-10/', '1', '87', null, '0000000002', '1', '7891', '1', '0', '30ml,块状,盒装,任何人群', '58245d559ba4a.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('72', '卡姿兰睫毛膏防水不晕染 大眼睛多效睫毛膏纤长浓密卷翘 包邮', '89.00', '5', '36.00', '1479086227', '2016-11-10/', '2', '33', null, '0000000005', '1', '2308', '1', '0', '30ml,块状,盒装,任何人群', '58245e2547df7.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('73', '正品 卡姿兰眉粉 包邮防水防汗眉笔持久不脱妆染画眉膏送眉卡', '88.00', '5', '45.00', '1479086202', '2016-11-10/', '3', '33', null, '0000000005', '1', '2586', '0', '0', '30ml,块状,盒装,任何人群', '58245eb553e4e.jpg', '1', '0');
INSERT INTO `beauty_goods` VALUES ('74', '卡姿兰口红持久保湿不易脱色滋润不干豆沙色咬唇妆唇膏正品送小样', '88.00', '3', '69.00', '1479086171', '2016-11-10/', '37', '33', null, '0000000005', '1', '2588', '2', '0', '30ml,块状,盒装,任何人群', '58245ef7ec311.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('75', '卡姿兰口红正品金致胶原美芯唇膏br05东京樱持久保湿豆沙健康粉红', '189.00', '10', '83.00', '1479086130', '2016-11-10/', '61', '33', null, '0000000005', '1', '8956', '1', '0', '30ml,块状,盒装,任何人群', '58245f471f7c8.jpg', '4', '0');
INSERT INTO `beauty_goods` VALUES ('76', '卡姿兰BB霜专柜正品 焕采水润无瑕BB霜 遮瑕隔离保湿美白控油裸妆', '238.00', '5', '223.00', '1479086067', '2016-11-10/', '70', '33', null, '0000000005', '1', '8591', '0', '0', '60ml,膏状,瓶装,任何人群', '5824602860665.jpg', '0', '0');
INSERT INTO `beauty_goods` VALUES ('81', '13213', '199.00', '0', '109.00', '1480664319', '2016-12-02/', '0', '54', null, '0000000013', '1', '10000', '0', '0', '2132141242', '5840ff1e430f0.jpg', '0', '1');
INSERT INTO `beauty_goods` VALUES ('82', '面膜', '199.00', '0', '129.00', '1480664288', '2016-12-02/', '0', '13', null, '0000000000', '1', '10000', '0', '0', '131241242', '584124c2e38c3.jpg', '0', '1');

-- ----------------------------
-- Table structure for `beauty_keywords`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_keywords`;
CREATE TABLE `beauty_keywords` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `addtime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_keywords
-- ----------------------------
INSERT INTO `beauty_keywords` VALUES ('27', '8', '口红', '1479387616');
INSERT INTO `beauty_keywords` VALUES ('30', '38', '口红', '1479451123');
INSERT INTO `beauty_keywords` VALUES ('31', '38', '', '1479472069');
INSERT INTO `beauty_keywords` VALUES ('32', '38', '面膜', '1479537137');
INSERT INTO `beauty_keywords` VALUES ('33', '38', '卡姿兰', '1479538519');
INSERT INTO `beauty_keywords` VALUES ('34', '8', '面膜', '1480061215');

-- ----------------------------
-- Table structure for `beauty_messagetext`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_messagetext`;
CREATE TABLE `beauty_messagetext` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_messagetext
-- ----------------------------
INSERT INTO `beauty_messagetext` VALUES ('1', '欢迎新人', '大家好，欢迎来到后台！', '1480148298');
INSERT INTO `beauty_messagetext` VALUES ('2', '感恩节', '感恩节里送你一副对联，表达我对你的祝愿，上联：感谢身边所有人，人人有恩；下联：恩泽周围亲和友，人人来报；横批：感恩快乐', '1480148313');
INSERT INTO `beauty_messagetext` VALUES ('3', '欢迎新会员', '您好，欢迎注册新会员，等你很久了！', '1480148397');
INSERT INTO `beauty_messagetext` VALUES ('4', '感恩节愉快', '感恩节里送你一副对联，表达我对你的祝愿，上联：感谢身边所有人，人人有恩；下联：恩泽周围亲和友，人人来报；横批：感恩快乐', '1480148407');
INSERT INTO `beauty_messagetext` VALUES ('5', '天气预报', '郑州 多云 2-14  微风 1级', '1480640771');

-- ----------------------------
-- Table structure for `beauty_message_admin`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_message_admin`;
CREATE TABLE `beauty_message_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sendId` int(10) unsigned NOT NULL COMMENT '发送者Id',
  `receiveId` int(10) unsigned NOT NULL COMMENT '接受者Id',
  `textId` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '1为未读，2为已读，3为删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_message_admin
-- ----------------------------
INSERT INTO `beauty_message_admin` VALUES ('1', '1', '2', '1', '1');
INSERT INTO `beauty_message_admin` VALUES ('2', '1', '3', '1', '1');
INSERT INTO `beauty_message_admin` VALUES ('3', '1', '4', '1', '1');
INSERT INTO `beauty_message_admin` VALUES ('4', '1', '5', '1', '1');
INSERT INTO `beauty_message_admin` VALUES ('5', '1', '6', '1', '1');
INSERT INTO `beauty_message_admin` VALUES ('6', '1', '7', '1', '1');
INSERT INTO `beauty_message_admin` VALUES ('7', '1', '8', '1', '1');
INSERT INTO `beauty_message_admin` VALUES ('8', '1', '9', '1', '1');
INSERT INTO `beauty_message_admin` VALUES ('9', '1', '2', '2', '2');
INSERT INTO `beauty_message_admin` VALUES ('10', '1', '3', '2', '1');
INSERT INTO `beauty_message_admin` VALUES ('11', '1', '4', '2', '1');
INSERT INTO `beauty_message_admin` VALUES ('12', '1', '5', '2', '1');
INSERT INTO `beauty_message_admin` VALUES ('13', '1', '6', '2', '1');
INSERT INTO `beauty_message_admin` VALUES ('14', '1', '7', '2', '1');
INSERT INTO `beauty_message_admin` VALUES ('15', '1', '8', '2', '1');
INSERT INTO `beauty_message_admin` VALUES ('16', '1', '9', '2', '1');
INSERT INTO `beauty_message_admin` VALUES ('17', '3', '1', '5', '1');
INSERT INTO `beauty_message_admin` VALUES ('18', '3', '2', '5', '1');
INSERT INTO `beauty_message_admin` VALUES ('19', '3', '4', '5', '1');
INSERT INTO `beauty_message_admin` VALUES ('20', '3', '5', '5', '1');
INSERT INTO `beauty_message_admin` VALUES ('21', '3', '6', '5', '1');
INSERT INTO `beauty_message_admin` VALUES ('22', '3', '7', '5', '1');
INSERT INTO `beauty_message_admin` VALUES ('23', '3', '8', '5', '1');
INSERT INTO `beauty_message_admin` VALUES ('24', '3', '9', '5', '1');
INSERT INTO `beauty_message_admin` VALUES ('25', '3', '10', '5', '1');
INSERT INTO `beauty_message_admin` VALUES ('26', '3', '11', '5', '1');
INSERT INTO `beauty_message_admin` VALUES ('27', '3', '12', '5', '2');

-- ----------------------------
-- Table structure for `beauty_message_user`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_message_user`;
CREATE TABLE `beauty_message_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sendId` int(10) unsigned NOT NULL COMMENT '发送者Id',
  `receiveId` int(10) unsigned NOT NULL COMMENT '接受者Id',
  `textId` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '1为未读，2为已读，3为删除',
  `type` tinyint(4) DEFAULT '1' COMMENT '1为系统消息，2为活动消息',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_message_user
-- ----------------------------
INSERT INTO `beauty_message_user` VALUES ('1', '1', '1', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('2', '1', '2', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('3', '1', '3', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('4', '1', '4', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('5', '1', '5', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('6', '1', '6', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('7', '1', '7', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('8', '1', '8', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('9', '1', '9', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('10', '1', '10', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('11', '1', '11', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('12', '1', '12', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('13', '1', '13', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('14', '1', '14', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('15', '1', '15', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('16', '1', '16', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('17', '1', '29', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('18', '1', '34', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('19', '1', '35', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('20', '1', '36', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('21', '1', '37', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('22', '1', '38', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('23', '1', '39', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('24', '1', '40', '3', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('25', '1', '1', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('26', '1', '2', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('27', '1', '3', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('28', '1', '4', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('29', '1', '5', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('30', '1', '6', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('31', '1', '7', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('32', '1', '8', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('33', '1', '9', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('34', '1', '10', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('35', '1', '11', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('36', '1', '12', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('37', '1', '13', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('38', '1', '14', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('39', '1', '15', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('40', '1', '16', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('41', '1', '29', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('42', '1', '34', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('43', '1', '35', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('44', '1', '36', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('45', '1', '37', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('46', '1', '38', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('47', '1', '39', '4', '1', '1');
INSERT INTO `beauty_message_user` VALUES ('48', '1', '40', '4', '1', '1');

-- ----------------------------
-- Table structure for `beauty_new_pic`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_new_pic`;
CREATE TABLE `beauty_new_pic` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `fid` tinyint(4) NOT NULL,
  `picurl` varchar(255) DEFAULT NULL,
  `picname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=249 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of beauty_new_pic
-- ----------------------------
INSERT INTO `beauty_new_pic` VALUES ('238', '15', '2016-11-30/', '583eb1d97d8e8.jpg');
INSERT INTO `beauty_new_pic` VALUES ('239', '15', '2016-11-30/', '583eb1da55878.jpg');
INSERT INTO `beauty_new_pic` VALUES ('240', '15', '2016-11-30/', '583eb1db12a52.jpg');
INSERT INTO `beauty_new_pic` VALUES ('241', '18', '2016-11-30/', '583eb22d5c8c5.jpg');
INSERT INTO `beauty_new_pic` VALUES ('242', '18', '2016-11-30/', '583eb22e25239.jpg');
INSERT INTO `beauty_new_pic` VALUES ('243', '18', '2016-11-30/', '583eb22eec200.jpg');
INSERT INTO `beauty_new_pic` VALUES ('244', '22', '2016-11-30/', '583eb30032538.jpg');
INSERT INTO `beauty_new_pic` VALUES ('245', '20', '2016-11-30/', '583eb337aabae.jpg');
INSERT INTO `beauty_new_pic` VALUES ('246', '20', '2016-11-30/', '583eb33856ffb.jpg');
INSERT INTO `beauty_new_pic` VALUES ('247', '20', '2016-11-30/', '583eb4163e057.jpg');
INSERT INTO `beauty_new_pic` VALUES ('248', '20', '2016-11-30/', '583eb416d9cac.jpg');

-- ----------------------------
-- Table structure for `beauty_order`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_order`;
CREATE TABLE `beauty_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` tinyint(3) unsigned NOT NULL,
  `price` int(7) NOT NULL,
  `orderno` varchar(20) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1代表待付款',
  `create_time` int(40) NOT NULL,
  `inform` varchar(30) DEFAULT NULL COMMENT '订单留言',
  `address` int(11) DEFAULT NULL,
  `packet` int(11) DEFAULT '0' COMMENT '红包的钱数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_order
-- ----------------------------
INSERT INTO `beauty_order` VALUES ('1', '6', '63', 'd93ebb81842958a', '4', '1480585143', null, '41', '0');
INSERT INTO `beauty_order` VALUES ('2', '6', '69', 'd78d7c5a816c98c', '1', '1480585218', null, '41', '0');
INSERT INTO `beauty_order` VALUES ('3', '6', '41', '181ddef3680a970', '6', '1480585346', null, '41', '0');
INSERT INTO `beauty_order` VALUES ('4', '8', '128', '8b569f27e93602a', '5', '1480589656', '', '32', null);
INSERT INTO `beauty_order` VALUES ('5', '8', '79', 'f1127e70136e625', '5', '1480589776', null, '32', '0');
INSERT INTO `beauty_order` VALUES ('6', '8', '178', 'aae6ac98db99239', '5', '1480589802', '', '32', null);
INSERT INTO `beauty_order` VALUES ('7', '8', '169', '85e83159978039a', '5', '1480590197', '及时发货', '32', null);
INSERT INTO `beauty_order` VALUES ('9', '11', '439', 'a89046b318af6b6', '1', '1480590578', null, '43', '0');
INSERT INTO `beauty_order` VALUES ('10', '35', '312', 'e6d37332278479f', '2', '1480590864', null, '1', '0');
INSERT INTO `beauty_order` VALUES ('11', '35', '99', '14da907937b6b11', '3', '1480590901', null, '36', '0');
INSERT INTO `beauty_order` VALUES ('12', '35', '79', '9eead2a1827b458', '3', '1480590936', null, '40', '0');
INSERT INTO `beauty_order` VALUES ('13', '35', '222', '130ecd7c56abb86', '3', '1480590962', null, '40', '0');
INSERT INTO `beauty_order` VALUES ('14', '35', '89', 'e05071f6102be5e', '1', '1480590982', null, '40', '0');
INSERT INTO `beauty_order` VALUES ('15', '8', '49', '4ef4fe4a1f8e61c', '2', '1480591011', null, '32', '0');
INSERT INTO `beauty_order` VALUES ('16', '8', '109', 'a25c0baba594506', '2', '1480591153', 'hao', '31', '0');
INSERT INTO `beauty_order` VALUES ('17', '35', '99', '96484a153af347f', '5', '1480591089', null, '40', '0');
INSERT INTO `beauty_order` VALUES ('18', '8', '428', '11367bf5099a9ae', '1', '1480591102', null, null, '0');
INSERT INTO `beauty_order` VALUES ('19', '8', '428', '11367bf5099a9ae', '1', '1480591102', '', '42', '0');
INSERT INTO `beauty_order` VALUES ('20', '8', '368', '8562780a8c9da5e', '1', '1480591144', '', '32', null);
INSERT INTO `beauty_order` VALUES ('21', '8', '368', 'df00122b61fbd2f', '1', '1480591885', '', '32', null);
INSERT INTO `beauty_order` VALUES ('22', '8', '368', '561086a9fb55b71', '5', '1480591919', '', '32', null);
INSERT INTO `beauty_order` VALUES ('23', '8', '159', 'e9d98a4f146707a', '1', '1480591890', null, '31', '0');
INSERT INTO `beauty_order` VALUES ('24', '8', '159', 'cd8777cd37f69c4', '5', '1480591960', null, '32', '0');
INSERT INTO `beauty_order` VALUES ('26', '8', '79', '9c981f290cfa41a', '2', '1480592782', null, '32', '0');
INSERT INTO `beauty_order` VALUES ('27', '34', '49', '2403ab1b10aa74f', '3', '1480592806', null, '8', '0');
INSERT INTO `beauty_order` VALUES ('28', '34', '99', 'b4fe7cb3a177c5b', '3', '1480592836', null, '8', '0');
INSERT INTO `beauty_order` VALUES ('29', '45', '178', 'de7412662230b56', '5', '1480592794', '', '44', null);
INSERT INTO `beauty_order` VALUES ('31', '34', '795', '23c043050091fa2', '1', '1480594049', '', '8', null);
INSERT INTO `beauty_order` VALUES ('32', '6', '109', 'e1836b8d26c7f22', '2', '1480594807', null, '41', '0');
INSERT INTO `beauty_order` VALUES ('33', '8', '79', '4c34dc50597ff46', '2', '1480639846', null, '32', '0');
INSERT INTO `beauty_order` VALUES ('34', '8', '368', '480f83fd645b603', '2', '1480639958', '', '32', null);
INSERT INTO `beauty_order` VALUES ('35', '5', '389', '6c9805f5b7eb411', '3', '1480662894', '', '29', '0');
INSERT INTO `beauty_order` VALUES ('36', '8', '313', '8ca9ad723b886da', '6', '1480663636', '及时发货', '45', '15');
INSERT INTO `beauty_order` VALUES ('37', '8', '439', 'cf2adac93d68549', '4', '1480663683', '', '45', null);
INSERT INTO `beauty_order` VALUES ('38', '8', '169', '14191e6a46b2e1a', '4', '1480663754', null, '45', '0');
INSERT INTO `beauty_order` VALUES ('39', '8', '766', 'bee2d82b4298b3e', '1', '1480663842', null, null, '0');
INSERT INTO `beauty_order` VALUES ('40', '8', '736', 'da7d7e5f2565566', '3', '1480663845', '', '45', null);
INSERT INTO `beauty_order` VALUES ('41', '6', '221', '13f9a430641657f', '1', '1480664713', '及时发挥', '46', '8');
INSERT INTO `beauty_order` VALUES ('42', '35', '39', '76166e954d1efc9', '4', '1480665629', null, '40', '0');

-- ----------------------------
-- Table structure for `beauty_order_goods`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_order_goods`;
CREATE TABLE `beauty_order_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oid` int(10) unsigned NOT NULL,
  `gid` int(10) unsigned NOT NULL,
  `buynum` int(10) unsigned NOT NULL,
  `ml` int(11) DEFAULT NULL,
  `saleprice` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_order_goods
-- ----------------------------
INSERT INTO `beauty_order_goods` VALUES ('1', '1', '44', '1', '100', '89');
INSERT INTO `beauty_order_goods` VALUES ('2', '2', '47', '1', '100', '69');
INSERT INTO `beauty_order_goods` VALUES ('3', '3', '47', '1', '80', '49');
INSERT INTO `beauty_order_goods` VALUES ('4', '4', '42', '1', '30', '79');
INSERT INTO `beauty_order_goods` VALUES ('5', '4', '34', '1', '30', '59');
INSERT INTO `beauty_order_goods` VALUES ('6', '5', '32', '1', '80', '89');
INSERT INTO `beauty_order_goods` VALUES ('7', '6', '42', '1', '30', '79');
INSERT INTO `beauty_order_goods` VALUES ('8', '6', '39', '1', '30', '99');
INSERT INTO `beauty_order_goods` VALUES ('9', '7', '1', '1', '150', '199');
INSERT INTO `beauty_order_goods` VALUES ('11', '9', '5', '1', '200', '469');
INSERT INTO `beauty_order_goods` VALUES ('12', '10', '65', '1', '50', '332');
INSERT INTO `beauty_order_goods` VALUES ('13', '11', '57', '1', '100', '99');
INSERT INTO `beauty_order_goods` VALUES ('14', '12', '55', '1', '25', '79');
INSERT INTO `beauty_order_goods` VALUES ('15', '13', '53', '1', '150', '222');
INSERT INTO `beauty_order_goods` VALUES ('16', '14', '37', '1', '15', '99');
INSERT INTO `beauty_order_goods` VALUES ('17', '15', '34', '1', '30', '59');
INSERT INTO `beauty_order_goods` VALUES ('18', '16', '77', '1', '100', '109');
INSERT INTO `beauty_order_goods` VALUES ('19', '17', '39', '1', '30', '99');
INSERT INTO `beauty_order_goods` VALUES ('20', '19', '1', '1', '200', '229');
INSERT INTO `beauty_order_goods` VALUES ('21', '19', '1', '1', '150', '199');
INSERT INTO `beauty_order_goods` VALUES ('22', '20', '1', '1', '150', '199');
INSERT INTO `beauty_order_goods` VALUES ('23', '20', '1', '1', '200', '229');
INSERT INTO `beauty_order_goods` VALUES ('24', '21', '1', '1', '150', '199');
INSERT INTO `beauty_order_goods` VALUES ('25', '21', '1', '1', '200', '229');
INSERT INTO `beauty_order_goods` VALUES ('26', '22', '1', '1', '150', '199');
INSERT INTO `beauty_order_goods` VALUES ('27', '22', '1', '1', '200', '229');
INSERT INTO `beauty_order_goods` VALUES ('28', '23', '49', '1', '120', '159');
INSERT INTO `beauty_order_goods` VALUES ('29', '24', '49', '1', '120', '159');
INSERT INTO `beauty_order_goods` VALUES ('33', '26', '42', '1', '30', '79');
INSERT INTO `beauty_order_goods` VALUES ('34', '27', '34', '1', '30', '59');
INSERT INTO `beauty_order_goods` VALUES ('35', '28', '39', '1', '30', '99');
INSERT INTO `beauty_order_goods` VALUES ('36', '29', '39', '1', '30', '99');
INSERT INTO `beauty_order_goods` VALUES ('37', '29', '55', '1', '25', '79');
INSERT INTO `beauty_order_goods` VALUES ('39', '31', '49', '5', '120', '795');
INSERT INTO `beauty_order_goods` VALUES ('40', '32', '77', '1', '100', '109');
INSERT INTO `beauty_order_goods` VALUES ('41', '33', '42', '1', '30', '79');
INSERT INTO `beauty_order_goods` VALUES ('42', '34', '1', '1', '150', '199');
INSERT INTO `beauty_order_goods` VALUES ('43', '34', '1', '1', '200', '229');
INSERT INTO `beauty_order_goods` VALUES ('44', '35', '2', '1', null, '389');
INSERT INTO `beauty_order_goods` VALUES ('45', '36', '1', '1', '150', '199');
INSERT INTO `beauty_order_goods` VALUES ('46', '36', '1', '1', '200', '229');
INSERT INTO `beauty_order_goods` VALUES ('47', '37', '5', '1', '200', '469');
INSERT INTO `beauty_order_goods` VALUES ('48', '38', '1', '1', '150', '199');
INSERT INTO `beauty_order_goods` VALUES ('49', '39', '1', '2', '100', '398');
INSERT INTO `beauty_order_goods` VALUES ('50', '39', '40', '2', '100', '170');
INSERT INTO `beauty_order_goods` VALUES ('51', '39', '57', '2', '150', '198');
INSERT INTO `beauty_order_goods` VALUES ('52', '41', '1', '1', '200', '229');
INSERT INTO `beauty_order_goods` VALUES ('53', '42', '27', '1', '150', '49');

-- ----------------------------
-- Table structure for `beauty_order_status`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_order_status`;
CREATE TABLE `beauty_order_status` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `statusname` varchar(30) DEFAULT NULL COMMENT '是品牌表的id',
  `memberstatus` varchar(20) DEFAULT NULL,
  `adminstatus` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_order_status
-- ----------------------------
INSERT INTO `beauty_order_status` VALUES ('1', '待付款', '付款', null);
INSERT INTO `beauty_order_status` VALUES ('2', '已付款', '查看物流', '发货');
INSERT INTO `beauty_order_status` VALUES ('3', '已发货', '确认收货', null);
INSERT INTO `beauty_order_status` VALUES ('4', '已收货', '评价', '交易完成');
INSERT INTO `beauty_order_status` VALUES ('5', '已评价', '追加评价', '已评价');
INSERT INTO `beauty_order_status` VALUES ('6', '已追加', '删除订单', null);

-- ----------------------------
-- Table structure for `beauty_packet`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_packet`;
CREATE TABLE `beauty_packet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) unsigned NOT NULL,
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  `expirationtime` int(10) DEFAULT NULL COMMENT '过期时间',
  `money` float(10,2) DEFAULT NULL COMMENT '红包金额',
  `status` tinyint(10) DEFAULT '1' COMMENT '0为已过期，1为待使用，2已使用',
  `packtag` tinyint(4) NOT NULL DEFAULT '0' COMMENT '拆红包的标记',
  `stoptime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_packet
-- ----------------------------
INSERT INTO `beauty_packet` VALUES ('1', '8', '1480664006', '1483256006', '2.00', '2', '1', '1478707200');
INSERT INTO `beauty_packet` VALUES ('2', '6', '1480664926', '1483256926', '8.00', '2', '1', '1478707200');
INSERT INTO `beauty_packet` VALUES ('12', '8', '1480664006', '1483256006', '2.00', '2', '1', '1478793600');
INSERT INTO `beauty_packet` VALUES ('14', '5', '1480663269', '1483255269', '63.00', '2', '1', '1478793600');
INSERT INTO `beauty_packet` VALUES ('15', '16', '1478746896', '1513008000', '30.00', '1', '1', '1478793600');
INSERT INTO `beauty_packet` VALUES ('16', '34', '1480665445', '1483257445', '20.00', '2', '0', null);
INSERT INTO `beauty_packet` VALUES ('17', '34', '1480665445', '1483257445', '20.00', '1', '1', '1478793600');
INSERT INTO `beauty_packet` VALUES ('18', '35', '1480640429', '1483232429', '20.00', '1', '0', null);
INSERT INTO `beauty_packet` VALUES ('19', '8', '1480664006', '1483256006', '2.00', '2', '1', '1478880000');
INSERT INTO `beauty_packet` VALUES ('20', '16', '1478825735', '1481472000', '20.00', '2', '1', '1478880000');
INSERT INTO `beauty_packet` VALUES ('21', '34', '1480665445', '1483257445', '20.00', '1', '1', '1478880000');
INSERT INTO `beauty_packet` VALUES ('22', '34', '1480665445', '1483257445', '20.00', '1', '1', '1478966400');
INSERT INTO `beauty_packet` VALUES ('23', '8', '1480664006', '1483256006', '2.00', '2', '1', '1479052800');
INSERT INTO `beauty_packet` VALUES ('24', '5', '1480663269', '1483255269', '63.00', '1', '1', '1479052800');
INSERT INTO `beauty_packet` VALUES ('25', '34', '1480665445', '1483257445', '20.00', '1', '1', '1479052800');
INSERT INTO `beauty_packet` VALUES ('26', '34', '1480665445', '1483257445', '20.00', '1', '1', '1479139200');
INSERT INTO `beauty_packet` VALUES ('27', '8', '1480664006', '1483256006', '2.00', '2', '1', '1479139200');
INSERT INTO `beauty_packet` VALUES ('28', '36', null, null, null, '0', '0', null);
INSERT INTO `beauty_packet` VALUES ('29', '34', '1480665445', '1483257445', '20.00', '1', '1', '1479312000');
INSERT INTO `beauty_packet` VALUES ('30', '37', '1479441192', '1482033192', '10.00', '1', '0', null);
INSERT INTO `beauty_packet` VALUES ('31', '38', '1479534074', '1482126074', '10.00', '1', '0', null);
INSERT INTO `beauty_packet` VALUES ('32', '39', null, null, null, '0', '0', null);
INSERT INTO `beauty_packet` VALUES ('33', '8', '1480664006', '1483256006', '2.00', '2', '1', '1479484800');
INSERT INTO `beauty_packet` VALUES ('34', '35', '1480640429', '1483232429', '20.00', '1', '1', '1479484800');
INSERT INTO `beauty_packet` VALUES ('35', '38', '1479534074', '1482126074', '10.00', '1', '1', '1479571200');
INSERT INTO `beauty_packet` VALUES ('36', '34', '1480665445', '1483257445', '20.00', '1', '1', '1479744000');
INSERT INTO `beauty_packet` VALUES ('37', '34', '1480665445', '1483257445', '20.00', '1', '1', '1479916800');
INSERT INTO `beauty_packet` VALUES ('38', '5', '1480663269', '1483255269', '63.00', '1', '1', '1480003200');
INSERT INTO `beauty_packet` VALUES ('39', '34', '1480665445', '1483257445', '20.00', '1', '1', '1480003200');
INSERT INTO `beauty_packet` VALUES ('40', '6', '1480664926', '1483256926', '8.00', '2', '1', '1480089600');
INSERT INTO `beauty_packet` VALUES ('41', '40', null, null, null, '0', '0', null);
INSERT INTO `beauty_packet` VALUES ('42', '35', '1480640429', '1483232429', '20.00', '1', '1', '1480176000');
INSERT INTO `beauty_packet` VALUES ('43', '5', '1480663269', '1483255269', '30.00', '1', '1', '1480176000');
INSERT INTO `beauty_packet` VALUES ('44', '8', '1480664006', '1483256006', '25.00', '2', '1', '1480262400');
INSERT INTO `beauty_packet` VALUES ('45', '41', null, null, null, '0', '0', null);
INSERT INTO `beauty_packet` VALUES ('46', '42', null, null, null, '0', '0', null);
INSERT INTO `beauty_packet` VALUES ('47', '43', null, null, null, '0', '0', null);
INSERT INTO `beauty_packet` VALUES ('48', '8', '1480664006', '1483256006', '20.00', '2', '1', '1480348800');
INSERT INTO `beauty_packet` VALUES ('49', '44', null, null, null, '0', '0', null);
INSERT INTO `beauty_packet` VALUES ('50', '34', '1480665445', '1483257445', '25.00', '1', '1', '1480608000');
INSERT INTO `beauty_packet` VALUES ('51', '9', '1480579367', '1483171367', '20.00', '1', '1', '1480608000');
INSERT INTO `beauty_packet` VALUES ('52', '45', '1480593419', '1483185419', null, '0', '0', null);
INSERT INTO `beauty_packet` VALUES ('53', '46', null, null, null, '0', '0', null);
INSERT INTO `beauty_packet` VALUES ('54', '8', '1480664006', '1483256006', '15.00', '2', '1', '1480694400');
INSERT INTO `beauty_packet` VALUES ('55', '6', '1480664926', '1483256926', '20.00', '1', '1', '1480694400');

-- ----------------------------
-- Table structure for `beauty_pic`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_pic`;
CREATE TABLE `beauty_pic` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `gid` tinyint(4) NOT NULL,
  `picurl` varchar(255) DEFAULT NULL,
  `picname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_pic
-- ----------------------------
INSERT INTO `beauty_pic` VALUES ('1', '1', '2016-11-10/', '5824302f69e2f.jpg');
INSERT INTO `beauty_pic` VALUES ('2', '1', '2016-11-10/', '58243030565e4.jpg');
INSERT INTO `beauty_pic` VALUES ('3', '1', '2016-11-10/', '582430313200c.jpg');
INSERT INTO `beauty_pic` VALUES ('4', '2', '2016-11-10/', '5824308f61378.jpg');
INSERT INTO `beauty_pic` VALUES ('5', '2', '2016-11-10/', '5824308fee569.jpg');
INSERT INTO `beauty_pic` VALUES ('6', '3', '2016-11-10/', '582430ffea87e.jpg');
INSERT INTO `beauty_pic` VALUES ('7', '3', '2016-11-10/', '582431007847d.jpg');
INSERT INTO `beauty_pic` VALUES ('8', '3', '2016-11-10/', '582431011f2d9.jpg');
INSERT INTO `beauty_pic` VALUES ('9', '4', '2016-11-10/', '5824317f458f9.jpg');
INSERT INTO `beauty_pic` VALUES ('10', '4', '2016-11-10/', '582431801a5c0.jpg');
INSERT INTO `beauty_pic` VALUES ('11', '4', '2016-11-10/', '58243180ebd81.jpg');
INSERT INTO `beauty_pic` VALUES ('12', '5', '2016-11-10/', '5824320391a08.jpg');
INSERT INTO `beauty_pic` VALUES ('13', '5', '2016-11-10/', '58243204418ef.jpg');
INSERT INTO `beauty_pic` VALUES ('14', '5', '2016-11-10/', '582432051bf8f.jpg');
INSERT INTO `beauty_pic` VALUES ('15', '6', '2016-11-10/', '5824343a6ae96.jpg');
INSERT INTO `beauty_pic` VALUES ('16', '6', '2016-11-10/', '5824343ae4fd3.jpg');
INSERT INTO `beauty_pic` VALUES ('17', '6', '2016-11-10/', '5824343b7fec4.jpg');
INSERT INTO `beauty_pic` VALUES ('18', '7', '2016-11-10/', '582434a27cf77.jpg');
INSERT INTO `beauty_pic` VALUES ('19', '7', '2016-11-10/', '582434a2f0f0a.jpg');
INSERT INTO `beauty_pic` VALUES ('20', '7', '2016-11-10/', '582434a383d11.jpg');
INSERT INTO `beauty_pic` VALUES ('21', '8', '2016-11-10/', '5824352a57cd1.jpg');
INSERT INTO `beauty_pic` VALUES ('22', '8', '2016-11-10/', '5824352adf4e8.jpg');
INSERT INTO `beauty_pic` VALUES ('23', '9', '2016-11-10/', '582435afe35c9.jpg');
INSERT INTO `beauty_pic` VALUES ('24', '9', '2016-11-10/', '582435b06db16.jpg');
INSERT INTO `beauty_pic` VALUES ('25', '9', '2016-11-10/', '582435b103416.jpg');
INSERT INTO `beauty_pic` VALUES ('26', '10', '2016-11-10/', '5824362e6997c.jpg');
INSERT INTO `beauty_pic` VALUES ('27', '10', '2016-11-10/', '5824362f188c2.jpg');
INSERT INTO `beauty_pic` VALUES ('28', '10', '2016-11-10/', '5824362fe7d5b.jpg');
INSERT INTO `beauty_pic` VALUES ('29', '11', '2016-11-10/', '582436be50fdb.jpg');
INSERT INTO `beauty_pic` VALUES ('30', '11', '2016-11-10/', '582436beeacef.jpg');
INSERT INTO `beauty_pic` VALUES ('31', '11', '2016-11-10/', '582436bf85fc8.jpg');
INSERT INTO `beauty_pic` VALUES ('32', '12', '2016-11-10/', '582437300f324.jpg');
INSERT INTO `beauty_pic` VALUES ('33', '12', '2016-11-10/', '5824373092cba.jpg');
INSERT INTO `beauty_pic` VALUES ('34', '12', '2016-11-10/', '5824373121c41.jpg');
INSERT INTO `beauty_pic` VALUES ('35', '12', '2016-11-10/', '58243731a4e08.jpg');
INSERT INTO `beauty_pic` VALUES ('36', '13', '2016-11-10/', '582437c035d49.jpg');
INSERT INTO `beauty_pic` VALUES ('37', '13', '2016-11-10/', '582437c118ca3.jpg');
INSERT INTO `beauty_pic` VALUES ('38', '13', '2016-11-10/', '582437c20e8ca.jpg');
INSERT INTO `beauty_pic` VALUES ('39', '14', '2016-11-10/', '58243832b46df.jpg');
INSERT INTO `beauty_pic` VALUES ('40', '14', '2016-11-10/', '5824383391c60.jpg');
INSERT INTO `beauty_pic` VALUES ('41', '14', '2016-11-10/', '5824383460396.jpg');
INSERT INTO `beauty_pic` VALUES ('42', '15', '2016-11-10/', '582438b0822f2.jpg');
INSERT INTO `beauty_pic` VALUES ('43', '15', '2016-11-10/', '582438b175420.jpg');
INSERT INTO `beauty_pic` VALUES ('44', '15', '2016-11-10/', '582438b242bb6.jpg');
INSERT INTO `beauty_pic` VALUES ('45', '16', '2016-11-10/', '582439269048b.jpg');
INSERT INTO `beauty_pic` VALUES ('46', '16', '2016-11-10/', '5824392729824.jpg');
INSERT INTO `beauty_pic` VALUES ('47', '16', '2016-11-10/', '58243927b23c4.jpg');
INSERT INTO `beauty_pic` VALUES ('48', '17', '2016-11-10/', '58243982aaf5f.jpg');
INSERT INTO `beauty_pic` VALUES ('49', '17', '2016-11-10/', '582439834c7ca.jpg');
INSERT INTO `beauty_pic` VALUES ('50', '18', '2016-11-10/', '582439e7dd33c.jpg');
INSERT INTO `beauty_pic` VALUES ('51', '18', '2016-11-10/', '582439e8bfac6.jpg');
INSERT INTO `beauty_pic` VALUES ('52', '18', '2016-11-10/', '582439e93d108.jpg');
INSERT INTO `beauty_pic` VALUES ('53', '19', '2016-11-10/', '58243a4ce4b76.jpg');
INSERT INTO `beauty_pic` VALUES ('54', '19', '2016-11-10/', '58243a4dbbb66.jpg');
INSERT INTO `beauty_pic` VALUES ('55', '19', '2016-11-10/', '58243a4e8835b.jpg');
INSERT INTO `beauty_pic` VALUES ('56', '20', '2016-11-10/', '58243bc198ddb.jpg');
INSERT INTO `beauty_pic` VALUES ('57', '20', '2016-11-10/', '58243bc22a472.jpg');
INSERT INTO `beauty_pic` VALUES ('58', '20', '2016-11-10/', '58243bc2a8818.jpg');
INSERT INTO `beauty_pic` VALUES ('59', '21', '2016-11-10/', '58243c242aab7.jpg');
INSERT INTO `beauty_pic` VALUES ('60', '21', '2016-11-10/', '58243c2505540.jpg');
INSERT INTO `beauty_pic` VALUES ('61', '21', '2016-11-10/', '58243c25c923e.jpg');
INSERT INTO `beauty_pic` VALUES ('62', '22', '2016-11-10/', '58243d57dc896.jpg');
INSERT INTO `beauty_pic` VALUES ('63', '22', '2016-11-10/', '58243d585b260.jpg');
INSERT INTO `beauty_pic` VALUES ('64', '22', '2016-11-10/', '58243d58c887a.jpg');
INSERT INTO `beauty_pic` VALUES ('65', '23', '2016-11-10/', '58243edc895af.jpg');
INSERT INTO `beauty_pic` VALUES ('66', '23', '2016-11-10/', '58243edd23118.jpg');
INSERT INTO `beauty_pic` VALUES ('67', '23', '2016-11-10/', '58243edda727f.jpg');
INSERT INTO `beauty_pic` VALUES ('68', '24', '2016-11-10/', '58243f2604555.jpg');
INSERT INTO `beauty_pic` VALUES ('69', '24', '2016-11-10/', '58243f26809ba.jpg');
INSERT INTO `beauty_pic` VALUES ('70', '25', '2016-11-10/', '58243f8e72346.jpg');
INSERT INTO `beauty_pic` VALUES ('71', '25', '2016-11-10/', '58243f8f00715.jpg');
INSERT INTO `beauty_pic` VALUES ('72', '25', '2016-11-10/', '58243f8f8216b.jpg');
INSERT INTO `beauty_pic` VALUES ('73', '26', '2016-11-10/', '58243fe265378.jpg');
INSERT INTO `beauty_pic` VALUES ('74', '26', '2016-11-10/', '58243fe30391a.jpg');
INSERT INTO `beauty_pic` VALUES ('75', '26', '2016-11-10/', '58243fe388a21.jpg');
INSERT INTO `beauty_pic` VALUES ('76', '27', '2016-11-10/', '582440489d54f.jpg');
INSERT INTO `beauty_pic` VALUES ('77', '27', '2016-11-10/', '582440496eb65.jpg');
INSERT INTO `beauty_pic` VALUES ('78', '27', '2016-11-10/', '5824404a3bf12.jpg');
INSERT INTO `beauty_pic` VALUES ('79', '28', '2016-11-10/', '5824425777c45.jpg');
INSERT INTO `beauty_pic` VALUES ('80', '28', '2016-11-10/', '5824425864bc9.jpg');
INSERT INTO `beauty_pic` VALUES ('81', '28', '2016-11-10/', '582442592e0f6.jpg');
INSERT INTO `beauty_pic` VALUES ('82', '29', '2016-11-10/', '582442c26ec33.jpg');
INSERT INTO `beauty_pic` VALUES ('83', '29', '2016-11-10/', '582442c301652.jpg');
INSERT INTO `beauty_pic` VALUES ('84', '30', '2016-11-10/', '58244329bc9f0.jpg');
INSERT INTO `beauty_pic` VALUES ('85', '30', '2016-11-10/', '5824432a4dc9f.jpg');
INSERT INTO `beauty_pic` VALUES ('86', '30', '2016-11-10/', '5824432ace36e.jpg');
INSERT INTO `beauty_pic` VALUES ('87', '31', '2016-11-10/', '5824439cef8be.jpg');
INSERT INTO `beauty_pic` VALUES ('88', '31', '2016-11-10/', '5824439dd6699.jpg');
INSERT INTO `beauty_pic` VALUES ('89', '31', '2016-11-10/', '5824439ead2a1.jpg');
INSERT INTO `beauty_pic` VALUES ('90', '32', '2016-11-10/', '582445a47f2c2.jpg');
INSERT INTO `beauty_pic` VALUES ('91', '33', '2016-11-10/', '58244629e2b10.jpg');
INSERT INTO `beauty_pic` VALUES ('92', '33', '2016-11-10/', '5824462ae1f91.jpg');
INSERT INTO `beauty_pic` VALUES ('93', '33', '2016-11-10/', '5824462b7e5f3.jpg');
INSERT INTO `beauty_pic` VALUES ('94', '34', '2016-11-10/', '5824467a288e6.jpg');
INSERT INTO `beauty_pic` VALUES ('95', '35', '2016-11-10/', '5824471b9e0ba.jpg');
INSERT INTO `beauty_pic` VALUES ('96', '35', '2016-11-10/', '5824471c35512.jpg');
INSERT INTO `beauty_pic` VALUES ('97', '35', '2016-11-10/', '5824471cd5f88.jpg');
INSERT INTO `beauty_pic` VALUES ('98', '36', '2016-11-10/', '58244784208d2.jpg');
INSERT INTO `beauty_pic` VALUES ('99', '36', '2016-11-10/', '58244784a36b1.jpg');
INSERT INTO `beauty_pic` VALUES ('100', '36', '2016-11-10/', '582447857a2b8.jpg');
INSERT INTO `beauty_pic` VALUES ('101', '37', '2016-11-10/', '582448450fb6d.jpg');
INSERT INTO `beauty_pic` VALUES ('102', '37', '2016-11-10/', '5824484599a95.jpg');
INSERT INTO `beauty_pic` VALUES ('103', '37', '2016-11-10/', '582448462824c.jpg');
INSERT INTO `beauty_pic` VALUES ('104', '38', '2016-11-10/', '58244bc562790.jpg');
INSERT INTO `beauty_pic` VALUES ('105', '38', '2016-11-10/', '58244bc5d6ef3.jpg');
INSERT INTO `beauty_pic` VALUES ('106', '39', '2016-11-10/', '58244c95cb6f1.jpg');
INSERT INTO `beauty_pic` VALUES ('107', '39', '2016-11-10/', '58244c964c7cd.jpg');
INSERT INTO `beauty_pic` VALUES ('108', '40', '2016-11-10/', '58244d01a8132.jpg');
INSERT INTO `beauty_pic` VALUES ('109', '40', '2016-11-10/', '58244d020730e.jpg');
INSERT INTO `beauty_pic` VALUES ('110', '41', '2016-11-10/', '58244d681ce15.jpg');
INSERT INTO `beauty_pic` VALUES ('111', '42', '2016-11-10/', '58244e2a63b56.jpg');
INSERT INTO `beauty_pic` VALUES ('112', '42', '2016-11-10/', '58244e2ad0d87.jpg');
INSERT INTO `beauty_pic` VALUES ('113', '43', '2016-11-10/', '58244e2bda232.jpg');
INSERT INTO `beauty_pic` VALUES ('114', '44', '2016-11-10/', '58244ee8786de.jpg');
INSERT INTO `beauty_pic` VALUES ('115', '44', '2016-11-10/', '58244ee903fb4.jpg');
INSERT INTO `beauty_pic` VALUES ('116', '44', '2016-11-10/', '58244ee98717a.jpg');
INSERT INTO `beauty_pic` VALUES ('117', '45', '2016-11-10/', '58244fd435688.jpg');
INSERT INTO `beauty_pic` VALUES ('118', '45', '2016-11-10/', '58244fd4b1706.jpg');
INSERT INTO `beauty_pic` VALUES ('119', '45', '2016-11-10/', '58244fd548b5e.jpg');
INSERT INTO `beauty_pic` VALUES ('120', '46', '2016-11-10/', '58245021363d5.jpg');
INSERT INTO `beauty_pic` VALUES ('121', '47', '2016-11-10/', '5824507f68621.jpg');
INSERT INTO `beauty_pic` VALUES ('122', '47', '2016-11-10/', '5824507fa0c86.jpg');
INSERT INTO `beauty_pic` VALUES ('123', '48', '2016-11-10/', '582450e99f16d.jpg');
INSERT INTO `beauty_pic` VALUES ('124', '48', '2016-11-10/', '582450ea14aae.jpg');
INSERT INTO `beauty_pic` VALUES ('125', '48', '2016-11-10/', '582450ea820c7.jpg');
INSERT INTO `beauty_pic` VALUES ('126', '48', '2016-11-10/', '582450eb031a3.jpg');
INSERT INTO `beauty_pic` VALUES ('127', '49', '2016-11-10/', '58245148d42d3.jpg');
INSERT INTO `beauty_pic` VALUES ('128', '49', '2016-11-10/', '5824514958e47.jpg');
INSERT INTO `beauty_pic` VALUES ('129', '49', '2016-11-10/', '58245149ce54b.jpg');
INSERT INTO `beauty_pic` VALUES ('130', '50', '2016-11-10/', '582451f90c3e8.jpg');
INSERT INTO `beauty_pic` VALUES ('131', '50', '2016-11-10/', '582451f986cf5.jpg');
INSERT INTO `beauty_pic` VALUES ('132', '50', '2016-11-10/', '582451fa05e90.jpg');
INSERT INTO `beauty_pic` VALUES ('133', '51', '2016-11-10/', '5824528abaa46.jpg');
INSERT INTO `beauty_pic` VALUES ('134', '51', '2016-11-10/', '5824528b4fb76.jpg');
INSERT INTO `beauty_pic` VALUES ('135', '51', '2016-11-10/', '5824528bd6bbe.jpg');
INSERT INTO `beauty_pic` VALUES ('136', '52', '2016-11-10/', '5824531b97ccc.jpg');
INSERT INTO `beauty_pic` VALUES ('137', '52', '2016-11-10/', '5824531c16696.jpg');
INSERT INTO `beauty_pic` VALUES ('138', '53', '2016-11-10/', '582453756f0fe.jpg');
INSERT INTO `beauty_pic` VALUES ('139', '53', '2016-11-10/', '58245375bc758.jpg');
INSERT INTO `beauty_pic` VALUES ('140', '53', '2016-11-10/', '582453762595e.jpg');
INSERT INTO `beauty_pic` VALUES ('141', '54', '2016-11-10/', '582453d494478.jpg');
INSERT INTO `beauty_pic` VALUES ('142', '55', '2016-11-10/', '582454198138e.jpg');
INSERT INTO `beauty_pic` VALUES ('143', '56', '2016-11-10/', '5824546224bb0.jpg');
INSERT INTO `beauty_pic` VALUES ('144', '56', '2016-11-10/', '582454625d5fd.jpg');
INSERT INTO `beauty_pic` VALUES ('145', '56', '2016-11-10/', '58245462996fb.jpg');
INSERT INTO `beauty_pic` VALUES ('146', '57', '2016-11-10/', '5824551518d33.jpg');
INSERT INTO `beauty_pic` VALUES ('147', '57', '2016-11-10/', '58245515a66f5.jpg');
INSERT INTO `beauty_pic` VALUES ('148', '57', '2016-11-10/', '5824551630c42.jpg');
INSERT INTO `beauty_pic` VALUES ('149', '57', '2016-11-10/', '58245516b70d2.jpg');
INSERT INTO `beauty_pic` VALUES ('150', '58', '2016-11-10/', '58245594343c2.jpg');
INSERT INTO `beauty_pic` VALUES ('151', '58', '2016-11-10/', '58245594aaa66.jpg');
INSERT INTO `beauty_pic` VALUES ('152', '58', '2016-11-10/', '582455952af89.jpg');
INSERT INTO `beauty_pic` VALUES ('153', '59', '2016-11-10/', '582455d8d8c4a.jpg');
INSERT INTO `beauty_pic` VALUES ('154', '59', '2016-11-10/', '582455d969ef9.jpg');
INSERT INTO `beauty_pic` VALUES ('155', '59', '2016-11-10/', '582455d9ef7d0.jpg');
INSERT INTO `beauty_pic` VALUES ('156', '59', '2016-11-10/', '582455da54f3d.jpg');
INSERT INTO `beauty_pic` VALUES ('157', '60', '2016-11-10/', '582456112b3cd.jpg');
INSERT INTO `beauty_pic` VALUES ('158', '60', '2016-11-10/', '58245611b33b5.jpg');
INSERT INTO `beauty_pic` VALUES ('159', '61', '2016-11-10/', '582458a8b8188.jpg');
INSERT INTO `beauty_pic` VALUES ('160', '61', '2016-11-10/', '582458a94887f.jpg');
INSERT INTO `beauty_pic` VALUES ('161', '61', '2016-11-10/', '582458a9bfadb.jpg');
INSERT INTO `beauty_pic` VALUES ('162', '62', '2016-11-10/', '582459366cae8.jpg');
INSERT INTO `beauty_pic` VALUES ('163', '62', '2016-11-10/', '58245936e25d4.jpg');
INSERT INTO `beauty_pic` VALUES ('164', '63', '2016-11-10/', '58245a246c195.jpg');
INSERT INTO `beauty_pic` VALUES ('165', '63', '2016-11-10/', '58245a24e66b9.jpg');
INSERT INTO `beauty_pic` VALUES ('166', '64', '2016-11-10/', '58245a9caf354.jpg');
INSERT INTO `beauty_pic` VALUES ('167', '64', '2016-11-10/', '58245a9d3a45a.jpg');
INSERT INTO `beauty_pic` VALUES ('168', '65', '2016-11-10/', '58245b0899858.jpg');
INSERT INTO `beauty_pic` VALUES ('169', '65', '2016-11-10/', '58245b0927c27.jpg');
INSERT INTO `beauty_pic` VALUES ('170', '65', '2016-11-10/', '58245b099e2ca.jpg');
INSERT INTO `beauty_pic` VALUES ('171', '66', '2016-11-10/', '58245bb11421b.jpg');
INSERT INTO `beauty_pic` VALUES ('172', '66', '2016-11-10/', '58245bb195c72.jpg');
INSERT INTO `beauty_pic` VALUES ('173', '66', '2016-11-10/', '58245bb215dad.jpg');
INSERT INTO `beauty_pic` VALUES ('174', '67', '2016-11-10/', '58245c0a935bb.jpg');
INSERT INTO `beauty_pic` VALUES ('175', '67', '2016-11-10/', '58245c0b13ec7.jpg');
INSERT INTO `beauty_pic` VALUES ('176', '67', '2016-11-10/', '58245c0b85361.jpg');
INSERT INTO `beauty_pic` VALUES ('177', '68', '2016-11-10/', '58245c4711d4e.jpg');
INSERT INTO `beauty_pic` VALUES ('178', '68', '2016-11-10/', '58245c478706a.jpg');
INSERT INTO `beauty_pic` VALUES ('179', '68', '2016-11-10/', '58245c48013e3.jpg');
INSERT INTO `beauty_pic` VALUES ('180', '69', '2016-11-10/', '58245c8cdfa41.jpg');
INSERT INTO `beauty_pic` VALUES ('181', '69', '2016-11-10/', '58245c8d5b913.jpg');
INSERT INTO `beauty_pic` VALUES ('182', '69', '2016-11-10/', '58245c8dcecee.jpg');
INSERT INTO `beauty_pic` VALUES ('183', '70', '2016-11-10/', '58245cfbe8458.jpg');
INSERT INTO `beauty_pic` VALUES ('184', '70', '2016-11-10/', '58245cfc681ab.jpg');
INSERT INTO `beauty_pic` VALUES ('185', '70', '2016-11-10/', '58245cfcdffbf.jpg');
INSERT INTO `beauty_pic` VALUES ('186', '71', '2016-11-10/', '58245d563bb44.jpg');
INSERT INTO `beauty_pic` VALUES ('187', '71', '2016-11-10/', '58245d56b1a18.jpg');
INSERT INTO `beauty_pic` VALUES ('188', '71', '2016-11-10/', '58245d572dcd2.jpg');
INSERT INTO `beauty_pic` VALUES ('189', '72', '2016-11-10/', '58245e25f1126.jpg');
INSERT INTO `beauty_pic` VALUES ('190', '73', '2016-11-10/', '58245eb60dd5f.jpg');
INSERT INTO `beauty_pic` VALUES ('191', '73', '2016-11-10/', '58245eb67da89.jpg');
INSERT INTO `beauty_pic` VALUES ('192', '74', '2016-11-10/', '58245ef8a0078.jpg');
INSERT INTO `beauty_pic` VALUES ('193', '74', '2016-11-10/', '58245ef9272fd.jpg');
INSERT INTO `beauty_pic` VALUES ('194', '74', '2016-11-10/', '58245ef9a3762.jpg');
INSERT INTO `beauty_pic` VALUES ('195', '74', '2016-11-10/', '58245efa2212d.jpg');
INSERT INTO `beauty_pic` VALUES ('196', '75', '2016-11-10/', '58245f47b17db.jpg');
INSERT INTO `beauty_pic` VALUES ('197', '75', '2016-11-10/', '58245f4839230.jpg');
INSERT INTO `beauty_pic` VALUES ('198', '75', '2016-11-10/', '58245f489f318.jpg');
INSERT INTO `beauty_pic` VALUES ('199', '75', '2016-11-10/', '58245f49042b4.jpg');
INSERT INTO `beauty_pic` VALUES ('200', '76', '2016-11-10/', '5824602915f25.jpg');
INSERT INTO `beauty_pic` VALUES ('201', '76', '2016-11-10/', '58246029942ca.jpg');
INSERT INTO `beauty_pic` VALUES ('202', '76', '2016-11-10/', '5824602a23251.jpg');
INSERT INTO `beauty_pic` VALUES ('203', '76', '2016-11-10/', '5824602a9950d.jpg');
INSERT INTO `beauty_pic` VALUES ('250', '81', '2016-12-02/', '5840ff1f15ff2.jpg');
INSERT INTO `beauty_pic` VALUES ('251', '82', '2016-12-02/', '584124c32cfaf.jpg');
INSERT INTO `beauty_pic` VALUES ('252', '82', '2016-12-02/', '584124c34cb86.jpg');

-- ----------------------------
-- Table structure for `beauty_pic1`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_pic1`;
CREATE TABLE `beauty_pic1` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `gid` tinyint(4) NOT NULL,
  `picurl` varchar(255) DEFAULT NULL,
  `picname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_pic1
-- ----------------------------
INSERT INTO `beauty_pic1` VALUES ('1', '1', '2016-11-10/', '5824302f69e2f.jpg');
INSERT INTO `beauty_pic1` VALUES ('2', '1', '2016-11-10/', '58243030565e4.jpg');
INSERT INTO `beauty_pic1` VALUES ('3', '1', '2016-11-10/', '582430313200c.jpg');
INSERT INTO `beauty_pic1` VALUES ('4', '2', '2016-11-10/', '5824308f61378.jpg');
INSERT INTO `beauty_pic1` VALUES ('5', '2', '2016-11-10/', '5824308fee569.jpg');
INSERT INTO `beauty_pic1` VALUES ('6', '3', '2016-11-10/', '582430ffea87e.jpg');
INSERT INTO `beauty_pic1` VALUES ('7', '3', '2016-11-10/', '582431007847d.jpg');
INSERT INTO `beauty_pic1` VALUES ('8', '3', '2016-11-10/', '582431011f2d9.jpg');
INSERT INTO `beauty_pic1` VALUES ('9', '4', '2016-11-10/', '5824317f458f9.jpg');
INSERT INTO `beauty_pic1` VALUES ('10', '4', '2016-11-10/', '582431801a5c0.jpg');
INSERT INTO `beauty_pic1` VALUES ('11', '4', '2016-11-10/', '58243180ebd81.jpg');
INSERT INTO `beauty_pic1` VALUES ('12', '5', '2016-11-10/', '5824320391a08.jpg');
INSERT INTO `beauty_pic1` VALUES ('13', '5', '2016-11-10/', '58243204418ef.jpg');
INSERT INTO `beauty_pic1` VALUES ('14', '5', '2016-11-10/', '582432051bf8f.jpg');
INSERT INTO `beauty_pic1` VALUES ('15', '6', '2016-11-10/', '5824343a6ae96.jpg');
INSERT INTO `beauty_pic1` VALUES ('16', '6', '2016-11-10/', '5824343ae4fd3.jpg');
INSERT INTO `beauty_pic1` VALUES ('17', '6', '2016-11-10/', '5824343b7fec4.jpg');
INSERT INTO `beauty_pic1` VALUES ('18', '7', '2016-11-10/', '582434a27cf77.jpg');
INSERT INTO `beauty_pic1` VALUES ('19', '7', '2016-11-10/', '582434a2f0f0a.jpg');
INSERT INTO `beauty_pic1` VALUES ('20', '7', '2016-11-10/', '582434a383d11.jpg');
INSERT INTO `beauty_pic1` VALUES ('124', '48', '2016-11-10/', '582450ea14aae.jpg');
INSERT INTO `beauty_pic1` VALUES ('125', '48', '2016-11-10/', '582450ea820c7.jpg');
INSERT INTO `beauty_pic1` VALUES ('126', '48', '2016-11-10/', '582450eb031a3.jpg');
INSERT INTO `beauty_pic1` VALUES ('127', '49', '2016-11-10/', '58245148d42d3.jpg');
INSERT INTO `beauty_pic1` VALUES ('128', '49', '2016-11-10/', '5824514958e47.jpg');
INSERT INTO `beauty_pic1` VALUES ('129', '49', '2016-11-10/', '58245149ce54b.jpg');
INSERT INTO `beauty_pic1` VALUES ('130', '50', '2016-11-10/', '582451f90c3e8.jpg');
INSERT INTO `beauty_pic1` VALUES ('131', '50', '2016-11-10/', '582451f986cf5.jpg');
INSERT INTO `beauty_pic1` VALUES ('132', '50', '2016-11-10/', '582451fa05e90.jpg');
INSERT INTO `beauty_pic1` VALUES ('133', '51', '2016-11-10/', '5824528abaa46.jpg');
INSERT INTO `beauty_pic1` VALUES ('134', '51', '2016-11-10/', '5824528b4fb76.jpg');
INSERT INTO `beauty_pic1` VALUES ('135', '51', '2016-11-10/', '5824528bd6bbe.jpg');
INSERT INTO `beauty_pic1` VALUES ('136', '52', '2016-11-10/', '5824531b97ccc.jpg');
INSERT INTO `beauty_pic1` VALUES ('137', '52', '2016-11-10/', '5824531c16696.jpg');
INSERT INTO `beauty_pic1` VALUES ('138', '53', '2016-11-10/', '582453756f0fe.jpg');
INSERT INTO `beauty_pic1` VALUES ('139', '53', '2016-11-10/', '58245375bc758.jpg');
INSERT INTO `beauty_pic1` VALUES ('140', '53', '2016-11-10/', '582453762595e.jpg');
INSERT INTO `beauty_pic1` VALUES ('141', '54', '2016-11-10/', '582453d494478.jpg');
INSERT INTO `beauty_pic1` VALUES ('142', '55', '2016-11-10/', '582454198138e.jpg');
INSERT INTO `beauty_pic1` VALUES ('159', '61', '2016-11-10/', '582458a8b8188.jpg');
INSERT INTO `beauty_pic1` VALUES ('160', '61', '2016-11-10/', '582458a94887f.jpg');
INSERT INTO `beauty_pic1` VALUES ('161', '61', '2016-11-10/', '582458a9bfadb.jpg');
INSERT INTO `beauty_pic1` VALUES ('162', '62', '2016-11-10/', '582459366cae8.jpg');
INSERT INTO `beauty_pic1` VALUES ('163', '62', '2016-11-10/', '58245936e25d4.jpg');
INSERT INTO `beauty_pic1` VALUES ('164', '63', '2016-11-10/', '58245a246c195.jpg');
INSERT INTO `beauty_pic1` VALUES ('165', '63', '2016-11-10/', '58245a24e66b9.jpg');
INSERT INTO `beauty_pic1` VALUES ('166', '64', '2016-11-10/', '58245a9caf354.jpg');
INSERT INTO `beauty_pic1` VALUES ('167', '64', '2016-11-10/', '58245a9d3a45a.jpg');
INSERT INTO `beauty_pic1` VALUES ('168', '65', '2016-11-10/', '58245b0899858.jpg');
INSERT INTO `beauty_pic1` VALUES ('169', '65', '2016-11-10/', '58245b0927c27.jpg');
INSERT INTO `beauty_pic1` VALUES ('170', '65', '2016-11-10/', '58245b099e2ca.jpg');
INSERT INTO `beauty_pic1` VALUES ('171', '66', '2016-11-10/', '58245bb11421b.jpg');
INSERT INTO `beauty_pic1` VALUES ('172', '66', '2016-11-10/', '58245bb195c72.jpg');
INSERT INTO `beauty_pic1` VALUES ('173', '66', '2016-11-10/', '58245bb215dad.jpg');
INSERT INTO `beauty_pic1` VALUES ('174', '67', '2016-11-25/', '584645d152f10.jpg');
INSERT INTO `beauty_pic1` VALUES ('175', '67', '2016-11-25/', '584645d157561.jpg');
INSERT INTO `beauty_pic1` VALUES ('176', '67', '2016-11-25/', '584645d158119.jpg');
INSERT INTO `beauty_pic1` VALUES ('177', '68', '2016-11-30/', '584651c153dfe.jpg');
INSERT INTO `beauty_pic1` VALUES ('178', '68', '2016-11-30/', '584651c15556f.jpg');
INSERT INTO `beauty_pic1` VALUES ('179', '68', '2016-11-30/', '584651c15650f.jpg');
INSERT INTO `beauty_pic1` VALUES ('180', '69', '2016-11-10/', '58245c8cdfa41.jpg');
INSERT INTO `beauty_pic1` VALUES ('181', '69', '2016-11-10/', '58245c8d5b913.jpg');
INSERT INTO `beauty_pic1` VALUES ('182', '69', '2016-11-10/', '58245c8dcecee.jpg');

-- ----------------------------
-- Table structure for `beauty_sign`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_sign`;
CREATE TABLE `beauty_sign` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) DEFAULT NULL,
  `sign` int(10) DEFAULT NULL,
  `signtime` varchar(255) DEFAULT NULL,
  `signcount` int(11) DEFAULT '0',
  `signtag` int(11) DEFAULT '0',
  `luckytag` int(11) DEFAULT '0',
  `stoptime` varchar(255) DEFAULT NULL,
  `stopsign` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_sign
-- ----------------------------
INSERT INTO `beauty_sign` VALUES ('1', '5', '160305', '1480663304', '139', '1', '1', '1480694400', '1480694400');
INSERT INTO `beauty_sign` VALUES ('2', '9', '831197', '1478746254', '3', '0', '3', '1478880000', '1478793600');
INSERT INTO `beauty_sign` VALUES ('3', '6', '21718', '1480664681', '3', '1', '0', '1478793600', '1480694400');
INSERT INTO `beauty_sign` VALUES ('4', '34', '181718', '1480593820', '9', '1', '2', '1480608000', '1480608000');
INSERT INTO `beauty_sign` VALUES ('5', '8', '271720', '1480590262', '8', '1', '3', '147888', '1480608000');
INSERT INTO `beauty_sign` VALUES ('6', '16', '51717', '1479449182', '1', '1', '3', '147888', '1479484800');
INSERT INTO `beauty_sign` VALUES ('7', '38', '99111', '1479618143', '4', '0', '1', '1479571200', '1479657600');
INSERT INTO `beauty_sign` VALUES ('8', '35', '1719', '1480127933', '1', '0', '1', '1480176000', '0');

-- ----------------------------
-- Table structure for `beauty_type`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_type`;
CREATE TABLE `beauty_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(10) DEFAULT NULL,
  `ml` varchar(255) DEFAULT NULL COMMENT '容量',
  `saleprice` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_type
-- ----------------------------
INSERT INTO `beauty_type` VALUES ('2', '2', '150', '389');
INSERT INTO `beauty_type` VALUES ('3', '3', '150', '140');
INSERT INTO `beauty_type` VALUES ('4', '4', '160', '279');
INSERT INTO `beauty_type` VALUES ('5', '5', '200', '469');
INSERT INTO `beauty_type` VALUES ('6', '6', '25', '69');
INSERT INTO `beauty_type` VALUES ('7', '7', '25', '89');
INSERT INTO `beauty_type` VALUES ('8', '8', '25', '89');
INSERT INTO `beauty_type` VALUES ('9', '9', '25', '69');
INSERT INTO `beauty_type` VALUES ('10', '10', '25', '169');
INSERT INTO `beauty_type` VALUES ('11', '11', '80', '89');
INSERT INTO `beauty_type` VALUES ('12', '12', '50', '79');
INSERT INTO `beauty_type` VALUES ('13', '13', '50', '99');
INSERT INTO `beauty_type` VALUES ('14', '14', '50', '169');
INSERT INTO `beauty_type` VALUES ('15', '15', '50', '60');
INSERT INTO `beauty_type` VALUES ('16', '16', '280', '49');
INSERT INTO `beauty_type` VALUES ('17', '17', '180', '59');
INSERT INTO `beauty_type` VALUES ('18', '18', '50', '89');
INSERT INTO `beauty_type` VALUES ('19', '19', '50', '89');
INSERT INTO `beauty_type` VALUES ('20', '20', '30', '89');
INSERT INTO `beauty_type` VALUES ('21', '21', '30', '89');
INSERT INTO `beauty_type` VALUES ('22', '22', '750', '40');
INSERT INTO `beauty_type` VALUES ('23', '23', '30', '89');
INSERT INTO `beauty_type` VALUES ('25', '25', '80', '99');
INSERT INTO `beauty_type` VALUES ('26', '26', '100', '89');
INSERT INTO `beauty_type` VALUES ('27', '27', '150', '49');
INSERT INTO `beauty_type` VALUES ('28', '28', '15', '89');
INSERT INTO `beauty_type` VALUES ('29', '29', '15', '100');
INSERT INTO `beauty_type` VALUES ('30', '30', '15', '149');
INSERT INTO `beauty_type` VALUES ('31', '31', '30', '89');
INSERT INTO `beauty_type` VALUES ('32', '32', '80', '89');
INSERT INTO `beauty_type` VALUES ('33', '33', '30', '99');
INSERT INTO `beauty_type` VALUES ('34', '34', '30', '59');
INSERT INTO `beauty_type` VALUES ('35', '35', '100', '49');
INSERT INTO `beauty_type` VALUES ('36', '36', '130', '59');
INSERT INTO `beauty_type` VALUES ('37', '37', '15', '99');
INSERT INTO `beauty_type` VALUES ('38', '38', '60', '39');
INSERT INTO `beauty_type` VALUES ('39', '39', '30', '99');
INSERT INTO `beauty_type` VALUES ('40', '40', '100', '85');
INSERT INTO `beauty_type` VALUES ('41', '41', '120', '118');
INSERT INTO `beauty_type` VALUES ('42', '42', '30', '79');
INSERT INTO `beauty_type` VALUES ('43', '43', '30', '79');
INSERT INTO `beauty_type` VALUES ('45', '45', '30', '209');
INSERT INTO `beauty_type` VALUES ('46', '46', '150', '123');
INSERT INTO `beauty_type` VALUES ('47', '47', '120', '89');
INSERT INTO `beauty_type` VALUES ('49', '49', '120', '159');
INSERT INTO `beauty_type` VALUES ('50', '50', '100', '208');
INSERT INTO `beauty_type` VALUES ('51', '51', '100', '159');
INSERT INTO `beauty_type` VALUES ('52', '52', '150', '399');
INSERT INTO `beauty_type` VALUES ('53', '53', '150', '222');
INSERT INTO `beauty_type` VALUES ('54', '54', '60', '99');
INSERT INTO `beauty_type` VALUES ('56', '56', '40', '79');
INSERT INTO `beauty_type` VALUES ('57', '57', '100', '99');
INSERT INTO `beauty_type` VALUES ('58', '58', '30', '99');
INSERT INTO `beauty_type` VALUES ('59', '59', '50', '39');
INSERT INTO `beauty_type` VALUES ('60', '60', '30', '39');
INSERT INTO `beauty_type` VALUES ('61', '61', '100', '69');
INSERT INTO `beauty_type` VALUES ('62', '62', '15', '128');
INSERT INTO `beauty_type` VALUES ('63', '63', '100', '223');
INSERT INTO `beauty_type` VALUES ('64', '64', '10', '220');
INSERT INTO `beauty_type` VALUES ('65', '65', '50', '332');
INSERT INTO `beauty_type` VALUES ('66', '66', '30', '146');
INSERT INTO `beauty_type` VALUES ('67', '67', '50', '103');
INSERT INTO `beauty_type` VALUES ('68', '68', '15', '255');
INSERT INTO `beauty_type` VALUES ('69', '69', '15', '222');
INSERT INTO `beauty_type` VALUES ('70', '70', '75', '222');
INSERT INTO `beauty_type` VALUES ('71', '71', '30', '198');
INSERT INTO `beauty_type` VALUES ('72', '72', '10', '36');
INSERT INTO `beauty_type` VALUES ('73', '73', '10', '45');
INSERT INTO `beauty_type` VALUES ('74', '74', '20', '69');
INSERT INTO `beauty_type` VALUES ('75', '75', '10', '83');
INSERT INTO `beauty_type` VALUES ('76', '76', '60', '223');
INSERT INTO `beauty_type` VALUES ('83', '2', '180', '409');
INSERT INTO `beauty_type` VALUES ('84', '3', '120', '189');
INSERT INTO `beauty_type` VALUES ('85', '11', '100', '129');
INSERT INTO `beauty_type` VALUES ('86', '13', '80', '109');
INSERT INTO `beauty_type` VALUES ('87', '25', '100', '129');
INSERT INTO `beauty_type` VALUES ('88', '26', '120', '109');
INSERT INTO `beauty_type` VALUES ('91', '47', '100', '69');
INSERT INTO `beauty_type` VALUES ('92', '47', '80', '49');
INSERT INTO `beauty_type` VALUES ('95', '49', '100', '120');
INSERT INTO `beauty_type` VALUES ('96', '49', '60', '100');
INSERT INTO `beauty_type` VALUES ('97', '51', '150', '209');
INSERT INTO `beauty_type` VALUES ('98', '51', '120', '189');
INSERT INTO `beauty_type` VALUES ('99', '53', '100', '189');
INSERT INTO `beauty_type` VALUES ('100', '53', '60', '109');
INSERT INTO `beauty_type` VALUES ('123', '1', '150', '199');
INSERT INTO `beauty_type` VALUES ('124', '1', '200', '229');
INSERT INTO `beauty_type` VALUES ('125', '77', '100', '109');
INSERT INTO `beauty_type` VALUES ('126', '77', '200', '159');
INSERT INTO `beauty_type` VALUES ('127', '78', '10', '109');
INSERT INTO `beauty_type` VALUES ('128', '78', '20', '159');
INSERT INTO `beauty_type` VALUES ('131', '55', '25', '79');
INSERT INTO `beauty_type` VALUES ('132', '44', '120', '99');
INSERT INTO `beauty_type` VALUES ('133', '44', '100', '89');
INSERT INTO `beauty_type` VALUES ('134', '44', '80', '59');
INSERT INTO `beauty_type` VALUES ('135', '48', '150', '189');
INSERT INTO `beauty_type` VALUES ('136', '48', '100', '120');
INSERT INTO `beauty_type` VALUES ('137', '48', '60', '80');
INSERT INTO `beauty_type` VALUES ('138', '24', '750', '49');
INSERT INTO `beauty_type` VALUES ('139', '77', '200', '179');
INSERT INTO `beauty_type` VALUES ('140', '77', '100', null);
INSERT INTO `beauty_type` VALUES ('141', '77', '30', null);
INSERT INTO `beauty_type` VALUES ('142', '78', '60', '109');
INSERT INTO `beauty_type` VALUES ('143', '78', '100', '159');
INSERT INTO `beauty_type` VALUES ('144', '79', '150', '299');
INSERT INTO `beauty_type` VALUES ('145', '79', '180', '399');
INSERT INTO `beauty_type` VALUES ('146', '80', '20', '109');
INSERT INTO `beauty_type` VALUES ('147', '80', '30', '169');
INSERT INTO `beauty_type` VALUES ('154', '82', '30', '129');
INSERT INTO `beauty_type` VALUES ('155', '82', '50', '159');
INSERT INTO `beauty_type` VALUES ('156', '81', '20', '109');
INSERT INTO `beauty_type` VALUES ('157', '81', '40', '159');

-- ----------------------------
-- Table structure for `beauty_user`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_user`;
CREATE TABLE `beauty_user` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `imgpath` varchar(150) DEFAULT NULL COMMENT '用户头像的路径',
  `regtime` varchar(50) DEFAULT NULL COMMENT '注册时间',
  `memberorder` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '1代表普通会员，2代表高级会员，3代表黄金会员',
  `discount` int(10) unsigned DEFAULT '10' COMMENT '红包',
  `lastip` varchar(20) DEFAULT NULL COMMENT '登录ip',
  `lastlogin` varchar(50) DEFAULT NULL COMMENT '登录时间',
  `email` varchar(50) DEFAULT NULL COMMENT '修改密码时的验证和移动端的邮箱注册',
  `monetary` int(30) unsigned DEFAULT NULL COMMENT '用户消费金额',
  `score` int(11) DEFAULT '0' COMMENT '用户积分',
  `paypwd` varchar(50) DEFAULT 'd41d8cd98f00b204e9800998ecf8427e' COMMENT '默认为空',
  `imgname` varchar(80) DEFAULT NULL COMMENT '头像的图片名称',
  `mobile` int(20) unsigned DEFAULT NULL COMMENT '手机号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_user
-- ----------------------------
INSERT INTO `beauty_user` VALUES ('1', '安妮', 'anni', null, null, '1', null, null, null, '', '0', '225', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `beauty_user` VALUES ('2', '艳艳', '123', null, null, '1', null, null, null, '', '0', '225', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `beauty_user` VALUES ('3', 'bb', '123', null, null, '1', null, null, null, '', '0', '225', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `beauty_user` VALUES ('4', 'cc', '123', null, null, '1', null, null, null, '', '0', '225', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `beauty_user` VALUES ('5', 'yanyan', '7219b9b60d9d70a9a7014369d88ebefe', '2016-11-22/', '1477300749', '3', '56', null, '1480662888', '741335619@qq.com', '0', '1625', 'e10adc3949ba59abbe56e057f20f883e', '5833e36182ef5.jpg', null);
INSERT INTO `beauty_user` VALUES ('6', 'baiwenfei', '210d8c9608addb8b107df98f218edbb4', '2016-12-02/', '1477301744', '3', null, null, '1480664911', '741335619@qq.com', '0', '2265', 'e10adc3949ba59abbe56e057f20f883e', '5841275d79e53.jpg', null);
INSERT INTO `beauty_user` VALUES ('7', 'dopa', '16a992e5d9704775dcfd57a96557a64f', null, '1477365626', '1', null, null, '1477471998', '', '0', '225', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `beauty_user` VALUES ('8', 'beibei', '6f2462312f6a173d5531d8db7469dbc1', '2016-11-25/', '1477373913', '2', '1', null, '1480664003', '1875431157@qq.com', '500', '825', 'e10adc3949ba59abbe56e057f20f883e', '5837c482304bf.jpg', null);
INSERT INTO `beauty_user` VALUES ('9', 'wang', 'c33367701511b4f6020ec61ded352059', '2016-11-07/', '1477376529', '3', '20', null, '1480578811', 'wang@126.com', '0', '1225', 'e10adc3949ba59abbe56e057f20f883e', '582032ae87561.jpg', null);
INSERT INTO `beauty_user` VALUES ('10', 'xiaxia', '76df3be4d7ab66e6feeb17ddb0847413', null, '1477552603', '1', null, null, null, '', null, '225', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `beauty_user` VALUES ('11', 'songhao', 'fcea920f7412b5da7be0cf42b8c93759', '2016-12-01/', '1477552588', '1', '11', null, '1480590469', '', null, '225', 'e10adc3949ba59abbe56e057f20f883e', '584004ad318fa.jpg', null);
INSERT INTO `beauty_user` VALUES ('12', 'jay', '210d8c9608addb8b107df98f218edbb4', null, '1477553692', '1', '12', '', '1478324434', '', null, '225', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `beauty_user` VALUES ('13', 'jayCHOU', 'b49fe33a2152c077d827c0d3db7e68a7', null, '1477554751', '1', '20', null, null, '', null, '225', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `beauty_user` VALUES ('14', '123', 'e10adc3949ba59abbe56e057f20f883e', null, '1478307537', '1', '20', null, null, '741335619@qq.com', null, '225', 'd41d8cd98f00b204e9800998ecf8427e', null, null);
INSERT INTO `beauty_user` VALUES ('15', 'beauty', 'e10adc3949ba59abbe56e057f20f883e', '2016-11-05/', '1478325004', '3', '20', null, null, '741335619@qq.com', null, '225', 'd41d8cd98f00b204e9800998ecf8427e', '581d8db16f147.jpg', null);
INSERT INTO `beauty_user` VALUES ('16', 'beibei1', 'e10adc3949ba59abbe56e057f20f883e', null, '1478330830', '1', '20', null, '1479457312', '1875431157@qq.com', null, '225', 'd41d8cd98f00b204e9800998ecf8427e', null, null);
INSERT INTO `beauty_user` VALUES ('29', 'yanyan1', '651dd330532e45089da023d9af854790', null, '1478332658', '1', '20', null, null, '741335619@qq.com', null, '225', 'd41d8cd98f00b204e9800998ecf8427e', null, null);
INSERT INTO `beauty_user` VALUES ('34', 'totti', 'b644d4a60aceb4d8f5483476cc305669', '2016-11-23/', '1478756081', '3', '20', null, '1480665441', 'totti@126.com', null, '1225', 'e10adc3949ba59abbe56e057f20f883e', '583514d70b030.jpg', null);
INSERT INTO `beauty_user` VALUES ('35', 'chen', 'c88e8ae13e25993d3aed39a8c12ff02f', null, '1478770369', '1', '20', null, '1480665791', '19950306@qq.com', null, '281', 'e10adc3949ba59abbe56e057f20f883e', null, null);
INSERT INTO `beauty_user` VALUES ('36', '741335619@qq.com', '210d8c9608addb8b107df98f218edbb4', null, '1479276315', '1', '10', null, '1479714697', '741335619@qq.com', null, '225', 'd41d8cd98f00b204e9800998ecf8427e', null, null);
INSERT INTO `beauty_user` VALUES ('37', '15921314390', '210d8c9608addb8b107df98f218edbb4', '2016-12-01/', '1479346789', '1', '10', null, '1480596000', null, null, '235', 'd41d8cd98f00b204e9800998ecf8427e', '58401a2d3b867.jpg', '2147483647');
INSERT INTO `beauty_user` VALUES ('38', '18736199128', 'e10adc3949ba59abbe56e057f20f883e', '2016-11-19/', '1479384032', '1', '10', null, '1479714434', null, null, '230', 'd41d8cd98f00b204e9800998ecf8427e', '582fe616dba26.jpg', '2147483647');
INSERT INTO `beauty_user` VALUES ('39', '15921314390', '851dc2230d61fecc95daf9ed276e04db', '2016-12-01/', '1479384339', '1', '10', null, null, null, null, '235', 'd41d8cd98f00b204e9800998ecf8427e', '58401a2d3b867.jpg', '2147483647');
INSERT INTO `beauty_user` VALUES ('40', '请输入用户名', '210d8c9608addb8b107df98f218edbb4', null, '1480065388', '1', '20', null, null, '741335619@qq.com', null, '195', 'd41d8cd98f00b204e9800998ecf8427e', null, null);
INSERT INTO `beauty_user` VALUES ('41', '15824875961', 'fcea920f7412b5da7be0cf42b8c93759', '2016-11-28/', '1480310440', '1', '10', null, '1480596367', '741335619@qq.com', null, '120', 'd41d8cd98f00b204e9800998ecf8427e', '583bd4977852c.jpg', null);
INSERT INTO `beauty_user` VALUES ('42', '15039788393', '210d8c9608addb8b107df98f218edbb4', null, '1480316456', '1', '10', null, null, '741335619@qq.com', null, '120', 'd41d8cd98f00b204e9800998ecf8427e', null, null);
INSERT INTO `beauty_user` VALUES ('43', 'ling', '210d8c9608addb8b107df98f218edbb4', null, '1480316829', '1', '20', null, null, '741335619@qq.com', null, '110', 'd41d8cd98f00b204e9800998ecf8427e', null, null);
INSERT INTO `beauty_user` VALUES ('44', 'test', 'cc03e747a6afbbcbf8be7668acfebee5', null, '1480402702', '1', '20', null, '1480422304', '789@qq.com', null, '45', 'd41d8cd98f00b204e9800998ecf8427e', null, null);
INSERT INTO `beauty_user` VALUES ('45', '邵增辉', '670b14728ad9902aecba32e22fa4f6bd', null, '1480592502', '1', '20', null, null, '15011@qq.com', null, '10', 'd41d8cd98f00b204e9800998ecf8427e', null, null);
INSERT INTO `beauty_user` VALUES ('46', '15987443520', '210d8c9608addb8b107df98f218edbb4', null, '1480595978', '1', '10', null, null, '741335619@qq.com', null, '20', 'd41d8cd98f00b204e9800998ecf8427e', null, null);

-- ----------------------------
-- Table structure for `beauty_userbackstatus`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_userbackstatus`;
CREATE TABLE `beauty_userbackstatus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `backstatus` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_userbackstatus
-- ----------------------------
INSERT INTO `beauty_userbackstatus` VALUES ('1', '非常满意');
INSERT INTO `beauty_userbackstatus` VALUES ('2', '满意');
INSERT INTO `beauty_userbackstatus` VALUES ('3', '一般');
INSERT INTO `beauty_userbackstatus` VALUES ('4', '不满意');
INSERT INTO `beauty_userbackstatus` VALUES ('5', '非常不满意');

-- ----------------------------
-- Table structure for `beauty_userfeedback`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_userfeedback`;
CREATE TABLE `beauty_userfeedback` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mname` varchar(11) DEFAULT NULL COMMENT '用户id',
  `satis` varchar(255) DEFAULT NULL COMMENT '用户满意度',
  `way` varchar(255) DEFAULT NULL COMMENT '留言方式',
  `total` varchar(255) DEFAULT NULL COMMENT '总体满意度',
  `server` varchar(255) DEFAULT NULL COMMENT '对本站服务满意度',
  `idea` varchar(255) DEFAULT NULL COMMENT '用户意见',
  `connectname` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `backtime` varchar(255) DEFAULT NULL COMMENT '反馈时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_userfeedback
-- ----------------------------
INSERT INTO `beauty_userfeedback` VALUES ('7', '1', '非常满意', '非常满意', '非常满意', '非常满意', '您家服务很好', '1231', '1873619928', '1477646516');
INSERT INTO `beauty_userfeedback` VALUES ('10', null, '非常满意', '非常满意', '一般', '非常满意', '1234143', '1234134', '14231412', '1477647456');
INSERT INTO `beauty_userfeedback` VALUES ('51', 'yanyan', null, null, null, null, '14321432\r\n                ', null, '324234', '1479179895');
INSERT INTO `beauty_userfeedback` VALUES ('68', 'yanyan', '非常满意', '非常满意', '非常满意', '非常满意', '很好', '1231', '18736199128', '1480323252');
INSERT INTO `beauty_userfeedback` VALUES ('70', 'yanyan', '非常满意', '非常满意', '非常满意', '非常满意', '很不错，经常来这里买，东西是正品哦', '沈艳艳', '18736199128', '1480506486');
INSERT INTO `beauty_userfeedback` VALUES ('71', 'yanyan', '非常满意', '非常满意', '非常满意', '非常满意', '慢怵 njbdnhojnogmgf', '沈燕燕', '18736199128', '1480663108');

-- ----------------------------
-- Table structure for `beauty_user_inform`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_user_inform`;
CREATE TABLE `beauty_user_inform` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '附加信息id',
  `mid` mediumint(10) NOT NULL COMMENT '用户id',
  `sex` tinyint(1) DEFAULT '0' COMMENT '0表示保密，1表示男，2表示女',
  `truename` varchar(20) DEFAULT NULL COMMENT '真实姓名',
  `ucid` varchar(20) DEFAULT NULL COMMENT '身份证号',
  `address` varchar(50) NOT NULL COMMENT '通讯地址',
  `mobile` varchar(20) NOT NULL COMMENT '手机号',
  `email` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT '0' COMMENT '0代表保密',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_user_inform
-- ----------------------------
INSERT INTO `beauty_user_inform` VALUES ('1', '1', '0', null, null, '郑州', '17720030303', null, '0');
INSERT INTO `beauty_user_inform` VALUES ('2', '2', '1', null, null, '开封', '18820080808', null, '0');

-- ----------------------------
-- Table structure for `beauty_user_vipinfo`
-- ----------------------------
DROP TABLE IF EXISTS `beauty_user_vipinfo`;
CREATE TABLE `beauty_user_vipinfo` (
  `id` tinyint(4) NOT NULL,
  `vipname` varchar(50) NOT NULL DEFAULT '普通会员' COMMENT '1普通会员，2高级会员，3黄金会员',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of beauty_user_vipinfo
-- ----------------------------
INSERT INTO `beauty_user_vipinfo` VALUES ('1', '普通会员');
INSERT INTO `beauty_user_vipinfo` VALUES ('2', '高级会员');
INSERT INTO `beauty_user_vipinfo` VALUES ('3', '黄金会员');
