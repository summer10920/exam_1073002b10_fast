# 網乙術科題庫分析 - ABC影城
(108年度技術士技能檢定-考速版)

!> 跟第四題同一組，這裡先做第五題的後台新增修改刪除，最後才再回設計前台\(第四題\)。<br>這題先做出大概版型-&gt;做好新增-&gt;修改刪除-&gt;前台顯示。<br>所有的form都提交到api處理。

## A. 規劃新增功能。
在版面的最底下，我們先做新增方便之後的修改刪除測試。與前面做hr分割開來。注意form需要宣告
enctpye。並提交到api.php以do=addslider為處理。

### 新增rr.php
```html
<hr>
<h3 class="ct">新增預告片</h3>
<form action="api.php?do=rradd" method="post" enctype="multipart/form-data" class="ct">
預告片海報<input type="file" name="img" id=""> 預告片片名<input type="text" name="text" id=""><br><br>
<input type="submit" value="新增">
</form>
```

### 增添api.php
```php
case 'rradd':
    $_POST['img'] = addfile($_FILES['img']);
    insert($_POST, "q3t5_img");
    plo("admin.php?do=rr");
    break;
```

試著增添幾筆，檢查sql.table有無成功，以及img資料夾有無新項目圖片。

## B. 規劃清單做修改刪除
題目要求很簡單只有新增刪除而已。且修改只要求顯示與排序。為了考試節省時間，用Input數字來處理排序就好。

### 增添rr.php
```php
<h3 class="ct">預告片清單</h3>
<form action="api.php?do=rrmdy" method="post" class="ct">
<table>
    <tr>
        <td>預告片海報</td>
        <td>預告片片名</td>
        <td>播放順序</td>
        <td>操作</td>
    </tr>
<?php
$re=select("q3t5_img","1 order by odr");
foreach ($re as $ro) {
?>
    <tr>
        <td><img width=100 src="upload/<?=$ro['img']?>" alt=""></td>
        <td><?=$ro['text']?></td>
        <td><input type="text" name="odr[<?=$ro['id']?>]" value="<?=$ro['odr']?>"></td>
        <td>
        <input type="hidden" name="dpy[<?=$ro['id']?>]" value=0>
        <input type="checkbox" name="dpy[<?=$ro['id']?>]" value="1" <?=($ro['dpy'])?"checked":""?>>顯示
        <input type="checkbox" name="del[]" value="<?=$ro['id']?>">刪除
        </td>
    </tr>
<?php
}
?>
</table>
<div class="ct"><input type="submit" value="編輯"></div>
</form>
```

### 增添api.php
```php
  case 'rrmdy':
    update($_POST, "q3t5_img");
    delete($_POST, "q3t5_img");
    plo("admin.php?do=rr");
    break;
```

## C. 轉場特效選項
題目還要求要給前端的轉場特效，跟之前的form表單做在一起即可，所以我們在from與table標籤之間加入一個select表單。

### 增添rr.php
```php
<form action="api.php?do=rrmdy" method="post" class="ct">
<select name="eft">
<?php
$re=select("q3t5_effect",1);
$ro=$re[0];
?>
<option value="1" <?=($ro['once']==1)?"selected":""?>>淡入</option>
<option value="2" <?=($ro['once']==2)?"selected":""?>>縮放</option>
<option value="3" <?=($ro['once']==3)?"selected":""?>>移出</option>
</select>
        <hr>
<table>
```

### 修改api.php
到剛剛的api.php添加調整一下。將once這個欄位抽取出來另存為$gg陣列進行update到q3t5_effect。舊的陣列可清可不清除，不存在的field被update到q3t5_img並不會被受理。

此外這裡的陣列規劃`$gg['field name']['num id']=data value`，能符合函式快速修改

```php
case 'rrmdy':
    $gg['once'][1] = $_POST['eft'];
    update($gg, "q3t5_effect");
    update($_POST, "q3t5_img");
    delete($_POST, "q3t5_img");
    plo("admin.php?do=rr");
    break;
```