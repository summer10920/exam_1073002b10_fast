# 網乙術科題庫分析 - 卓越科技大學校園資訊系統
(108年度技術士技能檢定-考速版)

!> 透過前面的操作完成，你可以拿來很快複製修改出此題的後台內容格式。

## A. 後台的內容格式
1. 找到表格中間，塞入php使可以順利select並帶入tr&gt;td顯示
2. 注意input的name與value，宣告方法依據修改與刪除有所不同。
3. 新增單項的提交到view.php，走?do=mvimadd
4. form的提交到api.php，走?do=mvimmdy
5. 更新動畫的提交到view.php，走?do=mvimchg，並夾帶ID
6. 提交前多一組dpy\[$id\]=0，這樣沒選的會是0，有選的會是1，update時一律更新

### 新增amvim.php\(參考版型atitle.php\)
```html
<p class="t cent botli">動畫圖片管理</p>
<form method="post" action="api.php?do=mvimmdy">
  <table width="100%">
    <tbody>
      <tr class="yel">
        <td width="68%">網站標題</td>
        <td width="7%">顯示</td>
        <td width="7%">刪除</td>
        <td></td>
      </tr>
      <?php
      $re = select("t5_mvim", 1);
      foreach ($re as $value) {
        ?>
        <tr>
          <td><embed src="upload/<?= $value['text'] ?>" width="300"></td>
          <td>
            <input type="hidden" name="dpy[<?=$value['id']?>]" value="0">
            <input type="checkbox" name="dpy[<?=$value['id']?>]" value="1" <?= ($value['dpy']) ? "checked" : "" ?>>
          </td>
          <td><input type="checkbox" name="del[]" value="<?= $value['id'] ?>"></td>
          <td><input type="button" onclick="op('#cover','#cvr','view.php?do=mvimchg&id=<?= $value['id'] ?>')" value="更換動畫"></td>
        </tr>
      <?php
    }
    ?>
    </tbody>
  </table>
  <table style="margin-top:40px; width:70%;">
    <tbody>
      <tr>
        <td width="200px"><input type="button" onclick="op('#cover','#cvr','view.php?do=mvimadd')" value="新增動畫圖片"></td>
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
case 'mvimadd':
  ?>
  <form method="post" action="api.php?do=<?= $_GET['do'] ?>" enctype="multipart/form-data">
    <p class="t botli">新增動畫圖片</p>
    <p class="cent">標題區圖片 ： <input name="img" type="file"></p>
    <p class="cent"><input value="新增" type="submit"><input type="reset" value="重置"></p>
  </form>
  <?php
  break;
```

對api.php做SQL處理，接著回到該單元內容。\(可複製前題目做修改\)
### 增添api.php
```php
case 'mvimadd':
  $_POST['text'] = addfile($_FILES['img']);
  insert($_POST, "q1t5_mvim");
  plo("admin.php?do=amvim");
  break;
```

## C. 修改多筆 + 刪除多筆
對api.php做SQL處理，接著回到該單元內容。\(可複製前題目做修改\)

### 增添api.php
```php
  case 'mvimmdy':
    update($_POST, "q1t5_mvim");
    delete($_POST, "q1t5_mvim");
    plo("admin.php?do=amvim");
    break;
```

## D. 修改單一圖片
這時候的新增修改刪除都可以順利操作，只剩換圖作業。可以拿前一case來改一下。因為只有純上傳，我們需要藏一個ID

### 增添view.php
```html
case 'mvimchg':
  ?>
  <form method="post" action="api.php?do=<?= $_GET['do'] ?>&id=<?= $_GET['id'] ?>" enctype="multipart/form-data">
    <p class="t botli">修改動畫圖片</p>
    <p class="cent">標題區圖片 ： <input name="img" type="file"></p>
    <p class="cent"><input value="修改" type="submit"><input type="reset" value="重置"></p>
  </form>
  <?php
  break;
```

參考之前的case，同時為了配合function，將id跟file合併為一個陣列
### 增添api.php
```php
case 'mvimchg':
  $_POST['text'][$_GET['id']] = addfile($_FILES['img']);
  update($_POST, "q1t5_mvim");
  plo("admin.php?do=amvim");
  break;
```

此時到這裡，後台的功能已設計完成。接下來是在各版型內顯示該title圖片

## E. 前台的動畫顯示
先撈取出mvim的所有檔案路徑，先存在一個array。之後會用到

### 增添sql.php
```php
//t5
$re=select("q1t5_mvim", "dpy=1");
foreach ($re as $data) $t5_ary[]="upload/".$data['text'];
```

題目已經做好js的輪播工具。透過理解知道由一個JS陣列變數lin進行抽換。所以我們要幫所有圖片塞入到該陣列。php的array要塞到js的陣列可使用json\_encode來快速完成。快了貪快，把宣告new array給直接指定了。

### 修改index.php
```javascript
var lin=new Array();
```

修改為

```javascript
var lin = new Array();
lin = <?=json_encode($t5_ary)?>;
```

此時就能正常播放。但初始畫面有3秒的空窗沒東西。這是題目設計沒弄好。如果要修正可調整兩點\(可以不做\)

1. 網頁執行時，應該先出現DIV再有JS\(才能抓到div位置\)。原題目顛倒。
2. if內負責等待三秒，應該在等待三秒前先跑一次html印出

調整原段

```javascript
<!--正中央-->
<script>
    var lin = new Array();
    lin = <?=json_encode($t5_ary)?>;
    if(lin.length>1)
    {
        setInterval("ww()",3000);
        now=1;
    }
    function ww()
    {
        $("#mwww").html("<embed loop=true src='"+lin[now]+"' style='width:99%; height:100%;'></embed>")
        //$("#mwww").attr("src",lin[now])
        now++;
        if(now>=lin.length)
        now=0;
    }
</script>
<div style="width:100%; padding:2px; height:290px;">
    <div id="mwww" loop="true" style="width:100%; height:100%;">
        <div style="width:99%; height:100%; position:relative;" class="cent">沒有資料</div>
    </div>
</div>
```

修正為

```html
<!--正中央-->
<div style="width:100%; padding:2px; height:290px;">
    <div id="mwww" loop="true" style="width:100%; height:100%;">
        <div style="width:99%; height:100%; position:relative;" class="cent">沒有資料</div>
    </div>
</div>
<script>
    var lin = new Array();
    lin = <?=json_encode($t5_ary)?>;
    var now = 0;
    ww();
    if (lin.length > 1) {
        setInterval("ww()", 3000);
        now = 1;
    }

    function ww() {
        $("#mwww").html("<embed loop=true src='" + lin[now] + "' style='width:99%; height:100%;'></embed>")
        //$("#mwww").attr("src",lin[now])
        now++;
        if (now >= lin.length)
            now = 0;
    }
</script>
```