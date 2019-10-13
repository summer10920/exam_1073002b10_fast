# 網乙術科題庫分析 - 精品電子商務
(108年度技術士技能檢定-考速版)

!> 修正指定之網頁有效連結

## A. 選單的有效連結
大部分的選單都已有預設值，我們不特別修改。只需調整首頁連結，以及URL轉換能有效執行便可

### 修改index.php
調整主區域，找到

```html
<div id="right">
</div>
```

改為

```php
<div id="right">
<?php include $main.".php";?>
</div>
```

在頁首加入

```php
<?php
include "sql.php";
$main=(empty($_GET['do']))?"main":$_GET['do'];
?>
```

另外do=admin會直接嵌入後台，所以也要改

```html
<a href="?do=admin">管理登入</a>
```

改為

```html
<a href="admin.php">管理登入</a>
```

## B. 購物流程的圖片顯示
這部分很容易遺忘掉，其他的選單都在之後的題目動作會完成。所以這裡記得先做掉。

### 新增look.php
```html
<img src="img/0401.jpg" alt="">
```