<fieldset>
  <legend>帳號管理</legend>
  <form action="api.php?do=memdel" method="post">
    <table width="100%">
      <tr>
        <td>帳號</td>
        <td>密碼</td>
        <td>刪除</td>
      </tr>
      <?php
      $re = select("q2t6_user", 1);
      foreach ($re as $ro) {
      ?>
        <tr>
          <td><?= $ro['acc'] ?></td>
          <td><?= $ro['pwd'] ?></td>
          <td><input type="checkbox" name="del[]" value="<?= $ro['id'] ?>"></td>
        </tr>
      <?php
      }
      ?>
    </table>
    <input type="submit" value="確定刪除"><input type="reset" value="清空選取">
  </form>
  <h2>新增會員</h2>
  <?php include "reg.php" ?>
</fieldset>
