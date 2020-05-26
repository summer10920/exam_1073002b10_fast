<?php
$ans = "";
if (!empty($_POST['mail'])) {
  $re = select("q2t6_user", "mail='" . $_POST['mail'] . "'");
  if ($re != null) $ans = "你的密碼為：" . $re[0]['pwd'];
  else $ans = "查無此資料";
}
?>
<fieldset>
  <legend>忘記密碼</legend>
  <form method="post">
    請輸入信箱以查詢密碼<br>
    <input type="text" name="mail"><br>
    <?= $ans ?><br>
    <input type="submit" value="尋找">
  </form>
</fieldset>