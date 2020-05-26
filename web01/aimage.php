<p class="t cent botli">校園映像資料管理</p>
<form method="post" action="api.php?do=imagemdy">
  <table width="100%">
    <tbody>
      <tr class="yel">
        <td width="68%">校園映像資料圖片</td>
        <td width="7%">顯示</td>
        <td width="7%">刪除</td>
        <td></td>
      </tr>
      <?php
      $nowpage = (empty($_GET['page'])) ? 1 : $_GET['page'];
      $begin = ($nowpage - 1) * 3;
      $re = select("q1t6_img", "1 limit " . $begin . ",3");
      foreach ($re as $value) {
      ?>
        <tr>
          <td><embed src="img/<?= $value['text'] ?>" width="100" height="68"></td>
          <td>
            <input type="hidden" name="dpy[<?= $value['id'] ?>]" value="0">
            <input type="checkbox" name="dpy[<?= $value['id'] ?>]" value="1" <?= ($value['dpy']) ? "checked" : "" ?>>
          </td>
          <td><input type="checkbox" name="del[]" value="<?= $value['id'] ?>"></td>
          <td><input type="button" onclick="op('#cover','#cvr','view.php?do=imagechg&id=<?= $value['id'] ?>')" value="更換圖片"></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
  <div style="text-align:center;">
    <?php
    $re = navpage("q1t6_img", 1, 3, $nowpage);
    foreach ($re as $key => $value)
      echo '<a class="bl" style="font-size:' . (($nowpage == $key) ? "60" : "30") . 'px;" href="?do=aimage&page=' . $value . '">' . $key . '</a>';
    ?>
  </div>
  <table style="margin-top:40px; width:70%;">
    <tbody>
      <tr>
        <td width="200px"><input type="button" onclick="op('#cover','#cvr','view.php?do=imageadd')" value="新增校園映像圖片"></td>
        <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
      </tr>
    </tbody>
  </table>
</form>