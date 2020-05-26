<?php
session_start(); //open session
//SQL 連結 PDO 物件
$db = new PDO("mysql:host=127.0.0.1;dbname=db00;charset=utf8", "root", "", null);
date_default_timezone_set('Asia/Taipei'); //修正時區

//select SQL
function select($tb, $wh)
{  //提供資料表名稱跟條件，我能操作 SQL-Select 回傳
  global $db;
  return $db->query("SELECT * FROM " . $tb . " WHERE " . $wh)->fetchAll();
}

//insert SQL
function insert($ary, $tb)
{ //若給我資料跟資料表名稱，我自動的新增一筆資料
  global $db;
  $field = "id";
  $data = "null";
  foreach ($ary as $key => $value) {
    $field .= "," . $key;
    $data .= ",'" . $value . "'";
  }
  $db->query("INSERT INTO " . $tb . "(" . $field . ") VALUES (" . $data . ")");
  return $db->lastInsertId(); //取得剛剛新增的索引
}

//update SQL
function update($ary, $tb)
{
  global $db;
  foreach ($ary as $do => $data) {
    switch ($do) {
      case 'num+1': //如果陣列 key 是 num+1，對 value(id 值） 做 num+1
        $db->query("UPDATE " . $tb . " SET num=num+1 WHERE id=" . $data);
        break;
      case 'num-1': //如果陣列 key 是 num-1，對 value(id 值） 做 num-1
        $db->query("UPDATE " . $tb . " SET num=num-1 WHERE id=" . $data);
        break;
      default: //多組批次更新，key = id，暴力的一次只更新 1 個欄位
        foreach ($data as $key => $value)
          $db->query("UPDATE " . $tb . " SET " . $do . "='" . $value . "' WHERE id=" . $key);
        break;
    }
  }
}

//delete SQL 
function delete($ary, $tb)
{
  global $db;
  foreach ($ary as $do => $data) {
    switch ($do) {
      case 'del': //多筆刪除，前端 $_POST['del'][5]=這個 POST 陣列裡面有 del 這個維度陣列
        foreach ($data as $value)
          $db->query("DELETE FROM " . $tb . " WHERE id=" . $value);
        break;
      case 'delwh': //依條件做特殊狀況刪除
        $db->query("DELETE FROM " . $tb . " WHERE " . $data);
        break;
    }
  }
}

//php 轉址
function plo($link)
{
  return header("location:" . $link);
}

//JS 轉址
function jlo($link)
{
  return "location.href='" . $link . "'";
}

//add file 單筆，不要整個$_FILES 丟過來
function addfile($file)
{
  $newname = time() . "_" . $file['name'];
  copy($file['tmp_name'], "img/" . $newname);
  return $newname;
}

//分頁導覽
function navpage($tb, $wh, $range, $nowpage)
{
  $total = count(select($tb, $wh));
  $many = ceil($total / $range);
  $pg['<'] = ($nowpage == 1) ? $nowpage : $nowpage - 1;
  for ($i = 1; $i <= $many; $i++) $pg[$i] = $i;
  $pg['>'] = ($nowpage == $many) ? $many : $nowpage + 1;
  return $pg;
}

////////////////////////////////////////////// q2 need start

//t3
$re = select("q2t3_visit", "date='" . date("Y-m-d") . "'"); //檢查今日是否存在
if ($re == null) { //資料庫內尚未持有今日資訊
  $post['num'] = 0;
  $post['date'] = date("Y-m-d");
  $id = insert($post, "q2t3_visit");
  $t3_visit = 0; //拜訪數據 0
} else {
  $id = $re[0]['id'];
  $t3_visit = $re[0]['num']; //下載拜訪數據
}

if (empty($_SESSION['visit'])) { //檢查後若為新訪客
  $_SESSION['visit'] = true;
  $_POST['num+1'] = $id;
  update($_POST, "q2t3_visit"); //資料庫數據+1
  $t3_visit++; //拜訪數據+1
}

$re = select("q2t3_visit", 1);
$t3_total = 0;
foreach ($re as $ro) $t3_total += $ro['num']; //統計總數

//t6
$t6_btn =
  (empty($_SESSION['user'])) ?
  '<a href="?do=login">會員登入</a>' :
  '歡迎， ' . $_SESSION['user'] . ' <a href="api.php?do=logout" style="border: solid 1px #000">登出</a>';

//t14
$menu = '
  <a class="blo" href="?do=po">分類網誌</a>
  <a class="blo" href="?do=news">最新文章</a>
  <a class="blo" href="?do=pop">人氣文章</a>
  <a class="blo" href="#">講座訊息</a>
  <a class="blo" href="?do=que">問卷調查</a>
';
if (!empty($_SESSION['admin'])) $menu = '
  <a class="blo" href="?do=apo">帳號管理</a>
  <a class="blo" href="#">分類網誌</a>
  <a class="blo" href="?do=apop">最新文章管理</a>
  <a class="blo" href="#">講座管理</a>
  <a class="blo" href="?do=aque">問卷管理</a>
';
