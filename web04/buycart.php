<?php
$who = (empty($_SESSION['user'])) ? "訪客（請先登入）" : $_SESSION['user'];
?>
<h3 class="ct"><?= $who ?>的購物車</h3>
<table>
  <tr>
    <td>編號</td>
    <td>商品名稱</td>
    <td>數量</td>
    <td>庫存量</td>
    <td>單價</td>
    <td>小計</td>
    <td>刪除</td>
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
      <td><input type="button" value="刪除" onclick="<?= jlo('api.php?do=cartdel&id=' . $id) ?>"></td>
    </tr>
  <?php
    $total += $ro['price'] * $num;
  }
  ?>
</table>
<a href="index.php"><img src="img/0411.jpg" alt=""></a>
<a href="?do=pay"><img src="img/0412.jpg" alt=""></a>