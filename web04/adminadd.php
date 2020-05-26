<h3 class="ct">新增管理者帳號</h3>
<form action="api.php?do=adminadd" method="post">
  帳號：<input type="text" name="acc" id=""><br>
  密碼：<input type="text" name="pwd" id=""><br>
  權限：<br>
  <input type="hidden" name="access[0]" value="0">
  <input type="hidden" name="access[1]" value="0">
  <input type="hidden" name="access[2]" value="0">
  <input type="hidden" name="access[3]" value="0">
  <input type="hidden" name="access[4]" value="0">
  <input type="checkbox" name="access[0]" value="1">商品分類與管理<br>
  <input type="checkbox" name="access[1]" value="1">訂單管理<br>
  <input type="checkbox" name="access[2]" value="1">會員管理<br>
  <input type="checkbox" name="access[3]" value="1">頁尾版權管理<br>
  <input type="checkbox" name="access[4]" value="1">最新消息管理<br>
  <input type="submit" value="新增">
</form>