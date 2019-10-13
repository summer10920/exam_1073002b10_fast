-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2019 年 10 月 13 日 04:12
-- 伺服器版本: 5.5.57-MariaDB
-- PHP 版本： 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `b17300_db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `q4t4_class`
--

CREATE TABLE `q4t4_class` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `q4t4_class`
--

INSERT INTO `q4t4_class` (`id`, `text`, `parent`) VALUES
(1, '流行皮件', 0),
(2, '流行鞋區', 0),
(3, '流行飾品', 0),
(4, '背包', 0),
(5, '男用皮件', 1),
(6, '女用皮件', 1),
(7, '少女鞋區', 2),
(8, '紳士流行鞋區', 2),
(9, '時尚手錶', 3),
(10, '時尚珠寶', 3),
(11, '背包', 4);

-- --------------------------------------------------------

--
-- 資料表結構 `q4t5_product`
--

CREATE TABLE `q4t5_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `fa` int(11) NOT NULL,
  `son` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `spec` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `num` int(11) NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dpy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `q4t5_product`
--

INSERT INTO `q4t5_product` (`id`, `fa`, `son`, `title`, `price`, `spec`, `num`, `img`, `text`, `dpy`) VALUES
(1, 1, 5, '手工訂製長夾', 1200, '全牛皮', 2, '0403.jpg', '手工製作長夾卡片層6*2 鈔票層 *2 零錢拉鍊層 *1 \r\n採用愛馬仕相同的雙針縫法,皮件堅固耐用不脫線 \r\n材質:直革鞣(馬鞍皮)牛皮製作  \r\n手工染色 ', 1),
(2, 1, 5, '兩用式磁扣腰包', 685, '中型', 18, '0404.jpg', '材質:進口牛皮\r\n顏色:黑色荔枝紋+黑色珠光面皮(黑色縫線)\r\n尺寸:15cm*14cm(高)*6cm(前後)\r\n產地:臺灣', 1),
(3, 1, 5, '超薄設計男士長款真皮', 800, 'L號', 61, '0405.jpg', '基本:編織皮革對摺長款零錢包\r\n特色:最潮流最時尚的單品 \r\n顏色:黑色珠光面皮(黑色縫線)\r\n形狀:黑白格編織皮革對摺 ', 1),
(4, 2, 7, '經典牛皮少女帆船鞋', 1000, 'S號', 6, '0406.jpg', '以傳統學院派風格聞名，創始近百年工藝製鞋精神\r\n共用獨家專利氣墊技術，兼具紐約工藝精神，與舒適跑格靈魂', 1),
(5, 2, 8, '經典優雅時尚流行涼鞋', 2650, 'LL', 8, '0407.jpg', '優雅流線方型楦頭設計，結合簡潔線條綴飾，\r\n獨特的弧度與曲線美，突顯年輕優雅品味，\r\n是年輕上班族不可或缺的鞋款！\r\n全新美國運回，現貨附鞋盒', 1),
(6, 3, 10, '寵愛天然藍寶女戒', 28000, '1克拉', 1, '0408.jpg', '基本:編織皮革對摺長款零錢包\r\n特色:最潮流最時尚的單品 \r\n顏色:黑色珠光面皮(黑色縫線)\r\n形狀:黑白格編織皮革對摺 ◎典雅設計品味款\r\n◎藍寶為珍貴天然寶石之一，具有保值收藏\r\n◎專人設計製造，以貴重珠寶精緻鑲工製造', 1),
(7, 4, 11, '反折式大容量手提肩背包', 888, 'L號', 15, '0409.jpg', '特色:反折式的包口設計,釘釦的裝飾,讓簡單的包型更增添趣味性\r\n材質:棉布\r\n顏色:藍色\r\n尺寸:長50cm寬20cm高41cm\r\n產地:日本\r\n', 1),
(8, 4, 11, '男單肩包男', 650, '多功能', 7, '0410.jpg', '特色:男單肩包/電腦包/公文包/雙肩背包多用途\r\n材質:帆不\r\n顏色:黑色\r\n尺寸:深11cm寬42cm高33cm\r\n產地:香港', 1),
(9, 3, 10, 'GGG', 123, '333', 333, '2019042119573103B11.png', 'ffff', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `q4t8_order`
--

CREATE TABLE `q4t8_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `buy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `q4t8_order`
--

INSERT INTO `q4t8_order` (`id`, `user`, `name`, `mail`, `addr`, `tel`, `buy`, `date`, `total`) VALUES
(3, 'ggg', 'ggg', '222', '222', '222', 'a:2:{i:2;s:1:\"3\";i:3;s:1:\"1\";}', '2019-04-21', 2855);

-- --------------------------------------------------------

--
-- 資料表結構 `q4t9_user`
--

CREATE TABLE `q4t9_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `q4t9_user`
--

INSERT INTO `q4t9_user` (`id`, `acc`, `pwd`, `name`, `mail`, `addr`, `tel`, `date`) VALUES
(1, 'loki', '1234', '11', '22', '33', '44', '2019-03-12');

-- --------------------------------------------------------

--
-- 資料表結構 `q4t10_admin`
--

CREATE TABLE `q4t10_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `q4t10_admin`
--

INSERT INTO `q4t10_admin` (`id`, `acc`, `pwd`, `access`) VALUES
(1, 'admin', '1234', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";}'),
(3, 'loki', '1234', 'a:5:{i:0;s:1:\"1\";i:1;i:0;i:2;s:1:\"1\";i:3;i:0;i:4;s:1:\"1\";}');

-- --------------------------------------------------------

--
-- 資料表結構 `q4t11_footer`
--

CREATE TABLE `q4t11_footer` (
  `id` int(10) UNSIGNED NOT NULL,
  `once` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `q4t11_footer`
--

INSERT INTO `q4t11_footer` (`id`, `once`) VALUES
(1, 'FFFF');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `q4t4_class`
--
ALTER TABLE `q4t4_class`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `q4t5_product`
--
ALTER TABLE `q4t5_product`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `q4t8_order`
--
ALTER TABLE `q4t8_order`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `q4t9_user`
--
ALTER TABLE `q4t9_user`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `q4t10_admin`
--
ALTER TABLE `q4t10_admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `q4t11_footer`
--
ALTER TABLE `q4t11_footer`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `q4t4_class`
--
ALTER TABLE `q4t4_class`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用資料表 AUTO_INCREMENT `q4t5_product`
--
ALTER TABLE `q4t5_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用資料表 AUTO_INCREMENT `q4t8_order`
--
ALTER TABLE `q4t8_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `q4t9_user`
--
ALTER TABLE `q4t9_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用資料表 AUTO_INCREMENT `q4t10_admin`
--
ALTER TABLE `q4t10_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用資料表 AUTO_INCREMENT `q4t11_footer`
--
ALTER TABLE `q4t11_footer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
