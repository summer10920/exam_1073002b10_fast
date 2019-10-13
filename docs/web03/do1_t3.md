# 網乙術科題庫分析 - ABC影城
(108年度技術士技能檢定-考速版)

!> 調整index.php選單的有效連接，以及規劃好帳號登入功能。

## A. 主選單的有效連結
先修正正確的檔案名稱之超連結，在三個素材版型內找到

### 修改index.php、order.php、admin.php
```html
<div id="top2">
    <a href="03P01.htm">首頁</a> <a href="03P02.htm">線上訂票</a> <a href="#">會員系統</a> <a href="03P03.htm">管理系統</a>
</div>
```

修改為

```html
<div id="top2">
    <a href="index.php">首頁</a>
    <a href="order.php">線上訂票</a>
    <a href="#">會員系統</a>
    <a href="admin.php">管理系統</a>
  </div>
```

另外先插入各頁首連接sql.php，方便之後任何PHP與SQL處理。

```php
<?php
include "sql.php";
?>
```

## B. 前台首頁的內容切換
這裡會有三組切換，包含預設畫面、內容細節、登入畫面。所以設計一個內容切換。把div.mm的內容都抽取出來

### 修改index.php
```html
    <div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
          <ul class="lists">
          </ul>
          <ul class="controls">
          </ul>
        </div>
      </div>
    </div>
    <div class="half">
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:95%;">
        <table>
          <tbody>
            <tr> </tr>
          </tbody>
        </table>
        <div class="ct"> </div>
      </div>
    </div>
```

取代為下列代碼，上列代碼**另存為main.php**

```php
<?php include $main.".php"?>
```

以及開頭記得做判斷

```php
$main=(empty($_GET['do']))?"main":$_GET['do'];
```

## C. 後台選單的超連結簡化
在後台設計上大部分都是do=admin&redo=XX。順手將redo拿掉只留一個變數就好。

### 修改admin.php
```html
<div class="ct a rb" style="position:relative; width:101.5%; left:-1%; padding:3px; top:-9px;"> <a href="?do=admin&redo=tit">網站標題管理</a>| <a href="?do=admin&redo=go">動態文字管理</a>| <a href="?do=admin&redo=rr">預告片海報管理</a>| <a href="?do=admin&redo=vv">院線片管理</a>| <a href="?do=admin&redo=order">電影訂票管理</a> </div>
```

更改為

```html
<div class="ct a rb" style="position:relative; width:101.5%; left:-1%; padding:3px; top:-9px;"> <a href="?do=tit">網站標題管理</a>| <a href="?do=go">動態文字管理</a>| <a href="?do=rr">預告片海報管理</a>| <a href="?do=vv">院線片管理</a>| <a href="?do=orderlist">電影訂票管理</a> </div>
```

## D. 後台選單的內容切換
抽取後台選單對應的主內容，拿來做對應的分割區域。並**另存為admain.php**，連結回admin首頁

### 修改admin.php
將下面代抽出來另存為`admain.php`
```php
<h2 class="ct">請選擇所需功能</h2>
```

改為

```php
<?php include $main.".php"?>
```

後台管理也有自己的選單內容，所以我們要做個選單內容服務。寫入到最上面的php
```php
$admain=(empty($_GET['do']))?"admain":$_GET['do'];
```

## E. 判斷是否登入
如果沒有偵測到SESSION\['admin'\]存在，就踢到前台的登入畫面。

### 增添admin.php
在頁首處增加以下代碼
```php
if(empty($_SESSION['admin'])) plo("index.php?do=login");
```

### 新增login.php
設計login表單並提交到api.php，同時順便設計之後有登入過就直接轉回admin.php不用到登入面

```php
<form action="api.php?do=login" method="post">
帳號: <input type="text" name="acc" id=""><br><br>
密碼: <input type="text" name="pwd" id=""><br><br>
<input type="submit" value="送出">
</form>
```

### 新增api.php
規劃switch，並開始做login的提交處理

```php
<?php
include "sql.php";
switch ($_GET['do']) {
  case 'login':
    if ($_POST['acc'] == "admin" && $_POST['pwd'] == "1234") {
      $_SESSION['admin'] = 123;
      plo("admin.php");
    } else echo "<scrip>alert('輸入錯誤');window.history.back()</scrip>";
    break;
}
?>
```
另外這裡不一定需要設計登出功能，因為前後台都能同時操作。