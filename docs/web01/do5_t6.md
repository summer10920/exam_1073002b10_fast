# 網乙術科題庫分析 - 卓越科技大學校園資訊系統
(108年度技術士技能檢定-考速版)

!> 第五題的後台版面比較相近，透過已完成的第五題，你可以拿來很快複製修改出第六題的內容格式。

## A. 後台的內容格式

1. 找到表格中間，塞入php使可以順利select並帶入tr>td顯示。每次只顯示3筆，所以要設定limit與page關係
2. 注意input的name與value，宣告方法依據修改與刪除有所不同。
3. 新增單項的提交到view.php，走?do=imageadd
4. form的提交到api.php，走?do=imagemdy
5. 更新動畫的提交到view.php，走?do=imagechg，並夾帶ID
6. 這裡還要多個分頁效果步驟，先把畫面都能一次可呈現之後再設計分頁
7. 提交前多一組dpy\[$id\]=0，這樣沒選的會是0，有選的會是1，update時一律更新

### 新增aimage.php\(參考amvim.php\)
```html
<p class="t cent botli">校園映像資料管理</p>
<form method="post" action="api.php?do=imagemdy">
  <table width="100%">
    <tbody>
      <tr class="yel">
        <td width="68%">校園映像資料圖片</td>
        <td width="7%">顯示</td>
        <td width="7%">刪除</td>
        <td></td>
      </tr>
      <?php
      $nowpage = (empty($_GET['page'])) ? 1 : $_GET['page'];
      $begin = ($nowpage - 1) * 3;
      $re = select("db01_t6_img", "1 limit " . $begin . ",3");
      foreach ($re as $value) {
        ?>
        <tr>
          <td><embed src="upload/<?= $value['text'] ?>" width="100" height="68"></td>
          <td>
            <input type="hidden" name="dpy[<?= $value['id'] ?>]" value="0">
            <input type="checkbox" name="dpy[<?= $value['id'] ?>]" value="1" <?= ($value['dpy']) ? "checked" : "" ?>>
          </td>
          <td><input type="checkbox" name="del[]" value="<?= $value['id'] ?>"></td>
          <td><input type="button" onclick="op('#cover','#cvr','view.php?do=imagechg&id=<?= $value['id'] ?>')" value="更換圖片"></td>
        </tr>
      <?php
    }
    ?>
    </tbody>
  </table>

  <table style="margin-top:40px; width:70%;">
    <tbody>
      <tr>
        <td width="200px"><input type="button" onclick="op('#cover','#cvr','view.php?do=imageadd')" value="新增校園映像圖片"></td>
        <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
      </tr>
    </tbody>
  </table>
</form>
```

此時可以在URL上面多加個**&page=2**做測試，是否正常的limit。

接著規劃分頁導覽，從news.php那裏偷來現成的HTML/CSS長這樣做參考修改

```php
<div style="text-align:center;">
    <a class="bl" style="font-size:30px;" href="?do=meg&p=0">&lt;&nbsp;</a>
    <a class="bl" style="font-size:30px;" href="?do=meg&p=0">&nbsp;&gt;</a>
</div>
```

把這段塞到版型下面，也就是兩個table之間修改成。同時做兩件事

1. 由於分頁導航使用==function page(\$table,\$sql,\$range,\$now_page)==
2. 回傳會是一個陣列包了頭\(&lt;\)、連續數字、尾\(&gt;\)，且各自帶page值，用foreach做印出
3. 同時判斷如果是當前頁等於印出的文字時，字體放大

```html
<div style="text-align:center;">
  <?php
  $re = navpage("t6_img", 1, 3, $nowpage);
  foreach ($re as $key => $value) {
    echo '<a class="bl" style="font-size:'.(($nowpage==$key)?"60":"30").'px;" href="?do=aimage&page=' . $value . '">' . $key . '</a>';
  }
  ?>
</div>
```

## B. 新增單筆
對view.php做新的case規劃 \(可複製前題目做修改\)

### 增添view.php
```html
case 'imageadd':
  ?>
  <form method="post" action="api.php?do=<?= $_GET['do'] ?>" enctype="multipart/form-data">
    <p class="t botli">新增校園映像圖片</p>
    <p class="cent">校園映像圖片 ： <input name="img" type="file"></p>
    <p class="cent"><input value="新增" type="submit"><input type="reset" value="重置"></p>
  </form>
  <?php
  break;
```

接著，對api.php做SQL處理，接著回到該單元內容。\(可複製前題目做修改\)
### 增添api.php
```php
case 'imageadd':
  $_POST['text'] = addfile($_FILES['img']);
  insert($_POST, "t6_img");
  plo("admin.php?do=aimage");
  break;
```

## C. 修改多筆 + 刪除多筆
對api.php做SQL處理，接著回到該單元內容。\(可複製前題目做修改\)

### 增添api.php
```php
case 'imagemdy':
  update($_POST, "t6_img");
  delete($_POST, "t6_img");
  plo("admin.php?do=aimage");
  break;
```

## D. 修改單一圖片
這時候的新增修改刪除都可以順利操作，只剩單圖片更改作業。完成view.php。可以拿前一case來改一下

### 增添view.php
```html
case 'imagechg':
  ?>
  <form method="post" action="api.php?do=<?= $_GET['do'] ?>&id=<?= $_GET['id'] ?>" enctype="multipart/form-data">
    <p class="t botli">修改校園映像圖片</p>
    <p class="cent">校園映像圖片 ： <input name="img" type="file"></p>
    <p class="cent"><input value="修改" type="submit"><input type="reset" value="重置"></p>
  </form>
  <?php
  break;
```

接著，參考之前的case，同時為了配合function，將id跟file合併為一個陣列

### 增添api.php
```php
  case 'imagechg':
    $_POST['text'][$_GET['id']] = addfile($_FILES['img']);
    update($_POST, "t6_img");
    plo("admin.php?do=aimage");
    break;
```
此時到這裡，後台的功能已設計完成。接下來是在各版型內顯示該title圖片

## E. 前台的顯示格式

題目已經做好js的輪播工具但沒有提供HTML真差勁，因此先分析再猜想原構。

```javascript
<script>
    var nowpage=0,num=0;
    function pp(x){
        var s,t;
        if(x==1&&nowpage-1>=0) {nowpage--;}
        if(x==2&&(nowpage+1)*3<=num*1+3) {nowpage++;}
        $(".im").hide()
        for(s=0;s<=2;s++){
            t=s*1+nowpage*1;
            $("#ssaa"+t).show()
        }
    }
    pp(1);
</script>
```

大致上理解每次操作會對所有class=im的對象做隱藏，而只對id=ssaa+數字做顯示。function pp\(\)會根據目前參數x是多少做對應的nowpage增減\(x只會是1或2\)，nowpage會去自動推算那些\#ssaa+數字要顯示。所以大致上的HTML應該長這樣：

```php
<div class="cent">
    <img src="上箭頭" onclick=pp(1)>
    <img class="im" id="ssaa0" src="">
    <img class="im" id="ssaa1" src="">
    <img class="im" id="ssaa2" src="">
    <img class="im" id="ssaa3" src="">
    <img src="下箭頭" onclick=pp(1)>
</div>
```

將img這些HTML段落，寫在select時規劃好。這裡的$key沒有特別值，會是0開始

### 增添sql.php
```php
//t6
$re=select("q1t6_img", "dpy=1");
$t6_many=count($re);
$t6_text="";
foreach ($re as $key => $value) $t6_text .= '<img src="upload/'.$value['text'].'" class="im" id="ssaa'.$key.'" width="150" height="103"/>';
```

接著有三個頁面要一起改，找到該區域
### 修改index.php+login.php+news.php
```php
<span class="t botli">校園映象區</span>
```

整合php與調整HTML，修改為

```html
<span class="t botli">校園映象區</span>

<div class="cent" style="padding:10px 20px">
	<img src="upload/01E01.jpg" onclick="pp(1)">
	<?= $t6_text ?>
	<img src="upload/01E02.jpg" onclick="pp(2)">
</div>
```

此時還不能完全正常操作。因為JS的資料有2點錯誤：

1. var num=0; 這部分是指總數量。所以要給JS一個總圖數。
2. if\(x==2&&\(nowpage+1\)\*3&lt;=num\*1+3\)這裡計算方式錯誤，應該是
   下個頁碼跳點將不是最後頁碼跳點\(最後的秀圖跳點會是總數減三\)

因此修改為

```javascript
<script>
  var nowpage = 0,num = < ? = $t6_many ? > ;
  function pp(x) {
    var s, t;
    if (x == 1 && nowpage - 1 >= 0) nowpage--; //x=1往前
    if (x == 2 && nowpage + 1 <= num - 3) nowpage++; //x=2往後
    $(".im").hide()
    for (s = 0; s <= 2; s++) {
        t = s * 1 + nowpage * 1;
        $("#ssaa" + t).show()
    }
  }
  pp(1)
</script>
```