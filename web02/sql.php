<?php
session_start(); //open session
$db = new PDO("mysql:host=127.0.0.1;dbname=b17300_db;charset=utf8", "b17300user", "b17300pwd", null); //SQL連結PDO物件
date_default_timezone_set('Asia/Taipei'); //更改時區
//select SQL
function select($tb, $wh)
{ //TABLE名,WHERE條件
  global $db;
  // echo "SELECT * FROM " . $tb . " WHERE " . $wh;
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
  //INSERT INTO q2t3_visit (id,num,date) VALUES (null,'0','2019-10-05')
  $db->query("INSERT INTO ".$tb."(".$ina.") VALUES (".$inb.")");
  return $db->lastInsertId(); //取得這筆的ID回傳
}
//update SQL
function update($pt, $tb)
{ //POST陣列,TABLE名
  global $db;
  foreach ($pt as $na => $dt) {
    switch ($na) {
      case 'num+1':
        $db->query("UPDATE " . $tb . " SET num=num+1 WHERE id=" . $dt);
        //UPDATE q2t3_visit SET num=num+1 WHERE id=7;
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
  $total = count(select($tb, $wh));//6
  $many = ceil($total / $rg);//6除5=1.2=>2
  $pg['<'] = ($nw == 1) ? 1 : $nw - 1;
  for ($i = 1; $i <= $many; $i++) $pg[$i] = $i;
  $pg['>'] = ($nw == $many) ? $nw : $nw + 1;
  return $pg;
}
?>
<?php
//t3

$re = select("q2t3_visit", "date='" . date("Y-m-d") . "'"); //檢查今日是否存在
if ($re == null) {
  $post['num'] = 0;
  $post['date'] = date("Y-m-d");//2019-10-05
  $id = insert($post, "q2t3_visit");
  $t3visit = 0; //初始拜訪0
  if(!empty($_SESSION['visit'])) unset($_SESSION['visit']); //這個能確保每天晚上00:00分，可以清掉昨晚的拜訪，***這句話是補跨日BUG，非必要***
}
 else { //有找到時，那麼剛剛第95行是資料表中的今天資訊，裡面包含了id,date,num
  $id = $re[0]['id'];
  $t3visit = $re[0]['num'];
}

if (empty($_SESSION['visit'])) { //檢查是否新訪客
  $_SESSION['visit'] = 123;
  $_POST['num+1'] = $id;
  update($_POST, "q2t3_visit"); //會影響資料庫的該值做+1動作
  $t3visit++; //直接變數+1
}

$re = select("q2t3_visit", 1);
$t3all = 0;
foreach ($re as $ro) $t3all+=$ro['num']; //統計總數

//t4
$admain=(empty($_SESSION['admin']))?"main":"admain"; //這個是拿來判斷屬於後台還是前台之初始畫面

$main=(empty($_GET['do']))?$admain:$_GET['do']; //這個主內容區


//t6
$t6btn = (empty($_SESSION['user'])) ? '<a href="?do=login">會員登入</a>' : '歡迎，' . $_SESSION['user'] . '<a href="api.php?do=logout" style="border: solid 1px #000000">登出</a>';
//t14
$menu = '
<a class="blo" href="?do=po">分類網誌</a>
<a class="blo" href="?do=news">最新文章</a>
<a class="blo" href="?do=pop">人氣文章</a>
<a class="blo" href="#">講座訊息</a>
<a class="blo" href="?do=que">問卷調查</a>
';
if (!empty($_SESSION['admin']))
  $menu = '
<a class="blo" href="?do=adpo">帳號管理</a>
<a class="blo" href="#">分類網誌</a>
<a class="blo" href="?do=adpop">最新文章管理</a>
<a class="blo" href="#">講座管理</a>
<a class="blo" href="?do=adque">問卷管理</a>
';
?>