<h3><a href="?redo=th">商品分類</a> | 商品管理</h3>
<input type="button" value="新增商品" onclick="<?= jlo('?redo=tpadd') ?>">
<table>
  <tr>
    <td>編號</td>
    <td>商品名稱</td>
    <td>庫存量</td>
    <td>狀況</td>
    <td>操作</td>
  </tr>
  <?php
  $re = select("t5_product", 1);
  foreach ($re as $ro) {
    ?>
    <tr bgcolor=#ffc>
      <td><?= $ro['id'] ?></td>
      <td><?= $ro['title'] ?></td>
      <td><?= $ro['num'] ?></td>
      <td><?= ($ro['dpy']) ? "販售中" : "已下架"; ?></td>
      <td>
        <input type="button" value="修改" onclick="<?= jlo('?redo=tpmdy&id=' . $ro['id']) ?>">
        <input type="button" value="刪除" onclick="<?= jlo('api.php?do=tpdel&id=' . $ro['id']) ?>">
        <input type="button" value="上架" onclick="<?= jlo('api.php?do=tpon&id=' . $ro['id']) ?>">
        <input type="button" value="下架" onclick="<?= jlo('api.php?do=tpoff&id=' . $ro['id']) ?>">
      </td>
    </tr>
  <?php
}
?>
</table>