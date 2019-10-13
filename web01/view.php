<?php
require_once("sql.php");
switch ($_GET['do']) {
  case 'titleadd':
    ?>
  <form method="post" action="api.php?do=<?= $_GET['do'] ?>" enctype="multipart/form-data">
    <p class="t botli">新增標題區圖片</p>
    <p class="cent">標題區圖片 ： <input name="img" type="file"></p>
    <p class="cent">標題區替代文字 ： <input name="text" type="text"></p>
    <p class="cent"><input value="新增" type="submit"><input type="reset" value="重置"></p>
  </form>
  <?php
  break;
case 'titlechg':
  ?>
  <form method="post" action="api.php?do=<?= $_GET['do'] ?>&id=<?= $_GET['id'] ?>" enctype="multipart/form-data">
    <p class="t botli">修改標題區圖片</p>
    <p class="cent">標題區圖片 ： <input name="img" type="file"></p>
    <p class="cent"><input value="修改" type="submit"><input type="reset" value="重置"></p>
  </form>
  <?php
  break;
case 'maqeadd':
  ?>
  <form method="post" action="api.php?do=<?= $_GET['do'] ?>" enctype="multipart/form-data">
    <p class="t botli">新增動態文字廣告</p>
    <p class="cent">動態文字廣告 ： <input name="text" type="text"></p>
    <p class="cent"><input value="新增" type="submit"><input type="reset" value="重置"></p>
  </form>
  <?php
  break;
case 'mvimadd':
  ?>
  <form method="post" action="api.php?do=<?= $_GET['do'] ?>" enctype="multipart/form-data">
    <p class="t botli">新增動畫圖片</p>
    <p class="cent">標題區圖片 ： <input name="img" type="file"></p>
    <p class="cent"><input value="新增" type="submit"><input type="reset" value="重置"></p>
  </form>
  <?php
  break;
case 'mvimchg':
  ?>
  <form method="post" action="api.php?do=<?= $_GET['do'] ?>&id=<?= $_GET['id'] ?>" enctype="multipart/form-data">
    <p class="t botli">修改動畫圖片</p>
    <p class="cent">標題區圖片 ： <input name="img" type="file"></p>
    <p class="cent"><input value="修改" type="submit"><input type="reset" value="重置"></p>
  </form>
  <?php
  break;
case 'imageadd':
  ?>
  <form method="post" action="api.php?do=<?= $_GET['do'] ?>" enctype="multipart/form-data">
    <p class="t botli">新增校園映像圖片</p>
    <p class="cent">校園映像圖片 ： <input name="img" type="file"></p>
    <p class="cent"><input value="新增" type="submit"><input type="reset" value="重置"></p>
  </form>
  <?php
  break;
case 'imagechg':
  ?>
  <form method="post" action="api.php?do=<?= $_GET['do'] ?>&id=<?= $_GET['id'] ?>" enctype="multipart/form-data">
    <p class="t botli">修改校園映像圖片</p>
    <p class="cent">校園映像圖片 ： <input name="img" type="file"></p>
    <p class="cent"><input value="修改" type="submit"><input type="reset" value="重置"></p>
  </form>
  <?php
  break;
case 'newsadd':
  ?>
  <form method="post" action="api.php?do=<?= $_GET['do'] ?>" enctype="multipart/form-data">
    <p class="t botli">新增最新消息資料</p>
    <p class="cent"><span style="vertical-align:top;">最新消息資料 ： </span><textarea name="text"></textarea></p>
    <p class="cent"><input value="新增" type="submit"><input type="reset" value="重置"></p>
  </form>
  <?php
  break;
case 'adminadd':
  ?>
  <form method="post" action="api.php?do=<?= $_GET['do'] ?>" enctype="multipart/form-data">
    <p class="t botli">新增管理者帳號</p>
    <p class="cent">帳號 ： <input name="acc" type="text"></p>
    <p class="cent">密碼 ： <input name="pwd" type="password"></p>
    <p class="cent">確認密碼 ： <input name="check" type="password"></p>
    <p class="cent"><input value="新增" type="submit"><input type="reset" value="重置"></p>
  </form>
  <?php
  break;
case 'menuadd':
  ?>
  <form method="post" action="api.php?do=<?= $_GET['do'] ?>" enctype="multipart/form-data">
    <p class="t botli">新增主選單</p>
    <table class="cent" style="width:50%;margin:0 auto">
      <thead>
        <tr>
          <td>選單名稱</td>
          <td>選單連結網址</td>
          <td></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input name="text" type="text"></td>
          <td><input name="link" type="text"></td>
        </tr>
      </tbody>
    </table>
    <p class="cent"><input value="新增" type="submit"><input type="reset" value="重置"></p>
  </form>
  <?php
  break;
case 'menuchg':
  ?>
  <form method="post" action="api.php?do=<?= $_GET['do'] ?>&id=<?= $_GET['id'] ?>" enctype="multipart/form-data">
    <p class="t botli">編輯次選單</p>
    <table class="cent" style="width:50%;margin:0 auto">
      <thead><tr><td>選單名稱</td><td>選單連結網址</td><td>刪除</td></tr></thead>
      <tbody id="tb">
        <?php
        $re = select("q1t12_menu", "parent=" . $_GET['id']);
        foreach ($re as $ro) {
          ?>
          <tr>
            <td><input name="text[<?= $ro['id'] ?>]" type="text" value="<?= $ro['text'] ?>"></td>
            <td><input name="link[<?= $ro['id'] ?>]" type="text" value="<?= $ro['link'] ?>"></td>
            <td><input type="checkbox" name="del[]" value="<?= $ro['id'] ?>"></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <p class="cent">
      <input value="修改確定" type="submit">
      <input type="reset" value="重置">
      <input type="button" value="更多" onclick="add()">
    </p>
  </form>
  <script>
    function add() {
      txt = `
        <tr>
          <td><input name="new[text][]" type="text"></td>
          <td><input name="new[link][]" type="text"></td>
          <td></td>
        </tr>
      `;
      $("#tb").append(txt);
    }
  </script>
  <?php
  break;
}
