# 網乙術科題庫分析 - 卓越科技大學校園資訊系統
(108年度技術士技能檢定-考速版)

!> 你已經可以正常切換前後台就能開始處理各題目，同時注意後台admin.php的初始頁為該T3。因這裡算第一次處理後台，所以main\_zone要先處理掉

## A. 內容區域調整
後台選單連結都是`?do\=admin\&redo\=XX`。所以做切換admin zone的功能。在頁首加入php

### 修改admin.php
```php
$mainzone = (!empty($_GET['do'])) ? $_GET['do'] : "atitle";
```
同時簡化這些有do+redo的連結，我們做成do即可，以及每個開頭多個a字母做差異。順便先修好第一筆選單的href連接。指向到atitle就可以了。

```html
<a style="color:#000; font-size:13px; text-decoration:none;" href="./Management page_files/Management page.htm">
  <div class="mainmu">網站標題管理</div>
</a>
<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=ad">
  <div class="mainmu">動態文字廣告管理</div>
</a>
<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=mvim">
  <div class="mainmu">動畫圖片管理</div>
</a>
<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=image">
  <div class="mainmu">校園映象資料管理</div>
</a>
<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=total">
  <div class="mainmu">進站總人數管理</div>
</a>
<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=bottom">
  <div class="mainmu">頁尾版權資料管理</div>
</a>
<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=news">
  <div class="mainmu">最新消息資料管理</div>
</a>
<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=admin">
  <div class="mainmu">管理者帳號管理</div>
</a>
<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=menu">
  <div class="mainmu">選單管理</div>
</a>
```

修改為

```html
<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=atitle">
<div class="mainmu">
網站標題管理 </div>
</a>
<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=aad">
<div class="mainmu">
動態文字廣告管理 </div>
</a>
<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=amvim">
<div class="mainmu">
動畫圖片管理 </div>
</a>
<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=aimage">
<div class="mainmu">
校園映象資料管理 </div>
</a>
<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=atotal">
<div class="mainmu">
進站總人數管理 </div>
</a>
<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=abottom">
<div class="mainmu">
頁尾版權資料管理 </div>
</a>
<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=anews">
<div class="mainmu">
最新消息資料管理 </div>
</a>
<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=aadmin">
<div class="mainmu">
管理者帳號管理 </div>
</a>
<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=amenu">
<div class="mainmu">
選單管理 </div>
</a>
```

抽取內容區做成include，預設是第三題頁面，所以抽取該段==另存為atitle.php==

```php
<p class="t cent botli">網站標題管理</p>
<form method="post" target="back" action="?do=tii">
  <table width="100%">
    <tbody>
      <tr class="yel">
        <td width="45%">網站標題</td>
        <td width="23%">替代文字</td>
        <td width="7%">顯示</td>
        <td width="7%">刪除</td>
        <td></td>
      </tr>
    </tbody>
  </table>
  <table style="margin-top:40px; width:70%;">
    <tbody>
      <tr>
        <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=title&#39;)"
            value="新增網站標題圖片"></td>
        <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
      </tr>
    </tbody>
  </table>
</form>
```

更改為

```php
<?php 
include_once($mainzone . ".php" ); 
/*不用要<?=?>會出現1的文字*/
?>
```
接下來所有的解題步驟會是後台==select, insert, update, delete，前台只需select==

## B. 後台的內容格式

1. 找到表格中間，塞入php使可以順利select並帶入tr&gt;td顯示
2. 注意input的name與value，宣告方法依據修改與刪除有所不同。參考重點說明
3. 新增單項的提交到view.php，走?do=titleadd
4. form的提交到api.php，走?do=titlemdy
5. 更新圖片的提交到view.php，走?do=titlechg，並夾帶ID

### 修改atitle.php
```html
<p class="t cent botli">網站標題管理</p>
<form method="post" action="api.php?do=titlemdy">
  <table width="100%">
    <tbody>
      <tr class="yel">
        <td width="45%">網站標題</td>
        <td width="23%">替代文字</td>
        <td width="7%">顯示</td>
        <td width="7%">刪除</td>
        <td></td>
      </tr>
      <?php
      $re = select("t3_title", 1);
      foreach ($re as $ro) {
        ?>
        <tr>
          <td><img src="upload/<?= $ro['img'] ?>" width="300" height="30"></td>
          <td><input type="text" name="text[<?= $ro['id'] ?>]" value="<?= $ro['text'] ?>"></td>
          <td>
            <input type="hidden" name="dpy[<?=$ro['id']?>]" value="0">
            <input type="radio" name="radio" value="<?= $ro['id'] ?>" <?= ($ro['dpy']) ? "checked" : "" ?>>
          </td>
          <td><input type="checkbox" name="del[]" value="<?= $ro['id'] ?>"></td>
          <td><input type="button" onclick="op('#cover','#cvr','view.php?do=titlechg&id=<?= $ro['id'] ?>')" value="更新圖片"></td>
        </tr>
      <?php
    }
    ?>
    </tbody>
  </table>
  <table style="margin-top:40px; width:70%;">
    <tbody>
      <tr>
        <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=titleadd&#39;)" value="新增網站標題圖片"></td>
        <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
      </tr>
    </tbody>
  </table>
</form>
```

**※重點※：批次修改**

function update設計成可以多筆資料一起更新，原理為一次抓一筆變數做update sql。所以一個變數就要有id索引、name欄位名稱、value內容值。因此需要利用陣列儲存，索引當作id值。

舉例來說要更新某欄位名稱\(text\)，function需要知道\(ID=8\)跟新內容\(新標題\)。那input會像是

```html
<input type="text" name="text[8]" value="新標題">
```

這樣在sql.php才會接受處理成：\(由api.php告知table對象\)

```html
sql="UPDATE table SET text='新標題' where id=8";
```

另外，radio部分的dpy設計。先宣誓全部的name=dpy\[id\]都是0。接著如果有被選就給1存為name=radio。之後在api.php那哩，將input.radio=id算計到dpy\[id\]=1去，這樣最後的dpy陣列都有0或1

舉例：
```html
<input type="hidden" name="dpy[8]" value="0">
<input type="radio" name="radio" value="0~n" <?= ($ro['dpy']) ? "checked" : "" ?>>
```
此時id為3做dpy唯一並送出後，這樣能得到`dpy[]={0,0,0,0,...}` & `radio=3`。因此我們要整理成`dpy[]={0,0,1,0,...}`方便做UPDATE

**※重點※：批次刪除**

function delete也是多筆一起刪除，原理也是一次抓一筆變數做delete sql，但只需要del動作與id對象。input會像是

```html
<input type="text" name="del[]" value="8">
```

當sql.php分析時看到名稱叫del就知道要做刪除動作：\(由api.php告知table對象\)

```html
$sql="DELETE FTOM table where id=8";
```

## C. 新增單筆

之後會有很多種不同操作進入view.php，先設定好switch並先做==titleadd==的處理，主要是顯示HTML FORM。

表單提交到api.php，做跟該環節有相同的do代碼就可以了\(也就是do=titleadd\)，這能方便之後的快速複製。注意有用到檔案上傳，form要宣告enctype="multipart/form-data"

### 新增view.php
```html
<?php
require_once("sql.php");
switch ($_GET['do']) {
  case 'titleadd':
    ?>
  <form method="post" action="api.php?do=<?= $_GET['do'] ?>" enctype="multipart/form-data">
    <p class="t botli">新增標題區圖片</p>
    <p class="cent">標題區圖片 ： <input name="img" type="file"></p>
    <p class="cent">標題區替代文字 ： <input name="text" type="text"></p>
    <p class="cent"><input value="新增" type="submit"><input type="reset" value="重置"></p>
  </form>
  <?php
  break;
}
?>
```

接著，規劃**titleadd**的動作，新增case透過function快速完成insert，並回到admin首頁
### 增添api.php
```php
  case 'titleadd':
    $_POST['img'] = addfile($_FILES['img']);
    insert($_POST, "q1t3_title");
    plo("admin.php");
    break;
```

## D. 修改多筆 + 刪除多筆

* 從前台試著操作多筆修改跟刪除按下送出。網頁會到api.php?do=titlemdy，繼續此動作處理。

* 同時將radio與dpy\[\]整合為完整的dpy\[\]，完成後回到後台頁面admin.php

* 沒把握你可以在case內先下print\_r\($\_POST\)，確認畫面的資料正不正常跟有哪些資料

### 增添api.php
```php
case 'titlemdy':
  $_POST['dpy'][$_POST['radio']] = 1;
  update($_POST, "q1t3_title");
  delete($_POST, "q1t3_title");
  plo("admin.php");
  break;
```

## E. 修改單一圖片

這時候的新增修改刪除都可以順利操作，只剩單圖片更改作業。完成view.php。可以拿前一case來改一下。因為只有純上傳圖片，我們需要$\_GET藏一個ID

### 增添view.php

```html
case 'titlechg':
  ?>
  <form method="post" action="api.php?do=<?= $_GET['do'] ?>&id=<?= $_GET['id'] ?>" enctype="multipart/form-data">
    <p class="t botli">修改標題區圖片</p>
    <p class="cent">標題區圖片 ： <input name="img" type="file"></p>
    <p class="cent"><input value="修改" type="submit"><input type="reset" value="重置"></p>
  </form>
  <?php
  break;
```

送出後，參考之前的case，因為同時為了配合function，將id、欄位對象、新檔名做成陣列送交給update

### 增添api.php
```php
case 'titlechg':
  $_POST['img'][$_GET['id']] = addfile($_FILES['img']);
  update($_POST, "q1t3_title");
  plo("admin.php");
  break;
```

## F. 前台顯示

因為inde.php素材代碼太多，我們把PHP寫在SQL.php內，等同於寫在index.php \(其實這樣所有頁面都能繼承，所以變數名稱要小心\)

### 增添sql.php
```php
//t3
$re=select("q1t3_title", "dpy=1");
$t3_img="upload/".$re[0]['img'];
$t3_text=$re[0]['text'];
```

將title區域部分做修改**\(記得前面要有include sql.php\)**，同時超連結順手一律導向index.php\(題目沒要求導向\)

要求圖片替代文字素材卻用background，不做推測，a與div都給予title說明

### 修改admin.php、login.php、index.php、news.php
```html
<a title="" href="?">
<div class="ti" style="background:url(&#39;use/&#39;); background-size:cover;"></div><!--標題-->
</a>
```

帶入\$t3_img與\$t3_text，改為

```html
<a title="<?= $t3_text ?>" href="?">
    <div title="<?= $t3_text ?>" class="ti" style="background:url(<?= $t3_img ?>); background-size:cover;"></div>
    <!--標題-->
</a>>
```

這時候要注意login.php跟index.php跟news.php都還沒有連結sql.php。所以開頭記得補上

```php
<?php
require_once('sql.php');
?>
```