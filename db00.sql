-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.1.40-MariaDB
-- PHP 版本： 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db00`
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
-- 傾印資料表的資料 `q1t3_title`
--

INSERT INTO `q1t3_title` (`id`, `img`, `text`, `dpy`) VALUES
(1, '01B01.jpg', '卓越科技大學校園資訊系統', 0),
(2, '01B01.jpg', '卓越科技大學校園資訊系統', 1),
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
-- 傾印資料表的資料 `q1t4_maqe`
--

INSERT INTO `q1t4_maqe` (`id`, `text`, `dpy`) VALUES
(1, '轉知臺北教育大學與臺灣師大合辦第11屆麋研齋全國硬筆書法比賽活動', 1),
(2, '轉知:法務部辦理「第五屆法規知識王網路闖關競賽辦法', 1),
(3, '轉知2012年全國青年水墨創作大賽活動', 1),
(4, '欣榮圖書館101年悅讀達人徵文比賽，歡迎全校師生踴躍投稿參加', 1),
(5, '轉知:教育是人類升沉的樞紐-2013教師生命成長營', 1);

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
-- 傾印資料表的資料 `q1t5_mvim`
--

INSERT INTO `q1t5_mvim` (`id`, `text`, `dpy`) VALUES
(1, '01C01.gif', 1),
(2, '01C02.gif', 1),
(3, '01C03.gif', 1),
(4, '01C04.gif', 1);

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
-- 傾印資料表的資料 `q1t6_img`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `q1t7_total`
--

INSERT INTO `q1t7_total` (`id`, `num`) VALUES
(1, 555);

-- --------------------------------------------------------

--
-- 資料表結構 `q1t8_footer`
--

CREATE TABLE `q1t8_footer` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `q1t8_footer`
--

INSERT INTO `q1t8_footer` (`id`, `text`) VALUES
(1, '這裡是頁尾版權資料');

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
-- 傾印資料表的資料 `q1t9_news`
--

INSERT INTO `q1t9_news` (`id`, `text`, `dpy`) VALUES
(1, '教師研習「世界公民生命園丁國內研習會」\r\n1. 主辦單位：世界展望會、r\n2. 研習日期：101 年 11 月 14 日（三）～15 日（四）\r\n3. 詳情請參考：\r\nhttp://gc.worldvision.org.tw/seed.html。\r\n 請線上報名。', 1),
(2, '公告綜合高中一年級英數補救教學時間、r\n 上課日期：10/27.11/3.11/10.11/24 共計四次、r\n 上課時間：早上 8:00~11:50 半天、r\n 費用：全程免費、r\n 參加同學：綜合科一年級第一次段考成績需加強者、r\n 已將名單送交各班及導師、r\n 參加同學請帶紙筆。課本。第一次段考考卷、r\n 並將家長通知單給家長、r\n 若有任何疑問、r\n 請洽綜合高中學程主任', 1),
(3, '102 年全國大專校院運動會、r\n「主題標語及吉祥物命名」\r\n 網路票選活動、r\n 一、活動期間：自 10 月 25 日起至 11 月 4 日止。\r\n 二、相關訊息請上宜蘭大學首頁連結「102 全大運在宜大」\r\n 活動網址：http://102niag.niu.edu.tw/', 1),
(4, '台灣亞洲藝術文化教育交流學會第一屆年會國際研討會、r\n 活動日期：101 年 3 月 3～4 日（六、日）\r\n 活動主題：創造力、文化、全人教育、r\n 有意參加者請至 http://www.caaetaiwan.org 下載報名表', 1),
(5, '11 月 23 日（星期五）將於彰化縣田尾鄉菁芳園休閒農場、r\n 舉辦「高中職生涯輔導知能研習」\r\n 中區學校每校至多 2 名、r\n 以普通科、專業類科教師優先報名參加、r\n 生涯規劃教師次之，參加人員公差假、r\n 並核實派代課、r\n 當天還有專車接送 (8:35 前在員林火車站集合）\r\n 如此好康的機會，怎能錯過？！\r\n 熱烈邀請師長們向輔導室（分機 234) 報名、r\n 名額有限，動作要快！！\r\n 報名截止日期：本周四 10 月 25 日 17:00 前！', 1),
(6, '台視百萬大明星節目辦理海選活動、r\n 時間：101 年 10 月 27 日下午 13 時、r\n 地點：彰化', 1);

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
-- 傾印資料表的資料 `q1t10_admin`
--

INSERT INTO `q1t10_admin` (`id`, `acc`, `pwd`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- 資料表結構 `q1t12_menu`
--

CREATE TABLE `q1t12_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fa` int(11) NOT NULL,
  `dpy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `q1t12_menu`
--

INSERT INTO `q1t12_menu` (`id`, `text`, `link`, `fa`, `dpy`) VALUES
(1, '管理登入', 'login.php', 0, 1),
(2, '網站首頁', 'index.php', 0, 1),
(3, '更多內容', 'news.php', 2, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `q2t3_visit`
--

CREATE TABLE `q2t3_visit` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `q2t3_visit`
--

INSERT INTO `q2t3_visit` (`id`, `date`, `num`) VALUES
(1, '2020-05-15', 100);

-- --------------------------------------------------------

--
-- 資料表結構 `q2t6_user`
--

CREATE TABLE `q2t6_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `q2t6_user`
--

INSERT INTO `q2t6_user` (`id`, `acc`, `pwd`, `mail`) VALUES
(1, 'admin', '1234', 'admin@labor.gov.tw'),
(2, 'test', '5678', 'test@labor.gov.tw'),
(3, 'mem01', 'mem01', 'mem01@labor.gov.tw'),
(4, 'mem02', 'mem02', 'mem02@labor.gov.tw');

-- --------------------------------------------------------

--
-- 資料表結構 `q2t7_blog`
--

CREATE TABLE `q2t7_blog` (
  `id` int(10) UNSIGNED NOT NULL,
  `cls` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `num` int(11) NOT NULL,
  `dpy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `q2t7_blog`
--

INSERT INTO `q2t7_blog` (`id`, `cls`, `title`, `text`, `num`, `dpy`) VALUES
(1, 1, '缺乏運動已成為影響全球死亡率的第四大危險因子（一）', '資料來源： 行政院衛生署國民健康局 \r\n 發佈日期： 2012 / 10 / 07\r\n 世界衛生組織指出運動不足已成全球第四大致死因素，每年有 6%的死亡率與運動不足有關，僅次於高血壓（13％）、菸品使用（9％）及高血糖（6％）之後，有超過 200 萬死亡人數可歸因於靜態生活。世界上約 60-85％的成人過著靜態生活，三分之二的兒童運動不足，未來都將影響健康並造成公共衛生問題。運動不足除了增加死亡率，還會使心血管疾病、糖尿病、肥胖的風險加倍，並增加大腸癌、高血壓、骨質疏鬆、脂質失調症（lipid disorders）、憂鬱、焦慮的風險。大約 21-25％乳癌及大腸癌、27%糖尿病與 30％的缺血性心臟病，係因運動不足所造成。許多國家運動不足的人口比率，也正不斷地增加，依據行政院體育委員會 2011 年運動城巿調查結果顯示，國人無規律運動習慣之比率高達 72.2%。\r\n 我國十大死因的危險因子皆與運動不足有關，運動的好處很多，可以預防慢性疾病，降低罹患癌症、跌倒的風險等。國家衛生研究院溫啟邦教授利用台灣一個大型的追蹤世代，分析各個不同運動量的健康效益。研究發現，與不運動的人相比，每天運動 15 分鐘（每週約 90 分鐘）是可以減少 14%總死亡、10%癌症死亡及 20%的心血管疾病死亡，延長 3 年壽命。這些好處不但適用於各個年齡層包括年青人、年老人，也適用於男性與女性，對有心血管疾病風險的人包括吸菸、肥胖者，也一樣有用。\r\n 國民健康局鼓勵民眾養成規律運動習慣，對於預防心血管疾病、糖尿病、高血脂以及高血壓等，都有顯著的效益，並可降低罹患癌症的風險，加速代謝脂肪，強化肌肉組織與功能，維持健康體重，提高腦內啡的釋放，降低情緒壓力。一般而言，成人只要每週運動累積達 150 分鐘、兒童每日運動累積 60 分鐘，就能有足夠的運動量，建議成人每天運動 30 分鐘，可分段累積運動量，效果與一次做完一樣。例如上下班（學）通勤時間與中午休息時間分段進行，每次 15 分鐘分 2 次或是每次 10 分鐘分 3 次完成，只要每天持之以恆，健康體能就會大大地提昇。\r\n 許多上班族時常抱怨沒時間或空間運動，國民健康局製作 15 分鐘「上班族健康操」，不受場地、服裝的限制，每天上、下午各跳 15 分鐘健康操，可消耗 100 大卡的熱量，持續 1 年，約可減少 4 公斤，不但消耗過多熱量，還能促進身體健康。國民健康局為幫助同仁達到規律運動，運用電腦提示系統，於每天上午 9 時 45 分及下午 3 時 45 分，電腦螢幕會自動跳出「上班族健康操」畫面，鼓勵同仁暫時放下手邊的工作，隨著音樂一起動一動。\r\n 對於沒有運動習的民眾，「健走」也是很好的入門運動，衛生署國民健康局自 91 年起推動「每日一萬步 健康有保固」，「健走」是既簡單又輕鬆的運動，不需特殊裝備，只要穿著輕便服裝、運動鞋，運用「抬頭挺胸縮小腹、雙手微握放腰部、自然擺動肩放鬆、邁開腳步向前行」健走小口訣，以 4 公里/小時的速度，日行萬步，只要 90 分鐘，步行約 6 公里，就可以消耗約 300 大卡，走向健康。\r\n 國民健康局並介紹運動生活化之小撇步，協助民眾落實生活化的運動。', 1, 1),
(2, 1, '缺乏運動已成為影響全球死亡率的第四大危險因子（二）', '1. 從日常生活中找出時間來活動，例如：步行買午、晚餐、水果、日用品；步行去用餐；蹓狗。\r\n2. 外出或是上下班（學）不妨多多利用大眾運輸工具，讓自己提早出門提前一站下車，步行至目的地。\r\n3. 可以走樓梯就不要坐電梯，如果一下子沒辦法走這麼多樓梯，步行走上幾層樓後再搭乘電梯，慢慢增加自己的運動量。\r\n4. 多和家人到戶外活動，或騎腳踏車、打球等活動。\r\n5. 假日可以自己動手整理家裡、擦擦地板，也可以增加運動量！或利用掃地、拖地時加大動作幅度，那也是很好的身體活動。\r\n6. 在家裡、辦公室附近找方便的資源運動，包括公園、職場辦的課程、活動。\r\n7. 減少看電視、打電玩等靜態生活的時間。\r\n    民眾對運動如有疑問，可參考國民健康局肥胖防治網-「快樂動」(http://obesity.bhp.gov.tw)，亦可撥打免費市話健康體重管理電話諮詢服務，諮詢專線「0800-367-100（0800-瘦落去-要動動）」，也可利用國民健康局局網首頁或肥胖防治網問題諮詢專區的網路電話撥入功能，向客服人員諮詢關於運動、健康飲食及健康體重管理等相關疑問。', 1, 1),
(3, 2, '菸害防治法規（一）', '第二十三條　　違反第五條或第十條第一項規定者，處新臺幣一萬元以上五萬元以下罰鍰，並得按次連續處罰。\r\n 第二十四條　　製造或輸入違反第六條第一項、第二項或第七條第一項規定之菸品者，處新臺幣一百萬元以上五百萬元以下罰鍰，並令限期回收；屆期未回收者，按次連續處罰，違規之菸品沒入並銷毀之。\r\n 販賣違反第六條第一項、第二項或第七條第一項規定之菸品者，處新臺幣一萬元以上五萬元以下罰鍰。\r\n 第二十五條　　違反第八條第一項規定者，處新臺幣十萬元以上五十萬元以下罰鍰，並令限期申報；屆期未申報者，按次連續處罰。\r\n 規避、妨礙或拒絕中央主管機關依第八條第二項規定所為之取樣檢查（驗）者，處新臺幣十萬元以上五十萬元以下罰鍰。\r\n 第二十六條　　製造或輸入業者，違反第九條各款規定者，處新臺幣五百萬元以上二千五百萬元以下罰鍰，並按次連續處罰。\r\n 廣告業或傳播媒體業者違反第九條各款規定，製作菸品廣告或接受傳播或刊載者，處新臺幣二十萬元以上一百萬元以下罰鍰，並按次處罰。\r\n 違反第九條各款規定，除前二項另有規定者外，處新臺幣十萬元以上五十萬元以下罰鍰，並按次連續處罰。\r\n 第二十七條　　違反第十一條規定者，處新臺幣二千元以上一萬元以下罰鍰。', 1, 1),
(4, 2, '菸害防治法規（二）', '第二十八條　　違反第十二條第一項規定者，應令其接受戒菸教育；行為人未滿十八歲且未結婚者，並應令其父母或監護人使其到場。\r\n 無正當理由未依通知接受戒菸教育者，處新臺幣二千元以上一萬元以下罰鍰，並按次連續處罰；行為人未滿十八歲且未結婚者，處罰其父母或監護人。\r\n 第一項戒菸教育之實施辦法，由中央主管機關定之。\r\n 第二十九條　　違反第十三條規定者，處新臺幣一萬元以上五萬元以下罰鍰。\r\n 第三十條　　製造或輸入業者，違反第十四條規定者，處新臺幣一萬元以上五萬元以下罰鍰，並令限期回收；屆期未回收者，按次連續處罰。\r\n 販賣業者違反第十四條規定者，處新臺幣一千元以上三千元以下罰鍰。\r\n 第三十一條　　違反第十五條第一項或第十六條第一項規定者，處新臺幣二千元以上一萬元以下罰鍰。\r\n 違反第十五條第二項、第十六條第二項或第三項規定者，處新臺幣一萬元以上五萬元以下罰鍰，並令限期改正；屆期未改正者，得按次連續處罰。\r\n 第三十二條　　違反本法規定，經依第二十三條至前條規定處罰者，得併公告被處分人及其違法情形。\r\n 第三十三條　　本法所定罰則，除第二十五條規定由中央主管機關處罰外，由直轄市、縣（市）主管機關處罰之。', 1, 1),
(5, 3, '降低罹癌風險 建構健康生活型態（一）', '癌症防治   三管齊下  Part 1 降低罹癌風險建構健康生活型態 \r\n\r\n 撰文：徐文媛　諮詢對象：衛生署國民健康局副局長趙坤郁 \r\n\r\n 致癌的因素很多，而且往往就存在於我們周遭環境及日常生活中。唯有正常飲食、適當運動、遠離致癌因子、養成健康行為與生活習慣，並改善生活環境品質，才能減少罹癌的危機。\r\n 形塑健康生活新價值觀', 1, 1),
(6, 3, '降低罹癌風險 建構健康生活型態（二）', '「健康生活型態」牽涉的範圍很廣，衛生署國民健康局副局長趙坤郁表示，做為國家癌症防治政策的一環，應優先選擇具實證研究基礎的指標，所以健康飲食、菸害防制、檳榔防制及建立運動習慣，都是目前積極推動的衛生政策。\r\n 生活型態需要長時間建立，所以要改變民眾健康生活型態，必須設定出各項目標策略和衡量指標，設法營造有助達成目標的軟、硬體環境，這些工作往往需要跨部門，甚至從民間社團、社區等基層的參與，才能讓議題逐漸發酵，達到社會價值的建立及風氣的改變。例如在健康飲食方面，至少需要健康局與食品衛生處（未來即將成立的食品藥物管理局）合作，除了宣導正確的飲食習慣，也要為民眾吃的健康把關，避免汙染等有害食物流入巿面。\r\n 在推廣動態生活，建立國人運動習慣上，透過訂定國人健康體能指標，調查全國及各縣巿的運動盛行率，並以每年提升 0.5%為目標，結合體育主管單位及 25 縣巿政府同步進行政策的倡議及執行。以最容易、最安全的健走運動為例，現在 11 月 11 日「健走日」已成為許多縣巿政府的重要活動；而去年健康局選擇竹北、屏東、新莊三個縣轄巿，調查健康體能自治性環境的策略指標及調查評估方法，也成為今年體委會要求各縣巿建置運動地圖時的重要參考。\r\n 建構健康生活型態是「預防勝於治療」的積極實現，不只能降低罹癌風險，也有助降低其他現代文明病的發生，長期來看是最具經濟效益的健康投資。趙坤郁強調，在全球化浪潮下，我們的飲食、嗜好。.. 等生活型態與西方國家愈來愈趨近，疾病型態也可能逐漸接近，必須及早提出因應措施。\r\n \r\n\r\n\r\n 資料來源：行政院衛生署衛生報導 139 期、r\n 上稿日期：2010/1/20', 1, 1),
(7, 4, '長期憋尿 泌尿系統問題多（一）', '資料來源：中央健康保險局雙月刊第 98 期、r\n 上稿日期：2012/08/10\r\n 文／游小雯、r\n 諮詢／郭育成（台北市立聯合醫院陽明院區泌尿科主任）\r\n 膀胱是中空、有彈性的肉囊， 約有 400c.c. 的容積，可暫存由腎臟製造、經輸尿管輸送下來的尿液。一般人排尿量每回約 200 到 350c.c.，每天至少要有 4 到 8 次排尿次數才算正常；如果膀胱已存有近 400c.c 的尿液卻未排出，就會有尿很急、膀胱很脹的感覺，所謂的「憋尿」，就是讓膀胱經常撐在「脹滿」的狀態，沒有適時地清空排尿。「就像水溝的水沒有在流動一樣！」台北市立聯合醫院陽明院區泌尿科郭育成主任表示，把尿憋在膀胱中，就像是沒有流動的髒水，很容易滋生細菌及沉澱物，長期下來，不僅泌尿道易受感染、影響膀胱收縮力，甚至會造成腎臟永久傷害，不僅無法完全修復，還要終身小心照護。\r\n 憋尿會憋出哪些毛病呢？\r\n「憋尿、排尿」這個看似簡單的動作，對身體健康卻有極大的影響，以下 4 項就是一般人最常憋出問題的病症：\r\n1、尿道感染：\r\n 憋尿時，長時間無尿液經過尿道，無法將尿道開口的細菌沖走，大量細菌在尿道聚集，很容易引起發炎，尤其尿流不通暢的人（如前列腺肥大、障礙性排尿或結石），尿道感染的發生率，會比正常人高出許多。\r\n2、膀胱發炎：\r\n 憋尿使膀胱長期脹大，膀胱壁血管受到壓迫，膀胱黏膜就會缺血，只要身體抵抗力差時，細菌趁虛而入即造成「急性膀胱炎」。膀胱炎發生時，膀胱壁變得較敏感，儘管積存的尿液不多，也會急著想上廁所，但一次卻只能尿出一點點；而大部份的膀胱炎，尿道粘膜通常也處於發炎狀態，所以會出現「燒灼感」，此外通常還會有「血尿」的情況發生。比較嚴重的膀胱炎甚至會發燒、併發腎臟炎等症狀。\r\n3、前列腺炎與副睪丸炎：\r\n 男性若水份攝取不夠或憋尿使排尿次數過少，細菌就有機會透過尿道引發感染；嚴重的話，尿液甚至會經由輸精管倒流至前列腺或副睪丸，而引發前列腺炎或副睪丸炎，最嚴重可導致不孕，增加更多棘手的併發症。\r\n4、膀胱損傷：\r\n 長期憋尿會使膀胱過度脹扯、壁肌肉層變薄，如果出現纖維化的情形會影響彈性，導致膀胱收縮力因此變差，而有疼痛、頻尿或尿不乾淨等後遺症；如果神經受損嚴重，膀胱括約肌無力，甚至會造成尿不出來的後果。平日勤保健，別讓憋尿造成終身遺憾許多上班族與公司主管，一忙或開會經常就是好幾個小時，為了不影響進度，常忘了上廁所，即使有尿意也盡量憋著，憋尿不只是造成泌尿系統發炎，尿液回流到腎臟也會造成腎積水引發尿毒症等併發症，最後很可能靠洗腎度日了！', 1, 1),
(8, 4, '長期憋尿 泌尿系統問題多（二）', '平日盡量力行以下 4 項原則：\r\n1、多喝水、不憋尿。\r\n2、注意個人衛生：如多淋浴少盆浴、女生在如廁後記得由前往後擦、性行為前後（不論男女）應注意會陰部、肛門口及尿道口的清潔工作。\r\n3、正常的飲食習慣及充分的休息與睡眠，以增加抵抗力及免疫力。\r\n4、多注意及控制易引發膀胱炎的疾病：如糖尿病、尿路結石、攝護腺肥大等。\r\n 如果民眾發現自己解尿不舒服時，一定要在第一時間就診，讓醫師採用檢體對症下藥，只要沒有其他的特殊問題併存，同時能接受完整療程的抗生素治療，通常一星期左右即可痊癒。不過服藥的時間及用量絕對要遵照醫師囑咐，如果自行隨意停藥或不按時服用，很可能會造成殘存的細菌出現抗藥性，非但原本的症狀無法痊癒，還可能帶來慢性泌尿道發炎、尿路結石、腎臟功能受損等併發症，千萬要特別注意。', 1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `q2t11_good`
--

CREATE TABLE `q2t11_good` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `q2t13_vote`
--

CREATE TABLE `q2t13_vote` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `q2t13_vote`
--

INSERT INTO `q2t13_vote` (`id`, `text`, `parent`, `num`) VALUES
(1, '問題一：你最常做什麼運動來促進健康體能呢？', 0, 0),
(2, '問題二：二手菸沒有安全劑量，只要有暴露，就會有危險，請問它會造成身體上哪些危害？', 0, 0),
(3, '健走或爬樓梯、慢跑等較不受時間、場地限制的運動。', 1, 0),
(4, '仰臥起坐、抬腿及伏地挺身、伸展操、瑜珈等室內運動。', 1, 0),
(5, '球類運動、游泳、跳舞、騎腳踏車等加強心肺功能的運動。', 1, 0),
(6, '舉重鍛鍊、彈力帶、啞鈴等運用輔助器材鍛鍊肌耐力的運動。', 1, 0),
(7, '增加罹患冠狀動脈心臟病及罹病死亡之風險。', 2, 0),
(8, '對孩子的的健康會產生許多影響，例如容易咳嗽或打噴嚏、罹患氣喘或讓症狀更嚴重、會因刺激耳咽管，感染中耳炎、肺功能較差、容易罹患呼吸道疾病等。', 2, 0),
(9, '孕婦吸入二手菸易造成流產、早產、胎盤早期剝離、子宮感染等疾病。', 2, 0),
(10, '長期的暴露會造成更嚴重的胸腔問題和過敏症，還會增加心臟病和肺癌的罹患率。', 2, 0),
(11, '以上皆是。', 2, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `q3t5_effect`
--

CREATE TABLE `q3t5_effect` (
  `id` int(10) UNSIGNED NOT NULL,
  `once` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `q3t5_effect`
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
-- 傾印資料表的資料 `q3t5_img`
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
-- 傾印資料表的資料 `q3t7_movie`
--

INSERT INTO `q3t7_movie` (`id`, `title`, `cls`, `length`, `date`, `corp`, `maker`, `video`, `img`, `text`, `odr`, `dpy`) VALUES
(1, '電影名稱 A', 1, '1 分 30 秒', '2020-05-23', '發行商 A', '導演 A', '03B01v.mp4', '03B01.png', '內容與劇情介紹 A', 1, 1),
(2, '電影名稱 B', 2, '1 分 30 秒', '2020-05-23', '發行商 B', '導演 B', '03B02v.mp4', '03B02.png', '內容與劇情介紹 B', 2, 1),
(3, '電影名稱 C', 3, '1 分 30 秒', '2020-05-24', '發行商 C', '導演 C', '03B03v.mp4', '03B03.png', '內容與劇情介紹 C', 3, 1),
(4, '電影名稱 D', 4, '1 分 30 秒', '2020-05-24', '發行商 D', '導演 D', '03B04v.mp4', '03B04.png', '內容與劇情介紹 D', 4, 1),
(5, '電影名稱 E', 1, '1 分 30 秒', '2020-05-25', '發行商 E', '導演 E', '03B05v.mp4', '03B05.png', '內容與劇情介紹 E', 5, 1),
(6, '電影名稱 F', 2, '1 分 30 秒', '2020-05-25', '發行商 F', '導演 F', '03B06v.mp4', '03B06.png', '內容與劇情介紹 F', 6, 1);

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

-- --------------------------------------------------------

--
-- 資料表結構 `q4t4_class`
--

CREATE TABLE `q4t4_class` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `q4t4_class`
--

INSERT INTO `q4t4_class` (`id`, `title`, `parent`) VALUES
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
  `dpy` int(11) NOT NULL,
  `seq` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `q4t5_product`
--

INSERT INTO `q4t5_product` (`id`, `fa`, `son`, `title`, `price`, `spec`, `num`, `img`, `text`, `dpy`, `seq`) VALUES
(1, 1, 5, '手工訂製長夾', 1200, '全牛皮', 2, '0403.jpg', '手工製作長夾卡片層 6*2 鈔票層 *2 零錢拉鍊層 *1 \r\n 採用愛馬仕相同的雙針縫法，皮件堅固耐用不脫線 \r\n 材質：直革鞣（馬鞍皮）牛皮製作  \r\n 手工染色 ', 1, '010203'),
(2, 1, 5, '兩用式磁扣腰包', 685, '中型', 18, '0404.jpg', '材質：進口牛皮、r\n 顏色：黑色荔枝紋+黑色珠光面皮（黑色縫線）\r\n 尺寸：15cm*14cm（高）*6cm（前後）\r\n 產地：臺灣', 1, '020705'),
(3, 1, 5, '超薄設計男士長款真皮', 800, 'L 號', 61, '0405.jpg', '基本：編織皮革對摺長款零錢包、r\n 特色：最潮流最時尚的單品 \r\n 顏色：黑色珠光面皮（黑色縫線）\r\n 形狀：黑白格編織皮革對摺 ', 1, '020706'),
(4, 2, 7, '經典牛皮少女帆船鞋', 1000, 'S 號', 6, '0406.jpg', '以傳統學院派風格聞名，創始近百年工藝製鞋精神、r\n 共用獨家專利氣墊技術，兼具紐約工藝精神，與舒適跑格靈魂', 1, '030103'),
(5, 2, 8, '經典優雅時尚流行涼鞋', 2650, 'LL', 8, '0407.jpg', '優雅流線方型楦頭設計，結合簡潔線條綴飾，\r\n 獨特的弧度與曲線美，突顯年輕優雅品味，\r\n 是年輕上班族不可或缺的鞋款！\r\n 全新美國運回，現貨附鞋盒', 1, '030203'),
(6, 3, 10, '寵愛天然藍寶女戒', 28000, '1 克拉', 1, '0408.jpg', '基本：編織皮革對摺長款零錢包、r\n 特色：最潮流最時尚的單品 \r\n 顏色：黑色珠光面皮（黑色縫線）\r\n 形狀：黑白格編織皮革對摺 ◎典雅設計品味款、r\n◎藍寶為珍貴天然寶石之一，具有保值收藏、r\n◎專人設計製造，以貴重珠寶精緻鑲工製造', 1, '040202'),
(7, 4, 11, '反折式大容量手提肩背包', 888, 'L 號', 15, '0409.jpg', '特色：反折式的包口設計，釘釦的裝飾，讓簡單的包型更增添趣味性、r\n 材質：棉布、r\n 顏色：藍色、r\n 尺寸：長 50cm 寬 20cm 高 41cm\r\n 產地：日本、r\n', 1, '050107'),
(8, 4, 11, '男單肩包男', 650, '多功能', 7, '0410.jpg', '特色：男單肩包/電腦包/公文包/雙肩背包多用途、r\n 材質：帆不、r\n 顏色：黑色、r\n 尺寸：深 11cm 寬 42cm 高 33cm\r\n 產地：香港', 1, '060108');

-- --------------------------------------------------------

--
-- 資料表結構 `q4t8_order`
--

CREATE TABLE `q4t8_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `buy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- 傾印資料表的資料 `q4t9_user`
--

INSERT INTO `q4t9_user` (`id`, `acc`, `pwd`, `name`, `mail`, `addr`, `tel`, `date`) VALUES
(1, 'test', 'test', '測試 01', 'test@test.com', 'test road', '8888-888-888', '2020-05-18');

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
-- 傾印資料表的資料 `q4t10_admin`
--

INSERT INTO `q4t10_admin` (`id`, `acc`, `pwd`, `access`) VALUES
(1, 'admin', '1234', 'a:5:{i:0;i:1;i:1;i:1;i:2;i:1;i:3;i:1;i:4;i:1;}');

-- --------------------------------------------------------

--
-- 資料表結構 `q4t11_footer`
--

CREATE TABLE `q4t11_footer` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `q4t11_footer`
--

INSERT INTO `q4t11_footer` (`id`, `text`) VALUES
(1, '這裡是頁尾版權資料');

--
-- 已傾印資料表的索引
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
-- 資料表索引 `q2t3_visit`
--
ALTER TABLE `q2t3_visit`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `q2t6_user`
--
ALTER TABLE `q2t6_user`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `q2t7_blog`
--
ALTER TABLE `q2t7_blog`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `q2t11_good`
--
ALTER TABLE `q2t11_good`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `q2t13_vote`
--
ALTER TABLE `q2t13_vote`
  ADD PRIMARY KEY (`id`);

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
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q1t3_title`
--
ALTER TABLE `q1t3_title`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q1t4_maqe`
--
ALTER TABLE `q1t4_maqe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q1t5_mvim`
--
ALTER TABLE `q1t5_mvim`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q1t6_img`
--
ALTER TABLE `q1t6_img`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q1t7_total`
--
ALTER TABLE `q1t7_total`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q1t8_footer`
--
ALTER TABLE `q1t8_footer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q1t9_news`
--
ALTER TABLE `q1t9_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q1t10_admin`
--
ALTER TABLE `q1t10_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q1t12_menu`
--
ALTER TABLE `q1t12_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q2t3_visit`
--
ALTER TABLE `q2t3_visit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q2t6_user`
--
ALTER TABLE `q2t6_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q2t7_blog`
--
ALTER TABLE `q2t7_blog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q2t11_good`
--
ALTER TABLE `q2t11_good`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q2t13_vote`
--
ALTER TABLE `q2t13_vote`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q3t5_effect`
--
ALTER TABLE `q3t5_effect`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q3t5_img`
--
ALTER TABLE `q3t5_img`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q3t7_movie`
--
ALTER TABLE `q3t7_movie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q3t8_book`
--
ALTER TABLE `q3t8_book`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q4t4_class`
--
ALTER TABLE `q4t4_class`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q4t5_product`
--
ALTER TABLE `q4t5_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q4t8_order`
--
ALTER TABLE `q4t8_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q4t9_user`
--
ALTER TABLE `q4t9_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q4t10_admin`
--
ALTER TABLE `q4t10_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `q4t11_footer`
--
ALTER TABLE `q4t11_footer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
