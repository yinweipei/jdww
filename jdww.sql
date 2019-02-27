-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019-01-15 14:30:26
-- 服务器版本： 5.5.56-log
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jdww`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL COMMENT '账号',
  `password` char(20) NOT NULL COMMENT '密码',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '账号创建时间	',
  `login_time` int(11) NOT NULL DEFAULT '0' COMMENT '上次登录时间	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin_user`
--

INSERT INTO `admin_user` (`id`, `name`, `password`, `create_time`, `login_time`) VALUES
(1, 'admin', 'cd42cbf4bdca039cf500', 1535009976, 0);

-- --------------------------------------------------------

--
-- 表的结构 `age_record`
--

CREATE TABLE `age_record` (
  `id` int(10) UNSIGNED NOT NULL,
  `age` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `age_record`
--

INSERT INTO `age_record` (`id`, `age`, `user_id`, `create_time`, `update_time`) VALUES
(1, 25, 1, 1534736722, 1534750982),
(2, 21, 1, 1434650374, 0),
(3, 45, 2, 1534736722, 0),
(4, 11, 3, 1534750681, 1534751803),
(5, 27, 4, 1534842425, 1534847059),
(6, 21, 4, 1534907399, 1534933929),
(7, 2, 5, 1534920513, 1534926100),
(8, 23, 4, 1534996770, 1535016441),
(9, 3, 5, 1535019883, 1535020061),
(10, 27, 6, 1535020259, 1535020425),
(11, 35, 5, 1535074590, 1535122552),
(12, 22, 4, 1535074688, 1535091322),
(13, 22, 6, 1535075148, 1535095180),
(14, 29, 10, 1535078820, 1535091242),
(15, 34, 11, 1535080084, 1535094725),
(16, 27, 12, 1535080143, 1535080608),
(17, 25, 13, 1535080196, 0),
(18, 22, 16, 1535099013, 1535099119),
(19, 49, 5, 1535609082, 0),
(20, 25, 5, 1536203129, 0),
(21, 46, 10, 1536225435, 0),
(22, 52, 10, 1536652145, 0),
(23, 55, 10, 1536828577, 1536835950),
(24, 46, 10, 1536896129, 0),
(25, 42, 13, 1539417477, 1539433838),
(26, 23, 4, 1539653282, 0);

-- --------------------------------------------------------

--
-- 表的结构 `friends_list`
--

CREATE TABLE `friends_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `friends_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `friends_list`
--

INSERT INTO `friends_list` (`id`, `user_id`, `friends_id`, `create_time`, `update_time`) VALUES
(1, 1, 2, 0, 0),
(2, 1, 3, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_08_16_013624_create_user_table', 1),
(2, '2018_08_16_015044_create_signin_table', 1),
(3, '2018_08_16_062711_create_age_record_table', 1),
(4, '2018_08_16_062742_create_friends_list_table', 1);

-- --------------------------------------------------------

--
-- 表的结构 `signin`
--

CREATE TABLE `signin` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '每日标题',
  `day` tinyint(4) NOT NULL COMMENT '星期',
  `datetime` date NOT NULL COMMENT '日期',
  `calendar` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '农历',
  `interpretation` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '解语',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:正常 2:删除	',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `signin`
--

INSERT INTO `signin` (`id`, `title`, `day`, `datetime`, `calendar`, `interpretation`, `status`, `create_time`, `update_time`) VALUES
(1, '相信自己', 1, '2018-08-20', '六月廿七', '不要因那5%的否定，忽略自己100%的努力', 0, 1534736722, 0),
(2, '相信自己', 1, '2018-08-21', '六月廿七', '不要因那5%的否定，忽略自己100%的努力', 1, 1534736722, 0),
(3, '勿忘本心', 4, '2018-08-23', '七月十三', '每个人 都是一条河流，每条河 都有自己的方向', 1, 1535019222, 1535019782),
(4, '勿放心上', 5, '2018-08-24', '七月十四', '有时候                与其多心          不如少根筋', 1, 1535019654, 1535075754),
(5, '恋爱达人', 4, '2018-08-25', '七月十五', '取得成功不一定收获爱情，但有爱情也是一种成功', 1, 1535019756, 0),
(6, '测试1', 5, '2018-08-26', '七月十六', '测试1', 0, 1535076068, 1535076079);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `nickname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '昵称',
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '手机',
  `sex` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1.male 2.female',
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '邮箱',
  `image_url` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '头像',
  `remarks` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '备注',
  `openid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:正常 2:删除',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `nickname`, `phone`, `sex`, `email`, `image_url`, `remarks`, `openid`, `status`, `create_time`, `update_time`) VALUES
(1, 'admin', '18862665621', 1, '151561566@qq.com', '', NULL, 'fsdfsdfjsdifsdfserre', 0, 1534736722, 0),
(2, 'user1', '18862665342', 1, '151561566@qq.com', '', '我是会员user1', '', 0, 1534736722, 1535019103),
(3, 'user2', '13564647474', 1, '32577345@qq.com', '', NULL, '', 1, 1534736722, 1535019489),
(4, '婷I5', '', 2, '', 'https://wx.qlogo.cn/mmopen/vi_32/SzfmLc5jnLNg6lOUGX2Nt7kLCEBfUbvFcUfHWWpYyEERK8nPBTOk8lqElKLicVu2LYpuIbUiaib6OjfrXiaEiaLM6jQ/132', NULL, 'o73SK5RXcjaH0rQOBUphZZcPZvvg', 1, 1539653237, 0),
(5, 'bingying', '', 2, '', 'https://wx.qlogo.cn/mmopen/vi_32/wniceYINpGxXoRz5HyUoBZXdVM4ve0FF7To4CtpGutEjllnShWjYOesYLu160n1wibAHqaFrVwkERncE2dcubTPQ/132', NULL, 'o73SK5YQZew9MlPzr_tv5eRYEcTY', 1, 1536203127, 0),
(6, '啧啧', '18856321521', 2, '11313@163.com', 'https://wx.qlogo.cn/mmopen/vi_32/iaiciauuu1aHNBmQmYiaZqOAkZeUokPfKsrWUmpICbO1KxJfmpbxU0jukyNbUP1JZrQa4YxmGIhLpBVFz6XPyb6pQg/132', '测试', 'o73SK5Z4XQkmb-me6_VDvFhpVHac', 1, 1535094643, 1535079725),
(7, '董平', '13637325168', 0, '3454561@qq.com', 'https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTLx3ABPM4OjzbiciaYNE4Pibd9Zvjs546yz6p1TofBnfZwJUSRRmWzT8mb7Gic6iaOfVY6hyyMO5etdNJw/132', NULL, 'o73SK5U3iY9Zn1qRA3By_IYKKurU', 1, 1535075958, 1535079772),
(8, '测食鸡', '', 0, '', 'https://wx.qlogo.cn/mmopen/vi_32/pWKbrJAcPia0WCxVXbSqAUUpzB8TnicyQ2gXOluLgEALE69AFJB7kf8guUG5cJRJA8m5sH4mnv8iavS8ObKqiaZ8ew/132', NULL, 'o73SK5XWJj0aCwGGoaSgtx94uMIU', 1, 1534736722, 0),
(9, '柴进', '', 0, '', 'https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTJH5aePJFledTSh4DXibnsHgfMjB5SflysBXCzxpnVUiaibdfERPqfSo9liaYCtH7CdWIZDlsiaTgfEs1w/132', NULL, 'o73SK5V7sCjYkbzPP5JmfBJyRhMs', 1, 1534736722, 0),
(10, '吴振峰', '', 1, '', 'https://wx.qlogo.cn/mmopen/vi_32/m3HsXUCVxztw2y0NLibq8ofpfsHzSkGwUJmN1vL6D5UL3v1p33SS72tMWG9jNkg81gvnFtRm1RgskqzTL4iakKHg/132', NULL, 'o73SK5bchwRH2YkB74iM-es3NbCw', 1, 1536896127, 0),
(11, 'DY', '', 1, '', 'https://wx.qlogo.cn/mmopen/vi_32/gcnQdupYTJbC67bWZF3xqvv7Fg0GGDH6LM4IeIoUZws1ibdFV32ngiclQlm83OriacqbmAYJWJ9N62RHR0Tia3GXaw/132', NULL, 'o73SK5fR9uUf7o2nyL1pEIBmLk4Y', 1, 1535704100, 0),
(12, '周伯通', '', 2, '', 'https://wx.qlogo.cn/mmopen/vi_32/BN8EuIHLaSeV1b9d1tWJCLFV1pz2mAos897pEjRqy1te8bjUJfWQ5K4yAL7QjTotG3nNfAOkZgEFDPC7E2vsww/132', NULL, 'o73SK5TJXPp5mh-W7BoHrXx8mff8', 1, 1535080573, 0),
(13, '高科技·大健康·宋', '', 2, '', 'https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKicyAlLiaPY06srXITg52ehb5U1qmshZ8mbOebJibpEkU6PHXaWTGDHSNM58HfM1ql18JqzMxSib0m1w/132', NULL, 'o73SK5a9EAQJMWYY7jGzrM9t9wa4', 1, 1539433811, 0),
(14, '凌风漠然', '', 1, '', 'https://wx.qlogo.cn/mmopen/vi_32/rQFialYmNteSib5oZVfEjyDl2qytZPoK1MSqT2sArOgR6JoEKcab00FDqJKPVdPQde9zfK3Sia6rvOW6XYibic1Lj3g/132', NULL, 'o73SK5d5iiocE85SCJSr0JYMX07g', 1, 1535081760, 0),
(15, '关胜', '', 0, '', 'https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKmPib4xRxiaIugOGwsJ9ibiciaLzukJuJowGtOPia0yWlIRicfausurib0xPT9Rx3vln1UnppKTRxz584Iiaw/132', NULL, 'o73SK5fZgWdg58-ssoW6gM_euEh0', 1, 1535091303, 0),
(16, 'Andy', '', 2, '', 'https://wx.qlogo.cn/mmopen/vi_32/I9OmXavfPgSp6rbXCCpexiaxJpJA0ibkpDPA1ic7INWfDsRxT4XKgXgjkC5Oicoqic0nTnOrXNxaq6DUb4h1bVODqPA/132', NULL, 'o73SK5USeSuht0_ZdapIQZNoLJwM', 1, 1535098992, 0),
(17, '鹃lexi', '', 2, '', 'https://wx.qlogo.cn/mmopen/vi_32/V8oDkDQoExSuJDpOkFOKRervOEIlOgQJIryHgKo8sP8VcpeG4wKxZRLHdKNesGNN2INhRziaJ0kfx63eZnIxkjg/132', NULL, 'o73SK5VdujARD5-TbU3rtve4HziQ', 1, 1535190223, 0),
(18, '🐱谢大榕🐱', '', 2, '', 'https://wx.qlogo.cn/mmopen/vi_32/kZPrqwVbmcE4FXZtdlGibmdNVn8EK7Uy2V7LVTrEonBeL5axF5ZcKXuRwB4O54osH8LDGnU2KiabHBC9VD8qCDHg/132', NULL, 'o73SK5Y_zdF-B9Einc-tQsfAbIYM', 1, 1535200817, 0),
(19, '老虎跑的慢', '', 1, '', 'https://wx.qlogo.cn/mmopen/vi_32/Bp2nA4rqq3Fu6Hd4QC7Ws1LHzibwSknLgGoRzK9lkTqXLzfRGVO49HQhRiaeoXQYQGicv8ZM91wA1pWLfsjicvicFiaw/132', NULL, 'o73SK5bKp76nhbcmoNCGeJnB8w44', 1, 1536128841, 0),
(20, '岚jessica', '', 2, '', 'https://wx.qlogo.cn/mmopen/vi_32/TSdcjPUhU5sLDU0cUKOIoftcGSvb5pG1SBJSbYlsQIibW3KjyjQkCuMF6JG9Hqvdg1ibAblwUff42MyapjFDGaKQ/132', NULL, 'o73SK5W29L1zT9qRFEYmDMPP4Wws', 1, 1536202917, 0),
(21, 'Zeng', '', 2, '', 'https://wx.qlogo.cn/mmopen/vi_32/fn5b8bnIDibrEYoKjTFYjMeVYKnfskg0pceyhyiblI9xxlM97mQPsVWXZIrVUvb7AI5DPgsjAXplIe9iaOXFUsaSg/132', NULL, 'o73SK5bspX3kdUI1Ir5GlDW_HWeA', 1, 1540890298, 0),
(22, '纤尘', '', 2, '', 'https://wx.qlogo.cn/mmopen/vi_32/kicVkG3iaZQ8NKfnX0oIdrQWmQCIpIkSRkSwghsbibsHjF4MQCKFh1aHyDUorictkQYIh4ohyqHJU1XaibEZLlaCjMw/132', NULL, 'o73SK5YNwm50MIZ5qE9E8lf9NcaA', 1, 1543820283, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `age_record`
--
ALTER TABLE `age_record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `age_record_user_id_index` (`user_id`);

--
-- Indexes for table `friends_list`
--
ALTER TABLE `friends_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signin`
--
ALTER TABLE `signin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `openid` (`openid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `age_record`
--
ALTER TABLE `age_record`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- 使用表AUTO_INCREMENT `friends_list`
--
ALTER TABLE `friends_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `signin`
--
ALTER TABLE `signin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
