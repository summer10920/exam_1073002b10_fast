目前位置：首頁>最新消息區
<table>
  <tr>
    <td width=20% valign=top>標題</td>
    <td valign=top>內容</td>
    <!-- ↓↓↓↓↓↓↓↓↓↓ there ↓↓↓↓↓↓↓↓↓-->
    <td width=10%></td>
  </tr>
  <?php
  $_GET['id'] = (empty($_GET['id'])) ? 0 : $_GET['id'];
  $nw = (empty($_GET['page'])) ? 1 : $_GET['page'];
  $begin = ($nw - 1) * 5;
  $re = select("q2t7_blog", "dpy=1 limit " . $begin . ",5");
  foreach ($re as $ro) {
    /* ↓↓↓↓↓↓↓↓↓↓ there ↓↓↓↓↓↓↓↓↓ */
    $gdbtn = "";
    if (!empty($_SESSION['user'])) {
      $gd = select("q2t11_good", "user='" . $_SESSION['user'] . "' and blog=" . $ro['id']);
      $gdbtn = ($gd != null) ?
        '<a href="api.php?do=gdsub&id=' . $ro['id'] . '">收回讚</a>' :
        '<a href="api.php?do=gdadd&id=' . $ro['id'] . '">讚</a>';
    }
  ?>
    <tr>
      <td><?= $ro['title'] ?></td>
      <td>
        <?= ($_GET['id'] == $ro['id']) ?
          $ro['text'] :
          '<a href="?do=news&page=' . $nw . '&id=' . $ro['id'] . '">' . mb_substr($ro['text'], 0, 10) . '...</a>' ?>
      </td>
      <!-- ↓↓↓↓↓↓↓↓↓↓ there ↓↓↓↓↓↓↓↓↓-->
      <td><?= $gdbtn ?></td>
    </tr>
  <?php
  }
  ?>
</table>
<?php
$re = navpage("q2t7_blog", "dpy=1", 5, $nw);
foreach ($re as $key => $value) {
  if ($nw == $key) echo '<a style="font-size:2em" href="?do=news&page=' . $value . '">' . $key . '</a>';
  else echo '<a href="?do=news&page=' . $value . '">' . $key . '</a>';
}
?>