目前位置:首頁>最新消息區
<table>
  <tr>
    <td width=20% valign=top>標題</td>
    <td valign=top>內容</td>
    <td></td>
  </tr>
<?php
$_GET['id'] = (empty($_GET['id'])) ? 0 : $_GET['id']; //先判斷目前是不是有指定文章了(取得$_GET[id])

$nw = (empty($_GET['page'])) ? 1 : $_GET['page']; //如果目前沒有指定頁數，那就是第一頁，現在是第幾頁之變數
$begin = ($nw - 1) * 5; //提供limit所用的從第幾筆開始撈出
$re = select("q2t7_blog", "dpy=1 limit " . $begin . ",5");

foreach ($re as $ro) {
  $gdbtn = "";
  if (!empty($_SESSION['user'])) { //當已經登入會員了，那麼才會處理按讚的訊息
    $gd = select("q2t11_good", "user='" . $_SESSION['user'] . "' and blog=" . $ro['id']);
    $gdbtn = ($gd != null) ? '<a href="api.php?do=subgd&id=' . $ro['id'] . '">收回讚</a>' : '<a href="api.php?do=addgd&id=' . $ro['id'] . '">讚</a>';
  }
?>
  <tr>
    <td><?= $ro['title'] ?></td>
    <td><?= ($_GET['id'] == $ro['id']) ? $ro['text'] : '<a href="?do=news&page='.$nw.'&id='.$ro['id'].'">'.mb_substr($ro['text'],0,10).'...</a>'?></td>
    <td><?= $gdbtn ?></td>
  </tr>
<?php
}
?>
</table>

<?php
$re = page("q2t7_blog", "dpy=1", 5, $nw);
foreach ($re as $key => $value) {
  if ($nw == $key) echo '<a style="font-size:2em" href="?do=news&page=' . $value . '">' . $key . '</a>';
  else echo '<a href="?do=news&page=' . $value . '">' . $key . '</a>';
}
?>