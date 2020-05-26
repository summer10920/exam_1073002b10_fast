<form action="api.php?do=newsmdy" method="post">
  <table>
    <tr>
      <td>編號</td>
      <td valign=top>標題</td>
      <td valign=top>顯示</td>
      <td valign=top>刪除</td>
      <td></td>
    </tr>
    <?php
    $nw = (empty($_GET['page'])) ? 1 : $_GET['page'];
    $begin = ($nw - 1) * 3;
    $re = select("q2t7_blog", "1 limit " . $begin . ",3");
    foreach ($re as $ro) {
    ?>

      <tr>
        <td><?= $ro['id'] ?></td>
        <td><?= $ro['title'] ?></td>
        <td>
          <input type="hidden" name="dpy[<?= $ro['id'] ?>]" value="0">
          <input type="checkbox" name="dpy[<?= $ro['id'] ?>]" value="1" <?= ($ro['dpy']) ? "checked" : "" ?>>
        </td>
        <td><input type="checkbox" name="del[]" value="<?= $ro['id'] ?>"></td>
      </tr>
    <?php
    }
    ?>
  </table>
  <?php
  $re = navpage("q2t7_blog", 1, 3, $nw);
  foreach ($re as $key => $value) {
    if ($nw == $key) echo '<a style="font-size:2em" href="?do=apop&page=' . $value . '">' . $key . '</a>';
    else echo '<a href="?do=apop&page=' . $value . '">' . $key . '</a>';
  }
  ?>
  <br><input type="submit" value="確定修改">
</form>