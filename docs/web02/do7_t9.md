# 網乙術科題庫分析 - 健康促進網社群平台
(108年度技術士技能檢定-考速版)

!> 延續第六題的單元，因為要直接顯示結果在同畫面就不用轉去api處理了。將PHP寫在原畫面上

## A. 設計表單
這裡就select，檢查，對應輸出。

### 建立forget.php
```php
<?php
$ans = "";
if (!empty($_POST['mail'])) {
  $re = select("q2t6_user", "mail='" . $_POST['mail'] . "'");
  if ($re != null) $ans = "你的密碼為:" . $re[0]['pwd'];
  else $ans = "查無此資料";
}
?>
<fieldset>
  <legend>忘記密碼</legend>
  <form action="" method="post">
    請輸入信箱以查詢密碼<br>
    <input type="text" name="mail" id=""><br>
    <?= $ans ?><br>
    <input type="submit" value="尋找">
  </form>
</fieldset>
```