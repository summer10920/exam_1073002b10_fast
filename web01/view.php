<?php
include "sql.php";
switch ($_GET['do']) {
  case 'titleadd':
    ?>
  <p class="t cent botli">新增圖片區圖片</p>
  <form action="api.php?do=<?= $_GET['do'] ?>" method="post" enctype="multipart/form-data">
    標題區圖片: <input type="file" name="img" id=""><br>
    標題區替代文字: <input type="text" name="title" id=""><br>
    <input type="submit" value="新增">
  </form>
  <?php
  break;
case 'titlechg':
  ?>
  <p class="t cent botli">修改圖片區圖片</p>
  <form action="api.php?do=<?= $_GET['do'] ?>&id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
    標題區圖片: <input type="file" name="img" id=""><br>
    <input type="submit" value="修改">
  </form>
  <?php
  break;
case 'adadd':
  ?>
  <p class="t cent botli">新增動態文字廣告</p>
  <form action="api.php?do=<?= $_GET['do'] ?>" method="post" enctype="multipart/form-data">
    動態文字廣告: <input type="text" name="text" id=""><br>
    <input type="submit" value="新增">
  </form>
  <?php
  break;
case 'mvimadd':
  ?>
  <p class="t cent botli">新增動畫圖片</p>
  <form action="api.php?do=<?= $_GET['do'] ?>" method="post" enctype="multipart/form-data">
    動畫圖片: <input type="file" name="img" id=""><br>
    <input type="submit" value="新增">
  </form>
  <?php
  break;
case 'mvimchg':
  ?>
  <p class="t cent botli">修改動畫圖片</p>
  <form action="api.php?do=<?= $_GET['do'] ?>&id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
    動畫圖片: <input type="file" name="img" id=""><br>
    <input type="submit" value="修改">
  </form>
  <?php
  break;
case 'imgadd':
  ?>
  <p class="t cent botli">新增校園映像圖片</p>
  <form action="api.php?do=<?= $_GET['do'] ?>" method="post" enctype="multipart/form-data">
    校園映像圖片: <input type="file" name="img" id=""><br>
    <input type="submit" value="新增">
  </form>
  <?php
  break;
case 'imgchg':
  ?>
  <p class="t cent botli">修改校園映像圖片</p>
  <form action="api.php?do=<?= $_GET['do'] ?>&id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
    校園映像圖片: <input type="file" name="img" id=""><br>
    <input type="submit" value="修改">
  </form>
  <?php
  break;
case 'newsadd':
  ?>
  <p class="t cent botli">新增最新消息</p>
  <form action="api.php?do=<?= $_GET['do'] ?>" method="post" enctype="multipart/form-data">
    內容: <textarea name="text" id="" cols="30" rows="10"></textarea>
    <input type="submit" value="新增">
  </form>
  <?php
  break;
case 'adminadd':
  ?>
  <p class="t cent botli">新增管理者</p>
  <form action="api.php?do=<?= $_GET['do'] ?>" method="post" enctype="multipart/form-data">
    帳號: <input type="text" name="acc" id=""><br>
    密碼: <input type="password" name="pwd" id=""><br>
    確認密碼: <input type="password" name="" id=""><br>
    <input type="submit" value="新增">
  </form>
  <?php
  break;
case 'menuadd':
  ?>
  <p class="t cent botli">新增主選單</p>
  <form action="api.php?do=<?= $_GET['do'] ?>" method="post" enctype="multipart/form-data">
    標題: <input type="text" name="title" id=""><br>
    連結: <input type="text" name="link" id=""><br>
    <input type="submit" value="新增">
  </form>
  <?php
  break;
case 'menuchg':
  ?>
  <p class="t cent botli">編輯次選單</p>
  <form action="api.php?do=<?= $_GET['do'] ?>&id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
    <div id="ss">
      <?php
      $re = select("t12_menu", "parent=" . $_GET['id']);
      foreach ($re as $ro) echo '
  標題: <input type="text" name="title[' . $ro['id'] . ']" value="' . $ro['title'] . '">
  連結標題: <input type="text" name="text[' . $ro['id'] . ']" value="' . $ro['link'] . '">
  刪除 <input type="checkbox" name="del[]" value="' . $ro['id'] . '">
  <br>
  ';
      ?>
    </div>
    <input type="button" value="更多" onclick=add()><input type="submit" value="確定">
  </form>
  <script>
    function add() {
      txt = `
        標題: <input type="text" name="new[title][]">
        連結標題: <input type="text" name="new[link][]"><br>
        `;
      $("#ss").append(txt);
    }
  </script>
  <?php
  break;
}
?>