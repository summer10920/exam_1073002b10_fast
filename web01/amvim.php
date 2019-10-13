<p class="t cent botli">動畫圖片管理</p>
<form method="post" action="api.php?do=mvimmdy">
  <table width="100%">
    <tbody>
      <tr class="yel">
        <td width="68%">網站標題</td>
        <td width="7%">顯示</td>
        <td width="7%">刪除</td>
        <td></td>
      </tr>
      <?php
      $re = select("q1t5_mvim", 1);
      foreach ($re as $value) {
        ?>
        <tr>
          <td><embed src="upload/<?= $value['text'] ?>" width="300"></td>
          <td>
            <input type="hidden" name="dpy[<?=$value['id']?>]" value="0">
            <input type="checkbox" name="dpy[<?=$value['id']?>]" value="1" <?= ($value['dpy']) ? "checked" : "" ?>>
          </td>
          <td><input type="checkbox" name="del[]" value="<?= $value['id'] ?>"></td>
          <td><input type="button" onclick="op('#cover','#cvr','view.php?do=mvimchg&id=<?= $value['id'] ?>')" value="更換動畫"></td>
        </tr>
      <?php
    }
    ?>
    </tbody>
  </table>
  <table style="margin-top:40px; width:70%;">
    <tbody>
      <tr>
        <td width="200px"><input type="button" onclick="op('#cover','#cvr','view.php?do=mvimadd')" value="新增動畫圖片"></td>
        <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
      </tr>
    </tbody>
  </table>
</form>