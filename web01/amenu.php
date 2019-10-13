<p class="t cent botli">選單管理</p>
<form method="post" action="api.php?do=menumdy">
  <table width="100%">
    <tbody>
      <tr class="yel">
        <td width="30%">主選單名稱</td>
        <td width="30%">選單連結網址</td>
        <td width="8%">次選單數</td>
        <td width="7%">顯示</td>
        <td width="7%">刪除</td>
        <td></td>
      </tr>
      <?php
      $re = select("q1t12_menu","parent=0");
      foreach ($re as $value) {
        $many=count(select("q1t12_menu","parent=".$value['id']));
        ?>
        <tr>
          <td><input style="width:90%" type="text" name="text[<?= $value['id'] ?>]" value="<?= $value['text'] ?>"></td>
          <td><input style="width:90%" type="text" name="link[<?= $value['id'] ?>]" value="<?= $value['link'] ?>"></td>
          <td><?=$many?></td>
          <td>
            <input type="hidden" name="dpy[<?=$value['id']?>]" value="0">
            <input type="checkbox" name="dpy[<?=$value['id']?>]" value="1" <?= ($value['dpy']) ? "checked" : "" ?>>
          </td>
          <td><input type="checkbox" name="del[]" value="<?= $value['id'] ?>"></td>
          <td><input type="button" onclick="op('#cover','#cvr','view.php?do=menuchg&id=<?= $value['id'] ?>')" value="編輯次選單"></td>
        </tr>
      <?php
    }
    ?>
    </tbody>
  </table>
  <table style="margin-top:40px; width:70%;">
    <tbody>
      <tr>
        <td width="200px"><input type="button" onclick="op('#cover','#cvr','view.php?do=menuadd')" value="新增主選單"></td>
        <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
      </tr>
    </tbody>
  </table>
</form>