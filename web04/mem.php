<h3>會員管理</h3>
<table>
  <tr>
    <td>姓名</td>
    <td>會員帳號</td>
    <td>註冊日期</td>
    <td>操作</td>
  </tr>
  <?php
  $re = select("q4t9_user", 1);
  foreach ($re as $ro) {
    ?>
    <tr bgcolor=#ffc>
      <td><?= $ro['id'] ?></a></td>
      <td><?= $ro['acc'] ?></td>
      <td><?= $ro['date'] ?></td>
      <td>
        <input type="button" value="修改" onclick="<?= jlo('?redo=memmdy&id=' . $ro['id']) ?>">
        <input type="button" value="刪除" onclick="<?= jlo('api.php?do=memdel&id=' . $ro['id']) ?>">
      </td>

    </tr>
  <?php
}
?>
</table>