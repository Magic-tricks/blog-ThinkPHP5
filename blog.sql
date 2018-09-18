-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2018-08-06 10:39:27
-- 服务器版本： 5.6.30-1
-- PHP Version: 5.6.26-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `tp_admin`
--

CREATE TABLE `tp_admin` (
  `id` mediumint(9) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_admin`
--

INSERT INTO `tp_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(7, '焰灵姬', 'yan111'),
(8, '卫庄', 'www111'),
(9, '荆轲', 'qq11'),
(10, '张良', 'wqe1'),
(11, '宏莲', '123456'),
(12, 'admin1', 'admin'),
(13, 'admin2', 'admin'),
(14, 'admin3', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `tp_article`
--

CREATE TABLE `tp_article` (
  `id` mediumint(9) NOT NULL COMMENT '文章ｉｄ',
  `title` varchar(60) NOT NULL COMMENT '文章标题',
  `author` varchar(30) NOT NULL COMMENT '文章作者',
  `desc` varchar(255) NOT NULL COMMENT '文章简介',
  `keywords` varchar(255) NOT NULL COMMENT '文章关键字',
  `content` text NOT NULL COMMENT '文章内容',
  `pic` varchar(100) NOT NULL COMMENT '缩略图',
  `click` int(10) NOT NULL DEFAULT '0' COMMENT '点击数',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '０：不推荐　１：推荐',
  `time` int(10) NOT NULL COMMENT '发布时间',
  `cateid` mediumint(9) NOT NULL COMMENT '所属栏目'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_article`
--

INSERT INTO `tp_article` (`id`, `title`, `author`, `desc`, `keywords`, `content`, `pic`, `click`, `state`, `time`, `cateid`) VALUES
(1, '测试', '２', '４', '国外名著,哲学', '<p>３３３３３３</p>', '/static/uploads/20180802/91a79e46d130ceb244a3123ab7c12c1b.jpg', 19, 0, 1533175286, 6),
(3, '叶子', '叶健林', '周树人', '文学,传统', '', '/static/uploads/20180802/1960b756fe970198b4593a3a7a9007b8.jpg', 1, 1, 1533174746, 6),
(5, '百度１', '韩非', 'goddess', '哲学,传统', '', '/static/uploads/20180802/990b2dac0f891d7552054e5228556418.jpg', 0, 0, 1533174782, 6),
(6, '测试２', '', '', '西方文化,户外', '', '', 2, 0, 1533014473, 2),
(7, '测试４４', '', '', '文学,传统', '', '', 2, 0, 1533014646, 1),
(8, '测试４４４４４４４４４', '', '４', '户外,社会', '', '/static/uploads/20180731/da58a188e5935c18dcc4be1d4154c9db.jpg', 5, 0, 1533014839, 1),
(9, '国外名著', '列夫托尔斯泰', '吃人', '社会,西方文化', '<p>恩恩测试的</p>', '/static/uploads/20180802/ea43643977c8628b9f28d71bcc106309.jpg', 17, 1, 1533174533, 6),
(11, ' 热浪降临时，你是否还记得全球变暖这回事？', '叶子', '导语：科学家们已经越来越有底气的说，如今各地频繁出现的极端酷暑，就是人类活动导致的气候变化造成的。', '新闻,传统', '<p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; word-break: break-all; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">地球正处于烧烤状态。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; word-break: break-all; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">从上个月以来，只要你身处北半球，就能感受到，这个夏天不是一般的炎热。在中国，高温天气席卷大部分地区。截至今天（8月2日），中央气象台连续20天发布高温黄色预警。而至今天北京已经度过今年第18个高温日，超过去年全年的高温日数，距离历史最高纪录24个高温日还差6天。今天一起床，天气就很热，还没到早晨6点，北京平原地区气温已在30℃左右。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; word-break: break-all; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">在这个炎热而又容易暴躁的夏日，你是否还记得“全球变暖”这回事？</p><p><br/></p>', '/static/uploads/20180805/499ca8b0610a5c9a03e0806120ee6ff9.jpg', 12, 1, 1533462710, 7),
(12, '自曝无证售房想收回再卖，打错了算盘', '叶健林', '当初无证卖房的是你，现在想收回再卖的也是你，基本的诚信呢？', '新闻,户外', '<p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; word-break: break-all; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">据中国之声报道，西安部分市民2016年通过签订内部认购合同的方式购买了一楼盘所售房屋，并支付全款。两年过去，开发商却举报自己无证售房，并以当时没有预售许可证为由将12名客户起诉，要求确认合同无效。客户对此无法接受，认为开发商此举完全是由于近两年房价水涨船高，试图废止此前合同，以高价重新销售。目前，当地法院已受理涉及12套房屋的系列案件。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; word-break: break-all; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">根据诚实信用原则，对于有瑕疵、合同订立时欠缺相关要件的情况，正确的做法应该是积极补救，促使交易完成和合同有效，而不是在合同能合法有效的情况下（开发商已于今年6月取得预售许可证）促使其无效。</p><p><br/></p>', '/static/uploads/20180805/31f3f443ff01b288b74d614472f3d823.jpg', 22, 1, 1533462924, 4),
(13, '整治保健品欺诈“风暴”亟待成常态', '叶子', '如何防止保健食品欺诈和虚假宣传等不法行为反弹？', '社会,养生', '<p><span style=\"font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px;\">要实施健康中国战略、全方位全周期保障人民健康，必须建立严格规范的医疗卫生行业综合监管制度，加强全行业、全流程、综合协同监管。同时，实施健康中国战略，也离不开健康产业的有序发展。健康产业是一个具有巨大市场潜力的新兴产业，具有吸纳就业、拉动消费、促进公众健康等特点。健康产业包括医疗卫生与养老、旅游、食品等融合产生的多种新产业新业态新模式，这些领域目前存在着鱼龙混杂且监管力量薄弱等问题。</span></p>', '/static/uploads/20180805/63c15d9a80414e3ea73f910ec620efd6.jpg', 41, 1, 1533463011, 2),
(14, '福建向金门正式供水 两岸共饮一江水成为现实', '叶健林', '8月5日10时,福建向金门供水工程正式通水,“两岸一家亲,共饮一江水”愿景成为现实。', '养生,户外', '<p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; word-break: break-all; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">金门县位于福建南部海域,由14个大小岛屿组成,总面积151.7km2。金门因地理位置特殊,水资源贫乏,属资源性缺水。从福建大陆供水金门是解决该地区缺水问题的有效途径。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; padding: 0px; line-height: 2.2; word-break: break-all; font-family: &quot;Microsoft Yahei&quot;, Avenir, &quot;Segoe UI&quot;, &quot;Hiragino Sans GB&quot;, STHeiti, &quot;Microsoft Sans Serif&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 18px; white-space: normal;\">应金门县政府的请求,1995年以来,在国台办、水利部的精心指导和福建省委、省政府的正确领导下,福建省水利厅、福建省台办会同两岸有关部门和单位,历经二十余载,克服种种困难,经多次工作和商务技术商谈取得成果,2015年7月20日,双方业主在金门县成功签约。</p><p><br/></p>', '/static/uploads/20180805/71f58abf94de514cd0f22acbef8e73c3.jpg', 26, 1, 1533463159, 3),
(15, '三分长相七分打扮，藤编家具的时髦造型拗起来', '李白', '小时候奶奶外婆家的藤椅，是不是连老人家都嫌弃不用了？', '户外,健身', '<p class=\"text\" style=\"-webkit-tap-highlight-color: transparent; margin: 2rem 1.2rem; padding: 0px; word-wrap: break-word; color: rgb(26, 26, 26); font-size: 16.5px; line-height: 33px; text-align: justify; letter-spacing: 0.7px; font-family: Helvetica, 黑体; white-space: normal; background-color: rgb(255, 255, 255);\">那些老人们街边闲坐聊天的扶手椅，</p><p class=\"text\" style=\"-webkit-tap-highlight-color: transparent; margin: 2rem 1.2rem; padding: 0px; word-wrap: break-word; color: rgb(26, 26, 26); font-size: 16.5px; line-height: 33px; text-align: justify; letter-spacing: 0.7px; font-family: Helvetica, 黑体; white-space: normal; background-color: rgb(255, 255, 255);\">放在极简空间，</p><p class=\"text\" style=\"-webkit-tap-highlight-color: transparent; margin: 2rem 1.2rem; padding: 0px; word-wrap: break-word; color: rgb(26, 26, 26); font-size: 16.5px; line-height: 33px; text-align: justify; letter-spacing: 0.7px; font-family: Helvetica, 黑体; white-space: normal; background-color: rgb(255, 255, 255);\">也是质感十足啊！</p><p class=\"text\" style=\"-webkit-tap-highlight-color: transparent; margin: 2rem 1.2rem; padding: 0px; word-wrap: break-word; color: rgb(26, 26, 26); font-size: 16.5px; line-height: 33px; text-align: justify; letter-spacing: 0.7px; font-family: Helvetica, 黑体; white-space: normal; background-color: rgb(255, 255, 255);\">三分长相七分打扮，</p><p class=\"text\" style=\"-webkit-tap-highlight-color: transparent; margin: 2rem 1.2rem; padding: 0px; word-wrap: break-word; color: rgb(26, 26, 26); font-size: 16.5px; line-height: 33px; text-align: justify; letter-spacing: 0.7px; font-family: Helvetica, 黑体; white-space: normal; background-color: rgb(255, 255, 255);\">天然材质的藤编、草编家具，</p><p class=\"text\" style=\"-webkit-tap-highlight-color: transparent; margin: 2rem 1.2rem; padding: 0px; word-wrap: break-word; color: rgb(26, 26, 26); font-size: 16.5px; line-height: 33px; text-align: justify; letter-spacing: 0.7px; font-family: Helvetica, 黑体; white-space: normal; background-color: rgb(255, 255, 255);\">怎么搭才时髦？</p><p class=\"text\" style=\"-webkit-tap-highlight-color: transparent; margin: 2rem 1.2rem; padding: 0px; word-wrap: break-word; color: rgb(26, 26, 26); font-size: 16.5px; line-height: 33px; text-align: justify; letter-spacing: 0.7px; font-family: Helvetica, 黑体; white-space: normal; background-color: rgb(255, 255, 255);\">真实案例奉上！</p><p><br/></p>', '/static/uploads/20180805/a9a7eabe854faba9433c9c4c2ebaaee8.jpg', 22, 1, 1533463502, 2),
(16, '582辆重型拖挂车频繁行驶，交警将重点研判查处', '韩非子', '记者昨日获悉，深圳目前有582辆存在交通安全隐患的重型拖挂车频繁上路行驶，交警部门表示将重点分析研判查处。', '户外,新闻', '<p><span style=\"color: rgb(27, 27, 27); font-family: Helvetica, arial, 微软雅黑, &quot;Microsoft YaHei&quot;, freesans, clean, sans-serif; text-indent: 32px; background-color: rgb(255, 255, 255);\">据介绍，交警部门对深圳重型拖挂车的车辆状态及违法未处理情况进行梳理，发现共有15903辆存在逾期未报废、未检验和3次以上违法未处理。其中，有5247辆逾期未报废，9811辆逾期未检验，845辆3次以上违法未处理，有6辆超过100次以上违法未处理。经对行驶轨迹进行分析，近期有582辆在深圳频繁行驶。</span></p>', '/static/uploads/20180805/1de0537a38da1187615804eff48ab7fd.jpg', 0, 0, 1533463555, 6);

-- --------------------------------------------------------

--
-- 表的结构 `tp_cate`
--

CREATE TABLE `tp_cate` (
  `id` mediumint(9) NOT NULL,
  `catename` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_cate`
--

INSERT INTO `tp_cate` (`id`, `catename`) VALUES
(1, ' 美食'),
(2, '健身'),
(3, '养生'),
(4, '服装'),
(6, '旅游'),
(7, '新闻');

-- --------------------------------------------------------

--
-- 表的结构 `tp_links`
--

CREATE TABLE `tp_links` (
  `id` mediumint(9) NOT NULL,
  `title` varchar(30) NOT NULL,
  `url` varchar(60) NOT NULL,
  `desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_links`
--

INSERT INTO `tp_links` (`id`, `title`, `url`, `desc`) VALUES
(1, '百度网', 'http://www.baidu.com', '');

-- --------------------------------------------------------

--
-- 表的结构 `tp_tags`
--

CREATE TABLE `tp_tags` (
  `id` mediumint(9) NOT NULL,
  `tagname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_tags`
--

INSERT INTO `tp_tags` (`id`, `tagname`) VALUES
(1, '趋势'),
(2, '奇闻'),
(4, '星座'),
(5, '股市'),
(6, 'PHP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tp_admin`
--
ALTER TABLE `tp_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_article`
--
ALTER TABLE `tp_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_cate`
--
ALTER TABLE `tp_cate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_links`
--
ALTER TABLE `tp_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tp_tags`
--
ALTER TABLE `tp_tags`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `tp_admin`
--
ALTER TABLE `tp_admin`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 使用表AUTO_INCREMENT `tp_article`
--
ALTER TABLE `tp_article`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '文章ｉｄ', AUTO_INCREMENT=17;
--
-- 使用表AUTO_INCREMENT `tp_cate`
--
ALTER TABLE `tp_cate`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `tp_links`
--
ALTER TABLE `tp_links`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `tp_tags`
--
ALTER TABLE `tp_tags`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
