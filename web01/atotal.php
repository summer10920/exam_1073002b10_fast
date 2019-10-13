<?php
$re=select("q1t7_total",1);
?>
<form method="post" action="api.php?do=totalmdy">
  <p class="t botli">進站總人數管理</p>
  <p class="cent">進站總人數 ： <input name="num[1]" value="<?=$re[0]['num']?>" type="text"></p>
  <p class="cent"><input value="修改確定" type="submit"><input type="reset" value="重置"></p>
</form>