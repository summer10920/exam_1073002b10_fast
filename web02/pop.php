目前位置：首頁>人氣文章區
<table>
  <tr>
    <td width=20% valign=top>標題</td>
    <td valign=top>內容</td>
    <td width=20%>人氣</td>
  </tr>
  <?php
  $_GET['id'] = (empty($_GET['id'])) ? 0 : $_GET['id'];
  $nw = (empty($_GET['page'])) ? 1 : $_GET['page'];
  $begin = ($nw - 1) * 5;
  $re = select("q2t7_blog", "dpy=1 order by num desc limit " . $begin . ",5");
  foreach ($re as $ro) {
    $gdbtn = "";
    if (!empty($_SESSION['user'])) {
      $gd = select("q2t11_good", "user='" . $_SESSION['user'] . "' and blog=" . $ro['id']);
      $gdbtn = ($gd != null) ?
        '<a href="api.php?do=gdsub&id=' . $ro['id'] . '"> - 收回讚</a>' :
        '<a href="api.php?do=gdadd&id=' . $ro['id'] . '"> - 讚</a>';
    }
  ?>
    <tr>
      <td><?= $ro['title'] ?></td>
      <td>
        <div class="sswww"><?= mb_substr($ro['text'], 0, 10) ?>...
          <span class="all" style="display:none"><?= $ro['text'] ?></span>
        </div>
      </td>
      <td><?= $ro['num'] ?>個人說<img style="height:1em" src="img/02B03.jpg"><?= $gdbtn ?></td>
    </tr>
  <?php
  }
  ?>
</table>
<?php
$re = navpage("q2t7_blog", "dpy=1", 5, $nw);
foreach ($re as $key => $value) {
  if ($nw == $key) echo '<a style="font-size:2em" href="?do=news&page=' . $value . '">' . $key . '</a>';
  else echo '<a href="?do=news&page=' . $value . '">' . $key . '</a>';
}
?>
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 0px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
  $(".sswww").hover(
    function() {
      $("#alt").html("" + $(this).children(".all").html() + "").css({
        "top": $(this).offset().top - 120,
        "left": $(this).offset().left - 280,
      })
      $("#alt").show()
    }
  )
  $(".sswww").mouseout(
    function() {
      $("#alt").hide()
    }
  )
</script>