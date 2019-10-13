<?php
$re=select("q1t8_footer",1);
?>
<form method="post" action="api.php?do=bottommdy">
  <p class="t botli">頁尾版權資料管理</p>
  <p class="cent">頁尾版權資料 ： <input name="text[1]" value="<?=$re[0]['text']?>" type="text"></p>
  <p class="cent"><input value="修改確定" type="submit"><input type="reset" value="重置"></p>
</form>