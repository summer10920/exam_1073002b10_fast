<?php
session_start(); //open session
$db = new PDO("mysql:host=127.0.0.1;dbname=db01;charset=utf8", "root", "", null); //SQL連結PDO物件
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
//t3
$re = select("t3_title", "dpy=1");
$t3img = $re[0]['img'];
$t3txt = $re[0]['title'];
//t4
$re = select("t4_maqe", "dpy=1");
$t4ma = "";
foreach ($re as $ro) $t4ma .= "   " . $ro['text'];
//t5
$re = select("t5_mvim", "dpy=1");
$t5swf = array();
foreach ($re as $ro) $t5swf[] = "upload/" . $ro['file'];
//t6
$re = select("t6_img", "dpy=1");
$t6num = count($re);
$t6img = '';
foreach ($re as $key => $ro) $t6img .= '<img class="im" id="ssaa' . $key . '" src="upload/' . $ro['file'] . '" width="150" height="103">';
//t7
$re = select("t7_total", 1);
$t7num = $re[0]['once'];
if (empty($_SESSION['visit'])) {
  $_SESSION['visit'] = 123;
  $_POST['once'] = $t7num + 1;
  update($_POST, "t7_total");
  $t7num++;
}
//t8
$re = select("t8_footer", 1);
$t8txt = $re[0]['once'];
//t9
$re = select("t9_news", "dpy=1 limit 5");
$t9more = (count($re) > 4) ? '<a style="float:right" href="news.php">More...</a>' : '';
$t9txt = '';
foreach ($re as $ro) $t9txt .= '<li>' . mb_substr($ro['text'], 0, 15) . '<span class="all" style="display:none">' . $ro['text'] . '</span></li>';
//t12
$t12menu = '';
$re = select("t12_menu", "dpy=1 and parent=0");
foreach ($re as $ro) {
  $son = select("t12_menu", "parent=" . $ro['id']);
  $myson = '';
  foreach ($son as $ro2) {
    $myson .= '<div class="mainmu2 mw"><a style="color:#000; font-size:13px; text-decoration:none;" href="' . $ro2['link'] . '">' . $ro2['title'] . '</a></div>';
  }
  $t12menu .= '<div class="mainmu"><a style="color:#000; font-size:13px; text-decoration:none;" href="' . $ro['link'] . '">' . $ro['title'] . '</a>' . $myson . '</div>
    ';
}
?>