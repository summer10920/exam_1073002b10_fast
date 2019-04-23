<h3 class="ct">編輯會員</h3>
<form action="api.php?do=memmdy" method="post" onsubmit="return check()">
  姓名: <input type="text" name="name[<?= $_GET['id'] ?>]" id=""><br>
  電話: <input type="text" name="tel[<?= $_GET['id'] ?>]" id=""><br>
  地址: <input type="text" name="addr[<?= $_GET['id'] ?>]" id=""><br>
  電子信箱: <input type="text" name="mail[<?= $_GET['id'] ?>]" id=""><br>
  <input type="submit" value="確認">
</form>