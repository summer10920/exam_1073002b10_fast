# 網乙術科題庫分析 - 健康促進網社群平台
(108年度技術士技能檢定-考速版)

!> 這題是送分題，題目要求的動作在板型上都已完成。不需要處理。所有的選單都要有內容連接。所以這裡先做一下URL對應

## A. 規劃選單連結內容
這裡設計$content\_zone代碼會依檔案名稱而名

### 修改index.php
於頁首開頭處填入

```php
//for t4
$admain=(empty($_SESSION['admin']))?"main":"admain";
$main=(empty($_GET['do']))?$admain:$_GET['do'];
```

這裡先預先做好兩種預設頁，一個是一般瀏覽的預設主頁，另一個是管理者的預設主頁。管理者部分在T14部分會用到。另外，找到位置

```php
<div class=""></div>
```

改成

```php
<div class=""><?php include $main.".php"?></div>
```



