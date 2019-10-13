目前位置:首頁>問卷調查<br>
<?php
$sw = 0;
if (!empty($_GET['vote'])) $sw = 1;
if (!empty($_GET['show'])) $sw = 2;
switch ($sw) {
  case '1':
    ?>
  <h3><?= $_GET['title'] ?></h3>
  <form action="api.php?do=vote" method="post">
    <?php
    $re = select("q2t13_vote", "parent=" . $_GET['vote']);
    foreach ($re as $ro) echo '<input type="radio" name="num+1" value="' . $ro['id'] . '">' . $ro['text'] . '<br>';
    ?>
    <input type="submit" value="我要投票">
  </form>
  <?php
  break;
case '2':
  ?>
  <h3><?= $_GET['title'] ?></h3>
  <?php
  $re = select("q2t13_vote", "parent=" . $_GET['show']);
  $i = 1;
  foreach ($re as $ro) {
    $pse = ($_GET['total'] == 0) ? 0 : $ro['num'] / $_GET['total'] * 100;
    ?>
    <p><?= $i ?>.<?= $ro['text'] ?> <div style="width:<?= $pse ?>px;height:1em;background-color:black;display:inline-block"></div><?= $ro['num'] ?>票(<?= $pse ?>%)</p>
    <?php
    $i++;
  }
  ?>
  <input type="button" value="返回" onclick="window.history.back()">
  <?php
  break;
default:
  ?>
  <table>
    <tr>
      <td valign=top>編號</td>
      <td valign=top>問卷題目</td>
      <td>投票總數</td>
      <td>結果</td>
      <td>狀態</td>
    </tr>
    <?php
    $re = select("q2t13_vote", "parent=0");
    foreach ($re as $ro) {
      $total = 0;
      $vv = select("q2t13_vote", "parent=" . $ro['id']);
      foreach ($vv as $son) $total += $son['num'];
      ?>
      <tr>
        <td><?= $ro['id'] ?></td>
        <td><?= $ro['text'] ?></td>
        <td><?= $total ?></td>
        <td><a href="?do=que&show=<?= $ro['id'] ?>&title=<?= $ro['text'] ?>&total=<?= $total ?>">結果</a></td>
        <td><?= (empty($_SESSION['user'])) ? '請先登入' : '<a href="?do=que&vote=' . $ro['id'] . '&title=' . $ro['text'] . '">參與投票</a>' ?></td>
      </tr>
    <?php
  }
  ?>
  </table>
  <?php
  break;
}

?>