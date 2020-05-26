<?php
$re = select("q4t8_order", "id=" . $_GET['id']);
$ro = $re[0];
$seq = date("Ymd000000", strtotime($ro['date'])) + $ro['id'];
?>
<h3>訂單編號<?= $seq ?>的詳細資料</h3>
姓名：<?= $ro['name'] ?><br>
帳號：<?= $ro['acc'] ?><br>
電話：<?= $ro['tel'] ?><br>
地址：<?= $ro['addr'] ?><br>
電子信箱：<?= $ro['mail'] ?>
<hr>
<table>
  <tr>
    <td>商品名稱</td>
    <td>編號</td>
    <td>數量</td>
    <td>單價</td>
    <td>小計</td>
  </tr>
  <?php
  $ary = unserialize($ro['buy']);
  foreach ($ary as $key => $value) {
    $re = select("q4t5_product", "id=" . $key);
    $x = $re[0];
  ?>
    <tr bgcolor=#ffc>
      <td><?= $x['title'] ?></td>
      <td><?= $key ?></td>
      <td><?= $value ?></td>
      <td><?= $x['price'] ?></td>
      <td><?= $x['price'] * $value ?></td>
    </tr>
  <?php
  }
  ?>
  <tr>
    <td colspan=5>總價：<?= $ro['total'] ?></td>
  </tr>
</table>
<hr>
<input type="button" value="返回" onclick="window.history.back()">