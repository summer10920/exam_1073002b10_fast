<?php
session_start(); //open session
$db = new PDO("mysql:host=127.0.0.1;dbname=db04;charset=utf8", "root", "", null); //SQL連結PDO物件
date_default_timezone_set('Asia/Taipei'); //更改時區
//select SQL
function select($tb, $wh)
{ //TABLE名,WHERE條件
  global $db;
  return $db->query("SELECT * FROM " . $tb . " WHERE " . $wh)->fetchAll();
}
//insert SQL單筆
function insert($pt, $tb)
{ //POST陣列,TABLE名
  global $db;
  $ina = "id";
  $inb = "null";
  foreach ($pt as $key => $value) {
    $ina .= "," . $key;
    $inb .= ",'" . $value . "'";
  }
  $db->query("INSERT INTO " . $tb . " (" . $ina . ") VALUES (" . $inb . ")");
  return $db->lastInsertId(); //取得這筆的ID回傳
}
//update SQL
function update($pt, $tb)
{ //POST陣列,TABLE名
  global $db;
  foreach ($pt as $na => $dt) {
    switch ($na) {
      case 'once':
        $db->query("UPDATE " . $tb . " SET once='" . $dt . "' WHERE 1");
        break;
      case 'num+1':
        $db->query("UPDATE " . $tb . " SET num=num+1 WHERE id=" . $dt);
        break;
      case 'num-1':
        $db->query("UPDATE " . $tb . " SET num=num-1 WHERE id=" . $dt);
        break;
      default:
        foreach ($dt as $key => $value)
          $db->query("UPDATE " . $tb . " SET " . $na . "='" . $value . "' WHERE id=" . $key);
        break;
    }
  }
}
//delete SQL
function delete($pt, $tb)
{ //POST陣列,TABLE名
  global $db;
  foreach ($pt as $na => $dt) {
    switch ($na) {
      case 'del':
        foreach ($dt as $value)
          $db->query("DELETE FROM " . $tb . " WHERE id=" . $value);
        break;
      case 'delat':
        $db->query("DELETE FROM " . $tb . " WHERE " . $dt);
        break;
    }
  }
}
//php轉址
function plo($lk)
{
  return header("location:" . $lk);
}
//JS轉址
function jlo($lk)
{
  return "location.href='" . $lk . "'";
}
//add file單筆，不要整個$_FILES丟過來
function addfile($fl)
{
  $na = date("YmdHis") . $fl['name'];
  copy($fl['tmp_name'], "upload/" . $na);
  return $na;
}
//分頁導覽
function page($tb, $wh, $rg, $nw)
{
  $total = count(select($tb, $wh));
  $many = ceil($total / $rg);
  $pg['<'] = ($nw == 1) ? 1 : $nw - 1;
  for ($i = 1; $i <= $many; $i++) $pg[$i] = $i;
  $pg['>'] = ($nw == $many) ? $nw : $nw + 1;
  return $pg;
}
?>
<?php
// ask
$a1=rand(11,99);
$a2=rand(11,99);
$ans=$a1+$a2;
//bot
$re=select("t11_footer",1);
$bot=$re[0]['once'];
?>