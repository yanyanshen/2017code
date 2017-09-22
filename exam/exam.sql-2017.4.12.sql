-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 04 月 12 日 19:54
-- 服务器版本: 5.5.40
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `exam`
--

-- --------------------------------------------------------

--
-- 表的结构 `exam_admin`
--

CREATE TABLE IF NOT EXISTS `exam_admin` (
  `id` tinyint(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `mobile` varchar(32) DEFAULT NULL,
  `permissions` tinyint(4) DEFAULT '2' COMMENT '1为超级管理员，2为普通管理员',
  `status` tinyint(2) DEFAULT '1' COMMENT '1为激活状态，0为停权状态',
  `online` tinyint(4) DEFAULT '0' COMMENT '在线为1，不在线为0',
  `addtime` int(11) NOT NULL,
  `edittime` int(11) NOT NULL,
  `lastlogin` int(11) DEFAULT NULL,
  `lastip` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `exam_admin`
--

INSERT INTO `exam_admin` (`id`, `username`, `password`, `mobile`, `permissions`, `status`, `online`, `addtime`, `edittime`, `lastlogin`, `lastip`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'b968243ba3623fc2477099988072a063', 1, 1, 1, 1476850000, 1480235837, 1490857185, '127.0.0.1'),
(2, 'totti', 'b644d4a60aceb4d8f5483476cc305669', 'b968243ba3623fc2477099988072a063', 2, 1, 1, 1477550960, 1480503014, 1480665397, '192.168.4.55'),
(3, 'dawang', '13b08f4e45e27f23a078a9683b0bc38b', '13b08f4e45e27f23a078a9683b0bc38b', 2, 1, 0, 1477551046, 1480296185, 1480665691, '192.168.4.55'),
(4, 'baiwenfei', '155f337f34e0482b1987a8806e310c44', '155f337f34e0482b1987a8806e310c44', 2, 1, 0, 1477551176, 1480296200, 1480665018, '192.168.4.55'),
(5, 'songhao', 'd5378260ff8bdae7482cd41f4dc55bc7', 'd5378260ff8bdae7482cd41f4dc55bc7', 2, 1, 0, 1477551229, 1480150092, 1480470532, '127.0.0.1'),
(6, 'beibei', 'e10adc3949ba59abbe56e057f20f883e', '46d294deab9987e94ced5c0f7b478f5d', 1, 1, 0, 1478325390, 1480484919, 1480664407, '192.168.4.55'),
(7, 'yanyan', '7219b9b60d9d70a9a7014369d88ebefe', '7219b9b60d9d70a9a7014369d88ebefe', 1, 1, 0, 1478325423, 1480571588, 1489547188, '::1'),
(8, 'admin1', '21232f297a57a5a743894a0e4a801fc3', 'b968243ba3623fc2477099988072a063', 1, 1, 1, 1479214542, 1479298892, 1480507136, '127.0.0.1'),
(9, 'admin2', '21232f297a57a5a743894a0e4a801fc3', 'b968243ba3623fc2477099988072a063', 1, 1, 0, 1477551186, 1479298911, 1479258141, '127.0.0.1'),
(10, 'admin3', '21232f297a57a5a743894a0e4a801fc3', 'b968243ba3623fc247709998', 1, 1, 0, 1477551186, 1479298911, NULL, NULL),
(11, 'admin4', '21232f297a57a5a743894a0e4a801fc3', 'b968243ba3623fc2477099988072a063', 1, 1, 0, 1480149727, 1480149727, NULL, NULL),
(12, 'admin5', '21232f297a57a5a743894a0e4a801fc3', 'b968243ba3623fc2477099988072a063', 1, 1, 0, 1480149755, 1480149755, 1480665212, '192.168.4.55'),
(13, '517xc', '21232f297a57a5a743894a0e4a801fc3', NULL, 1, 1, 0, 1490253959, 1490253959, 1490333985, '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `exam_admin_nav`
--

CREATE TABLE IF NOT EXISTS `exam_admin_nav` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `navname` varchar(30) NOT NULL,
  `navurl` varchar(120) DEFAULT NULL,
  `pid` tinyint(3) unsigned DEFAULT '0',
  `path` varchar(100) DEFAULT NULL,
  `priority` smallint(5) unsigned NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;

--
-- 转存表中的数据 `exam_admin_nav`
--

INSERT INTO `exam_admin_nav` (`id`, `navname`, `navurl`, `pid`, `path`, `priority`) VALUES
(1, '后台首页', 'Admin/Index/main', 0, '1', 0),
(2, '系统管理', 'Admin/Nav/System', 0, '2', 50),
(3, '权限管理', 'Admin/Nav/Auth', 0, '3', 100),
(13, '菜单列表', 'Admin/AdminNav/index', 2, '2,13', 51),
(14, '添加菜单', 'Admin/AdminNav/add', 2, '2,14', 52),
(15, '管理员列表', 'Admin/Admin/index', 3, '3,15', 110),
(16, '添加管理员', 'Admin/Admin/add', 3, '3,16', 120),
(18, '管理组列表', 'Admin/AuthGroup/index', 3, '3,18', 140),
(19, '添加管理组', 'Admin/AuthGroup/add', 3, '3,19', 150),
(20, '权限列表', 'Admin/AuthRule/index', 3, '3,20', 160),
(21, '添加权限', 'Admin/AuthRule/add', 3, '3,21', 170),
(61, '应聘信息', 'Admin/Test/interview', 0, '61', 1400),
(68, '应聘者列表', 'Admin/Member/index', 61, '61,68', 1401),
(70, '分类管理', 'Admin/TestCategory/Category', 0, '70', 1500),
(76, '分类类表', 'Admin/TestCategory/index', 70, '70,76', 1501),
(77, '添加分类', 'Admin/TestCategory/add', 70, '70,77', 1502),
(78, '试题管理', 'Admin/Test/add', 0, '78', 1600),
(79, '添加试题', 'Admin/Test/addtestshow', 78, '78,79', 1601),
(80, '单选列表', 'Admin/Test/one_list', 78, '78,80', 1602),
(81, '单选列表（图片）', 'Admin/Test/one_pic_list', 78, '78,81', 1603),
(82, '多选列表', 'Admin/Test/two_list', 78, '78,82', 1604),
(84, '多选列表（图片）', 'Admin/Test/two_pic_list', 78, '78,84', 1605),
(85, '简答题列表（图片）', 'Admin/Test/short_pic_list', 78, '78,85', 1607),
(86, '简答题列表', 'Admin/Test/short_list', 78, '78,86', 1606),
(87, '个人信息管理', 'Admin/changeInfo', 3, '3,87', 180);

-- --------------------------------------------------------

--
-- 表的结构 `exam_auth_group`
--

CREATE TABLE IF NOT EXISTS `exam_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(4) DEFAULT '1',
  `rules` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户组表' AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `exam_auth_group`
--

INSERT INTO `exam_auth_group` (`id`, `title`, `status`, `rules`) VALUES
(1, '超级管理员', 1, '1,3,20,15,16,21,41,40,42,43,44,2,13,14,505,491,492,494,495,496,497,504,502,503,501,498,499,500'),
(2, '品牌管理员', 1, '1,41,40,42,43,44,4,22,23,48,17,49,50'),
(3, '商品管理员', 1, '1,41,40,42,43,44,6,26,27,11,38,52,53,481,482,483'),
(5, '广告管理员', 1, '1,41,40,42,43,44,9,34,35,484,488,48,17,49,50'),
(6, '活动管理员', 1, '1,41,40,42,43,44,10,36,37,48,17,49,50'),
(7, '评论管理员', 1, '1,41,40,42,43,44,11,38,52,53,48,17,49,50'),
(8, '反馈管理员', 1, '1,41,40,42,43,44,12,39,48,17,49,50'),
(10, '分类管理员', 1, '1,41,40,42,43,44,5,24,25,48,17,49,50'),
(11, '会员管理员', 1, '1,41,40,42,43,44,7,28,51,48,17,49,50'),
(12, '金币管理员', 1, '1,41,40,42,43,44,45,46,47,48,17,49,50'),
(13, '底部管理员', 1, '1,41,40,42,43,44,55,56,57'),
(14, '应聘管理员', 1, '1,3,41,40,42,43,44,2,13,14,505,491,492,494,495,496,497,504,502,503,501,498,499,500');

-- --------------------------------------------------------

--
-- 表的结构 `exam_auth_group_access`
--

CREATE TABLE IF NOT EXISTS `exam_auth_group_access` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL COMMENT '用户id',
  `group_id` mediumint(8) unsigned NOT NULL COMMENT '用户组id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户组明细表' AUTO_INCREMENT=211 ;

--
-- 转存表中的数据 `exam_auth_group_access`
--

INSERT INTO `exam_auth_group_access` (`id`, `uid`, `group_id`) VALUES
(206, 2, 5),
(166, 4, 2),
(144, 5, 10),
(195, 9, 1),
(167, 4, 11),
(207, 7, 5),
(165, 3, 4),
(200, 2, 11),
(186, 6, 13),
(185, 6, 7),
(197, 11, 1),
(194, 8, 1),
(192, 1, 1),
(184, 6, 3),
(205, 7, 12),
(204, 7, 10),
(203, 7, 8),
(202, 7, 6),
(198, 12, 1),
(196, 10, 1),
(208, 10, 5),
(209, 13, 14),
(210, 1, 14);

-- --------------------------------------------------------

--
-- 表的结构 `exam_auth_rule`
--

CREATE TABLE IF NOT EXISTS `exam_auth_rule` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='规则表' AUTO_INCREMENT=506 ;

--
-- 转存表中的数据 `exam_auth_rule`
--

INSERT INTO `exam_auth_rule` (`id`, `name`, `title`, `status`, `type`, `condition`, `pid`, `path`) VALUES
(1, 'Admin/Index/index', '后台首页', 1, 1, '', 0, '1'),
(2, 'Admin/Nav/System', '系统管理', 1, 1, '', 0, '2'),
(3, 'Admin/Nav/Auth', '权限管理', 1, 1, '', 0, '3'),
(41, 'Admin/Index/footer', '后台尾部', 1, 1, '', 1, '1,41'),
(40, 'Admin/Index/top', '后台头部', 1, 1, '', 1, '1,40'),
(42, 'Admin/Index/main', '后台主页', 1, 1, '', 1, '1,42'),
(43, 'Admin/Index/left', '后台左边', 1, 1, '', 1, '1,43'),
(15, 'Admin/Admin/index', '管理员列表', 1, 1, '', 3, '3,15'),
(16, 'Admin/Admin/add', '添加管理员', 1, 1, '', 3, '3,16'),
(18, 'Admin/AuthGroup/index', '管理组列表', 1, 1, '', 3, '3,18'),
(20, 'Admin/AuthRule/index', '权限列表', 1, 1, '', 3, '3,20'),
(21, 'Admin/AuthRule/add', '添加权限', 1, 1, '', 3, '3,21'),
(13, 'Admin/AdminNav/index', '菜单列表', 1, 1, '', 2, '2,13'),
(14, 'Admin/AdminNav/add', '添加菜单', 1, 1, '', 2, '2,14'),
(19, 'Admin/AuthGroup/add', '添加管理组', 1, 1, '', 3, '3,19'),
(504, 'Admin/Test/addtestshow', '试题添加', 1, 1, '', 497, '497,504'),
(505, 'Admin/changeInfo', '个人信息管理', 1, 1, '', 3, '3,505'),
(44, 'Admin/Admin/loginout', '后台退出', 1, 1, '', 1, '1,44'),
(502, 'Admin/Test/short_list', '简答题列表', 1, 1, '', 497, '497,502'),
(503, 'Admin/Test/short_pic_list', '简答题列表（图片）', 1, 1, '', 497, '497,503'),
(501, 'Admin/Test/two_pic_list', '多选列表（图片）', 1, 1, '', 497, '497,501'),
(491, 'Admin/Test/interview', '应聘信息', 1, 1, '', 0, '491'),
(492, 'Admin/Member/index', '应聘者列表', 1, 1, '', 491, '491,492'),
(494, 'Admin/TestCategory/Category', '分类管理', 1, 1, '', 0, '494'),
(495, 'Admin/TestCategory/index', '分类列表', 1, 1, '', 494, '494,495'),
(496, 'Admin/TestCategory/add', '添加分类', 1, 1, '', 494, '494,496'),
(497, 'Admin/Test/add', '试题管理', 1, 1, '', 0, '497'),
(498, 'Admin/Test/one_list', '单选列表', 1, 1, '', 497, '497,498'),
(499, 'Admin/Test/one_pic_list', '单选列表（图片）', 1, 1, '', 497, '497,499'),
(500, 'Admin/Test/two_list', '多选列表', 1, 1, '', 497, '497,500');

-- --------------------------------------------------------

--
-- 表的结构 `exam_member`
--

CREATE TABLE IF NOT EXISTS `exam_member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '答题人姓名',
  `question_id` varchar(255) NOT NULL COMMENT '试卷问题的id',
  `score_short` int(10) unsigned DEFAULT NULL COMMENT '简答题得分',
  `time` varchar(255) DEFAULT NULL COMMENT '答题所用时间',
  `sex` enum('1','0') NOT NULL DEFAULT '1' COMMENT '1是女0是男',
  `age` int(11) unsigned NOT NULL COMMENT '年龄',
  `tel` varchar(255) NOT NULL COMMENT '手机号码',
  `score` int(10) unsigned DEFAULT NULL COMMENT '选择题分数',
  `short_id` varchar(255) DEFAULT NULL COMMENT '简答题id',
  `correct_papers` int(11) unsigned DEFAULT NULL COMMENT '0是为改卷  1是已改卷',
  `total_score` int(11) unsigned DEFAULT NULL COMMENT '总分数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `exam_member`
--

INSERT INTO `exam_member` (`id`, `name`, `question_id`, `score_short`, `time`, `sex`, `age`, `tel`, `score`, `short_id`, `correct_papers`, `total_score`) VALUES
(1, '沈测试', '21,64,31,80,83,25,27,18,56,11,47,55,86,6,15,57,96,16,34,53,70,69,92,87,71,49,40,58,41,95', 0, '1490582438', '1', 20, '18736199128', 2, '5,13,8,12,7', 0, NULL),
(2, '沈测试1', '90,40,31,84,68,46,82,76,20,21,87,10,7,69,62,4,19,28,42,11,25,58,70,45,6,27,94,51,9,14', 0, '1490582548', '1', 20, '18736199128', 0, '12,6,7,3,13', 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `exam_member_answer`
--

CREATE TABLE IF NOT EXISTS `exam_member_answer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) DEFAULT '' COMMENT '答题人姓名',
  `qid` int(10) unsigned DEFAULT NULL COMMENT '简答题得分',
  `answer` varchar(255) DEFAULT NULL COMMENT '用户答案',
  `right_answer` varchar(255) DEFAULT NULL COMMENT '正确答案',
  `type` int(11) unsigned DEFAULT NULL COMMENT '试题类型',
  `score` int(11) unsigned DEFAULT NULL COMMENT '每道题的得分',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `exam_member_answer`
--

INSERT INTO `exam_member_answer` (`id`, `userid`, `qid`, `answer`, `right_answer`, `type`, `score`) VALUES
(16, '1', 12, '发个我日头关键人物\r\n                                                ', 'wr', 2, 0),
(15, '1', 8, '放国家认同\r\n                                                ', 'r54', 2, 0),
(14, '1', 13, '感觉饿我I人感觉而为\r\n                                                ', 'wt', 2, 0),
(13, '1', 5, '你比我呢如果问\r\n                                                ', '13', 2, 0),
(11, '1', 64, 'A', 'B', 0, 0),
(12, '1', 27, 'AB', 'ABCD', 1, 2),
(10, '1', 21, 'B', 'A', 0, 0),
(17, '1', 7, '房管局围绕提高觉悟\r\n                                                ', '34', 2, 0),
(18, '2', 90, 'AB', 'CD', 1, 0),
(19, '2', 12, '热帖风格热我听过\r\n                                                ', 'wr', 2, 0),
(20, '2', 6, '\r\n                                                ', '13', 2, 0),
(21, '2', 7, '\r\n                                                ', '34', 2, 0),
(22, '2', 3, '\r\n                                                ', 'nindfangisaegnsi       ', 2, 0),
(23, '2', 13, '\r\n                                                ', 'wt', 2, 0);

-- --------------------------------------------------------

--
-- 表的结构 `exam_test`
--

CREATE TABLE IF NOT EXISTS `exam_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) DEFAULT '' COMMENT '问题',
  `A` varchar(255) DEFAULT NULL COMMENT 'A选项',
  `B` varchar(255) DEFAULT NULL COMMENT 'B选项',
  `C` varchar(255) DEFAULT NULL COMMENT 'C选项',
  `D` varchar(255) DEFAULT NULL COMMENT 'D选项',
  `right_answer` varchar(255) DEFAULT NULL COMMENT '正确选项',
  `score` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '0是单选  1是多选 2是图片  试题的类型',
  `create_time` varchar(255) DEFAULT NULL COMMENT '添加时间',
  `category` varchar(255) DEFAULT NULL COMMENT '试题的分类id',
  `status` int(10) unsigned DEFAULT NULL COMMENT '试题的状态  0是未开启 1是开启',
  `ifImg` int(11) unsigned DEFAULT NULL COMMENT '问题是否有图片  0是无图片  1是有图片',
  `Imgurl` varchar(255) DEFAULT NULL COMMENT '如果有图片则 是图片路径 如果没有则是0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104 ;

--
-- 转存表中的数据 `exam_test`
--

INSERT INTO `exam_test` (`id`, `question`, `A`, `B`, `C`, `D`, `right_answer`, `score`, `type`, `create_time`, `category`, `status`, `ifImg`, `Imgurl`) VALUES
(1, '问题1筵宴', '你好', '你好', '你好', '你好', 'AD', 4, 1, '1489713806', '2', 1, 0, '0'),
(2, '问题2', '问题2', '问题2', '问题2', '问题2', 'AB', 4, 1, '1489713847', '3', 1, 0, '0'),
(3, '图片', '123', '12', '13', '13', 'B', 3, 0, '1489713919', '1', 1, 1, '1'),
(4, '图片213', '123', '123', '132', '13', 'ABC', 4, 1, '1489713970', '3', 1, 0, '0'),
(5, '图片多', '1321', '21313', '123', '1313', 'D', 3, 0, '1489714132', '2', 1, 1, '1'),
(6, '问题22', '12', '12', '12', '12', 'B', 3, 0, '1489714882', '1', 1, 0, '0'),
(7, '1231', '1231', '123', '13', '33', 'D', 3, 0, '1489720841', '3', 1, 0, '0'),
(8, '242342', '23', '23', '23', '23', 'B', 3, 0, '1489721283', '2', 1, 1, '1'),
(9, '456465', '5644', '56', '46', '46', 'C', 3, 0, '1489721350', '1', 1, 0, '1'),
(10, '2342筵宴12', '3', '3', '3', '3', 'D', 3, 0, '1489721639', '1', 1, 0, '0'),
(11, 'wrewr', 'we', '3', '3', '3', 'A', 3, 0, '1489721679', '1', 1, 1, '1'),
(12, '3453543', '34', '3', '3', '3', 'AD', 4, 1, '1489722482', '2', 1, 1, '1'),
(13, '单选', '情感', 'question5', '1', '2', 'AB', 4, 1, '1489976377', '1', 1, 0, NULL),
(14, '多选', '11', 'question4', '10', '20', 'CD', 4, 1, '1489976377', '1', 1, 0, NULL),
(15, 'question2', '11', '22', '33', '44', 'B', 3, 0, '1489977133', '1', 1, 0, NULL),
(16, 'question3', '1', '2', '3', '4', 'C', 3, 0, '1489977133', '1', 1, 0, NULL),
(17, 'question4', '10', '20', '40', '20', 'AB', 4, 1, '1489977133', '2', 1, 0, NULL),
(18, '哈哈2', '11', '22', '33', '44', 'B', 3, 0, '1489977328', '2', 1, 0, NULL),
(19, '哈哈3', '1', '2', '3', '4', 'C', 3, 0, '1489977328', '3', 1, 0, NULL),
(20, '哈哈4', '10', '20', '40', '20', 'AB', 4, 1, '1489977328', '2', 1, 0, NULL),
(21, '哈哈1', '1', '2', '3', '4', 'A', 3, 0, '1489977453', '2', 1, 0, NULL),
(22, '哈哈12', '1', '2', '3', '4', 'A', 3, 0, '1489977488', '2', 1, 0, NULL),
(23, '哈哈22', '11', '22', '33', '44', 'B', 3, 0, '1489977488', '4', 1, 0, NULL),
(24, '哈哈32', '1', '2', '3', '4', 'C', 3, 0, '1489977488', '3', 1, 0, NULL),
(25, '问题1111', '1', '2', '3', '4', 'B', 3, 0, '1490002958', '1', 1, 0, NULL),
(26, '问题3', '1', '2', '3', '4', 'C', 3, 0, '1490002434', 'C', 1, 0, NULL),
(27, '问题4', '1', '2', '3', '4', 'ABCD', 4, 1, '1490002958', '1', 1, 0, NULL),
(28, '问题2222', '1', '2', '3', '4', 'D', 3, 0, '1490002958', '2', 1, 0, NULL),
(29, '问题3333', '1', '2', '3', '4', 'C', 3, 0, '1490002958', '4', 1, 0, NULL),
(30, '单选1', '单选1', '单选1', '单选1', '单选1', 'A', 3, 0, '1490342684', '2', 1, 0, '0'),
(31, '单选2', '单选2', '单选2', '单选2', '单选2', 'B', 3, 0, '1490342895', '3', 1, 0, '0'),
(32, '单选3', '单选3', '单选3', '单选3', '单选3', 'B', 3, 0, '1490342928', '3', 1, 0, '0'),
(33, '单选4', '单选4', '单选4', '单选4', '单选4', 'D', 3, 0, '1490343035', '4', 1, 0, '0'),
(34, '问题1111情感 ', '1', '2', '3', '4', 'B', 4, 1, '1490343963', '1', 1, 0, NULL),
(35, '问题1112情感多', '1', '2', '3', '4', 'D', 4, 1, '1490343963', '1', 1, 0, NULL),
(36, '问题1113情感多', '1', '2', '3', '4', 'CD', 4, 1, '1490343963', '1', 1, 0, NULL),
(37, '问题1114情感多', '1', '2', '3', '4', 'CD', 4, 1, '1490343963', '1', 1, 0, NULL),
(38, '问题1115情感多', '1', '2', '3', '4', 'CD', 4, 1, '1490343963', '1', 1, 0, NULL),
(39, '问题1116情感多', '1', '2', '3', '4', 'CD', 4, 1, '1490343963', '1', 1, 0, NULL),
(40, '问题4综合', '1', '2', '3', '4', 'D', 3, 0, '1490343963', '4', 1, 0, NULL),
(41, '问题5综合', '1', '2', '3', '4', 'A', 3, 0, '1490343963', '4', 1, 0, NULL),
(42, '问题6综合', '1', '2', '3', '4', 'B', 3, 0, '1490343963', '4', 1, 0, NULL),
(43, '问题7综合', '2', '3', '4', '5', 'B', 3, 0, '1490343963', '4', 1, 0, NULL),
(44, '问题8综合', '3', '4', '5', '6', 'B', 3, 0, '1490343963', '4', 1, 0, NULL),
(45, '问题9综合', '4', '5', '6', '7', 'B', 3, 0, '1490343963', '4', 1, 0, NULL),
(46, '问题10综合', '5', '6', '7', '8', 'B', 3, 0, '1490343963', '4', 1, 0, NULL),
(47, '问题9人文', '6', '7', '8', '9', 'B', 3, 0, '1490343963', '4', 1, 0, NULL),
(48, '问题10人文', '7', '8', '9', '10', 'B', 3, 0, '1490343963', '4', 1, 0, NULL),
(49, '问题11人文', '8', '9', '10', '11', 'B', 3, 0, '1490343963', '4', 1, 0, NULL),
(50, '问题12人文', '9', '10', '11', '12', 'B', 3, 0, '1490343963', '4', 1, 0, NULL),
(51, '问题13人文', '10', '11', '12', '13', 'B', 3, 0, '1490343963', '4', 1, 0, NULL),
(52, '问题14人文', '11', '12', '13', '14', 'B', 3, 0, '1490343963', '4', 1, 0, NULL),
(53, '问题15人文', '12', '13', '14', '15', 'B', 3, 0, '1490343963', '4', 1, 0, NULL),
(54, '问题16文明', '13', '14', '15', '16', 'B', 3, 0, '1490343963', '3', 1, 0, NULL),
(55, '问题17文明', '14', '15', '16', '17', 'B', 3, 0, '1490343963', '3', 1, 0, NULL),
(56, '问题18文明', '15', '16', '17', '18', 'B', 3, 0, '1490343963', '3', 1, 0, NULL),
(57, '问题19文明', '16', '17', '18', '19', 'B', 3, 0, '1490343963', '3', 1, 0, NULL),
(58, '问题20文明', '17', '18', '19', '20', 'B', 3, 0, '1490343963', '3', 1, 0, NULL),
(59, '问题21文明', '18', '19', '20', '21', 'B', 3, 0, '1490343963', '3', 1, 0, NULL),
(60, '问题22文明', '19', '20', '21', '22', 'B', 3, 0, '1490343963', '3', 1, 0, NULL),
(61, '问题23文明', '20', '21', '22', '23', 'B', 3, 0, '1490343963', '3', 1, 0, NULL),
(62, '问题24文明', '21', '22', '23', '24', 'B', 3, 0, '1490343963', '3', 1, 0, NULL),
(63, '问题25社会', '22', '23', '24', '25', 'B', 3, 0, '1490343963', '2', 1, 0, NULL),
(64, '问题26社会', '23', '24', '25', '26', 'B', 3, 0, '1490343963', '2', 1, 0, NULL),
(65, '问题27社会', '24', '25', '26', '27', 'B', 3, 0, '1490343963', '2', 1, 0, NULL),
(66, '问题28社会', '25', '26', '27', '28', 'B', 3, 0, '1490343963', '2', 1, 0, NULL),
(67, '问题29社会', '26', '27', '28', '29', 'B', 3, 0, '1490343963', '2', 1, 0, NULL),
(68, '问题30社会', '27', '28', '29', '30', 'B', 3, 0, '1490343963', '2', 1, 0, NULL),
(69, '问题31社会', '28', '29', '30', '31', 'B', 3, 0, '1490343963', '2', 1, 0, NULL),
(70, '问题32社会', '29', '30', '31', '32', 'B', 3, 0, '1490343963', '2', 1, 0, NULL),
(71, '问题4综合多', '1', '2', '3', '4', 'CD', 4, 1, '1490343963', '4', 1, 0, NULL),
(72, '问题5综合多', '1', '2', '3', '4', 'CD', 4, 1, '1490343963', '4', 1, 0, NULL),
(73, '问题6综合多', '1', '2', '3', '4', 'CD', 4, 1, '1490343963', '4', 1, 0, NULL),
(74, '问题7综合多', '2', '3', '4', '5', 'CD', 4, 1, '1490343963', '4', 1, 0, NULL),
(75, '问题8综合多', '3', '4', '5', '6', 'CD', 4, 1, '1490343963', '4', 1, 0, NULL),
(76, '问题9综合多', '4', '5', '6', '7', 'CD', 4, 1, '1490343963', '4', 1, 0, NULL),
(77, '问题10综合多', '5', '6', '7', '8', 'CD', 4, 1, '1490343963', '4', 1, 0, NULL),
(78, '问题11综合多', '6', '7', '8', '9', 'CD', 4, 1, '1490343963', '4', 1, 0, NULL),
(79, '问题12综合多', '7', '8', '9', '10', 'CD', 4, 1, '1490343963', '4', 1, 0, NULL),
(80, '问题13综合多', '8', '9', '10', '11', 'CD', 4, 1, '1490343963', '4', 1, 0, NULL),
(81, '问题14综合多', '9', '10', '11', '12', 'CD', 4, 1, '1490343963', '4', 1, 0, NULL),
(82, '问题15综合多', '10', '11', '12', '13', 'CD', 4, 1, '1490343963', '4', 1, 0, NULL),
(83, '问题16综合多', '11', '12', '13', '14', 'CD', 4, 1, '1490343963', '4', 1, 0, NULL),
(84, '问题17综合多', '12', '13', '14', '15', 'CD', 4, 1, '1490343963', '4', 1, 0, NULL),
(85, '问题18综合多', '13', '14', '15', '16', 'CD', 4, 1, '1490343963', '3', 1, 0, NULL),
(86, '问题19综合多', '14', '15', '16', '17', 'CD', 4, 1, '1490343963', '3', 1, 0, NULL),
(87, '问题20综合多', '15', '16', '17', '18', 'CD', 4, 1, '1490343963', '3', 1, 0, NULL),
(88, '问题21综合多', '16', '17', '18', '19', 'CD', 4, 1, '1490343963', '3', 1, 0, NULL),
(89, '问题22综合多', '17', '18', '19', '20', 'CD', 4, 1, '1490343963', '3', 1, 0, NULL),
(90, '问题23综合多', '18', '19', '20', '21', 'CD', 4, 1, '1490343963', '3', 1, 0, NULL),
(91, '问题24综合多', '19', '20', '21', '22', 'CD', 4, 1, '1490343963', '3', 1, 0, NULL),
(92, '问题25综合多', '20', '21', '22', '23', 'CD', 4, 1, '1490343963', '3', 1, 0, NULL),
(93, '问题26综合多', '21', '22', '23', '24', 'BC', 4, 1, '1490343963', '3', 1, 0, NULL),
(94, '问题27综合多', '22', '23', '24', '25', 'CD', 4, 1, '1490343963', '2', 1, 0, NULL),
(95, '问题28综合多', '23', '24', '25', '26', 'ABCD', 4, 1, '1490343963', '2', 1, 0, NULL),
(96, '问题29综合多', '24', '25', '26', '27', 'AB', 4, 1, '1490343963', '2', 1, 0, NULL),
(97, '问题30综合多', '25', '26', '27', '28', 'ABCD', 4, 1, '1490343963', '2', 1, 0, NULL),
(98, '问题31综合多', '26', '27', '28', '29', 'ABCD', 4, 1, '1490343963', '2', 1, 0, NULL),
(99, '问题32综合多', '27', '28', '29', '30', 'AB', 4, 1, '1490343963', '2', 1, 0, NULL),
(100, '问题33综合多', '28', '29', '30', '31', 'AD', 4, 1, '1490343963', '2', 1, 0, NULL),
(101, '问题34综合多', '29', '30', '31', '32', 'AD', 4, 1, '1490343963', '2', 1, 0, NULL),
(102, '问题1111情感11', '1', '2', '3', '4', 'B', 3, 0, '1490857310', '1', 1, 0, NULL),
(103, '问题1112情感11', '1', '2', '3', '4', 'D', 3, 0, '1490857310', '1', 1, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `exam_testshort`
--

CREATE TABLE IF NOT EXISTS `exam_testshort` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) DEFAULT '' COMMENT '问题',
  `right_answer` varchar(255) DEFAULT NULL COMMENT '正确选项',
  `score` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '0是单选  1是多选 2是图片  试题的类型',
  `create_time` varchar(255) DEFAULT NULL COMMENT '添加时间',
  `category` varchar(255) DEFAULT NULL COMMENT '试题的分类id',
  `status` int(10) unsigned DEFAULT NULL COMMENT '试题的状态  0是未开启 1是开启',
  `ifImg` int(11) unsigned DEFAULT NULL COMMENT '问题是否有图片  0是无图片  1是有图片',
  `Imgurl` varchar(255) DEFAULT NULL COMMENT '如果有图片则 是图片路径 如果没有则是0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `exam_testshort`
--

INSERT INTO `exam_testshort` (`id`, `question`, `right_answer`, `score`, `type`, `create_time`, `category`, `status`, `ifImg`, `Imgurl`) VALUES
(1, '简答1', 'nindfangisaegnsi ', 20, 2, '1489714167', '1', 1, 1, '1'),
(2, '简答2222222', 'nindfangisaegnsi        ', 20, 2, '1489714195', '1', 1, 0, '0'),
(3, '嘟嘟嘟', 'nindfangisaegnsi       ', 20, 2, '1489728524', '2', 1, 0, '0'),
(4, '嘟嘟嘟的嘟嘟嘟+', '嘟嘟嘟嘟嘟嘟', 20, 2, '1489728575', '3', 1, 1, '1'),
(5, '5', '13', 20, 2, '1489728575', '4', 1, 0, NULL),
(6, '6', '13', 20, 2, '1489728575', '4', 1, 0, NULL),
(7, '7', '34', 20, 2, '1489728575', '1', 1, 0, NULL),
(8, '8', 'r54', 20, 2, '1489728575', '2', 1, 0, NULL),
(9, '9', 'wr', 20, 2, '1489728575', '2', 1, 0, NULL),
(10, '10', 'wrt', 20, 2, '1489728575', '3', 1, 0, NULL),
(11, '11', 'wr', 20, 2, '1489728575', '3', 1, 0, NULL),
(12, '12', 'wr', 20, 2, '1489728575', '3', 1, 0, NULL),
(13, '13', 'wt', 20, 2, '1489728575', '4', 1, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `exam_test_category`
--

CREATE TABLE IF NOT EXISTS `exam_test_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cname` varchar(255) DEFAULT '' COMMENT '问题',
  `create_time` varchar(255) DEFAULT NULL COMMENT '添加时间',
  `status` int(255) unsigned DEFAULT NULL COMMENT '分类的状态  1是开启  0是关闭',
  `pid` int(11) unsigned DEFAULT NULL COMMENT '0是顶级分类      是父亲的id',
  `path` varchar(255) DEFAULT NULL COMMENT '父级id 拼上 本身的id  便于查找',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `exam_test_category`
--

INSERT INTO `exam_test_category` (`id`, `cname`, `create_time`, `status`, `pid`, `path`) VALUES
(1, '情感', '1489476829', 1, 0, '1'),
(2, '社会', '1489476829', 1, 0, '2'),
(3, '文明', '1489476829', 1, 0, '3'),
(4, '综合', '1489476829', 1, 0, '4');

-- --------------------------------------------------------

--
-- 表的结构 `exam_test_pic`
--

CREATE TABLE IF NOT EXISTS `exam_test_pic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `test_id` int(11) DEFAULT NULL COMMENT 'exam_test 的id',
  `picurl` varchar(255) DEFAULT NULL COMMENT '图片的文件夹路径',
  `picname` varchar(255) DEFAULT NULL COMMENT '图片的名字',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `exam_test_pic`
--

INSERT INTO `exam_test_pic` (`id`, `test_id`, `picurl`, `picname`) VALUES
(1, 3, '2017-03-21/', '58d09e2ec88eb.png'),
(2, 5, '2017-03-21/', '58d09e1a9d101.png'),
(3, 8, '2017-03-20/', '58cf351598d17.jpg'),
(4, 9, '2017-03-17/', '58cb58069c511.png'),
(5, 11, '2017-03-20/', '58cf33e2c59b2.jpg'),
(6, 12, '2017-03-17/', '58cb5c72e4864.png');

-- --------------------------------------------------------

--
-- 表的结构 `exam_test_picshort`
--

CREATE TABLE IF NOT EXISTS `exam_test_picshort` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `test_id` int(11) DEFAULT NULL COMMENT 'exam_test 的id',
  `picurl` varchar(255) DEFAULT NULL COMMENT '图片的文件夹路径',
  `picname` varchar(255) DEFAULT NULL COMMENT '图片的名字',
  `create_time` varchar(255) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `exam_test_picshort`
--

INSERT INTO `exam_test_picshort` (`id`, `test_id`, `picurl`, `picname`, `create_time`) VALUES
(1, 1, '2017-03-20/', '58cf355bdcf03.jpg', '1489974620'),
(2, 4, '2017-03-17/', '58cb743fa4ec1.png', '1489728575');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
