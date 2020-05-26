<?php
include "lib.php";
$main = (empty($_GET['do'])) ? "main" : $_GET['do'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <title>┌精品電子商務網站」</title>
  <link href="./home_files/css.css" rel="stylesheet" type="text/css">
  <script src="scripts/jquery-1.9.1.min.js"></script>
  <script src="./home_files/js.js"></script>
</head>

<body>
  <iframe name="back" style="display:none;"></iframe>
  <div id="main" style="width: 1024px;height: 768px;overflow-y:scroll; padding:0; margin:10px auto; border: 0;">
    <div id="top">
      <a href="?">
        <img src="./home_files/0416.jpg">
      </a>
      <div style="padding:10px;">
        <a href="?">回首頁</a> |
        <a href="?do=news">最新消息</a> |
        <a href="?do=look">購物流程</a> |
        <a href="?do=buycart">購物車</a> |
        <?= (empty($_SESSION['user'])) ? '<a href="?do=login">會員登入</a>' : '<a href="api.php?do=logout">會員登出</a>' ?> |
        <a href="admin.php">管理登入</a>
      </div>
      <marquee behavior="" direction="">情人節特惠活動 &nbsp; 為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~</marquee>
    </div>
    <div id="left" class="ct">
      <div style="min-height:400px;">
        <?php
        $num = count(select("q4t5_product", 1));
        echo '<a href="index.php">全部商品(' . $num . ')</a>';
        $re = select("q4t4_class", "parent=0");
        foreach ($re as $ro) {
          $num = count(select("q4t5_product", "fa=" . $ro['id']));
          echo '<a onmouseover="show(' . $ro['id'] . ')" href="?do=main&fa=' . $ro['id'] . '">' . $ro['title'] . '(' . $num . ')</a>';

          $re2 = select("q4t4_class", "parent=" . $ro['id']);
          foreach ($re2 as $ro2) {
            $num = count(select("q4t5_product", "son=" . $ro2['id']));
            echo '<a class="son fa' . $ro['id'] . '" href="?do=main&fa=' . $ro['id'] . '&son=' . $ro2['id'] . '" style="background: #fce2c4">' . $ro2['title'] . '(' . $num . ')</a>';
          }
        }
        ?>
      </div>
      <span>
        <div>進站總人數</div>
        <div style="color:#f00; font-size:28px;">
          00005 </div>
      </span>
    </div>
    <div id="right">
      <?php include $main . ".php"; ?>
    </div>
    <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
      <?= $bot ?>
    </div>
  </div>
  <script>
    $(".son").hide();

    function show(id) {
      $(".son").hide();
      $(".fa" + id).show();
    }
  </script>
</body>

</html>