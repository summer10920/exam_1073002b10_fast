<h3>商品分類 | <a href="?redo=tp">商品管理</a></h3>
<form action="api.php?do=clsadd" method="post">
  <p>新增大類
    <input type="text" name="text" id="">
    <input type="hidden" name="parent" value=0>
    <input type="submit" value="新增">
  </p>
</form>
<form action="api.php?do=clsadd" method="post">
  <p>新增中類
    <select name="parent" id="">
      <?php
      $re = select("q4t4_class", "parent=0");
      foreach ($re as $ro) echo '<option value="' . $ro['id'] . '">' . $ro['text'] . '</option>';
      ?>
    </select>
    <input type="text" name="text" id="">
    <input type="submit" value="新增">
  </p>
</form>
<table>
  <?php
  foreach ($re as $ro) {
    ?>
    <tr bgcolor=#ffc>
      <td><?= $ro['text'] ?></td>
      <td>
        <input type="button" value="修改" onclick="<?= jlo('?redo=thmdy&id=' . $ro['id']) ?>">
        <input type="button" value="刪除" onclick="<?= jlo('api.php?do=thdel&id=' . $ro['id']) ?>">
      </td>
    </tr>
    <?php
    $re2 = select("q4t4_class", "parent=" . $ro['id']);
    foreach ($re2 as $ro2) {
      ?>
      <tr bgcolor=#ffe>
        <td><?= $ro2['text'] ?></td>
        <td>
          <input type="button" value="修改" onclick="<?= jlo('?redo=thmdy&id=' . $ro2['id']) ?>">
          <input type="button" value="刪除" onclick="<?= jlo('api.php?do=thdel&id=' . $ro2['id']) ?>">
        </td>
      </tr>
    <?php
  }
}
?>
</table>