<input type="button" value="新增管理員" onclick="<?= jlo('?redo=adminadd') ?>">
<table>
  <tr>
    <td>帳號</td>
    <td>密碼</td>
    <td>操作</td>
  </tr>
  <tr>
    <td>admin</td>
    <td>****</td>
    <td>此帳號為最高權限</td>
  </tr>
  <?php
  $re = select("q4t10_admin", "id!=1");
  foreach ($re as $ro) {
  ?>
    <tr>
      <td><?= $ro['acc'] ?></td>
      <td><?= $ro['pwd'] ?></td>
      <td>
        <input type="button" value="修改" onclick="<?= jlo('?redo=adminmdy&id=' . $ro['id']) ?>">
        <input type="button" value="刪除" onclick="<?= jlo('api.php?do=admindel&id=' . $ro['id']) ?>">
      </td>
    </tr>
  <?php
  }
  ?>
</table>