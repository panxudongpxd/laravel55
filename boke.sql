/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : boke

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-06-05 09:02:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bk_admin
-- ----------------------------
DROP TABLE IF EXISTS `bk_admin`;
CREATE TABLE `bk_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sex` varchar(2) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `myfile` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) NOT NULL,
  `auth` int(11) DEFAULT NULL,
  `captcha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_admin
-- ----------------------------
INSERT INTO `bk_admin` VALUES ('4', 'zhangsan', '男', '123', '1944495662@qq.com', '13578956877', '/static/admin/login/img/20180531/15277785402034.jpg', '2018-05-31 22:55:40', null, '', '0', null);
INSERT INTO `bk_admin` VALUES ('5', 'lisi', '男', '123', '1111@qq.com', '13598758978', '', null, null, '', '1', null);
INSERT INTO `bk_admin` VALUES ('6', 'admin', '男', 'admin', '123456@qq.com', '13568798588', '/static/admin/login/img/20180530/15276523176219.jpg', '2018-05-31 22:33:03', null, '', '0', null);

-- ----------------------------
-- Table structure for bk_articles
-- ----------------------------
DROP TABLE IF EXISTS `bk_articles`;
CREATE TABLE `bk_articles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `tid` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `jianjie` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_articles
-- ----------------------------
INSERT INTO `bk_articles` VALUES ('77', '11', '23,24', '如何在<textarea>标签中消除HTML标签！', '结果在textarea中看到的内容还是带有html标签的，那么怎么解决这个问题呢？其实有很多方法，比如使用正则，把html里面的标签替换掉，或者消掉，但是，显得略有点麻烦，现在给大家提供一个简单易懂的方法', null, null);

-- ----------------------------
-- Table structure for bk_at
-- ----------------------------
DROP TABLE IF EXISTS `bk_at`;
CREATE TABLE `bk_at` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bk_at
-- ----------------------------

-- ----------------------------
-- Table structure for bk_blank
-- ----------------------------
DROP TABLE IF EXISTS `bk_blank`;
CREATE TABLE `bk_blank` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `btitle` varchar(255) NOT NULL COMMENT '''导航栏名字''',
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_blank
-- ----------------------------
INSERT INTO `bk_blank` VALUES ('2', '说说', '2018-05-28 15:38:58', '2018-05-28 15:38:58');
INSERT INTO `bk_blank` VALUES ('12', '分类', '2018-05-29 13:22:11', '2018-05-29 13:22:11');
INSERT INTO `bk_blank` VALUES ('13', '相册', '2018-05-31 10:10:05', '2018-05-31 10:10:05');
INSERT INTO `bk_blank` VALUES ('17', '首页', '2018-05-31 22:39:39', '2018-05-31 22:39:39');

-- ----------------------------
-- Table structure for bk_cates
-- ----------------------------
DROP TABLE IF EXISTS `bk_cates`;
CREATE TABLE `bk_cates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cname` varchar(150) NOT NULL,
  `pid` int(11) unsigned NOT NULL,
  `path` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_cates
-- ----------------------------
INSERT INTO `bk_cates` VALUES ('1', '前端', '0', '0,');
INSERT INTO `bk_cates` VALUES ('4', 'UI', '0', '0,');
INSERT INTO `bk_cates` VALUES ('5', 'python', '0', '0,');
INSERT INTO `bk_cates` VALUES ('6', '全栈工程师', '0', '0,');
INSERT INTO `bk_cates` VALUES ('7', 'linux运维', '0', '0,');
INSERT INTO `bk_cates` VALUES ('9', '人工智能', '5', '0,5,');
INSERT INTO `bk_cates` VALUES ('10', 'javascript', '1', '0,1,');
INSERT INTO `bk_cates` VALUES ('11', '平面设计', '4', '0,4,');
INSERT INTO `bk_cates` VALUES ('12', '大数据', '5', '0,5,');
INSERT INTO `bk_cates` VALUES ('13', 'vue.js', '10', '0,1,10,');
INSERT INTO `bk_cates` VALUES ('14', '云计算', '0', '0,');
INSERT INTO `bk_cates` VALUES ('18', 'HTML', '1', '0,1,');
INSERT INTO `bk_cates` VALUES ('19', 'CSS', '18', '0,1,18,');
INSERT INTO `bk_cates` VALUES ('20', '中端', '0', '0,');

-- ----------------------------
-- Table structure for bk_config
-- ----------------------------
DROP TABLE IF EXISTS `bk_config`;
CREATE TABLE `bk_config` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(100) DEFAULT NULL COMMENT '''图片''',
  `copy` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '''版权''',
  `bah` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '''备案号''',
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_config
-- ----------------------------
INSERT INTO `bk_config` VALUES ('1', '/static/admin/config/img/20180531/15277326436411.jpeg', 'CopyRight © 2015-2017 xxoo博客  Design by Lei', '网站地图- 粤ICP备66001325号-1', '2018-05-31 10:10:43', '2018-05-31 10:10:43');

-- ----------------------------
-- Table structure for bk_content
-- ----------------------------
DROP TABLE IF EXISTS `bk_content`;
CREATE TABLE `bk_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT NULL,
  `content` text CHARACTER SET utf8,
  `mytou` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `aname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=sjis;

-- ----------------------------
-- Records of bk_content
-- ----------------------------
INSERT INTO `bk_content` VALUES ('50', '77', '<p><span style=\"font-size:18px;\">大家知道除了textarea外在p标签，div标签里面使用html(&quot;&lt;span&gt;我是span标签&lt;/span&gt;&quot;)显示的内容是不带html标签的，因此可以把获取到的带有html标签的数据通过html(数据)放到一个p或者div里面，再获取p或者div里面的文本内容，$(&quot;p&quot;).text();这时获取到的就是不带html标签的文本，此时可以把获取到的p或者div里面的文本放到textarea里面了，但是这时会发现多了一个p标签或者div，怎么办呢？这好办啊，display:none就ok了，或者使用定位把p或者div定位到一个视觉看不到的地方，ok！</span></p>', '/static/admin/articles/img/20180601/15278626987415.jpg', '2018-06-01 22:18:18', '2018-06-01 22:18:18', 'zhangsan');

-- ----------------------------
-- Table structure for bk_links
-- ----------------------------
DROP TABLE IF EXISTS `bk_links`;
CREATE TABLE `bk_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_links
-- ----------------------------
INSERT INTO `bk_links` VALUES ('33', '/static/admin/logo/img/20180530/15276685339730.jpg', '百度', 'www.baidu.com', '2018-05-31 17:33:15', '2018-05-30 11:48:39');
INSERT INTO `bk_links` VALUES ('34', '/static/admin/logo/img/20180530/15276521585291.jpg', '新浪', 'www.sina', '2018-05-30 11:49:18', '2018-05-30 11:49:18');
INSERT INTO `bk_links` VALUES ('35', '/static/admin/logo/img/20180530/15276521839854.jpg', '潘旭东博客', 'www.panxudong.com', '2018-05-30 11:49:43', '2018-05-30 11:49:43');
INSERT INTO `bk_links` VALUES ('36', '/static/admin/logo/img/20180530/15276522038728.jpg', '谷歌', 'www.guge.com', '2018-05-30 11:50:03', '2018-05-30 11:50:03');
INSERT INTO `bk_links` VALUES ('37', '/static/admin/logo/img/20180530/15276522338606.jpg', '搜狐', 'www.souhu.com', '2018-05-30 11:50:33', '2018-05-30 11:50:33');
INSERT INTO `bk_links` VALUES ('38', '/static/admin/logo/img/20180530/15276522577316.jpg', 'QQ', 'www.qq.com', '2018-05-30 11:50:57', '2018-05-30 11:50:57');

-- ----------------------------
-- Table structure for bk_lunbo
-- ----------------------------
DROP TABLE IF EXISTS `bk_lunbo`;
CREATE TABLE `bk_lunbo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_lunbo
-- ----------------------------
INSERT INTO `bk_lunbo` VALUES ('1', '/uploads/admin/20180602/EevZwZ2Ycr0waVHDJjHU.jpeg');
INSERT INTO `bk_lunbo` VALUES ('11', '/uploads/admin/20180603/5Oxo9b9L8F21AzsvCynu.jpeg');
INSERT INTO `bk_lunbo` VALUES ('12', '/uploads/admin/20180603/FXZ2usdJkvyE9Kzr3gh8.jpeg');
INSERT INTO `bk_lunbo` VALUES ('13', '/uploads/admin/20180603/bRMuudSYpiLZvAAUXh4y.jpeg');
INSERT INTO `bk_lunbo` VALUES ('14', '/uploads/admin/20180604/0FKxnync6oV6OpIGHCFv.jpeg');
INSERT INTO `bk_lunbo` VALUES ('15', '/uploads/admin/20180604/T0Eyi9CmOuzpi8Se8Ksw.jpeg');
INSERT INTO `bk_lunbo` VALUES ('16', '/uploads/admin/20180604/1w9TmVMuP0RJxIRYepZy.png');
INSERT INTO `bk_lunbo` VALUES ('17', '/uploads/admin/20180604/yJcEd4t5P2aIi8OsFyC3.png');
INSERT INTO `bk_lunbo` VALUES ('18', '/uploads/admin/20180604/EPeLVQbKGqqdLchYJUUe.png');
INSERT INTO `bk_lunbo` VALUES ('19', '/uploads/admin/20180604/NV2AzktxsRET9v3dFHsu.png');
INSERT INTO `bk_lunbo` VALUES ('20', '/uploads/admin/20180604/i8WlA7TZV2yClIiekQA6.png');
INSERT INTO `bk_lunbo` VALUES ('21', '/uploads/admin/20180604/5oMaHWSZD69rciSnHK0h.png');
INSERT INTO `bk_lunbo` VALUES ('22', '/uploads/admin/20180604/1dONnVvgxgS1gjBoRcwW.png');

-- ----------------------------
-- Table structure for bk_photo
-- ----------------------------
DROP TABLE IF EXISTS `bk_photo`;
CREATE TABLE `bk_photo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '''相册封面图片''',
  `ptitle` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '''相册描述''',
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_photo
-- ----------------------------
INSERT INTO `bk_photo` VALUES ('1', '/static/admin/photo/img/20180604/15281105508341.jpg', 'html', '2018-06-04 19:09:10', '2018-06-04 19:09:10');
INSERT INTO `bk_photo` VALUES ('2', '/static/admin/photo/img/20180531/15277519132440.png', 'css', '2018-05-31 15:31:53', '2018-05-31 15:31:53');
INSERT INTO `bk_photo` VALUES ('3', '/static/admin/photo/img/20180530/15276913247815.jpg', '3413', '2018-05-30 22:42:04', '2018-05-30 22:42:04');
INSERT INTO `bk_photo` VALUES ('4', '/static/admin/photo/img/20180530/15276956093499.jpg', 'php', '2018-05-30 23:53:29', '2018-05-30 23:53:29');
INSERT INTO `bk_photo` VALUES ('5', '/static/admin/photo/img/20180531/15277518852012.gif', 'phpcms', '2018-05-31 15:31:25', '2018-05-31 15:31:25');

-- ----------------------------
-- Table structure for bk_picture
-- ----------------------------
DROP TABLE IF EXISTS `bk_picture`;
CREATE TABLE `bk_picture` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `plogo` varchar(255) DEFAULT NULL COMMENT '''图片''',
  `uid` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_picture
-- ----------------------------
INSERT INTO `bk_picture` VALUES ('1', '/static/admin/picture/img/20180530/15276913246749.jpg', null, '2018-05-30 22:42:04', '2018-05-30 22:42:04');
INSERT INTO `bk_picture` VALUES ('2', '/static/admin/picture/img/20180530/15276951709971.jpg', null, '2018-05-30 23:46:10', '2018-05-30 23:46:10');
INSERT INTO `bk_picture` VALUES ('3', '/static/admin/picture/img/20180530/15276952668420.jpg', null, '2018-05-30 23:47:46', '2018-05-30 23:47:46');
INSERT INTO `bk_picture` VALUES ('4', '/static/admin/picture/img/20180530/15276953676077.jpg', '1', '2018-05-30 23:49:27', '2018-05-30 23:49:27');
INSERT INTO `bk_picture` VALUES ('5', '/static/admin/picture/img/20180530/15276956446079.jpg', '4', '2018-05-30 23:54:04', '2018-05-30 23:54:04');
INSERT INTO `bk_picture` VALUES ('8', '/static/admin/picture/img/20180531/15277521953727.gif', '2', '2018-05-31 15:36:35', '2018-05-31 15:36:35');
INSERT INTO `bk_picture` VALUES ('9', '/static/admin/photo/20180604/YTw96amBYqgdFSSK9M57.png', null, null, null);
INSERT INTO `bk_picture` VALUES ('10', '/static/admin/photo/20180604/DppmlJkXD0o8dkuv63FW.png', null, null, null);
INSERT INTO `bk_picture` VALUES ('11', '/static/admin/photo/20180604/GY9maNjlCT9yR9R3Ppae.png', '1', null, null);

-- ----------------------------
-- Table structure for bk_stalk
-- ----------------------------
DROP TABLE IF EXISTS `bk_stalk`;
CREATE TABLE `bk_stalk` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(255) unsigned NOT NULL COMMENT '关联admin表',
  `xfile` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '显示头像',
  `sstitle` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '说说标题',
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of bk_stalk
-- ----------------------------
INSERT INTO `bk_stalk` VALUES ('48', '6', '/static/admin/login/img/20180530/15276523176219.jpg', '赵宇轩', '2018-06-01 09:39:22', '2018-06-01 09:39:22');
INSERT INTO `bk_stalk` VALUES ('49', '6', '/static/admin/login/img/20180530/15276523176219.jpg', '刑正', '2018-06-01 09:39:59', '2018-06-01 09:39:59');
INSERT INTO `bk_stalk` VALUES ('52', '4', '/static/admin/login/img/20180530/15276438243603.jpg', '赛奥hi大不了萨拉萨郑志敏', '2018-06-01 10:27:45', '2018-06-01 10:27:45');
INSERT INTO `bk_stalk` VALUES ('53', '4', '/static/admin/login/img/20180530/15276438243603.jpg', '最酷的sahbdladbk', '2018-06-01 10:28:16', '2018-06-01 10:28:16');
INSERT INTO `bk_stalk` VALUES ('55', '4', '/static/admin/login/img/20180530/15276438243603.jpg', '潘旭东', '2018-06-01 10:28:53', '2018-06-01 10:28:53');
INSERT INTO `bk_stalk` VALUES ('61', '4', '/static/admin/login/img/20180530/15276438243603.jpg', 'USiolhfauidayshb', '2018-06-01 14:40:58', '2018-06-01 14:40:58');
INSERT INTO `bk_stalk` VALUES ('62', '4', '/static/admin/login/img/20180530/15276438243603.jpg', '阿速达公司不打工', '2018-06-01 14:41:10', '2018-06-01 14:41:10');

-- ----------------------------
-- Table structure for bk_stalk_info
-- ----------------------------
DROP TABLE IF EXISTS `bk_stalk_info`;
CREATE TABLE `bk_stalk_info` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `sid` int(255) unsigned NOT NULL COMMENT '关联主表',
  `aid` int(255) unsigned NOT NULL,
  `gname` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '管理员名称',
  `ssinfo` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '说说内容',
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_stalk_info
-- ----------------------------
INSERT INTO `bk_stalk_info` VALUES ('42', '48', '6', 'admin', '<p>赵宇轩赵宇轩赵宇轩赵宇轩赵宇轩赵宇轩赵宇轩赵宇轩</p><p>赵宇轩赵宇轩赵宇轩赵宇轩赵宇轩</p><p>赵宇轩赵宇轩赵宇轩赵宇轩赵宇轩赵宇轩</p>', '2018-06-01 09:39:22', '2018-06-01 09:39:22');
INSERT INTO `bk_stalk_info` VALUES ('43', '49', '6', 'admin', '<p>刑正刑正刑正刑正刑正刑正刑正刑正刑正</p><p>刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正</p><p>刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正刑正</p>', '2018-06-01 09:39:59', '2018-06-01 09:39:59');
INSERT INTO `bk_stalk_info` VALUES ('46', '52', '4', 'zhangsan', '<p>赛奥hi大不了萨拉萨郑志敏赛奥hi大不了萨拉萨郑志敏赛奥hi大不了萨拉萨郑志敏赛奥hi大不了萨拉萨郑志敏赛奥hi大不了萨拉萨郑志敏</p>', '2018-06-01 10:27:45', '2018-06-01 10:27:45');
INSERT INTO `bk_stalk_info` VALUES ('47', '53', '4', 'zhangsan', '<p>lasbdlfbnalkdklhflssaoibasogvbd是via的横扫了福克斯</p>', '2018-06-01 10:28:16', '2018-06-01 10:28:16');
INSERT INTO `bk_stalk_info` VALUES ('49', '55', '4', 'zhangsan', '<p>阿苏被倒还是克服了比例是否还能</p>', '2018-06-01 10:28:53', '2018-06-01 10:28:53');
INSERT INTO `bk_stalk_info` VALUES ('55', '61', '4', 'zhangsan', '<p>是的覅udushdahdsoi1</p>', '2018-06-01 14:40:58', '2018-06-01 14:40:58');
INSERT INTO `bk_stalk_info` VALUES ('56', '62', '4', 'zhangsan', '<p>第三方is发噶所读骸骨</p>', '2018-06-01 14:41:10', '2018-06-01 14:41:10');

-- ----------------------------
-- Table structure for bk_tag_info
-- ----------------------------
DROP TABLE IF EXISTS `bk_tag_info`;
CREATE TABLE `bk_tag_info` (
  `id` int(50) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `gid` int(11) DEFAULT NULL,
  `title` varchar(260) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '标签名',
  `created_at` datetime NOT NULL COMMENT '修改时间',
  `updated_at` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of bk_tag_info
-- ----------------------------
INSERT INTO `bk_tag_info` VALUES ('23', null, '书籍', '2018-06-01 19:14:58', '2018-06-01 19:14:58');
INSERT INTO `bk_tag_info` VALUES ('24', null, '影视', '2018-06-01 19:23:52', '2018-06-01 19:23:52');

-- ----------------------------
-- Table structure for bk_users
-- ----------------------------
DROP TABLE IF EXISTS `bk_users`;
CREATE TABLE `bk_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_users
-- ----------------------------
INSERT INTO `bk_users` VALUES ('14', 'abcd12345', '123456', '张一er', '2018-05-31 18:15:12', null);
INSERT INTO `bk_users` VALUES ('15', 'adjjks12', '123456', '张二', '2018-05-31 09:43:44', null);
INSERT INTO `bk_users` VALUES ('16', 'dsf123', '123456', '张三', '2018-05-31 09:44:09', null);
INSERT INTO `bk_users` VALUES ('18', 'dsfd12326', '123456', '张四', '2018-05-31 09:44:56', null);
INSERT INTO `bk_users` VALUES ('22', 'sa123456', '123456', '李四', '2018-05-31 09:46:14', null);
INSERT INTO `bk_users` VALUES ('23', 'a12456', '123456', '王五', '2018-05-31 09:47:47', null);
INSERT INTO `bk_users` VALUES ('24', 'aa1234', '123456', '赵六', null, null);

-- ----------------------------
-- Table structure for bk_user_info
-- ----------------------------
DROP TABLE IF EXISTS `bk_user_info`;
CREATE TABLE `bk_user_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `tou` varchar(255) DEFAULT NULL,
  `email` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `sex` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `qq` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bk_user_info
-- ----------------------------
INSERT INTO `bk_user_info` VALUES ('6', '14', '/static/admin/user/img/20180530/15276939747441.jpg', '111@qq.com', '男', '13578555555', '13546879', '2018-05-31 09:43:13', '2018-05-30 23:26:14');
INSERT INTO `bk_user_info` VALUES ('7', '15', '/static/admin/tou/img/20180531/15277283341350.jpg', '222@qq.com', '男', '13555555555', '777777', '2018-05-31 09:43:44', '2018-05-30 23:27:53');
INSERT INTO `bk_user_info` VALUES ('8', '16', '/static/admin/user/img/20180531/15277289745170.jpg', '111@qq.com', '男', '13599999999', '888888', '2018-05-31 09:44:09', '2018-05-31 09:09:34');
INSERT INTO `bk_user_info` VALUES ('9', '18', '/static/admin/user/img/20180531/15277292056680.jpg', '111@qq.com', '男', '13511111111', '1111566', '2018-05-31 09:44:56', '2018-05-31 09:13:26');
INSERT INTO `bk_user_info` VALUES ('10', '22', '/static/admin/tou/img/20180531/15277295182657.jpg', '123456@qq.com', '女', '13578956855', '11111111', '2018-05-31 09:48:51', '2018-05-31 09:17:47');
INSERT INTO `bk_user_info` VALUES ('11', '23', '/static/admin/user/img/20180531/15277295652908.png', '199@qq.com', '女', '13578956898', '135685554', '2018-05-31 09:19:25', '2018-05-31 09:19:25');
INSERT INTO `bk_user_info` VALUES ('12', '24', '/static/admin/user/img/20180531/15277306574618.jpg', '222@qq.com', '男', '13556988555', '333333', '2018-05-31 09:37:37', '2018-05-31 09:37:37');
