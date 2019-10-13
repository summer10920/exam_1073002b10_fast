# 網乙術科題庫分析 - 卓越科技大學校園資訊系統
(108年度技術士技能檢定-考速版)

!> 這題很簡單，如法炮製隨便找個類似來改

## A. 修改後台的內容格式
整個複製版型後，根據需求做修改調整。
題目沒要求是否帶原值，你可以自己作主。
記得from提交改成到do=totalmdy。要記得id是1

### 新增atotal.php\(參考atitle.php\)
```html
<?php
$re=select("t7_total",1);
?>
<form method="post" action="api.php?do=totalmdy">
  <p class="t botli">進站總人數管理</p>
  <p class="cent">進站總人數 ： <input name="num[1]" value="<?=$re[0]['num']?>" type="text"></p>
  <p class="cent"><input value="修改確定" type="submit"><input type="reset" value="重置"></p>
</form>
```
再來對api.php做SQL處理，接著回到該單元內容。\(可複製前題目做修改\)

### 增添api.php
```php
case 'totalmdy':
  update($_POST, "q1t7_total");
  plo("admin.php?do=atotal");
  break;
```

## B. 前台的total顯示格式
增加以下代碼做提取準備。同時判別如果沒SESSION紀錄，先update更新+1並更新此值。(透過我們設計的num+1，函式會自動加1，不用管原本是多少)

### 增添sql.php
```php
//t7
if (empty($_SESSION['visit'])) {
  $_SESSION['visit']="check";
  $post['num+1']=1;
  update($post, "q1t7_total");
} //先判斷是否更新，之後才撈取
$re=select("q1t7_total", 1);
$t7_text=$re[0]['num'];
```

再來將進站總人數區域部分標籤內增加php變數

### 修改admin.php、login.php、index.php、news.php
```php
<span class="t">進站總人數 :1</span>
```

改為

```php
<span class="t">進站總人數 : <?=$t7_text?></span>
```