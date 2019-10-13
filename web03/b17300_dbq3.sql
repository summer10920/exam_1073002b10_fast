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
-- 資料表結構 `q3t5_effect`
--

CREATE TABLE `q3t5_effect` (
  `id` int(10) UNSIGNED NOT NULL,
  `once` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `q3t5_effect`
--

INSERT INTO `q3t5_effect` (`id`, `once`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- 資料表結構 `q3t5_img`
--

CREATE TABLE `q3t5_img` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `odr` int(11) NOT NULL,
  `dpy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `q3t5_img`
--

INSERT INTO `q3t5_img` (`id`, `text`, `img`, `odr`, `dpy`) VALUES
(1, '03A01', '03A01.jpg', 1, 1),
(2, '03A02', '03A02.jpg', 2, 1),
(3, '03A03', '03A03.jpg', 4, 1),
(4, '03A04', '03A04.jpg', 5, 1),
(5, '03A05', '03A05.jpg', 6, 1),
(6, '03A06', '03A06.jpg', 7, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `q3t7_movie`
--

CREATE TABLE `q3t7_movie` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cls` int(11) NOT NULL,
  `length` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `corp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `maker` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `odr` int(11) NOT NULL,
  `dpy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `q3t7_movie`
--

INSERT INTO `q3t7_movie` (`id`, `title`, `cls`, `length`, `date`, `corp`, `maker`, `video`, `img`, `text`, `odr`, `dpy`) VALUES
(1, '電影名稱A', 1, '1分30秒', '2019-04-21', '發行商A', '導演A', '03B01v.mp4', '03B01.png', '內容與劇情介紹A', 1, 1),
(2, '電影名稱B', 2, '1分30秒', '2019-04-21', '發行商B', '導演B', '03B02v.mp4', '03B02.png', '內容與劇情介紹B', 2, 1),
(3, '電影名稱C', 3, '1分30秒', '2019-04-21', '發行商C', '導演C', '03B03v.mp4', '03B03.png', '內容與劇情介紹C', 3, 1),
(4, '電影名稱D', 4, '1分30秒', '2019-04-21', '發行商D', '導演D', '03B04v.mp4', '03B04.png', '內容與劇情介紹D', 4, 1),
(5, '電影名稱E', 1, '1分30秒', '2019-04-21', '發行商E', '導演E', '03B05v.mp4', '03B05.png', '內容與劇情介紹E', 5, 1),
(6, '電影名稱F', 2, '1分30秒', '2019-04-21', '發行商F', '導演F', '03B06v.mp4', '03B06.png', '內容與劇情介紹F', 6, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `q3t8_book`
--

CREATE TABLE `q3t8_book` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` int(11) NOT NULL,
  `seat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `buydate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `q3t5_effect`
--
ALTER TABLE `q3t5_effect`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `q3t5_img`
--
ALTER TABLE `q3t5_img`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `q3t7_movie`
--
ALTER TABLE `q3t7_movie`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `q3t8_book`
--
ALTER TABLE `q3t8_book`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `q3t5_effect`
--
ALTER TABLE `q3t5_effect`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `q3t5_img`
--
ALTER TABLE `q3t5_img`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用資料表 AUTO_INCREMENT `q3t7_movie`
--
ALTER TABLE `q3t7_movie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用資料表 AUTO_INCREMENT `q3t8_book`
--
ALTER TABLE `q3t8_book`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
