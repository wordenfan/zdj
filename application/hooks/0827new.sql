/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50544
Source Host           : localhost:3306
Source Database       : new

Target Server Type    : MYSQL
Target Server Version : 50544
File Encoding         : 65001

Date: 2015-08-27 18:47:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `onethink_area`
-- ----------------------------
DROP TABLE IF EXISTS `onethink_area`;
CREATE TABLE `onethink_area` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `code` varchar(5) CHARACTER SET utf16 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of onethink_area
-- ----------------------------
INSERT INTO `onethink_area` VALUES ('1', '黄岛区', 'HD_');
INSERT INTO `onethink_area` VALUES ('2', '市南区', 'SN_');

-- ----------------------------
-- Table structure for `onethink_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `onethink_auth_group`;
CREATE TABLE `onethink_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(20) NOT NULL,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `member_id` char(80) NOT NULL DEFAULT '1,2' COMMENT '成员id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of onethink_auth_group
-- ----------------------------
INSERT INTO `onethink_auth_group` VALUES ('1', 'admin', '客服', '1', '1');
INSERT INTO `onethink_auth_group` VALUES ('2', 'kefu', '客服', '1', '2,3,4,5');

-- ----------------------------
-- Table structure for `onethink_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `onethink_auth_group_access`;
CREATE TABLE `onethink_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of onethink_auth_group_access
-- ----------------------------
INSERT INTO `onethink_auth_group_access` VALUES ('2', '1');

-- ----------------------------
-- Table structure for `onethink_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `onethink_auth_rule`;
CREATE TABLE `onethink_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(20) NOT NULL,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of onethink_auth_rule
-- ----------------------------
INSERT INTO `onethink_auth_rule` VALUES ('1', 'admin', '/Index/left/sys/1', '桌面', '2', '1', '');
INSERT INTO `onethink_auth_rule` VALUES ('2', 'admin', '/Index/left/sys/2', '用户', '2', '1', '');
INSERT INTO `onethink_auth_rule` VALUES ('3', 'admin', '/Index/left/sys/3', '商家', '2', '1', '');
INSERT INTO `onethink_auth_rule` VALUES ('4', 'admin', '/Index/left/sys/4', '配置', '2', '1', '');
INSERT INTO `onethink_auth_rule` VALUES ('5', 'admin', '/Index/left/sys/5', '内容', '2', '1', '');
INSERT INTO `onethink_auth_rule` VALUES ('6', 'admin', '/Index/left/sys/6', '订单', '2', '1', '');
INSERT INTO `onethink_auth_rule` VALUES ('7', 'admin', '/Index/index', '首页index', '1', '1', '');
INSERT INTO `onethink_auth_rule` VALUES ('8', 'admin', '/Index/top', '首页top', '1', '1', '');
INSERT INTO `onethink_auth_rule` VALUES ('9', 'admin', '/Index/left', '首页left', '1', '1', '');
INSERT INTO `onethink_auth_rule` VALUES ('10', 'admin', '/Index/main', '首页main', '1', '1', '');
INSERT INTO `onethink_auth_rule` VALUES ('11', 'admin', '/Order/operate', '订单处理', '1', '1', '');
INSERT INTO `onethink_auth_rule` VALUES ('12', 'admin', '/Order/index', '订单首页', '1', '1', '');
INSERT INTO `onethink_auth_rule` VALUES ('13', 'admin', '/Order/refreshOrder', '订单刷新', '1', '1', '');
INSERT INTO `onethink_auth_rule` VALUES ('14', 'admin', '/User/index', '用户列表', '1', '1', '');
INSERT INTO `onethink_auth_rule` VALUES ('15', 'admin', '/User/userEdit', '用户编辑', '1', '1', '');
INSERT INTO `onethink_auth_rule` VALUES ('16', 'admin', '/User/userOrder', '用户列表', '1', '1', '');

-- ----------------------------
-- Table structure for `onethink_config`
-- ----------------------------
DROP TABLE IF EXISTS `onethink_config`;
CREATE TABLE `onethink_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'html标签类型',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '配置说明',
  `group` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置分组',
  `extra` varchar(255) NOT NULL DEFAULT '' COMMENT '配置值',
  `remark` varchar(100) NOT NULL COMMENT '配置说明',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  `value` text NOT NULL COMMENT '配置值',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`),
  KEY `type` (`type`),
  KEY `group` (`group`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of onethink_config
-- ----------------------------
INSERT INTO `onethink_config` VALUES ('1', 'WEB_ICP', '1', '网站备案号', '1', '', '设置在网站底部显示的备案号，如“沪ICP备12007941号-2', '1378900335', '1379235859', '1', '京ICP备11026148号', '9');
INSERT INTO `onethink_config` VALUES ('2', 'HD_SITE_TITLE', '1', '网站标题', '1', '', '网站标题前台显示标题', '1378898976', '1379235274', '1', '【宅当家】-青岛开发区外卖,青岛开发区外卖网,青岛开发区外卖电话,黄岛外卖网｜叫外卖上宅当家', '0');
INSERT INTO `onethink_config` VALUES ('3', 'HD_SITE_DESCRIPTION', '1', '网站描述', '1', '', '网站搜索引擎描述', '1378898976', '1379235841', '1', '宅当家是青岛开发区一家专业的外卖网站,集合了开发区本地众多知名的餐厅,覆盖青岛开发区内包括长江中路、香江路等主要服务区，让用户足不出户享受外卖美食。', '1');
INSERT INTO `onethink_config` VALUES ('4', 'HD_SITE_KEYWORD', '1', '网站关键字', '1', '', '网站搜索引擎关键字', '1378898976', '1381390100', '1', '宅当家 青岛开发区外卖 青岛开发区外卖网 青岛开发区外卖电话 黄岛外卖,黄岛外卖电话,长江路外卖', '8');
INSERT INTO `onethink_config` VALUES ('5', 'HD_SITE_CLOSE', '2', '关闭站点', '1', '0:关闭,1:开启', '站点关闭后其他用户不能访问，管理员可以正常访问', '1378898976', '1379235296', '1', '1', '1');
INSERT INTO `onethink_config` VALUES ('6', 'HD_ANNOUNCEMENT_MODE', '1', '网站公告', '1', '0关闭,1开启', '0关闭，1显示公告通知', '1379503896', '1380427745', '1', '1', '10');
INSERT INTO `onethink_config` VALUES ('7', 'HD_ANNOUNCEMENT', '1', '网站公告', '1', '', '公告内容', '1379503896', '1380427745', '1', '当前订单较多，配送大约需要70分钟！', '10');
INSERT INTO `onethink_config` VALUES ('8', 'HD_FREE_SEND', '1', '减免配送费', '2', '', '减免配送费', '1379503896', '1380427745', '1', '29', '10');
INSERT INTO `onethink_config` VALUES ('9', 'HD_SERVICE_TIME', '1', '服务时间', '2', '', '', '1379504487', '1379504580', '1', '10:00-20:00', '3');
INSERT INTO `onethink_config` VALUES ('10', 'HD_SERVICE_PHONE', '1', '客服电话', '2', '', '', '1387165454', '1387165553', '1', '0532-86941917', '12');
INSERT INTO `onethink_config` VALUES ('11', 'HD_SERVICE_AREA', '1', '配送区域', '2', '', '', '1387165685', '1387165685', '1', '嘉陵江路南，漓江路北，江山南路东，阿里山路西', '1');
INSERT INTO `onethink_config` VALUES ('12', 'SN_SITE_TITLE', '1', '网站标题', '1', '', '网站标题前台显示标题', '1378898976', '1379235274', '1', '【宅当家】-青岛开发区外卖,青岛市南区外卖,青岛开发区外卖网,青岛开发区外卖电话,黄岛外卖网｜叫外卖上宅当家', '0');
INSERT INTO `onethink_config` VALUES ('13', 'SN_SITE_CLOSE', '2', '关闭站点', '1', '0:关闭,1:开启', '商家全部休息', '1378898976', '1379235296', '1', '1', '1');
INSERT INTO `onethink_config` VALUES ('14', 'SN_ANNOUNCEMENT_MODE', '1', '网站公告', '1', '0关闭,1开启', '', '0', '0', '1', '1', '10');
INSERT INTO `onethink_config` VALUES ('15', 'SN_ANNOUNCEMENT', '1', '', '1', '', '', '0', '0', '1', '市南订单多', '10');
INSERT INTO `onethink_config` VALUES ('16', 'SN_FREE_SEND', '1', '减免配送费', '2', '', '减免配送费', '0', '0', '1', '29', '10');
INSERT INTO `onethink_config` VALUES ('17', 'SN_SERVICE_TIME', '1', '', '2', '', '', '0', '0', '1', '10:00-20:00', '10');
INSERT INTO `onethink_config` VALUES ('18', 'SN_SERVICE_PHONE', '1', '', '2', '', '', '0', '0', '1', '0532-8888', '10');
INSERT INTO `onethink_config` VALUES ('19', 'SN_SERVICE_AREA', '1', '', '2', '', '', '0', '0', '1', '市南配送区域', '10');
INSERT INTO `onethink_config` VALUES ('20', 'SN_SEND_TIME', '1', '配送时间', '1', '', '配送时间', '0', '0', '1', '', '0');
INSERT INTO `onethink_config` VALUES ('21', 'HD_SEND_TIME', '1', '配送时间', '1', '', '配送时间', '0', '0', '1', '', '0');

-- ----------------------------
-- Table structure for `onethink_finance_history`
-- ----------------------------
DROP TABLE IF EXISTS `onethink_finance_history`;
CREATE TABLE `onethink_finance_history` (
  `id` tinyint(10) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `order_num` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `daybook` decimal(5,2) NOT NULL DEFAULT '0.00',
  `profit` decimal(5,2) NOT NULL DEFAULT '0.00',
  `alipay` decimal(5,2) NOT NULL DEFAULT '0.00' COMMENT '网上支付金额',
  `clerk` char(10) NOT NULL DEFAULT '陈超云' COMMENT '上报人',
  `remark` varchar(30) NOT NULL COMMENT '备注',
  `hand_in` decimal(5,2) NOT NULL,
  `j_yue` decimal(5,2) NOT NULL,
  `d_yue` decimal(5,2) NOT NULL,
  `x_yue` decimal(5,2) NOT NULL,
  `m_yue` decimal(5,2) NOT NULL,
  `submit_time` datetime NOT NULL COMMENT '上报时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of onethink_finance_history
-- ----------------------------
INSERT INTO `onethink_finance_history` VALUES ('1', '2015-08-22', '5', '15.00', '13.00', '1.00', '樊本超', '加班了', '13.00', '2.00', '1.00', '4.00', '3.00', '0000-00-00 00:00:00');
INSERT INTO `onethink_finance_history` VALUES ('2', '2015-08-22', '5', '15.00', '9.00', '1.00', '樊本超', '加班了', '13.00', '2.00', '1.00', '4.00', '3.00', '2015-08-23 00:59:00');
INSERT INTO `onethink_finance_history` VALUES ('3', '2015-08-22', '5', '15.00', '9.00', '1.00', '樊本超', '加班了', '13.00', '2.00', '1.00', '4.00', '3.00', '2015-08-23 01:00:00');
INSERT INTO `onethink_finance_history` VALUES ('4', '2015-08-22', '5', '15.00', '9.00', '1.00', '樊本超', '加班了', '13.00', '2.00', '1.00', '4.00', '3.00', '2015-08-23 01:00:00');
INSERT INTO `onethink_finance_history` VALUES ('5', '2015-08-22', '5', '15.00', '9.00', '1.00', '樊本超', '加班了', '13.00', '2.00', '1.00', '4.00', '3.00', '2015-08-23 01:02:00');
INSERT INTO `onethink_finance_history` VALUES ('6', '2015-08-22', '5', '15.00', '9.00', '1.00', '樊本超', '加班了', '13.00', '2.00', '1.00', '4.00', '3.00', '2015-08-23 01:04:00');
INSERT INTO `onethink_finance_history` VALUES ('7', '2015-08-23', '5', '500.00', '990.11', '12.00', '陈超云', '暂无备注', '123.00', '12.00', '12.00', '12.00', '12.00', '2015-08-23 01:29:00');

-- ----------------------------
-- Table structure for `onethink_finance_list`
-- ----------------------------
DROP TABLE IF EXISTS `onethink_finance_list`;
CREATE TABLE `onethink_finance_list` (
  `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `history_id` int(20) NOT NULL,
  `lid` tinyint(5) NOT NULL COMMENT '订单编号',
  `shop` varchar(10) NOT NULL COMMENT '商家',
  `pay` decimal(5,1) NOT NULL COMMENT '支付',
  `receive` decimal(5,1) NOT NULL COMMENT '收取',
  `distribution_fee` decimal(5,1) NOT NULL COMMENT '配送费',
  `tel` varchar(16) NOT NULL COMMENT '电话',
  `address` varchar(30) NOT NULL COMMENT '地址',
  `distribution_staff` varchar(10) NOT NULL COMMENT '配送员',
  `mark` varchar(30) NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of onethink_finance_list
-- ----------------------------
INSERT INTO `onethink_finance_list` VALUES ('1', '6', '0', '爱的咖喱亭', '1.0', '1.0', '10.0', '1111111131', '开发区庐山小区', '4', '无备注');
INSERT INTO `onethink_finance_list` VALUES ('2', '6', '1', '爱的咖喱亭', '2.0', '2.0', '7.0', '122222221', '开发区庐山小区', '5', '');
INSERT INTO `onethink_finance_list` VALUES ('3', '6', '2', '海福康海参', '3.0', '3.0', '6.0', '12312331231', '开发区庐山小区', '6', '');
INSERT INTO `onethink_finance_list` VALUES ('4', '6', '3', '爱的咖喱亭', '0.0', '4.0', '0.0', '12312331231', '开发区庐山小区', '', '');
INSERT INTO `onethink_finance_list` VALUES ('5', '6', '4', '领鲜', '0.0', '5.0', '0.0', '12312331231', '开发区庐山小区', '', '');
INSERT INTO `onethink_finance_list` VALUES ('6', '7', '0', '舅姥爷砂锅', '1.0', '100.0', '0.0', '12312331231', '开发区庐山小区', '4', '');
INSERT INTO `onethink_finance_list` VALUES ('7', '7', '1', '爱的咖喱亭', '2.0', '100.0', '0.0', '12312331231', '开发区庐山小区', '3', '撒地方');
INSERT INTO `onethink_finance_list` VALUES ('8', '7', '2', '小时咖喱', '3.0', '100.0', '0.0', '12312331231', '开发区庐山小区', '3', '');
INSERT INTO `onethink_finance_list` VALUES ('9', '7', '3', '爱的咖喱亭', '4.0', '100.0', '0.0', '12312331231', '开发区庐山小区', '4', '手动阀杀地方');
INSERT INTO `onethink_finance_list` VALUES ('10', '7', '4', '爱的咖喱亭', '0.0', '100.0', '0.0', '12312331231', '开发区庐山小区', '', '');

-- ----------------------------
-- Table structure for `onethink_finance_staff`
-- ----------------------------
DROP TABLE IF EXISTS `onethink_finance_staff`;
CREATE TABLE `onethink_finance_staff` (
  `id` tinyint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `mark` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of onethink_finance_staff
-- ----------------------------

-- ----------------------------
-- Table structure for `onethink_food`
-- ----------------------------
DROP TABLE IF EXISTS `onethink_food`;
CREATE TABLE `onethink_food` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `shopid` int(10) unsigned NOT NULL COMMENT '所属店铺',
  `name` varchar(30) NOT NULL COMMENT '菜名',
  `pic` varchar(100) NOT NULL,
  `attribute` varchar(100) NOT NULL COMMENT '属性',
  `original_price` decimal(5,1) NOT NULL COMMENT '原价即展示的原打折前价格',
  `sale_price` decimal(5,1) NOT NULL COMMENT '售出价',
  `get_price` decimal(5,1) NOT NULL COMMENT '进货价',
  `sale_num` tinyint(10) unsigned NOT NULL DEFAULT '0' COMMENT '售出份数',
  `food_type` tinyint(10) unsigned NOT NULL COMMENT '类别',
  `status` tinyint(10) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  `sort` tinyint(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `publish` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `type` (`food_type`),
  KEY `shopid` (`shopid`)
) ENGINE=MyISAM AUTO_INCREMENT=1827 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of onethink_food
-- ----------------------------
INSERT INTO `onethink_food` VALUES ('10', '7', '香辣鸡翅(2块)', '', '', '0.0', '12.0', '10.0', '0', '12', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('11', '7', '新奥尔良烤翅(2块)', '', '', '0.0', '14.0', '12.0', '0', '12', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('12', '7', '黄金鸡块(5块)', '', '', '0.0', '11.0', '9.5', '0', '12', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('13', '7', '劲脆鸡腿堡', '', '', '0.0', '17.0', '15.5', '0', '12', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('14', '7', '外带全家桶', '', '', '0.0', '85.0', '83.5', '0', '12', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('15', '7', '吮指原味鸡套餐A(含原味鸡+可乐)', '', '', '0.0', '38.0', '36.0', '0', '14', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('16', '7', '老北京鸡肉卷', '', '', '0.0', '32.0', '30.0', '0', '12', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('19', '7', '葡式蛋挞', '', '', '0.0', '12.0', '10.0', '0', '12', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('20', '7', '劲爆鸡米花(大) ', '', '', '0.0', '14.0', '12.5', '0', '12', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('21', '7', '骨肉相连(1串) ', '', '', '0.0', '8.0', '7.0', '0', '12', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('22', '7', '骨肉相连(2串) ', '', '', '0.0', '12.0', '11.0', '0', '12', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('23', '7', '香脆海苔 ', '', '', '0.0', '13.0', '12.0', '0', '12', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('24', '7', '菌菇四宝汤', '', '', '0.0', '8.0', '8.0', '0', '13', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('25', '7', '芙蓉汤', '', '', '0.0', '7.5', '7.5', '0', '13', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('26', '7', '香甜粟米棒', '', '', '0.0', '8.0', '8.0', '0', '13', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('27', '7', '薯条(中)', '', '', '0.0', '12.0', '10.0', '0', '13', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('28', '7', '土豆泥', '', '', '0.0', '6.0', '6.0', '0', '13', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('29', '7', '培根鸡腿燕麦堡套餐 (含薯条+可乐)', '', '', '0.0', '34.0', '32.5', '0', '14', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('30', '7', '新奥尔良烤鸡腿堡餐(含薯条+可乐)', '', '', '0.0', '35.0', '32.0', '0', '14', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('31', '7', 'BBQ手撕猪肉堡餐(含薯条+可乐)', '', '', '0.0', '34.0', '32.5', '0', '14', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('32', '7', '脆鸡八分堡', '', '', '0.0', '28.0', '25.0', '0', '14', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('33', '7', '劲脆鸡腿堡餐(含薯条+可乐)', '', '', '0.0', '33.0', '32.0', '0', '14', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('34', '8', '巨无霸', '', '', '0.0', '21.0', '19.0', '0', '15', '0', '1', '0');
INSERT INTO `onethink_food` VALUES ('35', '8', '双层吉士汉堡', '', '', '0.0', '18.0', '16.0', '0', '15', '0', '2', '0');
INSERT INTO `onethink_food` VALUES ('36', '8', '麦辣鸡腿汉堡', '', '', '0.0', '17.0', '15.0', '0', '15', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('37', '8', '巨无霸+小可', '', '', '0.0', '25.0', '24.0', '0', '17', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('38', '8', '麦辣鸡腿汉堡+薯条+小可', '', '', '0.0', '21.0', '19.0', '0', '17', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('39', '8', '麦辣鸡翅(2)', '', '', '0.0', '12.0', '10.0', '0', '16', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('40', '8', '麦乐鸡(5)', '', '', '0.0', '11.0', '9.0', '0', '16', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('41', '8', '薯条(中)', '', '', '0.0', '10.0', '9.5', '0', '16', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('51', '9', '经典比萨套餐(鸡翅+虾球+肉串)', '', '', '0.0', '99.0', '99.0', '0', '24', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('52', '9', '经典芝心比萨套餐(鸡翅+虾球+肉串)', '', '', '0.0', '122.0', '122.0', '0', '24', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('53', '9', '小吃拼盘(烤翅4块+鸡球3只+薯格50g)', '', '', '0.0', '30.0', '30.0', '0', '24', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('54', '9', '经典意式热辣培根面套餐', '', '', '0.0', '32.0', '32.0', '0', '24', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('55', '9', '鲜香菌菇汤', '', '', '0.0', '8.0', '8.0', '0', '23', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('56', '9', '鸡茸蘑菇汤', '', '', '0.0', '18.0', '18.0', '0', '23', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('57', '9', '欧陆风情海鲜茄香浓汤 ', '', '', '0.0', '18.0', '18.0', '0', '23', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('58', '9', '虫草花鸡汤', '', '', '0.0', '15.0', '15.0', '0', '23', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('59', '9', '港式鱼丸米线', '', '', '0.0', '19.0', '19.0', '0', '21', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('60', '9', '新加坡特色叻沙海鲜米线', '', '', '0.0', '29.0', '29.0', '0', '21', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('61', '9', '黄金鱼籽酱虾球', '', '', '0.0', '12.0', '12.0', '0', '22', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('62', '9', '香酥鸡米花', '', '', '0.0', '9.0', '9.0', '0', '22', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('63', '9', '烧烤BBQ鸡翅(2块)', '', '', '0.0', '12.0', '12.0', '0', '22', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('64', '9', '烧烤BBQ鸡翅(4支)', '', '', '0.0', '24.0', '24.0', '0', '22', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('65', '9', '芝士焗薯蓉', '', '', '0.0', '12.0', '12.0', '0', '22', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('66', '9', '新奥尔良风味鸡翅(4支)', '', '', '0.0', '24.0', '24.0', '0', '22', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('67', '9', '新奥尔良风情烤鸡腿', '', '', '0.0', '12.0', '12.0', '0', '22', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('68', '9', '意式肉酱面', '', '', '0.0', '29.0', '29.0', '0', '20', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('69', '9', '台式卤肉干拌意面', '', '', '0.0', '20.0', '20.0', '0', '20', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('70', '9', '经典意式热辣培根面', '', '', '0.0', '29.0', '29.0', '0', '20', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('71', '9', '秘制红烧肉饭', '', '', '0.0', '29.0', '29.0', '0', '19', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('72', '9', '欧式培根炒饭', '', '', '0.0', '25.0', '25.0', '0', '19', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('73', '9', '炭烤鸡肉芝士焗饭', '', '', '0.0', '29.0', '29.0', '0', '19', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('74', '9', '普罗旺斯风情鸡肉炒饭', '', '', '0.0', '19.0', '19.0', '0', '19', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('75', '9', '干锅鸡饭', '', '', '0.0', '24.0', '24.0', '0', '19', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('76', '9', '热辣滋味鲜香烤鸡比萨 (纯珍普通)', '', '', '0.0', '39.0', '39.0', '0', '18', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('77', '9', '德式盐烤猪肘比萨(纯珍普通)', '', '', '0.0', '59.0', '59.0', '0', '18', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('78', '9', '意式培根卷大虾比萨 (纯珍普通)', '', '', '0.0', '62.0', '62.0', '0', '18', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('79', '9', '新奥尔良风情烤肉比萨 (纯珍普通)', '', '', '0.0', '52.0', '52.0', '0', '18', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('80', '9', '田园风光比萨(纯珍普通)', '', '', '0.0', '49.0', '49.0', '0', '18', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('81', '9', '摩洛哥风情鲜香烤鸡比萨 (纯珍普通)', '', '', '0.0', '39.0', '39.0', '0', '18', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('82', '10', '米饭(套餐本身自带一份)', '', '', '0.0', '2.0', '2.0', '0', '25', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('83', '10', '排骨(原味)(小)', '', '', '0.0', '21.0', '21.0', '0', '25', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('84', '10', '排骨(含白菜豆腐粉条)(小)', '', '', '0.0', '18.0', '18.0', '0', '25', '1', '13', '0');
INSERT INTO `onethink_food` VALUES ('85', '10', '排骨(含白菜豆腐粉条)(大)', '', '', '0.0', '23.0', '23.0', '0', '25', '1', '14', '0');
INSERT INTO `onethink_food` VALUES ('86', '10', '排骨(含海带豆腐粉条)(小)', '', '', '0.0', '19.0', '19.0', '0', '25', '1', '15', '0');
INSERT INTO `onethink_food` VALUES ('87', '10', '排骨(含海带豆腐粉条)(大)', '', '', '0.0', '24.0', '24.0', '0', '25', '1', '16', '0');
INSERT INTO `onethink_food` VALUES ('88', '10', '排骨(含香菇油菜粉条)(小)', '', '', '0.0', '19.0', '19.0', '0', '25', '1', '11', '0');
INSERT INTO `onethink_food` VALUES ('89', '10', '排骨(含香菇油菜粉条)(大)', '', '', '0.0', '24.0', '24.0', '0', '25', '1', '12', '0');
INSERT INTO `onethink_food` VALUES ('90', '10', '排骨(含酸菜粉条)(小)', '', '', '0.0', '19.0', '19.0', '0', '25', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('91', '10', '排骨(含酸菜粉条)(大)', '', '', '0.0', '24.0', '24.0', '0', '25', '1', '10', '0');
INSERT INTO `onethink_food` VALUES ('92', '10', '排骨(含土豆白菜)(小)', '', '', '0.0', '19.0', '18.0', '0', '25', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('93', '10', '排骨(含土豆白菜)(大)', '', '', '0.0', '23.0', '23.0', '0', '25', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('94', '10', '排骨(含土豆海带)(小)', '', '', '0.0', '19.0', '19.0', '0', '25', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('95', '10', '排骨(含土豆海带)(大)', '', '', '0.0', '24.0', '24.0', '0', '25', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('96', '10', '排骨(含冬瓜豆腐)(小)', '', '', '0.0', '18.0', '18.0', '0', '25', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('97', '10', '排骨(含冬瓜豆腐)(大)', '', '', '0.0', '23.0', '23.0', '0', '25', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('98', '10', '肋排(原味)(小)', '', '', '0.0', '21.0', '21.0', '0', '26', '1', '17', '0');
INSERT INTO `onethink_food` VALUES ('99', '10', '肋排(原味)(大)', '', '', '0.0', '29.0', '29.0', '0', '26', '1', '18', '0');
INSERT INTO `onethink_food` VALUES ('100', '10', '肋排(含白菜豆腐粉条)(小)', '', '', '0.0', '23.0', '21.0', '0', '26', '1', '29', '0');
INSERT INTO `onethink_food` VALUES ('101', '10', '肋排(含白菜豆腐粉条)(大)', '', '', '0.0', '29.0', '29.0', '0', '26', '1', '30', '0');
INSERT INTO `onethink_food` VALUES ('102', '10', '肋排(含海带豆腐粉条)(小)', '', '', '0.0', '22.0', '22.0', '0', '26', '1', '31', '0');
INSERT INTO `onethink_food` VALUES ('103', '10', '肋排(含海带豆腐粉条)(大)', '', '', '0.0', '30.0', '30.0', '0', '26', '1', '32', '0');
INSERT INTO `onethink_food` VALUES ('104', '10', '肋排(含香菇油菜粉条)(小)', '', '', '0.0', '22.0', '22.0', '0', '26', '1', '27', '0');
INSERT INTO `onethink_food` VALUES ('105', '10', '肋排(含香菇油菜粉条)(大)', '', '', '0.0', '30.0', '30.0', '0', '26', '1', '28', '0');
INSERT INTO `onethink_food` VALUES ('106', '10', '肋排(含酸菜粉条)(小)', '', '', '0.0', '22.0', '22.0', '0', '26', '1', '25', '0');
INSERT INTO `onethink_food` VALUES ('107', '10', '肋排(含酸菜粉条)(大)', '', '', '0.0', '30.0', '30.0', '0', '26', '1', '26', '0');
INSERT INTO `onethink_food` VALUES ('108', '10', '肋排(含土豆白菜)(小)', '', '', '0.0', '21.0', '21.0', '0', '26', '1', '19', '0');
INSERT INTO `onethink_food` VALUES ('109', '10', '肋排(含土豆白菜)(大)', '', '', '0.0', '29.0', '29.0', '0', '26', '1', '20', '0');
INSERT INTO `onethink_food` VALUES ('110', '10', '肋排(含土豆海带)(小)', '', '', '0.0', '22.0', '22.0', '0', '26', '1', '21', '0');
INSERT INTO `onethink_food` VALUES ('111', '10', '肋排(含土豆海带)(大)', '', '', '0.0', '30.0', '30.0', '0', '26', '1', '22', '0');
INSERT INTO `onethink_food` VALUES ('112', '10', '肋排(含冬瓜豆腐)(小)', '', '', '0.0', '21.0', '21.0', '0', '26', '1', '23', '0');
INSERT INTO `onethink_food` VALUES ('113', '10', '肋排(含冬瓜豆腐)(大)', '', '', '0.0', '29.0', '29.0', '0', '26', '1', '24', '0');
INSERT INTO `onethink_food` VALUES ('114', '11', '米饭', '', '', '0.0', '2.0', '2.0', '0', '27', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('115', '11', '鲅鱼饺子(20)', '', '', '0.0', '26.0', '26.0', '0', '27', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('116', '11', '茴香猪肉(20)', '', '', '0.0', '16.0', '16.0', '0', '27', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('117', '11', '槐花猪肉(20)', '', '', '0.0', '16.0', '16.0', '0', '27', '0', '4', '0');
INSERT INTO `onethink_food` VALUES ('118', '11', '芸豆猪肉(20)', '', '', '0.0', '16.0', '16.0', '0', '27', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('119', '11', '肉三鲜(大)', '', '', '0.0', '16.0', '16.0', '0', '27', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('120', '11', '素三鲜(大)', '', '', '0.0', '16.0', '16.0', '0', '27', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('121', '11', '猪肉白菜(大)', '', '', '0.0', '16.0', '16.0', '0', '27', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('122', '11', '猪肉芹菜(20)', '', '', '0.0', '16.0', '16.0', '0', '27', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('123', '11', '猪肉青椒(大)', '', '', '0.0', '16.0', '16.0', '0', '27', '1', '10', '0');
INSERT INTO `onethink_food` VALUES ('124', '11', '猪肉黄瓜(大)', '', '', '0.0', '16.0', '16.0', '0', '27', '1', '11', '0');
INSERT INTO `onethink_food` VALUES ('125', '11', '猪肉酸菜(20)', '', '', '0.0', '16.0', '16.0', '0', '27', '1', '12', '0');
INSERT INTO `onethink_food` VALUES ('126', '11', '木耳鸡蛋(20)', '', '', '0.0', '16.0', '16.0', '0', '27', '1', '13', '0');
INSERT INTO `onethink_food` VALUES ('127', '11', '羊肉香菜(大)', '', '', '0.0', '19.0', '19.0', '0', '27', '1', '14', '0');
INSERT INTO `onethink_food` VALUES ('128', '11', '牛肉金针菇(大)', '', '', '0.0', '19.0', '19.0', '0', '27', '1', '15', '0');
INSERT INTO `onethink_food` VALUES ('129', '11', '百年煽馅', '', '', '0.0', '13.0', '13.0', '0', '27', '0', '16', '0');
INSERT INTO `onethink_food` VALUES ('131', '11', '酸辣汤', '', '', '0.0', '17.0', '17.0', '0', '29', '1', '17', '0');
INSERT INTO `onethink_food` VALUES ('132', '11', '玉米羹', '', '', '0.0', '13.0', '13.0', '0', '29', '1', '18', '0');
INSERT INTO `onethink_food` VALUES ('133', '11', '紫菜蛋汤', '', '', '0.0', '11.0', '11.0', '0', '29', '1', '19', '0');
INSERT INTO `onethink_food` VALUES ('134', '11', '西红柿蛋汤', '', '', '0.0', '11.0', '11.0', '0', '29', '1', '20', '0');
INSERT INTO `onethink_food` VALUES ('135', '11', '海鲜疙瘩汤', '', '', '0.0', '19.0', '19.0', '0', '29', '1', '21', '0');
INSERT INTO `onethink_food` VALUES ('136', '11', '农家扒鸡(只)', '', '', '0.0', '35.0', '35.0', '0', '28', '0', '22', '0');
INSERT INTO `onethink_food` VALUES ('137', '11', '家常豆腐', '', '', '0.0', '23.0', '23.0', '0', '27', '1', '23', '0');
INSERT INTO `onethink_food` VALUES ('138', '11', '海鲜氽蛋', '', '', '0.0', '27.0', '27.0', '0', '28', '1', '24', '0');
INSERT INTO `onethink_food` VALUES ('139', '11', '红烧茄子', '', '', '0.0', '19.0', '19.0', '0', '28', '1', '25', '0');
INSERT INTO `onethink_food` VALUES ('140', '11', '溜肉段', '', '', '0.0', '29.0', '29.0', '0', '28', '1', '26', '0');
INSERT INTO `onethink_food` VALUES ('141', '11', '辣大肠', '', '', '0.0', '33.0', '33.0', '0', '28', '1', '27', '0');
INSERT INTO `onethink_food` VALUES ('142', '11', '清炒山药', '', '', '0.0', '23.0', '23.0', '0', '28', '1', '28', '0');
INSERT INTO `onethink_food` VALUES ('143', '11', '麻婆豆腐', '', '', '0.0', '19.0', '19.0', '0', '28', '1', '29', '0');
INSERT INTO `onethink_food` VALUES ('144', '11', '京酱肉丝', '', '', '0.0', '23.0', '23.0', '0', '28', '1', '30', '0');
INSERT INTO `onethink_food` VALUES ('145', '11', '小鸡炖蘑菇', '', '', '0.0', '39.0', '39.0', '0', '28', '1', '31', '0');
INSERT INTO `onethink_food` VALUES ('146', '11', '回锅肉', '', '', '0.0', '29.0', '29.0', '0', '28', '1', '32', '0');
INSERT INTO `onethink_food` VALUES ('147', '11', '虾酱豆腐', '', '', '0.0', '17.0', '17.0', '0', '28', '1', '33', '0');
INSERT INTO `onethink_food` VALUES ('148', '11', '香菇油菜', '', '', '0.0', '19.0', '19.0', '0', '28', '1', '34', '0');
INSERT INTO `onethink_food` VALUES ('149', '11', '肉末粉条', '', '', '0.0', '17.0', '17.0', '0', '28', '1', '35', '0');
INSERT INTO `onethink_food` VALUES ('150', '11', '尖椒豆皮', '', '', '0.0', '19.0', '19.0', '0', '28', '1', '36', '0');
INSERT INTO `onethink_food` VALUES ('151', '11', '糖醋里脊', '', '', '0.0', '29.0', '29.0', '0', '28', '1', '37', '0');
INSERT INTO `onethink_food` VALUES ('152', '11', '锅包肉', '', '', '0.0', '29.0', '29.0', '0', '28', '1', '38', '0');
INSERT INTO `onethink_food` VALUES ('153', '11', '地三鲜', '', '', '0.0', '19.0', '19.0', '0', '28', '1', '39', '0');
INSERT INTO `onethink_food` VALUES ('154', '11', '西红柿炒蛋', '', '', '0.0', '17.0', '17.0', '0', '28', '1', '40', '0');
INSERT INTO `onethink_food` VALUES ('155', '11', '宫保鸡丁', '', '', '0.0', '29.0', '29.0', '0', '28', '1', '41', '0');
INSERT INTO `onethink_food` VALUES ('156', '11', '香辣肉丝', '', '', '0.0', '23.0', '23.0', '0', '28', '1', '42', '0');
INSERT INTO `onethink_food` VALUES ('157', '11', '干煸肥肠', '', '', '0.0', '33.0', '33.0', '0', '28', '1', '43', '0');
INSERT INTO `onethink_food` VALUES ('158', '11', '鱼香肉丝', '', '', '0.0', '23.0', '23.0', '0', '28', '1', '44', '0');
INSERT INTO `onethink_food` VALUES ('159', '11', '水煮肉片', '', '', '0.0', '30.0', '30.0', '0', '28', '1', '45', '0');
INSERT INTO `onethink_food` VALUES ('160', '11', '孜然羊肉', '', '', '0.0', '33.0', '33.0', '0', '28', '1', '46', '0');
INSERT INTO `onethink_food` VALUES ('161', '11', '可乐鸡翅', '', '', '0.0', '37.0', '37.0', '0', '28', '1', '47', '0');
INSERT INTO `onethink_food` VALUES ('162', '11', '铁锅蛤蜊鸡', '', '', '0.0', '37.0', '37.0', '0', '28', '1', '48', '0');
INSERT INTO `onethink_food` VALUES ('163', '11', '木须肉', '', '', '0.0', '23.0', '23.0', '0', '28', '1', '49', '0');
INSERT INTO `onethink_food` VALUES ('164', '11', '干煸芸豆', '', '', '0.0', '23.0', '23.0', '0', '28', '1', '50', '0');
INSERT INTO `onethink_food` VALUES ('165', '11', '毛血旺', '', '', '0.0', '40.0', '40.0', '0', '28', '1', '51', '0');
INSERT INTO `onethink_food` VALUES ('166', '11', '辣子鸡', '', '', '0.0', '33.0', '23.0', '0', '28', '1', '52', '0');
INSERT INTO `onethink_food` VALUES ('167', '11', '夫妻肺片', '', '', '0.0', '23.0', '23.0', '0', '30', '1', '53', '0');
INSERT INTO `onethink_food` VALUES ('168', '11', '捞拌金针菇', '', '', '0.0', '19.0', '19.0', '0', '30', '1', '54', '0');
INSERT INTO `onethink_food` VALUES ('169', '11', '四川招牌鸡', '', '', '0.0', '23.0', '23.0', '0', '30', '0', '55', '0');
INSERT INTO `onethink_food` VALUES ('170', '11', '老醋苦菊', '', '', '0.0', '11.0', '11.0', '0', '30', '0', '56', '0');
INSERT INTO `onethink_food` VALUES ('171', '11', '皮蛋豆腐', '', '', '0.0', '15.0', '15.0', '0', '30', '0', '57', '0');
INSERT INTO `onethink_food` VALUES ('172', '11', '捞汁百叶', '', '', '0.0', '17.0', '17.0', '0', '30', '0', '58', '0');
INSERT INTO `onethink_food` VALUES ('173', '11', '老醋花生', '', '', '0.0', '13.0', '13.0', '0', '30', '1', '59', '0');
INSERT INTO `onethink_food` VALUES ('194', '12', '菠菜拌毛蛤', '', '', '0.0', '29.0', '29.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('195', '12', '拌扇贝', '', '', '0.0', '27.0', '27.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('196', '12', '鸭头(只)', '', '', '0.0', '7.0', '7.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('197', '12', '芥末金针', '', '', '0.0', '16.0', '16.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('198', '12', '花生苦菊', '', '', '0.0', '13.0', '13.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('199', '12', '姜汁皮蛋', '', '', '0.0', '16.0', '16.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('200', '12', '肉丝拉皮', '', '', '0.0', '13.0', '13.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('201', '12', '家常凉菜', '', '', '0.0', '15.0', '15.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('202', '12', '老醋花生', '', '', '0.0', '17.0', '17.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('203', '12', '蒜泥黄瓜', '', '', '0.0', '11.0', '11.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('204', '12', '拌田七', '', '', '0.0', '13.0', '13.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('205', '12', '大丰收', '', '', '0.0', '16.0', '16.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('206', '12', '木耳辣根', '', '', '0.0', '17.0', '17.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('207', '12', '风干鸡', '', '', '0.0', '39.0', '39.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('208', '12', '卤水肉拼', '', '', '0.0', '49.0', '49.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('209', '12', '泡椒凤爪', '', '', '0.0', '17.0', '17.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('210', '12', '老醋蛰头', '', '', '0.0', '29.0', '29.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('211', '12', '冰脆苦瓜', '', '', '0.0', '17.0', '17.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('212', '12', '夫妻肺片', '', '', '0.0', '27.0', '27.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('213', '12', '酱牛肉', '', '', '0.0', '29.0', '29.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('214', '12', '拌八带', '', '', '0.0', '29.0', '29.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('215', '12', '圆葱鹅肝', '', '', '0.0', '16.0', '16.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('216', '12', '拌银鱼', '', '', '0.0', '19.0', '19.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('217', '12', '蛤蜊肉拌黄瓜', '', '', '0.0', '21.0', '21.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('218', '12', '香拌鸭胗', '', '', '0.0', '23.0', '23.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('219', '12', '红油牛肚', '', '', '0.0', '27.0', '27.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('220', '12', '凉拌金针菇', '', '', '0.0', '16.0', '16.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('221', '12', '糖醋微山藕', '', '', '0.0', '13.0', '13.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('222', '12', '拌猪耳', '', '', '0.0', '21.0', '21.0', '0', '32', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('223', '12', '麻辣豆腐', '', '', '0.0', '19.0', '19.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('224', '12', '地三鲜', '', '', '0.0', '19.0', '19.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('225', '12', '丰收大炖菜', '', '', '0.0', '39.0', '39.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('226', '12', '杀猪菜', '', '', '0.0', '29.0', '29.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('227', '12', '海鲜小豆腐', '', '', '0.0', '23.0', '23.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('228', '12', '五花肉土豆片', '', '', '0.0', '21.0', '21.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('229', '12', '茼蒿炒比管', '', '', '0.0', '29.0', '29.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('230', '12', '蛋黄焗南瓜', '', '', '0.0', '23.0', '23.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('231', '12', '尖椒豆腐皮', '', '', '0.0', '19.0', '19.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('232', '12', '肉末木耳', '', '', '0.0', '21.0', '21.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('233', '12', '菠菜炒鸡蛋', '', '', '0.0', '19.0', '19.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('234', '12', '西红柿炒鸡蛋', '', '', '0.0', '19.0', '19.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('235', '12', '老火豆腐', '', '', '0.0', '21.0', '21.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('236', '12', '老厨白菜', '', '', '0.0', '21.0', '21.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('237', '12', '莲藕小炒', '', '', '0.0', '23.0', '23.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('238', '12', '虾仁娃娃菜', '', '', '0.0', '27.0', '27.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('239', '12', '油泼西兰花', '', '', '0.0', '23.0', '23.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('240', '12', '干锅土豆片', '', '', '0.0', '23.0', '23.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('241', '12', '干锅千叶豆腐', '', '', '0.0', '23.0', '23.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('242', '12', '干煸芸豆', '', '', '0.0', '21.0', '21.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('243', '12', '干煸大头菜', '', '', '0.0', '19.0', '19.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('244', '12', '蒜蓉茼蒿', '', '', '0.0', '19.0', '19.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('245', '12', '清炒山药', '', '', '0.0', '25.0', '25.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('246', '12', '蒜蓉油麦菜', '', '', '0.0', '21.0', '21.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('247', '12', '松子玉米', '', '', '0.0', '23.0', '23.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('248', '12', '干煸茶树菇', '', '', '0.0', '29.0', '29.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('249', '12', '蒜蓉西兰花', '', '', '0.0', '21.0', '21.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('250', '12', '酸辣土豆丝', '', '', '0.0', '11.0', '11.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('252', '12', '肉末木耳', '', '', '0.0', '21.0', '21.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('253', '12', '木须肉', '', '', '0.0', '21.0', '21.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('254', '12', '一品茄花', '', '', '0.0', '33.0', '33.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('255', '12', '回锅肉', '', '', '0.0', '29.0', '29.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('256', '12', '锅包肉', '', '', '0.0', '33.0', '33.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('257', '12', '鱼香肉丝', '', '', '0.0', '29.0', '29.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('258', '12', '糖醋里脊', '', '', '0.0', '31.0', '31.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('259', '12', '干炸里脊', '', '', '0.0', '29.0', '29.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('260', '12', '干煸牛肉', '', '', '0.0', '39.0', '39.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('261', '12', '香辣鱿鱼', '', '', '0.0', '29.0', '29.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('262', '12', '山蘑炖鸡', '', '', '0.0', '43.0', '43.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('263', '12', '干煸鸡块', '', '', '0.0', '43.0', '43.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('264', '12', '家常小公鸡', '', '', '0.0', '40.0', '40.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('265', '12', '特色大盘鸡', '', '', '0.0', '49.0', '49.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('266', '12', '红烧排骨', '', '', '0.0', '49.0', '49.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('267', '12', '红烧猪手', '', '', '0.0', '41.0', '41.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('268', '12', '香酥虾', '', '', '0.0', '49.0', '49.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('269', '12', '红烧肘子', '', '', '0.0', '66.0', '66.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('270', '12', '水煮肉片', '', '', '0.0', '31.0', '31.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('271', '12', '毛血旺', '', '', '0.0', '47.0', '47.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('272', '12', '酸菜五花肉', '', '', '0.0', '23.0', '23.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('273', '12', '脆耳小炒', '', '', '0.0', '23.0', '23.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('274', '12', '葱爆八带', '', '', '0.0', '39.0', '39.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('275', '12', '香辣鸭头', '', '', '0.0', '39.0', '39.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('276', '12', '虾酱大排', '', '', '0.0', '39.0', '39.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('277', '12', '番茄牛肉', '', '', '0.0', '39.0', '39.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('278', '12', '红烧鸡翅', '', '', '0.0', '39.0', '39.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('279', '12', '手撕鲅鱼', '', '', '0.0', '49.0', '49.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('280', '12', '风味羊排', '', '', '0.0', '69.0', '69.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('281', '12', '山珍小炒', '', '', '0.0', '29.0', '29.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('282', '12', '地锅蛤蜊鸡', '', '', '0.0', '49.0', '49.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('283', '12', '五花肉炒鱿鱼', '', '', '0.0', '39.0', '39.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('284', '12', '麻辣烤鱼', '', '', '0.0', '69.0', '69.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('285', '12', '水煮鱼', '', '', '0.0', '49.0', '49.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('286', '12', '酸菜鱼', '', '', '0.0', '49.0', '49.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('287', '12', '蛤蜊羊肉锅', '', '', '0.0', '36.0', '36.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('288', '12', '干锅有机菜', '', '', '0.0', '25.0', '25.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('289', '12', '海鲜锅', '', '', '0.0', '29.0', '29.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('290', '12', '小炒脆骨', '', '', '0.0', '33.0', '33.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('291', '12', '溜肉段', '', '', '0.0', '33.0', '33.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('292', '12', '干煸肥肠', '', '', '0.0', '49.0', '49.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('293', '12', '红汤肥肠', '', '', '0.0', '46.0', '46.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('294', '12', '炸虾仁', '', '', '0.0', '46.0', '46.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('295', '12', '猪肚炖白菜', '', '', '0.0', '39.0', '39.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('296', '12', '宫保鸡丁', '', '', '0.0', '29.0', '29.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('297', '12', '干炸蚕蛹', '', '', '0.0', '46.0', '46.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('298', '12', '炒肝尖', '', '', '0.0', '21.0', '21.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('299', '12', '海鲜氽蛋', '', '', '0.0', '26.0', '26.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('300', '12', '铁板烤肉', '', '', '0.0', '36.0', '36.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('301', '12', '铁板鱿鱼', '', '', '0.0', '36.0', '36.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('302', '12', '辣蛤蜊', '', '', '0.0', '19.0', '19.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('303', '12', '辣炒肥肠', '', '', '0.0', '39.0', '39.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('304', '12', '西红柿蛋汤', '', '', '0.0', '13.0', '13.0', '0', '34', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('305', '12', '蛤蜊疙瘩汤', '', '', '0.0', '23.0', '23.0', '0', '34', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('306', '12', '酸辣汤', '', '', '0.0', '16.0', '16.0', '0', '34', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('307', '12', '紫菜蛋汤', '', '', '0.0', '13.0', '13.0', '0', '34', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('308', '12', '玉米羹', '', '', '0.0', '14.0', '14.0', '0', '31', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('309', '12', '香芋地瓜丸', '', '', '0.0', '21.0', '21.0', '0', '33', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('310', '12', '米饭', '', '', '0.0', '2.0', '2.0', '0', '33', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('311', '12', '白菜肉水饺(18个)', '', '', '0.0', '11.0', '11.0', '0', '33', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('312', '12', '香酥奶酪饼', '', '', '0.0', '29.0', '29.0', '0', '33', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('313', '12', '芹菜肉水饺(18个)', '', '', '0.0', '11.0', '11.0', '0', '33', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('314', '12', '韭菜鸡蛋水饺(18个)', '', '', '0.0', '11.0', '11.0', '0', '33', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('315', '12', '韭菜肉水饺(18个)', '', '', '0.0', '16.0', '16.0', '0', '33', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('316', '12', '蛋炒饭', '', '', '0.0', '13.0', '13.0', '0', '33', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('317', '12', '酱油炒饭', '', '', '0.0', '13.0', '13.0', '0', '33', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('318', '12', '茴香肉水饺(18个)', '', '', '0.0', '16.0', '16.0', '0', '33', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('319', '12', '芸豆肉水饺(18个)', '', '', '0.0', '16.0', '16.0', '0', '33', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('320', '12', '荠菜肉水饺(18个)', '', '', '0.0', '16.0', '16.0', '0', '33', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('321', '12', '酸菜肉水饺(18个)', '', '', '0.0', '16.0', '16.0', '0', '33', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('322', '12', '肉三鲜水饺(18个)', '', '', '0.0', '16.0', '16.0', '0', '33', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('323', '12', '素三鲜水饺(18个)', '', '', '0.0', '16.0', '16.0', '0', '33', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('324', '12', '素虾仁水饺(18个)', '', '', '0.0', '21.0', '21.0', '0', '33', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('325', '12', '鲅鱼水饺(18个)', '', '', '0.0', '23.0', '23.0', '0', '33', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('326', '12', '羊肉水饺(18个)', '', '', '0.0', '23.0', '23.0', '0', '33', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('327', '12', '牛肉水饺(18个)', '', '', '0.0', '23.0', '23.0', '0', '33', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('328', '12', '扬州炒饭', '', '', '0.0', '17.0', '17.0', '0', '33', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('340', '15', '三鲜锅贴(4个/两)', '', '', '0.0', '3.0', '3.0', '0', '42', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('341', '15', '牛肉锅贴(4个/两)', '', '', '0.0', '4.0', '4.0', '0', '42', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('342', '15', '素虾仁锅贴(4个/两)', '', '', '0.0', '4.5', '4.5', '0', '42', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('343', '15', '肉虾仁锅贴(4个/两)', '', '', '0.0', '5.0', '5.0', '0', '42', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('344', '15', '虾虎锅贴(4个/两)', '', '', '0.0', '5.0', '5.0', '0', '42', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('345', '15', '海带丝', '', '', '0.0', '4.0', '4.0', '0', '83', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('346', '15', '土豆丝', '', '', '0.0', '4.0', '4.0', '0', '83', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('347', '15', '凉拌黄瓜', '', '', '0.0', '4.0', '4.0', '0', '83', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('348', '15', '凉拌腐竹', '', '', '0.0', '4.0', '4.0', '0', '83', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('349', '15', '凉拌大头菜', '', '', '0.0', '4.0', '4.0', '0', '83', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('350', '15', '麻辣小银鱼', '', '', '0.0', '10.0', '10.0', '0', '83', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('351', '15', '凉拌猪耳朵', '', '', '0.0', '10.0', '10.0', '0', '83', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('352', '15', '疙瘩汤', '', '', '0.0', '3.0', '3.0', '0', '84', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('353', '15', '黑米粥', '', '', '0.0', '3.0', '3.0', '0', '84', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('354', '15', '小米粥', '', '', '0.0', '2.0', '2.0', '0', '84', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('355', '14', '包饭', '', '', '0.0', '100.0', '100.0', '0', '38', '1', '35', '0');
INSERT INTO `onethink_food` VALUES ('356', '14', '拌海螺', '', '', '0.0', '60.0', '60.0', '0', '39', '1', '36', '0');
INSERT INTO `onethink_food` VALUES ('357', '14', '拌黄瓜', '', '', '0.0', '20.0', '20.0', '0', '39', '1', '37', '0');
INSERT INTO `onethink_food` VALUES ('358', '14', '炝拌土豆丝', '', '', '0.0', '20.0', '20.0', '0', '39', '1', '38', '0');
INSERT INTO `onethink_food` VALUES ('359', '14', '拌拉皮', '', '', '0.0', '20.0', '20.0', '0', '39', '1', '39', '0');
INSERT INTO `onethink_food` VALUES ('360', '14', '拌牛百叶', '', '', '0.0', '30.0', '30.0', '0', '39', '1', '40', '0');
INSERT INTO `onethink_food` VALUES ('361', '14', '拌橡子冻', '', '', '0.0', '50.0', '50.0', '0', '39', '1', '41', '0');
INSERT INTO `onethink_food` VALUES ('362', '14', '橡子海鲜饼', '', '', '0.0', '40.0', '40.0', '0', '41', '1', '42', '0');
INSERT INTO `onethink_food` VALUES ('363', '14', '泡菜饼', '', '', '0.0', '30.0', '30.0', '0', '41', '1', '43', '0');
INSERT INTO `onethink_food` VALUES ('364', '14', '土豆饼', '', '', '0.0', '30.0', '30.0', '0', '41', '1', '44', '0');
INSERT INTO `onethink_food` VALUES ('365', '14', '煎豆腐', '', '', '0.0', '30.0', '30.0', '0', '41', '1', '45', '0');
INSERT INTO `onethink_food` VALUES ('366', '14', '冷面', '', '', '0.0', '25.0', '25.0', '0', '41', '1', '46', '0');
INSERT INTO `onethink_food` VALUES ('367', '14', '拌面', '', '', '0.0', '25.0', '25.0', '0', '41', '1', '47', '0');
INSERT INTO `onethink_food` VALUES ('368', '14', '温面', '', '', '0.0', '25.0', '25.0', '0', '41', '1', '48', '0');
INSERT INTO `onethink_food` VALUES ('369', '14', '橡子片汤', '', '', '0.0', '30.0', '30.0', '0', '41', '1', '49', '0');
INSERT INTO `onethink_food` VALUES ('370', '14', '石锅拌饭', '', '', '0.0', '30.0', '30.0', '0', '40', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('371', '14', '清国汤', '', '', '0.0', '20.0', '20.0', '0', '40', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('372', '14', '大酱汤', '', '', '0.0', '20.0', '20.0', '0', '40', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('373', '14', '泡菜汤', '', '', '0.0', '20.0', '20.0', '0', '40', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('374', '14', '小豆腐汤', '', '', '0.0', '20.0', '20.0', '0', '40', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('375', '14', '水豆腐', '', '', '0.0', '15.0', '15.0', '0', '40', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('376', '14', '块豆腐', '', '', '0.0', '15.0', '15.0', '0', '40', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('377', '14', '土豆脊骨汤(大)', '', '', '0.0', '100.0', '100.0', '0', '40', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('378', '14', '土豆脊骨汤(中)', '', '', '0.0', '80.0', '80.0', '0', '40', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('379', '14', '辣山鸡汤', '', '', '0.0', '120.0', '120.0', '0', '40', '1', '10', '0');
INSERT INTO `onethink_food` VALUES ('380', '14', '炖土鸡', '', '', '0.0', '120.0', '120.0', '0', '40', '1', '11', '0');
INSERT INTO `onethink_food` VALUES ('381', '14', '延边式炖土鸡', '', '', '0.0', '120.0', '120.0', '0', '40', '1', '12', '0');
INSERT INTO `onethink_food` VALUES ('382', '14', '大头鱼辣汤', '', '', '0.0', '100.0', '100.0', '0', '40', '1', '13', '0');
INSERT INTO `onethink_food` VALUES ('383', '14', '黄花鱼辣汤', '', '', '0.0', '100.0', '100.0', '0', '40', '1', '14', '0');
INSERT INTO `onethink_food` VALUES ('384', '14', '安康鱼汤', '', '', '0.0', '100.0', '100.0', '0', '40', '1', '15', '0');
INSERT INTO `onethink_food` VALUES ('385', '14', '明太鱼火锅(大)', '', '', '0.0', '100.0', '100.0', '0', '40', '1', '16', '0');
INSERT INTO `onethink_food` VALUES ('386', '14', '明太鱼火锅(中)', '', '', '0.0', '80.0', '80.0', '0', '40', '1', '17', '0');
INSERT INTO `onethink_food` VALUES ('387', '14', '海鲜火锅', '', '', '0.0', '120.0', '120.0', '0', '40', '1', '18', '0');
INSERT INTO `onethink_food` VALUES ('388', '14', '脊骨醒酒汤', '', '', '0.0', '30.0', '30.0', '0', '40', '1', '18', '0');
INSERT INTO `onethink_food` VALUES ('389', '14', '小海螺汤', '', '', '0.0', '30.0', '30.0', '0', '40', '1', '20', '0');
INSERT INTO `onethink_food` VALUES ('390', '14', '清汤大头', '', '', '0.0', '40.0', '40.0', '0', '40', '1', '21', '0');
INSERT INTO `onethink_food` VALUES ('391', '14', '辣炒八带', '', '', '0.0', '60.0', '60.0', '0', '38', '1', '22', '0');
INSERT INTO `onethink_food` VALUES ('392', '14', '辣炒五花肉', '', '', '0.0', '40.0', '40.0', '0', '38', '1', '23', '0');
INSERT INTO `onethink_food` VALUES ('393', '14', '炒蕨菜', '', '', '0.0', '30.0', '30.0', '0', '38', '1', '24', '0');
INSERT INTO `onethink_food` VALUES ('394', '14', '辣炒蛤蜊肉', '', '', '0.0', '30.0', '30.0', '0', '38', '1', '25', '0');
INSERT INTO `onethink_food` VALUES ('395', '14', '火辣干茄', '', '', '0.0', '25.0', '25.0', '0', '38', '1', '26', '0');
INSERT INTO `onethink_food` VALUES ('396', '14', '石板豆腐', '', '', '0.0', '30.0', '30.0', '0', '38', '1', '27', '0');
INSERT INTO `onethink_food` VALUES ('397', '14', '煎沙参', '', '', '0.0', '30.0', '30.0', '0', '38', '1', '28', '0');
INSERT INTO `onethink_food` VALUES ('398', '14', '泡菜豆腐', '', '', '0.0', '40.0', '40.0', '0', '38', '1', '29', '0');
INSERT INTO `onethink_food` VALUES ('399', '14', '酱焖刀鱼', '', '', '0.0', '40.0', '40.0', '0', '38', '1', '30', '0');
INSERT INTO `onethink_food` VALUES ('400', '14', '煎黄花鱼', '', '', '0.0', '40.0', '40.0', '0', '38', '1', '31', '0');
INSERT INTO `onethink_food` VALUES ('401', '14', '猪蹄', '', '', '0.0', '120.0', '120.0', '0', '38', '1', '32', '0');
INSERT INTO `onethink_food` VALUES ('402', '14', '迷你猪蹄', '', '', '0.0', '80.0', '80.0', '0', '38', '1', '33', '0');
INSERT INTO `onethink_food` VALUES ('403', '14', '辣猪蹄', '', '', '0.0', '100.0', '100.0', '0', '38', '1', '34', '0');
INSERT INTO `onethink_food` VALUES ('407', '16', '紫菜蛋花汤', '', '', '0.0', '11.0', '11.0', '0', '46', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('408', '16', '西红柿鸡蛋汤', '', '', '0.0', '14.0', '12.0', '0', '43', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('409', '16', '蛋花玉米羹', '', '', '0.0', '13.0', '13.0', '0', '46', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('410', '16', '醉蟹钳', '', '', '0.0', '28.0', '28.0', '0', '47', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('411', '16', '咯吱脆秋葵', '', '', '0.0', '18.0', '18.0', '0', '47', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('412', '16', '老醋花生', '', '', '0.0', '14.0', '14.0', '0', '47', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('413', '16', '顶级蛰头', '', '', '0.0', '38.0', '38.0', '0', '47', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('414', '16', '葱拌八带', '', '', '0.0', '50.0', '50.0', '0', '47', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('415', '16', '招牌口水鸡', '', '', '0.0', '28.0', '28.0', '0', '47', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('416', '16', '夫妻肺片', '', '', '0.0', '30.0', '30.0', '0', '47', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('417', '16', '苦菊花生', '', '', '0.0', '14.0', '14.0', '0', '47', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('418', '16', '东北拉皮', '', '', '0.0', '14.0', '14.0', '0', '47', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('419', '16', '姜拌藕', '', '', '0.0', '14.0', '14.0', '0', '47', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('420', '16', '酸辣蕨根粉', '', '', '0.0', '14.0', '14.0', '0', '47', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('421', '16', '菜心蛰皮', '', '', '0.0', '18.0', '18.0', '0', '47', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('422', '16', '丁香鱼拌苦菊', '', '', '0.0', '18.0', '18.0', '0', '47', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('423', '16', '养生田七', '', '', '0.0', '18.0', '18.0', '0', '47', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('424', '16', '蓝莓山药泥', '', '', '0.0', '18.0', '18.0', '0', '47', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('425', '16', '米饭', '', '', '0.0', '2.0', '2.0', '0', '43', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('426', '16', '芝士焗饭', '', '', '0.0', '28.0', '28.0', '0', '43', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('427', '16', '熊二豆沙包', '', '', '0.0', '10.0', '10.0', '0', '43', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('428', '16', '鲍鱼粥(小)', '', '', '0.0', '20.0', '20.0', '0', '43', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('429', '16', '鲍鱼粥(大)', '', '', '0.0', '30.0', '30.0', '0', '43', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('430', '16', '滋补蛤蜊粥(小)', '', '', '0.0', '7.0', '7.0', '0', '43', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('431', '16', '滋补蛤蜊粥(大)', '', '', '0.0', '12.0', '12.0', '0', '43', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('432', '16', '生滚大虾粥(小)', '', '', '0.0', '12.0', '12.0', '0', '43', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('433', '16', '生滚大虾粥(大)', '', '', '0.0', '22.0', '22.0', '0', '43', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('434', '16', '山楂冰糖凉粥(小)', '', '', '0.0', '10.0', '10.0', '0', '43', '1', '10', '0');
INSERT INTO `onethink_food` VALUES ('435', '16', '山楂冰糖凉粥(大)', '', '', '0.0', '18.0', '18.0', '0', '43', '1', '11', '0');
INSERT INTO `onethink_food` VALUES ('436', '16', '水果冰糖凉粥(小)', '', '', '0.0', '10.0', '10.0', '0', '43', '1', '12', '0');
INSERT INTO `onethink_food` VALUES ('437', '16', '水果冰糖凉粥(大)', '', '', '0.0', '18.0', '18.0', '0', '43', '1', '13', '0');
INSERT INTO `onethink_food` VALUES ('438', '16', '桂圆红枣补血粥(小)', '', '', '0.0', '8.0', '8.0', '0', '43', '1', '14', '0');
INSERT INTO `onethink_food` VALUES ('439', '16', '桂圆红枣补血粥(大)', '', '', '0.0', '14.0', '14.0', '0', '43', '1', '15', '0');
INSERT INTO `onethink_food` VALUES ('440', '16', '养生地瓜粥(小)', '', '', '0.0', '7.0', '7.0', '0', '43', '1', '16', '0');
INSERT INTO `onethink_food` VALUES ('441', '16', '养生地瓜粥(大)', '', '', '0.0', '12.0', '12.0', '0', '43', '1', '17', '0');
INSERT INTO `onethink_food` VALUES ('442', '16', '水果养颜粥(小)', '', '', '0.0', '8.0', '8.0', '0', '43', '1', '18', '0');
INSERT INTO `onethink_food` VALUES ('443', '16', '水果养颜粥(大)', '', '', '0.0', '14.0', '14.0', '0', '43', '1', '19', '0');
INSERT INTO `onethink_food` VALUES ('444', '16', '山楂开胃粥(小)', '', '', '0.0', '7.0', '7.0', '0', '43', '1', '20', '0');
INSERT INTO `onethink_food` VALUES ('445', '16', '山楂开胃粥(大)', '', '', '0.0', '12.0', '12.0', '0', '43', '1', '21', '0');
INSERT INTO `onethink_food` VALUES ('446', '16', '海鲜全家福粥', '', '', '0.0', '70.0', '70.0', '0', '43', '1', '22', '0');
INSERT INTO `onethink_food` VALUES ('447', '16', '蛋花玉米羹', '', '', '0.0', '14.0', '14.0', '0', '43', '1', '23', '0');
INSERT INTO `onethink_food` VALUES ('448', '16', '清肺百合粥(小)', '', '', '0.0', '7.0', '7.0', '0', '43', '1', '24', '0');
INSERT INTO `onethink_food` VALUES ('449', '16', '清肺百合粥(大)', '', '', '0.0', '12.0', '12.0', '0', '43', '1', '25', '0');
INSERT INTO `onethink_food` VALUES ('450', '16', '饼包拆骨肉', '', '', '0.0', '30.0', '30.0', '0', '44', '1', '26', '0');
INSERT INTO `onethink_food` VALUES ('451', '16', '特色水煮肉片', '', '', '0.0', '30.0', '30.0', '0', '44', '1', '27', '0');
INSERT INTO `onethink_food` VALUES ('452', '16', '精品毛血旺', '', '', '0.0', '50.0', '50.0', '0', '44', '1', '28', '0');
INSERT INTO `onethink_food` VALUES ('453', '16', '麻辣香锅虾', '', '', '0.0', '50.0', '50.0', '0', '44', '1', '29', '0');
INSERT INTO `onethink_food` VALUES ('454', '16', '麻辣诱惑蛙', '', '', '0.0', '50.0', '50.0', '0', '44', '1', '30', '0');
INSERT INTO `onethink_food` VALUES ('455', '16', '麻辣小龙虾(小)', '', '', '0.0', '60.0', '60.0', '0', '44', '1', '31', '0');
INSERT INTO `onethink_food` VALUES ('456', '16', '麻辣小龙虾(大)', '', '', '0.0', '90.0', '90.0', '0', '44', '1', '32', '0');
INSERT INTO `onethink_food` VALUES ('457', '16', '土豪焗蟹', '', '', '0.0', '41.0', '41.0', '0', '44', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('458', '16', '90版香辣虾', '', '', '0.0', '50.0', '50.0', '0', '44', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('459', '16', '鸡鸭恋', '', '', '0.0', '31.0', '31.0', '0', '44', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('460', '16', '孜然羊肉', '', '', '0.0', '30.0', '30.0', '0', '44', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('461', '16', '松仁玉米', '', '', '0.0', '24.0', '24.0', '0', '44', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('462', '16', '干炒排骨', '', '', '0.0', '60.0', '59.0', '0', '43', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('463', '16', '牛腩炖柿子', '', '', '0.0', '40.0', '40.0', '0', '44', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('464', '16', '沂蒙山炒鸡', '', '', '0.0', '50.0', '50.0', '0', '44', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('465', '16', '窝蛋肥牛', '', '', '0.0', '40.0', '40.0', '0', '44', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('466', '16', '干锅千叶豆腐', '', '', '0.0', '28.0', '28.0', '0', '44', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('467', '16', '干煸芸豆', '', '', '0.0', '20.0', '20.0', '0', '44', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('468', '16', '干炸虾仁', '', '', '0.0', '40.0', '40.0', '0', '44', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('469', '16', '山鸡炒荠菜', '', '', '0.0', '21.0', '21.0', '0', '44', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('470', '16', '酸辣土豆丝', '', '', '0.0', '12.0', '12.0', '0', '44', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('471', '16', '醋溜土豆丝', '', '', '0.0', '12.0', '12.0', '0', '44', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('472', '16', '干炸里脊', '', '', '0.0', '21.0', '21.0', '0', '44', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('473', '16', '糖醋里脊', '', '', '0.0', '21.0', '21.0', '0', '44', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('474', '16', '蒜茸粉丝娃娃菜', '', '', '0.0', '21.0', '21.0', '0', '44', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('484', '17', '紫菜蛋花汤', '', '', '0.0', '4.0', '4.0', '0', '49', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('485', '17', '普通火烧', '', '', '0.0', '5.0', '5.0', '0', '48', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('486', '17', '精品火烧', '', '', '0.0', '7.0', '7.0', '0', '48', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('487', '17', '全驴火烧', '', '', '0.0', '10.0', '10.0', '0', '48', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('488', '17', '驴鞭汤', '', '', '0.0', '30.0', '30.0', '0', '49', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('489', '17', '驴肉汤', '', '', '0.0', '11.0', '11.0', '0', '49', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('490', '17', '全驴汤', '', '', '0.0', '11.0', '11.0', '0', '49', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('491', '17', '骨髓汤', '', '', '0.0', '11.0', '11.0', '0', '49', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('492', '17', '驴腰汤', '', '', '0.0', '11.0', '11.0', '0', '49', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('493', '17', '板肠汤', '', '', '0.0', '10.0', '10.0', '0', '48', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('494', '17', '西红柿鸡蛋汤', '', '', '0.0', '4.0', '4.0', '0', '49', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('495', '17', '青瓜口条', '', '', '0.0', '25.0', '25.0', '0', '50', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('496', '17', '葱丝蹄筋', '', '', '0.0', '25.0', '25.0', '0', '50', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('497', '17', '青瓜驴肝', '', '', '0.0', '25.0', '25.0', '0', '50', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('498', '17', '蒜泥驴肉', '', '', '0.0', '60.0', '60.0', '0', '50', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('499', '17', '拌驴皮', '', '', '0.0', '25.0', '25.0', '0', '50', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('500', '17', '拌豆皮', '', '', '0.0', '8.0', '8.0', '0', '50', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('501', '17', '拌黄瓜', '', '', '0.0', '8.0', '8.0', '0', '50', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('502', '17', '拌三丝', '', '', '0.0', '8.0', '8.0', '0', '50', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('503', '17', '拌蜇皮', '', '', '0.0', '10.0', '10.0', '0', '50', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('504', '17', '酸辣土豆丝', '', '', '0.0', '10.0', '10.0', '0', '51', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('505', '17', '酸辣豆芽', '', '', '0.0', '10.0', '10.0', '0', '51', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('506', '17', '醋溜白菜', '', '', '0.0', '10.0', '10.0', '0', '51', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('507', '17', '尖椒豆皮', '', '', '0.0', '12.0', '12.0', '0', '51', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('508', '17', '海米西葫', '', '', '0.0', '12.0', '12.0', '0', '51', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('509', '17', '海米油菜', '', '', '0.0', '12.0', '12.0', '0', '51', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('510', '17', '西红柿炒鸡蛋', '', '', '0.0', '12.0', '12.0', '0', '51', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('511', '17', '黄瓜炒鸡蛋', '', '', '0.0', '12.0', '12.0', '0', '51', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('512', '17', '尖椒炒鸡蛋', '', '', '0.0', '12.0', '12.0', '0', '51', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('513', '17', '木耳炒鸡蛋', '', '', '0.0', '12.0', '12.0', '0', '51', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('514', '17', '葱爆驴肉', '', '', '0.0', '25.0', '25.0', '0', '52', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('515', '17', '尖椒板肠', '', '', '0.0', '25.0', '25.0', '0', '52', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('516', '17', '尖椒驴肉', '', '', '0.0', '25.0', '25.0', '0', '52', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('517', '17', '爆炒驴杂', '', '', '0.0', '30.0', '30.0', '0', '52', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('518', '17', '葱爆蹄筋', '', '', '0.0', '28.0', '28.0', '0', '52', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('519', '17', '孜然驴肉', '', '', '0.0', '30.0', '30.0', '0', '52', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('520', '17', '孜然驴腰', '', '', '0.0', '30.0', '30.0', '0', '52', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('521', '17', '孜然碗口', '', '', '0.0', '30.0', '30.0', '0', '52', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('522', '17', '爆炒驴肝', '', '', '0.0', '25.0', '25.0', '0', '52', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('523', '17', '鸡蛋骨髓', '', '', '0.0', '25.0', '25.0', '0', '52', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('524', '17', '红烧驴肉', '', '', '0.0', '30.0', '30.0', '0', '52', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('525', '17', '干煸板肠', '', '', '0.0', '30.0', '30.0', '0', '52', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('526', '17', '风味板筋', '', '', '0.0', '25.0', '25.0', '0', '52', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('527', '17', '爆炒心管', '', '', '0.0', '30.0', '30.0', '0', '52', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('528', '17', '爆炒驴腰', '', '', '0.0', '30.0', '30.0', '0', '52', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('529', '17', '锅仔驴杂', '', '', '0.0', '38.0', '38.0', '0', '52', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('530', '17', '锅仔驴肉', '', '', '0.0', '38.0', '38.0', '0', '52', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('531', '17', '西红柿驴肉', '', '', '0.0', '25.0', '25.0', '0', '52', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('532', '17', '白菜炒驴肉', '', '', '0.0', '25.0', '25.0', '0', '52', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('547', '18', '飘香拌面', '', '', '0.0', '6.0', '6.0', '0', '54', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('548', '18', '肉丝拌面', '', '', '0.0', '9.0', '9.0', '0', '54', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('549', '18', '牛肉拌面', '', '', '0.0', '13.0', '13.0', '0', '54', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('550', '18', '煎蛋面', '', '', '0.0', '8.0', '8.0', '0', '54', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('551', '18', '牛肉面', '', '', '0.0', '13.0', '13.0', '0', '54', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('552', '18', '卤肉面', '', '', '0.0', '13.0', '13.0', '0', '54', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('553', '18', '鸡腿面', '', '', '0.0', '12.0', '12.0', '0', '54', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('554', '18', '鸭腿面', '', '', '0.0', '13.0', '13.0', '0', '54', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('555', '18', '辣子鸡面', '', '', '0.0', '13.0', '13.0', '0', '54', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('556', '18', '排骨汤面', '', '', '0.0', '13.0', '13.0', '0', '54', '1', '10', '0');
INSERT INTO `onethink_food` VALUES ('557', '18', '乌鸡汤面', '', '', '0.0', '13.0', '13.0', '0', '54', '1', '11', '0');
INSERT INTO `onethink_food` VALUES ('558', '18', '蛋炒面', '', '', '0.0', '9.0', '9.0', '0', '54', '1', '12', '0');
INSERT INTO `onethink_food` VALUES ('559', '18', '肉丝炒面', '', '', '0.0', '12.0', '12.0', '0', '54', '1', '13', '0');
INSERT INTO `onethink_food` VALUES ('560', '18', '蛋炒米粉', '', '', '0.0', '9.0', '9.0', '0', '54', '1', '14', '0');
INSERT INTO `onethink_food` VALUES ('561', '18', '肉丝炒米粉', '', '', '0.0', '12.0', '12.0', '0', '54', '1', '15', '0');
INSERT INTO `onethink_food` VALUES ('562', '18', '牛肉炒米粉', '', '', '0.0', '16.0', '16.0', '0', '54', '1', '16', '0');
INSERT INTO `onethink_food` VALUES ('563', '18', '柳叶蒸饺', '', '', '0.0', '6.0', '6.0', '0', '54', '1', '17', '0');
INSERT INTO `onethink_food` VALUES ('564', '18', '乌鸡汤馄饨', '', '', '0.0', '14.0', '14.0', '0', '53', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('565', '18', '老鸭汤馄饨', '', '', '0.0', '14.0', '14.0', '0', '53', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('566', '18', '牛肉汤馄饨', '', '', '0.0', '14.0', '14.0', '0', '53', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('567', '18', '排骨汤馄饨', '', '', '0.0', '14.0', '14.0', '0', '53', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('568', '18', '香炸馄饨', '', '', '0.0', '9.0', '9.0', '0', '53', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('569', '18', '状元馄饨(大)', '', '', '0.0', '9.0', '9.0', '0', '53', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('570', '18', '豆干(片)', '', '', '0.0', '1.0', '1.0', '0', '53', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('571', '18', '卤蛋(个)', '', '', '0.0', '2.0', '2.0', '0', '53', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('572', '18', '鸭翅(个)', '', '', '0.0', '3.0', '3.0', '0', '53', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('573', '18', '鸭胗(个)', '', '', '0.0', '4.0', '4.0', '0', '53', '1', '10', '0');
INSERT INTO `onethink_food` VALUES ('574', '18', '鸭头(个)', '', '', '0.0', '5.0', '5.0', '0', '53', '1', '11', '0');
INSERT INTO `onethink_food` VALUES ('575', '18', '鸭腿(个)', '', '', '0.0', '7.0', '7.0', '0', '53', '1', '12', '0');
INSERT INTO `onethink_food` VALUES ('576', '18', '卤肉(份)', '', '', '0.0', '10.0', '10.0', '0', '53', '1', '13', '0');
INSERT INTO `onethink_food` VALUES ('577', '18', '辣子鸡块(份)', '', '', '0.0', '10.0', '10.0', '0', '53', '1', '14', '0');
INSERT INTO `onethink_food` VALUES ('578', '18', '牛肉炒饭', '', '', '0.0', '16.0', '16.0', '0', '56', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('579', '18', '鸭腿炒饭', '', '', '0.0', '15.0', '15.0', '0', '56', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('580', '18', '肉丝炒饭', '', '', '0.0', '12.0', '12.0', '0', '56', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('581', '18', '老鸭汤米饭', '', '', '0.0', '15.0', '15.0', '0', '56', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('582', '18', '牛肉汤米饭', '', '', '0.0', '15.0', '15.0', '0', '56', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('583', '18', '鸽子汤米饭', '', '', '0.0', '19.0', '19.0', '0', '56', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('584', '18', '辣子鸡米饭', '', '', '0.0', '15.0', '15.0', '0', '56', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('585', '18', '排骨汤米饭', '', '', '0.0', '15.0', '15.0', '0', '56', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('586', '18', '乌鸡汤米饭', '', '', '0.0', '15.0', '15.0', '0', '56', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('587', '18', '鸭腿米饭', '', '', '0.0', '15.0', '15.0', '0', '56', '1', '10', '0');
INSERT INTO `onethink_food` VALUES ('588', '18', '鸡腿米饭', '', '', '0.0', '14.0', '14.0', '0', '56', '1', '11', '0');
INSERT INTO `onethink_food` VALUES ('589', '18', '卤肉米饭', '', '', '0.0', '14.0', '14.0', '0', '56', '1', '12', '0');
INSERT INTO `onethink_food` VALUES ('590', '18', '肉丝米饭', '', '', '0.0', '13.0', '13.0', '0', '56', '1', '13', '0');
INSERT INTO `onethink_food` VALUES ('591', '18', '素菜米饭', '', '', '0.0', '9.0', '9.0', '0', '56', '1', '14', '0');
INSERT INTO `onethink_food` VALUES ('592', '18', '蛋炒饭', '', '', '0.0', '9.0', '9.0', '0', '56', '1', '15', '0');
INSERT INTO `onethink_food` VALUES ('593', '18', '虾米紫菜汤', '', '', '0.0', '3.0', '3.0', '0', '55', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('594', '18', '杜仲牛鞭汤', '', '', '0.0', '16.0', '16.0', '0', '55', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('595', '18', '西洋参鸽子汤', '', '', '0.0', '13.0', '13.0', '0', '55', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('596', '18', '当归牛肉汤', '', '', '0.0', '9.0', '9.0', '0', '55', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('597', '18', '茶树菇老鸭汤', '', '', '0.0', '9.0', '9.0', '0', '55', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('598', '18', '花旗参乌鸡汤', '', '', '0.0', '9.0', '9.0', '0', '55', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('599', '18', '天麻猪脑汤', '', '', '0.0', '9.0', '9.0', '0', '55', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('600', '18', '莲子猪肚汤', '', '', '0.0', '9.0', '9.0', '0', '55', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('601', '18', '香菇排骨汤', '', '', '0.0', '9.0', '9.0', '0', '55', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('603', '20', '牛扒饭', '', '', '0.0', '15.0', '15.0', '0', '62', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('604', '20', '鸡扒饭', '', '', '0.0', '10.0', '10.0', '0', '62', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('605', '20', '鸡柳扒饭', '', '', '0.0', '11.0', '11.0', '0', '62', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('606', '20', '鱿鱼扒饭', '', '', '0.0', '13.0', '13.0', '0', '62', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('607', '20', '香草鸡扒饭', '', '', '0.0', '13.0', '13.0', '0', '62', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('608', '20', '无骨鸡扒饭', '', '', '0.0', '17.0', '17.0', '0', '62', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('609', '20', '一品牛扒', '', '', '0.0', '20.0', '20.0', '0', '62', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('610', '20', '飘香鸡扒饭', '', '', '0.0', '12.0', '12.0', '0', '62', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('611', '20', '特色鱿鱼扒饭', '', '', '0.0', '18.0', '18.0', '0', '62', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('612', '20', '顶级肥牛', '', '', '0.0', '25.0', '25.0', '0', '62', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('613', '21', '黄焖鸡米饭(小)', '', '', '0.0', '16.0', '16.0', '0', '63', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('614', '21', '黄焖鸡米饭(大)', '', '', '0.0', '21.0', '21.0', '0', '63', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('615', '21', '米饭(套餐本身自带一份)', '', '', '0.0', '2.0', '2.0', '0', '63', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('616', '21', '金针菇', '', '', '0.0', '3.0', '3.0', '0', '85', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('617', '21', '豆腐皮', '', '', '0.0', '3.0', '3.0', '0', '85', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('618', '21', '土豆片', '', '', '0.0', '3.0', '3.0', '0', '85', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('619', '21', '腐竹', '', '', '0.0', '3.0', '3.0', '0', '63', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('620', '21', '木耳', '', '', '0.0', '3.0', '3.0', '0', '85', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('621', '21', '海带', '', '', '0.0', '3.0', '3.0', '0', '85', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('622', '21', '甜不辣', '', '', '0.0', '3.0', '3.0', '0', '85', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('623', '21', '香菇', '', '', '0.0', '3.0', '3.0', '0', '85', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('624', '21', '白菜', '', '', '0.0', '3.0', '3.0', '0', '85', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('625', '21', '油菜', '', '', '0.0', '3.0', '3.0', '0', '85', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('650', '22', '加香肠', '', '', '0.0', '3.0', '3.0', '0', '65', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('651', '22', '加饭量', '', '', '0.0', '3.0', '3.0', '0', '65', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('652', '22', '小时咖喱', '', '', '0.0', '21.0', '21.0', '0', '65', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('653', '22', '蘑菇咖喱', '', '', '0.0', '25.0', '25.0', '0', '65', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('654', '22', '西兰花菜咖喱', '', '', '0.0', '25.0', '25.0', '0', '65', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('655', '22', '茄子咖喱', '', '', '0.0', '25.0', '25.0', '0', '65', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('656', '22', '香肠咖喱', '', '', '0.0', '25.0', '25.0', '0', '65', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('657', '22', '鱿鱼咖喱', '', '', '0.0', '25.0', '25.0', '0', '65', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('658', '22', '菠菜咖喱', '', '', '0.0', '25.0', '25.0', '0', '65', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('659', '22', '海鲜丸咖喱', '', '', '0.0', '25.0', '25.0', '0', '65', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('660', '22', '肉丸咖喱', '', '', '0.0', '25.0', '25.0', '0', '65', '1', '10', '0');
INSERT INTO `onethink_food` VALUES ('661', '22', '牛肉咖喱', '', '', '0.0', '34.0', '34.0', '0', '65', '1', '11', '0');
INSERT INTO `onethink_food` VALUES ('662', '22', '鸡腿肉咖喱', '', '', '0.0', '26.0', '26.0', '0', '65', '1', '12', '0');
INSERT INTO `onethink_food` VALUES ('663', '22', '鸡翅咖喱', '', '', '0.0', '27.0', '27.0', '0', '65', '1', '13', '0');
INSERT INTO `onethink_food` VALUES ('664', '22', '炸虾咖喱', '', '', '0.0', '29.0', '29.0', '0', '65', '1', '14', '0');
INSERT INTO `onethink_food` VALUES ('665', '22', '鱼排咖喱', '', '', '0.0', '27.0', '27.0', '0', '65', '1', '15', '0');
INSERT INTO `onethink_food` VALUES ('666', '22', '汉堡肉咖喱', '', '', '0.0', '27.0', '27.0', '0', '65', '1', '16', '0');
INSERT INTO `onethink_food` VALUES ('667', '22', '咖喱乌冬面', '', '', '0.0', '23.0', '23.0', '0', '65', '1', '17', '0');
INSERT INTO `onethink_food` VALUES ('668', '22', '咖喱海苔拌饭', '', '', '0.0', '23.0', '23.0', '0', '65', '1', '18', '0');
INSERT INTO `onethink_food` VALUES ('669', '22', '鸭脯肉炒饭', '', '', '0.0', '21.0', '21.0', '0', '65', '0', '19', '0');
INSERT INTO `onethink_food` VALUES ('670', '22', '蛋肠炒饭', '', '', '0.0', '16.0', '16.0', '0', '65', '1', '20', '0');
INSERT INTO `onethink_food` VALUES ('671', '22', '咖喱炒饭', '', '', '0.0', '21.0', '21.0', '0', '65', '1', '21', '0');
INSERT INTO `onethink_food` VALUES ('672', '22', '辣酱炒饭', '', '', '0.0', '19.0', '19.0', '0', '65', '1', '22', '0');
INSERT INTO `onethink_food` VALUES ('673', '22', '蘑菇炒饭', '', '', '0.0', '21.0', '21.0', '0', '65', '1', '23', '0');
INSERT INTO `onethink_food` VALUES ('674', '22', '茄子盖饭', '', '', '0.0', '23.0', '23.0', '0', '65', '1', '24', '0');
INSERT INTO `onethink_food` VALUES ('675', '22', '酱油炒饭', '', '', '0.0', '19.0', '19.0', '0', '65', '0', '25', '0');
INSERT INTO `onethink_food` VALUES ('676', '22', '炸鱿鱼圈', '', '', '0.0', '23.0', '23.0', '0', '65', '0', '26', '0');
INSERT INTO `onethink_food` VALUES ('677', '22', '炸凤尾虾', '', '', '0.0', '23.0', '23.0', '0', '66', '1', '27', '0');
INSERT INTO `onethink_food` VALUES ('678', '22', '炸蟹钳', '', '', '0.0', '23.0', '23.0', '0', '66', '1', '28', '0');
INSERT INTO `onethink_food` VALUES ('679', '22', '炸鳕鱼排', '', '', '0.0', '23.0', '23.0', '0', '66', '1', '29', '0');
INSERT INTO `onethink_food` VALUES ('680', '22', '鸡米花', '', '', '0.0', '22.0', '22.0', '0', '66', '1', '30', '0');
INSERT INTO `onethink_food` VALUES ('681', '22', '炸鸡块', '', '', '0.0', '22.0', '22.0', '0', '66', '1', '31', '0');
INSERT INTO `onethink_food` VALUES ('682', '22', '炸薯条', '', '', '0.0', '19.0', '19.0', '0', '66', '1', '32', '0');
INSERT INTO `onethink_food` VALUES ('683', '22', '爆米花', '', '', '0.0', '12.0', '12.0', '0', '66', '1', '33', '0');
INSERT INTO `onethink_food` VALUES ('684', '22', '蔬菜沙拉', '', '', '0.0', '23.0', '23.0', '0', '66', '1', '34', '0');
INSERT INTO `onethink_food` VALUES ('685', '22', '水果沙拉', '', '', '0.0', '25.0', '25.0', '0', '66', '1', '35', '0');
INSERT INTO `onethink_food` VALUES ('713', '23', '肉丸砂锅（特价菜）', '', '', '0.0', '5.0', '5.0', '0', '68', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('714', '23', '麻婆豆腐砂锅(小)', '', '', '0.0', '7.0', '7.0', '0', '68', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('715', '23', '麻婆豆腐砂锅(大)', '', '', '0.0', '9.0', '9.0', '0', '68', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('716', '23', '排骨砂锅', '', '', '0.0', '18.0', '18.0', '0', '68', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('717', '23', '比管炖豆腐砂锅(小)', '', '', '0.0', '19.0', '19.0', '0', '68', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('718', '23', '比管炖豆腐砂锅(大)', '', '', '0.0', '28.0', '28.0', '0', '68', '0', '5', '0');
INSERT INTO `onethink_food` VALUES ('719', '23', '黄焖鸡砂锅(小)', '', '', '0.0', '19.0', '19.0', '0', '68', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('720', '23', '黄焖鸡砂锅(大)', '', '', '0.0', '28.0', '28.0', '0', '68', '0', '7', '0');
INSERT INTO `onethink_food` VALUES ('722', '23', '肋排砂锅', '', '', '0.0', '23.0', '23.0', '0', '68', '0', '8', '0');
INSERT INTO `onethink_food` VALUES ('723', '23', '鲶鱼砂锅(小)', '', '', '0.0', '19.0', '19.0', '0', '68', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('724', '23', '鲶鱼砂锅(大)', '', '', '0.0', '30.0', '30.0', '0', '68', '0', '10', '0');
INSERT INTO `onethink_food` VALUES ('725', '23', '酸菜鱼(小)', '', '', '0.0', '19.0', '19.0', '0', '68', '1', '11', '0');
INSERT INTO `onethink_food` VALUES ('726', '23', '酸菜鱼(大)', '', '', '0.0', '30.0', '30.0', '0', '68', '0', '12', '0');
INSERT INTO `onethink_food` VALUES ('727', '23', '烧肉香菇(小)', '', '', '0.0', '19.0', '19.0', '0', '68', '1', '13', '0');
INSERT INTO `onethink_food` VALUES ('728', '23', '烧肉香菇(大)', '', '', '0.0', '28.0', '28.0', '0', '68', '0', '14', '0');
INSERT INTO `onethink_food` VALUES ('729', '23', '小炒肉(大)', '', '', '0.0', '29.0', '29.0', '0', '67', '1', '15', '0');
INSERT INTO `onethink_food` VALUES ('730', '23', '酸汤肥牛(小)', '', '', '0.0', '23.0', '23.0', '0', '68', '1', '16', '0');
INSERT INTO `onethink_food` VALUES ('731', '23', '酸汤肥牛(大)', '', '', '0.0', '34.0', '34.0', '0', '68', '0', '17', '0');
INSERT INTO `onethink_food` VALUES ('732', '23', '剁椒鱼头(半份)', '', '', '0.0', '29.0', '29.0', '0', '68', '0', '18', '0');
INSERT INTO `onethink_food` VALUES ('733', '23', '干锅蛤蜊', '', '', '0.0', '23.0', '23.0', '0', '67', '0', '19', '0');
INSERT INTO `onethink_food` VALUES ('734', '23', '鸡蛋挑石头', '', '', '0.0', '11.0', '11.0', '0', '68', '0', '20', '0');
INSERT INTO `onethink_food` VALUES ('735', '23', '糖醋里脊', '', '', '0.0', '22.0', '22.0', '0', '68', '1', '21', '0');
INSERT INTO `onethink_food` VALUES ('736', '23', '毛血旺', '', '', '0.0', '34.0', '34.0', '0', '67', '0', '22', '0');
INSERT INTO `onethink_food` VALUES ('737', '23', '辣炒大肠', '', '', '0.0', '31.0', '31.0', '0', '68', '1', '23', '0');
INSERT INTO `onethink_food` VALUES ('738', '23', '肉末茄子', '', '', '0.0', '25.0', '25.0', '0', '68', '1', '24', '0');
INSERT INTO `onethink_food` VALUES ('739', '23', '干锅土豆片', '', '', '0.0', '17.0', '17.0', '0', '68', '1', '25', '0');
INSERT INTO `onethink_food` VALUES ('740', '23', '虾仁酸萝卜粉', '', '', '0.0', '23.0', '23.0', '0', '68', '0', '26', '0');
INSERT INTO `onethink_food` VALUES ('741', '23', '9秒土豆丝', '', '', '0.0', '9.0', '9.0', '0', '68', '1', '27', '0');
INSERT INTO `onethink_food` VALUES ('742', '23', '双椒粉条', '', '', '0.0', '15.0', '15.0', '0', '68', '1', '28', '0');
INSERT INTO `onethink_food` VALUES ('743', '23', '干锅鱿鱼', '', '', '0.0', '27.0', '27.0', '0', '68', '1', '29', '0');
INSERT INTO `onethink_food` VALUES ('744', '23', '干锅鱼排', '', '', '0.0', '20.0', '20.0', '0', '68', '0', '30', '0');
INSERT INTO `onethink_food` VALUES ('745', '23', '炝锅豆芽', '', '', '0.0', '13.0', '13.0', '0', '68', '0', '31', '0');
INSERT INTO `onethink_food` VALUES ('746', '23', '砂锅猪手', '', '', '0.0', '33.0', '33.0', '0', '67', '1', '32', '0');
INSERT INTO `onethink_food` VALUES ('747', '23', '肉末木耳', '', '', '0.0', '19.0', '19.0', '0', '68', '1', '33', '0');
INSERT INTO `onethink_food` VALUES ('748', '23', '干锅有机菜花', '', '', '0.0', '19.0', '19.0', '0', '68', '1', '34', '0');
INSERT INTO `onethink_food` VALUES ('749', '23', '宫保鸡丁', '', '', '0.0', '22.0', '22.0', '0', '68', '1', '35', '0');
INSERT INTO `onethink_food` VALUES ('750', '23', '干锅鸡心', '', '', '0.0', '20.0', '20.0', '0', '68', '0', '36', '0');
INSERT INTO `onethink_food` VALUES ('751', '23', '农家豆渣', '', '', '0.0', '20.0', '20.0', '0', '68', '0', '37', '0');
INSERT INTO `onethink_food` VALUES ('752', '23', '砂锅菌菇', '', '', '0.0', '23.0', '23.0', '0', '68', '0', '38', '0');
INSERT INTO `onethink_food` VALUES ('753', '23', '竹香鸡柳', '', '', '0.0', '20.0', '20.0', '0', '68', '0', '39', '0');
INSERT INTO `onethink_food` VALUES ('754', '23', '米饭', '', '', '0.0', '1.0', '1.0', '0', '67', '1', '40', '0');
INSERT INTO `onethink_food` VALUES ('755', '23', '蛋炒饭', '', '', '0.0', '13.0', '13.0', '0', '67', '1', '41', '0');
INSERT INTO `onethink_food` VALUES ('756', '23', '炼乳小馒头', '', '', '0.0', '16.0', '16.0', '0', '67', '0', '42', '0');
INSERT INTO `onethink_food` VALUES ('757', '23', '冬瓜汤/紫菜汤/蛋汤(小)', '', '', '0.0', '4.0', '4.0', '0', '67', '1', '43', '0');
INSERT INTO `onethink_food` VALUES ('758', '23', '酸辣汤(大)', '', '', '0.0', '14.0', '14.0', '0', '67', '1', '44', '0');
INSERT INTO `onethink_food` VALUES ('759', '23', '老醋花生', '', '', '0.0', '13.0', '13.0', '0', '69', '1', '45', '0');
INSERT INTO `onethink_food` VALUES ('760', '23', '蕨根粉', '', '', '0.0', '13.0', '13.0', '0', '69', '0', '46', '0');
INSERT INTO `onethink_food` VALUES ('761', '23', '夫妻肺片', '', '', '0.0', '19.0', '19.0', '0', '69', '1', '47', '0');
INSERT INTO `onethink_food` VALUES ('762', '23', '拌苦菊', '', '', '0.0', '10.0', '10.0', '0', '69', '0', '48', '0');
INSERT INTO `onethink_food` VALUES ('763', '23', '捞汁木耳', '', '', '0.0', '11.0', '11.0', '0', '69', '1', '49', '0');
INSERT INTO `onethink_food` VALUES ('764', '23', '麻辣蟹钳', '', '', '0.0', '18.0', '18.0', '0', '69', '0', '50', '0');
INSERT INTO `onethink_food` VALUES ('765', '23', '拌心里美', '', '', '0.0', '6.0', '6.0', '0', '69', '0', '51', '0');
INSERT INTO `onethink_food` VALUES ('766', '23', '蒜泥黄瓜', '', '', '0.0', '9.0', '9.0', '0', '69', '1', '52', '0');
INSERT INTO `onethink_food` VALUES ('767', '23', '自制凉粉', '', '', '0.0', '13.0', '13.0', '0', '69', '0', '53', '0');
INSERT INTO `onethink_food` VALUES ('768', '23', '拌拉皮', '', '', '0.0', '15.0', '15.0', '0', '69', '1', '54', '0');
INSERT INTO `onethink_food` VALUES ('769', '23', '白菜心拌蜇皮', '', '', '0.0', '10.0', '10.0', '0', '69', '0', '55', '0');
INSERT INTO `onethink_food` VALUES ('770', '23', '虾皮拌尖椒', '', '', '0.0', '3.0', '3.0', '0', '69', '0', '56', '0');
INSERT INTO `onethink_food` VALUES ('771', '23', '西芹花生', '', '', '0.0', '5.0', '5.0', '0', '69', '1', '57', '0');
INSERT INTO `onethink_food` VALUES ('789', '24', '至尊招牌牛肉面(小)', '', '', '0.0', '28.0', '23.8', '0', '71', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('790', '24', '极品羊肉面(小)', '', '', '0.0', '22.0', '18.7', '0', '71', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('791', '24', '私房牛三宝面(小)', '', '', '0.0', '22.0', '18.7', '0', '71', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('792', '24', '红烧牛肉面+肉夹馍+小凉菜', '', '', '0.0', '16.0', '13.6', '0', '72', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('793', '24', '香辣牛肉面+肉夹馍+小凉菜', '', '', '0.0', '18.0', '15.3', '0', '72', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('794', '24', '酸辣粉+肉夹馍+小凉菜', '', '', '0.0', '16.0', '13.6', '0', '72', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('795', '24', '香辣鸡肉米线+肉夹馍+小凉菜', '', '', '0.0', '16.0', '13.6', '0', '72', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('796', '24', '全羊汤+烧饼+小凉菜', '', '', '0.0', '18.0', '15.3', '0', '72', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('797', '24', '红烧半筋半肉面(小)', '', '', '0.0', '18.0', '15.3', '0', '73', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('798', '24', '红烧排骨面(小)', '', '', '0.0', '15.0', '12.8', '0', '73', '1', '10', '0');
INSERT INTO `onethink_food` VALUES ('799', '24', '麻辣牛肉面(小)', '', '', '0.0', '12.0', '10.2', '0', '73', '1', '11', '0');
INSERT INTO `onethink_food` VALUES ('800', '24', '香辣牛肉面(小)', '', '', '0.0', '12.0', '10.2', '0', '73', '1', '12', '0');
INSERT INTO `onethink_food` VALUES ('801', '24', '养生牛肉面(小)', '', '', '0.0', '12.0', '10.2', '0', '73', '1', '13', '0');
INSERT INTO `onethink_food` VALUES ('802', '24', '开胃番茄牛肉面(小)', '', '', '0.0', '12.0', '10.2', '0', '73', '1', '14', '0');
INSERT INTO `onethink_food` VALUES ('803', '24', '私房红烧牛肉面(小)', '', '', '0.0', '10.0', '8.5', '0', '73', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('804', '24', '榨菜肉丁面(小)', '', '', '0.0', '10.0', '8.5', '0', '73', '1', '15', '0');
INSERT INTO `onethink_food` VALUES ('805', '24', '香菇鸡肉面(小)', '', '', '0.0', '8.0', '6.8', '0', '73', '1', '16', '0');
INSERT INTO `onethink_food` VALUES ('806', '24', '西红柿鸡蛋面(小)', '', '', '0.0', '8.0', '6.8', '0', '73', '1', '17', '0');
INSERT INTO `onethink_food` VALUES ('807', '24', '冷面', '', '', '0.0', '15.0', '12.8', '0', '73', '1', '18', '0');
INSERT INTO `onethink_food` VALUES ('808', '24', '私房牛肉拌面', '', '', '0.0', '18.0', '15.3', '0', '73', '1', '19', '0');
INSERT INTO `onethink_food` VALUES ('809', '24', '番茄鸡蛋拌面', '', '', '0.0', '10.0', '8.5', '0', '73', '1', '20', '0');
INSERT INTO `onethink_food` VALUES ('810', '24', '炸酱面', '', '', '0.0', '10.0', '8.5', '0', '73', '1', '21', '0');
INSERT INTO `onethink_food` VALUES ('811', '24', '西红柿蛋花汤', '', '', '0.0', '12.0', '10.2', '0', '74', '1', '22', '0');
INSERT INTO `onethink_food` VALUES ('812', '24', '紫菜蛋花汤', '', '', '0.0', '12.0', '10.2', '0', '74', '1', '23', '0');
INSERT INTO `onethink_food` VALUES ('813', '24', '蛤蜊豆腐汤', '', '', '0.0', '14.0', '11.9', '0', '74', '1', '24', '0');
INSERT INTO `onethink_food` VALUES ('814', '24', '蛋花玉米羹', '', '', '0.0', '14.0', '11.9', '0', '74', '1', '25', '0');
INSERT INTO `onethink_food` VALUES ('815', '24', '羊肉汤', '', '', '0.0', '20.0', '17.0', '0', '74', '1', '26', '0');
INSERT INTO `onethink_food` VALUES ('816', '24', '全羊汤', '', '', '0.0', '20.0', '17.0', '0', '74', '1', '27', '0');
INSERT INTO `onethink_food` VALUES ('817', '24', '羊杂汤', '', '', '0.0', '16.0', '13.6', '0', '74', '1', '28', '0');
INSERT INTO `onethink_food` VALUES ('818', '24', '烧饼', '', '', '0.0', '1.5', '1.3', '0', '74', '1', '29', '0');
INSERT INTO `onethink_food` VALUES ('819', '24', '砂锅全羊汤', '', '', '0.0', '38.0', '32.3', '0', '74', '1', '30', '0');
INSERT INTO `onethink_food` VALUES ('820', '24', '米饭', '', '', '0.0', '1.0', '0.9', '0', '75', '1', '31', '0');
INSERT INTO `onethink_food` VALUES ('821', '24', '肉夹馍(肥瘦)', '', '', '0.0', '5.0', '4.3', '0', '75', '1', '32', '0');
INSERT INTO `onethink_food` VALUES ('822', '24', '肉夹馍(精瘦)', '', '', '0.0', '7.0', '6.0', '0', '75', '1', '33', '0');
INSERT INTO `onethink_food` VALUES ('823', '24', '炸冰激凌', '', '', '0.0', '18.0', '15.3', '0', '75', '1', '34', '0');
INSERT INTO `onethink_food` VALUES ('824', '24', '拔丝地瓜', '', '', '0.0', '16.0', '13.6', '0', '75', '1', '35', '0');
INSERT INTO `onethink_food` VALUES ('825', '24', '香芋地瓜丸', '', '', '0.0', '16.0', '13.6', '0', '75', '1', '36', '0');
INSERT INTO `onethink_food` VALUES ('826', '24', '松子玉米', '', '', '0.0', '16.0', '13.6', '0', '75', '1', '37', '0');
INSERT INTO `onethink_food` VALUES ('827', '24', '酸辣土豆丝', '', '', '0.0', '8.0', '6.8', '0', '77', '1', '38', '0');
INSERT INTO `onethink_food` VALUES ('828', '24', '酸辣白菜', '', '', '0.0', '10.0', '8.5', '0', '77', '1', '39', '0');
INSERT INTO `onethink_food` VALUES ('829', '24', '蒜蓉油菜', '', '', '0.0', '10.0', '8.5', '0', '77', '1', '40', '0');
INSERT INTO `onethink_food` VALUES ('830', '24', '香菇油菜', '', '', '0.0', '12.0', '10.2', '0', '77', '1', '41', '0');
INSERT INTO `onethink_food` VALUES ('831', '24', '葱爆木耳', '', '', '0.0', '14.0', '11.9', '0', '77', '1', '42', '0');
INSERT INTO `onethink_food` VALUES ('832', '24', '红烧茄子', '', '', '0.0', '18.0', '15.3', '0', '77', '1', '43', '0');
INSERT INTO `onethink_food` VALUES ('833', '24', '鱼香茄子', '', '', '0.0', '18.0', '15.3', '0', '77', '1', '44', '0');
INSERT INTO `onethink_food` VALUES ('834', '24', '风味茄子', '', '', '0.0', '18.0', '15.3', '0', '77', '1', '45', '0');
INSERT INTO `onethink_food` VALUES ('835', '24', '地三鲜', '', '', '0.0', '18.0', '15.3', '0', '77', '1', '38', '0');
INSERT INTO `onethink_food` VALUES ('836', '24', '家常豆腐', '', '', '0.0', '16.0', '13.6', '0', '77', '1', '47', '0');
INSERT INTO `onethink_food` VALUES ('837', '24', '麻辣豆腐', '', '', '0.0', '12.0', '10.2', '0', '77', '1', '48', '0');
INSERT INTO `onethink_food` VALUES ('838', '24', '干煸芸豆', '', '', '0.0', '18.0', '15.3', '0', '77', '1', '49', '0');
INSERT INTO `onethink_food` VALUES ('839', '24', '干煸大头菜', '', '', '0.0', '12.0', '10.2', '0', '77', '1', '50', '0');
INSERT INTO `onethink_food` VALUES ('840', '24', '干煸土豆片', '', '', '0.0', '18.0', '15.3', '0', '77', '1', '51', '0');
INSERT INTO `onethink_food` VALUES ('841', '24', '秘籍铁板茄子', '', '', '0.0', '22.0', '18.7', '0', '77', '1', '52', '0');
INSERT INTO `onethink_food` VALUES ('842', '24', '压锅豆腐', '', '', '0.0', '18.0', '15.3', '0', '77', '1', '53', '0');
INSERT INTO `onethink_food` VALUES ('843', '24', '素扒三鲜', '', '', '0.0', '16.0', '13.6', '0', '77', '1', '54', '0');
INSERT INTO `onethink_food` VALUES ('844', '24', '豆芽炒粉', '', '', '0.0', '16.0', '13.6', '0', '77', '1', '55', '0');
INSERT INTO `onethink_food` VALUES ('845', '24', '芹菜肉丝', '', '', '0.0', '16.0', '13.6', '0', '76', '1', '56', '0');
INSERT INTO `onethink_food` VALUES ('846', '24', '木耳炒肉', '', '', '0.0', '16.0', '13.6', '0', '76', '1', '57', '0');
INSERT INTO `onethink_food` VALUES ('847', '24', '青椒肉丝', '', '', '0.0', '16.0', '13.6', '0', '76', '1', '58', '0');
INSERT INTO `onethink_food` VALUES ('848', '24', '回锅肉', '', '', '0.0', '22.0', '18.7', '0', '76', '1', '59', '0');
INSERT INTO `onethink_food` VALUES ('849', '24', '鱼香肉丝', '', '', '0.0', '26.0', '22.1', '0', '76', '1', '60', '0');
INSERT INTO `onethink_food` VALUES ('850', '24', '香辣肉丝', '', '', '0.0', '28.0', '23.8', '0', '76', '1', '61', '0');
INSERT INTO `onethink_food` VALUES ('851', '24', '干炸里脊', '', '', '0.0', '28.0', '23.8', '0', '76', '1', '62', '0');
INSERT INTO `onethink_food` VALUES ('852', '24', '糖醋里脊', '', '', '0.0', '30.0', '25.5', '0', '76', '1', '63', '0');
INSERT INTO `onethink_food` VALUES ('853', '24', '水煮肉片', '', '', '0.0', '28.0', '23.8', '0', '76', '1', '64', '0');
INSERT INTO `onethink_food` VALUES ('854', '24', '锅包肉', '', '', '0.0', '30.0', '25.5', '0', '76', '1', '65', '0');
INSERT INTO `onethink_food` VALUES ('855', '24', '酸菜炒肥肠', '', '', '0.0', '32.0', '27.2', '0', '76', '1', '66', '0');
INSERT INTO `onethink_food` VALUES ('856', '24', '溜肥肠', '', '', '0.0', '32.0', '27.2', '0', '76', '1', '62', '0');
INSERT INTO `onethink_food` VALUES ('857', '24', '蒜子烧肥肠', '', '', '0.0', '36.0', '30.6', '0', '76', '1', '67', '0');
INSERT INTO `onethink_food` VALUES ('858', '24', '蒜子烧肥肠', '', '', '0.0', '36.0', '30.6', '0', '76', '1', '68', '0');
INSERT INTO `onethink_food` VALUES ('859', '24', '风味千刀肉', '', '', '0.0', '18.0', '15.3', '0', '76', '1', '69', '0');
INSERT INTO `onethink_food` VALUES ('860', '24', '刀鱼炖排骨', '', '', '0.0', '38.0', '32.3', '0', '76', '1', '70', '0');
INSERT INTO `onethink_food` VALUES ('861', '24', '农家小炒', '', '', '0.0', '18.0', '15.3', '0', '76', '1', '71', '0');
INSERT INTO `onethink_food` VALUES ('862', '24', '京酱肉丝', '', '', '0.0', '22.0', '18.7', '0', '76', '1', '72', '0');
INSERT INTO `onethink_food` VALUES ('863', '24', '铁锅蛤蜊鸡', '', '', '0.0', '36.0', '30.6', '0', '76', '1', '73', '0');
INSERT INTO `onethink_food` VALUES ('864', '24', '小鸡炖榛蘑', '', '', '0.0', '42.0', '35.7', '0', '76', '1', '74', '0');
INSERT INTO `onethink_food` VALUES ('865', '24', '干煸辣子鸡', '', '', '0.0', '38.0', '32.3', '0', '76', '1', '75', '0');
INSERT INTO `onethink_food` VALUES ('866', '24', '干锅鸭头', '', '', '0.0', '38.0', '32.3', '0', '76', '1', '76', '0');
INSERT INTO `onethink_food` VALUES ('867', '24', '鸡胗爆瓜钱', '', '', '0.0', '22.0', '18.7', '0', '76', '1', '77', '0');
INSERT INTO `onethink_food` VALUES ('868', '24', '新疆大盘鸡', '', '', '0.0', '38.0', '32.3', '0', '76', '1', '78', '0');
INSERT INTO `onethink_food` VALUES ('869', '24', '韭菜鱿鱼', '', '', '0.0', '22.0', '18.7', '0', '76', '1', '79', '0');
INSERT INTO `onethink_food` VALUES ('870', '24', '韭菜炒比管', '', '', '0.0', '22.0', '18.7', '0', '76', '1', '80', '0');
INSERT INTO `onethink_food` VALUES ('871', '24', '原味蛤蜊', '', '', '0.0', '16.0', '13.6', '0', '76', '1', '81', '0');
INSERT INTO `onethink_food` VALUES ('872', '24', '原味蛤蜊', '', '', '0.0', '16.0', '13.6', '0', '76', '1', '82', '0');
INSERT INTO `onethink_food` VALUES ('873', '24', '辣炒蛤蜊', '', '', '0.0', '16.0', '13.6', '0', '76', '1', '83', '0');
INSERT INTO `onethink_food` VALUES ('874', '24', '茄汁大虾', '', '', '0.0', '38.0', '32.3', '0', '76', '1', '84', '0');
INSERT INTO `onethink_food` VALUES ('875', '24', '干炸小黄花', '', '', '0.0', '26.0', '22.1', '0', '76', '1', '85', '0');
INSERT INTO `onethink_food` VALUES ('876', '24', '干炸刀鱼', '', '', '0.0', '26.0', '22.1', '0', '76', '1', '86', '0');
INSERT INTO `onethink_food` VALUES ('877', '24', '比管烩千叶豆腐', '', '', '0.0', '28.0', '23.8', '0', '76', '1', '87', '0');
INSERT INTO `onethink_food` VALUES ('878', '24', '农家风味鱼', '', '', '0.0', '36.0', '30.6', '0', '76', '1', '88', '0');
INSERT INTO `onethink_food` VALUES ('879', '24', '酱烧鲤鱼', '', '', '0.0', '36.0', '30.6', '0', '76', '1', '89', '0');
INSERT INTO `onethink_food` VALUES ('880', '24', '压锅鲤鱼', '', '', '0.0', '36.0', '30.6', '0', '76', '1', '90', '0');
INSERT INTO `onethink_food` VALUES ('881', '24', '香辣鱼', '', '', '0.0', '38.0', '32.3', '0', '76', '1', '91', '0');
INSERT INTO `onethink_food` VALUES ('882', '24', '川味烤鱼', '', '', '0.0', '42.0', '35.7', '0', '76', '1', '92', '0');
INSERT INTO `onethink_food` VALUES ('883', '24', '盆盆虾', '', '', '0.0', '42.0', '35.7', '0', '76', '1', '93', '0');
INSERT INTO `onethink_food` VALUES ('884', '24', '盆盆虾', '', '', '0.0', '42.0', '35.7', '0', '76', '1', '94', '0');
INSERT INTO `onethink_food` VALUES ('885', '24', '西红柿炒蛋', '', '', '0.0', '14.0', '11.9', '0', '76', '1', '95', '0');
INSERT INTO `onethink_food` VALUES ('886', '24', '韭菜炒蛋', '', '', '0.0', '14.0', '11.9', '0', '76', '1', '96', '0');
INSERT INTO `onethink_food` VALUES ('887', '24', '青椒炒蛋', '', '', '0.0', '14.0', '11.9', '0', '76', '1', '97', '0');
INSERT INTO `onethink_food` VALUES ('888', '24', '金针菇炒蛋', '', '', '0.0', '18.0', '15.3', '0', '76', '1', '98', '0');
INSERT INTO `onethink_food` VALUES ('889', '24', '海鲜炒蛋', '', '', '0.0', '28.0', '23.8', '0', '76', '1', '99', '0');
INSERT INTO `onethink_food` VALUES ('890', '24', '韭菜炒羊肉', '', '', '0.0', '12.0', '10.2', '0', '76', '1', '100', '0');
INSERT INTO `onethink_food` VALUES ('891', '24', '辣炒羊血', '', '', '0.0', '12.0', '10.2', '0', '76', '1', '101', '0');
INSERT INTO `onethink_food` VALUES ('892', '24', '葱爆羊肉', '', '', '0.0', '38.0', '32.3', '0', '76', '1', '102', '0');
INSERT INTO `onethink_food` VALUES ('893', '24', '青椒牛肚', '', '', '0.0', '32.0', '27.2', '0', '76', '1', '103', '0');
INSERT INTO `onethink_food` VALUES ('894', '24', '西红柿牛腩', '', '', '0.0', '42.0', '35.7', '0', '76', '1', '104', '0');
INSERT INTO `onethink_food` VALUES ('895', '24', '川王牛肚', '', '', '0.0', '32.0', '27.2', '0', '76', '1', '105', '0');
INSERT INTO `onethink_food` VALUES ('896', '24', '葱油百叶', '', '', '0.0', '32.0', '27.2', '0', '76', '1', '106', '0');
INSERT INTO `onethink_food` VALUES ('897', '24', '沸腾羊排', '', '', '0.0', '48.0', '40.8', '0', '76', '1', '107', '0');
INSERT INTO `onethink_food` VALUES ('898', '24', '呛土豆丝', '', '', '0.0', '8.0', '6.8', '0', '78', '1', '108', '0');
INSERT INTO `onethink_food` VALUES ('899', '24', '拌黄瓜', '', '', '0.0', '8.0', '6.8', '0', '78', '1', '109', '0');
INSERT INTO `onethink_food` VALUES ('900', '24', '家常凉菜', '', '', '0.0', '12.0', '10.2', '0', '78', '1', '110', '0');
INSERT INTO `onethink_food` VALUES ('901', '24', '大拉皮', '', '', '0.0', '10.0', '8.5', '0', '78', '1', '111', '0');
INSERT INTO `onethink_food` VALUES ('902', '24', '老醋花生', '', '', '0.0', '16.0', '13.6', '0', '78', '1', '112', '0');
INSERT INTO `onethink_food` VALUES ('903', '24', '芥末金针菇', '', '', '0.0', '14.0', '11.9', '0', '78', '1', '113', '0');
INSERT INTO `onethink_food` VALUES ('904', '24', '蜇皮黄瓜', '', '', '0.0', '12.0', '10.2', '0', '78', '1', '114', '0');
INSERT INTO `onethink_food` VALUES ('905', '24', '拌羊脸', '', '', '0.0', '28.0', '23.8', '0', '78', '1', '115', '0');
INSERT INTO `onethink_food` VALUES ('906', '24', '拌羊杂', '', '', '0.0', '28.0', '23.8', '0', '78', '1', '116', '0');
INSERT INTO `onethink_food` VALUES ('907', '24', '拌牛肉', '', '', '0.0', '32.0', '27.2', '0', '78', '1', '117', '0');
INSERT INTO `onethink_food` VALUES ('908', '24', '拌牛肚', '', '', '0.0', '28.0', '23.8', '0', '78', '1', '118', '0');
INSERT INTO `onethink_food` VALUES ('909', '24', '拌牛筋', '', '', '0.0', '28.0', '23.8', '0', '78', '1', '119', '0');
INSERT INTO `onethink_food` VALUES ('910', '24', '捞汁青瓜百叶', '', '', '0.0', '32.0', '27.2', '0', '78', '1', '120', '0');
INSERT INTO `onethink_food` VALUES ('911', '24', '水晶百叶', '', '', '0.0', '28.0', '23.8', '0', '78', '1', '121', '0');
INSERT INTO `onethink_food` VALUES ('912', '24', '拌猪耳', '', '', '0.0', '18.0', '15.3', '0', '78', '1', '122', '0');
INSERT INTO `onethink_food` VALUES ('913', '24', '爽口鱼片', '', '', '0.0', '14.0', '11.9', '0', '78', '1', '123', '0');
INSERT INTO `onethink_food` VALUES ('914', '24', '老虎菜', '', '', '0.0', '12.0', '10.2', '0', '78', '1', '124', '0');
INSERT INTO `onethink_food` VALUES ('915', '24', '夫妻肺片', '', '', '0.0', '32.0', '27.2', '0', '78', '1', '125', '0');
INSERT INTO `onethink_food` VALUES ('916', '25', '欢乐双人(2个鸡腿堡+2对香辣鸡翅+2串华香脆骨串+2中可)', '', '', '0.0', '29.0', '29.0', '0', '79', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('917', '25', '欢乐双人(2个鸡腿堡+鸡肉卷+蜜汁手扒鸡+大薯+3杯小可)', '', '', '0.0', '42.0', '42.0', '0', '79', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('918', '25', '香辣鸡腿堡+薯条(大)+可乐(中)', '', '', '0.0', '16.0', '16.0', '0', '79', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('919', '25', '秘制烤鸡腿堡+薯条(大)+可乐(中)', '', '', '0.0', '16.5', '16.5', '0', '79', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('920', '25', '香辣鸡肉卷+薯条(大)+可乐(中)', '', '', '0.0', '16.0', '16.0', '0', '79', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('921', '25', '劲脆鲜虾堡+薯条(大)+可乐(中)', '', '', '0.0', '17.0', '17.0', '0', '79', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('922', '25', '蜜汁手扒鸡+薯条(大)+可乐(中)', '', '', '0.0', '24.0', '24.0', '0', '79', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('923', '25', '2个香脆鸡腿+薯条(大)+可乐(中)', '', '', '0.0', '19.0', '19.0', '0', '79', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('924', '25', '2对香辣鸡翅+薯条(大)+可乐(中)', '', '', '0.0', '19.0', '19.0', '0', '79', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('925', '25', '牛肉堡', '', '', '0.0', '6.0', '6.0', '0', '80', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('926', '25', '鳕鱼堡', '', '', '0.0', '8.0', '8.0', '0', '80', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('927', '25', '香辣鸡腿堡', '', '', '0.0', '8.0', '8.0', '0', '80', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('928', '25', '香鸡堡', '', '', '0.0', '8.0', '8.0', '0', '80', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('929', '25', '秘制烤鸡腿堡', '', '', '0.0', '8.5', '8.5', '0', '80', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('930', '25', '脆皮全鸡', '', '', '0.0', '18.0', '18.0', '0', '80', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('931', '25', '劲脆鲜虾堡', '', '', '0.0', '9.0', '9.0', '0', '80', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('932', '25', '鸡肉卷', '', '', '0.0', '8.0', '8.0', '0', '81', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('933', '25', '飞碟牛肉酥', '', '', '0.0', '6.0', '6.0', '0', '81', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('934', '25', '华香脆骨串', '', '', '0.0', '4.0', '4.0', '0', '81', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('935', '25', '香辣鸡翅', '', '', '0.0', '6.5', '6.5', '0', '81', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('936', '25', '秘制烤翅', '', '', '0.0', '7.0', '7.0', '0', '81', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('937', '25', '香酥鸡腿', '', '', '0.0', '6.5', '6.5', '0', '81', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('938', '25', '黑椒鸡块', '', '', '0.0', '6.0', '6.0', '0', '81', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('939', '25', '无骨鸡柳', '', '', '0.0', '6.0', '6.0', '0', '81', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('940', '25', '鸡米花', '', '', '0.0', '6.5', '6.5', '0', '81', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('941', '25', '薯条(大)', '', '', '0.0', '6.5', '6.5', '0', '81', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('942', '25', '薯条(小)', '', '', '0.0', '5.0', '5.0', '0', '81', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('943', '25', '玉米杯', '', '', '0.0', '5.0', '5.0', '0', '81', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('944', '25', '孜然扒翅', '', '', '0.0', '7.0', '7.0', '0', '81', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('945', '25', '香酥鸡排', '', '', '0.0', '7.0', '7.0', '0', '81', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('946', '25', '热果珍', '', '', '0.0', '4.5', '4.5', '0', '82', '1', '12', '0');
INSERT INTO `onethink_food` VALUES ('947', '25', '热牛奶', '', '', '0.0', '4.5', '4.5', '0', '82', '1', '11', '0');
INSERT INTO `onethink_food` VALUES ('948', '25', '热红茶', '', '', '0.0', '3.5', '3.5', '0', '82', '1', '10', '0');
INSERT INTO `onethink_food` VALUES ('949', '25', '热奶茶', '', '', '0.0', '5.5', '5.5', '0', '82', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('950', '25', '热咖啡', '', '', '0.0', '4.5', '4.5', '0', '82', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('951', '25', '蔬菜蛋花汤', '', '', '0.0', '4.5', '4.5', '0', '82', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('952', '25', '可乐(大)', '', '', '0.0', '6.5', '6.5', '0', '82', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('953', '25', '可乐(中)', '', '', '0.0', '5.5', '5.5', '0', '82', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('954', '25', '雪碧(大)', '', '', '0.0', '6.5', '6.5', '0', '82', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('955', '25', '雪碧(中)', '', '', '0.0', '5.5', '5.5', '0', '82', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('956', '25', '芬达(大)', '', '', '0.0', '6.5', '6.5', '0', '82', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('957', '25', '芬达(中)', '', '', '0.0', '5.5', '5.5', '0', '82', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('971', '25', '蜜汁手扒鸡', '', '', '0.0', '18.0', '18.0', '0', '81', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('990', '26', '全家福套餐(樱花之恋等9中口味共15片)', '', '', '0.0', '28.0', '28.0', '0', '88', '0', '1', '0');
INSERT INTO `onethink_food` VALUES ('991', '26', '寿司套餐(樱花之恋等7种口味共12片)', '', '', '0.0', '22.0', '22.0', '0', '88', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('992', '26', '双拼A套餐(5片培根卷+5片海苔卷)', '', '', '0.0', '15.0', '15.0', '0', '88', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('993', '26', '双拼B套餐(5片金针菇卷+5片牛肉卷)', '', '', '0.0', '15.0', '15.0', '0', '88', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('994', '26', '双拼C套餐(5片樱花之恋卷+5片烤鸭卷)', '', '', '0.0', '15.0', '15.0', '0', '88', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('995', '26', '招牌海苔寿司', '', '', '0.0', '12.0', '12.0', '0', '89', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('996', '26', '招牌鳗鱼卷', '', '', '0.0', '30.0', '30.0', '0', '88', '0', '2', '0');
INSERT INTO `onethink_food` VALUES ('997', '26', '樱花之恋', '', '', '0.0', '15.0', '15.0', '0', '89', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('998', '26', '香松蛋黄卷', '', '', '0.0', '15.0', '15.0', '0', '89', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('999', '26', '瑶柱培根卷', '', '', '0.0', '16.0', '16.0', '0', '89', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('1000', '26', '奥尔良鸡肉卷', '', '', '0.0', '19.0', '19.0', '0', '89', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('1001', '26', '泡菜牛肉卷', '', '', '0.0', '17.0', '17.0', '0', '89', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('1002', '26', '加州卷', '', '', '0.0', '16.0', '16.0', '0', '89', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('1003', '26', '香辣鱿鱼卷', '', '', '0.0', '20.0', '20.0', '0', '88', '0', '9', '0');
INSERT INTO `onethink_food` VALUES ('1004', '26', '黑椒烤鸭卷', '', '', '0.0', '15.0', '15.0', '0', '89', '1', '10', '0');
INSERT INTO `onethink_food` VALUES ('1005', '26', '蟹座沙律卷', '', '', '0.0', '15.0', '15.0', '0', '89', '1', '11', '0');
INSERT INTO `onethink_food` VALUES ('1006', '26', '香辣金针菇卷', '', '', '0.0', '10.0', '10.0', '0', '89', '1', '12', '0');
INSERT INTO `onethink_food` VALUES ('1007', '26', '黄金肉狗卷', '', '', '0.0', '15.0', '15.0', '0', '89', '1', '13', '0');
INSERT INTO `onethink_food` VALUES ('1008', '26', '奶酪虾卷', '', '', '0.0', '26.0', '26.0', '0', '89', '1', '14', '0');
INSERT INTO `onethink_food` VALUES ('1009', '26', '川香鱼骨卷', '', '', '0.0', '14.0', '14.0', '0', '89', '1', '15', '0');
INSERT INTO `onethink_food` VALUES ('1010', '26', '韩风八爪鱼卷', '', '', '0.0', '21.0', '21.0', '0', '88', '0', '16', '0');
INSERT INTO `onethink_food` VALUES ('1011', '26', '水果蛋糕卷', '', '', '0.0', '10.0', '10.0', '0', '89', '1', '17', '0');
INSERT INTO `onethink_food` VALUES ('1012', '26', '香酥芝麻卷', '', '', '0.0', '15.0', '15.0', '0', '89', '1', '18', '0');
INSERT INTO `onethink_food` VALUES ('1013', '26', '荞麦寿司卷', '', '', '0.0', '18.0', '18.0', '0', '89', '0', '19', '0');
INSERT INTO `onethink_food` VALUES ('1014', '26', '炙烤三文鱼卷', '', '', '0.0', '20.0', '20.0', '0', '89', '1', '20', '0');
INSERT INTO `onethink_food` VALUES ('1015', '26', '海草军舰(对)', '', '', '0.0', '6.0', '6.0', '0', '90', '1', '21', '0');
INSERT INTO `onethink_food` VALUES ('1016', '26', '鱼籽军舰(对)', '', '', '0.0', '7.0', '7.0', '0', '90', '1', '22', '0');
INSERT INTO `onethink_food` VALUES ('1017', '26', '鳗鱼握(对)', '', '', '0.0', '7.0', '7.0', '0', '90', '1', '23', '0');
INSERT INTO `onethink_food` VALUES ('1018', '26', '紫薯军舰(对)', '', '', '0.0', '6.0', '6.0', '0', '90', '1', '24', '0');
INSERT INTO `onethink_food` VALUES ('1019', '26', '泡菜军舰(对)', '', '', '0.0', '6.0', '6.0', '0', '90', '1', '25', '0');
INSERT INTO `onethink_food` VALUES ('1020', '26', '虾肉军舰(对)', '', '', '0.0', '7.0', '7.0', '0', '90', '0', '26', '0');
INSERT INTO `onethink_food` VALUES ('1021', '26', '玉米军舰(对)', '', '', '0.0', '6.0', '6.0', '0', '90', '1', '27', '0');
INSERT INTO `onethink_food` VALUES ('1022', '26', '北极贝军舰(对)', '', '', '0.0', '7.0', '7.0', '0', '90', '1', '28', '0');
INSERT INTO `onethink_food` VALUES ('1023', '26', '蟹肉军舰(对)', '', '', '0.0', '6.0', '6.0', '0', '90', '1', '29', '0');
INSERT INTO `onethink_food` VALUES ('1024', '26', '肉松军舰(对)', '', '', '0.0', '6.0', '6.0', '0', '90', '1', '30', '0');
INSERT INTO `onethink_food` VALUES ('1025', '26', '海草手卷(只)', '', '', '0.0', '5.0', '5.0', '0', '90', '1', '31', '0');
INSERT INTO `onethink_food` VALUES ('1026', '26', '紫薯手卷(只)', '', '', '0.0', '5.0', '5.0', '0', '88', '0', '32', '0');
INSERT INTO `onethink_food` VALUES ('1027', '26', '蟹肉手卷(只)', '', '', '0.0', '5.0', '5.0', '0', '88', '0', '33', '0');
INSERT INTO `onethink_food` VALUES ('1028', '26', '鳗鱼手卷(只)', '', '', '0.0', '6.0', '6.0', '0', '90', '1', '34', '0');
INSERT INTO `onethink_food` VALUES ('1029', '26', '鱼籽手卷(只)', '', '', '0.0', '6.0', '6.0', '0', '90', '1', '35', '0');
INSERT INTO `onethink_food` VALUES ('1030', '26', '玉米手卷(只)', '', '', '0.0', '5.0', '5.0', '0', '90', '1', '36', '0');
INSERT INTO `onethink_food` VALUES ('1031', '26', '泡菜手卷(只)', '', '', '0.0', '5.0', '5.0', '0', '90', '1', '37', '0');
INSERT INTO `onethink_food` VALUES ('1032', '26', '北极贝手卷(只)', '', '', '0.0', '6.0', '6.0', '0', '90', '1', '38', '0');
INSERT INTO `onethink_food` VALUES ('1033', '26', '肉松手卷(只)', '', '', '0.0', '5.0', '5.0', '0', '90', '1', '39', '0');
INSERT INTO `onethink_food` VALUES ('1034', '26', '虾肉手卷(只)', '', '', '0.0', '6.0', '6.0', '0', '90', '1', '40', '0');
INSERT INTO `onethink_food` VALUES ('1035', '27', '老汤鲜肉馄饨', '', '', '0.0', '9.0', '9.0', '0', '91', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1036', '27', '香菇鲜肉馄饨', '', '', '0.0', '11.0', '11.0', '0', '91', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('1037', '27', '荠菜鲜肉馄饨', '', '', '0.0', '11.0', '11.0', '0', '91', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('1038', '27', '虾仁鲜肉馄饨', '', '', '0.0', '13.0', '13.0', '0', '91', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('1039', '27', '扇贝鲜肉馄饨', '', '', '0.0', '13.0', '13.0', '0', '91', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('1040', '27', '全家福馄饨', '', '', '0.0', '13.0', '13.0', '0', '91', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('1041', '27', '老汤鲜肉馄饨+火烧+卤蛋+小菜', '', '', '0.0', '14.0', '14.0', '0', '92', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1042', '27', '香菇鲜肉馄饨+火烧+卤蛋+小菜', '', '', '0.0', '15.0', '15.0', '0', '92', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('1043', '27', '荠菜鲜肉馄饨+火烧+卤蛋+小菜', '', '', '0.0', '15.0', '15.0', '0', '92', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('1044', '27', '虾仁鲜肉馄饨+火烧+卤蛋+小菜', '', '', '0.0', '17.0', '17.0', '0', '92', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('1045', '27', '扇贝鲜肉馄饨+火烧+卤蛋+小菜', '', '', '0.0', '17.0', '17.0', '0', '92', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('1046', '27', '红烧牛肉面', '', '', '0.0', '13.0', '13.0', '0', '93', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1047', '27', '麻辣牛肉面', '', '', '0.0', '13.0', '13.0', '0', '93', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('1048', '27', '炸酱面', '', '', '0.0', '11.0', '11.0', '0', '93', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('1049', '27', '麻汁凉面', '', '', '0.0', '8.0', '8.0', '0', '93', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('1050', '27', '火烧', '', '', '0.0', '2.0', '2.0', '0', '94', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1051', '27', '卤蛋', '', '', '0.0', '2.0', '2.0', '0', '94', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('1052', '27', '鸡汤老豆腐', '', '', '0.0', '1.0', '1.0', '0', '94', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('1053', '27', '小凉菜', '', '', '0.0', '3.0', '3.0', '0', '94', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('1054', '27', '猪肉白菜锅贴(个)', '', '', '0.0', '1.0', '1.0', '0', '94', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('1055', '27', '韭菜鸡蛋锅贴(个)', '', '', '0.0', '1.0', '1.0', '0', '94', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('1057', '8', '板烧鸡腿堡', '', '', '0.0', '16.0', '16.0', '0', '17', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1058', '8', '麦辣鸡腿堡', '', '', '0.0', '15.0', '15.0', '0', '17', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1059', '8', '薯条(大)', '', '', '0.0', '11.5', '11.5', '0', '16', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1080', '28', '萝卜筒骨饭', '', '', '0.0', '16.0', '14.4', '0', '95', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1081', '28', '冬瓜筒骨饭', '', '', '0.0', '16.0', '14.4', '0', '95', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1082', '28', '油豆腐筒骨饭', '', '', '0.0', '17.0', '15.3', '0', '95', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1083', '28', '海带筒骨饭', '', '', '0.0', '17.0', '15.3', '0', '95', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1084', '28', '土豆筒骨饭', '', '', '0.0', '17.0', '15.3', '0', '95', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1085', '28', '黑木耳筒骨饭', '', '', '0.0', '17.0', '15.3', '0', '95', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1086', '28', '山药筒骨饭', '', '', '0.0', '18.0', '16.2', '0', '95', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1087', '28', '香菇筒骨饭', '', '', '0.0', '18.0', '16.2', '0', '95', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1088', '28', '玉米筒骨饭', '', '', '0.0', '18.0', '16.2', '0', '95', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1089', '28', '萝卜排骨饭', '', '', '0.0', '14.0', '12.6', '0', '96', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1090', '28', '冬瓜排骨饭', '', '', '0.0', '14.0', '12.6', '0', '96', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1091', '28', '油豆腐排骨饭', '', '', '0.0', '15.0', '13.5', '0', '96', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1092', '28', '海带排骨饭', '', '', '0.0', '15.0', '13.5', '0', '96', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1093', '28', '土豆排骨饭', '', '', '0.0', '15.0', '13.5', '0', '96', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1094', '28', '黑木耳排骨饭', '', '', '0.0', '15.0', '13.5', '0', '96', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1095', '28', '山药排骨饭', '', '', '0.0', '16.0', '14.4', '0', '96', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1096', '28', '香菇排骨饭', '', '', '0.0', '16.0', '14.4', '0', '96', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1097', '28', '玉米排骨饭', '', '', '0.0', '16.0', '14.4', '0', '96', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1098', '28', '荠菜肉水饺(大)', '', '', '0.0', '13.0', '11.7', '0', '97', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1099', '28', '芹菜肉水饺(大)', '', '', '0.0', '13.0', '11.7', '0', '97', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1100', '28', '白菜肉水饺(大)', '', '', '0.0', '13.0', '11.7', '0', '97', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1101', '28', '三鲜水饺(大)', '', '', '0.0', '13.0', '11.7', '0', '97', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1102', '28', '香菇肉水饺(大)', '', '', '0.0', '14.0', '12.6', '0', '97', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1103', '28', '虾仁水饺(大)', '', '', '0.0', '19.0', '17.1', '0', '97', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1104', '28', '萝卜', '', '', '0.0', '2.0', '1.8', '0', '98', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1105', '28', '冬瓜', '', '', '0.0', '2.0', '1.8', '0', '98', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1106', '28', '油豆腐', '', '', '0.0', '3.0', '2.7', '0', '98', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1107', '28', '海带', '', '', '0.0', '3.0', '2.7', '0', '98', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1108', '28', '土豆', '', '', '0.0', '3.0', '2.7', '0', '98', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1109', '28', '黑木耳', '', '', '0.0', '3.0', '2.7', '0', '98', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1110', '28', '山药', '', '', '0.0', '4.0', '3.6', '0', '98', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1111', '28', '香菇', '', '', '0.0', '4.0', '3.6', '0', '98', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1112', '28', '玉米', '', '', '0.0', '4.0', '3.6', '0', '98', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1131', '30', '米饭', '', '', '0.0', '2.0', '2.0', '0', '101', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1132', '30', '茶叶蛋(个)', '', '', '0.0', '1.5', '1.5', '0', '101', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1133', '30', '花生毛豆(份)', '', '', '0.0', '13.0', '12.0', '0', '101', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1134', '30', '小笼包(8个/份)', '', '', '0.0', '11.0', '10.0', '0', '101', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1135', '30', '东北酱大棒骨(斤)(特色)', '', '', '0.0', '19.0', '18.0', '0', '99', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1136', '30', '东北酱脊骨(斤)(特色)', '', '', '0.0', '20.0', '19.0', '0', '100', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1137', '30', '酱猪心(份)', '', '', '0.0', '29.0', '28.0', '0', '99', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1138', '30', '酱脆骨(份)', '', '', '0.0', '31.0', '30.0', '0', '99', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1139', '30', '护心肉(份)', '', '', '0.0', '31.0', '30.0', '0', '99', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1140', '30', '熏鸡心(份)', '', '', '0.0', '27.0', '26.0', '0', '99', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1141', '30', '熏鸡胗(份)', '', '', '0.0', '33.0', '32.0', '0', '99', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1142', '30', '熏鸡脖(份)', '', '', '0.0', '25.0', '24.0', '0', '99', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1143', '30', '熏鸡头(份)', '', '', '0.0', '23.0', '22.0', '0', '99', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1144', '30', '杀猪菜(份)', '', '', '0.0', '19.0', '18.0', '0', '99', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1145', '30', '麻辣海螺蛳(份)', '', '', '0.0', '19.0', '18.0', '0', '100', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1146', '30', '麻辣鸭头(个)', '', '', '0.0', '4.0', '4.0', '0', '100', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1147', '30', '麻辣叉骨(份)', '', '', '0.0', '23.0', '22.0', '0', '100', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1148', '30', '麻辣鸭翅(个)', '', '', '0.0', '3.0', '3.0', '0', '100', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1149', '30', '麻辣鸭腿(个)', '', '', '0.0', '8.0', '8.0', '0', '100', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1150', '30', '蒜泥大棒骨', '', '', '0.0', '19.0', '18.0', '0', '100', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1151', '30', '盐水猪肝', '', '', '0.0', '25.0', '24.0', '0', '100', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1152', '30', '藕片海带丝(份)', '', '', '0.0', '17.0', '16.0', '0', '100', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1153', '30', '干豆腐(份)', '', '', '0.0', '13.0', '12.0', '0', '100', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1154', '30', '炝拌豆腐皮(份)', '', '', '0.0', '9.0', '8.0', '0', '100', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1155', '30', '炒蛤蜊(份)', '', '', '0.0', '17.0', '16.0', '0', '100', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1156', '30', '东北蘸酱菜(份)', '', '', '0.0', '13.0', '12.0', '0', '100', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1157', '30', '烤紫薯(2斤/份)', '', '', '0.0', '13.0', '12.0', '0', '100', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1158', '30', '芹菜花生', '', '', '0.0', '13.0', '12.0', '0', '100', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1159', '30', '拌牛筋肉', '', '', '0.0', '27.0', '26.0', '0', '100', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1160', '30', '酸辣土豆丝', '', '', '0.0', '13.0', '12.0', '0', '100', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1161', '30', '猪肝拌菠菜', '', '', '0.0', '15.0', '14.0', '0', '100', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1162', '30', '拍黄瓜', '', '', '0.0', '13.0', '12.0', '0', '100', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1163', '30', '松花豆腐', '', '', '0.0', '13.0', '12.0', '0', '100', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1181', '29', '小鸡炖蘑菇', '', '', '0.0', '60.0', '60.0', '0', '102', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1182', '29', '小鸡炖土豆', '', '', '0.0', '49.0', '49.0', '0', '102', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1183', '29', '小鸡炖粉条', '', '', '0.0', '49.0', '49.0', '0', '102', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1184', '29', '川椒鸡块', '', '', '0.0', '49.0', '49.0', '0', '102', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1185', '29', '酱鸡胗', '', '', '0.0', '29.0', '29.0', '0', '102', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1186', '29', '红焖肉炖粉条', '', '', '0.0', '33.0', '33.0', '0', '102', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1187', '29', '酱大骨头', '', '', '0.0', '46.0', '46.0', '0', '102', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1188', '29', '杀猪菜', '', '', '0.0', '39.0', '39.0', '0', '102', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1189', '29', '焦炒地瓜条', '', '', '0.0', '21.0', '21.0', '0', '102', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1190', '29', '蒸鸡蛋糕', '', '', '0.0', '22.0', '22.0', '0', '102', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1191', '29', '川白肉', '', '', '0.0', '39.0', '39.0', '0', '102', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1192', '29', '鲶鱼炖茄子', '', '', '0.0', '49.0', '49.0', '0', '102', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1193', '29', '红焖肉炖豆腐扣', '', '', '0.0', '39.0', '39.0', '0', '102', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1194', '29', '水煮鱼', '', '', '0.0', '51.0', '51.0', '0', '102', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1195', '29', '毛血旺', '', '', '0.0', '46.0', '46.0', '0', '102', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1196', '29', '肉筋烧土豆', '', '', '0.0', '35.0', '35.0', '0', '102', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1197', '29', '蒜泥血肠', '', '', '0.0', '29.0', '29.0', '0', '102', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1198', '29', '香芋地瓜球', '', '', '0.0', '21.0', '21.0', '0', '102', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1199', '29', '锅包肉', '', '', '0.0', '34.0', '34.0', '0', '103', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1200', '29', '水煮肉片', '', '', '0.0', '31.0', '31.0', '0', '103', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1201', '29', '辣炒鸡心', '', '', '0.0', '29.0', '29.0', '0', '103', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1202', '29', '糖醋里脊', '', '', '0.0', '34.0', '34.0', '0', '103', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1203', '29', '孜然鸡心', '', '', '0.0', '29.0', '29.0', '0', '103', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1204', '29', '焦溜肉段', '', '', '0.0', '33.0', '33.0', '0', '103', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1205', '29', '熘肝尖', '', '', '0.0', '29.0', '29.0', '0', '103', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1206', '29', '干炸里脊', '', '', '0.0', '33.0', '33.0', '0', '103', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1207', '29', '滑溜里脊', '', '', '0.0', '29.0', '29.0', '0', '103', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1208', '29', '木须肉', '', '', '0.0', '23.0', '23.0', '0', '103', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1209', '29', '香辣肉丝', '', '', '0.0', '31.0', '31.0', '0', '103', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1210', '29', '鱼香肉丝', '', '', '0.0', '29.0', '29.0', '0', '103', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1211', '29', '辣大肠', '', '', '0.0', '35.0', '35.0', '0', '103', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1212', '29', '孜然肉片', '', '', '0.0', '31.0', '31.0', '0', '103', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1213', '29', '宫保肉丁', '', '', '0.0', '29.0', '29.0', '0', '103', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1214', '29', '京酱肉丝', '', '', '0.0', '31.0', '31.0', '0', '103', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1215', '29', '家常豆腐', '', '', '0.0', '23.0', '23.0', '0', '104', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1216', '29', '干豆腐尖椒', '', '', '0.0', '21.0', '21.0', '0', '104', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1217', '29', '蒜蓉茼蒿', '', '', '0.0', '19.0', '19.0', '0', '104', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1218', '29', '麻辣豆腐', '', '', '0.0', '19.0', '19.0', '0', '104', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1219', '29', '地三鲜', '', '', '0.0', '25.0', '25.0', '0', '104', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1220', '29', '木须柿子', '', '', '0.0', '19.0', '19.0', '0', '104', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1221', '29', '青椒炒肉', '', '', '0.0', '23.0', '23.0', '0', '104', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1222', '29', '辣炒土豆丝', '', '', '0.0', '11.0', '11.0', '0', '104', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1223', '29', '清炒冬瓜', '', '', '0.0', '19.0', '19.0', '0', '104', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1224', '29', '酱烧尖椒', '', '', '0.0', '23.0', '23.0', '0', '104', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1225', '29', '红烧茄子', '', '', '0.0', '25.0', '25.0', '0', '104', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1226', '29', '木耳炒肉', '', '', '0.0', '23.0', '23.0', '0', '104', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1227', '29', '油焖土豆丝', '', '', '0.0', '17.0', '17.0', '0', '104', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1228', '29', '木耳炒肉', '', '', '0.0', '23.0', '23.0', '0', '104', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1229', '29', '大骨头青菜汤', '', '', '0.0', '35.0', '35.0', '0', '105', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1230', '29', '大骨头冬瓜汤', '', '', '0.0', '35.0', '35.0', '0', '105', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1231', '29', '木须柿子汤', '', '', '0.0', '19.0', '19.0', '0', '105', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1232', '29', '清炖鲫鱼汤', '', '', '0.0', '33.0', '33.0', '0', '105', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1233', '29', '冬瓜汤', '', '', '0.0', '19.0', '19.0', '0', '105', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1234', '29', '紫菜蛋花汤', '', '', '0.0', '19.0', '19.0', '0', '105', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1235', '29', '菠菜鸡蛋汤', '', '', '0.0', '19.0', '19.0', '0', '105', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1236', '29', '蛋花玉米羹', '', '', '0.0', '19.0', '19.0', '0', '105', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1237', '29', '蛤蜊冬瓜汤', '', '', '0.0', '29.0', '29.0', '0', '105', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1238', '29', '榨菜肉丝', '', '', '0.0', '23.0', '23.0', '0', '105', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1239', '29', '榨菜肉丝', '', '', '0.0', '23.0', '23.0', '0', '105', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1240', '29', '原汁蛤蜊', '', '', '0.0', '19.0', '19.0', '0', '107', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1241', '29', '辣炒蛤蜊', '', '', '0.0', '19.0', '19.0', '0', '107', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1242', '29', '蛤蜊氽鸡蛋', '', '', '0.0', '29.0', '29.0', '0', '107', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1243', '29', '白菜蛰皮', '', '', '0.0', '21.0', '21.0', '0', '108', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1244', '29', '炝拌土豆丝', '', '', '0.0', '11.0', '11.0', '0', '108', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1245', '29', '肉丝拉皮', '', '', '0.0', '19.0', '19.0', '0', '108', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1246', '29', '小葱拌豆腐', '', '', '0.0', '19.0', '19.0', '0', '108', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1247', '29', '蒜泥黄瓜', '', '', '0.0', '17.0', '17.0', '0', '108', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1248', '29', '川椒干豆腐丝', '', '', '0.0', '21.0', '21.0', '0', '108', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1249', '29', '拌苦瓜', '', '', '0.0', '21.0', '21.0', '0', '108', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1250', '29', '蛰皮黄瓜', '', '', '0.0', '19.0', '19.0', '0', '108', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1251', '29', '老醋豆芽', '', '', '0.0', '21.0', '21.0', '0', '108', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1252', '29', '拔丝地瓜', '', '', '0.0', '21.0', '21.0', '0', '109', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('1253', '29', '玉米松仁', '', '', '0.0', '29.0', '29.0', '0', '109', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('1254', '29', '米饭', '', '', '0.0', '2.0', '2.0', '0', '109', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1255', '29', '肉筋炖豆角土豆', '', '', '0.0', '45.0', '45.0', '0', '102', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1267', '32', '米饭', '', '', '0.0', '2.0', '2.0', '0', '113', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('1268', '32', '酸辣粉(大)', '', '', '0.0', '7.0', '7.0', '0', '113', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('1269', '32', '担担面(大)', '', '', '0.0', '7.0', '7.0', '0', '113', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('1270', '32', '牛肉面(大)', '', '', '0.0', '9.0', '9.0', '0', '113', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('1271', '32', '炸酱面(大)', '', '', '0.0', '9.0', '9.0', '0', '113', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('1272', '32', '扬州炒饭(大)', '', '', '0.0', '20.0', '20.0', '0', '113', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('1273', '32', '蛋炒饭(大)', '', '', '0.0', '19.0', '19.0', '0', '113', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('1274', '32', '酱油蛋炒饭(大)', '', '', '0.0', '20.0', '20.0', '0', '113', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('1275', '32', '酸菜蛋炒饭(大)', '', '', '0.0', '20.0', '20.0', '0', '113', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('1276', '32', '蒸小馒头', '', '', '0.0', '13.0', '13.0', '0', '113', '1', '10', '0');
INSERT INTO `onethink_food` VALUES ('1277', '32', '拔丝土豆', '', '', '0.0', '27.0', '27.0', '0', '113', '1', '11', '0');
INSERT INTO `onethink_food` VALUES ('1278', '32', '拔丝地瓜', '', '', '0.0', '27.0', '27.0', '0', '113', '1', '12', '0');
INSERT INTO `onethink_food` VALUES ('1279', '32', '拔丝山药', '', '', '0.0', '33.0', '33.0', '0', '113', '1', '13', '0');
INSERT INTO `onethink_food` VALUES ('1280', '32', '松仁玉米', '', '', '0.0', '23.0', '23.0', '0', '113', '1', '14', '0');
INSERT INTO `onethink_food` VALUES ('1281', '32', '香芋地瓜丸', '', '', '0.0', '23.0', '23.0', '0', '113', '1', '15', '0');
INSERT INTO `onethink_food` VALUES ('1282', '32', '南瓜饼', '', '', '0.0', '23.0', '23.0', '0', '113', '1', '16', '0');
INSERT INTO `onethink_food` VALUES ('1283', '32', '锅巴脆皮鸡', '', '', '0.0', '50.0', '50.0', '0', '114', '1', '11', '0');
INSERT INTO `onethink_food` VALUES ('1284', '32', '川汁全鱿', '', '', '0.0', '33.0', '33.0', '0', '114', '1', '12', '0');
INSERT INTO `onethink_food` VALUES ('1285', '32', '烧鸡公(只)(辣)', '', '', '0.0', '61.0', '61.0', '0', '114', '1', '13', '0');
INSERT INTO `onethink_food` VALUES ('1286', '32', '啤酒醉鸡', '', '', '0.0', '39.0', '39.0', '0', '114', '1', '14', '0');
INSERT INTO `onethink_food` VALUES ('1287', '32', '孜然牛肉', '', '', '0.0', '59.0', '59.0', '0', '114', '1', '15', '0');
INSERT INTO `onethink_food` VALUES ('1288', '32', '孜然鱿鱼丝', '', '', '0.0', '39.0', '39.0', '0', '114', '1', '16', '0');
INSERT INTO `onethink_food` VALUES ('1289', '32', '干锅排骨(精排)(辣)', '', '', '0.0', '90.0', '90.0', '0', '114', '1', '17', '0');
INSERT INTO `onethink_food` VALUES ('1290', '32', '红烧肉(大)', '', '', '0.0', '59.0', '59.0', '0', '114', '1', '18', '0');
INSERT INTO `onethink_food` VALUES ('1291', '32', '红烧肉(小)', '', '', '0.0', '39.0', '39.0', '0', '114', '1', '19', '0');
INSERT INTO `onethink_food` VALUES ('1292', '32', '酸汤肥牛', '', '', '0.0', '59.0', '59.0', '0', '115', '1', '20', '0');
INSERT INTO `onethink_food` VALUES ('1293', '32', '捞汁牛肉', '', '', '0.0', '37.0', '37.0', '0', '115', '1', '21', '0');
INSERT INTO `onethink_food` VALUES ('1294', '32', '重庆肥肠', '', '', '0.0', '40.0', '40.0', '0', '115', '1', '22', '0');
INSERT INTO `onethink_food` VALUES ('1295', '32', '干锅肥肠', '', '', '0.0', '39.0', '39.0', '0', '115', '1', '23', '0');
INSERT INTO `onethink_food` VALUES ('1296', '32', '一品扣肉', '', '', '0.0', '49.0', '49.0', '0', '115', '1', '24', '0');
INSERT INTO `onethink_food` VALUES ('1297', '32', '粉蒸肉', '', '', '0.0', '37.0', '37.0', '0', '115', '1', '25', '0');
INSERT INTO `onethink_food` VALUES ('1298', '32', '宫保虾球', '', '', '0.0', '59.0', '59.0', '0', '115', '1', '26', '0');
INSERT INTO `onethink_food` VALUES ('1299', '32', '香辣馋嘴蛙', '', '', '0.0', '72.0', '72.0', '0', '113', '1', '27', '0');
INSERT INTO `onethink_food` VALUES ('1300', '32', '蒜香排骨(根)', '', '', '0.0', '9.0', '9.0', '0', '115', '1', '28', '0');
INSERT INTO `onethink_food` VALUES ('1301', '32', '香辣虾', '', '', '0.0', '70.0', '70.0', '0', '114', '1', '29', '0');
INSERT INTO `onethink_food` VALUES ('1302', '32', '三鲜锅巴', '', '', '0.0', '39.0', '39.0', '0', '115', '1', '30', '0');
INSERT INTO `onethink_food` VALUES ('1303', '32', '重庆辣子鸡(小)', '', '', '0.0', '34.0', '34.0', '0', '115', '1', '31', '0');
INSERT INTO `onethink_food` VALUES ('1304', '32', '毛血旺', '', '', '0.0', '46.0', '46.0', '0', '115', '1', '32', '0');
INSERT INTO `onethink_food` VALUES ('1305', '32', '鲜椒腰花', '', '', '0.0', '39.0', '39.0', '0', '115', '1', '33', '0');
INSERT INTO `onethink_food` VALUES ('1306', '32', '铁板牛肉', '', '', '0.0', '37.0', '37.0', '0', '115', '1', '34', '0');
INSERT INTO `onethink_food` VALUES ('1307', '32', '酸菜仔姜蛙', '', '', '0.0', '69.0', '69.0', '0', '115', '1', '35', '0');
INSERT INTO `onethink_food` VALUES ('1308', '32', '四川腊肉', '', '', '0.0', '37.0', '37.0', '0', '115', '1', '36', '0');
INSERT INTO `onethink_food` VALUES ('1309', '32', '口水鸡', '', '', '0.0', '29.0', '29.0', '0', '115', '1', '37', '0');
INSERT INTO `onethink_food` VALUES ('1310', '32', '樟茶仔鸭', '', '', '0.0', '59.0', '59.0', '0', '115', '1', '38', '0');
INSERT INTO `onethink_food` VALUES ('1311', '32', '麻辣一锅香', '', '', '0.0', '70.0', '70.0', '0', '115', '1', '39', '0');
INSERT INTO `onethink_food` VALUES ('1312', '32', '川鲍汁茶树菇', '', '', '0.0', '37.0', '37.0', '0', '115', '1', '40', '0');
INSERT INTO `onethink_food` VALUES ('1313', '32', '干锅鸡', '', '', '0.0', '59.0', '59.0', '0', '115', '1', '41', '0');
INSERT INTO `onethink_food` VALUES ('1314', '32', '干锅辣鸭头(大)', '', '', '0.0', '69.0', '69.0', '0', '115', '1', '42', '0');
INSERT INTO `onethink_food` VALUES ('1315', '32', '干锅辣鸭头(小)', '', '', '0.0', '50.0', '50.0', '0', '113', '1', '43', '0');
INSERT INTO `onethink_food` VALUES ('1316', '32', '干锅藕条', '', '', '0.0', '29.0', '29.0', '0', '115', '1', '44', '0');
INSERT INTO `onethink_food` VALUES ('1317', '32', '干锅冬笋腊肉', '', '', '0.0', '39.0', '39.0', '0', '115', '1', '45', '0');
INSERT INTO `onethink_food` VALUES ('1318', '32', '川椒小炒肉', '', '', '0.0', '29.0', '29.0', '0', '115', '1', '46', '0');
INSERT INTO `onethink_food` VALUES ('1319', '32', '重庆辣子鸡(大)', '', '', '0.0', '60.0', '60.0', '0', '115', '1', '47', '0');
INSERT INTO `onethink_food` VALUES ('1320', '32', '重庆辣子鸡(小)', '', '', '0.0', '33.0', '33.0', '0', '115', '1', '48', '0');
INSERT INTO `onethink_food` VALUES ('1321', '32', '炝锅肥牛', '', '', '0.0', '59.0', '59.0', '0', '115', '1', '49', '0');
INSERT INTO `onethink_food` VALUES ('1322', '32', '夫妻肺片', '', '', '0.0', '29.0', '29.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1323', '32', '红油肚丝', '', '', '0.0', '29.0', '29.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1324', '32', '红油耳片', '', '', '0.0', '29.0', '29.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1325', '32', '蒜泥白肉', '', '', '0.0', '29.0', '29.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1326', '32', '四川凉粉', '', '', '0.0', '13.0', '13.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1327', '32', '天府泡菜', '', '', '0.0', '9.0', '9.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1328', '32', '蕨根粉', '', '', '0.0', '17.0', '17.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1329', '32', '西芹腰果', '', '', '0.0', '19.0', '19.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1330', '32', '油酥花仁', '', '', '0.0', '13.0', '13.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1331', '32', '五香豆干', '', '', '0.0', '19.0', '19.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1332', '32', '拌三丝', '', '', '0.0', '13.0', '13.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1333', '32', '蒜泥黄瓜', '', '', '0.0', '13.0', '13.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1334', '32', '大地丰收', '', '', '0.0', '17.0', '17.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1335', '32', '秘制牛大肚', '', '', '0.0', '29.0', '29.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1336', '32', '拌海蜇皮', '', '', '0.0', '19.0', '19.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1337', '32', '老醋花生', '', '', '0.0', '19.0', '19.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1338', '32', '皮蛋豆腐', '', '', '0.0', '13.0', '13.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1339', '32', '拌苦菊', '', '', '0.0', '13.0', '13.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1340', '32', '西芹花生', '', '', '0.0', '17.0', '17.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1341', '32', '泡椒凤爪', '', '', '0.0', '29.0', '29.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1342', '32', '麻辣牛肉', '', '', '0.0', '33.0', '33.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1343', '32', '过桥毛肚', '', '', '0.0', '33.0', '33.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1344', '32', '海米黄瓜', '', '', '0.0', '19.0', '19.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1345', '32', '拌土豆丝', '', '', '0.0', '11.0', '11.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1346', '32', '辣根木耳', '', '', '0.0', '19.0', '19.0', '0', '116', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1347', '32', '鱼香肉丝', '', '', '0.0', '33.0', '33.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1348', '32', '回锅肉', '', '', '0.0', '33.0', '33.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1349', '32', '锅巴肉片', '', '', '0.0', '37.0', '37.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1350', '32', '五花烧白', '', '', '0.0', '33.0', '33.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1351', '32', '干炸里脊', '', '', '0.0', '33.0', '33.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1352', '32', '锅包肉', '', '', '0.0', '38.0', '38.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1353', '32', '宫保鸡丁', '', '', '0.0', '33.0', '33.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1354', '32', '泡椒溜鳝段', '', '', '0.0', '69.0', '69.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1355', '32', '水煮牛肉', '', '', '0.0', '50.0', '50.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1356', '32', '水煮肉片(大)', '', '', '0.0', '54.0', '54.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1357', '32', '水煮肉片(小)', '', '', '0.0', '30.0', '30.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1358', '32', '水煮鳝段', '', '', '0.0', '69.0', '69.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1359', '32', '水煮肥肠', '', '', '0.0', '39.0', '39.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1360', '32', '水煮毛肚', '', '', '0.0', '33.0', '33.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1361', '32', '糖醋里脊', '', '', '0.0', '37.0', '37.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1362', '32', '冬笋肉丝', '', '', '0.0', '33.0', '33.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1363', '32', '红烧排骨', '', '', '0.0', '50.0', '50.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1364', '32', '红烧牛肉', '', '', '0.0', '49.0', '49.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1365', '32', '土豆烧牛肉', '', '', '0.0', '49.0', '49.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1366', '32', '京酱肉丝', '', '', '0.0', '37.0', '37.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1367', '32', '粉蒸牛肉', '', '', '0.0', '49.0', '49.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1368', '32', '粉蒸排骨', '', '', '0.0', '59.0', '59.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1369', '32', '芸豆炖肉', '', '', '0.0', '49.0', '49.0', '0', '117', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1370', '32', '麻婆豆腐', '', '', '0.0', '17.0', '17.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1371', '32', '老醋白菜', '', '', '0.0', '29.0', '29.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1372', '32', '家常豆腐', '', '', '0.0', '49.0', '49.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1373', '32', '干锅土豆片', '', '', '0.0', '39.0', '39.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1374', '32', '香辣土豆片', '', '', '0.0', '20.0', '20.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1375', '32', '酸辣土豆丝', '', '', '0.0', '13.0', '13.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1376', '32', '鱼香茄子', '', '', '0.0', '19.0', '19.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1377', '32', '香菇油菜', '', '', '0.0', '19.0', '19.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1378', '32', '红烧茄子', '', '', '0.0', '19.0', '19.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1379', '32', '海米油菜', '', '', '0.0', '19.0', '19.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1380', '32', '大锅菜', '', '', '0.0', '21.0', '21.0', '0', '113', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1381', '32', '干煸芸豆', '', '', '0.0', '23.0', '23.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1382', '32', '蒜泥油麦菜', '', '', '0.0', '19.0', '19.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1383', '32', '清炒莴笋', '', '', '0.0', '23.0', '23.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1384', '32', '豆鼓鲮鱼油麦菜', '', '', '0.0', '23.0', '23.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1385', '32', '干煸大头菜', '', '', '0.0', '19.0', '17.0', '0', '113', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1386', '32', '蒜泥茼蒿', '', '', '0.0', '19.0', '19.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1387', '32', '醋溜白菜', '', '', '0.0', '13.0', '13.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1388', '32', '清炒山药', '', '', '0.0', '27.0', '27.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1389', '32', '蒜泥西兰花', '', '', '0.0', '23.0', '23.0', '0', '118', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1390', '32', '辣炒黄豆芽', '', '', '0.0', '13.0', '13.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1391', '32', '蒜泥空心菜', '', '', '0.0', '19.0', '19.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1392', '32', '蒜泥菠菜', '', '', '0.0', '19.0', '19.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1393', '32', '番茄炒蛋', '', '', '0.0', '19.0', '19.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1394', '32', '地三鲜', '', '', '0.0', '19.0', '19.0', '0', '118', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1395', '29', '得莫利活鱼', '', '', '0.0', '55.0', '55.0', '0', '102', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1396', '33', '麻酱(现磨)', '', '', '0.0', '3.0', '3.0', '0', '122', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1397', '33', '肥牛一号(1份)', '', '', '0.0', '20.0', '20.0', '0', '126', '0', '1', '0');
INSERT INTO `onethink_food` VALUES ('1398', '33', '纯羊肉(1份)', '', '', '0.0', '20.0', '20.0', '0', '126', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('1399', '33', '五花肉(1份)', '', '', '0.0', '10.0', '10.0', '0', '122', '0', '3', '0');
INSERT INTO `onethink_food` VALUES ('1400', '33', '圆生菜(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('1401', '33', '苦菊(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('1402', '33', '叶生菜(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('1403', '33', '大白菜(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('1404', '33', '娃娃菜(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('1405', '33', '茼蒿(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('1406', '33', '香菜(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('1407', '33', '油麦菜(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('1408', '33', '菠菜(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('1409', '33', '山药(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '10', '0');
INSERT INTO `onethink_food` VALUES ('1410', '33', '金针菇(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '11', '0');
INSERT INTO `onethink_food` VALUES ('1411', '33', '平菇(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '12', '0');
INSERT INTO `onethink_food` VALUES ('1412', '33', '香菇(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '13', '0');
INSERT INTO `onethink_food` VALUES ('1413', '33', '海带头(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '14', '0');
INSERT INTO `onethink_food` VALUES ('1414', '33', '海带丝(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '15', '0');
INSERT INTO `onethink_food` VALUES ('1415', '33', '有机菜花(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '16', '0');
INSERT INTO `onethink_food` VALUES ('1416', '33', '西兰花(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '17', '0');
INSERT INTO `onethink_food` VALUES ('1417', '33', '绿豆芽(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '18', '0');
INSERT INTO `onethink_food` VALUES ('1418', '33', '木耳(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '19', '0');
INSERT INTO `onethink_food` VALUES ('1419', '33', '银耳(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '20', '0');
INSERT INTO `onethink_food` VALUES ('1420', '33', '方块火腿(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '21', '0');
INSERT INTO `onethink_food` VALUES ('1421', '33', '腐竹(2两)', '', '', '0.0', '3.2', '3.2', '0', '123', '1', '22', '0');
INSERT INTO `onethink_food` VALUES ('1422', '33', '魔芋结(2两)', '', '', '0.0', '3.2', '3.2', '0', '124', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('1423', '33', '豆皮(2两)', '', '', '0.0', '3.2', '3.2', '0', '124', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('1424', '33', '豆泡(2两)', '', '', '0.0', '3.2', '3.2', '0', '124', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('1425', '33', '黏糕片(2两)', '', '', '0.0', '3.2', '3.2', '0', '124', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('1426', '33', '藕片(2两)', '', '', '0.0', '3.2', '3.2', '0', '124', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('1427', '33', '烤麸(2两)', '', '', '0.0', '3.2', '3.2', '0', '124', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('1428', '33', '粉丝(2两)', '', '', '0.0', '3.2', '3.2', '0', '124', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('1429', '33', '土豆粉(2两)', '', '', '0.0', '3.2', '3.2', '0', '124', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('1430', '33', '宽粉(2两)', '', '', '0.0', '3.2', '3.2', '0', '124', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('1431', '33', '玉米面(2两)', '', '', '0.0', '3.2', '3.2', '0', '124', '1', '10', '0');
INSERT INTO `onethink_food` VALUES ('1432', '33', '牛筋面(2两)', '', '', '0.0', '3.2', '3.2', '0', '124', '0', '11', '0');
INSERT INTO `onethink_food` VALUES ('1433', '33', '米线(2两)', '', '', '0.0', '3.2', '3.2', '0', '124', '1', '12', '0');
INSERT INTO `onethink_food` VALUES ('1434', '33', '方便面(1块)', '', '', '0.0', '2.0', '2.0', '0', '124', '1', '13', '0');
INSERT INTO `onethink_food` VALUES ('1435', '33', '台湾烤肠(2个)', '', '', '0.0', '2.0', '2.0', '0', '125', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('1436', '33', '香菇丸(4个)', '', '', '0.0', '2.0', '2.0', '0', '125', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('1437', '33', '撒尿牛丸(2个)', '', '', '0.0', '2.0', '2.0', '0', '125', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('1438', '33', '包心鱼卷(3个)', '', '', '0.0', '2.0', '2.0', '0', '125', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('1439', '33', '墨鱼丸(2个)', '', '', '0.0', '2.0', '2.0', '0', '125', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('1440', '33', '燕饺(2个)', '', '', '0.0', '2.0', '2.0', '0', '125', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('1441', '33', '鱿鱼花(2个)', '', '', '0.0', '2.0', '2.0', '0', '125', '0', '7', '0');
INSERT INTO `onethink_food` VALUES ('1442', '33', '培根肉(1片)', '', '', '0.0', '2.0', '2.0', '0', '125', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('1443', '33', '北极翅(2个)', '', '', '0.0', '2.0', '2.0', '0', '125', '0', '9', '0');
INSERT INTO `onethink_food` VALUES ('1444', '33', '鱼豆腐(3个)', '', '', '0.0', '2.0', '2.0', '0', '125', '1', '10', '0');
INSERT INTO `onethink_food` VALUES ('1445', '33', '蟹棒(2个)', '', '', '0.0', '2.0', '2.0', '0', '125', '1', '11', '0');
INSERT INTO `onethink_food` VALUES ('1446', '33', '蟹排(1个)', '', '', '0.0', '2.0', '2.0', '0', '125', '1', '12', '0');
INSERT INTO `onethink_food` VALUES ('1447', '33', '跳虾(2个)', '', '', '0.0', '2.0', '2.0', '0', '125', '0', '13', '0');
INSERT INTO `onethink_food` VALUES ('1448', '33', '甜不辣(4个)', '', '', '0.0', '2.0', '2.0', '0', '125', '1', '14', '0');
INSERT INTO `onethink_food` VALUES ('1449', '11', '辣炒蛤蜊', '', '', '0.0', '19.0', '19.0', '0', '28', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1450', '34', '蔬菜咖喱饭', '', '', '0.0', '13.0', '13.0', '0', '127', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1451', '34', '鲜蔬可乐饼咖喱饭', '', '', '0.0', '15.0', '15.0', '0', '127', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('1452', '34', '香酥鱿鱼咖喱饭', '', '', '0.0', '16.0', '16.0', '0', '127', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('1453', '34', '深海鱼排咖喱饭', '', '', '0.0', '21.0', '21.0', '0', '127', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('1454', '34', '猪排咖喱饭', '', '', '0.0', '21.0', '21.0', '0', '127', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('1455', '34', '猪排饭', '', '', '0.0', '21.0', '21.0', '0', '127', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('1456', '34', '赤鱿鱼丸', '', '', '0.0', '9.0', '9.0', '0', '127', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('1457', '34', '咖喱乌冬面', '', '', '0.0', '16.0', '16.0', '0', '127', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('1458', '35', '香汁拌面', '', '', '0.0', '13.0', '13.0', '0', '128', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1459', '35', '台式卤肉面', '', '', '0.0', '13.0', '13.0', '0', '128', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('1460', '35', '香辣肉丁面', '', '', '0.0', '13.0', '13.0', '0', '128', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('1461', '35', '飘香拌面', '', '', '0.0', '13.0', '13.0', '0', '128', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('1462', '35', '酱汁排骨面', '', '', '0.0', '14.0', '14.0', '0', '128', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('1463', '35', '香辣肉丝捞汁面', '', '', '0.0', '14.0', '14.0', '0', '128', '0', '6', '0');
INSERT INTO `onethink_food` VALUES ('1464', '35', '素炒面', '', '', '0.0', '11.0', '11.0', '0', '128', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('1465', '35', '三丝炒面', '', '', '0.0', '13.0', '13.0', '0', '128', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('1466', '35', '青椒火腿炒面', '', '', '0.0', '13.0', '13.0', '0', '128', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('1467', '35', '酸辣牛肉面', '', '', '0.0', '11.0', '11.0', '0', '128', '1', '10', '0');
INSERT INTO `onethink_food` VALUES ('1468', '35', '香辣牛肉面', '', '', '0.0', '11.0', '11.0', '0', '128', '1', '11', '0');
INSERT INTO `onethink_food` VALUES ('1469', '35', '红烧牛肉面', '', '', '0.0', '11.0', '11.0', '0', '128', '1', '12', '0');
INSERT INTO `onethink_food` VALUES ('1470', '35', '酱牛肉', '', '', '0.0', '29.0', '29.0', '0', '129', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1471', '35', '夫妻肺片', '', '', '0.0', '27.0', '27.0', '0', '129', '0', '2', '0');
INSERT INTO `onethink_food` VALUES ('1472', '35', '红烧排骨', '', '', '0.0', '23.0', '23.0', '0', '129', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('1473', '35', '开胃海带丝', '', '', '0.0', '7.0', '7.0', '0', '129', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('1474', '35', '红油豆腐丝', '', '', '0.0', '7.0', '7.0', '0', '128', '0', '5', '0');
INSERT INTO `onethink_food` VALUES ('1475', '35', '爽口萝卜条/红油豆腐丝', '/FoodPic/11.jpg', '', '0.0', '7.0', '7.0', '0', '128', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('1476', '7', '吮指原味鸡', '', '', '0.0', '10.0', '10.0', '0', '13', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1477', '36', '三宝米饭', '/Upload/foodlist/36/36_1.jpg', '', '0.0', '3.0', '2.7', '0', '130', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1478', '36', '金蛋红烧肉', '/Upload/foodlist/36/36_17.jpg', '', '0.0', '22.0', '19.8', '0', '132', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1479', '36', '荷塘小炒', '/Upload/foodlist/36/36_19.jpg', '', '0.0', '18.0', '16.2', '0', '132', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1480', '36', '绝味扫荡腿', '/Upload/foodlist/36/36_20.jpg', '', '0.0', '20.0', '18.0', '0', '132', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1481', '36', '绝代双椒', '/Upload/foodlist/36/36_21.jpg', '', '0.0', '15.0', '13.5', '0', '132', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1482', '36', '泰诱惑的咖喱鸡', '/Upload/foodlist/36/36_13.jpg', '', '0.0', '22.0', '19.8', '0', '132', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1483', '36', '辣皮子扣肉', '/Upload/foodlist/36/36_14.jpg', '', '0.0', '20.0', '19.0', '0', '132', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1484', '36', '秘制煎带鱼', '/Upload/foodlist/36/36_15.jpg', '', '0.0', '23.0', '20.7', '0', '132', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1485', '36', '美多滋鸡翅', '/Upload/foodlist/36/36_16.jpg', '', '0.0', '24.0', '21.6', '0', '132', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1486', '36', '浓香猪骨汤饭', '/Upload/foodlist/36/36_18.jpg', '', '0.0', '23.0', '20.7', '0', '132', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1487', '36', '虎眼狮子头', '/Upload/foodlist/36/36_8.jpg', '', '0.0', '6.0', '5.4', '0', '131', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1488', '36', '精品凉菜', '/Upload/foodlist/36/36_9.jpg', '', '0.0', '12.0', '10.8', '0', '131', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1489', '36', '韩式瓜条', '/Upload/foodlist/36/36_10.jpg', '', '0.0', '3.0', '2.7', '0', '131', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1490', '36', '韩式辣白菜', '/Upload/foodlist/36/36_11.jpg', '', '0.0', '3.0', '2.7', '0', '131', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1491', '36', '蓝莓土豆泥', '/Upload/foodlist/36/36_12.jpg', '', '0.0', '5.0', '4.5', '0', '131', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1492', '36', '金蛋煎豆腐', '/Upload/foodlist/36/36_4.jpg', '', '0.0', '16.0', '14.4', '0', '131', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1493', '36', '菊香玫瑰饮', '/Upload/foodlist/36/36_5.jpg', '', '0.0', '12.0', '10.8', '0', '131', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1494', '36', '橙汁瓜条', '/Upload/foodlist/36/36_6.jpg', '', '0.0', '6.0', '5.4', '0', '131', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1495', '36', '西柚龙井蜜茶', '/Upload/foodlist/36/36_7.jpg', '', '0.0', '15.0', '13.5', '0', '131', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1496', '36', '私家卷饼', '/Upload/foodlist/36/36_2.jpg', '', '0.0', '29.0', '26.1', '0', '130', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1497', '36', '彩色水饺', '/Upload/foodlist/36/36_3.jpg', '', '0.0', '25.0', '22.5', '0', '130', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1498', '25', '限周一(2份无骨鸡柳)', '', '', '0.0', '6.0', '6.0', '0', '133', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1499', '25', '限周二(2个鸡腿堡)', '', '', '0.0', '9.0', '9.0', '0', '133', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1500', '25', '限周三(3个鸡肉卷)', '', '', '0.0', '15.0', '15.0', '0', '133', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1501', '25', '限周四(2个香酥鸡腿)', '', '', '0.0', '8.0', '8.0', '0', '133', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1502', '15', '羊肉汤(中)', '', '', '0.0', '15.0', '15.0', '0', '84', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1503', '15', '羊杂汤(中)', '', '', '0.0', '15.0', '15.0', '0', '84', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1504', '15', '全羊汤(中)', '', '', '0.0', '20.0', '20.0', '0', '84', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1505', '15', '火烧', '', '', '0.0', '1.0', '1.0', '0', '42', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1506', '15', '炒羊血', '', '', '0.0', '10.0', '10.0', '0', '134', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1507', '15', '炒羊肉', '', '', '0.0', '25.0', '25.0', '0', '134', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1508', '15', '炒羊肚', '', '', '0.0', '30.0', '30.0', '0', '134', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1516', '32', '水煮鱼(大)', '', '', '0.0', '73.0', '73.0', '0', '113', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1517', '35', '韭菜鸡蛋水饺', '', '', '0.0', '16.0', '16.0', '0', '135', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1518', '35', '韭菜肉水饺', '', '', '0.0', '16.0', '16.0', '0', '135', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1519', '35', '白菜肉水饺', '', '', '0.0', '16.0', '16.0', '0', '135', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1520', '35', '芹菜肉水饺', '', '', '0.0', '16.0', '16.0', '0', '135', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1521', '35', '荠菜肉水饺', '', '', '0.0', '16.0', '16.0', '0', '135', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1522', '35', '青椒火腿炒饭', '', '', '0.0', '13.0', '13.0', '0', '135', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1523', '35', '青椒肉丝炒饭', '', '', '0.0', '13.0', '13.0', '0', '135', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1524', '35', '卤肉饭', '', '', '0.0', '13.0', '13.0', '0', '135', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1525', '35', '香辣肉丁炒饭', '', '', '0.0', '13.0', '13.0', '0', '135', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1526', '35', '黄四娘酱骨(小)', '', '', '0.0', '16.0', '16.0', '0', '129', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1527', '35', '黄四娘酱骨(大)', '', '', '0.0', '19.0', '19.0', '0', '129', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1528', '11', '酸辣土豆丝', '', '', '0.0', '9.0', '9.0', '0', '28', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1529', '7', '薯条(大)', '', '', '0.0', '12.0', '12.0', '0', '13', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1530', '37', '鸡公煲(小)', '', '', '0.0', '17.0', '17.0', '0', '137', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('1531', '37', '鸡公煲(中)', '', '', '0.0', '27.0', '27.0', '0', '137', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('1532', '37', '排骨煲(小)', '', '', '0.0', '29.0', '29.0', '0', '137', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('1533', '37', '排骨煲(中)', '', '', '0.0', '39.0', '39.0', '0', '137', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('1534', '37', '鲶鱼煲(小)', '', '', '0.0', '17.0', '17.0', '0', '137', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('1535', '37', '鲶鱼煲(中)', '', '', '0.0', '27.0', '27.0', '0', '137', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('1536', '37', '鸡公煲(小)(微辣)', '', '', '0.0', '17.0', '17.0', '0', '137', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('1537', '37', '鸡公煲(中)(微辣)', '', '', '0.0', '27.0', '27.0', '0', '137', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('1538', '37', '排骨煲(小)(微辣)', '', '', '0.0', '29.0', '29.0', '0', '137', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('1539', '37', '排骨煲(中)(微辣)', '', '', '0.0', '39.0', '39.0', '0', '137', '1', '10', '0');
INSERT INTO `onethink_food` VALUES ('1540', '37', '鲶鱼煲(小)(微辣)', '', '', '0.0', '17.0', '17.0', '0', '137', '1', '11', '0');
INSERT INTO `onethink_food` VALUES ('1541', '37', '鲶鱼煲(中)(微辣)', '', '', '0.0', '27.0', '27.0', '0', '137', '1', '12', '0');
INSERT INTO `onethink_food` VALUES ('1542', '37', '鸡公煲(小)(中辣)', '', '', '0.0', '17.0', '17.0', '0', '137', '1', '13', '0');
INSERT INTO `onethink_food` VALUES ('1543', '37', '鸡公煲(中)(中辣)', '', '', '0.0', '27.0', '27.0', '0', '137', '1', '14', '0');
INSERT INTO `onethink_food` VALUES ('1544', '37', '排骨煲(小)(中辣)', '', '', '0.0', '29.0', '29.0', '0', '137', '1', '15', '0');
INSERT INTO `onethink_food` VALUES ('1545', '37', '排骨煲(中)(中辣)', '', '', '0.0', '39.0', '39.0', '0', '137', '1', '16', '0');
INSERT INTO `onethink_food` VALUES ('1546', '37', '鲶鱼煲(小)(中辣)', '', '', '0.0', '17.0', '17.0', '0', '137', '1', '17', '0');
INSERT INTO `onethink_food` VALUES ('1547', '37', '鲶鱼煲(中)(中辣)', '', '', '0.0', '27.0', '27.0', '0', '137', '1', '18', '0');
INSERT INTO `onethink_food` VALUES ('1548', '37', '米饭', '', '', '0.0', '2.0', '2.0', '0', '136', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('1549', '37', '方便面', '', '', '0.0', '2.0', '2.0', '0', '136', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('1550', '37', '面条', '', '', '0.0', '2.0', '2.0', '0', '136', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('1551', '37', '焖饼', '', '', '0.0', '2.0', '2.0', '0', '136', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('1552', '37', '凉拌黄瓜', '', '', '0.0', '8.0', '8.0', '0', '136', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('1553', '37', '香酥花生米', '', '', '0.0', '8.0', '8.0', '0', '136', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('1554', '37', '凉拌木耳', '', '', '0.0', '8.0', '8.0', '0', '136', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('1555', '37', '鱼丸', '', '', '0.0', '4.0', '4.0', '0', '138', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('1556', '37', '撒尿牛丸', '', '', '0.0', '4.0', '4.0', '0', '138', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('1557', '37', '甜不辣', '', '', '0.0', '4.0', '4.0', '0', '138', '1', '10', '0');
INSERT INTO `onethink_food` VALUES ('1558', '37', '鱼豆腐', '', '', '0.0', '4.0', '4.0', '0', '138', '1', '11', '0');
INSERT INTO `onethink_food` VALUES ('1559', '37', '蟹肉棒', '', '', '0.0', '4.0', '4.0', '0', '138', '1', '12', '0');
INSERT INTO `onethink_food` VALUES ('1560', '37', '火腿', '', '', '0.0', '4.0', '4.0', '0', '138', '1', '13', '0');
INSERT INTO `onethink_food` VALUES ('1561', '37', '鹌鹑蛋', '', '', '0.0', '4.0', '4.0', '0', '138', '1', '14', '0');
INSERT INTO `onethink_food` VALUES ('1562', '37', '鸭血', '', '', '0.0', '4.0', '4.0', '0', '138', '1', '15', '0');
INSERT INTO `onethink_food` VALUES ('1563', '37', '虾饺', '', '', '0.0', '4.0', '4.0', '0', '138', '1', '16', '0');
INSERT INTO `onethink_food` VALUES ('1564', '37', '白菜', '', '', '0.0', '3.0', '3.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1565', '37', '娃娃菜', '', '', '0.0', '4.0', '4.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1566', '37', '菠菜', '', '', '0.0', '3.0', '3.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1567', '37', '茼蒿', '', '', '0.0', '3.0', '3.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1568', '37', '芹菜', '', '', '0.0', '3.0', '3.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1569', '37', '生菜', '', '', '0.0', '3.0', '3.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1570', '37', '土豆', '', '', '0.0', '3.0', '3.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1571', '37', '海带', '', '', '0.0', '3.0', '3.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1572', '37', '豆芽', '', '', '0.0', '3.0', '3.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1573', '37', '油麦菜', '', '', '0.0', '3.0', '3.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1574', '37', '藕片', '', '', '0.0', '3.0', '3.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1575', '37', '圆葱', '', '', '0.0', '3.0', '3.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1576', '37', '香菜', '', '', '0.0', '4.0', '4.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1577', '37', '金针菇', '', '', '0.0', '4.0', '4.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1578', '37', '香菇', '', '', '0.0', '4.0', '4.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1579', '37', '黑木耳', '', '', '0.0', '4.0', '4.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1580', '37', '蘑菇', '', '', '0.0', '3.0', '3.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1581', '37', '鲜豆腐', '', '', '0.0', '3.0', '3.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1582', '37', '冻豆腐', '', '', '0.0', '3.0', '3.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1583', '37', '豆腐皮', '', '', '0.0', '3.0', '3.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1584', '37', '腐竹', '', '', '0.0', '4.0', '4.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1585', '37', '宽粉', '', '', '0.0', '3.0', '3.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1586', '37', '粉丝', '', '', '0.0', '3.0', '3.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1587', '37', '豆腐泡', '', '', '0.0', '3.0', '3.0', '0', '139', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1588', '38', '唐记清水鱼', '/Upload/foodlist/38/38_1.jpg', '', '0.0', '70.0', '70.0', '0', '141', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1589', '38', '麻辣馋嘴蛙', '/Upload/foodlist/38/38_2.jpg', '', '0.0', '70.0', '70.0', '0', '141', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1590', '38', '重庆辣子鸡', '/Upload/foodlist/38/38_3.jpg', '', '0.0', '40.0', '40.0', '0', '141', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1591', '38', '馒头', '', '', '0.0', '3.0', '3.0', '0', '142', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1592', '38', '米饭', '', '', '0.0', '3.0', '3.0', '0', '142', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1593', '38', '蛋炒饭', '', '', '0.0', '27.0', '27.0', '0', '142', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1594', '38', '酸辣米粉', '', '', '0.0', '13.0', '13.0', '0', '142', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1595', '38', '煎蛋汤', '/Upload/foodlist/38/38_5.jpg', '', '0.0', '19.0', '19.0', '0', '142', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1596', '38', '酸辣汤', '/Upload/foodlist/38/38_6.jpg', '', '0.0', '17.0', '17.0', '0', '142', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1597', '38', '茶香观音骨', '/Upload/foodlist/38/38_15.jpg', '', '0.0', '80.0', '80.0', '0', '143', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1598', '38', '客家扣肉', '/Upload/foodlist/38/38_18.jpg', '', '0.0', '39.0', '39.0', '0', '143', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1599', '38', '一品黑山羊', '/Upload/foodlist/38/38_20.jpg', '', '0.0', '90.0', '99.0', '0', '143', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1600', '38', '萝卜牛腩煲', '/Upload/foodlist/38/38_22.jpg', '', '0.0', '60.0', '60.0', '0', '143', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1601', '38', '小炒黄牛肉', '/Upload/foodlist/38/38_24.jpg', '', '0.0', '50.0', '50.0', '0', '143', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1602', '38', '然香糊辣虾', '/Upload/foodlist/38/38_26.jpg', '', '0.0', '60.0', '60.0', '0', '143', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1603', '38', '麻辣鸡翅', '/Upload/foodlist/38/38_11.jpg', '', '0.0', '56.0', '56.0', '0', '143', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1604', '38', '菌黄松板肉', '/Upload/foodlist/38/38_13.jpg', '', '0.0', '43.0', '43.0', '0', '143', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1605', '38', '红烧肉烧豆腐', '/Upload/foodlist/38/38_16.jpg', '', '0.0', '49.0', '49.0', '0', '143', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1606', '38', '小炒黑山羊', '/Upload/foodlist/38/38_19.jpg', '', '0.0', '49.0', '49.0', '0', '143', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1607', '38', '美味菇牛肉粒', '/Upload/foodlist/38/38_21.jpg', '', '0.0', '50.0', '50.0', '0', '143', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1608', '38', '红焖黄牛肉', '/Upload/foodlist/38/38_23.jpg', '', '0.0', '59.0', '59.0', '0', '143', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1609', '38', '水煮牛肉', '/Upload/foodlist/38/38_25.jpg', '', '0.0', '47.0', '47.0', '0', '143', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1610', '38', '干锅肥肠', '/Upload/foodlist/38/38_27.jpg', '', '0.0', '49.0', '49.0', '0', '143', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1611', '38', '回锅肉', '/Upload/foodlist/38/38_12.jpg', '', '0.0', '29.0', '29.0', '0', '143', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1612', '38', '土匪猪肝', '/Upload/foodlist/38/38_14.jpg', '', '0.0', '27.0', '27.0', '0', '143', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1613', '38', '冬笋炒肉片', '/Upload/foodlist/38/38_17.jpg', '', '0.0', '20.0', '20.0', '0', '143', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1614', '38', '鱼珍毛血旺', '/Upload/foodlist/38/38_4.jpg', '', '0.0', '90.0', '90.0', '0', '141', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1615', '38', '干锅千叶豆腐', '/Upload/foodlist/38/38_31.jpg', '', '0.0', '29.0', '29.0', '0', '144', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1616', '38', '干锅土豆片', '/Upload/foodlist/38/38_33.jpg', '', '0.0', '23.0', '23.0', '0', '144', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1617', '38', '干锅有机菜花', '/Upload/foodlist/38/38_35.jpg', '', '0.0', '30.0', '30.0', '0', '144', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1618', '38', '干锅娃娃菜', '/Upload/foodlist/38/38_36.jpg', '', '0.0', '29.0', '29.0', '0', '144', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1619', '38', '美味八珍菌', '/Upload/foodlist/38/38_37.jpg', '', '0.0', '29.0', '29.0', '0', '144', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1620', '38', '小炒木耳', '/Upload/foodlist/38/38_28.jpg', '', '0.0', '29.0', '29.0', '0', '144', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1621', '38', '西芹百合', '', '', '0.0', '29.0', '29.0', '0', '144', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1622', '38', '麻婆豆腐', '', '', '0.0', '9.0', '9.0', '0', '144', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1623', '38', '酸辣土豆丝', '', '', '0.0', '13.0', '13.0', '0', '144', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1624', '38', '夫妻肺片', '/Upload/foodlist/38/38_38.jpg', '', '0.0', '29.0', '29.0', '0', '145', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1625', '38', '老醋蛰头', '/Upload/foodlist/38/38_39.jpg', '', '0.0', '39.0', '39.0', '0', '145', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1626', '38', '口水鸡', '/Upload/foodlist/38/38_40.jpg', '', '0.0', '27.0', '27.0', '0', '145', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1627', '38', '川北凉粉', '/Upload/foodlist/38/38_41.jpg', '', '0.0', '13.0', '13.0', '0', '145', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1628', '32', '酸菜鱼(小)', '', '', '0.0', '40.0', '40.0', '0', '115', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1629', '26', '韩风烤肉卷', '', '', '0.0', '15.0', '15.0', '0', '89', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1631', '8', '巨无霸+中薯+中可', '', '', '0.0', '25.0', '23.0', '0', '17', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1632', '39', '东坡肉盖饭', '', '', '0.0', '15.0', '15.0', '0', '146', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1633', '39', '宫保鸡丁饭（辣）', '', '', '0.0', '15.0', '15.0', '0', '146', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1634', '39', '菌菇咖喱饭', '', '', '0.0', '15.0', '15.0', '0', '146', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1635', '39', '咖喱鸡', '', '', '0.0', '15.0', '15.0', '0', '146', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1636', '39', '咖喱牛肉饭', '', '', '0.0', '15.0', '15.0', '0', '146', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1637', '39', '辣子仔排饭', '', '', '0.0', '0.1', '15.0', '0', '146', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1638', '39', '卤肉饭', '', '', '0.0', '15.0', '15.0', '0', '146', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1639', '39', '麻辣鱼片饭', '', '', '0.0', '15.0', '15.0', '0', '146', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1640', '39', '牛肉饭', '', '', '0.0', '15.0', '15.0', '0', '146', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1641', '39', '香辣鸡', '', '', '0.0', '15.0', '15.0', '0', '146', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1642', '39', '香辣牛柳饭（辣）', '', '', '0.0', '15.0', '15.0', '0', '146', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1643', '39', '鱼香肉丝', '', '', '0.0', '15.0', '15.0', '0', '146', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1644', '23', '炭火烤鱼(送30元券，限店内食用)', '', '', '0.0', '0.0', '0.0', '0', '68', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1645', '33', '章鱼丸', '', '', '0.0', '2.0', '2.0', '0', '125', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1646', '33', '小布丁', '', '', '0.0', '2.0', '2.0', '0', '125', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1647', '23', '干锅娃娃菜', '', '', '0.0', '23.0', '23.0', '0', '68', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1648', '23', '蔬菜砂锅', '', '', '0.0', '17.0', '17.0', '0', '68', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1649', '23', '橙汁藕片', '', '', '0.0', '11.0', '11.0', '0', '69', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1650', '23', '泡椒凤爪', '', '', '0.0', '13.0', '13.0', '0', '69', '0', '0', '0');
INSERT INTO `onethink_food` VALUES ('1651', '23', '酸辣汤(小)', '', '', '0.0', '9.0', '9.0', '0', '67', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1661', '40', '超值套餐(普通肉夹馍+臊子面+冰峰)', '', '', '0.0', '26.0', '26.0', '0', '147', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1662', '40', '畅享套餐(招牌肉夹馍+麻酱凉皮)', '', '', '0.0', '20.0', '20.0', '0', '147', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1663', '40', '招牌肉夹馍(肥瘦)', '', '', '0.0', '12.0', '12.0', '0', '148', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1664', '40', '招牌肉夹馍(纯瘦)', '', '', '0.0', '14.0', '14.0', '0', '148', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1665', '40', '普通肉夹馍(肥瘦)', '', '', '0.0', '7.0', '7.0', '0', '148', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1666', '40', '普通肉夹馍(纯瘦)', '', '', '0.0', '8.0', '8.0', '0', '148', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1667', '40', '卤肉盖浇饭(套餐)', '', '', '0.0', '26.0', '26.0', '0', '147', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1668', '40', '黑椒牛柳盖浇饭(套餐)', '', '', '0.0', '25.0', '25.0', '0', '149', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1669', '40', '酱香排骨盖浇饭(套餐)', '', '', '0.0', '25.0', '25.0', '0', '149', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1670', '40', '梅菜扣肉盖浇饭(套餐)', '', '', '0.0', '25.0', '25.0', '0', '149', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1671', '40', '臊子面', '', '', '0.0', '16.0', '16.0', '0', '149', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1672', '40', '油泼扯面', '', '', '0.0', '16.0', '16.0', '0', '149', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1673', '40', '炸酱面', '', '', '0.0', '16.0', '16.0', '0', '149', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1674', '40', '老坛酸菜肉丝面', '', '', '0.0', '16.0', '16.0', '0', '149', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1675', '40', '招牌干拌面', '', '', '0.0', '17.0', '17.0', '0', '149', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1676', '40', '番茄鸡蛋面', '', '', '0.0', '13.0', '13.0', '0', '149', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1677', '40', '原汁重庆小面', '', '', '0.0', '13.0', '13.0', '0', '149', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1678', '40', '重庆小面(牛肉)', '', '', '0.0', '19.0', '19.0', '0', '149', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1679', '40', '重庆小面(排骨)', '', '', '0.0', '19.0', '19.0', '0', '149', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1680', '40', '重庆小面(肥肠)', '', '', '0.0', '19.0', '19.0', '0', '149', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1681', '40', '麻酱凉皮', '', '', '0.0', '10.0', '10.0', '0', '150', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1682', '40', '秦镇面皮', '', '', '0.0', '9.0', '9.0', '0', '150', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1683', '40', '酸辣粉', '', '', '0.0', '11.0', '11.0', '0', '150', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1684', '40', '麻辣粉', '', '', '0.0', '11.0', '11.0', '0', '150', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1694', '41', '鲍鱼鲜肉汤包(8只)', '', '', '0.0', '27.0', '27.0', '0', '151', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1695', '41', '金奖蟹黄汤包(8只)', '', '', '0.0', '23.0', '23.0', '0', '151', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1696', '41', '大黄花鱼汤包(8只)', '', '', '0.0', '19.0', '19.0', '0', '151', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1697', '41', '板栗猪肉汤包(8只)', '', '', '0.0', '17.0', '17.0', '0', '151', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1698', '41', '招牌蟹黄汤包(8只)', '', '', '0.0', '17.0', '17.0', '0', '151', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1699', '41', '招牌蟹粉汤包(8只)', '', '', '0.0', '17.0', '17.0', '0', '151', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1700', '41', '虾仁汤包(8只)', '', '', '0.0', '15.0', '15.0', '0', '151', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1701', '41', '翡翠芹菜汤包(8只)', '', '', '0.0', '13.0', '13.0', '0', '151', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1702', '41', '香菇荠菜汤包(8只)', '', '', '0.0', '13.0', '13.0', '0', '151', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1703', '41', '黄金玉米汤包(8只)', '', '', '0.0', '11.0', '11.0', '0', '151', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1704', '41', '鲜肉汤包(8只)', '', '', '0.0', '9.0', '9.0', '0', '151', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1705', '41', '蟹肉大馄饨(10只)', '', '', '0.0', '23.0', '23.0', '0', '152', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1706', '41', '招牌鲜虾大馄饨(10只)', '', '', '0.0', '17.0', '17.0', '0', '152', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1707', '41', '三鲜大馄饨(10只)', '', '', '0.0', '17.0', '17.0', '0', '152', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1708', '41', '香菇猪肉大馄饨(10只)', '', '', '0.0', '17.0', '17.0', '0', '152', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1709', '41', '鲜肉馄饨(10只)', '', '', '0.0', '13.0', '13.0', '0', '152', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1710', '41', '紫菜蛋皮汤', '', '', '0.0', '7.0', '7.0', '0', '153', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1711', '41', '鲜蔬贡丸汤', '', '', '0.0', '7.0', '7.0', '0', '153', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1712', '41', '油豆腐粉丝汤', '', '', '0.0', '7.0', '7.0', '0', '153', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1713', '41', '老上海双档汤', '', '', '0.0', '9.0', '9.0', '0', '153', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1714', '41', '香浓小排汤', '', '', '0.0', '11.0', '11.0', '0', '153', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1715', '41', '养生菌菇汤', '', '', '0.0', '11.0', '11.0', '0', '153', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1716', '41', '特色酸辣汤', '', '', '0.0', '11.0', '11.0', '0', '153', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1717', '41', '老鸭粉丝汤', '', '', '0.0', '17.0', '17.0', '0', '153', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1718', '41', '酸辣海带', '', '', '0.0', '7.0', '7.0', '0', '153', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1719', '41', '五香花生', '', '', '0.0', '7.0', '7.0', '0', '153', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1720', '41', '酸辣土豆丝', '', '', '0.0', '7.0', '7.0', '0', '153', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1721', '41', '蒜香黄瓜', '', '', '0.0', '7.0', '7.0', '0', '153', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1722', '41', '翡翠莴笋', '', '', '0.0', '7.0', '7.0', '0', '153', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1723', '41', '香辣木耳', '', '', '0.0', '9.0', '9.0', '0', '153', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1724', '41', '红油肚丝', '', '', '0.0', '17.0', '17.0', '0', '153', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1725', '41', '上海烤子鱼', '', '', '0.0', '19.0', '19.0', '0', '153', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1726', '41', '口水鸡', '', '', '0.0', '27.0', '27.0', '0', '153', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1727', '41', '招牌槽卤猪手', '', '', '0.0', '17.0', '17.0', '0', '153', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1728', '41', '鱼丸粉', '', '', '0.0', '15.0', '15.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1729', '41', '猪舌粉', '', '', '0.0', '17.0', '17.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1730', '41', '牛腩粉', '', '', '0.0', '19.0', '19.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1731', '41', '肥肠粉', '', '', '0.0', '19.0', '19.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1732', '41', '鲳鱼海鲜面', '', '', '0.0', '37.0', '37.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1733', '41', '三鲜肚皮面', '', '', '0.0', '27.0', '27.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1734', '41', '鳕鱼豆腐蛭子面', '', '', '0.0', '27.0', '27.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1735', '41', '猪肚小排面', '', '', '0.0', '25.0', '25.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1736', '41', '蛤蜊小排面', '', '', '0.0', '23.0', '23.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1737', '41', '酸菜黄鱼面', '', '', '0.0', '23.0', '23.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1738', '41', '养生三鲜面', '', '', '0.0', '19.0', '19.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1739', '41', '招牌黄鱼面', '', '', '0.0', '23.0', '23.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1740', '41', '葱油拌面', '', '', '0.0', '9.0', '9.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1741', '41', '素鸡面', '', '', '0.0', '11.0', '11.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1742', '41', '雪菜肉丝面', '', '', '0.0', '11.0', '11.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1743', '41', '辣肉面', '', '', '0.0', '14.0', '14.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1744', '41', '双菇素什锦面', '', '', '0.0', '14.0', '14.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1745', '41', '美味大排面', '', '', '0.0', '17.0', '17.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1746', '41', '招牌大肉面', '', '', '0.0', '16.0', '16.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1747', '41', '香菇卤肉面', '', '', '0.0', '17.0', '17.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1748', '41', '红烧牛肉面', '', '', '0.0', '19.0', '19.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1749', '41', '红烧狮子头面', '', '', '0.0', '19.0', '19.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1750', '41', '咖喱牛肉面', '', '', '0.0', '19.0', '19.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1751', '41', '肥肠面', '', '', '0.0', '19.0', '19.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1752', '41', '招牌番茄牛肉面', '', '', '0.0', '23.0', '23.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1753', '41', '虾仁腰花面', '', '', '0.0', '27.0', '27.0', '0', '154', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1760', '23', '西红柿炒蛋', '', '', '0.0', '19.0', '19.0', '0', '68', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1761', '23', '鱼香肉丝', '', '', '0.0', '25.0', '25.0', '0', '68', '1', '32', '0');
INSERT INTO `onethink_food` VALUES ('1762', '23', '干煸芸豆', '', '', '0.0', '25.0', '25.0', '0', '68', '1', '33', '0');
INSERT INTO `onethink_food` VALUES ('1763', '23', '豆花里脊', '', '', '0.0', '31.0', '31.0', '0', '68', '1', '33', '0');
INSERT INTO `onethink_food` VALUES ('1764', '23', '山芹里脊', '', '', '0.0', '25.0', '25.0', '0', '68', '1', '33', '0');
INSERT INTO `onethink_food` VALUES ('1765', '23', '辣炒鸡心', '', '', '0.0', '20.0', '20.0', '0', '68', '1', '33', '0');
INSERT INTO `onethink_food` VALUES ('1766', '23', '辣炒鸡心', '', '', '0.0', '20.0', '20.0', '0', '68', '1', '33', '0');
INSERT INTO `onethink_food` VALUES ('1767', '42', '麻辣海虾', '', '', '0.0', '60.0', '60.0', '0', '155', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1768', '42', '麻辣小龙虾 {小}', '', '', '0.0', '50.0', '50.0', '0', '155', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('1769', '42', '麻辣小龙虾 {大}', '', '', '0.0', '90.0', '90.0', '0', '155', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('1770', '42', '牛蛙', '', '', '0.0', '60.0', '60.0', '0', '155', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('1771', '42', '麻辣螃蟹', '', '', '0.0', '60.0', '60.0', '0', '155', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('1772', '42', '香辣虾虎', '', '', '0.0', '60.0', '60.0', '0', '155', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('1773', '42', '麻辣金针菇', '', '', '0.0', '20.0', '20.0', '0', '155', '1', '6', '0');
INSERT INTO `onethink_food` VALUES ('1774', '42', '麻辣钉螺', '', '', '0.0', '20.0', '20.0', '0', '155', '1', '7', '0');
INSERT INTO `onethink_food` VALUES ('1775', '42', '麻辣鸭肠', '', '', '0.0', '30.0', '30.0', '0', '155', '1', '8', '0');
INSERT INTO `onethink_food` VALUES ('1776', '42', '麻辣鸭头', '', '', '0.0', '30.0', '30.0', '0', '155', '1', '9', '0');
INSERT INTO `onethink_food` VALUES ('1777', '42', '孜盐鱿鱼', '', '', '0.0', '40.0', '40.0', '0', '155', '1', '10', '0');
INSERT INTO `onethink_food` VALUES ('1778', '42', '麻辣鱿鱼', '', '', '0.0', '40.0', '40.0', '0', '155', '1', '11', '0');
INSERT INTO `onethink_food` VALUES ('1779', '42', '麻辣鸭舌', '', '', '0.0', '50.0', '50.0', '0', '155', '1', '12', '0');
INSERT INTO `onethink_food` VALUES ('1780', '42', '板栗烧肉', '', '', '0.0', '50.0', '50.0', '0', '155', '1', '13', '0');
INSERT INTO `onethink_food` VALUES ('1781', '42', '蛋黄山药', '', '', '0.0', '30.0', '30.0', '0', '155', '1', '14', '0');
INSERT INTO `onethink_food` VALUES ('1782', '42', '麻辣藕片', '', '', '0.0', '20.0', '20.0', '0', '155', '1', '15', '0');
INSERT INTO `onethink_food` VALUES ('1783', '42', '风味茄子', '', '', '0.0', '28.0', '28.0', '0', '155', '1', '16', '0');
INSERT INTO `onethink_food` VALUES ('1784', '42', '麻辣鸡爪', '', '', '0.0', '30.0', '30.0', '0', '155', '1', '17', '0');
INSERT INTO `onethink_food` VALUES ('1785', '42', '香辣比管', '', '', '0.0', '40.0', '40.0', '0', '155', '1', '18', '0');
INSERT INTO `onethink_food` VALUES ('1786', '42', '鱼豆腐', '', '', '0.0', '30.0', '30.0', '0', '155', '1', '19', '0');
INSERT INTO `onethink_food` VALUES ('1787', '42', '墨鱼丸', '', '', '0.0', '30.0', '30.0', '0', '155', '1', '20', '0');
INSERT INTO `onethink_food` VALUES ('1788', '42', '牛板筋', '', '', '0.0', '30.0', '30.0', '0', '155', '1', '21', '0');
INSERT INTO `onethink_food` VALUES ('1789', '42', '麻辣蟹钳', '', '', '0.0', '33.0', '33.0', '0', '155', '1', '22', '0');
INSERT INTO `onethink_food` VALUES ('1790', '42', '玉米沙拉', '', '', '0.0', '20.0', '20.0', '0', '155', '1', '23', '0');
INSERT INTO `onethink_food` VALUES ('1791', '42', '麻辣豆腐', '', '', '0.0', '20.0', '20.0', '0', '155', '1', '24', '0');
INSERT INTO `onethink_food` VALUES ('1792', '42', '亲亲肠', '', '', '0.0', '20.0', '20.0', '0', '155', '1', '25', '0');
INSERT INTO `onethink_food` VALUES ('1793', '42', '麻辣鸡翅', '', '', '0.0', '40.0', '40.0', '0', '155', '1', '26', '0');
INSERT INTO `onethink_food` VALUES ('1794', '42', '可乐鸡翅', '', '', '0.0', '40.0', '40.0', '0', '155', '1', '27', '0');
INSERT INTO `onethink_food` VALUES ('1795', '42', '麻辣猪皮', '', '', '0.0', '30.0', '30.0', '0', '155', '1', '28', '0');
INSERT INTO `onethink_food` VALUES ('1796', '42', '蛤蜊', '', '', '0.0', '20.0', '20.0', '0', '155', '1', '29', '0');
INSERT INTO `onethink_food` VALUES ('1797', '42', '领鲜大排骨', '', '', '0.0', '50.0', '50.0', '0', '155', '1', '30', '0');
INSERT INTO `onethink_food` VALUES ('1798', '42', '猪蹄', '', '', '0.0', '50.0', '50.0', '0', '155', '1', '31', '0');
INSERT INTO `onethink_food` VALUES ('1799', '42', '酸辣土豆丝', '', '', '0.0', '20.0', '20.0', '0', '155', '1', '32', '0');
INSERT INTO `onethink_food` VALUES ('1800', '42', '香辣肉丝', '', '', '0.0', '40.0', '40.0', '0', '155', '1', '33', '0');
INSERT INTO `onethink_food` VALUES ('1801', '42', '乳香腌肉', '', '', '0.0', '38.0', '38.0', '0', '155', '1', '34', '0');
INSERT INTO `onethink_food` VALUES ('1802', '42', '鸡米花', '', '', '0.0', '20.0', '20.0', '0', '155', '1', '35', '0');
INSERT INTO `onethink_food` VALUES ('1803', '42', '熏巴鱼', '', '', '0.0', '40.0', '40.0', '0', '155', '1', '36', '0');
INSERT INTO `onethink_food` VALUES ('1804', '42', '风味小银鱼', '', '', '0.0', '20.0', '20.0', '0', '155', '1', '37', '0');
INSERT INTO `onethink_food` VALUES ('1805', '42', '虎皮尖椒', '', '', '0.0', '20.0', '20.0', '0', '155', '1', '38', '0');
INSERT INTO `onethink_food` VALUES ('1806', '42', '十三香小龙虾', '', '', '0.0', '100.0', '100.0', '0', '155', '1', '39', '0');
INSERT INTO `onethink_food` VALUES ('1807', '42', '双皮奶(招牌)', '', '', '0.0', '5.0', '5.0', '0', '155', '1', '0', '0');
INSERT INTO `onethink_food` VALUES ('1808', '43', '测试一', '', '', '0.0', '11.0', '111.0', '0', '156', '1', '1', '0');
INSERT INTO `onethink_food` VALUES ('1809', '43', '测试二', '', '', '0.0', '12.0', '122.0', '0', '157', '1', '2', '0');
INSERT INTO `onethink_food` VALUES ('1810', '43', '三', '/Upload/foodlist/43/43_1.jpg', '', '0.0', '13.0', '133.0', '0', '156', '1', '3', '0');
INSERT INTO `onethink_food` VALUES ('1811', '43', '四', '', '', '0.0', '14.0', '144.0', '0', '157', '1', '4', '0');
INSERT INTO `onethink_food` VALUES ('1812', '43', '五', '', '', '0.0', '15.0', '155.0', '0', '156', '1', '5', '0');
INSERT INTO `onethink_food` VALUES ('1813', '44', '菜品一', '', '', '0.0', '10.0', '10.0', '0', '165', '1', '1', '1439628867');
INSERT INTO `onethink_food` VALUES ('1814', '44', '菜品二', '', '', '0.0', '10.0', '10.0', '0', '165', '1', '2', '1439628942');
INSERT INTO `onethink_food` VALUES ('1815', '44', '菜品三', '', '', '0.0', '13.0', '13.0', '0', '165', '1', '2', '1439628964');
INSERT INTO `onethink_food` VALUES ('1816', '44', '菜品三', '', '', '0.0', '13.0', '13.0', '0', '165', '1', '2', '1439628998');
INSERT INTO `onethink_food` VALUES ('1817', '44', '菜品四', '', '', '0.0', '14.0', '14.0', '0', '165', '1', '14', '1439702726');
INSERT INTO `onethink_food` VALUES ('1818', '44', '菜单五', '', '', '0.0', '15.0', '15.0', '0', '165', '1', '15', '1439703070');
INSERT INTO `onethink_food` VALUES ('1819', '44', '菜品六', '', '', '0.0', '16.0', '16.0', '0', '165', '1', '16', '1439703838');
INSERT INTO `onethink_food` VALUES ('1820', '44', '菜品六', '', '', '0.0', '16.0', '16.0', '0', '165', '1', '16', '1439703859');
INSERT INTO `onethink_food` VALUES ('1821', '44', '七', '', '', '0.0', '7.0', '7.0', '0', '165', '1', '7', '1439704251');
INSERT INTO `onethink_food` VALUES ('1822', '44', '八', '', '', '0.0', '8.0', '8.0', '0', '165', '1', '8', '1439704661');
INSERT INTO `onethink_food` VALUES ('1823', '44', '九', '', '', '0.0', '9.0', '9.0', '0', '165', '1', '9', '1439705090');
INSERT INTO `onethink_food` VALUES ('1824', '44', '十', '', '', '0.0', '10.0', '10.0', '0', '165', '1', '10', '1439705154');
INSERT INTO `onethink_food` VALUES ('1825', '44', '十一', '', '', '0.0', '11.0', '11.0', '0', '165', '1', '11', '1439712161');
INSERT INTO `onethink_food` VALUES ('1826', '44', '十二', '', '', '0.0', '11.0', '11.0', '0', '165', '1', '11', '1439712172');

-- ----------------------------
-- Table structure for `onethink_food_type`
-- ----------------------------
DROP TABLE IF EXISTS `onethink_food_type`;
CREATE TABLE `onethink_food_type` (
  `id` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `shopid` tinyint(10) unsigned NOT NULL,
  `type_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `shopid` (`shopid`)
) ENGINE=MyISAM AUTO_INCREMENT=166 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of onethink_food_type
-- ----------------------------
INSERT INTO `onethink_food_type` VALUES ('12', '7', '饭食');
INSERT INTO `onethink_food_type` VALUES ('13', '7', '配餐');
INSERT INTO `onethink_food_type` VALUES ('14', '7', '汉堡');
INSERT INTO `onethink_food_type` VALUES ('15', '8', '饭食');
INSERT INTO `onethink_food_type` VALUES ('16', '8', '配餐');
INSERT INTO `onethink_food_type` VALUES ('17', '8', '汉堡');
INSERT INTO `onethink_food_type` VALUES ('18', '9', '披萨');
INSERT INTO `onethink_food_type` VALUES ('19', '9', '饭食');
INSERT INTO `onethink_food_type` VALUES ('20', '9', '意大利面');
INSERT INTO `onethink_food_type` VALUES ('21', '9', '米线');
INSERT INTO `onethink_food_type` VALUES ('22', '9', '小吃');
INSERT INTO `onethink_food_type` VALUES ('23', '9', '汤');
INSERT INTO `onethink_food_type` VALUES ('24', '9', '套餐');
INSERT INTO `onethink_food_type` VALUES ('25', '10', '排骨');
INSERT INTO `onethink_food_type` VALUES ('26', '10', '肋排');
INSERT INTO `onethink_food_type` VALUES ('27', '11', '水饺、主食');
INSERT INTO `onethink_food_type` VALUES ('28', '11', '炒菜');
INSERT INTO `onethink_food_type` VALUES ('29', '11', '汤类');
INSERT INTO `onethink_food_type` VALUES ('30', '11', '凉菜');
INSERT INTO `onethink_food_type` VALUES ('31', '12', '炒菜');
INSERT INTO `onethink_food_type` VALUES ('32', '12', '凉菜');
INSERT INTO `onethink_food_type` VALUES ('33', '12', '主食');
INSERT INTO `onethink_food_type` VALUES ('34', '12', '汤类');
INSERT INTO `onethink_food_type` VALUES ('35', '13', '特色菜');
INSERT INTO `onethink_food_type` VALUES ('11', '13', '拌面、主食');
INSERT INTO `onethink_food_type` VALUES ('10', '13', '拉条子拌面菜');
INSERT INTO `onethink_food_type` VALUES ('38', '14', '炒菜');
INSERT INTO `onethink_food_type` VALUES ('39', '14', '凉菜');
INSERT INTO `onethink_food_type` VALUES ('40', '14', '汤类');
INSERT INTO `onethink_food_type` VALUES ('41', '14', '面、饼');
INSERT INTO `onethink_food_type` VALUES ('42', '15', '锅贴');
INSERT INTO `onethink_food_type` VALUES ('43', '16', '粥、主食');
INSERT INTO `onethink_food_type` VALUES ('44', '16', '炒菜');
INSERT INTO `onethink_food_type` VALUES ('45', '16', '主食');
INSERT INTO `onethink_food_type` VALUES ('46', '16', '汤类');
INSERT INTO `onethink_food_type` VALUES ('47', '16', '凉菜');
INSERT INTO `onethink_food_type` VALUES ('48', '17', '火烧类');
INSERT INTO `onethink_food_type` VALUES ('49', '17', '汤类');
INSERT INTO `onethink_food_type` VALUES ('50', '17', '凉菜类');
INSERT INTO `onethink_food_type` VALUES ('51', '17', '素菜类');
INSERT INTO `onethink_food_type` VALUES ('52', '17', '炒菜类');
INSERT INTO `onethink_food_type` VALUES ('53', '18', '小吃');
INSERT INTO `onethink_food_type` VALUES ('54', '18', '面条、米线');
INSERT INTO `onethink_food_type` VALUES ('55', '18', '药膳炖汤');
INSERT INTO `onethink_food_type` VALUES ('56', '18', '卤味套饭');
INSERT INTO `onethink_food_type` VALUES ('57', '19', '过桥饭');
INSERT INTO `onethink_food_type` VALUES ('58', '19', '套餐');
INSERT INTO `onethink_food_type` VALUES ('59', '19', '过桥米线');
INSERT INTO `onethink_food_type` VALUES ('60', '19', '小吃');
INSERT INTO `onethink_food_type` VALUES ('61', '19', '饮品');
INSERT INTO `onethink_food_type` VALUES ('62', '20', '牛扒饭');
INSERT INTO `onethink_food_type` VALUES ('63', '21', '鸡米饭');
INSERT INTO `onethink_food_type` VALUES ('65', '22', '饭食');
INSERT INTO `onethink_food_type` VALUES ('66', '22', '小吃');
INSERT INTO `onethink_food_type` VALUES ('67', '23', '主食、汤类');
INSERT INTO `onethink_food_type` VALUES ('68', '23', '主题菜品');
INSERT INTO `onethink_food_type` VALUES ('69', '23', '爽口凉菜');
INSERT INTO `onethink_food_type` VALUES ('71', '24', '招牌');
INSERT INTO `onethink_food_type` VALUES ('72', '24', '套餐');
INSERT INTO `onethink_food_type` VALUES ('73', '24', '面食');
INSERT INTO `onethink_food_type` VALUES ('74', '24', '汤类');
INSERT INTO `onethink_food_type` VALUES ('75', '24', '主食小吃');
INSERT INTO `onethink_food_type` VALUES ('76', '24', '肉蛋类炒菜');
INSERT INTO `onethink_food_type` VALUES ('77', '24', '素炒菜');
INSERT INTO `onethink_food_type` VALUES ('78', '24', '凉菜');
INSERT INTO `onethink_food_type` VALUES ('79', '25', '套餐');
INSERT INTO `onethink_food_type` VALUES ('80', '25', '主食');
INSERT INTO `onethink_food_type` VALUES ('81', '25', '小食');
INSERT INTO `onethink_food_type` VALUES ('82', '25', '饮品');
INSERT INTO `onethink_food_type` VALUES ('83', '15', '凉菜');
INSERT INTO `onethink_food_type` VALUES ('84', '15', '粥、汤');
INSERT INTO `onethink_food_type` VALUES ('85', '21', '加菜');
INSERT INTO `onethink_food_type` VALUES ('86', '13', '素菜');
INSERT INTO `onethink_food_type` VALUES ('87', '13', '凉菜、汤');
INSERT INTO `onethink_food_type` VALUES ('88', '26', ' 寿司套餐');
INSERT INTO `onethink_food_type` VALUES ('89', '26', '招牌寿司');
INSERT INTO `onethink_food_type` VALUES ('90', '26', '寿司手卷');
INSERT INTO `onethink_food_type` VALUES ('91', '27', '馄饨');
INSERT INTO `onethink_food_type` VALUES ('92', '27', '套餐');
INSERT INTO `onethink_food_type` VALUES ('93', '27', '面类');
INSERT INTO `onethink_food_type` VALUES ('94', '27', '小食');
INSERT INTO `onethink_food_type` VALUES ('95', '28', '筒骨饭(套餐)');
INSERT INTO `onethink_food_type` VALUES ('96', '28', '排骨饭(套餐)');
INSERT INTO `onethink_food_type` VALUES ('97', '28', '骨汤水饺(套餐)');
INSERT INTO `onethink_food_type` VALUES ('98', '28', '加菜(限筒骨饭)');
INSERT INTO `onethink_food_type` VALUES ('99', '30', '熏烤');
INSERT INTO `onethink_food_type` VALUES ('100', '30', '凉菜');
INSERT INTO `onethink_food_type` VALUES ('101', '30', '主食、小吃');
INSERT INTO `onethink_food_type` VALUES ('102', '29', '特色菜');
INSERT INTO `onethink_food_type` VALUES ('103', '29', '肉类');
INSERT INTO `onethink_food_type` VALUES ('104', '29', '青菜类');
INSERT INTO `onethink_food_type` VALUES ('105', '29', '汤类');
INSERT INTO `onethink_food_type` VALUES ('107', '29', '海鲜类');
INSERT INTO `onethink_food_type` VALUES ('108', '29', '凉菜类');
INSERT INTO `onethink_food_type` VALUES ('109', '29', '主食、甜品');
INSERT INTO `onethink_food_type` VALUES ('113', '32', '主食、甜品');
INSERT INTO `onethink_food_type` VALUES ('114', '32', '金牌菜');
INSERT INTO `onethink_food_type` VALUES ('115', '32', '热菜');
INSERT INTO `onethink_food_type` VALUES ('116', '32', '凉菜');
INSERT INTO `onethink_food_type` VALUES ('117', '32', '肉类');
INSERT INTO `onethink_food_type` VALUES ('118', '32', '素菜类');
INSERT INTO `onethink_food_type` VALUES ('119', '32', '汤类');
INSERT INTO `onethink_food_type` VALUES ('122', '33', '蘸酱');
INSERT INTO `onethink_food_type` VALUES ('123', '33', '素菜类(称重16/斤)');
INSERT INTO `onethink_food_type` VALUES ('124', '33', '主食类(称重16/斤)');
INSERT INTO `onethink_food_type` VALUES ('125', '33', '丸子、肉类');
INSERT INTO `onethink_food_type` VALUES ('126', '33', '鲜肉切盘');
INSERT INTO `onethink_food_type` VALUES ('127', '34', '咖喱饭');
INSERT INTO `onethink_food_type` VALUES ('128', '35', '面食');
INSERT INTO `onethink_food_type` VALUES ('129', '35', '凉菜,酱骨');
INSERT INTO `onethink_food_type` VALUES ('130', '36', '主食');
INSERT INTO `onethink_food_type` VALUES ('131', '36', '凉菜,小食');
INSERT INTO `onethink_food_type` VALUES ('132', '36', '热菜');
INSERT INTO `onethink_food_type` VALUES ('133', '25', '特惠套餐');
INSERT INTO `onethink_food_type` VALUES ('134', '15', '热菜');
INSERT INTO `onethink_food_type` VALUES ('135', '35', '饭食,水饺');
INSERT INTO `onethink_food_type` VALUES ('136', '37', '主食、凉菜');
INSERT INTO `onethink_food_type` VALUES ('137', '37', '锅底');
INSERT INTO `onethink_food_type` VALUES ('138', '37', '配菜(荤菜)');
INSERT INTO `onethink_food_type` VALUES ('139', '37', '配菜(素菜)');
INSERT INTO `onethink_food_type` VALUES ('141', '38', '特色');
INSERT INTO `onethink_food_type` VALUES ('142', '38', '主食、汤');
INSERT INTO `onethink_food_type` VALUES ('143', '38', '荤菜');
INSERT INTO `onethink_food_type` VALUES ('144', '38', '素菜');
INSERT INTO `onethink_food_type` VALUES ('145', '38', '凉菜');
INSERT INTO `onethink_food_type` VALUES ('146', '39', '盖饭');
INSERT INTO `onethink_food_type` VALUES ('147', '40', '套餐');
INSERT INTO `onethink_food_type` VALUES ('148', '40', '肉夹馍');
INSERT INTO `onethink_food_type` VALUES ('149', '40', '盖浇饭、面食');
INSERT INTO `onethink_food_type` VALUES ('150', '40', '凉皮、汤粉');
INSERT INTO `onethink_food_type` VALUES ('151', '41', '汤包类');
INSERT INTO `onethink_food_type` VALUES ('152', '41', '馄饨');
INSERT INTO `onethink_food_type` VALUES ('153', '41', '汤、小菜');
INSERT INTO `onethink_food_type` VALUES ('154', '41', '粉面系列');
INSERT INTO `onethink_food_type` VALUES ('155', '42', '麻辣海鲜');
INSERT INTO `onethink_food_type` VALUES ('156', '43', '测试类别一');
INSERT INTO `onethink_food_type` VALUES ('157', '43', '测试类别二');
INSERT INTO `onethink_food_type` VALUES ('158', '45', '测试类别一');
INSERT INTO `onethink_food_type` VALUES ('159', '45', '测试类别二');
INSERT INTO `onethink_food_type` VALUES ('160', '45', '类别三');
INSERT INTO `onethink_food_type` VALUES ('161', '45', '类别四');
INSERT INTO `onethink_food_type` VALUES ('162', '45', '类别四');
INSERT INTO `onethink_food_type` VALUES ('163', '45', '类别五');
INSERT INTO `onethink_food_type` VALUES ('164', '45', '类别六');
INSERT INTO `onethink_food_type` VALUES ('165', '44', '类别一');

-- ----------------------------
-- Table structure for `onethink_news`
-- ----------------------------
DROP TABLE IF EXISTS `onethink_news`;
CREATE TABLE `onethink_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `keyword` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `publish_time` int(10) unsigned NOT NULL,
  `sort` int(10) unsigned NOT NULL,
  `status` tinyint(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of onethink_news
-- ----------------------------
INSERT INTO `onethink_news` VALUES ('1', '青岛开发区可以网上叫外卖啦！', '<div align=\"center\">\r\n	青岛开发区可以网上叫外卖啦！<br />\r\n</div>\r\n<br />\r\n随着社会的发展，生活节奏的加快，物质生活水平的提高，人们的餐饮方式和就餐习惯也在发生着深刻的变革。正呈现多样化和便捷化个性化的态势。叫外卖作为一种方便，快捷的生活方式，已经走进我们的日常生活。被越来越多的白领和家庭用户所接受。网上叫外卖做外外卖方式的一种升级更体现出便捷和高效。<br />\r\n<br />\r\n宅当家(www.26632.com)是青岛开发区本地以网上订餐及餐饮配送为一体的外卖网站，旨在服务本地居民和各路美食爱好者，宅当家集合青岛开发区专业的在线生活信息平台和线下即时配送物流，为用户创造便捷、安心的生活，为合作伙伴拓展业务和影响力半径，开创第三方外卖服务。<br />\r\n<br />\r\n我们精选了开发区本地最知名的品牌餐饮商家，包括老边饺子、舅姥爷砂锅店、德鑫全排骨米饭、陇上味道、粥粥到到、禧福村米线等。将各式美味全都为您送上门。<br />\r\n<br />\r\n同时为了保证送餐的服务质量和配送过程的安全性，宅当家的外卖配送环节全部由自己的配送团队完成，对配送环节实行高效安全的把控，保证餐品以最佳的状态送到您手。<br />\r\n<br />\r\n宅当家自上线以来，深受广大用户的欢迎，订单量也日趋增长。由于目前人手和规模的限制，薛家岛、保税区和金沙滩、银沙滩暂不提供配送。还望大家周知。<br />\r\n<br />\r\n宅当家将继续不断的通过提升技术水平和服务模式来更好的满足用户的需求。也欢迎大家多提宝贵建议，谢谢！<br />\r\n                            <br />\r\n                                                                                                                                                                                                                                                                             宅当家团队 <br />\r\n<br />', '青岛开发区外卖 青岛开发区外卖电话', '青岛开发区可以网上叫外卖啦，宅当家为本地居民提供网上叫外卖的订餐服务。', '1406515235', '1', '1');
INSERT INTO `onethink_news` VALUES ('15', '潼关肉夹馍、蟹黄汤包加入宅当家', '青岛开发区潼关肉夹馍、蟹黄汤包双双加入宅当家！<br /><br />\r\n\r\n潼关肉夹馍及蟹黄汤包是开发区很多吃货都广为熟悉的餐饮品牌，在过去的一段时间里，我们接受了很多用户的反馈和建议，本着对商家和用户负责，全心全意服务好广大的宅当家用户的态度，市场部已经与上述两家达成了合作协议！<br /><br />\r\n\r\n即日起，宅当家注册用户即可宅在家网站或手机微信，在线下单完成外卖的预定及配送服务，不出门便享受美食！<br />\r\n\r\n用户的需求一直是我们前进不竭的动力，我们一直为做的更好而努力着。<br /><br />\r\n\r\n\r\n                                                                                                                                                                                                                                                 宅当家团队\r\n', '青岛开发外卖、潼关肉夹馍外卖、蟹黄汤包外卖', '青岛开发潼关肉夹馍可以点外卖啦，蟹黄汤包也可以点外卖了，宅当家提供全套配送服务。', '1429199681', '1', '1');
INSERT INTO `onethink_news` VALUES ('13', '青岛开发区外卖网宅当家—使用帮助', '<div align=\"center\">\r\n	<span style=\"font-size:18px;\"><strong>宅当家外卖订餐-新手教程</strong></span><br />\r\n</div>\r\n<br />\r\n网上订餐大概需要三个步骤就可完成订餐，小编罗列在下方供大家参考。有问题可以随时QQ小编(2802706034)或者致电客服MM。<br />\r\n<br />\r\n<strong><span style=\"font-size:14px;\">一：注册登录</span></strong><br />\r\n1. 点击下方的红色圈位置，开始注册用户见图一<br />\r\n<img src=\"http://www.26632.com/Public/static/images/course/11.png\" alt=\"\" /><br />\r\n<br />\r\n2. 根据提示填写常用的用户名、密码、输入验证码即可<br />\r\n<img src=\"http://www.26632.com/Public/static/images/course/12.png\" width=\"396\" height=\"287\" alt=\"\" /><br />\r\n<br />\r\n3.注册后会提示注册成功，并自动跳转到首页，且已经是登录状态，见图三<br />\r\n<img src=\"http://www.26632.com/Public/static/images/course/13.png\" alt=\"\" /><br />\r\n<br />\r\n<strong><span style=\"font-size:14px;\">二：选定餐厅</span></strong><br />\r\n1.从餐厅列表中选择您中意的餐厅，点进去浏览菜单开始点餐。教程以<a target=\"_blank\" href=\"http://www.26632.com/Home/Shop/shopinfo/shopid/13\">陇上味道</a>为例，点进去就会到达下方的<a target=\"_blank\" href=\"http://www.26632.com/Home/Shop/shopinfo/shopid/13\">陇上味道</a>菜单界面。鼠标点击左侧的菜单即可在右上方的\"今日餐品\"中被添加，当日您也可以在餐品里面增加和减少订购的数量，选购完成后，点击下方的下一步(会进入到订单确认界面)。见图四<br />\r\n<img src=\"http://www.26632.com/Public/static/images/course/14.png\" width=\"600\" height=\"365\" alt=\"\" /><br />\r\n<br />\r\n<strong><span style=\"font-size:14px;\">三：确认订单</span></strong><br />\r\n1.在订单确认界面，再次查看您所点的菜品，有误可以点击重新订购，无误则可以提交订单。提交成功后会弹出对话框告诉您订单已经提交成功，见图五。<br />\r\n<img src=\"http://www.26632.com/Public/static/images/course/15.png\" width=\"600\" height=\"326\" alt=\"\" /><br />\r\n<br />\r\n2.点击确定后自动跳转到个人中心。您可以看到该单的状态为\"处理中\"(如图六)，工作人员会核实您的订单和配送区域，如果不在配送区域或订单有问题会主动通知您，如果订单无误则会马上接单，您刷新下页面后状态就会变为成功(如图七)。表示工作人员已经接单，并安排派送员给您配送了。整个过程您只需要等待配送员的送货上门即可。<br />\r\n<img src=\"http://www.26632.com/Public/static/images/course/16.png\" width=\"600\" height=\"131\" alt=\"\" /><br />\r\n<img src=\"http://www.26632.com/Public/static/images/course/17.png\" width=\"600\" height=\"131\" alt=\"\" /><br />\r\n<br />\r\n<span style=\"font-size:16px;color:#E53333;\">是不是很简单。连笨笨的小编都会，更何况电脑前聪明的您呢~~ <br />\r\n<a target=\"_blank\" href=\"http://www.26632.com\">宅当家</a>，青岛开发区专业外卖网站，只为给开发区广大用户带来更便捷的餐饮服务。走起~~~</span>', '青岛开发区外卖,宅当家,使用教程，新手教程', '帮助第一次使用青岛开发区外卖网站宅当家的用户尽快熟悉了解网上订餐的流程。', '1409130946', '2', '1');
INSERT INTO `onethink_news` VALUES ('14', '青岛开发区外卖美食—舅姥爷砂锅', '<div align=\"center\">\r\n	<span style=\"font-size:14px;\">青岛开发区美食—舅姥爷砂锅</span><br />\r\n</div>\r\n<br />\r\n&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<span style=\"font-size:14px;\"> </span><span style=\"font-size:14px;\">开发区的朋友，更确切点说是长江中路附近的朋友们应该都知道咱开发区有一家砂锅店生意特别的红火，没错，就是</span><a target=\"_blank\" href=\"http://www.26632.com/Home/Shop/shopinfo/shopid/23\"><span style=\"font-size:14px;color:#4C33E5;\"><u>舅姥爷砂锅</u></span></a><span style=\"font-size:14px;\">。今天就给大家全面的介绍下该店，毕竟还是有新朋友或者不了解的朋友需要补习下功课嘛。资深吃货嘛，可以去玩别的啦。</span><br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style=\"font-size:14px;\"> 舅姥爷砂锅是13年在咱青岛开发区井冈山路开设的。就饮食而言，大家普遍有个共识，那就是想要吃好吃的大餐，基本就要到传统的中餐馆去等候品尝，等待时间往往比较长一些。而普通的快餐虽然速度较快，但是在味道口感上却要大打折扣。而舅姥爷砂锅的创新就弥补了这种缺憾不足，将传统中餐的美味和快餐的速度很好的融合到了一起，让即便赶时间的上班族都能在短暂的午休时间品尝一顿美味大餐。每每饭点，餐厅爆满也就在情理之中啦。</span><br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style=\"font-size:14px;\"> 砂锅顾名思义，就是用砂锅炖出美味来。下面给大家介绍几道美食，也是广大顾客和厨师师傅们一致推荐的。他们分别是：鲶鱼砂锅、黄焖鸡砂锅、排骨砂锅和酸菜鱼砂锅。</span><br />\r\n<span style=\"font-size:14px;\"><span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span><span><span style=\"font-size:14px;\">鲶鱼砂锅</span></span></span><span style=\"font-size:14px;\">：</span><span style=\"font-size:14px;\">分量不轻，料也很足，有点辣，尤其适合重口味的。对一个懒得吃鱼因为刺多的人来说，鲶鱼还是很不错的，刺没那么多，肉也很鲜嫩。</span><span><span><br />\r\n<span style=\"font-size:14px;\"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 酸菜鱼砂锅</span></span><span style=\"font-size:14px;\">：鱼片还是蛮嫩的咧。记得有一次一个孕妇特意大老远跑来吃酸菜鱼砂锅，喜欢清淡的可以吃这个。</span></span><span><br />\r\n<span style=\"font-size:14px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 排骨砂锅</span><span style=\"font-size:14px;\">：2块超大的排骨吆，还有豆腐和白菜。排骨肉很好嚼，带着老人的话可以选择吃这个，还有豆腐和白菜粉条。</span></span><span><br />\r\n<span style=\"font-size:14px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 黄焖鸡砂锅</span><span style=\"font-size:14px;\">：鸡肉鲜嫩自然不必说，要说的是里面的小蘑菇，味道真的很棒</span><span style=\"font-size:14px;\">。很进味不说，还很多汁，吃起来感觉像灌汤包。有点微辣，现在黄焖鸡每天中午都是搞活动的，只要13.8元哦~~</span></span><br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style=\"font-size:14px;\">舅姥爷砂锅也是</span><a target=\"_blank\" href=\"http://www.26632.com\"><span style=\"font-size:14px;color:#4C33E5;\"><u>宅当家</u></span></a><span style=\"font-size:14px;\">的合作商家，当然也是支持网上订餐，享受外卖配送服务的。喜欢享受</span><a target=\"_blank\" href=\"http://www.26632.com/\"><span style=\"font-size:14px;color:#4C33E5;\"><u>青岛开发区外卖</u></span></a><span style=\"font-size:14px;\">的亲们，除了可以到店品尝美味外，也可以坐在家里点点鼠标就能享受我们舅姥爷砂锅的</span><span style=\"font-size:14px;\">外卖喽~~</span><br />\r\n<span style=\"font-size:14px;\"> &nbsp;&nbsp;&nbsp; </span><br />', '青岛开发区外卖 舅姥爷砂锅外卖 舅姥爷砂锅外卖电话', '舅姥爷砂锅是青岛开发区有口皆碑的美食店，同时支持外卖，让青岛开发区的吃货都能享受舅姥爷家的外卖美食。', '1410344824', '3', '1');

-- ----------------------------
-- Table structure for `onethink_order`
-- ----------------------------
DROP TABLE IF EXISTS `onethink_order`;
CREATE TABLE `onethink_order` (
  `snid` int(30) unsigned NOT NULL AUTO_INCREMENT COMMENT '流水号',
  `oid` varchar(30) NOT NULL COMMENT '订单号',
  `oname` char(16) NOT NULL COMMENT '订餐人名',
  `otel` varchar(16) NOT NULL COMMENT '订餐电话',
  `oaddress` varchar(200) NOT NULL COMMENT '订餐地址',
  `oip` varchar(20) NOT NULL COMMENT 'ip地址',
  `osum` decimal(5,1) NOT NULL COMMENT '订餐金额',
  `osum_real` decimal(5,1) NOT NULL COMMENT '真实价',
  `remark` varchar(100) NOT NULL COMMENT '用户备注',
  `oshop_id` int(20) unsigned NOT NULL,
  `opay` decimal(5,1) NOT NULL COMMENT '支付商家金额',
  `oshop_name` varchar(20) NOT NULL COMMENT '商家',
  `oshop_tel` char(40) NOT NULL,
  `oshop_address` varchar(30) NOT NULL,
  `send_price` tinyint(5) NOT NULL DEFAULT '0' COMMENT '配送费',
  `opublish` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `uname` varchar(16) NOT NULL COMMENT '用户名',
  `user_status` tinyint(5) NOT NULL COMMENT '新老用户',
  `pay_status` varchar(30) NOT NULL DEFAULT '0' COMMENT '支付状态,0到付，1已网付，2未网付',
  `alipay_trade_code` varchar(30) NOT NULL DEFAULT '0' COMMENT '商户订单号',
  `order_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '订单状态，0处理中，1已接单，2已取消',
  PRIMARY KEY (`snid`),
  KEY `uid` (`uid`),
  KEY `oshopid` (`oshop_id`),
  KEY `oid` (`oid`) USING BTREE,
  KEY `alipay_trade_code` (`alipay_trade_code`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5877 DEFAULT CHARSET=utf8 COMMENT='订单';

-- ----------------------------
-- Records of onethink_order
-- ----------------------------
INSERT INTO `onethink_order` VALUES ('5851', '55b6fa3f9d0bc9491', 'test1205', '12312331231', '开发区庐山小区', '127.0.0.1', '100.0', '29.0', '', '34', '0.0', '爱的咖喱亭', '13341239352', '长江中路238号', '0', '1438054975', '11', 'test1205', '2', '0', '0', '0');
INSERT INTO `onethink_order` VALUES ('5863', '955b9c6feafe520016', 'test1205', '12312331231', '开发区庐山小区', '127.0.0.1', '100.0', '21.0', '', '34', '0.0', '爱的咖喱亭', '13341239352', '长江中路238号', '100', '1438238462', '11', 'test1205', '2', '2', '0', '0');
INSERT INTO `onethink_order` VALUES ('5864', '255b9c7592cb0f0013', 'test1205', '12312', '开发区庐山小区', '127.0.0.1', '100.0', '21.0', '', '34', '0.0', '爱的咖喱亭', '13341239352', '长江中路238号', '100', '1438238553', '11', 'test1205', '2', '2', '0', '0');
INSERT INTO `onethink_order` VALUES ('5865', '155b9d2644229b0036', 'test1205', '12312331231', '开发区庐山小区', '127.0.0.1', '100.0', '21.0', '', '34', '0.0', '爱的咖喱亭', '13341239352', '长江中路238号', '100', '1438241380', '11', 'test1205', '2', '3', '143824137511', '0');
INSERT INTO `onethink_order` VALUES ('5866', '155b9d30da33300068', 'test1205', '12312331231', '开发区庐山小区', '127.0.0.1', '100.0', '21.0', '', '34', '0.0', '爱的咖喱亭', '13341239352', '长江中路238号', '100', '1438241549', '11', 'test1205', '2', '2', '143824152411', '0');
INSERT INTO `onethink_order` VALUES ('5867', '255b9d92d68e1b0008', 'test1205', '12312331231', '开发区庐山小区', '127.0.0.1', '100.0', '37.0', '', '34', '0.0', '爱的咖喱亭', '13341239352', '长江中路238号', '100', '1438243117', '11', 'test1205', '2', '2', '143824309711', '0');
INSERT INTO `onethink_order` VALUES ('5868', '755b9db10c1dfd0043', 'test1205', '12312331231', '开发区庐山小区', '127.0.0.1', '100.0', '37.0', '', '34', '0.0', '爱的咖喱亭', '13341239352', '长江中路238号', '100', '1438243600', '11', 'test1205', '2', '2', '143824359411', '0');
INSERT INTO `onethink_order` VALUES ('5869', '955b9e1f72b6b00037', 'test1205', '12312331231', '开发区庐山小区', '127.0.0.1', '100.0', '37.0', '', '34', '0.0', '爱的咖喱亭', '13341239352', '长江中路238号', '100', '1438245367', '11', 'test1205', '2', '2', '143824536411', '0');
INSERT INTO `onethink_order` VALUES ('5870', '455b9e4cccdce50016', 'test1205', '12312331231', '开发区庐山小区', '127.0.0.1', '100.0', '37.0', '', '34', '0.0', '爱的咖喱亭', '13341239352', '长江中路238号', '100', '1438246092', '11', 'test1205', '2', '2', '143824608611', '1');
INSERT INTO `onethink_order` VALUES ('5871', '255b9e552e03920096', 'test1205', '12312331231', '开发区庐山小区', '127.0.0.1', '100.0', '37.0', '', '34', '0.0', '爱的咖喱亭', '13341239352', '长江中路238号', '100', '1438246226', '11', 'test1205', '2', '1', '143824622111', '1');
INSERT INTO `onethink_order` VALUES ('5872', '155badf8d9497f0029', 'test1205', '12312331231', '开发区庐山小区', '127.0.0.1', '100.0', '30.0', '', '34', '0.0', '爱的咖喱亭', '13341239352', '长江中路238号', '100', '1438310285', '11', 'test1205', '2', '2', '143830999311', '2');
INSERT INTO `onethink_order` VALUES ('5873', '955bb52dd0ab7c0063', 'test1205', '12312331231', '开发区庐山小区', '127.0.0.1', '100.0', '37.0', '', '34', '0.0', '爱的咖喱亭', '13341239352', '长江中路238号', '100', '1438339805', '11', 'test1205', '2', '2', '143833980011', '1');
INSERT INTO `onethink_order` VALUES ('5874', '655bb532dca7200068', 'test1205', '12312331231', '开发区庐山小区', '127.0.0.1', '100.0', '37.0', '', '34', '0.0', '爱的咖喱亭', '13341239352', '长江中路238号', '100', '1438339885', '11', 'test1205', '2', '2', '143833980011', '2');
INSERT INTO `onethink_order` VALUES ('5875', '355bb53df764320041', 'test1205', '12312331231', '开发区庐山小区', '127.0.0.1', '100.0', '37.0', '', '34', '0.0', '爱的咖喱亭', '13341239352', '长江中路238号', '100', '1438340063', '11', 'test1205', '2', '1', '143834006111', '1');
INSERT INTO `onethink_order` VALUES ('5876', '455bb5450552530037', 'test1205', '12312331231', '开发区庐山小区', '127.0.0.1', '100.0', '37.0', '', '34', '0.0', '爱的咖喱亭', '13341239352', '长江中路238号', '100', '1438340176', '11', 'test1205', '2', '1', '143834017411', '1');

-- ----------------------------
-- Table structure for `onethink_order_list`
-- ----------------------------
DROP TABLE IF EXISTS `onethink_order_list`;
CREATE TABLE `onethink_order_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `snid` int(30) unsigned NOT NULL COMMENT '流水号',
  `fid` int(20) unsigned NOT NULL,
  `fname` varchar(30) NOT NULL COMMENT '菜名',
  `fprice` decimal(5,1) NOT NULL COMMENT '单价',
  `fnum` tinyint(10) unsigned NOT NULL COMMENT '数量',
  PRIMARY KEY (`id`),
  KEY `fid` (`fid`),
  KEY `snid` (`snid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=17537 DEFAULT CHARSET=utf8 COMMENT='订单菜品列表';

-- ----------------------------
-- Records of onethink_order_list
-- ----------------------------
INSERT INTO `onethink_order_list` VALUES ('17493', '5851', '1450', '蔬菜咖喱饭', '13.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17494', '5851', '1452', '香酥鱿鱼咖喱饭', '16.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17514', '5863', '1454', '猪排咖喱饭', '21.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17515', '5864', '1454', '猪排咖喱饭', '21.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17516', '5865', '1454', '猪排咖喱饭', '21.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17517', '5866', '1454', '猪排咖喱饭', '21.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17518', '5867', '1452', '香酥鱿鱼咖喱饭', '16.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17519', '5867', '1454', '猪排咖喱饭', '21.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17520', '5868', '1452', '香酥鱿鱼咖喱饭', '16.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17521', '5868', '1454', '猪排咖喱饭', '21.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17522', '5869', '1452', '香酥鱿鱼咖喱饭', '16.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17523', '5869', '1454', '猪排咖喱饭', '21.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17524', '5870', '1452', '香酥鱿鱼咖喱饭', '16.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17525', '5870', '1454', '猪排咖喱饭', '21.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17526', '5871', '1452', '香酥鱿鱼咖喱饭', '16.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17527', '5871', '1454', '猪排咖喱饭', '21.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17528', '5872', '1451', '鲜蔬可乐饼咖喱饭', '15.0', '2');
INSERT INTO `onethink_order_list` VALUES ('17529', '5873', '1455', '猪排饭', '21.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17530', '5873', '1457', '咖喱乌冬面', '16.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17531', '5874', '1455', '猪排饭', '21.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17532', '5874', '1457', '咖喱乌冬面', '16.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17533', '5875', '1455', '猪排饭', '21.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17534', '5875', '1457', '咖喱乌冬面', '16.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17535', '5876', '1455', '猪排饭', '21.0', '1');
INSERT INTO `onethink_order_list` VALUES ('17536', '5876', '1457', '咖喱乌冬面', '16.0', '1');

-- ----------------------------
-- Table structure for `onethink_shop`
-- ----------------------------
DROP TABLE IF EXISTS `onethink_shop`;
CREATE TABLE `onethink_shop` (
  `id` tinyint(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(30) CHARACTER SET utf32 NOT NULL COMMENT '店铺名称',
  `type` tinyint(10) unsigned NOT NULL DEFAULT '1' COMMENT '类型:1中餐,2西餐,3日韩,4生鲜',
  `show_type` tinyint(2) unsigned NOT NULL DEFAULT '1' COMMENT '1,文字类型,2图片类型',
  `address` varchar(20) NOT NULL COMMENT '地址',
  `business_hours` char(30) NOT NULL COMMENT '营业开始时间',
  `business_week` char(30) NOT NULL DEFAULT '0,1,2,3,4,5,6' COMMENT '星期几营业',
  `logo` varchar(60) NOT NULL DEFAULT '/Public/static/images/shop_mis.gif' COMMENT 'logo',
  `area_id` tinyint(10) NOT NULL DEFAULT '1' COMMENT '所属区域1黄岛,2市南,默认1',
  `start_price` tinyint(10) unsigned NOT NULL COMMENT '起送价',
  `send_price` tinyint(10) unsigned NOT NULL COMMENT '起送价',
  `telephone` char(40) NOT NULL COMMENT '订餐电话',
  `summary` varchar(70) NOT NULL DEFAULT '暂无简介',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(10) unsigned NOT NULL DEFAULT '1' COMMENT '状态,0关闭,1正常,2暂停',
  `discount` decimal(5,2) NOT NULL DEFAULT '0.90' COMMENT '折扣',
  `publish` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `order_num` int(6) NOT NULL DEFAULT '0' COMMENT '订单量',
  `order_profit` decimal(5,2) NOT NULL DEFAULT '0.00' COMMENT '订单利润',
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of onethink_shop
-- ----------------------------
INSERT INTO `onethink_shop` VALUES ('33', '七道街麻辣烫', '1', '1', '井冈山路334号', '10:30-20:00', '0,1,2,3,4,5,6', '/Upload/shop26.jpg', '0', '20', '6', '18954234333;13361242555', '无任何添加剂，新鲜棒骨熬制底汤。注：打包盒餐到付款后另行收费。', '6', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('32', '老四川酒家', '1', '1', '马濠公园东黄浦江路小学对面', '10:30-20:30', '0,1,2,3,4,5,6', '/Upload/shop25.jpg', '0', '15', '6', '86896800;13708976941', '正宗川菜，全部由四川当地厨师烹制。', '4', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('30', '创意烤坊', '1', '1', '黄浦江路163号', '10:00-21:00', '0,1,2,3,4,5,6', '/Upload/shop23.jpg', '0', '15', '6', '15306394858;15954204783', '岛城独一家特色熏烤店。', '100', '0', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('29', '东北人家家常菜', '1', '1', '黄浦江路217号', '09:00-22:00', '0,1,2,3,4,5,6', '/Upload/shop24.jpg', '0', '15', '6', '86885221;13656480288', '东北风味家常菜，实惠量大。', '5', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('28', '骨头饭', '1', '1', '海都后南200米', '10:00-20:30', '0,1,2,3,4,5,6', '/Upload/shop22.jpg', '0', '15', '6', '15054810966;13675300327', '套餐自带米饭一份。', '13', '0', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('26', 'N多寿司', '3', '1', '世纪商城南门', '10:00-20:00', '0,1,2,3,4,5,6', '/Upload/shop20.jpg', '0', '15', '6', '15054207771', '坚持做最好吃的寿司品牌', '15', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('27', '如意馄饨', '1', '1', '井冈山路269号', '09:00-21:00', '0,1,2,3,4,5,6', '/Upload/shop21.jpg', '0', '10', '6', '15192557717', '大众消费，鲜肉馄饨。', '9', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('25', '华莱士', '2', '1', '长江中路358号吉祥商厦', '09:30-21:30', '0,1,2,3,4,5,6', '/Upload/shop19.jpg', '0', '15', '6', '18661990392;15253292180;[16:00-22:00]', '中国本土最大的西餐连锁企业，以现烤汉堡著称', '15', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('24', '孟小二私房牛肉面', '1', '1', '井冈山路269号', '09:00-21:00', '0,1,2,3,4,5,6', '/Upload/shop18.jpg', '0', '15', '6', '13869878910', '大众消费，品种齐全。', '100', '0', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('23', '舅姥爷砂锅', '1', '1', '井冈山路273号', '10:30-20:00', '0,1,2,3,4,5,6', '/Upload/shop17.jpg', '0', '15', '6', '86855699', '注：11点起开始做餐，最早11：30送达。为保证新鲜，店内餐品定量，请尽早下单。', '10', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('22', '小时咖喱', '1', '1', '庐山路77号', '10:30-20:00', '0,1,2,3,4,5,6', '/Upload/shop16.jpg', '0', '15', '6', '15020046212;13668887467', '爱咖喱选小时咖喱，纯正的口味，搭配特色小食。咖喱饭爱好者的绝佳选择。11点后全部菜品才会备齐。', '8', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('21', '李记黄焖鸡米饭', '1', '1', '紫金山路11号', '10:00-20:30', '0,1,2,3,4,5,6', '/Upload/shop15.jpg', '0', '15', '6', '13963909691;18663973932', '开发区人最爱吃的一道菜，黄焖鸡选李记。注：黄焖鸡本身自带一份米饭。', '7', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('20', '康乐源牛扒饭', '1', '1', '香江路地一城A区4号', '10:00-20:00', '0,1,2,3,4,5,6', '/Upload/shop14.jpg', '0', '15', '6', '13646395103', '广受大家欢迎的牛扒饭系列。', '13', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('19', '禧福村米线', '1', '1', '紫金山路65号', '10:00-22:00', '0,1,2,3,4,5,6', '/Upload/shop13.jpg', '0', '15', '6', '18658843901', '地道的云南米线味。潍坊禧福村米线连锁品牌入住开发区。', '100', '0', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('18', '沙县小吃', '1', '1', '富春江路', '10:00-22:00', '0,1,2,3,4,5,6', '/Upload/shop08.jpg', '0', '15', '6', '18866298548;15908982409', '地球人都知道的福建沙县小吃，物美价廉，口味正宗。', '10', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('17', '驴肉火烧', '1', '1', '庐山路149号', '10:00-21:00', '0,1,2,3,4,5,6', '/Upload/shop09.jpg', '0', '15', '6', '13583298539', '正宗河北河间驴肉火烧，多年老店。', '9', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('16', '粥粥到到', '1', '1', '紫金山路326号', '11:00-14:00;16:30-20:30', '0,1,2,3,4,5,6', '/Upload/shop12.jpg', '0', '15', '6', '86973978', '地道好粥，喝出营养。', '1', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('15', '劈柴院锅贴', '1', '1', '长江中路麦凯乐南侧', '10:00-10:01', '0,1,2,3,4,5,6', '/Upload/shop11.jpg', '0', '15', '6', '18560453997;86993429;15318761033', '口味没得说。美味锅贴搭配凉菜，尤其适合喜欢清淡口味的亲。', '21', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('14', '海源亭韩国料理', '3', '1', '富春江路195号', '7:30-21:00', '0,1,2,3,4,5,6', '/Upload/shop06.jpg', '0', '15', '6', '86885054', '本地知名韩国料理，够韩，够料。', '14', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('13', '陇上味道', '1', '1', '紫金山路304号', '9:00-21:00', '0,1,2,3,4,5,6', '/Upload/shop07.jpg', '0', '15', '6', '13553085229', '拉条子为纯手工面条。正宗西北菜，非一般炒菜。拉条子拌面为本店一大特色。推荐一个&quot;拌面菜&quot;对应两份拉条子。', '100', '0', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('12', '永平饭店', '1', '1', '紫金山路107号', '9:00-14:30;16:30-21:00', '0,1,2,3,4,5,6', '/Upload/shop10.jpg', '0', '15', '6', '15315323414', '紫金山路上最火爆的炒菜饭店，外卖，友聚的好去处。', '3', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('11', '老边饺子', '1', '1', '井冈山路263号', '10:00-14:00;17:00-22:00', '0,1,2,3,4,5,6', '/Upload/shop05.jpg', '0', '15', '6', '86802660', '全国知名饺子餐饮品牌，炒菜正宗，价格公道。注:下午一点后水饺经常缺货。', '3', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('10', '德鑫全排骨米饭', '1', '1', '紫金山路39号', '10:30-20:30', '0,1,2,3,4,5,6', '/Upload/shop04.jpg', '0', '15', '6', '86975263(2);84462646(1)', '家家都爱吃的排骨米饭，人人都知道的排骨米饭品牌。注：菜品本身自带米饭一份', '11', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('9', '必胜客', '2', '1', '开发区长江路419号佳世客1楼', '10:30-20:20', '0,1,2,3,4,5,6', '/Upload/shop03.jpg', '0', '15', '6', '86996578', '必胜客无简介', '16', '0', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('7', '肯德基', '2', '1', '井冈山路658号紫锦广场1层', '10:20-20:40', '0,1,2,3,4,5,6', '/Upload/shop01.jpg', '0', '15', '6', '4008823823', 'KFC，或许你习惯叫他开封菜...', '18', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('8', '麦当劳', '2', '1', '香江路78号', '10:30-20:30', '0,1,2,3,4,5,6', '/Upload/shop02.jpg', '0', '15', '6', '86897653', '还是那个怪蜀黍...', '17', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('34', '爱的咖喱亭', '1', '1', '长江中路238号', '10:30-20:00', '0,1,2,3,4,5,6', '/Upload/shop27.jpg', '2', '15', '6', '13341239352', '款式众多，味道纯正，咖喱天国', '100', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('35', '馋面酱骨', '1', '1', '庐山小区东门', '10:30-20:00', '0,1,2,3,4,5,6', '/Upload/shop28.jpg', '0', '10', '6', '18563981635;15606396606', '馋在功夫，特色酱骨。', '12', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('36', '高小胖私厨', '1', '1', '太行山小区', '10:30-10:31', '0,1,2,3,4,5,6', '/Upload/shop29.jpg', '0', '15', '6', '18561600062;18561600063', '中央厨房现做，小胖私厨，为品质定制。', '19', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('37', '月光煲禾', '1', '1', '麦凯乐东门对面', '10:30-20:00', '0,1,2,3,4,5,6', '/Upload/shop30.jpg', '0', '15', '6', '18561522535', '精选好肉，真正的现场焖炖鲜肉砂锅。注：主食需单点', '9', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('39', '光之良品', '1', '1', '汇商国际一层', '10:01-10:02', '0,1,2,3,4,5,6', '/Upload/shop32.jpg', '0', '15', '6', '13730911769;13678847184', '健康速食，时尚之选', '20', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('38', '红亭辣味馆', '1', '1', '佳世客二楼', '11:00-20:00', '0,1,2,3,4,5,6', '/Upload/shop31.jpg', '0', '15', '6', '86996562', '佳世客二楼品质川菜。', '2', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('40', '潼关肉夹馍', '1', '1', '武夷山路266号', '10:00-19:30', '0,1,2,3,4,5,6', '/Upload/shop34.jpg', '0', '15', '6', '86879123;15092272432', '正宗风味的西安潼关肉夹馍。', '9', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('41', '蟹黄汤包', '1', '1', '麦凯乐东门对面', '10:00-19:30', '0,1,2,3,4,5,6', '/Upload/shop35.jpg', '0', '15', '6', '68958281;68958291', '原味鸡汤调馅,营养丰富。', '9', '2', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('42', '领鲜', '1', '1', '唐F小区', '11:00-13:30;16:30-19:30;', '0,1,2,3,4,5,6', '/Upload/shop36.jpg', '0', '50', '6', '17685521107;18561988132', '现做的新鲜麻辣海鲜', '0', '1', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('43', '海福康海参', '1', '2', '庐山小区', '10:00-20:00', '0,1,2,3,4,5,6', '/Upload/shop37.jpg', '0', '15', '6', '86996009;15020051851', '暂无简介', '0', '0', '0.00', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('44', '测试商家一', '0', '1', '测试商家一', '10:00-20:00', '0,1,2,3,4,5,6', '/Public/static/images/shop_mis.gif', '1', '12', '12', '21312', '测试商家一', '12', '1', '0.90', '0', '0', '0.00');
INSERT INTO `onethink_shop` VALUES ('45', '商家一', '0', '1', '12.123132', '10:00-20:00', '0,1,2,3,4,5,6', '/Public/static/images/shop_mis.gif', '1', '123', '255', '13131', '商家一', '12', '1', '0.90', '0', '0', '0.00');

-- ----------------------------
-- Table structure for `onethink_shop_type`
-- ----------------------------
DROP TABLE IF EXISTS `onethink_shop_type`;
CREATE TABLE `onethink_shop_type` (
  `id` smallint(3) NOT NULL AUTO_INCREMENT,
  `type_name` char(10) NOT NULL DEFAULT '中式快餐',
  `type_icon` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of onethink_shop_type
-- ----------------------------
INSERT INTO `onethink_shop_type` VALUES ('1', '中式快餐', '/static/mobile_assets/images/2.png');
INSERT INTO `onethink_shop_type` VALUES ('2', '西式快餐', '/static/mobile_assets/images/3.png');
INSERT INTO `onethink_shop_type` VALUES ('3', '日韩料理', '/static/mobile_assets/images/4.png');
INSERT INTO `onethink_shop_type` VALUES ('4', '面包甜点', '/static/mobile_assets/images/5.png');

-- ----------------------------
-- Table structure for `onethink_user`
-- ----------------------------
DROP TABLE IF EXISTS `onethink_user`;
CREATE TABLE `onethink_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `wei_id` int(10) NOT NULL DEFAULT '0' COMMENT '微信id',
  `uname` char(16) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login_time` int(10) unsigned NOT NULL DEFAULT '0',
  `reg_areaid` int(10) NOT NULL COMMENT '注册区域',
  `score` mediumint(8) unsigned NOT NULL,
  `sex` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `age` tinyint(3) unsigned NOT NULL,
  `tel` varchar(16) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mark_address` varchar(200) NOT NULL,
  `mark_info` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '用户状态',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uname` (`uname`),
  KEY `tel` (`tel`),
  KEY `reg_areaid` (`reg_areaid`),
  KEY `wei_id` (`wei_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of onethink_user
-- ----------------------------
INSERT INTO `onethink_user` VALUES ('1', '0', 'worden', '095cf8eaf4089d9bd10d3aeef122b079', '0', '1435673243', '0', '0', '1', '0', '0', '', '啊', '21', '1');
INSERT INTO `onethink_user` VALUES ('2', '0', 'kefu_hd', '560e44cf5261956ea95fb1f6ea577fe6', '1401542332', '1435366038', '0', '0', '1', '0', '0', '', '啊', '21', '1');
INSERT INTO `onethink_user` VALUES ('3', '0', 'kefu_sn', '560e44cf5261956ea95fb1f6ea577fe6', '1401542332', '1435366038', '0', '0', '1', '0', '0', '', '啊', '21', '1');
INSERT INTO `onethink_user` VALUES ('4', '0', 'kefu_by1', '560e44cf5261956ea95fb1f6ea577fe6', '1401542332', '1435366038', '0', '0', '1', '0', '0', '', '啊', '21', '1');
INSERT INTO `onethink_user` VALUES ('5', '0', 'kefu_by2', '560e44cf5261956ea95fb1f6ea577fe6', '1401542332', '1436366039', '0', '0', '1', '0', '0', '', '客服地址一', '21', '1');
INSERT INTO `onethink_user` VALUES ('6', '0', 'test123', '41741189faddeeb73d8e0ddb5c586679', '1436367152', '1436367152', '0', '0', '1', '0', '', '', '啊', '21', '1');
INSERT INTO `onethink_user` VALUES ('7', '0', 'test1202', '329bfd14287cc3dd6d5784fab4014a17', '1436367262', '0', '0', '0', '1', '0', '', '', '啊', '21', '1');
INSERT INTO `onethink_user` VALUES ('8', '0', 'test1203', '146b2041dc10f81e8efa68e4f1baf7ac', '1436367391', '0', '0', '0', '1', '0', '', '', '啊', '21', '1');
INSERT INTO `onethink_user` VALUES ('9', '0', 'test1201', 'a5691997768cf6322e22038986f71750', '1436584735', '0', '0', '0', '1', '0', '', '', '啊', 'sdjflkj', '1');
INSERT INTO `onethink_user` VALUES ('10', '0', 'test1204', 'fa6bebbceca4bbae5c1d2025a908df2a', '1436585075', '1436585075', '0', '0', '1', '0', '', '', '第三方', '125', '1');
INSERT INTO `onethink_user` VALUES ('11', '0', 'test1205', '560e44cf5261956ea95fb1f6ea577fe6', '1436602711', '1438850987', '0', '0', '1', '23', '12312331231', '开发区庐山小区', '撒地方', '123', '1');

-- ----------------------------
-- Table structure for `onethink_user_old`
-- ----------------------------
DROP TABLE IF EXISTS `onethink_user_old`;
CREATE TABLE `onethink_user_old` (
  `uid` int(10) unsigned NOT NULL,
  `uname` char(16) NOT NULL,
  `first_order` int(10) unsigned NOT NULL COMMENT '第一单',
  `order_num` int(10) unsigned NOT NULL COMMENT '总订购次数',
  `order_sum` int(20) unsigned NOT NULL COMMENT '总订购花费',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of onethink_user_old
-- ----------------------------
INSERT INTO `onethink_user_old` VALUES ('11', 'test1205', '0', '0', '0');
