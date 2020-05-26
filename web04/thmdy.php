<form action="api.php?do=thmdy" method="post">
  名稱：<input type="text" name="title[<?= $_GET['id'] ?>]" id=""><br>
  <input type="submit" value="修改">
</form>