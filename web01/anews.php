<p class="t cent botli">最新消息資料管理</p>
<form method="post" action="api.php?do=newsmdy">
  <table width="100%">
    <tbody>
      <tr class="yel">
        <td width="68%">最新消息資料內容</td>
        <td width="7%">顯示</td>
        <td width="7%">刪除</td>
      </tr>
      <?php
      $nowpage = (empty($_GET['page'])) ? 1 : $_GET['page'];
      $begin = ($nowpage - 1) * 4;
      $re = select("q1t9_news", "1 limit " . $begin . ",4");
      foreach ($re as $value) {
      ?>
        <tr>
          <td><textarea name="text[<?= $value['id'] ?>]" cols="70" rows="3"><?= $value['text'] ?></textarea></td>
          <td>
            <input type="hidden" name="dpy[<?= $value['id'] ?>]" value="0">
            <input type="checkbox" name="dpy[<?= $value['id'] ?>]" value="1" <?= ($value['dpy']) ? "checked" : "" ?>>
          </td>
          <td><input type="checkbox" name="del[]" value="<?= $value['id'] ?>"></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
  <div style="text-align:center;">
    <?php
    $re = navpage("q1t9_news", 1, 4, $nowpage);
    foreach ($re as $key => $value) {
      echo '<a class="bl" style="font-size:' . (($nowpage == $key) ? "60" : "30") . 'px;" href="?do=anews&page=' . $value . '">' . $key . '</a>';
    }
    ?>
  </div>
  <table style="margin-top:40px; width:70%;">
    <tbody>
      <tr>
        <td width="200px"><input type="button" onclick="op('#cover','#cvr','view.php?do=newsadd')" value="新增最新消息圖片"></td>
        <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
      </tr>
    </tbody>
  </table>
</form>