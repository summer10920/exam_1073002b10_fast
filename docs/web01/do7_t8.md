# 網乙術科題庫分析 - 卓越科技大學校園資訊系統
(108年度技術士技能檢定-考速版)

!> 就拿第7題來改吧

## A. 修改後台的內容格式

整個複製版型後，根據需求做修改調整。題目未要求帶原值可自決定。記得from提交改成到`do=mdyfooter`。

### 新增abottom.php(參考atotal.php)
```html
<?php
$re=select("t8_footer",1);
?>
<form method="post" action="api.php?do=bottommdy">
  <p class="t botli">頁尾版權資料管理</p>
  <p class="cent">頁尾版權資料 ： <input name="text[1]" value="<?=$re[0]['text']?>" type="text"></p>
  <p class="cent"><input value="修改確定" type="submit"><input type="reset" value="重置"></p>
</form>
```

對api.php做SQL處理，接著回到該單元內容。\(可複製前題目做修改\)
### 增添api.php
```php
case 'bottommdy':
  update($_POST, "q1t8_footer");
  plo("admin.php?do=abottom");
  break;
```

## B. 前台的顯示
增加以下代碼做提取

### 增添sql.php
```php
//t8
$re=select("q1t8_footer", 1);
$t8_text=$re[0]['text'];
```

將所有的進站總人數區域部分標籤內增加php變數
### 修改admin.php、login.php、index.php、news.php
```php
<span class="t" style="line-height:123px;"></span>
```

帶入$t8_text，改為

```php
<span class="t" style="line-height:123px;"><?=$t8_text?></span>
```