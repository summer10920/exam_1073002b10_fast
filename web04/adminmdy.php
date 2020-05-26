<h3 class="ct">修改管理者帳號</h3>
<form action="api.php?do=adminmdy&id=<?= $_GET['id'] ?>" method="post">
  帳號：<input type="text" name="acc[<?= $_GET['id'] ?>]" id=""><br>
  密碼：<input type="text" name="pwd[<?= $_GET['id'] ?>]" id=""><br>
  權限：<br>
  <input type="hidden" name="cc[0]" value="0">
  <input type="hidden" name="cc[1]" value="0">
  <input type="hidden" name="cc[2]" value="0">
  <input type="hidden" name="cc[3]" value="0">
  <input type="hidden" name="cc[4]" value="0">
  <input type="checkbox" name="cc[0]" value="1">商品分類與管理<br>
  <input type="checkbox" name="cc[1]" value="1">訂單管理<br>
  <input type="checkbox" name="cc[2]" value="1">會員管理<br>
  <input type="checkbox" name="cc[3]" value="1">頁尾版權管理<br>
  <input type="checkbox" name="cc[4]" value="1">最新消息管理<br>
  <input type="submit" value="修改">
</form>