<?php //塞入 HTML 開頭
include "lib.php";

//for t4
$admain = (empty($_SESSION['admin'])) ? "main" : "admain";
$main = (empty($_GET['do'])) ? $admain : $_GET['do'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <title>健康促進網</title>
  <link href="./home_files/css.css" rel="stylesheet" type="text/css">
  <script src="./home_files/jquery-1.9.1.min.js"></script>
  <script src="./home_files/js.js"></script>
</head>

<body>
  <div id="all" style="overflow-y: scroll;margin: 10px auto;padding: 0;border: 0;width: 1024px;height: 768px;">
    <div id="title">
      <?= date("m 月 d 號 l") ?> | 今日瀏覽: <?= $t3_visit ?> | 累積瀏覽: <?= $t3_total ?>
      <a href="index.php" style="float:right">回首頁</a>
    </div>
    <div id="title2">
      <img style="width:100%" src="img/02B01.jpg" alt="健康促進網 - 回首頁" title="健康促進網 - 回首頁">
    </div>
    <div id="mm">
      <div class="hal" id="lef">
        <?= $menu ?>
      </div>
      <div class="hal" id="main">
        <div>
          <marquee style="width:80%; display:inline-block;">
            請民眾踴躍投稿電子報，讓電子報成為大家相互交流、分享的園地！詳見最新文章
          </marquee>
          <span style="width:18%; display:inline-block;"><?= $t6_btn ?></span>
          <div><?php include $main . ".php" ?></div>
        </div>
      </div>
    </div>
    <div id="bottom">
      <div class="ct">本網站建議使用：IE9.0以上版本，1024 x 768 pixels 以上觀賞瀏覽 ， Copyright © <?= date("Y") ?>健康促進網社群平台 All Right Reserved </div>
      <div style="float:right">服務信箱：health@test.labor.gov.tw<img src="./home_files/02B02.jpg" width="45"></div>
    </div>
  </div>

</body>

</html>