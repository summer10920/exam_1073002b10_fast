# 網乙術科題庫分析 - 卓越科技大學校園資訊系統
(108年度技術士技能檢定-考速版)

?> 透過已完成的第三題，你可以拿來很快複製修改出第四題的後台內容格式。

## A. 後台的內容格式

1. 注意input的name與value，宣告方法依據修改與刪除有所不同。
2. 新增單項的提交到view.php，走?do=maqeadd
3. form的提交到api.php，走?do=maqemdy
4. 提交前多一組dpy\[$id\]=0，這樣沒選的會是0，有選的會是1，update時一律更新

### 新增aad.php \(版型參考atitle.php\)
```html
<p class="t cent botli">動態文字廣告管理</p>
<form method="post" action="api.php?do=maqemdy">
  <table width="100%">
    <tbody>
      <tr class="yel">
        <td width="68%">動態文字廣告</td>
        <td width="7%">顯示</td>
        <td width="7%">刪除</td>
      </tr>
      <?php
      $re = select("t4_maqe", 1);
      foreach ($re as $value) {
        ?>
        <tr>
          <td><input style="width:90%" type="text" name="text[<?= $value['id'] ?>]" value="<?= $value['text'] ?>"></td>
          <td>
            <input type="hidden" name="dpy[<?=$value['id']?>]" value="0">
            <input type="checkbox" name="dpy[<?=$value['id']?>]" value="1" <?= ($value['dpy']) ? "checked" : "" ?>>
          </td>
          <td><input type="checkbox" name="del[]" value="<?= $value['id'] ?>"></td>
        </tr>
      <?php
    }
    ?>
    </tbody>
  </table>
  <table style="margin-top:40px; width:70%;">
    <tbody>
      <tr>
        <td width="200px"><input type="button" onclick="op('#cover','#cvr','view.php?do=maqeadd')" value="新增動態文字廣告"></td>
        <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
      </tr>
    </tbody>
  </table>
</form>
```

## B. 新增單筆
對view.php做新的case規劃 \(可複製前題目做修改\)

### 增添view.php
```html
case 'maqeadd':
  ?>
  <form method="post" action="api.php?do=<?= $_GET['do'] ?>" enctype="multipart/form-data">
    <p class="t botli">新增動態文字廣告</p>
    <p class="cent">動態文字廣告 ： <input name="text" type="text"></p>
    <p class="cent"><input value="新增" type="submit"><input type="reset" value="重置"></p>
  </form>
  <?php
  break;
```

對api.php做SQL處理，接著回到該單元內容。\(可複製前題目做修改\)

### 增添api.php
```php
case 'maqeadd':
  insert($_POST, "q1t4_maqe");
  plo("admin.php?do=aad");
  break;
```

## C. 修改多筆 + 刪除多筆

從前台試著操作多筆修改跟刪除按下送出。網頁會到api.php?do=maqemdy。處理完成後回到後台頁面admin.php

沒把握你可以在case內先下print\_r\($\_POST\)，確認畫面的資料正不正常跟有哪些資料

### 增添api.php
```php
case 'maqemdy':
  update($_POST, "q1t4_maqe");
  delete($_POST, "q1t4_maqe");
  plo("admin.php?do=aad");
  break;
```

## D. 前台顯示

因為inde.php素材代碼太多，我們把PHP寫在SQL.php內，等同於寫在index.php \(其實這樣所有頁面都能繼承，所以變數名稱要小心\)

撈取文字並串為一個字串並用空白分開

### 增添sql.php
```php
//t4
$re=select("q1t4_maqe", "dpy=1");
$t4_text="";
foreach ($re as $data) $t4_text .= $data['text']."　　";
```

接著前端部分，將marquee區域部分標籤內增加php變數

### 修改login.php、index.php、news.php

```html
<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
</marquee>
```
帶入$t4_text，改為
```html
<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
    <?= $t4_text ?>
</marquee>
```