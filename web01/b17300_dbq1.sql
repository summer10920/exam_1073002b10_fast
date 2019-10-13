-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2019 年 10 月 13 日 04:10
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
-- 資料表結構 `q1t3_title`
--

CREATE TABLE `q1t3_title` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dpy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `q1t3_title`
--

INSERT INTO `q1t3_title` (`id`, `img`, `text`, `dpy`) VALUES
(1, '01B01.jpg', '卓越科技大學校園資訊系統', 0),
(2, '01B02.jpg', '卓越科技大學校園資訊系統', 1),
(3, '01B03.jpg', '卓越科技大學校園資訊系統', 0),
(4, '01B04.jpg', '卓越科技大學校園資訊系統', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `q1t4_maqe`
--

CREATE TABLE `q1t4_maqe` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dpy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `q1t4_maqe`
--

INSERT INTO `q1t4_maqe` (`id`, `text`, `dpy`) VALUES
(1, '轉知臺北教育大學與臺灣師大合辦第11屆麋研齋全國硬筆書法比賽活動', 1),
(2, '轉知:法務部辦理「第五屆法規知識王網路闖關競賽辦法', 1),
(3, '轉知2012年全國青年水墨創作大賽活動', 1),
(4, '欣榮圖書館101年悅讀達人徵文比賽，歡迎全校師生踴躍投稿參加', 1),
(5, '轉知:教育是人類升沉的樞紐-2013教師生命成長營', 1),
(8, 'GGG', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `q1t5_mvim`
--

CREATE TABLE `q1t5_mvim` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dpy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `q1t5_mvim`
--

INSERT INTO `q1t5_mvim` (`id`, `text`, `dpy`) VALUES
(1, '01C01.swf', 1),
(2, '01C02.swf', 1),
(3, '01C03.swf', 1),
(4, '01C04.swf', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `q1t6_img`
--

CREATE TABLE `q1t6_img` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dpy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `q1t6_img`
--

INSERT INTO `q1t6_img` (`id`, `text`, `dpy`) VALUES
(1, '01D01.jpg', 1),
(2, '01D02.jpg', 1),
(3, '01D03.jpg', 1),
(4, '01D04.jpg', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `q1t7_total`
--

CREATE TABLE `q1t7_total` (
  `id` int(10) UNSIGNED NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `q1t7_total`
--

INSERT INTO `q1t7_total` (`id`, `num`) VALUES
(1, 557);

-- --------------------------------------------------------

--
-- 資料表結構 `q1t8_footer`
--

CREATE TABLE `q1t8_footer` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `q1t8_footer`
--

INSERT INTO `q1t8_footer` (`id`, `text`) VALUES
(1, '這裡是頁尾版權資料2');

-- --------------------------------------------------------

--
-- 資料表結構 `q1t9_news`
--

CREATE TABLE `q1t9_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dpy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `q1t9_news`
--

INSERT INTO `q1t9_news` (`id`, `text`, `dpy`) VALUES
(1, '教師研習「世界公民生命園丁國內研習會」\r\n1.主辦單位：世界展望會\r\n2.研習日期：101年11月14日（三）～15日（四）\r\n3.詳情請參考：\r\nhttp://gc.worldvision.org.tw/seed.html。\r\n請線上報名。', 0),
(2, '公告綜合高中一年級英數補救教學時間\r\n上課日期:10/27.11/3.11/10.11/24共計四萬次\r\n上課時間:早上8:00~11:50半天\r\n費用:全程免費\r\n參加同學:綜合科一年級第一次段考成績需加強者\r\n已將名單送交各班及導師\r\n參加同學請帶紙筆.課本.第一次段考考卷\r\n並將家長通知單給家長\r\n若有任何疑問\r\n請洽綜合高中學程主任', 1),
(3, '102年全國大專校院運動會asdasd\r\n「主題標語及吉祥物命名」\r\n網路票選活動\r\n一、活動期間：自10月25日起至11月4日止。\r\n二、相關訊息請上宜蘭大學首頁連結「102全大運在宜大」\r\n活動網址：http://102niag.niu.edu.tw/', 1),
(4, '台灣亞洲藝術文化教育交流學會第一屆年會國際研討會\r\n活動日期：101年3月3～4日(六、日)\r\n活動主題：創造力、文化、全人教育\r\n有意參加者請至http://www.caaetaiwan.org下載報名表', 0),
(5, '11月23日(星期五)將於彰化縣田尾鄉菁芳園休閒農場\r\n舉辦「高中職生涯輔導知能研習」\r\n中區學校每校至多2名\r\n以普通科、專業類科教師優先報名參加\r\n生涯規劃教師次之，參加人員公差假\r\n並核實派代課\r\n當天還有專車接送(8:35前在員林火車站集合)\r\n如此好康的機會，怎能錯過？！\r\n熱烈邀請師長們向輔導室(分機234)報名\r\n名額有限，動作要快！！\r\n報名截止日期：本周四 10月25日17:00前！', 1),
(6, '台視百萬大明星節目辦理海選活動\r\n時間:101年10月27日下午13時\r\n地點:彰化', 1),
(7, '國立故宮博物院辦理\r\n「商王武丁與后婦好 殷商盛世文化藝術特展」暨\r\n「赫赫宗周 西周文化特展」', 1),
(8, '財團法人漢光教育基金會\r\n辦理2012「舊愛新歡-古典詩詞譜曲創作暨歌唱表演競賽」\r\n參賽獎金豐厚!!', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `q1t10_admin`
--

CREATE TABLE `q1t10_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `q1t10_admin`
--

INSERT INTO `q1t10_admin` (`id`, `acc`, `pwd`) VALUES
(1, 'admin', '1234'),
(2, 'root', '1234');

-- --------------------------------------------------------

--
-- 資料表結構 `q1t12_menu`
--

CREATE TABLE `q1t12_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `dpy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `q1t12_menu`
--

INSERT INTO `q1t12_menu` (`id`, `text`, `link`, `parent`, `dpy`) VALUES
(1, '管理登入', 'login.php', 0, 1),
(2, '網站首頁', 'index.php', 0, 1),
(3, '更多內容', 'news.php', 2, 0),
(5, 'bb', 'bb', 2, 0),
(7, 'BIG', '123', 0, 0),
(8, 'A', '1', 7, 0),
(9, 'B', '2', 7, 0),
(12, 'C', '3', 7, 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `q1t3_title`
--
ALTER TABLE `q1t3_title`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `q1t4_maqe`
--
ALTER TABLE `q1t4_maqe`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `q1t5_mvim`
--
ALTER TABLE `q1t5_mvim`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `q1t6_img`
--
ALTER TABLE `q1t6_img`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `q1t7_total`
--
ALTER TABLE `q1t7_total`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `q1t8_footer`
--
ALTER TABLE `q1t8_footer`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `q1t9_news`
--
ALTER TABLE `q1t9_news`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `q1t10_admin`
--
ALTER TABLE `q1t10_admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `q1t12_menu`
--
ALTER TABLE `q1t12_menu`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `q1t3_title`
--
ALTER TABLE `q1t3_title`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用資料表 AUTO_INCREMENT `q1t4_maqe`
--
ALTER TABLE `q1t4_maqe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用資料表 AUTO_INCREMENT `q1t5_mvim`
--
ALTER TABLE `q1t5_mvim`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用資料表 AUTO_INCREMENT `q1t6_img`
--
ALTER TABLE `q1t6_img`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用資料表 AUTO_INCREMENT `q1t7_total`
--
ALTER TABLE `q1t7_total`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `q1t8_footer`
--
ALTER TABLE `q1t8_footer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `q1t9_news`
--
ALTER TABLE `q1t9_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用資料表 AUTO_INCREMENT `q1t10_admin`
--
ALTER TABLE `q1t10_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `q1t12_menu`
--
ALTER TABLE `q1t12_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
