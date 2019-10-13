<p class="t cent botli">管理者帳號管理</p>
<form method="post" action="api.php?do=adminmdy">
  <table width="100%">
    <tbody>
      <tr class="yel">
        <td width="34%">帳號</td>
        <td width="34%">密碼</td>
        <td width="7%">刪除</td>
      </tr>
      <?php
      $re = select("q1t10_admin","id!=1");
      foreach ($re as $value) {
        ?>
        <tr>
          <td><input style="width:90%" type="text" name="acc[<?= $value['id'] ?>]" value="<?= $value['acc'] ?>"></td>
          <td><input style="width:90%" type="password" name="pwd[<?= $value['id'] ?>]" value="<?= $value['pwd'] ?>"></td>
          <td><input type="checkbox" name="del[]" value="<?= $value['id'] ?>"></td>
        </tr>
      <?php
    }
    ?>
    </tbody>
  </table>
  <table style="margin-top:40px; width:70%;">
    <tbody>
      <tr>
        <td width="200px"><input type="button" onclick="op('#cover','#cvr','view.php?do=adminadd')" value="新增管理者帳號"></td>
        <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
      </tr>
    </tbody>
  </table>
</form>