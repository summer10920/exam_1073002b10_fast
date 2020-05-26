<?php
$re = select("q4t5_product", "id=" . $_GET['id']);
$ro = $re[0];
?>
<form action="api.php?do=want&id=<?= $_GET['id'] ?>" method="post">
  <h3 class="ct"><?= $ro['title'] ?></h3>
  <table>
    <tr>
      <td rowspan=5><img width=400 src="img/<?= $ro['img'] ?>" alt=""></td>
      <td>分類：
        <?php
        echo select("q4t4_class", "id=" . $ro['fa'])[0]['title'];
        echo ">" . select("q4t4_class", "id=" . $ro['son'])[0]['title'];
        ?>
      </td>
    </tr>
    <tr>
      <td>編號：<?= $ro['seq'] ?></td>
    </tr>
    <tr>
      <td>價錢：<?= $ro['price'] ?></td>
    </tr>
    <tr>
      <td>詳細說明：<br><?= $ro['text'] ?></td>
    </tr>
    <tr>
      <td>庫存量：<?= $ro['num'] ?></td>
    </tr>
    <tr>
      <td colspan=2>購買數量<input type="text" name="num" id="">
        <input type="image" src="img/0402.jpg" alt="submit">
        <input type="button" value="返回" onclick="window.history.back()">
      </td>
    </tr>
  </table>
</form>