# 網乙術科題庫分析 - 卓越科技大學校園資訊系統
(108年度技術士技能檢定-考速版)

!> 此題目與第六題都是文字類型管理，從此複製開始修改

## A. 後台的內容格式

1. 從複製版型開始，根據需求做修改調整
2. 注意input的name與value，宣告方法依據修改與刪除有所不同。
3. 新增單項的提交到view.php，走?do=newsadd
4. form的提交到api.php，走?do=newsmdy
5. 提交前多一組dpy\[$id\]=0，這樣沒選的會是0，有選的會是1，update時一律更新
6. 題目沒要求分頁效果(可不做)，本題根據示意圖有特別去做，設計limit與page關係

### 新增anews.php\(參考aimage.php\)
```html
<p class="t cent botli">最新消息資料管理</p>
<form method="post" action="api.php?do=newsmdy">
  <table width="100%">
    <tbody>
      <tr class="yel">
        <td width="68%">最新消息資料內容</td>
        <td width="7%">顯示</td>
        <td width="7%">刪除</td>
      </tr>
      <?php
      $nowpage = (empty($_GET['page'])) ? 1 : $_GET['page'];
      $begin = ($nowpage - 1) * 4;
      $re = select("t9_news", "1 limit " . $begin . ",4");
      foreach ($re as $value) {
        ?>
        <tr>
          <td><textarea name="text[<?=$value['id']?>]" cols="70" rows="3"><?=$value['text']?></textarea></td>
          <td>
            <input type="hidden" name="dpy[<?= $value['id'] ?>]" value="0">
            <input type="checkbox" name="dpy[<?= $value['id'] ?>]" value="1" <?= ($value['dpy']) ? "checked" : "" ?>>
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
        <td width="200px"><input type="button" onclick="op('#cover','#cvr','view.php?do=newsadd')" value="新增最新消息圖片"></td>
        <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
      </tr>
    </tbody>
  </table>
</form>
```

添加分頁到兩個table之間

```php
<div style="text-align:center;">
  <?php
  $re = navpage("q1t9_news", 1, 4, $nowpage);
  foreach ($re as $key => $value) {
    echo '<a class="bl" style="font-size:'.(($nowpage==$key)?"60":"30").'px;" href="?do=anews&page=' . $value . '">' . $key . '</a>';
  }
  ?>
</div>
```
## B. 新增單筆
對view.php做新的case規劃 \(可複製前題目做修改\)

### 增添view.php
```html
case 'newsadd':
  ?>
  <form method="post" action="api.php?do=<?= $_GET['do'] ?>" enctype="multipart/form-data">
    <p class="t botli">新增最新消息資料</p>
    <p class="cent"><span style="vertical-align:top;">最新消息資料 ： </span><textarea name="text"></textarea></p>
    <p class="cent"><input value="新增" type="submit"><input type="reset" value="重置"></p>
  </form>
  <?php
  break;
```

再來是對api.php做SQL處理，接著回到該單元內容。\(可複製前題目做修改\)

### 增添api.php
```php
case 'newsadd':
  insert($_POST, "q1t9_news");
  plo("admin.php?do=anews");
  break;
```

## C. 修改多筆 + 刪除多筆
對api.php做SQL處理，接著回到該單元內容。\(可複製前題目做修改\)

### 增添api.php
```php
case 'newsmdy':
  update($_POST, "q1t9_news");
  delete($_POST, "q1t9_news");
  plo("admin.php?do=anews");
  break;
```

## D. 前台的顯示
1. 撈取之前，題目說明最多抓五個，超過時判斷more的顯示條件。
2. 前台使用&lt;il&gt;去列表，只顯示部分字，利用mb\_substr\(DATA,START,RANGE\)來處理此步驟。
3. 滑鼠移過去時會自動跳完整內文，採用素材JS去完成
4. 將JS分析出來，原HTML在&lt;ul&gt;內部，推測格式結構為：

```html
<ul class="ssaa" style="list-style-type:decimal;">
    <li>少量文字<span class="all" style="display:none">完整文字</span></li>
</ul>
```

此時開始規劃`More..`跟`多筆<li>`的HTML提取

### 增添sql.php
```html
//t9
//for index.php
$re=select("t9_news", "dpy=1");
$t9_more=(count($re) > 5) ? '<a style="float:right" href="news.php">More..</a>' : '';
$re=select("t9_news", "dpy=1 limit 5");
$t9_text="";
foreach ($re as $data)
  $t9_text .= '<li>'.mb_substr($data['text'], 0, 20).'<span class="all" style="display:none">'.$data['text'].'</span></li>';
```

到前台調整more的出現時機，塞在標題右側

### 修改index.php
```php
<span class="t botli">最新消息區</span>
```

修改為

```php
<span class="t botli">最新消息區<?=$t9_more?></span>
```

因故調整修改並加入PHP變數，\(li做在sql.php內\)

```php
<ul class="ssaa" style="list-style-type:decimal;">
<?=$t9_text?>
</ul>
```
## E. 前台的news more
與index.php的最新消息觀念差不多，還要多個分頁功能。此外，JS的DOM部分不太一致要小心。先把資料顯示做出來，參考前例之外，還多了page要規劃limit

### 增添sql.php
```html
//for news.php
$nowpage=(empty($_GET['page'])) ? 1 : $_GET['page'];
$t9_begin=($nowpage - 1) * 5;
$re=select("t9_news", "dpy=1 limit ".$t9_begin.",5");
$t9_list="";
foreach ($re as $data)
  $t9_list .= '<li>'.mb_substr($data['text'], 0, 20).'<span class="all" style="display:none">'.$data['text'].'</span></li>';
```

接著修改前台，這裡要改ol才能指定編號，同時start自訂編號起始值，利用變數去配合。
### 修改news.php
```html
<ol class="ssaa" style="list-style-type:decimal;" start=<?=$t9_begin+1?>>
  <?=$t9_list?>
</ol>
```

再來是規劃分頁導覽，參考前台news.php的素材。

```html
<div style="text-align:center;">
  <a class="bl" style="font-size:30px;" href="?do=meg&p=0">&lt;&nbsp;</a>
  <a class="bl" style="font-size:30px;" href="?do=meg&p=0">&nbsp;&gt;</a>
</div>
```

我們為了要規劃文字大小，我們把\<a>部分移到sql.php提取的作業去

### 增添sql.php
```php
//for news.php pagenav
$re=navpage("q1t9_news","dpy=1",5,$nowpage);
$t9_page="";
foreach ($re as $key => $value) {
  $t9_page.='<a class="bl" style="font-size:'.(($nowpage == $key) ? "60" : "30").'px;" href="?page='.$value.'">'.$key.'</a>';
}
```

### 修改news.php
```html
<div style="text-align:center;">
<?=$t9_page?>
</div>
```