# 網乙術科題庫分析 - 健康促進網社群平台
(108年度技術士技能檢定-考速版)

!> 設計登入登出按鈕，相對應的驗證功能與查詢密碼與註冊。

## A. 設計登入
示意圖上的眶線，是使用HTML的fieldset，大部分的版面示意都有出現，所以多背一下這個。
```html
<fieldset>
    <legend>title</legend>
    content
</fieldset>
```


### 新增login.php
填入代碼，設計提交表單。重點在於解題要習慣所有表單都會到api.php，並夾帶動作要求\(do=login\)。由api裡處理。

```html
<fieldset>
<legend>會員登入</legend>
<form action="api.php?do=login" method="post">
帳號: <input type="text" name="acc" id=""><br>
密碼: <input type="text" name="pwd" id=""><br>
<input type="submit" value="登入"><input type="reset" value="清除">
<a href="?do=forget">忘記密碼</a> | <a href="?do=reg">尚未註冊</a>
</form>
</fieldset>
```

題目還有要求login.php兩個連結\(forget,register\)要做先跳過。在第九第十題才會開始解析

### 新增api.php

設計switch來做do=login的處理。題目要求有處理結果的提示\(使用JS.alert，並使用js轉址。如果可登入就給個session

此外如果admin登入正確就給一個session

```php
<?php
include "sql.php";
switch ($_GET['do']) {
    case 'login':
        if($_POST['acc']=='admin'&&$_POST['pwd']=='1234') $_SESSION['admin']='admin';
        $re=select("q2t6_user","acc='".$_POST['acc']."'");
        if($re==null) echo "<script>alert('查無帳號');".jlo("index.php?do=login")."</script>";
        $re=select("q2t6_user","acc='".$_POST['acc']."' and pwd='".$_POST['pwd']."'");
        if($re==null) echo "<script>alert('查無密碼');".jlo("index.php?do=login")."</script>";
        else{
            $_SESSION['user']=$_POST['acc'];
            plo("index.php");
        }
        print_r($_POST);
    break;
}
?>
```

## B. 登入登出按鈕
登入成功後，調整登入登出按鈕。這裡寫在sql.php可以減少對素材index.php的代碼複雜。
* 未登入顯示"&lt;a href='?do=login'&gt;會員登入&lt;/a&gt;"
* 已登入顯示"歡迎，".$\_SESSION\['user'\]."&lt;a href='api.php?do=logout'&gt;登出&lt;/a&gt;"，登出在題目上有要求框線

### 增添sql.php
```php
//t6
$t6btn=(empty($_SESSION['user']))?'<a href="?do=login">會員登入</a>':'歡迎，'.$_SESSION['user'].'<a href="api.php?do=logout" style="border: solid 1px #000000">登出</a>';
```

### 修改index.php

修改該對應位置

```php
<span style="width:18%; display:inline-block;"><a href="?do=login">會員登入</a></span>
```

為

```php
<span style="width:18%; display:inline-block;"><?=$t6btn?></span>
```

## C. 登出
題目沒有要求設計登出，這裡可做可不做，設計清除session並回到首頁。

### 增添api.php
```php
case 'logout':
    unset($_SESSION['user']);
    unset($_SESSION['admin']);
    plo("index.php");
    break;
```