<p class="t cent botli">動態文字廣告管理</p>
<form method="post" action="api.php?do=admdy">
  <table width="100%">
    <tr class="yel">
      <td width="45%">動態文字廣告</td>
      <td width="7%">顯示</td>
      <td width="7%">刪除</td>
    </tr>
<?php
  $re = select("t4_maqe", 1);
  foreach ($re as $ro) {
?>
    <tr>
      <td><input type="text" name="text[<?= $ro['id'] ?>]" value="<?= $ro['text'] ?>"></td>
      <td>
        <input type="hidden" name="dpy[<?= $ro['id'] ?>]" value=0>
        <input type="checkbox" name="dpy[<?= $ro['id'] ?>]" value=1 <?= ($ro['dpy']) ? "checked" : "" ?>>
      </td>
      <td><input type="checkbox" name="del[]" value="<?= $ro['id'] ?>"></td>
    </tr>
<?php
  }
?>
  </table>
  <table style="margin-top:40px; width:70%;">
    <tbody>
      <tr>
        <td width="200px">
          <input type="button" onclick="op('#cover','#cvr','view.php?do=adadd')" value="新增動態文字廣告">

        </td>
        <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
      </tr>
    </tbody>
  </table>

</form>