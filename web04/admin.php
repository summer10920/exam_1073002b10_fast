<?php
include "lib.php";
if (empty($_SESSION['admin'])) plo("index.php?do=adlogin");

$re = select("q4t10_admin", "acc='" . $_SESSION['admin'] . "'");
$access = unserialize($re[0]['access']);
$main = (empty($_GET['redo'])) ? "admain" : $_GET['redo'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0057)?do=admin -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <script src="scripts/jquery-1.9.1.min.js"></script>
  <title>┌精品電子商務網站」</title>
  <link href="./Manage Page_files/css.css" rel="stylesheet" type="text/css">
  <script src="./Manage Page_files/js.js"></script>
</head>

<body>
  <iframe name="back" style="display:none;"></iframe>
  <div id="main" style="width: 1024px;height: 768px;overflow-y:scroll; padding:0; margin:10px auto; border: 0;">
    <div id="top">
      <a href="?">
        <img src="./Manage Page_files/0416.jpg" style="width:69%">
      </a>
      <img src="./Manage Page_files/0417.jpg" style="width:30%">
    </div>
    <div id="left" class="ct">
      <div style="min-height:400px;">
        <a href="?redo=admain">管理權限設置</a>
        <?= ($access[0]) ? '<a href="?redo=th">商品分類與管理</a>' : '' ?>
        <?= ($access[1]) ? '<a href="?redo=order">訂單管理</a>' : '' ?>
        <?= ($access[2]) ? '<a href="?redo=mem">會員管理</a>' : '' ?>
        <?= ($access[3]) ? '<a href="?redo=bot">頁尾版權管理</a>' : '' ?>
        <?= ($access[4]) ? '<a href="#">最新消息管理</a>' : '' ?>
        <a href="api.php?do=adlogout" style="color:#f00;">返回</a>
      </div>
    </div>
    <div id="right">
      <?php include $main . ".php"; ?>
    </div>
    <div id="bottom" style="line-height:70px; color:#FFF; background:url(icon/bot.png);" class="ct">
      <?= $bot ?>
    </div>
  </div>

</body>

</html>