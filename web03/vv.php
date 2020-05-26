<h3 class="ct">電影清單</h3>
<input type="button" value="新增電影" onclick="<?= jlo("?do=vvadd") ?>">
<hr>
<form action="api.php?do=vvmdy" method="post" class="ct">
  <table width=100%>
    <?php
    $re = select("q3t7_movie", "1 order by odr");
    foreach ($re as $ro) {
    ?>
      <tr>
        <td rowspan=3><img width=100 src="img/<?= $ro['img'] ?>" alt=""></td>
        <td rowspan=3 valign="center">分級：<img src="img/<?= $ro['cls'] ?>.png" alt=""></td>
        <td>
          片名：<?= $ro['title'] ?>
          　　　片長：<?= $ro['length'] ?>
          　　　上映日期：<?= $ro['date'] ?>
        </td>
      </tr>
      <tr>
        <td>
          排序：<input type="text" name="odr[<?= $ro['id'] ?>]" value="<?= $ro['odr'] ?>">
          <input type="button" value="編輯電影" onclick="<?= jlo("?do=vvchg&id=" . $ro['id']) ?>">
          <input type="button" value="刪除電影" onclick="<?= jlo("api.php?do=vvdel&id=" . $ro['id']) ?>">
        </td>
      </tr>
      <tr>
        <td>劇情介紹：<?= $ro['text'] ?></td>
      </tr>
      <tr>
        <td colspan=3>
          <hr>
        </td>
      </tr>
    <?php
    }
    ?>
  </table>
  <div class="ct"><input type="submit" value="編輯排序"></div>
</form>