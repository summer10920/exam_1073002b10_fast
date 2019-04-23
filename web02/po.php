<?php
$_GET['cls'] = (empty($_GET['cls'])) ? 1 : $_GET['cls'];
if ($_GET['cls'] == 1) $title = "健康新知";
if ($_GET['cls'] == 2) $title = "菸害防治";
if ($_GET['cls'] == 3) $title = "癌症防治";
if ($_GET['cls'] == 4) $title = "慢性病防治";
?>
目前位置:首頁>分類網誌><?= $title ?>
<table>
  <tr>
    <td width=20% valign=top>
      <fieldset>
        <legend>網誌分類</legend>
        <a class="blo" href="?do=po&cls=1">健康新知</a>
        <a class="blo" href="?do=po&cls=2">菸害防治</a>
        <a class="blo" href="?do=po&cls=3">癌症防治</a>
        <a class="blo" href="?do=po&cls=4">慢性病防治</a>
      </fieldset>
    </td>
    <td valign=top>
      <fieldset>
        <legend>文章列表</legend>
        <?php
        if (empty($_GET['id'])) {
          $re = select("t7_blog", "cls=" . $_GET['cls']);
          foreach ($re as $ro) echo '<a href="?do=po&cls=' . $_GET['cls'] . '&id=' . $ro['id'] . '">' . $ro['title'] . '</a><br>';
        } else {
          $re = select("t7_blog", "id=" . $_GET['id']);
          echo $re[0]['text'];
        }
        ?>
      </fieldset>
    </td>
  </tr>
</table>