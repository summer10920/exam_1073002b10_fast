<h3 class="ct">確認資料</h3>
<?php
$re = select("q4t9_user", "id=" . $_SESSION['id']);
$ro = $re[0];
?>
姓名：<?= $ro['name'] ?><br>
帳號：<?= $ro['acc'] ?><br>
電話：<?= $ro['tel'] ?><br>
地址：<?= $ro['addr'] ?><br>
電子信箱：<?= $ro['mail'] ?>
<hr>
<table>
  <tr>
    <td>編號</td>
    <td>商品名稱</td>
    <td>數量</td>
    <td>庫存量</td>
    <td>單價</td>
    <td>小計</td>
  </tr>
  <?php
  $total = 0;
  if (!empty($_SESSION['buy'])) foreach ($_SESSION['buy'] as $id => $num) {
    $re = select("q4t5_product", "id=" . $id);
    $ro = $re[0];
  ?>
    <tr bgcolor=#ffc>
      <td><?= $ro['seq'] ?></td>
      <td><?= $ro['title'] ?></td>
      <td><?= $num ?></td>
      <td><?= $ro['num'] ?></td>
      <td><?= $ro['price'] ?></td>
      <td><?= $ro['price'] * $num ?></td>
    </tr>
  <?php
    $total += $ro['price'] * $num;
  }
  ?>
  <tr>
    <td colspan="6">總價：<?= $total ?></td>
  </tr>
</table>
<hr>
<input type="button" value="確定送出" onclick="<?= jlo('api.php?do=pay&total=' . $total) ?>">
<input type="button" value="返回修改訂單" onclick="window.history.back()">