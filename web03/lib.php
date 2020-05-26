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

////////////////////////////////////////////// q3 need start

//t6
$minday = date("Y-m-d", strtotime("-2days"));
$today = date("Y-m-d");

//t8
$seat[0]="14:00~16:00";
$seat[1]="16:00~18:00";
$seat[2]="18:00~20:00";
$seat[3]="20:00~22:00";
$seat[4]="22:00~24:00";